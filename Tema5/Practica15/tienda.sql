create database tienda;
use tienda;

create table roles(
    id char(5) primary key,
    descripcion varchar(30)
) engine=innodb;

INSERT INTO roles VALUES ('ADM01','Administrador');
INSERT INTO roles VALUES ('MOD02','Moderador');
INSERT INTO roles VALUES ('NOR03','Usuario normal');

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

create table productos(
    idProducto int primary key auto_increment,
    nombre char(40) not null,
    precio numeric(5,2) not null,
    descripcion char(90),
    stock int(3) not null
)engine=innodb;

INSERT INTO `productos` (`nombre`,`precio`,`descripcion`,`stock`) VALUES
('Paleta de bellota 5 Jotas','167.45','Paleta de bellota 100% ibérica 5 Jotas Jabugo Pata Negra, probablemente la mejor paletilla del mundo.','10'),
('Jamón Etiqueta Negra Benito','133.65','El jamón Benito Etiqueta Negra Selección de Autor, es un jamón seleccionado uno a uno por nuestros maestros jamoneros','3'),
('Paletilla Serrana Manuel Díaz','28.00','Prestigiosa marca Manuel Díaz 50% raza Duroc','5'),
('Jamón Serrano Reserva El Pozo','66.00','Jamón serrano Reserva Serie Oro  El Pozo. Satisfación Garantizada','12'),
('Jamón Joselito 100%','475.00','Jamón Joselito 100% natural con más de 48 meses de curación.','2'),
('Paletilla Serrana Bodega Los Romeros','30.00','Paleta Serrana Bodega Los Romeros. Pack de paleta más cuchillo jamonero y chaira.','20');

create table ventas(
    idVenta int primary key auto_increment,
    cliente char(20) not null,
    fechaVent date not null,
    idProducto int not null,
    cantidad int not null,
    precioTotal numeric(7,2) not null,
    index(cliente),
    foreign key (cliente) references usuarios(usuario),
    index(idProducto),
    foreign key (idProducto) references productos(idProducto)
)engine=innodb;

create table albaran(
    idAlbaran int primary key auto_increment,
    fechaAlbaran date not null,
    idProducto int not null,
    cantidad int not null,
    usuario char(20) not null,
    index(idProducto),
    foreign key (idProducto) references productos(idProducto),
    index(usuario),
    foreign key (usuario) references usuarios(usuario)
)engine=innodb;