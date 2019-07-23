<?php
	// $user = 'postgres';
	// $pass = 'Sof@1502';
	// $db = new PDO('pgsql:host=localhost;port=5432;dbname=system', $user, $pass);

	$user = 'postgres';
	$pass = 'Sof@1502';
	$base = 'system';
	$host = 'localhost';
	$port = ';port=5432';
	$db = new PDO("pgsql:host=$host$port;dbname=$base;options='-c client_encoding=utf8'", $user, $pass, [
		PDO::ATTR_EMULATE_PREPARES => false, 
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
	]);

	// PDO('pgsql:host=localhost;port=5432;dbname=system', 'postgres', 'Sof@1502');
	// print_r("Conexão ligada com sucesso!");

	// $user = 'postgres';
	// $pass = 'Sof@1502';
	// $pass = 'Sof@1502';
	// $base = 'system';
	// $host = 'localhost';
	// $port = ';port=5432';

	// $db = new PDO("pgsql:host=$host$port;dbname=$base;charset=utf8", $user, $pass, [
	// 	PDO::ATTR_EMULATE_PREPARES => false, 
	// 	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	// ]);
	// // PDO('pgsql:host=localhost;port=5432;dbname=system', 'postgres', 'Sof@1502');
	// // print_r("Conexão ligada com sucesso!");
