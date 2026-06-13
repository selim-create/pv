<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri() . "/birbot/assets/style.css"?>">
<script src="<?=get_template_directory_uri() . "/birbot/assets/plugin.js"?>"></script>

<div class="bib-dataArea">
  <div class="bib-data">
    <form action="javascript:;" method="post" class="dataForm" data-id="0" id="dataForm0">
    <div class="left">
      <label>Başlık</label><input type="text" class="bib-input" name="post_title" value="<?=$_POST['post_title']?>" />
      <label>Özet</label><input type="text" class="bib-input" name="post_ozet" value="<?=$_POST['post_ozet']?>" />
      <label>Resim</label><input type="text" class="bib-input" name="post_image" value="<?=$_POST['post_image']?>" />
      <label>Etiket</label><input type="text" class="bib-input" name="post_tags" value="<?=$_POST['post_tags']?>" />
      <label>Durumu</label><select class="bib-input" name="post_status" style="margin-bottom: 20px;">
        <option value="publish">Yayınlanmış</option>
        <option value="draft">Taslak</option>
        <option value="future">Zamanla</option>
      </select>
      <?php
      $content = str_replace("\\",null,$_POST['post_content']);
      $editor_id = 'post_content';

      wp_editor( $content, $editor_id );
      ?>

      <input type="hidden" name="action" value="birbotInsertPost" />
      <input type="hidden" name="user_id" value="<?=get_current_user_id();?>" />
    </div>
    <div class="right">
      <span>Kategoriler</span>
      <ul class="categorychecklist form-no-clear">
        <?php foreach(get_category_options() as $key=>$value): ?>
          <li class="popular-category"><label class="selectit"><input value="<?=$key?>" type="checkbox" name="post_category[]" id="in-category-<?=$key?>"> <?=$value?></label></li>
        <?php endforeach; ?>
       </ul>
    </div>
    <div class="bottom">
      <input type="submit" style="margin-top: 20px;" value="Kaydet" class="button button-primary insert_btn_0" onclick="insertData(0);" />
    </div>
  </form>
  </div>


</div>
