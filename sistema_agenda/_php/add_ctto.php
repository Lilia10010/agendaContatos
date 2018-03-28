<?php
//criar as variaveis que serão usadas no formulário (os campos do formulário)

// variavel email que vai receber as informações vindas do campo NAME="emai_txt" da pg: add_ctt.php
$email = $_POST["email_txt"];
$nome = $_POST["nome_txt"];
//$sexo = $_POST["sexo_rdo"];
$nascimento = $_POST["nascimento_txt"];
$telefone = $_POST["telefone_txt"];
//$pais = $_POST["pais_slc"];

//colocar a imagem de acordo com o sexo

//$imagem_padrao = ($sexo=="M")?"masculino.jpg":"feminino.png";

//verificar se já existe o email
 session_start();
$id = $_SESSION['usuarioId'];
include("conexao.php");
$consulta = "SELECT * FROM tb_contatos WHERE id ='$id'";

// varivel que faz a execução da variavel consulta no bd
$executar_consulta = $conexao->query($consulta);

//num_rows vai verificar o numero de linhas encontrado no bd
$num_registro = $executar_consulta->num_rows;

//verifica se o email já existe ou não
if($consulta){
	//função para registar
	include("functions.php");
	$tipo = $_FILES["foto_fls"]["type"];
	$arquivo = $_FILES["foto_fls"]["tmp_name"]; //nome temporário
	$imagem = subir_imagem($tipo, $arquivo, $email);

	//se a img vir vazia(empty) será atribuido valor padão se não colocar o valor da foto que subiu
	//$imagem = empty($arquivo)?$imagem_padrao:$se_subiu_arquivo;


	$consulta = "INSERT INTO tb_contatos (email, nome, nascimento, telefone, imagem, id) VALUES ('$email', '$nome', '$nascimento', '$telefone', '$imagem', '$id')";

	$executar_consulta = $conexao->query(utf8_encode($consulta));

	if($executar_consulta)
		$mensagem = "Contato registrado! <b>$nome </b> :) ";
    else
        $mensagem = "Não foi possível registar o contato!";   //quando o email ja esta cadastrodo, mudar a primary key       




} else{
	$mensagem = "E-mail já cadastrado!"; 
}
$conexao->close();

//passar a variavel de mensagem para a pg de adicional contato coloca o e comercial para concatenar com a mensagem que recebe a variavel mensagm
header("Location: ../index.php?op=add&mensagem=$mensagem");
?>




