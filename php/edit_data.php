<?php
include "db_connect.php";
$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$order = "UPDATE users SET UserName='$name', UserMail='$email', UserPhone='$phone' WHERE UserId='$id'";
db_query($order);
//header("location:index.php");
?>