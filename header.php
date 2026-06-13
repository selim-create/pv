<?php
global $currency_data, $coin_data, $altin_data, $borsa_artanlar_data, $borsa_azalanlar_data, $borsa_islem_gorenler_data, $bist100_data, $parite_data, $cripto_data;
global $bp_options;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, viewport-fit=cover">

    <?= $bp_options['analyticsCodes']; ?>
    <?= $bp_options['adsenseHeadCodes'] ?>
    <?php wp_head(); ?>

    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/media.css" media="all" />

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/vendors/owl-carousel/owl.carousel.min.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/highcharts.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/vendors/scrollbar/jquery.mCustomScrollbar.min.css" />
    <link rel="Shortcut Icon" href="<?= $bp_options['favicon'] ?>" type="image/x-icon">

    <?php get_template_part('inc/inline-style'); ?>

    <?php $page_title = $wp_query->post->post_title; ?>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i|Rubik:400,500&amp;subset=latin-ext" rel="stylesheet">
    <?php if ($page_title == "Üye Alarm Sayfası") : ?>
        <link rel="manifest" href="/manifest.json" />
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>


        <script>
            var OneSignal = window.OneSignal || [];
            OneSignal.push(function() {
                OneSignal.init({
                    appId: "<?= $bp_options['onesignalAppId'] ?>",
                });
            });
        </script>
    <?php endif; ?>

    <?php if ($bp_options['sayfaYenileSwitcher']) : global $wp; ?>
        <meta http-equiv="Refresh" content="<?= $bp_options['sayfaYenileDakika'] * 60; ?>" url="<?= home_url($wp->request); ?>" /><?php endif; ?>
</head>

