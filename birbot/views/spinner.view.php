<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri() . "/birbot/assets/style.css"?>">
<script src="<?=get_template_directory_uri() . "/birbot/assets/plugin.js"?>"></script>
<?php
global $wpdb;

$words = $wpdb->get_results ( "SELECT * FROM  kelimeler" );

?>
<div class="bib-content">
  <h3>Makale Özgünleştirici</h3>
  <div class="bib-config" style="margin-bottom: 10px;">

    <form action="<?=admin_url("admin.php?page=birbot-spinner")?>" method="post">
      <label>Kelime 1: </label><input type="text" name="kelime" class="bib-input-config" placeholder="Kelime 1" /><br />
      <label>Kelime 2: </label><input type="text" name="kelime2" class="bib-input-config" placeholder="Kelime 2" /><br />
      <p style="margin-left: 220px;">Değiştirilmesini istediğiniz kelimeleri yazabilirsiniz.</p>
      <label></label><input type="submit" class="button button-primary" value="Kaydet" />
    </form>

  </div>

  <div class="bib-config">

    <div style="width: 100%; max-height: 300px; overflow-y: auto;">
      <?php $next = 0; foreach ($words as $key => $value) {
        if($next == 1){
          $next = 0;
          continue;
        }else{
          $next = 1;
        }

        echo '<span class="id_'.$value->id.'">'.$value->kelime.' -> '.$value->kelime1." <a href='javascript:;' onclick='deleteWord(".$value->id.")'>Sil</a></span><br />";
      }?>
    </div>
  </div>
</div>

<script>
  function deleteWord(id)
  {

        jQuery.ajax({
          type:'POST',
          data:{
            action:'delete_spin_word',
            id:id
          },
          url: "/wp-admin/admin-ajax.php",
          success: function(value) {
            $(".id_"+id).hide();
          }
        });

  }
</script>
