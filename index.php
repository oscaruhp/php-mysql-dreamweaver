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

$maxRows_FrontEnd = 10;
$pageNum_FrontEnd = 0;
if (isset($_GET['pageNum_FrontEnd'])) {
  $pageNum_FrontEnd = $_GET['pageNum_FrontEnd'];
}
$startRow_FrontEnd = $pageNum_FrontEnd * $maxRows_FrontEnd;

mysql_select_db($database_Miconexion, $Miconexion);
$query_FrontEnd = "SELECT * FROM productos";
$query_limit_FrontEnd = sprintf("%s LIMIT %d, %d", $query_FrontEnd, $startRow_FrontEnd, $maxRows_FrontEnd);
$FrontEnd = mysql_query($query_limit_FrontEnd, $Miconexion) or die(mysql_error());
$row_FrontEnd = mysql_fetch_assoc($FrontEnd);

if (isset($_GET['totalRows_FrontEnd'])) {
  $totalRows_FrontEnd = $_GET['totalRows_FrontEnd'];
} else {
  $all_FrontEnd = mysql_query($query_FrontEnd);
  $totalRows_FrontEnd = mysql_num_rows($all_FrontEnd);
}
$totalPages_FrontEnd = ceil($totalRows_FrontEnd/$maxRows_FrontEnd)-1;
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
        
        <div class="row">
		
         <?php do { ?>
        		<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="imagenesProductos/<?php echo $row_FrontEnd['Imagen']; ?>">
                        

                        
						<div class="caption">
							<h3>
								<?php echo $row_FrontEnd['Nombre']; ?>
							</h3>
							<p>
	                             <strong>Precio:$ <?php echo $row_FrontEnd['Precio']; ?></strong><br/>
								<?php echo $row_FrontEnd['Descripcion']; ?>
							</p>
							<p>
								<a class="btn btn-primary" href="ProductoDetalle.php?Clave=<?php echo $row_FrontEnd['Clave']; ?>">Ver</a> <a class="btn" href="#">Comprar</a>
							</p>
						</div>
					</div>
				</div>
                
		    <?php } while ($row_FrontEnd = mysql_fetch_assoc($FrontEnd)); ?>
        
        
        
        	</div>
 

      



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
mysql_free_result($FrontEnd);
?>
