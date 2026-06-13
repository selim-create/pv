<?php
/*
  Template Name: Kredi Karşılaştır
*/
global $bp_options;

get_header();

include get_template_directory().'/api/kredi.php';

if(empty(@$_GET['DetayId']))
{
  ?><script>
  window.location.href = "<?php bloginfo("home")?>";
  </script><?php
}
$kaynak = get_url_curl("https://www.hangikredi.com/hangikredi/KrediKarsilastirma.aspx?Tutar=".str_replace(".",null,$_GET['tutar'])."&Vade=".$_GET['vade']."&DetayId=".$_GET['DetayId']);
preg_match_all('@<tbody>(.*?)</tbody>@si', $kaynak, $body);
preg_match_all('@<tr class="apply-row">(.*?)</tr>@si', $body[1][0], $apply);
preg_match_all('@<img alt="(.*?)" src="(.*?)" class="logoSize s-38"/><br />(.*?)</div>@si', $kaynak, $banks);

$body[1][0] = str_replace($apply[0][0], null, $body[1][0]);

?>
<style>
  table.creditList tr td ul li{line-height: 25px; }
  table.creditList tr td p{line-height: 20px; }
  table.creditList tr td:first-child{width: 180px;}
  .creditList tr{position:inherit;display: inherit;}
</style>
<!-- Site Wrapper -->
<div class="site-wrapper">

  <!-- Content -->
  <section class="content home">
    <div class="container-wrap">

      <!-- WideBar -->
      <div class="widebar floatLeft" style="width: 100% !important;">

        <div class="singleWrapper">
          <div class="singleContent block hasImage">

            <!-- Main Content -->
            <div class="mainContent">

              <!-- Main -->
              <div class="main">
                <table class="creditList">
                  <tbody style="border-top: 1px solid #dcdcdc;">

                    <tr style="position:inherit;display: inherit;">
                      <td></td>
                    <?php foreach ($banks[3] as $key => $value): ?>
                      <td><?=$value?></td>
                    <?php endforeach; ?>
                    </tr>
                    <?=$body[1][0]?>
                  </tbody>
                </table>

              </div>


            </div>
            <!-- #MainBar -->


          </div>

        </div>

      </div>


    </div>

    <?php dynamic_sidebar('Sayfa Alt (Kredi Karşılaştır)'); ?>
  </section>
  <!-- Content -->
  <div class="clear"></div>

</div>

<!-- #Site Wrapper -->
<?php
get_footer();
?>
