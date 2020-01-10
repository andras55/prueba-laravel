-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-01-2020 a las 12:15:33
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(45) NOT NULL,
  `nom_com` varchar(45) NOT NULL,
  `raz_soc` varchar(45) NOT NULL,
  `rfc` varchar(45) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `domicilio` text,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `clave_UNIQUE` (`clave`),
  UNIQUE KEY `rfc_UNIQUE` (`rfc`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `clave`, `nom_com`, `raz_soc`, `rfc`, `edad`, `domicilio`, `estatus`) VALUES
(10, '444', 'sdasdasd', 'asdasdasd', 'LOHA551104888', 45, 'JUNCOS', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
