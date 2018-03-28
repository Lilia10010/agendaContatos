<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Cadastro</title>

	<link rel="stylesheet" href="_css/stl.css">
</head>
<body>
	<div class="back">

	<section id="interface">
<form id="cadastro" name="cadastrar" action="add_cadastro.php" method="post" enctype="multipart/form-data">
	
	<fieldset>
		<legend>Formulario de Cadastro</legend>
		
			<div><label for="nome">Nome
				<input type="text" id="nome" name="nome" placeholder="Nome" title="Inserir Nome" autofocus required></label>
				</div>

		<div><label for="email">E-mail
			<input type="text" id="email" name="email" placeholder="E-mail" title="Inserir E-mail" required></label>
		</div>
		
		<div><label for="senha">Senha
			<input type="password" id="senha" name="senha" placeholder="Senha" title="Inserir Senha" required></label>
		</div>		

			</br><div><input type="submit" id="enviar" name="enviar_btn" value="Cadastrar">
			</div>
			<a id="cadastrar" href="logar.php">Voltar para login</a>

	</fieldset>
		
</form>