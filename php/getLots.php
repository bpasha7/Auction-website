<?php 
header ("Content-Type: text/html; charset=utf-8");
include 'db_connect.php';
$pat = $_POST['pat'];
$grp = $_POST['grp'];
$q = "SELECT ItemId, ItemName, `Группа`, `Цена`, `Кол-во` FROM aboutlots WHERE
 ItemName LIKE '%$pat%' AND `Группа` = '$grp'";
$result = db_query($q);
if (mysql_num_rows($result) == 0)//вывод сообщения о том, что ничего не найдено
	print("<p align=\"center\">Ничего не найдено, попробуйте еще=)</p>");
else
{
//флаг для первой колонки - гиперссылка
$first = 1;
//Названия колонок таблицы
echo "<tr><th>Лот</th><th>Группа</th><th>Цена</th><th>Количество</th></tr>";
while($line = mysql_fetch_array($result, MYSQL_ASSOC))//Обрабатываем построчно запрос
{
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
	if($first == 1)
	{
		echo "<td><a target=\"_blank\" href=\"lotinfo.php?no=$col_value&grp=$grp\">";
		$first++;
		continue;
	}
	if($first == 2)
	{
		echo "$col_value</a></td>\n";
		$first = 0;
		continue;
	}
	
        echo "\t\t<td>$col_value</td>\n";
    }
	$first = 1;
    echo "\t</tr>\n";
}
}
mysql_free_result($result);
?>

