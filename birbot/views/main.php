<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri() . "/birbot/assets/style.css"?>">
<script src="<?=get_template_directory_uri() . "/birbot/assets/plugin.js"?>"></script>

<div class="bib-content">
  <div style="display: inline-block;float:left;">
  <h3>Botlar</h3>
  <ul>
    <li><a href="javascript:;" onclick="getBotTemplate('doviz')">Doviz.Com</a></li>
    <li><a href="javascript:;" onclick="getBotTemplate('haberler')">Haberler.Com</a></li>
    <li><a href="javascript:;" onclick="getBotTemplate('milliyet')">Milliyet</a></li>
    <li><a href="javascript:;" onclick="getBotTemplate('sozcu')">Sözcü</a></li>
    <li><a href="javascript:;" onclick="getBotTemplate('haberturk')">Habertürk</a></li>
  </ul>
</div>
  <div style="float:right;width: 60%;">
  <h4 style="">Cron Linkleri</h4>
  <ul>
    <li><a href="javascript:;" onclick="getCronTemplate('doviz')">Doviz.Com</a></li>
    <li><a href="javascript:;" onclick="getCronTemplate('haberler')">Haberler.Com</a></li>
    <li><a href="javascript:;" onclick="getCronTemplate('milliyet')">Milliyet</a></li>
    <li><a href="javascript:;" onclick="getCronTemplate('sozcu')">Sözcü</a></li>
    <li><a href="javascript:;" onclick="getCronTemplate('haberturk')">Habertürk</a></li>
  </ul>
</div>

</div>
<div class="clear"></div>
<div class="bib-botTemplate"></div>
<div class="bib-cronTemplate"></div>

<div class="bib-botData"></div>
