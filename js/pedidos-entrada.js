function popularpedidos(){
	$('#salvar-pedido').click(function(){
		var nome = $("#nome").val();
		// Para pegar um valor de Select em jquery tem que selecionar o option que foi escolhido
		var cliente = $("#cliente-novo").val();
		var valor = $("#valor").val();
		var descricao = $("#descricao").val();
		var quantidade = $("#quantidade").val();
		var min = $("#min").val();


		// console.log(nome + '<br>' + cliente + '<br>' + valor + '<br>' + descricao);

		// var formDados  = $(this).serialize();
		$.ajax({
			url: '/System/systemBasic/view/pedidos/adiciona.php', // Url do lado server que vai receber o arquivo
			dataType: 'json',
			data: {
				nome: nome,
				cliente: cliente,
				valor: valor,
				descricao: descricao,
				quantidade: quantidade,
				min: min
			},
			type: 'POST',
			success: function(dados) {
				if (dados.retorno == 'S'){
					$.bootstrapGrowl("pedido adicionado com sucesso!", {
						ele: 'body', // which element to append to
						type: 'success', // (null, 'info', 'danger', 'success')
						offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
						align: 'right', // ('left', 'right', or 'center')
						width: 'auto', // (integer, or 'auto')
						delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
						allow_dismiss: true, // If true then will display a cross to close the popup.
						stackup_spacing: 10 // spacing between consecutively stacked growls.
					});

					$("#pedidos").append(dados.tr);
					// preparaExcluirpedido();
					// preparaDetalharpedido();
					// preparaEditarpedido();

				}else if(dados == 'E'){
					$.bootstrapGrowl("Erro ao inserir pedido!", {
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
			},
			error: function(dados) {
				$.bootstrapGrowl("ERRO no arquivo!", {
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
	});

	$.ajax({
		url: '/System/systemBasic/view/pedidos/pedidos.php', // Url do lado server que vai receber o arquivo
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

			$("#pedidos").append(dados);
			// preparaExcluirpedido();
			// preparaDetalharpedido();
			// preparaEditarpedido();
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

function editarpedido(id_pedido, vai){
	if (vai == 'buscar') {
		var posts = {
			id: id_pedido,
			vai: 'buscar'
		};
	}else{
		var posts = {
			id: id_pedido,
			vai: 'alterar',
			nome: $("#nome-editar").val(),
			valor: $("#valor-editar").val(),
			descricao: $("#descricao-editar").val(),
			cliente: $("#cliente-editar").val(),
			min: $("#min-editar").val(),
			quantidade: $("#quantidade-editar").val()
		}
	}

	$.ajax({
		url: '/System/systemBasic/view/pedidos/editar.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: posts,
		success: function(dados) {
			if (dados.retorno == "S" && dados.vai == 'buscar') {
				$("#id_pedido").val(dados.id_pedido);
				$("#nome-editar").val(dados.nome);
				$("#valor-editar").val(dados.valor);
				$("#descricao-editar").val(dados.descricao);
				$("#cliente-editar").val(dados.cliente);
				$("#min-editar").val(dados.minimo);
				$("#quantidade-editar").val(dados.quantidade);
			}else if (dados.retorno == "S"){
				// $(".editando td").children().eq(1);

				$(".editando").children().eq(0).text(dados.nome);
				$(".editando").children().eq(1).text(dados.cliente);
				$(".editando").children().eq(2).text(dados.valor);
				$(".editando").children().eq(3).text(dados.descricao);

				$.bootstrapGrowl("Sucesso ao alterar o pedido!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});
				// $("tr").removeClass('editando');
			}else{
				$.bootstrapGrowl("Erro ao alterar o pedido!", {
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

function detalharpedido(id_pedido){
	$.ajax({
		url: '/System/systemBasic/view/pedidos/detalhamento.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id_pedido
		},
		success: function(dados) {
			if (dados.retorno == "S") {

				$("#detalhamento .nome").text(dados.nome);
				$("#detalhamento .cliente").text(dados.cliente);
				$("#detalhamento .valor").text(dados.valor);
				$("#detalhamento .descricao").text(dados.descricao);
				// $("#detalhamento .minimo").text(dados.minimo);
				$("#detalhamento .quantidade").text(dados.quantidade);

			}else{
				$.bootstrapGrowl("Erro ao detalhar o pedido!", {
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

function excluirpedido(id_pedido){
	// console.log(id_pedido);
	swal({
		title: "Você tem certeza?",
		text: "Uma vez deletado, você não poderá recuperar!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				url: '/System/systemBasic/view/pedidos/excluir.php', // Url do lado server que vai receber o arquivo
				dataType: 'json',
				type: 'post',
				data: {
					id: id_pedido
				},
				success: function(dados) {
					if (dados == "S") {
						swal("Poof! Seu pedido foi excluído!", {
							icon: "success",
						});

						$("tr.remover").remove();
						// popularpedidos();

					}else{
						$.bootstrapGrowl("Erro ao excluir o pedido!", {
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
		} else {
			swal("Seu pedido não foi deletado!");
		}
	});
}

function selectCliente(){
	$.ajax({
		url: '/System/systemBasic/view/pedidos/clientes.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			$("#cliente select option").remove();
			$("#cliente select").append(dados);
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

$(document).ready(function() {
	selectCliente();
	popularpedidos();

	$("#pedidos").click(function(event){
		var alvoEvento = $(event.target);
		if (alvoEvento.hasClass("editar")){
			$("tr").removeClass('editando');
			var id = alvoEvento.closest("td").nextAll("#id").text();
			alvoEvento.closest("tr").addClass('editando');
			editarpedido(id, 'buscar');
		}else if(alvoEvento.hasClass("excluir")){
			var id = alvoEvento.closest("td").nextAll("#id").text();
			alvoEvento.closest("tr").addClass('remover');
			excluirpedido(id);
		}else if(alvoEvento.hasClass("detalhar")){
			var id = alvoEvento.closest("td").nextAll("#id").text();
			detalharpedido(id);
		}
	});

	$("#alterar-pedido").on('click', function(){
		var id = $("#id_pedido").val();
		// alert(id);
		editarpedido(id, 'alterar');
	});
});
