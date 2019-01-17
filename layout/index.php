<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edmin</title>
	<link type="text/css" href="/System/systemBasic/bootstrap/css2/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="/System/systemBasic/bootstrap/css2/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/System/systemBasic/css/style.css">
	<link rel="stylesheet" type="text/css" href="/System/systemBasic/images/icons/fontawesome/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
</head>
<body id="body">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<div class="row">
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
							<a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Suporte</a>
						</li>
						<li class="nav-item">
							<div class="btn-group">
								<div class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-sms"></i>
								</div>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Seu Perfil</a>
									<a class="dropdown-item" href="#">Editar Perfil</a>
									<a class="dropdown-item" href="#">Configuração</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Logout</a>
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
									<a class="dropdown-item" href="#">Seu Perfil</a>
									<a class="dropdown-item" href="#">Editar Perfil</a>
									<a class="dropdown-item" href="#">Configuração</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Logout</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<div id="conteudo">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<ul class="list-group">
						<li class="list-group-item disabled" aria-disabled="true">Fernando</li>
						<li class="list-group-item"><a href="/System/systemBasic/Produtos"><i class="menu-icon fas fa-project-diagram"></i>Painel </a></li>
						<li class="list-group-item"><a href="/System/systemBasic/Clientes"><i class="menu-icon fas fa-bullhorn"></i>Notícias </a></li>
						<li class="list-group-item"><a href="/System/systemBasic/Fonecedores"><i class="menu-icon fas fa-inbox"></i>Entrada </a></li>
						<li class="list-group-item"><a href="/System/systemBasic/Pedidos"><i class="menu-icon fas fa-tasks"></i>Projetos </a></li>
					</ul>
					<ul class="list-group nav-lateral">
						<li class="list-group-item"><i class="menu-icon fab fa-dropbox"></i>Produtos</li>
						<li class="list-group-item"><i class="menu-icon fas fa-address-book"></i>Clientes</li>
						<li class="list-group-item"><i class="menu-icon fas fa-truck-loading"></i>Fornecedores</li>
						<li class="list-group-item"><i class="menu-icon fas fa-cart-arrow-down"></i>Pedidos</li>
					</ul>
					<ul class="list-group nav-lateral">
						<li class="list-group-item"><i class="menu-icon fas fa-concierge-bell"></i>Serviços</li>
						<li class="list-group-item"><i class="menu-icon fas fa-sign-out-alt"></i>Logout</li>
					</ul>
				</div>
			</div>
		</div>	
	</div>
	<script src="/System/systemBasic/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="/System/systemBasic/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="/System/systemBasic/bootstrap/js2/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
