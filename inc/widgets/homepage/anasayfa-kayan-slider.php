<?php
CSF::createWidget( 'anasayfa_kayan_slider', array(
    'title'       => 'Anasayfa (Manşet) Kayan Slider (Tek)',
    'classname'   => 'anasayfa-kayan-slider',
    'description' => 'Anasayfa (Manşet) Kayan Slider (Tek)',
      'fields'      => array(
          array(
              'id'      => 'type',
              'type'    => 'select',
              'title'   => 'Listeleme Türü',
              'options' => array(
                    'special' => "İşaretlenenleri Listele",
                    'lastPost' => 'Son İçerikleri Listele'
              ),
          ),
      ),
  ) );

  if( ! function_exists( 'anasayfa_kayan_slider' ) ) {
    function anasayfa_kayan_slider( $args, $instance ) {

      ?>
        <!-- Headline -->
        <section class="headline">

            <div class="headlineSlider">
                <div id="headlineSlider" class="owl-carousel">
                    <?php

                    switch ($instance['type']):
                        case 'lastPost':
                            $kayan_slider = new WP_Query( array(
                                'posts_per_page' => 4,
                                'order' => 'desc',
                            ) );
                            break;

                        case 'special':

                            $kayan_slider = new WP_Query( array(
                                'posts_per_page' => 4,
                                'meta_key'		=> 'bf_anasayfa_kayan',
                                'meta_query'	=> array(
                                    'key'			=> 'bf_anasayfa_kayan',
                                    'value'		=> 'on'
                                ),
                                'orderby' => 'desc',
                            ) );
                            break;

                        default:

                            $kayan_slider = new WP_Query( array(
                                'posts_per_page' => 4,
                                'meta_key'		=> 'bf_anasayfa_kayan',
                                'meta_query'	=> array(
                                    'key'			=> 'bf_anasayfa_kayan',
                                    'value'		=> 'on'
                                ),
                                'orderby' => 'desc',
                            ) );
                            break;
                    endswitch;

                    foreach($kayan_slider->posts as $key=>$value) :
                        $post_id = $value->ID;
                        ?>
                        <div class="item">
                            <div class="thumb"><a href="<?=get_permalink($post_id)?>"><?=get_the_post_thumbnail( $post_id, 'anasayfa_kayan_slider', array( 'alt' => get_the_title($post_id) ) );  ?></a></div>
                            <div class="title"><a href="<?=get_permalink($post_id)?>"><?=get_the_title($post_id)?></a></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </section>
        <!-- #Headline -->
        <div class="clear"></div>

        <?php
    }
  }
