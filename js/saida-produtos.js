function popularProdutos(){

	$.ajax({
	url: '/System/systemBasic/view/FazerPedido/produtos.php', // Url do lado server que vai receber o arquivo
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

			$("#produtos").append(dados);
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

function carrinho(id_produto, id_cf, quantidade, tipo){
	var posts = {
		id_produto: id_produto,
		id_cf: id_cf,
		quantidade: quantidade,
		tipo: tipo
	}

	$.ajax({
		url: '/System/systemBasic/view/FazerPedido/carrinho.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: posts,
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
	popularProdutos();

	$("#produtos").click(function(event){
		var alvoEvento = $(event.target);
		var icon = alvoEvento.closest("#icon");


		if (icon.hasClass("comprar")){
			var tipo = $(".title-pag").text();
			if (!tipo.indexOf('Cliente')){
				var id_produto = alvoEvento.closest("#produto").find('#id').text();
				var mais = alvoEvento.closest("#produto").find('#icon > #mais');
				var menos = alvoEvento.closest("#produto").find('#icon > #menos');
				var quantidade = alvoEvento.closest("#produto").find('#quantidade');
				var id_cf = $("#id_cf").text();
				tipo = 'Cliente';

				if (mais.hasClass('none')) {
					mais.removeClass('none');
					menos.addClass('none');
					quantidade.attr("disabled", false);
				}else{
					// carrinho(id_produto, id_cf, quantidade, tipo);
					menos.removeClass('none');
					mais.addClass('none');
					quantidade.attr("disabled", true);
				}

				// console.log(id);
				// console.log(quantidade.val());
			}else{
				console.log(tipo);
			}
		}
	});
});
