<?php
error_reporting(0);
CSF::createWidget('anasayfa_banka_kredi', array(
    'title' => 'Anasayfa (Üst) Banka Kredi',
    'classname' => 'anasayfa-banka-kredi',
    'description' => 'Anasayfa (Üst) Banka Kredi - BirFinans',
    'fields' => array(
        array(
            'id' => 'banka_repeater',
            'type' => 'repeater',
            'title' => 'Bankalar',
            'fields' => array(

                array(
                    'id' => 'kredi_fiyat',
                    'type' => 'text',
                    'title' => 'Fiyat',
                    'default' => '10.000'
                ),

                array(
                    'id' => 'banka',
                    'type' => 'select',
                    'title' => 'Banka',
                    'options' => array(
                        'garanti-bankasi' => 'Garanti',
                        'yapi-kredi-bankasi' => 'Yapı Kredi',
                        'icbc-bank' => 'ICBC',
                        'akbank' => 'Akbank',
                        'ing-bank' => 'ING Bank',
                        'turkiye-is-bankasi' => 'İş Bankası',
                        'teb' => 'CepteTeb',
                        'turkiye-finans' => 'Türkiye Finans',
                        'denizbank' => 'DenizBank',
                        'finansbank' => 'FinansBank',
                        'ziraat-bankasi' => 'Ziraat Bankası',
                        'halkbank' => 'HalkBank',
                    ),
                ),

                array(
                    'id' => 'kredi_tipi',
                    'type' => 'select',
                    'title' => 'Kredi Tipi',
                    'options' => array(
                        'ihtiyac-kredisi' => 'İhtiyaç Kredisi',
                        'konut-kredisi' => 'Konut Kredisi',
                        'tasit-kredisi' => 'Taşıt Kredisi',
                        'kobi-kredisi' => 'Kobi Kredisi',
                    ),
                ),

                array(
                    'id' => 'kredi_vade',
                    'type' => 'text',
                    'title' => 'Vade (Ay)'
                ),

                array(
                    'id' => 'devam_linki',
                    'type' => 'text',
                    'title' => 'Devam Linki'
                ),

                array(
                    'id' => 'detay_linki',
                    'type' => 'text',
                    'title' => 'Detay Linki'
                ),


            ),
        ),
    ),

));

