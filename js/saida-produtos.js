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

function editarProduto(id_produto, vai){
	if (vai == 'buscar') {
		var posts = {
			id: id_produto,
			vai: 'buscar'
		};
	}else{
		var posts = {
			id: id_produto,
			vai: 'alterar',
			nome: $("#nome-editar").val(),
			valor: $("#valor-editar").val(),
			descricao: $("#descricao-editar").val(),
			categoria: $("#categoria-editar").val(),
			min: $("#min-editar").val(),
			quantidade: $("#quantidade-editar").val(),
			nro: $("#nro-editar").val()
		}
	}

	$.ajax({
		url: '/System/systemBasic/view/Produtos/editar.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: posts,
		success: function(dados) {
			if (dados.retorno == "S" && dados.vai == 'buscar') {
				$("#id_produto").val(dados.id_produto);
				$("#nome-editar").val(dados.nome);
				$("#valor-editar").val(dados.valor);
				$("#descricao-editar").val(dados.descricao);
				$("#categoria-editar").val(dados.categoria);
				$("#min-editar").val(dados.minimo);
				$("#quantidade-editar").val(dados.quantidade);
				$("#nro-editar").val(dados.nro);

			}else if (dados.retorno == "S"){
				// $(".editando td").children().eq(1);

				$(".editando").children().eq(0).text(dados.nome);
				$(".editando").children().eq(1).text(dados.categoria);
				$(".editando").children().eq(2).text(dados.valor);
				$(".editando").children().eq(3).text(dados.descricao);

				$.bootstrapGrowl("Sucesso ao alterar o produto!", {
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
				$.bootstrapGrowl("Erro ao alterar o produto!", {
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

function detalharProduto(id_produto){
	$.ajax({
		url: '/System/systemBasic/view/Produtos/detalhamento.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id_produto
		},
		success: function(dados) {
			if (dados.retorno == "S") {

				$("#detalhamento .nome").text(dados.nome);
				$("#detalhamento .categoria").text(dados.categoria);
				$("#detalhamento .valor").text(dados.valor);
				$("#detalhamento .descricao").text(dados.descricao);
				$("#detalhamento .nro").text(dados.nro);
				// $("#detalhamento .minimo").text(dados.minimo);
				$("#detalhamento .quantidade").text(dados.quantidade);

			}else{
				$.bootstrapGrowl("Erro ao detalhar o produto!", {
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

function excluirProduto(id_produto){
	// console.log(id_produto);
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
				url: '/System/systemBasic/view/Produtos/excluir.php', // Url do lado server que vai receber o arquivo
				dataType: 'json',
				type: 'post',
				data: {
					id: id_produto
				},
				success: function(dados) {
					if (dados == "S") {
						swal("Poof! Seu produto foi excluído!", {
							icon: "success",
						});

						$("tr.remover").remove();
						// popularProdutos();

					}else{
						$.bootstrapGrowl("Erro ao excluir o produto!", {
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
			swal("Seu produto não foi deletado!");
		}
	});
}

function selectCategoria(){
	$.ajax({
		url: '/System/systemBasic/view/Produtos/categorias.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			$("#categoria select option").remove();
			$("#categoria select").append(dados);
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
				var id = alvoEvento.closest("#produto").find('#id').text();
				var mais = alvoEvento.closest("#produto").find('#icon > #mais');
				var menos = alvoEvento.closest("#produto").find('#icon > #menos');
				var quantidade = alvoEvento.closest("#produto").find('#quantidade');

				if (mais.hasClass('none')) {
					mais.removeClass('none');
					menos.addClass('none');
					quantidade.attr("disabled", false);
				}else{
					menos.removeClass('none');
					mais.addClass('none');
					quantidade.attr("disabled", true);
				}

				// console.log(id);
				// console.log(quantidade.val());
			}else{
				// console.log(tipo);
			}
		}
	});
});
