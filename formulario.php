<?php
print_r($_GET);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<form id="form1" name="form1" method="get" action="formulario.php">

  <table width="424" border="1">
    <tr>
      <td width="111"><label for="nombre2">Nombre:</label></td>
      <td width="297"><input type="text" name="nombre" id="nombre" /></td>
    </tr>
    <tr>
     <td><label for="telefono">Teléfono</label>:</td>
      <td><input type="text" name="telefono" id="telefono" /></td>
    </tr>
    <tr>
      <td><label for="comentario">Comentario:</label></td>
      <td><textarea name="comentario" id="comentario" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>
    </tr>
  </table>
</form>
</body>
</html>
