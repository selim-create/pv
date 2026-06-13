<?php
/*
  Template Name: Emtia Sayfası
*/

$borsa = get_url_curl("https://www.doviz.com/emtialar");

preg_match_all('@<table id="commodities" data-sortable>(.*?)</table>@si', $borsa, $emtia_area);
preg_match_all('@class="name">(.*?)</a>@si', $emtia_area[1][0], $emtia_name);
preg_match_all('@<td>(.*?)</td>@si', $emtia_area[1][0], $emtia_price);
preg_match_all('@<td class="text-bold color-(.*?)">(.*?)</td>@si', $emtia_area[1][0], $emtia_change);

get_header();
?>
<style>
  .currencyTable tr td{font-weight: normal;}
  .currencyTable tr td b{color: #3b72de; }
</style>
<!-- Site Wrapper -->
	<div class="site-wrapper">

		<!-- Content -->
		<section class="content home">
			<div class="container-wrap">

				<!-- WideBar -->
				<div class="widebar floatLeft">

					<div class="singleWrapper">

						<!-- BreadCrumb -->
						<div class="breadcrumb">
							<ul class="block">
                <li><a href="<?php bloginfo('home')?>">Anasayfa<i>/</i></a></li>
                <li class="post bg"><span><?=the_title()?></span></li>
							</ul>
						</div>

						<h1 class="singlePageTitle"><?=the_title()?></h1>

						<div class="singleContent block">

							<!-- Main Content -->
							<div class="mainContent">

								<!-- Main -->
								<div class="main">


            <!-- Widget -->
						<div class="widget">
							<!-- Currency Showcase -->
							<div class="currencyShowcase mobileBottomNo" style="width: 100%;">
                <table class="currencyTable">
                  <tr>
                    <th><b>Emtia</b></th>
                    <th><b>Son</b></th>
                    <th><b>Değişim</b></th>
                  </tr>
                  <?php foreach ($emtia_name[1] as $key => $value):
                    if($emtia_change[1][$key] != "down"){
                      $crease_status = "increase";
                      $crease_color = "#32ba5b";
                    }else{
                      $crease_status = "decrease";
                      $crease_color = "#ef291f";
                    }

                    if($key == 0){
                      $price_key = 1;
                    }else{
                      $price_key = $price_key+3;
                    }
                     ?>
                    <tr>
                      <th><?=$value?></th>
                      <th><?=$emtia_price[1][$price_key]?></th>
                      <th><span style="color: <?=$crease_color?>"><?=$emtia_change[2][$key]?></span></th>

                    </tr>
                    <?php endforeach; ?>

									</table>
								</div>
								<!-- //Currency Showcase -->

						</div>
						<!-- #Widget -->

								</div>


							</div>
							<!-- #MainBar -->


						</div>

					</div>

				</div>

        <?php if(!wp_is_mobile()){
          ?>
          <div class="sidebar floatRight">
    				<?php dynamic_sidebar("Sidebar (Emtialar)")?>
          </div>
          <?php
        }?>


			</div>
		</section>
		<!-- Content -->
		<div class="clear"></div>

	</div>
	<!-- #Site Wrapper -->
<?php
get_footer();
