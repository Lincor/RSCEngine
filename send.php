<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<?php
session_start();
include 'bd.php';
$query="INSERT INTO messages (from_id, to_id, message) VALUES ('".$_SESSION['id']."', '".$_POST['to_id']."', '".$_POST['message']."')";
echo $query;
mysql_query($query);
mysql_close();
echo "Запрос выполнен";
?> 
