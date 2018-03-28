<form action="" id="consulta_ctt" name="consulta_form" method="get">
	<fieldset>
		<legend>Consulta de Contatos</legend>
		<label for="consulta_lista">Tipo de Consulta</label>
		<select name="consulta_slc" id="consulta_lista" required>
			<option value="">- - -</option>
			<option value="todos" <?php if($_GET["consulta_slc"] == "todos"){echo " selected";} ?> >Todos</option>
			<option value="email" <?php if($_GET["consulta_slc"] == "email"){ echo " selected";}?> >E-Mail</option>
			<option value="inicial" <?php if($_GET["consulta_slc"] == "inicial"){echo " selected";} ?>>Por Inicial</option>
			<option value="sexo" <?php if($_GET["consulta_slc"] == "sexo"){echo " selected";}?>>Sexo</option>
			<option value="pais" <?php if($_GET["consulta_slc"] == "pais"){echo "selected";} ?>>País</option>
			<option value="buscador" <?php if($_GET["consulta_slc"] == "buscador"){echo " selected";} ?>>Escrever</option>
		</select>
		<?php
		    switch ($_GET["consulta_slc"]) {
		    	case "todos":
		    		include("_php/consulta-todos.php");
		    		break;
		    	case "email":
		    	    include("_php/consulta-email.php");
		    	    break;	
		    	case "inicial":
		    	    include("_php/consulta-inicial.php");
		    	    break;
		    	case "sexo":
		    	    include("_php/consulta-sexo.php");
		    	    break;
		    	case "pais":
		    	    include("_php/consulta-pais.php");
		    	    break;
		    	case "buscador":
		    	    include("_php/consulta-buscador.php");
		    	    break;              
		    	
		    	default:
		    		# code...
		    		break;
		    }
		 ?>
	</fieldset>
</form>
<!--
<script>
    window.onload = function(){
    	var lista = document.getElementById("consulta_lista");
    	lista.onchange = function(){
    		window.location="?op=consultas&consulta_slc="+lista.value;
    	};
    }
</script>
-->