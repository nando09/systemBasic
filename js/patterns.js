function countMensagemTop(){
	$.ajax({
		url: '/System/systemBasic/view/Mensagem/top-mensagens.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			if (dados > 0) {
				$("#msg-top").removeClass('none');
				$("#msg-top").text(dados);
				$("#msg-top").text(dados);
			}else{
				$("#msg-top").addClass('none');
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

function popularMensagem(){
	$.ajax({
		url: '/System/systemBasic/view/Mensagem/mensagens.php', // Url do lado server que vai receber o arquivo
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

			$("#mensagens tr").remove();
			$("#mensagens").append(dados);
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

// function montaMensagem(){
// 	$.ajax({
// 		url: '/System/systemBasic/view/patterns/insereMensagens.php', // Url do lado server que vai receber o arquivo
// 		dataType: 'json',
// 		processData: false,
// 		contentType: false,
// 		success: function(dados) {
// 			if (dados == "") {
// 			}
// 		},
// 		error: function(dados) {
// 			$.bootstrapGrowl("ERRO!", {
// 				ele: 'body', // which element to append to
// 				type: 'danger', // (null, 'info', 'danger', 'success')
// 				offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
// 				align: 'right', // ('left', 'right', or 'center')
// 				width: 'auto', // (integer, or 'auto')
// 				delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
// 				allow_dismiss: true, // If true then will display a cross to close the popup.
// 				stackup_spacing: 10 // spacing between consecutively stacked growls.
// 			});
// 		}
// 	});
// }

function verMensagemTop(){
	$.ajax({
		url: '/System/systemBasic/view/Mensagem/monta.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			if (dados == "S") {
				// $("#msg-top").removeClass('none');
				// $("#msg-top").text(dados);
				popularMensagem();
				countMensagemTop();
			}else{
				$.bootstrapGrowl("ERRO nas mensagem, falar com suporte!", {
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

$(document).ready(function(){
	$(".search-primary").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$(".table .tbody-primary tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});

	// montaMensagem();
	$("#reload_msg").click(function(){
		verMensagemTop();
		// console.log('Reload mensagem!');
	});
	countMensagemTop();
});
