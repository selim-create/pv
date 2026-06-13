<?php

CSF::createWidget( 'html_sidebar', array(
  'title'       => 'Sidebar HTML',
  'classname'   => 'html-sidebar',
  'description' => 'HTML Sidebar',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'HTML',
    ),
    array(
      'id'      => 'html',
      'type'    => 'textarea',
      'title'   => 'HTML Kodu',
    ),
  ),
) );

if( ! function_exists( 'html_sidebar' ) ) {
  function html_sidebar( $args, $instance ) {
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="sidebarHead"><?=$instance['baslik']?></div>
      <?=$instance['html']?>
    </div>
    <!-- #Widget -->

    <?php
  }
}

?>
