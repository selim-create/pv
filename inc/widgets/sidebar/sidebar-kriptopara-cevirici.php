<?php
CSF::createWidget('sidebar_kriptopara_cevirici', array(
  'title'       => 'Sidebar Kriptopara Çevirici',
  'classname'   => 'sidebar-doviz-cevirici', // mevcut CSS'i kullansın
  'description' => 'Sidebar Kriptopara Çevirici',
));

if ( ! function_exists('sidebar_kriptopara_cevirici') ) {
  function sidebar_kriptopara_cevirici($args, $instance){
    global $coin_data;

    // 1) Fiyat haritası (TRY varsayımı) – key'leri lowercase'a indir
    $price_map = array_change_key_case( (array)($coin_data['current_price'] ?? []), CASE_LOWER );

    // 2) Sadece uygun sembolleri al (btc, eth, sol, vb.)
    $symbols = array_keys($price_map);
    $symbols = array_values(array_filter($symbols, function($k){
      return is_string($k) && preg_match('/^[a-z0-9\-]{2,12}$/i', $k);
    }));
    $symbols = array_values(array_unique(array_map('strtolower', $symbols)));

    // 3) Popülerleri öne al, kalanlar alfabetik
    $prio = ['btc'=>0,'eth'=>1,'bnb'=>2,'sol'=>3,'xrp'=>4,'doge'=>5,'ada'=>6,'dot'=>7,'avax'=>8,'trx'=>9];
    usort($symbols, function($a,$b) use ($prio){
      $pa = $prio[$a] ?? 999; $pb = $prio[$b] ?? 999;
      if ($pa === $pb) return strcmp($a,$b);
      return $pa <=> $pb;
    });

    $data_price_map = esc_attr(json_encode($price_map, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));

    if (empty($price_map)) {
      echo '<div class="widget"><div class="dovizCeviriciSid"><strong>Kripto fiyat verisi bulunamadı.</strong></div></div>';
      return;
    }
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="dovizCeviriciSid" data-price-map='<?php echo $data_price_map; ?>'>

        <div class="head"><i></i>KRİPTOPARA ÇEVİRİCİ</div>

        <label class="miktar">
          <span>Miktar</span>
          <input type="text" class="kripto_amount exchange_func_trigger exchange_kripto_func" placeholder="1" inputmode="decimal" value="1" />
        </label>

        <label class="yarim paraBirimi">
          <span>Kaynak Birimi</span>
          <select class="exchange_func_trigger exchange_kripto_func para_birimi_k para_birimi">
            <?php foreach ($symbols as $sym): ?>
              <option value="<?php echo esc_attr($sym); ?>" <?php selected($sym,'btc'); ?>>
                <?php echo strtoupper(esc_html($sym)); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </label>

        <span class="result">0,00</span>
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
          var amount = parseNum(root.querySelector('.kripto_amount').value);
          var sym    = (root.querySelector('.para_birimi_k').value || '').toLowerCase();

          var priceMap = JSON.parse(root.getAttribute('data-price-map') || '{}');
          var rawPrice = priceMap[sym];

          if (rawPrice == null){
            root.querySelector('.result').textContent = '—';
            return;
          }

          var unitTRY = parseNum(rawPrice); // 1 COIN = unitTRY TRY (fiyatlar TRY değilse burada USD->TRY ile çarp)
          if (!unitTRY || unitTRY <= 0){
            root.querySelector('.result').textContent = '—';
            return;
          }

          root.querySelector('.result').textContent = formatTR(amount * unitTRY);
        }

        function bindAll(){
          // var olan CSS/JS’e dokunmadan, en yakın .dovizCeviriciSid üzerinde hesap
          document.addEventListener('input',  function(e){
            if (e.target.classList.contains('exchange_kripto_func') || e.target.classList.contains('exchange_func_trigger')) {
              var root = e.target.closest('.dovizCeviriciSid');
              if (root) recalc(root);
            }
          });
          document.addEventListener('change', function(e){
            if (e.target.classList.contains('exchange_kripto_func') || e.target.classList.contains('exchange_func_trigger')) {
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
