<?php global $currency_data, $coin_data, $bp_options;
$skip_currency['csk'] = true;
$skip_currency['ars'] = true;
$skip_currency['aed'] = true;
$skip_currency['kwd'] = true;
$skip_currency['sar'] = true;
$skip_currency['bhd'] = true;
?>
<!-- Currency Showcase -->
<div class="currencyShowcase half rightBox">
    <table class="currencyTable gold kriptolar">
        <tr class="head">
            <th>Kripto Para</th>
            <th>
                <input type="hidden" value="try" class="default_currency" />
                <select class="crypto_currency_val" onchange="cryptoChangeCurrency('<?= admin_url('admin-ajax.php') ?>');">
                    <option value="try">Türk Lirası</option>
                    <?php foreach (array_unique($currency_data['full_name']) as $key => $value) : if ($skip_currency[$key] == true) : continue;
                        endif; ?>
                        <option value="<?= $key ?>"><?= $value ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </th>
        </tr>
        <?php
        if ($coin_data['price_24h']['btc'] < 0) {
            $change_rate = 'decrease';
        } else {
            $change_rate = 'increase';
        }
        ?>
        <tr>
            <td><a href="<?= bloginfo('home') ?>/<?= $bp_options['page_coin'] ?>/?c=bitcoin" style="color: #3b72de !important;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/btc.svg" style="color: #3b72de !important;" width="18px" height="18px" alt="">Bitcoin</a></td>
            <td style="font-weight: normal;"><i class="<?= $change_rate ?>"></i> <em class="crypto_price_BTC"><?= $coin_data['current_price']['btc'] ?>,00</em>
            </td>
        </tr>

        <?php
        if ($coin_data['price_24h']['eth'] < 0) {
            $change_rate = 'decrease';
        } else {
            $change_rate = 'increase';
        }
        ?>
        <tr>
            <td><a href="<?= bloginfo('home') ?>/<?= $bp_options['page_coin'] ?>/?c=ethereum" style="color: #3b72de !important;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/eth.svg" style="color: #3b72de !important;" width="18px" height="18px" alt="">Ethereum</a></td>
            <td style="font-weight: normal;"><i class="<?= $change_rate ?>"></i> <em class="crypto_price_ETH"><?= $coin_data['current_price']['eth'] ?></em>
            </td>
        </tr>
        <?php
        if ($coin_data['price_24h']['xrp'] < 0) {
            $change_rate = 'decrease';
        } else {
            $change_rate = 'increase';
        }
        ?>

        <tr>
            <td><a href="<?= bloginfo('home') ?>/<?= $bp_options['page_coin'] ?>/?c=ripple" style="color: #3b72de !important;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/xrp.svg" style="color: #3b72de !important;" width="18px" height="18px" alt="">XRP</a></td>
            <td style="font-weight: normal;"><i class="<?= $change_rate ?>"></i> <em class="crypto_price_XRP"><?= number_format($coin_data['current_price']['xrp'], 2, ',', '.') ?></em>
            </td>
        </tr>
        <?php
        if ($coin_data['price_24h']['bch'] < 0) {
            $change_rate = 'decrease';
        } else {
            $change_rate = 'increase';
        }
        ?>
        <tr>
            <td><a href="<?= bloginfo('home') ?>/<?= $bp_options['page_coin'] ?>/?c=bitcoin-cash" style="color: #3b72de !important;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/bch.svg" style="color: #3b72de !important;" width="18px" height="18px" alt="">Bitcoin Cash</a></td>
            <td style="font-weight: normal;"><i class="<?= $change_rate ?>"></i> <em class="crypto_price_BCH"><?= $coin_data['current_price']['bch'] ?></em>
            </td>
        </tr>
        <?php
        if ($coin_data['price_24h']['eos'] < 0) {
            $change_rate = 'decrease';
        } else {
            $change_rate = 'increase';
        }
        ?>
        <tr>
            <td><a href="<?= bloginfo('home') ?>/<?= $bp_options['page_coin'] ?>/?c=eos" style="color: #3b72de !important;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/eos.svg" style="color: #3b72de !important;" width="18px" height="18px" alt="">EOS</a></td>
            <td style="font-weight: normal;"><i class="<?= $change_rate ?>"></i> <em class="crypto_price_EOS"><?= number_format($coin_data['current_price']['eos'], 2, ',', '.') ?></em>
            </td>
        </tr>
        <?php
        if ($coin_data['price_24h']['ltc'] < 0) {
            $change_rate = 'decrease';
        } else {
            $change_rate = 'increase';
        }
        ?>
        <tr>
            <td><a href="<?= bloginfo('home') ?>/<?= $bp_options['page_coin'] ?>/?c=litecoin" style="color: #3b72de !important;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/ltc.svg" style="color: #3b72de !important;" width="18px" height="18px" alt="">Litecoin</a></td>
            <td style="font-weight: normal;"><i class="<?= $change_rate ?>"></i> <em class="crypto_price_LTC"><?= str_replace('.', ',', $coin_data['current_price']['ltc']) ?></em>
            </td>
        </tr>
    </table>
</div>
<!-- //Currency Showcase -->
