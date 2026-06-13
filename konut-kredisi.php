<style media="screen">
body footer.footer .footerBottom {
    padding-bottom: 0!important;
}
#site {
  overflow: unset!important;
}
@media only screen and (max-width: 480px) {
footer.footer {
    margin-top: 0;
}
}
</style><?php
/*
  Template Name: Konut Kredisi
*/
global $bp_options;

if (!empty($_GET['type'])) {
    ?>
<script>
    window.location.href = '<?=home_url() . "/" . $bp_options['page_konutkredisi'] . "/" . permalink_bf(str_replace(array("{ay}", "{tutar}"), array($_GET['vade'], str_replace(".", "", $_GET['tutar'])), $bp_options['krediSorgulamaRewrite']))?>';
</script>
<?php
}

$full_url_exp = explode("/", home_url($wp->request));
$full_url = explode("-", $full_url_exp[count($full_url_exp) - 1]);

$parameters['tutar'] = $full_url[2];
$parameters['type'] = "konut";
$parameters['vade'] = $full_url[0];

$_GET['type'] = "konut";
$_GET['vade'] = $parameters['vade'];
$_GET['tutar'] = $parameters['tutar'];

$new_title = str_replace(array('{kredi}', '{vade}', '{tutar}'), array("Konut Kredisi", $parameters['vade'], $parameters['tutar']), $bp_options['page_kredi_seo']) . " - " . get_bloginfo('name');;


function generate_custom_title($title)
{
    global $new_title;
    $title = $new_title;
    return $title;
}

add_filter('pre_get_document_title', 'generate_custom_title', 10);
add_filter('wpseo_title', 'generate_custom_title', 15);

get_header();

include get_template_directory() . '/api/kredi.php';
$json_data = kredi_data($parameters['type'], $parameters['tutar'], $parameters['vade']);
?>

<!-- Site Wrapper -->
<div class="site-wrapper newswp">

    <!-- Content -->
    <section class="content home">

        <h1 class="nkhead"><?= number_format($_GET['tutar'], 0, ",", ".") ?> TL <?= $_GET['vade'] ?> Ay
            Vadeli <?php the_title() ?></h1>

        <div class="nkcont">
            <div class="nkcont-in">
                <?php if (empty($json_data['banka'][0])) {
    ?>
                    <center style="margin-bottom: 20px;"><b>Uygun kredi bulunamadı</b></center><?php
} else { ?>

                    <?php
                    $list_type = $json_data['faiz'];
                    asort($list_type);
                    $i = 0;
                    foreach ($list_type as $key => $data):
                        $faiz_tutari = (float)str_replace(array(".", ","), array("", "."), $json_data['toplam_odeme'][$key]) - str_replace(".", null, $_GET['tutar']);
                        $faiz_tutari = number_format($faiz_tutari, 2, ",", ".");
                        $banka_img = replaceBanka(permalink($json_data['banka'][$key]));
                        if ($i == 0) {
                            $special_class = "ozel";
                        } else {
                            $special_class = "";
                        }
                        ?>

                        <?php if ($special_class == "ozel") { ?>
                        <span>Ayın En Avantajlı Ürünü</span>
                    <?php } ?>

                        <div class="nkcont-li <?= $special_class ?>">
                          <div class="nkcont-li-left">
                            <figure>
                                <?php if ($banka_img == "alj-finans") { ?>
                                    <img src="<?php bloginfo("template_directory"); ?>/img/banka/<?= $banka_img ?>.png"
                                         alt="a">
                                <?php } else { ?>
                                    <img src="<?php bloginfo("template_directory"); ?>/img/banka/<?= $banka_img ?>.svg"
                                         alt="a">
                                <?php } ?>
                            </figure>
                            <span class="nkcont-svg"><b><u></u><?= $json_data['kredi'][$key] ?></b></span>
                          </div>
                            <ul>
                                <li>
                                    <b>Faiz Oranı</b>
                                    <span>%<?= $json_data['faiz'][$key] ?> <i
                                                class="question question22">
        <div class="info">

            <ul>
                <li>Faiz oranı, kredi notunuza göre değişebilir.</li>
            </ul>
        </div>
    </i></span>
                                </li>
                                <li>
                                    <b>Aylık Taksit</b>
                                    <span><?= $json_data['aylik_taksit'][$key] ?> TL</span>
                                </li>
                                <li>
                                    <b>Toplam Ödeme</b>
                                    <span><?= $json_data['toplam_odeme'][$key] ?><i
                                                class="question">
        <div class="info">
            <div class="info-title">Toplam Ödemeye Dahil Olan Ücretler
            </div>
            <ul>
                <li>Kredi Tutarı : <span><?= $_GET['tutar'] ?> TL</span>
                </li>
                <li>Banka Tahsis Ücreti
                    :<span><?= $json_data['tahsis_ucreti'][$key] ?></span>
                </li>
                <li>Faiz Tutarı :<span><?= $faiz_tutari ?> TL</span></li>
                <li>Toplam Ödeme
                    :<span><?= $json_data['toplam_odeme'][$key] ?></span>
                </li>
            </ul>
        </div>
    </i></span>
                                </li>
                            </ul>
                        </div>
                    <?php $i++; endforeach;
                } ?>


                <?php dynamic_sidebar('Sayfa Alt (Kredi)'); ?>
    </section>
    <!-- Content -->
    <div class="clear"></div>
</div>
</div>

<!-- #Site Wrapper -->
<?php
get_footer();
?>
