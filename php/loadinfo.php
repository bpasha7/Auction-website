<?php
header ("Content-Type: text/html; charset=utf-8");
$dir = "image_data/1";
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
}

rsort($files);

print_r($files);
$mysqli = new mysqli("127.0.0.1", "client", "", "auction");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (!($res = $mysqli->query(""))) {
    echo "Получить данные не удалось: (" . $mysqli->errno . ") " . $mysqli->error;
}
echo "<div id=\"images\">\n";
$count = 1;
while($row = $res->fetch_assoc()){
	echo "\t<img id=\"image$count\" src=\" \"/>n";
	$count++;
	
}
//echo json_encode(array('status' => 'OK','rub'=> $row['Rubles'], 'dol'=> $row['Dollars'], 'bon'=> $row['Bonuses']));
$mysqli->close();
?>