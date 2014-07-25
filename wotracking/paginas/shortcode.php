<?php

/* Especifica o nome do shortcode */
add_shortcode( 'WOTracking', 'WOTracking_handler' );	

/* Função a ser executada pelo shortcode */
function WOTracking_handler() {

	global $wpdb, $tabela_os;
		
	$OSBusca	=	$_POST['busca_os'];
	$CPFBusca	=	$_POST['busca_cpf'];
	$OKBusca	=	$_POST['busca_page_ok'];
	
	/* Se o botão de busca for ativado */
	if ( $OKBusca ) {
		
		global $wpdb;
		$buscar_os	=	$wpdb->get_row("SELECT * FROM " . $tabela_os . " WHERE id=". $OSBusca ." AND cpf_cliente_os=" . $CPFBusca . "");
		
		if ( $buscar_os ) {
			echo "<p><b>OS: " . $buscar_os->id . "</b><br />
			STATUS: ";
			if ( $buscar_os->status_os == 1 ) { echo "Aguardando Orçamento<br /><center>Seu serviço está em análise.</center>"; }
			elseif ( $buscar_os->status_os == 2 ) { echo "Aguardando Autorização<br /><center>Aguardamos sua autorização para dar procedimento ao serviço. Favor entrar em contato.</center>"; }
			elseif ( $buscar_os->status_os == 3 ) { echo "Serviço em Execução<br /><center>Estamos executando seu serviço. Por favor, aguarde mais um pouco.</center>"; }
			elseif ( $buscar_os->status_os == 4 ) { echo "Orçamento Reprovado<br /><center>O orçamento foi reprovado. Entre em contato para saber mais.</center>"; }
			elseif ( $buscar_os->status_os == 5 ) { echo "Aguardando Retirada<br /><center>Esperamos sua visita para retirada do produto.</center>"; }
			elseif ( $buscar_os->status_os == 6 ) { echo "Serviço Reprovado<br /><center>O técnico encontrou problemas na execução deste serviço. Para mais informações, por favor, entre em contato conosco.</center>"; }
			elseif ( $buscar_os->status_os == 7 ) { echo "Aguardando Faturamento<br /><center>O serviço já foi efetuado e o produto entregue. Entre em contato conosco para maiores informações.</center>"; }
			elseif ( $buscar_os->status_os == 8 ) { echo "OS Finalizada<br /><center>O produto já foi entregue. Contamos com você para o seu próximo serviço.</center>"; }
			else { echo ""; }
			echo "</p>";
		}
		else {
			echo "<p>OS Não Localizada</p>";
		}
	
	}
	
?>

<!-- Formulário exibido -->
<table id="wot_busca">
	<form method="post">
		<tr>
			<td align="right"><label for="busca_os">OS:</td>
			<td><input type="text" name="busca_os" size="5" required /></label></tr>	
		</tr>
		<tr>
			<td align="right"><label for="busca_cpf">CPF:</td>
			<td><input type="text" name="busca_cpf" size="10" required /></label></td>
		<tr>
			<td></td>
			<td><input type="submit" name="busca_page_ok" value="OK" /></label><br /></td>
		</tr>
	</form>
</table>

<?php
}
?>