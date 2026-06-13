<?php get_header(); setPostViews(get_the_ID());

$category_ids = kategori_listele(get_the_ID());
 ?>

<!-- Site Wrapper -->
	<div class="site-wrapper">
		<?php get_template_part('inc/col-top-ads') ?>

		<!-- Content -->
		<section class="content home">
			<div class="container-wrap">
        <?php dynamic_sidebar('Single Sayfası (Üst)'); ?>
				<?php if ( wp_is_mobile() ) { ?>
				<?php if ($bp_options['makaleSayfasiUstM'] == TRUE): ?>
				<div class="ustR">
					<?php echo $bp_options['makaleSayfasiUstM']; ?>
				</div>
				<?php endif; ?>
				<?php }else{ ?>
				<?php if ($bp_options['makaleSayfasiUst'] == TRUE): ?>
				<div class="ustR">
					<?php echo $bp_options['makaleSayfasiUst']; ?>
				</div>
				<?php endif; ?>
				<?php }?>

				<!-- WideBar -->
				<div class="widebar floatLeft">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="singleWrapper">
                    <div class="mainContentArea">
						<!-- BreadCrumb -->
						<div class="breadcrumb">
							<ul class="block">
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Anasayfa<i>/</i></a></li>

								<li><a href="<?=get_category_link($category_ids[1])?>"><?=get_cat_name( $category_ids[1] )?><i>/</i></a></li>
								<?php if(@$category_ids[0]): ?>
								<li><a href="<?=get_category_link($category_ids[0])?>"><?=get_cat_name( $category_ids[0] )?><i>/</i></a></li>
								<?php endif; ?>

								<li class="post bg"><span><?=the_title();?></span></li>
							</ul>
						</div>

						<h1 class="postTitle"><?=the_title();?></h1>
						<div class="postInfos">
                            <?php if( $bp_options['tarihSwitch'] ) : ?>
							<div class="posti-left">
								<time>Güncelleme: <?=get_the_modified_date()?> <?=get_the_modified_date("H:i")?></time>
							</div>
                            <?php endif;
                            if( $bp_options['okunmaSayisiSwitch'] ) :
                            ?>
							<div class="posti-right">
								<span><?=explode(" ", getPostViews(get_the_ID()))[0]?> kez okundu</span>
							</div>
                            <?php endif; ?>
						</div>

                        <?php if($bp_options['oneCikanGorselPasif'] != 1){ ?>
						<div class="thumbnail">
							<?php the_post_thumbnail('icerik_detay_image', array("alt" => get_the_title()));?>
						</div>
						<?php } ?>

						<div class="singleContent block hasImage">

							<!-- Main Content -->
							<div class="mainContent">

								<!-- Main -->
								<div class="main">

								<!--ESKİ PAYLAŞIM

                	<div class="infos">
										<div class="author">
											<a class="avatarS" href="<?=esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">

                        <?php if(!empty(get_user_meta(get_the_author_meta( 'ID' ), "profil_pic", true))){
                            ?><img src="<?php bloginfo("template_directory")?>/profile/<?=get_user_meta(get_the_author_meta( 'ID' ), "profil_pic", true)?>" class="avatar avatar-46 photo" width="46" height="46"><?php
                        }else{
                            ?><img src="<?php bloginfo("template_directory")?>/img/icons/user.png" class="avatar avatar-46 photo" width="46" height="46"><?php
                        }?>

                      </a>
											<ul>
												<li><span><a href="<?=esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?=get_the_author_meta( 'display_name' ); ?></a></span></li>
												<li class="time">- <?php printf( _x( '%s önce', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_date( 'U' ), current_time( 'timestamp' ) ) ); ?></li>
											</ul>
										</div>
										<ul class="buttons">
											<li class="views"><span><?=number_format(getPostViews(get_the_ID()),"0",",",".");?> okunma</span></li>
                                        <?php if(is_user_logged_in()): ?>
  											<li class="favorite"><?php echo get_simple_likes_button( get_the_ID() ); ?></li>
  										<?php else :?>
  											<li class="favorite loginControl"><a href="javascript:void(0);"><i></i><b>Ekle</b></a></li>
  										<?php endif; ?>
											<li class="fb"><a rel="nofollow" target="popup" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink()?>','popup','width=600,height=600'); return false;"><i></i>Paylaş</a></li>
											<li class="tw"><a rel="nofollow" target="popup" onclick="window.open('https://twitter.com/intent/tweet?text=<?php the_title()?>&amp;url=<?php the_permalink() ?>','popup','width=600,height=600'); return false;"><i></i>Paylaş</a></li>
                                            <li class="whatsapp"><a rel="nofollow" target="popup" onclick="window.open('https://api.whatsapp.com/send?text=<?php the_permalink() ?>','popup','width=600,height=600'); return false;"><i></i>Paylaş</a></li>
										</ul>
									</div>

                -->

                <div class="sc-options">
                  <div class="flex-between">
                      <div class="sc-options-left">
                          <a href="<?=esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="sc-options-user">
                              <?php if(!empty(get_user_meta(get_the_author_meta( 'ID' ), "profil_pic", true))){
                                  ?><img src="<?php bloginfo("template_directory")?>/profile/<?=get_user_meta(get_the_author_meta( 'ID' ), "profil_pic", true)?>"><?php
                              }else{
                                  ?><img src="<?php bloginfo("template_directory")?>/img/icons/user.png"><?php
                              }?>
                              <b><?=get_the_author_meta( 'display_name' )?></b>
                          </a>
                          <?php if( ! empty( $bp_options['googleNewsLink'] ) ) { ?>
                          <div class="news-abone">
                              <a href="<?=$bp_options['googleNewsLink']?>">
                                  <span>ABONE OL</span>
                                  <div class="news-abone-logo">
                                    <img src="<?php bloginfo('template_directory'); ?>/img/gg.svg" alt="google news">
                                    News
                                  </div>
                              </a>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="sc-options-right">
                          <div class="options-icons">
                              <a href="#respond"><div class="icon-border">
                                      <i class="icon-comments2"></i>
                                      <span class="icon-border-count"><?=get_comment_count( get_the_ID() )['approved']?><span>
                                  </span></span></div></a>
                          </div>
                          <div class="options-icons">
                              <?php if(is_user_logged_in()){
                                  echo get_simple_likes_button( get_the_ID() );
                              }else{
                                  ?><a href="javascript:;" onclick="alert('Favorilere eklemek için üye girişi yapmalısınız.')"><div class="icon-border"><i class="icon-favori2"></i></div></a> <?php
                              }
                              ?>
                          </div>
                          
                          <div class="options-icons">
                              <a href="https://twitter.com/intent/tweet/?url=<?php the_permalink(); ?>" target="_blank">
                                  <div class="icon-border twitter">
                                      <i></i>
                                  </div>
                              </a>
                          </div>
                          <div class="options-icons">
                              <a href="http://www.facebook.com/share.php?u=<?php the_permalink()?>"><div class="icon-border facebook">
                                      <i></i>
                                  </div></a>
                          </div>
                          <div class="options-icons">
                              <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>"><div class="icon-border sc-pint">
                                      <i></i>
                                  </div></a>
                          </div>
                          <div class="options-icons">
                              <a href="https://api.whatsapp.com/send?text=<?php the_permalink(); ?>">
                                  <div class="icon-border sc-wp">
                                      <i></i>
                                  </div>
                              </a>
                          </div>
						   <div class="options-icons">
                              <a href="https://t.me/share/url?url=<?php the_permalink(); ?>">
                                  <div class="icon-border sc-telegram">
                                      <i></i>
                                  </div>
                              </a>
                          </div>
						   <div class="options-icons">
                              <a href="fb-messenger://share?link=<?php the_permalink(); ?>">
                                  <div class="icon-border sc-messenger">
                                      <i></i>
                                  </div>
                              </a>
                          </div>

                      </div>
                  </div>
                </div>

									<!-- Post Inner -->
									<div class="postInner single-post-inner">

									<?php if ( wp_is_mobile() ) { ?>
									<?php if ($bp_options['makaleSayfasiIOM'] == TRUE): ?>
									<div class="ustR io">
										<div class="ort">
											<?php echo $bp_options['makaleSayfasiIOM']; ?>
										</div>
									</div>
									<?php endif; ?>
									<?php }else{ ?>
									<?php if ($bp_options['makaleSayfasiIO'] == TRUE): ?>
									<div class="ustR io">
										<div class="ort">
											<?php echo $bp_options['makaleSayfasiIO']; ?>
										</div>
									</div>
									<?php endif; ?>
									<?php }?>


									<?php the_content(); ?>

									<?php if ( wp_is_mobile() ) { ?>
									<?php if ($bp_options['makaleSayfasiISM'] == TRUE): ?>
									<div class="ustR is">
										<div class="ort">
											<?php echo $bp_options['makaleSayfasiISM']; ?>
										</div>
									</div>
									<?php endif; ?>
									<?php }else{ ?>
									<?php if ($bp_options['makaleSayfasiIS'] == TRUE): ?>
									<div class="ustR is">
										<div class="ort">
											<?php echo $bp_options['makaleSayfasiIS']; ?>
										</div>
									</div>
									<?php endif; ?>
                                    <?php } ?>

									</div>

								</div>

								<div class="tags">
									<?php the_tags('',''); ?>
								</div>


							</div>


							<!-- #MainBar -->
                            <?php if(get_post_meta($post->ID, 'bf_benzer_icerikler', true) != "on"){ ?>

							<div class="relatedPosts">
								<div class="singleHead v1">
									<span>BENZER İÇERİKLER</span>
								</div>
								<div class="posts">
									<?php $categories = get_the_category($post->ID);
										if ($categories) {
									   $category_ids = array();
									   foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

									   $args=array(
										  'category__in' => $category_ids,
										  'post__not_in' => array($post->ID),
										  'showposts'=>3,
										  'caller_get_posts'=>1
									   );

											$my_query = new wp_query($args);
									   if( $my_query->have_posts() ) {
										  while ($my_query->have_posts()) {
											 $my_query->the_post(); ?>
									<div class="item">
										<a href="<?php the_permalink(); ?>">
											<div class="thumb"><?php the_post_thumbnail( 'pLD', array( 'alt' => get_the_title() ) );  ?></div>
											<span><?php the_title(); ?></span>
										</a>
									</div>

									<?php } } wp_reset_query(); } ?>


								</div>
							</div>
							<!-- #related -->
							<?php } ?>

							<!-- comments -->
							<div class="commentsField">

							    <!-- Head -->
								<div class="singleHead v2" id="respond">
									<span>YORUMLAR YAZ</span>
								</div>

							    <?php comments_template(); ?>

							</div>
							<!--#comments bitti -->

				</div>

                    </div>
                        <?php if ($bp_options['infiniteScroll'] ==  true) { ?>

                            <?php  $prev_id = get_previous_post(); ?>
                            <a href="<?=get_permalink($prev_id)?>" rel="prev" title="<?=get_the_title($prev_id)?>" image="<?=get_the_post_thumbnail_url($prev_id, 'videoThumb')?>"></a>


                            <script src="<?php bloginfo('template_directory'); ?>/js/jquery-3.3.1.min.js"></script>
                            <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.clever-infinite-scroll.js"></script>

                            <script>
                                $('.singleWrapper ').cleverInfiniteScroll({
                                    contentsWrapperSelector: '.singleWrapper',
                                    contentSelector: '.singleWrapper .mainContentArea',
                                    nextSelector: 'a[rel="prev"]',
                                    loadImage: '<?php bloginfo('template_directory'); ?>/img/icons/infinityLoad.gif'
                                });

                            </script>

                        <?php } ?>
			</div>



		</div>
				<?php endwhile; endif; ?>

        <?php if(!wp_is_mobile()){?>
				<!-- Sidebar -->
				<div class="sidebar floatRight">

					<?php dynamic_sidebar('Sidebar (İçerik)'); ?>

				</div>
      <?php } ?>

			</div>
		</section>
		<!-- Content -->
		<div class="clear"></div>

	</div>
	<!-- #Site Wrapper -->


<?php get_footer(); ?>
