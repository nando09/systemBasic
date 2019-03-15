function popularFornecedores(){
	$('#salvar-fornecedor').click(function(){
		var nome = $("#nome").val();
		var empresa = $("#empresa").val();
		var cnpj = $("#cnpj").val();
		var localidade = $("#localidade").val();
		var email = $("#email").val();
		var telefone = $("#telefone").val();


		console.log(nome+ "//" +empresa+ "//" +cnpj+ "//" +localidade+ "//" +email+ "//" +telefone);

		// var formDados  = $(this).serialize();
		$.ajax({
			url: '/System/systemBasic/view/fornecedores/adiciona.php', // Url do lado server que vai receber o arquivo
			dataType: 'json',
			data: {
				nome: nome,
				empresa: empresa,
				cnpj: cnpj,
				localidade: localidade,
				email: email,
				telefone: telefone
			},
			type: 'POST',
			success: function(dados) {
				if (dados.retorno == 'S'){
					$.bootstrapGrowl("Fornecedor adicionado com sucesso!", {
						ele: 'body', // which element to append to
						type: 'success', // (null, 'info', 'danger', 'success')
						offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
						align: 'right', // ('left', 'right', or 'center')
						width: 'auto', // (integer, or 'auto')
						delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
						allow_dismiss: true, // If true then will display a cross to close the popup.
						stackup_spacing: 10 // spacing between consecutively stacked growls.
					});

					$("#fornecedores").append(dados.tr);
					// preparaExcluirFornecedores();
					// preparaDetalharFornecedores();
					// preparaEditarFornecedores();

				}else if(dados.retorno == 'E'){
					$.bootstrapGrowl("Erro ao inserir fornecedor!", {
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
		url: '/System/systemBasic/view/fornecedores/fornecedores.php', // Url do lado server que vai receber o arquivo
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

			$("#fornecedores").append(dados);
			// preparaExcluirFornecedores();
			// preparaDetalharFornecedores();
			// preparaEditarFornecedores();
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

function editarFornecedores(id_fornecedores, vai){
	if (vai == 'buscar') {
		var posts = {
			id: id_fornecedores,
			vai: 'buscar'
		};
	}else{
		var posts = {
			id: id_fornecedores,
			vai: 'alterar',
			nome: $("#nome-editar").val(),
			empresa: $("#empresa-editar").val(),
			cnpj: $("#cnpj-editar").val(),
			localidade: $("#localidade-editar").val(),
			email: $("#email-editar").val(),
			telefone: $("#telefone-editar").val()
		}
	}

	$.ajax({
		url: '/System/systemBasic/view/fornecedores/editar.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: posts,
		success: function(dados) {
			if (dados.retorno == "S" && dados.vai == 'buscar') {
				$("#id_fornecedor").val(dados.id_fornecedor);
				$("#nome-editar").val(dados.nome);
				$("#empresa-editar").val(dados.empresa);
				$("#cnpj-editar").val(dados.cnpj);
				$("#localidade-editar").val(dados.localidade);
				$("#email-editar").val(dados.email);
				$("#telefone-editar").val(dados.telefone);
			}else if (dados.retorno == "S"){
				// $(".editando td").children().eq(1);

				$(".editando").children().eq(0).text(dados.empresa);
				$(".editando").children().eq(1).text(dados.telefone);

				$.bootstrapGrowl("Sucesso ao alterar o fornecedor!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});
			}else{
				$.bootstrapGrowl("Erro ao alterar o fornecedor!", {
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

function detalharFornecedores(id_fornecedores){
	$.ajax({
		url: '/System/systemBasic/view/fornecedores/detalhamento.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id_fornecedores
		},
		success: function(dados) {
			if (dados.retorno == "S") {

				$("#detalhamento .nome").text(dados.nome);
				$("#detalhamento .empresa").text(dados.empresa);
				$("#detalhamento .cnpj").text(dados.cnpj);
				$("#detalhamento .localidade").text(dados.localidade);
				$("#detalhamento .email").text(dados.email);
				$("#detalhamento .telefone").text(dados.telefone);

				if (dados.valor > 0) {
					$("#detalhamento .quantidade-compra").text(dados.quantidade + " Produtos");
					$("#detalhamento .valor-compra").text("R$ " + dados.valor);
				}else{
					$("#detalhamento .quantidade-compra").text('Nenhum produto');
					$("#detalhamento .valor-compra").text('R$ 0,00');
				}

			}else{
				$.bootstrapGrowl("Erro ao detalhar o fornecedor!", {
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

	comunicado(id_fornecedores);
	produtos(id_fornecedores);
}

function comunicado(id_fornecedore){
	// $.ajax({
	// 	url: '/System/systemBasic/view/Fornecedores/comunicado_Fornecedores.php', // Url do lado server que vai receber o arquivo
	// 	dataType: 'json',
	// 	type: 'post',
	// 	data: {
	// 		id: id_fornecedore
	// 	},
	// 	success: function(dados) {
	// 		if (dados == "") {
	// 			$.bootstrapGrowl("Não trouxe nenhum registro de Fornecedores desse produto!", {
	// 				ele: 'body', // which element to append to
	// 				type: 'info', // (null, 'info', 'danger', 'success')
	// 				offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
	// 				align: 'right', // ('left', 'right', or 'center')
	// 				width: 'auto', // (integer, or 'auto')
	// 				delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
	// 				allow_dismiss: true, // If true then will display a cross to close the popup.
	// 				stackup_spacing: 10 // spacing between consecutively stacked growls.
	// 			});
	// 		}

	//		$("#mensagem tr").remove();
	// 		$("#mensagem").append(dados);
	// 		// preparaExcluirFornecedores();
	// 		// preparaDetalharFornecedores();
	// 		// preparaEditarFornecedores();
	// 	},
	// 	error: function(dados) {
	// 		$.bootstrapGrowl("ERRO ao execultar Fornecedores!", {
	// 			ele: 'body', // which element to append to
	// 			type: 'danger', // (null, 'info', 'danger', 'success')
	// 			offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
	// 			align: 'right', // ('left', 'right', or 'center')
	// 			width: 'auto', // (integer, or 'auto')
	// 			delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
	// 			allow_dismiss: true, // If true then will display a cross to close the popup.
	// 			stackup_spacing: 10 // spacing between consecutively stacked growls.
	// 		});
	// 	}
	// });
}

function produtos(id_fornecedore){
	$.ajax({
		url: '/System/systemBasic/view/Fornecedores/fornecedor_produtos.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id_fornecedore
		},
		success: function(dados) {
			$("#produtos tr").remove();
			$("#produtos").append(dados);
		},
		error: function(dados) {
			$.bootstrapGrowl("ERRO ao trazar produtos!", {
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

function excluirFornecedores(id_fornecedores){
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
				url: '/System/systemBasic/view/fornecedores/excluir.php', // Url do lado server que vai receber o arquivo
				dataType: 'json',
				type: 'post',
				data: {
					id: id_fornecedores
				},
				success: function(dados) {
					if (dados == "S") {
						$.bootstrapGrowl("Sucesso ao excluir fornecedor!", {
							ele: 'body', // which element to append to
							type: 'success', // (null, 'info', 'danger', 'success')
							offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
							align: 'right', // ('left', 'right', or 'center')
							width: 'auto', // (integer, or 'auto')
							delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
							allow_dismiss: true, // If true then will display a cross to close the popup.
							stackup_spacing: 10 // spacing between consecutively stacked growls.
						});

						$("tr.remover").remove();

					}else{
						$.bootstrapGrowl("Erro ao excluir o fornecedor!", {
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
			swal("Seu fornecedor não foi deletado!");
		}
	});
}

function maisCompro(){
	$.ajax({
		url: '/System/systemBasic/view/Fornecedores/maisCompro.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			var labels = dados.labels;
			var datas = dados.datas;

			var ctx = document.getElementById("maisCompro").getContext('2d');
			var maisCompro = new Chart(ctx, {
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

function novosFornecedores(){
	$.ajax({
		url: '/System/systemBasic/view/Fornecedores/novosFornecedores.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			var labels = dados.labels;
			var datas = dados.datas;

			var ctx = document.getElementById("novosFornecedores").getContext('2d');
			var novosFornecedores = new Chart(ctx, {
				type: 'line',
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

function menosCompro(){
	$.ajax({
		url: '/System/systemBasic/view/Fornecedores/menosCompro.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			var labels = dados.labels;
			var datas = dados.datas;

			var ctx = document.getElementById("menosCompro").getContext('2d');
			var menosCompro = new Chart(ctx, {
				type: 'bar',
				data: {
					// labels: ["Red","Blue","Yellow","Green","Purple","Orange"],
					// datasets: [{
					// label: '# of Votes',
					// data: [1000,100,33,5,22,123],
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

$(document).ready(function() {
	popularFornecedores();
	maisCompro();
	novosFornecedores();
	menosCompro();

	$("#fornecedores").click(function(event){
		var alvoEvento = $(event.target);
		if (alvoEvento.hasClass("editar")){
			$("tr").removeClass('editando');
			var id = alvoEvento.closest("td").nextAll("#id").text();
			alvoEvento.closest("tr").addClass('editando');
			editarFornecedores(id, 'buscar');
		}else if(alvoEvento.hasClass("excluir")){
			var id = alvoEvento.closest("td").nextAll("#id").text();
			alvoEvento.closest("tr").addClass('remover');
			excluirFornecedores(id);
		}else if(alvoEvento.hasClass("detalhar")){
			var id = alvoEvento.closest("td").nextAll("#id").text();
			detalharFornecedores(id);
		}
	});

	$("#alterar-fornecedor").on('click', function(){
		var id = $("#id_fornecedor").val();
		// alert(id);
		editarFornecedores(id, 'alterar');
	});
});
