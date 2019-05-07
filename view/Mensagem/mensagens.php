<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		// $query = $db->query("SELECT ID, DE, ASSUNTO, DESCRICAO, to_char(DATA_MSG, 'DD/MM/YYYY') as DATA_MSG, ID_DE FROM MENSAGEM");

		// $query = $db->query("SELECT M.ID, M.DE, M.ASSUNTO, T.DESCRICAO, to_char(M.DATA_MSG, 'DD/MM/YYYY') as DATA_MSG, M.ID_DE FROM MENSAGEM AS M INNER JOIN TIPO_MENSAGEM AS T ON M.DESCRICAO = T.ID");

		$query = $db->query("SELECT M.ID AS ID, M.DE AS DE, M.ASSUNTO AS ASSUNTO, T.DESCRICAO AS DESCRICAO, to_char(M.DATA_MSG, 'DD/MM/YYYY') as DATA_MSG, M.ID_DE AS ID_DE FROM MENSAGEM AS M INNER JOIN TIPO_MENSAGEM AS T ON M.DESCRICAO = T.ID");

		foreach ($query as $key) {
			$retorno .= "<tr>".
							"<td>". $key['de'] ."</td>".
							"<td>". $key['assunto'] . "</td>".
							"<td>". $key['descricao'] ."</td>".
							"<td>". $key['data_msg'] ."</td>".
							"<td class='text-center excluir-msg'>".
								"<i class='far fa-trash-alt excluir'></i>".
							"</td>".
							"<td id='id' class='none'>".
								"<span value=". $key['id'] .">". $key['id'] ."</span>".
							"</td>".
						"</tr>";
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>

