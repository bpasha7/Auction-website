<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
header ("Content-Type: text/html; charset=utf-8");
$mysqli = new mysqli("127.0.0.1", "banned", "", "auction");
					if($mysqli->connect_errno)
					{
						echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
					}
					$itemid = $_GET["no"];
					$grpname= $_GET["grp"];
					if(!($res = $mysqli->query("CALL GetItemInfo( $itemid, \"$grpname\")")))
					{
						echo "Получить данные не удалось: (" . $mysqli->errno . ") " . $mysqli->error;
					}
					$row     = $res->fetch_assoc();
?>
<html>
	<head>
		<title>
		<?php
		echo $row['Название'];
		?>
		</title>
		<meta name="" content="">
		<link rel="stylesheet" href="css\iteminfo.css" media="screen" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style2.css" />
		<script src="http://code.jquery.com/jquery-latest.js">
		</script>
		<!--<script src="scripts/home_script.js"></script>-->
		<script>
			$(document).ready(function($)
				{
					//Нажатие на картинку
					$('#images').children().click(function()
						{
							//var l = $('#images').children().length;
							var clickedimg = event.target.id;
							/*var imgarr =[];
							for(i=0;i<l;i++){
							var imgset = {};
							imgset.id = "image"+i.toString();
							imgset.imgfull = "i"+i.toString();
							imgarr.push(imgset);
							}*/
							var at =$('#'+clickedimg.toString()).prop('src');
							//at= at.substr(19, at.legth);
							$("#f").attr("src",at);
							$("#grey_screen").css('display','block');
							//$("#f").css('display','block');
							$('#imgboard').show();
							//$("#images").hide();
							//$("#slider").hide();
							//$('#f').attr('src', $('3f').attr('src').
							//$('#'+clickedimg.toString()+'f').show();
						});

					$("#grey_screen").click(function(e)
						{
							//$(".menu .active").removeClass();
							$('#grey_screen').css('display','none');
							$('#imgboard').hide();
							//$("#images").show();
							//$("#slider").show();
							//$("#main_page").addClass("active");
						});

					/*//Закгрузка списка групп товаров
					$('#'+GroupList).focus(function(e) {
					$.ajax({url: 'grp.php',
					success: function(output) {
					$('#'+GroupList).html(output);
					},
					error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status + " "+ thrownError);
					}});
					});  */
				});
		</script>
	</head>
	<body>
		<h1>
		<?php
		echo $row['Название'];
		?>
		</h1>
		<div id="grey_screen">
		</div>
		<div id="imgboard" hidden="">
			<img id="f" src="#"/>
		</div>

		<div id="images">
			<?php
			//echo " < div id = \"images\" > \n";
			$dir = "image_data/".$_GET['no'];
			$dh  = opendir($dir);
			//$linksname = array();
			while(false !== ($filename = readdir($dh)))
			{
				$files[] = $filename;
			}

			rsort($files);
			for($i = 0; $i < count($files); $i++)
			{
				if($files[$i] != "." && $files[$i] != "..")
				{
					echo "\t<img id=\"image$i\" src=\"$dir/$files[$i]\"/>n";
				}

			}
			?>
		</div>
		<div id="slider">
			<?php
			for($i = 0; $i < count($files); $i++)
			{
				if($files[$i] != "." && $files[$i] != "..")
				{
					$ii = $i + 1;
					echo "\t<a href=\"#image$i\">$ii</a>\n";
				}

			}
			?>
			<!--  <a href="#image1">1</a>
			<a href="#image2">2</a>
			<a href="#image3">3</a>-->
		</div>
		<section class="tabs">
			<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
			<label for="tab-1" class="tab-label-1">
				Описание
			</label>

			<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
			<label for="tab-2" class="tab-label-2">
				Вопросы
			</label>

			<!--<input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
			<label for="tab-3" class="tab-label-3">Work</label>-->

			<input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
			<label for="tab-4" class="tab-label-4">
				Продавец
			</label>

			<div class="clear-shadow">
			</div>

			<div class="content">
				<div class="content-1">
					<?php
					//$info_array = array();					
					$skiping = 0;
					//echo " < h2 > About us</h2><p > ";
					foreach($row as $key => $value){
						if($skiping > 2 )
						{
							//if($value != "" || $key == "Коментрарий"){
							switch($key)
							{
								case "Название":
								echo "<h2>Полная информация</h2><p>";
								break;
								case "Коментарий":
								echo "</p><h3>Коментарий</h3><p>$value</p>";
								break;
								default:
								if($value != "")
								{
									echo "<p>$key: $value</p>";
								}
								break;
							}
							/*if($key == "Коментрарий"){
							echo "</p><h3>Коментрарий</h3><p$value</p></p>";
							//break;
							}
							else{
							echo "<p>$key: $value</p>";
							}
							}
							else{
							continue;//echo "<p>$key: ---</p>";
							}*/
						}
						$skiping++;
					}

					//echo json_encode($info_array);
					$mysqli->close();
					?>
					<!--<h3>Коментарий</h3>
					<p </p>-->
				</div>
				<div class="content-2">

					<h2>
						Services
					</h2>
					<p>
					</p>
					<h3>
						Excellence
					</h3>
					<p>
					</p>
				</div>
				<!-- <div class="content-3">
				<h2>Portfolio</h2>
				<p></p>
				<h3>Examples</h3>
				<p></p>
				</div>-->
				<div class="content-4">
					<h2>
						Контакты
					</h2>
					<p>
					</p>
					<h3>
						Get in touch
					</h3>
					<p>
					</p>
				</div>
			</div>
		</section>
		</div>


	</body>
</html>