<?php
	session_start();
	$id = $_SESSION['id_usuario'];

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = "SELECT T.ACESSO AS ACESSO FROM USUARIO AS U INNER JOIN TIPOS AS T ON T.ID = U.ID_TIPOS WHERE U.ID = " . $id;
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetch();
		$acesso = $user['acesso'];
		$arrays = explode("/", $acesso);

		$retorno = in_array('2', $arrays) ? 'liberado' : in_array('0', $arrays) ? 'liberado' : 'travo';

		// if ($acesso == '0') {
		// 	print_r('Passando!');
		// }
		// print_r($acesso);
		// exit();




	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
