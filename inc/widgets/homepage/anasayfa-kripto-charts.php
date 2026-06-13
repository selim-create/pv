<?php
error_reporting(0);
CSF::createWidget( 'anasayfa_kripto_charts', array(
  'title'       => 'Anasayfa Kripto Grafik',
  'classname'   => 'anasayfa-kripto-charts',
  'description' => 'Anasayfa Kriptoparalar Grafik',
  'fields'    => array(
    array(
      'id'      => 'baslik',
      'type'    => 'text',
      'title'   => 'Başlık',
      'default' => 'Son 24 Saat Değişimi',
    ),
  ),

) );

if( ! function_exists( 'anasayfa_kripto_charts' ) ) {
  function anasayfa_kripto_charts( $args, $instance ) {
    if(!wp_is_mobile()){
      global $coin_data, $bp_options;
        ?>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <div class="content_widget">
          <div class="sidebarHead"><?=$instance['baslik']?></div>
        </div>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <script>
                Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    <?php $say = 0; foreach($coin_data['current_price'] as $key=>$value): ?>
                  '<?=$coin_data['name'][$key]?>',
                  <?php $say = $say+1; if($say > 20): break; endif; endforeach; ?>
                ]
            },
            yAxis: {
              title: false
            },
            credits: {
                enabled: false
            },
            series: [

              {
                   showInLegend: false,
                name: 'Değişim Yüzdesi',
                color: '<?=$bp_options['borsa_cikis_arkaplan']?>',
            displayNegative: true,
            negativeColor: '<?=$bp_options['borsa_inis_arkaplan']?>',
                data: [
                  <?php $say = 0; foreach($coin_data['current_price'] as $key=>$value): ?>
                  <?=$coin_data['price_24h'][$key]?>,
                  <?php $say = $say+1; if($say > 20): break; endif; endforeach; ?>
                ]
            },

          ]
        });
        </script>
        <?php
    }
}
}

?>
