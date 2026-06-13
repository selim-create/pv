<?php
error_reporting(0);
CSF::createWidget( 'anasayfa_doviz_slider', array(
  'title'       => 'Anasayfa Döviz Slider',
  'classname'   => 'anasayfa-doviz-slider',
  'description' => 'Anasayfa Döviz Slider',

) );

if( ! function_exists( 'anasayfa_doviz_slider' ) ) {
  function anasayfa_doviz_slider( $args, $instance ) {
    
    ?>
    <div class="main-slider">
      <div id="main-slider" class="owl-carousel">
        <?php
        $anasayfa_slider = new WP_Query( array(
          'posts_per_page' => 7,
          'meta_key'		=> 'bf_anasayfa_slider',
          'meta_query'	=> array(
              'key'			=> 'bf_anasayfa_slider',
              'value'		=> 'on'
          ),
          'orderby' => 'desc',
        ) );
        foreach($anasayfa_slider->posts as $key=>$value) :
          $post_id = $value->ID;
          ?>
          <div class="item">
            <?=get_the_post_thumbnail( $post_id, 'anasayfa_doviz_slider', array( 'alt' => get_the_title($post_id) ) );  ?>
            <div class="title"><a href="<?=get_permalink($post_id)?>"><?=get_the_title($post_id)?></a></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php

  }
}

?>