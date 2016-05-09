<?php
include "db_connect.php";
$email=$_POST["name"];
$Text=$_POST["text"];
$today = date("Y-m-d H:i:s"); 
	  $order = "INSERT INTO coments (`Who`, `What`, `When`) VALUES ('$email', '$Text','$today')";
db_query($order);
header("location:comments.php");
?>