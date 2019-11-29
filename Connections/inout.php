<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_inout = "localhost";
$database_inout = "menshop";
$username_inout = "root";
$password_inout = "";
$inout = mysql_pconnect($hostname_inout, $username_inout, $password_inout) or trigger_error(mysql_error(),E_USER_ERROR); 
?>