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
			$Senha = $_POST['Senha'];

			$estado = $_POST['estado'];
			$Cidade = $_POST['Cidade'];
			$Bairro = $_POST['Bairro'];
			$Rua = $_POST['Rua'];
			$Numero = $_POST['Numero'];

			$Fantasia = $_POST['Fantasia'];

			$endereco = $Rua . "&&END" . $Numero . "&&END" . $Bairro . "&&END" . $Cidade . "&&END" . $estado;

			$query = "UPDATE USUARIO SET NOME = :Nome, EMAIL = :Email, USUARIO = :Login, SENHA = md5(:Senha), ENDERECO = :endereco, FANTASIA = :Fantasia WHERE USUARIO = :usuario";
			$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$stmt->execute(array(
				':usuario'	=> $id_usr,
				':Nome' 	=> $Nome,
				':Email'	=> $Email,
				':Login'	=> $Login,
				':Senha'	=> $Senha,
				':endereco'	=> $endereco,
				':Fantasia'	=> $Fantasia
			));

			header('Location: http://localhost/System/systemBasic/Perfil/editar');
		}
	}catch(Exception $e){
		header('Location: http://localhost/System/systemBasic/Perfil/editar');
	}


