<?php
global $bp_options;
$DataCache = new DataCache($bp_options['cache_time']);
if ($DataCache->get('coin.json')) {
	$coin_data = $DataCache->get('coin.json');
} else {
	$coin_data = get_data_service("coin");
	
	if (isset($coin_data)) {
		$DataCache->write('coin.json', $coin_data);
	}
	$coin_data = $DataCache->get('coin.json');
}