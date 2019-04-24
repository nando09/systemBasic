<?php include 'view/patterns/header.php' ?>
<h1 class="title-pag">Serviços</h1>
<div class="container clear-bolt">
	<div class="row border-gray">
		<div class="col-md-10 align-self-center">
			<p class="margin-zero">Adicionar novo usuario</p>
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary btn-adicionar margin-zero" data-toggle="modal" data-target=".bd-example-modal-xl">NOVO</button>
		</div>
	</div>
	<div class="row border-gray">
		<div class="col-md-10 align-self-center">
			<p class="margin-zero">Adicionar tipos de acessos</p>
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary btn-adicionar margin-zero" data-toggle="modal" data-target=".bd-acessos-modal-xl">NOVO</button>
		</div>
	</div>
	<div class="row border-gray">
		<div class="col-md-10 align-self-center">
			<p class="margin-zero">Apagar projetos</p>
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-danger btn-adicionar margin-zero" data-toggle="modal" data-target=".bd-projetos-modal-xl">VER</button>
		</div>
	</div>
</div>

<div data-backdrop="static" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h1 class="title-pag">Novo usuario</h1>
				<div id="novo-elemento">
					<div class="row">
						<div class="form-group col-md-4">
							<label>Nome <span class="obrigatorio"> *</span></label>
							<input id="nome" type="text" class="form-control">
						</div>
						<div class="form-group col-md-8">
							<label>Email <span class="obrigatorio"> *</span></label>
							<input id="email" type="email" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label>Login: <span class="obrigatorio"> *</span></label>
							<input id="Login" type="text" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label>Senha: <span class="obrigatorio"> *</span></label>
							<input id="senha" type="password" class="form-control" autocomplete="new-password">
						</div>
						<div class="form-group col-md-4">
							<label>Usuario: </label>
							<select id="tipos" class="form-control" name="tipos">
								
							</select>
						</div>
					</div>
					<button id="salvar-usuario" type="button" class="btn btn-primary">SALVAR</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div data-backdrop="static" class="modal fade bd-acessos-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h1 class="title-pag">Novo acessos</h1>
				<div id="novo-elemento">
					<button id="salvar-cliente" type="button" class="btn btn-primary">SALVAR</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div data-backdrop="static" class="modal fade bd-projetos-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h1 class="title-pag">Novo projetos</h1>
			</div>
		</div>
	</div>
</div>
<script src="/System/systemBasic/js/servico.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>
