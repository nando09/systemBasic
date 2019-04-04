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
		$nro = $_POST['nro'];



		$query = "SELECT * FROM PRODUTO WHERE ID <> 0 AND NRO = '$nro'";

		$del = $db->prepare($query);
		$del->execute();
		$count = $del->rowCount();

		if ($count > 0) {
			$retorno = array(
				'retorno' => 'E'
			);

			echo json_encode($retorno);
			exit();
		}

		$query = "INSERT INTO PRODUTO (NRO, NOME,ID_CATEGORIA,VALOR,DESCRICAO,QUANTIDADE,MINIMO) VALUES ('". $nro ."', '". $nome ."', " . $categoria . ", ". $valor .", '". $descricao ."', ". $quantidade .", ". $min .")";
		// die($query);

		if ($db->query($query)) {
			$query = "SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id WHERE p.nome = '" . $nome . "' and c.id = " . $categoria . " and p.valor = " . $valor;
			// die($query);


			if ($campo = $db->query($query)) {
				foreach ($campo as $key) {
					$valor = 'R$ ' . number_format($key['valor'], 2, ',', ' ');
					$tr .= "<tr>".
									"<td class='text-uppercase'>". $key['nome'] . "</td>".
									"<td class='text-uppercase'>". $key['categoria'] ."</td>".
									"<td class='text-uppercase'>". $valor ."</td>".
									"<td class='text-uppercase'>". $key['descricao'] ."</td>".
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
