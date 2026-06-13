<?php
/*
  Template Name: Üye Şifre Değiştir
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
      <div class="uyeProfil" <?php if(wp_is_mobile()):?> style="padding-bottom: 0px;" <?php endif; ?>>
        <div class="uyeProfilSidebar">
          <ul>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofili']?>"><i class="menu-icon profil"></i><?php if(wp_is_mobile()):?>Profil A. <?php else: ?>Profil Ayarlarım<?php endif; ?></a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofilfotografi']?>"><i class="menu-icon ayarlar"></i>Fotoğrafım </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyesifredegistir']?>" class="active"><i class="menu-icon sifre"></i>Şifre Değiştir </a></li>
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
              <div class="uyeProfilFormTitle">Şifre Değiştir</div>
              <form action="javascript:;">
                <div class="form-row"><p>Eski Şifreniz : </p> <input type="password" class="last_password" value=""></div>
                <div class="form-row"><p>Yeni Şifreniz : </p> <input type="password" class="new_password" value=""></div>
                <div class="form-row"><p>Yeni Şifre Tekrar : </p> <input class="new_password_retry" type="password" value=""></div>
                <div class="form-result success" style="display: none;">Kaydedildi</div>
                <div class="form-result error" style="display: none;">Hata oluştu</div>
                <div class="form-result error uyumsuz" style="display: none;">Şifreleriniz uyumsuz</div>
                <div class="form-result error sifre_hatali" style="display: none;">Eski şifreniz hatalı</div>
                <button class="submit-btn" onclick="password_update();">Kaydet</button>
                <div class="clear"></div>
              </form>
            </div>
          </div>

          <!--<div class="widget">
            <div class="uyeProfilForm profilFotograf">
              <div class="uyeProfilVector"><img src="<?php bloginfo("template_directory");?>/img/icons/uyeprofil/general.png" alt=""></div>
              <div class="uyeProfilFormTitle">Profil Fotoğrafınız</div>
              <form action="" class="avatar">
                <div class="form-row photo-select">
                  <p>Profil Fotoğrafınız : </p>
                  <div class="form-row-content"><div class="profile-photo"></div></div>
                </div>
                <div class="clear"></div>
                <div class="form-row">
                  <p>Fotoğraf Yükleyin : </p>
                  <div class="form-row-content">
                      <div class="input-container">
                        <input type="file" id="real-input">
                        <button type="button" class="browse-btn"></button>
                      </div>
                      <button class="upload-btn">Yükle</button>
                      <div class="file-status-msg">Yükleniyor..</div>

                  </div>
                </div>
                <div class="form-result success">Başarılı Check</div>
                <button class="submit-btn">Kaydet</button>
                <div class="clear"></div>
              </form>
            </div>
          </div>

          <div class="widget">
            <div class="uyeProfilForm sosyalHesaplar">
              <div class="uyeProfilVector"><img src="<?php bloginfo("template_directory");?>/img/icons/uyeprofil/general.png" alt=""></div>
              <div class="uyeProfilFormTitle">Sosyal Medya Hesaplarınız</div>
              <form action="">
                <div class="form-row fb"><p>Facebook Profiliniz : </p> <input type="text"></div>
                <div class="form-row tw"><p>Twitter Profiliniz : </p> <input type="text"></div>
                <div class="form-row ig"><p>Instagram Profiliniz : </p> <input type="text"></div>
                <div class="form-result error">Başarısız check</div>
                <button class="submit-btn">Kaydet</button>
                <div class="clear"></div>
              </form>
            </div>
          </div>-->




        </div>
      </div>

    </div>
  </section>
  <!-- Content -->
  <div class="clear"></div>


</div>
<!-- #Site Wrapper -->
<script>
  function password_update()
  {
    $(".submit-btn").html("...");
    var last_password = $(".last_password").val();
    var new_password   = $(".new_password").val();
    var new_password_retry    = $(".new_password_retry").val();
    $.ajax({
      type: "POST",
      url: "<?php bloginfo("template_directory")?>/user_api.php?type=update_password&_"+$.now(),
      data: "last_password="+last_password+"&new_password="+new_password+"&new_password_retry="+new_password_retry,
      success: function(result) {
        if(result == "Ok"){
            $(".success").show(300);
        }else if(result == "uyumsuz"){
            $(".uyumsuz").show(300);
        }else if(result == "hatali"){
            $(".sifre_hatali").show(300);
        }else{
            $(".hata").show(300);
        }
        $(".submit-btn").html("Kaydet");


      }
    });
  }
</script>
<?php
get_footer();
?>
