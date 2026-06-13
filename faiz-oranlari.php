<?php
/*
  Template Name: Faiz Oranları
*/

get_header();

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


                                            <div class="dateTable">
                                                <ul>
                                                    <li class="<?php if(@$_GET['type'] == "try" || empty(@$_GET['type'])) echo "active"; ?>"><a href="<?=home_url("/faiz-oranlari/?type=try")?>">Türk Lirası</a></li>
                                                    <li class="<?php if(@$_GET['type'] == "usd") echo "active";?>"><a href="<?=home_url("/faiz-oranlari/?type=usd")?>">Dolar</a></li>
                                                    <li class="<?php if(@$_GET['type'] == "eur") echo "active";?>"><a href="<?=home_url("/faiz-oranlari/?type=eur")?>">Euro</a></li>
                                                </ul>
                                            </div>

                                            <table class="currencyTable currencyFullTable">
                                                <span class="loadingFaiz">Yükleniyor...</span>
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

<script>
    $.get( "<?=get_template_directory_uri()?>/api/faiz-oranlari.php?type=<?=@$_GET['type']?>", function( data ) {
        $(".loadingFaiz").hide();
        $(".currencyShowcase .currencyFullTable").html(data);
    });
</script>
<!-- #Site Wrapper -->
<?php get_footer(); ?>
