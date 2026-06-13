<?php
/*
  Template Name: Canlı Borsa
*/

get_header();
if(!empty($_GET['Endex'])){
    $uzmanpara = get_url_curl("https://uzmanpara.milliyet.com.tr/canli-borsa/".$_GET['Endex']."-hisseleri/");
}else{
    $uzmanpara = get_url_curl("https://uzmanpara.milliyet.com.tr/canli-borsa/");
}

preg_match_all('@<table cellspacing="0" cellpadding="0" border="0" class="table3">(.*?)</table>@si', $uzmanpara, $table_data);
preg_match_all('@<tr class="zebra" id="h_tr_id_(.*?)" >(.*?)</tr>@si', $table_data[1][0], $data_table1);
preg_match_all('@<tr class="zebra" id="h_tr_id_(.*?)" >(.*?)</tr>@si', $table_data[1][1], $data_table2);
preg_match_all('@<tr class="zebra" id="h_tr_id_(.*?)" >(.*?)</tr>@si', $table_data[1][2], $data_table3);
global $bp_options;
?>
<style>
  .currencyTable tr th{
    font-weight: 500;
  }
  .currencyTable tr td b{
    color: #3b72de !important;
  }
  @media only screen and (max-width: 769px){
      table.currencyTable.gold i{
          top: 21.2px !important;
      }
  }

