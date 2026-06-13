<?php global $currency_data, $bp_options, $coin_data, $altin_data, $parite_data; ?>
<!-- Footer -->


<!-- Sticky Ad -->
<div class="ad-sticky ad-sticky--bottom" id="mobileSticky">
  <button class="ad-sticky__close" aria-label="Reklamı kapat" onclick="closeSticky()">×</button>
  <div class="ad-sticky__slot">
      <div class="adbox" id="div-gpt-320x50-sticky" title="/273585429/PiyasaVizyon.com/piyasavizyon_320x50_mobilesticky"></div>
 <div id="div-gpt-ad-320x50"></div>
  </div>
</div>

<script>
  function activateSticky() {
    document.body.classList.add('has-sticky-ad');
  }
  function closeSticky() {
    const el = document.getElementById('mobileSticky');
    if (el) el.style.display = 'none';
    document.body.classList.remove('has-sticky-ad');
  }

  // Reklam çağrısı sonrası aktif et (tag yüklenince):
  window.addEventListener('load', activateSticky);
</script>


<footer class="footer <?php if ( get_page_template_slug() == "iletisim.php" ) {
	echo 'iletisim';
} ?>">
    <div class="footerTop">
        <div class="container">
			<?= $bp_options['footerP'] ?>
        </div>
    </div>
  <div class="container">

        <!-- Content Footer -->
        <div class="contentFooter">
            <div class="footerMenu">
                <?php if ( is_active_sidebar( 'piyasavizyon_footer1_widget' ) ) : ?>
			    <?php dynamic_sidebar( 'piyasavizyon_footer1_widget' ); ?>
			    <?php endif; ?>
            </div>

            <div class="footerMenu">
               <?php if ( is_active_sidebar( 'piyasavizyon_footer2_widget' ) ) : ?>
			    <?php dynamic_sidebar( 'piyasavizyon_footer2_widget' ); ?>
			    <?php endif; ?>
            </div>
            <div class="footerMenu">
               <?php if ( is_active_sidebar( 'piyasavizyon_footer3_widget' ) ) : ?>
			    <?php dynamic_sidebar( 'piyasavizyon_footer3_widget' ); ?>
			    <?php endif; ?>
            </div>
            <div class="footerMenu">
                <?php if ( is_active_sidebar( 'piyasavizyon_footer4_widget' ) ) : ?>
			    <?php dynamic_sidebar( 'piyasavizyon_footer4_widget' ); ?>
			    <?php endif; ?>
            </div>
            <div class="footerMenu">
                <?php if ( is_active_sidebar( 'piyasavizyon_footer5_widget' ) ) : ?>
			    <?php dynamic_sidebar( 'piyasavizyon_footer5_widget' ); ?>
			    <?php endif; ?>
            </div>
			<div class="footerMenu"> 
			    <?php if ( is_active_sidebar( 'piyasavizyon_footer6_widget' ) ) : ?>
			    <?php dynamic_sidebar( 'piyasavizyon_footer6_widget' ); ?>
			    <?php endif; ?>
			</div>
        </div>
		
		<?php if ( is_active_sidebar( 'piyasavizyon_footer_widget' ) ) : ?>
			<?php dynamic_sidebar( 'piyasavizyon_footer_widget' ); ?>
			<?php endif; ?>
    </div>
	
	  <div class="clear"></div>
    <div class="footerBottom <?php if ($bp_options['kriptoSlider'] == true && !wp_is_mobile()) { ?> kayanAcik<?php } ?>">
        <div class="container">
            <div class="copyright">
                <?php if ( is_active_sidebar( 'piyasavizyon_copyright_widget' ) ) : ?>
			    <?php dynamic_sidebar( 'piyasavizyon_copyright_widget' ); ?>
			    <?php endif; ?>
            </div>
            <?php if (!wp_is_mobile()) : ?>
                <ul class="footerSocial">
                    <?php if ($bp_options['fFacebook'] == true) : ?><li><a href="<?php echo $bp_options['fFacebookURL']; ?>" target="_blank" rel="nofollow"><i class="facebook"></i></a></li><?php endif; ?>
                    <?php if ($bp_options['fTwitter'] == true) : ?><li><a href="<?php echo $bp_options['fTwitterURL']; ?>" target="_blank" rel="nofollow"><i class="twitter"></i></a></li><?php endif; ?>
                    <?php if ($bp_options['fGPlus'] == true) : ?><li><a href="<?php echo $bp_options['fGPlusURL']; ?>" target="_blank" rel="nofollow"><i class="google-plus"></i></a></li><?php endif; ?>
                    <?php if ($bp_options['fInstagram'] == true) : ?><li><a href="<?php echo $bp_options['fInstagramURL']; ?>" target="_blank" rel="nofollow"><i class="instagram"></i></a></li><?php endif; ?>
                    <?php if ($bp_options['fPinterest'] == true) : ?><li><a href="<?php echo $bp_options['fPinterestURL']; ?>" target="_blank" rel="nofollow"><i class="pinterest"></i></a></li><?php endif; ?>
                    <?php if ($bp_options['fYoutube'] == true) : ?><li><a href="<?php echo $bp_options['fYoutubeURL']; ?>" target="_blank" rel="nofollow"><i class="youtube"></i></a></li><?php endif; ?>
                    <?php if ($bp_options['fDribbble'] == true) : ?><li><a href="<?php echo $bp_options['fDribbbleURL']; ?>" target="_blank" rel="nofollow"><i class="dribbble"></i></a></li><?php endif; ?>
                    <?php if ($bp_options['fTelegram'] == true) : ?><li><a href="<?php echo $bp_options['fTelegramURL']; ?>" target="_blank" rel="nofollow"><i class="telegram"></i></a></li><?php endif; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>

</footer>
<!-- #Footer -->

</div>
<!-- #Site -->

