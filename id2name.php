<?php
function login($id) {
	$query="SELECT login FROM users WHERE id=".$id;
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$login=$row['login'];
	return $login;
}

function id($login) {
	$query="SELECT id FROM users WHERE login='".$login."'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$id=$row['id'];
	return $id;
}
?> 
