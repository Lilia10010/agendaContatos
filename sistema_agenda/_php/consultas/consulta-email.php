<br/>	
<div>
	<input type="hidden" name="op" value="consultas"/> <!-- este input é para carregar o value-->
	<label for="email">E-Mail</label>
	<input type="email" id="email" class="config" name="email_txt" placeholder="E-mail para busca" title="Seu email"/>
</div><br/>
<input type="submit" id="enviar-buscar" class="config" name="enviar_btn" value="Buscar"/>
<?php

   if($_GET["email_txt"]!=null){   #se o campo digitado ñ for nulo 
   	 $email=$_GET["email_txt"];    #ele passa esse campo(email_txt) para a variavel($email) 
   	 $consulta = "SELECT * FROM tb_contatos WHERE email LIKE '%$email%'"; #LIKE valor aproximado antes ou dps do que foi digitado
   	 include("tabela-resultado.php"); 
   }
 ?>