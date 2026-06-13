<?php
/*
  Template Name: Emtia Detay
*/
function get_url_emtia($url){
  $curl = curl_init($url);
  curl_setopt ($curl, CURLOPT_TIMEOUT, "50");
  curl_setopt ($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
  curl_setopt ($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt ($curl, CURLOPT_HEADER, 0);
  curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt ($curl, CURLOPT_HTTPHEADER, explode("\n","Host: www.doviz.com
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:69.0) Gecko/20100101 Firefox/69.0
Accept: */*
Accept-Language: tr-TR,tr;q=0.8,en-US;q=0.5,en;q=0.3
Accept-Encoding: gzip, deflate, br
Referer: https://www.doviz.com/emtialar/brent-petrol
Authorization: Basic 45f43d4fe3e80381cdc2ca4cfdc0eaa669b72bcc7a3c62f06cd39937efbcd673
X-Requested-With: XMLHttpRequest
Connection: keep-alive
Cookie: cookie-disclaimer=1; _ga=GA1.2.543312151.1555535187; __gfp_64b=2cgqS7CZ4axJCxtq3UmlGUv1tf4YBw3s41ne7k9HKBX.N7; __gads=ID=ec306235f60c7038:T=1555535190:S=ALNI_MY4i0KiBrjZNZvgkj1LvJ5qwOLqsw; cto_lwid=4fbc0281-8dd0-4d61-beb6-c09d04f39b42; cto_idcpy=f3b82622-0289-4d1d-b0ea-3f5328368d6a
Pragma: no-cache
Cache-Control: no-cache"));

  $curlResult = curl_exec($curl);
  curl_close($curl);
  return str_replace(array("\n","\t","\r"),null,$curlResult);
}


@$altin = $_GET['e'];
$borsa = get_url_curl($ad = "https://www.doviz.com/emtialar/$altin");

preg_match_all('@<span class="left">(.*?)</span>@si', $borsa, $parite_name);
preg_match_all('@<span class="label">Son</span>                <span class="value">(.*?)</span>@si', $borsa, $borsa_value);
preg_match_all('@<span class="change down">% (.*?)</span>@si', $borsa, $borsa_rate);
preg_match_all('@<h2>(.*?)</h2>@si', $borsa, $borsa_aname);

if(empty($borsa_rate[1][0]))
{
  $borsa_rate[1][0] = "0,00";
}

$new_title = $parite_name[1][0]." - ".get_bloginfo('name');
function generate_custom_title($title) {
    global $new_title;
    $title = $new_title;
    return $title;
    }

add_filter( 'pre_get_document_title', 'generate_custom_title', 10 );
add_filter( 'wpseo_title', 'generate_custom_title', 15 );

if(empty(@$_GET['e']))
{
  ?><script>
  window.location.href = "<?php bloginfo("home")?>";
  </script><?php
}

get_header();

?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/highcharts.js"></script>
<style>
  .currencyTable tr td{font-weight: normal;}
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
								<li><a href="<?php bloginfo('home')?>/emtialar/">Emtialar<i>/</i></a></li>
								<li class="post bg"><span><?=$parite_name[1][0]?></span></li>
							</ul>
						</div>

						<h1 class="singlePageTitle"><?=$parite_name[1][0]?></h1>

						<div class="singleContent block">

							<!-- Main Content -->
							<div class="mainContent onsAltin">

								<!-- Main -->
								<div class="main">

									<!-- Widget -->
						<div class="widget" style="margin-bottom: 15px;">
								<div class="categoryTab">


									<!-- Cat Tab 1 -->
									<div class="catTabContent">
									<?php if ( wp_is_mobile() ): ?>
									<?php else: ?>
										<div class="borsaValue">
											<?=$borsa_value[1][0]?>

                      <?php if(trim(str_replace(array("%".","),array("","."),$borsa_rate[1][0])) > 0){
                        $crease_status = "increase";
                        $crease_color = "#32ba5b";
                      }else{
                        $crease_status = "decrease";
                        $crease_color = "#ef291f";
                      }?>
											<!--<div class="borsaRate" style="color: <?=$crease_color?> !important;"><i class="<?=$crease_status?>"></i>(<?=$borsa_rate[1][0]?>)</div>-->
										</div><?php endif; ?>
										<div class="clear"></div>
										<!-- Tab Head -->
										<div class="borsaTimerTabHead bg">
											<ul>
												<li><span>BUGÜN</span></li>
											</ul>
										</div>
										<div class="borsaTimerTabContent">

                      <div class="currencyChart" id="container_daily"></div>
                      <script>
                      $.get( "<?php bloginfo("template_directory");?>/api/highcharts.php", function( values ) {


                              Highcharts.chart('container_daily', {
                                  chart: {
                                      zoomType: 'x'
                                  },
                                  title: {
                                      text: '<?=$parite_name[1][0]?> Bugün'
                                  },
                                  subtitle: {
                                      text: document.ontouchstart === undefined ?
                                          '' : ''
                                  },
                                  xAxis: {
                                      type: 'datetime'
                                  },
                                  yAxis: {
                                      title: {
                                          text: ''
                                      }
                                  },
                                  legend: {
                                      enabled: false
                                  },
                                  plotOptions: {
                                      area: {
                                          fillColor: {
                                              linearGradient: {
                                                  x1: 0,
                                                  y1: 0,
                                                  x2: 0,
                                                  y2: 1
                                              },
                                              stops: [
                                                  [0, Highcharts.getOptions().colors[0]],
                                                  [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                              ]
                                          },
                                          marker: {
                                              radius: 2
                                          },
                                          lineWidth: 1,
                                          states: {
                                              hover: {
                                                  lineWidth: 1
                                              }
                                          },
                                          threshold: null
                                      }
                                  },

                                  series: [{
                                      type: 'area',
                                      name: '<?=$parite_name[1][0]?>',
                                      data: [
                                        <?php $data = get_url_emtia($ad = "https://www.doviz.com/api/v5/commodities/".explode(" - ", $parite_name[1][0])[0]."/daily");
                                        
                                        foreach (json_decode($data, true)['Data']['ohlc'] as $key3 => $value) {
                                          ?>[<?=$value[0]+10850000?>,<?=str_replace(",",".",$value[1])?>],<?php
                                        }
                                        ?>
                                      ]

                                  }]
                              });
                      });
                      </script>

											<div class="clear"></div>
											<p style="margin-bottom: 10px; margin-top: 10px;">* Piyasaların kapalı olduğu gün ve saatlerde veri akışı bulunmamaktadır.</p>
										</div>





									</div>




								</div>
						</div>

								</div>


							</div>
							<!-- #MainBar -->


						</div>

					</div>

				</div>

        <?php if(!wp_is_mobile()){?>
          <div class="sidebar floatRight">
            <?php dynamic_sidebar("Sidebar (Emtia Detay)"); ?>
          </div>
        <?php } ?>

			</div>
		</section>
		<!-- Content -->
		<div class="clear"></div>

	</div>
	<!-- #Site Wrapper -->
  <script>
  /*
  Tab (Borsa Timer Tab)
  */
  $(document).ready(function(){
  $("section.content .widebar .widget .borsaTimerTabContent").hide();
  $("section.content .widebar .widget .borsaTimerTabContent:first").show();
  $("section.content .widebar .widget .borsaTimerTabHead ul li:first").addClass("active");
  $("section.content .widebar .widget .borsaTimerTabHead ul li").click(function(){
  $("section.content .widebar .widget .borsaTimerTabHead ul li").removeClass("active");
  $(this).addClass("active");
  $("section.content .widebar .widget .borsaTimerTabContent").hide();
  var tab = $(this).index();
  $("section.content .widebar .widget .borsaTimerTabContent:eq("+tab+")").fadeIn();
  return false;
  });
  });
  </script>
<?php
get_footer();
