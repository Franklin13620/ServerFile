<!DOCTYPE html>
<html>
<head>
	<title>Crear Archivo</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<?php
$contenido = "";
$resultado = "";
$extension = "";
$chk1=" checked";
$chk2="";
$nombre="";
if ($_POST) {
	$contenido =$_POST["contenido"];
	$extension= $_POST["extension"];
	$nombre=$_POST["nombre"];
	$nombreFichero = $nombre.".".$extension;
	$destino = "./archivos/$nombreFichero";
	$idFichero = fopen($destino, "w");
	if(fwrite($idFichero,$contenido)){
		$estado = "<font color='blue'>[OK]</font>";
		$tamanioFichero = filesize($destino)/1048576;
		$tamanioFichero = number_format($tamanioFichero,6)."MB";
	}else{
		$estado = "<font color='red'>[FALL&OAcute;]:Error de escritorio </font>";
		$tamanioFichero="-";
	}
fclose($idFichero);
	$resultado="<div style='background: white;'>
	<table style='border-collapse:collapse;width:90%;'>
	<tr><td colspan='4'>[Detalles del Archivo]
	</td></tr>
	<tr>
	<td width='275px''>Nombre Fichero:
	<td><b>[$nombreFichero]</b>
	<td>Tama&ntilde;o del Fichero:
	<td><b>[$tamanioFichero]</b>
	</tr>
	<tr>
	<td>Extension:
	<td><b>[$extension]</b>
	<td>Ruta Destino:
	<td><b>[$destino]</b>
	</tr>
	<tr>
	<td>Estado:
	<td colspan='3'>estado
	</tr>
	</table>
		</div>";
	}
if ($extension=="html") {
	$chk1=" checked";
}elseif($extension=="txt"){
	$chk2=" checked";
}else{
	$chk1=" checked";
	$chk2="";
}
echo"<form method=\"post\" action=\"$_SERVER[PHP_SELF]\">
<table align='center' width='95%'>
<tr><td align='center'><h1>Edici&oacute;n de Archivos de Texto</h1></td></tr>
<tr><td align='left'>Nombre del Fichero:
<input type=text name=nombre value=''class='caja'></td></tr>
<tr>
<td align='center' valign='top'>
<textarea name='contenido' class='caja' style='width:100%;height:250px'>$contenido</textarea>
</td>
</tr>
<tr>
<td align='center'>
<b>[Extension]&raquo;</b>
HTML<input type=radio name='extension' value='html'$chk1>
TXT<input type=radio name='extension' value='txt'$chk2>
</tr>
<tr>
<td align='center'>
<input type=submit value='Crear Documento' class='boton'>
<input type=button value='Principal' class='boton' onclick=\"window.location.replace('index.php');\">
<input type=button value='Cancelar' class='boton' onclick=\"location.replace('index.php');\">
</td>
</tr>
<tr><td height='20px'></td></tr>
<tr><td align='center'>$resultado</td></tr>
</table>
</form>";
?>
</body>
</html>