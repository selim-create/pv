<?php
global $bp_options;
include 'api_helper.php';
if (!isset($bp_options['cache_time'])) {
    $bp_options['cache_time'] = 5;
}
$DataCache = new DataCache($bp_options['cache_time']);

if ($DataCache->get('altin.json')) {
    $altin_data = $DataCache->get('altin.json');
} else {
    $altin_data = get_data_service("altin");

    if (isset($altin_data)) {
        $DataCache->write('altin.json', $altin_data);
    }
    $altin_data = $DataCache->get('altin.json');
}
if ($DataCache->get('doviz.json')) {
    $currency_data = $DataCache->get('doviz.json');
} else {
    $currency_data = get_data_service("currency");
    if (isset($currency_data)) {
        $DataCache->write('doviz.json', $currency_data);
    }
    $currency_data = $DataCache->get('doviz.json');
}
foreach($currency_data['full_name'] as $key => $value){
    $currency_data['full_name'][$key] = str_replace('D&uuml;nya Katılım','',$value);
}
if ($DataCache->get('parite.json')) {
    $parite_data = $DataCache->get('parite.json');
} else {
    $parite_data = get_data_service("parite");
    $DataCache->write('parite.json', $parite_data);
    $parite_data = $DataCache->get('parite.json');
}

if ($DataCache->get('borsa.json')) {
    $borsa_data = $DataCache->get('borsa.json');
    $bist100_data = $borsa_data['bist_100'];
    $borsa_artanlar_data = $borsa_data['borsa_artanlar'];
    $borsa_azalanlar_data = $borsa_data['borsa_azalanlar'];
    $borsa_islem_gorenler_data = $borsa_data['borsa_islem_gorenler'];
    $hisse = $borsa_data['hisse'];
} else {
    $borsa_data = get_data_service("borsa");
    $DataCache->write('borsa.json', $borsa_data);

    $borsa_data = $DataCache->get('borsa.json');
    $bist100_data = $borsa_data['bist_100'];
    $borsa_artanlar_data = $borsa_data['borsa_artanlar'];
    $borsa_azalanlar_data = $borsa_data['borsa_azalanlar'];
    $borsa_islem_gorenler_data = $borsa_data['borsa_islem_gorenler'];
    $hisse = $borsa_data['hisse'];
}
