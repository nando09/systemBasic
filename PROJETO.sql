﻿CREATE TABLE PROJETOS(
	ID SERIAL NOT NULL,
	ID_USER INT NOT NULL,
	DESCRICAO VARCHAR(255) NOT NULL,
	DETERMINADO DATE NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY (ID_USER) REFERENCES USUARIO(ID) ON DELETE CASCADE	
);
DROP TABLE PROJETOS
SELECT P.ID AS ID, U.NOME AS NOME, P.DESCRICAO AS DESCRICAO, P.DETERMINADO AS DETERMINADO, P.FEITO AS FEITO FROM PROJETOS AS P INNER JOIN USUARIO AS U ON P.ID_USER = U.ID
SELECT * FROM PROJETOS
SELECT * FROM USUARIO
UPDATE PROJETOS SET FEITO = 'SIM' WHERE ID = 3

CREATE TYPE FEITO AS ENUM ('SIM', 'NAO')
DROP TYPE FEITO

ALTER TABLE PROJETOS ADD COLUMN FEITO FEITO DEFAULT 'NAO'
ALTER TABLE PROJETOS DROP COLUMN FEITO 

INSERT INTO PROJETOS (ID_USER, DESCRICAO, DETERMINADO) VALUES (1, 'AUMENTAR O GALPAO PARA MELHOR PRODUCAO', '2019-03-25');
INSERT INTO PROJETOS (ID_USER, DESCRICAO, DETERMINADO) VALUES (2, 'MESA MAIOR PARA OS FUNCIONARIOS', '2019-12-25');
INSERT INTO PROJETOS (ID_USER, DESCRICAO, DETERMINADO) VALUES (3, 'DEIXAR O LOCAL DE TRABALHO MAIS FORTE EM TECNOLOGIA', '2019-10-25');
INSERT INTO PROJETOS (ID_USER, DESCRICAO, DETERMINADO) VALUES (4, 'MUDAR O SETOR DE ESCRITORIO PARA OUTRO LADO', '2019-04-25');
INSERT INTO PROJETOS (ID_USER, DESCRICAO, DETERMINADO) VALUES (5, 'FAZER UM SITE MAIS ROBUSTO', '2019-10-25');
INSERT INTO PROJETOS (ID_USER, DESCRICAO, DETERMINADO) VALUES (6, 'DEIXAR QUE O SISTEMA VENDA SOZINHO', '2020-01-25');
INSERT INTO PROJETOS (ID_USER, DESCRICAO, DETERMINADO) VALUES (1, 'TRANSFERIR A EMPRESA PARA JOENVILE', '2021-12-20');
