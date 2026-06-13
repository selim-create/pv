<?php get_header(); 




?><head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- Site Wrapper -->

<div class="site-wrapper">
		<?php get_template_part('inc/col-top-ads') ?>

    <!-- Content -->
    <section class="content home" style="margin-top: 0;">
        <div class="container-wrap">

            <!-- WideBar -->
            <div class="widebar floatLeft">
                
                        <div class="singleWrapper">
                           
                           
                            <div class="singleContent block hasImage">
                                <!-- Main Content -->
                                <div class="mainContent">
                                    <!-- Main -->
                                    <div class="main">
                          
                                 <?php if (have_posts()) :
                                    while (have_posts()) : the_post();
                                    
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
                



?> 
<?php

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
                      
                      $term_id = get_queried_object_id();
                      
                      /*
                        if (empty($hisse['bist-islem-tarihi'])) {
                        echo '<div class="il-new"><a href="https://piyasavizyon.com/durumlar/yeni/"> Yeni! </a></div>';
                        } else {
                            if (!empty($tarih_str) && $tarih_formatli && strtotime($bugun) < strtotime($tarih_formatli)) {
                                echo '<div class="il-new"><a href="https://piyasavizyon.com/durumlar/yeni/"> Yeni! </a></div>';
                            }
                        }  
                        */
                      
                        


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
                              echo '<span class="il-bist-kod">' . $hisse['bist-kodu'] . ' ' . $on_onay . ' <i title="İşlem Görmeye Başladı" class="fa-solid fa-arrow-trend-up snc-badge"></i></span>';
                              } else {
                                  echo '<span class="il-bist-kod">' . $hisse['bist-kodu'] . ' ' . $on_onay . ' ' . 'Bist İşlem Tarihi: ' . $tarih_str . '</span>';
                              }
                          }
                        } else {
                        echo '<span class="il-bist-kod">' . $hisse['bist-kodu'] . ' ' . $on_onay . '</span>';
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

?>
                                   <?php  endwhile;
                                else :
                                    
                                    echo '<p>Arşivde içerik bulunamadı.</p>';
                                endif; ?>
     
<div class="pagination">
    <?php echo paginate_links(); ?>
</div>

  </div>

                                </div>
                                <!-- #MainBar -->
                            </div>
                        </div>
            </div>
  

			<?php if ( ! wp_is_mobile() ) { ?>
                    <div class="sidebar floatRight">
						<?php dynamic_sidebar( "Sidebar (Hisse Detay)" ); ?>
                    </div>
				<?php } ?>
			
        </div>
    </section>
    <!-- Content -->
    <div class="clear"></div>

</div>
<!-- #Site Wrapper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php get_footer(); ?>