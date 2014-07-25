<?php 

/*

Plugin Name: Work Order Tracking
Description: Plugin para cadastro, consulta e administração de Ordens de Serviços. Permite ao administrador disponibilizar em seu site um formulário para que os clientes possam acompanhar o andamento dos seus serviços.
Version: 1.0
Author: Tiago Lima
Author URI: http://www.facebook.com/limaatiago

*/

define( 'WP_DEBUG', true );

// MENU
function wot_menu() {
	add_menu_page( 'WOTracking', 'WOTracking', 'add_users', 'wotracking', 'wot_principal', plugins_url('imagens/favicon.ico', __FILE__ ) );
	add_submenu_page( 'wotracking', 'Work Order Tracking', 'Principal', 'add_users', 'wotracking' );
	add_submenu_page( 'wotracking', 'Nova Ordem de Serviço', 'Nova OS', 'add_users', 'wot_criar_nova', 'wot_criar_nova' );
	add_submenu_page( 'wotracking', 'Consultar Ordem de Serviço', 'Consultar OS', 'add_users', 'wot_consultar', 'wot_consultar' );
	add_submenu_page( 'wotracking', 'Configurações', 'Configurações', 'add_users', 'wot_configuracoes', 'wot_configuracoes' );
}

add_action( 'admin_menu', 'wot_menu' );


// PAGINAS MENU
function wot_principal() {
	include( 'paginas/principal.php' );
}
function wot_criar_nova() {
	include( 'paginas/nova_os.php' );
}
function wot_consultar() {
	include( 'paginas/consultar_os.php' );
}
function wot_configuracoes() {
	include( 'paginas/configuracoes.php' );
}


// PAGINA OS
function wot_pagina_os() {
	include( 'paginas/pagina_os.php' );
}


// CSS E JS
function wot_css_e_js() {
	wp_register_style('wot_css_e_js', plugins_url('css/style.css', __FILE__ ));
	wp_enqueue_style('wot_css_e_js');
	wp_register_script( 'wot_css_e_js', plugins_url('js/script.js', __FILE__ ));
	wp_enqueue_script('wot_css_e_js');
}

add_action( 'admin_init','wot_css_e_js');

//wp_register_style( 'namespace', plugins_url('css/print.css', __FILE__), false, null, 'print' );


// VERSAO DE IMPRESSAO
function wot_css_impressao( $hook ) {
	global $plugin_page, $salvar_os;
	if ( $hook == 'wot_consultar' && $hook == 'wot_criar_nova' ) {
		return;
	}
	wp_enqueue_style( 'prefix-style', plugins_url('css/print.css', __FILE__), false, null, 'print' );
}

add_action( 'admin_enqueue_scripts', 'wot_css_impressao' );


// UPLOADER PARA O BANNER
function wot_add_banner_scripts() {
wp_enqueue_script( 'media-upload' );
wp_enqueue_script( 'thickbox' );
wp_enqueue_script( 'jquery' );
}

function wot_add_banner_style() {
wp_enqueue_style( 'thickbox' );
}

add_action( 'admin_print_scripts', 'wot_add_banner_scripts' );
add_action( 'admin_print_styles', 'wot_add_banner_style' );
add_action( 'admin_enqueue_scripts', 'wot_add_banner' );
 

function wot_add_banner() {
    if ( isset( $_GET['page'] ) && $_GET['page'] == 'wot_configuracoes' ) {
        wp_enqueue_media();
        wp_register_script( 'my-admin-js', WP_PLUGIN_URL.'js/script.js', array( 'jquery' ) );
        wp_enqueue_script( 'my-admin-js' );
    }
}


// TABELAS E OPTIONS

$tabela_os			= $wpdb->prefix . "wot_os";
$tabela_orcamento	= $wpdb->prefix . "wot_orcamento";

include( 'instalador.php' );

add_option( 'wot_banner_empresa', plugins_url('imagens/banner.jpg', __FILE__ ) );
add_option( 'wot_nome_empresa', get_option( 'blogname' ) );
add_option( 'wot_ender_empresa', '' );
add_option( 'wot_tel1_empresa', '' );
add_option( 'wot_tel2_empresa', '' );
add_option( 'wot_email_empresa', get_option( 'admin_email' ) );
add_option( 'wot_site_empresa', get_option( 'home' ) );
add_option( 'wot_info_empresa', '' );


// WIDGET E SHORTCODE

include('paginas/widget.php');
include('paginas/shortcode.php');

?>