function getBotTemplate(coreId)
{
  jQuery.ajax({
  type:"POST",
  url: "admin-ajax.php",
  data: "action=birbot_list&core="+coreId,
  success:function(data){
    $(".bib-botTemplate").html(data);
  }
  });
}
function getBotData()
{
  $(".bib-loading").show();
  var data = $('#bibForm').serialize();
  jQuery.ajax({
  type:"POST",
  url: "admin-ajax.php",
  data: data,
  success:function(data){
    $(".bib-loading").hide();
    $(".bib-botData").html(data);
  }
  });
}

function insertData(dataID, status = 'publish')
{
  $(".insert_btn_"+dataID).val("Kaydediliyor...");
  var data = $('#dataForm'+dataID).serialize();

  jQuery.ajax({
  type:"POST",
  url: "admin-ajax.php?status="+status,
  data: data,
  success:function(data){
    var returnedData = JSON.parse(data);
    $(".insert_btn_"+dataID).val(returnedData.message);
  }
  });
}

function getCronTemplate(coreId)
{
  jQuery.ajax({
  type:"POST",
  url: "admin-ajax.php",
  data: "action=birbot_cron_template&core="+coreId,
  success:function(data){
    $(".bib-cronTemplate").html(data);
  }
  });
}

function createCronTemplate()
{
    var data = $("#bibCronForm").serialize();
    var newsCat = data.split("&cron_category=");
    delete newsCat[0];
    $(".cron_link").val('"'+document.location.origin+"/wp-content/themes/birfinans/birbot/cron-trigger.php?bot="+$("#bibCronForm .botCore").val()+"&category="+$("#bibCronForm .cronCat").val()+"&category_id="+newsCat.join(",")+'"');
}

function allInsertData(status)
{
  $( ".dataForm" ).each(function(index, value) {
    insertData($(this).data("id"), status);
  });
}

function categoryOpen(){
  $(".categoryArea").toggle(400);
}
function checkCategory(catID)
{
  if($("#in-category-"+catID).prop('checked') == true){
    $("#in-category-"+catID).prop('checked', false);
  }else{
    $("#in-category-"+catID).prop('checked', true);
  }

}


function birbot_edit(dataID)
{
  $('.birbot_edit_btn_'+dataID).val('value');
  $('.birbot_edit_form_'+dataID).submit();
}
