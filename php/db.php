<?php header ("Content-Type: text/html; charset=utf-8"); 
/** recource db_connect ( string host, string user, string passwd, string dbname )
* Подключение к СУБД и открытие базы данных
*/
function db_connect($host, $user, $passwd, $dbname)
{
	$link = mysql_connect($host, $user, $passwd) or die("\nне удалось соединиться с MySQL" . $host);
	mysql_select_db($dbname) or die("\nне удалось подключиться к базе :" . $dbname);
	mysql_query( 'SET NAMES utf-8' );
	return $link;
}

/** Выполняет запрос к БД 
* @param текст запроса
* @return resource id
*/
function db_query($query,$obj="")
{
	$result = mysql_query($query)
	  or die("\nНекорректный SQL запрос >>" . $query);
	return $result;
}


?>