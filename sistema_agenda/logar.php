<?php
 if(!isset($_SESSION))
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Logar</title>

	<link rel="stylesheet" href="_css/stl.css">
</head>
<body>
	<div class="back">

	<section id="interface">
<form action="valida.php" method="POST" enctype="multpart/form-data">
	<fieldset>
		<legend>Logar</legend>
		<div>
			<label for="email">E-mail</label>
			<input type="email" id="email" class="config" name="email" placeholder="Inserir E-mail" title="Seu E-mail" required/>
		</div>	
		<div>
			<label for="senha">Senha</label>
			<input type="password" id="senha" class="config" name="senha" placeholder="Inserir Senha" title="sua senha"  required/>
		</div>
		<div>
			</br><input type="submit" id="enviar-add" class="config" name="enviar_btn" value="Logar"/>
		</div>
			<a id="cadastrar" href="cadastro.php">Cadastrar</a>
		</br><a id="cadastrar" href="recover.php">Esqueci minha senha</a>


			 <div>
            <?php if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro']; //imprimindo 
                unset($_SESSION['loginErro']); //destruindo
            }?>
        </div>

          <div>
            <?php 
            if(isset($_SESSION['logindeslogado'])){
                echo  $_SESSION['logindeslogado'];
                unset($_SESSION['logindeslogado']);
            }
            ?>
        </div>
         <div>
            <?php 
            if(isset($_SESSION['cadastro'])){
                echo  $_SESSION['cadastro'];
                unset($_SESSION['cadastro']);
            }
            ?>
        </div>
        		
	</fieldset>


</form>
</section>
</div>
</body>
</html>