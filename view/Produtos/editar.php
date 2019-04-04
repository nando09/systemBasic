<?php

include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
$vai = $_POST['vai'];

$retorno = array('retorno' => '');
if ($vai == 'buscar') {
	try{
		$id = $_POST['id'];

		$query = $db->query("SELECT id, nro, nome, id_categoria, valor, descricao, minimo, quantidade FROM PRODUTO WHERE ID = " . $id);
		// die($query);
		foreach ($query as $key) {
			$retorno = array(
						'retorno' => 'S',
						'vai' => $vai,
						'id_produto' => $key['id'],
						'nro' => $key['nro'],
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
		$nro = strtolower($_POST['nro']);
		$categoria = $_POST['categoria'];
		$min = (empty($_POST['min'])) ? 0 : $_POST['min'];
		$quantidade = $_POST['quantidade'];

		$query = "SELECT * FROM PRODUTO WHERE ID <> $id AND NRO = '$nro'";

		$del = $db->prepare($query);
		$del->execute();
		$count = $del->rowCount();

		if ($count > 0 && !empty($nro)) {
			$retorno = array(
				'retorno' => 'E'
			);

			echo json_encode($retorno);
			exit();
		}

		$query = $db->query("UPDATE PRODUTO SET NRO = '". $nro ."', NOME = '". $nome ."', ID_CATEGORIA = ". $categoria .", VALOR = ". $valor .", DESCRICAO = '". $descricao ."', MINIMO = ". $min .", QUANTIDADE = ". $quantidade ." WHERE ID = " . $id);
		// die()

		if ($query) {
			$query = "SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id WHERE p.id = " . $id;

			if ($campo = $db->query($query)) {
				foreach ($campo as $key) {
					$valor = 'R$ ' . number_format($key['valor'], 2, ',', ' ');
					$retorno = array(
								'retorno' => 'S',
								'nome' => $key['nome'],
								'categoria' => $key['categoria'],
								'valor' => $valor,
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
