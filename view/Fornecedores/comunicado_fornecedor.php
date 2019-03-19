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

		$query = $db->query("SELECT to_char(DIA, 'DD/MM/YYYY') AS DIA, DESCRICAO FROM COMUNICADO_FO WHERE ID_FORNECEDOR = " . $id);

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
