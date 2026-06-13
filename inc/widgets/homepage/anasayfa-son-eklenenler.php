<?php
CSF::createWidget( 'anasaya_son_eklenenler', array(
    'title'       => 'Anasayfa (Content) Haberler',
    'classname'   => 'anasayfa-son-eklenenler',
    'description' => 'Anasayfa (Content) Haberler (Tek)',
    'fields'      => array(
        array(
            'id'    => 'list_type',
            'type'  => 'select',
            'title' => 'Listeleme Tipi',
            'options' => array(
                'lastPost'  => 'Son Eklenenler',
                'special'   => 'İşaretlenenleri Listele',
                'populer'   => 'Popüler Haberler',
                'lastComments'   => 'En Çok Yorumlanan Haberler',
            )
        ),

        array(
            'id'      => 'baslik',
            'type'    => 'text',
            'title'   => 'Başlık',
            'default' => 'Son Eklenen Haberler',
         ),
         array(
            'id'      => 'miktar',
            'type'    => 'text',
            'title'   => 'İçerik Miktarı',
            'default' => '5',
         ),

        array(
            'id'      => 'mansetPasif',
            'type'    => 'switcher',
            'title'   => 'Manşete Eklenen Haberleri Gösterme',
        ),




    ),
  ) );

  if( ! function_exists( 'anasaya_son_eklenenler' ) ) {
    function anasaya_son_eklenenler( $args, $instance ) {
      $instance['miktar'] = (int) $instance['miktar'];
      ?>
      <div class="widget">
        <div class="lastNewsHead">
            <?=$instance['baslik']?>
          </div>
        <div class="lastNews">
          <?php

          switch ($instance['list_type']):
              case 'lastPost':
                  $catquery = new WP_Query(array(
                      'p' => 0,
                      'order'=> 'DESC',
                      'posts_per_page'=> $instance['miktar'],
                  ));

                  if($instance['mansetPasif']){
                      $catquery = new WP_Query(array(
                          'p' => 0,
                          'posts_per_page'=> $instance['miktar'],
                          'order'   => 'DESC',
                          'meta_key'			=> 'bf_anasayfa_slider',
                          'meta_value'		=> 'on',
                          'meta_compare'     => 'NOT EXISTS'
                      ));
                  }


                break;

              case 'special':
                  $catquery = new WP_Query(array(
                      'p' => 0,
                      'posts_per_page'=> $instance['miktar'],
                      'meta_key'		=> 'bf_anasayfa_kayan',
                      'meta_query'	=> array(
                          'key'			=> 'bf_anasayfa_kayan',
                          'value'		=> 'on'
                      ),
                      'orderby' => 'desc',
                  ));

                  break;
              case 'populer':
                  $catquery = new WP_Query(array(
                      'p' => 0,
                      'posts_per_page'=> $instance['miktar'],
                      'meta_key' => 'post_views_count',
                      'orderby' => 'meta_value_num',
                  ));

                  if($instance['mansetPasif'] == 1){
                      $catquery = new WP_Query(array(
                          'p' => 0,
                          'posts_per_page'=> $instance['miktar'],
                          'meta_key' => 'post_views_count',
                          'meta_query'	=> array(
                              'key'			=> 'bf_anasayfa_slider',
                              'value'		=> 'off'
                          ),
                          'orderby' => 'meta_value_num',
                      ));
                  }


                  break;

              case 'lastComments':
                  $catquery = new WP_Query(array(
                      'p' => 0,
                      'posts_per_page'=> $instance['miktar'],
                      'orderby' => 'comment_count',
                  ));

                  if($instance['mansetPasif'] == 1){
                      $catquery = new WP_Query(array(
                          'p' => 0,
                          'posts_per_page'=> $instance['miktar'],
                          'orderby' => 'comment_count',
                          'meta_key'			=> 'bf_anasayfa_slider',
                          'meta_value'		=> 'on',
                          'meta_compare'     => 'NOT EXISTS'
                      ));
                  }
                  break;

              default:
                  $catquery = new WP_Query(array(
                      'p' => 0,
                      'order'=> 'DESC',
                      'posts_per_page'=> $instance['miktar'],
                  ));
                  break;
          endswitch;

          while($catquery->have_posts()) :
            $catquery->the_post();
            $current_id = get_the_ID();
            $category_ids = kategori_listele($current_id);
            ?>
          <div class="item" data-page="<?=sunset_check_pagedNews()?>">
            <div class="thumb"><a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail( 'icerik_image', array( 'alt' => get_the_title() ) );  ?></a>
            </a></div>
            <div class="content-summary">
              <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
              <div class="summary"><?=get_snippet(strip_tags(get_the_excerpt($current_id)), 30)?></div>
              <div class="categories">

                  <a href="<?=get_category_link($category_ids[1])?>"><?=get_cat_name( $category_ids[1] )?></a>
                  <?php if(@$category_ids[0]): ?>
                  <a href="<?=get_category_link($category_ids[0])?>"><?=get_cat_name( $category_ids[0] )?></a>
                  <?php endif; ?>

              </div>
            </div>
          </div>
          <?php $current_id = null; endwhile;	?>

        </div>
        <div style="margin-top: 20px;" class="loadMoreButton homeLoadMore" data-page="<?php echo sunset_check_pagedNews(1); ?>" data-count="<?=$instance['miktar']?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" data-category="">
          <span>Daha Fazla İçerik Yükle</span>
        </div>
      </div>
      <!-- #Widget -->
      <div class="clear"></div>

      <?php
    }
  }