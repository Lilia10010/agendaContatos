<?php   session_start(); include_once("_php/conexao.php");

if((isset($_POST['email'])) && strlen($_POST['email']) > 0){
	$usuario = mysqli_real_escape_string($conexao, $_POST['email']); //escapar de caracteres especiais para previnir SQLs injections
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	//$senha = md5($senha); //para criptografar a senha no bd

	$result_usuario = "SELECT * FROM loginagenda WHERE email = '$usuario' ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	$resultado = mysqli_fetch_assoc($resultado_usuario);
	$numero_registro = $resultado_usuario->num_rows;

	//se encontrar um usuario na tabela com os mesmos dados digitados
	//vai criar uma sessão e atribuir os valores do banco a ela 
	//e redirecionar a pagina de acordo com o nivel de acesso
	if(isset($resultado)){
		$_SESSION['usuarioId'] = $resultado['id'];
		$_SESSION['usuarioNome'] = $resultado['nome'];
		$_SESSION['usuarioEmail'] = $resultado['email'];
		$_SESSION['usuarioSenha'] = $resultado['senha']; //lá ta sem
		}	

		if($numero_registro == 0){
		$_SESSION['loginErro'] = "Usuário inexistente!";
	header("Location: logar.php"); 			
		}

		

	if($resultado['email'] == $usuario && $resultado['senha'] == $senha){
		$_SESSION['usuario_logado'] = 'ok';
	header("Location: index.php");		
	}
/*	else{
		//pg de erro quando os dados não batem
		$_SESSION['loginErro'] = "Usuário ou senha inválid";
	header("Location: logar.php");
		//echo "gggggggggggggggggggg";
}
*/
  if($numero_registro >=1 && $resultado['email'] == $usuario && $resultado['senha'] <> $senha){
  $_SESSION['loginErro'] = "Senha incorreta! Tente novamente.";
	header("Location: logar.php"); 
}
//se não for preenchido será redirecionado para a pagina de index.php


}




?>