<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Novo Produto</h1>
<div id="novo-elemento"">
<!-- <form method="post" id="novo-elemento"> -->
	<div class="form-group">
		<label>Nome</label>
		<input id="nome" name="nome" type="text" class="form-control">
	</div>
	<div class="form-group" id="categoria">
		<label>Categoria</label>
		<select id="categoria" name="categoria" class="form-control"></select>
	</div>
	<div class="form-group">
		<label>Valor</label>
		<input id="valor" name="valor" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label>Descrição</label>
		<textarea id="descricao" name="descricao" class="form-control" rows="3"></textarea>
	</div>
	<button id="salvar" class="btn btn-primary btn-adicionar">SALVAR</button>
</div>
<script type="text/javascript">

	$('#salvar').click(function(){
		var nome = $("#nome").val();
		// Para pegar um valor de Select em jquery tem que selecionar o option que foi escolhido
		var categoria = $("#categoria option:selected").val();
		var valor = $("#valor").val();
		var descricao = $("#descricao").val();

		// console.log(nome + '<br>' + categoria + '<br>' + valor + '<br>' + descricao);

		// var formDados  = $(this).serialize();
		$.ajax({
			url: '/System/systemBasic/view/Produtos/adiciona_produto.php', // Url do lado server que vai receber o arquivo
			dataType: 'json',
			data: {
				nome: nome,
				categoria: categoria,
				valor: valor,
				descricao: descricao
			},
			type: 'POST',
			success: function(dados) {
				if (dados == 'S'){
					window.location.replace("http://localhost/System/systemBasic/Produtos");
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
	});

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