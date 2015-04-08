<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Miconexion = "mysql.hostinger.es";
$database_Miconexion = "u913187578_t";
$username_Miconexion = "u913187578_u";
$password_Miconexion = "";
$Miconexion = mysql_pconnect($hostname_Miconexion, $username_Miconexion, $password_Miconexion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>