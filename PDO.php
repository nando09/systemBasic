<?php 
	// Aqui teremos uma chamado ao banco de dados que so ira da para um resultado
	$query = "SELECT * FROM FORNECEDOR";
	$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$stmt->execute(); 
	$user = $stmt->fetch();
	echo $user['empresa'];

	// Aqui vamos chamar varios retornos que vem do banco
	$query = "SELECT * FROM FORNECEDOR";
	$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$stmt->execute();
	$user = $stmt->fetchAll();
	foreach ($user as $key) {
		echo "<h1>" . $key['empresa'] . "</h1>";
	}

	// Aqui é um retorno de uma query que vem com parametros dados pelo execulte
	$usuario = $_POST['nome'];
	$senha = $_POST['senha'];
	$query = "SELECT NOME,USUARIO,SENHA FROM USUARIO WHERE USUARIO = :teste AND SENHA = MD5(:senha)";
	$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$stmt->execute(array(':teste' => $usuario, ':senha' => $senha));
	$user = $stmt->fetch();
	echo "<h1>" . $user['nome'] . "</h1>";

	// Aqui é um outro retorno da query com base de parametros sobre a query, como podemos ver o where não tem especidicações.
	// Somente aguarda um elemento ser imposto sobre o :teste e :senha
	$usuario = $_POST['nome'];
	$senha = $_POST['senha'];
	$query = "SELECT NOME,USUARIO,SENHA FROM USUARIO WHERE USUARIO = :teste AND SENHA = MD5(:senha)";
	$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$stmt->bindParam(':teste', $usuario, PDO::PARAM_INT);
	$stmt->bindParam(':senha', $senha, PDO::PARAM_INT);
	$stmt->execute(); 
	$user = $stmt->fetch();
	echo "<h1>" . $user['nome'] . "</h1>";


