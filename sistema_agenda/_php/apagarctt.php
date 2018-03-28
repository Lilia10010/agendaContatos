<form id="apagar-ct" name="apagar_form" action="_php/apagarctto.php" method="post" enctype="application/x-www-form-urlencoded">
	<fieldset>
		<legend>Apagar Contato</legend>
		<div>
			<label for="email">E-mail</label>
			<select id="email" class="config" name="email_slc" required>
				<option value="">- - -</option>
				<?php include("select-email.php"); ?>
			</select>
		</div>
		<div>
			<input type="submit" id="enviar-apagar" class="config" name="enviar-btn" value="Apagar"/>
		</div>
		<?php include("_php/mensagens.php");?>
	</fieldset>

</form>