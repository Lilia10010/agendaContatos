<script>
//ao carregar a pagina vai pegar uma variavel chamada lista e ira verificar qual elemento está sendo chamado
	window.onload = function(){
		var lista = document.getElementById("contato-lista");
		lista.onchange = selecionarContato;
		function selecionarContato(){
			window.location = "?op=config&contato_slc=" + lista.value
		}
	}
</script>
<form id="config-contato" name="config_form" action="_php/editar_ctt.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Editar Contato</legend>
		<div>
			<label for="contacto-lista">Selecionar Contato</label>
			<select id="contato-lista" class="cambio" name="contato_slc" required>
				<option value="">- - -</option>
				<?php include("select-email.php");?>
			</select>
		</div>
		<?php
			if($_GET["contato_slc"]){
				$conexao2 = conectar();
				$contato = $_GET["contato_slc"];
				$consulta_contato = "SELECT *  FROM tb_contatos WHERE email='$contato'";
				//echo $consulta_contato; teste

				//executar uma query para a consulta_contato(select) que foi feito
				$executar_consulta_contato = $conexao2->query($consulta_contato);
				//obter linha de resultado
				$registro_contato = $executar_consulta_contato->fetch_assoc();

				include("_php/config-form.php");
			}

			include("_php/mensagens.php");
		?>
	</fieldset>
</form>


