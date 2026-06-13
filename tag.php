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
						<div class="lastNewsHead"><?php single_cat_title() ?></div>
						<div class="lastNews">
							<?php
								$catquery = new WP_Query(array(
									'order' => 'desc',
									'tag'=> get_query_var('tag'),
									'posts_per_page' => 15,
									'ignore_sticky_posts' => '-1',
									)
								);
							while($catquery->have_posts()) : $catquery->the_post();
							$current_id = get_the_ID();
							$category_ids = kategori_listele($current_id);
							echo '<div class="item" data-page="/' . sunset_check_pagedtag() . '">'; ?>
								<div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( '', array( 'alt' => get_the_title() ) );  ?></a></div>
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

						<div class="loadMoreButton loadMoreTagButton" data-page="<?php echo sunset_check_pagedNews(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>"  data-tag="<?php echo get_query_var('tag'); ?>">
							<span>Daha Fazla İçerik Yükle</span>
						</div>

					</div>
					<!-- #Widget -->
					<div class="clear"></div>

				</div>

				<?php if(!wp_is_mobile()): ?>
				<!-- Sidebar -->
				<div class="sidebar floatRight">

					<?php dynamic_sidebar('Sidebar (Etiket)'); ?>

				</div>
			<?php endif; ?>

			</div>
		</section>
		<!-- Content -->
		<div class="clear"></div>


	</div>
	<script>
	jQuery(document).ready( function($){

		$(document).on('click','.loadMoreTagButton', function(){

			var thattag = $(this);
			var pagetag = $(this).data('page');
			var newPagetag = pagetag+1;
			var ajaxurltag = thattag.data('url');
			var prevtag = thattag.data('prev');
			var tag = $(this).data('tag');

			if( typeof prevtag === 'undefined' ){
				prevtag = 0;
			}

			thattag.find('span').html("Yükleniyor");

			$.ajax({

				url : ajaxurltag,
				type : 'post',
				data : {

					page : pagetag,
					tag : tag,
					prev : prevtag,
					action: 'sunset_load_moretag'

				},
				error : function( response ){
					console.log(response);
				},
				success : function( response ){

					if( response == 0 ){

						thattag.find('span').html("Maalesef başka içerik bulunamadı :(");

					} else {

						setTimeout(function(){

							if( prevtag == 1 ){
								$('.catTab .categoryFocusedTabPosts .inner').prepend( response );
								newPagetag = pagetag-1;
							} else {
								$('.catTab .categoryFocusedTabPosts .inner').append( response );
							}

							if( newPagetag == 1 ){

								thattag.slideUp(320);

							} else {

								thattag.data('page', newPagetag);

								thattag.find('span').html("Daha Fazla İçerik Yükle");

							}

							revealPosts();

						}, 1000);

					}


				}

			});

		});

	});
	</script>
	<!-- #Site Wrapper -->

<?php get_footer(); ?>
