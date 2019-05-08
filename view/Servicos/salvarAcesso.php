<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';


		if ($_POST) {
			$Usuarios			=	($_POST['Usuarios'] == 'true') 		?	'/1'	:	''	;
			$Projetos			=	($_POST['Projetos'] == 'true') 		?	'/2'	:	''	;
			$Relatorios			=	($_POST['Relatorios'] == 'true') 	?	'/3'	:	''	;
			$Mensagens			=	($_POST['Mensagens'] == 'true') 	?	'/4'	:	''	;
			$Fornecedores		=	($_POST['Fornecedores'] == 'true') 	?	'/5'	:	''	;
			$entradaSaida		=	($_POST['entradaSaida'] == 'true') 	?	'/6'	:	''	;
			$nome				=	$_POST['nome'];

			$acessos = $Usuarios . $Projetos . $Relatorios . $Mensagens . $Fornecedores . $entradaSaida . '/';


			// exit();

			// $acessos	=	;

			$query = "INSERT INTO TIPOS (NOME, ACESSO) VALUES (:nome, :acessos)";

			$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$stmt->bindParam(':nome', $nome, PDO::PARAM_INT);
			$stmt->bindParam(':acessos', $acessos, PDO::PARAM_INT);

			// die($query);

			if ($stmt->execute()) {
				$retorno = 'S';
			}
		}
	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);

