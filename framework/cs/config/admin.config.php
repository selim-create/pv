<?php

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {
	global $currency_data;
	include get_template_directory() . '/api/DataCache.php';
	$DataCache                 = new DataCache( 5 );
	$currency_data             = $DataCache->get( 'doviz.json' );
	$altin_data                = $DataCache->get( 'altin.json' );
	$parite_data               = $DataCache->get( 'parite.json' );
	$borsa_data                = $DataCache->get( 'borsa.json' );
	$bist100_data              = $borsa_data['bist_100'];
	$borsa_artanlar_data       = $borsa_data['borsa_artanlar'];
	$borsa_azalanlar_data      = $borsa_data['borsa_azalanlar'];
	$borsa_islem_gorenler_data = $borsa_data['borsa_islem_gorenler'];
	$hisse                     = $borsa_data['hisse'];
	
	foreach ( array_unique( $currency_data['full_name'] ) as $key => $value ) {
		$coin_sirala[ $key . '{}doviz' ] = mb_strtoupper( $key, 'UTF-8' );
	}
	
	foreach ( array_unique( $altin_data['altin_name'] ) as $key => $value ) {
		$coin_sirala[ $key . '{}altin' ] = mb_strtoupper( $value, 'UTF-8' );
	}
	$coin_sirala['bist100{}bist'] = 'BIST 100';
	foreach ( array_unique( $coin_data['name'] ) as $key => $value ) {
		$coin_sirala[ $key . '{}coin' ] = mb_strtoupper( $value, 'UTF-8' );
	}
	
	foreach ( $coin_sirala as $key => $value ) {
		$content_string[] = $value . ' -> <b>' . $key . '</b>';
	}
	//
	// Set a unique slug-like ID
	$prefix      = 'birpara';
	$birtema     = wp_get_theme();
	$version     = $birtema->Version;
	$sql_version = get_option( 'birfinans_versiyon' );
	if ( $sql_version != $version ) {
		$version_text = '';
	} else {
		$version_text = '';
	}
	//
	// Create options
	CSF::createOptions( $prefix, [
		'menu_title'      => 'BirFinans Panel' . $version_text,
		'menu_slug'       => 'birpara-panel',
		'show_reset_all'  => false,
		'framework_title' => 'BirFinans Admin Paneli',
		'save_title'      => 'Kaydet',
	] );
	
	foreach ( get_pages() as $key => $value ) {
		$sayfalar[ $value->post_name ] = $value->post_title;
	}
	
	//
	// Create a section
	CSF::createSection( $prefix, [
		'title'  => 'Genel Ayarlar',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			
			[
				'id'    => 'favicon',
				'type'  => 'upload',
				'title' => 'Site Favicon',
				'desc'  => "Tavsiye favicon boyutu: <code>23x23</code>'dir.",
			],
			
			[
				'id'         => 'analyticsCodes',
				'type'       => 'code_editor',
				'sanitize' => false,
				'title'      => 'Analytics Kodları',
				'help'       => 'Google analytics kodlarınızı girebilirsiniz.',
				'settings'   => [
					'theme' => 'mdn-like',
					'mode'  => 'htmlmixed',
				],
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			
			[
				'id'         => 'adsenseHeadCodes',
				'type'       => 'code_editor',
				'sanitize' => false,
				'title'      => 'Adsense Head Kodları',
				'help'       => 'Google analytics kodlarınız sitede head etiketi bitmeden kullanılacaktır.',
				'settings'   => [
					'theme' => 'mdn-like',
					'mode'  => 'htmlmixed',
				],
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'    => 'headerSticky',
				'type'  => 'switcher',
				'title' => 'Header Sticky',
				'desc'  => 'Header stickyi özelliğini bu kısımdan açıp kapatabilirsiniz',
			],
			
			[
				'id'    => 'canliSohbet',
				'type'  => 'switcher',
				'title' => 'Canlı Sohbet Özelliği',
				'desc'  => 'Canlı Sohbet özelliğini bu kısımdan açıp kapatabilirsiniz',
			],
			
			[
				'id'      => 'canliSohbetTablo',
				'type'    => 'switcher',
				'title'   => 'Anasayfa Altın ve Döviz Son Yorumu',
				'desc'    => 'Anasayfada bulunan altın ve döviz tablolarında son yorumu göstermek için bu ayarı aktif edebilirsiniz',
				'default' => false,
			],
			
			[
				'id'         => 'onesignalAppId',
				'type'       => 'text',
				'title'      => 'OneSignal App ID',
				'desc'       => 'Onesignal App ID almayı bilmiyorsanız eğitim videolarından bulabilirsiniz',
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'         => 'onesignalRestApi',
				'type'       => 'text',
				'title'      => 'OneSignal Rest Api',
				'desc'       => 'Onesignal Rest Api almayı bilmiyorsanız eğitim videolarından bulabilirsiniz',
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'         => 'kriptoSlider',
				'type'       => 'switcher',
				'title'      => 'Kriptoparalar Kayan Kısım',
				'desc'       => 'Kriptpara kayan kısımı açıp kapatabilirsiniz',
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'         => 'adminBar',
				'type'       => 'switcher',
				'title'      => 'Admin Çubuğu Görünsün mü',
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'    => 'oneCikanGorselPasif',
				'type'  => 'switcher',
				'title' => 'Öne Çıkan Görseli Gizle',
				'desc'  => 'Bu özelliği aktif ederseniz makale sayfalarınızda öne çıkan görsel gizlenecektir.',
			],
			
			[
				'id'    => 'infiniteScroll',
				'type'  => 'switcher',
				'title' => 'İnfinite Scroll Göster',
				'desc'  => 'Bu özelliği aktif ederseniz makale sayfalarında infinite scroll aktif olacaktır.',
			],
			
			[
				'id'    => 'okunmaSayisiSwitch',
				'type'  => 'switcher',
				'title' => 'Okunma Sayısı Göster',
			],
			
			[
				'id'    => 'tarihSwitch',
				'type'  => 'switcher',
				'title' => 'Tarih Göster',
			],
			
			[
				'id'    => 'sayfaYenileSwitcher',
				'type'  => 'switcher',
				'title' => 'Sayfa Yenilemeyi Aktif Et',
			],
			
			[
				'id'      => 'cache_time',
				'title'   => 'Verilerin Cache Süresi (Dakika)',
				'type'    => 'text',
				'default' => '5',
			],
			
			[
				'id'         => 'sayfaYenileDakika',
				'type'       => 'text',
				'title'      => 'Sayfa Yenileme Süresi',
				'desc'       => '(Dakika)',
				'dependency' => [ 'sayfaYenileSwitcher', '==', 1 ],
			],
			
			[
				'id'    => 'googleNewsLink',
				'type'  => 'text',
				'title' => 'Google News Linki',
			],
		
		],
	] );
	
	//
	// Create a section
	CSF::createSection( $prefix, [
		'title'  => 'Duyurular & Güncellemeler',
		'icon'   => 'fa fa-info-circle',
		'fields' => [
			
			[
				'type'    => 'content',
				'content' => '<center><a href="https://birtema.com/gelistirme-gunlugu?tema=BirFinans" target="_blank">Geliştirme günlüğü sayfasını açmak için tıklayın.</a></center>',
			],
		
		],
	] );
	
	CSF::createSection( $prefix, [
		'title'  => 'Üst Kısım',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			
			[
				'id'    => 'desktop_logo',
				'type'  => 'upload',
				'title' => 'Masaüstü Logosu',
				'desc'  => "Tavsiye edilen logo boyutu: <code>143x26</code>'dir.",
			],
			
			[
				'id'    => 'mobile_logo',
				'type'  => 'upload',
				'title' => 'Mobil Logosu',
				'desc'  => "Tavsiye edilen logo boyutu: <code>143x26</code>'dir.",
			],
			
			[
				'id'    => 'uyeSwitcher',
				'type'  => 'switcher',
				'title' => 'Üye girişini pasif et ?',
				'desc'  => 'Üye girişi butonu gizlenir.',
			],
			
			[
				'id'    => 'desktopCurrency',
				'type'  => 'switcher',
				'title' => 'Masaüstü Header Kur Tablosu Gizlensin mi ?',
				'desc'  => 'Masaüstünde üst kur tablosu gizlensin mi ?',
			],
			
			[
				'id'    => 'mobileCurrency',
				'type'  => 'switcher',
				'title' => 'Mobil Header Kur Tablosu Görünsün mü ?',
				'desc'  => 'Mobilde üst kur tablosu görünsün mü ?',
			],
			
			[
				'id'      => 'headerType',
				'type'    => 'select',
				'options' => [
					'header1' => 'Header 1',
					'header2' => 'Header 2',
				],
				'title'   => 'Üst Kısım Tipi',
			],
			
			[
				'id'      => 'uye_header_style',
				'type'    => 'select',
				'options' => [
					'1' => '1',
					'2' => '2',
				],
				'default' => '1',
				'title'   => 'Üye Giriş Alanı Tipi',
			],
			
			[
				'id'    => 'anlikDegisimSwitcher',
				'type'  => 'switcher',
				'title' => 'Anlık Değişim',
			],
			
			[
				'id'         => 'ustCoinSiralama',
				'type'       => 'accordion',
				'title'      => 'Veri Sıralaması',
				'accordions' => [
					[
						'title'  => 'Sıralama',
						'icon'   => 'fa fa-sort',
						'fields' => [
							[
								
								'id'      => 'ustSira1',
								'type'    => 'text',
								'title'   => 'Sıra 1',
								'default' => 'gram-altin{}altin',
							
							],
							[
								'id'      => 'ustSira2',
								'type'    => 'text',
								'title'   => 'Sıra 2',
								'default' => 'usd{}doviz',
							],
							[
								'id'      => 'ustSira3',
								'type'    => 'text',
								'title'   => 'Sıra 3',
								'default' => 'eur{}doviz',
							],
							[
								'id'      => 'ustSira4',
								'type'    => 'text',
								'title'   => 'Sıra 4',
								'default' => 'gbp{}doviz',
							],
							[
								'id'      => 'ustSira5',
								'type'    => 'text',
								'title'   => 'Sıra 5',
								'default' => 'cny{}doviz',
							],
							[
								'id'      => 'ustSira6',
								'type'    => 'text',
								'title'   => 'Sıra 6',
								'default' => 'rub{}doviz',
							],
							[
								'id'      => 'ustSira7',
								'type'    => 'text',
								'title'   => 'Sıra 7',
								'default' => 'btc{}coin',
							],
							[
								'id'      => 'ustSira8',
								'type'    => 'text',
								'title'   => 'Sıra 8',
								'default' => 'bist100{}bist',
							],
						],
					
					
					],
					[
						'title'  => 'Kısakodlar',
						'icon'   => 'fa fa-behance',
						'fields' => [
							[
								'type'    => 'content',
								'content' => implode( '<br />', $content_string ),
							],
						],
					],
				],
			
			],
		],
	] );
	
	CSF::createSection( $prefix, [
		'title'  => 'Anasayfa',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			
			[
				'id'      => 'kredi_ara_position',
				'type'    => 'select',
				'title'   => 'Kredi Arama Pozisyonu',
				'options' => [
					'left'  => 'Sol',
					'right' => 'Sağ',
				],
				'default' => 'left',
			],
			
			[
				'id'      => 'slider_position',
				'type'    => 'select',
				'title'   => '7\'li Slider Pozisyonu',
				'options' => [
					'right' => 'Sağ',
					'left'  => 'Sol',
				],
				'default' => 'right',
			],
			
			[
				'id'    => 'anasayfaH1',
				'type'  => 'text',
				'title' => 'Anasayfa H1 Yazısı',
			],
		
		],
	] );
	
	CSF::createSection( $prefix, [
		'id'     => 'footer',
		'title'  => 'Footer',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'name'  => 'altGenelAyarlar',
				'title' => 'Genel Ayarlar',
				'icon'  => 'fa fa-window-maximize',
			
			],
		],
	
	
	] );
	
	CSF::createSection( $prefix, [
		'title'  => 'Responsive Menü (Mobil)',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			
			[
				'id'     => 'responsiveMenu',
				'type'   => 'repeater',
				'title'  => 'Responsive Menü',
				'fields' => [
					
					[
						'id'    => 'menu_ismi',
						'type'  => 'text',
						'title' => 'Menü İsmi',
					],
					
					[
						'id'    => 'menu_link',
						'type'  => 'text',
						'title' => 'Menü Link',
					],
					
					[
						'id'      => 'menu_icon',
						'type'    => 'image_select',
						'title'   => 'Menü Icon',
						'options' => [
							'responsive-1'  => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-1.png',
							'responsive-2'  => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-2.png',
							'responsive-3'  => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-3.png',
							'responsive-4'  => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-4.png',
							'responsive-5'  => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-5.png',
							'responsive-6'  => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-6.png',
							'responsive-7'  => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-7.png',
							'responsive-8'  => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-8.png',
							'responsive-9'  => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-9.png',
							'responsive-10' => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-10.png',
							'responsive-11' => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-11.png',
							'responsive-12' => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-12.png',
							'responsive-13' => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-13.png',
							'responsive-14' => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-14.png',
							'responsive-15' => '' . get_bloginfo( 'template_directory' ) . '/img/svg/mobilemenu/responsive-15.png',
						],
					
					],
				
				],
			],
		
		],
	] );
	
	
	//reklamlar
	CSF::createSection( $prefix, [
		'id'     => 'reklamlar',
		'title'  => 'Reklamlar',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'name'  => 'reklamSayfalar',
				'title' => 'Reklamlar',
				'icon'  => 'fa fa-window-maximize',
			
			],
		],
	
	
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'reklamlar',
		'title'  => 'Desktop',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			
			[
				'id'    => 'sagReklam',
				'type'  => 'code_editor',
				'sanitize' => false,
				'title' => 'Sağ Reklam Alanı',
			],
			
			[
				'id'    => 'solReklam',
				'type'  => 'code_editor',
				'sanitize' => false,
				'title' => 'Sol Reklam Alanı',
			],
			
			[
				'id'    => 'ustReklam',
				'type'  => 'code_editor',
				'sanitize' => false,
				'title' => 'Üst Reklam Alanı',
			],
			
			[
				'id'         => 'makaleSayfasiUst',
				'type'       => 'code_editor',
				'sanitize' => false,
				'title'      => 'Makale Sayfası (Üst)',
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'         => 'makaleSayfasiIO',
				'type'       => 'code_editor',
				'sanitize' => false,
				'title'      => 'Makale Sayfası (İçerik Öncesi)',
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'         => 'makaleSayfasiIS',
				'type'       => 'code_editor',
				'sanitize' => false,
				'title'      => 'Makale Sayfası (İçerik Sonrası)',
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'         => 'katSayfasiUst',
				'type'       => 'code_editor',
				'sanitize' => false,
				'title'      => 'Kategori Sayfası (Üst)',
				'attributes' => [
					'placeholder' => '',
				],
			],
		
		],
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'reklamlar',
		'title'  => 'Mobile',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			
			[
				'id'         => 'katSayfasiUstM',
				'type'       => 'code_editor',
				'sanitize' => false,
				'title'      => 'Kategori Sayfası (Üst)',
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'         => 'makaleSayfasiISM',
				'type'       => 'code_editor',
				'sanitize' => false,
				'title'      => 'Makale Sayfası (İçerik Sonrası)',
				'attributes' => [
					'placeholder' => '',
				],
			],
			
			[
				'id'         => 'katSayfasiUstM',
				'type'       => 'code_editor',
				'sanitize' => false,
				'title'      => 'Kategori Sayfası (Üst)',
				'attributes' => [
					'placeholder' => '',
				],
			],
		
		],
	] );
	
	
	//#reklamlar
	
	CSF::createSection( $prefix, [
		'id'     => 'sayfalar',
		'title'  => 'Sayfalar',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'name'  => 'altSayfalar',
				'title' => 'Sayfalar',
				'icon'  => 'fa fa-window-maximize',
			
			],
		],
	
	
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'sayfalar',
		'title'  => 'Giriş / Kayıt Sayfası',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'id'      => 'uyeBaslik',
				'type'    => 'textarea',
				'title'   => 'Sayfa Ana Başlık',
				'desc'    => 'Bu alan h1 etiketinden oluşmaktadır.',
				'default' => 'Üyelerimize Özel Tüm Opsiyonlardan Kayıt Olarak Faydalanabilirsiniz',
			],
			
			[
				'id'      => 'uyeAciklama',
				'type'    => 'textarea',
				'title'   => 'Sayfa Açıklama',
				'desc'    => 'Sayfanın sol bölümündeki açıklama yazısı.',
				'default' => 'Sitemize üye olarak beğendiğiniz içerikleri favorilerinize ekleyebilir, kendi ürettiğiniz ya da internet üzerinde beğendiğiniz içerikleri sitemizin ziyaretçilerine içerik gönder seçeneği ile sunabilirsiniz.',
			],
		
		],
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'sayfalar',
		'title'  => 'Döviz Detay Sayfası',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'id'      => 'doviz_detay_reklam_switcher', // field id
				'type'    => 'switcher',
				'title'   => 'Döviz Sayfası Reklamı',
				'default' => true,
			],
			[
				'id'         => 'doviz_detay_reklam',
				'type'       => 'textarea',
				'title'      => 'Banka Kurları Tablosu Yanındaki Reklam',
				'desc'       => 'Banka kurlarını tablosunun yanındaki reklamı burdan düzenleyebilirsiniz.',
				'default'    => '<div class="flexMiddleAds" style="height: 285px;"></div>',
				'dependency' => [ 'doviz_detay_reklam_switcher', '==', 'true' ],
			],
		
		],
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'sayfalar',
		'title'  => 'Döviz Hesapla Sayfası',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'id'      => 'dovizHesaplaRewrite',
				'type'    => 'text',
				'title'   => 'Döviz Hesapla Sayfası Başlığı',
				'desc'    => 'Sadece miktar ve dolardan sonra olacak kısmı girin. Örnek : Ne Kadar ?',
				'default' => 'Ne Kadar ?',
			],
			
			[
				'type'    => 'submessage',
				'style'   => 'info',
				'content' => 'Başlığı değiştirdikten sonra Ayarlar > Kalıcı Bağlantılar kısmından Değişiklikleri Kaydet butonuna basın.',
			],
		
		],
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'sayfalar',
		'title'  => 'Kredi Sorgulama Sayfası',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'id'    => 'krediSorgulamaRewrite',
				'type'  => 'text',
				'title' => 'Kredi Sorgulama Sayfası Link Yapısı',
				'desc'  => 'Kredi türünden sonraki kısmı giriniz. Örnek : {ay} ay {tutar} TL Kredi',
			],
			
			[
				'type'    => 'submessage',
				'style'   => 'info',
				'content' => 'Başlığı değiştirdikten sonra Ayarlar > Kalıcı Bağlantılar kısmından Değişiklikleri Kaydet butonuna basın.',
			],
		
		],
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'sayfalar',
		'title'  => 'Borsa Sayfası',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'id'      => 'borsa_reklam_switcher', // field id
				'type'    => 'switcher',
				'title'   => 'Borsa Sayfası Reklamı',
				'default' => true,
			],
			[
				'id'         => 'borsa_reklam',
				'type'       => 'textarea',
				'title'      => 'Veri Tablosu Yanındaki Reklam',
				'desc'       => 'Veri Tablosu yanındaki reklamı burdan düzenleyebilirsiniz.',
				'default'    => '<div class="flexMiddleAds" style="height: 285px;"></div>',
				'dependency' => [ 'borsa_reklam_switcher', '==', 'true' ],
			],
		
		],
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'sayfalar',
		'title'  => 'İletişim',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'id'    => 'altBilgiBaslik1', // field id
				'type'  => 'text',
				'title' => 'Alt Bilgi Başlık 1',
			],
			
			[
				'id'    => 'altBilgiAciklama1', // field id
				'type'  => 'text',
				'title' => 'Alt Bilgi Açıklama 1',
			],
			
			[
				'id'    => 'altBilgiMail1', // field id
				'type'  => 'text',
				'title' => 'Alt Bilgi Mail 1',
			],
			
			[
				'id'    => 'altBilgiBaslik2', // field id
				'type'  => 'text',
				'title' => 'Alt Bilgi Başlık 2',
			],
			
			[
				'id'    => 'altBilgiAciklama2', // field id
				'type'  => 'text',
				'title' => 'Alt Bilgi Açıklama 2',
			],
			
			[
				'id'    => 'altBilgiMail2', // field id
				'type'  => 'text',
				'title' => 'Alt Bilgi Mail 2',
			],
		],
	] );
	
	
	CSF::createSection( $prefix, [
		'parent' => 'sayfalar',
		'title'  => 'Sayfa Ayarları',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'id'      => 'page_kredi_seo', // field id
				'type'    => 'text',
				'title'   => 'Kredi Sayfası Başlık',
				'desc'    => '{vade} {tutar} {kredi}',
				'default' => '{vade} Ay Vadeli - {kredi}',
			],
			
			[
				'id'      => 'page_altin', // field id
				'type'    => 'select',
				'title'   => 'Altın Detay Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Altın adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_altinlar', // field id
				'type'    => 'select',
				'title'   => 'Altın Tablo Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Altınlar adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_borsa', // field id
				'type'    => 'select',
				'title'   => 'Borsa Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Borsa adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_canliborsa', // field id
				'type'    => 'select',
				'title'   => 'Canlı Borsa Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Canlı Borsa adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_coin', // field id
				'type'    => 'select',
				'title'   => 'Coin Detay Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Coin adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_doviz', // field id
				'type'    => 'select',
				'title'   => 'Döviz Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Döviz adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_dovizcevirici', // field id
				'type'    => 'select',
				'title'   => 'Döviz Çevirici Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Döviz Çevirici adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_dovizhesapla', // field id
				'type'    => 'select',
				'title'   => 'Döviz Hesapla Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Döviz Hesapla adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_dovizkurlari', // field id
				'type'    => 'select',
				'title'   => 'Döviz Kurları Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Döviz Kurları adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_endeks', // field id
				'type'    => 'select',
				'title'   => 'Endeks Detay Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Endeks adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_giriskayit', // field id
				'type'    => 'select',
				'title'   => 'Giriş Kayıt Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Giriş/Kayıt adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_hisse', // field id
				'type'    => 'select',
				'title'   => 'Hisse Detay Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Hisse adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_ihtiyackredisi', // field id
				'type'    => 'select',
				'title'   => 'İhtiyaç Kredisi Sayfası',
				'options' => $sayfalar,
				'desc'    => 'İhtiyaç Kredisi adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_kobikredisi', // field id
				'type'    => 'select',
				'title'   => 'Kobi Kredisi Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Kobi Kredisi adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_konutkredisi', // field id
				'type'    => 'select',
				'title'   => 'Konut Kredisi Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Konut Kredisi adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_tasitkredisi', // field id
				'type'    => 'select',
				'title'   => 'Taşıt Kredisi Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Taşıt Kredisi adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_kriptoparalar', // field id
				'type'    => 'select',
				'title'   => 'Kriptoparalar Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Kriptoparalar adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_parite', // field id
				'type'    => 'select',
				'title'   => 'Parite Detay Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Parite adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_pariteler', // field id
				'type'    => 'select',
				'title'   => 'Pariteler Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Pariteler adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_tumendeksler', // field id
				'type'    => 'select',
				'title'   => 'Tüm Endeksler Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Tüm Endeksler adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_tumhisseler', // field id
				'type'    => 'select',
				'title'   => 'Tüm Hisseler Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Tüm Hisseler adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_uyeprofili', // field id
				'type'    => 'select',
				'title'   => 'Üye Profili Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Üye Profili adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_uyealarm', // field id
				'type'    => 'select',
				'title'   => 'Üye Alarm Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Üye Alarm adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_uyelistesi', // field id
				'type'    => 'select',
				'title'   => 'Üye Listesi Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Üye Listesi adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_uyeprofilfotografi', // field id
				'type'    => 'select',
				'title'   => 'Üye Profil Fotoğrafı Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Üye Profil Fotoğrafı adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_uyesifredegistir', // field id
				'type'    => 'select',
				'title'   => 'Üye Şifre Değiştir Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Üye Şifre Değiştir adlı sayfayı seçiniz',
			],
			
			[
				'id'      => 'page_uyesosyalmedya', // field id
				'type'    => 'select',
				'title'   => 'Üye Sosyal Medya Sayfası',
				'options' => $sayfalar,
				'desc'    => 'Üye Sosyal Medya adlı sayfayı seçiniz',
			],
		
		],
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'footer',
		'title'  => 'Genel Ayarlar',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			[
				'id'      => 'footerSloganBaslik',
				'type'    => 'text',
				'title'   => 'Footer Yazısı',
				'desc'    => 'Seo uyumlu bir slogan giriniz.',
				'default' => 'BirFinans birtema.com ekibi tarafından yapılmış premium wordpress temasıdır',
			],
			
			[
				'id'            => 'footerP',
				'type'          => 'wp_editor',
				'title'         => 'Açıklama',
				'tinymce'       => true,
				'quicktags'     => true,
				'media_buttons' => false,
				'height'        => '100px',
				'desc'          => 'Seo uyumlu bir açıklama giriniz.',
				'default'       => 'Birmedya teması birtema.com tarafından üretilmiştir. Bu alanı seo çalışmanız için değerlendirebilir, siteniz ile alakalı kelime gruplarına yer verebilirsiniz.',
			],
		],
	] );
	
	CSF::createSection( $prefix, [
		'parent' => 'footer',
		'title'  => 'Sosyal Medya',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			
			
			[
				'id'      => 'fFacebook',
				'type'    => 'switcher',
				'title'   => 'Facebook İkonu',
				'label'   => 'Gizle / Göster',
				'default' => true,
			],
			
			[
				'id'         => 'fFacebookURL',
				'type'       => 'text',
				'title'      => 'Facebook Profili',
				'desc'       => 'Burası için bir link giriniz.',
				'dependency' => [ 'fFacebook', '==', 'true' ],
			],
			
			[
				'id'      => 'fTwitter',
				'type'    => 'switcher',
				'title'   => 'Twitter İkonu',
				'label'   => 'Gizle / Göster',
				'default' => true,
			],
			
			[
				'id'         => 'fTwitterURL',
				'type'       => 'text',
				'title'      => 'Twitter Profili',
				'desc'       => 'Burası için bir link giriniz.',
				'dependency' => [ 'fTwitter', '==', 'true' ],
			],
			
			[
				'id'      => 'fGPlus',
				'type'    => 'switcher',
				'title'   => 'Google Plus İkonu',
				'label'   => 'Gizle / Göster',
				'default' => true,
			],
			
			[
				'id'         => 'fGPlusURL',
				'type'       => 'text',
				'title'      => 'Google Plus Profili',
				'desc'       => 'Burası için bir link giriniz.',
				'dependency' => [ 'fGPlus', '==', 'true' ],
			],
			
			[
				'id'      => 'fInstagram',
				'type'    => 'switcher',
				'title'   => 'Instagram İkonu',
				'label'   => 'Gizle / Göster',
				'default' => true,
			],
			
			[
				'id'         => 'fInstagramURL',
				'type'       => 'text',
				'title'      => 'Instagram Profili',
				'desc'       => 'Burası için bir link giriniz.',
				'dependency' => [ 'fInstagram', '==', 'true' ],
			],
			
			[
				'id'      => 'fPinterest',
				'type'    => 'switcher',
				'title'   => 'Pinterest İkonu',
				'label'   => 'Gizle / Göster',
				'default' => true,
			],
			
			[
				'id'         => 'fPinterestURL',
				'type'       => 'text',
				'title'      => 'Pinterest Profili',
				'desc'       => 'Burası için bir link giriniz.',
				'dependency' => [ 'fPinterest', '==', 'true' ],
			],
			
			[
				'id'      => 'fYoutube',
				'type'    => 'switcher',
				'title'   => 'Youtube İkonu',
				'label'   => 'Gizle / Göster',
				'default' => true,
			],
			
			[
				'id'         => 'fYoutubeURL',
				'type'       => 'text',
				'title'      => 'Youtube Profili',
				'desc'       => 'Burası için bir link giriniz.',
				'dependency' => [ 'fYoutube', '==', 'true' ],
			],
			
			[
				'id'      => 'fDribbble',
				'type'    => 'switcher',
				'title'   => 'Dribbble İkonu',
				'label'   => 'Gizle / Göster',
				'default' => true,
			],
			
			[
				'id'         => 'fDribbbleURL',
				'type'       => 'text',
				'title'      => 'Dribbble Profili',
				'desc'       => 'Burası için bir link giriniz.',
				'dependency' => [ 'fDribbble', '==', 'true' ],
			],
			
			[
				'id'      => 'fTelegram',
				'type'    => 'switcher',
				'title'   => 'Telegram İkonu',
				'label'   => 'Gizle / Göster',
				'default' => true,
			],
			
			[
				'id'         => 'fTelegramURL',
				'type'       => 'text',
				'title'      => 'Telegram Profili',
				'desc'       => 'Burası için bir link giriniz.',
				'dependency' => [ 'fTelegram', '==', 'true' ],
			],
		],
	] );
	
	CSF::createSection( $prefix, [
		'title'  => 'Veri Sayfaları',
		'icon'   => 'fa fa-android',
		'fields' => [
			[
				'type'    => 'submessage',
				'style'   => 'info',
				'content' => 'Veri sayfaları özel yazı ekleme alanı',
			],
			
			[
				'id'     => 'veri_sayfalari_text',
				'type'   => 'repeater',
				'title'  => 'Özel Yazılar',
				'fields' => [
					[
						'type'    => 'select',
						'id'      => 'type',
						'title'   => 'Türü',
						'options' => [
							'doviz'  => 'Döviz',
							'altin'  => 'Altın',
							'hisse'  => 'Hisse',
							'kripto' => 'Kripto Para',
						],
					],
					[
						'type'  => 'text',
						'title' => 'Kısa Kod',
						'id'    => 'kisa_kod',
						'desc'  => 'Kısa kodu giriniz. Örnek : usd, eur, gbp, gram-altin, bimas, thyao, bitcoin, ethereum',
					],
					[
						'id'    => 'baslik',
						'type'  => 'text',
						'title' => 'Başlık',
					],
					[
						'id'    => 'content',
						'type'  => 'wp_editor',
						'title' => 'İçerik',
					],
				],
			],
			
			[
				'type' => 'switcher',
				'title' => 'Hisse Detay Sayfaları Haberleri',
				'id' => 'hisse_detay_haberleri',
				'desc' => 'Hisse detay sayfalarında haberleri göstermek için bu alanı aktif edin. Çıkacak olan haberlerde hissenin BIST kodu etiket olarak tanımlı olması gerekmektedir.',
			]
		],
	] );
	
	CSF::createSection( $prefix, [
		'title'  => 'Renk Ayarları',
		'icon'   => 'fa fa-window-maximize',
		'fields' => [
			
			[
				'id'      => 'header_menu',
				'type'    => 'color',
				'title'   => 'Menü Rengi',
				'default' => '#fafafa',
			],
			
			[
				'id'      => 'header_menu_hover',
				'type'    => 'color',
				'title'   => 'Menü Hover',
				'default' => '#fdb918',
			],
			
			[
				'id'      => 'header_bg_bolum_1_sag',
				'type'    => 'color',
				'title'   => 'Header 1. Bölüm Arkaplan Rengi Sağ (Gradient)',
				'default' => '#262b3c',
			],
			
			[
				'id'      => 'header_bg_bolum_1_sol',
				'type'    => 'color',
				'title'   => 'Header 1. Bölüm Arkaplan Rengi Sol (Gradient)',
				'default' => '#262b3c',
			],
			
			[
				'id'      => 'header_bg_bolum_2_sag',
				'type'    => 'color',
				'title'   => 'Header 2. Bölüm Arkaplan Rengi Sağ (Gradient)',
				'default' => '#1a202e',
			],
			
			[
				'id'      => 'header_bg_bolum_2_sol',
				'type'    => 'color',
				'title'   => 'Header 2. Bölüm Arkaplan Rengi Sol (Gradient)',
				'default' => '#1a202e',
			],
			
			[
				'id'      => 'header_hr',
				'type'    => 'color',
				'title'   => 'Header 1. Bölüm ve 2. Bölüm Arasındaki Çizgi Rengi',
				'default' => '#262b3c',
			],
			
			[
				'id'      => 'canli_borsa_bg',
				'type'    => 'color',
				'title'   => 'Canlı Borsa Arkaplan Rengi',
				'default' => '#f4230d',
			],
			
			[
				'id'      => 'canli_borsa_buton_hover',
				'type'    => 'color',
				'title'   => 'Canlı Borsa Butonu Hover Rengi',
				'default' => '#f4230d',
			],
			
			[
				'id'      => 'kredi_tab_hover',
				'type'    => 'color',
				'title'   => 'Krediler Bileşeninde Kredi Tablarının Hover Rengi',
				'default' => '#fab915',
			],
			
			[
				'id'      => 'en_ucuz_kredi_buton',
				'type'    => 'color',
				'title'   => 'En Ucuz Krediyi Bul Butonu Rengi',
				'default' => '#376ee2',
			],
			[
				'id'      => 'en_ucuz_kredi_buton_hover',
				'type'    => 'color',
				'title'   => 'En Ucuz Krediyi Bul Hover Rengi',
				'default' => '#376ee2',
			],
			
			[
				'id'      => 'slider_buton_rengi',
				'type'    => 'color',
				'title'   => 'Slider Butonlarının Rengi',
				'default' => '#fcb817',
			],
			
			[
				'id'      => 'slider_divider',
				'type'    => 'color',
				'title'   => 'Slider Butonlarının Yanındaki Dikey Divider Rengi',
				'default' => '#fab915',
			],
			
			[
				'id'      => 'tum_icerik_kategori_renk',
				'type'    => 'color',
				'title'   => 'Tüm içeriklerin kategori renkleri',
				'default' => '#f9ba15',
			],
			
			[
				'id'      => 'tum_icerik_kategori_hover',
				'type'    => 'color',
				'title'   => 'Tüm içeriklerin kategori hover renkleri',
				'default' => '#f9ba15',
			],
			
			[
				'id'      => 'kriptoparalar_selection_bg',
				'type'    => 'color',
				'title'   => 'Kriptoparalar Bileşenin Selection Arkaplan Rengi',
				'default' => '#b0b0b0',
			],
			
			[
				'id'      => 'tum_bilesenler_renk',
				'type'    => 'color',
				'title'   => 'Geriye Kalan Tüm Bileşenlerin Altındaki Sarı Renk',
				'default' => '#fab917',
			],
			
			[
				'id'      => 'footer_basliklari_renk',
				'type'    => 'color',
				'title'   => 'Footer Başlıkları Renk',
				'default' => '#fcb819',
			],
			
			[
				'id'      => 'footer_kategorileri_renk',
				'type'    => 'color',
				'title'   => 'Footer Kategorilerileri Renk',
				'default' => '#fff',
			],
			
			[
				'id'      => 'footer_kategorileri_hover_renk',
				'type'    => 'color',
				'title'   => 'Footer Kategorilerileri Hover Renk',
				'default' => '#fff',
			],
			
			[
				'id'      => 'footer_bg_1',
				'type'    => 'color',
				'title'   => 'Footer 1. Bölüm Arkaplan Renk',
				'default' => '#1a1a1a',
			],
			
			[
				'id'      => 'footer_bg_2',
				'type'    => 'color',
				'title'   => 'Footer 2. Bölüm Arkaplan Renk',
				'default' => '#000000',
			],
			
			[
				'id'      => 'footer_bg_3',
				'type'    => 'color',
				'title'   => 'Footer 3. Bölüm Arkaplan Renk',
				'default' => '#1a1a1a',
			],
			
			[
				'id'      => 'sosyal_medya_buton',
				'type'    => 'color',
				'title'   => 'Sosyal Medya Butonları Renk',
				'default' => '#9ea2a5',
			],
			
			
			[
				'id'      => 'sosyal_medya_buton_hover',
				'type'    => 'color',
				'title'   => 'Sosyal Medya Butonları Hover Renk',
				'default' => '#fab913',
			],
			
			[
				'id'      => 'borsa_inis_arkaplan',
				'type'    => 'color',
				'title'   => 'Header Borsa İniş Arkaplan Rengi ',
				'default' => '#f3250e',
			],
			
			[
				'id'      => 'borsa_cikis_arkaplan',
				'type'    => 'color',
				'title'   => 'Header Borsa Çıkış Arkaplan Rengi ',
				'default' => '#28bd57',
			],
			
			
			[
				'id'      => 'diger_bilesenler_renk',
				'type'    => 'color',
				'title'   => 'Son eklenen haberler veya en çok okunan haberler gibi tüm bileşenlerin yazılarının hoverleri ortak renk',
				'default' => '#fab915',
			],
			
			[
				'type'    => 'subheading',
				'content' => 'Giriş / Kayıt Sayfası',
			],
			
			[
				'id'      => 'uyegiris_anasayfa_renk',
				'type'    => 'color',
				'title'   => 'Anasayfaya Dön Rengi',
				'default' => '#ffffff',
			],
			[
				'id'      => 'uyegiris_anasayfa_hover_renk',
				'type'    => 'color',
				'title'   => 'Anasayfaya Dön Hover Rengi',
				'default' => '#fb886f',
			],
			
			[
				'id'      => 'uyegiris_anasayfa_hover_renk',
				'type'    => 'color',
				'title'   => 'Anasayfaya Dön Hover Rengi',
				'default' => '#fb886f',
			],
			
			[
				'id'      => 'uyegiris_buton_sol',
				'type'    => 'color',
				'title'   => 'Kayıt / Giriş Butonu Sol (Gradient)',
				'default' => '#fb886f',
			],
			
			[
				'id'      => 'uyegiris_buton_sag',
				'type'    => 'color',
				'title'   => 'Kayıt / Giriş Butonu Sağ (Gradient)',
				'default' => '#fb886f',
			],
			
			[
				'id'      => 'uyegiris_sifre_buton',
				'type'    => 'color',
				'title'   => 'Kayıt / Giriş Şifre Butonu',
				'default' => '#4f1f74',
			],
			
			[
				'type'    => 'subheading',
				'content' => 'Yazı Sayfası',
			],
			
			
			[
				'id'      => 'single_favori_buton',
				'type'    => 'color',
				'title'   => 'Favori Buton Rengi',
				'default' => '#ef291f',
			],
			
			[
				'id'      => 'single_favori_buton_hover',
				'type'    => 'color',
				'title'   => 'Favori Buton Hover Rengi',
				'default' => '#e6271d',
			],
			
			[
				'id'      => 'single_ilgili_icerik',
				'type'    => 'color',
				'title'   => 'İlgili İçerik Rengi',
				'default' => '#f9b832',
			],
			
			[
				'id'      => 'single_listeleme',
				'type'    => 'color',
				'title'   => 'Listeleme Rengi',
				'default' => '#f9b832',
			],
			
			[
				'id'      => 'single_etiket_hover',
				'type'    => 'color',
				'title'   => 'Etiket Hover Rengi',
				'default' => '#f9b832',
			],
			
			[
				'id'      => 'yorum_rengi',
				'type'    => 'color',
				'title'   => 'Yorum Bölümü Rengi',
				'default' => '#ef291f',
			],
			
			[
				'id'      => 'yorum_buton_hover_rengi',
				'type'    => 'color',
				'title'   => 'Yorum Butonu Hover Rengi',
				'default' => '#ef291f',
			],
			
			[
				'id'      => 'kredi_slider_rengi',
				'type'    => 'color',
				'title'   => 'Kredi Slider_rengi',
				'default' => '#ed4b1a',
			],
			
			[
				'id'      => 'doviz_slider_rengi',
				'type'    => 'color',
				'title'   => 'Döviz Slider_rengi',
				'default' => '#ed4b1a',
			],
			
			[
				'id'      => 'kripto_slider_kategori_rengi',
				'type'    => 'color',
				'title'   => 'Kripto Slider Kategori Rengi',
				'default' => '#ed4c1a',
			],
			
			[
				'id'      => 'kripto_slider_arkaplan_rengi',
				'type'    => 'color',
				'title'   => 'Kripto Slider Başlık Arkaplan Rengi',
				'default' => '#161d2c',
			],
		
		],
	] );
	
	global $wpdb;
	$inbox       = $wpdb->get_results( 'SELECT * FROM bt_contact ORDER BY contact_id DESC' );
	$inbox_count = $wpdb->get_results( 'SELECT * FROM bt_contact WHERE status = 1' );
	//$inbox_message = array();
	foreach ( $inbox as $key => $value ) {
		$message[] = '<div class="clear"></div><div class="csf-accordion-item item_id_' . $value->contact_id . '">
    <h4 class="csf-accordion-title" onclick="open_tab(' . $key . ')"><i class="csf--icon fa fa-inbox"></i>' . $value->name . ' - ' . $value->subject
		             . ' <time style="float:right;">' . date( 'd-m-Y H:i', $value->time ) . '</time></h4>
    <div class="csf-accordion-content csf-accordion tab_' . $key . '">
    <div class="csf-field csf-field-text">
    <div class="csf-title"></div>
    <div class="csf-fieldset">
    <b>İsim : </b>' . $value->name . '<br />
    <b>Email : </b>' . $value->email . '<br />
    <b>Konu : </b>' . $value->subject . '<br />
    <b>Mesaj : </b>' . $value->message . '<br />
    <a href="javascript:;" class="read_btn' . $value->contact_id . '" onclick="read_message(' . $value->contact_id . ')">Okundu Olarak İşaretle</a>
    <a href="javascript:;" style="float:right;" class="delete_btn_' . $value->contact_id . '" onclick="delete_message(' . $value->contact_id . ')">Mesajı Sil</a>
    </div>

    </div>
    </div>
    </div>
    <div class="clear"></div>';
	}
	
	$live_chat        = $wpdb->get_results( 'SELECT * FROM bt_live_chat ORDER BY id DESC' );
	$live_chat_status = $wpdb->get_results( 'SELECT * FROM bt_live_chat WHERE status = 1 ORDER BY id DESC' );
	
	foreach ( $live_chat as $key => $value ) {
		if ( $value->status == 1 ) {
			$okundu_text = '<a href="javascript:;" class="read_btn_' . $value->id . '" onclick="read_live_chat(' . $value->id . ')">Okundu Olarak İşaretle</a>';
		} else {
			$okundu_text = '';
		}
		
		$live_chat_text[] = '<div class="clear"></div><div class="csf-accordion-item item_id_' . $value->id . '">
    <h4 class="csf-accordion-title" onclick="open_tab(' . $key . ')"><i class="csf--icon fa fa-inbox"></i>' . $value->name . ' - ' . get_the_title( $value->page_id )
		                    . ' <time style="float:right;">' . date( 'd-m-Y H:i', $value->time ) . '</time></h4>
    <div class="csf-accordion-content csf-accordion tab_' . $key . '">
    <div class="csf-field csf-field-text">
    <div class="csf-title"></div>
    <div class="csf-fieldset">
    <b>İsim : </b>' . $value->name . '<br />
    <b>Mesaj : </b>' . $value->text . '<br />
    ' . $okundu_text . '
    <a href="javascript:;" style="float:right;" class="delete_btn_' . $value->id . '" onclick="delete_live_chat(' . $value->id . ')">Mesajı Sil</a>
    </div>

    </div>
    </div>
    </div>
    <div class="clear"></div>';
	}
	
	CSF::createSection( $prefix, [
		'title'  => 'Gelen Kutusu (' . count( $inbox_count ) . ')',
		'icon'   => 'fa fa-inbox',
		'fields' => [
			
			[
				'type'    => 'content',
				'content' => '<div class="csf-field csf-field-accordion">
        <div class="csf-title"><h4>Gelen Kutusu</h4></div>
        <div class="csf-fieldset">
          <div class="csf-accordion-items">
          ' . @implode( $message ) . '
          </div>
        </div>
        </div>'
				             .
				             '<script>
          function open_tab(id)
          {
            $(".tab_"+id).toggle();
            }
        </script>

        <script>
          function delete_message(id)
          {
            $(".delete_btn_"+id).html("Siliniyor...");

            $.post( "' . admin_url( 'admin-ajax.php' ) . '", { action: "delete_message", contact_id: id })
              .done(function( data ) {
                if(data == "Ok")
                {
                  $(".item_id_"+id).hide(100);
                }
              });

          }

          function read_message(id)
          {


            $.post( "' . admin_url( 'admin-ajax.php' ) . '", { action: "readed_message", contact_id: id })
              .done(function( data ) {
                if(data == "Ok")
                {
                  $(".read_btn_"+id).html("Okundu");
                }
              });

          }
        </script>

        '
				             .
				             '<style>
        .csf-field .csf-fieldset{margin-left: 0 !important;}
        </style>',
			],
		],
	] );
	
	
	CSF::createSection( $prefix, [
		'title'  => 'Canlı Sohbet (' . count( $live_chat_status ) . ')',
		'icon'   => 'fa fa-inbox',
		'fields' => [
			
			[
				'type'    => 'content',
				'content' => '<div class="csf-field csf-field-accordion">
        <div class="csf-title"><h4>Canlı Sohbet (' . count( $live_chat_status ) . ')</h4></div>
        <div class="csf-fieldset">
          <div class="csf-accordion-items">
          ' . @implode( $live_chat_text ) . '
          </div>
        </div>
        </div>'
				             .
				             '<script>
          function open_tab(id)
          {
            $(".tab_"+id).toggle();
            }
        </script>

        <script>
          function delete_live_chat(id)
          {
            $(".delete_btn_"+id).html("Siliniyor...");

            $.post( "' . admin_url( 'admin-ajax.php' ) . '", { action: "delete_live_chat", id: id })
              .done(function( data ) {
                if(data == "Ok")
                {
                  $(".item_id_"+id).hide(100);
                }
              });

          }

          function read_live_chat(id)
          {

            $.post( "' . admin_url( 'admin-ajax.php' ) . '", { action: "read_live_chat", id: id })
              .done(function( data ) {
                if(data == "Ok")
                {
                  $(".read_btn_"+id).html("Okundu");
                }
              });

          }
        </script>

        '
				             .
				             '<style>
        .csf-field .csf-fieldset{margin-left: 0 !important;}
        </style>',
			],
		],
	] );
	
	CSF::createSection( $prefix, [
		'title'  => 'Backup',
		'icon'   => 'fa fa-info-circle',
		'fields' => [
			
			[
				'type' => 'backup',
			],
		
		],
	] );
}
