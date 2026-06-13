<?php

CSF::createWidget( 'altin_sidebar', array(
  'title'       => 'Sidebar Altın Tablosu',
  'classname'   => 'sidebar-altin-tablosu',
  'description' => 'Altınlar',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'ALTINLAR',
    ),
  ),
) );

if( ! function_exists( 'altin_sidebar' ) ) {
  function altin_sidebar( $args, $instance ) {
    global $currency_data, $coin_data, $bist100_data, $altin_data,$borsa_islem_gorenler_data, $borsa_artanlar_data, $altin_data, $bp_options;
    $miktar = (int) $instance['miktar']-1;
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="sidebarHead sidebarArtan"><?=$instance['baslik']?></div>
      <table class="currencyTable" style="border-top: 0;width: 302px;margin-top: 20px;border-top: 1px solid #dcdcdc;">

        <tbody>
          <?php foreach($altin_data['altin_key'] as $key=>$value):
            if(str_replace(",",".",$altin_data['altin_rate'][$key]) > 0){
              $crease_status = "increase";
            }else{
              $crease_status = "decrease";
            }
             ?>
            <tr>
              <td><a href="<?php bloginfo("home")?>/<?=$bp_options['page_altin']?>/?a=<?=$altin_data['altin_key'][$key]?>" style="color: #3b72de;max-height: 32px;overflow: hidden;"><img src="<?php bloginfo('template_directory'); ?>/img/svg/altin.svg" width="18px" alt=""><?=$altin_data['altin_name'][$key]?></a></td>
              <td style="font-weight: normal;"><i class="<?=$crease_status?>"></i> <?=substr($altin_data['altin_price_buying'][$key],0,-1)?></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <!-- #Widget -->

    <?php
  }
}

?>
