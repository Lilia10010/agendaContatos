<?php
 if(!isset($_SESSION))
    session_start();

if ($_SESSION['usuario_logado'] ==  'ok') { //recebendo informaçoes da pg retrito
    
} else {
    //$idUsuario = $_SESSION['idUsuario'];
  header("Location: logar.php");
}

?>




<?php
error_reporting(E_ALL ^ E_NOTICE);
$op = $_GET["op"];
switch ($op){
	case "add":
		$conteudo = "_php/add_ctt.php";
		$titulo = "Adicionar";
		break;

	case "apagar":
		$conteudo = "_php/apagarctt.php";
		$titulo = "Apagar";
		break;

	case"config":
		$conteudo = "_php/config.php";
		$titulo = "Configurar";
		break;

	/*case"consultas":
		$conteudo = "_php/consultas.php";
		$titulo = "Consultar";
		break;
	*/	

	default :
		$conteudo = "_php/home.php";
		$titulo = "Agenda Online";	
		break;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title><?php echo $titulo;?></title>

	<link rel="stylesheet" href="_css/stl.css">
</head>

<body>
	<div class="back">

	<section id="interface">
		<section id="conteudo">
			<nav>
				<ul>
					<a class="config" href="index.php"><li>Home</li></a>
					<a class="config" href="?op=add"><li>Adicionar Contato</li></a>					
					<a class="config" href="sair.php"><li>sair</li></a>
					<!--  <a href="index.php"><img src="img/pitty.jpg" width="100%"/></a> Apenas teste
				          <a class="config" href="?op=consultas"><li>Consultas</li></a>
			         -->
				</ul>
			</nav>
			</section>

			<section id="principal">
				<?php 
				 include($conteudo);
				
       ?>
			</section>


	</section>
	</div>


</body>
</html>