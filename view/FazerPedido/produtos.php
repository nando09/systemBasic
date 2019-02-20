<?php

	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	$id = $_POST['id_cf'];
	$tipo = $_POST['cf'];

	if (strpos($tipo, 'liente')) {
		$query = $db->query("SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao, 
							(SELECT QUANTIDADE FROM PEDINDO AS pe WHERE pe.ID_CLIENTE = ". $id ." AND p.ID = pe.ID_PRODUTO) as tem
								FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id");
		// die($query);

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
	}else{
		$query = $db->query("SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao, 
							(SELECT QUANTIDADE FROM FORNECENDO AS f WHERE f.ID_FORNECEDOR = ". $id ." AND p.ID = f.ID_PRODUTO) as tem
								FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id");

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
	}

	// try{

		// exit();
	// }catch(Exception $e){
	// 	$retorno = 'N';
	// }

	echo json_encode($retorno);
?>
