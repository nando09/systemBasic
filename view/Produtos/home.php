<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Produtos</h1>
<a href="/System/systemBasic/Produtos/novo" class="btn btn-primary btn-adicionar">NOVO</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">NOME</th>
			<th scope="col">CATEGORIA</th>
			<th scope="col">VALOR</th>
			<th scope="col">DESCRIÇÃO</th>
			<th class="text-center" scope="col">DETALHAMENTO</th>
			<th class="text-center" scope="col">EDITAR</th>
			<th class="text-center" scope="col">EXCLUIR</th>
		</tr>
	</thead>
	<tbody id="produtos">
	</tbody>
</table>
<script type="text/javascript">
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

			// for (var i = 0; i < dados.length; i++) {
			// 	$("#produtos").append(
			// 		'<tr>'+
			// 			'<td>' + dados[i]['nome'] + '</td><td>'+ dados[i]['categoria'] +'</td>'+
			// 			'<td>'+ dados[i]['valor'] +'</td>'+
			// 			'<td>'+ dados[i]['descricao'] +'</td>'+
			// 			'<td class="text-center"><a href="/System/systemBasic/Produtos/detalhamento/'+ dados[i]['id'] +'">'+
			// 				'<i class="fas fa-info-circle"></i></a>'+
			// 			'</td>'+
			// 			'<td class="text-center"><a href="/System/systemBasic/Produtos/editar/'+ dados[i]['id'] +'">'+
			// 				'<i class="far fa-edit"></i></a>'+
			// 			'</td>'+
			// 			'<td class="text-center"><a href="/System/systemBasic/Produtos/excluir/'+ dados[i]['id'] +'">'+
			// 				'<i class="far fa-trash-alt"></i></a>'+
			// 			'</td>'+
			// 		'</tr>'
			// 	);
			// }
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
</script>
<?php include 'view/patterns/footer.php' ?>