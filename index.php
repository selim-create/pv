<?php get_header(); global $bp_options; ?>
	<!-- Site Wrapper -->
	<div class="site-wrapper">
        <?php get_template_part('inc/col-top-ads') ?>
        
		<?php
		if(!wp_is_mobile())
		{
			dynamic_sidebar('headline');
			dynamic_sidebar('piyasavizyon_home_widget');
			dynamic_sidebar('piyasavizyon_homesag_widget');
			dynamic_sidebar('Ana Sayfa (Üst)');
		}

		?>
		<h1 style="display: none;"><?=$bp_options['anasayfaH1']?></h1>
		<div class="clear"></div>

		<!-- Content -->
		<section class="content home">
			<div class="container-wrap">
				<!-- WideBar -->
				<div class="widebar floatLeft">

				<?php
					if(wp_is_mobile())
					{
						dynamic_sidebar('Ana Sayfa (Mobil)');
					}else{
						dynamic_sidebar('Ana Sayfa (Content)');
					}
				?>

				</div>
				<?php
				if(!wp_is_mobile())
				{
					?>
				<!-- Sidebar -->
				<div class="sidebar floatRight">


						<?php dynamic_sidebar('Sidebar (Anasayfa)'); ?>
				</div>
				<?php } ?>

			</div>
			<?php dynamic_sidebar('Sayfa Alt (Anasayfa)'); ?>
		</section>
		<!-- Content -->
		<div class="clear"></div>


	</div>

	<!-- #Site Wrapper -->
<?php get_footer(); ?>
