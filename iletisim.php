<?php
/*
	Template Name: İletişim
*/
?>
<?php get_header();
global $bp_options;
?>

<style>
.blackShape {display:none;}
.site-wrapper {padding:0;top:220px!important;box-shadow:none;background:none;}
.contactPage:before {display:none;}
footer.footer.iletisim {top:295px;position:relative;}
.contactPageBottom .infos ul li h2:after{background-color: #333333; }
</style>
<!-- Site Wrapper -->
	<div class="site-wrapper contact">
		<!-- Breadcrumb -->
		<div class="breadcrumb block">
			<div class="container">
				<ul class="block">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Anasayfa<i>/</i></a></li>
					<li class="post bg"><span><?php the_title(); ?></span></li>
				</ul>
			</div>
		</div>

		<!-- Content -->
		<div class="contactPage">
			<div class="container">

				<div class="contactBox">
					<div class="left">
<h1>BİZE</h1>
<h1>ULAŞIN</h1>
<p>Düşünceleriniz bizim çok değerli. Formu doldurarak bize her konuda her zaman ulaşabilirsiniz. </p>
</div>
<div class="right"><div role="form" class="wpcf7" id="wpcf7-f493-p490-o1" dir="ltr" lang="tr-TR">
<div class="screen-reader-response"></div>
<form action="javascript:;" method="post" class="wpcf7-form" novalidate="novalidate">
<div style="display: none;">
</div>
<ul>
<li><span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required text name" aria-required="true" aria-invalid="false" placeholder="Ad-Soyad" required></span></li>
<p style="color: red;" class="name_error"></p>
<li><span class="wpcf7-form-control-wrap your-email"><input type="text" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required text email" aria-required="true" aria-invalid="false" placeholder="E-mail Adresiniz" required></span></li>
<p style="color: red;" class="email_error"></p>
<li>
<span class="wpcf7-form-control-wrap selectmessage"><select name="selectmessage" class="wpcf7-form-control wpcf7-select subject" aria-invalid="false" required>
	<option selected disabled>Mesaj Konusu</option>
	<option value="Reklam">Reklam</option><option value="Tanıtım Yazısı">Tanıtım Yazısı</option><option value="Editörlük">Editörlük</option></select></span>
</li>
<p style="color: red;" class="subject_error"></p>
<li><span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea message" aria-invalid="false" placeholder="Mesajınız" required></textarea></span></li>
<p style="color: red;" class="message_error"></p>
<li>
<input type="submit" onclick="iletisim()" value="Mesajı Gönder" class="wpcf7-form-control wpcf7-submit submit bg">

</li>
</ul>
<div class="bf-response wpcf7-display-none"></div>
</form>
</div></div>
				</div>

			</div>
		</div>
		<!-- Content -->

		<div class="contactPageBottom">
			<div class="infos">
				<ul>
					<li>
						<p></p>
						<span><strong><?php echo $bp_options['altBilgiAciklama1']; ?></strong></span>
						<a href="https://hipmedya.com">www.hipmedya.com</a>
						<a href="tel:908504501105">0850 450 11 05</a>
						<a href="mailto:iletisim@hipmedya.com">iletisim@hipmedya.com</a>


					</li>
				
					<li>
						<p></p>
						<span>REKLAM</span>
						<a href="mailto:iletisim@hipmedya.com">iletisim@hipmedya.com</a>
						<span>HABER</span>
						<a href="mailto:iletisim@hipmedya.com">iletisim@hipmedya.com</a>
					</li>
				</ul>
			</div>
		</div>

	</div>
	<!-- #Site Wrapper -->
	<div class="clear"></div>
	<script>
	function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
	}

	function iletisim()
	{

		var name = $(".name").val();
		var email = $(".email").val();
		var subject = $(".subject").val();
		var message = $(".message").val();

		if(name.length < 1){
			$(".name_error").html("Bu alan zorunludur");
		}else if(email.length < 1){
			$(".email_error").html("Bu alan zorunludur");
		}else if(subject.length < 1){
			$(".subject_error").html("Bu alan zorunludur");
		}else if(message.length < 1){
			$(".message_error").html("Bu alan zorunludur");
		}else if(!validateEmail(email)){
			$(".email_error").html("Lütfen geçerli bir email adresi giriniz");
		}else{
			$(".wpcf7-submit").val("Gönderiliyor...");
			$.post( "<?=admin_url('admin-ajax.php')?>", { action: "iletisim", name: name, email: email, subject: subject, message: message })
	  		.done(function( data ) {
	    		if(data == "Ok")
					{
						$(".wpcf7-submit").val("Gönderildi");
					}else if(data == "flood"){
	    		    alert("Üst üste mesaj gönderemezsiniz.");
                }
	  		});
		}


	}


	function addIletisimFooter(){
		jQuery("footer.footer").addClass("iletisim");
	}

	addIletisimFooter();

	</script>





<?php get_footer(); ?>
