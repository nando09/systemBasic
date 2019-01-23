<?php

	$retorno = array('retorno' => '');
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$id = $_POST['id'];

		$query = $db->query("SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor AS valor, p.descricao AS descricao, p.minimo AS minimo, p.quantidade AS quantidade FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id WHERE p.ID = " . $id);

		foreach ($query as $key) {
			$retorno = array(
						'retorno' => 'S',
						'id_produto' => $key['id'],
						'nome' => $key['nome'],
						'categoria' => $key['categoria'],
						'valor' => $key['valor'],
						'descricao' => $key['descricao'],
						'minimo' => $key['minimo'],
						'quantidade' => $key['quantidade']
			);
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

	echo json_encode($retorno);
?>
