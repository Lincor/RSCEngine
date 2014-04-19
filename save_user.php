<?php
header("Location: index.php");
if (!isset($_POST['login']) or !isset($_POST['password']) or !isset($_POST['mail'])) {
	die("Не все данные введены.");
} else {
	include 'bd.php';
	$query="SELECT id FROM users WHERE login=".$_POST['login'];
	$result=mysql_query($query);
	if (mysql_num_rows($result)!=0) {
		die("Пользователь с таким логином уже зарегистрирован");
	} else {
		$query="INSERT INTO users (login, password, mail) VALUES ('".$_POST['login']."', '".md5($_POST['password'])."', '".$_POST['mail']."')";
		mysql_query($query);
	}
}
?>
