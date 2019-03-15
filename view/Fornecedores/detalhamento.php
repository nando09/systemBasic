<?php

	$retorno = array('retorno' => '');
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$id = $_POST['id'];

		$query = $db->query("SELECT
	SUM(P.QUANTIDADE * PR.VALOR) AS VALOR,
	SUM(P.QUANTIDADE) AS QUANTIDADE,
	F.ID AS ID,
	to_char(F.DATA_ULTIMA_COMPRA, 'DD/MM/YYYY') AS DATA_ULTIMA_COMPRA,
	F.NOME AS NOME,
	F.EMPRESA AS EMPRESA,
	F.CNPJ AS CNPJ,
	F.LOCALIDADE AS LOCALIDADE,
	F.EMAIL AS EMAIL,
	F.TELEFONE AS TELEFONE
FROM FORNECEDOR AS F
LEFT JOIN FORNECENDO AS P ON P.ID_FORNECEDOR = F.ID
FULL OUTER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
WHERE F.ID = ". $id ."
GROUP BY F.ID, F.DATA_ULTIMA_COMPRA, F.NOME, F.EMPRESA, F.CNPJ, F.LOCALIDADE, F.EMAIL, F.TELEFONE");

		// $query = $db->query("SELECT NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE FROM FORNECEDOR WHERE ID = " . $id);

		foreach ($query as $key) {
			$retorno = array(
						'retorno' => 'S',
						'nome' => $key['nome'],
						'empresa' => $key['empresa'],
						'cnpj' => $key['cnpj'],
						'localidade' => $key['localidade'],
						'email' => $key['email'],
						'telefone' => $key['telefone'],
						'valor' => $key['valor'],
						'quantidade' => $key['quantidade']
			);
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

	echo json_encode($retorno);
?>
