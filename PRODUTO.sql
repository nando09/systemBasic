﻿CREATE TABLE CATEGORIA(
	ID SERIAL NOT NULL,
	NOME VARCHAR(20),

	PRIMARY KEY(ID)
);

CREATE TABLE PRODUTO(
	ID SERIAL NOT NULL,
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
drop table cliente;

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
select * from fornecedor
drop table fornecedor;

SELECT C.NOME AS CLIENTE, D.VALOR AS VALOR, D.TEMPO AS TEMPO FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON C.ID = D.ID_CLIENTE
SELECT ID, EMPRESA FROM CLIENTE

SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor AS valor, p.descricao AS descricao, p.minimo AS minimo, p.quantidade AS quantidade FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id WHERE p.ID = 1

CREATE TYPE ESCOLHA AS ENUM('PAGO', 'PENDENTE', 'ATRASO', 'SEM COMPRAS');
DROP TYPE ESCOLHA

select * from cliente;
select * from DETALHE_PEDIDO;

SELECT C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, D.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS as STATUS, D.VENCIMENTO, D.TEMPO FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID


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

INSERT INTO DETALHE_PEDIDO (ID_CLIENTE, VALOR, STATUS, DATA_ULTIMA_COMPRA) VALUES ()

drop table detalhe_pedido

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

CREATE TABLE FORNECENDOR(
	ID SERIAL NOT NULL,
	ID_PRODUTO INT NOT NULL,
	ID_PEDIDO INT NOT NULL,
	VALOR DECIMAL(10,2) NOT NULL,
	QUANTIDADE INT NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_PRODUTO) REFERENCES PRODUTO(ID) ON DELETE CASCADE,
	FOREIGN KEY(ID_PEDIDO) REFERENCES DETALHE_PEDIDO(ID) ON DELETE CASCADE
);

CREATE TABLE PEDINDO(
	ID SERIAL NOT NULL,
	ID_PRODUTO INT NOT NULL,
	ID_PEDIDO INT NOT NULL,
	VALOR DECIMAL(10,2) NOT NULL,
	QUANTIDADE INT NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_PRODUTO) REFERENCES PRODUTO(ID) ON DELETE CASCADE,
	FOREIGN KEY(ID_PEDIDO) REFERENCES DETALHE_PEDIDO(ID) ON DELETE CASCADE
);

CREATE TYPE PLANOS AS ENUM('BÁSICO', 'INTERMEDIÁRIO', 'AVANÇADO', 'MODIFICADO');

CREATE TABLE USUARIO(
	ID SERIAL NOT NULL,
	NOME VARCHAR(50) NOT NULL,
	EMAIL VARCHAR(50) NOT NULL,
	USUARIO VARCHAR(40) NOT NULL,
	SENHA VARCHAR(40) NOT NULL,
	ENDERECO VARCHAR(255),
	FANTASIA VARCHAR(60),
	TIPO INT NOT NULL,
	VALOR DECIMAL(10,2) NOT NULL,
	PLANO PLANOS NOT NULL,

	PRIMARY KEY(ID)
);

DROP TABLE USUARIO;

SELECT * FROM USUARIO;
DELETE FROM USUARIO WHERE id = 13;
UPDATE usuario SET nome = 'João',usuario = 'Joção', senha = MD5('joão') WHERE id = 12;
UPDATE usuario SET nome = 'Filipinas',usuario = 'Doidão', senha = MD5('açucar') WHERE id = 10;

DELETE FROM USUARIO WHERE id = 5;

SELECT NOME,USUARIO,SENHA FROM USUARIO WHERE USUARIO = 'nando' AND SENHA = MD5('123321');


