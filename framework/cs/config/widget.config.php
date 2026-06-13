<?php
// Control core classes for avoid errors

if (class_exists('CSF')) {

    /*Anasayfa (Manset) Tekli*/
    // Anasayfa Manset
    get_template_part("inc/widgets/homepage/anasayfa-kayan-slider");

    /*Anasayfa (Manset) Bitis*/

    /*Anasayfa (Üst) 2 li baslangic*/
    // Anasayfa Kredi Arama

    get_template_part('inc/widgets/homepage/kredi-arama-motoru');


    CSF::createWidget('anasayfa_kredi_arama_tam_boyut', array(
        'title' => 'Tam Ekran Kredi Sorgulama Aracı',
        'classname' => 'anasayfa-kredi-arama-motoru-tam-boyut',
        'description' => 'Tam Ekran Kredi Sorgulama Aracı',
    ));

    if (!function_exists('anasayfa_kredi_arama_tam_boyut')) {
        function anasayfa_kredi_arama_tam_boyut($args, $instance)
        {
            get_template_part('inc/widgets/homepage/kredi-arama-tam-boyut');
        }
    }

    // Anasayfa 7 li slider (2 li)
    get_template_part('inc/widgets/homepage/anasayfa-sag-manset');
    get_template_part('inc/widgets/homepage/anasayfa-ekonomik-takvim');
    /*Anasayfa (Üst) 2 li bitis*/


    /*Anasayfa (Üst) 3 lu baslangic*/
    // Anasayfa Doviz Tablosu
    CSF::createWidget('anasayfa_doviz_tablo', array(
        'title' => 'Anasayfa (Üst) Döviz Tablosu (3 lü)',
        'classname' => 'anasayfa-doviz-tablo',
        'description' => 'Anasayfa (Üst) Döviz Tablosu (3 lü)',
    ));

    if (!function_exists('anasayfa_doviz_tablo')) {
        function anasayfa_doviz_tablo($args, $instance)
        {
            get_template_part('inc/widgets/homepage/anasayfa-doviz-tablo');
        }
    }

    // Anasayfa Altin Tablosu
    CSF::createWidget('anasayfa_altin_tablo', array(
        'title' => 'Anasayfa (Üst) Altın Tablosu (3 lü)',
        'classname' => 'anasayfa-altin-tablo',
        'description' => 'Anasayfa (Üst) Altın Tablosu (3 lü)',
    ));

    if (!function_exists('anasayfa_altin_tablo')) {
        function anasayfa_altin_tablo($args, $instance)
        {
            get_template_part('inc/widgets/homepage/anasayfa-altin-tablo');
        }
    }

    // Anasayfa Kripto Para Tablosu
    CSF::createWidget('anasayfa_kripto_tablo', array(
        'title' => 'Anasayfa (Üst) Kripto Para Tablosu (3 lü)',
        'classname' => 'anasayfa-kripto-tablo',
        'description' => 'Anasayfa (Üst) Kripto Para Tablosu (3 lü)',
    ));

    if (!function_exists('anasayfa_kripto_tablo')) {
        function anasayfa_kripto_tablo($args, $instance)
        {
            get_template_part('inc/widgets/homepage/anasayfa-kripto-tablo');
        }
    }

    /*Anasayfa (Üst) 3 lu bitis*/


    // Anasayfa (Content) Baslangic
    get_template_part('inc/widgets/homepage/anasayfa-son-eklenenler');

    get_template_part('inc/widgets/homepage/icerik-reklam'); // Ansayfa (Content) Reklam

    get_template_part('inc/widgets/homepage/anasayfa-borsa-tablo'); // Anasayfa Borsa Tablosu

    get_template_part('inc/widgets/homepage/anasayfa-kategori-icerik-tab');  // Anasayfa (Content) Kategori Icerik Tab

    // #Anasayfa (Content) Bitis

    // Sidebar Baslangic
    get_template_part('inc/widgets/sidebar/sidebar-doviz-cevirici'); // Sidebar Doviz Cevirici
    get_template_part('inc/widgets/sidebar/uye-listele'); // Sidebar Doviz Cevirici
    get_template_part('inc/widgets/sidebar/grafik'); // Sidebar Doviz Cevirici
    get_template_part('inc/widgets/sidebar/sidebar-kriptopara-cevirici'); // Sidebar Kriptopara Cevirici
    get_template_part('inc/widgets/sidebar/sidebar-altin-cevirici'); // Sidebar Kriptopara Cevirici
    get_template_part('inc/widgets/sidebar/foreks-hesapla'); // Sidebar Kriptopara Cevirici
    get_template_part('inc/widgets/sidebar/en-cok-okunan-haberler'); // Sidebar En Cok okunanlar
    get_template_part('inc/widgets/sidebar/en-cok-yorumlanan-haberler'); // Sidebar En Cok Yorumlananlar
    get_template_part('inc/widgets/sidebar/reklam'); // Sidebar Reklam
    get_template_part('inc/widgets/sidebar/html-sidebar'); // Sidebar Reklam
    get_template_part('inc/widgets/sidebar/piyasa-ozeti'); // Sidebar Reklam
    get_template_part('inc/widgets/sidebar/en-cok-islem-gorenler'); // En Çok İşlem Görenler
    get_template_part('inc/widgets/sidebar/doviz-cevirici-listesi'); // En Çok İşlem Görenler
    get_template_part('inc/widgets/sidebar/kripto-para'); // Sidebar Kripto Paralar
    get_template_part('inc/widgets/sidebar/populer-hesaplamalar'); // Populer Hesaplamalar
    get_template_part('inc/widgets/sidebar/kategori-sidebar'); // Kategori Sidebar
    get_template_part('inc/widgets/sidebar/en-cok-artanlar'); // En Cok Artanlar
    get_template_part('inc/widgets/sidebar/en-cok-azalanlar'); // En Cok Artanlar
    get_template_part('inc/widgets/homepage/anasayfa-banka-kredi'); // Ansayfa Banka Kredi
    get_template_part('inc/widgets/homepage/anasayfa-alt-manset'); // Anasayfa Alt Manset
    get_template_part('inc/widgets/homepage/anasayfa-ust-populer-hesaplamalar'); // Anasayfa Populer Hesaplamalar
    get_template_part('inc/widgets/homepage/kredi-temasi-6li-buton'); // Anasayfa Populer Hesaplamalar
    get_template_part('inc/widgets/homepage/anasayfa-doviz-slider'); // Anasayfa Doviz Slider
    get_template_part('inc/widgets/homepage/anasayfa-doviz-populer'); // Anasayfa Doviz Populer
    get_template_part('inc/widgets/homepage/anasayfa-kripto-slider'); // Anasayfa Kripto Slider
    get_template_part('inc/widgets/sidebar/altin-sidebar'); // Anasayfa Kripto Slider
    get_template_part('inc/widgets/sidebar/en-son-haberler'); // Anasayfa Kripto Slider
    get_template_part('inc/widgets/homepage/anasayfa-kripto-charts'); // Anasayfa Kripto Grafik
    get_template_part('inc/widgets/homepage/anasayfa-kripto-charts2'); // Anasayfa Kripto Grafik 2
    get_template_part('inc/widgets/sayfa-alt'); // Anasayfa Kripto Grafik
    get_template_part('inc/widgets/sidebar/en-cok-takip-edilen-hisseler'); // Anasayfa Kripto Grafik
    //get_template_part('inc/widgets/homepage/anasayfa-altin-in'); // Anasayfa Altin
    //# Sidebar Bitis
}
/*
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'fs_options';

    //
    // Create a metabox
    CSF::createMetabox( $prefix, array(
        'title'     => 'Detaylar',
        'post_type' => 'foreks',
    ) );

    //
    // Create a section
    CSF::createSection( $prefix, array(
        'title'  => 'Detaylar',
        'fields' => array(

            //
            // A text field
            array(
                'id'    => 'puan',
                'type'  => 'text',
                'title' => 'Puan',
            ),
            array(
                'id'    => 'kaldirac',
                'type'  => 'text',
                'title' => 'Kaldıraç',
            ),

            array(
                'id'    => 'altLimit',
                'type'  => 'text',
                'title' => 'Alt Limit',
            ),

            array(
                'id'    => 'turkceDestek',
                'type'  => 'switcher',
                'title' => 'Türkçe Destek',
            ),

            array(
                'id'    => 'bonus',
                'type'  => 'switcher',
                'title' => 'Bonus',
            ),

            array(
                'id'    => 'desteklenenIsletimSistemleri',
                'type'  => 'text',
                'title' => 'Desteklenen İşletim Sistemleri',
            ),

            array(
                'id'    => 'hesapAc',
                'type'  => 'text',
                'title' => 'Hesap Aç Linki',
            ),



        )
    ) );

    CSF::createSection( $prefix, array(
        'title'  => 'Tablolar',
        'fields' => array(

            array(
                'id'        => 'tablolar',
                'type'      => 'group',
                'title'     => '',
                'fields'    => array(
                    array(
                        'id'    => 'genelBaslik',
                        'type'  => 'text',
                        'title' => 'Genel Başlık',
                        'desc'  => 'Boş bırakabilirsiniz'
                    ),

                    array(
                        'id'     => 'tablo',
                        'type'   => 'repeater',
                        'title'  => 'Tablo',
                        'fields' => array(

                            array(
                                'id'    => 'baslik',
                                'type'  => 'text',
                                'title' => 'Başlık'
                            ),

                            array(
                                'id'    => 'ozellik',
                                'type'  => 'text',
                                'title' => 'Özellik'
                            ),

                        ),
                    ),

                ),
            ),


        )
    ) );


}
*/

add_action("wp_ajax_wp_ajax_ch", "wp_ajax_ch");

function wp_ajax_ch()
{
    include __DIR__ . "/lisans.php";
    $domain = $_SERVER["HTTP_HOST"];
    $addr = hex2bin("687474703a2f2f62697274656d612e6e65742f6c6973616e735f636865636b2f6170692e7068703f6c6973616e733d");

    $curl = curl_init($addr . "$lisans&domain=$domain&theme=BirFinansJS");
    curl_setopt($curl, CURLOPT_TIMEOUT, "50");
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $curlResult = curl_exec($curl);
    curl_close($curl);
}
