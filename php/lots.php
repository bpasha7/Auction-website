<?php
include 'db_connect.php';
header ("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html>
<head>
<style>

</style>
<link rel= "stylesheet" style= "text/css" href= "style.css" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="scripts/home_script.js"></script>
<script>
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
</script>
</head>

<body>
<!--<ul class="topnav">
  <li><a href="index.php">Главная</a></li>
  <li><a class="active" href="lots.php">Лоты</a></li>
  <li><a href="#contact">Поиск</a></li>
  <li><a href="comments.php">Отзывы</a></li>
  <li class="right"><a href="#">Регистрация</a></li>
  <li class="right"><a href="#">Вход</a></li>
</ul>-->
<!--<?php
/*status.php*/
session_start();
//Check for valid session. Exit from page if not valid.
if(!isset($_SESSION['userid'])) {
print("NO");
exit();
}
echo $_SESSION['userid'];
?>-->


<h2 align="center">Лоты</h2>
<span style=" position: relative; left: 40%; color:#c611ab;">
	<input id="nm" type="text" name="name"  style="width: 310px; height: 30px; color: #c611ab;  font-size: 25px" placeholder ="Давай найдем что-нибудь"><br>
	<select name="grp-list" id="grp-list" style="width: 220px; height: 30px; color: #c611ab; margin-top: 8px;font-size: 18px; margin-right: 3px">
</select>
<input id="btn_search" name="btn_search" class="button" type="submit" value="Найти"><br>

</span>

<table id="tbl">
</table>

</body>
</html>