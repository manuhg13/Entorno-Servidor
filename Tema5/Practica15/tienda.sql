create database tienda;
use tienda;

create table roles(
    id char(5) primary key,
    descripcion varchar(30)
) engine=innodb;

create table usuarios(
    usuario char(20) primary key,
    clave char(40) not null,
    nombre varchar(75) not null,
	correo varchar(75) not null,
    fecha date not null,
	roles char(5) not null,
	index (roles),
	foreign key (roles) references roles (id)
)engine=innodb;

create producto(
    
)