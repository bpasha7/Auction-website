<?php
include "db_connect.php";
$q = "SELECT `Who`, `What`, `When` FROM coments ORDER BY 3 DESC";
$result = db_query($q);
// Выводим результаты в html
 while($row = mysql_fetch_array($result))
  {
    echo "\t\t<p><b>Пользователь: ".$row['Who']."</b> Отзыв: ".
    $row['What']." Дата: ".$row['When']." </p>\n";
	
  }
mysql_free_result($result);

?>