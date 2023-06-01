create database Projeto_Filmes_PHP;
use Projeto_Filmes_PHP;

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

create table Filme
(
	id_Filme int not null auto_increment primary key,
	id_Categoria_Filme int not null ,
	nome_Filme varchar(50) not null ,
	sinopse_Filme varchar(255) not null ,
	img_Filme longblob not null ,
    nota_Filme decimal(10,1) not null ,
	status_Filme varchar(50) not null ,
	obs_Filme varchar(255) null,
    
    constraint FK_Id_Categoria_Filme foreign key (id_Categoria_Filme) references Categoria(id_Categoria)
);
select * from Filme;