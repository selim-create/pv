<?php

CSF::createWidget( 'en_cok_islem_gorenler', array(
  'title'       => 'En Çok İşlem Görenler',
  'classname'   => 'en-cok-islem-gorenler',
  'description' => 'En Çok İşlem Görenler',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'En Çok İşlem Görenler',
    ),

    array(
      'id'      => 'miktar',
      'type'    => 'text',
      'title'   => 'Miktar',
      'default' => '5',
    ),
  ),
) );

if( ! function_exists( 'en_cok_islem_gorenler' ) ) {
  function en_cok_islem_gorenler( $args, $instance ) {
    global $currency_data, $coin_data, $bist100_data, $altin_data,$borsa_islem_gorenler_data, $bp_options;
    $miktar = (int) $instance['miktar']-1;
    ?>
    <style>
    .sidebarIslem:before{background-color: #fab917 !important;}
    </style>
    <!-- Widget -->
    <div class="widget">
      <div class="sidebarHead sidebarIslem"><?=$instance['baslik']?></div>
      <table class="currencyTable" style="border-top: 0;width: 302px;margin-top: 20px;border-top: 1px solid #dcdcdc;">

        <tbody>
          <?php foreach($borsa_islem_gorenler_data as $key=>$value):  ?>
          <tr>
            <td><a href="<?php  bloginfo("home") ?>/<?=$bp_options['page_hisse']?>/?h=<?=$value['link']?>/" style="color: #3b72de !important;font-weight:500;"><?=$value['hisse']?></a></td>
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
