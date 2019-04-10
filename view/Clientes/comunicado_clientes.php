<?php

	$retorno = "";
	$id = $_POST['id'];

	// if ($_POST) {
	// 	print_r($_POST);
	// 	exit();
	// }
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
		$query = $db->query("SELECT valor, to_char(data_compra, 'DD/MM/YYYY') as data_compra, to_char(vencimento, 'DD/MM/YYYY') as vencimento, status FROM DETALHE_PEDIDO as p inner join cliente as c on c.id = p.id_cliente where p.id_cliente = " . $id);
		foreach ($query as $key) {
			$valor = 'R$ ' . number_format($key['valor'], 2, ',', ' ');
			$descricao = "Valor total da compra é de " . $valor . ", vencimento para ". $key['vencimento'] .", com pagamento ". $key['status'] ;
			$retorno .= "<tr>".
							"<td class='big-text' title='" . $descricao . "'>". $descricao . "</td>".
							"<td>". $key['vencimento'] . "</td>".
						"</tr>";
		}

		$query = $db->query("SELECT to_char(DIA, 'DD/MM/YYYY') AS DIA, DESCRICAO FROM COMUNICADO_CL WHERE ID_CLIENTE = " . $id);

		foreach ($query as $key) {
			$retorno .= "<tr>".
							"<td class='big-text' title='" . $key['descricao'] . "'>". $key['descricao'] . "</td>".
							"<td>". $key['dia'] . "</td>".
						"</tr>";
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