</style>
<!-- Site Wrapper -->
	<div class="site-wrapper">

		<!-- Content -->
		<section class="content home">
			<div class="container-wrap">

				<!-- WideBar -->


					<div class="singleWrapper">

						<!-- BreadCrumb -->
						<div class="breadcrumb">
							<ul class="block">
								<li><a href="<?php bloginfo('home')?>">Anasayfa<i>/</i></a></li>
								<li class="post bg"><span><?php the_title() ?></span></li>
							</ul>
						</div>

						<h1 class="postTitle"><?php the_title() ?></h1>



						<div class="singleContent block hasImage">

							<!-- Main Content -->
							<div class="mainContent">

								<!-- Main -->
								<div class="main">

									<!-- widget -->
									<div class="widget">
										<!-- Currency Showcase -->
										<div class="currencyShowcase fullShowcase mobileBottomNo">
                      <?php if(wp_is_mobile()){ ?>
                          <div class="dateTable">
                              <ul>
                                  <li class="<?php if(@$_GET['Endex'] == "bist-TUM") echo "active";?>"><a href="<?=home_url("/canli-borsa/?Endex=bist-TUM")?>">BIST TÜMÜ</a></li>
                                  <li class="<?php if(@$_GET['Endex'] == "bist-100" || empty(@$_GET['Endex'])) echo "active"; ?>"><a href="<?=home_url("/canli-borsa/?Endex=bist-100")?>">BIST 100</a></li>
                                  <li class="<?php if(@$_GET['Endex'] == "bist-50") echo "active";?>"><a href="<?=home_url("/canli-borsa/?Endex=bist-50")?>">BIST 50</a></li>
                                  <li class="<?php if(@$_GET['Endex'] == "bist-30") echo "active";?>"><a href="<?=home_url("/canli-borsa/?Endex=bist-30")?>">BIST 30</a></li>
                              </ul>
                          </div>
                        <table class="currencyTable gold kriptolar" style="width: 100%;float:left;">
              <tr class="head">
                <th>Menkul</th>
                <th>Fiyat</th>
                <th>%</th>
                <th>Zaman</th>
              </tr>
              <?php foreach($data_table1[2] as $key=>$val):
                  preg_match_all('@<td class="currency"><a href="/borsa/hisse-senetleri/(.*?)/"  target = "_blank"  ><b id="h_b_ad_id_(.*?)"  >(.*?)</b></a></td>@si', $val, $hisse_name);
                preg_match_all('@<td class="center" id="h_td_fiyat_id_(.*?)">(.*?)</td>@si', $val, $hisse_fiyat);
                preg_match_all('@<td class="currency-(.*?)" id="h_td_yon_id_(.*?)" >@si', $val, $hisse_yon);
                preg_match_all('@<td class="center" id="h_td_yuzde_id_(.*?)">(.*?)</td>@si', $val, $hisse_yuzde);
                preg_match_all('@<td class="center" id="h_td_zaman_id_(.*?)">(.*?)</td>@si', $val, $hisse_zaman);

                if($hisse_yon[1][0] == "up"){
                  $crease_status = "increase";
                }else{
                  $crease_status = "decrease";
                }
                  if(empty($hisse_name[3][0])) continue;
                ?>
              <tr class="<?=$hisse_yuzde[1][0]?>_bg">
                <td class="hisse_name <?=$hisse_yuzde[1][0]?>_name" data-name="<?=$hisse_yuzde[1][0]?>"><?=$hisse_name[3][0]?></td>
                <td style="font-weight: normal;"><i class="<?=$crease_status?>"></i> <em class="<?=$hisse_yuzde[1][0]?>_fiyat"><?=$hisse_fiyat[2][0]?></em></td>
                <td class="<?=$hisse_yuzde[1][0]?>_yuzde" style="font-weight: normal;"><?=$hisse_yuzde[2][0]?></td>
                <td class="<?=$hisse_yuzde[1][0]?>_zaman" style="font-weight: normal;padding-left: 19px;"><?=$hisse_zaman[2][0]?></td>
                </tr>
              <?php endforeach; ?>

  <?php foreach($data_table2[2] as $key=>$val):
      preg_match_all('@<td class="currency"><a href="/borsa/hisse-senetleri/(.*?)/"   target = "_blank"  ><b id="h_b_ad_id_(.*?)" >(.*?)</b></a></td>@si', $val, $hisse_name);
    preg_match_all('@<td class="center" id="h_td_fiyat_id_(.*?)">(.*?)</td>@si', $val, $hisse_fiyat);preg_match_all('@<td class="currency-(.*?)" id="h_td_yon_id_(.*?)" >@si', $val, $hisse_yon);
    preg_match_all('@<td class="center" id="h_td_yuzde_id_(.*?)">(.*?)</td>@si', $val, $hisse_yuzde);
    preg_match_all('@<td class="center" id="h_td_zaman_id_(.*?)">(.*?)</td>@si', $val, $hisse_zaman);

    if($hisse_yon[1][0] == "up"){
      $crease_status = "increase";
    }else{
      $crease_status = "decrease";
    }
    if(empty($hisse_name[3][0])) continue;
    ?>
  <tr class="<?=$hisse_yuzde[1][0]?>_bg">
    <td class="hisse_name <?=$hisse_yuzde[1][0]?>_name" data-name="<?=$hisse_yuzde[1][0]?>"><?=$hisse_name[3][0]?></td>
    <td style="font-weight: normal;"><i class="<?=$crease_status?>"></i> <em class="<?=$hisse_yuzde[1][0]?>_fiyat"><?=$hisse_fiyat[2][0]?></em></td>
    <td class="<?=$hisse_yuzde[1][0]?>_yuzde" style="font-weight: normal;"><?=$hisse_yuzde[2][0]?></td>
    <td class="<?=$hisse_yuzde[1][0]?>_zaman" style="font-weight: normal;padding-left: 19px;"><?=$hisse_zaman[2][0]?></td>
    </tr>
  <?php endforeach; ?>

  <?php foreach($data_table3[2] as $key=>$val):
      preg_match_all('@<td class="currency"><a href="/borsa/hisse-senetleri/(.*?)/"  target = "_blank"  ><b id="h_b_ad_id_(.*?)" >(.*?)</b></a></td>@si', $val, $hisse_name);
  preg_match_all('@<td class="center" id="h_td_fiyat_id_(.*?)">(.*?)</td>@si', $val, $hisse_fiyat);
  preg_match_all('@<td class="currency-(.*?)" id="h_td_yon_id_(.*?)" >@si', $val, $hisse_yon);
  preg_match_all('@<td class="center" id="h_td_yuzde_id_(.*?)">(.*?)</td>@si', $val, $hisse_yuzde);
  preg_match_all('@<td class="center" id="h_td_zaman_id_(.*?)">(.*?)</td>@si', $val, $hisse_zaman);

  if($hisse_yon[1][0] == "up"){
    $crease_status = "increase";
  }else{
    $crease_status = "decrease";
  }
      if(empty($hisse_name[3][0])) continue;
  ?>
  <tr class="<?=$hisse_yuzde[1][0]?>_bg">
  <td class="hisse_name <?=$hisse_yuzde[1][0]?>_name" data-name="<?=$hisse_yuzde[1][0]?>"><?=$hisse_name[3][0]?></td>
  <td style="font-weight: normal;"><i class="<?=$crease_status?>"></i> <em class="<?=$hisse_yuzde[1][0]?>_fiyat"><?=$hisse_fiyat[2][0]?></em></td>
  <td class="<?=$hisse_yuzde[1][0]?>_yuzde" style="font-weight: normal;"><?=$hisse_yuzde[2][0]?></td>
  <td class="<?=$hisse_yuzde[1][0]?>_zaman" style="font-weight: normal;padding-left: 19px;"><?=$hisse_zaman[2][0]?></td>
  </tr>
  <?php endforeach; ?>

  </table>
<?php  }else{ ?>
                          <div class="dateTable">
                              <ul>
                                  <li class="<?php if(@$_GET['Endex'] == "bist-TUM") echo "active";?>"><a href="<?=home_url("/canli-borsa/?Endex=bist-TUM")?>">BIST TÜMÜ</a></li>
                                  <li class="<?php if(@$_GET['Endex'] == "bist-100" || empty(@$_GET['Endex'])) echo "active"; ?>"><a href="<?=home_url("/canli-borsa/?Endex=bist-100")?>">BIST 100</a></li>
                                  <li class="<?php if(@$_GET['Endex'] == "bist-50") echo "active";?>"><a href="<?=home_url("/canli-borsa/?Endex=bist-50")?>">BIST 50</a></li>
                                  <li class="<?php if(@$_GET['Endex'] == "bist-30") echo "active";?>"><a href="<?=home_url("/canli-borsa/?Endex=bist-30")?>">BIST 30</a></li>
                              </ul>
                          </div>
                        <table class="currencyTable gold kriptolar" style="width: 31.333%;float:left;margin-right: 3%;">
              <tr class="head">
                <th>Menkul</th>
                <th>Fiyat</th>
                <th>%</th>
                <th>Zaman</th>
              </tr>
              <?php foreach($data_table1[2] as $key=>$val):
                  preg_match_all('@<td class="currency"><a href="/borsa/hisse-senetleri/(.*?)/"  target = "_blank"  ><b id="h_b_ad_id_(.*?)"  >(.*?)</b></a></td>@si', $val, $hisse_name);
                preg_match_all('@<td class="center" id="h_td_fiyat_id_(.*?)">(.*?)</td>@si', $val, $hisse_fiyat);
                preg_match_all('@<td class="currency-(.*?)" id="h_td_yon_id_(.*?)" >@si', $val, $hisse_yon);
                preg_match_all('@<td class="center" id="h_td_yuzde_id_(.*?)">(.*?)</td>@si', $val, $hisse_yuzde);
                preg_match_all('@<td class="center" id="h_td_zaman_id_(.*?)">(.*?)</td>@si', $val, $hisse_zaman);

                if($hisse_yon[1][0] == "up"){
                  $crease_status = "increase";
                }else{
                  $crease_status = "decrease";
                }
                  if(empty($hisse_name[3][0])) continue;
                ?>
              <tr class="<?=$hisse_yuzde[1][0]?>_bg">
                <td class="hisse_name <?=$hisse_yuzde[1][0]?>_name" data-name="<?=$hisse_yuzde[1][0]?>"><?=$hisse_name[3][0]?></td>
                <td style="font-weight: normal;"><i class="<?=$crease_status?>"></i> <em class="<?=$hisse_yuzde[1][0]?>_fiyat"><?=$hisse_fiyat[2][0]?></em></td>
                <td class="<?=$hisse_yuzde[1][0]?>_yuzde" style="font-weight: normal;"><?=$hisse_yuzde[2][0]?></td>
                <td class="<?=$hisse_yuzde[1][0]?>_zaman" style="font-weight: normal;padding-left: 19px;"><?=$hisse_zaman[2][0]?></td>
                </tr>
              <?php endforeach; ?>

            </table>

            <table class="currencyTable gold kriptolar" style="width: 31.333%;float:left;margin-right: 3%">
  <tr class="head">
    <th>Menkul</th>
    <th>Fiyat</th>
    <th>%</th>
    <th>Zaman</th>
  </tr>
  <?php foreach($data_table2[2] as $key=>$val):
    preg_match_all('@<td class="currency"><a href="/borsa/hisse-senetleri/(.*?)/"   target = "_blank"  ><b id="h_b_ad_id_(.*?)" >(.*?)</b></a></td>@si', $val, $hisse_name);
    preg_match_all('@<td class="center" id="h_td_fiyat_id_(.*?)">(.*?)</td>@si', $val, $hisse_fiyat);preg_match_all('@<td class="currency-(.*?)" id="h_td_yon_id_(.*?)" >@si', $val, $hisse_yon);
    preg_match_all('@<td class="center" id="h_td_yuzde_id_(.*?)">(.*?)</td>@si', $val, $hisse_yuzde);
    preg_match_all('@<td class="center" id="h_td_zaman_id_(.*?)">(.*?)</td>@si', $val, $hisse_zaman);

    if($hisse_yon[1][0] == "up"){
      $crease_status = "increase";
    }else{
      $crease_status = "decrease";
    }
      if(empty($hisse_name[3][0])) continue;
    ?>
  <tr class="<?=$hisse_yuzde[1][0]?>_bg">
    <td class="hisse_name <?=$hisse_yuzde[1][0]?>_name" data-name="<?=$hisse_yuzde[1][0]?>"><?=$hisse_name[3][0]?></td>
    <td style="font-weight: normal;"><i class="<?=$crease_status?>"></i> <em class="<?=$hisse_yuzde[1][0]?>_fiyat"><?=$hisse_fiyat[2][0]?></em></td>
    <td class="<?=$hisse_yuzde[1][0]?>_yuzde" style="font-weight: normal;"><?=$hisse_yuzde[2][0]?></td>
    <td class="<?=$hisse_yuzde[1][0]?>_zaman" style="font-weight: normal;padding-left: 19px;"><?=$hisse_zaman[2][0]?></td>
    </tr>
  <?php endforeach; ?>

  </table>

  <table class="currencyTable gold kriptolar" style="width: 31.333%;float:left;">
  <tr class="head">
  <th>Menkul</th>
  <th>Fiyat</th>
  <th>%</th>
  <th>Zaman</th>
  </tr>
  <?php foreach($data_table3[2] as $key=>$val):
  preg_match_all('@<td class="currency"><a href="/borsa/hisse-senetleri/(.*?)/"  target = "_blank"  ><b id="h_b_ad_id_(.*?)" >(.*?)</b></a></td>@si', $val, $hisse_name);
  preg_match_all('@<td class="center" id="h_td_fiyat_id_(.*?)">(.*?)</td>@si', $val, $hisse_fiyat);
  preg_match_all('@<td class="currency-(.*?)" id="h_td_yon_id_(.*?)" >@si', $val, $hisse_yon);
  preg_match_all('@<td class="center" id="h_td_yuzde_id_(.*?)">(.*?)</td>@si', $val, $hisse_yuzde);
  preg_match_all('@<td class="center" id="h_td_zaman_id_(.*?)">(.*?)</td>@si', $val, $hisse_zaman);

  if($hisse_yon[1][0] == "up"){
    $crease_status = "increase";
  }else{
    $crease_status = "decrease";
  }
      if(empty($hisse_name[3][0])) continue;
  ?>
  <tr class="<?=$hisse_yuzde[1][0]?>_bg">
  <td class="hisse_name <?=$hisse_yuzde[1][0]?>_name" data-name="<?=$hisse_yuzde[1][0]?>"><?=$hisse_name[3][0]?></td>
  <td style="font-weight: normal;"><i class="<?=$crease_status?>"></i> <em class="<?=$hisse_yuzde[1][0]?>_fiyat"><?=$hisse_fiyat[2][0]?></em></td>
  <td class="<?=$hisse_yuzde[1][0]?>_yuzde" style="font-weight: normal;"><?=$hisse_yuzde[2][0]?></td>
  <td class="<?=$hisse_yuzde[1][0]?>_zaman" style="font-weight: normal;padding-left: 19px;"><?=$hisse_zaman[2][0]?></td>
  </tr>
  <?php endforeach; ?>

  </table>
                        <?php
                      }?>

											</div>
											<!-- //Currency Showcase -->
									</div>
									<!-- //widget -->

								</div>


							</div>
							<!-- #MainBar -->


						</div>

					</div>

			</div>
		</section>
		<!-- Content -->
		<div class="clear"></div>

	</div>

  <script>
  function canli() {
    var name, new_fiyat, fiyat;
      $.get( "<?php bloginfo("template_directory")?>/api/canli_borsa.php", function( data ) {
        var obj = jQuery.parseJSON(data);
        $( ".hisse_name" ).each(function( index ) {
          name = $( this ).data("name");
          fiyat = $("."+name+"_fiyat").html().replace(",",".");
          if(obj){
          new_fiyat = obj[name]['fiyat'];

          if(fiyat != new_fiyat){

            if(fiyat < new_fiyat){
              $("."+name+"_fiyat").html(new_fiyat);
              $("."+name+"_yuzde").html(obj[name]['yuzde']);
              $("."+name+"_zaman").html(obj[name]['zaman']);

              $("."+name+"_fiyat").css("color", "#fff");
              $("."+name+"_name").css("color", "#fff");
              $("."+name+"_yuzde").css("color", "#fff");
              $("."+name+"_zaman").css("color", "#fff");

              var $el = $("."+name+"_bg"),
                  x = 2000,
                  originalColor = $el.css("background"),
                  name_add = name;


              $el.fadeIn("fast", function() {
                  $el.css("background", "<?=$bp_options['borsa_cikis_arkaplan']?>");
              });
              setTimeout(function(){
                $el.fadeIn("fast", function() {
                  $("."+name_add+"_fiyat").css("color", "#242");
                  $("."+name_add+"_name").css("color", "#242");
                  $("."+name_add+"_yuzde").css("color", "#242");
                  $("."+name_add+"_zaman").css("color", "#242");

                    $el.css("background", originalColor);
                });

              }, x);


            }else{
              $("."+name+"_fiyat").html(new_fiyat);
              $("."+name+"_yuzde").html(obj[name]['yuzde']);
              $("."+name+"_zaman").html(obj[name]['zaman']);
              var $el = $("."+name+"_bg"),
                  x = 2000,
                  originalColor = $el.css("background"),
                  name_add = name;


              $el.fadeIn("fast", function() {
                  $el.css("background", "<?=$bp_options['borsa_inis_arkaplan']?>");
              });
              setTimeout(function(){
                $el.fadeIn("fast", function() {
                  $("."+name_add+"_fiyat").css("color", "#242");
                  $("."+name_add+"_name").css("color", "#242");
                  $("."+name_add+"_yuzde").css("color", "#242");
                  $("."+name_add+"_zaman").css("color", "#242");

                    $el.css("background", originalColor);
                });

              }, x);
            }

          }
          }

        });
      });
    }
    setInterval(function(){
        canli();
    },3000);
  </script>

	<!-- #Site Wrapper -->
  <?php get_footer(); ?>
