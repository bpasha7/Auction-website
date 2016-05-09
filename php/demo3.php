<?php header ("Content-Type: text/html; charset=utf-8"); ?>
<?php
//Запрос количество таблиц в БД
$q = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES WHERE 
TABLE_TYPE='Base table' AND TABLE_SCHEMA = 'auction'";
$result = db_query($q);
// Выводим результаты в html
$line = mysql_fetch_array($result, MYSQL_ASSOC);
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>TABLES</td><td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
//Запрос количества представлений
$q = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES WHERE 
TABLE_TYPE='View' AND TABLE_SCHEMA = 'auction'";
$result = db_query($q);
$line = mysql_fetch_array($result, MYSQL_ASSOC);
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>Views</td><td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
// Освобождаем память от результата
mysql_free_result($result);
?>

