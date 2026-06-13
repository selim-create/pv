<?php

CSF::createWidget( 'en_cok_takip_edilen_hisseler', [
	'title'       => 'En Çok Takip Edilen Hisseler',
	'classname'   => 'en-cok-takip-edilen-hisseler',
	'description' => 'En Çok Takip Edilen Hisseler',
	'fields'      => [
		[
			'id'      => 'baslik',
			'type'    => 'text',
			'title'   => 'Başlık',
			'default' => 'En Çok Takip Edilen Hisseler',
		],
	],
] );

if ( ! function_exists( 'en_cok_takip_edilen_hisseler' ) ) {
	function en_cok_takip_edilen_hisseler( $args, $instance ) {
		global $bp_options;
		include 'api/api_helper.php';
		$kaynak = json_decode( get_data_service( 'mynet?url=https://finans.mynet.com/static/most-shares-live-user-data.json' ), true );
		
		
		?>
        <style>
            .sidebarArtan:before {
                background: #32ba5b !important;
            }
        </style>
        <!-- Widget -->
        <div class="widget">
            <div class="sidebarHead sidebarArtan"><?= $instance['baslik'] ?></div>
            <table class="currencyTable" style="border-top: 0;width: 302px;margin-top: 20px;border-top: 1px solid #dcdcdc;">
                
                <tbody>
                <tr>
                    <td><b style="color: #222 !important;">Hisse</b></td>
                    <td><b style="color: #222 !important;">Kişi Sayısı</b></td>
                </tr>
				<?php foreach ( $kaynak['pages'] as $key => $value ):
					if ( $key == 0 ) {
						continue;
					}
					$value['title'] = explode( 'Hisse Senedi', $value['title'] )[0];
					?>
                    <tr>
                        <td><a href="<?php bloginfo( "home" ) ?>/<?= $bp_options['page_hisse'] ?>/?h=<?= str_replace( "", null,
								explode( "hisseler/", $value['path'] )[1] ) ?>" style="color: #3b72de !important;font-weight:500;"><?= $value['title'] ?></a></td>
                        <td><?= $value['stats']['people'] ?></td>
                    
                    </tr>
					<?php if ( $key > 5 ): break; endif; endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- #Widget -->
		
		<?php
	}
}

?>
