<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'curso');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>