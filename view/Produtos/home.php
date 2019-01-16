<?php include 'view/patterns/header.php' ?>
					<!--/.span3-->
<div class="span7">
	
</div>
<div class="span2">
	<table class="table table-hover">
		<thead>
			<tr>
				<td>
					<strong>PRODUTOS</strong>
				</td>
<!-- 				<td>
					<strong>CATEGORIA</strong>
				</td>
				<td>
					<strong>VALOR</strong>
				</td>
				<td>
					<strong>DESCRIÇÃO</strong>
				</td> -->
			</tr>
		</thead>
		<tbody id="produtos">
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$.ajax({
		url: '/System/systemBasic/view/Produtos/produtos.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			for (var i = 0; i < dados.length; i++) {
				// $("#produtos").append('<tr><td>' + dados[i]['nome'] + '</td><td>' + dados[i]['categoria'] + '</td><td>' + dados[i]['valor'] + '</td><td>' + dados[i]['descricao'] + '</td></tr>');
				$("#produtos").append('<tr><td>' + dados[i]['nome'] + '</td><td class="value">'+ dados[i]['id'] +'<td>');
			}
			// console.log(dados);
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