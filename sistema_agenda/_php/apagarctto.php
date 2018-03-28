<?php
//vai usar o mesmo nome do campo name(do select) da pasta apagar apagarctt.php (no cado email_slc)
$email = $_POST ["email_slc"];
include("conexao.php");
$consulta = "DELETE FROM tb_contatos WHERE email = '$email'";
$executar_consulta = $conexao->query($consulta);

if($executar_consulta)
	$mensagem = "Contato Apagado!";
else
	$mensagem = "Ops :( Não foi possível realizar a ação!";

$conexao->close();

//mostrar a mensagem que é justamente a que acabou de ser criada
header("Location:../index.php?op=apagar&mensagem=$mensagem");

?>