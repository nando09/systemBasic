<?php

	$retorno = array('retorno' => '');
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$id = $_POST['id'];

		$query = $db->query("SELECT 
	p.id AS ID,
	SUM(P.VALOR * PE.QUANTIDADE) AS LUCRO,
	SUM(PE.QUANTIDADE) AS VENDIDO,
	p.nome as NOME,
	p.nro AS NRO,
	c.nome AS categoria,
	p.valor AS valor,
	p.descricao AS descricao,
	p.minimo AS minimo,
	p.quantidade AS quantidade FROM PRODUTO AS p
INNER JOIN categoria AS c ON p.id_categoria = c.id
INNER JOIN pedindo AS PE ON PE.ID_PRODUTO = P.ID 
WHERE p.ID = " . $id . "
GROUP BY P.ID, NRO, C.NOME, CATEGORIA, VALOR, DESCRICAO, MINIMO, P.QUANTIDADE");

		foreach ($query as $key) {
			$retorno = array(
						'retorno' => 'S',
						'id_produto' => $key['id'],
						'nome' => $key['nome'],
						'nro' => $key['nro'],
						'categoria' => $key['categoria'],
						'valor' => $key['valor'],
						'descricao' => $key['descricao'],
						'minimo' => $key['minimo'],
						'quantidade' => $key['quantidade'],
						'lucro' => $key['lucro'],
						'vendido' => $key['vendido']
			);
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

	echo json_encode($retorno);
?>
