<?php

CSF::createWidget('kriptopara', [
    'title' => 'Sidebar Kriptopara Tablosu',
    'classname' => 'kriptopara',
    'description' => 'Kripto Para Tablosu',
    'fields' => [
        [
            'id' => 'baslik',
            'type' => 'text',
            'title' => 'Başlık',
            'default' => 'Kriptoparalar',
        ],
    ],
]);

if (!function_exists('kriptopara')) {
    function kriptopara($args, $instance)
    {
        global $currency_data, $coin_data, $bist100_data, $altin_data, $bp_options; ?>
<!-- Widget -->
<div class="widget">
  <div class="sidebarHead"><?=$instance['baslik']?>
  </div>
  <table class="currencyTable" style="border-top: 0;width: 302px;margin-top: 20px;border-top: 1px solid #dcdcdc;">

    <tbody>
      <?php
          if ($coin_data['price_24h']['btc'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=bitcoin"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/bitcoin.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">Bitcoin</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['btc']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['eth'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=ethereum"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/ethereum.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">Ethereum</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['eth']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['xrp'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=ripple"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/ripple.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">XRP</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['xrp']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['bch'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=bitcoin-cash"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/bitcoin-cash.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">Bitcoin Cash</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['bch']?>
        </td>
      </tr>

      <?php
      
          if ($coin_data['price_24h']['fil'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=fil"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/filecoin.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">FIL</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['fil']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['ltc'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=litecoin"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/litecoin.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">Litecoin</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['ltc']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['bnb'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=binancecoin"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/binancecoin.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">Binance Coin</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['bnb']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['usdt'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=tether"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/tether.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">Tether</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['usdt']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['trx'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=tron"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/tron.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">TRON</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['trx']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['xlm'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=stellar"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/stellar.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">Stellar</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['xlm']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['ada'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=cardano"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/cardano.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">Cardano</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['ada']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['xmr'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=monero"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/monero.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">Monero</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['xmr']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['okb'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=okb"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/okb.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">OKB</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['okb']?>
        </td>
      </tr>

      <?php
          if ($coin_data['price_24h']['pepe'] < 0) {
              $change_rate = 'decrease';
          } else {
              $change_rate = 'increase';
          } ?>
      <tr>
        <td><a
            href="<?=bloginfo('home')?>/<?=$bp_options['page_coin']?>/?c=pepe"
            style="color: #3b72de !important;"><img src="https://static.doviz.com/images/coin/pepe.png"
              style="color: #3b72de !important;" width="18px" height="18px" alt="">PEPE</a></td>
        <td style="font-weight: normal;"><i
            class="<?=$change_rate?>"></i> <?=$coin_data['current_price']['pepe']?>
        </td>
      </tr>

    </tbody>
  </table>
</div>
<!-- #Widget -->

<?php
    }
}
