<form id="add-ctt" name="add_form" action="_php/add_ctto.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Adicionar Contato</legend>
		<div>
			<label for="email">E-mail</label>
			<input type="email" id="email" class="config" name="email_txt" placeholder="Inserir E-mail" title="Seu E-mail" required/>
		</div>	
		<div>
			<label for="nome">Nome</label>
			<input type="text" id="nome" class="config" name="nome_txt" placeholder="Inserir Nome" title="seu nome" />
		</div>
		
		<div>
			<label for="nasc">Data de Nascimento:</label>
			<input type="text" id="nasc" class="config" name="nascimento_txt" title="sua data"/>
		</div>
		<div>
			<label for="telefone">Telefone:</label>
			<input type="text" id="telefone" class="config" name="telefone_txt" placeholder="Inserir Telefone" tite="seu telefone" required/>
		</div>
	
		<div>
			<label for="foto">Foto</label>
			<div class="add-arquivo config">
				<input type="file" id="foto" name="foto_fls" title="inserir foto"/>
			</div>
		</div>
		<div>
			<input type="submit" id="enviar-add" class="config" name="enviar_btn" value="Adicionar"/>
		</div>
		<?php include("_php/mensagens.php");?>
	</fieldset>
</form>

