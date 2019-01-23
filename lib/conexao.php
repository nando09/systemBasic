<?php
	$user = 'postgres';
	$pass = 'fer7660nando';
	// $pass = 'Sof@1502';
	$db = new PDO('pgsql:host=localhost;port=5432;dbname=system', $user, $pass);

	// PDO('pgsql:host=localhost;port=5432;dbname=system', 'postgres', 'fer7660nando');
	// print_r("Conexão ligada com sucesso!");
?>