if (!function_exists('anasayfa_banka_kredi')) {
    function anasayfa_banka_kredi($args, $instance)
    { ?>
        <!-- Widget -->
        <div class="clear"></div>
        <div class="bankaCalculators">
            <?php foreach ($instance['banka_repeater'] as $key => $val):

                $banka_resim = str_replace(
                    array("yapi-kredi-bankasi", "icbc-bank", "turkiye-is-bankasi", "teb","finansbank"),
                    array("yapi-kredi", "icbc-bank-turkey", "is-bankasi", "cepteteb","qnb-finansbank"),
                    $val['banka']
                );

                $val['kredi_fiyat'] = str_replace(".", null, $val['kredi_fiyat']);

                $kredi_source = get_url_curl($ad = "https://www.hangikredi.com/kredi/" . $val['kredi_tipi'] . "/" . $val['banka'] . "?amount=" . $val['kredi_fiyat'] . "&maturity=" . $val['kredi_vade']);
                
                preg_match_all('@aylikTaksit="(.*?)"@si', $kredi_source, $monthly);
                preg_match_all('@toplam="(.*?)"@si', $kredi_source, $toplam);
                preg_match_all('@faizOrani="(.*?)"@si', $kredi_source, $faizOrani);

                if (empty($monthly[1][0])) {
                    preg_match_all('@"MonthlyInstallment": (.*?),@si', $kredi_source, $monthly);
                    preg_match_all('@"TotalAmount": (.*?),@si', $kredi_source, $toplam);
                    preg_match_all('@"InterestRate": (.*?),@si', $kredi_source, $faizOrani);
                }

                if (empty($monthly[1][0])) {
                    preg_match_all('@"metric2": "(.*?)",@si', $kredi_source, $monthly);
                    preg_match_all('@"dimension12": "(.*?)",@si', $kredi_source, $toplam);
                    preg_match_all('@"metric3": "(.*?)",@si', $kredi_source, $faizOrani);
                }

                if (empty($monthly[1][0])) {
                    preg_match_all('@<p class="product-list-card_info__Na8Zr product-list-card_info__emphatic__hrdln" data-testid="monthlyInstallment">(.*?)<span class="text-xxs leading-3">@si', $kredi_source, $monthly);
                    preg_match_all('@</div></div><p class="product-list-card_info__Na8Zr order-2 md:order-3" data-testid="totalAmount">(.*?)<span>@si', $kredi_source, $toplam);
                    preg_match_all('@<p class="product-list-card_info__Na8Zr order-2 md:order-3">%(.*?)</p></div>@si', $kredi_source, $faizOrani);
                }

                if (!empty($monthly[1][0])) {
                    $kredi['is_active'] = true;
                }
                
                $kredi['monthly'] = str_replace("TL", null, $monthly[1][0]);
                $kredi['interest'] = $faizOrani[1][0];
                $kredi['total'] =$toplam[1][0];

                $kredi_name = str_replace(array("ihtiyac-kredisi", "tasit-kredisi", "kobi-kredisi", "konut-kredisi"), array("İhtiyaç Kredisi", "Taşıt Kredisi", "Kobi Kredisi", "Konut Kredisi"), $val['kredi_tipi']);

                ?>
                <div class="bankCalc">
                    <div class="bankHead">
                        <div class="bankLogo"><span><img
                                        src="<?php bloginfo("template_directory") ?>/img/banka/<?= $banka_resim ?>.png"
                                        alt=""></span><?= $kredi_name ?></div>
                        <?php if (!empty($val['detay_linki'])) { ?>
                            <a href="<?= $val['detay_linki'] ?>" rel="nofollow" target="_blank" class="detay">Detay</a>
                        <?php } ?>
                    </div>
                    <div class="bankContent">
                        <form action="">
                            <div class="selectLine">
                                <span>Tutar </span>
                                <div class="select-wrapper">
                                    <input type="text" value="<?= $val['kredi_fiyat'] ?>"
                                           class="kredi_fiyat_<?= $key ?> number"
                                           onkeyup="kredi_hesapla(<?= $key ?>);"/>
                                </div>
                            </div>
                            <div class="selectLine">
                                <span>Vade </span>
                                <div class="select-wrapper">
                                    <input type="text" value="<?= $val['kredi_vade'] ?>" class="kredi_vade_<?= $key ?>"
                                           onkeyup="kredi_hesapla(<?= $key ?>);"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <input type="hidden" class="banka_<?= $key ?>" value="<?= $val['banka'] ?>"/>
                    <input type="hidden" class="type_<?= $key ?>" value="<?= $val['kredi_tipi'] ?>"/>
                    <div class="bankFoot">
                        <ul>
                            <li>Aylık Taksit: <span
                                        class="aylik_taksit_<?= $key ?>"><?= $kredi['monthly'] ?><?php if ($kredi['monthly'] != "Kredi Bulunamadı") {
                    echo 'TL';
                } ?></span></li>
                            <li>Faiz: <span
                                        class="faiz_<?= $key ?>"><?php if ($kredi['monthly'] != "Kredi Bulunamadı") {
                    echo '%';
                } ?><?= $kredi['interest'] ?></span></li>
                            <li>Toplam Tutar: <span
                                        class="toplam_tutar_<?= $key ?>"><?= $kredi['total'] ?><?php if ($kredi['monthly'] != "Kredi Bulunamadı") {
                    echo 'TL';
                } ?></span></li>
                        </ul>
                        <a href="<?= $val['devam_linki'] ?>" target="_blank" class="cont" rel="nofollow">Devam Et</a>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
        <?php if (!wp_is_mobile()) {
                    ?>
        <div class="bankaCalculatorsBottomMargin"></div><?php
                } ?>


        <script>
            let timeout;
            function kredi_hesapla(num) {
                clearTimeout(timeout); // Önceki zamanlayıcıyı sıfırla

                timeout = setTimeout(function () {
                    var kredi_fiyat = $(".kredi_fiyat_" + num).val().replace(".", "");
                    var kredi_vade = $(".kredi_vade_" + num).val();
                    var kredi_type = $(".type_" + num).val();
                    var kredi_banka = $(".banka_" + num).val();
                    var json;
                    $(".aylik_taksit_" + num).html("Yükleniyor...");
                    $(".faiz_" + num).html("Yükleniyor...");
                    $(".toplam_tutar_" + num).html("Yükleniyor...");

                    $.get("<?php bloginfo('template_directory') ?>/api/banka_kredi.php?banka=" + kredi_banka + "&kredi_fiyat=" + kredi_fiyat + "&kredi_vade=" + kredi_vade + "&type=" + kredi_type, function (data) {
                        json = jQuery.parseJSON(data);
                        if (json['is_active'] === true) {
                            $(".aylik_taksit_" + num).html(json['monthly'] + " TL");
                            $(".faiz_" + num).html("%" + json['interest']);
                            $(".toplam_tutar_" + num).html(json['total'] + " TL");
                        } else {
                            $(".aylik_taksit_" + num).html("Kredi bulunamadı");
                            $(".faiz_" + num).html("Kredi bulunamadı");
                            $(".toplam_tutar_" + num).html("Kredi bulunamadı");
                        }
                    });
                }, 400); // 1 saniye (1000ms) bekleme süresi
            }
        </script>
        <!-- #Widget -->

        <?php
    }
}

?>
