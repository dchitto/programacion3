<?php
$server = "db";
$usuario = "usuario";
$password = "abcde5678";
$baseDatos = "datos";


// Crea conexión (objeto)
$conexión = new mysqli($server, $usuario, $password, $baseDatos);

// Verifica estab lecimientro de la conexión:
if ($conexión->connect_error) {
  die("Fallo al conectar: " . $conexión->connect_error);
}
?>
