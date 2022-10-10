<?php

include("conexion.php");
$con=conectar();

$id=$_POST['id'];
$patente=$_POST['patente'];
$nombre_chofer=$_POST['nombre_chofer'];
$apellido_chofer=$_POST['apellido_chofer'];
$rut=$_POST['rut'];
$flota=$_POST['flota'];
$desde=$_POST['desde'];
$hasta=$_POST['hasta'];


$sql="UPDATE buses SET  patente='$patente',nombre_chofer='$nombre_chofer',apellido_chofer='$apellido_chofer',rut='$rut',flota='$flota',desde='$desde',hasta='$hasta' WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: buses.php");
    }
?>