<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';


		if ($_POST) {
			$nome	=	$_POST['nome'];
			$email	=	$_POST['email'];
			$Login	=	$_POST['Login'];
			$senha	=	$_POST['senha'];
			$tipos	=	$_POST['tipos'];

			$query = "INSERT INTO USUARIO (NOME, EMAIL, USUARIO, SENHA, ID_TIPOS) VALUES (:nome, :email, :usuario, MD5(:senha), :tipos)";

			$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$stmt->bindParam(':nome', $nome, PDO::PARAM_INT);
			$stmt->bindParam(':email', $email, PDO::PARAM_INT);
			$stmt->bindParam(':usuario', $Login, PDO::PARAM_INT);
			$stmt->bindParam(':senha', $senha, PDO::PARAM_INT);
			$stmt->bindParam(':tipos', $tipos, PDO::PARAM_INT);

			// die($query);

			if ($stmt->execute()) {
				$retorno = 'S';
			}
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);

