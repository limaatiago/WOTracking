<?php

require_once('../wp-load.php');

$salvar_emp	=	$_POST['salvar_emp'];

$banner_empresa		=	$_POST['ad_image'];
$nome_empresa		=	$_POST['nome-empresa'];
$ender_empresa		=	$_POST['endereco-empresa'];
$tel1_empresa		=	$_POST['telefone1-empresa'];
$tel2_empresa		=	$_POST['telefone2-empresa'];
$email_empresa		=	$_POST['email-empresa'];
$site_empresa		=	$_POST['site-empresa'];
$info_empresa		=	$_POST['info-add-os'];

/* Atualiza as informações no banco */
if ( $salvar_emp ) {

update_option( 'wot_banner_empresa', $banner_empresa );
update_option( 'wot_nome_empresa', $nome_empresa );
update_option( 'wot_ender_empresa', $ender_empresa );
update_option( 'wot_tel1_empresa', $tel1_empresa );
update_option( 'wot_tel2_empresa', $tel2_empresa );
update_option( 'wot_email_empresa', $email_empresa );
update_option( 'wot_site_empresa', $site_empresa );
update_option( 'wot_info_empresa', $info_empresa );

/* Exibe mensagem de confirmação */
$messagem	=	'<div class="updated fade" id="message"><p>Configurações salvas com sucesso!</p></div>';
	
}
	
?>

<div class="wrap">
	<h2>Configurações</h2>
	<?php echo $messagem; ?>
	<div id="conteudo" style="margin-top:10px;">
		<form name="form-config-empresa" method="post" >
			<table id="wot_tabela" class="widefat">
				<thead>
					<th colspan="2"><b>Informações da Empresa</th>
				</thead>
				<tbody>
					<tr>
						<!-- Uploader do banner -->
						<td>
							<label for="upload_image"><b>Banner:</b></label>  <br/>
							<input id="upload_image" type="text" name="ad_image" value="<?php echo get_option( 'wot_banner_empresa' ) ?>"/> <br/>
						</td>
						<td>
							<br />
							<input id="upload_image_button" class="button" type="button" value="Selecionar Imagem" />
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label for="nome-empresa"><b>Nome:</b></label> <br/>
							<input name="nome-empresa" type="text" id="nome-empresa" value="<?php echo get_option( 'wot_nome_empresa' )  ?>" />
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label for="endereco-empresa"><b>Endereço:</b> <i>(Dê preferência a abreviações. Ex: R, Av, Nº...)</i></label><br/>
							<input name="endereco-empresa" type="text" id="endereco-empresa" value="<?php echo get_option( 'wot_ender_empresa' ) ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="telefone1-empresa"><b>Telefone(s):</b></label> <br />
							<input name="telefone1-empresa" type="text" id="telefone1-empresa" value="<?php echo get_option( 'wot_tel1_empresa' ) ?>" />
						</td>
						<td>
							<br/>
							<input name="telefone2-empresa" type="text" id="telefone2-empresa" value="<?php echo get_option( 'wot_tel2_empresa' ) ?>" />
						</td>
					</tr>
					<tr>
						<td colspan="2"><label for="email-empresa"><b>Email:</b></label> <br/>
							<input name="email-empresa" type="text" id="email-empresa" value="<?php echo get_option( 'wot_email_empresa' ) ?>" />
						</td>
					</tr>
					<tr>
						<td colspan="2"><label for="site-empresa"><b>Site:</b></label> <br/>
							<input name="site-empresa" type="text" id="site-empresa" value="<?php echo get_option( 'wot_site_empresa' ) ?>" />
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<label for="info-add-os"><b>Informações Adicionais da OS:</b> <i>(Serão exibidas no rodapé da Ordem de Serviço)</i></label> <br/>
						<textarea name="info-add-os" type="text" id="info-add-os" ><?php echo get_option( 'wot_info_empresa' ) ?></textarea>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="buttons-bottom">
				<div id="coluna-esquerda">
					<input type="submit" name="salvar_emp" class="button button-primary" value="Salvar"/>
				</div>
			</div>
		</form>
	</div>
</div>