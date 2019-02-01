<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = $db->query("SELECT ID, EMPRESA FROM CLIENTE");

		foreach ($query as $key) {
			$retorno .= "<option value='". $key['id'] ."'>". $key['empresa'] ."</option>";

			// $retorno .= "<tr>".
			// 				"<td>" . $key['nome'] . "</td><td>". $key['categoria'] ."</td>".
			// 				"<td>". $key['valor'] ."</td>".
			// 				"<td>". $key['descricao'] ."</td>".
			// 				"<td class='text-center'><a href='/System/systemBasic/Produtos/detalhamento/'". $key['id'] .">".
			// 					"Detalhar</a>".
			// 				"</td>".
			// 				"<td class='text-center'><a href='/System/systemBasic/Produtos/editar/'". $key['id'] .">".
			// 					"Editar</a>".
			// 				"</td>".
			// 				"<td class='text-center'><a href='/System/systemBasic/Produtos/excluir/'". $key['id'] .">".
			// 					"Excluir</a>".
			// 				"</td>".
			// 			"</tr>";
		}
		// print_r($retorno);
		// exit();
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
