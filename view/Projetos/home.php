<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Projetos</h1>
<a href="/System/systemBasic/" class="btn btn-primary btn-adicionar">NOVO</a>
<table class="table table-hover">
	<thead class="table table-hover">
		<tr>
			<th scope="col">NOME</th>
			<th scope="col">DESCRIÇÃO</th>
			<th scope="col">DETERMINADO</th>
			<th scope="col" class="text-center">FEITO</th>
		</tr>
	</thead>
	<tbody id="projetos" class="tbody-primary">
	</tbody>
</table>
<script src="/System/systemBasic/js/projetos.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>
