<?php
$dbhost	= 'localhost';
$dbusn	= 'root';
$dbpass	= '';
$dbname	= 'menshop';
$dbconn	= mysql_connect($host,$dbusn,$dbpass);
$dbopen	= mysql_select_db($dbname,$dbconn);
?>