<?php  include("Watimage.php"); ?>

<?php 

if(isset($_POST['submit'])){
	$NombreArchivoServidor= $_FILES['Archivo']['name'];
	if (move_uploaded_file($_FILES['Archivo']['tmp_name'], $NombreArchivoServidor))
		{
			echo "Se copio el archivo";
			echo "<br />";
			
			$imagen1 = new Watimage();
			$imagen1->setImage( $NombreArchivoServidor);
			
			$imagen1->setWatermark('logo.png');
			$imagen1->resize(array('type' => 'resizecrop', 'size' => 300));
			$imagen1->flip('horizontal');
			$imagen1->rotate(90);
			$imagen1->applyWatermark();
			
			if ( !$imagen1->generate("imagen1_".$NombreArchivoServidor) ) {
				echo "Hay errores a la hora de crear la nueva imagen";
				print_r($wm->errors);
			}else{
			echo "<br />";
			echo '<img src="'."imagen1_".$NombreArchivoServidor.'" />';
			}
			
			$imagen2 = new Watimage();
			$imagen2->setImage($NombreArchivoServidor);
			$imagen2->setWatermark(array('file'=>'logo.png','margin' => array('-10', '-10')));
			$imagen2->resize(array('type' => 'resizemin', 'size' => 200,'quality'=>100));
			$imagen2->applyWatermark();
			if ( !$imagen2->generate("imagen2_".$NombreArchivoServidor) ) {
				echo "Hay errores";
				print_r($imagen2->errors);
			}
			echo "<br />";
			echo '<img src="'."imagen2_".$NombreArchivoServidor.'" />';
			echo "<br />";
			
			
		}
		else
		{ 
			echo "Hay algo mal";
		}
}

?>

<form action="?" method="post" enctype="multipart/form-data">
    Seleccionar una imagen :
    <input type="file" name="Archivo" id="Archivo">
    <input type="submit" value="Subir Imagen" name="submit">
</form>
