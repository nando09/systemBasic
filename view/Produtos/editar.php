<?php

include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
$vai = $_POST['vai'];

$retorno = array('retorno' => '');
if ($vai == 'buscar') {
	try{
		$id = $_POST['id'];

		$query = $db->query("SELECT id, nome, id_categoria, valor, descricao, minimo, quantidade FROM PRODUTO WHERE ID = " . $id);

		foreach ($query as $key) {
			$retorno = array(
						'retorno' => 'S',
						'vai' => $vai,
						'id_produto' => $key['id'],
						'nome' => $key['nome'],
						'valor' => $key['valor'],
						'descricao' => $key['descricao'],
						'categoria' => $key['id_categoria'],
						'minimo' => $key['minimo'],
						'quantidade' => $key['quantidade']
			);
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}
}else{
	try{
		$id = $_POST['id'];

		$query = $db->query("UPDATE PRODUTO SET NOME = 'TESTE', ID_CATEGORIA = '4', VALOR = 1234, DESCRICAO = 'TESTE LOUCO', MINIMO = 10, QUANTIDADE = 300 WHERE ID = " . $id);
		// die()

		if ($query) {
			$query = "SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id WHERE p.nome = '" . $nome . "' and c.id = " . $categoria . " and p.valor = " . $valor;

			if ($campo = $db->query($query)) {
				foreach ($campo as $key) {
					$retorno = array(
								'retorno' => 'S',
								'nome' => $key['nome'],
								'categoria' => $key['categoria'],
								'descricao' => $key['descricao'],
					);
				}
			}
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

}

echo json_encode($retorno);
