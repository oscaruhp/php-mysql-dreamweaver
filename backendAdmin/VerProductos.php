<?php require_once('../Connections/Miconexion.php'); ?>
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

if ((isset($_GET['Clave'])) && ($_GET['Clave'] != "")) {
  $deleteSQL = sprintf("DELETE FROM productos WHERE Clave=%s",
                       GetSQLValueString($_GET['Clave'], "int"));

  mysql_select_db($database_Miconexion, $Miconexion);
  $Result1 = mysql_query($deleteSQL, $Miconexion) or die(mysql_error());

  
}

$maxRows_backend = 10;
$pageNum_backend = 0;
if (isset($_GET['pageNum_backend'])) {
  $pageNum_backend = $_GET['pageNum_backend'];
}
$startRow_backend = $pageNum_backend * $maxRows_backend;

mysql_select_db($database_Miconexion, $Miconexion);

$query_backend = "SELECT * FROM productos WHERE 1=1 ";
if(isset($_POST['buscar'])){
	$query_backend=$query_backend." AND Nombre LIKE '%".$_POST['buscar']."%'";
	}

$query_limit_backend = sprintf("%s LIMIT %d, %d", $query_backend, $startRow_backend, $maxRows_backend);
$backend = mysql_query($query_limit_backend, $Miconexion) or die(mysql_error());
$row_backend = mysql_fetch_assoc($backend);

if (isset($_GET['totalRows_backend'])) {
  $totalRows_backend = $_GET['totalRows_backend'];
} else {
  $all_backend = mysql_query($query_backend);
  $totalRows_backend = mysql_num_rows($all_backend);
}
$totalPages_backend = ceil($totalRows_backend/$maxRows_backend)-1;
?>
<!DOCTYPE html>
<html class='no-js' lang='en'><!-- InstanceBegin template="/Templates/BackendDashboard.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Lista de productos</title>
    <!-- InstanceEndEditable -->
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" /><link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>
      <a class='navbar-brand' href='#'>
        <i class='icon-bullhorn'></i>
        Administrador
      </a>
      <ul class='nav navbar-nav pull-right'>
        <li class='dropdown'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-envelope'></i>
            Messages
         
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
           
            <li>
              <a href='Mensajes.php'>Inbox</a>
            </li>
            <li>
              <a href='#'>Borrar</a>
            </li>
          </ul>
        </li>
       
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-user'></i>
            <strong>John DOE</strong>
            <img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href="/">Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div id='wrapper'>
      <!-- Sidebar -->
      <section id='sidebar'>
        <i class='icon-align-justify icon-large' id='toggle'></i>
        <ul id='dock'>
        <li class='launcher'> <i class='icon-file-text-alt'></i> <a href="AgregarProductos.php">Agregar</a> </li>
  <li class='launcher'> <i class='icon-list'></i> <a href="VerProductos.php">Lista</a> </li>
  <li class='launcher'> <i class='icon-user'></i> <a href='Usuarios.php'>Usuarios</a> </li>
          <li class='launcher'> <i class='icon-envelope'></i> <a href='Mensajes.php'>Mensajes</a> </li>
        </ul>
       
        <div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
      </section>
      <!-- Tools -->
      <section id='tools'><!-- InstanceBeginEditable name="BreadCrub" -->
      <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Dashboard</li>
        <li><a href="#">Lista de productos</a></li>
      
      </ul>
      <!-- InstanceEndEditable -->
        
      </section>
      <!-- Content -->
      <div id='content'>
      
       
		
		<!-- InstanceBeginEditable name="Contenido" -->
         <div class='panel panel-default grid'>
         
        
        <div class="panel-heading">
        Lista de productos
        </div>
        <div class="panel-body filters">
           <form action="VerProductos.php" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="input-group">
                
                  <input class="form-control" placeholder="Buscar" name="buscar" id="buscar" type="text">
                  <span class="input-group-btn">
                    <button class="btn" type="submit">
                      <i class="icon-search"></i>
                    </button>
                  </span>
                  
                </div>
              </div>
            </div>
            </form>
          </div>
<table border="1" class="table">
 <thead>
 <tr>
    <th width="2%">Editar </th>
    <th width="2%">Borrar</th>
    <th width="2%">Clave</th>
    <th width="16%">Nombre</th>
    <th width="20%">Descripcion</th>
    <th width="5%">Precio</th>
    <th width="5%">cantidad</th>
    <th width="16%">Imagen</th>
    </tr>
 </thead>
  <?php do { ?>
    <tr>
      <td>
      <a class="btn btn-info" href="EditarProductos.php?ClaveEditar=<?php echo $row_backend['Clave']; ?>">
                    <span class="icon-edit"></span>
                  </a></td>
      <td><a class="btn btn-danger" onClick="javascript: if(!confirm('¿Borrar?')){return false;}" href="VerProductos.php?Clave=<?php echo $row_backend['Clave']; ?>">
                    <span class="icon-trash"></span>
                  </a></td>
      <td><?php echo $row_backend['Clave']; ?></td>
      <td><?php echo $row_backend['Nombre']; ?></td>
      <td><?php echo $row_backend['Descripcion']; ?></td>
      <td><?php echo $row_backend['Precio']; ?></td>
      <td><?php echo $row_backend['cantidad']; ?></td>
      <td>
	  <img class="img-thumbnail img-responsive"  width="150" src="../imagenesProductos/<?php echo $row_backend['Imagen']; ?>"/>
      
	  
      
      </td>
    </tr>
    <?php } while ($row_backend = mysql_fetch_assoc($backend)); ?>
</table>


</div>
<!-- InstanceEndEditable -->
        
  </div>
  <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->

  </body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($backend);
?>
