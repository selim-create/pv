<?php
error_reporting(0);
CSF::createWidget( 'anasayfa_alt_manset', array(
  'title'       => 'Anasayfa Kredi Slider',
  'classname'   => 'anasayfa-alt-manset',
  'description' => 'Anasayfa Kredi Slider',

) );

if( ! function_exists( 'anasayfa_alt_manset' ) ) {
  function anasayfa_alt_manset( $args, $instance ) {
    if(!wp_is_mobile()){
    ?>
    <div class="widget">
      <div class="news-slider">
          <div class="owl-carousel">
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
                  <?=get_the_post_thumbnail( $post_id, 'anasayfa_alt_manset', array( 'alt' => get_the_title($post_id) ) );  ?>
                  <div class="news-slider-content">
                    <div class="cat"><?=get_the_category($post_id)[0]->cat_name?></div>
                    <div class="title">
                        <span class="bg-pad"><a href="<?=get_permalink($post_id);?>"><?=get_the_title($post_id)?></a></span>
                    </div>
                  </div>
              </div>
            <?php endforeach; ?>
          </div>
      </div>
    </div>
    <?php
  }else{

    ?>
    <style>
    .owl-thumbs{
      display: none;
    }
    </style>
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
            <?=get_the_post_thumbnail( $post_id, 'anasayfa_sag_manset', array( 'alt' => get_the_title($post_id) ) );  ?>
            <div class="title"><a href="<?=get_permalink($post_id)?>"><?=get_the_title($post_id)?></a></div>
          </div>

        <?php endforeach; ?>
      </div>
    </div>
    <?php
  }
  }
}

?>