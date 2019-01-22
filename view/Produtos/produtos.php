<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id");

		foreach ($query as $key) {
			$retorno .= "<tr>".
							"<td>" . $key['nome'] . "</td><td>". $key['categoria'] ."</td>".
							"<td>". $key['valor'] ."</td>".
							"<td>". $key['descricao'] ."</td>".
							"<td class='text-center'><a href='/System/systemBasic/Produtos/detalhamento/". $key['id'] ."'>".
								"<i class='fas fa-info-circle'></i></a>".
							"</td>".
							"<td class='text-center'><a href='/System/systemBasic/Produtos/editar/". $key['id'] ."'>".
								"<i class='far fa-edit'></i></a>".
							"</td>".
							"<td class='text-center'><a href='/System/systemBasic/Produtos/excluir/". $key['id'] ."'>".
								"<i class='far fa-trash-alt'></i></a>".
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
