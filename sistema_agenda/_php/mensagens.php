<?php
if(isset($_GET["mensagem"])){
	$mensagem = $_GET["mensagem"];

	echo "<br/><span class='mensagem'>$mensagem</span><br/>";
}

?>