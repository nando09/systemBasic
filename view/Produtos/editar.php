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
		$nome = $_POST['nome'];
		$valor = $_POST['valor'];
		$descricao = $_POST['descricao'];
		$categoria = $_POST['categoria'];
		$min = $_POST['min'];
		$quantidade = $_POST['quantidade'];

		$query = $db->query("UPDATE PRODUTO SET NOME = '". $nome ."', ID_CATEGORIA = ". $categoria .", VALOR = ". $valor .", DESCRICAO = '". $descricao ."', MINIMO = ". $min .", QUANTIDADE = ". $quantidade ." WHERE ID = " . $id);
		// die()

		if ($query) {
			$query = "SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id WHERE p.id = " . $id;

			if ($campo = $db->query($query)) {
				foreach ($campo as $key) {
					$retorno = array(
								'retorno' => 'S',
								'nome' => $key['nome'],
								'categoria' => $key['categoria'],
								'valor' => $key['valor'],
								'descricao' => $key['descricao']
					);
				}
			}
		}
	}catch(Exception $e){
			$retorno = array('retorno' => 'N');
	}

}

echo json_encode($retorno);
