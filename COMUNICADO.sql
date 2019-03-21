CREATE TABLE COMUNICADO_CL(
	ID SERIAL NOT NULL,
	ID_CLIENTE INT NOT NULL,
	DIA DATE NOT NULL,
	DESCRICAO VARCHAR(255) NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_CLIENTE) REFERENCES CLIENTE(ID) ON DELETE CASCADE
);

CREATE TABLE COMUNICADO_FO(
	ID SERIAL NOT NULL,
	ID_FORNECEDOR INT NOT NULL,
	DIA DATE NOT NULL,
	DESCRICAO VARCHAR(255) NOT NULL,

	PRIMARY KEY(ID),
	FOREIGN KEY(ID_FORNECEDOR) REFERENCES FORNECEDOR(ID) ON DELETE CASCADE
);
drop table COMUNICADO_CL, COMUNICADO_FO

INSERT INTO COMUNICADO_CL (ID_CLIENTE, DIA, DESCRICAO) VALUES (1, NOW(), 'Teste de descricao');
INSERT INTO COMUNICADO_CL (ID_CLIENTE, DIA, DESCRICAO) VALUES (1, NOW(), 'Silvio Santos Ipsum ma! Ao adquirir o carn do Ba, voc estar concorrendo a um prmio de cem mil reaisam. Boca sujuam... sem vergonhuamm.  por sua conta e riscoamm? Ma voc, topa ou no topamm.  por sua conta e riscoamm? O Raul Gil  gayam!');
INSERT INTO COMUNICADO_CL (ID_CLIENTE, DIA, DESCRICAO) VALUES (1, NOW(), 'Silvio Santos Ipsum ma tem ou no tem o celular do milhouamm?  com voc Lombardiam.  dinheiro ou no am? Ma vale drreaisam? Ma voc est certo dissoam? Um, dois trs, quatro, PIM, entendeuam? Ma! Ao adquirir o carn do Ba, voc estar concorrendo a um prmio de cem');

INSERT INTO COMUNICADO_FO (ID_FORNECEDOR, DIA, DESCRICAO) VALUES (1, NOW(), 'Teste de descricao');
INSERT INTO COMUNICADO_FO (ID_FORNECEDOR, DIA, DESCRICAO) VALUES (1, NOW(), 'Silvio Santos Ipsum ma! Ao adquirir o carn do Ba, voc estar concorrendo a um prmio de cem mil reaisam. Boca sujuam... sem vergonhuamm.  por sua conta e riscoamm? Ma voc, topa ou no topamm.  por sua conta e riscoamm? O Raul Gil  gayam!');
INSERT INTO COMUNICADO_FO (ID_FORNECEDOR, DIA, DESCRICAO) VALUES (1, NOW(), 'Silvio Santos Ipsum ma tem ou no tem o celular do milhouamm?  com voc Lombardiam.  dinheiro ou no am? Ma vale drreaisam? Ma voc est certo dissoam? Um, dois trs, quatro, PIM, entendeuam? Ma! Ao adquirir o carn do Ba, voc estar concorrendo a um prmio de cem');



SELECT to_char(DIA, 'DD/MM/YYYY') as DIA, DESCRICAO FROM COMUNICADO_CL WHERE ID_CLIENTE = 10;

SELECT * FROM MENSAGEM