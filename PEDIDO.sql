﻿CREATE TABLE PRODUTO(
	ID SERIAL NOT NULL,
	NRO VARCHAR(40),
	NOME VARCHAR(30) NOT NULL,
	ID_CATEGORIA INT,
	VALOR DECIMAL(10,2),
	DESCRICAO VARCHAR(255),
	MINIMO INT,
	QUANTIDADE INT NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_CATEGORIA) REFERENCES CATEGORIA(ID) ON DELETE CASCADE
);

CREATE TABLE CLIENTE(
	ID SERIAL NOT NULL,
	DATA_ULTIMA_COMPRA DATE NOT NULL,
	NOME VARCHAR(30) NOT NULL,
	EMPRESA VARCHAR(30),
	CNPJ NUMERIC,
	LOCALIDADE VARCHAR(255),
	EMAIL VARCHAR(50),
	TELEFONE NUMERIC,
	PRIMARY KEY(ID)
);

CREATE TABLE FORNECEDOR(
	ID SERIAL NOT NULL,
	DATA_ULTIMA_COMPRA DATE NOT NULL,
	NOME VARCHAR(30) NOT NULL,
	EMPRESA VARCHAR(30),
	CNPJ NUMERIC,
	LOCALIDADE VARCHAR(255),
	EMAIL VARCHAR(50),
	TELEFONE NUMERIC,
	PRIMARY KEY(ID)
);

CREATE TABLE DETALHE_PEDIDO(
	ID SERIAL NOT NULL,
	ID_CLIENTE INT NOT NULL,
	VALOR DECIMAL(10,2) NOT NULL,
	DATA_COMPRA DATE NOT NULL,
	VENCIMENTO DATE,
	STATUS ESCOLHA NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_CLIENTE) REFERENCES CLIENTE(ID) ON DELETE CASCADE
);

CREATE TABLE DETALHE_FORNECEDOR(
	ID SERIAL NOT NULL,
	ID_FORNECEDOR INT NOT NULL,
	VALOR DECIMAL(10,2) NOT NULL,
	DATA_COMPRA DATE NOT NULL,
	VENCIMENTO DATE,
	STATUS ESCOLHA NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_FORNECEDOR) REFERENCES FORNECEDOR(ID) ON DELETE CASCADE
);

CREATE TABLE FORNECENDO(
	ID SERIAL NOT NULL,
	ID_PRODUTO INT NOT NULL,
	ID_FORNECEDOR INT NOT NULL,
	QUANTIDADE INT NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_FORNECEDOR) REFERENCES FORNECEDOR(ID) ON DELETE CASCADE,
	FOREIGN KEY(ID_PRODUTO) REFERENCES PRODUTO(ID) ON DELETE CASCADE
);

CREATE TABLE PEDINDO(
	ID SERIAL NOT NULL,
	ID_PRODUTO INT NOT NULL,
	ID_CLIENTE INT NOT NULL,
	QUANTIDADE INT NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_CLIENTE) REFERENCES CLIENTE(ID) ON DELETE CASCADE,
	FOREIGN KEY(ID_PRODUTO) REFERENCES PRODUTO(ID) ON DELETE CASCADE
);

INSERT INTO PEDINDO (ID_PRODUTO, ID_CLIENTE, QUANTIDADE) VALUES (2, 2, 3);
INSERT INTO PEDINDO (ID_PRODUTO, ID_CLIENTE, QUANTIDADE) VALUES (7, 1, 1);

SELECT P.ID, PR.NOME, C.EMPRESA, PR.VALOR, P.QUANTIDADE, (PR.VALOR * P.QUANTIDADE) AS VALOR FROM PEDINDO AS P 
INNER JOIN PRODUTO AS PR ON P.ID_PRODUTO = PR.ID
INNER JOIN CLIENTE C ON P.ID_CLIENTE = C.ID

DROP TABLE PEDINDO;
DROP TABLE FORNECENDO;
DROP TABLE DETALHE_FORNECEDOR;
DROP TABLE DETALHE_PEDIDO;
DROP TABLE FORNECEDOR;
DROP TABLE CLIENTE;
DROP TABLE PRODUTO;

