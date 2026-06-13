<?php
/**
 * Haberler Core
 */
include get_template_directory() . "/birbot/birbot.functions.php";

class Birbot extends BirbotHelper
{

  function cron_template()
    {
      ?>
        <div class="bib-list">
          <form id="bibCronForm" action="javascript:;" method="post">
          <label>Kaynak Kategori</label><select name="category" class="bib-input cronCat">
          	<option value="https://www.milliyet.com.tr/ekonomi/">Ekonomi</option>
          	<option value="https://www.milliyet.com.tr/otomobil/">OTOMOBİL</option>
          	<option value="https://www.milliyet.com.tr/teknoloji/">TEKNOLOJİ</option>

          </select><br />
          <input type="hidden" class="botCore" value="milliyet" />
          <label class="selectCatLabel">Sizin Kategoriniz</label><ul class="categorychecklist form-no-clear">
            <?php foreach(get_category_options() as $key=>$value): ?>
              <li class="popular-category"><label class="selectit"><input value="<?=$key?>" type="checkbox" name="cron_category" id="in-category-<?=$key?>"> <?=$value?></label></li>
            <?php endforeach; ?>
          </ul><br />

          <label>Cron Linki: </label><input type="text" class="bib-input cron_link"  placeholder="Cron Linki" /><br />
          <input type="submit" value="Oluştur" class="button button-primary" style="margin-left: 170px;margin-top: 10px;" onclick="createCronTemplate();" />
        </div>

      <?php
    }


  function list()
  {
    ?>
      <div class="bib-list">
        <form id="bibForm" action="javascript:;" method="post">
        <label>Kategori</label><select name="category" class="bib-input">
          <option value="https://www.milliyet.com.tr/ekonomi/">Ekonomi</option>
          <option value="https://www.milliyet.com.tr/otomobil/">OTOMOBİL</option>
          <option value="https://www.milliyet.com.tr/teknoloji/">TEKNOLOJİ</option>

        </select><br />
        <label>Sayfa</label><input type="text" class="bib-input" value="1" name="page" /><br />
        <input type="hidden" name="action" value="birbot_data" />
        <input type="hidden" name="core" value="milliyet" />
        <input type="submit" value="Listele" class="button button-primary" onclick="getBotData('haberler');" />
      </div>

      <b class="bib-loading">Yükleniyor...</b>

    <?php
  }

  function data()
  {
    $allowed_html = get_option("bib_data")['bib_allowed_html'];
if(empty($allowed_html))
{
  $allowed_html = "<p><h2><h3><br><strong><b><h4><h5><h6><table><tr><td><th><tbody><img>";
}
    $category = $_POST['category'];
    if($_POST['page'] == 1){
      $kaynak = $this->get_url_curl($category);
    }else{
        $kaynak = $this->get_url_curl($category."?page=".$_POST['page']);
    }



    preg_match_all('@div class="cat-list-card__item"><a target="_blank" href="(.*?)" class="cat-list-card__link">@si', $kaynak, $kLink);

    ?>
    <hr>
    <div class="bib-dataArea">
      <div class="buttonList">
        <button class="button button-primary" onclick="categoryOpen();">Toplu Kategori Seç</button>
        <button class="button button-primary" onclick="allInsertData('publish')">Tümünü Yayınla</button>
        <button class="button button-primary" onclick="allInsertData('draft')">Tümünü Taslak Yayınla</button>
      </div>
      <div class="categoryArea">
        <ul class="categorychecklist form-no-clear">
          <?php foreach(get_category_options() as $key=>$value): ?>
            <li class="popular-category"><label class="selectit"><input value="<?=$key?>" type="checkbox" onclick="checkCategory(<?=$key?>)"> <?=$value?></label></li>
          <?php endforeach; ?>
         </ul>
      </div>
      <?php foreach($kLink[1] as $key_link=>$value_link):

        $kn = $this->get_url_curl("https://www.milliyet.com.tr".$value_link);
        preg_match_all('@<meta name="twitter:title" content="(.*?)" />@si', $kn, $title);
        preg_match_all('@<meta property="og:image" content="(.*?)" />@si', $kn, $image);
        preg_match_all('@"keywords": (.*?)}</script>@si', $kn, $tags_area);

        preg_match_all('@"(.*?)",@si', $tags_area[1][0], $tags);
        preg_match_all('@"description": "(.*?)",@si', $kn, $ozet);
        preg_match_all('@<div class="nd-article__content">(.*?)<div class="article-ads-container taboola-ads">@si', $kn, $content);

        preg_match_all('@<style(.*?)>(.*?)</style>@si', $content[1][0], $remove_style);
        preg_match_all('@<script(.*?)>(.*?)</script>@si', $content[1][0], $remove_script);

        $icerik = str_replace($remove_style[0], null, $content[1][0]);
        $icerik = str_replace($remove_script[0], null, $icerik);

        $icerik = strip_tags($icerik, $allowed_html);
        $icerik = trim($icerik);

        if(empty($title[1][0])): continue; endif;
        ?>
      <div class="bib-data">
        <form action="javascript:;" method="post" class="dataForm" data-id="<?=$key_link?>" id="dataForm<?=$key_link?>">
        <div class="left">
          <label>Başlık</label><input type="text" class="bib-input" name="post_title" value="<?=$title[1][0]?>" />
          <label>Özet</label><input type="text" class="bib-input" name="post_ozet" value="<?=$ozet[1][0]?>" />
          <label>Resim</label><input type="text" class="bib-input" name="post_image" value="<?=$image[1][0]?>" />
          <label>Etiket</label><input type="text" class="bib-input" name="post_tags" value="<?=implode(",",$tags[1])?>" />
          <label>Durumu</label><select class="bib-input" name="post_status">
            <option value="publish">Yayınlanmış</option>
            <option value="draft">Taslak</option>
            <option value="future">Zamanla</option>
          </select>
          <label class="bib-textarea-label">İçerik</label><textarea class="bib-textarea" name="post_content"><?=$icerik?></textarea>
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
           <a href="javascript:;" onclick="birbot_edit(<?=$key_link?>)">Detaylı Düzenle</a>
        </div>
        <div class="bottom">
          <input type="submit" value="Kaydet" class="button button-primary insert_btn_<?=$key_link?>" onclick="insertData(<?=$key_link?>);" />
        </div>
      </form>

      <form style="display: none;" class="birbot_edit_form_<?=$key_link?>" method="post" action="/wp-admin/admin.php?page=birbot-duzenle" target="_blank">
      <div class="left">
        <input type="text" class="bib-input" name="post_title" value="<?=$title[1][0]?>" />
        <input type="text" class="bib-input" name="post_ozet" value="<?=$ozet[1][0]?>" />
        <input type="text" class="bib-input" name="post_image" value="<?=$image[1][0]?>" />
        <input type="text" class="bib-input" name="post_tags" value="<?=implode(",",$tags[3])?>" />

        <textarea class="bib-textarea" name="post_content"><?=$icerik?></textarea>
      </div>

      <div class="bottom">
        <input type="submit" value="Kaydet" class="button button-primary birbot_edit_btn_<?=$key_link?>" />
      </div>
    </form>
      </div>
      <?php endforeach; ?>


    </div>
    <?php
  }

