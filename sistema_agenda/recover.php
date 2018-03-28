<?php

if(isset($_POST['enviar_btn'])){
	include("conectar.php");

	$email = $conn->escape_string($_POST['email']); //esc inpede ateaques do tipo sqlingector
	$erro = "";
	$msg = [];

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){  //funcao do php para verificar se o email é valido
		$erro = "invalido";
		$msg = "E-mail inválido!";
	}
	//verificar no BD se o email realmente exist
	$sql_code = "SELECT senha, nome FROM loginagenda WHERE email = '$email'";
	$sql_query = $conn->query($sql_code) or die($conn->error);
	$dado = $sql_query->fetch_assoc();
	$total = $sql_query->num_rows;

	if($total == 0){
		$msg =  "O e-mail informado não existe no banco de dados.</br>";
	}


	//if o email for valido e ñ der erro e o total de email for maior que 0 ai realiza todo o processo de substituição
	if($erro <> "invalido" && $total > 0){

	$novasenha = substr(md5(time()),0, 6); //pega a hora atual(em segundos) e criptpgrafa ela - - corta ela com tamanho 6 (sub) EVIA P O USUARIO
	$nvcriptografada = md5(md5($novasenha)); //ATERA NO BD
	

	//usar um if para atualizar no banco apenas se o email for enviado para o usuario
	//evitando que seja alterada no banco e o usuario não receba
	//if(mail($email, "Sua nova senha", "Nova senha: ".$novasenha)){
	if($total >= 1){  //só para fazer o teste, 
 		$sql_code = "UPDATE loginagenda SET senha = '$nvcriptografada' WHERE email = '$email' ";
		$sql_query = $conn->query($sql_code) or die($conn->error); //executando o codigo

    $assunto = 'Recuperação de senha Do Sistema de Armazenamento de Contatos Online';
    $mensagem = "Mensagem automatica enviada para: $email<br>
	Nova Senha:$nvcriptografada<br><br>
	Senha Atualizada com Sucesso! <br>";
	mail($email, $assunto, $mensagem);


		if($sql_query)
			$msg = "Sua nova senha foi enviada no e-mail: $email.";
}
}

}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Recuperar Senha</title>

	<link rel="stylesheet" href="_css/stl.css">
</head>
<body>

	<div class="back">
	<section id="interface">


	<form id="mudar-senha" name="mudar-senh" action=" " method="POST" enctype="multipart/form-data">
		<fieldset>
			<legend>Formulário para recuperar senha</legend>

			<div><label for="email">E-mail
				<input type="text" id="email" name="email" placeholder="Inserir e-mail" title="Inserir E-mail" size="35" autofocus required></label>
				</div>

				<div><input type="submit" id="enviar" name="enviar_btn" value="Enviar">
			</div>
			<a id="cadastrar" href="logar.php">Voltar para login</a></br>

			   <?php 
            if(isset($msg)){
                echo  $msg;
                unset($msg);
            }
            ?>
		
		</fieldset>
	</form>
	</section>
</div>
	
</body>
</html>

