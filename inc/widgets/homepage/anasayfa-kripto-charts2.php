<?php
error_reporting(0);
CSF::createWidget( 'anasayfa_kripto_charts2', array(
    'title'       => 'Anasayfa Kripto Grafik 2',
    'classname'   => 'anasayfa-kripto-charts',
    'description' => 'Anasayfa Kriptoparalar Grafik 2',
    'fields'    => array(
        array(
            'id'      => 'baslik',
            'type'    => 'text',
            'title'   => 'Başlık',
            'default' => 'Son 24 Saat Değişimi',
        ),
    ),

) );

if( ! function_exists( 'anasayfa_kripto_charts2' ) ) {
    function anasayfa_kripto_charts2( $args, $instance ) {
        if(!wp_is_mobile()){
            global $coin_data, $bp_options;
            ?>
            <style>
                .tradingview-widget-copyright{display: none;}
            </style>
            <div class="content_widget">
                <div class="sidebarHead"><?=$instance['baslik']?></div>
            </div>

            <div id="container" style="min-width: 310px; height: 380px; margin: 0 auto;clear:both;"><div class="tradingview-widget-container"><div id="tradingview_3ec83"></div><div class="tradingview-widget-copyright">TradingView'den <a href="https://tr.tradingview.com/symbols/BINANCE-BTCTRY/" rel="noopener" target="_blank"><span class="blue-text">BTCTRY Grafiği</span></a></div> <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script> <script type="text/javascript">new TradingView.widget(
                            {
                                "autosize": false,
                                "symbol": "BINANCE:BTCTRY",
                                "timezone": "Etc/UTC",
                                "theme": "light",
                                "width": 800,
                                "height": 400,
                                "style": "1",
                                "locale": "tr",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "withdateranges": true,
                                "range": "5d",
                                "hide_side_toolbar": false,
                                "allow_symbol_change": true,
                                "container_id": "tradingview_3ec83"
                            }
                        );</script> </div></div>
            <?php
        }
    }
}

?>
