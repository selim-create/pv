<?php global $endeks_name, $bp_options;
if ( $bp_options['hisse_detay_haberleri'] ) {
 
	$bist_kodu = htmlspecialchars( $_GET['h'] ) ?? false;
	$bist_kodu = explode( '-', $bist_kodu )[0];
	
	$catquery = new WP_Query( [
		'order'          => 'DESC',
		'posts_per_page' => 6,
		'tag'        =>[ $bist_kodu, strtoupper($bist_kodu) ],
	] );
	
	if ( $catquery->have_posts() ) {
		?>
        <div class="widget">
            <div class="lastNewsHead">
				<?= $endeks_name[1][0] ?> HABERLERİ
            </div>
            <div class="lastNews">
				<?php
				
				while ( $catquery->have_posts() ) :
					$catquery->the_post();
					$current_id   = get_the_ID();
					$category_ids = kategori_listele( $current_id );
					?>
                    <div class="item">
                        <div class="thumb"><a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'icerik_image', [ 'alt' => get_the_title() ] ); ?></a>
                            </a></div>
                        <div class="content-summary">
                            <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <div class="summary"><?= get_snippet( strip_tags( get_the_excerpt( $current_id ) ), 30 ) ?></div>
                            <div class="categories">
                                <a href="<?= get_category_link( $category_ids[1] ) ?>"><?= get_cat_name( $category_ids[1] ) ?></a>
								<?php if ( @$category_ids[0] ): ?>
                                    <a href="<?= get_category_link( $category_ids[0] ) ?>"><?= get_cat_name( $category_ids[0] ) ?></a>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
					<?php $current_id = null; endwhile; ?>
            
            </div>
        </div>
        <!-- #Widget -->
        <div class="clear"></div>
	<?php }
}
?>