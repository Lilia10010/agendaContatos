<?php
$servidor = "localhost";
$usuario = "root";
$pass = "";
$db = "bd_contatos";

$conn = mysqli_connect($servidor, $usuario, $pass, $db);
/*
if(!$conn){
	die("Falha na conexão com o banco de dados :( ".mysqli_connect_error());		
}else{
	echo "Conectado :p";
} */
?>
