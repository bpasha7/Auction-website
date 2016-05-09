<?php header ("Content-Type: text/html; charset=utf-8"); ?>
<?php
include 'db_connect.php';
$q = "SELECT GroupName FROM Groups";
$result = db_query($q);
// Выводим результаты в html
while($row = mysql_fetch_array($result))
  {
    echo '<option value="'.$row['GroupName'].'">' . $row['GroupName'] . "</option>";
  }
mysql_free_result($result);

?>