<?php
//wp_enqueue_style( 'namespace' );
?>
<div id="conteudo">
	<form method="post">
		<table id="wot_tabela" class="widefat" style="width: 49%;margin-right:2%;clear:none;float:left;">
			<thead>
				<th colspan="12"><b>Dados do Cliente</b></th>
			</thead>
			<tbody>
				<tr>
					<td colspan="6">
						<label for="cpf-cliente">CPF</label> <br/>
						<input type="text" id="cpf-cliente" name="cpf-cliente" value="<?php echo $os_info->cpf_cliente_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
					<td colspan="6">
						<label for="rg-cliente">RG</label> <br/>
						<input type="text" id="rg-cliente" name="rg-cliente" value="<?php echo $os_info->rg_cliente_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
				<tr>
					<td colspan="12">
						<label for="nome-cliente">Nome</label> <br/>
						<input type="text" id="nome-cliente" name="nome-cliente" value="<?php echo $os_info->nome_cliente_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
				<tr>
					<td colspan="12">
						<label for="email-cliente">Email</label> <br/>
						<input type="text" id="email-cliente" name="email-cliente" value="<?php echo $os_info->email_cliente_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
				<tr>
					<td colspan="12">
						<label for="endereco-cliente">Endereço</label> <br/>
						<input type="text" id="endereco-cliente" name="endereco-cliente" value="<?php echo $os_info->ender_cliente_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<label for="telefone-cliente">Telefone</label> <br/>
						<input type="text" id="telefone-cliente" name="telefone-cliente" value="<?php echo $os_info->tel_princ_cliente_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
					<td colspan="4">
						<label for="celular-cliente">Celular</label> <br/>
						<input type="text" id="celular-cliente" name="celular-cliente" value="<?php echo $os_info->tel_cel_cliente_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
					<td colspan="4">
						<label for="comercial-cliente">Comercial</label> <br/>
						<input type="text" id="comercial-cliente" name="comercial-cliente"  value="<?php echo $os_info->tel_com_cliente_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
			</tbody>
		</table>

		<table id="wot_tabela" class="widefat" style="width: 49%;clear:none;float:left;">
			<thead>
				<th colspan="2"> <b>Dados do Produto</b> </th>
			</thead>
			<tbody>
				<tr>
					<td>
						<label for="tipo-produto">Tipo</label> <br/>
						<input type="text" id="tipo-produto" name="tipo-produto" value="<?php echo $os_info->tipo_prod_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
					<td>
						<label for="marca-produto">Marca</label> <br/>
						<input type="text" id="marca-produto" name="marca-produto" value="<?php echo $os_info->marca_prod_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
				<tr>
					<td>
						<label for="referencia-produto">Referência</label> <br/>
						<input type="text" id="referencia-produto" name="referencia-produto" value="<?php echo $os_info->ref_prod_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
					<td>
						<label for="modelo-produto">Modelo</label> <br/>
						<input type="text" id="modelo-produto" name="modelo-produto" value="<?php echo $os_info->mod_prod_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<label for="descricao-produto">Descrição</label> <br/>
						<input type="text" id="descricao-produto" name="descricao-produto" value="<?php echo $os_info->desc_prod_os ?>"  <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<label for="caracteristicas-produto">Características Externas</label> <br/>
						<input type="text" id="caracteristicas-produto" name="caracteristicas-produto" value="<?php echo $os_info->carac_prod_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<label for="defeitos-produto">Defeito(s) Segundo o Cliente</label> <br/>
						<input type="text" id="defeitos-produto" name="defeitos-produto" value="<?php echo $os_info->def_prod_os ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
					</td>
				</tr>
			</tbody>
		</table>
		
		<?php if ( $os_info->status_os == 7 || $os_info->status_os == 6 || $os_info->status_os == 5 || $os_info->status_os == 4 || $os_info->status_os == 3 || $os_info->status_os == 2 || $os_info->status_os == 1 ) { ?>
		<div class="buttons-bottom">
			<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>">
			<input type="submit" name="salvarOs" class="button" value="Salvar Dados" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> /> 
		</div>
		<?php } ?>
	
	</form>
</div>