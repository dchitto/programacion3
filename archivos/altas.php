<?php

//incluye la conexion del archivo conecta.php
include ("../Clase 17 PHP&MySQL/conecta.php");

//variables de 
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$tipo_doc = $_POST["tipo_doc"];
$documento = $_POST["documento"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$email = $_POST["email"];
$banco_emisor = $_POST["banco_emisor"];
$usuario = $_POST["usuario"];
$passwordA = $_POST["passwordA"];

//crea tabla
$sql = "CREATE TABLE IF NOT EXISTS registro (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
apellido VARCHAR(30) NOT NULL,
tipo_doc VARCHAR(50) NOT NULL,
documento VARCHAR(50) NOT NULL,
fecha_nacimiento VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
banco_emisor VARCHAR(50) NOT NULL,
usuario VARCHAR(50) NOT NULL,
passwordA VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$conexión->query($sql);

$table = "registro";

//consulta
$sql = "INSERT INTO $table (nombre, apellido, tipo_doc, documento, fecha_nacimiento, email, banco_emisor, usuario, passwordA) VALUES ('".$nombre."', '".$apellido."', '".$tipo_doc."', '".$documento."', '".$fecha_nacimiento."', '".$email."', '".$banco_emisor."', '".$usuario."', '".$passwordA."')"; 

//verificacion de la consulta
if ($conexión->query($sql) === TRUE) {
  header("refresh:5;url=ingreso.html");
  echo "<p> Registro realizado con exito<br><br>";
  echo "Serás redirigido en 5 segundos...";
} else {
  echo "Error al insertar en la tabla: " .$conexión->error;
}


//cierre de conexion
$conexión->close();
?>