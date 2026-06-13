<?php global $currency_data, $bp_options; ?>
<div class="currencyShowcase dovizkurlari">
    <table class="currencyTable">
        <tr>
            <th>Döviz</th>
            <th style="padding-left: 42px;">Alış</th>
            <th style="padding-left: 36px;">Satış</th>
            <th style="padding-left: 31px;">Fark</th>
        </tr>
        <tr>
            <?php

            if (str_replace(",", ".", $currency_data['change_rate']['usd']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            }
            ?>
            <td>
                <a href="<?= bloginfo("home") ?>/<?= $bp_options['page_doviz'] ?>/?c=usd" style="color: #3b72de;white-space:nowrap;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/us.svg" alt="" style="border-radius: 18px;"> <?= $currency_data['full_name']['usd'] ?>
            </td>
            <td style="padding-left: 33px;font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= $currency_data['selling']['usd'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><?= $currency_data['buying']['usd'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><span class="<?= $crease_status ?> subtract">% <?= $currency_data['change_rate']['usd'] ?></span></td>
        </tr>

        <?php
        $page_id = get_page_by_path($bp_options['page_doviz'])->ID;
        get_last_chat_message($page_id, 'usd');
        ?>
        <?php
        if (str_replace(",", ".", $currency_data['change_rate']['eur']) > 0) {
            $crease_status = "increase";
        } else {
            $crease_status = "decrease";
        }
        ?>
        <tr>
            <td><a href="<?= bloginfo("home") ?>/<?= $bp_options['page_doviz'] ?>/?c=eur" style="color: #3b72de;white-space:nowrap;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/eu.svg" alt="" style="border-radius: 18px;"><?= $currency_data['full_name']['eur'] ?></a></td>
            <td style="padding-left: 33px;font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= $currency_data['selling']['eur'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><?= $currency_data['buying']['eur'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><span class="<?= $crease_status ?> subtract">% <?= $currency_data['change_rate']['eur'] ?></span></td>
        </tr>
        <?php
        get_last_chat_message($page_id, 'eur');
        if (str_replace(",", ".", $currency_data['change_rate']['gbp']) > 0) {
            $crease_status = "increase";
        } else {
            $crease_status = "decrease";
        }
        ?>
        <tr>
            <td><a href="<?= bloginfo("home") ?>/<?= $bp_options['page_doviz'] ?>/?c=gbp" style="color: #3b72de;white-space:nowrap;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/gb.svg" alt="" style="border-radius: 18px;"> <?= $currency_data['full_name']['gbp'] ?></a></td>
            <td style="padding-left: 33px;font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= $currency_data['selling']['gbp'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><?= $currency_data['buying']['gbp'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><span class="<?= $crease_status ?> subtract">% <?= $currency_data['change_rate']['gbp'] ?></span></td>
        </tr>
        <?php
        get_last_chat_message($page_id, 'gbp');
        if (str_replace(",", ".", $currency_data['change_rate']['chf']) > 0) {
            $crease_status = "increase";
        } else {
            $crease_status = "decrease";
        }
        ?>
        <tr>
            <td><a href="<?= bloginfo("home") ?>/<?= $bp_options['page_doviz'] ?>/?c=chf" style="color: #3b72de;white-space:nowrap;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/ch.svg" alt="" style="border-radius: 18px;"> <?= $currency_data['full_name']['chf'] ?></a></td>
            <td style="padding-left: 33px;font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= $currency_data['selling']['chf'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><?= $currency_data['buying']['chf'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><span class="<?= $crease_status ?> subtract">% <?= $currency_data['change_rate']['chf'] ?></span></td>
        </tr>
        <?php
        get_last_chat_message($page_id, 'chf');
        if (str_replace(",", ".", $currency_data['change_rate']['cad']) > 0) {
            $crease_status = "increase";
        } else {
            $crease_status = "decrease";
        }
        ?>
        <tr>
            <td><a href="<?= bloginfo("home") ?>/<?= $bp_options['page_doviz'] ?>/?c=cad" style="color: #3b72de;white-space:nowrap;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/ca.svg" alt="" style="border-radius: 18px;"> <?= $currency_data['full_name']['cad'] ?></a></td>
            <td style="padding-left: 33px;font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= $currency_data['selling']['cad'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><?= $currency_data['buying']['cad'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><span class="<?= $crease_status ?> subtract">% <?= $currency_data['change_rate']['cad'] ?></span></td>
        </tr>
        <?php
        get_last_chat_message($page_id, 'cad');
        if (str_replace(",", ".", $currency_data['change_rate']['cny']) > 0) {
            $crease_status = "increase";
        } else {
            $crease_status = "decrease";
        }

        ?>
        <tr>
            <td><a href="<?= bloginfo("home") ?>/<?= $bp_options['page_doviz'] ?>/?c=cny" style="color: #3b72de;white-space:nowrap;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/cn.svg" alt="" style="border-radius: 18px;"> <?= $currency_data['full_name']['cny'] ?></a></td>
            <td style="padding-left: 33px;font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= $currency_data['selling']['cny'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><?= $currency_data['buying']['cny'] ?></td>
            <td style="padding-left: 33px;font-weight: normal;"><span class="<?= $crease_status ?> subtract">% <?= $currency_data['change_rate']['cny'] ?></span></td>
        </tr>
        <?php get_last_chat_message($page_id, 'cny'); ?>
    </table>
</div>
