$(document).ready(function() {
	selectCategoria();
	popularProdutos();

	$(".btn-adicionar").click(function(){
	});

	$("#produtos").click(function(event){
		var alvoEvento = $(event.target);
		if (alvoEvento.hasClass("editar")){
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
		editarProduto(id, 'alterar');
	});
});
