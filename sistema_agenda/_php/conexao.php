<?php
function conectar(){
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "bd_contatos";

	$conect = new mysqli($servidor, $usuario, $senha, $bd);
	return $conect;
}

$conexao = conectar();

?>