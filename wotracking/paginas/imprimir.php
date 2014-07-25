<?php 

//wp_enqueue_style('namespace');

?>

<!-- Carrega um lembrete de preenchimento dos dados da assistência -->
<?php if ( get_option( 'wot_banner_empresa' ) == "" || get_option( 'wot_nome_empresa' ) == "" || get_option( 'wot_ender_empresa' ) == "" || get_option( 'wot_tel1_empresa' ) == "" || get_option( 'wot_info_empresa' ) == "" ) { ?>
<script>
	// alert('Você precisa preencher alguns dados importantes da empresa na página de Configurações');
	
function lembrete_config(){
   var dialog_box = confirm("Você pode imprimir! Mas para um resultado apropriado, precisa preencher alguns dados importantes na página de Configurações.\n\nClique em OK para editá-los agora.");
   if( dialog_box == true ){
	location.href="<?php echo admin_url("admin.php?page=wot_configuracoes"); ?>"
	  return true;
   }else{
	  return false;
   }
}

lembrete_config();
	
</script>
<?php } ?>

<!-- Carrega o comando de impressão quando a página carrega -->
<script>
window.print(); 
</script>

<div class="wrap">
	<!-- Título varia de acordo com a requisição -->
	<h2><?php
	if ( $imprimir == 'os' ) { echo "Versão para Impressão"; }
	elseif ( $imprimir == 'orcamento' ) { echo "Imprimir Orçamento"; }
	?>
	</h2>
	
	<!-- Carrega as informações da empresa inseridas na página de configurações -->
	<div id="topo-os">
		<div id="banner-empresa">
			<img src="<?php echo get_option( 'wot_banner_empresa' ) ?>" width="400" height="65" />
		</div>
		<div id="informacoes-empresa">
			<?php echo get_option( 'wot_nome_empresa' ) ?><br/>
			<?php echo get_option( 'wot_ender_empresa' ) ?><br/>
			<?php
			if( get_option( 'wot_tel2_empresa' ) == "" ) { echo get_option( 'wot_tel1_empresa' ); }
			else { echo get_option( 'wot_tel1_empresa' ) . " / " . get_option( 'wot_tel2_empresa' ); }
			?><br/>
			<?php echo get_option( 'wot_email_empresa' ) ?><br/>
			<?php echo get_option( 'wot_site_empresa' ) ?>
		</div>
	</div>
	
	<!-- Informações da OS -->
	<div id="conteudo">
		<div class="infos-os">
			<b id="numero_os">Nº <?php echo $os_info->id ?></b> <b>Tipo: </b><?php
		if ( $os_info->tipo_os == 1 ) {
		echo "Fora de Garantia";
		}
		elseif ( $os_info->tipo_os == 2 ) {
		echo "Em Garantia";
		}  ?>
		</div>
		<div id="informacoes-da-os" style="margin:9px 0 3px 0;"> 
			<b>Data de Entrada:</b> <?php echo date('d/m/y', strtotime( $os_info->data_entrada )) ?>
		</div>
		
		<div class="clear"></div>
<?php

