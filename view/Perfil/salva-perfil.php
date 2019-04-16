<?php

	$retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';


		if ($_POST) {
			$id_usr = $_POST['id_usr'];
			$Nome = $_POST['Nome'];
			$Email = $_POST['Email'];
			$Login = $_POST['Login'];
			$tipos = $_POST['tipos'];
			$Senha = ($_POST['Senha'] == '******')? '' : $_POST['Senha'];
			// die($Senha);
			if (empty($Senha)) {
				$query = "UPDATE USUARIO SET NOME = :Nome, EMAIL = :Email, USUARIO = :Login, ID_TIPOS = :tipo WHERE ID = :usuario";

				$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$stmt->execute(array(
					':usuario'	=> $id_usr,
					':Nome' 	=> $Nome,
					':Email'	=> $Email,
					':Login'	=> $Login,
					':tipo'		=> $tipos
				));
			}else{
				$query = "UPDATE USUARIO SET NOME = :Nome, EMAIL = :Email, USUARIO = :Login, SENHA = md5(:Senha), ID_TIPOS = :tipo WHERE ID = :usuario";

				$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$stmt->execute(array(
					':usuario'	=> $id_usr,
					':Nome' 	=> $Nome,
					':Email'	=> $Email,
					':Login'	=> $Login,
					':Senha'	=> $Senha,
					':tipo'		=> $tipos
				));
			}

			header('Location: http://localhost/System/systemBasic/Perfil/editar/' . $id_usr);
		}
	}catch(Exception $e){
		header('Location: http://localhost/System/systemBasic/Perfil/editar/' . $id_usr);
	}


