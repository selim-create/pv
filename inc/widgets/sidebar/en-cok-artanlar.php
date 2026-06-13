<?php

CSF::createWidget( 'en_cok_artanlar', array(
  'title'       => 'En Çok Artanlar',
  'classname'   => 'en-cok-artanlar',
  'description' => 'En Çok Artanlar',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'En Çok Artanlar',
    ),

    array(
      'id'      => 'miktar',
      'type'    => 'text',
      'title'   => 'Miktar',
      'default' => '5',
    ),
  ),
) );

if( ! function_exists( 'en_cok_artanlar' ) ) {
  function en_cok_artanlar( $args, $instance ) {
    global $currency_data, $coin_data, $bist100_data, $altin_data,$borsa_islem_gorenler_data, $borsa_artanlar_data, $bp_options;
    $miktar = (int) $instance['miktar']-1;
    ?>
    <style>
      .sidebarArtan:before{background: #32ba5b !important;}
    </style>
    <!-- Widget -->
    <div class="widget">
      <div class="sidebarHead sidebarArtan"><?=$instance['baslik']?></div>
      <table class="currencyTable" style="border-top: 0;width: 302px;margin-top: 20px;border-top: 1px solid #dcdcdc;">

        <tbody>
          <?php foreach($borsa_artanlar_data as $key=>$value): ?>
          <tr>
            <td><a href="<?php  bloginfo("home") ?>/<?=$bp_options['page_hisse']?>/?h=<?=$value['link']?>" style="color: #3b72de !important;font-weight:500;"><?=$value['hisse']?></a></td>
            <td><?=$value['son']?></td>

          </tr>
        <?php if($key == $miktar): break; endif; endforeach; ?>
        </tbody>
    </table>
    </div>
    <!-- #Widget -->

    <?php
  }
}

?>
