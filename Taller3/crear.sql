create database articulos;
   \r articulos
   create table articulos
      (
         codigo integer not null AUTO_INCREMENT,
         nombre varchar(25) not null,
         precio float not null,
         primary key (codigo)
      );

INSERT INTO articulos (nombre, precio) VALUES
(Morral, 2500, 20),
(00002, Cartucheras, 500, 15),
(00003, Libreta Materias 8, 900, 30),
(00004, Oso de peluche, 1800, 10),
(00005, Zarcillos, 750, 3),
(00006, Pulseras tejidas, 1650, 10),
(00007, Zapatos deportivos, 8000, 20),
(00008, Vestido corto, 4500, 10),
(00009, Vestido largo noche, 7000, 2),
(00010, Gorra, 400, 25);