  function cron()
  {

    global $kategori, $kategori_id;
    echo 123;
    $allowed_html = get_option("bib_data")['bib_allowed_html'];
    echo $kategori;
    if(empty($allowed_html))
    {
      $allowed_html = "<p><h2><h3><br><strong><b><h4><h5><h6><table><tr><td><th><tbody><img>";
    }

    $categories = array(
      $kategori
    );

    foreach ($categories as $key => $value) {
      $category = $value;

        $kaynak = $this->get_url_curl($category);



      preg_match_all('@div class="cat-list-card__item"><a target="_blank" href="(.*?)" class="cat-list-card__link">@si', $kaynak, $kLink);

      foreach($kLink[1] as $key_link=>$value_link):
        $kn = $this->get_url_curl("http://www.milliyet.com.tr".$value_link);
        preg_match_all('@<meta name="twitter:title" content="(.*?)" />@si', $kn, $title);
        preg_match_all('@<meta property="og:image" content="(.*?)" />@si', $kn, $image);
        preg_match_all('@"keywords": (.*?)}</script>@si', $kn, $tags_area);

        preg_match_all('@"(.*?)",@si', $tags_area[1][0], $tags);
        preg_match_all('@"description": "(.*?)",@si', $kn, $ozet);
        preg_match_all('@<div class="nd-article__content">(.*?)<div class="article-ads-container taboola-ads">@si', $kn, $content);

        preg_match_all('@<style(.*?)>(.*?)</style>@si', $content[1][0], $remove_style);
        preg_match_all('@<script(.*?)>(.*?)</script>@si', $content[1][0], $remove_script);

        $icerik = str_replace($remove_style[0], null, $content[1][0]);
        $icerik = str_replace($remove_script[0], null, $icerik);

        $icerik = strip_tags($icerik, $allowed_html);
        $icerik = trim($icerik);

        if(empty($title[1][0])): continue; endif;

          $formData['user_id'] = get_current_user_id();
          $formData['post_title'] = $title[1][0];
          $formData['post_content'] = $icerik;
          $formData['post_tags']  = implode(",",$tags[3]);
          $formData['post_image'] = $image[1][0];
          $formData['post_ozet'] = $ozet[1][0];
          $formData['post_status'] = "publish";
          $formData['post_category'] = $kategori_id;
          $this->birbotCronPost($formData);

        endforeach;

    }

  }

}
