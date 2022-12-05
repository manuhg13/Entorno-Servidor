create database cine;
/*create user academia identified by "academia";*/
use cine;
grant all on cine.* to cine;

create table mejorPelicula(
    titulo VARCHAR(90) primary key, 
    director VARCHAR(80) not null,
    genero VARCHAR(90) not null,
    estreno DATE not null,
    nominaciones INT default='1'
);

INSERT INTO mejorPelicula VALUES ('El discurso del rey','Tom Hooper','Drama historico','2010-6-')

