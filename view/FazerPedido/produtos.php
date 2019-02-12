<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id");

		foreach ($query as $key) {
			$retorno .= "	<div class='col-md-3 search-produto'>
								<div class='card'>
									<div class='card-body text-center' id='produto'>
										<h5 class='card-title text-uppercase'>". $key['nome'] ."</h5>
										<p class='card-text'>". $key['descricao'] ."</p>
										<p class='card-text'>". $key['valor'] ."</p>
										<input class='text-center' id='quantidade' type='number' placeholder='Quantidade'>
										<a href='#' id='icon' class='btn btn comprar'>
											<div id='mais'>
												<i class='fas fa-plus-circle'></i>
											</div>
											<div id='menos' class='none'>
												<i class='fas fa-minus-circle'></i>
											</div>
										</a>
										<p id='id' class='none'>". $key['id'] ."</p>
									</div>
								</div>
							</div>";
		}
		// exit();
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
