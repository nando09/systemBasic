function popularProjetos(){
	var post = {
		id		:	$("#nome").val()
	}

	$.ajax({
		url: '/System/systemBasic/view/Projetos/projetos.php', // Url do lado server que vai receber o arquivo
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

function usuariosSelect(){
	$.ajax({
		url: '/System/systemBasic/view/Projetos/usuarios.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			$("#nome").append(dados);
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

function adicionaProjetos(){
	var post = {
		nome		:	$("#nome").val(),
		data		:	$("#data").val(),
		descricao	:	$("#descricao").val()
	}

	$.ajax({
		url: '/System/systemBasic/view/Projetos/adiciona.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: post,
		success: function(dados) {
			if (dados == 'S') {
				$.bootstrapGrowl("Projeto adicionado com sucesso!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});

				popularProjetos();
				limparCampos();
				$('.modal').modal('hide');
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

function validaProjeto(){
	var nome = $("#nome").val('');
	var data = $("#data").val('');
	var descricao = $("#descricao").val('');

	if(nome == ''){
		mensagemValida(nome);
		$("#nome").focus();
		return false;
	}else if(data == ''){
		mensagemValida(data);
		$("#data").focus();
		return false;
	}else if(descricao == ''){
		mensagemValida(descrição);
		$("#descricao").focus();
		return false;
	}else{
		return true;
	}
}

function mensagemValida(nome){
	$.bootstrapGrowl("Campo " + nome + " tem que estar preechido!", {
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

function limparCampos(){
	$("#nome").val('');
	$("#data").val('');
	$("#descricao").val('');
}

$(document).ready(function() {
	usuariosSelect();
	popularProjetos();

	$("#salvar-projeto").on('click', function(){
		if (validaProjeto()) {
			adicionaProjetos();
		}
	});
});

