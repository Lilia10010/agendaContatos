<?php
//criar as variaveis que serão usadas no formulário (os campos do formulário)

// variavel email que vai receber as informações vindas do campo NAME="emai_txt" da pg: add_ctt.php
$email = $_POST["email_hidden"];
$nome = $_POST["nome_txt"];
$sexo = $_POST["sexo_rdo"];
$nascimento = $_POST["nascimento_txt"];
$telefone = $_POST["telefone_txt"];
//$pais = $_POST["pais_slc"];

//connexão e consulta
include("conexao.php");
$consulta = "SELECT * FROM tb_contatos WHERE email='$email'";

// varivel que faz a execução da variavel consulta no bd
$executar_consulta = $conexao->query($consulta);

//num_rows vai verificar o numero de linhas encontrado no bd
$num_registro = $executar_consulta->num_rows;

//verifica se o email existe
if($num_registro == 1){
	//se a img vir vazia inserir nova foto
	if(empty($_FILES["foto_fls"] ["tmp_name"])){
		$imagem = $_POST["foto_hidden"];
	} else{
		//executar a função para subir a imagem
		include("functions.php"); //arquivo que contem as informações
		$tipo = $_FILES["foto_fls"] ["type"];
		$arquivo = $_FILES["foto_fls"] ["tmp_name"];
		$imagem = subir_imagem($tipo, $arquivo, $email);
	}

		//dar um UPDATE no Bd
		$consulta = "UPDATE tb_contatos SET nome='$nome', nascimento='$nascimento', telefone='$telefone',  imagem='$imagem' WHERE email='$email' ";
	


	$executar_consulta = $conexao->query(utf8_encode($consulta));

	if($executar_consulta)
		$mensagem = "Edição realizada <b>$email </b> :) ";
    else
        $mensagem = "Não foi possível editar o contato!";  
} else{
	$mensagem = "Error!";
}
$conexao->close();

//redirecionar para a página config
header("Location: ../index.php");
?>




