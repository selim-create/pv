<?php
/*
  Template Name: Coin Detay
*/

global $bp_options;
$coin = $_GET['c'];
$current_page_id = get_queried_object_id();

$coin_kaynak = get_url_doviz_auth($ad = 'https://www.doviz.com/kripto-paralar/' . $coin);
preg_match_all("@var apiAccessToken = '(.*?)';@si", $coin_kaynak, $auth_code);
preg_match_all('@<h1 class="page-title text-white">(.*?)</h1>@si', $coin_kaynak, $parite_name);
preg_match_all('@<div class="text-md font-semibold text-white mt-4">(.*?)</div>@si', $coin_kaynak, $borsa_value);
preg_match_all('@"change_rate_str":"(.*?)"@si', $coin_kaynak, $borsa_rate);

$new_title = $parite_name[1][0] . ' - ' . get_bloginfo('name');
function generate_custom_title($title)
{
    global $new_title;
    $title = $new_title;

    return $title;
}

add_filter('pre_get_document_title', 'generate_custom_title', 10);
add_filter('wpseo_title', 'generate_custom_title', 15);

if (empty(@$_GET['c'])) {
    ?>
    <script>
        window.location.href = "<?php bloginfo('home') ?>";
    </script><?php
}
            get_header();

                ?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/highcharts.js">
</script>
<style>
    .currencyTable tr td {
        font-weight: normal;
    }
