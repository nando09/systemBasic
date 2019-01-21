<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Novo Produto</h1>
<form id="novo-elemento">
	<div class="form-group">
		<label>Nome</label>
		<input type="text" class="form-control">
	</div>
	<div class="form-group" id="categoria">
		<label>Categoria</label>
		<select class="form-control"></select>
	</div>
	<div class="form-group" id="categoria">
		<label>Valor</label>
		<select class="form-control"></select>
	</div>
	<div class="form-group">
		<label>Descrição</label>
		<textarea class="form-control" rows="3"></textarea>
	</div>
	<button class="btn btn-primary">SALVAR</button>
</form>
<script type="text/javascript">

	$.ajax({
		url: '/System/systemBasic/view/Produtos/categorias.php', // Url do lado server que vai receber o arquivo
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(dados) {
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
</script>
<?php include 'view/patterns/footer.php' ?>