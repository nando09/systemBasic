<?php

	$retorno = array('retorno' => '');
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$id = $_POST['id'];

		$query = $db->query("SELECT
								SUM(P.QUANTIDADE * PR.VALOR) AS VALOR,
								SUM(P.QUANTIDADE) AS QUANTIDADE,
								C.ID AS ID,
								to_char(C.DATA_ULTIMA_COMPRA, 'DD/MM/YYYY') AS DATA_ULTIMA_COMPRA,
								C.NOME AS NOME,
								C.EMPRESA AS EMPRESA,
								C.CNPJ AS CNPJ,
								C.LOCALIDADE AS LOCALIDADE,
								C.EMAIL AS EMAIL,
								C.TELEFONE AS TELEFONE
							FROM CLIENTE AS C
							LEFT JOIN PEDINDO AS P ON P.ID_CLIENTE = C.ID
							FULL OUTER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
							WHERE C.ID = ". $id ."
							GROUP BY C.ID, C.DATA_ULTIMA_COMPRA, C.NOME, C.EMPRESA, C.CNPJ, C.LOCALIDADE, C.EMAIL, C.TELEFONE");

		foreach ($query as $key) {
			$retorno = array(
						'retorno' => 'S',
						'nome' => $key['nome'],
						'data_ultima' => $key['data_ultima_compra'],
						'empresa' => $key['empresa'],
						'cnpj' => $key['cnpj'],
						'localidade' => $key['localidade'],
						'email' => $key['email'],
						'telefone' => $key['telefone'],
						'lucro' => $key['valor'],
						'quantidade' => $key['quantidade']
			);
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

	echo json_encode($retorno);
?>
