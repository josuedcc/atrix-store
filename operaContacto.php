<?php
$conexion = new mysqli('localhost', 'root', '', 'atrixdb');
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$email = trim($_POST['email']);
$telefono = trim($_POST['telefono']);
$direccion = trim($_POST['direccion']);
$departamento = trim($_POST['departamento']);
$provincia = trim($_POST['provincia']);
$distrito = trim($_POST['distrito']);
$comentario = trim($_POST['comentario']);
$codPrd = trim($_POST['codPrd']);

$nom_ape=$nombre." ".$apellido;
$comando = "insert into contactados (nombre_apellido, email, telefono, direccion, departamento, provincia, distrito, comentario, fecha_creacion, cod_prd) 
values ('$nom_ape', '$email', '$telefono', '$direccion', '$departamento', '$provincia', '$distrito', '$comentario', sysdate(),$codPrd);";
    mysqli_query($conexion,$comando);



?>