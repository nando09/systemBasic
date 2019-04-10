function popularClientes(){
	$('#salvar-cliente').click(function(){
		if (validarForm('novo')) {
			var nome = $("#nome").val();
			var empresa = $("#empresa").val();
			var cnpj = $("#cnpj").val();
			var email = $("#email").val();
			var telefone = $("#telefone").val();

			var cep 	=	$("#cep").val();
			var estado 	=	$("#estado").val();
			var cidade 	=	$("#cidade").val();
			var bairro 	=	$("#bairro").val();
			var rua 	=	$("#rua").val();
			var numero 	=	$("#numero").val();

			$.ajax({
				url: '/System/systemBasic/view/clientes/adiciona.php', // Url do lado server que vai receber o arquivo
				dataType: 'json',
				data: {
					nome:		nome,
					empresa:	empresa,
					cnpj:		cnpj,
					cep:		cep,
					estado:		estado,
					cidade:		cidade,
					bairro:		bairro,
					rua:		rua,
					numero:		numero,
					email:		email,
					telefone:	telefone
				},
				type: 'POST',
				success: function(dados) {
					if (dados.retorno == 'S'){
						$.bootstrapGrowl("cliente adicionado com sucesso!", {
							ele: 'body', // which element to append to
							type: 'success', // (null, 'info', 'danger', 'success')
							offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
							align: 'right', // ('left', 'right', or 'center')
							width: 'auto', // (integer, or 'auto')
							delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
							allow_dismiss: true, // If true then will display a cross to close the popup.
							stackup_spacing: 10 // spacing between consecutively stacked growls.
						});

						$("#clientes").append(dados.tr);

						limparCampo();
						$('.modal').modal('hide');

					}else if(dados.retorno == 'E'){
						$.bootstrapGrowl("Erro ao inserir cliente!", {
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
		url: '/System/systemBasic/view/Clientes/clientes.php', // Url do lado server que vai receber o arquivo
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

			$("#clientes").append(dados);
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

function editarClientes(id_clientes, vai){
	if (vai == 'buscar') {
		var posts = {
			id: id_clientes,
			vai: 'buscar'
		};
	}else{
		var posts = {
			id:			id_clientes,
			vai:		'alterar',
			nome:		$("#nome-editar").val(),
			empresa:	$("#empresa-editar").val(),
			cnpj: 		$("#cnpj-editar").val(),
			cep:		$("#cep-editar").val(),
			estado:		$("#estado-editar").val(),
			cidade:		$("#cidade-editar").val(),
			bairro:		$("#bairro-editar").val(),
			rua:		$("#rua-editar").val(),
			numero:		$("#numero-editar").val(),
			email:		$("#email-editar").val(),
			telefone:	$("#telefone-editar").val()
		}
	}

	$.ajax({
		url: '/System/systemBasic/view/clientes/editar.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: posts,
		success: function(dados) {
			if (dados.retorno == "S" && dados.vai == 'buscar') {
				$("#id_cliente").val(dados.id_cliente);
				$("#nome-editar").val(dados.nome);
				$("#empresa-editar").val(dados.empresa);
				$("#cnpj-editar").val(dados.cnpj);
				$("#cep-editar").val(dados.cep),
				$("#estado-editar").val(dados.Estado),
				$("#cidade-editar").val(dados.Cidade),
				$("#bairro-editar").val(dados.Bairro),
				$("#rua-editar").val(dados.Rua),
				$("#numero-editar").val(dados.Numero),
				$("#email-editar").val(dados.email);
				$("#telefone-editar").val(dados.telefone);
			}else if (dados.retorno == "S"){
				// $(".editando td").children().eq(1);

				$(".editando").children().eq(0).text(dados.empresa);
				$(".editando").children().eq(1).text(dados.telefone);

				$('.modal').modal('hide');

				$.bootstrapGrowl("Sucesso ao alterar o cliente!", {
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
				$.bootstrapGrowl("Erro ao alterar o cliente!", {
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

function detalharClientes(id_clientes){
	$.ajax({
		url: '/System/systemBasic/view/clientes/detalhamento.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id_clientes
		},
		success: function(dados) {
			if (dados.retorno == "S") {

				$("#detalhamento .nome").text(dados.nome);
				$("#detalhamento .empresa").text(dados.empresa);
				$("#detalhamento .cnpj").text(dados.cnpj);
				$("#detalhamento .localidade").text(dados.localidade);
				$("#detalhamento .localidade").attr('title', dados.localidade)
				$("#detalhamento .email").text(dados.email);
				$("#detalhamento .telefone").text(dados.telefone);
				$("#detalhamento .ultima").text(dados.data_ultima);

				if (dados.quantidade > 0) {
					$("#lucro-compra").text("R$ " + dados.lucro);
					$("#quantidade-compras").text(dados.quantidade);
				}else{
					$("#lucro-compra").text("R$ 0");
					$("#quantidade-compras").text("0");
				}

			}else{
				$.bootstrapGrowl("Erro ao detalhar o cliente!", {
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

	comunicado(id_clientes);
	produtos(id_clientes);
}

function comunicado(id_cliente){
	$.ajax({
		url: '/System/systemBasic/view/Clientes/comunicado_clientes.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id_cliente
		},
		success: function(dados) {
			$("#mensagem tr").remove();
			$("#mensagem").append(dados);
		},
		error: function(dados) {
			$.bootstrapGrowl("ERRO trazer anotações Clientes!", {
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

function produtos(id_cliente){
	$.ajax({
		url: '/System/systemBasic/view/Clientes/cliente_produtos.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		type: 'post',
		data: {
			id: id_cliente
		},
		success: function(dados) {
			$("#produtos tr").remove();
			$("#produtos").append(dados);
			// preparaExcluirClientes();
			// preparaDetalharClientes();
			// preparaEditarClientes();
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

function excluirClientes(id_clientes){

	// console.log(id_clientes);
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
				url: '/System/systemBasic/view/clientes/excluir.php', // Url do lado server que vai receber o arquivo
				dataType: 'json',
				type: 'post',
				data: {
					id: id_clientes
				},
				success: function(dados) {
					if (dados == "S") {
						$.bootstrapGrowl("Sucesso ao excluir cliente!", {
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
						$.bootstrapGrowl("Erro ao excluir o cliente!", {
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
			swal("Seu cliente não foi deletado!");
		}
	});
}

function maisCompra(){
	$.ajax({
		url: '/System/systemBasic/view/Clientes/maisCompra.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			var labels = dados.labels;
			var datas = dados.datas;

			var ctx = document.getElementById("maisCompra").getContext('2d');
			var maisCompra = new Chart(ctx, {
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

function novosClientes(){
	$.ajax({
		url: '/System/systemBasic/view/Clientes/novosClientes.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			var labels = dados.labels;
			var datas = dados.datas;

			var ctx = document.getElementById("novosClientes").getContext('2d');
			var novosClientes = new Chart(ctx, {
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

function menosCompra(){
	$.ajax({
		url: '/System/systemBasic/view/Clientes/menosCompra.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			var labels = dados.labels;
			var datas = dados.datas;

			var ctx = document.getElementById("menosCompra").getContext('2d');
			var menosCompra = new Chart(ctx, {
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

function validarForm(tipo){
	if (tipo == 'novo') {
		var nome		= 		$("#nome").val();
		var telefone	= 		$("#telefone").val();
		var cnpj		= 		$("#cnpj").val().replace(/[._/-]/g, '');
		var control		=		true;

		if(nome == ''){
			messageVazio('nome');
			$("#nome").focus();
		}else if(telefone == ''){
			messageVazio('telefone');
			$("#telefone").focus();
		}else if (cnpj != '') {
			if (cnpj.length != 14)
				control = false;

			// Elimina CNPJs invalidos conhecidos
			if (cnpj == "00000000000000" || 
				cnpj == "11111111111111" || 
				cnpj == "22222222222222" || 
				cnpj == "33333333333333" || 
				cnpj == "44444444444444" || 
				cnpj == "55555555555555" || 
				cnpj == "66666666666666" || 
				cnpj == "77777777777777" || 
				cnpj == "88888888888888" || 
				cnpj == "99999999999999")
				control = false;

			// Valida DVs
			tamanho = cnpj.length - 2
			numeros = cnpj.substring(0,tamanho);
			digitos = cnpj.substring(tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			  soma += numeros.charAt(tamanho - i) * pos--;
			  if (pos < 2)
					pos = 9;
			}

			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(0))
				control = false;

			tamanho = tamanho + 1;
			numeros = cnpj.substring(0,tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			  soma += numeros.charAt(tamanho - i) * pos--;
			  if (pos < 2)
					pos = 9;
			}

			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(1))
				  control = false;

			if(!control){
				messageMalPreenchido('CNPJ');
			}else{
				return true;
			}
		}else{
			return true;
		}
	}else{
		var nome		= 		$("#nome-editar").val();
		var telefone	= 		$("#telefone-editar").val();
		var cnpj		= 		$("#cnpj-editar").val().replace(/[._/-]/g, '');
		var control		=		true;

		if(nome == ''){
			messageVazio('nome');
			$("#nome-editar").focus();
		}else if(telefone == ''){
			messageVazio('telefone');
			$("#telefone-editar").focus();
		}else if (cnpj != '') {
			if (cnpj.length != 14)
				control = false;

			// Elimina CNPJs invalidos conhecidos
			if (cnpj == "00000000000000" || 
				cnpj == "11111111111111" || 
				cnpj == "22222222222222" || 
				cnpj == "33333333333333" || 
				cnpj == "44444444444444" || 
				cnpj == "55555555555555" || 
				cnpj == "66666666666666" || 
				cnpj == "77777777777777" || 
				cnpj == "88888888888888" || 
				cnpj == "99999999999999")
				control = false;

			// Valida DVs
			tamanho = cnpj.length - 2
			numeros = cnpj.substring(0,tamanho);
			digitos = cnpj.substring(tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			  soma += numeros.charAt(tamanho - i) * pos--;
			  if (pos < 2)
					pos = 9;
			}

			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(0))
				control = false;

			tamanho = tamanho + 1;
			numeros = cnpj.substring(0,tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			  soma += numeros.charAt(tamanho - i) * pos--;
			  if (pos < 2)
					pos = 9;
			}

			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(1))
				  control = false;

			if(!control){
				messageMalPreenchido('CNPJ');
			}else{
				return true;
			}
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

function messageMalPreenchido(texto){
	$.bootstrapGrowl("Campo "+ texto +" não esta preenchido corretamente!", {
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

function limparCampo(){
	$("#nome").val('');
	$("#empresa").val('');
	$("#cnpj").val('');

	$("#cep").val('');
	$("#estado").val('');
	$("#cidade").val('');
	$("#bairro").val('');
	$("#rua").val('');
	$("#numero").val('');

	$("#email").val('');
	$("#telefone").val('');
}

function masks(){
	$("#cnpj").mask('99.999.999/9999-99');
	$("#cnpj-editar").mask('99.999.999/9999-99');
	$("#telefone").mask('(99) 99999-9999');
	$("#telefone-editar").mask('(99) 99999-9999');

	$("#cep").mask('99999-999');
	$("#cep-editar").mask('99999-999');
}

function buscaCep(){
	function limpa_formulário_cep() {
		// Limpa valores do formulário de cep.
		$("#estado").val("");
		$("#cidade").val("");
		$("#bairro").val("");
		$("#rua").val("");

		// Limpa valores do formulário de cep.
		$("#estado-editar").val("");
		$("#cidade-editar").val("");
		$("#bairro-editar").val("");
		$("#rua-editar").val("");
	}
	
	//Quando o campo cep perde o foco.
	$("#cep").blur(function() {

		//Nova variável "cep" somente com dígitos.
		var cep = $(this).val().replace(/\D/g, '');

		//Verifica se campo cep possui valor informado.
		if (cep != "") {

			//Expressão regular para validar o CEP.
			var validacep = /^[0-9]{8}$/;

			//Valida o formato do CEP.
			if(validacep.test(cep)) {

				//Preenche os campos com "..." enquanto consulta webservice.
				$("#estado").val("...");
				$("#cidade").val("...");
				$("#bairro").val("...");
				$("#rua").val("...");

				//Consulta o webservice viacep.com.br/
				$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

					if (!("erro" in dados)) {
						//Atualiza os campos com os valores da consulta.
						$("#rua").val(dados.logradouro);
						$("#bairro").val(dados.bairro);
						$("#cidade").val(dados.localidade);
						$("#estado").val(dados.uf);
					} //end if.
					else {
						//CEP pesquisado não foi encontrado.
						limpa_formulário_cep();
						alert("CEP não encontrado.");
					}
				});
			} //end if.
			else {
				//cep é inválido.
				limpa_formulário_cep();
				alert("Formato de CEP inválido.");
			}
		} //end if.
		else {
			//cep sem valor, limpa formulário.
			limpa_formulário_cep();
		}
	});

	//Quando o campo cep perde o foco.
	$("#cep-editar").blur(function() {

		//Nova variável "cep" somente com dígitos.
		var cep = $(this).val().replace(/\D/g, '');

		//Verifica se campo cep possui valor informado.
		if (cep != "") {

			//Expressão regular para validar o CEP.
			var validacep = /^[0-9]{8}$/;

			//Valida o formato do CEP.
			if(validacep.test(cep)) {

				//Preenche os campos com "..." enquanto consulta webservice.
				$("#estado-editar").val("...");
				$("#cidade-editar").val("...");
				$("#bairro-editar").val("...");
				$("#rua-editar").val("...");

				//Consulta o webservice viacep.com.br/
				$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

					if (!("erro" in dados)) {
						//Atualiza os campos com os valores da consulta.
						$("#rua-editar").val(dados.logradouro);
						$("#bairro-editar").val(dados.bairro);
						$("#cidade-editar").val(dados.localidade);
						$("#estado-editar").val(dados.uf);
					} //end if.
					else {
						//CEP pesquisado não foi encontrado.
						limpa_formulário_cep();
						alert("CEP não encontrado.");
					}
				});
			} //end if.
			else {
				//cep é inválido.
				limpa_formulário_cep();
				alert("Formato de CEP inválido.");
			}
		} //end if.
		else {
			//cep sem valor, limpa formulário.
			limpa_formulário_cep();
		}
	});
}

$(document).ready(function() {
	popularClientes();
	maisCompra();
	novosClientes();
	menosCompra();
	masks();
	buscaCep();

	$("#clientes").click(function(event){
		var alvoEvento = $(event.target);
		if (alvoEvento.hasClass("editar")){
			$("tr").removeClass('editando');
			var id = alvoEvento.closest("td").nextAll("#id").text();
			alvoEvento.closest("tr").addClass('editando');
			editarClientes(id, 'buscar');
		}else if(alvoEvento.hasClass("excluir")){
			var id = alvoEvento.closest("td").nextAll("#id").text();
			alvoEvento.closest("tr").addClass('remover');
			excluirClientes(id);
		}else if(alvoEvento.hasClass("detalhar")){
			var id = alvoEvento.closest("td").nextAll("#id").text();
			detalharClientes(id);
		}
	});

	$("#alterar-cliente").on('click', function(){
		var id = $("#id_cliente").val();
		if (validarForm('editar')) {
			editarClientes(id, 'alterar');
		}
	});
});

