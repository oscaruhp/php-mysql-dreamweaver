<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Miconexion = "localhost";
$database_Miconexion = "basededatoslocal";
$username_Miconexion = "root";
$password_Miconexion = "123";
$Miconexion = mysql_pconnect($hostname_Miconexion, $username_Miconexion, $password_Miconexion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>