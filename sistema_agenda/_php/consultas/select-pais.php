<?php
if(!$registro_contato["pais"]){
	include ("conexao.php");
}

$consulta = "SELECT * FROM pais ORDER BY pais";
$executar_cosulta = $conexao->query($consulta);

while($registro = $executar_cosulta->fetch_assoc()){
	/*$nome_pais = utf8_encode($registro["pais"]);
	echo "<option value='$nome_pais'>$nome_pais</option>";*/
	/*a variavel nome_pais vai recuperar o valor que estiver dentro do BD no campo pais*/
	$nome_pais = utf8_encode($registro["pais"]);
	//aqui pede para que ela seja exibida
	echo "<option value='$nome_pais'";
	//faz a veridicação se o nome_pais for igual ao valor que estiver na variavel registro_contato mantenha selecionado
	if($nome_pais==utf8_decode($registro_contato["pais"])){
		echo "selected";
	}
	//e mostre qual a variavel (o nome do pais)
	echo ">$nome_pais</option>";
}

?>