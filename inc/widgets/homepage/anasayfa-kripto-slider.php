<?php
error_reporting(0);
CSF::createWidget( 'anasayfa_kripto_slider', array(
  'title'       => 'Anasayfa Kripto Slider',
  'classname'   => 'anasayfa-kripto-slider',
  'description' => 'Anasayfa Kripto Slider',

) );

if( ! function_exists( 'anasayfa_kripto_slider' ) ) {
  function anasayfa_kripto_slider( $args, $instance ) {
    if(!wp_is_mobile()){
    ?>

    <div class="headline-news">
            <?php
            $anasayfa_slider = new WP_Query( array(
              'posts_per_page' => 1,
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
              <div class="headline-news-big">
                <div class="thumb">
                  <a href="<?=get_permalink($post_id);?>"><?=get_the_post_thumbnail( $post_id, 'ansayfa_kripto_sliderb', array( 'alt' => get_the_title($post_id) ) );  ?></a>
                </div>
                <div class="content">
                    <div class="cat"><a href="<?=get_category_link(get_the_category($post_id)[0]->cat_ID)?>"><?=get_the_category($post_id)[0]->cat_name?></a></div>
                  <div class="title"><a href="<?=get_permalink($post_id);?>" class="bg-pad"><?=get_the_title($post_id)?></a></div>
                </div>
              </div>
            <?php endforeach; ?>

            <div class="headline-news-smalls">
              <?php
              $anasayfa_slider = new WP_Query( array(
                'posts_per_page' => 5,
                'meta_key'		=> 'bf_anasayfa_slider',
                'meta_query'	=> array(
                    'key'			=> 'bf_anasayfa_slider',
                    'value'		=> 'on'
                ),
                'orderby' => 'desc',
              ) );
              foreach($anasayfa_slider->posts as $key=>$value) :
                if($key == 0): continue; endif;
                $post_id = $value->ID;
                ?>
                <div class="item">
                  <div class="thumb">
                    <a href="<?=get_permalink($post_id);?>"><?=get_the_post_thumbnail( $post_id, 'ansayfa_kripto_sliderk', array( 'alt' => get_the_title($post_id) ) );  ?></a>
                  </div>
                  <div class="content">
                      <div class="cat"><a href="<?=get_category_link(get_the_category($post_id)[0]->cat_ID)?>"><?=get_the_category($post_id)[0]->cat_name?></a></div>
                    <div class="title"><a href="<?=get_permalink($post_id);?>" class="bg-pad"><?=get_the_title($post_id)?></a></div>
                  </div>
                </div>
              <?php endforeach; ?>
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
