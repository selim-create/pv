<?php

CSF::createWidget( 'sidebar_en_son_haberler', array(
  'title'       => 'Sidebar En Son Haberler',
  'classname'   => 'sidebar-en-son-haberler',
  'description' => 'Sidebar En Son Haberler',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'SON HABERLER',
    ),
    array(
      'id'      => 'miktar',
      'type'    => 'text',
      'title'   => 'İçerik Miktarı',
      'default' => '5',
    ),
  ),
) );

if( ! function_exists( 'sidebar_en_son_haberler' ) ) {
  function sidebar_en_son_haberler( $args, $instance ) {
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="sidebarHead popularNewsHead"><?=$instance['baslik']?></div>
      <div class="popularNews">
        <?php

        $post_by_views = new WP_Query( array(
          'order'=> 'DESC',
          'posts_per_page' => (int) $instance['miktar']
        ) );
        foreach($post_by_views->posts as $key=>$value) :
          $post_id = $value->ID;

        ?>
        <div class="item">
          <div class="thumb"><a href="<?=get_permalink($post_id);?>"><?=get_the_post_thumbnail( $post_id, 'en_cok_okunan_image', array( 'alt' => get_the_title() ) );  ?></a></div>
          <div class="title"><a href="<?=get_permalink($post_id);?>"><?=get_the_title($post_id); ?></a>
            <div class="info">
              <div class="cat"><a href="<?=get_category_link(get_the_category($post_id)[0]);?>" style="display: inline-block;"><?=get_the_category($post_id)[0]->cat_name?></a></div>
              <div class="date">  -  <?=strftime("%e %B %Y", strtotime($value->post_date))?></div>
              <div class="comment-number"><?=get_comments_number($post_id)?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
    <!-- #Widget -->

    <?php
  }
}

?>
