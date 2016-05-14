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
('Morral', 2500, 20),
('Cartucheras', 500, 15),
('Libreta Materias' 8, 900, 30),
('Oso de peluche', 1800, 10),
('Zarcillos', 750, 3),
('Pulseras tejidas', 1650, 10),
('Zapatos deportivos', 8000, 20),
('Vestido corto', 4500, 10),
('Vestido largo noche', 7000, 2),
('Gorra', 400, 25);
