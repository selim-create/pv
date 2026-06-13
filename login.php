<?php
/*
	Template Name: Giriş / Kayıt Sayfası
*/
  global $bp_options;

  if(is_user_logged_in())
  {
    wp_redirect(home_url());
  }
?>
<!DOCTYPE html>
<html lang="tr">
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php wp_head(); ?>
<!-- Styles -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory")?>/css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory")?>/css/uyegirisi.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory")?>/css/media.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory")?>/vendors/owl-carousel/owl.carousel.min.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="Shortcut Icon" href="<?=$bp_options['favicon']?>" type="image/x-icon">
<style>
a.homeButtonLoginPage{background-color: <?=$bp_options['uyegiris_anasayfa_renk']?>}
a.homeButtonLoginPage:hover{background-color: <?=$bp_options['uyegiris_anasayfa_hover_renk']?>}
body.loginPageBody .wrapper .right .box .formTabContent input.submitDefault {
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fd68a5+0,fd8969+100 */
  background: <?=$bp_options['uyegiris_buton_sol']?>; /* Old browsers */
  background: -moz-linear-gradient(left, <?=$bp_options['uyegiris_buton_sol']?> 0%, <?=$bp_options['uyegiris_buton_sag']?> 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(left, <?=$bp_options['uyegiris_buton_sol']?> 0%,<?=$bp_options['uyegiris_buton_sag']?> 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right, <?=$bp_options['uyegiris_buton_sol']?> 0%,<?=$bp_options['uyegiris_buton_sag']?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=$bp_options['uyegiris_buton_sol']?>', endColorstr='<?=$bp_options['uyegiris_buton_sag']?>',GradientType=1 ); /* IE6-9 */
}
body.loginPageBody .wrapper .right .box .unuttum a {background-color: <?=$bp_options['uyegiris_sifre_buton']?>}
</style>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i|Rubik:500&amp;subset=latin-ext" rel="stylesheet">

</head>
<body class="loginPageBody">

	<!-- Site -->
	<div id="site">
    <div class="content-bg-wrap"></div>

    <!-- Login Page -->
    <div class="loginPage">
			<div class="container">

				<!-- Wrapper -->
				<div class="wrapper">
          <?php if(wp_is_mobile()){
            ?><center><?php
          }?>
					<a class="homeButtonLoginPage" href="<?php bloginfo("home")?>" style="z-index:99999;"><i></i>Anasayfaya Dön</a>
          <?php if(wp_is_mobile()){
            ?></center><?php
          }?>

					<!-- Text -->
					<div class="text">
						<h1><?=$bp_options['uyeBaslik']?></h1>
						<span class="aciklama"><?=$bp_options['uyeAciklama']?></span>
					</div>

					<!-- Right -->
					<div class="right">
						<div class="box">
							<ul class="tabHead">
								<li class="active">Üye Kaydı</li>
								<li>Üye Girişi Yap</li>
							</ul>

							<div class="formTabContent" style="">
								<form id="register" class="ajax-auth" action="register" method="post" novalidate="novalidate">
									<input type="text" class="textInput required" placeholder="Kullanıcı Adınız" name="signonname" id="signonname" aria-required="true">
									<input type="password" class="textInput required" placeholder="Şifreniz" name="signonpassword" id="signonpassword" aria-required="true">
									<input type="text" class="textInput required email" placeholder="E-Posta Adresiniz" id="email" name="" aria-required="true">
									<input type="submit" class="submitDefault submit_button" value="Kayıt Ol">
                  <span class="divider">VEYA</span>
                  <div class="clear"></div>
									<div class="unuttum"><a href="<?php echo wp_lostpassword_url( $redirect ); ?>">Şifremi Unuttum?</a></div>
									<p class="check yellow" id="check" style="display: none;"></p>
                  <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
								</form>
							</div>

							<div class="formTabContent" style="display: none;">
								<form id="login" class="ajax-auth" action="login" method="post">
									<input type="text" class="textInput required" placeholder="Kullanıcı Adınız" name="username" id="username">
									<input type="password" class="textInput required" placeholder="Şifreniz" name="password" id="password">
									<input type="submit" class="submitDefault submit_button" value="Giriş Yap">
                  <span class="divider">VEYA</span>
                  <div class="clear"></div>
									<div class="unuttum"><a href="<?php echo wp_lostpassword_url( $redirect ); ?>"><i></i>Şifremi Unuttum?</a></div>

									<p class="check yellow" id="check" style="display: none;"></p>
									<?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
								</form>
							</div>

						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
	<!-- #Site -->
<script src="<?php bloginfo("template_directory")?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php bloginfo("template_directory")?>/vendors/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo("template_directory")?>/js/theme.js"></script>

<script type="text/javascript">
  /*
    Tab  Login
  */
  $(document).ready(function(){
    $("body.loginPageBody .wrapper .right .box .formTabContent").hide();
    $("body.loginPageBody .wrapper .right .box .formTabContent:first").show();
    $("body.loginPageBody .wrapper .right .box ul.tabHead li:first").addClass("active");
    $("body.loginPageBody .wrapper .right .box ul.tabHead li").click(function(){
    $("body.loginPageBody .wrapper .right .box ul.tabHead li").removeClass("active");
    $(this).addClass("active");
    $("body.loginPageBody .wrapper .right .box .formTabContent").hide();
    var tab = $(this).index();
    $("body.loginPageBody .wrapper .right .box .formTabContent:eq("+tab+")").fadeIn();
    return false;
    });
  });
  $(document).ready(function(){
    $(".formTabContent p.check i.close").click(function(){
      $(this).parent("p").hide();
    });
  });

  </script>

</body>
</html>
