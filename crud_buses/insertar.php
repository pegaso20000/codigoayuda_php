<?php

include("conexion.php");
$con=conectar();

if(isset($_POST['enviar'])){ 
$patente=$_POST['patente'];
$nombre_chofer=$_POST['nombre_chofer'];
$apellido_chofer=$_POST['apellido_chofer'];
$rut=$_POST['rut'];
$flota=$_POST['flota'];
$desde=$_POST['desde'];
$hasta=$_POST['hasta'];



$sql="INSERT INTO buses (patente,nombre_chofer,apellido_chofer,rut,flota,desde,hasta) VALUES('$patente','$nombre_chofer','$apellido_chofer','$rut','$flota','$desde','$hasta')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: buses.php");
    
}else {
}
}
?>