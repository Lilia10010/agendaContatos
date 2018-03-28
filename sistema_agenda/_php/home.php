
<?php
session_start();
$id = $_SESSION['usuarioId'];
$consulta = "SELECT * FROM tb_contatos WHERE id = '$id' ";
include("_php/tabela-resultado.php");
?>