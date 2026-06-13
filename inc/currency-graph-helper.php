<?php
function get_currency_graph($type)
{
    switch ($type) {
        case 'gram-altin':
            $borsa = get_url_curl("https://bigpara.hurriyet.com.tr/altin/gram-altin-fiyati/");
            preg_match_all('@/v1/chart/exchangegold/(.*?)/@si', $borsa, $exchange_id);

            $gunluk_data = json_decode(get_bigpara($ad = "https://bigpara.hurriyet.com.tr/api/v1/chart/exchangegold/" . $exchange_id[1][0] . "/1"), true);


            foreach ($gunluk_data as $key => $value) {
                $result_data[$key]['tarih'] = (strtotime($value['tarih']) * 1000) + 10850000;
                $result_data[$key]['fiyat'] = $value['kapanis'];
            }

            break;

        case 'dolar':
            $dovizData = get_url_curl("https://finans.mynet.com/doviz/usd/");

            preg_match_all('@initChartData\({(.*?)}\)@si', $dovizData, $gunluk_data);


            $gunluk_data[1][0] = json_decode("{" . $gunluk_data[1][0] . "}", true);
            $gunluk_data[1][0]['data'] = array_reverse($gunluk_data[1][0]['data']);
            foreach ($gunluk_data[1][0]['data'] as $key3 => $value) {
                if ($key3 < 100) {
                    $result_data[$key3]['tarih'] = $value[0];
                    $result_data[$key3]['fiyat'] = $value[1];
                }
            }

            break;

        case 'euro':
            $dovizData = get_url_curl("https://finans.mynet.com/doviz/eur/");

            preg_match_all('@initChartData\({(.*?)}\)@si', $dovizData, $gunluk_data);


            $gunluk_data[1][0] = json_decode("{" . $gunluk_data[1][0] . "}", true);
            $gunluk_data[1][0]['data'] = array_reverse($gunluk_data[1][0]['data']);
            foreach ($gunluk_data[1][0]['data'] as $key3 => $value) {
                if ($key3 < 100) {
                    $result_data[$key3]['tarih'] = $value[0];
                    $result_data[$key3]['fiyat'] = $value[1];
                }
            }

            break;

        case 'btc':
            $dovizData = get_url_curl("https://finans.mynet.com/bitcoin-kripto/");

            preg_match_all('@initChartData\({(.*?)}\)@si', $dovizData, $gunluk_data);


            $gunluk_data[1][0] = json_decode("{" . $gunluk_data[1][0] . "}", true);
            $gunluk_data[1][0]['data'] = array_reverse($gunluk_data[1][0]['data']);
            foreach ($gunluk_data[1][0]['data'] as $key3 => $value) {
                if ($key3 < 100) {
                    $result_data[$key3]['tarih'] = $value[0];
                    $result_data[$key3]['fiyat'] = $value[1];
                }
            }

            break;
    }

    return $result_data;
}


function get_last_chat_message($page_id, $type, $prefix_type = 'c')
{
    global $bp_options, $wpdb;
    if (!isset($bp_options['canliSohbetTablo']) || $bp_options['canliSohbetTablo'] == false) {
        return false;
    }
    $live_chat = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "bt_live_chat WHERE page_id = $page_id AND type='" . $type . "' ORDER BY id DESC LIMIT 1");
    if ($live_chat && $live_chat[0]->text) {
        echo '<tr>
           <td colspan="4">
            <div style="position:relative;padding:16px 14px 12px;margin:16px 0px; background:#3b72de0a;border-radius:4px;">
            <svg style="position:absolute;left:-6px;top:-5px;width:18px;opacity:0.85; " xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18">
  <path id="iconmonstr-quote-7" d="M11,9.275A12.324,12.324,0,0,1,1,21L.016,18.874A8,8,0,0,0,4.4,13.128,5.213,5.213,0,0,1,0,7.979,4.973,4.973,0,0,1,5.2,3C8.214,3,11,5.305,11,9.275Zm13,0A12.324,12.324,0,0,1,14,21l-.984-2.126a8,8,0,0,0,4.38-5.746A5.213,5.213,0,0,1,13,7.979,4.973,4.973,0,0,1,18.2,3C21.214,3,24,5.305,24,9.275Z"
  transform="translate(24 21) rotate(180)" fill="#3b72de"/>
</svg>
 <svg style="position:absolute;right:-6px;bottom:-6px;width:18px;opacity:0.85;transform: rotate(180deg);" xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18">
  <path id="iconmonstr-quote-7" d="M11,9.275A12.324,12.324,0,0,1,1,21L.016,18.874A8,8,0,0,0,4.4,13.128,5.213,5.213,0,0,1,0,7.979,4.973,4.973,0,0,1,5.2,3C8.214,3,11,5.305,11,9.275Zm13,0A12.324,12.324,0,0,1,14,21l-.984-2.126a8,8,0,0,0,4.38-5.746A5.213,5.213,0,0,1,13,7.979,4.973,4.973,0,0,1,18.2,3C21.214,3,24,5.305,24,9.275Z"
  transform="translate(24 21) rotate(180)" fill="#3b72de"/>
</svg>
<style>
a.flexible-text{
    overflow: hidden;
    margin-bottom:10px;
    text-overflow: ellipsis;
    -webkit-box-orient: vertical;
    max-width: 420px;
    white-space: nowrap;
    -webkit-line-clamp: 1;
    line-height:1.2;
    font-weight:500;
    font-size:14px;
    color:#000000;
}
@media only screen and (max-width: 1170px){
    a.flexible-text{
      max-width: 478px;
    }

}

@media only screen and (max-width: 1024px){
    a.flexible-text{
     max-width: calc(100vw - 105px);
    }
}

span.comment-span{
    width:auto;
    display:block;
    font-weight:500;
    font-size:14px;
    color:#3b72de;
}
</style>
            <a class="flexible-text" href="' . get_the_permalink($page_id) . '/?' . $prefix_type . '=' . $type . '"> '  . strip_tags(html_entity_decode($live_chat[0]->text)) . ' </a>

             <div style="display:flex;width:100%;justify-content:space-between;">

             <span class="comment-span">@' . $live_chat[0]->name . '</span>
             <span class="comment-span">( ' .  human_time_diff($live_chat[0]->time, time())  . ' önce )</span>


             </div>

            </div>
            </td>
            </tr>';
    }
}