</style>
<!-- Site Wrapper -->
<div class="site-wrapper">

    <!-- Content -->
    <section class="content home">
        <div class="container-wrap">

            <!-- WideBar -->
            <div class="widebar floatLeft">

                <div class="singleWrapper">

                    <!-- BreadCrumb -->
                    <div class="breadcrumb">
                        <ul class="block">
                            <li><a href="<?php bloginfo('home') ?>">Anasayfa<i>/</i></a>
                            </li>
                            <li><a href="<?php bloginfo('home') ?>/<?= $bp_options['page_kriptoparalar'] ?>/">Kriptoparalar<i>/</i></a>
                            </li>
                            <li class="post bg"><span><?= $parite_name[1][0] ?></span></li>
                        </ul>
                    </div>
                    <?php if (!empty($parite_name[1][0])) : ?>
                        <h1 class="singlePageTitle"><?= $parite_name[1][0] ?>
                            <div class="borsaValue" style="float:inherit; font-size: 12px; color: #FF4164;display: inline-block;position: relative; bottom: 2px;">
                                <?= $borsa_value[1][0] ?>
                                (<?= $borsa_rate[1][1] ?>)
                            </div>
                        </h1>

                        <div class="singleContent block">

                            <!-- Main Content -->
                            <div class="mainContent onsAltin">

                                <!-- Main -->
                                <div class="main">

                                    <!-- Widget -->
                                    <div class="widget" style="margin-bottom: 15px;">
                                        <div class="categoryTab">
                                            <!-- Cat Tab 1 -->
                                            <div class="catTabContent">
                                                <?php if (wp_is_mobile()) : ?><?php else : ?><?php endif; ?>
                                                <div class="clear"></div>
                                                <!-- Tab Head -->
                                                <div class="borsaTimerTabHead bg">
                                                    <ul>
                                                        <li><span><?= $parite_name[1][0] ?></span>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="borsaTimerTabContent">

                                                    <div class="currencyChart" id="container_daily"></div>
                                                    <script>
                                                        $.get("<?php bloginfo('template_directory'); ?>/api/highcharts.php",
                                                            function(values) {


                                                                Highcharts.chart('container_daily', {
                                                                    chart: {
                                                                        zoomType: 'x'
                                                                    },
                                                                    title: {
                                                                        text: '<?= $parite_name[1][0] ?> - USD'
                                                                    },
                                                                    subtitle: {
                                                                        text: document.ontouchstart ===
                                                                            undefined ?
                                                                            '' : ''
                                                                    },
                                                                    xAxis: {
                                                                        type: 'datetime'
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
                                                                                    [0, Highcharts
                                                                                        .getOptions()
                                                                                        .colors[0]
                                                                                    ],
                                                                                    [1, Highcharts.Color(
                                                                                            Highcharts
                                                                                            .getOptions()
                                                                                            .colors[0])
                                                                                        .setOpacity(0).get(
                                                                                            'rgba')
                                                                                    ]
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
                                                                        name: '<?= $parite_name[1][0] ?>',
                                                                        data: [
                                                                            <?php
		                                                                        $daily_currency_single = get_url_curl($ad = 'https://www.doviz.com/api/v11/assets/' . $coin . '/daily',
			                                                                        array(
				                                                                        'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0',
				                                                                        'Accept: */*',
				                                                                        'Accept-Language: en-US,en;q=0.5',
				                                                                        'X-Requested-With: XMLHttpRequest',
				                                                                        'Authorization: Bearer ' . $auth_code[1][0]
			                                                                        ));
		                                                                        
		                                                                        $coin_json = json_decode($daily_currency_single, true)['data'];
                                                                            
                                                                            foreach ($coin_json as $key3 => $value) {
                                                                                ?>[<?= $value['update_date'] * 1000 ?>, <?= $value['close'] ?>],
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        ]

                                                                    }]
                                                                });
                                                            });
                                                    </script>

                                                    <div class="clear"></div>
                                                    <p style="margin-bottom: 10px; margin-top: 10px;">* Piyasaların
                                                        kapalı olduğu gün ve saatlerde veri akışı
                                                        bulunmamaktadır.</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- #Widget -->

                                    <?php
                                    $kaynakCoin = get_url_curl('https://www.doviz.com/kripto-paralar');
                                    
                                    preg_match_all('@<td>                <a href="https://www.doviz.com/kripto-paralar/(.*?)">                  <img src="https://static.doviz.com/images/coin/(.*?).png" width="30" height="30" alt="(.*?)" loading="lazy" class="stock-icon">                  <div class="currency-details">                    <div>(.*?)</div>                    <div class="cname">(.*?)</div>                  </div>                </a>              </td>              <td class="text-bold">(.*?)</td>              <td>(.*?)</td>              <td>(.*?)</td>              <td>(.*?)</td>              <td class="text-bold color-(.*?)">                (.*?)              </td>              <td class="time">(.*?)</td>            </tr>@si', $kaynakCoin, $coin_data_table);
                                    ?>

                                    <!-- Widget -->
                                    <div class="widget">
                                        <div class="currencyShowcase mobileBottomNo" style="width: 100% !important;">
                                            <table class="currencyTable gold kriptolar">
                                                <tr>
                                                    <th>Kripto Para</th>
                                                    <th>Fiyat</th>
                                                    <th>Değişim</th>
                                                    <th>Saat</th>
                                                </tr>

                                                <?php
                                                $i = 0;
                                                foreach ($coin_data_table[1] as $key => $item) {
                                                    if (empty($coin_data_table[3][$key])) {
                                                        continue;
                                                    }
                                                    $coin_data_table[11][$key] = str_replace('%', '', $coin_data_table[11][$key]);

                                                    if (str_replace(',', '.', $coin_data_table[11][$key]) > 0) {
                                                        $crease_status = 'increase';
                                                        $crease_color = '#40bc9a';
                                                    } else {
                                                        $crease_status = 'decrease';
                                                        $crease_color = '#fc4b67';
                                                    } ?>
                                                    <tr>
                                                        <td>
                                                            <img src="https://static.doviz.com/images/coin/<?= $coin_data_table[2][$key] ?>.png" width="18px" height="18px" />
                                                            <a href="<?php bloginfo('home') ?>/coin/?c=<?= $coin_data_table[2][$key] ?>" style="color: #3b72de !important;font-weight: bold;"><?= $coin_data_table[3][$key] ?></a>
                                                        </td>
                                                        <td style="font-weight: normal;"><i class="<?= $crease_status ?>"></i>
                                                            <em class="crypto_price_BTC" style="color: <?= $crease_color ?>;font-weight: 500;"><?= $coin_data_table[6][$key] ?></em>
                                                        </td>
                                                        <td style="font-weight: normal"><?= $coin_data_table[11][$key] ?>
                                                        </td>
                                                        <td style="font-weight: normal;padding-left: 19px;"><?= $coin_data_table[12][$key] ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    if ($i >= 4) {
                                                        break;
                                                    }
                                                    $i++;
                                                }
                                                ?>

                                            </table>
                                        </div>
                                        <!-- //Currency Showcase -->
                                    </div>
                                    <!-- #Widget -->
	                                
	                                <?php
	                                // $bp_options['veri_sayfalari_text'] find by type value and kisa_kod value by array
	                                foreach ( $bp_options['veri_sayfalari_text'] as $value ) {
		                                if ( $value['type'] == 'kripto' && $value['kisa_kod'] == htmlspecialchars( $_GET['c'] )) {
			                                ?>
                                            <div class="widget">
                                                <div class="sayfaAltMakale">
                                                    <h2><?= $value['baslik'] ?></h2>
                                                    <p style="padding: 20px; line-height: 2"><?= (strip_tags($value['content'])) ?></p>
                                                </div>
                                            
                                            </div>
                                            <!-- #Widget -->
                                            <div class="clear"></div>
			                                <?php
		                                }
	                                }
	                                
	                                ?>

                                </div>

                                <?php if ($bp_options['canliSohbet'] == true) : get_template_part('inc/widgets/live_chat');
                                endif; ?>
                            </div>
                            <!-- #MainBar -->


                        </div>
                    <?php else : ?>
                        <h3>Coin ile ilgili veri bulunamadı</h3>
                    <?php endif; ?>

                </div>

            </div>

            <?php if (!wp_is_mobile()) { ?>
                <div class="sidebar floatRight">
                    <?php dynamic_sidebar('Sidebar (Kripto Detay)'); ?>
                </div>
            <?php } ?>

        </div>

        <?php dynamic_sidebar('Sayfa Alt (Kripto Detay)'); ?>
    </section>
    <!-- Content -->
    <div class="clear"></div>

