<?php

if (isset($_GET['file'])) {
	$archivo = $_GET['file'];	
}
if (isset($_GET['directoriobase'])) {
	$directorio = $_GET['directoriobase'];	
}
$extension = $directorio."/".$archivo;

unlink($extension);




?>
<script type="text/javascript">window.location.replace('index.php');</script>