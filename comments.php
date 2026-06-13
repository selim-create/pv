      <?php if ( comments_open() ) : ?>



<?php



if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

die ('Lütfen bu sayfaya doğrudan yükleme yapmayınız, teşekkürler.');

if (post_password_required()) { ?>



<p class="nocomments">Bu yazı parola korumalıdır, yorumları görebilmek için parolayı girin.</p>

<?php return; } ?>

<!-- Düzenlemeye buradan başlayabilirsiniz. -->



  <?php cancel_comment_reply_link();  ?>

  <?php comment_form_title( '', '<div class="cevaplaTitle"> Şuanda %s adlı kişinin yorumuna cevap yazıyorsunuz.</div>



  <script type="text/javascript">

  setTimeout("Redirect()","1000");

  function Redirect()

  {

    $("html, body").animate({

        scrollTop: $(".commentWhite").offset().top

    }, 1000);

    return false;



  }

</script>





  '); ?>


      <!-- Comment White -->
							<div class="commentWhite">

  								<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>

								<p>Yorum yapabilmek için <a href="<?php echo wp_login_url( get_permalink() ); ?>">giriş</a> yapmalısınız.</p>

								<?php else : ?>

								<!-- Form -->

								<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form-wrapper">

								<?php if ( is_user_logged_in() ) : ?>

								<br>

								<div class="comment-system-text" style="color: black; font-size: 12px;"><?php echo $user_identity; ?> olarak yorum yapıyorsunuz.</div>												

									<div class="commentForm">
										<ul>
											<li class="one">
												<textarea required placeholder="Yorumunuz..." name="comment"></textarea>
                                                <input type="submit" class="submit" value="Yorumu Gönder">
                                                <?php do_action( 'anr_captcha_form_field' ); ?>
												<?php comment_id_fields(); ?>
												<?php do_action('comment_form', $post->ID); ?>
											</li>
										</ul>
									</div>

								<?php else : ?>

									<div class="commentForm">
										<ul>
											<li class="half floatLeft"><input type="text" class="defaultInput" required placeholder="Adınız" name="author"></li>
											<li class="half floatRight"><input type="email" name="email" required class="defaultInput" placeholder="Email Adresiniz"></li>
											<li class="one">
												<textarea placeholder="Yorumunuz..." required name="comment"></textarea>

                                                <input type="submit" class="submit" value="Yorumu Gönder">
                                                <?php do_action( 'anr_captcha_form_field' ); ?>
												<?php comment_id_fields(); ?>
												<?php do_action('comment_form', $post->ID); ?>
											</li>
										</ul>
									</div>

								<?php endif; ?>

								</form>

								<?php endif; ?>
			<?php if ( have_comments() ) : ?>

								<?php $comments  = array_reverse($comments); ?>

								<!-- Comment Listing -->

								<div class="commentListing">



		<?php wp_list_comments( array(

			'avatar_size' => 100,

			'style'       => 'li',

			'type'       => 'all',

			'callback'       => 'sinyor_comment',

			'short_ping'  => true,

		) ); ?>



								</div>

								<?php else : ?>

								<?php endif; ?>





<?php if ( comments_open() ) : ?>

<?php endif; ?>

<?php else : ?>

<p class="nocomments">Bu yazı yorumlara kapatılmıştır.</p>

<?php endif; ?>

</div>