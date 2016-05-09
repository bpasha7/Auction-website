<?php
header('Content-Type: application/json');
header ("Content-Type: text/html; charset=utf-8"); 
$info_array = array();
$mysqli = new mysqli("127.0.0.1", "client", "", "auction");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
session_start();
if(!isset($_SESSION['userid'])) {
exit();
}
$userid = $_SESSION['userid'];

if (!($res = $mysqli->query("SELECT COUNT(ItemId) AS cnt FROM items
WHERE OwnerId = $userid"))) {
    echo "Получить данные о товарах не удалось: (" . $mysqli->errno . ") " . $mysqli->error;
}
$row = $res->fetch_assoc();
$info_array ['itemcount'] = $row['cnt'];
$res->close();
if (!($res = $mysqli->query("SELECT COUNT(lots.ItemId) AS cnt
	FROM lots, items 
	WHERE items.OwnerId = $userid AND lots.ItemId =items. ItemId"))) {
    echo "Получить данные о товарах не удалось: (" . $mysqli->errno . ") " . $mysqli->error;
}
$row = $res->fetch_assoc();
$info_array ['lotcount'] = $row['cnt'];
$res->close();
if (!($res = $mysqli->query("CALL MyBalance( $userid )"))) {
    echo "Получить данные не удалось: (" . $mysqli->errno . ") " . $mysqli->error;
}
$row = $res->fetch_assoc();
$info_array ['status'] = 'OK';
$info_array ['rub'] = $row['Rubles'];
$info_array ['dol'] = $row['Dollars'];
$info_array ['bon'] = $row['Bonuses'];
//echo json_encode(array('status' => 'OK','rub'=> $row['Rubles'], 'dol'=> $row['Dollars'], 'bon'=> $row['Bonuses']));
echo json_encode($info_array);
$mysqli->close();

?>