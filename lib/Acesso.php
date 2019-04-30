<?php

namespace lib;

class Acesso{
	private $acesso = false;
	private $acessos = null;
	private $arrays = array();
	private $usuarios;
	private $projetos;
	private $relatorios;
	private $mensagens;
	private $fornecedores;

	public function acesso($pagina){
		// $pagina É o arquivo atal que o usuario esta acessando

		if ($pagina == 'Perfil' || $pagina == 'Servicos') {
			$this->acesso = in_array('1', $this->arrays) ? true : in_array('0', $this->arrays) ? true : false;
		}else if ($pagina == 'Mensagem') {
			$this->acesso = in_array('4', $this->arrays) ? true : in_array('0', $this->arrays) ? true : false;
		}else if ($pagina == 'Fornecedores' || $pagina == 'Clientes' || $pagina == 'Produtos') {
			$this->acesso = in_array('5', $this->arrays) ? true : in_array('0', $this->arrays) ? true : false;
		}else{
			// Liberado
			$this->acesso = true;
		}

		// // exit();

		// if ($this->acessos == '0' || $this->acessos == null) {
		// 	$this->acesso = true;
		// }

		return $this->acesso;
	}

	public function setTipos(){
		$this->acessos = $_SESSION['acessos'] ?? '0';
		$this->arrays = explode("/", $this->acessos);

		// print_r($this->arrays);
		// exit();
	}
}

// Usuarios			1		=>	Perfil, Servicos
// Projetos			2		=>	Projetos
// Relatorios		3		=>	Click, relatorios
// Mensagens		4		=>	Mensagem
// Fornecedores		5		=>	Fornecedores, CLientes, Produtos
