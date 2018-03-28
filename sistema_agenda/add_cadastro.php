<?php
 if(!isset($_SESSION))
    session_start();

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

include("conectar.php");
$consulta = "SELECT * FROM loginagenda WHERE email = '$email'";
$executar_consulta = $conn ->query($consulta);
$numero_registro = $executar_consulta->num_rows;

if($numero_registro == 0){
	$consulta = "INSERT INTO loginagenda (nome, email, senha) 
	                         VALUES('$nome', '$email', '$senha')";
	$executar_consulta = $conn->query(utf8_encode($consulta));	

	if($executar_consulta){
	 $_SESSION['cadastro'] = "Cadastro realizado com sucesso =)";
	 header("Location: logar.php");

	}else{
		$_SESSION['cadastro'] = "Não foi possivel cadastrar!";
		header("Location: logar.php");
	
}

}else{
	$_SESSION['cadastro'] = "E-mail já cadastrado!";
	header("Location: logar.php");
}

$conn->close();

?>