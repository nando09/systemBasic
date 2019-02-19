<?php

	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	$id = $_POST['id'];

	$query = $db->query("SELECT PR.ID AS ID, PR.NOME AS NOME, PR.VALOR AS VALOR, PR.DESCRICAO AS DESCRICAO, F.QUANTIDADE AS TEM FROM FORNECENDO AS F INNER JOIN PRODUTO AS PR ON PR.ID = F.ID_PRODUTO WHERE F.ID_FORNECEDOR = " . $id);

	foreach ($query as $key) {
		$tem = ($key['tem'] > 0)? 'disabled' : '';
		$mais = ($key['tem'] > 0)? 'none' : '';
		$menos = ($key['tem'] > 0)? '' : 'none';

		$retorno .= "	<div class='col-md-3 search-produto'>
							<div class='card'>
								<div class='card-body text-center' id='produto'>
									<h5 class='card-title text-uppercase'>". $key['nome'] ."</h5>
									<p class='card-text'>". $key['descricao'] ."</p>
									<p class='card-text'>". $key['valor'] ."</p>
									<input class='text-center' id='quantidade' type='number' placeholder='Quantidade' value=". $key['tem'] ." ". $tem .">
									<a href='#' id='icon' class='btn btn comprar'>
										<div id='mais' class='". $mais ."'>
											<i class='fas fa-plus-circle'></i>
										</div>
										<div id='menos' class='". $menos ."'>
											<i class='fas fa-minus-circle'></i>
										</div>
									</a>
									<p id='id' class='none'>". $key['id'] ."</p>
								</div>
							</div>
						</div>";
	}

	echo json_encode($retorno);
?>
