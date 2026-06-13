<?php
/**
 * Birbot Helper
 */
class BirbotHelper
{
  public function get_url_curl($url){
    $curl = curl_init($url);
    curl_setopt ($curl, CURLOPT_TIMEOUT, "50");
    curl_setopt ($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt ($curl, CURLOPT_HEADER, 0);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

    $curlResult = curl_exec($curl);
    curl_close($curl);
    return str_replace(array("\n","\t","\r"),null,$curlResult);
  }

  function birbotCronPost($formData)
  {

    $bib_is_download = get_option("bib_data")['bib_download_image'];
    $bib_spinner     = get_option("bib_data")['bib_spinner'];
    $bib_watermark   = get_option("bib_data")['bib_watermark'];

    global $wpdb;
    if(is_admin())
    {
      $return_data = array();

      $post_content = str_replace("\\", null, $formData['post_content']);
      $user_id = $formData['user_id'];

      $imagename = $user_id."_".rand(100000,999999999).".jpg";
      file_download_birbot($formData['post_image'], $imagename);

      if(!empty($bib_watermark))
      {
        $imagename2 = $user_id."_".rand(100000,999999999)."_1.jpg";
        watermark_image(__DIR__."/storage/".$imagename, $bib_watermark, $imagename2);
        unlink(__DIR__. "/storage/" . $imagename);
        $imagename = $imagename2;
      }


      if($_GET['status'] == 'publish')
      {
        $formData['post_status'] = "publish";
      }else if($_GET['status'] == "draft"){
        $formData['post_status'] = "draft";
      }

      if($bib_spinner == "on"){
        $words = $wpdb->get_results ( "SELECT * FROM  kelimeler" );
        foreach ($words as $key => $value) {
          $dic1[] = $value->kelime;
          $dic2[] = $value->kelime1;
        }

        $post_content = str_replace($dic1, $dic2, $post_content);
      }

      $insert_post = array();
      $insert_post['post_title'] = $formData['post_title'];
      $insert_post['post_content'] = $post_content;
      $insert_post['post_status'] = $formData['post_status'];
      $insert_post['tags_input'] = $formData['post_tags'];
      $insert_post['post_author'] = $user_id;
      $insert_post['post_category'] = $formData['post_category'];


        remove_filter('content_save_pre', 'wp_filter_post_kses');
        remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');
        $kontrol = get_page_by_title($formData['post_title'], OBJECT, 'post');
          if(!$kontrol->ID){
        if ($inserted_id = wp_insert_post($insert_post)) {

          add_post_meta($inserted_id, "bh_haber_ozet", $formData['post_ozet']);

          wp_resim_ekle(".jpg",__DIR__. "/storage/" . $imagename, $inserted_id, $formData['post_title']);

          if($bib_is_download == "on")
          {
            preg_match_all('@src="(.*?)"@si', str_replace("\\",null,$post_content), $image_base64);

            foreach ($image_base64[1] as $key => $value) {
              $imageStorage = $user_id."_".$key.".jpg";
              file_download_birbot($value, $imageStorage);

              $new_res_url[] = upload_img(".jpg",__DIR__."/storage/".$imageStorage, $inserted_id, $formData['post_title']."_".$key);

              unlink(__DIR__."/storage/".$imageStorage);
            }

            $post_content = str_replace($image_base64[1], $new_res_url, $post_content);
          }

          $my_post = array();
          $my_post['ID'] = $inserted_id;
          $my_post['post_content'] = $post_content;

          $basarili = wp_update_post( $my_post );

          add_filter('content_save_pre', 'wp_filter_post_kses');
          add_filter('content_filtered_save_pre', 'wp_filter_post_kses');


          $return_data['success'] = true;
          $return_data['message'] = "İçerik başarıyla eklendi";
      }else{
        $return_data['success'] = false;
        $return_data['message'] = "Bir hata oluştu";
      }
    }else{
      $return_data['success'] = false;
      $return_data['message'] = "Aynı içerik zaten eklenmiş";
    }
    unlink(__DIR__. "/storage/" . $imagename);
    echo json_encode($return_data, true);
    }


  }


}
