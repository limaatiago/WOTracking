<?php

require_once('../wp-load.php');

global $wpdb, $tabela_os, $tabela_empresa, $tabela_orcamento;

/* Verifica o número da OS */
if ( isset($_GET['os'] ) ) {
	$num_os		=	$_GET['os'];
}

/* Inclui a página de controle dos cliques */
include('funcoes.php');

/* Carrega as informações da OS */
$os_info 		= $wpdb->get_row("SELECT * FROM " . $tabela_os . " WHERE id=" . $num_os . ";");

/* Carrega qual tipo de impressão e a página atual */
$imprimir		= $_GET['imprimir'];
$pagina_atual	= $_GET['page'];

if ( $num_os ) {
	
	/* Se o botão de impressão for ativado, inclui a página de impressão */
	if ( $imprimir ) {
		include( 'imprimir.php' );
	}

	else {
	?>

	<div class="wrap">			
		<h2>
			OS <?php echo $os_info->id ?>
			<!-- Se o orçamento já tiver sido salvo, exibe os dois
				botões de impressão. Se não, só o de OS -->
			<a href="<?php echo admin_url("admin.php?page=" . $pagina_atual . "&os=" . $num_os . "&imprimir=os")?>"><input type="button" name="imprimir_os" id="btn-imprimir" class="button button-primary" value="Imprimir OS"/></a>
			<?php if ( $os_info->status_os > 1 ) {
			?>
			<a href="<?php echo admin_url("admin.php?page=" . $pagina_atual. "&os=" . $num_os . "&imprimir=orcamento")?>"><input type="button" name="imprimir_orc" id="btn-imprimir" class="button button-primary" value="Imprimir Orçamento"/></a>
			<?php } ?>
		</h2> 
		<div id="conteudo">

			<div class="infos-os">
			<b>Tipo:</b> <?php
			if ( $os_info->tipo_os == 1 ) {
			echo "Fora de Garantia";
			}
			elseif ( $os_info->tipo_os == 2 ) {
			echo "Em Garantia";
			}  ?></div>
			<div id="informacoes-da-os" style="margin:9px 0 3px 0;">
			<b>Data<span id="nao-mostrar-impressao"> de Entrada</span>:</b> <?php echo date('d/m/y', strtotime( $os_info->data_entrada )) ?>
				<span id="nao-mostrar-impressao"> · <b> Atendente: </b> <?php echo $os_info->autor_os ?></span>
			</div>
			
			<div class="clear"></div>
	<?php
	
	/* Controla o conteúdo da página de acordo com o status */
	if ( $os_info->status_os == 1 ) {
		include('modulos/orcamento.php');
		include('modulos/os.php');
	}
	elseif ( $os_info->status_os == 2 || $os_info->status_os == 3 || $os_info->status_os == 4 || $os_info->status_os == 5 || $os_info->status_os == 6 ) {
		include('modulos/quadros.php');
		include('modulos/orcamento.php');
		include('modulos/os.php');
	}
	elseif ( $os_info->status_os == 7 ) {
		include('modulos/faturamento.php');
		include('modulos/quadros.php');
		include('modulos/orcamento.php');
		include('modulos/os.php');
	}
	elseif ( $os_info->status_os == 8 ) {
		if ( $os_info->data_pag == '0000-00-00 00:00:00' ) {
			include('modulos/finalizada.php');
			include('modulos/orcamento.php');
			include('modulos/os.php'); 
		}
		else {
			include('modulos/finalizada.php');
			include('modulos/faturamento.php'); 
			include('modulos/orcamento.php');
			include('modulos/os.php');
		}
	}
	?>
		</div>
	</div>
	<?php
	}
}
else { echo "OS Não Localizada"; }
	?>