<?php
	include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

	$retorno = '';
	// print_r($_POST);
	// exit();
	try {

		$query = "DELETE FROM PRODUTO WHERE ID = " . $_POST['id'];

		if ($db->query($query)) {
			$retorno = 'S';
		}
	} catch (Exception $e) {
		$retorno = "E";
	}

	echo json_encode($retorno);

	// // Desenvolvido para percorrer o array e excluir todos os arquivos enviado por separação de "| popappi"
	// foreach ($view_dados as $key) {
	// 	echo $key;
	// }
