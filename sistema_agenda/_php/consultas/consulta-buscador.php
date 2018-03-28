<!--
<br/>
<div>
	<input type="hidden" name="op" value="consultas"/>
	<label for="buscador">Buscar</label>
	<input type="search" id="buscador" class="config" name="q" placeholder="Escreva sua Busca" title="Sua Busca"/>
</div>
<input type="submit" id="enviar-buscar" class="config" name="enviar_btn" value="Buscar"/>

-->

<?php 
   if($_POST["q"]!=null){ //a variavel pega informações do campo 'q' e verifica se é diferente de null //  MATCH(email, nome, sexo, telefone, pais) AGAINST('$q' IN BOOLEAN MODE)";
   	  $q = ($_POST["q"]);
   	  $consulta = "SELECT * FROM tb_contatos WHERE nome LIKE '%$q%' "; 
   	  
   	  include("tabela-resultado.php");
   }

   
?>
