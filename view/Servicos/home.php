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
				<h1 class="title-pag">Acessos</h1>
				<div id="novo-elemento">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nome acesso<span class="obrigatorio"> *</span></label>
							<input id="nome-acesso" type="text" class="form-control">
						</div>
						<div class="col-md-12">
							<div class="form-check border-gray">
								<input class="form-check-input position-static margin-zero" type="checkbox" id="Usuarios" value="1" aria-label="...">
								<label>Usuarios</label>
								<span class="float-right">(Vai poder mexer nas configurações de usuarios)</span>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-check border-gray">
								<input class="form-check-input position-static margin-zero" type="checkbox" id="Projetos" value="2" aria-label="...">
								<label>Projetos</label>
								<span class="float-right">(Vai poder ver todos os projetos e adicionar novo)</span>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-check border-gray">
								<input class="form-check-input position-static margin-zero" type="checkbox" id="Relatorios" value="3" aria-label="...">
								<label>Relatorios</label>
								<span class="float-right">(Pode ver todos os relatorios clientes, produtos e fornecedores)</span>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-check border-gray">
								<input class="form-check-input position-static margin-zero" type="checkbox" id="Mensagens" value="4" aria-label="...">
								<label>Mensagens</label>
								<span class="float-right">(Ver todos as mensagens mandadas pelo sistema)</span>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-check border-gray">
								<input class="form-check-input position-static margin-zero" type="checkbox" id="Fornecedores" value="5" aria-label="...">
								<label>Fornecedores/Clientes/Produtos</label>
								<span class="float-right">(Poderar mexer em todas as funções)</span>
							</div>
						</div>
					</div>
					<button id="salvar-acesso" type="button" class="btn btn-primary">SALVAR</button>
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
				<h1 class="title-pag">Projetos</h1>
				<div id="novo-elemento">
					<div class="row">
						<thead class="table table-hover">
							<tr>
								<th class="text-uppercase" scope="col">Nome</th>
								<th class="text-uppercase" scope="col">Descrição</th>
								<th class="text-uppercase" scope="col">Editar</th>
							</tr>
						</thead>
						<tbody id="projetos" class="tbody-primary">
						</tbody>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/System/systemBasic/js/servico.js" type="text/javascript"></script>
<?php include 'view/patterns/footer.php' ?>
