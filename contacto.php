<?php require_once('Connections/Miconexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO mensajes (id, Asunto, Mensaje, leido) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString('null', "int"),
                       GetSQLValueString($_POST['Asunto'], "text"),
                       GetSQLValueString($_POST['Mensaje'], "text"),
                       GetSQLValueString(0, "int"));

  mysql_select_db($database_Miconexion, $Miconexion);
  $Result1 = mysql_query($insertSQL, $Miconexion) or die(mysql_error());
}

mysql_select_db($database_Miconexion, $Miconexion);
$query_Recordset1 = "SELECT * FROM mensajes";
$Recordset1 = mysql_query($query_Recordset1, $Miconexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/FrontEnd.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
  <meta charset="utf-8">
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Bootstrap 3, from LayoutIt!</title>
  <!-- InstanceEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap.min_theme.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<!-- InstanceBeginEditable name="head" -->
	<!-- InstanceEndEditable -->
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Sitio Web</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="index.php">Productos</a>
						</li>
						<li>
							<a href="contacto.php">Contacto</a>
						</li>
						
					</ul>
					
				</div>
				
			</nav>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column"><!-- InstanceBeginEditable name="Contenido" -->
<?php if(isset($_POST['Asunto'])){ echo "Mensaje enviado ";}?>
        <h2>Contacto </h2>
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
          <table height="210" align="center">
            <tr valign="baseline">
              <td width="55" height="31" align="right" nowrap>Asunto:</td>
              <td width="372"><input type="text" name="Asunto" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td height="103" align="right" nowrap>Mensaje:</td>
              <td>
             
              <textarea name="Mensaje" cols="100" rows="5"></textarea>
              
              </td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input type="submit" value="Enviar Mensaje"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1">
        </form>
        <p>&nbsp;</p>
        <!-- InstanceEndEditable -->
        
			
                
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			 <address> <strong>Develoteca, Inc.</strong><br> http://develoteca.com<br> </address>
		</div>
	</div>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>
