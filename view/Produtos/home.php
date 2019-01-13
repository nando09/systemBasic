<?php include 'view/patterns/header.php' ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Produtos</td>
			</tr>
		</thead>
		<tbody id="produtos">
			<tr>
				<td>@mdo</td>
			</tr>
			<tr>
				<td>@fat</td>
			</tr>
			<tr>
				<td>@mdo</td>
			</tr>
		</tbody>
	</table>
<script type="text/javascript">
	$.ajax({
		url: '/System/systemBasic/view/Produtos/produtos.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
			for (var i = 0; i < dados.length; i++) {
				$("#produtos").append('<tr><td>' + dados[i] + '</td></tr>');
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