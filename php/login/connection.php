<?php
header('Content-Type: application/json');
header ("Content-Type: text/html; charset=utf-8"); 
$username = $_POST['username'];
$password = md5($_POST['password']);
/* ����������� � ������� MySQL */ 
$link = mysqli_connect( 
            '127.0.0.1',  /* ����, � �������� �� ������������ */ 
            'banned',       /* ��� ������������ */ 
            '',   /* ������������ ������ */ 
            'auction');     /* ���� ������ ��� �������� �� ��������� */ 

if (!$link) { 
   printf("���������� ������������ � ���� ������. ��� ������: %s\n", mysqli_connect_error()); 
   exit; 
}
//echo("OK");
//$username = "ii@mail.ru";
//$password = "827CCB0EEA8A706C4C34A16891F84E7B";
/* �������� ������ ������� */ 
if ($result = mysqli_query($link, "SELECT UserId, UserRole, UserName FROM Users WHERE
	UserMail = '$username' AND UserPass = '$password'")) { 

	// echo (mysqli_result($result,0,'UserId'));
	// echo mysqli_result($result,0,'UserName');
    /* ������� ����������� ������� */ 
    session_start();
    while( $row = mysqli_fetch_assoc($result) ){ 
   // $_SESSION['username'] = $username;
	$_SESSION['userid'] = $row['UserId'];
	$_SESSION['urole'] = $row['UserRole'];
    //echo $row['UserId'];
    echo json_encode(array('status' => 'OK','username'=> $row['UserName'], 'userrole'=> $row['UserRole'] ));
    //echo $row['UserName'];
   // echo $row['UserRole'];
   // echo $row['UserRole'];
           // printf("%s (%s) %s\n", $row['UserId'], $row['UserRole'], $row['UserName']); 
    } 

    /* ����������� ������������ ������ */ 
    mysqli_free_result($result); 
} 

/* ��������� ���������� */ 
mysqli_close($link); 
?>