-- 
-- Base de datos: `alumnos` 
-- 
-- -------------------------------------------------------- 
--
-- Eliminamos base de datos existentes previas
--
DROP DATABASE IF EXISTS `alumnos`;
--
-- Creamos la base de datos
--
CREATE DATABASE IF NOT EXISTS `alumnos`;
--
-- Usamos la base de datos alumnos
--
USE `alumnos`;
--
-- Estructura de tabla para la tabla `alumnos` 
-- 
CREATE TABLE IF NOT EXISTS `alumnos` ( 
  `DNI` varchar(9) NOT NULL, 
  `Nombre` varchar(50) NOT NULL, 
  `Apellidos` varchar(70) NOT NULL, 
  `Direccion` varchar(100) NOT NULL, 
  `FechaNac` date NOT NULL, 
  PRIMARY KEY (`DNI`) 
) ENGINE=MyISAM DEFAULT CHARSET=latin1; 
-- 
-- Volcar la base de datos para la tabla `alumnos` 
-- 
INSERT INTO `alumnos` (`DNI`, `Nombre`, `Apellidos`, `Direccion`, `FechaNac`) VALUES 
('12345678A', 'José Alberto', 'González Prior', 'C/Albahaca, nº14, 1ºD', '1986-07-15'), 
('23456789B', 'Almudena', 'Cantero Verdemar', 'Avd/ Profesor Alvarado, n27, 8ºA', '1988-11-04'), 
('98765432D', 'Martín', 'Díaz Jiménez', 'C/Luis de Gongora, nº2.', '1987-03-09'), 
('14725836F', 'Lucas', 'Buendia Portes', 'C/Pintor Sorolla, nº 16, 4ºB', '1988-07-10');

