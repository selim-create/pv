<?php global $altin_data, $bp_options; ?>
<!-- Currency Showcase -->
<div class="currencyShowcase altinkurlari half centerBox">
    <table class="currencyTable gold">
        <tr>
            <th>Altın</th>
            <th>Alış</th>
            <th>Satış</th>
        </tr>

        <?php
        if (wp_is_mobile()) {
            if (str_replace(",", ".", $altin_data['altin_rate']['ons-altin-usd']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['ons-altin-usd'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Ons</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['ons-altin-usd'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['ons-altin-usd'], 0, -1) ?></td>
            </tr>
            <?php
            if (str_replace(",", ".", $altin_data['altin_rate']['gram-altin']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['gram-altin'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Gram</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['gram-altin'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['gram-altin'], 0, -1) ?></td>
            </tr>
            <?php
            if (str_replace(",", ".", $altin_data['altin_rate']['ceyrek-altin']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['ceyrek-altin'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Çeyrek</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['ceyrek-altin'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['ceyrek-altin'], 0, -1) ?></td>
            </tr>
            <?php
            if (str_replace(",", ".", $altin_data['altin_rate']['yarim-altin']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['yarim-altin'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Ziynet 2,5</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['yarim-altin'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['yarim-altin'], 0, -1) ?></td>
            </tr>
            <?php
            if (str_replace(",", ".", $altin_data['altin_rate']['ziynet-altin']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['ziynet-altin'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Tam</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['ziynet-altin'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['ziynet-altin'], 0, -1) ?></td>
            </tr>
            <?php
            if (str_replace(",", ".", $altin_data['altin_rate']['cumhuriyet-altini']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['cumhuriyet-altin'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Cumhu.</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i><?= substr($altin_data['altin_price_buying']['cumhuriyet-altini'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['cumhuriyet-altini'], 0, -1) ?></td>
            </tr>
        <?php
        } else {
            ?>

            <?php
            if (str_replace(",", ".", $altin_data['altin_rate']['ons-altin-usd']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['ons-altin-usd'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Ons</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['ons-altin-usd'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['ons-altin-usd'], 0, -1) ?></td>
            </tr>

            <?php
            $page_id = get_page_by_path($bp_options['page_altin'])->ID;
            get_last_chat_message($page_id, 'altin-ons-fiyati', 'a'); ?>
            <?php
            if (str_replace(",", ".", $altin_data['altin_rate']['gram-altin']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['gram-altin'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Gram</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['gram-altin'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['gram-altin'], 0, -1) ?></td>
            </tr>
            <?php
            get_last_chat_message($page_id, 'gram-altin-fiyati', 'a');
            if (str_replace(",", ".", $altin_data['altin_rate']['ceyrek-altin']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['ceyrek-altin'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Çeyrek</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['ceyrek-altin'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['ceyrek-altin'], 0, -1) ?></td>
            </tr>
            <?php
            get_last_chat_message($page_id, 'ceyrek-altin-fiyati', 'a');
            if (str_replace(",", ".", $altin_data['altin_rate']['yarim-altin']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['yarim-altin'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Yarım</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['yarim-altin'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['yarim-altin'], 0, -1) ?></td>
            </tr>
            <?php
            get_last_chat_message($page_id, 'yarim-altin-fiyati', 'a');
            if (str_replace(",", ".", $altin_data['altin_rate']['ziynet-altin']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['ziynet-altin'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Ziynet 2,5</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i> <?= substr($altin_data['altin_price_buying']['ziynet-altin'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['ziynet-altin'], 0, -1) ?></td>
            </tr>
            <?php
            if (str_replace(",", ".", $altin_data['altin_rate']['cumhuriyet-altini']) > 0) {
                $crease_status = "increase";
            } else {
                $crease_status = "decrease";
            } ?>
            <tr>
                <td><a href="<?php bloginfo("home") ?>/<?= $bp_options['page_altin'] ?>/?a=<?= $altin_data['altin_key']['cumhuriyet-altini'] ?>" style="color: #3b72de;white-space:nowrap"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt="">Cumhu.</a></td>
                <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i><?= substr($altin_data['altin_price_buying']['cumhuriyet-altini'], 0, -1) ?></td>
                <td style="font-weight: normal;"><?= substr($altin_data['altin_price_selling']['cumhuriyet-altini'], 0, -1) ?></td>
            </tr>
        <?php
        } ?>
    </table>
</div>
<!-- //Currency Showcase -->
