<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT D.ID AS ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, D.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS AS STATUS FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID");

		foreach ($query as $key) {
			$retorno .= "<tr>".
							"<td>". $key['empresa'] . "</td>".
							"<td>". $key['valor'] . "</td>".
							"<td>". $key['ultima'] . "</td>".
							"<td>". $key['status'] . "</td>".
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
