CREATE TABLE DETALHE_PEDIDO(
	ID SERIAL NOT NULL,
	ID_CLIENTE INT NOT NULL,
	VALOR DECIMAL(10,2) NOT NULL,
	TEMPO DATE,
	VENCIMENTO DATE,
	STATUS ESCOLHA,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_CLIENTE) REFERENCES CLIENTE(ID) ON DELETE CASCADE
);
DROP TABLE DETALHE_PEDIDO;

CREATE TABLE DETALHE_FORNECEDOR(
	ID SERIAL NOT NULL,
	ID_CLIENTE INT NOT NULL,
	VALOR DECIMAL(10,2) NOT NULL,
	TEMPO DATE,
	VENCIMENTO DATE,
	STATUS ESCOLHA,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_CLIENTE) REFERENCES CLIENTE(ID) ON DELETE CASCADE
);
DROP TABLE DETALHE_FORNECEDOR;

SELECT * FROM DETALHE_PEDIDO;
SELECT * FROM DETALHE_FORNECEDOR;

CREATE TYPE ENTREGA AS ENUM('SIM', 'NAO');
DROP TYPE ENTREGA

ALTER TABLE DETALHE_PEDIDO
ADD COLUMN ENTREGUE ENTREGA NOT NULL DEFAULT 'NAO';
ALTER TABLE DETALHE_FORNECEDOR
ADD COLUMN ENTREGUE ENTREGA NOT NULL DEFAULT 'NAO';

TRUNCATE DETALHE_FORNECEDOR;
TRUNCATE DETALHE_PEDIDO;

ALTER TABLE DETALHE_FORNECEDOR
ADD COLUMN PRODUTOS VARCHAR(100) NOT NULL;
ALTER TABLE DETALHE_PEDIDO
ADD COLUMN PRODUTOS VARCHAR(100) NOT NULL;
/* DELETANDO A TABELA */
ALTER TABLE DETALHE_FORNECEDOR DROP PRODUTOS;
ALTER TABLE DETALHE_PEDIDO DROP PRODUTOS;

UPDATE DETALHE_PEDIDO SET STATUS = 'PAGO' WHERE ID_CLIENTE = '11'
UPDATE DETALHE_FORNECEDOR SET STATUS = 'PAGO' WHERE ID_CLIENTE = '11'
