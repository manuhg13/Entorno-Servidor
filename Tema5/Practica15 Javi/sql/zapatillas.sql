create database zapatillas;
use zapatillas;

create table perfil (
    codigo char(3) primary key,
	descripcion varchar(30)
) engine=innodb;

create table usuarios (
    usuario CHAR(40) primary key,
    nombre VARCHAR(60) NOT NULL,
    pass CHAR(40) NOT NULL,
    correo varchar(75) NOT NULL,
    fechanac date NOT NULL,
    perfil CHAR(3) NOT NULL,
    index (perfil),
	foreign key (perfil) references perfil (codigo)
) engine=innodb;

create table producto (
    cod_producto int primary key auto_increment,
    nombre VARCHAR(20) NOT NULL,
    descripcion VARCHAR(50) NOT NULL,
    precio float(6) NOT NULL,
    stock int NOT NULL
) engine=innodb;

create table ventas (
    id_venta int primary key auto_increment,
    usuario CHAR(40) NOT NULL,
    fechacomp date NOT NULL,
    cod_producto int NOT NULL,
    cantidad int NOT NULL,
    precio_total float(6) NOT NULL,
    foreign key (usuarios) references usuarios (usuario),
    foreign key (producto) references perfil (cod_producto)
) engine=innodb;

create table albaranes (
    id_albaran int primary key auto_increment,
    fechaalb date NOT NULL,
    cod_producto int NOT NULL,
    cantidad int NOT NULL,
    usuario CHAR(40) NOT NULL,
    foreign key (producto) references perfil (cod_producto),
    foreign key (usuarios) references usuarios (usuario)
) engine=innodb;

insert into perfil (codigo, descripcion) values ('ADM','Administrador');
insert into perfil (codigo, descripcion) values ('MOD','Moderador');
insert into perfil (codigo, descripcion) values ('USR','Usuario normal');

insert into usuarios (usuario, clave, fechanac, perfil) values ('user1', 'Rodolfo Mateos','356a192b7913b04c54574d18c28d46e6395428ab', 'user1@gmail.com', '1998-10-05', 'ADM');
insert into usuarios (usuario, clave, fechanac, perfil) values ('user2', 'Paco Juarez','356a192b7913b04c54574d18c28d46e6395428ab', 'user2@gmail.com', '1998-10-05', 'MOD');
insert into usuarios (usuario, clave, fechanac, perfil) values ('user3', 'Juan Francisco','356a192b7913b04c54574d18c28d46e6395428ab', 'user3@gmail.com', '1998-10-05', 'USR');

insert into producto (nombre, descripcion, precio, stock) values ('Nike Air Force 1', 'un modelo original de baloncesto', '119.99', '3'); 
insert into producto (nombre, descripcion, precio, stock) values ('Nike Air Max Excee', 'rinden homenaje a un clásico con un nuevo enfoque', '119.99', '3');
insert into producto (nombre, descripcion, precio, stock) values ('Jordan Luka 1', 'Diseñadas para el 77', '109.99', '3');
insert into producto (nombre, descripcion, precio, stock) values ('Air Jordan Legacy 312 Low', 'rinden homenaje al legado de Michael Jordan', '139.99', '3');