<?php global $current_user; ?>

<div id="blocos-conteudo">
	<table id="wot_tabela" class="widefat">
	<thead>
		<th colspan="12"><b>Faturamento</b></th>
	</thead>
	<form method="post">
	<tbody>
		<tr>
			<td colspan="4">
				<label for="valor-total">Valor Total (R$)</label> <br/>
				<input type="text" id="valor-total" name="valor-total" value="<?php echo $valor_convert = str_replace(".", ",", $os_info->valor_total) ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
			</td>
			<td colspan="4">
				<label for="descon-pag">Desconto (R$)</label> <br/>
				<input type="text" id="descon-pag" name="descon-pag" value="<?php if ( $os_info->descon_pag > 0 ) { echo $valor_convert = str_replace(".", ",", $os_info->descon_pag); } ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
			</td>
			<td colspan="4">
				<label for="valor-final">Valor Final (R$)</label> <br/>
				<input type="text" id="valor-final" name="valor-final" value="<?php if ( $os_info->valor_final > 0 ) { echo $valor_convert = str_replace(".", ",", $os_info->valor_final); } ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
			</td>
		</tr>
		<tr>
			<td colspan="6">
				<label for="form-pag">Forma de Pagamento</label> <br/>
				<input type="text" id="form-pag" name="form-pag" value="<?php echo $os_info->form_pag ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
			</td>
			<td colspan="6">
				<label for="desc-pag">Descrição</label> <br/>
				<input type="text" id="desc-pag" name="desc-pag" value="<?php echo $os_info->desc_pag ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
			</td>
		</tr>
		<tr>
			<td colspan="6">
				<label for="nome-pag">Produto retirado por</label> <br/>
				<input type="text" id="nome-pag" name="nome-pag" value="<?php if ( $os_info->nome_pag == "" ) { echo $os_info->nome_cliente_os; } else { echo $os_info->nome_pag; } ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
			</td>
			<td colspan="6">
				<label for="cpf-pag">CPF</label> <br/>
				<input type="text" id="cpf-pag" name="cpf-pag" value="<?php if ( $os_info->cpf_pag == "" ) { echo $os_info->cpf_cliente_os; } else { echo $os_info->cpf_pag; } ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
			</td>
		</tr>
		<tr>
			<td colspan="6">
				<label for="receb-pag">Responsável</label> <br/>
				<input type="text" id="receb-pag" name="receb-pag" value="<?php if ( $os_info->receb_pag == "" ) { echo $current_user->display_name; } else { echo $os_info->receb_pag; } ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
			</td>
			<td colspan="6">
				<label for="data-pag">Data</label> <br/>
				<input type="text" id="data-pag" name="data-pag" disabled value="<?php $horaatual = current_time( 'mysql' ); if ( $os_info->data_pag == "0000-00-00 00:00:00" ) { echo date('d/m/y', strtotime( $horaatual )); } else { echo date('d/m/y', strtotime( $os_info->data_pag )); } ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> />
			</td>
		</tr>
		
	</tbody>
	</table>
	
	<?php if ( $os_info->status_os == 7 || $os_info->status_os == 6 || $os_info->status_os == 5 || $os_info->status_os == 4 || $os_info->status_os == 3 || $os_info->status_os == 2 || $os_info->status_os == 1 ) { ?>
	<div class="buttons-bottom">
		<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>">
		<input type="submit" name="salvarPagamento" class="button<?php if ( $os_info->status_os == 7 ) { echo "-primary";} ?>" value="Salvar e Finalizar" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> /> 
		
	</div>
	<?php } ?>
	</form>
</div>