<?php

	// $retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';
		$id = $_POST['id'];

		if (empty($id)) {
			$query = "SELECT U.ID AS ID, U.NOME AS NOME, U.EMAIL, U.USUARIO, T.NOME AS TIPO FROM USUARIO AS U INNER JOIN TIPOS AS T ON T.ID = U.ID_TIPOS";
			$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$stmt->execute();
			$user = $stmt->fetchAll();
			$html = '';

			foreach ($user as $key) {
				$html .= "
					<div class='col-md-4 top-margin'>
						<div class='card'>
							<div class='card-body'>
								<h5>". $key['nome'] ."</h5>
								<p>". $key['tipo'] ."</p>
								<a href='/System/systemBasic/Perfil/editar/". $key['id'] ."' class='btn btn-primary'>Editar</a>
							</div>
						</div>
					</div>
				";
			}
					// <div class='card col-md-4' style='width: 18rem;'>
					// 	<div class='card-body'>
					// 		<h5>". $key['nome'] ."</h5>
					// 		<p>". $key['tipo'] ."</p>
					// 		<a href='/System/systemBasic/Perfil/editar/". $key['id'] ."' class='btn btn-primary'>Editar</a>
					// 	</div>
					// </div>

			$retorno = array(
				'HTML' 	=>	$html
			);
		}else{
			$query = "SELECT NOME AS NOME, EMAIL AS EMAIL, USUARIO AS USUARIO, ID_TIPOS, SENHA AS SENHA FROM USUARIO WHERE ID = :usuario";
			$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$stmt->execute(array(':usuario' => $id)); 
			$user = $stmt->fetch();

			$retorno = array(
				'NOME' 		=>		$user['nome'],
				'EMAIL' 	=>		$user['email'],
				'USUARIO' 	=>		$user['usuario'],
				'TIPO'		=>		$user['id_tipos'],
				'SENHA'		=>		$user['senha']
			);

		}

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
