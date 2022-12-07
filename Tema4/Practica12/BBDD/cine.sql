create database cine;
use cine;

create table mejorPelicula(
    titulo VARCHAR(90) primary key, 
    director VARCHAR(80) not null,
    genero VARCHAR(90) not null,
    estreno DATE not null,
    nominaciones INTEGER,
    nota FLOAT not null
)engine =innodb;

INSERT INTO mejorPelicula VALUES ('El discurso del rey','Tom Hooper','Drama historico','2010-6-9','4','8.0');
INSERT INTO mejorPelicula VALUES ('El artista','Michel Hazanavicius','Comedia romántica','2011-15-5','5','7.9');
INSERT INTO mejorPelicula VALUES ('Argo','Ben Affleck','Drama/Suspense','2012-4-11','3','7.7');
INSERT INTO mejorPelicula VALUES ('12 años de esclavitud','Steve McQueen','Biografía/Drama','2013-6-9','3','8.1');
INSERT INTO mejorPelicula VALUES ('Birdman','Alejandro González Iñárritu','Comedia dramática','2014-19-10','4','7.7');
INSERT INTO mejorPelicula VALUES ('Spotlight','Tom McCarthy','Biografía/Drama','2015-8-10','2','8.1');
INSERT INTO mejorPelicula VALUES ('Moonlight','Barry Jenkins','Coming-of-age / Drama','2016-2-9','3','7.4');
INSERT INTO mejorPelicula VALUES ('La forma del agua','Guillermo del Toro','Fantasía/Romance','2017-31-8','4','7.3');
INSERT INTO mejorPelicula VALUES ('Green Book','Peter Farrelly','Biografía / Comedia dramática / Road movie ','2018-16-11','4','8.2');
INSERT INTO mejorPelicula VALUES ('Parásitos','Bong Joon-ho','Drama/Suspenso/Humor negro ','2019-21-5','4','8.5');

