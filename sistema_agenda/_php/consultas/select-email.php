<?php
include("conexao.php");
//atraves de uma consulta buscar emails no bd
$consulta = "SELECT email FROM tb_contatos ORDER BY email";
$executar_consulta = $conexao->query($consulta);

//usar o while para percorer resultados gerados na consulta
while($registro = $executar_consulta->fetch_assoc()){
	/* echo "<option value='".utf8_encode($registro["email"])."'>".utf8_encode($registro["email"])."</option>";  */
	echo "<option value='".utf8_encode($registro["email"])."'";
	if($_GET["contato_slc"]==$registro["email"]){
		echo "selected";
	}
	echo ">".utf8_encode($registro["email"])."</option>";
}
//$conexao->close();

?>