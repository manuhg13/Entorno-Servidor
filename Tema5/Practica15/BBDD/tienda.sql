create database tienda;
use tienda;

create table roles(
    id char(5) primary key,
    descripcion char(30)
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
    nombre char(60) not null,
    precio numeric(5) not null,
    descripcion char(60) not null,
    stock int(3) not null
)engine=innodb;

INSERT INTO productos (nombre,precio,descripcion,stock) VALUES ('Paleta de bellota 5 Jotas','167.45','Paleta de bellota 100% ibérica 5 Jotas Jabugo Pata Negra','10'),
INSERT INTO productos (nombre,precio,descripcion,stock) VALUES ('Jamón Eti. Negra Benito','133.65','El jamón Benito Etiqueta Negra Selección de Autor','3'),
INSERT INTO productos (nombre,precio,descripcion,stock) VALUES ('Paletilla Serrana Manuel Díaz','28.00','Prestigiosa marca Manuel Díaz 50% raza Duroc','5'),
INSERT INTO productos (nombre,precio,descripcion,stock) VALUES ('Jamón Reserva El Pozo','66.00','Jamón serrano Reserva Serie Oro  El Pozo. Satisfación Garantizada','12'),
INSERT INTO productos (nombre,precio,descripcion,stock) VALUES ('Jamón Joselito 100%','475.00','Jamón Joselito 100% natural con más de 48 meses de curación.','2'),
INSERT INTO productos (nombre,precio,descripcion,stock) VALUES ('Paletilla Bodega Los Romeros','30.00','Paleta Serrana Bodega Los Romeros','20');

create table ventas(
    idVenta int primary key auto_increment,
    cliente char(20) not null,
    fechaVent date not null,
    idProducto int not null,
    cantidad int not null,
    precioTotal numeric(7) not null,
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