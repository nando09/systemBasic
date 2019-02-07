<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT ID, EMPRESA, EMAIL, TELEFONE FROM CLIENTE");

		foreach ($query as $key) {
			$retorno .= "<tr>".
							"<td>". $key['empresa'] . "</td>".
							"<td>". $key['telefone'] ."</td>".
							"<td class='text-center'>".
								"<div class='detalhar' data-toggle='modal' data-target='.detalhamento'>".
									"<i class='fas fa-info-circle detalhar'></i>".
								"</div>".
							"</td>".
							"<td class='text-center'>".
								"<div class='editar' data-toggle='modal' data-target='.editar'>".
									"<i class='far fa-edit editar'></i>".
								"</div>".
							"</td>".
							"<td class='text-center'>".
								"<i class='far fa-trash-alt excluir'></i>".
							"</td>".
							"<td class='text-center'>".
								"<a href='/System/systemBasic/FazerPedido/home/". $key['id'] ."' target='_blank'>".
									"<i class='fas fa-store-alt'></i>".
								"</a>".
							"</td>".
							"<td id='id' class='none'>".
								"<span value=". $key['id'] .">". $key['id'] ."</span>".
							"</td>".
						"</tr>";

			// $retorno .= "<tr>".
			// 				"<td>" . $key['nome'] . "</td><td>". $key['categoria'] ."</td>".
			// 				"<td>". $key['valor'] ."</td>".
			// 				"<td>". $key['descricao'] ."</td>".
			// 				"<td class='text-center'><a href='/System/systemBasic/Produtos/detalhamento/'". $key['id'] .">".
			// 					"Detalhar</a>".
			// 				"</td>".
			// 				"<td class='text-center'><a href='/System/systemBasic/Produtos/editar/'". $key['id'] .">".
			// 					"Editar</a>".
			// 				"</td>".
			// 				"<td class='text-center'><a href='/System/systemBasic/Produtos/excluir/'". $key['id'] .">".
			// 					"Excluir</a>".
			// 				"</td>".
			// 			"</tr>";
		}
		// exit();
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
