<?php get_header();
if(isset($_GET['author_name'])) :
    // ROOT: 2.0 bug requires: get_userdatabylogin(get_the_author_login());
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
endif;
$passthis_id = $curauth->ID;
$current_user = get_current_user_id();

$follower_count 	= $wpdb->get_var( "SELECT COUNT(*) FROM bt_follower WHERE follow_id = $passthis_id" );
$follower 			= $wpdb->get_results( "SELECT * FROM bt_follower WHERE follow_id = '$passthis_id'");
$following_count 	= $wpdb->get_var( "SELECT COUNT(*) FROM bt_follower WHERE  user_id = $passthis_id" );
$following 			= $wpdb->get_results( "SELECT * FROM bt_follower WHERE user_id = '$passthis_id'");
$is_following		= $wpdb->get_row( "SELECT * FROM bt_follower WHERE user_id = $current_user AND follow_id = $passthis_id" );
?>
<!-- Site Wrapper -->
<div class="site-wrapper">

  <!-- Content -->
  <section class="content home">
    <div class="container-wrap">
      <!-- BreadCrumb -->
      <div class="breadcrumb">
        <ul class="block">
          <li><a href="<?php bloginfo("home")?>">Anasayfa<i>/</i></a></li>
          <li><a href="#">Üyeler<i>/</i></a></li>
          <li class="post bg"><span><?=$curauth->display_name?></span></li>
        </ul>
      </div>

      <div class="authorHead">
        <div class="inner">
          <div class="datas">
            <?php if(!empty($current_user)){
              if($current_user != $passthis_id){
              if(empty($is_following)){ ?>
              <span class="subscribe followButton" onclick="subscribe(<?=$passthis_id?>)">Takip Et</span>
              <?php }else{ ?>
              <span class="subscribe followButton" onclick="unfollow(<?=$passthis_id?>)">Takipten Çık</span>
              <?php }
              }
            }
              if(empty($current_user)){ ?>
                <span class="subscribe followButton" onclick="girisYap()">Takip Et</span>
              <?php } ?>
            <div class="clear"></div>
            <div class="centerInfos">
              <h3><?=$curauth->display_name?></h3>
              <span class="slogan"><?=get_user_meta($passthis_id, "biyografi", true)?></span>
              <div class="authorCenter">
              <ul>
                <li class="button follower"><i class="blue"></i><span><b class="follower_count"><?=$follower_count?></b> takipçi</span></li>
                <li class="avatar">
                  <div class="avatarWrapper"><?php
                  if(!empty(get_user_meta($passthis_id, "profil_pic", true))){
                    ?>
                    <img src="<?php bloginfo("template_directory")?>/profile/<?=get_user_meta($passthis_id, "profil_pic", true)?>" width="144" height="144">
                    <?php
                  }else{
                    ?>
                    <img src="<?php bloginfo("template_directory")?>/img/icons/user.png" width="144" height="144">
                    <?php
                    }
                   ?></div>
                </li>
                <li class="button following following_count"><i class="yellow"></i><span><b><?=$following_count?></b> takip</span></li>
              </ul>
              </div>
            </div>

            <ul class="leftSocial">
              <?php if(!empty(get_user_meta($passthis_id, "facebook", true))){
                ?><li class="fb"><a target="_BLANK" href="<?=get_user_meta($passthis_id, "facebook", true)?>"><i></i></a></li><?php
              }else{
                ?><li class="fb"><a target="_BLANK" href="#"><i></i></a></li><?php
              }?>
              <?php if(!empty(get_user_meta($passthis_id, "twitter", true))){ ?>
              <li class="tw"><a target="_BLANK" href="<?=get_user_meta($passthis_id, "twitter", true)?>"><i></i></a></li>
            <?php }else{
              ?><li class="tw"><a target="_BLANK" href="#"><i></i></a></li><?php
            } ?>

              <?php if(!empty(get_user_meta($passthis_id, "instagram", true))){ ?>
              <li class="in"><a target="_BLANK" href="<?=get_user_meta($passthis_id, "instagram", true)?>"><i></i></a></li>
            <?php }else{
              ?><li class="in"><a target="_BLANK" href="#"><i></i></a></li><?php
            } ?>
            </ul>

            <ul class="rightIcons">
              <?php if(get_user_role($curauth->ID) == "editor"): ?>
							<li class="trophy"><span><i></i></span><p class="hoverText">İçerik Editörü</p></li>
							<?php elseif(get_user_role($curauth->ID) == "vip"): ?>
							<li class="trophy"><span><i></i></span><p class="hoverText">Vip Üye</p></li>
							<?php elseif(get_user_role($curauth->ID) == "administrator"): ?>
							<li class="trophy"><span><i></i></span><p class="hoverText">Site Yöneticisi</p></li>
							<?php endif; ?>
              <li class="postCount"><span><i></i></span><p class="hoverText"><?php echo count_user_posts( $user->ID ); ?> Adet İçerik Eklemiştir</p></li>
              <?php if(is_user_online($passthis_id)){ echo '<li class="status online"><span><i class="online"></i></span><p class="hoverText">Çevrimiçi</p></li>';} else { echo'<li class="status offline"><span><i class="online"></i></span><p class="hoverText">Çevrimdışı</p></li>';} ?>
            </ul>

          </div>
        </div>
      </div>

      <!-- WideBar -->
      <div class="widebar floatLeft">

        <!-- Widget -->
        <div class="widget noMargin">
          <div class="categoryTab">
            <!-- Tab Head -->
          <div class="tabHead userPostsTabHead bg">
            <ul>
              <li><span><img src="<?php bloginfo("template_directory")?>/img/icons/shared.png" alt=""> PAYLAŞTIĞI HABERLER</span></li>
              <li><span><img src="<?php bloginfo("template_directory")?>/img/icons/fav.png" alt=""> FAVORİYE EKLEDİKLERİ</span></li>
              <li><span><img src="<?php bloginfo("template_directory")?>/img/icons/followers.png" alt=""> TAKİPÇİLERİ</span></li>
              <li><span><img src="<?php bloginfo("template_directory")?>/img/icons/followers.png" alt=""> TAKİP ETTİKLERİ</span></li>
            </ul>
          </div>
          <div class="userPostsTabContent">
            <div class="lastNews authorNews">


              <?php

              $catTab = new WP_Query(array(
                'author'=> get_query_var('author'),
                'order'=> 'DESC',
                'posts_per_page'=> '12'
              ));  ?>
              <?php if ($catTab->have_posts()) : ?>
              <?php while ($catTab->have_posts()) : $catTab->the_post();

              $current_id = get_the_ID();
              $category_ids = kategori_listele($current_id);
               ?>
                <?php echo '<div class="item" data-page="/' . sunset_check_pagedAuthor() . '">'; ?>
                  <div class="thumb"><a href="<?php the_permalink()?>"><?php the_post_thumbnail( 'icerik_image', array( 'alt' => get_the_title() ) );  ?></a></div>
                <div class="content-summary">
                  <div class="title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></div>
                  <div class="summary"><?=get_snippet(strip_tags(get_the_excerpt($current_id)), 30)?></div>
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
                <span class="noF">Yazara ait hiç içerik bulunamadı!</span>
                <?php endif; ?>


            </div>
            <div class="loadMoreButton loadMoreAuthor" data-page="<?php echo sunset_check_pagedAuthor(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" data-author="<?php echo get_query_var('author'); ?>">
              <span>Daha Fazla İçerik Yükle</span>
            </div>
          </div>
          <div class="userPostsTabContent">
            <div class="lastNews">
              <?php
              $args = array(
               'posts_per_page' => 25,
                'post_type' => 'post',
                'post_status' => 'publish',
                'category__not_in' => $appCatIDs,
                'meta_query' => array (
                array (
                  'key' => '_user_liked',
                  'value' => get_query_var('author'),
                  'compare' => 'LIKE'
                )
                ) );
              $like_query = new WP_Query( $args );
              if ( $like_query->have_posts() ) :
              while ( $like_query->have_posts() ) : $like_query->the_post();
              $current_id = get_the_ID();
              $category_ids = kategori_listele($current_id);
               ?>

               <?php echo '<div class="item" data-page="/' . sunset_check_pagedAuthor() . '">'; ?>
                 <div class="thumb"><a href="<?php the_permalink()?>"><?php the_post_thumbnail( 'icerik_image', array( 'alt' => get_the_title() ) );  ?></a></div>
               <div class="content-summary">
                 <div class="title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></div>
                 <div class="summary"><?=get_snippet(strip_tags(get_the_excerpt($current_id)), 30)?></div>
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
            <span class="noF">Yazara ait favorilere eklenmiş hiç içerik bulunamadı!</span>
            <?php endif; wp_reset_postdata(); ?>

            </div>

          </div>
          <div class="userPostsTabContent">
            <div class="authorListing" style="">
              <div class="members follower_area">
                <ul>
									<?php foreach($follower as $key=>$data):
									$user = get_userdata($data->user_id);
									?>
									<li><a href="<?php echo get_author_posts_url( $user->ID); ?>"><i class="avatar"><?php echo get_avatar( $user->user_email, '116' ); ?></i><span><?php echo the_author_meta( 'display_name', $user->ID ); ?></span></a></li>
									<?php if($key == 23): break; endif; // key == 0 normalde 11 olmasi gerekiyor.
                endforeach; if(empty($follower)){ echo '<span class="noF">Üyenin takip ettiği kimse yok!</span>'; } ?>
								</ul>

                <!-- Load More Button -->
                <div class="loadMoreButton_1">
                  <span class="bg follower_data" data-follower="24" onclick="getFollower(1)">Daha Fazla</span>
                </div>

              </div>
            </div>
          </div>
          <div class="userPostsTabContent">
            <div class="authorListing" style="">
              <div class="members follower_area">
                <ul>
                  <?php foreach($following as $key=>$data):
                  $user = get_userdata($data->follow_id);
                  ?>
                  <li><a href="<?php echo get_author_posts_url( $user->ID); ?>"><i class="avatar"><?php echo get_avatar( $user->user_email, '116' ); ?></i><span><?php echo the_author_meta( 'display_name', $user->ID ); ?></span></a></li>
                  <?php if($key == 23): break; endif; // key == 0 normalde 11 olmasi gerekiyor.
                   endforeach; if(empty($following)){ echo '<span class="noF">Üyenin takip ettiği kimse yok!</span>'; } ?>
                </ul>

                <!-- Load More Button -->
                <div class="loadMoreButton_1">
                  <span class="bg follower_data" data-follower="24" onclick="getFollower(1)">Daha Fazla</span>
                </div>

              </div>
            </div>
          </div>
          </div>
        </div>
        <!-- #Widget -->
        <div class="clear"></div>





      </div>

