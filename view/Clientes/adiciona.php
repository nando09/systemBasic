<?php

	// print_r($_POST);

	$retorno = array(
		'retorno' => ''
	);

	$tr = '';

	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$nome = $_POST['nome'];
		$empresa = $_POST['empresa'];
		$cnpj = $_POST['cnpj'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];

		$estado = $_POST['estado'];
		$Cidade = $_POST['cidade'];
		$Bairro = $_POST['bairro'];
		$Rua = $_POST['rua'];
		$Numero = $_POST['numero'];


		$endereco = $Rua . "&&END" . $Numero . "&&END" . $Bairro . "&&END" . $Cidade . "&&END" . $estado;

		$query = "INSERT INTO CLIENTE (DATA_ULTIMA_COMPRA, NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE) VALUES (NOW(), '". $nome ."', '". $empresa ."', ". $cnpj .", '". $endereco ."', '". $email ."', ". $telefone .")";
		// die($query);
		if ($db->query($query)) {
			$query = "SELECT ID, EMPRESA, EMAIL, TELEFONE FROM CLIENTE WHERE NOME = '". $nome ."' AND EMPRESA = '". $empresa ."' AND CNPJ = ". $cnpj ;
			// die($query);


			if ($campo = $db->query($query)) {
				foreach ($campo as $key) {
					$tr .= "<tr>".
									"<td>". $key['empresa'] . "</td>".
									"<td>". $key['telefone'] ."</td>".
									"<td class='text-center'>".
										"<div class='detalhar' data-toggle='modal' data-target='.detalhamento'>".
											"<i class='fas fa-info-circle detalhar'></i>".
										"</div>".
									"</td>".
									"<td class='text-center'>".
										"<div class='editar' data-toggle='modal' data-target='.editar'>".
											"<i class='far fa-edit editar'></i>".
										"</div>".
									"</td>".
									"<td class='text-center'>".
										"<i class='far fa-trash-alt excluir'></i>".
									"</td>".
									"<td class='text-center'>".
										"<a href='/System/systemBasic/FazerPedido/cliente/". $key['id'] ."' target='_blank'>".
											"<i class='fas fa-store-alt'></i>".
										"</a>".
									"</td>".
									"<td id='id' class='none'>".
										"<span value=". $key['id'] .">". $key['id'] ."</span>".
									"</td>".
								"</tr>";
				}

				// print_r($tr);
				// exit();

				$retorno = array(
					'retorno' => 'S',
					'tr' => $tr
				);
			}
		}
	}catch(Exception $e){
		$retorno = array(
			'retorno' => 'N'
		);
	}

	echo json_encode($retorno);
