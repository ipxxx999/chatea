<?php

$servidor = "localhost";
$usuario= "root";
$password = "Admin123.";
$base_datos = "chat_ajax";



$conexion = new mysqli($servidor, $usuario, $password, $base_datos);


function formatearFecha($fecha){
	return date('g:i a', strtotime($fecha));
}


?>