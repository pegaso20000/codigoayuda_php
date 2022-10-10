<?php
	
	require 'conexion.php';

	// crear la variable 
	
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$estado_civil = $_POST['estado_civil'];
	$hijos = isset($_POST['hijo']) ? $_POST['hijos'] : 0;  // cuando en el formulario se usa input radio
	$intereses = isset($_POST['intereses']) ? $_POST['intereses'] : null;  // cuando en el formulario se usa input de checkbox
	
	// se crea variable array para intereses(checkbox)
	$arrayIntereses = null;

	// contar elementos hay que traer de intereses
	$num_array = count($intereses);

	//otro contador
	$contador = 0;
	
	//si la variable numarray es mayor a 0 se realiza la accion
	if($num_array>0){
		//foreach:ayuda a recorre la array
		foreach ($intereses as $key => $value) {
			if ($contador != $num_array-1)
			$arrayIntereses .= $value.' ';
			else
			$arrayIntereses .= $value;
			$contador++; //ira contando los datos
		}
	}

	// se hace la consulta a la base de datos
	
	$sql = "INSERT INTO personas (nombre, correo, telefono, estado_civil, hijos, intereses) VALUES ('$nombre', '$email', '$telefono', '$estado_civil', '$hijos', '$arrayIntereses')";

	//se ejecuta llamando a la variable de la conexion.php
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
				
				<!-- if para mandar mensaje que el registro a sido guardado -->
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<!-- hacia donde ira cuando los datos han sido guardados -->
					<a href="index.php" class="btn btn-primary">Regresar</a>

					<!-- --------------------------------------------------- -->
					
				</div>
			</div>
		</div>
	</body>
</html>
