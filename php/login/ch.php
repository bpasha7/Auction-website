<?php
header('Content-Type: application/json');
header ("Content-Type: text/html; charset=utf-8"); 
session_start();
//Check for valid session. Exit from page if not valid.
if(!isset($_SESSION['userid'])) {
print("NO");
exit();
}
$mysqli = new mysqli("127.0.0.1", "root", "qwerty", "auction");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (!($res = $mysqli->query("CALL MyBalance(2) "))) {
    echo "Получить данные не удалось: (" . $mysqli->errno . ") " . $mysqli->error;
}
$row = $res->fetch_assoc();
echo json_encode(array('status' => 'OK','rub'=> $row['Rubles'], 'dol'=> $row['Dollars'], 'bon'=> $row['Bonuses']));
$mysqli->close();

?>