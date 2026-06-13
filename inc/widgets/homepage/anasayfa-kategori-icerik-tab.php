<?php

foreach (get_categories() as $key => $value) {
  $category[$value->term_id] = $value->name;
}
// Anasayfa (Content) Kategori Icerik Tab
CSF::createWidget( 'anasayfa_kategori_icerik_tab', array(
  'title'       => 'Anasayfa (Content) Kategori İçerik Tabları (Tek)',
  'classname'   => 'anasayfa-kategori-icerik-tab',
  'description' => 'Anasayfa (Content) Kategori İçerik Tabları (Tek)',
  'fields'    => array(
        array(
          'id'      => 'tab_post_count',
          'type'    => 'text',
          'title'   => 'İçerik Sayısı',
          'default' => '6',
        ),
        array(
          'type'  => 'subheading',
          'content' => 'Tab #1',
        ),
        array(
          'id'    => 'tab1_switcher',
          'type'  => 'switcher',
          'title' => 'Tab 1 Görünsün',
        ),

        array(
          'id'    => 'tab1_icon',
          'type'  => 'switcher',
          'title' => 'Tab 1 İcon Görünsün',
        ),

        array(
          'id'    => 'tab1_title',
          'type'  => 'text',
          'title' => 'Tab 1 Başlık',
        ),

        array(
          'id'          => 'tab1_select',
          'type'        => 'select',
          'title'       => 'Kategori Seçimi',
          'placeholder' => 'Kategori seç',
          'options'     => $category
        ),

        array(
          'id'        => 'tab1_image',
          'type'      => 'image_select',
          'title'     => 'Tab 1  İcon',
          'options'   => array(
            ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png',
          ),
          'default'   => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png'
        ),

        array(
          'type'  => 'subheading',
          'content' => 'Tab #2',
        ),
        array(
          'id'    => 'tab2_switcher',
          'type'  => 'switcher',
          'title' => 'Tab 2 Görünsün',
        ),

        array(
          'id'    => 'tab2_icon',
          'type'  => 'switcher',
          'title' => 'Tab 2 İcon Görünsün',
        ),

        array(
          'id'    => 'tab2_title',
          'type'  => 'text',
          'title' => 'Tab 2 Başlık',
        ),

        array(
          'id'          => 'tab2_select',
          'type'        => 'select',
          'title'       => 'Kategori Seçimi',
          'placeholder' => 'Kategori seç',
          'options'     => $category
        ),

        array(
          'id'        => 'tab2_image',
          'type'      => 'image_select',
          'title'     => 'Tab 2  İcon',
          'options'   => array(
            ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png',
          ),
          'default'   => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png'
        ),

        array(
          'type'  => 'subheading',
          'content' => 'Tab #3',
        ),
        array(
          'id'    => 'tab3_switcher',
          'type'  => 'switcher',
          'title' => 'Tab 3 Görünsün',
        ),

        array(
          'id'    => 'tab3_icon',
          'type'  => 'switcher',
          'title' => 'Tab 3 İcon Görünsün',
        ),

        array(
          'id'    => 'tab3_title',
          'type'  => 'text',
          'title' => 'Tab 3 Başlık',
        ),

        array(
          'id'          => 'tab3_select',
          'type'        => 'select',
          'title'       => 'Kategori Seçimi',
          'placeholder' => 'Kategori seç',
          'options'     => $category
        ),

        array(
          'id'        => 'tab3_image',
          'type'      => 'image_select',
          'title'     => 'Tab 3  İcon',
          'options'   => array(
            ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png',
          ),
          'default'   => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png'
        ),

        array(
          'type'  => 'subheading',
          'content' => 'Tab #4',
        ),
        array(
          'id'    => 'tab4_switcher',
          'type'  => 'switcher',
          'title' => 'Tab 4 Görünsün',
        ),

        array(
          'id'    => 'tab4_icon',
          'type'  => 'switcher',
          'title' => 'Tab 4 İcon Görünsün',
        ),

        array(
          'id'    => 'tab4_title',
          'type'  => 'text',
          'title' => 'Tab 4 Başlık',
        ),

        array(
          'id'          => 'tab4_select',
          'type'        => 'select',
          'title'       => 'Kategori Seçimi',
          'placeholder' => 'Kategori seç',
          'options'     => $category
        ),

        array(
          'id'        => 'tab4_image',
          'type'      => 'image_select',
          'title'     => 'Tab 4  İcon',
          'options'   => array(
            ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png',
          ),
          'default'   => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png'
        ),

        array(
          'type'  => 'subheading',
          'content' => 'Tab #5',
        ),
        array(
          'id'    => 'tab5_switcher',
          'type'  => 'switcher',
          'title' => 'Tab 5 Görünsün',
        ),

        array(
          'id'    => 'tab5_icon',
          'type'  => 'switcher',
          'title' => 'Tab 5 İcon Görünsün',
        ),

        array(
          'id'    => 'tab5_title',
          'type'  => 'text',
          'title' => 'Tab 5 Başlık',
        ),

        array(
          'id'          => 'tab5_select',
          'type'        => 'select',
          'title'       => 'Kategori Seçimi',
          'placeholder' => 'Kategori seç',
          'options'     => $category
        ),

        array(
          'id'        => 'tab5_image',
          'type'      => 'image_select',
          'title'     => 'Tab 5  İcon',
          'options'   => array(
            ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/two.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/three.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/four.png',
            ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png' => ''.get_bloginfo("template_directory").'/img/icons/catTab/five.png',
          ),
          'default'   => ''.get_bloginfo("template_directory").'/img/icons/catTab/one.png'
        ),

      )
) );

