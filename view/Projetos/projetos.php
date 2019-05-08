<?php

	// Usuarios			1		=>	Perfil, Servicos
	// Projetos			2		=>	Projetos
	// Relatorios		3		=>	Click, relatorios
	// Mensagens		4		=>	Mensagem
	// Fornecedores		5		=>	Fornecedores, CLientes, Produtos

	session_start();

	$id = $_SESSION['id_usuario'];
	$acessos = $_SESSION['acessos'] ?? '0';
	$arraysAcesso = explode("/", $acessos);

	function situacaoCor($situacao){
		if ($situacao) {
			return 'vermelho';
		}else{
			return 'azul';
		}
	}

	$retorno = array('retorno' => '');
	$html = '';
	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		include_once 'C:/xampp/htdocs/System/systemBasic/lib/conexao.php';

		$acesso = in_array('2', $arraysAcesso) ? true : in_array('0', $arraysAcesso) ? true : false;

		if ($acesso) {
			$query = "SELECT
						P.ID AS ID,
						U.NOME AS NOME,
						P.DESCRICAO AS DESCRICAO,
						to_char(P.DETERMINADO, 'DD/MM/YYYY') AS DETERMINADO,
						P.FEITO AS FEITO,
						(P.DETERMINADO <= NOW()) as situacao
					FROM
						PROJETOS AS P
					INNER JOIN
						USUARIO AS U
					ON
						P.ID_USER = U.ID";
		}else{
			$query = "SELECT
						P.ID AS ID,
						U.NOME AS NOME,
						P.DESCRICAO AS DESCRICAO,
						to_char(P.DETERMINADO, 'DD/MM/YYYY') AS DETERMINADO,
						P.FEITO AS FEITO,
						(P.DETERMINADO <= NOW()) as situacao
					FROM
						PROJETOS AS P
					INNER JOIN
						USUARIO AS U
					ON
						P.ID_USER = U.ID
					WHERE
						U.ID = " . $id;
		}

		$stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute();
		$user = $stmt->fetchAll();
		foreach ($user as $key) {
			$cor = ($key['feito'] == 'SIM') ? 'verde' : situacaoCor($key['situacao']);
			$html .= "
			<tr>
				<td>". $key['nome'] ."</td>
				<td title='". $key['descricao'] ."' class='big-text'>". $key['descricao'] ."</td>
				<td class='text-center'>". $key['determinado'] ."</td>
				<td id='btn-feito' class='text-center ". $cor ."'>". $key['feito'] ."</td>
				<td id='id' class='text-center none'>". $key['id'] ."</td>
			</tr>";

		}

		$retorno = array(
					'retorno'		=>	$html,
					'acesso'		=>	$acessos
		);

	}catch(Exception $e){
			$retorno = array(
						'retorno'		=>	'N'
			);
	}

	echo json_encode($retorno);
?>
