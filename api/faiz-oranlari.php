<?php
include 'api_helper.php';
function wp_is_mobile() {
    if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
        $is_mobile = false;
    } elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false // Many mobile devices (all iPhone, iPad, etc.)
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Silk/' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Kindle' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' ) !== false ) {
        $is_mobile = true;
    } else {
        $is_mobile = false;
    }

    /**
     * Filters whether the request should be treated as coming from a mobile device or not.
     *
     * @since 4.9.0
     *
     * @param bool $is_mobile Whether the request is from a mobile device or not.
     */
    return $is_mobile;
}
$type = @$_GET['type'];
$kaynak = get_url_curl("https://finans.mynet.com/faiz/");
preg_match_all('@<tbody class="tbody-type-default">(.*?)</tbody>@si', $kaynak, $table);
if(empty($type)) $type = "try";

if($type == "try") {
    $key_num = 0;
}else if($type == "usd") {
    $key_num = 1;
}else if($type == "eur") {
    $key_num = 2;
}else{
    $key_num = 0;
}
preg_match_all('@<span class="mr-2">(.*?)</span>@si', $table[1][$key_num], $name);
preg_match_all('@<tr>(.*?)</tr>@si', $table[1][$key_num], $value_data);

if(wp_is_mobile()){ ?>
    <tr style="width: 100%;float:left;">
        <th style="text-align: left;float:left;width: 80%;">Banka</th>
        <th style="padding-left: 0px;text-align: left;display: block;float:left;width: 20%;">1 Aylık	</th>
    </tr>
<?php }else{
    ?>
    <tr>
        <th style="text-align: left;">Banka</th>
        <th style="padding-left: 0px;text-align: left;">1 Aylık	</th>
        <th style="padding-left: 0px;text-align: left;">3 Aylık	</th>
        <th style="padding-left: 0px;text-align: left;">6 Aylık	</th>
        <th style="padding-left: 0px;text-align: left;">12 Aylık	</th>
    </tr>
    <?php
}?>
<?php foreach($name[1] as $key=>$val):
    preg_match_all('@<td class="text-center">(.*?)</td>@si', $value_data[1][$key], $val_data);
    if(wp_is_mobile()){
        ?>
        <tr style="width: 100%; float:left;">
            <td style="font-weight: 500;width: 75%;text-align: left;float:left;display: block;overflow: hidden;white-space: nowrap;padding-right: 10px;margin-right: 5%;"><?=$name[1][$key]?></td>
            <td style="font-weight: 500;padding-left: 0px;width: 20%;text-align: left;float:left;padding: 0;display: block;"><?=$val_data[1][0]?></td>
        </tr>
        <?php
    }else{
        ?>
        <tr>
            <td style="font-weight: 500;width: 240px;text-align: left;"><?=$name[1][$key]?></td>
            <td style="font-weight: 500;padding-left: 0px;width: 60px;text-align: left;"><?=$val_data[1][0]?></td>
            <td style="font-weight: 500;padding-left: 0px;width: 60px;text-align: left;"><?=$val_data[1][1]?></td>
            <td style="font-weight: 500;padding-left: 0px;width: 60px;text-align: left;"><?=$val_data[1][2]?></td>
            <td style="font-weight: 500;padding-left: 0px;width: 60px;text-align: left;"><?=$val_data[1][3]?></td>
        </tr>
        <?php
    }
endforeach; ?>