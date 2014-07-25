<?php

/* Carrega as informações atuais */
$os_info 		= $wpdb->get_row("SELECT * FROM " . $tabela_os . " WHERE id=" . $num_os . ";");

/* EDITAR OS */

$salvaros	=	$_POST['salvarOs'];
	
if ( $salvaros || $imprimir_os ) {

	#Carrega informações do Cliente
	$cpf_cliente_os		= 	$_POST['cpf-cliente'];			$rg_cliente_os		=	$_POST['rg-cliente'];
	$nome_cliente_os	=	$_POST['nome-cliente'];			$email_cliente_os	=	$_POST['email-cliente'];
	$ender_cliente_os	=	$_POST['endereco-cliente'];		$tel_cliente_os		=	$_POST['telefone-cliente'];
	$cel_cliente_os		=	$_POST['celular-cliente'];		$com_cliente_os		=	$_POST['comercial-cliente'];

	#Carrega informações do Produto
	$tipo_prod_os		=	$_POST['tipo-produto'];			$marca_prod_os		=	$_POST['marca-produto'];
	$ref_prod_os		=	$_POST['referencia-produto'];	$mod_prod_os		=	$_POST['modelo-produto'];
	$desc_prod_os		=	$_POST['descricao-produto'];	$carac_prod_os		=	$_POST['caracteristicas-produto'];
	$def_prod_os		=	$_POST['defeitos-produto'];
	
	$wpdb->update(
	$tabela_os,
	array(
		'cpf_cliente_os' => $cpf_cliente_os, 'rg_cliente_os' => $rg_cliente_os,
		'nome_cliente_os' => $nome_cliente_os, 'email_cliente_os' => $email_cliente_os, 'ender_cliente_os' => $ender_cliente_os,
		'tel_princ_cliente_os' => $tel_cliente_os, 'tel_cel_cliente_os' => $cel_cliente_os, 'tel_com_cliente_os' => $com_cliente_os,

		'tipo_prod_os' => $tipo_prod_os, 'marca_prod_os' => $marca_prod_os,
		'ref_prod_os' => $ref_prod_os, 'mod_prod_os' => $mod_prod_os, 'desc_prod_os' => $desc_prod_os,
		'carac_prod_os' => $carac_prod_os, 'def_prod_os' => $def_prod_os 
		),
	array( 'ID' => $num_os )
		);

}


/* EDITAR ORÇAMENTO */

$add_item	=	$_POST['add_item'];

if ( $add_item ) {

	$quantidade  = $_POST["quantidade"];	
	$descricao = $_POST["descricao"]; 	
	$essencial = $_POST["essencial"];
	$valor_peca 	= str_replace(",", ".", $_POST["valor_peca"] ); 
	$valor_serv 	= str_replace(",", ".", $_POST["valor_serv"] ); 
	$valor_total = str_replace(",", ".", $_POST["valor_total"] );

	$wpdb->replace( $tabela_orcamento, array(
		'num_os'		=> $num_os, 
		'qtd_serv' 		=> $quantidade, 	'desc_serv' => $descricao, 	'e_o_serv' => $essencial,
		'val_peca' 		=> $valor_peca, 	'val_serv' => $valor_serv,	'val_total' => $valor_total
		) );

}

$deletaropc		=	$_POST['deletarOpcao'];
$numIdDeletar	=	$_POST['deletarId'];

if ( $deletaropc ) {

	$wpdb->delete( $tabela_orcamento, array(
		'id'	=> $numIdDeletar
	) ); 

}

$attOrcOs		=	$_POST['botao_os'];
if ( $attOrcOs ) {
	
	$dataOrcamento 	= current_time( 'mysql' );	$valorTotal  	= $_POST["valor-total"];
	$tempoServico 	= $_POST["tempo-servico"];	$tempoGarantia 	= $_POST["tempo-garantia"];
	
	if ( $os_info->status_os < 2   ) {
		$wpdb->update(
		$tabela_os,
		array(
			'status_os' => 2,
			'data_orcam' => $dataOrcamento, 'valor_total' => $valorTotal,
			'dias_serv' => $tempoServico, 	'tempo_garantia' => $tempoGarantia
			),
		array( 'ID' => $num_os )
			);
	}
	else {
	$wpdb->update(
	$tabela_os,
	array(
		'data_orcam' => $dataOrcamento, 'valor_total' => $valorTotal,
		'dias_serv' => $tempoServico, 	'tempo_garantia' => $tempoGarantia
		),
	array( 'ID' => $num_os )
		);
	}

}

/* STATUS AUTORIZAÇÃO, EXECUÇÃO E ENTREGA */

$autorizacao_sim		=	$_POST['autorizacao_sim'];
$autorizacao_agu		=	$_POST['autorizacao_agu'];
$autorizacao_nao		=	$_POST['autorizacao_nao'];
$executado_sim			=	$_POST['executado_sim'];
$executado_agu			=	$_POST['executado_agu'];
$executado_nao			=	$_POST['executado_nao'];
$entregue_sim			=	$_POST['entregue_sim'];
$entregue_rep_sim		=	$_POST['entregue_rep_sim'];
$entregue_agu			=	$_POST['entregue_agu'];

if ( $autorizacao_sim ) { 
	$wpdb->update( $tabela_os, array( 'status_os' => 3 ), array( 'ID' => $num_os ) ); }
if ( $autorizacao_nao ) { 
	$wpdb->update( $tabela_os, array( 'status_os' => 4 ), array( 'ID' => $num_os ) ); }

	
if ( $executado_sim ) { 
	$wpdb->update( $tabela_os, array( 'status_os' => 5 ), array( 'ID' => $num_os ) ); }
if ( $executado_nao ) { 
	$wpdb->update( $tabela_os, array( 'status_os' => 6 ), array( 'ID' => $num_os ) ); }

	
if ( $entregue_sim ) { 
	$wpdb->update( $tabela_os, array( 'status_os' => 7 ), array( 'ID' => $num_os ) ); }
if ( $entregue_rep_sim ) { 
	$wpdb->update( $tabela_os, array( 'status_os' => 8 ), array( 'ID' => $num_os ) ); }

if ( $autorizacao_agu || $executado_agu || $entregue_agu ) { 
	$proximo_link	=	admin_url('admin.php?page=wot_consultar');
	header("location:$proximo_link");}

	
/* FATURAMENTO */

$att_faturamento	=	$_POST['salvarPagamento'];

$descon_pag		=	str_replace(",", ".", $_POST['descon-pag']);
$valor_final	=	str_replace(",", ".", $_POST['valor-final']);
$form_pag		=	$_POST['form-pag'];
$desc_pag		=	$_POST['desc-pag'];
$nome_pag		=	$_POST['nome-pag'];
$cpf_pag		=	$_POST['cpf-pag'];
$receb_pag		=	$_POST['receb-pag'];
$data_pag		=	current_time( 'mysql' );

if ( $att_faturamento ) {
	$wpdb->update( $tabela_os, array(
	'status_os' => 8,
	'descon_pag' => $descon_pag, 'valor_final' => $valor_final, 'forma_pag' => $form_pag, 'desc_pag' => $desc_pag,
	'nome_pag' => $nome_pag, 'cpf_pag' => $cpf_pag, 'receb_pag' => $receb_pag, 'data_pag' => $data_pag
	),
	array( 'ID' => $num_os ) ); }

?>