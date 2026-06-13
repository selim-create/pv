<?php
CSF::createWidget( 'sidebar_reklam', array(
  'title'       => 'Sidebar Reklam (300x250)',
  'classname'   => 'sidebar-reklam',
  'description' => 'Sidebar Reklam (300x250)',
  'fields'      => array(
    array(
      'id'      => 'code',
      'type'    => 'textarea',
      'title'   => 'Reklam Kodu'
    ),
  ),
) );

if( ! function_exists( 'sidebar_reklam' ) ) {
  function sidebar_reklam( $args, $instance ) {
    ?>
    <!-- Ads Banner -->
    <div class="widget">
      <div class="adsBanner">
        <?=$instance['code']?>
      </div>
    </div>
    <!-- #Ads Banner -->
    <?php
  }
}
?>
