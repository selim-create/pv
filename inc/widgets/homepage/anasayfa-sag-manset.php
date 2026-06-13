<?php CSF::createWidget( 'anasayfa_sag_manset', array(
    'title'       => 'Anasayfa Finans Slider',
    'classname'   => 'anasayfa-kredi-arama-motoru',
    'description' => 'Anasayfa Finans Slider',
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

  if( ! function_exists( 'anasayfa_sag_manset' ) ) {
      function anasayfa_sag_manset($args, $instance)
      {
          global $bp_options;

          if (!wp_is_mobile()) {
              ?>
              <div class="vertSlider" style="float:<?= $bp_options['slider_position'] ?>;">
                  <div class="vertSlides owl-carousel">
                      <?php
                      switch ($instance['type']):
                          case 'lastPost':
                              $anasayfa_slider = new WP_Query(array(
                                  'posts_per_page' => 7,
                                  'order' => 'desc',
                              ));
                              break;

                          case 'special':

                              $anasayfa_slider = new WP_Query(array(
                                  'posts_per_page' => 7,
                                  'meta_key' => 'bf_anasayfa_slider',
                                  'meta_query' => array(
                                      'key' => 'bf_anasayfa_slider',
                                      'value' => 'on'
                                  ),
                                  'orderby' => 'desc',
                              ));
                              break;

                          default:

                              $anasayfa_slider = new WP_Query(array(
                                  'posts_per_page' => 7,
                                  'meta_key' => 'bf_anasayfa_slider',
                                  'meta_query' => array(
                                      'key' => 'bf_anasayfa_slider',
                                      'value' => 'on'
                                  ),
                                  'orderby' => 'desc',
                              ));
                              break;
                      endswitch;

                      foreach ($anasayfa_slider->posts as $key => $value) :
                          $post_id = $value->ID;
                          ?>
                          <div class="item">
                              <a href="<?= get_permalink($post_id) ?>">
                                  <div class="thumb">
                                      <?= get_the_post_thumbnail($post_id, 'anasayfa_sag_manset', array('alt' => get_the_title($post_id))); ?>
                                  </div>
                                  <div class="text"><span><?= get_the_title($post_id) ?></span></div>
                              </a>
                          </div>
                      <?php endforeach; ?>

                  </div>
              </div>
              <?php
          } else {
              ?>
              <div class="main-slider">
                  <div id="main-slider" class="owl-carousel">


                      <?php
                      switch ($instance['type']):
                          case 'lastPost':
                              $anasayfa_slider = new WP_Query(array(
                                  'posts_per_page' => 7,
                                  'order' => 'desc',
                              ));
                              break;

                          case 'special':

                              $anasayfa_slider = new WP_Query(array(
                                  'posts_per_page' => 7,
                                  'meta_key' => 'bf_anasayfa_slider',
                                  'meta_query' => array(
                                      'key' => 'bf_anasayfa_slider',
                                      'value' => 'on'
                                  ),
                                  'orderby' => 'desc',
                              ));
                              break;

                          default:

                              $anasayfa_slider = new WP_Query(array(
                                  'posts_per_page' => 7,
                                  'meta_key' => 'bf_anasayfa_slider',
                                  'meta_query' => array(
                                      'key' => 'bf_anasayfa_slider',
                                      'value' => 'on'
                                  ),
                                  'orderby' => 'desc',
                              ));
                              break;
                      endswitch;
                      foreach ($anasayfa_slider->posts as $key => $value) :
                          $post_id = $value->ID;
                          ?>
                          <div class="item">
                              <?= get_the_post_thumbnail($post_id, 'anasayfa_sag_manset', array('alt' => get_the_title($post_id))); ?>
                              <div class="title"><a
                                          href="<?= get_permalink($post_id) ?>"><?= get_the_title($post_id) ?></a></div>
                          </div>

                      <?php endforeach; ?>
                  </div>
              </div>
              <?php
          }

      }
  }
