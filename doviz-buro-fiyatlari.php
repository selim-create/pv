<?php
/*
  Template Name: Döviz Bürosu Fiyatları
*/

get_header();
$kaynak = get_url_curl("https://finans.mynet.com/doviz/dovizburosufiyatlari/");
preg_match_all('@<tbody class="tbody-type-default">(.*?)</tbody>@si', $kaynak, $table);

preg_match_all('@<strong class="mr-4">(.*?)</strong>@si', $table[1][0], $name);
preg_match_all('@<tr>(.*?)</tr>@si', $table[1][0], $value_data);

?>
<style>
    .currencyTable tr th{
        font-weight: 500;
    }
    .currencyTable tr td b{
        color: #3b72de !important;
    }
    .dateTable{    display: block;
        height: 35px;margin-bottom: 8px;}
    .dateTable ul { margin: 0 auto; }
    .dateTable ul li { cursor: pointer; float: left; margin-right: 20px; }
    .dateTable ul li:last-child { margin-right: 0px; }
    .dateTable ul li a { display: block; font-size: 13px; font-weight: 700; color: rgba(36,36,36,.4); text-transform: Uppercase; margin-top: 12px; position: relative; }
    .dateTable ul li.active a { color: #242424; }
    .dateTable ul li.active a:after { position: Absolute; content: ""; bottom: -10px; left: 0; right: 0; width: 100%; height: 2px;    background: #fab915; }
    .loadingFaiz{text-align: center;font-size: 14px;}
</style>
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
                            <li><a href="<?php bloginfo('home')?>">Anasayfa<i>/</i></a></li>
                            <li class="post bg"><span><?php the_title() ?></span></li>
                        </ul>
                    </div>

                    <h1 class="postTitle"><?php the_title() ?></h1>



                    <div class="singleContent block hasImage">

                        <!-- Main Content -->
                        <div class="mainContent">

                            <!-- Main -->
                            <div class="main">

                                <!-- widget -->
                                <div class="widget">
                                    <!-- Currency Showcase -->
                                    <div class="currencyShowcase fullShowcase mobileBottomNo">

                                        <table class="currencyTable currencyFullTable">
                                            <?php if(wp_is_mobile()){ ?>
                                                <tr style="width: 100%;float:left;">
                                                    <th style="text-align: left;float:left;width: 80%;">İsim</th>
                                                    <th style="padding-left: 0px;text-align: left;display: block;float:left;width: 20%;">Alış	</th>
                                                </tr>
                                            <?php }else{
                                                ?>
                                                <tr>
                                                    <th style="text-align: left;">İsim</th>
                                                    <th style="padding-left: 0px;text-align: left;">Alış	</th>
                                                    <th style="padding-left: 0px;text-align: left;">Satış</th>
                                                    <th style="padding-left: 0px;text-align: left;">% Fark	</th>
                                                    <th style="padding-left: 0px;text-align: left;">Tarih</th>
                                                </tr>
                                                <?php
                                            }?>
                                            <?php foreach($name[1] as $key=>$val):
                                                preg_match_all('@<td class="text-center">(.*?)</td>@si', $value_data[1][$key], $val_data);
                                                if(wp_is_mobile()){
                                                    ?>
                                                    <tr style="width: 100%; float:left;">
                                                        <td style="font-weight: 500;width: 75%;text-align: left;float:left;display: block;overflow: hidden;white-space: nowrap;padding-right: 10px;margin-right: 5%;"><?=$name[1][$key]?></td>
                                                        <td style="font-weight: 500;padding-left: 0px;width: 20%;text-align: left;float:left;padding: 0;display: block;"><?=$val_data[1][1]?></td>
                                                    </tr>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <tr>
                                                        <td style="font-weight: 500;width: 240px;text-align: left;"><?=$name[1][$key]?></td>
                                                        <td style="font-weight: 500;padding-left: 0px;width: 60px;text-align: left;"><?=$val_data[1][1]?></td>
                                                        <td style="font-weight: 500;padding-left: 0px;width: 60px;text-align: left;"><?=$val_data[1][2]?></td>
                                                        <td style="font-weight: 500;padding-left: 0px;width: 60px;text-align: left;"><?=$val_data[1][3]?></td>
                                                        <td style="font-weight: 500;padding-left: 0px;width: 60px;text-align: left;"><?=$val_data[1][4]?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            endforeach; ?>
                                        </table>
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
            <?php if(!wp_is_mobile()){?>
                <div class="sidebar floatRight">
                    <!-- Sidebar -->
                    <?php dynamic_sidebar("Sidebar (Döviz Kurları)"); ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- Content -->
    <div class="clear"></div>

</div>

<!-- #Site Wrapper -->
<?php get_footer(); ?>
