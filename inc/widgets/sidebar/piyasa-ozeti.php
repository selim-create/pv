<?php

CSF::createWidget( 'piyasa_ozeti', array(
  'title'       => 'Sidebar Piyasa Özeti',
  'classname'   => 'piyasa-ozeti',
  'description' => 'Piyasa Özeti',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'Piyasa Özeti',
    ),
  ),
) );

if( ! function_exists( 'piyasa_ozeti' ) ) {
  function piyasa_ozeti( $args, $instance ) {
    global $currency_data, $coin_data, $bist100_data, $altin_data;
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="sidebarHead"><?=$instance['baslik']?></div>
      <table class="currencyTable" style="border-top: 0;width: 302px;margin-top: 20px;border-top: 1px solid #dcdcdc;">

        <tbody>
          <?php
          if($currency_data['change_rate']['usd'] < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;">Dolar</b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$currency_data['buying']['usd']?></td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=$currency_data['change_rate']['usd']?></span></td>
          </tr>
          <?php
          if($currency_data['change_rate']['eur'] < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;"><?=$currency_data['full_name']['eur']?></b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$currency_data['buying']['eur']?></td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=$currency_data['change_rate']['eur']?></span></td>
          </tr>

          <?php
          if($currency_data['change_rate']['gbp'] < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;">Sterlin</b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$currency_data['buying']['gbp']?></td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=$currency_data['change_rate']['gbp']?></span></td>
          </tr>

          <?php
          if(str_replace(",",".",trim($coin_data['price_24h']['btc'])) < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;"><?=$coin_data['name']['btc']?></b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['btc']?>,00</td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=number_format($coin_data['price_24h']['btc'],2)?></span></td>
          </tr>

          <?php
          if($coin_data['price_24h']['eth'] < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;"><?=$coin_data['name']['eth']?></b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['eth']?>,00</td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=number_format($coin_data['price_24h']['eth'],2)?></span></td>
          </tr>

          <?php
          if($altin_data['altin_rate']['ceyrek-altin'] < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;">Çeyrek</b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$altin_data['altin_price_buying']['ceyrek-altin']?></td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=$altin_data['altin_rate']['ceyrek-altin']?></span></td>
          </tr>

          <?php
          if($altin_data['altin_rate']['gram-altin'] < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;">G. Altın</b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$altin_data['altin_price_buying']['gram-altin']?></td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=$altin_data['altin_rate']['gram-altin']?></span></td>
          </tr>

          <?php
          if(str_replace(",",".",$bist100_data['change_rate']) < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;">BIST 100</b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$bist100_data['value']?></td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=$bist100_data['change_rate']?></span></td>
          </tr>

          <?php
          if($coin_data['price_24h']['ltc'] < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;"><?=$coin_data['name']['ltc']?></b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['ltc']?></td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=number_format($coin_data['price_24h']['ltc'],2)?></span></td>
          </tr>

          <?php
          if($coin_data['change_rate']['bch'] < 0){
            $change_rate = "decrease";
          }else{
            $change_rate = "increase";
          }
          ?>
          <tr>
            <td><b style="color: #242424 !important;font-weight:500;">B. Cash</b></td>
            <td style="font-weight: normal;"><i class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['bch']?>,00</td>
            <td style="font-weight: normal;"><span class="<?=$change_rate?> subtract">% <?=number_format($coin_data['price_24h']['bch'],2)?></span></td>
          </tr>

        </tbody>
    </table>
    </div>
    <!-- #Widget -->

    <?php
  }
}

?>
