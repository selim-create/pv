<?php
CSF::createWidget( 'sayfa_alt', array(
  'title'       => 'Sayfa Alt Makalesi (Sayfa Alt)',
  'classname'   => 'anasayfa-son-eklenenler',
  'description' => 'Sayfa Alt Makalesi (Sayfa Alt)',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık'
    ),
    array(
      'id'      => 'content',
      'type'    => 'wp_editor',
      'title'   => 'İçerik'
    ),
  ),
) );

if( ! function_exists( 'sayfa_alt' ) ) {
  function sayfa_alt( $args, $instance ) {
    ?>
    <div class="widget">
      <div class="sayfaAltMakale">
        <h2><?=$instance['baslik']?></h2>

        <h3><?=$instance['content']?></h3>
      </div>

    </div>
    <!-- #Widget -->
    <div class="clear"></div>

    <?php
  }
}
