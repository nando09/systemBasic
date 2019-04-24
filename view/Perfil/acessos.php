<?php
	

	// $retorno = "";
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$query = "SELECT ID, NOME FROM TIPOS";
		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetchAll();
		$html = '';

		foreach ($user as $key) {
			$html .= "
				<option value='". $key['id'] ."'>". $key['nome'] ."</option>
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

	}catch(Exception $e){
		$retorno = 'N';
	}

	echo json_encode($retorno);
?>