<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/vendors/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/vendors/owl-carousel/owl.carousel2.thumbs.min.js" type="text/javascript"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/vendors/scrollbar/jquery.mCustomScrollbar.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/theme.js"></script>
<script type="text/javascript">
    $(window).scroll(function () {
        if ($("div").hasClass("site-wrapper") && $(window).scrollTop() > $(".site-wrapper").offset().top - 20) {
            const holderHeight = $('.currencyBar').height() + $('header').height();
            const holderI = holderHeight + 20;
            $(".site-wrapper .lholder").css(
                {
                    "position": "fixed",
                    "top": holderI + "px"
                }
            );
        } else {
            $(".lholder").css(
                {
                    "position": "absolute",
                    "top": "0px"
                }
            );
        }
        if ($("div").hasClass("lcont") && ($(window).scrollTop() + holderI) > $("footer").offset().top - 100) {
            $(".lholder").hide();
        } else {
            $(".lholder").show();
        }
    });
	
	<?php if (wp_is_mobile()) : ?>
    jQuery(function ($) {
        $("header .mainBar .right i.search").click(function () {
            $(".mobile-search").toggleClass("show");
        });
    });
	<?php endif; ?>

    function exchange_currency() {
        var buying_currency = {
			<?php foreach (array_unique( $currency_data['buying'] ) as $key => $value) : ?> <?= $key ?>: <?= str_replace( ",", ".", $value ) ?>,
			<?php endforeach; ?>
        }
        var selling_currency = {
			<?php foreach (array_unique( $currency_data['selling'] ) as $key => $value) : ?> <?= $key ?>: <?= str_replace( ",", ".", $value ) ?>,
			<?php endforeach; ?>
        }

        var miktar = parseInt($(".miktar_exchange").val());
        var alis = $(".exchange_alis").prop('checked');
        var satis = $(".exchange_satis").prop('checked');
        var para_birimi = $(".para_birimi").val();
        var cevirilecek_birim = $(".cevirilecek_birim").val();

        if (alis == true) {

            if (para_birimi != 'try' && cevirilecek_birim != 'try') {
                var try_to_new_para_birimi = buying_currency[para_birimi];
                var try_to_new_cevirilecek_birim = buying_currency[cevirilecek_birim];

                var carpilicak_miktar = try_to_new_para_birimi / try_to_new_cevirilecek_birim;

                var price_status = (carpilicak_miktar * miktar).toFixed(2);
                $(".result").html(price_status.replace(".", ","));
            } else if (cevirilecek_birim != 'try' && para_birimi == 'try') {
                var price_status = (miktar / buying_currency[cevirilecek_birim]).toFixed(2);
                $(".result").html(price_status.replace(".", ","));
            } else {
                var price_status = (buying_currency[para_birimi] * miktar).toFixed(2);
                $(".result").html(price_status.replace(".", ","));
            }

            if (isNaN(price_status)) {
                $(".result").html("0,00");
            }

        } else if (satis == true) {
            if (para_birimi != 'try' && cevirilecek_birim != 'try') {
                var try_to_new_para_birimi = selling_currency[para_birimi];
                var try_to_new_cevirilecek_birim = selling_currency[cevirilecek_birim];

                var carpilicak_miktar = try_to_new_para_birimi / try_to_new_cevirilecek_birim;

                var price_status = (carpilicak_miktar * miktar).toFixed(2);
                $(".result").html(price_status.replace(".", ","));
            } else if (cevirilecek_birim != 'try' && para_birimi == 'try') {
                var price_status = (miktar / selling_currency[cevirilecek_birim]).toFixed(2);
                $(".result").html(price_status.replace(".", ","));
            } else {
                var price_status = (selling_currency[para_birimi] * miktar).toFixed(2);
                $(".result").html(price_status.replace(".", ","));
            }

            if (isNaN(price_status)) {
                $(".result").html("0,00");
            }
        }

    }

    $(document).ready(function () {
        $('.miktar_exchange').val('1');
        exchange_currency();

        $('.altin_exchange').val('1');
        exchange_altin();

        $('.kripto_exchange').val('1');
        exchange_kripto();
    });

    $(".exchange_func_trigger").change(function () {
        exchange_currency();
    });

    $(".miktar_exchange").keyup(function () {
        exchange_currency();
    });

    $(".exchange_kripto_func").change(function () {
        exchange_kripto();
    });

    $(".kripto_exchange").keyup(function () {
        exchange_kripto();
    });

    $(".exchange_altin_func").change(function () {
        exchange_altin();
    });

    $(".altin_exchange").keyup(function () {
        exchange_altin();
    });

    $(".exchange_foreks_func").change(function () {
        exchange_foreks();
    });

    $(".foreks_exchange").keyup(function () {
        exchange_foreks();
    });


    function exchange_kripto() {
        var currency = {
			<?php foreach (array_unique( $coin_data['current_price'] ) as $key => $value) : ?>
			<?= preg_replace( '/\d+/', '', str_replace( [ ",", "-" ], [ ".", "_" ], $key ) ) ?>: <?= str_replace( [ ",", "-", "E_" ], [ ".", "_", "" ], $value ) ?>,
			<?php endforeach; ?>
        }

        var miktar = parseFloat($(".kripto_exchange").val());
        var para_birimi = $(".para_birimi_k").val();
        var cevirilecek_birim = $(".cevirilecek_birim_k").val();


        var price_status = (currency[para_birimi] * miktar).toFixed(2);
        $(".resultKripto").html(price_status.replace(".", ","));

        if (isNaN(price_status)) {
            $(".resultKripto").html("0,00");
        }


    }

    function exchange_altin() {

        var currency = {
			<?php foreach (array_unique( $altin_data['altin_price'] ) as $key => $value) : ?>
			<?= str_replace( [ "-", "1", "2", "3", "4", "5", "6", "7", "8", "9" ], [ "_", "", "", "", "", "", "", "", "", "" ], $key ) ?>: <?= str_replace( ",", ".",
				str_replace( [ "", "." ], [ "", "" ], $value ) ) ?>,
			<?php endforeach; ?>
        }

        var miktar = parseFloat($(".altin_exchange").val());
        var para_birimi = $(".para_birimi_a").val();


        var price_status = (currency[para_birimi] * miktar).toFixed(2);
        $(".resultAltin").html(price_status.replace(".", ","));

        if (isNaN(price_status)) {
            $(".resultAltin").html("0,00");
        }


    }

    function exchange_foreks() {
		<?php $max_count = count( array_unique( $parite_data['buying'] ) ) - 1;
		$i = 0; ?>
        var currency = {
			<?php foreach (array_unique( $parite_data['buying'] ) as $key => $value) :  ?>
			<?= str_replace( "-", "_", $key ) ?>: <?= explode( ".", str_replace( ",", ".", $value ) )[0] ?>.<?= explode( ".",
				str_replace( ",", ".", $value ) )[1] ?> <?php if ($max_count != $i) : ?>,
			<?php endif;
			$i = $i + 1;
			endforeach; ?>
        }

        var miktar = parseFloat($(".foreks_exchange").val());
        var para_birimi = $(".parite_a").val();
        var margin = $(".marjin_a").val();

        var price_status = (((currency[para_birimi] * miktar) * 10000) / margin).toFixed(2);
        $(".resultForeks").html(price_status + " USD");

        if (isNaN(price_status)) {
            $(".resultForeks").html("0,00 USD");
        }
    }


    $(".miktar_exchange").click(function () {
        $(".miktar_exchange").attr("placeholder", "");
    });

    $(".altin_exchange").click(function () {
        $(".altin_exchange").attr("placeholder", "");
    });

    $(".kripto_exchange").click(function () {
        $(".kripto_exchange").attr("placeholder", "");
    });

    $(".foreks_exchange").click(function () {
        $(".foreks_exchange").attr("placeholder", "");
    });
</script>


<script type="text/javascript">
    /*
	Vert Slider
*/

    $('.vertSlider .vertSlides').owlCarousel({
        autoplay: true,
        loop: true,
        //autoWidth:true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 450,
        lazyLoad: true,
        nav: false,
        items: 1
    });
    /*
    	Headline (DSlider)
    */

    $('section.headline #headlineSlider').owlCarousel({
        autoplay: true,
        loop: true,
        autoWidth: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 450,
        lazyLoad: true,
        nav: true,
    });
