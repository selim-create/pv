<?php
/*
  Template Name: Üye Profil Fotoğrafı
*/

get_header();
if(is_user_logged_in())
{
  global $user_ID;
  $current_user = $user_ID;
  $user_data = get_userdata($current_user)->data;

}else{
  ?><script>
  window.location.href = "<?php bloginfo("home")?>";
  </script><?php
  exit();
}

?>
<!-- Site Wrapper -->
<div class="site-wrapper">

<?php if(wp_is_mobile()){
  ?>
    <style>
      .uyeProfilSidebar ul li .active{color: #fff;background: #fab915;font-weight: 500;}
    </style>
  <?php
}?>

  <!-- Content -->
  <section class="content home">
    <div class="container-wrap">
      <div class="uyeProfil">
        <div class="uyeProfilSidebar">
          <ul>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofili']?>"><i class="menu-icon profil"></i><?php if(wp_is_mobile()):?>Profil A. <?php else: ?>Profil Ayarlarım<?php endif; ?></a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofilfotografi']?>" class="active"><i class="menu-icon ayarlar"></i>Fotoğrafım </a></li>
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
            <div class="uyeProfilForm profilFotograf">
              <div class="uyeProfilVector"><img src="<?php bloginfo("template_directory")?>/img/icons/uyeprofil/profilfoto.png" alt=""></div>
              <div class="uyeProfilFormTitle">Profil Fotoğrafınız</div>
              <form action="<?php bloginfo("template_directory")?>/user_api.php?type=upload_profile" method="post" class="avatar" enctype="multipart/form-data">
                <div class="form-row photo-select">
                  <p>Profil Fotoğrafınız : </p>
                  <div class="form-row-content"><div class="profile-photo">
                    <?php if(!empty(get_user_meta($user_data->ID, "profil_pic", true))){?>
                    <img src="<?php bloginfo("template_directory")?>/profile/<?=get_user_meta($user_data->ID, "profil_pic", true)?>" style="border-radius: 50%;" />
                    <?php } ?>
                    </div>
                </div>
                </div>
                <div class="clear"></div>
                <div class="form-row">
                  <p>Fotoğraf Yükleyin : </p>
                  <div class="form-row-content">
                      <div class="input-container">
                        <input type="file" name="userfile" id="real-input">
                        <button type="button" class="browse-btn"></button>

                      </div>
                      <?php if(!wp_is_mobile()){
                          ?><span style="margin-left: 12px; font-size: 12px;">Yüklediğiniz resim jpg uzantısında olmalı.</span><?php
                      }?>

                  </div>
                </div>
                <?php if(@$_GET['error'] == "true"){?>
                  <div class="form-result error">Yüklediğiniz resim jpg uzantısında olmalı.</div>
                <?php } ?>
                <button class="submit-btn" type="submit">Kaydet</button>
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
  const uploadButton = document.querySelector('.browse-btn');
  const fileInfo = document.querySelector('.file-info');
  const realInput = document.getElementById('real-input');

  uploadButton.addEventListener('click', () => {
    realInput.click();
  });

  realInput.addEventListener('change', () => {
    const name = realInput.value.split(/\\|\//).pop();
    const truncated = name.length > 20
      ? name.substr(name.length - 20)
      : name;

    fileInfo.innerHTML = truncated;

  });
</script>
<?php
get_footer();
?>
