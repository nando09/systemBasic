<?php
	$id = $view_dados[0];
	$id_detalhe = $view_dados[1] ?? '';
	$id_pedido = isset($view_dados[1])? '|' . $view_dados[1] : '';

	// print_r($view_dados);
	// exit();
	require_once 'C:/xampp/htdocs/System/systemBasic/view/FazerPedido/busca_cliente.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $cf .": ". $nome ?></title>
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
	<style type="text/css">
		.title-pag{
			margin-top: 10px;
		}

		.card{
			margin-top: 30px;
		}
	</style>
</head>
<body id="body">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<div class="col-md-1">
				<div class="header_logo">
					<a href="http://stockys.com.br/" target="_blank">Stock<span>Ys</span></a>
				</div>
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
						<a class="nav-item nav-link" href="/System/systemBasic/">Entre em contado</a>
					</li>
					<li class="nav-item">
						<a class="nav-item nav-link" href="/System/systemBasic/FazerPedido/<?= $tipo ?>/<?= $id . $id_pedido ?>">
							<i class="fas fa-cart-plus"></i>
							<span class="pedidos_feitos badge badge-light"></span>
						</a>
					</li>
					<li class="nav-item">
						<a data-toggle="modal" data-target="#finaliza" class="nav-item nav-link font-weight-bold">Finalizar pedido</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
