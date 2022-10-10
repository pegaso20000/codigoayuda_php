<?php
	
	require 'conexion.php';


	// se obtiene la variable del id 
	$id = $_GET['id'];

	//-------------------------------------------------------------------------------------

	
	// se hace la consulta a la tabla con el where y que se elimine desde el id hacia adelante
	//(si no se pone el where se eliminara toda la tabla)

	$sql = "DELETE FROM personas WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">

				<!-- mensaje si se elimino correctamente o no -->
				<?php if($resultado) { ?>
				<h3>REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR AL ELIMINAR</h3>
				<?php } ?>
				
				<a href="index.php" class="btn btn-primary">Regresar</a>

				<!-- ----------------------------------------------------------- -->
				
				</div>
			</div>
		</div>
	</body>
</html>
