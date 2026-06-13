<?php

CSF::createWidget( 'anasayfa_doviz_populer', array(
  'title'       => 'Anasayfa Döviz Popüler',
  'classname'   => 'anasayfa-doviz-populer',
  'description' => 'Anasayfa Döviz Popüler',
) );

if( ! function_exists( 'anasayfa_doviz_populer' ) ) {
  function anasayfa_doviz_populer( $args, $instance ) {
    ?>
    <div class="daily-news">
      <ul>
        <?php

        $post_by_views = new WP_Query( array(
          'meta_key' => 'post_views_count',
          'orderby' => 'meta_value_num',
          'posts_per_page' => 8
        ) );
        foreach($post_by_views->posts as $key=>$value) :
          $post_id = $value->ID; ?>
        <li>
          <div class="thumb"><?=get_the_post_thumbnail( $post_id, 'anasayfa_doviz_populer', array( 'alt' => get_the_title() ) );  ?></div>
          <div class="content">
            <div class="title"><a href="<?=get_permalink($post_id);?>"><?=get_the_title($post_id); ?></a></div>
            <div class="date"><?=str_replace("-",".",explode(" ",$value->post_date)[0])?></div>
          </div>
        </li>
      <?php endforeach; ?>

      </ul>
    </div>

    <?php
  }
}

?>