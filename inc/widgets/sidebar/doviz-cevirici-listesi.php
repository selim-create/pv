<?php

CSF::createWidget( 'doviz_cevirici_listesi', array(
  'title'       => 'Sidebar Döviz Çevirici Listesi',
  'classname'   => 'doviz-cevirici-listesi',
  'description' => 'Döviz Çevirici Listesi',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'Döviz Çevirici Listesi',
    ),
  ),
) );

if( ! function_exists( 'doviz_cevirici_listesi' ) ) {
  function doviz_cevirici_listesi( $args, $instance ) {
    global $currency_data, $coin_data, $bist100_data, $altin_data, $bp_options;
    ?>
    <!-- Widget -->
    <div class="widget">
      <div class="sidebarHead"><?=$instance['baslik']?></div>
      <table class="currencyTable" style="border-top: 0;width: 302px;margin-top: 20px;border-top: 1px solid #dcdcdc;">

        <tbody>
          <?php
          $remove_currency = array(
            'zar', 'huf', 'csk', 'brl', 'ars', 'ron', 'inr'
          );

          foreach ($remove_currency as $key2 => $value) {
            $remove_currency[$value] = true;
          }

           foreach(array_unique($currency_data['code']) as $key=>$val):
            if(str_replace(",",".",$currency_data['change_rate'][$key]) > 0){
              $crease_status = "increase";
            }else{
              $crease_status = "decrease";
            }
            if($remove_currency[$key] == "1"): continue; endif;
             ?>
          <tr>
            <td style="padding-right:0px;"><a href="<?php bloginfo("home")?>/<?=$bp_options['page_dovizhesapla']?>?doviz=<?=$key?>&miktar=1" style="color: #3b72de;"><img src="<?php bloginfo('template_directory'); ?>/img/flag/<?=str_replace("csk","czk",$key)?>.png" width="24" height="16" alt="<?=$currency_data['full_name'][$key]?> - <?=strtoupper($currency_data['code'][$key])?>"> <b><?=$currency_data['full_name'][$key]?> - <?=strtoupper($currency_data['code'][$key])?></b></a></td>

          </tr>

          <?php

          endforeach;
          ?>

        </tbody>
    </table>
    </div>
    <!-- #Widget -->

    <?php
  }
}

?>
