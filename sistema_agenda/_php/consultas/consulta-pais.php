<br/>
<div>
	<input type="hidden" name="op" value="consultas"/>
	<label for="pais">País </label>
	<select id="pais" class="config" name="pais_slc" required>
		<option value="">- - -</option>
		<?php include("select-pais.php");?>
	</select>
</div>
<input type="submit" id="enviar-buscar" class="config" name="enviar_btn" value="Buscar"/>
<?php 
   if($_GET["pais_slc"]!=null){
   	$pais = utf8_encode($_GET["pais_slc"]);
   	$consulta = "SELECT * FROM tb_contatos WHERE pais ='$pais'";
   	include("tabela-resultado.php");
   }

?>