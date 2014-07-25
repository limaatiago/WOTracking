<?php

/* Versão da tabela do plugin */
global $wotracking_versao_db;
$wotracking_versao_db = "1.0";

function criar_tabelas() {

	global $wpdb, $wotracking_versao_db;
	global $tabela_os, $tabela_orcamento;

	/* Cria a tabela das OS */
	if ( $wpdb->get_var( 'SHOW TABLES LIKE ' . $tabela_os ) != $tabela_os ) {
		$sql_os = 'CREATE TABLE ' . $tabela_os  . '(
			id int(10) NOT NULL AUTO_INCREMENT,
			tipo_os int(2) NOT NULL,
			status_os int(2) NOT NULL,
			data_entrada datetime NOT NULL,
			autor_os varchar(15) NOT NULL,
			cpf_cliente_os varchar(20) NOT NULL,
			rg_cliente_os varchar(20) NOT NULL,
			nome_cliente_os varchar(150) NOT NULL,
			email_cliente_os varchar(150) NOT NULL,
			ender_cliente_os varchar(150) NOT NULL,
			tel_princ_cliente_os varchar(50) NOT NULL,
			tel_cel_cliente_os varchar(50) NOT NULL,
			tel_com_cliente_os varchar(50) NOT NULL,
			tipo_prod_os varchar(10) NOT NULL,
			marca_prod_os varchar(10) NOT NULL,
			ref_prod_os varchar(10) NOT NULL,
			mod_prod_os varchar(10) NOT NULL,
			desc_prod_os varchar(250) NOT NULL,
			carac_prod_os varchar(250) NOT NULL,
			def_prod_os varchar(250) NOT NULL,
			data_orcam datetime NOT NULL,
			valor_total double(10,2) NOT NULL,
			dias_serv int(5) NOT NULL,
			tempo_garantia int(5) NOT NULL,
			descon_pag double(10,2) NOT NULL,
			valor_final double(10,2) NOT NULL,
			forma_pag varchar(50) NOT NULL,
			desc_pag varchar(50) NOT NULL,
			nome_pag varchar(150) NOT NULL,
			cpf_pag varchar(20) NOT NULL,
			receb_pag varchar(15) NOT NULL,
			data_pag datetime NOT NULL,
			UNIQUE KEY id (id)
		)';
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql_os );
	}
	
	/* Cria a tabela de orçamentos */
	if ( $wpdb->get_var( 'SHOW TABLES LIKE ' . $tabela_orcamento ) != $tabela_orcamento ) {
		$sql_orc = 'CREATE TABLE ' . $tabela_orcamento . '(
			id int(10) NOT NULL AUTO_INCREMENT,
			num_os int(10) NOT NULL,
			qtd_serv int(5) NOT NULL,
			desc_serv varchar(150) NOT NULL,
			e_o_serv int(5) NOT NULL,
			val_peca double(10,2) NOT NULL,
			val_serv double(10,2) NOT NULL,
			val_total double(10,2) NOT NULL,
			UNIQUE KEY id (id)
	)';
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql_orc);
	}
    
	add_option( 'wotracking_versao_db', $wotracking_versao_db );

}

register_activation_hook( __FILE__, 'criar_tabelas' );

/* Verifica a versão da tabela */
function wotracking_update_db() {
	
	global $wotracking_versao_db;
	
	if ( get_site_option( 'wotracking_versao_db' ) != $wotracking_versao_db ) {
		criar_tabelas();
    }

}

add_action('plugins_loaded', 'wotracking_update_db');

?>
