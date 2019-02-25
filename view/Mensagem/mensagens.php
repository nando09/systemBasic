<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT ID, ASSUNTO, DESCRICAO, to_char(DATA_MSG, 'DD/MM/YYYY') as DATA_MSG, ID_DE FROM MENSAGEM");

		foreach ($query as $key) {
			$retorno .= "<tr>".
							"<td>". $key['id_de'] ."</td>".
							"<td>". $key['assunto'] . "</td>".
							"<td>". $key['descricao'] ."</td>".
							"<td>". $key['data_msg'] ."</td>".
							"<td class='text-center'>".
								"<i data-toggle='modal' data-target='.bd-example-mensagem-lg' class='fas fa-reply response'></i>".
							"</td>".
							"<td class='text-center'>".
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

