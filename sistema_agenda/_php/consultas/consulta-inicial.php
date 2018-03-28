<br/>
<?php 
 $letra = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

//usar um FOR para percorrer o ABC 
 for($i=0; $i<count($letra); $i++){
 	if($letra[$i]=="Z"){
 		//mostrar a seguencia de letras dentro de um link
 		//e busca na pag de consultas o meu Obj consulta_slc(no campo Inicial)
 		echo "<a class='config' href='?op=consultas&consulta_slc=inicial&letra=".$letra[$i]." '> ".$letra[$i]."</a>";
 	}else{
 		echo "<a class='config' href='?op=consultas&consulta_slc=inicial&letra=".$letra[$i]."'>".$letra[$i]."</a>\n-\n";
 	}
 }
  if($_GET["letra"]!=null){
  	$inicial = $_GET["letra"];
  	$consulta = "SELECT * FROM tb_contatos WHERE nome LIKE '$inicial%'";
  	include("tabela-resultado.php");
  }
?>