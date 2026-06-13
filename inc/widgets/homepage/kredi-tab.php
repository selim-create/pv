<?php
CSF::createWidget( 'anasayfa_reklam', array(
  'title'       => 'Anasayfa (Content) Reklam (728x90)',
  'classname'   => 'anasayfa-reklam',
  'description' => 'Anasayfa (Content) Reklam (728x90)',
  'fields'      => array(
    array(
      'id'      => 'code',
      'type'    => 'textarea',
      'title'   => 'Reklam Kodu'
    ),
  ),
) );

if( ! function_exists( 'anasayfa_reklam' ) ) {
  function anasayfa_reklam( $args, $instance ) {
    ?>
    <div class="widget">
      <div class="banner">
        <?=$instance['code']?>
      </div>
    </div>
    <?php
  }
}
?>
