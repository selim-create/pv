<?php 



function hisseler_shortcode() {
ob_start();

$arsiv_sayfa_gosterilen_sayisi = get_option('arsiv_sayfa_gosterilen_sayisi', '');


$ilk_arz_id = 63; 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'halka-arz', 
    'posts_per_page' => $arsiv_sayfa_gosterilen_sayisi,
    'tax_query' => array(
        array(
            'taxonomy' => 'hissetipi', 
            'field' => 'term_id',
            'terms' => $ilk_arz_id,
        ),
    ),
    'paged' => $paged,
);

$query = new WP_Query($args);



$taslak_id = 64; 


$user_selected_statuses = isset($_GET['selected_statuses']) ? $_GET['selected_statuses'] : array();


$tax_query = array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'hissetipi',
        'field' => 'term_id',
        'terms' => $taslak_id,
    ),
);


if (!empty($user_selected_statuses)) {
    $tax_query[] = array(
        'taxonomy' => 'durumlar',
        'field' => 'term_id',
        'terms' => $user_selected_statuses,
        'operator' => 'IN',
    );
}


$args_taslak = array(
    'post_type' => 'halka-arz',
    'posts_per_page' => $arsiv_sayfa_gosterilen_sayisi,
    'tax_query' => $tax_query,
    'paged' => $paged,
);


