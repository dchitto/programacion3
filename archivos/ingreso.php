<?php

//incluye la conexion del archivo conecta.php
include ("../conecta.php");

//variables de 
$tipo_doc = $_POST["tipo_doc"];
$documento = $_POST["documento"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$recordar = $_POST["recordar"];

//crea tabla
$sql = "CREATE TABLE IF NOT EXISTS ingreso (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tipo_doc VARCHAR(50) NOT NULL,
documento VARCHAR(50) NOT NULL,
usuario VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
recordar VARCHAR(5),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

//error en creacion de tabla
if ($conexión->query($sql) === FALSE) {
  echo "Error creando la tabla: " . $conexión->error;
}

//consulta
$sql = "SELECT tipo_doc, documento, usuario, passwordA FROM registro WHERE tipo_doc = '".$tipo_doc."' AND documento = '".$documento."' AND usuario = '".$usuario."' AND passwordA = '".$password."'";

$resultado = $conexión->query($sql);

//verificacion de la consulta
if ($resultado->num_rows > 0) {
  $sql = "INSERT INTO ingreso (tipo_doc, documento, usuario, password, recordar) VALUES('".$tipo_doc."' , '".$documento."' , '".$usuario."' , '".$password."' , '".$recordar."')";
  $conexión->query($sql);
} else {
  echo "Error al insertar en la tabla: " .$conexión->error;
}


//cierre de conexion
$conexión->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tarjetas - Creación de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
		  h1 { font-size: 60px; color: white; }
		  h2 { color:white; }
	  </style>
</head>
<body class="bg-cover bg-center bg-no-repeat min-h-screen flex items-center justify-center p-4 font-sans" 
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15)), url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80');">
  	<h1> Bienvenido usuario <?php echo "$usuario"?><br><br><br><br></h1>
	  <h2> Su saldo actual es de: $1.000,00 y tiene una deuda de $215.538.419,99</h2>
</body>
</html>