</script>
<script>
    /*
	Tab (Content Calculator Tab)
*/
    $(document).ready(function () {
        $(".calculatorContent").hide();
        $(".calculatorContent:first").show();
        $(".creditCalculatorHead ul li:first").addClass("active");
        $(".creditCalculatorHead ul li").click(function () {
            $(".creditCalculatorHead ul li").removeClass("active");
            $(this).addClass("active");
            $(".calculatorContent").hide();
            var tab = $(this).index();
            $(".calculatorContent:eq(" + tab + ")").fadeIn();
            return false;
        });
    });

    /*
    	Tab (Content Category Tab)
    */
    $(document).ready(function () {
        $("section.content .widebar .widget .categoryTab .catTabContent").hide();
        $("section.content .widebar .widget .categoryTab .catTabContent:first").show();
        $("section.content .widebar .widget .categoryTab .tabHead ul li:first").addClass("active");
        $("section.content .widebar .widget .categoryTab .tabHead ul li").click(function () {
            $("section.content .widebar .widget .categoryTab .tabHead ul li").removeClass("active");
            $(this).addClass("active");
            $("section.content .widebar .widget .categoryTab .catTabContent").hide();
            var tab = $(this).index();
            $("section.content .widebar .widget .categoryTab .catTabContent:eq(" + tab + ")").fadeIn();
            return false;
        });
    });

    $(document).ready(function () {
        $("section.content .widebar .widget .userPostsTabContent").hide();
        $("section.content .widebar .widget .userPostsTabContent:first").show();
        $("section.content .widebar .widget .userPostsTabHead ul li:first").addClass("active");
        $("section.content .widebar .widget .userPostsTabHead ul li").click(function () {
            $("section.content .widebar .widget .userPostsTabHead ul li").removeClass("active");
            $(this).addClass("active");
            $("section.content .widebar .widget .userPostsTabContent").hide();
            var tab = $(this).index();
            $("section.content .widebar .widget .userPostsTabContent:eq(" + tab + ")").fadeIn();
            return false;
        });
    });


    $(document).ready(function () {
        var currencyName = $('#currencySelect1').find(":selected").text();
        $("#currencySelect1").change(function () {
            var currencyName = $('#currencySelect1').find(":selected").text();
            $("#currencyBox1").attr("placeholder", currencyName)
        });
        $("#currencyBox1").attr("placeholder", currencyName)

        var currencyName2 = $('#currencySelect2').find(":selected").text();
        $("#currencySelect2").change(function () {
            var currencyName2 = $('#currencySelect2').find(":selected").text();
            $("#currencyBox2").attr("placeholder", currencyName2)
        });
        $("#currencyBox2").attr("placeholder", currencyName2)
    })
</script>

<script>
    $(document).ready(function () {
        var currencyName = $('#currencySelect1').find(":selected").text();
        $("#currencySelect1").change(function () {
            var currencyName = $('#currencySelect1').find(":selected").text();
            $("#currencyBox1").attr("placeholder", currencyName)
        });
        $("#currencyBox1").attr("placeholder", currencyName)

        var currencyName2 = $('#currencySelect2').find(":selected").text();
        $("#currencySelect2").change(function () {
            var currencyName2 = $('#currencySelect2').find(":selected").text();
            $("#currencyBox2").attr("placeholder", currencyName2)
        });
        $("#currencyBox2").attr("placeholder", currencyName2)
    })

    $(document).ready(function () {
        $(".dropCustomCurrency").click(function (e) {
            e.stopPropagation();
            $(this).next(".changeCurrency").slideToggle();
        })
    })

    $(document).ready(function () {
        $(".changeCurrencySource span").click(function (e) {
            e.stopPropagation();
            $(this).next(".changeCurrency").slideToggle();
        })
        $(document).click(function () {
            $(".changeCurrency").slideUp();
        })
    })
    /*
    	Tab (Borsa Timer Tab 1)
    */
    $(document).ready(function () {
        $("section.content .widebar .widget .categoryTab .borsaTimerTabContent1").hide();
        $("section.content .widebar .widget .categoryTab .borsaTimerTabContent1:first").show();
        $("section.content .widebar .widget .categoryTab .borsaTimerTabHead1 ul li:first").addClass("active");
        $("section.content .widebar .widget .categoryTab .borsaTimerTabHead1 ul li").click(function () {
            $("section.content .widebar .widget .categoryTab .borsaTimerTabHead1 ul li").removeClass("active");
            $(this).addClass("active");
            $("section.content .widebar .widget .categoryTab .borsaTimerTabContent1").hide();
            var tab = $(this).index();
            $("section.content .widebar .widget .categoryTab .borsaTimerTabContent1:eq(" + tab + ")").fadeIn();
            return false;
        });
    });

    /*
    	Tab (Borsa Timer Tab 2)
    */
    $(document).ready(function () {
        $("section.content .widebar .widget .categoryTab .borsaTimerTabContent2").hide();
        $("section.content .widebar .widget .categoryTab .borsaTimerTabContent2:first").show();
        $("section.content .widebar .widget .categoryTab .borsaTimerTabHead2 ul li:first").addClass("active");
        $("section.content .widebar .widget .categoryTab .borsaTimerTabHead2 ul li").click(function () {
            $("section.content .widebar .widget .categoryTab .borsaTimerTabHead2 ul li").removeClass("active");
            $(this).addClass("active");
            $("section.content .widebar .widget .categoryTab .borsaTimerTabContent2").hide();
            var tab = $(this).index();
            $("section.content .widebar .widget .categoryTab .borsaTimerTabContent2:eq(" + tab + ")").fadeIn();
            return false;
        });
    });

    /*
    	Tab (Borsa Timer Tab 2)
    */
    $(document).ready(function () {
        $("section.content .widebar .widget .categoryTab .borsaTimerTabContent3").hide();
        $("section.content .widebar .widget .categoryTab .borsaTimerTabContent3:first").show();
        $("section.content .widebar .widget .categoryTab .borsaTimerTabHead3 ul li:first").addClass("active");
        $("section.content .widebar .widget .categoryTab .borsaTimerTabHead3 ul li").click(function () {
            $("section.content .widebar .widget .categoryTab .borsaTimerTabHead3 ul li").removeClass("active");
            $(this).addClass("active");
            $("section.content .widebar .widget .categoryTab .borsaTimerTabContent3").hide();
            var tab = $(this).index();
            $("section.content .widebar .widget .categoryTab .borsaTimerTabContent3:eq(" + tab + ")").fadeIn();
            return false;
        });
    });


    $(document).ready(function () {
        var currencyName = $('#currencySelect1').find(":selected").text();
        $("#currencySelect1").change(function () {
            var currencyName = $('#currencySelect1').find(":selected").text();
            $("#currencyBox1").attr("placeholder", currencyName)
        });
        $("#currencyBox1").attr("placeholder", currencyName)

        var currencyName2 = $('#currencySelect2').find(":selected").text();
        $("#currencySelect2").change(function () {
            var currencyName2 = $('#currencySelect2').find(":selected").text();
            $("#currencyBox2").attr("placeholder", currencyName2)
        });
        $("#currencyBox2").attr("placeholder", currencyName2)
    })
    /* Main slider */

    $('#main-slider').owlCarousel({
        autoplay: true,
        loop: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 450,
        lazyLoad: true,
        nav: true,
        items: 1
    });
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            autoplay: true,
            loop: true,
            nav: true,
            items: 1,
            thumbs: true,
            thumbImage: true,
            thumbContainerClass: 'owl-thumbs',
            thumbItemClass: 'owl-thumb-item'
        });
    });