$query_taslak = new WP_Query($args_taslak);
?><head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    
<ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link tab-btn active" id="ilk-halka-arzlar-tab" data-bs-toggle="tab" data-bs-target="#ilk-halka-arzlar" type="button" role="tab" aria-controls="ilk-halka-arzlar" aria-selected="true">İlk Halka Arzlar</button>
      </li>
      <?php if ($query_taslak->have_posts()) {
    
        $content_count = $query_taslak->found_posts;
        echo '<li class="nav-item" role="presentation">';
            echo '<button class="nav-link tab-btn" id="taslak-arzlar-tab" data-bs-toggle="tab" data-bs-target="#taslak-arzlar" type="button" role="tab" aria-controls="taslak-arzlar" aria-selected="false">Taslak Arzlar <sup class="taslak-number">' . $content_count . '</sup></button>';
        echo '</li>';
        
            wp_reset_postdata();
        } ?>
      
    </ul>
    <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="ilk-halka-arzlar" role="tabpanel" aria-labelledby="ilk-halka-arzlar-tab">
    <ul class="halka-arz-list">
        <?php 
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $thumbnail_url = get_the_post_thumbnail_url($post_id);
                $hisse = get_post_meta( get_the_ID(), 'hisse_ayarlar', true );
                              
                $tarih_str = $hisse['bist-islem-tarihi'];

                
                $bugun = date('Y-m-d');
                
                
                $tarih = DateTime::createFromFormat('d/m/Y', $tarih_str);
                $tarih_formatli = $tarih ? $tarih->format('Y-m-d') : '';
                
                
                $su_an = date('Y-m-d');

                
                $baslangic_tarihi_str = isset($hisse['halka-arz-tarihi-baslangic']) ? sanitize_text_field($hisse['halka-arz-tarihi-baslangic']) : '';
                $bitis_tarihi_str = isset($hisse['halka-arz-tarihi-bitis']) ? sanitize_text_field($hisse['halka-arz-tarihi-bitis']) : '';
                $bugun2 = new DateTime();
               
                $baslangic_tarihi = DateTime::createFromFormat('d/m/Y', $baslangic_tarihi_str);
                $bitis_tarihi = DateTime::createFromFormat('d/m/Y', $bitis_tarihi_str);
                


                
                      echo '<article class="index-list">';
                      echo '<div class="il-badge">';
                      if ($baslangic_tarihi && $bitis_tarihi && $baslangic_tarihi <= $bugun2 && $bitis_tarihi >= $bugun2) {
                        echo '<div class="il-tt">';
                          echo '<div class="circle pulse"></div> Talep Topluyor ';
                        echo '</div>';
                      }
                      if ($bitis_tarihi && $bitis_tarihi < $bugun2) {
                        echo '<i title="Talep Toplama Tamamlandı" class="fa-solid fa-clock-rotate-left snc-badge"></i>';
                      }
                      if (!empty($hisse['arz-yurt-ici-bireysel-kisi'])) {
                        echo '<i title="Halka Arz Sonuçları Açıklandı" class="fa-regular fa-chart-bar snc-badge"></i>';
                      }
                        if (empty($hisse['bist-islem-tarihi'])) {
                        echo '<div class="il-new"><a href="' . home_url() . '/durumlar/yeni/"> <span class="bell far fa-bell"></span> Yeni! </a></div>';
                    } else {
                        if (!empty($tarih_str) && $tarih_formatli && strtotime($bugun) < strtotime($tarih_formatli)) {
                            echo '<div class="il-new"><a href="' . home_url() . '/durumlar/yeni/"><span class="bell far fa-bell"></span> Yeni! </a></div>';
                        }
                    }


                      echo '</div>';
                      if ($thumbnail_url) {
                        echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
                            echo '<img src="' . $thumbnail_url . '" class="slogo">';
                        echo '</a>';
                      }
                      
                      if ($hisse['on-onay']) {
                            $on_onay = '<i title="Ön Onaylı" class="fa-solid fa-check snc-badge"></i>';
                        }
                                                
                      echo '<div class="il-content">';
                        if (!empty($hisse['bist-islem-tarihi'])) {
                          if (!empty($hisse['bist-kodu'])) {
                              if ($tarih_formatli < $su_an) {
                              echo '<span class="il-bist-kod"><span title="' . get_the_title() . ' Bist Kodu" class="bist-kodu">' . $hisse['bist-kodu']. ' ' . '</span>' . ' ' . $on_onay . ' <i title="İşlem Görmeye Başladı" class="fa-solid fa-arrow-trend-up snc-badge"></i></span>';
                              } else {
								  echo '<span class="il-bist-kod"><span title="' . get_the_title() . ' Bist Kodu" class="bist-kodu">' . $hisse['bist-kodu']. ' ' . '</span></span>' . ' ' . $on_onay . '<span class="bist-islem-tarihi">Bist İşlem Tarihi: ' . $tarih_str . '</span>';
                              }
                          }
                        } else {
                        echo '<span class="il-bist-kod"><span title="' . get_the_title() . ' Bist Kodu" class="bist-kodu">' . $hisse['bist-kodu']. ' ' . '</span>' . ' ' . $on_onay . ' </span>';
                    } 
                    
                    
                        echo '<h3 class="il-halka-arz-sirket">';
                          echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
                        echo '</h3>';
                        if (!empty($hisse['arz-tarihi'])) {
                            echo '<span class="il-halka-arz-tarihi">';
                                echo '<time datetime="' . $hisse['arz-tarihi'] . '" title="' . $hisse['arz-tarihi'] . '" pubdate="pubdate">' . $hisse['arz-tarihi'] . '</time>';
                                echo '<div class="fiyat-list">';
                                if ($hisse['arz-deger']) {
                                    echo " - Halka Arz Değeri: <b>" . $hisse['arz-deger'] . "</b> ";
                                }
                                if ($hisse['arz-deger']) {
                                    echo " - Halka Arz Fiyat: <b>" . $hisse['arz-fiyat'] . "</b>";
                                }
                                echo '</div>';
                            echo '</span>';
                        }  
                        
                      echo '</div>';
                    echo '</article>';
                  
            }
            wp_reset_postdata(); 
        } else {
            
            echo 'Henüz girilmiş hisse bulunamadı.';
        } ?>
     
    </ul>

  </div>
  <div class="tab-pane fade" id="taslak-arzlar" role="tabpanel" aria-labelledby="taslak-arzlar-tab">
      <?php 
        if ($query_taslak->have_posts()) {
            while ($query_taslak->have_posts()) {
                $query_taslak->the_post();
                $post_id = get_the_ID();
                $thumbnail_url = get_the_post_thumbnail_url($post_id);
                $hisse = get_post_meta( get_the_ID(), 'hisse_ayarlar', true );
                
                $durumlar = get_the_terms(get_the_ID(), 'durumlar');
                
                echo '<li>';
                    echo '<article class="index-list">';
                      echo '<div class="il-badge">';
                        if ($durumlar && !is_wp_error($durumlar)) {
                        echo '<div class="il-ert">';
                        foreach ($durumlar as $durum) {
                            echo '<a href="' . get_term_link($durum) . '">' . $durum->name . '</a>';
                            echo '<a href="/gelecek-halka-arzlar/" class="gelecek-halka-arz-badge"><i title="Taslak Halka Arz" class="fa-solid fa-circle-dot snc-badge"></i></a>';
                        }
                        echo '</div>';
                        } else {
                            echo '<div class="il-ert">';
                            echo '<a href="/gelecek-halka-arzlar/" class="gelecek-halka-arz-badge"><i title="Taslak Halka Arz" class="fa-solid fa-circle-dot snc-badge"></i></a>';
                            echo '</div>';
                        }
                        
                      echo '</div>';
                      if ($thumbnail_url) {
                        echo '<a href="' . get_the_permalink() . '">';
                            echo '<img src="' . $thumbnail_url . '" class="slogo">';
                        echo '</a>';
                      }
                      
                      if ($hisse['on-onay']) {
                          $on_onay = '<i title="Ön Onaylı" class="fa-solid fa-check snc-badge"></i>';
                      }
                      
                      
                      echo '<div class="il-content">';
                      if (!empty($hisse['bist-kodu'])) {
                          echo '<span class="il-bist-kod"><span title="' . get_the_title() . ' Bist Kodu" class="bist-kodu">' . $hisse['bist-kodu']. ' ' . '</span>' . ' ' . $on_onay . '</span>';
                      }
                        
                        echo '<h3 class="il-halka-arz-sirket">';
                          echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                        echo '</h3>';
                        if (!empty($hisse['arz-tarihi'])) {
                            echo '<span class="il-halka-arz-tarihi">';
                                echo '<time datetime="' . $hisse['arz-tarihi'] . '" title="' . $hisse['arz-tarihi'] . '" pubdate="pubdate">' . $hisse['arz-tarihi'] . '</time>';
                            echo '</span>';
                        }    
                        
                      echo '</div>';
                    echo '</article>';
                  echo '</li>';
            }
            wp_reset_postdata(); 
        } else {
            
            echo 'Henüz girilmiş hisse bulunamadı.';
        } ?>
  </div>

</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
    echo '<div class="pagination">';
    echo paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => max(1, $paged),
        'prev_text' => __('« Önceki', 'custom'),
        'next_text' => __('Sonraki »', 'custom'),
        'type' => 'list',
    ));
    echo '</div>';
    return ob_get_clean(); 
}

add_shortcode('hisse_shortcode', 'hisseler_shortcode');

