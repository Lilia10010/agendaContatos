<br/>
<div>
	<label for="m">Sexo </label>
	<input type="hidden" name="op" value="consultas"/>
	<input type="radio" id="f" name="sexo_rdo" title="Seu sexo" value="F" querired/>
	<label id="lf" for="f">Feminino</label>
	<input type="radio" id="m" name="sexo_rdo" tilte="Seu sexo" value="M" required/>
	<label id="lm" for="m">Masculino</label>
</div>
<input type="submit" id="enviar-buscar" class="config" name="enviar_btn" value="Buscar"/>
<?php 
   if($_GET["sexo_rdo"]!=null){ //ferifica se marcou um dos dois
   	$sexo = $_GET["sexo_rdo"]; //cria a variave sexo e passa a informação que foi marcado
   	$consulta = "SELECT * FROM tb_contatos WHERE sexo = '$sexo'";
   	include("tabela-resultado.php");
   }
?>