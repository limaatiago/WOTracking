<?php 
	
require_once( '../wp-load.php' );

global $wpdb, $tabela_os, $current_user;

function inserir_os_db() {
	
	global $wpdb, $tabela_os;
	
	#Info da OS
	$tipo_os			=	$_POST['radio-garantia'];
	$data_entrada		=	current_time( 'mysql' );
	$status_os			=	1;
	$autor_os			=	$_POST['nome-do-autor'];

	#Info do Cliente
	$cpf_cliente_os		= 	$_POST['cpf-cliente'];
	$rg_cliente_os		=	$_POST['rg-cliente'];
	$nome_cliente_os	=	$_POST['nome-cliente'];
	$email_cliente_os	=	$_POST['email-cliente'];
	$ender_cliente_os	=	$_POST['endereco-cliente'];
	$tel_cliente_os		=	$_POST['telefone-cliente'];
	$cel_cliente_os		=	$_POST['celular-cliente'];
	$com_cliente_os		=	$_POST['comercial-cliente'];

	#Info do Produto
	$tipo_prod_os		=	$_POST['tipo-produto'];
	$marca_prod_os		=	$_POST['marca-produto'];
	$ref_prod_os		=	$_POST['referencia-produto'];
	$mod_prod_os		=	$_POST['modelo-produto'];
	$desc_prod_os		=	$_POST['descricao-produto'];
	$carac_prod_os		=	$_POST['caracteristicas-produto'];
	$def_prod_os		=	$_POST['defeitos-produto'];
	
	$wpdb->insert(
		$tabela_os,
		array(
			'tipo_os' => $tipo_os,
			'status_os' => $status_os,
			'data_entrada' => $data_entrada,
			'autor_os' => $autor_os,
			'cpf_cliente_os' => $cpf_cliente_os,
			'rg_cliente_os' => $rg_cliente_os,
			'nome_cliente_os' => $nome_cliente_os,
			'email_cliente_os' => $email_cliente_os,
			'ender_cliente_os' => $ender_cliente_os,
			'tel_princ_cliente_os' => $tel_cliente_os,
			'tel_cel_cliente_os' => $cel_cliente_os,
			'tel_com_cliente_os' => $com_cliente_os,
			'tipo_prod_os' => $tipo_prod_os,
			'marca_prod_os' => $marca_prod_os,
			'ref_prod_os' => $ref_prod_os,
			'mod_prod_os' => $mod_prod_os,
			'desc_prod_os' => $desc_prod_os,
			'carac_prod_os' => $carac_prod_os,
			'def_prod_os' => $def_prod_os
		)
	);

}

$salvar_os		=	$_POST['cadastrar_os'];
$imprimir_os	=	$_POST['botao_imprimir'];

if ( isset( $_GET['os'] ) ) {
	wot_pagina_os();
}

elseif ( $salvar_os ) {
	
	inserir_os_db(); 
	$num_os		=	$wpdb->insert_id;
	$os_gerada	=	admin_url("admin.php?page=wot_criar_nova&os=$num_os");
	header("location:$os_gerada");
	
}

elseif ( $imprimir_os ) {
	inserir_os_db();
	$num_os		=	$wpdb->insert_id;
	$os_gerada	=	admin_url("admin.php?page=wot_criar_nova&os=$num_os&imprimir=os");
	header("location:$os_gerada");
}

