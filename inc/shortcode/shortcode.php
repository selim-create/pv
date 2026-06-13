<?php
//ilgili_icerikMakale
function ilgiliMakale( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'title' => 'Recent Portfolios',
      'col' => '3',
      'number' => '1',
      'icerik_id' => ''
      ), $atts ) );

	global $sr_prefix;

	$recent = new WP_Query(array(
		'posts_per_page'=> $number,
		'p'=> $icerik_id,
	));

	$p = '';

	while ($recent->have_posts()) { $recent->the_post();

if ( has_post_thumbnail() ) {
	$postClass = "";
} else {
	$postClass = "no-image";
}

		$p .= '
    <div class="relatedPost">
      <div class="thumb">
        <a href="'.get_the_permalink().'">
          '.get_the_post_thumbnail(get_the_ID(),'').'
        </a>
      </div>
      <div class="text">
        <span class="pTitle"><a href="'.get_the_permalink().'">'.get_the_title().'</a></span>
        <p>'.get_snippet(get_the_content(get_the_ID()), 30).'</p>
        <div class="eT">İlgili İçerik</div>
      </div>
    </div>';

	}

	wp_reset_query();

	return ''.$p.'';

}

add_shortcode('ilgiliMakale', 'ilgiliMakale');

//ilgili_icerikVideo
function ilgiliVideo( $atts, $content = null )

{
	extract( shortcode_atts( array(
      'title' => 'Recent Portfolios',
      'col' => '3',
      'number' => '1',
      'icerik_id' => ''
      ), $atts ) );

	global $sr_prefix;

	$recent = new WP_Query(array(
		'posts_per_page'=> $number,
		'p'=> $icerik_id,
	));

	$p = '';

	while ($recent->have_posts()) { $recent->the_post();

if ( has_post_thumbnail() ) {
	$postClass = "";
} else {
	$postClass = "no-image";
}

		$p .= '<div class="relatedPost articleV">
					<div class="thumb">
						<a href="'.get_the_permalink().'">
							'.get_the_post_thumbnail(get_the_ID(),'').'<i class="videoIcon center"></i>
						</a>
					</div>
					<div class="text">
					<div class="left">
						<span class="pTitle"><a href="'.get_the_permalink().'">'.get_the_title().'</a></span>
							<p>'.excerpt(23).'</p>
						</a>
					</div>
					<div class="button bg"><a href="'.get_the_permalink().'">Videoyu İzle</a></div>
					</div>
				</div>
			';

	}

	wp_reset_query();

	return ''.$p.'';

}

add_shortcode('ilgiliVideo', 'ilgiliVideo');

//alinti
function alinti( $atts, $content = null )

{
	extract( shortcode_atts( array(
      'alintiyazi' => ''
      ), $atts ) );

	$p = '<div class="blockquote"><i></i><p>'.$alintiyazi.'</p></div>';

	return ''.$p.'';

}

add_shortcode('alinti', 'alinti');

function currency($atts) {
global $currency_data, $coin_data, $bist100_data, $altin_data;

$type = explode("{}",$atts['kur']);

if($type[1] == "altin"){
	$rate = $altin_data['altin_rate'][$type[0]];
	$price_buying = $altin_data['altin_price'][$type[0]];
    $price_selling = $altin_data['altin_price'][$type[0]];
	$name = $altin_data['altin_name'][$type[0]];
	$base = "";
}else if($type[1] == "doviz"){
	$rate = $currency_data['change_rate'][$type[0]];
	$price_buying = $currency_data['buying'][$type[0]];
    $price_selling = $currency_data['selling'][$type[0]];
	$name = $currency_data['full_name'][$type[0]];
	$base = strtoupper($type[0]);
}else if($type[1] == "coin"){
	$rate = $coin_data['price_24h'][$type[0]];
	if($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch" ){
        $price_buying = $coin_data['current_price'][$type[0]].",".rand(100,750);
        $price_selling = $coin_data['current_price'][$type[0]].",".rand(100,750);
	}else{
		$price_buying = $coin_data['current_price'][$type[0]];
        $price_selling = $coin_data['current_price'][$type[0]];
	}
	$name = $coin_data['name'][$type[0]];
	$base = permalink($coin_data['name'][$type[0]]);
}else if($type[1] == "bist"){
	$rate = $bist100_data['change_rate'];
	$price_buying = $bist100_data['value'];
    $price_selling = $bist100_data['value'];

	$name = "BIST 100";
	$base = "";
} else if($type[1] == 'hisse') {
	
	$borsa = get_data_service('hisse?hisse=' . $type[0] . '/');
	if(!$borsa){
		?>
<script>
	location.reload();
</script>
<?php
	}
 
	preg_match_all( '@<h1 class="mr-3">(.*?)</h1@si', $borsa, $endeks_name );
	preg_match_all( '@span>Son İşlem Fiyatı</span><span>(.*?)</span>@si', $borsa, $borsa_value );
	preg_match_all( '@<span class="label">Son(.*?)</span>@si', $borsa, $borsa_update );
 
	preg_match_all(
        '@<div class="heading-new-bar-col-item daily-change"><div class="data-value"><span class="change-icon(.*?)change-(.*?)  mr-2"></span>(.*?)/ (.*?)</div><span class="label">Günlük Değişim</span></div>@si'
        , $borsa,
		$borsa_rate );
	
 
	$currency_data['time'][$type[0]] = $borsa_update[1][0];
 
	$name = $endeks_name[1][0];
	$rate = $borsa_rate[4][0];
	$price_buying = $borsa_value[1][0];
	
}
$rate = str_replace(".",",",number_format(str_replace(",",".",$rate),2));
$name = mb_strtoupper(str_replace(array(
	'ABD Doları', "Euro", "İngiliz Sterlini","Çin Yuanı","Rus Rublesi", "XRP"
),
	array(
		'$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
	),$name), "UTF-8");
if(str_replace(",",".",$rate) > 0){
	$crease_color = "#3BBC9B";
}else{
    $crease_color = "#FF4A69";
}
$return_value = '
<div class="widget" style="width: 100%;">
    <div class="borsaValue kurTrade" style="margin-bottom: 12px;">
     <span>Alış</span>'.$price_buying.'
    </div>';
    if($type[1] != 'hisse') {
	    $return_value .= '<div class="borsaValue kurTrade "><span>Satış</span>' . $price_selling . '</div>';
    }
	
	if($type[1] == 'hisse') {
		$return_value .= '<div class="borsaValue kurTrade "><span>Günlük Değişim (₺)</span>' . $borsa_rate[3][0] . '</div>';
	}
    
    $return_value .= '
    <div class="borsaValue kurTrade">
        <span>Değişim</span><span style="color:'.$crease_color.';font-size: 24px;font-weight: 900;">'.$rate.'</span>
    </div>
    <div class="lastUpdate2" style="margin-bottom: 12px;margin-top: 0px;">Son Güncelleme: '.$currency_data['time'][$type[0]].'</div>
</div>
<style>
p{clear: both;}
.kurTrade{margin-top: 0px;}
</style>
';
return $return_value;

}

add_shortcode('currency', 'currency');