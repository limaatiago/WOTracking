<?php
require_once('../wp-load.php');

global $wpdb, $tabela_os;
$buscar_ok		=	$_POST['enviarBusca'];
$tipo_pesquisa	=	$_POST['tipoBusca'];
$campo_pesquisa	=	$_POST['campoBusca'];

/* 	Verifica se há algum número de OS na URL.
	Se tiver, inclue a página de OS */
if ( isset($_GET['os'] ) ) {
	wot_pagina_os();
}

/* 	Se não houver, exibe a página de localizar */
else {

	/* Verifica o falor da opção selecionada no filtro */
	if ( $buscar_ok ) { 

		if ( $tipo_pesquisa == 1 ) {
			$filtro_pesquisa	=	"id";
		}
		elseif ( $tipo_pesquisa == 2 ) {
			$filtro_pesquisa	=	"cpf_cliente_os";
		}
		elseif ( $tipo_pesquisa == 3 ) {
			$filtro_pesquisa	=	"nome_cliente_os";
	}
	$resultados_os 	= $wpdb->get_results("SELECT * FROM " . $tabela_os . " WHERE " . $filtro_pesquisa . " LIKE '%" . $campo_pesquisa . "%' ORDER BY id DESC"); 
}

else { $resultados_os 	= $wpdb->get_results("SELECT * FROM " . $tabela_os . " ORDER BY id DESC"); }

?>

<div class="wrap">
	<h2><?php echo get_admin_page_title() ; ?></h2>
	<div id="conteudo">
			<table style="width:100%;padding-top:9px">
			<form method="post" >
				<tr>
					<td colspan="2">
					<label for="tipoBusca">Consultar por:</label>
					</td>
				</tr>
				<tr>
					<td width="20%">
						<select name="tipoBusca" id="tipoBusca" style="width:100%;" required >
							<optgroup label="-- Selecione --" disabled></optgroup>
						<!-- Caso a busca tenha sido ativada, exibe os dados inseridos previamente -->
						<?php if ( $buscar_ok ) {
						if ( $tipo_pesquisa == 1 ) {
						echo "<option value='1' selected>Número de OS</option>
							<option value='2'>CPF do Cliente</option>
							<option value='3'>Nome do Cliente</option>";
						}
						elseif ( $tipo_pesquisa == 2 ) {
						echo "<option value='1'>Número de OS</option>
							<option value='2' selected>CPF do Cliente</option>
							<option value='3'>Nome do Cliente</option>";
						}
						elseif ( $tipo_pesquisa == 3 ) {
						echo "<option value='1'>Número de OS</option>
							<option value='2'>CPF do Cliente</option>
							<option value='3' selected>Nome do Cliente</option>";
						}
						}
						else {
						echo "<option value='1'>Número de OS</option>
							<option value='2'>CPF do Cliente</option>
							<option value='3'>Nome do Cliente</option>";
						}
						?>
						</select>
					</td>
					<td>
						<input type="text" name="campoBusca" style="width:100%;" <?php if ( $buscar_ok ) { echo "value='" . $campo_pesquisa . "'"; }?>" required /> <br />
					</td>
					<td width="5%"><input type="submit" name="enviarBusca" class="button" value="Buscar" /></td>
				</tr>
				</form>
			</table>
			<table id="tabela-consulta" class="widefat">
				<thead>
					<tr>
						<th scope="col" id="ajustar" width="5%"><b>OS</b></th>
						<th scope="col" width="25%"><b>Nome do Cliente</b></th>
						<th scope="col" id="hide" width="12%"><b>CPF</b></th>
						<th scope="col" id="hide" width="11%"><b>Marca</b></th>
						<th scope="col" id="hide" width="11%"><b>Entrada</b></th>
						<th scope="col" id="hide" width="15%"><b>Status</b></th>
						<th scope="col" width="12%"> </th>
					</tr>
				</thead>
				<tbody>
				<?php
				if ( $resultados_os ) {
					foreach ($resultados_os as $resultados_os) {
					echo "
					<tr>
						<td><b>" . $resultados_os->id . "</b></td>
						<td> " . $resultados_os->nome_cliente_os . " </td>
						<td id='hide' > " . $resultados_os->cpf_cliente_os . " </td>
						<td id='hide' > " . $resultados_os->marca_prod_os . " </td>
						<td id='hide' > " . date('d/m/y', strtotime( $resultados_os->data_entrada )) . " </td>
						<td id='hide' > ";
						$status_echo_os = $resultados_os->status_os;
						if ( $resultados_os->status_os == 1 ) { echo "Aguardando Orçamento"; }
						elseif ( $resultados_os->status_os == 2 ) { echo "Aguardando Autorização"; }
						elseif ( $resultados_os->status_os == 3 ) { echo "Serviço em Execução"; }
						elseif ( $resultados_os->status_os == 4 ) { echo "Orçamento Reprovado"; }
						elseif ( $resultados_os->status_os == 5 ) { echo "Aguardando Retirada"; }
						elseif ( $resultados_os->status_os == 6 ) { echo "Serviço Reprovado"; }
						elseif ( $resultados_os->status_os == 7 ) { echo "Aguardando Pagamento"; }
						elseif ( $resultados_os->status_os == 8 ) { echo "OS Finalizada"; }
						else { echo " "; }
						echo " </td>
						<td align='right'> 
								<a href='admin.php?page=wot_consultar&os=". $resultados_os->id . "'>Ver</a>
								| <a href='admin.php?page=wot_consultar&os=". $resultados_os->id . "&imprimir=os'>Imprimir</a>
						</td>
					</tr>
					";}
				}
				else { echo "<tr><td colspan='7'><center>OS Não Localizada. Tente Novamente!</center></td></tr>"; }
				?>
				</tbody>
			</table>
	</div>
</div> 
<?php } ?>