</script>

<script>
    $(document).ready(function () {

        $(".mobile-sidebar-menu").click(function () {
            $(this).next("ul").slideToggle();
        })


        $(".mobileMenu").click(function (e) {
            e.stopPropagation();
            $("body").toggleClass("menu-visible");
        });
        $(".menu-close").click(function () {
            $("body").toggleClass("menu-visible");
        });
        $("html").click(function () {
            if ($("body").hasClass("menu-visible")) {
                $("body").removeClass("menu-visible");
            } else {

            }
        });
        $(".mobile-menu").click(function (e) {
            e.stopPropagation();
        })
    })
</script>

<script>
    $(document).ready(function () {

        $(document).on('click', '.categoryLoadMore', function () {

            var that1 = $(this);
            var page1 = $(this).data('page');
            var newPage1 = page1 + 1;
            var ajaxurl1 = that1.data('url');
            var prev1 = that1.data('prev');
            var cat1 = $(this).data('category');

            if (typeof prev1 === 'undefined') {
                prev1 = 0;
            }

            that1.find('span').html("Yükleniyor");

            $.ajax({

                url: ajaxurl1,
                type: 'post',
                data: {

                    page: page1,
                    prev: prev1,
                    cat: cat1,
                    action: 'sunset_load_moreNews'

                },
                error: function (response) {
                    console.log(response);
                },
                success: function (response) {

                    if (response == 0) {

                        that1.find('span').html("Maalesef Başka İçerik Bulunamadı :(");

                    } else {

                        setTimeout(function () {

                            if (prev1 == 1) {
                                $('.lastNews').prepend(response);
                                newPage1 = page1 - 1;
                            } else {
                                $('.lastNews').append(response);
                            }

                            if (newPage1 == 1) {

                                that1.slideUp(320);

                            } else {

                                that1.data('page', newPage1);

                                that1.find('span').html("Daha Fazla İçerik Yükle");

                            }

                            revealPosts();

                        }, 1000);

                    }


                }

            });

        });

    });
</script>


<script>
    $(document).ready(function () {

        $(document).on('click', '.homeLoadMore', function () {

            var that1 = $(this);
            var page1 = $(this).data('page');
            var newPage1 = page1 + 1;
            var ajaxurl1 = that1.data('url');
            var prev1 = that1.data('prev');
            var cat1 = $(this).data('category');
            var count1 = $(this).data('count');

            if (typeof prev1 === 'undefined') {
                prev1 = 0;
            }

            that1.find('span').html("Yükleniyor");

            $.ajax({

                url: ajaxurl1,
                type: 'post',
                data: {

                    page: page1,
                    prev: prev1,
                    cat: cat1,
                    count: count1,
                    action: 'sunset_load_moreNews'

                },
                error: function (response) {
                    console.log(response);
                },
                success: function (response) {

                    if (response == 0) {

                        that1.find('span').html("Maalesef Başka İçerik Bulunamadı :(");

                    } else {

                        setTimeout(function () {

                            if (prev1 == 1) {
                                $('.lastNews').prepend(response);
                                newPage1 = page1 - 1;
                            } else {
                                $('.lastNews').append(response);
                            }

                            if (newPage1 == 1) {

                                that1.slideUp(320);

                            } else {

                                that1.data('page', newPage1);

                                that1.find('span').html("Daha Fazla İçerik Yükle");

                            }

                            revealPosts();

                        }, 1000);

                    }


                }

            });

        });

    });
</script>


