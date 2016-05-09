<html>
<head>

<link rel= "stylesheet" style= "text/css" href= "style.css" />
<link rel="stylesheet" href="login_style.css" media="screen" type="text/css" />
        <link href="style_menu.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300&subset=latin,cyrillic' rel='stylesheet'>
<title>Главная Интерент-аукцион</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="scripts/home_script.js"></script>
<script src="scripts/lots_script.js"></script>
<script>
</script>
 </head>
<body>
<input class="open" id="top-box" type="checkbox" hidden>
       <label id="open_userbar" class="btn" for="top-box"></label>
        <div id="tst" class="top-panel">
            <div class="message">
                <h1>
                    <label id="userbar_user"></label>, на вашем счету <label id="userbar_rub"></label> &#8381, <label id="userbar_dol"></label>$ и 
                    <label id="userbar_bonuses"></label> <img  alt="bns" src="bounus_ico.png" width="32px" height="32px" style="vertical-align: middle">
                </h1>
                <h2>
                </h2>
                <label id="my_settings" class="btn_mn">Мои данные</label>
                <label id="my_items" class="btn_mn">Мои товары</label>
                <label id="my_lots" class="btn_mn">Мои лоты</label>
                <label id="logout" class="btn_mn">Выйти</label>
            </div>
        </div>
<div id="userbar" >
	
</div>
<ul id ="menu" class="topnav">
  <li><a class="active" id="menu_main"  href="#">Главная</a></li>
  <li><a id="menu_lots" href="#">Поиск</a></li><!--class="active"-->
  <li><a href="#contact">Лоты</a></li>
  <li><a href="comments.php">Отзывы</a></li>
  <li class="right"><a href="#" id="menu_login">Авторизация</a></li>
  
</ul>
   <div id="body_login">
        </div>
     <div id="login">
		 <form>
		 	<fieldset class="clearfix">
		 		<p>
			 		<span class="fontawesome-user">
		 			</span><input id="login_usr" type="text" value="bpa@m.ru" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" required>
		 		</p> <!-- JS because of IE support; better: placeholder="Username" -->
		 		<p>
			 		<span class="fontawesome-lock">
		 			</span><input id="login_psd" type="password"  value="12345" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" required>
		 		</p> <!-- JS because of IE support; better: placeholder="Password" -->

		 		<p>
			 		<input id="login_btn" type="submit" value="ВОЙТИ">
		 		</p>
		 	</fieldset>
		 	<p>
			 	<b>
			 		Способ соединения:
		 		</b><br>
		 	</p>
		 	<select>
		 		<option>
			 		MySQL
		 		</option>
		 		<option>
			 		MySQLi
		 		</option>
		 		<option>
			 		PDO
		 		</option>
		 	</select>
		 </form>
        <p>Нет аккаунта? &nbsp;&nbsp;<a href="#" style="color: #4CAF50;">Регистрация</a><span class="fontawesome-arrow-right"></span></p>
    </div>
<div id="main_page">
	  <div class="plans">
	  <?php
	  header ("Content-Type: text/html; charset=utf-8");
		$mysqli = new mysqli("127.0.0.1", "banned", "", "auction");
					if($mysqli->connect_errno)
					{
						echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
					}				
					if(!($res = $mysqli->query("SELECT ItemId, ItemName, `Группа`, `Цена`, `Кол-во`, `Создано` FROM aboutlots WHERE LotActive = 1")))
					{
						echo "Получить данные не удалось: (" . $mysqli->errno . ") " . $mysqli->error;
					}
					//$row = $res->fetch_assoc();
					$cls_type = 0;
					while($row = mysqli_fetch_assoc($res)){
						//echo $row['ItemName'];
						switch($cls_type){
							case 0:
							echo "<div class=\"plan\">
								<h2 class=\"plan-title\">".$row['ItemName']."</h2>\n
								<p class=\"plan-price\">".$row['Группа']."</p>\n
								<ul class=\"plan-features\">\n
								<li><strong>".$row['Цена']."</strong> &#8381</li>\n
								<li><strong>".$row['Кол-во']."</strong>шт.</li>\n
								<li><strong>".$row['Создано']."</strong> Создано</li>\n
								</ul>\n
								<a href=\"lotinfo.php?no=".$row['ItemId']."&grp=".$row['Группа']."\" class=\"plan-button\">Перейти</a>\n
                                </div>\n";
                                $cls_type =1;
                                break;
                            case 1:
							echo "<div class=\"plan plan-tall\">\n
								<h2 class=\"plan-title\">".$row['ItemName']."</h2>\n
								<p class=\"plan-price\">".$row['Группа']."</p>\n
								<ul class=\"plan-features\">\n
								<li><strong>".$row['Цена']."</strong> &#8381</li>\n
								<li><strong>".$row['Кол-во']."</strong>шт.</li>\n
								<li><strong>".$row['Создано']."</strong> Создано</li>\n
								</ul>\n
								<a href=\"lotinfo.php?no=".$row['ItemId']."&grp=".$row['Группа']."\" class=\"plan-button\">Перейти</a>\n
                                </div>\n";
                                $cls_type =0;
                                break;
                           default: break;
						}
						}
					
	  ?>
  </div>
</div>
  <footer>
  <div align="center">
<!--  <input id="bar_username" value="we"/>-->
    <p>Copyright Интернет-аукцион Wanna Sell</p>
	<p><b>Обратная связь </b>
	<a target="_blank" href="http://vk.com/bezrukpavel"><img  alt="vkontakte" src="img/btn_vk.png"
width="32px" height="32px" style="vertical-align: middle"></a>  <a target="_blank" href="skype:bpasha7"><img alt="skype" src="img/skype.png"
width="32px" height="32px" style="vertical-align: middle"/></a> </p>
</div>
  </footer>
</body>
</html>