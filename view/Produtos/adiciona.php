<?php

	// print_r($_POST);

	$retorno = array(
		'retorno' => ''
	);

	$tr = '';

	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$nome = $_POST['nome'];
		$categoria = $_POST['categoria'];
		$valor = $_POST['valor'];
		$descricao = $_POST['descricao'];
		$quantidade = $_POST['quantidade'];
		$min = $_POST['min'];

		$query = "INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,QUANTIDADE,MINIMO) VALUES ('". $nome ."', " . $categoria . ", ". $valor .", '". $descricao ."', ". $quantidade .", ". $min .")";

		if ($db->query($query)) {
			$query = "SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id WHERE p.nome = '" . $nome . "' and c.id = " . $categoria . " and p.valor = " . $valor;
			// die($query);


			if ($campo = $db->query($query)) {
				foreach ($campo as $key) {
					$tr .= "<tr>".
								"<td>". $key['nome'] . "</td>".
								"<td>". $key['categoria'] ."</td>".
								"<td>". $key['valor'] ."</td>".
								"<td>". $key['descricao'] ."</td>".
								"<td class='text-center'>".
									"<div class='detalhar' data-toggle='modal' data-target='.detalhamento'>".
										"<i class='fas fa-info-circle detalhar'></i>".
									"</div>".
								"</td>".
								"<td class='text-center'>".
									"<div class='edita' data-toggle='modal' data-target='.editar'>".
										"<i class='far fa-edit editar'></i>".
									"</div>".
								"</td>".
								"<td class='text-center'>".
									"<i class='far fa-trash-alt excluir'></i>".
								"</td>".
								"<td id='id' class='none'>".
									"<span value=". $key['id'] .">". $key['id'] ."</span>".
								"</td>".
							"</tr>";
				}

				// print_r($tr);
				// exit();

				$retorno = array(
					'retorno' => 'S',
					'tr' => $tr
				);
			}
		}
	}catch(Exception $e){
		$retorno = array(
			'retorno' => 'N'
		);
	}

	echo json_encode($retorno);