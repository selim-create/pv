<?php /* Template Name: Gelecek Halka Arz Sayfası */ ?>
<?php get_header(); 

$hisse = get_post_meta( get_the_ID(), 'hisse_ayarlar', true );

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

						<h1 class="postTitle"><?=the_title();?></h1>

						
						<div class="singleContent block hasImage">

							<!-- Main Content -->
							<div class="mainContent">

								<!-- Main -->
								<div class="main">

									<div class="">

									<?php $shortcode = do_shortcode('[gelecekhalkaarz_shortcode]'); echo $shortcode; ?>
									
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
