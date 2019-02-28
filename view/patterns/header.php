<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edmin</title>
	<link type="text/css" href="/System/systemBasic/bootstrap/css2/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="/System/systemBasic/bootstrap/css2/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/System/systemBasic/css/style.css">
	<link rel="stylesheet" type="text/css" href="/System/systemBasic/images/icons/fontawesome/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
	<script src="/System/systemBasic/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="/System/systemBasic/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="/System/systemBasic/bootstrap/js2/bootstrap.min.js" type="text/javascript"></script>
	<script src="/System/systemBasic/js/ajax.js" type="text/javascript"></script>
	<script src="/System/systemBasic/js/bootstrap-growl.js" type="text/javascript"></script>
	<script src="/System/systemBasic/sweetalert/docs/assets/sweetalert/sweetalert.min.js"></script>
	<script src="/System/systemBasic/chart/chart.js/dist/Chart.min.js"></script>
<!-- 	<script src="/System/systemBasic/js/script.js" type="text/javascript"></script> -->
	<style type="text/css">
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
	</style>
</head>
<body id="body">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
				<div class="col-md-1">
					<p class="admin-home">System</p>
				</div>
				<div class="col-md-3 admin-search">
					<div class="input-group">
						<input type="text" class="form-control search-primary" placeholder="Pesquisar" aria-label="Recipient's username" aria-describedby="button-addon2">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary btn-search-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<ul class="nav justify-content-end">
						<li class="nav-item">
							<a class="nav-link font-weight-bold" href="#" data-toggle="modal" data-target="#exampleModal" aria-disabled="true">Suporte</a>
						</li>
						<li class="nav-item">
							<div class="btn-group">
								<div class="nav-link">
									<div class="msg-principal">
										<p class="text-center">1</p>
									</div>
									<a href="/System/systemBasic/Mensagem">
										<i class="fas fa-sms"></i>
									</a>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<!-- Example split danger button -->
							<div class="btn-group">
								<div class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-female"></i>
								</div>
								<button class="btn btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="/System/systemBasic/Perfil">Seu Perfil</a>
									<a class="dropdown-item" href="/System/systemBasic/Perfil/editar">Editar Perfil</a>
									<a class="dropdown-item" href="/System/systemBasic/Perfil/configuracao">Configuração</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="/System/systemBasic/Login/logout">Logout</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
		</div>
	</nav>
	<div id="primary" class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="list-group">
					<a class="list-group-item disabled header" aria-disabled="true"></a>
					<a class="list-group-item" href="/System/systemBasic/Painel"><i class="menu-icon fas fa-project-diagram"></i>Painel </a>
					<a class="list-group-item" href="/System/systemBasic/Noticias"><i class="menu-icon fas fa-bullhorn"></i>Notícias
						<div class="msg-entrada msg-noticia">
							<p class="text-center">1</p>
						</div>					</a>
					<a class="list-group-item" href="/System/systemBasic/Entrada"><i class="menu-icon fas fa-inbox"></i>Entrada
						<div class="msg-entrada">
							<p class="text-center">1</p>
						</div>
					</a>
					<a class="list-group-item" href="/System/systemBasic/Projetos"><i class="menu-icon fas fa-tasks"></i>Projetos </a>
					<a class="list-group-item disabled footer" aria-disabled="true"></a>
				</div>
				<div class="list-group nav-lateral">
					<a class="list-group-item disabled header" aria-disabled="true"></a>
					<a class="list-group-item" href="/System/systemBasic/Produtos"><i class="menu-icon fab fa-dropbox"></i>Produtos </a>
					<a class="list-group-item" href="/System/systemBasic/Clientes"><i class="menu-icon fas fa-address-book"></i>Clientes </a>
					<a class="list-group-item" href="/System/systemBasic/Fornecedores"><i class="menu-icon fas fa-truck-loading"></i>Fornecedores </a>
					<a class="list-group-item" href="/System/systemBasic/Pedidos/entrada"><i class="menu-icon fas fa-cart-arrow-down"></i>Entrada produtos</a>
					<a class="list-group-item" href="/System/systemBasic/Pedidos"><i class="menu-icon fas fa-cart-arrow-down"></i>Saída produtos</a>
					<a class="list-group-item disabled footer" aria-disabled="true"></a>
				</div>
				<div class="list-group nav-lateral">
					<a class="list-group-item disabled header" aria-disabled="true"></a>
					<a class="list-group-item" href="/System/systemBasic/Servicos"><i class="menu-icon fas fa-concierge-bell"></i>Serviços</a>
					<a class="list-group-item" href="/System/systemBasic/Login/logout"><i class="menu-icon fas fa-sign-out-alt"></i>Logout</a>
					<a class="list-group-item disabled footer" aria-disabled="true"></a>
				</div>
			</div>
			<div class="col-md-10">
				<div class="conteudo">
					<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Contato</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="/System/systemBasic/Suporte" method="post">
										<div class="form-group">
											<label for="exampleInputEmail1">Sobre</label>
											<select name="sobre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
												<option value="3">Dica</option>
												<option value="2">Melhoria</option>
												<option value="1">Erro</option>
												<option value="4">Reclamação</option>
												<option value="5">Agradecimento</option>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleFormControlTextarea1">Descrever</label>
											<textarea name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
										</div>
										<button type="submit" class="btn btn-primary">Enviar</button>
									</form>
								</div>
							</div>
						</div>
					</div>
