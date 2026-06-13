<?php

CSF::createWidget('grafik_sidebar', array(
    'title'       => 'Sidebar Grafik',
    'classname'   => 'sidebar-grafik',
    'description' => 'Grafik',
    'fields'      => array(
        array(
            'id' => 'title',
            'type' => 'text',
            'title' => 'Başlık',
            'default' => 'Grafik',
        ),
        array(
            'id'      => 'type',
            'type'    => 'select',
            'title'   => 'Grafik Tipi',
            'options' => [
                'gram-altin' => 'Gram Altın',
                'dolar' => 'Dolar',
                'euro' => 'Euro',
                'btc' => 'BTC'
            ]
        ),
    ),
));

if (!function_exists('grafik_sidebar')) {
    function grafik_sidebar($args, $instance)
    {
        $currency_graph = get_currency_graph($instance['type']); ?>
        <!-- Widget -->
        <div class="widget">
            <div class="sidebarHead sidebarArtan"><?= $instance['title'] ?></div>
            <div class="currencyChart" id="container_daily_<?= $instance['type'] ?>"></div>


            <script>
                $.get("<?php bloginfo("template_directory"); ?>/api/highcharts.php", function(values) {
                    Highcharts.chart('container_daily_<?= $instance['type'] ?>', {
                        chart: {
                            zoomType: 'x'
                        },
                        title: {
                            text: '<?= $instance['title'] ?> Günlük'
                        },
                        subtitle: {
                            text: document.ontouchstart === undefined ?
                                '' : ''
                        },
                        xAxis: {
                            type: 'datetime',
                            dateTimeLabelFormats: {
                                day: '%d %b %Y' //ex- 01 Jan 2016
                            }
                        },
                        yAxis: {
                            title: {
                                text: ''
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            area: {
                                fillColor: {
                                    linearGradient: {
                                        x1: 0,
                                        y1: 0,
                                        x2: 0,
                                        y2: 1
                                    },
                                    stops: [
                                        [0, Highcharts.getOptions().colors[0]],
                                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                    ]
                                },
                                marker: {
                                    radius: 2
                                },
                                lineWidth: 1,
                                states: {
                                    hover: {
                                        lineWidth: 1
                                    }
                                },
                                threshold: null
                            }
                        },

                        series: [{
                            type: 'area',
                            name: '<?= $instance['title'] ?>',
                            data: [
                                <?php
                                foreach ($currency_graph as $value) {
                                    ?>[<?= $value['tarih'] ?>, <?= $value['fiyat'] ?>], <?php
                                } ?>
                            ]

                        }]
                    });
                });
            </script>
        </div>
        <!-- #Widget -->

<?php
    }
}

?>
