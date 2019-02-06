function popularClientes(){
	$('#salvar-cliente').click(function(){
		var nome = $("#nome").val();
		var empresa = $("#empresa").val();
		var cnpj = $("#cnpj").val();
		var localidade = $("#localidade").val();
		var email = $("#email").val();
		var telefone = $("#telefone").val();


		console.log(nome+ "//" +empresa+ "//" +cnpj+ "//" +localidade+ "//" +email+ "//" +telefone);

		// var formDados  = $(this).serialize();
		$.ajax({
			url: '/System/systemBasic/view/clientes/adiciona.php', // Url do lado server que vai receber o arquivo
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
					// preparaExcluirClientes();
					// preparaDetalharClientes();
					// preparaEditarClientes();

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
			id: id_clientes,
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
				$("#localidade-editar").val(dados.localidade);
				$("#email-editar").val(dados.email);
				$("#telefone-editar").val(dados.telefone);
			}else if (dados.retorno == "S"){
				// $(".editando td").children().eq(1);

				$(".editando").children().eq(0).text(dados.empresa);
				$(".editando").children().eq(1).text(dados.email);
				$(".editando").children().eq(2).text(dados.telefone);

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
				$("#detalhamento .email").text(dados.email);
				$("#detalhamento .telefone").text(dados.telefone);

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
}

function excluirClientes(id_clientes){

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

$(document).ready(function() {
	popularClientes();

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
		// alert(id);
		editarClientes(id, 'alterar');
	});
});
