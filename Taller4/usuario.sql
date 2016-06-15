CREATE TABLE IF NOT EXISTS usuario (
  username varchar(20) primary key,
  password varchar(500) DEFAULT NULL,
  type varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE if NOT EXISTS habitacion (
  numero integer primary key auto_increment,
  tipo varchar(255) not NULL
);

create table if not exists reservacion (
  numero integer,
  fecha_inicio date,
  noches integer not null,
  nombre varchar(60) not null,
  foreign key (numero) references habitacion (numero)
  on delete cascade
  on update cascade,
  primary key (fecha_inicio)
);
