<?php
global $currency_data, $coin_data, $altin_data, $borsa_artanlar_data, $borsa_azalanlar_data, $borsa_islem_gorenler_data, $bist100_data, $parite_data, $cripto_data;
global $bp_options;

 ?>
 <style>
 header{height: 160px;}
 .site-wrapper{top: 160px !important;}
 .mainBar{
     top: 90px;
     position: relative;
 }

 </style>
<div class="currencyBar cMobile" style="">
  <div class="container">
    <ul>

      <li>
        <?php
        $bp_siralama = $bp_options['ustCoinSiralama'];

        $type = explode("{}",$bp_siralama['ustSira1']);
          if($type[1] == "altin"){
            $rate = $altin_data['altin_rate'][$type[0]];
            $price = $altin_data['altin_price'][$type[0]];
            $name = $altin_data['altin_name'][$type[0]];
            $base = "";
          }else if($type[1] == "doviz"){
            $rate = $currency_data['change_rate'][$type[0]];
            $price = $currency_data['buying'][$type[0]];
            $name = $currency_data['full_name'][$type[0]];
            $base = strtoupper($type[0]);
          }else if($type[1] == "coin"){
            $rate = $coin_data['price_24h'][$type[0]];
            if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
            $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
          }else{
            $price = $coin_data['current_price'][$type[0]];
          }
            $name = $coin_data['name'][$type[0]];
            $base = permalink($coin_data['name'][$type[0]]);
          }else if($type[1] == "bist"){
            $rate = $bist100_data['change_rate'];
            $price = $bist100_data['value'];
            $name = "BIST 100";
            $base = "";
          }
          $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
          $name = mb_strtoupper(str_replace(array(
            'Amerikan Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
          ),
          array(
            '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
          ),$name), "UTF-8");
          if(str_replace(",",".",$rate) > 0){
            $crease_status = "increase";
          }else{
            $crease_status = "decrease";
          }
        ?>
        <div class="currencyName"><?=$name?></div>
        <div class="currencyValue base_<?=$base?>"><?=$price?></div>
        <div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
      </li>
      <?php
      $type = explode("{}",$bp_siralama['ustSira2']);
      if($type[1] == "altin"){
        $rate = $altin_data['altin_rate'][$type[0]];
        $price = $altin_data['altin_price'][$type[0]];
        $name = $altin_data['altin_name'][$type[0]];
        $base = "";
      }else if($type[1] == "doviz"){
        $rate = $currency_data['change_rate'][$type[0]];
        $price = $currency_data['buying'][$type[0]];
        $name = $currency_data['full_name'][$type[0]];
        $base = strtoupper($type[0]);
      }else if($type[1] == "coin"){
        $rate = $coin_data['price_24h'][$type[0]];
        if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
        $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
      }else{
        $price = $coin_data['current_price'][$type[0]];
      }
        $name = $coin_data['name'][$type[0]];
        $base = permalink($coin_data['name'][$type[0]]);
      }else if($type[1] == "bist"){
        $rate = $bist100_data['change_rate'];
        $price = $bist100_data['value'];
        $name = "BIST 100";
        $base = "";
      }
      $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
      $name = mb_strtoupper(str_replace(array(
        'Amerikan Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
      ),
      array(
        '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
      ),$name), "UTF-8");
        if(str_replace(",",".",$rate) > 0){
          $crease_status = "increase";
        }else{
          $crease_status = "decrease";
        }
      ?>
      <li>
        <div class="currencyName"><?=$name?></div>
        <div class="currencyValue base_<?=$base?>"><?=$price?></div>
        <div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
      </li>
      <?php
      $type = explode("{}",$bp_siralama['ustSira3']);
      if($type[1] == "altin"){
        $rate = $altin_data['altin_rate'][$type[0]];
        $price = $altin_data['altin_price'][$type[0]];
        $name = $altin_data['altin_name'][$type[0]];
        $base = "";
      }else if($type[1] == "doviz"){
        $rate = $currency_data['change_rate'][$type[0]];
        $price = $currency_data['buying'][$type[0]];
        $name = $currency_data['full_name'][$type[0]];
        $base = strtoupper($type[0]);
      }else if($type[1] == "coin"){
        $rate = $coin_data['price_24h'][$type[0]];
        if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
        $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
      }else{
        $price = $coin_data['current_price'][$type[0]];
      }
        $name = $coin_data['name'][$type[0]];
        $base = permalink($coin_data['name'][$type[0]]);
      }else if($type[1] == "bist"){
        $rate = $bist100_data['change_rate'];
        $price = $bist100_data['value'];
        $name = "BIST 100";
        $base = "";
      }
      $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
      $name = mb_strtoupper(str_replace(array(
        'Amerikan Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
      ),
      array(
        '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
      ),$name), "UTF-8");
        if(str_replace(",",".",$rate) > 0){
          $crease_status = "increase";
        }else{
          $crease_status = "decrease";
        }
      ?>
      <li>
        <div class="currencyName"><?=$name?></div>
        <div class="currencyValue base_<?=$base?>"><?=$price?></div>
        <div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
      </li>
      <?php
      $type = explode("{}",$bp_siralama['ustSira4']);
      if($type[1] == "altin"){
        $rate = $altin_data['altin_rate'][$type[0]];
        $price = $altin_data['altin_price'][$type[0]];
        $name = $altin_data['altin_name'][$type[0]];
        $base = "";
      }else if($type[1] == "doviz"){
        $rate = $currency_data['change_rate'][$type[0]];
        $price = $currency_data['buying'][$type[0]];
        $name = $currency_data['full_name'][$type[0]];
        $base = strtoupper($type[0]);
      }else if($type[1] == "coin"){
        $rate = $coin_data['price_24h'][$type[0]];
        if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
        $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
      }else{
        $price = $coin_data['current_price'][$type[0]];
      }
        $name = $coin_data['name'][$type[0]];
        $base = permalink($coin_data['name'][$type[0]]);
      }else if($type[1] == "bist"){
        $rate = $bist100_data['change_rate'];
        $price = $bist100_data['value'];
        $name = "BIST 100";
        $base = "";
      }
      $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
      $name = mb_strtoupper(str_replace(array(
        'Amerikan Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
      ),
      array(
        '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
      ),$name), "UTF-8");
        if(str_replace(",",".",$rate) > 0){
          $crease_status = "increase";
        }else{
          $crease_status = "decrease";
        }
      ?>
      <li>
        <div class="currencyName"><?=$name?></div>
        <div class="currencyValue base_<?=$base?>"><?=$price?></div>
        <div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
      </li>
      <?php
      $type = explode("{}",$bp_siralama['ustSira5']);
      if($type[1] == "altin"){
        $rate = $altin_data['altin_rate'][$type[0]];
        $price = $altin_data['altin_price'][$type[0]];
        $name = $altin_data['altin_name'][$type[0]];
        $base = "";
      }else if($type[1] == "doviz"){
        $rate = $currency_data['change_rate'][$type[0]];
        $price = $currency_data['buying'][$type[0]];
        $name = $currency_data['full_name'][$type[0]];
        $base = strtoupper($type[0]);
      }else if($type[1] == "coin"){
        $rate = $coin_data['price_24h'][$type[0]];
        if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
        $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
      }else{
        $price = $coin_data['current_price'][$type[0]];
      }
        $name = $coin_data['name'][$type[0]];
        $base = permalink($coin_data['name'][$type[0]]);
      }else if($type[1] == "bist"){
        $rate = $bist100_data['change_rate'];
        $price = $bist100_data['value'];
        $name = "BIST 100";
        $base = "";
      }
      $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
      $name = mb_strtoupper(str_replace(array(
        'Amerikan Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
      ),
      array(
        '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
      ),$name), "UTF-8");
        if(str_replace(",",".",$rate) > 0){
          $crease_status = "increase";
        }else{
          $crease_status = "decrease";
        }
      ?>
      <li>
        <div class="currencyName"><?=$name?></div>
        <div class="currencyValue base_<?=$base?>"><?=$price?></div>
        <div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
      </li>
      <?php
      $type = explode("{}",$bp_siralama['ustSira6']);
      if($type[1] == "altin"){
        $rate = $altin_data['altin_rate'][$type[0]];
        $price = $altin_data['altin_price'][$type[0]];
        $name = $altin_data['altin_name'][$type[0]];
        $base = "";
      }else if($type[1] == "doviz"){
        $rate = $currency_data['change_rate'][$type[0]];
        $price = $currency_data['buying'][$type[0]];
        $name = $currency_data['full_name'][$type[0]];
        $base = strtoupper($type[0]);
      }else if($type[1] == "coin"){
        $rate = $coin_data['price_24h'][$type[0]];
        if($coin_data['name'][$type[0]] == "symbol" || $coin_data['symbol'][$type[0]] == "bch" ){
        $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
      }else{
        $price = $coin_data['current_price'][$type[0]];
      }
        $name = $coin_data['name'][$type[0]];
        $base = permalink($coin_data['name'][$type[0]]);
      }else if($type[1] == "bist"){
        $rate = $bist100_data['change_rate'];
        $price = $bist100_data['value'];
        $name = "BIST 100";
        $base = "";
      }
      $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
      $name = mb_strtoupper(str_replace(array(
        'Amerikan Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
      ),
      array(
        '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
      ),$name), "UTF-8");
        if(str_replace(",",".",$rate) > 0){
          $crease_status = "increase";
        }else{
          $crease_status = "decrease";
        }
      ?>
      <li>
        <div class="currencyName"><?=$name?></div>
        <div class="currencyValue base_<?=$base?>"><?=$price?></div>
        <div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
      </li>
      <?php
      $type = explode("{}",$bp_siralama['ustSira7']);
      if($type[1] == "altin"){
        $rate = $altin_data['altin_rate'][$type[0]];
        $price = $altin_data['altin_price'][$type[0]];
        $name = $altin_data['altin_name'][$type[0]];
        $base = "";
      }else if($type[1] == "doviz"){
        $rate = $currency_data['change_rate'][$type[0]];
        $price = $currency_data['buying'][$type[0]];
        $name = $currency_data['full_name'][$type[0]];
        $base = strtoupper($type[0]);
      }else if($type[1] == "coin"){
        $rate = $coin_data['price_24h'][$type[0]];
        if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
        $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
      }else{
        $price = $coin_data['current_price'][$type[0]];
      }
        $name = $coin_data['name'][$type[0]];
        $base = permalink($coin_data['name'][$type[0]]);
      }else if($type[1] == "bist"){
        $rate = $bist100_data['change_rate'];
        $price = $bist100_data['value'];
        $name = "BIST 100";
        $base = "";
      }
      $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
      $name = mb_strtoupper(str_replace(array(
        'Amerikan Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
      ),
      array(
        '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
      ),$name), "UTF-8");
        if(str_replace(",",".",$rate) > 0){
          $crease_status = "increase";
        }else{
          $crease_status = "decrease";
        }
      ?>
      <li>
        <div class="currencyName"><?=$name?></div>
        <div class="currencyValue base_<?=$base?>"><?=$price?></div>
        <div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
      </li>
      <?php
      $type = explode("{}",$bp_siralama['ustSira8']);
      if($type[1] == "altin"){
        $rate = $altin_data['altin_rate'][$type[0]];
        $price = $altin_data['altin_price'][$type[0]];
        $name = $altin_data['altin_name'][$type[0]];
        $base = "";
      }else if($type[1] == "doviz"){
        $rate = $currency_data['change_rate'][$type[0]];
        $price = $currency_data['buying'][$type[0]];
        $name = $currency_data['full_name'][$type[0]];
        $base = strtoupper($type[0]);
      }else if($type[1] == "coin"){
        $rate = $coin_data['price_24h'][$type[0]];
        if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
        $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
      }else{
        $price = $coin_data['current_price'][$type[0]];
      }
        $name = $coin_data['name'][$type[0]];
        $base = permalink($coin_data['name'][$type[0]]);
      }else if($type[1] == "bist"){
        $rate = $bist100_data['change_rate'];
        $price = number_format($bist100_data['value'], 2);
        $name = "BIST 100";
        $base = "";
      }
      $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
      $name = mb_strtoupper(str_replace(array(
        'Amerikan Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
      ),
      array(
        '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
      ),$name), "UTF-8");
        if(str_replace(",",".",$rate) > 0){
          $crease_status = "increase";
        }else{
          $crease_status = "decrease";
        }
      ?>
      <li>
        <div class="currencyName"><?=$name?></div>
        <div class="currencyValue base_<?=$base?>"><?=$price?></div>
        <div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
      </li>
    </ul>
  </div>
</div>
