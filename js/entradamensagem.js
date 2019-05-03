function popularEntrada(){
	$.ajax({
		url: '/System/systemBasic/view/Entrada/mensagem.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
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

			$("#entrada tr").remove();
			$("#entrada").append(dados);
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
		url: '/System/systemBasic/view/Entrada/usuarios.php', // Url do lado server que vai receber o arquivo
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
		assunto		:	$("#assunto").val(),
		descricao	:	$("#descricao").val()
	}

	$.ajax({
		url: '/System/systemBasic/view/Entrada/adiciona.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: post,
		success: function(dados) {
			if (dados.retorno == 'S') {
				$.bootstrapGrowl("Mensagem enviada!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});

				popularEntrada();
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

function adicionarMsg(){
	var post = {
		id			:	$("#id-msg").val(),
		descricao	:	$("#descricao-msg").val()
	}

	// console.log(post);
	$.ajax({
		url: '/System/systemBasic/view/Entrada/adicionarMsg.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: post,
		success: function(dados) {
			if (dados.retorno == 'S') {
				limparCampos();
				chamaMensagem($("#id-msg").val());
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

function chamaMensagem(id){
	var post = {
		id	:	id
	}

	$("#id-msg").val(id);

	$.ajax({
		url: '/System/systemBasic/view/Entrada/conversas.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: post,
		success: function(dados) {
			if (dados.retorno == 'S') {
				$("#conversas .msg-conversas p").remove();
				$("#conversas .msg-conversas").append(dados.p);
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

function limparCampos(){
	$("#nome").val('');
	$("#assunto").val('');
	$("#descricao").val('');
	$("#descricao-msg").val('');
}

$(document).ready(function() {
	usuariosSelect();
	popularEntrada();

	$("#entrada").click(function(){
		var alvoEvento = $(event.target);
		var id = alvoEvento.nextAll("#id").text();

		chamaMensagem(id);
	});

	$("#salvar-msg").click(function(){
		adicionarMsg();
	});

	$("#limpar-msg").click(function(){
		limparCampos();
	});

	$("#salvar-projeto").on('click', function(){
		adicionaProjetos();
	});
});

