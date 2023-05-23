create database Mini_Projeto_PHP;
use Mini_Projeto_PHP;

#área de create tables
create table Usuario
(
	id_Usuario int not null auto_increment primary key,
	nome_Usuario varchar(50) not null ,
	nascimento_Usuario datetime not null ,
	cadastro_Usuario timestamp not null ,
	usuario_Usuario varchar(50) not null unique ,
	senha_Usuario varchar(50) not null ,
	img_Usuario longblob not null ,
	status_Usuario varchar(50) not null ,
	obs_Usuario varchar(255) null
);

create table Categoria
(
	id_Categoria int not null auto_increment primary key,
	nome_Categoria varchar(50) not null unique ,
	status_Categoria varchar(50) not null ,
	obs_Categoria varchar(255) null
);

create table Produto
(
	id_Produto int not null auto_increment primary key,
	id_Categoria_Produto int not null ,
	nome_Produto varchar(50) not null ,
	qtde_Produto int not null ,
	valor_Produto decimal(10,2) not null ,
	status_Produto varchar(50) not null ,
	obs_Produto varchar(255) null,
    
    constraint FK_Id_Categoria_Produto foreign key (id_Categoria_Produto) references Categoria(id_Categoria)
);

create table Historico
(
	id_Historico int not null auto_increment primary key,
	id_Usuario_Historico int not null ,
	id_Produto_Historico int not null ,
	momento_Historico timestamp not null ,
	tipo_Historico varchar(50) not null ,
	qtde_Historico int not null ,
	valor_Historico	decimal(10,2) not null ,
	status_Historico varchar(50) not null ,
	obs_Historico varchar(255) null,
    
    constraint FK_Id_Usuario_Historico foreign key (id_Usuario_Historico) references Usuario(id_Usuario),
    constraint FK_Id_Produto_Historico foreign key (id_Produto_Historico) references Produto(id_Produto)
);
drop table Historico;
#inserts

insert into Usuario
(nome_Usuario, nascimento_Usuario, usuario_Usuario, senha_Usuario, img_Usuario, status_Usuario, obs_Usuario)
values
('Daniel', '2003-06-15', 'daniel', '1234', '', 'Ativo', 'Sem Obs'),
('Maria', '2001-09-19', 'maria', '1234', '', 'Ativo', 'Sem Obs'),
('Thiago', '2004-10-04', 'thiago', '1234', '', 'Ativo', 'Sem Obs'),
('Carolina', '2002-04-26', 'carolina', '1234', '', 'Ativo', 'Sem Obs'),
('Firmino', '2003-01-24', 'firmino', '1234', '', 'Ativo', 'Sem Obs');

insert into Categoria
(nome_Categoria, status_Categoria, obs_Categoria)
values
('Alimentos', 'Ativo', 'Sem Obs'),
('Ferramentas', 'Ativo', 'Sem Obs'),
('Utensílios', 'Ativo', 'Sem Obs'),
('Eletrodomésticos', 'Ativo', 'Sem Obs'),
('Eletrônicos', 'Ativo', 'Sem Obs');

insert into Produto
(id_Categoria_Produto, nome_Produto, qtde_Produto, valor_Produto, status_Produto, obs_Produto)
values
(3, 'Pacote de Colheres - 10 Unidades', 100, 15.99, 'Ativo', 'Sem Obs'),
(1, 'Pacote de Arroz 1kg', 50, 22.49, 'Ativo', 'Sem Obs'),
(5, 'Televisão Samsung 39 Polegadas', 200, 1049.99, 'Ativo', 'Sem Obs'),
(4, 'Geladeira Electrolux 200L', 30, 2509.49, 'Ativo', 'Sem Obs'),
(2, 'Chave de fenda', 100, 19.99, 'Ativo', 'Sem Obs');

insert into Historico
(id_Usuario_Historico, id_Produto_Historico, tipo_Historico, qtde_Historico, valor_Historico, status_Historico, obs_Historico)
values
(2, 1, 'Compra', 10, 159.90, 'Ativo', 'Sem Obs'),
(1, 4, 'Compra', 10, 25094.90, 'Ativo', 'Sem Obs'),
(4, 2, 'Venda', 50, 115.00, 'Ativo', 'Sem Obs'),
(3, 5, 'Compra', 20, 399.80, 'Ativo', 'Sem Obs'),
(5, 3, 'Venda', 15, 15000.00, 'Ativo', 'Sem Obs');

#SELECTS
select * from Usuario;
select * from Categoria;
select * from Produto;
select * from Historico;
select P.nome_Produto as 'Nome', C.nome_Categoria as 'Nome da Categoria', P.qtde_Produto as 'Quantidade', P.valor_Produto as 'Valor', P.status_Produto as 'Status', P.obs_Produto as 'OBS' from Produto as P
inner join Categoria as C on C.id_Categoria = P.id_Categoria_Produto;
select * from Produto where status_Produto LIKE '%ivo'