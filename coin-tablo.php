<?php
/*
  Template Name: Coin Tablo
*/

get_header();

$kaynak = get_url_curl('https://www.doviz.com/kripto-paralar');

preg_match_all('@<td>                <a href="https://www.doviz.com/kripto-paralar/(.*?)">                  <img src="https://static.doviz.com/images/coin/(.*?).png" width="30" height="30" alt="(.*?)" loading="lazy" class="stock-icon">                  <div class="currency-details">                    <div>(.*?)</div>                    <div class="cname">(.*?)</div>                  </div>                </a>              </td>              <td class="text-bold">(.*?)</td>              <td>(.*?)</td>              <td>(.*?)</td>              <td>(.*?)</td>              <td class="text-bold color-(.*?)">                (.*?)              </td>              <td class="time">(.*?)</td>            </tr>@si', $kaynak, $coin_data_table);

?>
<style>
    .icon-data {
        background-image: url(<?= get_bloginfo('template_url') . '/img/cryptoIcons.png' ?>);
        background-repeat: no-repeat;
        display: inline-flex;
        vertical-align: text-top;
        width: 16px !important;
        height: 16px !important;
        background-size: 669px 638px;
        display: inline-block;
        margin-right: 10px;
        margin-top: 14px;
    }

    .s-s-bitcoin {
        background-position: -605px -144px;
    }

    .mr-2,
    .mx-2 {
        margin-right: .5rem !important;
    }
</style>
<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/icons.css" />
<!-- Site Wrapper -->
<div class="site-wrapper">

    <!-- Content -->
    <section class="content home">
        <div class="container-wrap">

            <!-- WideBar -->
            <div class="widebar floatLeft">

                <div class="singleWrapper">

                    <!-- BreadCrumb -->
                    <div class="breadcrumb">
                        <ul class="block">
                            <li><a href="<?php bloginfo('home') ?>">Anasayfa<i>/</i></a>
                            </li>
                            <li class="post bg"><span><?php the_title() ?></span></li>
                        </ul>
                    </div>

                    <h1 class="postTitle"><?php the_title() ?>
                    </h1>


                    <style>
                        .currencyTable tr th {
                            font-weight: 500;
                        }

                        .currencyTable tr td b {
                            color: #3b72de !important;
                        }

                        .currencyTable tr td a {
                            color: #3b72de !important;
                        }
                    </style>

                    <div class="singleContent block hasImage">

                        <!-- Main Content -->
                        <div class="mainContent">

                            <!-- Main -->
                            <div class="main">

                                <!-- widget -->
                                <div class="widget">
                                    <!-- Currency Showcase -->
                                    <div class="currencyShowcase fullShowcase mobileBottomNo">
                                        <?php if (wp_is_mobile()) { ?>
                                            <table class="currencyTable currencyFullTable">
                                                <tr>
                                                    <th style="width: 70% !important;display: inline-block;">Birim Adı
                                                    </th>
                                                    <th class="o" style="width: 20%;display: inline-block;padding-left: 0;">
                                                        Fiyat
                                                    </th>
                                                </tr>
                                                <?php
                                                foreach ($coin_data_table[1] as $key => $val) {
                                                    $coin_data_table[10][$key] = str_replace('%', '', $coin_data_table[10][$key]);
                                                    if (empty($coin_data_table[3][$key])) {
                                                        continue;
                                                    }
                                                    if (str_replace([',', '%'], ['.', ''], $coin_data_table[11][$key]) > 0) {
                                                        $crease_status = 'increase';
                                                        $color = '#40bc9a';
                                                    } else {
                                                        $crease_status = 'decrease';
                                                        $color = '#fc4b67';
                                                    } ?>
                                                    <tr class="alt ennson">
                                                        <td style="width: 70% !important;display: inline-block;">
                                                            <img src="https://static.doviz.com/images/coin/<?= $coin_data_table[2][$key] ?>.png" width="18px" height="18px" />
                                                            <a href="<?= bloginfo('home') ?>/<?= $bp_options['page_coin'] ?>/?c=<?= $coin_data_table[2][$key] ?>"><b style="position: relative;"><?= ($coin_data_table[3][$key]) ?></b></a>
                                                        </td>
                                                        <td style="width: 20%;display: inline-block;padding-left:0px;">
                                                            <i class="<?= $crease_status ?>"></i>
                                                            <span><?= $coin_data_table[6][$key] ?></span>
                                                        </td>
                                                    </tr>
                                                <?php
                                                } ?>
                                            </table>
                                        <?php } else { ?>
                                            <table class="currencyTable currencyFullTable">
                                                <tr>
                                                    <th>Birim Adı</th>
                                                    <th style="position: relative; left: 3px;">Fiyat</th>
                                                    <th style="position: relative;">Değişim (24 s.)</th>
                                                    <th>Saat</th>
                                                </tr>
                                                <?php
                                                foreach ($coin_data_table[1] as $key => $val) {
                                                    $coin_data_table[5][$key] = str_replace('%', '', $coin_data_table[5][$key]);
                                                    if (empty($coin_data_table[3][$key])) {
                                                        continue;
                                                    }
                                                    if (str_replace([',', '%'], ['.', ''], $coin_data_table[11][$key]) > 0) {
                                                        $crease_status = 'increase';
                                                        $color = '#40bc9a';
                                                    } else {
                                                        $crease_status = 'decrease';
                                                        $color = '#fc4b67';
                                                    } ?>
                                                    <tr>
                                                        <td>
                                                            <img src="https://static.doviz.com/images/coin/<?= $coin_data_table[2][$key] ?>.png" width="18px" height="18px" />
                                                            <a href="<?= bloginfo('home') ?>/<?= $bp_options['page_coin'] ?>/?c=<?= $coin_data_table[2][$key] ?>"><b><?= ($coin_data_table[3][$key]) ?></b></a>
                                                        </td>
                                                        <td style="color: <?= $color ?>;">
                                                            <i class="<?= $crease_status ?>"></i>
                                                            <?= $coin_data_table[6][$key] ?>
                                                        </td>
                                                        <td style="font-weight: normal"><span class="subtract <?= $crease_status ?>"><?= $coin_data_table[11][$key] ?></span>
                                                        </td>
                                                        <td style="padding: 0 15px;font-weight: normal;"><?= $coin_data_table[12][$key] ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                } ?>
                                            </table>
                                        <?php
                                        } ?>

                                    </div>
                                    <!-- //Currency Showcase -->
                                </div>
                                <!-- //widget -->

                            </div>


                        </div>
                        <!-- #MainBar -->


                    </div>

                </div>

            </div>

            <?php if (!wp_is_mobile()) {
                                            ?>
                <div class="sidebar floatRight">
                    <?php dynamic_sidebar('Sidebar (Kriptoparalar)'); ?>
                </div>
            <?php
                                        } ?>


        </div>

        <?php dynamic_sidebar('Sayfa Alt (Kriptoparalar)'); ?>
    </section>
    <!-- Content -->
    <div class="clear"></div>

</div>
<!-- #Site Wrapper -->
<?php get_footer();
