<?php
session_start();
include 'bd.php';
include 'id2name.php';
$query="SELECT * FROM messages WHERE (to_id=".$_SESSION['id']." AND from_id=".$_POST['to_id'].") OR (from_id=".$_SESSION['id']." AND to_id=".$_POST['to_id'].")";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)) {
	printf("<hr>");
	$login=login($row['from_id']);
	if ($row['from_id']==$_SESSION['id']) {
		$color="red";
	} else {
		$color="green";
	}
	printf("<font color=\"".$color."\">".htmlspecialchars($login)."</font>: ".htmlspecialchars($row['message']));
	printf("<hr>");
}
mysql_close();
?>
 
