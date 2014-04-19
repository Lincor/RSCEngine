<?php
header("Location: index.php");
print("<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>");
session_start();
if (!isset($_POST['login']) or !isset($_POST['password'])) {
	die("Не все данные введены.");
} else {
	include 'bd.php';
	$query="SELECT id,login,password FROM users WHERE login='".$_POST['login']."'";
	$result=mysql_query($query);
	if (mysql_num_rows($result)==0) {
		die("Пользователь с таким логином не найден.");
	} else {
		$row=mysql_fetch_array($result);
		if ($row['password']!=md5($_POST['password'])) {
			die("Неверный пароль.");
		} else {
			$_SESSION['login']=$row['login'];
			$_SESSION['id']=$row['id'];
		}
	}
}
?> 
