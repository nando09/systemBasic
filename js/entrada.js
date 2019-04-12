function popularpedidos(){
	var id = $("#id_cf").text();
	var id_finalizado = $("#id_finalizado").text();
	// console.log(id);

	$.ajax({
		url: '/System/systemBasic/view/FazerPedido/pedido-entrada.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id,
			id_finalizado: id_finalizado
		},
		success: function(dados) {
			$("#produtos").append(dados);
			nroProdutosCarrinho(id, 'Fornecedor', id_finalizado)
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

function nroProdutosCarrinho(id_cf, tipo, finalizado){
	$.ajax({
		url: '/System/systemBasic/view/FazerPedido/nroPrudutosCarrinho.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		data: { id_cf: id_cf, tipo: tipo, finalizado: finalizado },
		type: 'post',
		success: function(dados) {
			if (dados.retorno == "S") {
				$(".pedidos_feitos").text(dados.nro);
				if (dados.valor > 0) {
					$("#valores").text(dados.valor);
				}else{
					$("#valores").text(' 0,00');
				}
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


function tirarCarrinho(id_produto, id_cf, tipo){
	var posts = {
		id_produto: id_produto,
		id_cf: id_cf,
		tipo: tipo
	}

	$.ajax({
		url: '/System/systemBasic/view/FazerPedido/tirarCarrinho.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		data: posts,
		type: 'post',
		success: function(dados) {
			if (dados == "S") {
				$.bootstrapGrowl("Produto removido no carrinho!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});

				var tipo = $(".title-pag").text();

				nroProdutosCarrinho($("#id_cf").text(), 'Fornecedor');
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

// function carrinho(){
function carrinho(id_produto, id_cf, quantidade, tipo){
	var posts = {
		id_produto: id_produto,
		id_cf: id_cf,
		quantidade: quantidade,
		tipo: tipo
	}

	// console.log(posts);

	$.ajax({
		url: '/System/systemBasic/view/FazerPedido/carrinho.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		data: posts,
		type: 'post',
		success: function(dados) {
			if (dados == "S") {
				$.bootstrapGrowl("Produto adicionado no carrinho!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});

				var tipo = $(".title-pag").text();
				nroProdutosCarrinho($("#id_cf").text(), 'Fornecedor');
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

function finalizar(id_cf, cf, vencimento, status){
	// console.log('ID: ' + id_cf + '<br>TIPO: ' + cf + '<br>VENCIMENTO: ' + vencimento + '<br>STATUS: ' + status);
	$.ajax({
		url: '/System/systemBasic/view/FazerPedido/finalizar.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		data: {
				id_cf: id_cf,
				tipo: cf,
				vencimento: vencimento,
				status: status
		},
		type: 'post',
		success: function(dados) {
			if (dados == "S") {
				$.bootstrapGrowl("Pedido Finalizado!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});

				window.location.replace(history.go(-1));
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

$(document).ready(function() {
	popularpedidos();

	$("#produtos").click(function(event){
		var alvoEvento = $(event.target);
		var icon = alvoEvento.closest("#icon");

		if (icon.hasClass("comprar")){
			var tipo = $(".title-pag").text();
			// if (!tipo.indexOf('Fornecedor')){
				var id_produto = alvoEvento.closest("#produto").find('#id').text();
				var mais = alvoEvento.closest("#produto").find('#icon > #mais');
				var menos = alvoEvento.closest("#produto").find('#icon > #menos');
				var quantidade = alvoEvento.closest("#produto").find('#quantidade');
				var id_cf = $("#id_cf").text();
				var cf = 'Fornecedor';

				if (mais.hasClass('none')) {
					mais.removeClass('none');
					menos.addClass('none');
					quantidade.attr("disabled", false);
					tirarCarrinho(id_produto, id_cf, cf);
				}else{
					carrinho(id_produto, id_cf, quantidade.val(), cf);
					menos.removeClass('none');
					mais.addClass('none');
					quantidade.attr("disabled", true);
				}

				// console.log(id);
				// console.log(quantidade.val());
			// }else{
			// 	var id_produto = alvoEvento.closest("#produto").find('#id').text();
			// 	var mais = alvoEvento.closest("#produto").find('#icon > #mais');
			// 	var menos = alvoEvento.closest("#produto").find('#icon > #menos');
			// 	var quantidade = alvoEvento.closest("#produto").find('#quantidade');
			// 	var id_cf = $("#id_cf").text();
			// 	var cf = 'Fornecedor';

			// 	if (mais.hasClass('none')) {
			// 		mais.removeClass('none');
			// 		menos.addClass('none');
			// 		quantidade.attr("disabled", false);
			// 		tirarCarrinho(id_produto, id_cf, quantidade.val(), cf);
			// 	}else{
			// 		carrinho(id_produto, id_cf, quantidade.val(), cf);
			// 		menos.removeClass('none');
			// 		mais.addClass('none');
			// 		quantidade.attr("disabled", true);
			// 	}

			// 	// console.log(id);
			// 	// console.log(quantidade.val());
			// }
		}
	});

	$("#finalizar").click(function(){
		var tipo = $(".title-pag").text();
		var vencimento = $("#data-finalizar").val();
		var status = $("#status").val();
		var id_cf = $("#id_cf").text();
		// if (!tipo.indexOf('Fornecedor')){
		// 	var cf = 'Fornecedor';
		// }else{
		// 	var id_cf = $("#id_cf").text();
		// 	var cf = 'Fornecedor';
		// }

		finalizar(id_cf, 'Fornecedor', vencimento, status);
	});
});
