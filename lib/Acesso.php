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
			in_array('1', $this->arrays);
		}else if ($pagina == 'Projetos') {
			in_array('2', $this->arrays);
		}else if ($pagina == 'Mensagem') {
			in_array('4', $this->arrays);
		}else if ($pagina == 'Fornecedores' || $pagina == 'Clientes' || $pagina == 'Produtos') {
			in_array('5', $this->arrays);
		}else{
			// Liberado
		}

		exit();

		// if ($this->acessos == '0' || $this->acessos == null) {
			$this->acesso = true;
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
