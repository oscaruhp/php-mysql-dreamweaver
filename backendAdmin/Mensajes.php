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

if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM mensajes WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_Miconexion, $Miconexion);
  $Result1 = mysql_query($deleteSQL, $Miconexion) or die(mysql_error());
}

if ((isset($_GET['leido'])) && ($_GET['leido'] != "")) {
  $deleteSQL = sprintf("UPDATE mensajes SET leido=1 WHERE id=%s",
                       GetSQLValueString($_GET['leido'], "int"));

  mysql_select_db($database_Miconexion, $Miconexion);
  $Result1 = mysql_query($deleteSQL, $Miconexion) or die(mysql_error());
}



$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Miconexion, $Miconexion);
$query_Recordset1 = "SELECT * FROM mensajes ORDER BY id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $Miconexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html>
<html class='no-js' lang='en'><!-- InstanceBegin template="/Templates/BackendDashboard.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Dashboard</title>
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
       
        <li class='active'>Mensajes</li>
      </ul>
      <!-- InstanceEndEditable -->
        
      </section>
      <!-- Content -->
      <div id='content'>
      
       
		
		<!-- InstanceBeginEditable name="Contenido" -->
        
        
        
        <table border="1" class="table">
          <tr>
            <td>Borrar</td>
            <td>Asunto</td>
            <td>Mensaje</td>
            <td>leido</td>
          </tr>
          <?php do { ?>
            <tr>
              <td>
              
              <a class="btn btn-danger" onClick="javascript: if(!confirm('¿Borrar?')){return false;}" href="Mensajes.php?id=<?php echo $row_Recordset1['id']; ?>"> <span class="icon-trash"></span></a>
               
             <?php if(!$row_Recordset1['leido']){?>  <a class="btn btn-danger" onClick="javascript: if(!confirm('¿Marcar como leído?')){return false;}" href="Mensajes.php?leido=<?php echo $row_Recordset1['id']; ?>"> <span class="icon-eye-open"></span></a>
               
                <?php } ?>
             
              
              
              </td>
              <td><?php echo $row_Recordset1['Asunto']; ?></td>
              <td><?php echo utf8_encode(htmlentities($row_Recordset1['Mensaje'])); ?></td>
              <td <?php if(!$row_Recordset1['leido']){?> class="success" <?php }?>  ><?php if($row_Recordset1['leido']){echo "Si"; }else{echo "No";} ?></td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
		<!-- InstanceEndEditable -->
        
  </div>
  <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->

  </body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>
