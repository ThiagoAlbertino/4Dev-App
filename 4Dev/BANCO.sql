CREATE DATABASE IF NOT EXISTS fordev;

CREATE TABLE funcionario(
    id INT(3) PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL UNIQUE,
    data_admissao DATE NOT NULL,
    senha CHAR(32) NOT NULL,
    funcao VARCHAR(30) NOT NULL
);

CREATE TABLE cliente_acesso(
	id_cliente INT(3) PRIMARY KEY AUTO_INCREMENT,
    username_cliente VARCHAR(30) NOT NULL UNIQUE,
    senha_cliente CHAR(32) NOT NULL,
    empresa_cliente VARCHAR(50) NOT NULL,
    data_tornou_cliente DATE NOT NULL,
    precisa_avaliar CHAR(3) NULL DEFAULT 'Não'
);

CREATE TABLE avaliacao(
    id_avaliacao INT(5) PRIMARY KEY AUTO_INCREMENT,
    id_empresa INT(3) NOT NULL,
    razao_social VARCHAR(50) NOT NULL,
    pessoa_responsavel VARCHAR(30) NOT NULL,
    sinalizador VARCHAR(10) NULL,
    data_tornou_cliente DATE NOT NULL,
    realizou_avaliacao CHAR(3) NOT NULL,
    data_avaliacao DATE NOT NULL,
    nota_avaliacao INT(2) NOT NULL,
    porque_avaliacao TEXT(100) NOT NULL,
    promotor CHAR(3) NULL,
    neutro CHAR(3) NULL,
    detrator CHAR(3) NULL
);

INSERT INTO funcionario (nome, username, data_admissao, senha, funcao) 
VALUES ('Ciclano de Tal', 'Admin', '2017/01/01', MD5('12345'), 'Desenvolvimento');
INSERT INTO funcionario (nome, username, data_admissao, senha, funcao) 
VALUES ('Beltrano de Tal', 'Beltrano22', '2017/06/01', MD5('12345'), 'Recursos Humanos');
INSERT INTO funcionario (nome, username, data_admissao, senha, funcao) 
VALUES ('Fulano de Tal', 'Fulano17', '2018/04/01', MD5('12345'), 'Interação com o cliente');


INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Facebook23', MD5('12345'), 'Facebook Inc.', '2014/01/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Twitter17', MD5('12345'), 'Twitter, Inc.', '2014/07/30');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Volks89', MD5('12345'), 'Volkswagen', '2014/10/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('CDS', MD5('12345'), 'CDS Informática Ltda.', '2014/11/14');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Walmart13', MD5('12345'), 'Walmart', '2014/12/23');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Toyota', MD5('12345'), 'Toyota Motor', '2015/04/04');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Apple10', MD5('12345'), 'Apple', '2015/05/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('SamsungS9', MD5('12345'), 'Samsung', '2015/06/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Chevrolet18', MD5('12345'), 'Chevrolet', '2015/10/01');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('AT77', MD5('12345'), 'AT&T', '2015/12/21');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Ford31', MD5('12345'), 'Ford Motor Company', '2016/06/03');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Amazon.01', MD5('12345'), 'Amazon.com', '2016/07/10');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('eB4y', MD5('12345'), 'eBay', '2016/08/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Wh4ts4pp', MD5('12345'), 'WhatsApp', '2016/10/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('InstaLogin', MD5('12345'), 'Instagram', '2016/11/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Leno99', MD5('12345'), 'Lenovo', '2017/01/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Moto33', MD5('12345'), 'Motorola', '2017/04/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('ValvCS', MD5('12345'), 'Valve Corporation', '2017/08/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Enix55', MD5('12345'), 'Square Enix', '2017/10/13');
INSERT INTO cliente_acesso (username_cliente, senha_cliente, empresa_cliente, data_tornou_cliente) 
VALUES ('Bugsoft', MD5('12345'), 'Ubisoft', '2017/11/13');


INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (1, 'Facebook Inc.', 'Fulano de Tal', 'Promotor', '2014/01/13', 'Sim', '2017/02/13', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, neutro) 
VALUES (1, 'Facebook Inc.', 'Ciclano de Tal', 'Neutro', '2014/01/13', 'Sim', '2017/03/13', 7, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, detrator) 
VALUES (2, 'Twitter, Inc.', 'Fulano de Tal', 'Detrator', '2014/07/30', 'Sim', '2017/08/30', 5, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, neutro) 
VALUES (2, 'Twitter, Inc.', 'Ciclano de Tal', 'Neutro', '2014/07/30', 'Sim', '2017/09/30', 7, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, neutro) 
VALUES (3, 'Volkswagen', 'Fulano de Tal', 'Neutro', '2014/10/13', 'Sim', '2017/11/13', 8, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, detrator) 
VALUES (3, 'Volkswagen', 'Ciclano de Tal', 'Detrator', '2014/10/13', 'Sim', '2017/12/13', 2, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (4, 'CDS Informática Ltda.', 'Fulano de Tal', 'Promotor', '2014/11/14', 'Sim', '2017/12/14', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (4, 'CDS Informática Ltda.', 'Ciclano de Tal', 'Promotor', '2014/11/14', 'Sim', '2018/01/13', 10, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (5, 'Walmart', 'Fulano de Tal', 'Promotor', '2014/12/23', 'Sim', '2018/01/23', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, neutro) 
VALUES (5, 'Walmart', 'Ciclano de Tal', 'Neutro', '2014/12/23', 'Sim', '2018/02/23', 7, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (6, 'Toyota Motor', 'Fulano de Tal', 'Promotor', '2015/04/04', 'Sim', '2017/05/04', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (6, 'Toyota Motor', 'Ciclano de Tal', 'Promotor', '2015/04/04', 'Sim', '2017/06/04', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (7, 'Apple', 'Fulano de Tal', 'Promotor', '2015/05/13', 'Sim', '2017/06/13', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (7, 'Apple', 'Ciclano de Tal', 'Promotor', '2015/05/13', 'Sim', '2017/07/13', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, neutro) 
VALUES (8, 'Samsung', 'Fulano de Tal', 'Neutro', '2015/06/13', 'Sim', '2017/07/13', 7, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (8, 'Samsung', 'Ciclano de Tal', 'Promotor', '2015/06/13', 'Sim', '2017/08/13', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, detrator) 
VALUES (9, 'Chevrolet', 'Fulano de Tal', 'Detrator', '2015/10/01', 'Sim', '2017/11/01', 2, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (9, 'Chevrolet', 'Ciclano de Tal', 'Promotor', '2015/10/01', 'Sim', '2017/12/01', 10, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (10, 'AT&T', 'Fulano de Tal', 'Promotor', '2015/12/21', 'Sim', '2018/01/21', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (10, 'AT&T', 'Ciclano de Tal', 'Promotor', '2015/12/21', 'Sim', '2018/02/21', 10, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (11, 'Ford Motor Company', 'Ciclano de Tal', 'Promotor', '2016/06/03', 'Sim', '2017/07/03', 10, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, neutro) 
VALUES (12, 'Amazon.com', 'Fulano de Tal', 'Neutro', '2016/07/10', 'Sim', '2017/08/10', 8, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, detrator) 
VALUES (13, 'eBay', 'Ciclano de Tal', 'Detrator', '2016/08/13', 'Sim', '2017/09/13', 1, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (14, 'WhatsApp', 'Fulano de Tal', 'Promotor', '2016/10/13', 'Sim', '2017/11/13', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (15, 'Instagram', 'Ciclano de Tal', 'Promotor', '2016/11/13', 'Sim', '2017/12/13', 10, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (16, 'Lenovo', 'Fulano de Tal', 'Promotor', '2017/01/13', 'Sim', '2017/02/13', 9, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, detrator) 
VALUES (17, 'Motorola', 'Ciclano de Tal', 'Detrator', '2017/04/13', 'Sim', '2017/05/13', 1, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, neutro) 
VALUES (18, 'Valve Corporation', 'Fulano de Tal', 'Neutro', '2017/08/13', 'Sim', '2017/09/13', 8, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (19, 'Square Enix', 'Ciclano de Tal', 'Promotor', '2017/10/13', 'Sim', '2017/11/13', 10, 'Porque sim, é resposta', 'Sim');
INSERT INTO avaliacao (id_empresa, razao_social, pessoa_responsavel, sinalizador, data_tornou_cliente, realizou_avaliacao, data_avaliacao, nota_avaliacao, porque_avaliacao, promotor) 
VALUES (20, 'Ubisoft', 'Fulano de Tal', 'Promotor', '2017/11/13', 'Sim', '2017/12/13', 9, 'Porque sim, é resposta', 'Sim');