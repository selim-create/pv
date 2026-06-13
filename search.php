<?php get_header(); ?>
	<!-- Site Wrapper -->
	<div class="site-wrapper">

		<!-- Content -->
		<section class="content home">
			<div class="container-wrap">

				<!-- WideBar -->
				<div class="widebar floatLeft">

					<!-- Widget -->
					<div class="widget noMargin">
						<div class="lastNewsHead"><?php printf( __( '%s', 'twentytwelve' ), '' . get_search_query() . ' için arama sonuçları' ); ?></div>
						<div class="lastNews">
              <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post();
							$current_id = get_the_ID();
							$category_ids = kategori_listele($current_id);
							 ?>
							<?php echo '<div class="item" data-page="/' . sunset_check_pagedNews() . '">'; ?>
								<div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'icerik_image', array( 'alt' => get_the_title() ) );  ?></a></div>
								<div class="content-summary">
									<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
									<div class="summary"><?=get_snippet(strip_tags(get_the_excerpt()), 30)?></div>
									<div class="categories">
										<a href="<?=get_category_link($category_ids[1])?>"><?=get_cat_name( $category_ids[1] )?></a>
										<?php if(@$category_ids[0]): ?>
										<a href="<?=get_category_link($category_ids[0])?>"><?=get_cat_name( $category_ids[0] )?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
              <?php endwhile; ?>
              <?php else : ?>
              <?php endif; ?>

						</div>

					</div>
					<!-- #Widget -->
					<div class="clear"></div>

				</div>

				<!-- Sidebar -->
				<div class="sidebar floatRight">

					<?php dynamic_sidebar('Sidebar (Arama)'); ?>

				</div>

			</div>
		</section>
		<!-- Content -->
		<div class="clear"></div>


	</div>

	<!-- #Site Wrapper -->

<?php get_footer(); ?>
