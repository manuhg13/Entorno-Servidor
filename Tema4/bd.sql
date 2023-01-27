create database conciertos;

create table cociertos{
    id int primary key auto_increment,
    grupo varchar(40) not null, 
    precio date not null,
    precio float not null,
    lugar varchar(100)
}

insert into concierto values (null, 'Los planetas','2023-02-15',25,'Auditorio de Zamora')
insert into concierto values (null, 'Aitana','2023-02-23',25,'Ramos Carrión')