if( ! function_exists( 'anasayfa_kategori_icerik_tab' ) ) {
  function anasayfa_kategori_icerik_tab( $args, $instance ) {
    $instance['tab_post_count'] = (int) $instance['tab_post_count'];
    ?>
<div class="widget">
    <div class="categoryTab">

      <!-- Tab Head -->
      <div class="tabHead bg">
        <ul>
          <?php if($instance['tab1_switcher'] == 1){?>
            <li class="ihtiyac-kredisi"><i style="background-image: url('<?=$instance['tab1_image']?>') !important;<?php if($instance['tab1_icon'] != 1): ?> display:none; <?php endif; ?>"></i><span><?=$instance['tab1_title']?></span></li>
          <?php }
          if($instance['tab2_switcher'] == 1){ ?>
          <li class="konut-kredisi"><i style="background-image: url('<?=$instance['tab2_image']?>') !important;<?php if($instance['tab2_icon'] != 1): ?> display:none; <?php endif; ?>"></i><span><?=$instance['tab2_title']?></span></li>
          <?php }
          if($instance['tab3_switcher'] == 1){
              ?><li class="tasit-kredisi"><i style="background-image: url('<?=$instance['tab3_image']?>') !important;<?php if($instance['tab3_icon'] != 1): ?> display:none; <?php endif; ?>"></i><span><?=$instance['tab3_title']?></span></li><?php
          }

          if($instance['tab4_switcher'] == 1){
              ?><li class="kobi-kredisi"><i style="background-image: url('<?=$instance['tab4_image']?>') !important;<?php if($instance['tab4_icon'] != 1): ?> display:none; <?php endif; ?>"></i><span><?=$instance['tab4_title']?></span></li><?php

          }

          if($instance['tab5_switcher'] == 1){
            ?><li class="tarim-kredisi"><i style="background-image: url('<?=$instance['tab5_image']?>') !important;<?php if($instance['tab5_icon'] != 1): ?> display:none; <?php endif; ?>"></i><span><?=$instance['tab5_title']?></span></li><?php
          }
          ?>
        </ul>
      </div>

      <?php if($instance['tab1_switcher'] == 1){
        $cat_id = get_query_var('cat');
          $catquery = new WP_Query(array(
            'order' => 'desc',
            'category__in' => $instance['tab1_select'],
            'posts_per_page' => $instance['tab_post_count'],
            'ignore_sticky_posts' => '-1',
            )
          );

        ?>
      <!-- Cat Tab 1 -->
      <div class="catTabContent">

        <div class="inner">
          <?php
          while($catquery->have_posts()) : $catquery->the_post();
          $current_id = get_the_ID();
          ?>
          <div class="item">
            <div class="thumb"><a href="<?php the_permalink()?>"><?php the_post_thumbnail( 'kategori_tab_image', array( 'alt' => get_the_title() ) );  ?></div>
            <div class="title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></div>

          </div>

        <?php endwhile; wp_reset_query(); ?>

        </div>

      </div>

    <?php } ?>

    <?php if($instance['tab2_switcher'] == 1){
      $cat_id = get_query_var('cat');
        $catquery = new WP_Query(array(
          'order' => 'desc',
          'category__in' => $instance['tab2_select'],
          'posts_per_page' => $instance['tab_post_count'],
          'ignore_sticky_posts' => '-1',
          )
        );

      ?>
    <!-- Cat Tab 2 -->
    <div class="catTabContent">

      <div class="inner">
        <?php
        while($catquery->have_posts()) : $catquery->the_post();
        $current_id = get_the_ID();
        ?>
        <div class="item">
          <div class="thumb"><a href="<?php the_permalink()?>"><?php the_post_thumbnail( 'kategori_tab_image', array( 'alt' => get_the_title() ) );  ?></div>
          <div class="title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></div>

        </div>

      <?php endwhile; wp_reset_query(); ?>

      </div>

      </div>
    <?php }

    if($instance['tab3_switcher']){
      $cat_id = get_query_var('cat');
        $catquery = new WP_Query(array(
          'order' => 'desc',
          'category__in' => $instance['tab3_select'],
          'posts_per_page' => $instance['tab_post_count'],
          'ignore_sticky_posts' => '-1',
          )
        );

      ?>
    <!-- Cat Tab 3 -->
    <div class="catTabContent">

      <div class="inner">
        <?php
        while($catquery->have_posts()) : $catquery->the_post();
        $current_id = get_the_ID();
        ?>
        <div class="item">
          <div class="thumb"><a href="<?php the_permalink()?>"><?php the_post_thumbnail( 'kategori_tab_image', array( 'alt' => get_the_title() ) );  ?></div>
          <div class="title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></div>

        </div>

      <?php endwhile; wp_reset_query(); ?>

      </div>

      </div>

    <?php }
    if($instance['tab4_switcher']){
      $cat_id = get_query_var('cat');
        $catquery = new WP_Query(array(
          'order' => 'desc',
          'category__in' => $instance['tab4_select'],
          'posts_per_page' => $instance['tab_post_count'],
          'ignore_sticky_posts' => '-1',
          )
        );

      ?>
    <!-- Cat Tab 4 -->
    <div class="catTabContent">

      <div class="inner">
        <?php
        while($catquery->have_posts()) : $catquery->the_post();
        $current_id = get_the_ID();
        ?>
        <div class="item">
          <div class="thumb"><a href="<?php the_permalink()?>"><?php the_post_thumbnail( 'kategori_tab_image', array( 'alt' => get_the_title() ) );  ?></div>
          <div class="title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></div>

        </div>

      <?php endwhile; wp_reset_query(); ?>

      </div>
        </div>



    <?php }

    if($instance['tab5_switcher']){ $cat_id = get_query_var('cat');
      $catquery = new WP_Query(array(
        'order' => 'desc',
        'category__in' => $instance['tab5_select'],
        'posts_per_page' => $instance['tab_post_count'],
        'ignore_sticky_posts' => '-1',
        )
      );

    ?>
  <!-- Cat Tab 5 -->
  <div class="catTabContent">

    <div class="inner">
      <?php
      while($catquery->have_posts()) : $catquery->the_post();
      $current_id = get_the_ID();
      ?>
      <div class="item">
        <div class="thumb"><a href="<?php the_permalink()?>"><?php the_post_thumbnail( 'kategori_tab_image', array( 'alt' => get_the_title() ) );  ?></div>
        <div class="title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></div>

      </div>

    <?php endwhile; wp_reset_query(); ?>

    </div>

      </div>
    <?php } ?>


    </div>
  </div>
  <!-- #Widget -->

<?php }
} ?>
