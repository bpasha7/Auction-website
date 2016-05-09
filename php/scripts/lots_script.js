$(document).ready(function($) {
  var GroupList = 'grp-list';
  var btn_search = 'btn_search';
  $('#'+GroupList).html('<option value="">Выберите группу...</option>');
  
  //Нажатие кнопики Поиск
  $('#'+btn_search).click(function(){
  	var pat = $('#nm').val();
  	var grp =$('#'+GroupList).val();
  	//Передача данных методом POST
  	      $.ajax({
  	      	type: "post",
  	      	url: 'getLots.php',
  	        data: { pat: pat, grp: grp },
	    success: function(output) {
		$('#tbl').html(output);
	    },
	  error: function (xhr, ajaxOptions, thrownError) {
	    alert(xhr.status + " "+ thrownError);
	  }});  
  	});

  //Закгрузка списка групп товаров
  $('#'+GroupList).focus(function(e) {
      $.ajax({url: 'grp.php',
	    success: function(output) {
		$('#'+GroupList).html(output);
	    },
	  error: function (xhr, ajaxOptions, thrownError) {
	    alert(xhr.status + " "+ thrownError);
	  }});       
  });   
});