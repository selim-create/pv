<?php
foreach (get_categories() as $key => $value) {
  $category[$value->term_id] = $value->name;
}

CSF::createWidget( 'kategori_sidebar', array(
  'title'       => 'Sidebar Kategori',
  'classname'   => 'kategori-sidebar',
  'description' => 'Kategori',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'İhtiyaç Kredisi',
    ),
    array(
      'id'      => 'miktar',
      'type'    => 'text',
      'title'   => 'İçerik Miktarı',
      'default' => '5',
    ),
    array(
      'id'          => 'kategori',
      'type'        => 'select',
      'title'       => 'Kategori Seçimi',
      'placeholder' => 'Kategori seç',
      'options'     => $category
    ),
  ),
) );

if( ! function_exists( 'kategori_sidebar' ) ) {
  function kategori_sidebar( $args, $instance ) {
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="sidebarHead popularNewsHead"><?=$instance['baslik']?></div>
      <div class="popularNews">
        <?php

        $post_by_views = new WP_Query( array(
          'meta_key' => 'post_views_count',
          'orderby' => 'meta_value_num',
          'cat' => (int) $instance['kategori'],
          'posts_per_page' => (int) $instance['miktar']
        ) );
        foreach($post_by_views->posts as $key=>$value) :
          $post_id = $value->ID;

        ?>
        <div class="item">
          <div class="thumb"><a href="<?=get_permalink($post_id);?>"><?=get_the_post_thumbnail( $post_id, 'en_cok_okunan_image', array( 'alt' => get_the_title() ) );  ?></a></div>
          <div class="title"><a href="<?=get_permalink($post_id);?>"><?=get_the_title($post_id); ?></a>
            <div class="info">
              <div class="cat"><a href="<?=get_category_link(get_the_category($current_id)[0]);?>" style="display: inline-block;"><?=get_the_category($current_id)[0]->cat_name?></a></div>
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
