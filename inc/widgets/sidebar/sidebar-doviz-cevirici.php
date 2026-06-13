<?php
CSF::createWidget('sidebar_doviz_cevirici', array(
  'title'       => 'Sidebar Döviz Çevirici',
  'classname'   => 'sidebar-doviz-cevirici',
  'description' => 'Sidebar Döviz Çevirici',
));

if (!function_exists('sidebar_doviz_cevirici')) {
  function sidebar_doviz_cevirici($args, $instance) {
    global $currency_data;

    // --- Map oluştur ---
    $buying_map   = array_change_key_case((array)($currency_data['buying'] ?? []), CASE_LOWER);
    $selling_map  = array_change_key_case((array)($currency_data['selling'] ?? []), CASE_LOWER);

    // --- Kod listesi oluştur (sadece alfabetik, numeric key'leri at) ---
    $codes = array_keys($buying_map);
    $codes = array_values(array_filter($codes, function($k){
      return is_string($k) && preg_match('/^[a-z]{2,4}$/i', $k);
    }));
    $codes = array_values(array_unique(array_map('strtolower', $codes)));
    usort($codes, function($a, $b){
      $prio = ['usd'=>0,'eur'=>1,'gbp'=>2];
      $pa = $prio[$a] ?? 999; $pb = $prio[$b] ?? 999;
      if ($pa === $pb) return strcmp($a, $b);
      return $pa <=> $pb;
    });

    // --- JSON olarak aktar ---
    $data_buying_map  = esc_attr(json_encode($buying_map,  JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
    $data_selling_map = esc_attr(json_encode($selling_map, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));

    if (empty($buying_map)) {
      echo '<div class="widget"><div class="dovizCeviriciSid"><strong>Döviz verisi bulunamadı.</strong></div></div>';
      return;
    }
    ?>
    <div class="widget">
      <div class="dovizCeviriciSid"
           data-buying-map='<?php echo $data_buying_map; ?>'
           data-selling-map='<?php echo $data_selling_map; ?>'>

        <div class="head"><i></i>DÖVİZ ÇEVİRİCİ</div>

        <label class="miktar">
          <span>Miktar</span>
          <input type="text" class="miktar_exchange exchange_func_trigger" placeholder="100" inputmode="decimal" value="100" />
        </label>

        <label class="yarim paraBirimi">
          <span>Para Birimi</span>
          <select class="exchange_func_trigger para_birimi">
            <option value="try">TRY</option>
            <?php foreach ($codes as $code): ?>
              <option value="<?php echo esc_attr($code); ?>" <?php selected($code, 'usd'); ?>>
                <?php echo strtoupper(esc_html($code)); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </label>

        <label class="yarim cevrBirim">
          <span>Çevrileceği Birim</span>
          <select class="exchange_func_trigger cevirilecek_birim">
            <option value="try">TRY</option>
            <?php foreach ($codes as $code): ?>
              <option value="<?php echo esc_attr($code); ?>">
                <?php echo strtoupper(esc_html($code)); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </label>

        <span class="result">0,00</span>

        <div class="currencyProcess">
          <div class="formCheck">
            <label class="radioLabel">
              <input type="radio" checked class="exchange_func_trigger exchange_alis" name="currency-process">
              <span class="radioMark">Alış</span>
            </label>
          </div>
          <div class="formCheck">
            <label class="radioLabel">
              <input type="radio" class="exchange_func_trigger exchange_satis" name="currency-process">
              <span class="radioMark">Satış</span>
            </label>
          </div>
        </div>
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
          var amount = parseNum(root.querySelector('.miktar_exchange').value);
          var from   = (root.querySelector('.para_birimi').value || '').toLowerCase();
          var to     = (root.querySelector('.cevirilecek_birim').value || '').toLowerCase();
          var useSelling = root.querySelector('.exchange_satis').checked;

          var buyMap  = JSON.parse(root.getAttribute('data-buying-map')  || '{}');
          var sellMap = JSON.parse(root.getAttribute('data-selling-map') || '{}');
          var table   = (useSelling && Object.keys(sellMap).length) ? sellMap : buyMap;

          function rate(code){
            if (code === 'try') return 1;
            var raw = table[code];
            if (raw == null) return undefined;
            return parseNum(raw);
          }

          var rFrom = rate(from), rTo = rate(to);
          if ((from!=='try' && (!rFrom || rFrom<=0)) || (to!=='try' && (!rTo || rTo<=0))){
            root.querySelector('.result').textContent = '—';
            return;
          }

          var inTRY  = (from==='try') ? amount : amount * rFrom;
          var outVal = (to==='try')   ? inTRY   : inTRY / rTo;

          root.querySelector('.result').textContent = formatTR(outVal);
        }

        function bindAll(){
          document.addEventListener('input',  function(e){
            if (e.target.classList.contains('exchange_func_trigger')) {
              var root = e.target.closest('.dovizCeviriciSid');
              if (root) recalc(root);
            }
          });
          document.addEventListener('change', function(e){
            if (e.target.classList.contains('exchange_func_trigger')) {
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
    <?php
  }
}
