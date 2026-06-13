<?php
CSF::createWidget( 'sidebar_altin_cevirici', array(
  'title'       => 'Sidebar Altın Çevirici',
  'classname'   => 'sidebar-altin-cevirici',
  'description' => 'Sidebar Altın Çevirici',
) );

if( ! function_exists( 'sidebar_altin_cevirici' ) ) {
  function sidebar_altin_cevirici( $args, $instance ) {
    global $altin_data;

    // 1) Güvenli haritalar: price ve name (associative)
    $price_src = (array)($altin_data['altin_price'] ?? []);
    $name_src  = (array)($altin_data['altin_name']  ?? []);

    // 2) Anahtarları "kod" olarak normalize et (harf/rakam/altçizgi; TR karakterlerini indirgeme)
    //    - Önce lower
    //    - Türkçe karakterleri ASCII'ye indirgeme (çok basit bir dönüşüm; ihtiyaca göre genişletilebilir)
    $tr_map = [
      'ç'=>'c','ğ'=>'g','ı'=>'i','ö'=>'o','ş'=>'s','ü'=>'u',
      'Ç'=>'c','Ğ'=>'g','İ'=>'i','Ö'=>'o','Ş'=>'s','Ü'=>'u'
    ];
    $price_map = [];
    $label_map = [];
    foreach ($price_src as $rawKey => $rawPrice) {
      $k = strtr((string)$rawKey, $tr_map);
      $k = strtolower($k);
      // yalnızca harf-rakam-altçizgi; tire vs. kaldır
      $code = preg_replace('/[^a-z0-9_]/', '', $k);
      if ($code === '') continue;

      $price_map[$code] = $rawPrice;                        // "Gram Altın" vb. TRY fiyat metni beklenir (örn: "2.345,50")
      $label_map[$code] = $name_src[$rawKey] ?? strtoupper($code); // Etiket: varsa isim, yoksa CODE
    }

    // 3) Geçersiz kodları ele (boş price vb.)
    $codes = array_keys($price_map);
    $codes = array_values(array_filter($codes, function($c) use ($price_map){
      return isset($price_map[$c]) && $price_map[$c] !== '' && $price_map[$c] !== null;
    }));

    // 4) Sıralama: yaygın ürünleri öne al, sonra alfabetik
    $prio = ['gramaltin'=>0,'ceyrekaltin'=>1,'yarimaltin'=>2,'tamaltin'=>3,'onsaaltin'=>4,'ons'=>5,'ata'=>6,'ataaltin'=>7,'14ayar'=>8,'18ayar'=>9,'22ayar'=>10];
    usort($codes, function($a,$b) use($prio){
      $pa = $prio[$a] ?? 999; $pb = $prio[$b] ?? 999;
      if ($pa === $pb) return strcmp($a,$b);
      return $pa <=> $pb;
    });

    // 5) Front-end'e JSON olarak aktar
    $data_price_map = esc_attr(json_encode($price_map, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
    $data_label_map = esc_attr(json_encode($label_map, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));

    if (empty($codes)) {
      echo '<div class="widget"><div class="dovizCeviriciSid"><strong>Altın fiyat verisi bulunamadı.</strong></div></div>';
      return;
    }
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="dovizCeviriciSid"
           data-altin-price-map='<?php echo $data_price_map; ?>'
           data-altin-label-map='<?php echo $data_label_map; ?>'>

        <div class="head"><i></i>ALTIN ÇEVİRİCİ</div>

        <label class="miktar">
          <span>Miktar</span>
          <!-- Hem mevcut CSS/JS’e uyum için orijinal class'ı koruyoruz,
               hem de tutarlılık için exchange_func_trigger ekliyoruz -->
          <input type="text"
                 class="altin_exchange exhange_altin_func exchange_func_trigger"
                 placeholder="1"
                 inputmode="decimal"
                 value="1" />
        </label>

        <label class="yarim paraBirimi" style="width: 100%;">
          <span>Kaynak Birimi</span>
          <select class="exhange_altin_func exchange_func_trigger para_birimi_a">
            <?php
            // Varsayılan seçim: gramaltin varsa onu seç
            $default = in_array('gramaltin', $codes, true) ? 'gramaltin' : $codes[0];
            foreach ($codes as $code):
              $label = $label_map[$code] ?? strtoupper($code);
            ?>
              <option value="<?php echo esc_attr($code); ?>" <?php selected($code, $default); ?>>
                <?php echo esc_html($label); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </label>

        <span class="resultAltin">0,00</span>
      </div>

      <script>
      (function(){
        function parseNum(v){
          v = (v||'').toString().trim().replace(/\s/g,'');
          // 2.345,50 -> 2345.50 | 2345,50 -> 2345.50 | 2345.50 -> 2345.50
          if (v.indexOf(',') > -1 && v.indexOf('.') > -1){
            v = v.replace(/\./g,'').replace(',', '.');
          } else if (v.indexOf(',') > -1){
            v = v.replace(',', '.');
          }
          var n = parseFloat(v);
          return isNaN(n) ? 0 : n;
        }
        function formatTR(n){
          try { return n.toLocaleString('tr-TR', {maximumFractionDigits: 4}); }
          catch(e){ return (Math.round(n*10000)/10000).toString(); }
        }

        function recalc(root){
          var amount = parseNum(root.querySelector('.altin_exchange').value);
          var code   = (root.querySelector('.para_birimi_a').value || '').toLowerCase();

          var priceMap = JSON.parse(root.getAttribute('data-altin-price-map') || '{}');
          var rawUnit  = priceMap[code];

          if (rawUnit == null){
            root.querySelector('.resultAltin').textContent = '—';
            return;
          }

          var unitTRY = parseNum(rawUnit); // 1 birim (seçilen altın ürünü) = unitTRY TRY
          if (!unitTRY || unitTRY <= 0){
            root.querySelector('.resultAltin').textContent = '—';
            return;
          }

          var outTRY = amount * unitTRY;
          root.querySelector('.resultAltin').textContent = formatTR(outTRY);
        }

        function bindAll(){
          // Hem "exhange_altin_func" (orijinal yazım) hem "exchange_func_trigger" tetikleyicisi
          document.addEventListener('input',  function(e){
            if (e.target.classList.contains('exhange_altin_func')
             || e.target.classList.contains('exchange_func_trigger')) {
              var root = e.target.closest('.dovizCeviriciSid');
              if (root) recalc(root);
            }
          });
          document.addEventListener('change', function(e){
            if (e.target.classList.contains('exhange_altin_func')
             || e.target.classList.contains('exchange_func_trigger')) {
              var root = e.target.closest('.dovizCeviriciSid');
              if (root) recalc(root);
            }
          });

          document.querySelectorAll('.dovizCeviriciSid').forEach(recalc);
        }

        if (document.readyState === 'loading'){
          document.addEventListener('DOMContentLoaded', bindAll);
        } else {
          bindAll();
        }
      })();
      </script>
    </div>
    <!-- /Widget -->
    <?php
  }
}
?>