INSERT INTO USUARIO (NOME, EMAIL, USUARIO, SENHA, ENDERECO, FANTASIA, TIPO, VALOR, PLANO) VALUES ('Fernando', 'fernando@nando.com', 'nando', MD5('123321'));
INSERT INTO USUARIO (NOME, EMAIL, USUARIO, SENHA, ENDERECO, FANTASIA, TIPO, VALOR, PLANO) VALUES ('Jaqueline', 'jaque', MD5('jaque'));
INSERT INTO USUARIO (NOME, EMAIL, USUARIO, SENHA, ENDERECO, FANTASIA, TIPO, VALOR, PLANO) VALUES ('Mel', 'mel', MD5('mel'));
INSERT INTO USUARIO (NOME, EMAIL, USUARIO, SENHA, ENDERECO, FANTASIA, TIPO, VALOR, PLANO) VALUES ('Livro', 'livro', MD5('livro'));
INSERT INTO USUARIO (NOME, EMAIL, USUARIO, SENHA, ENDERECO, FANTASIA, TIPO, VALOR, PLANO) VALUES ('Teste', 'teste', MD5('teste'));
INSERT INTO USUARIO (NOME, EMAIL, USUARIO, SENHA, ENDERECO, FANTASIA, TIPO, VALOR, PLANO) VALUES ('Lindinalva', 'Lindi', MD5('nalva'));


INSERT INTO USUARIO (NOME, USUARIO, SENHA) VALUES ('Fernando', 'nando', MD5('123321'));
INSERT INTO USUARIO (NOME, USUARIO, SENHA) VALUES ('Jaqueline', 'jaque', MD5('jaque'));
INSERT INTO USUARIO (NOME, USUARIO, SENHA) VALUES ('Mel', 'mel', MD5('mel'));
INSERT INTO USUARIO (NOME, USUARIO, SENHA) VALUES ('Livro', 'livro', MD5('livro'));
INSERT INTO USUARIO (NOME, USUARIO, SENHA) VALUES ('Teste', 'teste', MD5('teste'));
INSERT INTO USUARIO (NOME, USUARIO, SENHA) VALUES ('Lindinalva', 'Lindi', MD5('nalva'));

INSERT INTO (NOME, ID_CATEGORIA, VALOR, DESCRICAO, MINIMO, QUANTIDADE) VALUES ();
SELECT D.ID AS ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, C.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS AS STATUS FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID

INSERT INTO CATEGORIA (NOME) VALUES ('TUBO');
INSERT INTO CATEGORIA (NOME) VALUES ('LIXEIRA');
INSERT INTO CATEGORIA (NOME) VALUES ('SUPORTE');
INSERT INTO CATEGORIA (NOME) VALUES ('AVIAMENTO');
INSERT INTO CATEGORIA (NOME) VALUES ('ELETRONICO');
INSERT INTO CATEGORIA (NOME) VALUES ('MOVEIS');

SELECT * FROM CATEGORIA;
SELECT * FROM PRODUTO;
SELECT * FROM USUARIO;

INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,MINIMO,QUANTIDADE) VALUES ('PC', 5, 2200.99, 'DELL TESTE, I7, 2T, 16GB', 100, 80);
INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,MINIMO,QUANTIDADE) VALUES ('FERRO', 5, 122.99, 'FERRO FERE QUALQUER UM', 10, 2);
INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,MINIMO,QUANTIDADE) VALUES ('NOTEBOOK', 5, 2200.99, 'VAIO C14, I5, 1T, 8GB', 10, 100);
INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,MINIMO,QUANTIDADE) VALUES ('CAMA', 6, 1000.00, 'CAMA BOX COM COLCHÃO E CABECEIRA', 5, 34);
INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,MINIMO,QUANTIDADE) VALUES ('CANO', 1, 10, 'CANO PVC PARA ESGOTO', 30, 100);
INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,MINIMO,QUANTIDADE) VALUES ('LIXEIRA', 2, 200.59, 'LIXEIRA COM PÉ PARA ALTARA', 4, 23);
INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,MINIMO,QUANTIDADE) VALUES ('TECIDO', 4, 20, 'TECIDO FINO CARA DE RICA', 10, 200);
INSERT INTO PRODUTO (NOME,ID_CATEGORIA,VALOR,DESCRICAO,MINIMO,QUANTIDADE) VALUES ('CELULAR', 5, 2000, 'CELULAR TOP DE LINHA', 10, 30);

SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao, p.minimo as minimo, p.quantidade as quantidade FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id

UPDATE PRODUTO SET NOME = 'TESTE', ID_CATEGORIA = '4', VALOR = 1234, DESCRICAO = 'TESTE LOUCO', MINIMO = 10, QUANTIDADE = 300 WHERE ID = 2380

DELETE FROM PRODUTO WHERE ID = 2369

SELECT COUNT(*) FROM PRODUTO
SELECT * FROM PRODUTO
SELECT * FROM CATEGORIA
SELECT ID FROM PRODUTO

SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id WHERE p.nome = 'TECLADO' and c.id = 5 and p.valor = 100
SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id WHERE p.nome = 'MOUSE' and c.id = 5 and p.valor = 200

SELECT ID, NOME FROM categoria

delete from PRODUTO;
alter table PRODUTO AUTO_INCREMENT = 1;
SELECT * FROM CLIENTE
DELETE FROM CLIENTE WHERE ID = 4

INSERT INTO CLIENTE (NOME, EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('FERNANDO', 'FBO', 1234567890, 'DIADEMA', 'nando@live.com', 132321, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Calegari', 'ZF Sachs', 123456, 'Diadema', 'zf@sachs.com.br', 940445, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Vazão', 'VEC Suporte',43292349234, 'Serraria', 'suporte@android.com.br',283498243, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Andeson', 'Valter', 38239284350, 'Ibira', 'empre@mouse.com.br', 993283053, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Caio', 'Taxi 99', 92045502932, 'Puera', 'dedo@computador.com.br', 293498022, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Roberto', 'Emgrenharia', 23420102931, 'Santo andre', 'rismo@note.com.br', 983923934, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Emilio', 'Eu aqui estou', 98433571095, 'Teste', 'faci@taxi.com.br', 982349244, NOW());
INSERT INTO CLIENTE (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Emanuel', 'Tempo', 93849917948, 'Alda', 'lidade@merce.com.br', 983499221, NOW());


DROP TABLE USUARIO;
DROP TABLE CATEGORIA;
DROP TABLE PRODUTO;
DROP TABLE CLIENTE;
DROP TABLE FORNECEDOR;
DROP TABLE DETALHE_PEDIDO;
DROP TABLE DETALHE_FORNECEDOR;
DROP TABLE FORNECENDOR;
DROP TABLE PEDINDO;

SELECT ID, NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE FROM CLIENTE
SELECT * FROM FORNECEDOR
SELECT * FROM USUARIO

INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Andeson', 'Valter', 38239284350, 'Ibira', 'empre@mouse.com.br', 993283053, NOW());
INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Caio', 'Taxi 99', 92045502932, 'Puera', 'dedo@computador.com.br', 293498022, NOW());
INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Roberto', 'Emgrenharia', 23420102931, 'Santo andre', 'rismo@note.com.br', 983923934, NOW());
INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Emilio', 'EuAqui', 98433571095, 'Teste', 'faci@taxi.com.br', 982349244, NOW());
INSERT INTO FORNECEDOR (NOME ,EMPRESA, CNPJ, LOCALIDADE, EMAIL, TELEFONE, DATA_ULTIMA_COMPRA) VALUES ('Emanuel', 'Tempo', 93849917948, 'Alda', 'lidade@merce.com.br', 983499221, NOW());


SELECT COUNT(*) as NUMERO FROM PEDINDO WHERE ID_CLIENTE = 1

SELECT SUM(P.VALOR * PE.QUANTIDADE) AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE PE.ID_CLIENTE = 1
SELECT COUNT(*) as NUMERO, SUM(P.VALOR * PE.QUANTIDADE) AS VALOR FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO WHERE PE.ID_CLIENTE = 4

SELECT * FROM DETALHE_PEDIDO;
SELECT * FROM DETALHE_FORNECEDOR;


SELECT D.ID AS ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, C.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS AS STATUS FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID

SELECT D.ID as ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, C.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS as STATUS, D.VENCIMENTO as VENCIMENTO FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID WHERE D.ID = 1

SELECT D.ID AS ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, C.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS AS STATUS FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID
SELECT D.ID as ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, D.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS as STATUS, D.VENCIMENTO as VENCIMENTO, D.TEMPO AS TEMPO FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID WHERE D.ID = 1

SELECT D.ID AS ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, C.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS AS STATUS FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID WHERE D.ID = 3
SELECT D.ID AS ID, C.EMPRESA AS EMPRESA, D.VALOR AS VALOR, C.DATA_ULTIMA_COMPRA AS ULTIMA, D.VENCIMENTO as VENCIMENTO, D.STATUS AS STATUS FROM DETALHE_PEDIDO AS D INNER JOIN CLIENTE AS C ON D.ID_CLIENTE = C.ID WHERE D.ID = 3

SELECT ID_PRODUTO AS PRODUTO, SUM(QUANTIDADE) AS QUANTIDADE FROM PEDINDO GROUP BY ID_PRODUTO
SELECT P.NOME AS PRODUTO, SUM(PE.QUANTIDADE) AS QUANTIDADE FROM PEDINDO AS PE INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO GROUP BY P.NOME
SELECT * FROM PEDINDO


select * from pedindo
truncate detalhe_fornecedor

SELECT PE.QUANTIDADE FROM PEDINDO AS pe, PRODUTO AS p WHERE pe.ID_CLIENTE = 2 AND p.ID = pe.ID_PRODUTO
SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao, 
							(SELECT pe.QUANTIDADE FROM PEDINDO AS pe WHERE pe.ID_CLIENTE = 2 AND p.ID = pe.ID_PRODUTO) as tem
								FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id

SELECT D.ID AS ID, D.ID_FORNECEDOR AS ID_FORNECEDOR, F.EMPRESA AS EMPRESA, D.VALOR AS VALOR, F.DATA_ULTIMA_COMPRA AS ULTIMA, D.STATUS AS STATUS FROM DETALHE_FORNECEDOR AS D INNER JOIN FORNECEDOR AS F ON D.ID_FORNECEDOR = F.ID


SELECT * FROM DETALHE_PEDIDO
SELECT * FROM PEDINDO
SELECT * FROM PRODUTO

SELECT D.VENCIMENTO AS VENCIMENTO, P.QUANTIDADE AS QUANTIDADE FROM PEDINDO AS P
INNER JOIN DETALHE_PEDIDO AS D ON D.ID_CLIENTE = P.ID_CLIENTE
GROUP BY VENCIMENTO

SELECT extract(MONTH from D.VENCIMENTO) AS VENCIMENTO, SUM(P.QUANTIDADE) AS QUANTIDADE FROM DETALHE_PEDIDO AS D
INNER JOIN PEDINDO AS P ON D.ID_CLIENTE = P.ID_CLIENTE
INNER JOIN PRODUTO AS PR ON P.ID_PRODUTO = PR.ID
GROUP BY VENCIMENTO


SELECT extract(MONTH from D.VENCIMENTO) AS VENCIMENTO, SUM(P.QUANTIDADE) AS QUANTIDADE FROM DETALHE_PEDIDO AS D
INNER JOIN PEDINDO AS P ON D.ID_CLIENTE = P.ID_CLIENTE
INNER JOIN PRODUTO AS PR ON P.ID_PRODUTO = PR.ID
WHERE EXTRACT(YEAR FROM D.VENCIMENTO) = 2019
GROUP BY extract(MONTH from D.VENCIMENTO)
ORDER BY VENCIMENTO

SELECT P.NOME, SUM(PE.QUANTIDADE) FROM PRODUTO AS P INNER JOIN PEDINDO AS PE ON PE.ID_PRODUTO = P.ID
GROUP BY P.NOME

select * from pedindo

SELECT SUM(pe.quantidade * p.valor) AS LUCRO, p.NOME as NOME FROM PRODUTO AS p
INNER JOIN pedindo AS pe ON pe.id_produto = p.id
GROUP BY NOME

SELECT
	SUM(pe.quantidade * p.valor) AS LUCRO ,p.nro AS NRO, p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor AS valor,
	p.descricao AS descricao, p.minimo AS minimo, p.quantidade AS quantidade
FROM PRODUTO AS p
INNER JOIN categoria AS c ON p.id_categoria = c.id
INNER JOIN pedindo AS pe ON pe.id_produto = p.id
WHERE p.ID = 1
GROUP BY NRO

SELECT extract(MONTH from D.VENCIMENTO) AS VENCIMENTO, SUM(P.QUANTIDADE) AS QUANTIDADE FROM DETALHE_PEDIDO AS D
								INNER JOIN PEDINDO AS P ON D.ID_CLIENTE = P.ID_CLIENTE
								INNER JOIN PRODUTO AS PR ON P.ID_PRODUTO = PR.ID
								WHERE EXTRACT(YEAR FROM D.VENCIMENTO) = 2019
								GROUP BY extract(MONTH from D.VENCIMENTO)
								ORDER BY VENCIMENTO



SELECT 
	p.id AS ID,
	SUM(P.VALOR * PE.QUANTIDADE) AS LUCRO,
	SUM(PE.QUANTIDADE) AS VENDIDO,
	p.nro AS NRO,
	p.nome as NOME,
	c.nome AS categoria, p.valor AS valor,
	p.descricao AS descricao, p.minimo AS minimo,
	p.quantidade AS quantidade FROM PRODUTO AS p
INNER JOIN categoria AS c ON p.id_categoria = c.id
INNER JOIN pedindo AS PE ON PE.ID_PRODUTO = P.ID 
WHERE p.ID = 1
GROUP BY P.ID, NRO, C.NOME, CATEGORIA, VALOR, DESCRICAO, MINIMO, P.QUANTIDADE

SELECT *, P.QUANTIDADE FROM produto as p INNER JOIN pedindo AS PE ON PE.ID_PRODUTO = P.ID 
WHERE p.ID = 1

SELECT SUM(PR.VALOR * P.QUANTIDADE) AS VALOR, PR.NOME, SUM(P.QUANTIDADE) FROM PEDINDO AS P
INNER JOIN PRODUTO AS PR ON P.ID_PRODUTO = PR.ID
WHERE PR.ID = 1
GROUP BY PR.NOME

SELECT * FROM CLIENTE AS C

SELECT C.EMPRESA, C.EMAIL, C.TELEFONE FROM CLIENTE AS C

SELECT C.EMPRESA AS EMPRESA, C.EMAIL AS EMAIL, C.TELEFONE AS TELEFONE FROM PEDINDO AS P
	INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
	INNER JOIN CLIENTE AS C ON P.ID_CLIENTE = C.ID
	WHERE PR.ID = 1


SELECT C.EMPRESA AS EMPRESA, C.EMAIL AS EMAIL, C.TELEFONE AS TELEFONE FROM FORNECENDO AS P
				INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
				INNER JOIN FORNECEDOR AS C ON P.ID_FORNECEDOR = C.ID
				WHERE PR.ID = 5

select * from fornecendo


SELECT C.EMPRESA AS EMPRESA, C.EMAIL AS EMAIL, C.TELEFONE AS TELEFONE FROM CLIENTE AS C
								INNER JOIN PEDINDO AS P ON C.ID = P.ID_CLIENTE
								INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
								WHERE PR.ID =  1

SELECT p.id AS ID, SUM(P.VALOR * PE.QUANTIDADE) AS LUCRO, SUM(PE.QUANTIDADE) AS VENDIDO, p.nro AS NRO, c.nome AS categoria, p.valor AS valor,	p.descricao AS descricao, p.minimo AS minimo, p.quantidade AS quantidade FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id INNER JOIN pedindo AS PE ON PE.ID_PRODUTO = P.ID WHERE p.ID = 1 GROUP BY P.ID, NRO, C.NOME, CATEGORIA, VALOR, DESCRICAO, MINIMO, P.QUANTIDADE



SELECT
	C.NOME AS PRODUTO, SUM(PE.QUANTIDADE) AS QUANTIDADE
FROM PEDINDO AS PE
INNER JOIN CLIENTE AS C ON C.ID = PE.ID_PRODUTO
GROUP BY C.NOME  ORDER BY SUM(PE.QUANTIDADE) DESC LIMIT 5

SELECT * FROM PEDINDO WHERE ID_CLIENTE = 5
SELECT * FROM CLIENTE

SELECT SUM(P.QUANTIDADE * PR.VALOR) AS VALOR, SUM(P.QUANTIDADE) AS QUANTIDADE, C.ID, C.DATA_ULTIMA_COMPRA, C.NOME, C.EMPRESA, C.CNPJ, C.LOCALIDADE, C.EMAIL, C.TELEFONE
FROM CLIENTE AS C
INNER JOIN PEDINDO AS P ON P.ID_CLIENTE = C.ID
INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
WHERE C.ID = 9
GROUP BY C.ID, C.DATA_ULTIMA_COMPRA, C.NOME, C.EMPRESA, C.CNPJ, C.LOCALIDADE, C.EMAIL, C.TELEFONE


SELECT SUM(P.QUANTIDADE * PR.VALOR) AS VALOR, SUM(P.QUANTIDADE) AS QUANTIDADE, C.ID AS ID, C.DATA_ULTIMA_COMPRA AS DATA_ULTIMA_COMPRA, C.NOME AS NOME, C.EMPRESA AS EMPRESA, C.CNPJ AS CNPJ, C.LOCALIDADE AS LOCALIDADE, C.EMAIL AS EMAIL, C.TELEFONE AS TELEFONE
FROM CLIENTE AS C
INNER JOIN PEDINDO AS P ON P.ID_CLIENTE = C.ID
INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
WHERE C.ID = 9
GROUP BY C.ID, C.DATA_ULTIMA_COMPRA, C.NOME, C.EMPRESA, C.CNPJ, C.LOCALIDADE, C.EMAIL, C.TELEFONE

SELECT 
	p.id AS ID,
	SUM(P.VALOR * PE.QUANTIDADE) AS LUCRO,
	SUM(PE.QUANTIDADE) AS VENDIDO,
	p.nome as NOME,
	p.nro AS NRO,
	c.nome AS categoria,
	p.valor AS valor,
	p.descricao AS descricao,
	p.minimo AS minimo,
	p.quantidade AS quantidade FROM PRODUTO AS p
INNER JOIN categoria AS c ON p.id_categoria = c.id
INNER JOIN pedindo AS PE ON PE.ID_PRODUTO = P.ID 
WHERE p.ID = 1
GROUP BY P.ID, NRO, C.NOME, CATEGORIA, VALOR, DESCRICAO, MINIMO, P.QUANTIDADE

select * from produto where id = 2


SELECT p.id AS id, p.nome AS nome, c.nome AS categoria, p.valor as valor, p.descricao as descricao FROM PRODUTO AS p INNER JOIN categoria AS c ON p.id_categoria = c.id

SELECT PR.NOME AS NOME, PR.VALOR AS VALOR FROM PEDINDO AS P
				INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
				INNER JOIN CLIENTE AS C ON P.ID_CLIENTE = C.ID
				WHERE PR.ID = 9

SELECT PR.NOME AS NOME, PR.VALOR AS VALOR FROM PEDINDO AS P
				INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
				INNER JOIN CLIENTE AS C ON P.ID_CLIENTE = C.ID
				WHERE C.ID = 9


SELECT
	SUM(P.QUANTIDADE * PR.VALOR) AS VALOR,
	SUM(P.QUANTIDADE) AS QUANTIDADE,
	C.ID AS ID,
	C.DATA_ULTIMA_COMPRA AS DATA_ULTIMA_COMPRA,
	C.NOME AS NOME,
	C.EMPRESA AS EMPRESA,
	C.CNPJ AS CNPJ,
	C.LOCALIDADE AS LOCALIDADE,
	C.EMAIL AS EMAIL,
	C.TELEFONE AS TELEFONE
FROM FORNECEDOR AS C
LEFT JOIN FORNECENDO AS P ON P.ID_FORNECEDOR = C.ID
FULL OUTER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
WHERE C.ID = 6
GROUP BY C.ID, C.DATA_ULTIMA_COMPRA, C.NOME, C.EMPRESA, C.CNPJ, C.LOCALIDADE, C.EMAIL, C.TELEFONE


SELECT
	SUM(P.QUANTIDADE * PR.VALOR) AS VALOR,
	SUM(P.QUANTIDADE) AS QUANTIDADE,
	C.ID AS ID,
	C.DATA_ULTIMA_COMPRA AS DATA_ULTIMA_COMPRA,
	C.NOME AS NOME,
	C.EMPRESA AS EMPRESA,
	C.CNPJ AS CNPJ,
	C.LOCALIDADE AS LOCALIDADE,
	C.EMAIL AS EMAIL,
	C.TELEFONE AS TELEFONE
FROM CLIENTE AS C
LEFT JOIN PEDINDO AS P ON P.ID_CLIENTE = C.ID
FULL OUTER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
WHERE C.ID = 16
GROUP BY C.ID, C.DATA_ULTIMA_COMPRA, C.NOME, C.EMPRESA, C.CNPJ, C.LOCALIDADE, C.EMAIL, C.TELEFONE

select * from cliente where id = 16
select * from FORNECEDOR where id = 16

SELECT SUM(P.QUANTIDADE) AS QUANTIDADE, C.EMPRESA FROM CLIENTE AS C FULL OUTER JOIN PEDINDO AS P ON P.ID_CLIENTE = C.ID GROUP BY C.EMPRESA, C.DATA_ULTIMA_COMPRA ORDER BY C.DATA_ULTIMA_COMPRA LIMIT 5
SELECT SUM(P.QUANTIDADE) AS QUANTIDADE, F.EMPRESA FROM FORNECEDOR AS F FULL OUTER JOIN FORNECENDO AS P ON P.ID_FORNECEDOR = F.ID GROUP BY F.EMPRESA, F.DATA_ULTIMA_COMPRA ORDER BY F.DATA_ULTIMA_COMPRA LIMIT 5
SELECT EMPRESA FROM FORNECEDOR AS C ORDER BY DATA_ULTIMA_COMPRA LIMIT 5

SELECT PR.NOME AS NOME, PR.VALOR AS VALOR FROM FORNECENDO AS P
				LEFT JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
				FULL OUTER JOIN FORNECEDOR AS C ON P.ID_FORNECEDOR = C.ID




CREATE TYPE FINALIZADO AS ENUM('SIM', 'NAO');
DROP TYPE FINALIZADO

ALTER TABLE PEDINDO
ADD COLUMN FINALIZADO FINALIZADO NOT NULL DEFAULT 'NAO';

ALTER TABLE FORNECENDO
ADD COLUMN FINALIZADO FINALIZADO NOT NULL DEFAULT 'NAO';

SELECT * FROM PEDINDO;
SELECT * FROM FORNECENDO;
SELECT * FROM DETALHE_FORNECEDOR;
SELECT * FROM DETALHE_PEDIDO;


SELECT
	COUNT(*) as NUMERO, SUM(P.VALOR * PE.QUANTIDADE) AS VALOR
FROM PEDINDO AS PE
INNER JOIN PRODUTO AS P ON P.ID = PE.ID_PRODUTO
WHERE PE.ID_CLIENTE = 1


SELECT C.NOME AS NOME, SUM(PE.QUANTIDADE) AS QUANTIDADE
								FROM PEDINDO AS PE
								INNER JOIN CLIENTE AS C ON C.ID = PE.ID_CLIENTE
								GROUP BY C.NOME  ORDER BY SUM(PE.QUANTIDADE) DESC LIMIT 5


TRUNCATE PEDINDO;
TRUNCATE FORNECENDO;
TRUNCATE DETALHE_FORNECEDOR;
TRUNCATE DETALHE_PEDIDO;



CREATE TYPE FINALIZADO AS ENUM('SIM', 'NAO');
DROP TYPE FINALIZADO
ALTER TABLE PEDINDO
ADD COLUMN FINALIZADO FINALIZADO NOT NULL DEFAULT 'NAO';
ALTER TABLE FORNECENDO
ADD COLUMN FINALIZADO FINALIZADO NOT NULL DEFAULT 'NAO';

ALTER TABLE PEDINDO
ADD COLUMN ID_DETALHE INT;
ALTER TABLE FORNECENDO
ADD COLUMN ID_DETALHE INT;

ALTER TABLE DETALHE_FORNECEDOR
ADD COLUMN PRODUTOS VARCHAR(100) NOT NULL;
ALTER TABLE DETALHE_PEDIDO
ADD COLUMN PRODUTOS VARCHAR(100) NOT NULL;
/* DELETANDO A TABELA */
ALTER TABLE DETALHE_FORNECEDOR DROP PRODUTOS;
ALTER TABLE DETALHE_PEDIDO DROP PRODUTOS;


SELECT
	SUM(P.QUANTIDADE * PR.VALOR) AS VALOR,
	SUM(P.QUANTIDADE) AS QUANTIDADE,
	C.ID AS ID,
	C.DATA_ULTIMA_COMPRA AS DATA_ULTIMA_COMPRA,
	C.NOME AS NOME,
	C.EMPRESA AS EMPRESA,
	C.CNPJ AS CNPJ,
	C.LOCALIDADE AS LOCALIDADE,
	C.EMAIL AS EMAIL,
	C.TELEFONE AS TELEFONE
FROM CLIENTE AS C
LEFT JOIN PEDINDO AS P ON P.ID_CLIENTE = C.ID
FULL OUTER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
WHERE C.ID = 10
GROUP BY C.ID, C.DATA_ULTIMA_COMPRA, C.NOME, C.EMPRESA, C.CNPJ, C.LOCALIDADE, C.EMAIL, C.TELEFONE


SELECT PR.ID, PR.NOME AS NOME, PR.VALOR AS VALOR, SUM(P.QUANTIDADE) AS QUANTIDADE, SUM(PR.VALOR * P.QUANTIDADE) AS VALOR_TOTAL FROM PEDINDO AS P
INNER JOIN PRODUTO AS PR ON PR.ID = P.ID_PRODUTO
INNER JOIN CLIENTE AS C ON P.ID_CLIENTE = C.ID
WHERE C.ID = 10
GROUP BY PR.NOME, PR.VALOR, PR.ID

select p.* from pedindo as pe INNER JOIN produto as p on pe.id_cliente = p.id 
select * from produto where id IN (7 , 1)

SELECT COUNT(*) FROM PRODUTO WHERE QUANTIDADE < MINIMO
SELECT ID FROM PRODUTO WHERE QUANTIDADE < MINIMO



SELECT
	C.ID, C.EMPRESA
FROM
	DETALHE_PEDIDO AS D 
INNER JOIN 
	CLIENTE AS C
ON
	D.ID_CLIENTE = C.ID
WHERE D.DATA_COMPRA < NOW()

SELECT * FROM DETALHE_PEDIDO


