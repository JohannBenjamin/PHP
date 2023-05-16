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
	img_Usuario longblob null ,
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
	valor_Produto decimal not null ,
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
	valor_Historico	decimal	not null ,
	status_Historico varchar(50) not null ,
	obs_Historico varchar(255) null,
    
    constraint FK_Id_Usuario_Historico foreign key (id_Usuario_Historico) references Usuario(id_Usuario),
    constraint FK_Id_Produto_Historico foreign key (id_Produto_Historico) references Produto(id_Produto)
);

#inserts

insert into Usuario
(nome_Usuario, nascimento_Usuario, usuario_Usuario, senha_Usuario, status_Usuario, obs_Usuario)
values
('Daniel', '2003-06-15', 'daniel', '1234', 'Ativo', 'Sem Obs'),
('Maria', '2001-09-19', 'maria', '1234', 'Ativo', 'Sem Obs'),
('Thiago', '2004-10-04', 'thiago', '1234', 'Ativo', 'Sem Obs'),
('Carolina', '2002-04-26', 'carolina', '1234', 'Ativo', 'Sem Obs'),
('Firmino', '2003-01-24', 'firmino', '1234', 'Ativo', 'Sem Obs');

select * from Usuario