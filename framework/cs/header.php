<?php
  global $currency_data, $coin_data, $altin_data, $borsa_artanlar_data, $borsa_azalanlar_data, $borsa_islem_gorenler_data, $bist100_data, $parite_data, $cripto_data;
  global $bp_options;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<?=$bp_options['analyticsCodes']; ?>
<?=$bp_options['adsenseHeadCodes']?>
<?php wp_head(); ?>

<!-- Styles -->

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/media.css" media="all" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/vendors/owl-carousel/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/vendors/scrollbar/jquery.mCustomScrollbar.min.css" />
<link rel="Shortcut Icon" href="<?=$bp_options['favicon']?>" type="image/x-icon">

<style>
  .currencyBar{background: <?=$bp_options['header_bg_bolum_1_sol']?> !important; /* Old browsers */
  background: -moz-linear-gradient(left, <?=$bp_options['header_bg_bolum_1_sol']?> 0%, <?=$bp_options['header_bg_bolum_1_sag']?> 100%) !important; /* FF3.6-15 */
  background: -webkit-linear-gradient(left, <?=$bp_options['header_bg_bolum_1_sol']?> 0%,<?=$bp_options['header_bg_bolum_1_sag']?> 100%) !important; /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right, <?=$bp_options['header_bg_bolum_1_sol']?> 0%,<?=$bp_options['header_bg_bolum_1_sag']?> 100%) !important; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=$bp_options['header_bg_bolum_1_sol']?>', endColorstr='<?=$bp_options['header_bg_bolum_1_sag']?>',GradientType=1 ) !important; /* IE6-9 */

  border-bottom:1px solid <?=$bp_options['header_hr']?>;}
  .blackShape{background-color: <?=$bp_options['header_bg_bolum_2_sol']?>;
  background: <?=$bp_options['header_bg_bolum_2_sol']?>; /* Old browsers */
  background: -moz-linear-gradient(left, <?=$bp_options['header_bg_bolum_2_sol']?> 0%, <?=$bp_options['header_bg_bolum_2_sag']?> 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(left, <?=$bp_options['header_bg_bolum_2_sol']?> 0%,<?=$bp_options['header_bg_bolum_2_sag']?> 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right, <?=$bp_options['header_bg_bolum_2_sol']?> 0%,<?=$bp_options['header_bg_bolum_2_sag']?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=$bp_options['header_bg_bolum_2_sol']?>', endColorstr='<?=$bp_options['header_bg_bolum_2_sag']?>',GradientType=1 ); /* IE6-9 */
}
  header{background-color: <?=$bp_options['header_bg_bolum_2_sol']?>;
  background: <?=$bp_options['header_bg_bolum_2_sol']?>; /* Old browsers */
  background: -moz-linear-gradient(left, <?=$bp_options['header_bg_bolum_2_sol']?> 0%, <?=$bp_options['header_bg_bolum_2_sag']?> 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(left, <?=$bp_options['header_bg_bolum_2_sol']?> 0%,<?=$bp_options['header_bg_bolum_2_sag']?> 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right, <?=$bp_options['header_bg_bolum_2_sol']?> 0%,<?=$bp_options['header_bg_bolum_2_sag']?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=$bp_options['header_bg_bolum_2_sol']?>', endColorstr='<?=$bp_options['header_bg_bolum_2_sag']?>',GradientType=1 ); /* IE6-9 */}

  section.content .sidebar .widget .popularNews .item .title .info .cat a:hover{color: <?=$bp_options['tum_bilesenler_renk']?>;transform: 300ms;}
  section.content .sidebar .widget .mostComment .item .info .cat a:hover{color: <?=$bp_options['tum_bilesenler_renk']?>;transform: 300ms;}

  header .mainBar .nav ul li a{color:<?=$bp_options['header_menu']?>;}
  header .mainBar .nav ul li:hover a{color:<?=$bp_options['header_menu_hover']?>;}
  header .mainBar .nav ul li.menu-item-has-children:hover:after{color:<?=$bp_options['header_menu_hover']?>;}
  header .mainBar .nav ul>li>ul>li:hover:before { background: <?=$bp_options['header_menu_hover']?>; }
  header .mainBar .nav ul>li>ul{background: <?=$bp_options['header_bg_bolum_2_sol']?>;}

  .canli-borsa{background:<?=$bp_options['canli_borsa_bg']?>;}
  .canli-borsa:hover{background:<?=$bp_options['canli_borsa_buton_hover']?>;}

  .creditCalculatorHead ul li.active{background: <?=$bp_options['kredi_tab_hover']?>;border-right: 0px;}
  .creditCalculatorHead{border-bottom: 2px solid <?=$bp_options['kredi_tab_hover']?>;}
  .creditCalculatorHead ul li.active:before {background: <?=$bp_options['kredi_tab_hover']?>;}
  .creditCalculatorHead ul li.active:after {background: <?=$bp_options['kredi_tab_hover']?>;}
  .creditCalculator .calculatorBtn{background: <?=$bp_options['en_ucuz_kredi_buton']?>;}
  .creditCalculatorBox .calculatorBtn:hover{background: <?=$bp_options['en_ucuz_kredi_buton_hover']?>;}

  .vertSlider .vertSlides .owl-dots .owl-dot.active {background:<?=$bp_options['slider_buton_rengi']?>;border-top:1px solid <?=$bp_options['slider_buton_rengi']?>;border-right:1px solid <?=$bp_options['slider_buton_rengi']?>;border-left:1px solid <?=$bp_options['slider_buton_rengi']?>;}
  .vertSlider .vertSlides .owl-dots:after{background: <?=$bp_options['slider_divider']?>;}

  .currencyShowcase.half .currencyTable.kriptolar tr.head select {background: url(<?=bloginfo("template_directory")?>/img/icons/selectBigArrow.png) no-repeat calc(100% - 10px) 8px <?=$bp_options['kriptoparalar_selection_bg']?>;}
  .currencyShowcase.half .currencyTable.kriptolar tr.head select {border-color: <?=$bp_options['kriptoparalar_selection_bg']?>;}

  section.content .widebar .widget  .lastNewsHead:before{background: <?=$bp_options['tum_bilesenler_renk']?>}
  section.content .widebar .widget .categoryTab .tabHead ul li.active span:after{background: <?=$bp_options['tum_bilesenler_renk']?>}
  section.content .sidebar .widget .sidebarHead:before{background: <?=$bp_options['tum_bilesenler_renk']?>}

  .content_widget .sidebarHead:before{background: <?=$bp_options['tum_bilesenler_renk']?>}

  .dovizCeviriciSid .head:before{background: <?=$bp_options['tum_bilesenler_renk']?>}
  .dovizCeviriciSid .formCheck .radioLabel input:checked ~ .radioMark {background-color: <?=$bp_options['tum_bilesenler_renk']?>;	border-color: <?=$bp_options['tum_bilesenler_renk']?>;}

  section.content .widebar .widget  .lastNews .item .content-summary .categories a{background: <?=$bp_options['tum_icerik_kategori_renk']?>;}
  section.content .widebar .widget .lastNews .item .content-summary .categories a:before{background: <?=$bp_options['tum_icerik_kategori_renk']?>}
  section.content .widebar .widget  .lastNews .item .content-summary .categories a:hover{background: <?=$bp_options['tum_icerik_kategori_hover']?>;}

  footer.footer .contentFooter .footerTitle{color: <?=$bp_options['footer_basliklari_renk']?>;}
  footer.footer .contentFooter .footerMenu ul li a{color: <?=$bp_options['footer_kategorileri_renk']?>;}
  footer.footer .contentFooter .footerMenu ul li a:hover{color: <?=$bp_options['footer_kategorileri_hover_renk']?>;}

  footer.footer .footerTop{background: <?=$bp_options['footer_bg_1']?>;}
  footer.footer{background: <?=$bp_options['footer_bg_2']?>;}
  footer.footer .footerBottom{background: <?=$bp_options['footer_bg_3']?>;}

  footer.footer .footerBottom .footerSocial li a i{background-color: <?=$bp_options['sosyal_medya_buton']?>;}
  footer.footer .footerBottom .footerSocial li a:hover i {background-color:<?=$bp_options['sosyal_medya_buton_hover']?>; transition: 300ms; }

  section.content .widebar .widget  .lastNews .item .content-summary .title a:hover{color:<?=$bp_options['diger_bilesenler_renk']?>;}
  section.content .widebar .widget .categoryTab .catTabContent .item .title a:hover{color:<?=$bp_options['diger_bilesenler_renk']?>;}
  section.content .sidebar .widget .popularNews .item .title > a:hover{color: <?=$bp_options['diger_bilesenler_renk']?>;}
  section.content .sidebar .widget .mostComment .item .title > a:hover{color: <?=$bp_options['diger_bilesenler_renk']?>;}

  .breadcrumb ul li.post{background-color: <?=$bp_options['header_bg_bolum_2_sol']?>}
  .breadcrumb ul li a:hover{color: <?=$bp_options['diger_bilesenler_renk']?>;transition: 300ms;}

  .singleWrapper .singleContent .mainContent .main ul.buttons li.favorite {background-color: <?=$bp_options['single_favori_buton']?>}
  .singleWrapper .singleContent .mainContent .main ul.buttons li.favorite:hover {background:<?=$bp_options['single_favori_buton_hover']?>;}

  .postInner .relatedPost .text .eT{background: <?=$bp_options['single_ilgili_icerik']?>}
  .postInner ol li:before{background: <?=$bp_options['single_listeleme']?>}
  .tags a:hover{background-color: <?=$bp_options['single_etiket_hover']?>}

  .singleHead.v2 {border-bottom:1px solid <?=$bp_options['yorum_rengi']?>;}
  .singleHead.v2:before {background:<?=$bp_options['yorum_rengi']?>;}
  .singleHead.v2:after {background:<?=$bp_options['yorum_rengi']?>;}
  .singleHead.v2 span {border-bottom:3px solid <?=$bp_options['yorum_rengi']?>;}
  .commentWhite .commentForm ul li.one .submit {background-color: <?=$bp_options['yorum_rengi']?>;}
  .commentListing .comment .right ul li .left span.commentAuthor{color: <?=$bp_options['yorum_rengi']?>}
  .commentWhite .commentForm ul li.one .submit:hover {background:<?=$bp_options['yorum_buton_hover_rengi']?>;}
  .main-slider .owl-dots .owl-dot.active{background: <?=$bp_options['tum_bilesenler_renk']?>;}

  section.content .widebar .widget .borsaTimerTabHead ul li.active span:after{background: <?=$bp_options['diger_bilesenler_renk']?>}
  .popularCalculationTitle{border-bottom: 4px solid <?=$bp_options['diger_bilesenler_renk']?>;}
  .bankaCalculators .bankCalc .bankFoot a.cont{background: <?=$bp_options['en_ucuz_kredi_buton']?>; }

  section.content .widebar .widget .news-slider .news-slider-content .title .bg-pad { background: <?=$bp_options['en_ucuz_kredi_buton']?>; }
  section.content .widebar .widget .news-slider .news-slider-content .title .bg-pad a { background: <?=$bp_options['en_ucuz_kredi_buton']?>; }

  section.content .widebar .widget .news-slider .owl-thumb-item.active img { border: 4px solid <?=$bp_options['kredi_slider_rengi']?>; }
  section.content .widebar .widget .news-slider .owl-nav .owl-next:hover { background: <?=$bp_options['kredi_slider_rengi']?>; }
  section.content .widebar .widget .news-slider .news-slider-content .cat{ background: <?=$bp_options['kredi_slider_rengi']?>; }
  section.content .widebar .widget .news-slider .owl-nav .owl-prev:hover { background: <?=$bp_options['kredi_slider_rengi']?>; }
  .homeIconMenu ul li:hover { background: <?=$bp_options['kredi_slider_rengi']?>; }

  .main-slider .owl-nav .owl-next:hover { background: <?=$bp_options['doviz_slider_rengi']?> !important; }
  .main-slider .owl-nav .owl-prev:hover { background: <?=$bp_options['doviz_slider_rengi']?> !important; }
  .daily-news ul li .content .title a:hover {color:<?=$bp_options['diger_bilesenler_renk']?>;}

  .headline-news-big .content .title .bg-pad{background: <?=$bp_options['kripto_slider_arkaplan_rengi']?>}
  .headline-news-smalls .content .title .bg-pad{background: <?=$bp_options['kripto_slider_arkaplan_rengi']?>}
  .headline-news-big .content .cat{background:<?=$bp_options['kripto_slider_kategori_rengi']?>;}
  .headline-news-smalls .content .cat{background:<?=$bp_options['kripto_slider_kategori_rengi']?>;}
  .singleWrapper .singleContent .mainContent .main .author span a:hover{color:<?=$bp_options['diger_bilesenler_renk']?>;}
  .loadMoreButton span{background: <?=$bp_options['tum_icerik_kategori_renk']?>;}
  .loadMoreButton_1 span{background: <?=$bp_options['tum_icerik_kategori_renk']?>;}
  header .mainBar .nav ul>li>ul>li>a:hover { color:<?=$bp_options['header_menu']?>; }

  <?php if($bp_options['headerSticky'] == 0): ?>
  header{position: absolute !important;}
  .currencyBar{position: absolute !important;}
  <?php endif; ?>

  <?php if($bp_options['headerType'] == "header2"): ?>
  .currencyBar{background: url(<?php bloginfo("template_directory")?>/img/currencybarbg.png) no-repeat !important; }
  .currencyBar:after{ content:''; position: absolute; width: 100%; height: 100%; background: <?=$bp_options['header_bg_bolum_1_sol']?>; left: 0; top: 0; z-index:-1; opacity: .75}
  <?php endif; ?>

  <?php if(is_user_logged_in()){
    ?>.site-wrapper{top:189px !important;}<?php
  }?>
  <?php if(wp_is_mobile()){ ?>
    .site-wrapper{top: 68px !important;}
  <?php } ?>
  .search-form input{background: <?=$bp_options['header_bg_bolum_2_sol']?>}
</style>

<?php $page_title = $wp_query->post->post_title;?>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i|Rubik:500&amp;subset=latin-ext" rel="stylesheet">
<?php if($page_title == "Üye Alarm Sayfası"): ?>
<link rel="manifest" href="/manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "<?=$bp_options['onesignalAppId']?>",
    });
  });
</script>
<?php endif; ?>
</head>
<body <?php body_class(); ?>>


    <div class="mobile-menu">
        <div class="menu-close"><i class="close-btn"></i>Menüyü Kapat</div>
        <ul>
          <?php foreach($bp_options['responsiveMenu'] as $key=>$val): ?>
            <li><a href="<?=$val['menu_link']?>"><img src="<?php bloginfo("template_directory")?>/img/svg/mobilemenu/<?=$val['menu_icon']?>.svg" width="20px" height="20px" /><?=$val['menu_ismi']?></a></li>
          <?php endforeach; ?>
      </div>
  <!-- Site -->
	<!-- Site -->
	<div id="site">

		<div class="overlay"></div>

	<?php if ( wp_is_mobile() ): ?>

	<div class="mobile-search">	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<input type="text" class="input" name="s" placeholder="Herhangi bir şey arayın..." />
		<input type="submit" class="submit bg" value="ARA" />	</form>
	</div>

	<?php endif; ?>
		<div class="blackShape"></div>
		<!-- currencyBar -->
		<div class="currencyBar">
			<div class="container">
				<ul>

					<li>
            <?php
            $bp_siralama = $bp_options['ustCoinSiralama'];

            $type = explode("{}",$bp_siralama['ustSira1']);
              if($type[1] == "altin"){
                $rate = $altin_data['altin_rate'][$type[0]];
                $price = $altin_data['altin_price'][$type[0]];
                $name = $altin_data['altin_name'][$type[0]];
                $base = "";
              }else if($type[1] == "doviz"){
                $rate = $currency_data['change_rate'][$type[0]];
                $price = $currency_data['buying'][$type[0]];
                $name = $currency_data['full_name'][$type[0]];
                $base = strtoupper($type[0]);
              }else if($type[1] == "coin"){
                $rate = $coin_data['price_24h'][$type[0]];
                if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
                $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
              }else{
                $price = $coin_data['current_price'][$type[0]];
              }
                $name = $coin_data['name'][$type[0]];
                $base = permalink($coin_data['name'][$type[0]]);
              }else if($type[1] == "bist"){
                $rate = $bist100_data['change_rate'];
                $price = $bist100_data['value'];
                $name = "BIST 100";
                $base = "";
              }
              $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
              $name = mb_strtoupper(str_replace(array(
                'ABD Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
              ),
              array(
                '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
              ),$name), "UTF-8");
              if(str_replace(",",".",$rate) > 0){
                $crease_status = "increase";
              }else{
                $crease_status = "decrease";
              }
            ?>
						<div class="currencyName"><?=$name?></div>
						<div class="currencyValue base_<?=$base?>"><?=$price?></div>
						<div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
					</li>
          <?php
          $type = explode("{}",$bp_siralama['ustSira2']);
          if($type[1] == "altin"){
            $rate = $altin_data['altin_rate'][$type[0]];
            $price = $altin_data['altin_price'][$type[0]];
            $name = $altin_data['altin_name'][$type[0]];
            $base = "";
          }else if($type[1] == "doviz"){
            $rate = $currency_data['change_rate'][$type[0]];
            $price = $currency_data['buying'][$type[0]];
            $name = $currency_data['full_name'][$type[0]];
            $base = strtoupper($type[0]);
          }else if($type[1] == "coin"){
            $rate = $coin_data['price_24h'][$type[0]];
            if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
            $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
          }else{
            $price = $coin_data['current_price'][$type[0]];
          }
            $name = $coin_data['name'][$type[0]];
            $base = permalink($coin_data['name'][$type[0]]);
          }else if($type[1] == "bist"){
            $rate = $bist100_data['change_rate'];
            $price = $bist100_data['value'];
            $name = "BIST 100";
            $base = "";
          }
          $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
          $name = mb_strtoupper(str_replace(array(
            'ABD Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
          ),
          array(
            '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
          ),$name), "UTF-8");
            if(str_replace(",",".",$rate) > 0){
              $crease_status = "increase";
            }else{
              $crease_status = "decrease";
            }
          ?>
					<li>
						<div class="currencyName"><?=$name?></div>
						<div class="currencyValue base_<?=$base?>"><?=$price?></div>
						<div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
					</li>
          <?php
          $type = explode("{}",$bp_siralama['ustSira3']);
          if($type[1] == "altin"){
            $rate = $altin_data['altin_rate'][$type[0]];
            $price = $altin_data['altin_price'][$type[0]];
            $name = $altin_data['altin_name'][$type[0]];
            $base = "";
          }else if($type[1] == "doviz"){
            $rate = $currency_data['change_rate'][$type[0]];
            $price = $currency_data['buying'][$type[0]];
            $name = $currency_data['full_name'][$type[0]];
            $base = strtoupper($type[0]);
          }else if($type[1] == "coin"){
            $rate = $coin_data['price_24h'][$type[0]];
            if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
            $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
          }else{
            $price = $coin_data['current_price'][$type[0]];
          }
            $name = $coin_data['name'][$type[0]];
            $base = permalink($coin_data['name'][$type[0]]);
          }else if($type[1] == "bist"){
            $rate = $bist100_data['change_rate'];
            $price = $bist100_data['value'];
            $name = "BIST 100";
            $base = "";
          }
          $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
          $name = mb_strtoupper(str_replace(array(
            'ABD Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
          ),
          array(
            '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
          ),$name), "UTF-8");
            if(str_replace(",",".",$rate) > 0){
              $crease_status = "increase";
            }else{
              $crease_status = "decrease";
            }
          ?>
					<li>
						<div class="currencyName"><?=$name?></div>
						<div class="currencyValue base_<?=$base?>"><?=$price?></div>
						<div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
					</li>
          <?php
          $type = explode("{}",$bp_siralama['ustSira4']);
          if($type[1] == "altin"){
            $rate = $altin_data['altin_rate'][$type[0]];
            $price = $altin_data['altin_price'][$type[0]];
            $name = $altin_data['altin_name'][$type[0]];
            $base = "";
          }else if($type[1] == "doviz"){
            $rate = $currency_data['change_rate'][$type[0]];
            $price = $currency_data['buying'][$type[0]];
            $name = $currency_data['full_name'][$type[0]];
            $base = strtoupper($type[0]);
          }else if($type[1] == "coin"){
            $rate = $coin_data['price_24h'][$type[0]];
            if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
            $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
          }else{
            $price = $coin_data['current_price'][$type[0]];
          }
            $name = $coin_data['name'][$type[0]];
            $base = permalink($coin_data['name'][$type[0]]);
          }else if($type[1] == "bist"){
            $rate = $bist100_data['change_rate'];
            $price = $bist100_data['value'];
            $name = "BIST 100";
            $base = "";
          }
          $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
          $name = mb_strtoupper(str_replace(array(
            'ABD Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
          ),
          array(
            '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
          ),$name), "UTF-8");
            if(str_replace(",",".",$rate) > 0){
              $crease_status = "increase";
            }else{
              $crease_status = "decrease";
            }
          ?>
					<li>
						<div class="currencyName"><?=$name?></div>
						<div class="currencyValue base_<?=$base?>"><?=$price?></div>
						<div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
					</li>
          <?php
          $type = explode("{}",$bp_siralama['ustSira5']);
          if($type[1] == "altin"){
            $rate = $altin_data['altin_rate'][$type[0]];
            $price = $altin_data['altin_price'][$type[0]];
            $name = $altin_data['altin_name'][$type[0]];
            $base = "";
          }else if($type[1] == "doviz"){
            $rate = $currency_data['change_rate'][$type[0]];
            $price = $currency_data['buying'][$type[0]];
            $name = $currency_data['full_name'][$type[0]];
            $base = strtoupper($type[0]);
          }else if($type[1] == "coin"){
            $rate = $coin_data['price_24h'][$type[0]];
            if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
            $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
          }else{
            $price = $coin_data['current_price'][$type[0]];
          }
            $name = $coin_data['name'][$type[0]];
            $base = permalink($coin_data['name'][$type[0]]);
          }else if($type[1] == "bist"){
            $rate = $bist100_data['change_rate'];
            $price = $bist100_data['value'];
            $name = "BIST 100";
            $base = "";
          }
          $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
          $name = mb_strtoupper(str_replace(array(
            'ABD Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
          ),
          array(
            '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
          ),$name), "UTF-8");
            if(str_replace(",",".",$rate) > 0){
              $crease_status = "increase";
            }else{
              $crease_status = "decrease";
            }
          ?>
					<li>
						<div class="currencyName"><?=$name?></div>
						<div class="currencyValue base_<?=$base?>"><?=$price?></div>
						<div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
					</li>
          <?php
          $type = explode("{}",$bp_siralama['ustSira6']);
          if($type[1] == "altin"){
            $rate = $altin_data['altin_rate'][$type[0]];
            $price = $altin_data['altin_price'][$type[0]];
            $name = $altin_data['altin_name'][$type[0]];
            $base = "";
          }else if($type[1] == "doviz"){
            $rate = $currency_data['change_rate'][$type[0]];
            $price = $currency_data['buying'][$type[0]];
            $name = $currency_data['full_name'][$type[0]];
            $base = strtoupper($type[0]);
          }else if($type[1] == "coin"){
            $rate = $coin_data['price_24h'][$type[0]];
            if($coin_data['name'][$type[0]] == "symbol" || $coin_data['symbol'][$type[0]] == "bch" ){
            $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
          }else{
            $price = $coin_data['current_price'][$type[0]];
          }
            $name = $coin_data['name'][$type[0]];
            $base = permalink($coin_data['name'][$type[0]]);
          }else if($type[1] == "bist"){
            $rate = $bist100_data['change_rate'];
            $price = $bist100_data['value'];
            $name = "BIST 100";
            $base = "";
          }
          $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
          $name = mb_strtoupper(str_replace(array(
            'ABD Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
          ),
          array(
            '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
          ),$name), "UTF-8");
            if(str_replace(",",".",$rate) > 0){
              $crease_status = "increase";
            }else{
              $crease_status = "decrease";
            }
          ?>
					<li>
						<div class="currencyName"><?=$name?></div>
						<div class="currencyValue base_<?=$base?>"><?=$price?></div>
						<div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
					</li>
          <?php
          $type = explode("{}",$bp_siralama['ustSira7']);
          if($type[1] == "altin"){
            $rate = $altin_data['altin_rate'][$type[0]];
            $price = $altin_data['altin_price'][$type[0]];
            $name = $altin_data['altin_name'][$type[0]];
            $base = "";
          }else if($type[1] == "doviz"){
            $rate = $currency_data['change_rate'][$type[0]];
            $price = $currency_data['buying'][$type[0]];
            $name = $currency_data['full_name'][$type[0]];
            $base = strtoupper($type[0]);
          }else if($type[1] == "coin"){
            $rate = $coin_data['price_24h'][$type[0]];
            if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
            $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
          }else{
            $price = $coin_data['current_price'][$type[0]];
          }
            $name = $coin_data['name'][$type[0]];
            $base = permalink($coin_data['name'][$type[0]]);
          }else if($type[1] == "bist"){
            $rate = $bist100_data['change_rate'];
            $price = $bist100_data['value'];
            $name = "BIST 100";
            $base = "";
          }
          $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
          $name = mb_strtoupper(str_replace(array(
            'ABD Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
          ),
          array(
            '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
          ),$name), "UTF-8");
            if(str_replace(",",".",$rate) > 0){
              $crease_status = "increase";
            }else{
              $crease_status = "decrease";
            }
          ?>
					<li>
						<div class="currencyName"><?=$name?></div>
						<div class="currencyValue base_<?=$base?>"><?=$price?></div>
						<div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
					</li>
          <?php
          $type = explode("{}",$bp_siralama['ustSira8']);
          if($type[1] == "altin"){
            $rate = $altin_data['altin_rate'][$type[0]];
            $price = $altin_data['altin_price'][$type[0]];
            $name = $altin_data['altin_name'][$type[0]];
            $base = "";
          }else if($type[1] == "doviz"){
            $rate = $currency_data['change_rate'][$type[0]];
            $price = $currency_data['buying'][$type[0]];
            $name = $currency_data['full_name'][$type[0]];
            $base = strtoupper($type[0]);
          }else if($type[1] == "coin"){
            $rate = $coin_data['price_24h'][$type[0]];
            if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
            $price = $coin_data['current_price'][$type[0]].",".rand(100,750);
          }else{
            $price = $coin_data['current_price'][$type[0]];
          }
            $name = $coin_data['name'][$type[0]];
            $base = permalink($coin_data['name'][$type[0]]);
          }else if($type[1] == "bist"){
            $rate = $bist100_data['change_rate'];
            $price = $bist100_data['value'];
            $name = "BIST 100";
            $base = "";
          }
          $rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
          $name = mb_strtoupper(str_replace(array(
            'ABD Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
          ),
          array(
            '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
          ),$name), "UTF-8");
            if(str_replace(",",".",$rate) > 0){
              $crease_status = "increase";
            }else{
              $crease_status = "decrease";
            }
          ?>
					<li>
						<div class="currencyName"><?=$name?></div>
						<div class="currencyValue base_<?=$base?>"><?=$price?></div>
						<div class="currencyRate">% <?=$rate?> <i class="<?=$crease_status?>"></i></div>
					</li>
				</ul>
			</div>
		</div>
		<!-- //currencyBar -->
		<!-- Header -->
		<header>
      <?php
      if($bp_options['mobileCurrency'] == 1) {
        get_template_part("inc/currencyBar");
      }
       ?>
			<!-- MainBar -->
			<div class="mainBar bg">
				<div class="container">

					<!-- Logo -->
					<div class="logo">
						<a href="<?php bloginfo('home'); ?>">
              <?php if(wp_is_mobile()):
                if(empty($bp_options['mobile_logo'])){

                  if(!empty($bp_options['desktop_logo'])){
                      ?><img src="<?=$bp_options['desktop_logo']?>" alt="<?php bloginfo( 'name' ); ?>" /><?php
                  }else{
                    ?><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /><?php
                  }

                }else{

                  ?><img src="<?=$bp_options['mobile_logo']?>" alt="<?php bloginfo( 'name' ); ?>" /><?php
                }
              else:
                if(!empty($bp_options['desktop_logo'])){
                ?>
                <img src="<?=$bp_options['desktop_logo']?>" alt="<?php bloginfo( 'name' ); ?>" />
              <?php }else{
                ?><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /><?php
              } endif; ?>
						</a>
					</div>

					<!-- Nav -->
					<div class="nav">
						<?php if ( has_nav_menu( 'bfUstMenu' ) ) {
               wp_nav_menu( array ( 'theme_location' => 'bfUstMenu'));
             }else{
               ?><li><a href="<?php bloginfo('home'); ?>/wp-admin/nav-menus.php" target="_BLANK">Üst Menüyü Oluşturun!</a></li><?php
             } ?>

					</div>

					<!-- Right -->
					<div class="right">
            <?php if(wp_is_mobile()){ ?>
              <?php global $user_ID, $user_identity; get_currentuserinfo(); if (is_user_logged_in()):  ?>
    					<?php $current_user1 = wp_get_current_user(); ?>
              <div class="loggin_area" style=" float: left;line-height: 67px;margin-left: 10px;margin-top: 6px;">
    						<div class="loggedIn">
    							<span><?php echo mb_substr($current_user1->display_name,0,7,"UTF-8"); ?><i></i></span>
                  <?php if(!wp_is_mobile()){ ?>
    							<i class="avatarW">
                    <?php

                    if(!empty(get_user_meta($user_ID, "profil_pic", true))){
                      ?><img src="<?php bloginfo("template_directory")?>/profile/<?=get_user_meta($user_ID, "profil_pic", true)?>" class="avatar avatar-36 photo" width="36" height="36"><?php
                    }else{
                      ?><img src="http://2.gravatar.com/avatar/5cc8b43a5a60328aa1a15ab8708a9404?s=36&amp;d=mm&amp;r=g" class="avatar avatar-36 photo" width="36" height="36"><?php
                    }

                    ?>
                    </i>
                  <?php } ?>
    							<ul>

                    <?php if(wp_is_mobile()){
                      ?>
                      <li><a href="<?php echo esc_url( get_author_posts_url( $current_user1->ID ) ); ?>" style="padding-bottom:0px;padding-top:0px;">Profil Sayfam</a></li>
      								<li><a href="<?php bloginfo('home'); ?>/wp-admin/uye-profili" style="padding-bottom:0px;padding-top:0px;">Ayarlarım</a></li>
      								<li><a href="<?php echo wp_logout_url( home_url() ); ?>" style="padding-bottom:0px;padding-top:0px;">Çıkış Yap</a></li>
                      <?php
                    }else{
                        ?>
                        <li class="myFavoriteList"><a href="<?php echo esc_url( get_author_posts_url( $current_user1->ID ) ); ?>"><i></i>Profil Sayfam</a></li>
        								<li class="settings"><a href="<?php bloginfo('home'); ?>/wp-admin/uye-profili"><i></i>Ayarlarım</a></li>
        								<li class="logout"><a href="<?php echo wp_logout_url( home_url() ); ?>"><i></i>Çıkış Yap</a></li>
                    <?php } ?>
    							</ul>
    						</div>
              </div>

              <?php else: ?>
              <a class="user-link" href="<?php bloginfo("home")?>/giris-kayit-sayfasi/"><i class="user"></i></a>
            <?php endif; ?>
            <?php } ?>
            <i class="search"></i>


            <?php if(!wp_is_mobile()){ ?>
            <?php global $user_ID, $user_identity; get_currentuserinfo(); if (is_user_logged_in()):  ?>
  					<?php $current_user1 = wp_get_current_user(); ?>
  					<!-- Right -->
            <div class="loggin_area" style="<?php if(!wp_is_mobile()): ?>float:right;<?php else:?> float: left;line-height: 67px;<?php endif;?>margin-left: 10px;margin-top: 6px;">
  						<div class="loggedIn">
  							<span><?php echo mb_substr($current_user1->display_name,0,7,"UTF-8"); ?><i></i></span>
                <?php if(!wp_is_mobile()){ ?>
  							<i class="avatarW">
                  <?php

                  if(!empty(get_user_meta($user_ID, "profil_pic", true))){
                    ?><img src="<?php bloginfo("template_directory")?>/profile/<?=get_user_meta($user_ID, "profil_pic", true)?>" class="avatar avatar-36 photo" width="36" height="36"><?php
                  }else{
                    ?><img src="<?php bloginfo("template_directory")?>/img/icons/user.png" class="avatar avatar-36 photo" width="36" height="36"><?php
                  }

                  ?>
                  </i>
                <?php } ?>
  							<ul>
                  <?php if(wp_is_mobile()){
                    ?>
                    <li><a href="<?php echo esc_url( get_author_posts_url( $current_user1->ID ) ); ?>"><i></i>Profil Sayfam</a></li>
    								<li><a href="<?php bloginfo('home'); ?>/wp-admin/<?=$bp_options['page_uyeprofili']?>"><i></i>Ayarlarım</a></li>
    								<li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i></i>Çıkış Yap</a></li>
                    <?php
                  }else{
                      ?>
                      <li class="myFavoriteList"><a href="<?php echo esc_url( get_author_posts_url( $current_user1->ID ) ); ?>"><i></i>Profil Sayfam</a></li>
      								<li class="settings"><a href="<?php bloginfo('home'); ?>/wp-admin/<?=$bp_options['page_uyeprofili']?>"><i></i>Ayarlarım</a></li>
      								<li class="logout"><a href="<?php echo wp_logout_url( home_url() ); ?>"><i></i>Çıkış Yap</a></li>
                  <?php } ?>

  							</ul>
  						</div>
            </div>



  					<?php else: ?>
              <a class="user-link" href="<?php bloginfo("home")?>/<?=$bp_options['page_giriskayit']?>/"><i class="user"></i></a>
            <?php endif; ?>
            <?php } ?>
			<button type="button" class="toggle-menu" >
            <i class="mobileMenu"></i>
					</button>


					</div>

				<div class="search-form">
				<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<span>Aranacak kelimeyi yazın ve <small>enter</small> tuşuna basın...</span>
						<input type="text" placeholder="" name="s" value="">
						<input type="submit" style="display:none;"/>
					</form>
				</div>


				</div>
			</div>



		</header>
		<!-- #Header -->
