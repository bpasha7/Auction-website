<?php header ("Content-Type: text/html; charset=utf-8"); ?>
<html>
<head>
<link rel= "stylesheet" style= "text/css" href= "style.css" />
<title>Главная Интерент-аукцион</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(function() {
    $('#data').submit(function() {
    	var Nm = document.getElementById('nm').value;
		var Txt = document.getElementById('txt').value;
        if(Nm == '' || Txt == '')
        {
        	alert('NO');
        	return false;
        	
		}
        else
        {
        	return true;
		}
    });
});
</script>

 </head>
<body>
<ul class="topnav">
  <li><a href="index.php">Главная</a></li>
  <li><a href="lots.php">Лоты</a></li>
  <li><a href="#contact">Поиск</a></li>
  <li><a class="active" href="#">Отзывы</a></li>
  <li class="right"><a href="#">Регистрация</a></li>
  <li class="right"><a href="#">Вход</a></li>
</ul>


      <table>
      <?php
      include 'db_connect.php';
      $order = "SELECT * FROM users where UserId = 2";
      $result = db_query($order);
     $row = mysql_fetch_array($result);
      ?>
	  
	  	  
      <form method="post" action='edit_data.php'>
      <input type="hidden" name="id" value="<?php echo "$row[UserId]"?>">
        <tr>        
          <td>Имя сотрудника</td>
          <td>
            <input type="text" name="name" 
        size="20" value="<?php echo "$row[UserName]"?>">
          </td>
        </tr>
        <tr>
          <td> 	e-mail</td>
          <td>
            <input type="text" name="email" size="40" 
          value="<?php echo "$row[UserMail]"?>">
          </td>
        </tr>
		 <tr>
          <td> рабочий телефон</td>
          <td>
            <input type="text" name="phone" size="40" 
          value="<?php echo "$row[UserPhone]"?>">
          </td>
        </tr>
        <tr>
          <td align="right">
            <input type="submit" 
          name="submit value" value="Edit">
          </td>
        </tr>
      </form>
      </table>



<form >
<br>
	<?php 
	include 'getCmt.php'; 
	?>
</form>
<p>Оставить свой отзыв</p>
<form id="data" method="post" action="add_data.php">
E-mail: <input id="nm" type="text" name="name" style="width: 250px;"><br>
<br>Отзыв: <input id="txt" type="text" name="text" style="width: 250px; height: 100px" ><br>
<br><input type="submit" value="Отправить">
</form>



  <footer>
  <div align="center">
    <p>Copyright Интернет-аукцион Wanna Sell</p>
	<p><b>Обратная связь </b>
	<a target="_blank" href="http://vk.com/bezrukpavel"><img alt="vkontakte" src="img/btn_vk.png"
width="32px" height="32px" /></a>  <a target="_blank" href="skype:bgv2015"><img alt="skype" src="img/skype.png"
width="32px" height="32px" /></a> </p>
</div>
  </footer>
<script type="text/javascript">

</script>
</body>
</html>