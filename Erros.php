<!--
	Ao clicar em editar na tag td, o produto entrar em modo edição. Porem não vem com as informações adequadas. Rever!
	[FEITO]		Produto
				Clientes
				Fornecedores
				Pedidos

	Mudar os elementos todos para padrõ PDO.php




	************* TABELAS *************
	Tabales clientes e fornecedores estão errados
		Cliente/Fornecedor vai ser
			ID SERIAL NOT NULL,
			NRO NUMERIC,
			NOME VARCHAR(30) NOT NULL,
			EMPRESA VARCHAR(30),
			CNPJ NUMERIC,
			LOCALIDADE VARCHAR(255),
			EMAIL VARCHAR(50),
			TELEFONE NUMERIC,
			PRIMARY KEY(ID)
			DATA_ULTIMA_COMPRA DATE,

		Pedidos
			ID SERIAL NOT NULL,
			ID_CLIENTE INT NOT NULL,
			VALOR DECIMAL(10,2) NOT NULL,
			TEMPO DATE,
			VENCIMENTO DATE,
			STATUS ESCOLHA,

			PRIMARY KEY(ID),
			FOREIGN KEY(ID_CLIENTE) REFERENCES CLIENTE(ID) ON DELETE CASCADE