<?php if(!wp_is_mobile()){
  ?>
  <div class="sidebar floatRight" style="margin-top: 6px;">
    <?php dynamic_sidebar("Sidebar (Yazar)"); ?>
  </div>
  <?php
}?>

    </div>
  </section>
  <!-- Content -->
  <div class="clear"></div>

</div>
<!-- #Site Wrapper -->
<script>
jQuery(document).ready( function($){
	$(document).on('click','.loadMoreAuthor', function(){

		var thatauthor = $(this);
		var pageauthor = $(this).data('page');
		var newPageauthor = pageauthor+1;
		var ajaxurlauthor = thatauthor.data('url');
		var prevauthor = thatauthor.data('prev');
		var author = $(this).data('author');

		if( typeof prevauthor === 'undefined' ){
			prevauthor = 0;
		}

		thatauthor.find('span').html("Yükleniyor");

		$.ajax({

			url : ajaxurlauthor,
			type : 'post',
			data : {

				page : pageauthor,
				author : author,
				prev : prevauthor,
				action: 'sunset_load_moreAuthor'

			},
			error : function( response ){
				console.log(response);
			},
			success : function( response ){

				if( response == 0 ){
					thatauthor.find('span').html("Maalesef başka içerik bulunamadı :(");
				} else {

					setTimeout(function(){

						if( prevauthor == 1 ){
							$('.authorNews').prepend( response );
							newPageauthor = pageauthor-1;
						} else {
							$('.authorNews').append( response );
						}

						if( newPageauthor == 1 ){

							thatauthor.slideUp(320);

						} else {
							thatauthor.data('page', newPageauthor);
							thatauthor.find('span').html("Daha Fazla İçerik Yükle");
						}

						revealPosts();

					}, 1000);

				}


			}

		});

	});

});

  function girisYap(){
    $(".subscribe").addClass("loginError");
  }

  function subscribe(id){
  $(".follow_loading").show();
  	$.get( "<?php bloginfo("template_directory")?>/api.php?_="+$.now()+"&type=follow&id="+id, function( data ) {
    		$(".subscribe").html("Takipten Çık");
    		$(".subscribe").attr("onclick","unfollow(<?=$passthis_id?>)");
    		var current = parseInt($(".follower_count").html())+1;
    		$(".follower_count").html(current);
    		$(".follow_loading").hide();
  	});
  }

  function unfollow(id){
  $(".follow_loading").show();
  	$.get( "<?php bloginfo("template_directory")?>/api.php?_="+$.now()+"&type=unfollow&id="+id, function( data ) {
    		$(".subscribe").html("Takip Et");
    		$(".subscribe").attr("onclick","subscribe(<?=$passthis_id?>)");
    		var current = parseInt($(".follower_count").html())-1;
    		$(".follower_count").html(current);
    		$(".follow_loading").hide();
  	});
  }

  function getFollower(id)
  {
  	var count = $(".follower_data").data("follower");
  	$.get( "<?php bloginfo("template_directory")?>/api.php?_="+$.now()+"&type=get_follower&count="+count+"&user="+id, function( data ) {
    		$(".follower_area ul").append(data);
    		var new_count = count+12;
    		$(".follower_data").data("follower", new_count);

    		if(data == ""){
    			$(".follower_data").html("Daha fazla bulunamadı!");
    		}
  	});
  }

  function getFollowing(id)
  {
  	var count = $(".following_data").data("following");
  	$.get( "<?php bloginfo("template_directory")?>/api.php?_="+$.now()+"&type=get_following&count="+count+"&user="+id, function( data ) {
    		$(".following_area ul").append(data);

    		var new_count = count+12;
    		$(".following_data").data("following", new_count);

    		if(data == ""){
    			$(".following_data").html("Daha fazla bulunamadı!");
    		}
  	});
  }
</script>
<?php get_footer(); ?>
