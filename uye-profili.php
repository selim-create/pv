<?php
/*
  Template Name: Üye Profili
*/

get_header();
if(is_user_logged_in())
{

  $current_user = get_current_user_id();

  $user_data = get_userdata($current_user)->data;

}else{
  ?><script>
  window.location.href = "<?php bloginfo("home")?>";
  </script><?php
  exit();
}

?>
<?php if(wp_is_mobile()){
  ?>
    <style>
      .uyeProfilSidebar ul li .active{color: #fff;background: #fab915;font-weight: 500;}
    </style>
  <?php
}?>
<!-- Site Wrapper -->
<div class="site-wrapper">



  <!-- Content -->
  <section class="content home">
    <div class="container-wrap">
      <!--<div class="search-form">
        <form action="">
          <span>Aranacak kelimeyi yazın ve <small>enter</small> tuşuna basın...</span>
          <input type="text" placeholder="" value="">
        </form>
      </div>-->
      <div class="uyeProfil">
        <div class="uyeProfilSidebar">
          <ul>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofili']?>" class="active"><i class="menu-icon profil"></i><?php if(wp_is_mobile()):?>Profil A. <?php else: ?>Profil Ayarlarım<?php endif; ?></a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofilfotografi']?>"><i class="menu-icon ayarlar"></i>Fotoğrafım </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyesifredegistir']?>" ><i class="menu-icon sifre"></i>Şifre Değiştir </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyealarm']?>"><i class="menu-icon alarm"></i>Alarmlarım </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyelistesi']?>"><i class="menu-icon liste"></i>Listelerim </a></li>
            <li><a href="<?php echo esc_url( get_author_posts_url(  $user_data->ID  ) ); ?>"><i class="menu-icon favori"></i>Favorilerim </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyesosyalmedya']?>"><i class="menu-icon takip"></i>Sosyal Medya </a></li>
            <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="menu-icon cikis"></i>Çıkış Yap </a></li>
          </ul>
        </div>
        <div class="uyeProfilContent">

          <div class="widget">
            <div class="uyeProfilForm genelAyarlar">
              <div class="uyeProfilVector"><img src="<?php bloginfo("template_directory");?>/img/icons/uyeprofil/general.png" alt=""></div>
              <div class="uyeProfilFormTitle">Hesabınızın Genel Ayarları</div>
              <form action="javascript:;">
                <div class="form-row"><p>Adınız : </p> <input type="text" class="user_firstname" value="<?=get_user_meta($user_data->ID, 'first_name', true);?>"></div>
                <div class="form-row"><p>Soyadınız : </p> <input type="text" class="user_lastname" value="<?=get_user_meta($user_data->ID, 'last_name', true);?>"></div>
                <div class="form-row"><p>Kullanıcı Adınız : </p> <input type="text" value="<?=$user_data->user_login?>" disabled></div>
                <div class="form-row"><p>E-Posta Adresiniz : </p> <input type="text" class="user_email" value="<?=$user_data->user_email?>"></div>
                <div class="form-row"><p>Biyografi notunuz : </p> <input type="text" class="user_biyografi" value="<?=get_user_meta($user_data->ID, 'biyografi', true);?>"></div>
                <div class="form-result success" style="display: none;">Kaydedildi</div>
                <div class="form-result error" style="display: none;">Hata oluştu</div>
                <button class="submit-btn" onclick="profil_update();">Kaydet</button>
                <div class="clear"></div>
              </form>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
  <!-- Content -->
  <div class="clear"></div>


</div>
<!-- #Site Wrapper -->
<script>
  function profil_update()
  {
    $(".submit-btn").html("...");
    var email = $(".user_email").val();
    var firstname   = $(".user_firstname").val();
    var lastname    = $(".user_lastname").val();
    var biyografi   = $(".user_biyografi").val();
    $.ajax({
      type: "POST",
      url: "<?php bloginfo("template_directory")?>/user_api.php?type=edit_profile&_"+$.now(),
      data: "user_email="+email+"&user_firstname="+firstname+"&user_lastname="+lastname+"&user_biyografi="+biyografi,
      success: function(result) {
        if(result == "Ok"){
            $(".success").show(300);

        }else{
            $(".error").show(300);
        }
        $(".submit-btn").html("Kaydet");


      }
    });
  }
</script>
<?php
get_footer();
?>
