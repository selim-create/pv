<?php
include '../../../../wp-config.php';


function sendMessage($mesaj) {
  global $bp_options;
    $content      = array(
        "en" => $mesaj
    );
    $hashes_array = array();
    array_push($hashes_array, array(
        "id" => "like-button",
        "text" => "Like",
        "url" => bloginfo("home")
    ));

    $fields = array(
        'app_id' => $bp_options['onesignalAppId'],
        'included_segments' => array(
            'All'
        ),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content,
        'web_buttons' => $hashes_array
    );

    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic '.$bp_options['onesignalRestApi']
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$doviz = get_url_curl("https://finans.mynet.com/doviz/");

preg_match_all('@<table class="fnNewDataTable ndt-Gray ndt-BorderGray ndt-MediumPadding">(.*?)</table>@si', $doviz, $doviz_alan);
preg_match_all('@<a href="(.*?)" title="(.*?)">(.*?)</a>@si', $doviz_alan[1][0], $doviz_name);
preg_match_all('@<td>(.*?)</td>@si', $doviz_alan[1][0], $doviz_bilgi);

if(!empty($doviz_name[1][0])){
    foreach ($doviz_name[1] as $key => $value) {
    	preg_match_all('@/doviz/(.*?)-@si', $value, $code);
    	if($key == 0){
    		$basla = 1;
    	}else{
    		$basla = ($key*5)+1;
    	}

      $currency_data['change_rate'][$code[1][0]] = substr(str_replace(array("%","."),array("",","),$doviz_bilgi[1][$basla+2]), 0, -2);
      $currency_data['selling'][$code[1][0]]     = str_replace(".",",",$doviz_bilgi[1][$basla]);
      $currency_data['buying'][$code[1][0]]      = str_replace(".",",",$doviz_bilgi[1][$basla+1]);
      $currency_data['code'][$code[1][0]]        = $code[1][0];
			$currency_data['time'][$code[1][0]]        = $doviz_bilgi[1][$basla+3];
      $currency_data['full_name'][$code[1][0]]   = $doviz_name[2][$key];

      $currency_data['change_rate'][] = str_replace(array("%"),array(""),$doviz_bilgi[1][$basla+2]);
      $currency_data['selling'][]     = str_replace(".",",",$doviz_bilgi[1][$basla]);
      $currency_data['buying'][]      = str_replace(".",",",$doviz_bilgi[1][$basla+1]);
			$currency_data['time'][$code[1][0]]        = $doviz_bilgi[1][$basla+3];
      $currency_data['code'][]        = $code[1][0];
      $currency_data['full_name'][]   = $doviz_name[2][$key];

    }
}

foreach (get_users() as $key => $value) {
  $id = $value->ID;
  $alarm = get_user_meta($id, 'uye_alarm', true);
  foreach ($alarm['doviz'] as $key => $value) {
    $current_price = $currency_data['buying'][$value];


    if(substr($current_price,0,4) == $alarm['miktar'][$key]){
      $response = sendMessage(strtoupper($alarm['doviz'][$key])." alarm kurduğunuz miktara ulaşmıştır.");
      $return["allresponses"] = $response;
      $return = json_encode($return);

      $data = json_decode($response, true);
      print_r($data);
      $id = $data['id'];
      print_r($id);

      print("\n\nJSON received:\n");
      print($return);
      print("\n");

      $current_user = get_current_user_id();
      $user_data = get_userdata($current_user)->data;
      $last_doviz = get_user_meta($user_data->ID, "uye_alarm", true);
      if (($key = array_search($alarm['doviz'][$key], $last_doviz['doviz'])) !== false) {
        unset($last_doviz['miktar'][$key]);
        unset($last_doviz['doviz'][$key]);
      }


      if(empty(get_user_meta($user_data->ID, "uye_alarm", true))){
        add_user_meta($user_data->ID, "uye_alarm", $last_doviz);
      }else{
        update_user_meta($user_data->ID, "uye_alarm", $last_doviz);
      }
    }else{
      echo $alarm['miktar'][$key];
    }

  }
}
