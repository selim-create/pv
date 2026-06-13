<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri() . "/birbot/assets/style.css"?>">
<script src="<?=get_template_directory_uri() . "/birbot/assets/plugin.js"?>"></script>
<?php
$bib_config = get_option("bib_data");

?>
<div class="bib-content">
  <h3>Ayarlar</h3>
  <div class="bib-config">
    <form action="<?=admin_url("admin.php?page=birbot-config")?>" method="post">
      <label>Yerel Haberler Linki</label><input type="text" class="bib-input-config" value="<?=$bib_config['bib_yerel_haberler']?>" name="bib_yerel_haberler" /><br />
      <p class="bib-config-desc">Örnek : <b>https://www.haberler.com/cukurova/</b></p>
      <label>İzin Verilen HTML Etiketleri</label><input type="text" class="bib-input-config" value="<?=$bib_config['bib_allowed_html']?>" name="bib_allowed_html" /><br />
      <p class="bib-config-desc">Örnek : <b><?=htmlspecialchars("<p><h2><h3><br><strong><b><img><h4><h5><h6>")?></b></p>
      <label>Resimler Sunucuya İndir</label><input type="checkbox" <?php if($bib_config['bib_download_image'] == "on"): echo 'checked'; endif;?> name="bib_download_image"/><br />
      <label>Makale Özgünleştirici Aktif</label><input type="checkbox" <?php if($bib_config['bib_spinner'] == "on"): echo 'checked'; endif;?> name="bib_spinner"/>
      <p>
        <label>Watermark Resmi</label><input type="text" class="regular-text process_custom_images bib-input-config" id="process_custom_images" name="bib_watermark" value="<?=$bib_config['bib_watermark']?>"><br />
        <label></label><button class="set_custom_images button">Resim Seç</button>
      </p>
      <hr>
      <label>Manşete Eklensin Mi</label><input type="checkbox" <?php if($bib_config['bib_anasayfa_slider'] == "on"): echo 'checked'; endif;?> name="bib_anasayfa_slider"/><br />
      <label>4'lü Kayan Slider'a Eklensin Mi</label><input type="checkbox" <?php if($bib_config['bib_anasayfa_kayan'] == "on"): echo 'checked'; endif;?> name="bib_anasayfa_kayan"/><br />
      <label></label><p></p>
      <label></label><input type="submit" class="button button-primary" value="Kaydet" />
    </form>
  </div>
</div>
<script>

jQuery(document).ready(function() {
    var $ = jQuery;
    if ($('.set_custom_images').length > 0) {
        if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
            $('.set_custom_images').on('click', function(e) {
                e.preventDefault();
                var button = $(this);
                var id = button.prev();
                wp.media.editor.send.attachment = function(props, attachment) {
                    $(".regular-text").val(attachment.url);
                };
                wp.media.editor.open(button);
                return false;
            });
        }
    }
});

</script>
