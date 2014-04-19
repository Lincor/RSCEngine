<?php
session_start();
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<title>Ralt Social Club</title>
		<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
	</head>
	<body>
		<div id="header"></div>
		<center><h3>RSC - первая <a href="http://www.gnu.org/philosophy/free-sw.html">свободная</a> социальная сеть</h3></center>
<?php
if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
	$html = <<<EOF
			Для использования RSC войдите или <a href="reg.php">зарегистрируйтесь</a>.<br><br>
			Вход:<br><br>
			<form action="login.php" method="POST">
				Логин: <input type="text" name="login">
				<br><br>
				Пароль: <input type="password" name="password">
				<br><br>
				<input type="submit" value="Войти">
			</form>
EOF;
	print($html);
} else {
	$html = <<<EOF
			<form action="dialog.php" method="POST">
				Логин собеседника: <input type="text" name="to_login">
				<br><br>
				<input type="submit" value="Открыть диалог">
			</form>
			<form action="logout.php">
				<input type="submit" value="Выход">
			</form>
EOF;
	print($html);
}
?>
	</body>
</html>