if ( $imprimir == 'os' ) { ?>
	<!-- Dados do Cliente -->
	<table id="wot_tabela" class="widefat">
		<thead>
			<th colspan="12" id="dados-cliente"><b>Dados do Cliente</b></th>
		</thead>
		<tbody>
			<tr>
				<td colspan="6" width="50%" > <b>CPF:</b> <?php echo $os_info->cpf_cliente_os ?> </td>
				<td colspan="6" width="50%" > <b>RG:</b> <?php echo $os_info->rg_cliente_os ?> </td>
			</tr>
			<?php
			/* Se o email não tiver sido preenchido, só exibe a linha do nome */
			if ( $os_info->email_cliente_os == "" ) {
			echo
			"<tr>
				<td colspan='12'> <b>Nome:</b> " . $os_info->nome_cliente_os . " </td>
			</tr>"; }
			else {
			echo
			"<tr>
				<td colspan='6'> <b>Nome:</b> " . $os_info->nome_cliente_os . " </td>
				<td colspan='6'> <b>Email:</b> " . $os_info->email_cliente_os . " </td>
			</tr>";
			} ?>
			<?php
			/* Se o telefone comercial não tiver sido preenchido, só exibe os outros dois */
			if ( $os_info->tel_com_cliente_os == "" ) {
			echo 
			"<tr>
				<td colspan='6'> <b>Telefone:</b> " . $os_info->tel_princ_cliente_os . " </td>
				<td colspan='6'> <b>Celular:</b> " . $os_info->tel_cel_cliente_os . " </td>
			</tr>"; }
			else { 
			echo
			"<tr>
				<td colspan='4' style='text-align:left !important;'> <b>Telefone:</b> " . $os_info->tel_princ_cliente_os . " </td>
				<td colspan='4' style='text-align:center !important;'> <b>Celular:</b> " . $os_info->tel_cel_cliente_os . " </td>
				<td colspan='4' style='text-align:right !important;'> <b>Celular:</b> " . $os_info->tel_com_cliente_os . " </td>
			</tr>"; }
			?>
		</tbody>
	</table>
	
	<!-- Dados do Produto -->
	<table id="wot_tabela" class="widefat">
		<thead>
			<th colspan="2"><b>Dados do Produto</b></th>
		</thead>
		<tbody>
			<tr>
				<td> <b>Tipo:</b> <?php echo $os_info->tipo_prod_os ?> </td>
				<td> <b>Marca:</b> <?php echo $os_info->marca_prod_os ?> </td>
			</tr>
			<tr>
				<td> <b>Referência:</b> <?php echo $os_info->ref_prod_os ?></td>
				<td> <b>Modelo:</b> <?php echo $os_info->mod_prod_os ?> </td>
			</tr>
			<tr>
				<td colspan="2"> <b>Descrição:</b> <?php echo $os_info->desc_prod_os ?> </td>
			</tr>
			<tr>
				<td width="50%"> <b>Características Externas:</b> <?php echo $os_info->carac_prod_os ?> </td>
				<td width="50%"> <b>Defeito(s) Segundo o Cliente:</b> <?php echo $os_info->def_prod_os ?> </td>
			</tr>
		</tbody>
	</table>
	
	<!-- Rodapé da OS -->
	<?php if ( get_option( 'wot_info_empresa' ) == "" ) {
		echo 	"<div id='observacoes-os'>
				<div id='assinatura-cliente'><span id='coluna-esquerda'>Estou de acordo com todas as condições citadas acima</span> <span id='coluna-direita'>Assinatura: ______________________________________________________</span> </div>
				</div>"; }
		else {
		echo 	"<div id='observacoes-os'>
				<b>Importante:</b><br/>" . get_option( 'wot_info_empresa' ) . "
				<div id='assinatura-cliente'><span id='coluna-esquerda'>Estou de acordo com todas as condições citadas acima</span> <span id='coluna-direita'>Assinatura: ______________________________________________________</span> </div>
				</div>";
		
		}
	?>
	
	
<?php }
elseif ( $imprimir == 'orcamento' ) {
?>
		<table id="wot_tabela" class="widefat">
				<thead>
					<tr><th colspan="7"> <b>Orçamento</b> </th></tr>
					<tr>
						<th scope="col" style="width:5%;" id="qtd_serv">Qtd.</th>
						<th scope="col" id="desc_serv">Descrição</th>
						<th scope="col" style="width:3%;" align="center" id="essencial_serv">E</th>
						<th scope="col" style="width:15%;" id="nome_peca">Peça (R$)</th>
						<th scope="col" style="width:15%;" id="nome_mo">Serviço (R$)</th>
						<th scope="col" style="width:15%;" id="valor_serv" colspan="2">Valor (R$)</th>
					</tr>
				</thead>
				<tbody>
				<?php
			global $wpdb, $tabela_orcamento;
			$query_linhas	=	$wpdb->get_results("SELECT * FROM " . $tabela_orcamento . " WHERE num_os=" . $num_os . " ;");
				
			foreach($query_linhas as $query_linhas) {
				
				echo "
					<tr>
						<td> " . $query_linhas->qtd_serv . " </td>
						<td> " . $query_linhas->desc_serv . " </td>
						<td> ";
						if ( $query_linhas->e_o_serv == 1 ) { echo "X"; }
						else { echo "-"; } 
				echo "	
						</td>
						<td> " . str_replace(".", ",", $query_linhas->val_peca) . " </td>
						<td> " . str_replace(".", ",", $query_linhas->val_serv) . " </td>
						<td> " . str_replace(".", ",", $query_linhas->val_total) . " </td>
					</tr> ";	
			}
			?>
				</tbody>
			</table>
			<table id="tabela-bottom">
				<tr>
					<td align="left"><b>Valor Total:</b> <?php echo str_replace(".", ",", $os_info->valor_total) ?></td>
					<td align="center"><b>Tempo de Serviço:</b> <?php echo $os_info->dias_serv . " dias" ?></td>
					<td align="right"><b>Garantia:</b> <?php echo $os_info->tempo_garantia . " meses" ?></td>
				</tr>
			</table>
<?php } 

/* OS Indisponível */
else {
	
	echo "Versão para impressão indisponível. Tente novamente!";

}
?>		
		<div id='nao-mostrar-impressao' class='buttons-bottom'>
		<div id='coluna-esquerda'>
			<a href="<?php echo admin_url("admin.php?page=wot_consultar&os=" . $num_os . "")?>"><button class='button'>Editar OS</button></a>
		</div>
		<div id='coluna-direita'>
			<button name='botao-salvarimprimir' class='button button-primary' value='Imprimir' onClick='window.print();'>Imprimir</button>
		</div>
		</div>
	</div>
</div>