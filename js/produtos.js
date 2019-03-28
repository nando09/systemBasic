function popularProdutos(){
	$('#salvar-produto').click(function(){
		if(validaForm('novo')){
			var nome = $("#nome").val();
			var categoria = $("#categoria-novo").val();
			var valor = preparaValor($("#valor").val());
			var descricao = $("#descricao").val();
			var quantidade = $("#quantidade").val();
			var min = $("#min").val();
			var nro = $("#nro").val();

			$.ajax({
				url: '/System/systemBasic/view/Produtos/adiciona.php', // Url do lado server que vai receber o arquivo
				dataType: 'json',
				data: {
					nome: nome,
					categoria: categoria,
					valor: valor,
					descricao: descricao,
					quantidade: quantidade,
					min: min,
					nro: nro
				},
				type: 'POST',
				success: function(dados) {
					if (dados.retorno == 'S'){
						$.bootstrapGrowl("Produto adicionado com sucesso!", {
							ele: 'body', // which element to append to
							type: 'success', // (null, 'info', 'danger', 'success')
							offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
							align: 'right', // ('left', 'right', or 'center')
							width: 'auto', // (integer, or 'auto')
							delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
							allow_dismiss: true, // If true then will display a cross to close the popup.
							stackup_spacing: 10 // spacing between consecutively stacked growls.
						});

						$("#produtos").append(dados.tr);

						limparCampo();
						$('.modal').modal('hide');

					}else if(dados == 'E'){
						$.bootstrapGrowl("Erro ao inserir Produto!", {
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
		}
	});

	$.ajax({
		url: '/System/systemBasic/view/Produtos/produtos.php', // Url do lado server que vai receber o arquivo
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
			// preparaExcluirProduto();
			// preparaDetalharProduto();
			// preparaEditarProduto();
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
		var valor = preparaValor($("#valor-editar").val());
		var posts = {
			id: id_produto,
			vai: 'alterar',
			nome: $("#nome-editar").val(),
			valor: valor,
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

				$('.modal').modal('hide');

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
				$("#detalhamento .minimo").text(dados.minimo);
				$("#detalhamento .quantidade").text(dados.quantidade);

				if (dados.vendido > 0) {
					$("#detalhamento #lucro-produto").text(dados.lucro);
					$("#detalhamento #quantidade-produto").text(dados.vendido);
				}else{
					$("#detalhamento #lucro-produto").text("0");
					$("#detalhamento #quantidade-produto").text("0");
				}


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

	cliente(id_produto);
	fornecedor(id_produto);
}

function cliente(id_produto){
	// console.log('Cliente com produto: ' + id_produto);
	$.ajax({
		url: '/System/systemBasic/view/Produtos/clientes_produto.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id_produto
		},
		success: function(dados) {
			$("#clientes tr").remove();
			$("#clientes").append(dados);
			// preparaExcluirClientes();
			// preparaDetalharClientes();
			// preparaEditarClientes();
		},
		error: function(dados) {
			$.bootstrapGrowl("ERRO ao execultar Clientes!", {
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

function fornecedor(id_produto){
	// console.log('Cliente com produto: ' + id_produto);
	$.ajax({
		url: '/System/systemBasic/view/Produtos/fornecedores_produto.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id_produto
		},
		success: function(dados) {
			$("#fornecedores tr").remove();
			$("#fornecedores").append(dados);
			// preparaExcluirClientes();
			// preparaDetalharClientes();
			// preparaEditarClientes();
		},
		error: function(dados) {
			$.bootstrapGrowl("ERRO ao execultar Fornecedores!", {
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

function maisVendido(){
	$.ajax({
		url: '/System/systemBasic/view/Produtos/maisVendido.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			var labels = dados.labels;
			// var labels = ["Red","Blue","Yellow","Green","Purple","Orange"];
			var datas = dados.datas;
			// var datas = [12,19,3,5,2,3];

			// console.log(labels);
			// console.log(datas);

			var ctx = document.getElementById("maisVendido").getContext('2d');
			var maisVendido = new Chart(ctx, {
				type: 'pie',
				data: {
					// labels: ["Red","Blue","Yellow","Green","Purple","Orange"],
					// datasets: [{
					// label: '# of Votes',
					// data: [12,19,3,5,2,3],
					labels: labels,
					datasets: [{
					label: '# of Votes',
					data: datas,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
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

function lucroMes(){
	$.ajax({
		url: '/System/systemBasic/view/Produtos/lucroMes.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			var labels = dados.labels;
			// var labels = ["Red","Blue","Yellow","Green","Purple","Orange"];
			var datas = dados.datas;
			// var datas = [12,19,3,5,2,3];

			// console.log(labels);
			// console.log(datas);

			var mes = document.getElementById("lucroMes").getContext('2d');
			var lucroMes = new Chart(mes, {
				type: 'line',
				data: {
					labels: labels,
					datasets: [{
						label: '# of Votes',
						data: datas,
						backgroundColor: [
							// 'rgba(255, 99, 132, 0.2)',
							// 'rgba(54, 162, 235, 0.2)',
							// 'rgba(255, 206, 86, 0.2)',
							// 'rgba(75, 192, 192, 0.2)',
							// 'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							// 'rgba(255,99,132,1)',
							// 'rgba(54, 162, 235, 1)',
							// 'rgba(255, 206, 86, 1)',
							// 'rgba(75, 192, 192, 1)',
							// 'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
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

function menosVendido(){
	$.ajax({
		url: '/System/systemBasic/view/Produtos/menosVendido.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			var labels = dados.labels;
			var datas = dados.datas;

			var lucro = document.getElementById("menosVendido").getContext('2d');
			var menosVendido = new Chart(lucro, {
				type: 'bar',
				data: {
					labels: labels,
					datasets: [{
						label: '# of Votes',
						data: datas,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
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
	$("#id_produto").val('');
	$("#nome").val('');
	$("#valor").val('');
	$("#descricao").val('');
	$("#categoria-novo").val('');
	$("#min").val('');
	$("#quantidade").val('');
	$("#nro").val('');
}

function validaForm(tipo){
	if (tipo == 'novo') {
		var nome		= 		$("#nome").val();
		var valor		= 		$("#valor").val();
		var descricao	= 		$("#descricao").val();
		var categoria	= 		$("#categoria-novo").val();
		var quantidade	= 		$("#quantidade").val();

		if(nome == ''){
			messageVazio('nome');
			$("#nome").focus();
		}else if(categoria == ''){
			messageVazio('categoria');
			$("#categoria").focus();
		}else if(valor == ''){
			messageVazio('valor');
			$("#valor").focus();
		}else if(quantidade == ''){
			messageVazio('quantidade');
			$("#quantidade").focus();
		}else if(descricao == ''){
			messageVazio('descrição');
			$("#descricao").focus();
		}else{
			return true;
		}
	}else{
		var nome		= 		$("#nome-editar").val();
		var categoria	= 		$("#categoria-editar").val();
		var valor		= 		$("#valor-editar").val();
		var quantidade	= 		$("#quantidade-editar").val();
		var descricao	= 		$("#descricao-editar").val();

		if(nome == ''){
			messageVazio('nome');
			$("#nome-editar").focus();
		}else if(categoria == ''){
			messageVazio('categoria');
			$("#categoria-editar").focus();
		}else if(valor == ''){
			messageVazio('valor');
			$("#valor-editar").focus();
		}else if(quantidade == ''){
			messageVazio('quantidade');
			$("#quantidade-editar").focus();
		}else if(descricao == ''){
			messageVazio('descrição');
			$("#descricao-editar").focus();
		}else{
			return true;
		}
	}
}

function messageVazio(texto){
	$.bootstrapGrowl("Campo "+ texto +" não esta preenchido!", {
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

function preparaValor(valor){
	valor = valor.replace(',','.');
	if (valor.length > 7) {
		valor = valor.replace('.','');
	}

	return valor;
}

function campoMask(){
	$("#valor").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
	$("#valor-editar").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
}

$(document).ready(function() {
	selectCategoria();
	popularProdutos();
	maisVendido();
	lucroMes();
	menosVendido();
	campoMask();


	$("#produtos").click(function(event){
		var alvoEvento = $(event.target);
		if (alvoEvento.hasClass("editar")){
			$("tr").removeClass('editando');
			var id = alvoEvento.closest("td").nextAll("#id").text();
			alvoEvento.closest("tr").addClass('editando');
			editarProduto(id, 'buscar');
		}else if(alvoEvento.hasClass("excluir")){
			var id = alvoEvento.closest("td").nextAll("#id").text();
			alvoEvento.closest("tr").addClass('remover');
			excluirProduto(id);
		}else if(alvoEvento.hasClass("detalhar")){
			var id = alvoEvento.closest("td").nextAll("#id").text();
			detalharProduto(id);
		}
	});

	$("#alterar-produto").on('click', function(){
		var id = $("#id_produto").val();
		// alert(id);
		if (validaForm('editar')) {
			editarProduto(id, 'alterar');
		}
	});
});
