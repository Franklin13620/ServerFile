<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
	<title>Laboratorio2</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">	
</head>
<body>
	<?php
			$filtro = "";
			if(isset($_GET["filtro"])){
				$filtro = $_GET["filtro"];
			}
			echo"
			<form method='get' action='$_SERVER[PHP_SELF]'>
			<table align='center' width='95%'>
			<tr>
			<td><h1>[Lista de ficheros]</h1></td>
			</td>
			</tr>
			<tr>
			<td>
			Buscar Archivo:
			<input type='text' name='filtro'style='height:24px;width='100%';border:solid 2px black;
			value='$filtro'> 
			<input type='submit' value='Buscar'>
			</td>
			</tr>
			<tr>
				<td align='right' heigth='40px'>
				<a href='form_subir.php'>Subir Archivo</a>
				<a href='crear_archivo.php'>Crear Archivo</a>
				/*<a href='fuente/Fuente.rar'>Codigo Fuente</a>*/
		</td>
		</tr>
		<tr>
		<td align='center'>
			<table style='width=100%,border-collapse:collapse;'>
			<tr style='background-color:black;color:white;'</tr>
			<td align='center'>Ext
			<td align='center'>No.
			<td width='60%'>Nombre Fichero
			<td width='50%'align='center'>Tamaño
			<td align='center'>Opciones
				</tr>";
	//lISTANDO FICHEROS
	$directorioBase = "./archivos";
	if (is_dir($directorioBase)) {
	$idDirectorio = opendir($directorioBase);
	$n=0;
	while (($cadaFichero = readdir($idDirectorio))!=false) {
		$mostrarArchivo = true;
		if($filtro!=""){
			$mostrarArchivo = strpos($cadaFichero,$filtro);
		}
		if ($mostrarArchivo==true) {

			if ($cadaFichero!="." && $cadaFichero!="..") {
				$n++;
			$tamanioFichero = filesize($directorioBase."/".$cadaFichero)/1048576;
			$tamanioFichero = number_format($tamanioFichero,4)."MB";
			$ext = explode('.', $cadaFichero)[1];
			echo "
			<tr>
			<td align='center'><img class='pequeña' src='imagenes/iconos/$ext.png'>
			<td align='center'>$n
			<td >$cadaFichero
			<td align='center'>$tamanioFichero
			<td align='center'> 
			<!--Direccion descargar Archivo-->
			<a href='eliminar.php?file=$cadaFichero&&directoriobase=$directorioBase' class='itemMenu'>[Eliminar]</a>
			<a href='descarga.php?file=$cadaFichero&&directoriobase=$directorioBase' class='itemMenu'>[Descargar]</a>
			<a href='renombrar.php?file=$cadaFichero&&directoriobase=$directorioBase' class='itemMenu'>[Renombrar]</a>
				</td>
				</tr>
			";
			}
			
		}
	}
			closedir($idDirectorio);
				}else{
				echo"<tr>
			<td colspan='4' align='center'>No existe el directorio</td>
				</tr>";
			}
			echo"<table></td></tr></table>
			</form>";
?> 
</body>
</html>
