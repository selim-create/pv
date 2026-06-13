<?php
/*
  Template Name: Kredi Sayfası
*/
 get_header();
 if(wp_is_mobile()){
     ?>
     <style>
         .homeIconMenu{
             clear: both;
         }
     </style>
    <?php
 }
 ?>

	<!-- Site Wrapper -->
	<div class="site-wrapper">

		<!-- Content -->
		<section class="content home">
			<div class="container-wrap">
				<!-- WideBar -->
        <?php

						dynamic_sidebar('Kredi Sayfası');

				?>
				

			</div>
		</section>
		<!-- Content -->
		<div class="clear"></div>


	</div>

	<!-- #Site Wrapper -->
<?php get_footer(); ?>
