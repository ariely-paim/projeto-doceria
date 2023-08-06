create database doceria;
use doceria;

//funcionario
create table funcionario(
	id int not null auto_increment,
	nome varchar(100) not null,
	cpf long not null unique,
	login varchar(50) not null,
	senha varchar(50) not null,
	primary key(id)
);

insert into funcionario values(0, 'Ariely', '123456', 'ariely', '1234');
insert into funcionario values(0, 'Pietro', '987654', 'pietro', '9876');

select * from funcionario f;

//cliente

create table cliente(
	id int not null auto_increment,
	nome varchar(150) not null,
	cpf long not null unique,
	telefone varchar(30) not null,
	primary key(id)
);

insert into cliente values(0, 'Jonh', '987654', '71933475066');
insert into cliente values(0, 'Bianca', '473936', '71982112933');
insert into cliente values(0, 'Miguel', '733268', '71959660788');
insert into cliente values(0, 'Luna', '285953', '71963419978');
insert into cliente values(0, 'Benjamin', '501615', '71920778834');
insert into cliente values(0, 'Estela', '830746', '71974880185');

select * from cliente c;

//produto

create table produto(
	id int not null auto_increment,
	nome varchar(100) not null,
	quantidade int not null,
	valor double not null,
	primary key(id)
);

insert into produto values(0, 'Cheesecake', 10, 80.00);
insert into produto values(0, 'Torta Brigadeiro', 10, 75.00);
insert into produto values(0, 'Torta Sertaneja', 12, 70.00);
insert into produto values(0, 'Torta Limão', 8, 70.00);

insert into produto values(0, 'Bolo Prestígio', 10, 80.00);
insert into produto values(0, 'Bolo Trufado', 12, 80.00);
insert into produto values(0, 'Bolo Red Velvet', 10, 85.00);
insert into produto values(0, 'Bolo Formigueiro', 12, 65.00);

insert into produto values(0, 'Brigadeiro Belga', 20, 4.50);
insert into produto values(0, 'Casadinho', 14, 3.50);
insert into produto values(0, 'Alfajor', 14, 5.50);
insert into produto values(0, 'Moranguinho', 16, 4.00);

insert into produto values(0, 'Coxinha', 18, 5.50);
insert into produto values(0, 'Empada', 16, 5.50);
insert into produto values(0, 'Pastel de forno', 12, 6.50);
insert into produto values(0, 'Camarão Empanado', 10, 7.50);

select * from produto p;

//venda

create table venda(
	id int not null auto_increment,
	quantidade int not null,
	data date not null,
	id_funcionario int not null,
	id_cliente int not null,
	id_produto int not null,
	primary key(id),
	constraint fk_funcionario_venda foreign key (id_funcionario) references Funcionario (id),
	constraint fk_cliente_venda foreign key (id_cliente) references Cliente (id),
	constraint fk_produto_venda foreign key (id_produto) references Produto (id)
);

select * from venda v;

