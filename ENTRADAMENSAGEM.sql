﻿CREATE TYPE LIDA AS ENUM('SIM', 'NÃO')
drop type LIDA


CREATE TABLE ENTRADAMENSAGEM(
	ID SERIAL NOT NULL,
	ID_RECEBENDO INT NOT NULL,
	ID_ENVIANDO INT NOT NULL,
	ASSUNTO VARCHAR(30) NOT NULL,
	MENSAGEM VARCHAR(255) NOT NULL,
	LIDA LIDA DEFAULT 'NÃO',

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_RECEBENDO) REFERENCES USUARIO(ID) ON DELETE CASCADE,
	FOREIGN KEY(ID_ENVIANDO) REFERENCES USUARIO(ID) ON DELETE CASCADE
);

DROP TABLE ENTRADAMENSAGEM
SELECT * FROM USUARIO

INSERT INTO ENTRADAMENSAGEM (ID_RECEBENDO, ID_ENVIANDO, ASSUNTO, MENSAGEM) VALUES (1, 2,, :assunto, :mensagem)
INSERT INTO ENTRADAMENSAGEM (ID_RECEBENDO, ID_ENVIANDO, ASSUNTO, MENSAGEM) VALUES ()

select * from entradamensagem

SELECT
	E.ID AS ID,
	U.NOME AS RECEBENDO,
	S.NOME AS ENVIANDO,
	E.ASSUNTO AS ASSUNTO,
	E.MENSAGEM AS MENSAGEM,
	E.LIDA AS LIDA
FROM
	ENTRADAMENSAGEM AS E
INNER JOIN
	USUARIO AS U
ON
	E.ID_RECEBENDO = U.ID
INNER JOIN
	USUARIO AS S
ON
	E.ID_ENVIANDO = S.ID






ID_RECEBENDO
ID_CLIENTE
ASSUNTO
MENSAGEM
LIDA