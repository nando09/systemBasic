<?php

	// CREATE TYPE ESCOLHA AS ENUM('PAGO', 'PENDENTE', 'ATRASO', 'SEM COMPRAS');
	// **** DATE ****
	// http://www.mauricioprogramador.com.br/posts/como-pegar-data-atual-php

	function situacaoCor($status, $situacao){
		if ($situacao) {
			if ($status == 'PAGO') {
				return 'verde';
			}else if ($status == 'PENDENTE') {
				return 'vermelho';
			}
		}else{
			if ($status == 'PAGO') {
				return 'amarelo';
			}else if ($status == 'PENDENTE') {
				return 'laranja';
			}
		}
	}

	$retorno = "";
	$id = $_POST['id'];

	// if ($_POST) {
	// 	print_r($_POST);
	// 	exit();
	// }
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
		$query = $db->query("SELECT
								valor,
								to_char(data_compra, 'DD/MM/YYYY') as data_compra,
								to_char(vencimento, 'DD/MM/YYYY') as vencimento,
								(vencimento <= NOW()) as situacao,
								status
							FROM
								DETALHE_PEDIDO as p
							INNER JOIN
								cliente as c
							ON
								c.id = p.id_cliente
							WHERE
								p.id_cliente = " . $id);

		foreach ($query as $key) {
			$valor = 'R$ ' . number_format($key['valor'], 2, ',', ' ');
			$cor = situacaoCor($key['status'], $key['situacao']);
			// echo $key['status'] . " / " . $key['situacao'];

			$descricao = "Valor total da compra é de " . $valor . " vencimento para ". $key['vencimento'] .", com pagamento ". $key['status'] ;
			$retorno .= "<tr>".
							"<td class='big-text' title='" . $descricao . "'>". $descricao . "</td>".
							"<td class='" . $cor ."'>". $key['vencimento'] . "</td>".
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
