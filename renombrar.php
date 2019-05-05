<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Renombar</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<?php
if (isset($_GET['file'])) {
	$archivo = $_GET['file'];	
}
if (isset($_GET['directoriobase'])) {
	$directorio = $_GET['directoriobase'];	
}
$extension = $directorio."/".$archivo;

if(isset($_POST['result'])){
	$ext = explode('.', $archivo)[1];
	$nuevoNombre = $_POST['result'];
rename($extension,$directorio."/".$nuevoNombre.".".$ext);?>
<script type="text/javascript">window.location.replace('index.php');</script>
<?php

}

echo"<br><center><form method='post' action=''>
<label><h1>Nombre Actual:</h1>
</labe>
<input type='text' readonly value='$archivo'>
<label><h1>Nuevo Nombre:</h1></label>
<input type='text' name='result' >
<input type='submit' value='Renombrar'>
<br><br>
<a href='index.php'>Inicio</a>
</form></center>";

?>	
</body>
</html>

