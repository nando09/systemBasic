﻿CREATE TABLE CLIENTE(
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
DROP TABLE cliente;

INSERT INTO CLIENTE (NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('FERNANDO', 'FBO', 1234567890, 'DIADEMA', 'nando@live.com', 132321, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Calegari', 'ZF Sachs', 123456, 'Diadema', 'zf@sachs.com.br', 940445, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Vazão', 'VEC Suporte',43292349234, 'Serraria', 'suporte@android.com.br',283498243, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Andeson', 'Valter', 38239284350, 'Ibira', 'empre@mouse.com.br', 993283053, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Caio', 'Taxi 99', 92045502932, 'Puera', 'dedo@computador.com.br', 293498022, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Roberto', 'Emgrenharia', 23420102931, 'Santo andre', 'rismo@note.com.br', 983923934, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Emilio', 'Eu aqui estou', 98433571095, 'Teste', 'faci@taxi.com.br', 982349244, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Emanuel', 'Tempo', 93849917948, 'Alda', 'lidade@merce.com.br', 983499221, NOW());

SELECT * FROM CLIENTE
SELECT * FROM CLIENTE WHERE ID = 16
DELETE FROM CLIENTE WHERE ID = 4

ALTER TABLE CLIENTE DROP COLUMN TELEFONE

ALTER TABLE CLIENTE ALTER COLUMN TELEFONE TYPE varchar(15);
ALTER TABLE FORNECEDOR ALTER COLUMN TELEFONE TYPE varchar(15);

ALTER TABLE CLIENTE ALTER COLUMN CNPJ TYPE varchar(18);
ALTER TABLE CLIENTE ADD COLUMN CEP varchar(9);

ALTER TABLE `CLIENTE` CHANGE `TELEFONE` `TELEFONE` VARCHAR(15) NULL DEFAULT NULL;

UPDATE CLIENTE SET LOCALIDADE = ''
