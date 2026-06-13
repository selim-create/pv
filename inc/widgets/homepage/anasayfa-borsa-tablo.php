<?php   // Anasayfa (Content) Borsa Tablosu
  CSF::createWidget('anasayfa_borsa_tablo', array(
    'title'       => 'Anasayfa (Content) Borsa Tablosu (Tek)',
    'classname'   => 'anasayfa-borsa-tablo',
    'description' => 'Anasayfa (Content) Borsa Tablosu (Tek)',
    'fields'      => array(
      array(
      'id'    => 'miktar',
      'type'  => 'text',
      'title' => "Miktar",
      'default' => '5'
    ),
  ),
  ));

  if (! function_exists('anasayfa_borsa_tablo')) {
      function anasayfa_borsa_tablo($args, $instance)
      {
          global $borsa_artanlar_data, $borsa_azalanlar_data, $borsa_islem_gorenler_data, $bp_options;
          $miktar = (int) $instance['miktar']-1; ?>
<!-- Widget -->
<div class="widget">
  <div class="financeBar">
    <div class="financeBlock">
      <div class="financeBlockHead  increase">EN ÇOK ARTANLAR</div>
      <table class="financeTable encokartanlar">
        <tr>
          <th style="padding-left: 22px;">Sembol</th>
          <th style="padding-left: 20px;">Son</th>
          <th>Yüzde</th>
        </tr>
        <?php foreach ($borsa_artanlar_data as $key=>$value): ?>
        <tr>
          <td style="padding-left: 22px;"><a href="<?php  bloginfo("home") ?>/hisse/?h=<?=$value['link']?>/"><?=$value['hisse']?></a></td>
          <td style="padding-left: 20px;"><?=$value['son']?></td>
          <td style="padding-right: 12px;padding-left: 0px;">% <?=$value['yuzde']?></td>
        </tr>
        <?php if (wp_is_mobile()) {
              if ($key == 4) {
                  break;
              }
          } else {
              if ($key == $miktar): break;
              endif;
          }
          endforeach; ?>
      </table>
    </div>
    <?php if (wp_is_mobile()) {
              ?>
      <div class="financeBlock">
        <div class="financeBlockHead  decrease">EN ÇOK AZALANLAR</div>
        <table class="financeTable encokazalanlar">
          <tr>
            <th style="padding-left: 22px;">Sembol</th>
            <th style="padding-left:0px"><span style="position:relative; right: 15px;">Son İşlem Fiyatı</span></th>
          </tr>
          <?php foreach ($borsa_azalanlar_data as $key=>$value): ?>
          <tr>
            <td style="padding-left: 22px;"><a href="<?php  bloginfo("home") ?>/<?=$bp_options['page_hisse']?>/?h=<?=$value['link']?>/"><?=$value['hisse']?></a></td>
            <td style="padding-right: 20px;width: 148px;"><?=$value['son']?></td>
          </tr>
          <?php if (wp_is_mobile()) {
                  if ($key == 4) {
                      break;
                  }
              } else {
                  if ($key == $miktar): break;
                  endif;
              }
              endforeach; ?>
        </table>
      </div>
      <?php
          } else {
              ?>
      <div class="financeBlock">
        <div class="financeBlockHead  decrease">EN ÇOK AZALANLAR</div>
        <table class="financeTable encokazalanlar">
          <tr>
            <th style="padding-left: 22px;">Sembol</th>
            <th style="padding-left: 16px;">Son İşlem Fiyatı</th>

          </tr>
          <?php foreach ($borsa_azalanlar_data as $key=>$value): ?>
          <tr>
            <td style="padding-left: 22px;"><a href="<?php  bloginfo("home") ?>/hisse/?h=<?=$value['link']?>/"><?=$value['hisse']?></a></td>
            <td style="padding-right: 20px;width: 148px;"><?=$value['son']?></td>

          </tr>
        <?php if (wp_is_mobile()) {
                  if ($key == 4) {
                      break;
                  }
              } else {
                  if ($key == $miktar): break;
                  endif;
              }
              endforeach; ?>
        </table>
      </div>
      <?php
          } ?>


    <div class="financeBlock lastFinanceBlock">
      <div class="financeBlockHead  processing">EN ÇOK İŞLEM GÖRENLER</div>
      <table class="financeTable encokislemgorenler">
        <tr>
          <th style="padding-left: 22px;">Sembol</th>
          <th style="padding-left: 16px;">Son İşlem Fiyatı</th>

        </tr>
        <?php foreach ($borsa_islem_gorenler_data as $key=>$value): ?>
        <tr>
          <td style="padding-left: 22px;"><a href="<?php  bloginfo("home") ?>/hisse/?h=<?=$value['link']?>/"><?=$value['hisse']?></a></td>
          <td style="padding-right: 20px;"><?=$value['son']?></td>

        </tr>
        <?php if (wp_is_mobile()) {
              if ($key == 4) {
                  break;
              }
          } else {
              if ($key == $miktar): break;
              endif;
          }
          endforeach; ?>
      </table>
    </div>
  </div>
</div>
<!-- #Widget -->
<?php
      }
  }
