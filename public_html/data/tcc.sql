CREATE DATABASE IF NOT EXISTS TCC;



USE TCC;




CREATE TABLE tb_marcas(
    id_mar INT AUTO_INCREMENT,
    nome_mar VARCHAR(20),
    PRIMARY KEY(id_mar)
);




CREATE TABLE tb_materiais(
    id_mat INT AUTO_INCREMENT,
    nome_mat VARCHAR(20),
    PRIMARY KEY(id_mat)
);




CREATE TABLE tb_administradores(
    id_adm INT AUTO_INCREMENT,
    login_adm VARCHAR(100),
    senha_adm VARCHAR(32),
    PRIMARY KEY(id_adm)
);




CREATE TABLE tb_lojas(
    id_loj INT AUTO_INCREMENT,
    nome_loj VARCHAR(50),
    cep_loj VARCHAR(11),
    endereco_loj VARCHAR(100),
    telefone_loj VARCHAR(15),
    PRIMARY KEY(id_loj)
);




CREATE TABLE IF NOT EXISTS tb_armacoes(
    id_arm INT AUTO_INCREMENT,
    nome_arm VARCHAR(50),
    corPrincipal_arm VARCHAR(15),
    corSecund_arm VARCHAR(15),
    id_mar INT,
    id_mat INT,
    foto_arm VARCHAR(50),
    PRIMARY KEY(id_arm)
);

ALTER TABLE tb_armacoes 
ADD FOREIGN KEY (id_mar) REFERENCES tb_marcas(id_mar);

ALTER TABLE tb_armacoes 
ADD FOREIGN KEY (id_mat) REFERENCES tb_materiais(id_mat);




CREATE TABLE tb_disponibilidade(
    id_dis INT AUTO_INCREMENT,
    id_arm INT,
    id_loj INT,
    PRIMARY KEY(id_dis)
);

ALTER TABLE tb_disponibilidade
ADD FOREIGN KEY (id_arm) REFERENCES tb_armacoes(id_arm);

ALTER TABLE tb_disponibilidade
ADD FOREIGN KEY (id_loj) REFERENCES tb_lojas(id_loj);







INSERT INTO `tb_marcas` (`id_mar`, `nome_mar`) VALUES (NULL, 'Dolce & Gabbana');
INSERT INTO `tb_marcas` (`id_mar`, `nome_mar`) VALUES (NULL, 'Fendi'), (NULL, 'Armani ');
INSERT INTO `tb_marcas` (`id_mar`, `nome_mar`) VALUES (NULL, 'Maui Jim');




INSERT INTO `tb_materiais` (`id_mat`, `nome_mat`) VALUES (NULL, 'Metal'), (NULL, 'Titanium');
INSERT INTO `tb_materiais` (`id_mat`, `nome_mat`) VALUES (NULL, 'Alumínio'), (NULL, 'Aço inoxidável');




INSERT INTO `tb_armacoes` (`id_arm`, `nome_arm`, `corPrincipal_arm`, `corSecund_arm`, `id_mar`, `id_mat`, `foto_arm`) 
VALUES (NULL, 'Óculos De Sol Verão', 'preto', 'vermelho', '1', '1', 'img/oculos.jpg');


INSERT INTO `tb_administradores`VALUES (NULL, 'leo', '202cb962ac59075b964b07152d234b70');
INSERT INTO `tb_administradores`VALUES (NULL, 'caique', '202cb962ac59075b964b07152d234b70');
INSERT INTO `tb_administradores`VALUES (NULL, 'larissa', '202cb962ac59075b964b07152d234b70');

INSERT INTO `tb_lojas` (`id_loj`, `cep_loj`, `endereco_loj`, `telefone_loj`) VALUES 
('1', '11111111111', 'Rua das Graças numero 80', '15999999999');