<?php
/*
  Template Name: Üye Sosyal Medya
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
      <div class="uyeProfil">
        <div class="uyeProfilSidebar">
          <ul>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofili']?>"><i class="menu-icon profil"></i><?php if(wp_is_mobile()):?>Profil A. <?php else: ?>Profil Ayarlarım<?php endif; ?></a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofilfotografi']?>"><i class="menu-icon ayarlar"></i>Fotoğrafım </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyesifredegistir']?>" ><i class="menu-icon sifre"></i>Şifre Değiştir </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyealarm']?>"><i class="menu-icon alarm"></i>Alarmlarım </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyelistesi']?>"><i class="menu-icon liste"></i>Listelerim </a></li>
            <li><a href="<?php echo esc_url( get_author_posts_url(  $user_data->ID  ) ); ?>"><i class="menu-icon favori"></i>Favorilerim </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyesosyalmedya']?>" class="active"><i class="menu-icon takip"></i>Sosyal Medya </a></li>
            <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="menu-icon cikis"></i>Çıkış Yap </a></li>
          </ul>
        </div>
        <div class="uyeProfilContent">

          <div class="widget">
            <div class="uyeProfilForm sosyalHesaplar">
              <div class="uyeProfilVector"><img src="<?php bloginfo("template_directory");?>/img/icons/uyeprofil/sosyalmedya.png" alt=""></div>
              <div class="uyeProfilFormTitle">Sosyal Medya Hesapları</div>
              <form action="javascript:;">
                <div class="form-row fb"><p>Facebook Profiliniz : </p> <input type="text" class="facebook" value="<?=get_user_meta($user_data->ID, 'facebook', true);?>"></div>
                <div class="form-row tw"><p>Twitter Profiliniz : </p> <input type="text" class="twitter" value="<?=get_user_meta($user_data->ID, 'twitter', true);?>"></div>
                <div class="form-row ig"><p>İnstagram Profiliniz : </p> <input class="instagram" type="text" value="<?=get_user_meta($user_data->ID, 'instagram', true);?>"></div>

                <div class="form-result success" style="display: none;">Kaydedildi</div>
                <div class="form-result error" style="display: none;">Hata oluştu</div>

                <button class="submit-btn" onclick="uye_sosyal();">Kaydet</button>
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
  function uye_sosyal()
  {
    $(".submit-btn").html("...");
    var twitter = $(".twitter").val();
    var instagram   = $(".instagram").val();
    var facebook    = $(".facebook").val();
    $.ajax({
      type: "POST",
      url: "<?php bloginfo("template_directory")?>/user_api.php?type=update_social&_"+$.now(),
      data: "twitter="+twitter+"&instagram="+instagram+"&facebook="+facebook,

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
