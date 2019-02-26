﻿CREATE TABLE MENSAGEM(
	ID SERIAL NOT NULL,
	ASSUNTO VARCHAR(15) NOT NULL,
	DESCRICAO VARCHAR(255) NOT NULL,
	DATA_MSG DATE NOT NULL,
	ID_DE VARCHAR(20) NOT NULL,

	PRIMARY KEY(ID)
);
DROP TABLE MENSAGEM;

SELECT ID, ASSUNTO, DESCRICAO, DATA_MSG, ID_DE FROM MENSAGEM
SELECT ID, ASSUNTO, DESCRICAO, to_char(DATA_MSG, 'DD/MM/YYYY'), ID_DE FROM MENSAGEM

INSERT INTO MENSAGEM (ASSUNTO, DESCRICAO, DATA_MSG, ID_DE) VALUES ('Cliente', 'Não compra mais de 3 meses', NOW(), 'Fernando')

