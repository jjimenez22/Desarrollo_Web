-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2016 a las 17:14:12
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: webtaller4
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla usuario
--

CREATE TABLE usuario (
  `username` varchar(20) NOT NULL,
  `password` varchar(500) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla usuario
--

INSERT INTO usuario (username, `password`, `type`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055', 'administrador'),
('recep', 'e2fc714c4727ee9395f324cd2e7f331f', 'administrador'),
('geren', 'e10adc3949ba59abbe56e057f20f883e', 'gerente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla usuario
--
ALTER TABLE usuario
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
