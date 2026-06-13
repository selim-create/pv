<?php get_header(); ?>
	<!-- Site Wrapper -->
	<div class="site-wrapper">
		<?php get_template_part('inc/col-top-ads') ?>

		<!-- Content -->
		<section class="content home">
			<div class="container-wrap">
				<?php dynamic_sidebar('Kategori Sayfası (Üst)'); ?>
				<?php if ( wp_is_mobile() ) { ?>
				<?php if ($bp_options['katSayfasiUstM'] == TRUE): ?>
				<div class="ustR kat">
					<?php echo $bp_options['katSayfasiUstM']; ?>
				</div>
				<?php endif; ?>
				<?php }else{ ?>
				<?php if ($bp_options['katSayfasiUst'] == TRUE): ?>
				<div class="ustR kat">
					<?php echo $bp_options['katSayfasiUst']; ?>
				</div>
				<?php endif; ?>
				<?php }?>

				<!-- WideBar -->
				<div class="widebar floatLeft">

					<!-- Widget -->
					<div class="widget noMargin">
						<div class="lastNewsHead"><?php single_cat_title() ?></div>
						<div class="lastNews">
							<?php
							$cat_id = get_query_var('cat');
								$catquery = new WP_Query(array(
									'order' => 'desc',
									'category__in' => $cat_id,
									'posts_per_page' => 10,
									'ignore_sticky_posts' => '-1',
									)
								);
							while($catquery->have_posts()) : $catquery->the_post();
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

						</div>

						<div style="margin-top: 20px;" class="loadMoreButton categoryLoadMore" data-page="<?php echo sunset_check_pagedNews(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" data-category="<?php echo $cat_id; ?>">
							<span>Daha Fazla İçerik Yükle</span>
						</div>

					</div>
					<!-- #Widget -->
					<div class="clear"></div>

				</div>

<?php if(!wp_is_mobile()){?>
				<!-- Sidebar -->
				<div class="sidebar floatRight">

					<?php dynamic_sidebar('Sidebar (Kategori)'); ?>

				</div>

			<?php } ?>

			</div>
		</section>
		<!-- Content -->
		<div class="clear"></div>


	</div>

	<!-- #Site Wrapper -->

<?php get_footer(); ?>