else { ?>
<div class="wrap">
	<form id="form-criar-os" name="form-criar-os" method="post">
		<h2><?php echo get_admin_page_title() ?></h2>
		<div id="conteudo">
	
			<!-- Info da OS -->
			<div class="infos-os">
				<b>Tipo:</b>
				<input type="radio" name="radio-garantia" id="fora-de-garantia" value="1" required /> 
				<label for="fora-de-garantia">Fora de Garantia </label>
				<input type="radio" name="radio-garantia" id="em-garantia" value="2" /> 
				<label for="em-garantia">Em Garantia</label>
			</div>
			<div id="informacoes-da-os">
				<label class="etiqueta" for="nome-do-autor"><b>OS cadastrada por:</b></label>
				<input type="text" size="5" id="nome-do-autor" name="nome-do-autor" value="<?php echo $current_user->display_name ?>"/>
			</div>
			
			<!-- Info do Cliente -->
			<table id="wot_tabela" class="widefat">
				<thead>
					<th colspan="12"><b>Dados do Cliente</b></th>
				</thead>
				<tbody>
					<tr>
						<td colspan="6">
							<label for="cpf-cliente"> <b>CPF:</b> </label> <br/>
							<input type="text" id="cpf-cliente" name="cpf-cliente" required />
						</td>
						<td colspan="6">
							<label for="rg-cliente"> <b>RG:</b> </label> <br/>
							<input type="text" id="rg-cliente" name="rg-cliente" required />
						</td>
					</tr>
					<tr>
						<td colspan="6">
							<label for="nome-cliente"> <b>Nome:</b> </label> <br/>
							<input type="text" id="nome-cliente" name="nome-cliente" required />
						</td>
						<td colspan="6">
							<label for="email-cliente"> <b>Email:</b> </label> <br/>
							<input type="text" id="email-cliente" name="email-cliente" />
						</td>
					</tr>
					<tr>
						<td colspan="12">
							<label for="endereco-cliente"> <b>Endereço:</b> </label> <br/>
							<input type="text" id="endereco-cliente" name="endereco-cliente" />
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<label for="telefone-cliente"> <b>Telefone:</b> </label> <br/>
							<input type="text" id="telefone-cliente" name="telefone-cliente" required />
						</td>
						<td colspan="4">
							<label for="celular-cliente"> <b>Celular:</b> </label> <br/>
							<input type="text" id="celular-cliente" name="celular-cliente" required />
						</td>
						<td colspan="4">
							<label for="comercial-cliente"> <b>Comercial:</b> </label> <br/>
							<input type="text" id="comercial-cliente" name="comercial-cliente"/>
						</td>
					</tr>
				</tbody>
			</table>

			<!-- Info do Produto -->
			<table id="wot_tabela" class="widefat">
				<thead>
					<th colspan="2"> <b>Dados do Produto</b> </th>
				</thead>
				<tbody>
					<tr>
						<td>
							<label for="tipo-produto"> <b>Tipo:</b> </label> <br/>
							<input type="text" id="tipo-produto" name="tipo-produto" required />
						</td>
						<td>
							<label for="marca-produto"> <b>Marca:</b> </label> <br/>
							<input type="text" id="marca-produto" name="marca-produto" required />
						</td>
					</tr>
					<tr>
						<td>
							<label for="referencia-produto"> <b>Referência:</b> </label> <br/>
							<input type="text" id="referencia-produto" name="referencia-produto" required />
						</td>
						<td>
							<label for="modelo-produto"> <b>Modelo:</b> </label> <br/>
							<input type="text" id="modelo-produto" name="modelo-produto" required />
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label for="descricao-produto"> <b>Descrição:</b> <i>(Cores, formatos, tamanhos, quantidades etc.)</i></label> <br/>
							<input type="text" id="descricao-produto" name="descricao-produto" required />
						</td>
					</tr>
					<tr>
						<td>
							<label for="caracteristicas-produto"> <b>Características Externas:</b> <i>(Riscos, amassos, descascamentos etc.)</i> </label> <br/>
							<textarea type="text" id="caracteristicas-produto" name="caracteristicas-produto" required ></textarea>
						</td>
						<td>
							<label for="defeitos-produto"> <b>Defeito(s) Segundo o Cliente:</b> <i>(Defeitos e/ou serviços a serem executados)</i></label> <br/>
							<textarea type="text" id="defeitos-produto" name="defeitos-produto" required ></textarea>
						</td>
					</tr>
				</tbody>
			</table>
			
			<div class="buttons-bottom">
				<div id="coluna-esquerda">
					<input type="button" name="botao-limpar" class="button" value="Limpar" />
				</div>
				<div id="coluna-direita">
					<input type="submit" name="botao_imprimir" class="button" value="Salvar e Imprimir"/>
					<input type="submit" id="salvar_os" name="cadastrar_os" class="button button-primary" value="Salvar"/> 
				</div>
			</div>

		</div>
	</form>
</div>

<?php
}
?>