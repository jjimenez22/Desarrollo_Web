CREATE TABLE IF NOT EXISTS 'usuario' (
  'username' varchar(20) NOT NULL,
  'password' varchar(500) DEFAULT NULL,
  'type' varchar(30) DEFAULT NULL,
  PRIMARY KEY ('username')
) ENGINE=MyISAM DEFAULT CHARSET=latin1;