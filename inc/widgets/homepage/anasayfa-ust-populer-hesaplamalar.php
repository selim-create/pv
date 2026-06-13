<?php
error_reporting(0);
CSF::createWidget( 'anasayfa_populer_hesaplamalar', array(
  'title'       => 'Anasayfa (Üst) Popüler Hesaplamalar',
  'classname'   => 'populer-hesaplamalar',
  'description' => 'Kredi Teması Anasayfa (Üst) Popüler Hesaplamalar',
  'fields'      => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'POPÜLER HESAPLAMALAR',
    ),
    array(
  'id'     => 'kredi',
  'type'   => 'repeater',
  'title'  => 'Hesaplamalar',
  'fields' => array(

    array(
      'id'    => 'kredi_fiyat',
      'type'  => 'text',
      'title' => 'Fiyat'
    ),

    array(
      'id'    => 'kredi_tipi',
      'type'  => 'select',
      'title' => 'Kredi Tipi',
      'options'     => array(
        'ihtiyac-kredisi'  => 'İhtiyaç Kredisi',
        'konut-kredisi'  => 'Konut Kredisi',
        'tasit-kredisi'  => 'Taşıt Kredisi',
        'kobi-kredisi'  => 'Kobi Kredisi',
      ),
    ),

    array(
      'id'    => 'kredi_vade',
      'type'  => 'text',
      'title' => 'Vade (Ay)'
    ),

  ),
),
  ),
) );

if( ! function_exists( 'anasayfa_populer_hesaplamalar' ) ) {
  function anasayfa_populer_hesaplamalar( $args, $instance ) {
    global $bp_options;
    ?>
    <!-- Widget -->

      <div class="popularCalculation">
      			<div class="popularCalculationTitle"><?=$instance['baslik']?></div>
      			<ul class="popularCalculationList">
              <?php foreach(@$instance['kredi'] as $key=>$val):
                $kredi_name = str_replace(array(
                  'ihtiyac-kredisi', 'konut-kredisi','tasit-kredisi', 'kobi-kredisi'
                ), array("İhtiyaç Kredisi", 'Konut Kredisi', 'Taşıt Kredisi', 'Kobi Kredisi'), $val['kredi_tipi']);

                $kredi_link = str_replace(array(
                  'ihtiyac-kredisi', 'konut-kredisi','tasit-kredisi', 'kobi-kredisi'
                ), array($bp_options['page_ihtiyackredisi'], $bp_options['page_konutkredisi'], $bp_options['page_tasitkredisi'], $bp_options['page_kobikredisi']), $val['kredi_tipi']);

                $link = get_bloginfo("home")."/".$kredi_link."?type=".str_replace("-kredisi",null,$val['kredi_tipi'])."&vade=".$val['kredi_vade']."&tutar=".$val['kredi_fiyat'];
                 ?>
      				<a href="<?=$link?>"><li><div class="qty"><?=str_replace(",",".",number_format($val['kredi_fiyat']))?> TL</div> <div class="name"><?=$kredi_name?></div> <div class="tax"><?=$val['kredi_vade']?> Ay</div></li></a>
            <?php endforeach; ?>

      			</ul>
      		</div>

    <!-- #Widget -->

    <?php
  }
}

?>
