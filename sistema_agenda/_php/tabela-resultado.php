<?php 
//iniciar a conexão se tiver algum campo vazio(pode ser qlqr campo)
if(empty($_GET["nome_txt"])){
	include("conexao.php");
}
//incluir arquivo de function para trazer as imgs (e fazer funcionar os comandos)
include("functions.php"); //para buscar as imgs
$executar_consulta = $conexao->query($consulta);
$num_regs = $executar_consulta->num_rows;



if($num_regs == 0){
	echo "<br/><br/><span class='mensagem'>Nenhum contato adicionado</span><br/>";
}else{
?>
<!--Codigo para editar o contato -->
<?php
$regg = $_POST ["email"];
if(isset($_POST['config-btn']) && $_POST['config-btn'] == 'Editar'){

      $consulta_contato = "SELECT *  FROM tb_contatos WHERE email='$regg'";
                            //echo $consulta_contato; teste

                            //executar uma query para a consulta_contato(select) que foi feito
                            $executar_consulta_contato = $conexao->query($consulta_contato);
                            //obter linha de resultado
                            $registro_contato = $executar_consulta_contato->fetch_assoc();

                            include("_php/config-form.php");
                     }


?>


       <br/>
              <fieldset>
                     <legend>Contatos</legend>

       <table>
       	   <thead>
       	   	    <tr>
                  <th>Nome</th>
       	   	    	<th>E-Mail</th>
       	   	    	<th>Nascimento</th>
       	   	    	<th>Telefone</th>
       	   	    	<th>Imagem</th>
                  <th>Config</th>
       	   	    </tr>
       	   </thead>
       	   <tbody>
       	   	   <?php
       	   	      while($registro = $executar_consulta->fetch_assoc()){
       	   	   ?>  
                         <form name="perfil" action="" enctype="multipart/form-data" method="post">
       	   	           <tr>
                        <td><?php echo utf8_decode($registro["nome"]);?></td>
       	   	           	<td><?php echo utf8_decode($registro["email"]);?></td> 
       	   	           	<td><?php echo utf8_decode($registro["nascimento"]);?></td>
       	   	           	<td><?php echo utf8_decode($registro["telefone"]);?></td>
       	   	           	<td><img src="img/fotos/<?php echo utf8_decode($registro["imagem"]);?>"/></td>
                                    <input type="hidden" name="email" value="<?php echo  $registro["email"];?>" />
      
                                   <td><input type="submit" id="enviar-btn" class="config btn2" name="enviar-btn" value="Apagar"/></br></br> 
                                       <input type="submit" id="config-btn" class="config btn2" name="config-btn" value="Editar"/> </td>
                                   
                            </form>

       	   	           </tr>
                               
       	   	    <?php       
       	   	      }
       	   	    ?>  
       	   </tbody>
       </table>
              
	
<?php       
}
//$conexao->close();
?>

<?php
$regg = $_POST ["email"];
if( isset($_POST['enviar-btn'])  && $_POST['enviar-btn'] == 'Apagar') {
       $del = " DELETE FROM tb_contatos WHERE email = '$regg' ";     
       $executar_consulta = $conexao->query($del);

if($executar_consulta){
       echo "Contato Apagado!";
      
}else{
       echo  "Ops :( Não foi possível realizar a ação!";
}           
}
?>

</fieldset>