<?php
mysql_connect("SERVER","USER","PASSWORD") or die("Не удалось создать соединение");
mysql_select_db("DATABASE") or die(mysql_error());
?> 
