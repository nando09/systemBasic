function popularCampos(){
	popularSelectTipos();
}

function popularProjetos(){

	$.ajax({
		url: '/System/systemBasic/view/Servicos/projetos.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: post,
		success: function(dados) {
			if (dados == "") {
				$.bootstrapGrowl("Não trouxe nenhum registro!", {
					ele: 'body', // which element to append to
					type: 'info', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});
			}

			$("#projetos tr").remove();
			$("#projetos").append(dados);
			// preparaExcluirClientes();
			// preparaDetalharClientes();
			// preparaEditarClientes();
		},
		error: function(dados) {
			$.bootstrapGrowl("ERRO!", {
				ele: 'body', // which element to append to
				type: 'danger', // (null, 'info', 'danger', 'success')
				offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
				align: 'right', // ('left', 'right', or 'center')
				width: 'auto', // (integer, or 'auto')
				delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
				allow_dismiss: true, // If true then will display a cross to close the popup.
				stackup_spacing: 10 // spacing between consecutively stacked growls.
			});
		}
	});
}

function popularSelectTipos(){
	$.ajax({
		url: '/System/systemBasic/view/Perfil/acessos.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'POST',
		success: function(dados) {
			if (dados == "") {
				$.bootstrapGrowl("Não trouxe nenhum registro!", {
					ele: 'body', // which element to append to
					type: 'info', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});
			}

			$("#tipos option").remove();
			$("#tipos").append(dados.HTML);
		},
		error: function(dados) {
			$.bootstrapGrowl("ERRO!", {
				ele: 'body', // which element to append to
				type: 'danger', // (null, 'info', 'danger', 'success')
				offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
				align: 'right', // ('left', 'right', or 'center')
				width: 'auto', // (integer, or 'auto')
				delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
				allow_dismiss: true, // If true then will display a cross to close the popup.
				stackup_spacing: 10 // spacing between consecutively stacked growls.
			});
		}
	});
}

function salvarUsuario(){
	var posts = {
		nome	:	$('#nome').val(),
		email	:	$('#email').val(),
		Login	:	$('#Login').val(),
		senha	:	$('#senha').val(),
		tipos	:	$('#tipos').val()
	}

	$.ajax({
		url: '/System/systemBasic/view/Servicos/salvarUsuario.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: posts,
		success: function(dados) {
			if (dados == 'S') {
				$.bootstrapGrowl("Cadastrado usuario!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});

				$('.modal').modal('hide');
				limparCampo();
			}

		},
		error: function(dados) {
			$.bootstrapGrowl("ERRO!", {
				ele: 'body', // which element to append to
				type: 'danger', // (null, 'info', 'danger', 'success')
				offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
				align: 'right', // ('left', 'right', or 'center')
				width: 'auto', // (integer, or 'auto')
				delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
				allow_dismiss: true, // If true then will display a cross to close the popup.
				stackup_spacing: 10 // spacing between consecutively stacked growls.
			});
		}
	});
}

function salvarAcesso(){
	var posts = {
		Usuarios		:	$('#Usuarios').is(':checked'),
		Projetos		:	$('#Projetos').is(':checked'),
		Relatorios		:	$('#Relatorios').is(':checked'),
		Mensagens		:	$('#Mensagens').is(':checked'),
		Fornecedores	:	$('#Fornecedores').is(':checked'),
		nome			:	$('#nome-acesso').val()
	}

	// console.log(posts);

	$.ajax({
		url: '/System/systemBasic/view/Servicos/salvarAcesso.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: posts,
		success: function(dados) {
			if (dados == 'S') {
				$.bootstrapGrowl("Acesso novo cadastrado!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});

				$('.modal').modal('hide');
				popularSelectTipos();
				limparCampo();
			}

		},
		error: function(dados) {
			$.bootstrapGrowl("ERRO!", {
				ele: 'body', // which element to append to
				type: 'danger', // (null, 'info', 'danger', 'success')
				offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
				align: 'right', // ('left', 'right', or 'center')
				width: 'auto', // (integer, or 'auto')
				delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
				allow_dismiss: true, // If true then will display a cross to close the popup.
				stackup_spacing: 10 // spacing between consecutively stacked growls.
			});
		}
	});
}

function limparCampo(){
	$('#nome').val('');
	$('#email').val('');
	$('#Login').val('');
	$('#senha').val('');
	$('#tipos').val('');

	$('#Usuarios').prop('checked', false);
	$('#Projetos').prop('checked', false);
	$('#Relatorios').prop('checked', false);
	$('#Mensagens').prop('checked', false);
	$('#Fornecedores').prop('checked', false);
	$('#nome').val('');
}

$(document).ready(function() {
	popularCampos();
	limparCampo();

	$('#salvar-usuario').click(function(){
		salvarUsuario();
	});

	$('#salvar-acesso').click(function(){
		salvarAcesso();
	});
});

