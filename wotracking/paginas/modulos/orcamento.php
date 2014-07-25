<div id="blocos-conteudo">
	<table id="wot_tabela" class="widefat">
		<thead>
			<tr><th colspan="7"> <b>Orçamento</b> </th></tr>
			<tr>
				<th scope="col" width="5%" id="qtd_serv" class="esconder-orcamento">Qtd.</th>
				<th scope="col" id="desc_serv">Descrição</th>
				<th scope="col" width="3%" align="center" id="essencial_serv">E</th>
				<th scope="col" width="15%" id="nome_peca" class="esconder-orcamento">Peça (R$)</th>
				<th scope="col" width="15%" id="nome_mo" class="esconder-orcamento">Serviço (R$)</th>
				<th scope="col" width="15%" id="valor_serv" colspan="2">Valor (R$)</th>
			</tr>
		</thead>
		<tbody>
		<!-- Exibe os itens da tabela de orçamento de acordo com o número da OS -->
		<?php
			global $wpdb, $tabela_orcamento;
			$query_linhas	=	$wpdb->get_results("SELECT * FROM " . $tabela_orcamento . " WHERE num_os=" . $num_os . " ;");
				
			foreach($query_linhas as $query_linhas) {
				
				echo "
					<tr>
						<td class='esconder-orcamento'> " . $query_linhas->qtd_serv . " </td>
						<td> " . $query_linhas->desc_serv . " </td>
						<td> ";
						if ( $query_linhas->e_o_serv == 1 ) { echo "X"; }
						else { echo "-"; } 
				echo "	
						</td>
						<td class='esconder-orcamento'> " . $valor_convert = str_replace(".", ",", $query_linhas->val_peca) . " </td>
						<td class='esconder-orcamento'> " . $valor_convert = str_replace(".", ",", $query_linhas->val_serv) . " </td>
						<td> " . $valor_convert = str_replace(".", ",", $query_linhas->val_total) . " </td>";
						if ( $os_info->status_os == 7 || $os_info->status_os == 6 || $os_info->status_os == 5 || $os_info->status_os == 4 || $os_info->status_os == 3 || $os_info->status_os == 2 || $os_info->status_os == 1 ) { 
						echo "<td> <form method='post'>
						<input type='hidden' name='deletarId' value='" . $query_linhas->id . "'>
						<input type='hidden' name='numeroOs' value='" . $num_os . "' />
						<input type='submit' name='deletarOpcao' value='x' class='button' />"; }
						echo "</form>
						</td>
					</tr> ";	
			}
			?>
		</tbody>
		<!-- O formulário para inserir itens só é exibidos para as OS que ainda não foram finalizadas -->
		<?php if ( $os_info->status_os == 7 || $os_info->status_os == 6 || $os_info->status_os == 5 || $os_info->status_os == 4 || $os_info->status_os == 3 || $os_info->status_os == 2 || $os_info->status_os == 1 ) { ?> 
		<tfoot>
			<form id="enviar_orcamento" method="post" >
				<tr>
					<th scope="col" width="5%" class="esconder-orcamento" style="border-top:0;"> 					<input type="text" id="qtd_orc" name="quantidade" /> </th>
					<th scope="col" style="border-top:0;"> 								<input type="text" id="descricao" name="descricao" required /> </th>
					<th scope="col" width="3%" align="center" style="border-top:0;"> 	<input type="checkbox" id="essencial" name="essencial" value="1" /> </th>
					<th scope="col" width="15%" class="esconder-orcamento" style="border-top:0;"> 					<input type="text" id="valor_peca" name="valor_peca"/> </th>
					<th scope="col" width="15%" class="esconder-orcamento" style="border-top:0;"> 					<input type="text" id="valor_servi" name="valor_serv"  /> </th>
					<th scope="col" width="15%" style="border-top:0;"> 					<input type="text" id="valor_total" name="valor_total" required /> </th>
					<th scope="col" width="5%" style="border-top:0;">
					<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>" />
					<input type="submit" class="button-primary" name="add_item" value="+" /> </th>
				</tr>
			</form>
		</tfoot> <?php } ?>
	</table>
	
	<form method="post">
	<table id="tabela-bottom">
		<thead>
			<th scope="col" align="left"><label for="valor-total">Valor Total (R$)</label></th>
			<th scope="col" align="left"><label for="tempo-servico">Tempo de Serviço (dias)</label></th>
			<th scope="col" align="left"><label for="tempo-garantia">Garantia (meses)</label></th>
		</thead>
		<tbody>
			<tr>
				<!-- Se o usuário já tiver adicionado itens ao orçamento, o input de valor total exibe a soma deles -->
				<td> <input type="text" name="valor-total" id="valor-total" value="<?php
					$soma_coluna = $wpdb->get_var( $wpdb->prepare( "SELECT SUM(val_total) FROM " . $tabela_orcamento . " WHERE num_os=" . $num_os . " ", 0 ) );
					$valor_convert = str_replace(".", ",", $soma_coluna);
					if ( $valor_convert > 0 ) {
						echo $valor_convert;
					}
					?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> /> </td>
				<td> <input type="text" name="tempo-servico" id="tempo-servico" value="<?php if ( $os_info->dias_serv > 0 ) { echo $os_info->dias_serv; } ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?> /> </td>
				<td> <input type="text" name="tempo-garantia" id="tempo-garantia" value="<?php if ( $os_info->tempo_garantia > 0 ) { echo $os_info->tempo_garantia; } ?>" <?php if ( $os_info->status_os == 8 ) { echo "disabled"; } ?>  /> </td>
			</tr>
		</tbody>
	</table>
	<?php if ( $os_info->status_os == 7 || $os_info->status_os == 6 || $os_info->status_os == 5 || $os_info->status_os == 4 || $os_info->status_os == 3 || $os_info->status_os == 2 || $os_info->status_os == 1 ) { ?>
	<div class="buttons-bottom">
			<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>">
			<input type="submit" name="botao_os" class="button<?php if ( $os_info->status_os == 1 ) { echo "-primary";} ?>" value="Salvar Orçamento" /> 
	</div>
	<?php } ?>
	</form>
</div>