<?php
CSF::createWidget('anasayfa_ekonomik_takvim', array(
    'title' => 'Anasayfa Ekonomik Takvim',
    'classname' => 'anasayfa-ekonomik-takvim'
));
if (!function_exists('anasayfa_ekonomik_takvim')) {
    function anasayfa_ekonomik_takvim($args, $instance)
    {
        $kaynak = get_url_curl("https://finans.mynet.com/api/ekonomiktakvim/events/yesterday");
        $dataJson = json_decode($kaynak, true); ?>
        <div class="currencyShowcase fullShowcase mobileBottomNo">
            <?php if (wp_is_mobile()) { ?>
                <table class="currencyTable currencyFullTable" style="overflow: hidden;">
                    <tr>
                        <th style="text-align: left;padding-left: 10px;float: left;width: 20%;">
                            Ülke
                        </th>
                        <th style="text-align: center;display: block;padding-left: 15px;float: left;width: 70%;">
                            Olay
                        </th>
                    </tr>
                    <?php foreach ($dataJson['events'] as $key => $val) :

                        $date_clean = ($val['d'] / 1000) + 3600 * 3;

                        $data_date = date_i18n("d F", $val['d']);
                        $current_date = date_i18n("d F", time() + (3600));
                        if (!empty($_GET['date'])) {
                            if ($_GET['date'] == "dun") {
                                $current_time = time() + (3600);

                                if (date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600)) && date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() - (3600 * 24))) {
                                    continue;
                                }
                            } elseif ($_GET['date'] == "bugun") {
                                $current_time = time() + (3600);
                                $date_clean = ($val['d'] / 1000) + 3600 * 3;
                                if (date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600))) {
                                    continue;
                                }
                            } elseif ($_GET['date'] == "yarin") {
                                if (date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 24))) {
                                    continue;
                                }
                            } elseif ($_GET['date'] == "1-hafta") {
                                if (
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 24)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 48)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 72)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 96)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 120)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 144)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 168))

                                ) {
                                    continue;
                                }
                            } elseif ($_GET['date'] == "1-hafta") {
                            }
                        } else {
                            $current_time = time() + (3600);

                            if (date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600)) && date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() - (3600 * 24))) {
                                continue;
                            }
                        }


                        if ($val['did'] == 0) {
                            $val['did'] = "-";
                        }
                        $star_area = "";
                        for ($i = 0; $i < $val['i']; $i++) {
                            $star_area .= "&#11089;";
                        }

                    ?>
                        <tr style="width: 100%;display: block;float: right;z-index: 1;">

                            <td style="width: 20%;font-weight: 500;padding-left: 10px;text-align: left;float:left;white-space: nowrap;"><?= $val['c'] ?></td>
                            <td style="width: 70%;font-weight: normal;line-height: 43px;height: 43px;padding-bottom: 10px;white-space: break-spaces;overflow: hidden;text-align: left;float: right;width: 70%;"><?= $val['e'] ?></td>

                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php } else { ?>
                <table class="currencyTable currencyFullTable">
                    <tr>
                        <th style="text-align: left;">Tarih</th>
                        <th style="padding-left: 0px;text-align: left;">Ülke</th>
                        <th style="text-align: center;">Önem</th>
                        <th style="text-align: left;">Olay</th>
                        <th style="text-align: center;">Beklenti</th>
                        <th style="text-align: center;">Gerçekleşen</th>
                        <th style="text-align: center;">Önceki</th>
                    </tr>
                    <?php foreach ($dataJson['events'] as $key => $val) :
                        $date_clean = ($val['d'] / 1000) + 3600 * 3;

                        $data_date = date_i18n("d F", $val['d']);
                        $current_date = date_i18n("d F", time() + (3600));
                        if (!empty($_GET['date'])) {
                            if ($_GET['date'] == "dun") {
                                $current_time = time() + (3600);

                                if (date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600)) && date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() - (3600 * 24))) {
                                    continue;
                                }
                            } elseif ($_GET['date'] == "bugun") {
                                $current_time = time() + (3600);
                                $date_clean = ($val['d'] / 1000) + 3600 * 3;
                                if (date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600))) {
                                    continue;
                                }
                            } elseif ($_GET['date'] == "yarin") {
                                if (date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 24))) {
                                    continue;
                                }
                            } elseif ($_GET['date'] == "1-hafta") {
                                if (
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 24)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 48)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 72)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 96)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 120)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 144)) &&
                                    date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600 * 168))

                                ) {
                                    continue;
                                }
                            } elseif ($_GET['date'] == "1-hafta") {
                            }
                        } else {
                            $current_time = time() + (3600);

                            if (date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() + (3600)) && date_i18n("d F Y", $date_clean) != date_i18n("d F Y", time() - (3600 * 24))) {
                                continue;
                            }
                        }


                        if ($val['did'] == 0) {
                            $val['did'] = "-";
                        }
                        $star_area = "";
                        for ($i = 0; $i < $val['i']; $i++) {
                            $star_area .= "&#11089;";
                        } ?>
                        <tr>
                            <td style="font-weight: 500;width: 121px;text-align: left;"><?= date_i18n("d F", $date_clean) ?></td>
                            <td style="font-weight: 500;padding-left: 0px;width: 100px;text-align: left;"><?= $val['c'] ?></td>
                            <td style="font-weight: normal;text-align: center;font-size: 23px; color: #fbb916;"><?= $star_area ?></td>
                            <td style="font-weight: normal;line-height: 21px;padding-bottom: 10px;text-align: center;"><?= $val['e'] ?></td>
                            <td style="font-weight: normal;text-align: center;"><?= $val['did'] ?></td>
                            <td style="font-weight: normal;text-align: center;"><?= $val['a'] ?></td>
                            <td style="font-weight: normal;text-align: center;"><?= $val['p'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php
            } ?>
        </div>
<?php
    }
}
