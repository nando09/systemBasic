function popularPerfil(){
	var id = $("#id_usr").text();

	$.ajax({
		url: '/System/systemBasic/view/Perfil/usuario.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		data: {
			id: id
		},
		type: 'POST',
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

			$("#Nome").val(dados.NOME);
			$("#Email").val(dados.EMAIL);
			$("#Login").val(dados.USUARIO);
			$("#Senha").val("**************");
			$("#estado").val('SP');
			$("#Cidade").val('Teste');
			$("#Bairro").val('teste one');
			$("#Rua").val('two teste');
			$("#Numero").val('17');
			$("#Fantasia").val(dados.FANTASIA);
			$("#Usuario").val(dados.TIPO);
			$("#Valor").val(dados.VALOR);
			$("#Plano").val(dados.PLANO);
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
	popularPerfil();
});