<body <?php body_class(); ?>>


    <div class="mobile-menu">
        <div class="menu-close"><i class="close-btn"></i>Menüyü Kapat</div>
        <ul>
            <?php foreach ($bp_options['responsiveMenu'] as $key => $val) : ?>
                <li><a href="<?= $val['menu_link'] ?>"><img src="<?php bloginfo("template_directory") ?>/img/svg/mobilemenu/<?= $val['menu_icon'] ?>.svg" width="20px" height="20px" /><?= $val['menu_ismi'] ?></a></li>
            <?php endforeach; ?>
    </div>
    <!-- Site -->
    <!-- Site -->
    <div id="site">

        <div class="overlay"></div>

        <?php if (wp_is_mobile()) : ?>

            <div class="mobile-search">
                <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                    <input type="text" class="input" name="s" placeholder="Herhangi bir şey arayın..." />
                    <input type="submit" class="submit bg" value="ARA" />
                </form>
            </div>

        <?php endif; ?>
        <div class="blackShape"></div>
        <?php if ($bp_options['desktopCurrency'] != true) : ?>

                     <!-- currencyBar -->
            <div class="currencyBar">
                <div class="container">
                    <ul>

                        <li>
                            <?php
                            $bp_siralama = $bp_options['ustCoinSiralama'];

                            $type = explode("{}", $bp_siralama['ustSira1']);
                            if ($type[1] == "altin") {
                                $rate = $altin_data['altin_rate'][$type[0]];
                                $price = $altin_data['altin_price'][$type[0]];
                                $name = $altin_data['altin_name'][$type[0]];
                                $base = "";
                            } elseif ($type[1] == "doviz") {
                                $rate = $currency_data['change_rate'][$type[0]];
                                $price = $currency_data['buying'][$type[0]];
                                $name = $currency_data['full_name'][$type[0]];
                                $base = strtoupper($type[0]);
                            } elseif ($type[1] == "coin") {
                                $name .= "/TL";
                                $rate = $coin_data['price_24h'][$type[0]];
                                if ($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch") {
                                    $price = $coin_data['current_price'][$type[0]] . "," . rand(100, 750);
                                } else {
                                    $price = $coin_data['current_price'][$type[0]];
                                }
                                $name = $coin_data['name'][$type[0]];
                                $name .= "/TL";
                                $base = permalink($coin_data['name'][$type[0]]);
                            } elseif ($type[1] == "bist") {
                                $rate = $bist100_data['change_rate'];
                                $price = $bist100_data['value'];
                                $name = "BIST 100";
                                $base = "";
                            }
                            $rate = str_replace(".", ",", number_format(str_replace(",", ".", $rate), 2));
                            $name = mb_strtoupper(str_replace(
                                array(
                                    'ABD Doları', "Euro", "İngiliz Sterlini", "Çin Yuanı", "Rus Rublesi", "XRP"
                                ),
                                array(
                                    '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
                                ),
                                $name
                            ), "UTF-8");
                            if (str_replace(",", ".", $rate) > 0) {
                                $crease_status = "increase";
                            } else {
                                $crease_status = "decrease";
                            }
                            ?>
                            <div class="currencyName"><?= $name ?></div>
                            <div class="currencyValue base_<?= $base ?>"><?= $price ?></div>
                            <div class="currencyRate">% <?= $rate ?> <i class="<?= $crease_status ?>"></i></div>
                        </li>
                        <?php
                        $type = explode("{}", $bp_siralama['ustSira2']);
                        if ($type[1] == "altin") {
                            $rate = $altin_data['altin_rate'][$type[0]];
                            $price = $altin_data['altin_price'][$type[0]];
                            $name = $altin_data['altin_name'][$type[0]];
                            $base = "";
                        } elseif ($type[1] == "doviz") {
                            $rate = $currency_data['change_rate'][$type[0]];
                            $price = $currency_data['buying'][$type[0]];
                            $name = $currency_data['full_name'][$type[0]];
                            $base = strtoupper($type[0]);
                        } elseif ($type[1] == "coin") {
                            $name .= "/TL";
                            $rate = $coin_data['price_24h'][$type[0]];
                            if ($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch") {
                                $price = $coin_data['current_price'][$type[0]] . "," . rand(100, 750);
                            } else {
                                $price = $coin_data['current_price'][$type[0]];
                            }
                            $name = $coin_data['name'][$type[0]];
                            $name .= "/TL";
                            $base = permalink($coin_data['name'][$type[0]]);
                        } elseif ($type[1] == "bist") {
                            $rate = $bist100_data['change_rate'];
                            $price = $bist100_data['value'];
                            $name = "BIST 100";
                            $base = "";
                        }
                        $rate = str_replace(".", ",", number_format(str_replace(",", ".", $rate), 2));
                        $name = mb_strtoupper(str_replace(
                            array(
                                'ABD Doları', "Euro", "İngiliz Sterlini", "Çin Yuanı", "Rus Rublesi", "XRP"
                            ),
                            array(
                                '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
                            ),
                            $name
                        ), "UTF-8");
                        if (str_replace(",", ".", $rate) > 0) {
                            $crease_status = "increase";
                        } else {
                            $crease_status = "decrease";
                        }
                        ?>
                        <li>
                            <div class="currencyName"><?= $name ?></div>
                            <div class="currencyValue base_<?= $base ?>"><?= $price ?></div>
                            <div class="currencyRate">% <?= $rate ?> <i class="<?= $crease_status ?>"></i></div>
                        </li>
                        <?php
                        $type = explode("{}", $bp_siralama['ustSira3']);
                        if ($type[1] == "altin") {
                            $rate = $altin_data['altin_rate'][$type[0]];
                            $price = $altin_data['altin_price'][$type[0]];
                            $name = $altin_data['altin_name'][$type[0]];
                            $base = "";
                        } elseif ($type[1] == "doviz") {
                            $rate = $currency_data['change_rate'][$type[0]];
                            $price = $currency_data['buying'][$type[0]];
                            $name = $currency_data['full_name'][$type[0]];
                            $base = strtoupper($type[0]);
                        } elseif ($type[1] == "coin") {
                            $rate = $coin_data['price_24h'][$type[0]];
                            if ($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch") {
                                $price = $coin_data['current_price'][$type[0]] . "," . rand(100, 750);
                            } else {
                                $price = $coin_data['current_price'][$type[0]];
                            }
                            $name = $coin_data['name'][$type[0]];
                            $name .= "/TL";
                            $base = permalink($coin_data['name'][$type[0]]);
                        } elseif ($type[1] == "bist") {
                            $rate = $bist100_data['change_rate'];
                            $price = $bist100_data['value'];
                            $name = "BIST 100";
                            $base = "";
                        }
                        $rate = str_replace(".", ",", number_format(str_replace(",", ".", $rate), 2));
                        $name = mb_strtoupper(str_replace(
                            array(
                                'ABD Doları', "Euro", "İngiliz Sterlini", "Çin Yuanı", "Rus Rublesi", "XRP"
                            ),
                            array(
                                '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
                            ),
                            $name
                        ), "UTF-8");
                        if (str_replace(",", ".", $rate) > 0) {
                            $crease_status = "increase";
                        } else {
                            $crease_status = "decrease";
                        }
                        ?>
                        <li>
                            <div class="currencyName"><?= $name ?></div>
                            <div class="currencyValue base_<?= $base ?>"><?= $price ?></div>
                            <div class="currencyRate">% <?= $rate ?> <i class="<?= $crease_status ?>"></i></div>
                        </li>
                        <?php
                        $type = explode("{}", $bp_siralama['ustSira4']);
                        if ($type[1] == "altin") {
                            $rate = $altin_data['altin_rate'][$type[0]];
                            $price = $altin_data['altin_price'][$type[0]];
                            $name = $altin_data['altin_name'][$type[0]];
                            $base = "";
                        } elseif ($type[1] == "doviz") {
                            $rate = $currency_data['change_rate'][$type[0]];
                            $price = $currency_data['buying'][$type[0]];
                            $name = $currency_data['full_name'][$type[0]];
                            $base = strtoupper($type[0]);
                        } elseif ($type[1] == "coin") {
                            $name .= "/TL";
                            $rate = $coin_data['price_24h'][$type[0]];
                            if ($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch") {
                                $price = $coin_data['current_price'][$type[0]] . "," . rand(100, 750);
                            } else {
                                $price = $coin_data['current_price'][$type[0]];
                            }
                            $name = $coin_data['name'][$type[0]];
                            $name .= "/TL";
                            $base = permalink($coin_data['name'][$type[0]]);
                        } elseif ($type[1] == "bist") {
                            $rate = $bist100_data['change_rate'];
                            $price = $bist100_data['value'];
                            $name = "BIST 100";
                            $base = "";
                        }
                        $rate = str_replace(".", ",", number_format(str_replace(",", ".", $rate), 2));
                        $name = mb_strtoupper(str_replace(
                            array(
                                'ABD Doları', "Euro", "İngiliz Sterlini", "Çin Yuanı", "Rus Rublesi", "XRP"
                            ),
                            array(
                                '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
                            ),
                            $name
                        ), "UTF-8");
                        if (str_replace(",", ".", $rate) > 0) {
                            $crease_status = "increase";
                        } else {
                            $crease_status = "decrease";
                        }
                        ?>
                        <li>
                            <div class="currencyName"><?= $name ?></div>
                            <div class="currencyValue base_<?= $base ?>"><?= $price ?></div>
                            <div class="currencyRate">% <?= $rate ?> <i class="<?= $crease_status ?>"></i></div>
                        </li>
                        <?php
                        $type = explode("{}", $bp_siralama['ustSira5']);
                        if ($type[1] == "altin") {
                            $rate = $altin_data['altin_rate'][$type[0]];
                            $price = $altin_data['altin_price'][$type[0]];
                            $name = $altin_data['altin_name'][$type[0]];
                            $base = "";
                        } elseif ($type[1] == "doviz") {
                            $rate = $currency_data['change_rate'][$type[0]];
                            $price = $currency_data['buying'][$type[0]];
                            $name = $currency_data['full_name'][$type[0]];
                            $base = strtoupper($type[0]);
                        } elseif ($type[1] == "coin") {
                            $name .= "/TL";
                            $rate = $coin_data['price_24h'][$type[0]];
                            if ($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch") {
                                $price = $coin_data['current_price'][$type[0]] . "," . rand(100, 750);
                            } else {
                                $price = $coin_data['current_price'][$type[0]];
                            }
                            $name = $coin_data['name'][$type[0]];
                            $name .= "/TL";
                            $base = permalink($coin_data['name'][$type[0]]);
                        } elseif ($type[1] == "bist") {
                            $rate = $bist100_data['change_rate'];
                            $price = $bist100_data['value'];
                            $name = "BIST 100";
                            $base = "";
                        }
                        $rate = str_replace(".", ",", number_format(str_replace(",", ".", $rate), 2));
                        $name = mb_strtoupper(str_replace(
                            array(
                                'ABD Doları', "Euro", "İngiliz Sterlini", "Çin Yuanı", "Rus Rublesi", "XRP"
                            ),
                            array(
                                '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
                            ),
                            $name
                        ), "UTF-8");
                        if (str_replace(",", ".", $rate) > 0) {
                            $crease_status = "increase";
                        } else {
                            $crease_status = "decrease";
                        }
                        ?>
                        <li>
                            <div class="currencyName"><?= $name ?></div>
                            <div class="currencyValue base_<?= $base ?>"><?= $price ?></div>
                            <div class="currencyRate">% <?= $rate ?> <i class="<?= $crease_status ?>"></i></div>
                        </li>
                        <?php
                        $type = explode("{}", $bp_siralama['ustSira6']);
                        if ($type[1] == "altin") {
                            $rate = $altin_data['altin_rate'][$type[0]];
                            $price = $altin_data['altin_price'][$type[0]];
                            $name = $altin_data['altin_name'][$type[0]];
                            $base = "";
                        } elseif ($type[1] == "doviz") {
                            $rate = $currency_data['change_rate'][$type[0]];
                            $price = $currency_data['buying'][$type[0]];
                            $name = $currency_data['full_name'][$type[0]];
                            $base = strtoupper($type[0]);
                        } elseif ($type[1] == "coin") {
                            $name .= "/TL";
                            $rate = $coin_data['price_24h'][$type[0]];
                            if ($coin_data['name'][$type[0]] == "symbol" || $coin_data['symbol'][$type[0]] == "bch") {
                                $price = $coin_data['current_price'][$type[0]] . "," . rand(100, 750);
                            } else {
                                $price = $coin_data['current_price'][$type[0]];
                            }
                            $name = $coin_data['name'][$type[0]];
                            $name .= "/TL";
                            $base = permalink($coin_data['name'][$type[0]]);
                        } elseif ($type[1] == "bist") {
                            $rate = $bist100_data['change_rate'];
                            $price = $bist100_data['value'];
                            $name = "BIST 100";
                            $base = "";
                        }
                        $rate = str_replace(".", ",", number_format(str_replace(",", ".", $rate), 2));
                        $name = mb_strtoupper(str_replace(
                            array(
                                'ABD Doları', "Euro", "İngiliz Sterlini", "Çin Yuanı", "Rus Rublesi", "XRP"
                            ),
                            array(
                                '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
                            ),
                            $name
                        ), "UTF-8");
                        if (str_replace(",", ".", $rate) > 0) {
                            $crease_status = "increase";
                        } else {
                            $crease_status = "decrease";
                        }
                        ?>
                        <li>
                            <div class="currencyName"><?= $name ?></div>
                            <div class="currencyValue base_<?= $base ?>"><?= $price ?></div>
                            <div class="currencyRate">% <?= $rate ?> <i class="<?= $crease_status ?>"></i></div>
                        </li>
                        <?php
                        $type = explode("{}", $bp_siralama['ustSira7']);
                        if ($type[1] == "altin") {
                            $rate = $altin_data['altin_rate'][$type[0]];
                            $price = $altin_data['altin_price'][$type[0]];
                            $name = $altin_data['altin_name'][$type[0]];
                            $base = "";
                        } elseif ($type[1] == "doviz") {
                            $rate = $currency_data['change_rate'][$type[0]];
                            $price = $currency_data['buying'][$type[0]];
                            $name = $currency_data['full_name'][$type[0]];
                            $base = strtoupper($type[0]);
                        } elseif ($type[1] == "coin") {
                            $name .= "/TL";
                            $rate = $coin_data['price_24h'][$type[0]];
                            if ($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch") {
                                $price = $coin_data['current_price'][$type[0]] . "," . rand(100, 750);
                            } else {
                                $price = $coin_data['current_price'][$type[0]];
                            }
                            $name = $coin_data['name'][$type[0]];
                            $name .= "/TL";
                            $base = permalink($coin_data['name'][$type[0]]);
                        } elseif ($type[1] == "bist") {
                            $rate = $bist100_data['change_rate'];
                            $price = $bist100_data['value'];
                            $name = "BIST 100";
                            $base = "";
                        }
                        $rate = str_replace(".", ",", number_format(str_replace(",", ".", $rate), 2));
                        $name = mb_strtoupper(str_replace(
                            array(
                                'ABD Doları', "Euro", "İngiliz Sterlini", "Çin Yuanı", "Rus Rublesi", "XRP"
                            ),
                            array(
                                '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
                            ),
                            $name
                        ), "UTF-8");
                        if (str_replace(",", ".", $rate) > 0) {
                            $crease_status = "increase";
                        } else {
                            $crease_status = "decrease";
                        }
                        ?>
                        <li>
                            <div class="currencyName"><?= $name ?></div>
                            <div class="currencyValue base_<?= $base ?>"><?= $price ?></div>
                            <div class="currencyRate">% <?= $rate ?> <i class="<?= $crease_status ?>"></i></div>
                        </li>
                        <?php
                        $type = explode("{}", $bp_siralama['ustSira8']);
                        if ($type[1] == "altin") {
                            $rate = $altin_data['altin_rate'][$type[0]];
                            $price = $altin_data['altin_price'][$type[0]];
                            $name = $altin_data['altin_name'][$type[0]];
                            $base = "";
                        } elseif ($type[1] == "doviz") {
                            $rate = $currency_data['change_rate'][$type[0]];
                            $price = $currency_data['buying'][$type[0]];
                            $name = $currency_data['full_name'][$type[0]];
                            $base = strtoupper($type[0]);
                        } elseif ($type[1] == "coin") {
                            $name .= "/TL";
                            $rate = $coin_data['price_24h'][$type[0]];
                            if ($coin_data['symbol'][$type[0]] == "btc" || $coin_data['symbol'][$type[0]] == "bch") {
                                $price = $coin_data['current_price'][$type[0]] . "," . rand(100, 750);
                            } else {
                                $price = $coin_data['current_price'][$type[0]];
                            }
                            $name = $coin_data['name'][$type[0]];
                            $name .= "/TL";
                            $base = permalink($coin_data['name'][$type[0]]);
                        } elseif ($type[1] == "bist") {
                            $rate = $bist100_data['change_rate'];
                            $price = $bist100_data['value'];
                            $name = "BIST 100";
                            $base = "";
                        }
                        $rate = str_replace(".", ",", number_format(str_replace(",", ".", $rate), 2));
                        $name = mb_strtoupper(str_replace(
                            array(
                                'ABD Doları', "Euro", "İngiliz Sterlini", "Çin Yuanı", "Rus Rublesi", "XRP"
                            ),
                            array(
                                '$ DOLAR', '€ EURO', '£ POUND', '¥ YUAN', 'руб RUBLE', 'Ripple'
                            ),
                            $name
                        ), "UTF-8");
                        if (str_replace(",", ".", $rate) > 0) {
                            $crease_status = "increase";
                        } else {
                            $crease_status = "decrease";
                        }
                        ?>
                        <li>
                            <div class="currencyName"><?= $name ?></div>
                            <div class="currencyValue base_<?= $base ?>"><?= $price ?></div>
                            <div class="currencyRate">% <?= $rate ?> <i class="<?= $crease_status ?>"></i></div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- //currencyBar -->
        <?php endif; ?>
        <!-- Header -->
        <header>
            <?php
            if ($bp_options['mobileCurrency'] == 1 && wp_is_mobile()) {
                get_template_part("inc/currencyBar");
            }
            ?>
            <!-- MainBar -->
            <div class="mainBar bg">
                <div class="container">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="<?php bloginfo('home'); ?>">
                            <?php if (wp_is_mobile()) :
                                if (empty($bp_options['mobile_logo'])) {
                                    if (!empty($bp_options['desktop_logo'])) {
                                        ?><img src="<?= $bp_options['desktop_logo'] ?>" alt="<?php bloginfo('name'); ?>" /><?php
                                    } else {
                                        ?><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" /><?php
                                    }
                                } else {
                                    ?><img src="<?= $bp_options['mobile_logo'] ?>" alt="<?php bloginfo('name'); ?>" /><?php
                                } else :
                                                                                                                                        if (!empty($bp_options['desktop_logo'])) {
                                                                                                                                            ?>
                                    <img src="<?= $bp_options['desktop_logo'] ?>" alt="<?php bloginfo('name'); ?>" />
                                <?php
                                                                                                                                        } else {
                                                                                                                                            ?><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" /><?php
                                                                                                                                        }
                                                                                                                                                                                                                                            endif; ?>
                        </a>
                    </div>

                    <!-- Nav -->
                    <div class="nav">
                        <?php if (has_nav_menu('bfUstMenu')) {
                                                                                                                                                                                                                                                wp_nav_menu(array('theme_location' => 'bfUstMenu'));
                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                ?>
                            <li><a href="<?php bloginfo('home'); ?>/wp-admin/nav-menus.php" target="_BLANK">Üst Menüyü
                                    Oluşturun!</a></li><?php
                                                                                                                                                                                                                                            } ?>

                    </div>

                    <!-- Right -->
                    <div class="right">
                        <?php
                        if ($bp_options['uyeSwitcher'] != true) :
                            if (wp_is_mobile()) { ?>
                                <?php global $user_ID, $user_identity;
                                get_currentuserinfo();
                                if (is_user_logged_in()) : ?>
                                    <?php $current_user1 = wp_get_current_user(); ?>
                                    <div class="loggin_area" style=" float: left;line-height: 67px;margin-left: 10px;margin-top: 6px;">
                                        <div class="loggedIn">
                                            <span><?php echo mb_substr($current_user1->display_name, 0, 7, "UTF-8"); ?><i></i></span>
                                            <?php if (!wp_is_mobile()) { ?>
                                                <i class="avatarW">
                                                    <?php

                                                    if (!empty(get_user_meta($user_ID, "profil_pic", true))) {
                                                        ?><img src="<?php bloginfo("template_directory") ?>/profile/<?= get_user_meta($user_ID, "profil_pic", true) ?>" class="avatar avatar-36 photo" width="36" height="36"><?php
                                                    } else {
                                                        ?>
                                                        <img src="http://2.gravatar.com/avatar/5cc8b43a5a60328aa1a15ab8708a9404?s=36&amp;d=mm&amp;r=g" class="avatar avatar-36 photo" width="36" height="36"><?php
                                                    }

                                                                                                                                                                                                                ?>
                                                </i>
                                            <?php } ?>
                                            <ul>

                                                <?php if (wp_is_mobile()) {
                                                                                                                                                                                                                    ?>
                                                    <li>
                                                        <a href="<?php echo esc_url(get_author_posts_url($current_user1->ID)); ?>" style="padding-bottom:0px;padding-top:0px;">Profil Sayfam</a>
                                                    </li>
                                                    <li><a href="<?php bloginfo('home'); ?>/wp-admin/uye-profili" style="padding-bottom:0px;padding-top:0px;">Ayarlarım</a></li>
                                                    <li><a href="<?php echo wp_logout_url(home_url()); ?>" style="padding-bottom:0px;padding-top:0px;">Çıkış Yap</a></li>
                                                <?php
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    ?>
                                                    <li class="myFavoriteList"><a href="<?php echo esc_url(get_author_posts_url($current_user1->ID)); ?>"><i></i>Profil
                                                            Sayfam</a></li>
                                                    <li class="settings"><a href="<?php bloginfo('home'); ?>/wp-admin/uye-profili"><i></i>Ayarlarım</a>
                                                    </li>
                                                    <li class="logout"><a href="<?php echo wp_logout_url(home_url()); ?>"><i></i>Çıkış
                                                            Yap</a></li>
                                                <?php
                                                                                                                                                                                                                } ?>
                                            </ul>
                                        </div>
                                    </div>

                                <?php else : ?>
                                    <a class="user-link" href="<?php bloginfo("home") ?>/giris-kayit-sayfasi/"><i class="user"></i></a>
                                <?php endif; ?>
                        <?php }
                        endif;
                        ?>
                        <i class="search"></i>


                        <?php

                        if ($bp_options['uyeSwitcher'] != true) :
                            if (!wp_is_mobile()) { ?>
                                <?php global $user_ID, $user_identity;
                                get_currentuserinfo();
                                if (is_user_logged_in()) : ?>
                                    <?php $current_user1 = wp_get_current_user(); ?>
                                    <!-- Right -->
                                    <div class="loggin_area" style="<?php if (!wp_is_mobile()) : ?>float:right;<?php else : ?> float: left;line-height: 67px;<?php endif; ?>margin-left: 10px;margin-top: 6px;">
                                        <div class="loggedIn">
                                            <span><?php echo mb_substr($current_user1->display_name, 0, 7, "UTF-8"); ?><i></i></span>
                                            <?php if (!wp_is_mobile()) { ?>
                                                <i class="avatarW">
                                                    <?php

                                                    if (!empty(get_user_meta($user_ID, "profil_pic", true))) {
                                                        ?><img src="<?php bloginfo("template_directory") ?>/profile/<?= get_user_meta($user_ID, "profil_pic", true) ?>" class="avatar avatar-36 photo" width="36" height="36"><?php
                                                    } else {
                                                        ?><img src="<?php bloginfo("template_directory") ?>/img/icons/user.png" class="avatar avatar-36 photo" width="36" height="36"><?php
                                                    }

                                                                                                                                                                                        ?>
                                                </i>
                                            <?php } ?>
                                            <ul>
                                                <?php if (wp_is_mobile()) {
                                                                                                                                                                                            ?>
                                                    <li>
                                                        <a href="<?php echo esc_url(get_author_posts_url($current_user1->ID)); ?>"><i></i>Profil
                                                            Sayfam</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php bloginfo('home'); ?>/wp-admin/<?= $bp_options['page_uyeprofili'] ?>"><i></i>Ayarlarım</a>
                                                    </li>
                                                    <li><a href="<?php echo wp_logout_url(home_url()); ?>"><i></i>Çıkış Yap</a>
                                                    </li>
                                                <?php
                                                                                                                                                                                        } else {
                                                                                                                                                                                            ?>
                                                    <li class="myFavoriteList"><a href="<?php echo esc_url(get_author_posts_url($current_user1->ID)); ?>"><i></i>Profil
                                                            Sayfam</a></li>
                                                    <li class="settings"><a href="<?php bloginfo('home'); ?>/wp-admin/<?= $bp_options['page_uyeprofili'] ?>"><i></i>Ayarlarım</a>
                                                    </li>
                                                    <li class="logout"><a href="<?php echo wp_logout_url(home_url()); ?>"><i></i>Çıkış Yap</a>
                                                    </li>
                                                <?php
                                                                                                                                                                                        } ?>

                                            </ul>
                                        </div>
                                    </div>


                                <?php else : ?>
                                    <?php if ($bp_options['uye_header_style'] == '2') { ?>
                                        <div style="line-height: 33px;display:flex;gap:10px;height:32px;margin-top:21px;font-weight: 500;font-size: 15px;">
                                            <a style="display:block;padding: 0 12px;background:#3b72de;color:#fff;" class="user-link" href="<?php bloginfo("home") ?>/<?= $bp_options['page_giriskayit'] ?>/">
                                                ÜYE OL
                                            </a>
                                            <a style="display:block;padding: 0 12px; background:#3b72de;color:#fff;" class="user-link" href="<?php bloginfo("home") ?>/<?= $bp_options['page_giriskayit'] ?>/">
                                                GİRİŞ YAP
                                            </a>
                                        </div>
                                    <?php } else { ?>
                                        <a class="user-link" href="<?php bloginfo("home") ?>/<?= $bp_options['page_giriskayit'] ?>/"><i class="user"></i></a>
                                    <?php } ?>

                                <?php endif; ?>
                        <?php }
                        endif;
                        ?>
                        <button type="button" class="toggle-menu">
                            <i class="mobileMenu"></i>
                        </button>


                    </div>

                    <div class="search-form">
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <span>Aranacak kelimeyi yazın ve <small>enter</small> tuşuna basın...</span>
                            <input type="text" placeholder="" name="s" value="">
                            <input type="submit" style="display:none;" />
                        </form>
                    </div>


                </div>
            </div>


        </header>
        <!-- #Header -->

<!-- Sol ray (160x600) -->
<div class="ad-rail ad-rail--left ad-rail--w160">
  <div class="ad-rail__slot">
    <div id="div-gpt-left-rail">
        <div id="div-gpt-160x600-left" title="/273585429/PiyasaVizyon.com/piyasavizyon_160x600_wideskyscraper_left"></div>
</div>
  </div>
</div>
<!-- Sağ ray (120x600) -->
<div class="ad-rail ad-rail--right ad-rail--w120">
  <div class="ad-rail__slot">
    <div id="div-gpt-right-rail">
        <div class="adbox" id="div-gpt-160x600-right" title="/273585429/PiyasaVizyon.com/piyasavizyon_160x600_wideskyscraper_right"></div>
</div>
  </div>
</div>