<?php wp_footer(); ?>
<?php if ( $bp_options['anlikDegisimSwitcher'] == true ) { ?>
    <script>
        function getCoin(base) {
			<?php if (wp_is_mobile()) : else : ?>
            return true;
            $.get("https://api.coingecko.com/api/v3/simple/price?ids=" + base + "&vs_currencies=try", function (data) {
                if (data) {
                    var currency = $(".base_" + base).html().replace(",", ".");
                    var new_currency = data[base].try;
                    if (base == "bitcoin" || base == "bitcoin-cash") {
                        new_currency = (new_currency.toFixed(3)).toString() + (Math.floor(Math.random() * 5) + 1);
                    } else {
                        new_currency = (new_currency.toFixed(3)).toString() + "" + (Math.floor(Math.random() * 5) + 1) + (Math.floor(Math.random() * 5) + 1) + (Math.floor(Math.random() * 5) + 1);
                    }


                    if (currency < new_currency) {
                        var $el = $(".base_" + base),
                            x = 1000,
                            originalColor = $el.css("background");

                        $el.fadeIn("fast", function () {
                            var html_new_currency = new_currency.replace(".", ",");
                            $(".base_" + base).html(html_new_currency);
                            $el.css("background", "<?= $bp_options['borsa_cikis_arkaplan'] ?>");

                        });
                        setTimeout(function () {
                            $el.fadeIn("fast", function () {
                                $el.css("background", originalColor);
                            });

                        }, x);

                    } else if (currency > new_currency) {

                        var negative_currency = new_currency;
                        if (negative_currency != currency) {

                            var $el = $(".base_" + base),
                                x = 1000,
                                originalColor = $el.css("background");

                            $el.fadeIn("fast", function () {
                                var html_new_currency = new_currency.replace(".", ",");
                                $(".base_" + base).html(html_new_currency);

                                $el.css("background", "<?= $bp_options['borsa_inis_arkaplan'] ?>");
                            });
                            setTimeout(function () {
                                $el.fadeIn("fast", function () {
                                    $el.css("background", originalColor);
                                });

                            }, x);

                        }
                    }
                }
            });
			<?php endif; ?>
        }

        function getCrypto(base) {
            var currency = $(".base_" + base).html().replace(",", ".");
            currency = parseFloat(currency);
            var new_currency = currency;

            new_currency = (new_currency.toFixed(3)).toString() + (Math.floor(Math.random() * 5) + 1);

            if (currency < new_currency) {
                var $el = $(".base_" + base),
                    x = 1000,
                    originalColor = $el.css("background");

                $el.fadeIn("fast", function () {
                    var html_new_currency = new_currency.replace(".", ",");
                    $(".base_" + base).html(html_new_currency);
                    $el.css("background", "<?= $bp_options['borsa_cikis_arkaplan'] ?>");


                });
                setTimeout(function () {
                    $el.fadeIn("fast", function () {
                        $el.css("background", originalColor);
                    });

                }, x);

            } else if (currency > new_currency) {

                var negative_currency = new_currency;
                if (negative_currency != currency) {

                    var $el = $(".base_" + base),
                        x = 1000,
                        originalColor = $el.css("background");

                    $el.fadeIn("fast", function () {
                        var html_new_currency = new_currency.replace(".", ",");
                        $(".base_" + base).html(html_new_currency);

                        $el.css("background", "<?= $bp_options['borsa_inis_arkaplan'] ?>");

                    });
                    setTimeout(function () {
                        $el.fadeIn("fast", function () {
                            $el.css("background", originalColor);
                        });

                    }, x);

                }
            }
        }
		
		<?php
		$saat = date( "H" );
		$gun = date( "d" );
		//if(($gun == 1 || $gun == 2 || $gun == 3 || $gun == 4 || $gun == 5) && ($saat > 7 && $saat < 19 ))
		$bp_siralama = $bp_options['ustCoinSiralama'];
		$type = explode( "{}", $bp_siralama['ustSira1'] );
		if ($type[1] == "altin") {
		} else if ($type[1] == "doviz") {
		?>
        setInterval(function () {
            getCrypto("<?= strtoupper( $type[0] ) ?>");
        }, 2000);
		<?php
		} else if ($type[1] == "coin") {
		$type1 = permalink( $coin_data['name'][ $type[0] ] );
		?>
        setInterval(function () {
            getCoin("<?= ( $type1 ) ?>");
        }, 2000);
		<?php
		} elseif ( $type[1] == "bist" ) {
		}
		$type = explode( "{}", $bp_siralama['ustSira2'] );
		if ($type[1] == "altin") {
		} else if ($type[1] == "doviz") {
		?>
        setInterval(function () {
            getCrypto("<?= strtoupper( $type[0] ) ?>");
        }, 4000);
		<?php
		} else if ($type[1] == "coin") {
		$type1 = permalink( $coin_data['name'][ $type[0] ] );
		?>
        setInterval(function () {
            getCoin("<?= ( $type1 ) ?>");
        }, 4000);
		<?php
		} elseif ( $type[1] == "bist" ) {
		}
		
		$type = explode( "{}", $bp_siralama['ustSira3'] );
		if ($type[1] == "altin") {
		} else if ($type[1] == "doviz") {
		?>
        setInterval(function () {
            getCrypto("<?= strtoupper( $type[0] ) ?>");
        }, 6000);
		<?php
		} else if ($type[1] == "coin") {
		$type1 = permalink( $coin_data['name'][ $type[0] ] );
		?>
        setInterval(function () {
            getCoin("<?= ( $type1 ) ?>");
        }, 6000);
		<?php
		} elseif ( $type[1] == "bist" ) {
		}
		
		$type = explode( "{}", $bp_siralama['ustSira4'] );
		if ($type[1] == "altin") {
		} else if ($type[1] == "doviz") {
		?>
        setInterval(function () {
            getCrypto("<?= strtoupper( $type[0] ) ?>");
        }, 8000);
		<?php
		} else if ($type[1] == "coin") {
		$type1 = permalink( $coin_data['name'][ $type[0] ] );
		?>
        setInterval(function () {
            getCoin("<?= ( $type1 ) ?>");
        }, 8000);
		<?php
		} elseif ( $type[1] == "bist" ) {
		}
		
		$type = explode( "{}", $bp_siralama['ustSira5'] );
		if ($type[1] == "altin") {
		} else if ($type[1] == "doviz") {
		?>
        setInterval(function () {
            getCrypto("<?= strtoupper( $type[0] ) ?>");
        }, 10000);
		<?php
		} else if ($type[1] == "coin") {
		$type1 = permalink( $coin_data['name'][ $type[0] ] );
		?>
        setInterval(function () {
            getCoin("<?= ( $type1 ) ?>");
        }, 10000);
		<?php
		} elseif ( $type[1] == "bist" ) {
		}
		
		$type = explode( "{}", $bp_siralama['ustSira6'] );
		if ($type[1] == "altin") {
		} else if ($type[1] == "doviz") {
		?>
        setInterval(function () {
            getCrypto("<?= strtoupper( $type[0] ) ?>");
        }, 6000);
		<?php
		} else if ($type[1] == "coin") {
		$type1 = permalink( $coin_data['name'][ $type[0] ] );
		?>
        setInterval(function () {
            getCoin("<?= ( $type1 ) ?>");
        }, 6000);
		<?php
		} elseif ( $type[1] == "bist" ) {
		}
		
		$type = explode( "{}", $bp_siralama['ustSira7'] );
		if ($type[1] == "altin") {
		} else if ($type[1] == "doviz") {
		?>
        setInterval(function () {
            getCrypto("<?= strtoupper( $type[0] ) ?>");
        }, 9000);
		<?php
		} else if ($type[1] == "coin") {
		$type1 = permalink( $coin_data['name'][ $type[0] ] );
		
		?>
        setInterval(function () {
            getCoin("<?= ( $type1 ) ?>");
        }, 9000);
		<?php
		} elseif ( $type[1] == "bist" ) {
		}
		
		$type = explode( "{}", $bp_siralama['ustSira8'] );
		if ($type[1] == "altin") {
		} else if ($type[1] == "doviz") {
		?>
        setInterval(function () {
            getCrypto("<?= strtoupper( $type[0] ) ?>");
        }, 7000);
		<?php
		} else if ($type[1] == "coin") {
		$type1 = permalink( $coin_data['name'][ $type[0] ] );
		?>
        setInterval(function () {
            getCoin("<?= ( $type1 ) ?>");
        }, 7000);
		<?php
		} elseif ( $type[1] == "bist" ) {
		}
		?>
    </script>
<?php } ?>
<?php if ( $bp_options['kriptoSlider'] == true && ! wp_is_mobile() ) { ?>
    <div style="display:none" class="ccpw-container ccpw-ticker-cont ccpw-footer-ticker-fixedbar">
        <div class="tickercontainer" style="height: auto; overflow: hidden;">
            <ul data-tickerspeed="130000" id="ccpw-ticker-widget">
				<?php foreach ( array_unique( $coin_data['name'] ) as $key => $val ) :
					if ( str_replace( ",", ".", $coin_data['price_24h'][ $key ] ) > 0 ) {
						$crease_status = "up";
					} else {
						$crease_status = "down";
					}
					
					
					?>
                    <li id="">
                        <div class="coin-container">
                            <span class="ccpw_icon"><img src="<?= $coin_data['image'][ $key ] ?>" id="" alt="<?= $coin_data['name'][ $key ] ?>"></span>
                            <span class="name"><?= $coin_data['name'][ $key ] ?></span>
                            <span class="price"><?= $coin_data['current_price'][ $key ] ?> TL</span>
                            <span class="changes <?= $crease_status ?>">
                                <?= $coin_data['price_24h'][ $key ] ?>%</span>
                        </div>
                    </li>
					<?php if ( $key > 28 ) : break;
				endif;
				endforeach; ?>
            </ul>
        </div>
    </div>
    <style>
        
        .sr-only,
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0
        }

        .sr-only-focusable:active,
        .sr-only-focusable:focus {
            position: static;
            width: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            clip: auto
        }

        [role=button] {
            cursor: pointer
        }

        caption {
            padding-top: 8px;
            padding-bottom: 8px;
            color: #777
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px
        }

        .table > tbody > tr > td,
        .table > tbody > tr > th,
        .table > tfoot > tr > td,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > thead > tr > th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd
        }

        .table > thead > tr > th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd
        }

        .table > caption + thead > tr:first-child > td,
        .table > caption + thead > tr:first-child > th,
        .table > colgroup + thead > tr:first-child > td,
        .table > colgroup + thead > tr:first-child > th,
        .table > thead:first-child > tr:first-child > td,
        .table > thead:first-child > tr:first-child > th {
            border-top: 0
        }

        .table > tbody + tbody {
            border-top: 2px solid #ddd
        }

        .table .table {
            background-color: #fff
        }

        .table-condensed > tbody > tr > td,
        .table-condensed > tbody > tr > th,
        .table-condensed > tfoot > tr > td,
        .table-condensed > tfoot > tr > th,
        .table-condensed > thead > tr > td,
        .table-condensed > thead > tr > th {
            padding: 5px
        }

        .table-bordered,
        .table-bordered > tbody > tr > td,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > td,
        .table-bordered > tfoot > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > thead > tr > th {
            border: 1px solid #ddd
        }

        .table-bordered > thead > tr > td,
        .table-bordered > thead > tr > th {
            border-bottom-width: 2px
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #f9f9f9
        }

        .table-hover > tbody > tr:hover,
        .table > tbody > tr.active > td,
        .table > tbody > tr.active > th,
        .table > tbody > tr > td.active,
        .table > tbody > tr > th.active,
        .table > tfoot > tr.active > td,
        .table > tfoot > tr.active > th,
        .table > tfoot > tr > td.active,
        .table > tfoot > tr > th.active,
        .table > thead > tr.active > td,
        .table > thead > tr.active > th,
        .table > thead > tr > td.active,
        .table > thead > tr > th.active {
            background-color: #f5f5f5
        }

        table col[class*=col-] {
            position: static;
            float: none;
            display: table-column
        }

        table td[class*=col-],
        table th[class*=col-] {
            position: static;
            float: none;
            display: table-cell
        }

        .table-hover > tbody > tr.active:hover > td,
        .table-hover > tbody > tr.active:hover > th,
        .table-hover > tbody > tr:hover > .active,
        .table-hover > tbody > tr > td.active:hover,
        .table-hover > tbody > tr > th.active:hover {
            background-color: #e8e8e8
        }

        .table > tbody > tr.success > td,
        .table > tbody > tr.success > th,
        .table > tbody > tr > td.success,
        .table > tbody > tr > th.success,
        .table > tfoot > tr.success > td,
        .table > tfoot > tr.success > th,
        .table > tfoot > tr > td.success,
        .table > tfoot > tr > th.success,
        .table > thead > tr.success > td,
        .table > thead > tr.success > th,
        .table > thead > tr > td.success,
        .table > thead > tr > th.success {
            background-color: #dff0d8
        }

        .table-hover > tbody > tr.success:hover > td,
        .table-hover > tbody > tr.success:hover > th,
        .table-hover > tbody > tr:hover > .success,
        .table-hover > tbody > tr > td.success:hover,
        .table-hover > tbody > tr > th.success:hover {
            background-color: #d0e9c6
        }

        .table > tbody > tr.info > td,
        .table > tbody > tr.info > th,
        .table > tbody > tr > td.info,
        .table > tbody > tr > th.info,
        .table > tfoot > tr.info > td,
        .table > tfoot > tr.info > th,
        .table > tfoot > tr > td.info,
        .table > tfoot > tr > th.info,
        .table > thead > tr.info > td,
        .table > thead > tr.info > th,
        .table > thead > tr > td.info,
        .table > thead > tr > th.info {
            background-color: #d9edf7
        }

        .table-hover > tbody > tr.info:hover > td,
        .table-hover > tbody > tr.info:hover > th,
        .table-hover > tbody > tr:hover > .info,
        .table-hover > tbody > tr > td.info:hover,
        .table-hover > tbody > tr > th.info:hover {
            background-color: #c4e3f3
        }

        .table > tbody > tr.warning > td,
        .table > tbody > tr.warning > th,
        .table > tbody > tr > td.warning,
        .table > tbody > tr > th.warning,
        .table > tfoot > tr.warning > td,
        .table > tfoot > tr.warning > th,
        .table > tfoot > tr > td.warning,
        .table > tfoot > tr > th.warning,
        .table > thead > tr.warning > td,
        .table > thead > tr.warning > th,
        .table > thead > tr > td.warning,
        .table > thead > tr > th.warning {
            background-color: #fcf8e3
        }

        .table-hover > tbody > tr.warning:hover > td,
        .table-hover > tbody > tr.warning:hover > th,
        .table-hover > tbody > tr:hover > .warning,
        .table-hover > tbody > tr > td.warning:hover,
        .table-hover > tbody > tr > th.warning:hover {
            background-color: #faf2cc
        }

        .table > tbody > tr.danger > td,
        .table > tbody > tr.danger > th,
        .table > tbody > tr > td.danger,
        .table > tbody > tr > th.danger,
        .table > tfoot > tr.danger > td,
        .table > tfoot > tr.danger > th,
        .table > tfoot > tr > td.danger,
        .table > tfoot > tr > th.danger,
        .table > thead > tr.danger > td,
        .table > thead > tr.danger > th,
        .table > thead > tr > td.danger,
        .table > thead > tr > th.danger {
            background-color: #f2dede
        }

        .table-hover > tbody > tr.danger:hover > td,
        .table-hover > tbody > tr.danger:hover > th,
        .table-hover > tbody > tr:hover > .danger,
        .table-hover > tbody > tr > td.danger:hover,
        .table-hover > tbody > tr > th.danger:hover {
            background-color: #ebcccc
        }

        .table-responsive {
            overflow-x: auto;
            min-height: .01%
        }

        @media screen and (max-width: 767px) {
            .table-responsive {
                width: 100%;
                margin-bottom: 15px;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar;
                border: 1px solid #ddd
            }

            .table-responsive > .table {
                margin-bottom: 0
            }

            .table-responsive > .table > tbody > tr > td,
            .table-responsive > .table > tbody > tr > th,
            .table-responsive > .table > tfoot > tr > td,
            .table-responsive > .table > tfoot > tr > th,
            .table-responsive > .table > thead > tr > td,
            .table-responsive > .table > thead > tr > th {
                white-space: nowrap
            }

            .table-responsive > .table-bordered {
                border: 0
            }

            .table-responsive > .table-bordered > tbody > tr > td:first-child,
            .table-responsive > .table-bordered > tbody > tr > th:first-child,
            .table-responsive > .table-bordered > tfoot > tr > td:first-child,
            .table-responsive > .table-bordered > tfoot > tr > th:first-child,
            .table-responsive > .table-bordered > thead > tr > td:first-child,
            .table-responsive > .table-bordered > thead > tr > th:first-child {
                border-left: 0
            }

            .table-responsive > .table-bordered > tbody > tr > td:last-child,
            .table-responsive > .table-bordered > tbody > tr > th:last-child,
            .table-responsive > .table-bordered > tfoot > tr > td:last-child,
            .table-responsive > .table-bordered > tfoot > tr > th:last-child,
            .table-responsive > .table-bordered > thead > tr > td:last-child,
            .table-responsive > .table-bordered > thead > tr > th:last-child {
                border-right: 0
            }

            .table-responsive > .table-bordered > tbody > tr:last-child > td,
            .table-responsive > .table-bordered > tbody > tr:last-child > th,
            .table-responsive > .table-bordered > tfoot > tr:last-child > td,
            .table-responsive > .table-bordered > tfoot > tr:last-child > th {
                border-bottom: 0
            }
        }

        .dataTables_info {
            display: none !important
        }

        [class^="ccpw_icon-"]:before,
        [class*=" ccpw_icon-"]:before {
            font-family: "ccpwicons";
            font-style: normal;
            font-weight: normal;
            speak: none;
            display: inline-block;
            text-decoration: inherit;
            width: 1em;
            margin-right: .2em;
            text-align: center;
            font-variant: normal;
            text-transform: none;
            line-height: 1em;
            margin-left: .2em;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .ccpw_icon-up:before {
            content: '\21';
        }

        .ccpw_icon-down:before {
            content: '\22';
        }

        .ccpw_icon-price-up:before {
            content: '\e800';
        }

        .ccpw_icon-price-down:before {
            content: '\e801';
        }

        .ccpw_icon-exchange:before {
            content: '\e802';
        }

        .ccpw_icon-website:before {
            content: '\e803';
        }

        .ccpw_icon-country:before {
            content: '\e804';
        }

        .ccpw_icon-edit:before {
            content: '\e805';
        }

        .ccpw_icon-setting:before {
            content: '\e806';
        }

        .ccpw_icon-flight:before {
            content: '\e807';
        }

        .ccpw_icon-top:before {
            content: '\e809';
        }

        .ccpw_icon-gplus:before {
            content: '\f0d4';
        }

        .ccpw_icon-money:before {
            content: '\f0d6';
        }

        .ccpw_icon-chat:before {
            content: '\f0e6';
        }

        .ccpw_icon-alexa:before {
            content: '\f135';
        }

        .ccpw_icon-link:before {
            content: '\f14c';
        }

        .ccpw_icon-euro:before {
            content: '\f153';
        }

        .ccpw_icon-pound:before {
            content: '\f154';
        }

        .ccpw_icon-dollar:before {
            content: '\f155';
        }

        .ccpw_icon-rupee:before {
            content: '\f156';
        }

        .ccpw_icon-bitcoin:before {
            content: '\f15a';
        }

        .ccpw_icon-youtube:before {
            content: '\f166';
        }

        .ccpw_icon-coins:before {
            content: '\f192';
        }

        .ccpw_icon-volume:before {
            content: '\f200';
        }

        .ccpw_icon-chart:before {
            content: '\f201';
        }

        .ccpw_icon-buy-coin:before {
            content: '\f217';
        }

        .ccpw_icon-sell-coin:before {
            content: '\f218';
        }

        .ccpw_icon-telegram:before {
            content: '\f2c6';
        }

        .ccpw_icon-github:before {
            content: '\f300';
        }

        .ccpw_icon-twitter:before {
            content: '\f304';
        }

        .ccpw_icon-facebook:before {
            content: '\f308';
        }

        .ccpw_icon-linkedin:before {
            content: '\f30c';
        }

        .ccpw-credits {
            display: inline-block;
            width: 100%;
            clear: both;
        }

        .ccpw-credits a {
            color: rgba(0, 0, 0, 0.4);
            font-size: 10px;
            text-decoration: none;
            box-shadow: none;
            vertical-align: top;
            opacity: 0.8;
        }

        .mtab_icon img {
            width: 100%;
        }

        .ccpw-credits a:hover {
            opacity: 1;
        }

        .tickercontainer .ccpw-credits a {
            vertical-align: baseline;
        }

        .ccpw-ticker-cont {
            width: 100%;
            overflow: hidden;
            cursor: pointer;
            font-size: 12px;
        }

        .ccpw-header-ticker-fixedbar {
            position: fixed;
            top: 0px;
            width: 100%;
            z-index: 99999;
            cursor: pointer;
        }

        .ccpw-footer-ticker-fixedbar {
            position: fixed;
            bottom: 0px;
            width: 100%;
            z-index: 99999;
            cursor: pointer;
        }

        .tickercontainer .coin-container {
            margin-right: 6px;
        }

        .tickercontainer span.name {
            font-size: 14px;
            margin-left: 6px;
            font-weight: bold;
        }

        .tickercontainer span.price {
            font-size: 12px;
            margin-left: 8px;
        }

        .tickercontainer span.ccpw_icon {
            display: inline-table;
            width: 22px;
            height: 100%;
            vertical-align: middle;
        }

        .tickercontainer span.ccpw_icon img {
            width: 100%;
            height: auto;
            padding: 0;
            vertical-align: middle;
            margin-top: -3px;
        }

        .tickercontainer li {
            white-space: nowrap;
            float: left;
            padding: 0 7px;
            line-height: 34px;
        }

        .tickercontainer ul {
            display: inline-block;
            position: relative;
            margin: 0;
            padding: 0;
            width: 100%;
            float: left;
            overflow: hidden;
            list-style-type: none;
        }

        table.ccpw_table {
            font-size: 16px;
            margin: 0;
            padding: 0;
            border: 0;
            border-radius: 4px;
            overflow: hidden;
        }

        .ccpw_table tr th {
            background-color: rgba(34, 34, 34, 0.26);
        }

        .ccpw_table td,
        .ccpw_table th {
            border: none;
            border-bottom: 1px solid rgba(34, 34, 34, 0.26);
            text-align: center;
            padding: 5px;
            border-top: 0 !important;
        }

        .ccpw_table tr th:first-child,
        .ccpw_table tr td:first-child {
            text-align: left;
            border-left: 0;
        }

        td span.changes {
            white-space: nowrap;
        }

        .ccpw_table tr {
            border-bottom: 1px solid rgba(34, 34, 34, 0.26);
        }

        .ccpw_table span.name {
            font-weight: bold;
            margin-right: 2px;
        }

        .ccpw_table span.price {
            margin-left: 8px;
        }

        span.changes.up {
            color: <?= $bp_options['borsa_cikis_arkaplan'] ?>;
            margin-left: 3px;
        }

        span.changes.down {
            color: <?= $bp_options['borsa_inis_arkaplan'] ?>;
            margin-left: 3px;
        }

        .ccpw_table .ccpw_icon.ccpw_coin_logo {
            display: inline-block;
            vertical-align: middle;
            height: 24px;
            width: 24px;
            padding: 0;
            margin: 0;
            margin-right: 5px;
        }

        .ccpw_table .ccpw_icon.ccpw_coin_logo img {
            width: 100%;
            height: auto;
            vertical-align: top;
        }

        .ccpw_table .ccpw_coin_info {
            display: inline-block;
            vertical-align: middle;
            width: calc(100% - 30px);
        }

        .widget .ccpw_table {
            font-size: 12px;
        }

        .widget .ccpw_table th,
        .widget .ccpw_table td {
            width: 37%;
        }

        .widget .ccpw_table th:last-child,
        .widget .ccpw_table td:last-child {
            width: 25%;
        }

        .widget .ccpw_table .ccpw_icon.ccpw_coin_logo {
            height: 16px;
            width: 16px;
            margin-right: 3px;
        }

        .widget .ccpw_table .ccpw_coin_info {
            width: calc(100% - 20px);
        }

        .widget .ccpw_coin_info .coin_symbol {
            display: none;
        }

        @media only screen and (max-width: 500px) {
            .ccpw_table {
                font-size: 12px;
            }

            .ccpw_table th,
            .ccpw_table td {
                width: 37%;
            }

            .ccpw_table th:last-child,
            .ccpw_table td:last-child {
                width: 25%;
            }

            .ccpw_table .ccpw_icon.ccpw_coin_logo {
                height: 16px;
                width: 16px;
                margin-right: 3px;
            }

            .ccpw_table .ccpw_coin_info {
                width: calc(100% - 20px);
            }

            .ccpw_coin_info .coin_symbol {
                display: none;
            }
        }

        .ccpw-price-label {
            display: inline-block;
        }

        .ccpw-price-label ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .ccpw-price-label ul li {
            padding: 0;
            margin: 8px;
            display: inline-block;
        }

        .ccpw-price-label .coin-container {
            font-size: 14px;
        }

        .ccpw-price-label span.ccpw_icon {
            width: 24px;
            height: 24px;
            margin-right: 5px;
            overflow: hidden;
            padding: 0;
        }

        .ccpw-price-label span.ccpw_icon img {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            vertical-align: top;
        }

        .ccpw-price-label span.name {
            font-size: 16px;
            font-weight: bold;
            margin-right: 5px;
            display: inline-block;
        }

        .contentline .ccpw-price-label ul li {
            margin: 0 4px;
        }

        .biglabel .ccpw-price-label {
            width: 100%;
        }

        .biglabel .ccpw-price-label ul li {
            width: 100%;
            text-align: center;
            margin: 15px 5px;
        }

        .biglabel .ccpw-price-label span.ccpw_icon {
            width: 32px;
            height: 32px;
        }

        .biglabel .ccpw-price-label .coin-container {
            font-size: 24px;
        }

        .biglabel .ccpw-price-label span.name {
            font-size: 32px;
        }

        .ccpw-price-label .ccpw_icon,
        .ccpw-price-label .name,
        .ccpw-price-label .price,
        .ccpw-price-label .changes {
            vertical-align: middle;
            display: inline-block;
        }

        .currency_tabs {
            display: inline-block;
            border: 1px solid rgba(34, 34, 34, 0.15);
            width: 100%;
            padding: 0;
            margin: 5px auto;
            border-radius: 4px;
            overflow: hidden;
        }

        .currency_tabs ul li:before,
        .currency_tabs ul li:after {
            display: none;
        }

        .currency_tabs ul.multi-currency-tab,
        .currency_tabs ul.multi-currency-tab-content {
            display: inline-block;
            list-style: none;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .currency_tabs ul.multi-currency-tab li {
            background-color: rgba(34, 34, 34, 0.15);
            display: inline;
            cursor: pointer;
            width: 20%;
            box-sizing: border-box;
            padding: 5px;
            text-align: center;
            border-right: 1px solid rgba(34, 34, 34, 0.3);
            border-bottom: 1px solid rgba(34, 34, 34, 0.3);
            margin: 0 !IMPORTANT;
            white-space: nowrap;
            float: left;
            font-size: 15px;
            clear: none;
        }

        .currency_tabs ul.multi-currency-tab li:last-child {
            border-right: 0px;
        }

        .currency_tabs ul.multi-currency-tab li.active-tab {
            border-bottom: 0px;
            font-weight: bold;
        }

        .currency_tabs ul.multi-currency-tab-content li {
            padding: 10px;
            margin: 0;
            width: 100%;
            border-bottom: 1px solid rgba(34, 34, 34, 0.3);
            position: relative;
            clear: none;
        }

        .currency_tabs .mtab-content {
            display: inline-block;
            font-size: 14px;
            width: 100%;
        }

        .tab-price-area {
            display: inline-block;
            float: right;
            vertical-align: top;
            text-align: left;
            min-width: 170px;
        }

        .currency_tabs .mtab-content .mtab_price {
            display: inline-block;
            margin: 0 5px;
            font-weight: bold;
            font-size: 1.2em;
        }

        .currency_tabs span.mtab_icon {
            display: inline-block;
            height: 22px;
            width: 22px;
            margin-right: 5px;
            vertical-align: middle;
        }

        .currency_tabs span.mtab_icon img {
            vertical-align: top;
        }

        .currency_tabs .mtab-content span.mtab_.down {
            color: #ed1414;
        }

        .currency_tabs .mtab-content span.mtab_.up {
            color: #67c624;
        }

        .currency_tabs .mtab-content span.mtab_.up,
        .currency_tabs .mtab-content span.mtab_.down {
            white-space: nowrap;
            float: right;
        }

        .widget .currency_tabs ul.multi-currency-tab li,
        .widget .currency_tabs .mtab-content {
            font-size: 13px;
        }

        .widget .tab-price-area {
            min-width: 100%;
            margin-top: 5px;
        }

        @media only screen and (max-width: 500px) {

            .currency_tabs ul.multi-currency-tab li,
            .currency_tabs .mtab-content {
                font-size: 13px;
            }

            .tab-price-area {
                min-width: 100%;
                margin-top: 5px;
            }
        }
    </style>
    <style id='ccpw-styles-inline-css'>
        .tickercontainer #ccpw-ticker-widget {
            background-color: #f5f5f7;
        }

        .tickercontainer #ccpw-ticker-widget span.name,
        .tickercontainer #ccpw-ticker-widget .ccpw-credits a {
            color: #0a0a0a;
        }

        .tickercontainer #ccpw-ticker-widget span.coin_symbol {
            color: #0a0a0a;
        }

        .tickercontainer #ccpw-ticker-widget span.price {
            color: #0a0a0a;
        }

        .tickercontainer .price-value {
            color: #0a0a0a;
        }

        .ccpw-header-ticker-fixedbar {
            top: 40px !important;
        }

        .footer_bottom {
            height: 100px !important;
        }
    </style>
    <script>
        jQuery(document).ready(function ($) {
            setInterval(function () {
                $(".creditCalculator .calculatorBtn").addClass("active");
                setTimeout(function () {
                    $(".creditCalculator .calculatorBtn").removeClass("active");
                }, 600)
            }, 3500);
            $(".ccpw-ticker-cont").fadeIn();
        });
    </script>
    <script type='text/javascript' src='//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".ccpw-ticker-cont #ccpw-ticker-widget").slick({
                speed: 5000,
                autoplay: true,
                autoplaySpeed: 0,
                centerMode: true,
                cssEase: 'linear',
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: true,
                infinite: true,
                initialSlide: 1,
                arrows: false,
                buttons: false,
                pauseOnHover: true
            });
        });
    </script>
<?php } ?>


</body>

</html>