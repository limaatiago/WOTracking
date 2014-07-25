<?php

/* Adiciona a opção de título do Widget na tabela wp_options */
add_option( 'wot_widget_title', 'WOTracking' );

/* Registra o Widget no Wordpress */
add_action( 'widgets_init', array( 'wot_widget', 'register' ) );
register_activation_hook( __FILE__, array( 'wot_widget', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'wot_widget', 'deactivate' ) );

class wot_widget {
	
	/* Controle de ativação/desativação do widget */
	function activate(){
		$data = array( 'title' => '' );
			if ( !get_option( 'wot_widget_widget' ) ){
				add_option( 'wot_widget_widget' , $data );
			} else {
				update_option( 'wot_widget_widget' , $data );
			}
	}
	function deactivate(){
			delete_option( 'wot_widget_widget' );
		}

	
	/* Quadro exibido na de página widgets */
	function control(){
		$data          = get_option( 'wot_widget_widget' );
		$widgetTitle   = $data['title'];
		?>
		<p>
        <label for="wot_display_title"><?php _e( 'Title' ); ?>: <br /><input type="text" name="wot_display_title" class="widefat" value="<?php echo $widgetTitle; ?>"/></label>
		</p>
		<?php
		if ( isset( $_POST['wot_display_title'] ) ){
			$data['title']   = esc_html( $_POST['wot_display_title'] );
			update_option( 'wot_widget_widget', $data );
		}
	}
	
	/* Função executada no site do administrador */
	function widget( $args ){
		global $wpdb, $tabela_os;
		
		$data          = get_option( 'wot_widget_widget' );
		$widgetTitle   = $data['title'];
		
		echo $args['before_widget'];
		echo $args['before_title'] . $widgetTitle . $args['after_title'];
		
		$OSBusca	=	$_POST['busca_os'];
		$CPFBusca	=	$_POST['busca_cpf'];
		$OKBusca	=	$_POST['busca_ok'];
		
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
					<td><input type="submit" name="busca_ok" value="OK" /></label><br /></td>
				</tr>
			</form>
		</table>
		<?php
		
		echo $args['after_widget'];

	}

/* Função executada na ativação */
function register(){
		register_sidebar_widget( 'WOTracking', array( 'wot_widget', 'widget' ) );
		register_widget_control( 'WOTracking', array( 'wot_widget', 'control' ) );
	}

}