</div>
<!-- #Site Wrapper -->
<script>
    /*
        Tab (Borsa Timer Tab)
        */
    $(document).ready(function() {
        $("section.content .widebar .widget .borsaTimerTabContent").hide();
        $("section.content .widebar .widget .borsaTimerTabContent:first").show();
        $("section.content .widebar .widget .borsaTimerTabHead ul li:first").addClass("active");
        $("section.content .widebar .widget .borsaTimerTabHead ul li").click(function() {
            $("section.content .widebar .widget .borsaTimerTabHead ul li").removeClass("active");
            $(this).addClass("active");
            $("section.content .widebar .widget .borsaTimerTabContent").hide();
            var tab = $(this).index();
            $("section.content .widebar .widget .borsaTimerTabContent:eq(" + tab + ")").fadeIn();
            return false;
        });
    });
</script>
<script>
    function randomStr(len, arr) {
        var ans = '';
        for (var i = len; i > 0; i--) {
            ans += arr[Math.floor(Math.random() * arr.length)];
        }

        return ans;
    }

    function live_chat() {
        $(".commentForm .submit").val("Gönderiliyor...");
        var random_key = randomStr(10, '1234567890');

        var comment = $(".ql-editor").html();
        var name = $(".nameText").val();

        if (comment.length > 7 && name.length > 1) {
            $(".live_chat_message").html("");
            $.post("<?= admin_url('admin-ajax.php') ?>", {
                    action: "live_chat",
                    page_id: <?= $current_page_id ?>,
                    name: name,
                    comment: comment,
                    random_key: random_key,
                    type: "<?= $_GET['c'] ?? '' ?>"
                })
                .done(function(data) {

                    $(".commentForm .submit").val("Yorumu Gönder");
                    /*$(".commentListing").prepend(data);
                    var $el = $(".comment_live_"+random_key),
                        x = 1000,
                        originalColor = $el.css("background");

                    $el.fadeIn("fast", function() {
                        $el.css("background", "#fffce7");
                    });

                    setTimeout(function(){
                      $el.fadeIn("fast", function() {
                          $el.css("background", originalColor);
                      });

                    }, x);*/

                });
        } else {
            $(".commentForm .submit").val("Yorumu Gönder");
            alert("Lütfen tüm alanları doldurun.");
        }

    }

    function arr_diff(a1, a2) {
        var a = [],
            diff = [];

        for (var i = 0; i < a1.length; i++) {
            a[a1[i]] = true;
        }

        for (var i = 0; i < a2.length; i++) {
            if (a[a2[i]]) {
                delete a[a2[i]];
            } else {
                a[a2[i]] = true;
            }
        }

        for (var k in a) {
            diff.push(k);
        }

        return diff;
    }

    function get_live_chat(page_id) {
        var live_id = [];

        $('.commentListing .comment').each(function() {
            live_id.push($(this).data('id'));
        })

        var current_data = $(".commentListing").html();
        $.post("<?= admin_url('admin-ajax.php') ?>", {
                action: "get_live_chat",
                page_id: page_id,
                type: "<?= $_GET['c'] ?? "" ?>"
            })
            .done(function(data) {
                $(".commentListing .loading").remove();
                var parseJson = jQuery.parseJSON(data);
                var difference_json = arr_diff(live_id, parseJson['search_id']);

                $(difference_json).each(function(index, value) {

                    $(".commentListing").prepend(parseJson[value]['html']).text();
                    var $el = $(".newChat_" + value),
                        x = 1000,
                        originalColor = $el.css("background");

                    $el.fadeIn("fast", function() {
                        $el.css("background", "#fffce7");
                    });

                    setTimeout(function() {
                        $el.fadeIn("fast", function() {
                            $el.css("background", originalColor);
                        });

                    }, x);

                })

            });
    }

    setInterval(function() {
        get_live_chat(<?= $current_page_id ?>)
    }, 1500);
</script>
<?php
get_footer();
