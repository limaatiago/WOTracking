<?php
require_once('../wp-load.php');
global $current_user;
?>

<div class="wrap">
	<h2><?php echo get_admin_page_title() ; ?></h2>
	<div id="conteudo-principal">
		<!-- Quadro de boas-vindas com o nome do atual usuário -->
		<table id="wot_bemvindo" class="widefat">
			<thead>
				<th>Bem vindo!</th>
			</thead>
			<tr>
				<td>
				<p>
				Olá <b><?php echo $current_user->display_name ?></b>, bem-vindo ao plugin WOTracking! Escolha ao lado uma das opções de acesso<br/><br/>Não esqueça que você pode disponibilizar aos seus clientes o acompanhamento dos serviços através do <a href="<?php echo admin_url("widgets.php"); ?>">widget</a> ou do shortcode <code>[WOTracking]</code>
				</p>
				</td>
			</tr>
		</table>
		<table id="tabela_principal" >
			<!-- Quadro de Nova OS -->
			<tr class="box-principal" onclick="window.location = '<?php echo admin_url("admin.php?page=wot_criar_nova"); ?>';">
				<td style="width:20%;background:#488ffb url('<?php echo plugins_url('../imagens/add.png', __FILE__)?>') no-repeat center;"></td>
				<td style="width:70%;">
					<div id="textos">
						<h2>Cadastrar Ordem de Serviço</h2>
						<p>Clique aqui para registrar novas entradas de serviços na assistência</p>
					</div>
				</td>
			</tr>
			<!-- Quadro de Localizar OS -->
			<tr class="box-principal" style="margin-top:16px;" onclick="window.location = '<?php echo admin_url("admin.php?page=wot_consultar"); ?>';">
				<td style="width:20%;background:#ffd205 url('<?php echo plugins_url('../imagens/localizar.png', __FILE__)?>') no-repeat center;"></td>
				<td style="width:70%;">
					<div id="textos">
						<h2>Localizar Ordem de Serviço</h2>
						<p>Acompanhe o andamento da OS ou edite informações cadastradas</p>
					</div>
				</td>
			</tr>
			<!-- Quadro de Informações Empresa -->
			<tr class="box-principal" style="margin-top:16px;" onclick="window.location = '<?php echo admin_url("admin.php?page=wot_configuracoes"); ?>';">
				<td style="width:20%;background:#ff679a url('<?php echo plugins_url('../imagens/config.png', __FILE__)?>') no-repeat center;"></td>
				<td style="width:70%;">
					<div id="textos">
						<h2>Informações da Assistência</h2>
						<p>
							<!-- Exibe a mensagem de acordo com as opções preenchidas na página de Configurações -->
							<?php if ( get_option( 'wot_banner_empresa' ) == "" || get_option( 'wot_nome_empresa' ) == "" || get_option( 'wot_ender_empresa' ) == "" || get_option( 'wot_tel1_empresa' ) == "" || get_option( 'wot_info_empresa' ) == "" ) {
							echo "Você precisa preencher alguns dados importantes da empresa";
							}
							else { echo "Maravilha! Os dados da empresa estão devidamente preenchidos"; }?>
						</p>
					</div>
				</td>
			</tr>
		</table>	
	</div>
</div>