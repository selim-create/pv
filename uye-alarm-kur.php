<?php
/*
  Template Name: Üye Alarm Sayfası
*/

get_header();
if(is_user_logged_in())
{

  $current_user = get_current_user_id();
  $user_data = get_userdata($current_user)->data;

  $liste_data = get_user_meta($user_data->ID, "uye_alarm", true);

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
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofili']?>"><i class="menu-icon profil"></i><?php if(wp_is_mobile()):?>Profil A. <?php else: ?>Profil Ayarlarım<?php endif; ?></a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyeprofilfotografi']?>" ><i class="menu-icon ayarlar"></i>Fotoğrafım </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyesifredegistir']?>" ><i class="menu-icon sifre"></i>Şifre Değiştir </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyealarm']?>" class="active"><i class="menu-icon alarm"></i>Alarmlarım </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyelistesi']?>"><i class="menu-icon liste"></i>Listelerim </a></li>
            <li><a href="<?php echo esc_url( get_author_posts_url(  $user_data->ID  ) ); ?>"><i class="menu-icon favori"></i>Favorilerim </a></li>
            <li><a href="<?php bloginfo("home")?>/<?=$bp_options['page_uyesosyalmedya']?>"><i class="menu-icon takip"></i>Sosyal Medya </a></li>
            <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="menu-icon cikis"></i>Çıkış Yap </a></li>
          </ul>
        </div>
        <div class="uyeProfilContent">


            <div class="currencyShowcase" style="width: 100%;">
              <table class="currencyTable">
                <tr>
                  <th>Döviz</th>
                  <th style="padding-left: 39px;">Güncel</th>
                  <th style="padding-left: 36px;">Miktar</th>
                  <th style="padding-left: 31px;">Çıkar</th>
                </tr>
                <?php error_reporting(0); foreach(@$liste_data['doviz'] as $key=>$val): ?>
                <tr class="<?=$val?>">
                  <?php
                    if(str_replace(",",".",$currency_data['change_rate'][$val]) > 0){
                      $crease_status = "increase";
                    }else{
                      $crease_status = "decrease";
                    }
                  ?>
                    <td><a href="<?=bloginfo("home")?>/doviz/?c=<?=$val?>" style="color: #3b72de;"><img src="<?php bloginfo('template_directory'); ?>/img/flag/<?=$val?>.png" alt=""> <?=$currency_data['full_name'][$val]?></td>
                    <td style="padding-left: 33px;font-weight: normal;"><i class="<?=$crease_status?>"<?php if(wp_is_mobile()): ?> style="position:relative; top: 24.2px;"<?php endif; ?>></i> <?=$currency_data['buying'][$val]?></td>
                    <td style="padding-left: 33px;font-weight: normal;"><?=$liste_data['miktar'][$key]?></td>
                    <td style="padding-left: 33px;font-weight: normal;"><a href="javascript:;" onclick="alarmCikar('<?=$val?>')"><i class="remove_button"></i></a></td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>


        </div>
      </div>

    </div>
  </section>
  <!-- Content -->
  <div class="clear"></div>


<script>
function alarmCikar(doviz)
{
  $.ajax({
    type: "POST",
    url: "<?php bloginfo("template_directory")?>/user_api.php?type=delete_alarm&_"+$.now(),
    data: "doviz="+doviz,
    success: function(result) {
      if(result == "Ok"){
          $("."+doviz).hide(300);
      }else{
          alert("Bir hata oluştu.");
      }


    }
  });
}
</script>

</div>
<!-- #Site Wrapper -->
<?php
get_footer();
?>
