<?php require_once('../Connections/Miconexion.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	


	$NombreArchivoServidor= $_FILES['Imagen']['name'];
if($NombreArchivoServidor==''){
	
		$NombreArchivoServidor= $_POST['ImagenOriginal'];
	}	
  $updateSQL = sprintf("UPDATE productos SET Nombre=%s, Descripcion=%s, Precio=%s, cantidad=%s, Imagen=%s WHERE Clave=%s",
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Descripcion'], "text"),
                       GetSQLValueString($_POST['Precio'], "double"),
                       GetSQLValueString($_POST['cantidad'], "int"),
                       GetSQLValueString($NombreArchivoServidor, "text"),
                       GetSQLValueString($_POST['Clave'], "int"));

  mysql_select_db($database_Miconexion, $Miconexion);
  $Result1 = mysql_query($updateSQL, $Miconexion) or die(mysql_error());

   if($Result1){
	 
	 move_uploaded_file($_FILES['Imagen']['tmp_name'],"../imagenesProductos/".$NombreArchivoServidor);
	 
	}
	 
  $updateGoTo = "VerProductos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['ClaveEditar'])) {
  $colname_Recordset1 = $_GET['ClaveEditar'];
}
mysql_select_db($database_Miconexion, $Miconexion);
$query_Recordset1 = sprintf("SELECT * FROM productos WHERE Clave = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $Miconexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
            <strong><?php echo $_SESSION['MM_Username']; ?></strong>
            <img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <!-- InstanceBeginEditable name="Datoslogin" -->
		
           
              <a href="<?php echo $logoutAction ?>">Sign out</a>
          
		<!-- InstanceEndEditable -->
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
 
  <?php if($_SESSION['MM_UserGroup']==1) { ?>
  
  <li class='launcher'> <i class='icon-user'></i> <a href='Usuarios.php'>Usuarios</a> </li>
          <li class='launcher'> <i class='icon-envelope'></i> <a href='Mensajes.php'>Mensajes</a> </li>
          
        </ul>
       <?php } ?>
        <div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
      </section>
      <!-- Tools -->
      <section id='tools'><!-- InstanceBeginEditable name="BreadCrub" -->
      <ul class='breadcrumb' id='breadcrumb'>
        <li class='title'>Dashboard</li>
        <li><a href="#">Lorem</a></li>
        <li class='active'><a href="#">ipsum</a></li>
      </ul>
      <!-- InstanceEndEditable -->
        
      </section>
      <!-- Content -->
      <div id='content'>
      
       
		
		<!-- InstanceBeginEditable name="Contenido" -->
        
         <div class="panel-heading">
            <i class="icon-edit icon-large"></i>
            Editar producto
         </div>
      <div class="panel-body">    
         
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
<fieldset>
<div class="form-group">
 <label class="control-label">Clave:</label><?php echo $row_Recordset1['Clave']; ?>
 </div>
 
 <div class="col-xs-6">
 
 <div class="form-group">
 <label class="control-label">Nombre:</label>
 
 <input type="text" class="form-control"  name="Nombre" value="<?php echo htmlentities($row_Recordset1['Nombre'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
  </div>
  </div>
  
  
  <div class="col-xs-3">
                
                  <div class="form-group">
                  <label class="control-label">Precio</label>
                   <div class="input-group">
    <span class="input-group-addon">$</span>
                  
                   
                   <input  class="form-control" type="text" name="Precio" value="<?php echo htmlentities($row_Recordset1['Precio'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                   </div>
                </div>
                
     </div>
              <div class="col-xs-3">
                    <div class="form-group">
                  <label class="control-label">Cantidad</label>
                  
                   <input type="text" class="form-control" name="cantidad" value="<?php echo htmlentities($row_Recordset1['cantidad'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                </div>
                </div>
    <div class="col-xs-6">
  <div class="form-group">
 <label class="control-label">Descripci&oacute;n:</label>
 <textarea name="Descripcion"  class="form-control"  id="Descripcion" cols="45" rows="5"><?php echo htmlentities($row_Recordset1['Descripcion'], ENT_COMPAT, 'utf-8'); ?>
        </textarea>
  </div>

   </div>
       <div class="col-xs-6">
      
  <img  width="300" src="../imagenesProductos/<?php echo htmlentities($row_Recordset1['Imagen'], ENT_COMPAT, 'utf-8'); ?>"/>
     
     
       <input type="hidden" name="ImagenOriginal"  value="<?php echo htmlentities($row_Recordset1['Imagen'], ENT_COMPAT, 'utf-8'); ?>"/>
        <input type="file" name="Imagen" id="Imagen" />
        </div>
      
  <input type="submit"  class="btn btn-success"  value="Actualizar registro" /> <a href="AgregarProductos.php">Regresar</a>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="Clave" value="<?php echo $row_Recordset1['Clave']; ?>" />
</form>
<p>&nbsp;</p>
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
mysql_free_result($Recordset1);
?>
