<?php

CSF::createWidget( 'sidebar_en_cok_yorumlananlar', array(
  'title'       => 'Sidebar En Çok Yorumlananlar',
  'classname'   => 'sidebar-en-cok-yorumlananlar',
  'description' => 'Sidebar En Çok Yorumlananlar',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'EN ÇOK YORUMLANAN HABERLER',
    ),
    array(
      'id'      => 'miktar',
      'type'    => 'text',
      'title'   => 'İçerik Miktarı',
      'default' => '3',
    ),
  ),
) );

if( ! function_exists( 'sidebar_en_cok_yorumlananlar' ) ) {
  function sidebar_en_cok_yorumlananlar( $args, $instance ) {
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="sidebarHead"><?=$instance['baslik']?></div>
      <div class="mostComment">
        <?php
        $instance['miktar'] = (int) $instance['miktar'];
         $popular = new WP_Query('orderby=comment_count&posts_per_page='.$instance['miktar']); ?>
        <?php while ($popular->have_posts()) : $popular->the_post();
        $current_id = get_the_ID();
         ?>
        <div class="item">
          <div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'en_cok_yorumlanan', array( 'alt' => get_the_title() ) );  ?></a></div>
          <div class="postSummary">
            <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
            <div class="info">
              <div class="comment-number"><?=get_comments_number($current_id)?></div>
              <div class="cat"><a href="<?=get_category_link(get_the_category($current_id)[0]);?>" style="display: inline-block;"><?=get_the_category($current_id)[0]->cat_name?></a></div>
              <div class="date"> - <?=get_the_date("d M Y")?></div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>

      </div>
    </div>
    <!-- #Widget -->

    <?php
  }
}

?>
