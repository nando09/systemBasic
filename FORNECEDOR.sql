CREATE TABLE FORNECEDOR(
	ID SERIAL NOT NULL,
	NRO NUMERIC,
	DATA_ULTIMA_COMPRA DATE,
	NOME VARCHAR(30) NOT NULL,
	EMPRESA VARCHAR(30),
	CNPJ NUMERIC,
	LOCALIDADE VARCHAR(255),
	EMAIL VARCHAR(50),
	TELEFONE NUMERIC,
	PRIMARY KEY(ID)
);
DROP TABLE FORNECEDOR;

SELECT * FROM FORNECEDOR;

INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Andeson', 'Valter', 38239284350, 'Ibira', 'empre@mouse.com.br', 993283053, NOW());
INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Caio', 'Taxi 99', 92045502932, 'Puera', 'dedo@computador.com.br', 293498022, NOW());
INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Roberto', 'Emgrenharia', 23420102931, 'Santo andre', 'rismo@note.com.br', 983923934, NOW());
INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Emilio', 'EuAqui', 98433571095, 'Teste', 'faci@taxi.com.br', 982349244, NOW());
INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Emanuel', 'Tempo', 93849917948, 'Alda', 'lidade@merce.com.br', 983499221, NOW());

SELECT * FROM FORNECEDOR WHERE ID = 16


ALTER TABLE FORNECEDOR DROP COLUMN TELEFONE
ALTER TABLE FORNECEDOR ALTER COLUMN TELEFONE TYPE VARCHAR(15);

ALTER TABLE FORNECEDOR ALTER COLUMN CNPJ TYPE VARCHAR(18);

ALTER TABLE FORNECEDOR ADD COLUMN CEP VARCHAR(9);

UPDATE FORNECEDOR SET LOCALIDADE = ''
