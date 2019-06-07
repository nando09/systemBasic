CREATE TABLE MENSAGEM(
	id SERIAL not null,
	id_de INT not null,
	id_para INT not null,
	mensagem varchar(255) not null,

	PRIMARY KEY(ID)
);

CREATE TABLE USUARIO(
	id SERIAL NOT NULL,
	nome VARCHAR(50) NOT NULL,
	usuario VARCHAR(50) NOT NULL,
	senha VARCHAR(40) NOT NULL,

	PRIMARY KEY(ID)
);

select * from usuario

INSERT INTO USUARIO (NOME, USUARIO, SENHA) VALUES ('Nando', 'nando', MD5('123321'))