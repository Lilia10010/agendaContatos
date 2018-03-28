<form id="config-contato" name="config_form" action="_php/editar_ctt.php" method="post" enctype="multipart/form-data">
<fieldset>
		<div>
			<label for="email">E-mail</label>
			<input type="email" id="email" class="config" name="email_txt" placeholder="Inserir E-mail" title="Seu E-mail" 
			value="<?php echo $registro_contato["email"];?>" />
			<input type="hidden" name="email_hidden" value="<?php echo $registro_contato["email"];?>"/>


		</div>	
		<div>
			<label for="nome">Nome</label>
			<input type="text" id="nome" class="config" name="nome_txt" placeholder="Inserir Nome" title="seu nome" 
			value="<?php echo $registro_contato["nome"];?>" required/>
		</div>
	
		<div>
			<label for="nasc">Data de Nascimento:</label>
			<input type="text" id="nasc" class="config" name="nascimento_txt" title="sua data" value="<?php echo $registro_contato["nascimento"];?>"/>
		</div>
		<div>
			<label for="telefone">Telefone:</label>
			<input type="text" id="telefone" class="config" name="telefone_txt" placeholder="Inserir Telefone" tite="seu telefone" value="<?php echo $registro_contato["telefone"];?>"required/>
		</div>
	

		<div>
			<label for="foto">Foto</label>
			<div class="add-arquivo config">
				<input type="file" id="foto" name="foto_fls" title="inserir foto" />
				<input type="hidden" name="foto_hidden" value="<?php echo $registro_contato["imagem"];?>"/>
			</div>
			<div>
				<img src="<?php echo "img/fotos/".$registro_contato["imagem"];?>"/>
			</div>
		</div>
		<div>
			<input type="submit" id="enviar-add" class="config" name="enviar_btn" value="Salvar"/>
		</div>
		
		<?php include("_php/mensagens.php");?>

		</fieldset>
	</form>