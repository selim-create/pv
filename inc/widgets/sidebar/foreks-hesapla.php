<?php
CSF::createWidget( 'foreks_hesapla', array(
  'title'       => 'Foreks Hesapla',
  'classname'   => 'foreks-hesapla',
  'description' => 'Foreks Hesapla',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'FOREKS HESAPLA'
    ),
  ),
) );

if( ! function_exists( 'foreks_hesapla' ) ) {
  function foreks_hesapla( $args, $instance ) {
    global $parite_data;

    // --- 1) Map'leri oluştur: key=parite, val=fiyat (alış) / tam ad ---
    // $parite_data['buying'][ 'eur-usd' ] = "1,0750" gibi varsayıyoruz
    $buy_src  = (array) ($parite_data['buying']    ?? []);
    $name_src = (array) ($parite_data['full_name'] ?? []);

    // Parite anahtarını normalize et: "eur-usd" / "EUR/USD" → "eur_usd"
    $price_map = []; // "eur_usd" => "1,0750"
    $label_map = []; // "eur_usd" => "EUR/USD" (mümkünse)
    foreach ($buy_src as $rawKey => $rawPrice) {
      $k = strtolower((string)$rawKey);
      $k = str_replace(['-','/','\\',' '], '_', $k);
      // Sadece 3+3 (ör: eur_usd), metalleri de (xau_usd, xag_usd) destekler
      if (!preg_match('/^[a-z]{3}_[a-z]{3}$/', $k)) {
        // Uymayanları at (parite dışı anahtarlar karışmasın)
        continue;
      }
      if ($rawPrice === '' || $rawPrice === null) continue;

      $price_map[$k] = $rawPrice;
      // Etiket: varsa full_name'den, yoksa BASE/QUOTE formatı
      if (isset($name_src[$rawKey]) && $name_src[$rawKey]) {
        $label_map[$k] = $name_src[$rawKey];
      } else {
        $label_map[$k] = strtoupper(substr($k,0,3)) . '/' . strtoupper(substr($k,4,3));
      }
    }

    // --- 2) Parite listesi: popülerleri öne al, kalanları alfabetik ---
    $pairs = array_keys($price_map);
    // Popüler öncelik
    $prio = [
      'eur_usd'=>0,'usd_try'=>1,'gbp_usd'=>2,'usd_jpy'=>3,'usd_chf'=>4,'aud_usd'=>5,'usd_cad'=>6,
      'xau_usd'=>7,'xag_usd'=>8,'eur_gbp'=>9
    ];
    usort($pairs, function($a,$b) use($prio){
      $pa = $prio[$a] ?? 999; $pb = $prio[$b] ?? 999;
      if ($pa === $pb) return strcmp($a,$b);
      return $pa <=> $pb;
    });

    // --- 3) JSON'u front-end'e geçir ---
    $data_price_map = esc_attr(json_encode($price_map, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
    $data_label_map = esc_attr(json_encode($label_map, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));

    if (empty($pairs)) {
      echo '<div class="widget"><div class="dovizCeviriciSid"><strong>Parite verisi bulunamadı.</strong></div></div>';
      return;
    }
    $default_pair = in_array('eur_usd',$pairs,true) ? 'eur_usd' : $pairs[0];
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="dovizCeviriciSid"
           data-parite-price-map='<?php echo $data_price_map; ?>'
           data-parite-label-map='<?php echo $data_label_map; ?>'>

        <div class="head"><i></i><?php echo esc_html($instance['baslik'] ?? 'FOREKS HESAPLA'); ?></div>

        <label class="miktar">
          <span>İşlem Miktarı</span>
          <input type="text"
                 class="foreks_exchange exchange_foreks_func exchange_func_trigger"
                 placeholder="100"
                 inputmode="decimal"
                 value="100" />
        </label>

        <label class="yarim paraBirimi">
          <span>Parite Çifti</span>
          <select class="exchange_foreks_func exchange_func_trigger parite_a">
            <?php foreach ($pairs as $p): ?>
              <option value="<?php echo esc_attr($p); ?>" <?php selected($p, $default_pair); ?>>
                <?php echo esc_html($label_map[$p] ?? strtoupper(substr($p,0,3)).'/'.strtoupper(substr($p,4,3))); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </label>

        <label class="yarim paraBirimi">
          <span>Marjin Oranı</span>
          <select class="exchange_foreks_func exchange_func_trigger marjin_a">
            <option value="10">10:1</option>
            <option value="25">25:1</option>
            <option value="50" selected>50:1</option>
            <option value="75">75:1</option>
            <option value="100">100:1</option>
            <option value="200">200:1</option>
          </select>
        </label>

        <span class="resultForeks">0,00</span>
      </div>

      <script>
      (function(){
        function parseNum(v){
          v = (v||'').toString().trim().replace(/\s/g,'');
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
          var amount = parseNum(root.querySelector('.foreks_exchange').value);
          var pair   = (root.querySelector('.parite_a').value || '').toLowerCase(); // ör. eur_usd
          var lev    = parseNum(root.querySelector('.marjin_a').value);             // ör. 50 → 50:1

          var priceMap = JSON.parse(root.getAttribute('data-parite-price-map') || '{}');
          var rawPx    = priceMap[pair];

          if (!pair || rawPx == null || !lev || lev <= 0){
            root.querySelector('.resultForeks').textContent = '—';
            return;
          }

          var px = parseNum(rawPx); // 1 BASE = px QUOTE
          if (!px || px <= 0){
            root.querySelector('.resultForeks').textContent = '—';
            return;
          }

          // BASE/QUOTE ayrıştır
          var base  = pair.slice(0,3).toUpperCase();
          var quote = pair.slice(4,7).toUpperCase();

          // Notional (QUOTE) = amount(BASE) * price(BASE→QUOTE)
          var notionalQuote = amount * px;

          // Margin (QUOTE) = Notional / Leverage
          var marginQuote = notionalQuote / lev;

          root.querySelector('.resultForeks').textContent = formatTR(marginQuote) + ' ' + quote;
        }

        function bindAll(){
          document.addEventListener('input',  function(e){
            if (e.target.classList.contains('exchange_foreks_func')
             || e.target.classList.contains('exchange_func_trigger')) {
              var root = e.target.closest('.dovizCeviriciSid');
              if (root) recalc(root);
            }
          });
          document.addEventListener('change', function(e){
            if (e.target.classList.contains('exchange_foreks_func')
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