SELECT * FROM PEDINDO;
SELECT * FROM FORNECENDO;
SELECT * FROM DETALHE_FORNECEDOR;
SELECT * FROM DETALHE_PEDIDO;
SELECT * FROM FORNECEDOR;
SELECT * FROM CLIENTE;
SELECT * FROM PRODUTO;

SELECT SUM(P.VALOR) AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE PE.ID_CLIENTE = 1
SELECT SUM(P.VALOR) AS VALOR FROM FORNECENDO AS F INNER JOIN PRODUTO AS P ON P.ID = F.ID_PRODUTO WHERE F.ID_FORNECEDOR = 1
SELECT P.VALOR AS VALOR, PE.QUANTIDADE FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE PE.ID_CLIENTE = 1
SELECT P.VALOR AS VALOR FROM FORNECENDO AS F INNER JOIN PRODUTO AS P ON P.ID = F.ID_PRODUTO WHERE F.ID_FORNECEDOR = 1

SELECT * FROM PEDINDO WHERE ID_CLIENTE = 1;
SELECT P.VALOR AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE ID_CLIENTE = 1;
SELECT SUM(P.VALOR) AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE ID_CLIENTE = 1;

SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao, 
(SELECT QUANTIDADE FROM PEDINDO AS pe WHERE pe.ID_CLIENTE = 1 AND p.ID = pe.ID_PRODUTO) as tem
FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id

SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao, 
(SELECT QUANTIDADE FROM FORNECENDO AS f WHERE f.ID_FORNECEDOR = 1 AND p.ID = f.ID_FORNECEDOR) as tem
FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id


SELECT COUNT(*) AS NUMERO FROM PEDINDO WHERE ID_CLIENTE = 1
SELECT COUNT(*) AS NUMERO FROM FORNECENDO WHERE ID_FORNECEDOR = 1

SELECT P.NOME AS PRODUTO, C.EMPRESA AS EMPRESA, PE.QUANTIDADE FROM PEDINDO AS PE
INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO
INNER JOIN CLIENTE AS C ON C.ID = PE.ID_CLIENTE
WHERE ID_CLIENTE = 1

TRUNCATE PEDINDO;
TRUNCATE FORNECENDO;
TRUNCATE DETALHE_FORNECEDOR;
TRUNCATE DETALHE_PEDIDO;
TRUNCATE FORNECEDOR CASCADE;
TRUNCATE CLIENTE CASCADE;
TRUNCATE PRODUTO;

INSERT INTO DETALHE_PEDIDO (ID_CLIENTE, VALOR, DATA_COMPRA, VENCIMENTO, STATUS) VALUES ( 1, 220.59, NOW(), '2019-02-25', 'PENDENTE')

SELECT D.ID AS ID, F.EMPRESA AS EMPRESA, D.VALOR AS VALOR, F.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS AS STATUS FROM DETALHE_FORNECEDOR AS D INNER JOIN FORNECEDOR AS F ON D.ID_FORNECEDOR = F.ID
SELECT D.ID AS ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, C.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS AS STATUS FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID
SELECT P.NOME AS PRODUTO, SUM(PE.QUANTIDADE) AS QUANTIDADE FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO GROUP BY P.NOME 

SELECT P.ID AS ID, PR.NOME AS NOME, PR.VALOR AS VALOR, PR.DESCRICAO AS DESCRICAO, P.QUANTIDADE AS TEM FROM PEDINDO AS P INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO WHERE P.ID_CLIENTE = 9;
SELECT F.ID AS ID, PR.NOME AS NOME, PR.VALOR AS VALOR, PR.DESCRICAO AS DESCRICAO, F.QUANTIDADE AS TEM FROM FORNECENDO AS F INNER JOIN PRODUTO AS PR ON PR.ID = F.ID_PRODUTO WHERE F.ID_FORNECEDOR = 6;

SELECT P.NOME AS PRODUTO, SUM(PE.QUANTIDADE) AS QUANTIDADE FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO GROUP BY P.NOME

SELECT P.NOME AS PRODUTO, SUM(PE.QUANTIDADE) AS QUANTIDADE FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO GROUP BY P.NOME ORDER BY SUM(PE.QUANTIDADE) LIMIT 5

