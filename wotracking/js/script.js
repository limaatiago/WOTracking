jQuery(document).ready(function($){

/* INPUTS DE NÚMEROS */

// Cadastro OS
$( '#cpf-cliente, #rg-cliente' ).keyup(function() {
	this.value = this.value.replace(/[^0-9\.]/g,'').replace('.','');
});

// Orçamento
$( '#qtd_orc, #valor_peca, #valor_servi, #valor_total, #valor-total, #tempo-serv, #tempo-garantia' ).keyup(function() {
	this.value = this.value.replace(/[^0-9\,.]/g,'');
});

// Faturamento
$( '#descon-pag, #valor_final' ).keyup(function() {
	this.value = this.value.replace(/[^0-9\,.]/g,'');
});


/* CÁLCULO ORÇAMENTO */

$( '#wot_tabela input' ).blur(function(e) {
	var quantidade = $('#qtd_orc').val().replace(',','.');
    var valor_peca = $('#valor_peca').val().replace(',','.');
	var valor_serv = $('#valor_servi').val().replace(',','.');
	
	var equacao_orc	= quantidade * ( + (+valor_peca) + (+valor_serv) );
	
	$('#valor_total').val(equacao_orc);

});


/* CÁLCULO FATURAMENTO */

$( '#wot_tabela input' ).blur(function(e) {
	var valor_total = $('#valor-total').val().replace(',','.');
    var desconto = $('#descon-pag').val().replace(',','.');
	
	var equacao_fat	= valor_total - desconto;
	
	$('#valor-final').val(equacao_fat);

});



/* UPLOADER DO BANNER */

var custom_uploader;
$('#upload_image_button, #upload_image').click(function(e) {
	e.preventDefault();
	if (custom_uploader) {
		custom_uploader.open();
		return;
	}
	custom_uploader = wp.media.frames.file_frame = wp.media({
		title: 'Selecionar Imagem',
		button: {
		text: 'Selecionar Imagem'
		},
		multiple: false
	});
	custom_uploader.on('select', function() {
		attachment = custom_uploader.state().get('selection').first().toJSON();
		$('#upload_image').val(attachment.url);
	});
	custom_uploader.open();
});

 
});