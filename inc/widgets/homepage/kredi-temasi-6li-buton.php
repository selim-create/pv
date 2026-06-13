<?php

CSF::createWidget( 'home_icon_menu', array(
  'title'       => 'Anasayfa Kredi Teması 6\'lı Buton',
  'classname'   => 'kredi-temasi-6li-buton',
  'description' => 'Kredi Teması 6\'lı Buton',
  'fields'      => array(
    array(
      'id'      => 'banka_baslik',
      'type'    => 'text',
      'title'   => 'Kredi Faiz Oranları Başlık',
      'default' => 'Kredi Faiz Oranları',
    ),
    array(
      'id'      => 'banka_link',
      'type'    => 'text',
      'title'   => 'Kredi Faiz Oranları Link',
      'default' => get_bloginfo("home")
    ),


    array(
          'id'      => 'mevduat_baslik',
          'type'    => 'text',
          'title'   => 'Mevduat Oranları Başlık',
          'default' => 'Mevduat Oranları'
  ),

    array(
      'id'      => 'mevduat_link',
      'type'    => 'text',
      'title'   => 'Mevduat Oranları Link',
      'default' => get_bloginfo("home")
    ),

    array(
      'id'      => 'kredi_hesapla_baslik',
      'type'    => 'text',
      'title'   => 'Kredi Hesapla Link',
      'default' => 'Kredi Hesapla'
    ),

    array(
      'id'      => 'kredi_hesapla_link',
      'type'    => 'text',
      'title'   => 'Kredi Hesapla Link',
      'default' => get_bloginfo("home")
    ),

    array(
      'id'      => 'piyasa_nabzi_baslik',
      'type'    => 'text',
      'title'   => 'Piyasanın Nabzı Başlık',
      'default' => 'Piyasanın Nabzı'
    ),

    array(
      'id'      => 'piyasa_nabzi_link',
      'type'    => 'text',
      'title'   => 'Piyasanın Nabzı Link',
      'default' => get_bloginfo("home")
    ),

    array(
      'id'      => 'trafik_sigortasi_baslik',
      'type'    => 'text',
      'title'   => 'Trafik Sigortası Başlık',
      'default' => 'Trafik Sigortası'
    ),

    array(
      'id'      => 'trafik_sigortasi_link',
      'type'    => 'text',
      'title'   => 'Trafik Sigortası Link',
      'default' => get_bloginfo("home")
    ),

    array(
      'id'      => 'kasko_sigortasi_baslik',
      'type'    => 'text',
      'title'   => 'Kasko Sigortası Başlık',
      'default' => 'Kasko Sigortası'
    ),

    array(
      'id'      => 'kasko_sigortasi_link',
      'type'    => 'text',
      'title'   => 'Kasko Sigortası Başlık',
      'default' => get_bloginfo("home")
    ),

  ),
) );

if( ! function_exists( 'home_icon_menu' ) ) {
  function home_icon_menu( $args, $instance ) {
    ?>

    <div class="homeIconMenu">
			<ul>
				<li>
					<a href="<?=$instance['banka_link']?>">
						<div class="icon bank-sign"></div>
						<div class="title"><?=$instance['banka_baslik']?></div>
					</a>
				</li>
				<li>
					<a href="<?=$instance['mevduat_link']?>">
						<div class="icon bank-safe"></div>
						<div class="title"><?=$instance['mevduat_baslik']?></div>
					</a>
				</li>
				<li>
					<a href="<?=$instance['kredi_hesapla_link']?>">
						<div class="icon math-calculator"></div>
						<div class="title"><?=$instance['kredi_hesapla_baslik']?></div>
					</a>
				</li>
				<li>
					<a href="<?=$instance['piyasa_nabzi_link']?>">
						<div class="icon line-stats"></div>
						<div class="title"><?=$instance['piyasa_nabzi_baslik']?></div>
					</a>
				</li>
				<li>
					<a href="<?=$instance['trafik_sigortasi_link']?>">
						<div class="icon repair"></div>
						<div class="title"><?=$instance['trafik_sigortasi_baslik']?></div>
					</a>
				</li>
				<li>
					<a href="<?=$instance['kasko_sigortasi_link']?>">
						<div class="icon life-saver"></div>
						<div class="title"><?=$instance['kasko_sigortasi_baslik']?></div>
					</a>
				</li>
			</ul>
		</div>

    <?php
  }
}

?>
