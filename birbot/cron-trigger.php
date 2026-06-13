<?php
$actual_link    = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$get_params     = explode("cron-trigger.php", $actual_link)[1];
$url_address    = explode("wp-content", $actual_link)[0];

function trigger_cron($url, $post_fields){
    $curl = curl_init($url);
    curl_setopt ($curl, CURLOPT_TIMEOUT, "50");
    curl_setopt ($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt ($curl, CURLOPT_HEADER, 0);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt ($curl, CURLOPT_POST, 1);
    curl_setopt ($curl, CURLOPT_POSTFIELDS, $post_fields);

    $curlResult = curl_exec($curl);
    curl_close($curl);
    return str_replace(array("\n","\t","\r"),null,$curlResult);
}

$post_fields = "action=birbot_cron";
echo trigger_cron($url_address."wp-admin/admin-ajax.php".$get_params, $post_fields);