create database articulos;
   \r articulos
   create table articulos
      (
         codigo integer not null AUTO_INCREMENT,
         nombre varchar(25) not null,
         precio float not null,
         primary key (codigo)
      );
