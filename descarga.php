<?php

if (isset($_GET['file'])) {
	$archivo = $_GET['file'];	
}
if (isset($_GET['directoriobase'])) {
	$directorio = $_GET['directoriobase'];	
}

$extension = $directorio."/".$archivo;
header ("Content-Disposition: attachment; filename=".$archivo."");
header ("Content-Type: application/octet-stream");
header ("Content-Length:".filesize($extesion));
readfile($extension);
?>