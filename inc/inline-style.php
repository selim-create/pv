<?php global $bp_options; ?>
<style>
    .currencyBar {
        background: <?= $bp_options['header_bg_bolum_1_sol'] ?> !important;
        /* Old browsers */
        background: -moz-linear-gradient(left, <?= $bp_options['header_bg_bolum_1_sol'] ?> 0%, <?= $bp_options['header_bg_bolum_1_sag'] ?> 100%) !important;
        /* FF3.6-15 */
        background: -webkit-linear-gradient(left, <?= $bp_options['header_bg_bolum_1_sol'] ?> 0%, <?= $bp_options['header_bg_bolum_1_sag'] ?> 100%) !important;
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, <?= $bp_options['header_bg_bolum_1_sol'] ?> 0%, <?= $bp_options['header_bg_bolum_1_sag'] ?> 100%) !important;
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?= $bp_options['header_bg_bolum_1_sol'] ?>', endColorstr='<?= $bp_options['header_bg_bolum_1_sag'] ?>', GradientType=1) !important;
        /* IE6-9 */

        border-bottom: 1px solid<?= $bp_options['header_hr'] ?>;
    }

    .blackShape {
        background-color: <?= $bp_options['header_bg_bolum_2_sol'] ?>;
        background: <?= $bp_options['header_bg_bolum_2_sol'] ?>;
        /* Old browsers */
        background: -moz-linear-gradient(left, <?= $bp_options['header_bg_bolum_2_sol'] ?> 0%, <?= $bp_options['header_bg_bolum_2_sag'] ?> 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(left, <?= $bp_options['header_bg_bolum_2_sol'] ?> 0%, <?= $bp_options['header_bg_bolum_2_sag'] ?> 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, <?= $bp_options['header_bg_bolum_2_sol'] ?> 0%, <?= $bp_options['header_bg_bolum_2_sag'] ?> 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?= $bp_options['header_bg_bolum_2_sol'] ?>', endColorstr='<?= $bp_options['header_bg_bolum_2_sag'] ?>', GradientType=1);
        /* IE6-9 */
    }

    header {
        background-color: <?= $bp_options['header_bg_bolum_2_sol'] ?>;
        background: <?= $bp_options['header_bg_bolum_2_sol'] ?>;
        /* Old browsers */
        background: -moz-linear-gradient(left, <?= $bp_options['header_bg_bolum_2_sol'] ?> 0%, <?= $bp_options['header_bg_bolum_2_sag'] ?> 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(left, <?= $bp_options['header_bg_bolum_2_sol'] ?> 0%, <?= $bp_options['header_bg_bolum_2_sag'] ?> 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, <?= $bp_options['header_bg_bolum_2_sol'] ?> 0%, <?= $bp_options['header_bg_bolum_2_sag'] ?> 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?= $bp_options['header_bg_bolum_2_sol'] ?>', endColorstr='<?= $bp_options['header_bg_bolum_2_sag'] ?>', GradientType=1);
        /* IE6-9 */
    }

    section.content .sidebar .widget .popularNews .item .title .info .cat a:hover {
        color: <?= $bp_options['tum_bilesenler_renk'] ?>;
        transform: 300ms;
    }

    section.content .sidebar .widget .mostComment .item .info .cat a:hover {
        color: <?= $bp_options['tum_bilesenler_renk'] ?>;
        transform: 300ms;
    }

    header .mainBar .nav ul li a {
        color: <?= $bp_options['header_menu'] ?>;
    }

    header .mainBar .nav ul li:hover a {
        color: <?= $bp_options['header_menu_hover'] ?>;
    }

    header .mainBar .nav ul li.menu-item-has-children:hover:after {
        color: <?= $bp_options['header_menu_hover'] ?>;
    }

    header .mainBar .nav ul>li>ul>li:hover:before {
        background: <?= $bp_options['header_menu_hover'] ?>;
    }

    header .mainBar .nav ul>li>ul {
        background: <?= $bp_options['header_bg_bolum_2_sol'] ?>;
    }

    .canli-borsa {
        background: <?= $bp_options['canli_borsa_bg'] ?>;
    }

    .canli-borsa:hover {
        background: <?= $bp_options['canli_borsa_buton_hover'] ?>;
    }

    .creditCalculatorHead ul li.active {
        background: <?= $bp_options['kredi_tab_hover'] ?>;
        border-right: 0px;
    }

    .creditCalculatorBox .form-group-half .form-control:focus,
    .creditCalculatorBox .calculatorSelect:focus {
        background: <?= $bp_options['kredi_tab_hover'] ?>26;
        border-color: <?= $bp_options['kredi_tab_hover'] ?>;
    }

    .creditCalculatorHead {
        border-bottom: 2px solid<?= $bp_options['kredi_tab_hover'] ?>;
    }

    .creditCalculatorHead ul li.active:before {
        background: <?= $bp_options['kredi_tab_hover'] ?>;
    }

    .creditCalculatorHead ul li.active:after {
        background: <?= $bp_options['kredi_tab_hover'] ?>;
    }

    .creditCalculator .calculatorBtn {
        background: <?= $bp_options['en_ucuz_kredi_buton'] ?>;
    }

    .creditCalculatorBox .calculatorBtn:hover {
        background: <?= $bp_options['en_ucuz_kredi_buton_hover'] ?>;
    }

    .vertSlider .vertSlides .owl-dots .owl-dot.active {
        background: <?= $bp_options['slider_buton_rengi'] ?>;
        border-top: 1px solid<?= $bp_options['slider_buton_rengi'] ?>;
        border-right: 1px solid<?= $bp_options['slider_buton_rengi'] ?>;
        border-left: 1px solid<?= $bp_options['slider_buton_rengi'] ?>;
    }

    .vertSlider .vertSlides .owl-dots:after {
        background: <?= $bp_options['slider_divider'] ?>;
    }

    .currencyShowcase.half .currencyTable.kriptolar tr.head select {
        background: url(<?= bloginfo("template_directory") ?>/img/icons/selectBigArrow.png) no-repeat calc(100% - 10px) 8px <?= $bp_options['kriptoparalar_selection_bg'] ?>;
    }

    .currencyShowcase.half .currencyTable.kriptolar tr.head select {
        border-color: <?= $bp_options['kriptoparalar_selection_bg'] ?>;
    }

    section.content .widebar .widget .lastNewsHead:before {
        background: <?= $bp_options['tum_bilesenler_renk'] ?>
    }

    section.content .widebar .widget .categoryTab .tabHead ul li.active span:after {
        background: <?= $bp_options['tum_bilesenler_renk'] ?>
    }

    section.content .sidebar .widget .sidebarHead:before {
        background: <?= $bp_options['tum_bilesenler_renk'] ?>
    }

    .content_widget .sidebarHead:before {
        background: <?= $bp_options['tum_bilesenler_renk'] ?>
    }

    .dovizCeviriciSid .head:before {
        background: <?= $bp_options['tum_bilesenler_renk'] ?>
    }

    .dovizCeviriciSid .formCheck .radioLabel input:checked~.radioMark {
        background-color: <?= $bp_options['tum_bilesenler_renk'] ?>;
        border-color: <?= $bp_options['tum_bilesenler_renk'] ?>;
    }

    section.content .widebar .widget .lastNews .item .content-summary .categories a {
        background: <?= $bp_options['tum_icerik_kategori_renk'] ?>;
    }

    section.content .widebar .widget .lastNews .item .content-summary .categories a:before {
        background: <?= $bp_options['tum_icerik_kategori_renk'] ?>
    }

    section.content .widebar .widget .lastNews .item .content-summary .categories a:hover {
        background: <?= $bp_options['tum_icerik_kategori_hover'] ?>;
    }

    footer.footer .contentFooter .footerTitle {
        color: <?= $bp_options['footer_basliklari_renk'] ?>;
    }

    footer.footer .contentFooter .footerMenu ul li a {
        color: <?= $bp_options['footer_kategorileri_renk'] ?>;
    }

    footer.footer .contentFooter .footerMenu ul li a:hover {
        color: <?= $bp_options['footer_kategorileri_hover_renk'] ?>;
    }

    footer.footer .footerTop {
        background: <?= $bp_options['footer_bg_1'] ?>;
    }

    footer.footer {
        background: <?= $bp_options['footer_bg_2'] ?>;
    }

    footer.footer .footerBottom {
        background: <?= $bp_options['footer_bg_3'] ?>;
    }

    footer.footer .footerBottom .footerSocial li a i {
        background-color: <?= $bp_options['sosyal_medya_buton'] ?>;
    }

    footer.footer .footerBottom .footerSocial li a:hover i {
        background-color: <?= $bp_options['sosyal_medya_buton_hover'] ?>;
        transition: 300ms;
    }

    section.content .widebar .widget .lastNews .item .content-summary .title a:hover {
        color: <?= $bp_options['diger_bilesenler_renk'] ?>;
    }

    section.content .widebar .widget .categoryTab .catTabContent .item .title a:hover {
        color: <?= $bp_options['diger_bilesenler_renk'] ?>;
    }

    section.content .sidebar .widget .popularNews .item .title>a:hover {
        color: <?= $bp_options['diger_bilesenler_renk'] ?>;
    }

    section.content .sidebar .widget .mostComment .item .title>a:hover {
        color: <?= $bp_options['diger_bilesenler_renk'] ?>;
    }

    .breadcrumb ul li.post {
        background-color: <?= $bp_options['header_bg_bolum_2_sol'] ?>
    }

    .breadcrumb ul li a:hover {
        color: <?= $bp_options['diger_bilesenler_renk'] ?>;
        transition: 300ms;
    }

    .singleWrapper .singleContent .mainContent .main ul.buttons li.favorite {
        background-color: <?= $bp_options['single_favori_buton'] ?>
    }

    .singleWrapper .singleContent .mainContent .main ul.buttons li.favorite:hover {
        background: <?= $bp_options['single_favori_buton_hover'] ?>;
    }

    .postInner .relatedPost .text .eT {
        background: <?= $bp_options['single_ilgili_icerik'] ?>
    }

    .postInner ol li:before {
        background: <?= $bp_options['single_listeleme'] ?>
    }

    .tags a:hover {
        background-color: <?= $bp_options['single_etiket_hover'] ?>
    }

    .singleHead.v2 {
        border-bottom: 1px solid<?= $bp_options['yorum_rengi'] ?>;
    }

    .singleHead.v2:before {
        background: <?= $bp_options['yorum_rengi'] ?>;
    }

    .singleHead.v2:after {
        background: <?= $bp_options['yorum_rengi'] ?>;
    }

    .singleHead.v2 span {
        border-bottom: 3px solid<?= $bp_options['yorum_rengi'] ?>;
    }

    .commentWhite .commentForm ul li.one .submit {
        background-color: <?= $bp_options['yorum_rengi'] ?>;
    }

    .commentListing .comment .right ul li .left span.commentAuthor {
        color: <?= $bp_options['yorum_rengi'] ?>
    }

    .commentWhite .commentForm ul li.one .submit:hover {
        background: <?= $bp_options['yorum_buton_hover_rengi'] ?>;
    }

    .main-slider .owl-dots .owl-dot.active {
        background: <?= $bp_options['tum_bilesenler_renk'] ?>;
    }

    section.content .widebar .widget .borsaTimerTabHead ul li.active span:after {
        background: <?= $bp_options['diger_bilesenler_renk'] ?>
    }

    .popularCalculationTitle {
        border-bottom: 4px solid<?= $bp_options['diger_bilesenler_renk'] ?>;
    }

    .bankaCalculators .bankCalc .bankFoot a.cont {
        background: <?= $bp_options['en_ucuz_kredi_buton'] ?>;
    }

    section.content .widebar .widget .news-slider .news-slider-content .title .bg-pad {
        background: <?= $bp_options['en_ucuz_kredi_buton'] ?>;
    }

    section.content .widebar .widget .news-slider .news-slider-content .title .bg-pad a {
        background: <?= $bp_options['en_ucuz_kredi_buton'] ?>;
    }

    section.content .widebar .widget .news-slider .owl-thumb-item.active img {
        border: 4px solid<?= $bp_options['kredi_slider_rengi'] ?>;
    }

    section.content .widebar .widget .news-slider .owl-nav .owl-next:hover {
        background: <?= $bp_options['kredi_slider_rengi'] ?>;
    }

    section.content .widebar .widget .news-slider .news-slider-content .cat {
        background: <?= $bp_options['kredi_slider_rengi'] ?>;
    }

    section.content .widebar .widget .news-slider .owl-nav .owl-prev:hover {
        background: <?= $bp_options['kredi_slider_rengi'] ?>;
    }

    .homeIconMenu ul li:hover {
        background: <?= $bp_options['kredi_slider_rengi'] ?>;
    }

    .main-slider .owl-nav .owl-next:hover {
        background: <?= $bp_options['doviz_slider_rengi'] ?> !important;
    }

    .main-slider .owl-nav .owl-prev:hover {
        background: <?= $bp_options['doviz_slider_rengi'] ?> !important;
    }

    .daily-news ul li .content .title a:hover {
        color: <?= $bp_options['diger_bilesenler_renk'] ?>;
    }

    .headline-news-big .content .title .bg-pad {
        background: <?= $bp_options['kripto_slider_arkaplan_rengi'] ?>
    }

    .headline-news-smalls .content .title .bg-pad {
        background: <?= $bp_options['kripto_slider_arkaplan_rengi'] ?>
    }

    .headline-news-big .content .cat {
        background: <?= $bp_options['kripto_slider_kategori_rengi'] ?>;
    }

    .headline-news-smalls .content .cat {
        background: <?= $bp_options['kripto_slider_kategori_rengi'] ?>;
    }

    .singleWrapper .singleContent .mainContent .main .author span a:hover {
        color: <?= $bp_options['diger_bilesenler_renk'] ?>;
    }

    .loadMoreButton span {
        background: <?= $bp_options['tum_icerik_kategori_renk'] ?>;
    }

    .loadMoreButton_1 span {
        background: <?= $bp_options['tum_icerik_kategori_renk'] ?>;
    }

    header .mainBar .nav ul>li>ul>li>a:hover {
        color: <?= $bp_options['header_menu'] ?>;
    }

    .currency-hide header {
        top: 0;
    }

    .currency-hide .site-wrapper {
        top: 76px !important;
    }

    .sc-options-user {
        background: <?= $bp_options['canli_borsa_bg'] ?>80;
    }

    <?php if ($bp_options['headerSticky'] == 0) : ?>header {
        position: absolute !important;
    }

    .currencyBar {
        position: absolute !important;
    }

    <?php endif; ?><?php if ($bp_options['headerType'] == "header2") : ?>.currencyBar {
        background: url(<?php bloginfo("template_directory") ?>/img/currencybarbg.png) no-repeat !important;
    }

    .currencyBar:after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: <?= $bp_options['header_bg_bolum_1_sol'] ?>;
        left: 0;
        top: 0;
        z-index: -1;
        opacity: .75
    }

    <?php endif; ?><?php if (is_user_logged_in()) {
    ?>.site-wrapper {
        top: 189px !important;
    }

    <?php
} ?><?php if (wp_is_mobile()) { ?>.site-wrapper {
        top: 68px !important;
    }

    <?php } ?>.search-form input {
        background: <?= $bp_options['header_bg_bolum_2_sol'] ?>
    }
</style>
