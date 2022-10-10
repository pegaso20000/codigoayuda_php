<?php 
    include("conexion.php");
    $con=conectar();

    $where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE flota LIKE '%".$valor."%' or nombre_chofer LIKE '%".$valor."%' or apellido_chofer LIKE '%".$valor."%'";
		}
	}

    

    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Buses </title>
        <meta charset="UTF-8">
        <link rel="icon" href="../imagenes/icon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>Buscar: </b><input type="text" id="campo" name="campo" placeholder="nombre, apellido del chofer o flota" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
				</form>
                        
                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">

                                
                                    <input type="text" class="form-control mb-3" name="patente" placeholder="patente" required>
                                    <input type="text" class="form-control mb-3" name="nombre_chofer" placeholder="nombre del chofer" required>
                                    <input type="text" class="form-control mb-3" name="apellido_chofer" placeholder="apellido" required>
                                    <input type="text" class="form-control mb-3" name="rut" placeholder="rut" required>
                                    <input type="text" class="form-control mb-3" name="flota" placeholder="Nombre de la Flota" required>
                                    
                               

                                <select name="desde" class="form-control mb-3" required>
                                    <option label="selecione el dia desde que trabajara" value=""></option>
                                    <option label="lunes" value="lunes"></option>
                                    <option label="martes" value="martes"></option>
                                    <option label="miercoles" value="miercoles"></option>
                                    <option label="jueves" value="jueves"></option>
                                    <option label="viernes" value="viernes"></option>
                                    <option label="sabado" value="sabado"></option>
                                    <option label="domingo" value="domingo"></option>
                                                            
                                </select>


                                <select name="hasta" class="form-control mb-3" required>
                                    <option label="selecione el dia hasta que trabajara" value=""></option>
                                    <option label="lunes" value="lunes"></option>
                                    <option label="martes" value="martes"></option>
                                    <option label="miercoles" value="miercoles"></option>
                                    <option label="jueves" value="jueves"></option>
                                    <option label="viernes" value="viernes"></option>
                                    <option label="sabado" value="sabado"></option>
                                    <option label="domingo" value="domingo"></option>
                                                            
                                </select>


                                    <input type="submit" class="btn btn-primary" name="enviar">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Id</th>
                                        <th>Patente</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Rut</th>
                                        <th>Flota</th>
                                        <th>Desde el dia</th>
                                        <th>Hasta el dia</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>
                                        <?php

                                            $sql="SELECT *  FROM buses $where";
                                            $query=mysqli_query($con,$sql);
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['id']?></th>
                                                <th><?php  echo $row['patente']?></th>
                                                <th><?php  echo $row['nombre_chofer']?></th>
                                                <th><?php  echo $row['apellido_chofer']?></th>
                                                <th><?php  echo $row['rut']?></th>
                                                <th><?php  echo $row['flota']?></th>
                                                <th><?php  echo $row['desde']?></th>
                                                <th><?php  echo $row['hasta']?></th>
                                                <th><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>
                                                                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>