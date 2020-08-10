-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-03-2020 a las 01:54:14
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oportuni_despega`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ID_Alumno` char(16) NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Class` smallint(6) DEFAULT NULL,
  `correo` varchar(75) NOT NULL,
  `ID_Carrera` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ID_Empresa` char(10) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Estado` varchar(15) DEFAULT NULL,
  `ID_Status` char(10) DEFAULT NULL,
  `SedeAsistencia` char(10) DEFAULT NULL,
  `ID_Sede` char(10) NOT NULL,
  `TotalTalleres` int(10) NOT NULL,
  `StatusActual` varchar(30) NOT NULL,
  `FuenteFinacimiento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID_Alumno`, `Nombre`, `Class`, `correo`, `ID_Carrera`, `ID_Empresa`, `Sexo`, `Estado`, `ID_Status`, `SedeAsistencia`, `ID_Sede`, `TotalTalleres`, `StatusActual`, `FuenteFinacimiento`) VALUES
('2012-SA-FT-0001', 'Gloria Maria Agreda Castro', 2014, 'gloria.agreda@oportunidades.org.sv', 'LeFis', 'UNASA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'CrÃ©dito Educativo', 'DECLINADOCRÃ‰DITO'),
('2012-SA-FT-0003', 'Levy Mauricio Alarcon Alfaro', 2014, 'levi.alarcon@oportunidades.org.sv', 'DeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', '0'),
('2012-SA-FT-0004', 'Erika Arely Alvarado Nativi', 2014, 'erika.alvarado@oportunidades.org.sv', 'TE', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'CRÃ‰DITOBANCO'),
('2012-SA-FT-0007', 'Joaquin Antonio Barrientos PÃ©rez', 2014, 'joaquin.barrientos@oportunidades.org.sv', 'LeIE', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', '0'),
('2012-SA-FT-0010', 'Carlos Fernando Calderon Rodas', 2014, 'carlos.calderon@oportunidades.org.sv', 'DSeCP', 'APAC SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Beca Cancelada', '0'),
('2012-SA-FT-0011', 'Israel Antonio Candelario PeÃ±a', 2014, 'israel.candelario@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'DECLINADOCRÃ‰DITO'),
('2012-SA-FT-0012', 'Daniela Beatriz Canizalez Toledo', 2014, 'daniela.canizales@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'CRÃ‰DITOBANCO'),
('2012-SA-FT-0014', 'Juan Carlos Centeno Perez', 2014, 'juan.centeno@oportunidades.org.sv', 'TeMAuTo', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'DECLINADOCRÃ‰DITO'),
('2012-SA-FT-0018', 'Ileana Beatriz Flores Samayoa', 2014, 'ileana.flores@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'DECLINADOCRÃ‰DITO'),
('2012-SA-FT-0021', 'Vilma Esmeralda Gonzalez Guerra', 2014, 'esmeralda.gonzalez@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'DECLINADOCRÃ‰DITO'),
('2012-SA-FT-0022', 'Doris Jeannette Granados Granados', 2014, 'jeannette.granados@oportunidades.org.sv', 'LeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', '0'),
('2012-SA-FT-0023', 'Jose Mauricio Gudiel Rodriguez', 2014, 'mauricio.gudiel@oportunidades.org.sv', 'LeSI', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'DECLINADOCRÃ‰DITO'),
('2012-SA-FT-0025', 'Alberto Ernesto Hernandez Moran', 2014, 'alberto.hernandez@oportunidades.org.sv', 'TeIE', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'CRÃ‰DITOBANCO'),
('2012-SA-FT-0029', 'Vanessa sarai MagaÃ±a Navas', 2014, 'vanessa.magana@oportunidades.org.sv', 'LeB', 'JBU-W', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'BECAEXTRAORDINARIA'),
('2012-SA-FT-0035', 'Juan Carlos Menendez Zelada', 2014, 'juan.menendez@oportunidades.org.sv', 'LeCP', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', '0'),
('2012-SA-FT-0039', 'Irving Alberto Olmedo Jaco', 2014, 'irving.olmedo@oportunidades.org.sv', 'LeCP', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', '0'),
('2012-SA-FT-0040', 'Monica Raquel Orantes Flamenco', 2014, 'monica.orantes@oportunidades.org.sv', 'LeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', '0'),
('2012-SA-FT-0041', 'Moises ElÃ­as Osorio Vanegas', 2014, 'moises.osorio@oportunidades.org.sv', 'LeLC', 'UNASA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', '0'),
('2012-SA-FT-0042', 'Angel Abraham Palacios Rodriguez', 2014, 'angel.palacios@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'DECLINADOCRÃ‰DITO'),
('2012-SA-FT-0045', 'Oscar Emerson Rivera Lara', 2014, 'oscar.rivera@oportunidades.org.sv', 'DeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', '0'),
('2012-SA-FT-0048', 'Gabriela Janeth VÃ¡ldez MelÃ©ndez', 2014, 'gabriela.valdez@oportunidades.org.sv', 'DeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 6, 'Declinado', '0'),
('2013-SA-FT-0002', 'Jenniffer Michelle Ãlvarez RodrÃ­guez', 2015, 'jenniffer.alvarez@oportunidades.org.sv;', 'TeMA', 'UDB', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FGK'),
('2013-SA-FT-0004', 'MarÃ­a Alejandra BolaÃ±os Platero', 2015, 'alejandra.bolanos@oportunidades.org.sv', 'LeAdE', 'UDJMD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 12, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0006', 'Gabriela Raquel Boyat Solis', 2015, 'gabriela.solis@oportunidades.org.sv', 'LeEeII', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 12, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0007', 'Andrea Paola Castro Aguilar', 2015, 'andrea.castro@oportunidades.org.sv', 'LeEeII', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2013-SA-FT-0009', 'JosuÃ© Roberto Contreras Olano', 2015, 'josue.contreras@oportunidades.org.sv', 'LeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 15, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0010', 'Katherinne Denisse Cruz Mena', 2015, 'katherinne.cruz@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FGK'),
('2013-SA-FT-0014', 'Erika Beatriz Escobar Romero', 2015, 'erika.escobar@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Beca Cancelada', 'Beca Externa con Apoyo Adicion'),
('2013-SA-FT-0016', 'Waldemar Antonio Flores Reyes', 2015, 'waldemar.flores@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 9, 'Graduado', 'FGK'),
('2013-SA-FT-0017', 'Karen Jeannette GÃ¡lvez GarcÃ­a', 2015, 'karen.galvez@oportunidades.org.sv', 'LeAdE', 'KU', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 5, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0020', 'Lissette Esmeralda GirÃ³n GÃ³mez', 2015, 'lissette.giron@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FGK'),
('2013-SA-FT-0021', 'Ileana Abigail Gomez Zepeda', 2015, 'iliana.gomez@oportunidades.org.sv', 'LeEceeEB', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 33, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0022', 'Maria Ester Gonzalez Galindo', 2015, 'ester.gonzalez@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 19, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0023', 'Melissa Abigail Gonzalez Rodriguez', 2015, 'melissa.gonzalez@oportunidades.org.sv', 'LeEeII', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 15, 'Beca Cancelada', 'FGK'),
('2013-SA-FT-0027', 'Elena Guadalupe LÃ³pez Cardona', 2015, 'elena.lopez@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FGK'),
('2013-SA-FT-0028', 'Brayan Ernesto LÃ³pez MejÃ­a', 2015, 'brayan.lopez@oportunidades.org.sv', 'IeDdS', 'KU', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 4, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0029', 'Yara Paola Martinez Lopez', 2015, 'yara.martinez@oportunidades.org.sv', 'LeEeII', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 18, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0030', 'Andrea Alexandra MartÃ­nez MartÃ­nez', 2015, 'alexandra.martinez@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 30, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0031', 'Sonia Marisol MartÃ­nez Pimentel', 2015, 'sonia.martinez@oportunidades.org.sv;', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 9, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0034', 'Cecilia Jeanmillette Mendoza Sanchez', 2015, 'cecilia.mendoza@oportunidades.org.sv;', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FGK'),
('2013-SA-FT-0036', 'Ana Del Carmen Palacios Diaz', 2015, 'ana.palacios@oportunidades.org.sv', 'LePSIC', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0037', 'Carmen Elena Palacios Diaz', 2015, 'elena.palacios@oportunidades.org.sv', 'LeFis', 'UNASA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Beca Cancelada', 'FGK'),
('2013-SA-FT-0038', 'Stephannie JasmÃ­n Cabezas PÃ©rez', 2015, 'stephannie.perez@oportunidades.org.sv;', 'LeEceeEB', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0041', 'Victor Manuel Rivera Raymundo', 2015, 'victor.rivera@oportunidades.org.sv', 'TeII', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FGK'),
('2013-SA-FT-0042', 'Nataly Del Rosario Rodriguez Ascencio', 2015, 'nataly.rodriguez@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 11, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0044', 'Libni Merari Samayoa MagaÃ±a', 2015, 'libni.samayoa@oportunidades.org.sv', 'LeEeII', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 7, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0047', 'Yanira Jeanmileth Velasquez Lima', 2015, 'yanira.velasquez@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 21, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-FT-0049', 'Natali Melissa Zamora Salguero', 2015, 'melissa.zamora@oportunidades.org.sv', 'II', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FGK'),
('2013-SA-FT-0050', 'Fatima Paola Zepeda Trinidad', 2015, 'fatima.zepeda@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 10, 'CrÃ©dito Educativo', 'FGK'),
('2013-SA-SAT-0002', 'Kenia Vanessa AlvÃ¡rado LÃ³pez', 2014, 'kenia.alvarado@oportunidades.org.sv', 'DSeCP', 'APAC SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Graduado', 'FOM'),
('2013-SA-SAT-0005', 'JesÃºs Oswaldo Calderon LÃ³pez', 2014, 'jesus.calderon@oportunidades.org.sv', 'LeCP', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 2, 'CrÃ©dito Educativo', 'FOM'),
('2013-SA-SAT-0006', 'Walter Alexander Castro UmaÃ±a', 2014, 'walter.castro@oportunidades.org.sv', 'II', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'CrÃ©dito Educativo', 'FOM'),
('2013-SA-SAT-0007', 'Jocelyn Yamileth Chicas Escolero', 2014, 'jocelyn.chicas@oportunidades.org.sv', 'LeEeII', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'CrÃ©dito Educativo', 'FOM'),
('2013-SA-SAT-0008', 'Maria del Socorro Cisneros', 2014, 'maria.cisneros@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'Beca Externa con Apoyo Adicion'),
('2013-SA-SAT-0009', 'David Ernesto Cordova Bonilla', 2014, 'david.cordovab@oportunidades.org.sv', 'LeEcon', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Beca Cancelada', 'FOM'),
('2013-SA-SAT-0010', 'Katherinne Jeannmillette Cruz VÃ¡squez', 2014, 'katherinne.cruzv@oportunidades.org.sv', 'TeQIDiurno', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0011', 'Mirian Marilin Flores Salazar', 2014, 'mirian.flores@oportunidades.org.sv', 'LeCP', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2013-SA-SAT-0012', 'Josselyn Guadalupe Flores Solis', 2014, 'josselyn.flores@oportunidades.org.sv', 'TE', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0013', 'Mario Ernesto Francia GaldÃ¡mez', 2014, 'mario.francia@oportunidades.org.sv', 'II', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Beca Cancelada', 'FOM'),
('2013-SA-SAT-0014', 'Mirna Raquel GalÃ¡n Alvarenga', 2014, 'mirna.alvarenga@oportunidades.org.sv', 'TE', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 4, 'Graduado', 'FOM'),
('2013-SA-SAT-0015', 'Cesar Daniel GaldÃ¡mez Orellana', 2014, 'cesar.galdamez@oportunidades.org.sv', 'TeQIDiurno', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 3, 'Graduado', 'FOM'),
('2013-SA-SAT-0018', 'Berta Carolina Guerra Castro', 2014, 'carolina.guerra@oportunidades.org.sv', 'TE', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0019', 'Roxana Patricia Guillen Chicas', 2014, 'roxana.guillen@oportunidades.org.sv', 'LeEeII', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'CrÃ©dito Educativo', 'FOM'),
('2013-SA-SAT-0022', 'Ana Maria Lemus CalderÃ³n', 2014, 'ana.lemus@oportunidades.org.sv', 'DSeCP', 'APAC SS', 'F', 'Activo', 'EST005', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0024', 'Ana Iris MarÃ­n Salazar', 2014, 'ana.marin@oportunidades.org.sv', 'TeII', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0026', 'Fatima Vanessa MartÃ­nez Figueroa', 2014, 'vanessa.martinez@oportunidades.org.sv', 'PeI', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0027', 'Keily Yamileth MartÃ­nez Flores', 2014, 'keily.martinez@oportunidades.org.sv', 'LeEeII', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Beca Cancelada', 'FOM'),
('2013-SA-SAT-0028', 'JosÃ© Eduardo Monge', 2014, 'jose.monge@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0029', 'Damaris Ester Morales Aguilar', 2014, 'damaris.morales@oportunidades.org.sv', 'DSeCP', 'APAC SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0030', 'Noel Eduardo MorÃ¡n GaldÃ¡mez', 2014, 'noel.moran@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0032', 'Marvin Ernesto Moran Ortiz', 2014, 'marvin.moran@oportunidades.org.sv', 'IE', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2013-SA-SAT-0033', 'Erika Beatriz Ochoa Rosales', 2014, 'erika.ochoa@oportunidades.org.sv;', 'TeQIDiurno', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0035', 'Jonathan Antonio Polanco AlemÃ¡n', 2014, 'jonathan.polanco@oportunidades.org.sv', 'TeIC', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 3, 'Graduado', 'FOM'),
('2013-SA-SAT-0036', 'Ricardo Rafael Polanco Ãvalos', 2014, 'ricardo.polanco@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0038', 'Josselyn Carolina Ramirez Flores', 2014, 'josselyn.ramirez@oportunidades.org.sv', 'TeIE', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0040', 'Tania Julissa Ramos Hidalgo', 2014, 'tania.ramos@oportunidades.org.sv', 'LeEceeEB', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'CrÃ©dito Educativo', 'FOM'),
('2013-SA-SAT-0041', 'Nestor Israel Recinos Melara', 2014, 'nestor.recinos@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0042', 'Adriana Maricela Rios Alarcon', 2014, 'adriana.rios@oportunidades.org.s', 'LeTUR', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 5, 'CrÃ©dito Educativo', 'FOM'),
('2013-SA-SAT-0043', 'Ingrid Raquel RodrÃ­guez GutiÃ©rrez', 2014, 'ingrid.rodriguez@oportunidades.org.sv', 'LeTUR', 'INICAES', 'M', 'Graduado', 'ESP004', 'SAFT', 'SASAT', 42, 'Becado', 'Financiamiento Propio'),
('2013-SA-SAT-0045', 'Erick Vladimir Ruiz AlcÃ¡ntara', 2014, 'erick.ruiz@oportunidades.org.sv', 'LeEeII', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2013-SA-SAT-0046', 'Mariela Ester Salazar', 2014, 'mariela.salazar@oportunidades.org.sv', 'TE', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 2, 'Graduado', 'FOM'),
('2013-SA-SAT-0047', 'Gabriela SaraÃ­ Sandoval Aquino', 2014, 'gabriela.sandoval@oportunidades.org.sv;', 'LePSIC', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2013-SA-SAT-0048', 'Jacqueline Michelle SolÃ­s Cruz', 2014, 'jacqueline.solis@oportunidades.org.sv;', 'DSeCP', 'APAC SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0049', 'Victor Antonio Tenas SÃ¡nchez', 2014, 'victor.tenas@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0050', 'Edgardo Vladimir Trejo CÃ³rtez', 2014, 'edgardo.trejo@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0051', 'Josseline Elizabeth UmaÃ±a GarcÃ­a', 2014, 'josseline.umana@oportunidades.org.sv', 'DSeCP', 'APAC SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0052', 'Alexander Alfredo Valle Zometa', 2014, 'alexander.valle@oportunidades.org.sv', 'LeLC', 'UNASA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'CrÃ©dito Educativo', 'FOM'),
('2013-SA-SAT-0053', 'Susana Margarita ZarceÃ±o Salazar', 2014, 'susana.zarceno@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Graduado', 'FOM'),
('2013-SA-SAT-0054', 'Adriana Julissa Zuniga Vega', 2014, 'adriana.zuniga@oportunidades.org.sv', 'LeEceeEB', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 31, 'CrÃ©dito Educativo', 'FOM'),
('2014-SA-FT-0005', 'Leslie Gabriela Argumedo Toledo', 2016, 'leslie.argumedo@oportunidades.org.sv', 'LeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Declinado', 'Financiamiento Propio'),
('2014-SA-FT-0006', 'Kelvin Joel Barrientos MagaÃ±a', 2016, 'kelvin.barrientos@oportunidades.org.sv', 'LePSIC', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Beca Cancelada', 'FGK'),
('2014-SA-FT-0007', 'JosÃ© HÃ©ctor BolaÃ±os Guirola', 2016, 'jose.guirola@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 18, 'Graduado', 'FGK'),
('2014-SA-FT-0008', 'Esmeralda Yamileth CÃ¡rdenas Santos', 2016, 'esmeralda.cardenas@oportunidades.org.sv', 'TeII', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 18, 'Graduado', 'FGK'),
('2014-SA-FT-0009', 'Jocelyn Michelle Castaneda Platero', 2016, 'michelle.castaneda@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 79, 'Becado', 'FGK'),
('2014-SA-FT-0012', 'Karla Alejandra Castro PÃ©rez', 2016, 'alejandra.castro@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 5, 'Graduado', 'FGK'),
('2014-SA-FT-0013', 'Stephannie Elizabeth ChÃ¡vez BaÃ±os', 2016, 'stephannie.chavez@oportunidades.org.sv', 'TeQI-Dual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 29, 'CrÃ©dito Educativo', 'FGK'),
('2014-SA-FT-0014', 'Gerson Edgardo Coto RodrÃ­guez', 2016, 'gerson.coto@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 4, 'Graduado', 'FGK'),
('2014-SA-FT-0016', 'Nathalie SaraÃ­ EspaÃ±a Salmeron', 2016, 'nathalie.espana@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 75, 'Becado', 'FGK'),
('2014-SA-FT-0017', 'Kevin Danilo Flores Arriaza', 2016, 'danilo.flores@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 11, 'Graduado', 'FGK'),
('2014-SA-FT-0019', 'Carolina del Carmen GarcÃ­a Arriola', 2016, 'carolina.garcia@oportunidades.org.sv', 'PeI', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 15, 'CrÃ©dito Educativo', 'FGK'),
('2014-SA-FT-0023', 'Diego Alonso GonzÃ¡lez Soriano', 2016, 'diego.gonzalez@oportunidades.org.sv', 'LeB', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2014-SA-FT-0024', 'JosÃ© Adolfo GuadrÃ³n VÃ¡squez', 2016, 'jose.guadron@oportunidades.org.sv', 'IeDdS', 'KU', 'M', 'Activo', 'EST001', 'SAFT', 'SSFT', 24, 'Becado', 'FGK'),
('2014-SA-FT-0026', 'Tatiana Astrid Hidalgo Zelaya', 2016, 'tatiana.hidalgo@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 7, 'CambioTipoCarreraGrad', 'FGK'),
('2014-SA-FT-0028', 'Kenia Jeanmilete Lima Duran', 2016, 'kenia.lima@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 8, 'Graduado', 'FGK'),
('2014-SA-FT-0029', 'Deisy Maribel Lucero MorÃ¡n', 2016, 'deisy.lucero@oportunidades.org.sv', 'TeQI-Dual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 4, 'CrÃ©dito Educativo', 'FGK'),
('2014-SA-FT-0030', 'Melissa Maritza MartÃ­nez Pleitez', 2016, 'melissa.martinez@oportunidades.org.sv', 'IeSI', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 6, 'Beca Cancelada', 'FGK'),
('2014-SA-FT-0033', 'Maria Fernanda Moya Estrada', 2016, 'fernanda.moya@oportunidades.org.sv', 'LePSIC', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2014-SA-FT-0034', 'Bitia Haydee NÃºÃ±ez Matamoros', 2016, 'bitia.nunez@oportunidades.org.sv', 'LeAdE', 'KU', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 39, 'Becado', 'FGK'),
('2014-SA-FT-0035', 'Yesica Karina Osorio MÃ©ndez', 2016, 'yesica.osorio@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 38, 'CrÃ©dito Educativo', 'FGK'),
('2014-SA-FT-0036', 'Alejandro Enrique Quintana Escobar', 2016, 'alejandro.quintana@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SSFT', 2, 'Graduado', 'FGK'),
('2014-SA-FT-0037', 'JosÃ© Rodrigo RamÃ­rez Escobar', 2016, 'rodrigo.ramirez@oportunidades.org.sv', 'PeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 9, 'CrÃ©dito Educativo', 'FGK'),
('2014-SA-FT-0039', 'FÃ¡tima Guadalupe RamÃ­rez MartÃ­nez', 2016, 'guadalupe.ramirez@oportunidades.org.sv', 'TeEID', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 14, 'CrÃ©dito Educativo', 'FGK'),
('2014-SA-FT-0041', 'Elsa Idalia Ramirez VÃ¡squez', 2016, 'elsa.ramirez@oportunidades.org.sv', 'PeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 11, 'CrÃ©dito Educativo', 'FGK'),
('2014-SA-FT-0042', 'Raquel Elizabeth Ramos Acosta', 2016, 'raquel.ramos@oportunidades.org.sv', 'LeTUR', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 71, 'Becado', 'FGK'),
('2014-SA-FT-0044', 'Guadalupe Beatriz Reyes MagaÃ±a', 2016, 'guadalupe.reyes@oportunidades.org.sv', 'TeII', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 18, 'Graduado', 'FGK'),
('2014-SA-FT-0046', 'Gabriela Elizabeth RuÃ­z Bran', 2016, 'gabriela.ruiz@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 80, 'Becado', 'FGK'),
('2014-SA-FT-0048', 'Cristhian Anibal TacÃ³n Sandoval', 2016, 'cristhian.tacon@oportunidades.org.sv', 'LeEeII', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 8, 'Becado', 'FGK'),
('2014-SA-FT-0049', 'Kenia Stephanie Tepas Mazariego', 2016, 'kenia.tepas@oportunidades.org.sv', 'IeSI', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 6, 'Declinado', 'Financiamiento Propio'),
('2014-SA-FT-0051', 'Wendy Julissa Vega Garcia', 2016, 'wendy.vega@oportunidades.org.sv', 'SC', 'SU', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2014-SA-SAT-0002', 'Silvia Guadalupe CalderÃ³n GutiÃ©rrez', 2015, 'silvia.calderon@oportunidades.org.sv', 'LeEcon', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'CrÃ©dito Educativo'),
('2014-SA-SAT-0003', 'Ruth Ester Cardona BaÃ±os', 2015, 'ruth.cardona@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0004', 'Beatriz Adriana Castellanos MÃ©ndez', 2015, 'beatriz.castellanos@oportunidades.org.sv', 'PeI', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'CrÃ©dito Educativo'),
('2014-SA-SAT-0005', 'Alejandra Marcela ChÃ¡vez Anaya', 2015, 'alejandra.chavez@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 10, 'FOM', 'Graduado'),
('2014-SA-SAT-0006', 'Ernesto Douglas Cienfuegos Barrera', 2015, 'ernesto.cienfuegos@oportunidades.org.sv', 'TecIngIN', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0007', 'Cristina Melissa Fajardo', 2015, 'cristina.fajardo@oportunidades.org.sv', 'IQ', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 23, 'Financiamiento Propio', 'Declinado'),
('2014-SA-SAT-0010', 'Ana Guadalupe Flores Murgas', 2015, 'ana.flores@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0011', 'Briant Armando GarcÃ­a MenÃ©ndez', 2015, 'briant.garcia@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 10, 'FOM', 'Graduado'),
('2014-SA-SAT-0012', 'Melissa Guadalupe GarcÃ­a PeÃ±a', 2015, 'melissa.garcia@oportunidades.org.sv', 'LeDG', 'UDJMD', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'CrÃ©dito Educativo'),
('2014-SA-SAT-0013', 'Brayan Salvador GÃ³mez Raymundo', 2015, 'brayan.gomez@oportunidades.org.sv', 'LeCP', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 3, 'FOM', 'CrÃ©dito Educativo'),
('2014-SA-SAT-0014', 'Jessenia Esmeralda Grajeda De LeÃ³n', 2015, 'jessenia.grajeda@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Beca Externa con Apoyo Adicion', 'Graduado'),
('2014-SA-SAT-0017', 'Catherine Stephania HÃ©rcules Villalta', 2015, 'catherine.hercules@oportunidades.org.sv', 'TeDG', 'UFGSS', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0018', 'Carlos JosÃ© HernÃ¡ndez Godoy', 2015, 'carlos.hernandez@oportunidades.org.sv', 'II', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'CrÃ©dito Educativo'),
('2014-SA-SAT-0019', 'Andrea Julissa Lara Valencia', 2015, 'andrea.lara@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0020', 'Iveth Dolores Linares Linares', 2015, 'iveth.linares@oportunidades.org.sv', 'PeI', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'CrÃ©dito Educativo'),
('2014-SA-SAT-0022', 'Stephannie Jeanmillette MartÃ­nez Tejada', 2015, 'stephannie.martinez@oportunidades.org.sv', 'PeEB', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 1, 'FOM', 'CrÃ©dito Educativo'),
('2014-SA-SAT-0023', 'MÃ³nica Alexandra MejÃ­a PeÃ±ate', 2015, 'monica.mejia@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0024', 'Javier Arcadio Morales Aguilar', 2015, 'javier.morales@oportunidades.org.sv', 'IeSI', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 4, 'FOM', 'Graduado'),
('2014-SA-SAT-0025', 'Ana Cecilia Peraza Belloso', 2015, 'ana.peraza@oportunidades.org.sv', 'LeM', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'CrÃ©dito Educativo'),
('2014-SA-SAT-0026', 'Luis Antonio Pineda Guevara', 2015, 'luis.pineda@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0028', 'JosÃ© Alberto Quintana Ascunaga', 2015, 'jose.quintana@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 13, 'FOM', 'Graduado'),
('2014-SA-SAT-0029', 'Jessica Jeanmillette Reyes MagaÃ±a', 2015, 'jessica.reyes@oportunidades.org.sv', 'LeCP', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'CrÃ©dito Educativo'),
('2014-SA-SAT-0030', 'Marina Lisseth Rivera Polanco', 2015, 'marina.rivera@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0031', 'MÃ³nica Cecilia Rivera QuiÃ±onez', 2015, 'monica.rivera@oportunidades.org.sv', 'TeDG', 'UFGSS', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0032', 'Rosa Virginia Rodas MejÃ­a', 2015, 'rosa.rodas@oportunidades.org.sv', 'TeII', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 26, 'FOM', 'Graduado'),
('2014-SA-SAT-0033', 'Aida SofÃ­a Sanabria Duarte', 2015, 'aida.sanabria@oportunidades.org.sv', 'LeA', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Financiamiento Propio', 'Declinado'),
('2014-SA-SAT-0034', 'Cinthya Michelle Solito Deras', 2015, 'cynthia.solito@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'FOM', 'Graduado'),
('2014-SA-SAT-0035', 'Roberto Carlos VÃ¡squez Reyes', 2015, 'roberto.vasquez@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 12, 'FOM', 'Graduado'),
('2015-AH-SAT-0001', 'Milagro Guadalupe Agreda MagaÃ±a', 2016, 'milagro.agreda@oportunidades.org.sv', 'LeCP', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 22, 'Becado', 'BORJA'),
('2015-AH-SAT-0002', 'Julio Eduardo Aguilar GarcÃ­a', 2016, 'julio.aguilar@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 10, 'CambioTipoCarreraGrad', 'BORJA'),
('2015-AH-SAT-0003', 'Yensi Yamileth Aguirre GonzÃ¡lez', 2016, 'yensi.aguirre@oportunidades.org.sv', 'LeCP', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 3, 'Becado', 'BORJA'),
('2015-AH-SAT-0004', 'Fabiola Rosmery Cabezas RodrÃ­guez', 2016, 'fabiola.cabezas@oportunidades.org.sv', 'II', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 43, 'Becado', 'BORJA'),
('2015-AH-SAT-0005', 'Ana Margarita Campos Estrada', 2016, 'ana.campos@oportunidades.org.sv', 'SC', 'SU', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-AH-SAT-0007', 'Karen Abigail Contreras Loarca', 2016, 'karen.contreras@oportunidades.org.sv', 'LeCP', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 42, 'Becado', 'BORJA'),
('2015-AH-SAT-0008', 'Jeamileth del Carmen Corado DÃ­az', 2016, 'jeamileth.corado@oportunidades.org.sv', 'SC', 'SU', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-AH-SAT-0009', 'Eduardo de JesÃºs Corado LÃ³pez', 2016, 'eduardo.corado@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 9, 'CrÃ©dito Educativo', 'BORJA'),
('2015-AH-SAT-0010', 'Karina Elizabeth DÃ­az Reymundo', 2016, 'karina.diaz@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 8, 'Graduado', 'BORJA'),
('2015-AH-SAT-0011', 'Karla Emilia DueÃ±as ArÃ©valo', 2016, 'karla.duenas@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 1, 'CrÃ©dito Educativo', 'BORJA'),
('2015-AH-SAT-0012', 'Paola MarÃ­a Flores FernÃ¡ndez', 2016, 'paola.flores@oportunidades.org.sv', 'LEFE', 'UDJMD', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 23, 'Becado', 'BORJA'),
('2015-AH-SAT-0013', 'AdÃ¡n Edgardo GarcÃ­a Cortez', 2016, 'adan.garcia@oportunidades.org.sv', 'TecIngIN', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 6, 'Graduado', 'BORJA'),
('2015-AH-SAT-0014', 'Ronald Fernando GÃ³mez Trejo', 2016, 'ronald.gomez@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 1, 'Declinado', 'Financiamiento Propio'),
('2015-AH-SAT-0015', 'Rudy Antonio GonzÃ¡lez Aristondo', 2016, 'rudy.gonzalez@oportunidades.org.sv', 'SC', 'SU', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-AH-SAT-0017', 'Pablo AdÃ¡lid IbÃ¡Ã±ez MenÃ©ndez', 2016, 'pablo.ibanez@oportunidades.org.sv', 'LeM', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 42, 'Becado', 'BORJA'),
('2015-AH-SAT-0020', 'JosÃ© David Lemus LÃ³pez', 2016, 'jose.morales@oportunidades.org.sv', 'LeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 10, 'Becado', 'BORJA'),
('2015-AH-SAT-0021', 'Luis Alberto Linares HernÃ¡ndez', 2016, 'luis.linares@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 5, 'Graduado', 'BORJA'),
('2015-AH-SAT-0022', 'Cindy Esmeralda LÃ³pez Escalante', 2016, 'cindy.lopez@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 41, 'Becado', 'BORJA'),
('2015-AH-SAT-0025', 'Salvadora Antonia MartÃ­nez Mendoza', 2016, 'salvadora.martinez@oportunidades.org.sv', 'TecIngIN', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 0, 'Egresado', 'BORJA'),
('2015-AH-SAT-0028', 'Angel Ernesto Mendoza Gervacio', 2016, 'angel.mendoza@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 3, 'Graduado', 'BORJA'),
('2015-AH-SAT-0029', 'MarÃ­a JosÃ© MenÃ©ndez Contreras', 2016, 'maria.menendez@oportunidades.org.sv', 'LeCP', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 44, 'Becado', 'BORJA'),
('2015-AH-SAT-0030', 'Damaris Lisbeth Pineda Barrera', 2016, 'damaris.pineda@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 41, 'Becado', 'BORJA'),
('2015-AH-SAT-0031', 'Laura SofÃ­a Posada Hidalgo', 2016, 'laura.posada@oportunidades.org.sv', 'II', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 0, 'Beca Cancelada', 'BORJA'),
('2015-AH-SAT-0033', 'Carlos Gustavo RamÃ­rez Hidalgo', 2016, 'carlos.ramirez@oportunidades.org.sv', 'TeMA', 'UDB', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 9, 'Graduado', 'BORJA'),
('2015-AH-SAT-0034', 'Bryan RenÃ© Ramos GarcÃ­a', 2016, 'bryan.ramos@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 1, 'Becado', 'BORJA'),
('2015-AH-SAT-0035', 'Glenda Patricia Rivera Recinos', 2016, 'glenda.rivera@oportunidades.org.sv', 'TeQI-Dual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 6, 'CrÃ©dito Educativo', 'BORJA'),
('2015-AH-SAT-0036', 'Diana Esmeralda Rosales Alvarado', 2016, 'diana.rosales@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 39, 'Becado', 'BORJA'),
('2015-AH-SAT-0037', 'Kimberly Angelica Rosales Portillo', 2016, 'kimberly.rosales@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 5, 'Graduado', 'BORJA'),
('2015-AH-SAT-0038', 'Antonio Adolfo RuÃ­z Rivas', 2016, 'antonio.ruiz@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 1, 'CrÃ©dito Educativo', 'BORJA'),
('2015-AH-SAT-0039', 'Kevin Gustavo Santillana GuillÃ©n', 2016, 'kevin.santillana@oportunidades.org.sv', 'IeSI', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 0, 'Beca Cancelada', 'BORJA'),
('2015-AH-SAT-0040', 'Josseline SaraÃ­ Tobar Perdomo', 2016, 'josseline.tobar@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'AHSAT', 27, 'Becado', 'BORJA'),
('2015-AH-SAT-0041', 'Jorge Adalberto Vallecios Lico', 2016, 'jorge.vallecios@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 4, 'Graduado', 'BORJA'),
('2015-AH-SAT-0043', 'Mario Arnoldo Zepeda SolÃ­s', 2016, 'mario.zepeda@oportunidades.org.sv', 'TeMA', 'UDB', 'M', 'Activo', 'EST001', 'SAFT', 'AHSAT', 6, 'Graduado', 'BORJA'),
('2015-CH-SAT-0001', 'Fabio Alejandro Aguilar Urbina', 2016, 'fabio.aguilar@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'M', 'Activo', 'EST001', 'SAFT', 'CHSAT', 7, 'Graduado', 'FOM'),
('2015-CH-SAT-0004', 'Neri Alejandro Alvarado GÃ³mez', 2016, 'neri.alvarado@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'CHSAT', 4, 'Graduado', 'FOM'),
('2015-CH-SAT-0047', 'William Noel Valle GutiÃ©rrez', 2016, 'william.valle@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'M', 'Activo', 'EST001', 'SAFT', 'CHSAT', 0, 'CrÃ©dito Educativo', 'FOM'),
('2015-SA-FT-001', 'Adriana JazmÃ­n HernÃ¡ndez Retana', 2017, 'ana.retana@oportunidades.org.sv', 'LeA', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SA-FT-002', 'Alba NoemÃ­ Escobar MancÃ­a', 2017, 'alba.escobar@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 91, 'Becado', 'FGK'),
('2015-SA-FT-003', 'Amy Stephanie Calidonio MejÃ­a', 2017, 'amy.calidonio@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 34, 'Becado', 'FGK'),
('2015-SA-FT-009', 'Ana Gabriela Hernandez Alvarado', 2017, 'ana.hernandez@oportunidades.org.sv', 'IeSI', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 83, 'Becado', 'FGK'),
('2015-SA-FT-011', 'Birnny Nicolle Mata ArÃ©valo', 2017, 'birnny.mata@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 79, 'Becado', 'FGK'),
('2015-SA-FT-012', 'Brandon Alfonso Valencia Rivera', 2017, 'brandon.valencia@oportunidades.org.sv', 'LeDG', 'UDB', 'M', 'Activo', 'EST001', 'SAFT', 'SSFT', 35, 'Becado', 'FGK'),
('2015-SA-FT-015', 'Daniela Alejandra Nolasco HernÃ¡ndez', 2017, 'daniela.nolasco@oportunidades.org.sv', 'Imac', 'ECdCI', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 38, 'Becado', 'FGK'),
('2015-SA-FT-016', 'Daniela de los Ãngeles Guevara MÃ¡rtir', 2017, 'daniela.guevara@oportunidades.org.sv', 'TeGTdDC', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 13, 'Becado', 'Beca Externa con Apoyo Adicion'),
('2015-SA-FT-020', 'Diego JosÃ© NÃºÃ±ez Salazar', 2017, 'diego.nunez@oportunidades.org.sv', 'LeDG', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 88, 'Becado', 'FGK'),
('2015-SA-FT-021', 'Donald Alexis Medina Montero', 2017, 'donald.medina@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SSFT', 71, 'Becado', 'FGK'),
('2015-SA-FT-023', 'Douglas Alberto Aguilar CaÃ±as', 2017, 'douglas.aguilar@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 31, 'Becado', 'FGK'),
('2015-SA-FT-024', 'Douglas Daniel EmÃ©stica', 2017, 'douglas.emestica@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 31, 'Becado', 'FGK'),
('2015-SA-FT-029', 'Erika Alejandra Ruano Rivera', 2017, 'erika.ruano@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 36, 'Becado', 'FGK'),
('2015-SA-FT-030', 'Ever JosÃ© Guerra Maldonado', 2017, 'ever.guerra@oportunidades.org.sv', 'TeP', 'ECdCI', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 16, 'Becado', 'FGK'),
('2015-SA-FT-031', 'FÃ¡tima QuerÃ©n MartÃ­nez LÃ³pez', 2017, 'queren.martinez@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 4, 'Becado', 'FGK'),
('2015-SA-FT-032', 'Fernanda Gisselle Salinas VÃ¡squez', 2017, 'fernanda.salinas@oportunidades.org.sv', 'LeM', 'UOOBW', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 10, 'Becado', 'Beca Externa con Apoyo Adicion'),
('2015-SA-FT-033', 'Jairo JosuÃ© Agreda Tesorero', 2017, 'jairo.agreda@oportunidades.org.sv', 'LeDG', 'UNASA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 33, 'Becado', 'FGK'),
('2015-SA-FT-036', 'Jane EstefanÃ­a Villeda MirÃ³n', 2017, 'jane.villeda@oportunidades.org.sv', 'LeTS', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 70, 'Becado', 'FGK'),
('2015-SA-FT-037', 'JazmÃ­n Adriana Torres Delzas', 2017, 'jazmin.torres@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 36, 'Becado', 'FGK'),
('2015-SA-FT-039', 'Juan Francisco MartÃ­nez CalderÃ³n', 2017, 'juan.martinez@oportunidades.org.sv', 'LeM', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 35, 'Becado', 'FGK'),
('2015-SA-FT-041', 'Julio Ernesto RuÃ­z Mena', 2017, 'julio.ruiz@oportunidades.org.sv', 'IeSI', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 105, 'Becado', 'FGK'),
('2015-SA-FT-042', 'Kevin Steven Quintanilla CantÃ³n', 2017, 'kevin.quintanilla@oportunidades.org.sv', 'IC', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 17, 'Becado', 'FGK'),
('2015-SA-FT-043', 'Luis Alejandro Carrillo NuÃ±ez', 2017, 'luis.carrillo@oportunidades.org.sv', 'LeDG', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 83, 'Becado', 'FGK'),
('2015-SA-FT-044', 'MarÃ­a Joaquina Maldonado Cristales', 2017, 'maria.maldonado@oportunidades.org.sv', 'II', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 68, 'Becado', 'Beca Externa con Apoyo Adicion'),
('2015-SA-FT-046', 'Melissa Alejandra DueÃ±as Vidal', 2017, 'melissa.vidal@oportunidades.org.sv', 'II', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 42, 'Beca Denegada', 'Financiamiento Propio'),
('2015-SA-FT-048', 'Melissa Elizabeth VelÃ¡squez Carranza', 2017, 'melissa.velasquez@oportunidades.org.sv', 'TeIB', 'UDB', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 39, 'Becado', 'FGK'),
('2015-SA-FT-049', 'Paola Raquel Aguilar Calidonio', 2017, 'paola.aguilar@oportunidades.org.sv', 'IC', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 7, 'Beca Denegada', 'Financiamiento Propio'),
('2015-SA-FT-050', 'Ronald Ernesto Tejada Rios', 2017, 'ronald.tejada@oportunidades.org.sv', 'IeDdS', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 85, 'Pausa', 'Beca Externa con Apoyo Adicion'),
('2015-SA-FT-051', 'Rubidia Ester Sandoval ValdÃ©s', 2017, 'rubidia.sandoval@oportunidades.org.sv', 'LeEeII', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 40, 'Declinado', 'Financiamiento Propio'),
('2015-SA-FT-052', 'Claudia Lissette Castellanos Musun', 2017, 'claudia.castellanos@oportunidades.org.sv', 'LeADyV', 'UFGSS', 'F', 'Activo', 'EST001', 'SAFT', 'SSFT', 53, 'Becado', 'FGK'),
('2015-SA-FT-053', 'Stephannie Beatriz ZÃºniga Zepeda', 2017, 'stephanie.zuniga@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Pausa', 'Beca Externa con Apoyo Adicion'),
('2015-SA-FT-054', 'Wilber Samuel Rivera ChÃ¡vez', 2017, 'wilber.rivera@oportunidades.org.sv', 'TeP', 'ECdCI', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 22, 'Becado', 'FGK'),
('2015-SA-SAT-0001', 'Karen Jeaneth Aguirre MartÃ­nez', 2016, 'karen.aguirre@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 14, 'CrÃ©dito Educativo', 'FOM'),
('2015-SA-SAT-0004', 'Mario CÃ©sar AvilÃ©s RamÃ­rez', 2016, 'mario.aviles@oportunidades.org.sv', 'LeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 30, 'Becado', 'FOM'),
('2015-SA-SAT-0005', 'Yanira Vanessa Barahona MorÃ¡n', 2016, 'yanira.barahona@oportunidades.org.sv', 'DeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SA-SAT-0006', 'Carlos Arnulfo CÃ¡ceres Trujillo', 2016, 'carlos.caceres@oportunidades.org.sv', 'II', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 46, 'Becado', 'FOM'),
('2015-SA-SAT-0007', 'Melvin Gabriel CÃ¡rcamo Reyes', 2016, 'melvin.carcamo@oportunidades.org.sv', 'LeLC', 'UNASA', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 33, 'Becado', 'FOM'),
('2015-SA-SAT-0008', 'Kenia Aida Castillo Heredia', 2016, 'kenia.castillo@oportunidades.org.sv', 'LeC', 'ECMH', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 2, 'Becado', 'FOM'),
('2015-SA-SAT-0009', 'Stephannie RocÃ­o Centeno Flores', 2016, 'stephannie.centeno@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 21, 'CrÃ©dito Educativo', 'FOM'),
('2015-SA-SAT-0010', 'Melvin Fernando Cifuentes Oliva', 2016, 'melvin.cifuentes@oportunidades.org.sv', 'LeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 2, 'Becado', 'FOM'),
('2015-SA-SAT-0013', 'Carlos Eduardo EscalÃ³n Trigueros', 2016, 'carlos.escalon@oportunidades.org.sv', 'TeMAuTo', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 3, 'Beca Cancelada', 'FOM'),
('2015-SA-SAT-0014', 'Claudia Madeline Flamenco ChacÃ³n', 2016, 'claudia.flamenco@oportunidades.org.sv', 'LeEBppySC', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 44, 'Becado', 'FOM'),
('2015-SA-SAT-0015', 'Silvia Michelle Flores Chinchilla', 2016, 'silvia.flores@oportunidades.org.sv', 'II', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 33, 'Becado', 'FOM'),
('2015-SA-SAT-0016', 'Kennette Alejandro Flores Reyes', 2016, 'kennette.flores@oportunidades.org.sv', 'TeEID', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 5, 'CrÃ©dito Educativo', 'FOM'),
('2015-SA-SAT-0017', 'Katherine Marisol GaldÃ¡mez MancÃ­a', 2016, 'katherine.galdamez@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 21, 'Becado', 'FOM'),
('2015-SA-SAT-0018', 'Jacqueline Ester GarcÃ­a CuÃ©llar', 2016, 'jacqueline.garcia@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 9, 'Becado', 'FOM'),
('2015-SA-SAT-0020', 'Katia Abigail GarcÃ­a Linares', 2016, 'katia.garcia@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 11, 'Graduado', 'FOM'),
('2015-SA-SAT-0021', 'Natali Daniela GarcÃ­a RodrÃ­guez', 2016, 'natali.garcia@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 45, 'Becado', 'FOM'),
('2015-SA-SAT-0022', 'EstefanÃ­a Michelle GodÃ­nez Olmedo', 2016, 'michelle.godinez@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 13, 'CrÃ©dito Educativo', 'FOM'),
('2015-SA-SAT-0023', 'Orfa Noemy Heredia UmaÃ±a', 2016, 'orfa.heredia@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 6, 'Graduado', 'FOM'),
('2015-SA-SAT-0024', 'Jeansy Michelle JimÃ©nez Hidalgo', 2016, 'jeansy.jimenez@oportunidades.org.sv', 'LeCQ', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SA-SAT-0025', 'Wilmer Antonio Lemus Ramos', 2016, 'wilmer.lemus@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 15, 'Graduado', 'FOM'),
('2015-SA-SAT-0026', 'Katherine Michelle LeÃ³n Acosta', 2016, 'katherine.leon@oportunidades.org.sv', 'LeMV', 'USAM', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 1, 'Becado', 'FOM'),
('2015-SA-SAT-0027', 'Margarita Elisabet Linares Monterrosa', 2016, 'margarita.linares@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 2, 'CrÃ©dito Educativo', 'FOM'),
('2015-SA-SAT-0028', 'Carlos Manuel LÃ³pez Flores', 2016, 'carlos.flores@oportunidades.org.sv', 'LeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 4, 'Becado', 'FOM'),
('2015-SA-SAT-0029', 'Marlon Ulises LÃ³pez GonzÃ¡lez', 2016, 'marlon.lopez@oportunidades.org.sv', 'TeDdH', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 1, 'Graduado', 'FOM'),
('2015-SA-SAT-0030', 'Oscar Alberto LÃ³pez Vega', 2016, 'oscar.lopez@oportunidades.org.sv', 'LeM', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 50, 'Becado', 'FOM'),
('2015-SA-SAT-0031', 'Nathalie SofÃ­a MartÃ­nez Figueroa', 2016, 'nathalie.martinez@oportunidades.org.sv', 'II', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 49, 'Becado', 'Beca Externa con Apoyo Adicion'),
('2015-SA-SAT-0032', 'Blanca Elizabeth MartÃ­nez Jaco', 2016, 'blanca.martinez@oportunidades.org.sv', 'LeEeII', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 43, 'Becado', 'FOM'),
('2015-SA-SAT-0033', 'Julio Alejandro MartÃ­nez RuÃ­z', 2016, 'julio.martinez@oportunidades.org.sv', 'LeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 12, 'Becado', 'FOM'),
('2015-SA-SAT-0034', 'Aracely Elizabeth Medina Flores', 2016, 'aracely.medina@oportunidades.org.sv', 'LeEeII', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 46, 'Becado', 'FOM'),
('2015-SA-SAT-0035', 'Mario JosÃ© MelÃ©ndez Menjivar', 2016, 'mario.melendez@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 3, 'CrÃ©dito Educativo', 'FOM'),
('2015-SA-SAT-0036', 'Roxana Elizabeth Miranda Mendoza', 2016, 'roxana.miranda@oportunidades.org.sv', 'LeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 27, 'Becado', 'FOM'),
('2015-SA-SAT-0037', 'Daniel Eduardo Moreno GarcÃ­a', 2016, 'daniel.moreno@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 10, 'Graduado', 'FOM'),
('2015-SA-SAT-0038', 'Ligia Marielos MunguÃ­a GarcÃ­a', 2016, 'ligia.munguia@oportunidades.org.sv', 'LeAM', 'EMCGGB', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Beca Cancelada', 'FOM'),
('2015-SA-SAT-0039', 'Alejandra Elizabeth Murgas Cabrera', 2016, 'alejandra.murgas@oportunidades.org.sv', 'DSeCP', 'APAC SA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 5, 'Graduado', 'FOM'),
('2015-SA-SAT-0040', 'Andrea Guadalupe NÃºÃ±ez GÃ³mez', 2016, 'andrea.nunez@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Beca Cancelada', 'FOM'),
('2015-SA-SAT-0041', 'JosÃ© David NÃºÃ±ez Melara', 2016, 'jose.nunez@oportunidades.org.sv', 'IeTyR', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 38, 'Becado', 'FOM'),
('2015-SA-SAT-0042', 'Diana Iveth OcotÃ¡n Morales', 2016, 'diana.ocotan@oportunidades.org.sv', 'DeM', 'UNASA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SA-SAT-0043', 'FÃ¡tima Mariela Orellana MayÃ©n', 2016, 'fatima.orellana@oportunidades.org.sv', 'LePSIC', 'UMA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SA-SAT-0044', 'JosuÃ© Enrique Ponce Castellanos', 2016, 'josue.ponce@oportunidades.org.sv', 'LeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SA-SAT-0045', 'Raquel Abigail Recinos Melara', 2016, 'raquel.recinos@oportunidades.org.sv', 'LeEeII', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 45, 'Becado', 'FOM'),
('2015-SA-SAT-0046', 'Flor de MarÃ­a Regalado MarroquÃ­n', 2016, 'flor.regalado@oportunidades.org.sv', 'TeG', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 2, 'CrÃ©dito Educativo', 'FOM'),
('2015-SA-SAT-0047', 'BenjamÃ­n Esteban Reynosa Salguero', 2016, 'benjamin.reynosa@oportunidades.org.sv', 'IeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 3, 'Becado', 'FOM'),
('2015-SA-SAT-0048', 'Evelyn Lizeth Rodas GarcÃ­a', 2016, 'evelyn.garcia@oportunidades.org.sv', 'IeAGr', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 12, 'Becado', 'FOM'),
('2015-SA-SAT-0049', 'Elena del Socorro RodrÃ­guez UmaÃ±a', 2016, 'elana.rodriguez@oportunidades.org.sv', 'IeLyD', 'UDJMD', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 6, 'Becado', 'FOM'),
('2015-SA-SAT-0050', 'Andrea Fabiola Rojas Aguilar', 2016, 'andrea.rojas@oportunidades.org.sv', 'II', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Becado', 'Beca Externa con Apoyo Adicion'),
('2015-SA-SAT-0052', 'David JosÃ© Sandoval Guardado', 2016, 'david.sandoval@oportunidades.org.sv', 'SC', 'SU', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SA-SAT-0053', 'Glenda Guadalupe SigÃ¼enza Chilin', 2016, 'glenda.siguenza@oportunidades.org.sv', 'TeCP', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 1, 'CrÃ©dito Educativo', 'FOM'),
('2015-SA-SAT-0054', 'Karina Yesenia Tejada Pineda', 2016, 'karina.tejada@oportunidades.org.sv', 'DeM', 'UNASA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SA-SAT-0055', 'Katherine Berenice Tepas Mazariego', 2016, 'katherine.tepas@oportunidades.org.sv', 'DeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 4, 'Declinado', 'Financiamiento Propio'),
('2015-SA-SAT-0056', 'MarÃ­a de los Ãngeles Torrento Andino', 2016, 'maria.torrento@oportunidades.org.sv', 'TeMA', 'UDB', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 5, 'CambioTipoCarreraGrad', 'FOM'),
('2015-SA-SAT-0057', 'Brian Alexander UmaÃ±a GarcÃ­a', 2016, 'brian.umana@oportunidades.org.sv', 'TeMAuTo', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SASAT', 1, 'Graduado', 'FOM');
INSERT INTO `alumnos` (`ID_Alumno`, `Nombre`, `Class`, `correo`, `ID_Carrera`, `ID_Empresa`, `Sexo`, `Estado`, `ID_Status`, `SedeAsistencia`, `ID_Sede`, `TotalTalleres`, `StatusActual`, `FuenteFinacimiento`) VALUES
('2015-SA-SAT-0058', 'Laura Daniela Zometa HernÃ¡ndez', 2016, 'laura.zometa@oportunidades.org.sv', 'TeSI', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SASAT', 1, 'Graduado', 'FOM'),
('2015-SS-FT-0001', 'Eduardo Antonio Aguilar SolÃ³rzano', 2017, 'eduardo.aguilar@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 48, 'Becado', 'FGK'),
('2015-SS-FT-0002', 'Flor de Maria Alvarado Canjura', 2017, 'flor.alvarado@oportunidades.org.sv', 'LeDI', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 7, 'Pausa', 'FGK'),
('2015-SS-FT-0003', 'Daniel Antonio Alvarado HernÃ¡ndez', 2017, 'daniel.alvarado@oportunidades.org.sv', 'IeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 43, 'Becado', 'FGK'),
('2015-SS-FT-0005', 'Paola Sthephany Angel Rodriguez', 2017, 'paola.angel@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 35, 'Becado', 'FGK'),
('2015-SS-FT-0006', 'Fatima Alejandra Arevalo LÃ³pez', 2017, 'fatima.arevalo@oportunidades.org.sv', 'TeMA', 'DA', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 38, 'Becado', 'FGK'),
('2015-SS-FT-0007', 'Raquel Estefany Argueta Alejo', 2017, 'raquel.alejo@oportunidades.org.sv', 'LeFis', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0008', 'AnaÃ­ Michelle AvilÃ©s Castaneda', 2017, 'anai.aviles@oportunidades.org.sv', 'LeEyN', 'ESEN', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 38, 'Becado', 'FGK'),
('2015-SS-FT-0009', 'Fatima del Carmen Ayala', 2017, 'fatima.ayala@oportunidades.org.sv', 'LePSIC', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0010', 'Steven Armando Barrera Iraheta', 2017, 'steven.barrera@oportunidades.org.sv', 'IeSI', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 46, 'Becado', 'FGK'),
('2015-SS-FT-0011', 'Joshua Ernesto Bermudez Garcia', 2017, 'joshua.bermudez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 24, 'Becado', 'FGK'),
('2015-SS-FT-0013', 'Douglas Ernesto Berrios Zepeda', 2017, 'douglas.berrios@oportunidades.org.sv', 'II', 'UDJMD', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0016', 'Miguel Alejandro Carrillo Guerra', 2017, 'miguel.carrillo@oportunidades.org.sv', 'LeM', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 56, 'Becado', 'FGK'),
('2015-SS-FT-0017', 'Nelson Jesus Carrillo Paniagua', 2017, 'nelson.carrillo@oportunidades.org.sv', 'TeMUL', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 6, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0018', 'Joel SalomÃ³n Castillo MÃ¡rquez', 2017, 'joel.castillo@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 39, 'Becado', 'FGK'),
('2015-SS-FT-0022', 'Emerson Edenilson Contreras Reyes', 2017, 'emerson.contreras@oportunidades.org.sv', 'LeC', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 38, 'Becado', 'FGK'),
('2015-SS-FT-0023', 'Magbis Ariel Corea Araujo', 2017, 'magbis.corea@oportunidades.org.sv', 'II', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 49, 'Beca Cancelada', 'Beca Externa con Apoyo Adicion'),
('2015-SS-FT-0025', 'Alejandra Gabriela CortÃ©z', 2017, 'alejandra.cortez@oportunidades.org.sv', 'LeTS', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0026', 'Nayeli Nicole Cortez Barahona', 2017, 'nayeli.cortez@oportunidades.org.sv', 'TeIMDiurna', 'ECdCI', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 5, 'Becado', 'FGK'),
('2015-SS-FT-0028', 'Gabriel AndrÃ©s Cruz Matamorros', 2017, 'gabriel.cruz@oportunidades.org.sv', 'LeA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 3, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0032', 'Arely del Carmen De la O Pozo', 2017, 'arely.delao@oportunidades.org.sv', 'SC', 'UeP', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0033', 'Juan JosÃ© DÃ­az Cruz', 2017, 'juan.diaz@oportunidades.org.sv', 'LeC', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 23, 'Becado', 'FGK'),
('2015-SS-FT-0034', 'Wendy Del Carmen DÃ­az Santillana', 2017, 'wendy.diaz@oportunidades.org.sv', 'LeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 41, 'Becado', 'FGK'),
('2015-SS-FT-0035', 'Sabrina Michelle Dominguez PÃ©rez', 2017, 'sabrina.dominguez@oportunidades.org.sv', 'LeCOMU', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 37, 'Becado', 'FGK'),
('2015-SS-FT-0038', 'Adriana Lourdes DurÃ¡n Reyes', 2017, 'adriana.duran@oportunidades.org.sv', 'II', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 3, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0039', 'Valeria JazmÃ­n DurÃ¡n Rosales', 2017, 'valeria.duran@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 38, 'Becado', 'FGK'),
('2015-SS-FT-0040', 'Anthony Stanley ElÃ­as VÃ¡squez', 2017, 'anthony.elias@oportunidades.org.sv', 'LeCOMU', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 33, 'Becado', 'FGK'),
('2015-SS-FT-0045', 'Sofia Dayana GonzÃ¡lez De EviÃ¡n', 2017, 'sofia.gonzalez@oportunidades.org.sv', 'TeADYV', 'UFGSS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 41, 'Becado', 'FGK'),
('2015-SS-FT-0046', 'David Alexander Gonzalez MartÃ­nez', 2017, 'david.martinez@oportunidades.org.sv', 'TeSI', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 38, 'Becado', 'FGK'),
('2015-SS-FT-0047', 'Roberto Alejandro Gonzalez Montes', 2017, 'roberto.gonzalez@oportunidades.org.sv', 'TeIC', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 5, 'Beca Denegada', 'Financiamiento Propio'),
('2015-SS-FT-0048', 'Adriana Marilyn GonzÃ¡lez Rogel', 2017, 'adriana.gonzalez@oportunidades.org.sv', 'TeCP', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 25, 'Becado', 'FGK'),
('2015-SS-FT-0049', 'Karla Daniela Guerra CalderÃ³n', 2017, 'karla.guerra@oportunidades.org.sv', 'SC', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0050', 'Kenia Jazmin Guillen CalderÃ³n', 2017, 'kenia.guillen@oportunidades.org.sv', 'TeII', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 23, 'Becado', 'FGK'),
('2015-SS-FT-0052', 'Katherine Fabiola HernÃ¡ndez', 2017, 'fabiola.hernandez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 22, 'Becado', 'FGK'),
('2015-SS-FT-0053', 'Diana Vanessa HernÃ¡ndez HernÃ¡ndez', 2017, 'diana.hernandez@oportunidades.org.sv', 'LePSIC', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 47, 'Becado', 'FGK'),
('2015-SS-FT-0054', 'Wilfredo Francisco HernÃ¡ndez MunguÃ­a', 2017, 'wilfredo.munguia@oportunidades.org.sv', 'IeDdS', 'KU', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 14, 'Becado', 'FGK'),
('2015-SS-FT-0057', 'Amanda Nohely HernÃ¡ndez Orellana', 2017, 'amanda.hernandez@oportunidades.org.sv', 'LeCOMU', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 41, 'Becado', 'FGK'),
('2015-SS-FT-0059', 'Marcela Lisseth Jacinto Ã€lvarez', 2017, 'marcela.jacinto@oportunidades.org.sv', 'LeCOMU', 'UDJMD', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 40, 'Becado', 'FGK'),
('2015-SS-FT-0060', 'Lidia Margarita JÃ­menez Rivera', 2017, 'lidia.jimenez@oportunidades.org.sv', 'LePSIC', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 10, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0061', 'Rafael Alexander LÃ©mus Leiva', 2017, 'rafael.lemus@oportunidades.org.sv', 'TeDG', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 20, 'Becado', 'FGK'),
('2015-SS-FT-0062', 'Carolina SaraÃ­ Linares HernÃ¡ndez', 2017, 'carolina.linares@oportunidades.org.sv', 'II', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 44, 'Becado', 'FGK'),
('2015-SS-FT-0065', 'Marina Noemy LÃ³pez Urias', 2017, 'marina.lopez@oportunidades.org.sv', 'TeMERCA', 'UEES', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 41, 'Becado', 'FGK'),
('2015-SS-FT-0066', 'Oscar Alejandro Luna Orellana', 2017, 'oscar.luna@oportunidades.org.sv', 'II', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 45, 'Becado', 'Beca Externa con Apoyo Adicion'),
('2015-SS-FT-0067', 'Salvador Stanley MagaÃ±a Colindres', 2017, 'salvador.magana@oportunidades.org.sv', 'II', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 46, 'Becado', 'FGK'),
('2015-SS-FT-0068', 'Daniel Orlando MÃ¡rquez Saravia', 2017, 'daniel.marquez@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 42, 'Becado', 'FGK'),
('2015-SS-FT-0069', 'Ingrid Fabiola Martinez Carranza', 2017, 'ingrid.martinez@oportunidades.org.sv', 'LeC', 'ECMH', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 31, 'Becado', 'FGK'),
('2015-SS-FT-0070', 'Karen Soraya MartÃ­nez Corbera', 2017, 'karen.martinez@oportunidades.org.sv', 'IeSI', 'ECdCI', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 16, 'Becado', 'FGK'),
('2015-SS-FT-0071', 'Eileen SofÃ­a MartÃ­nez Mena', 2017, 'eileen.martinez@oportunidades.org.sv', 'SC', 'SU', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 7, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0072', 'Paola Estefany MartÃ­nez OrtÃ­z', 2017, 'paola.martinez@oportunidades.org.sv', 'TeC', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 38, 'Becado', 'FGK'),
('2015-SS-FT-0073', 'Wendy Carolina MejÃ­a MartÃ­nez', 2017, 'wendy.mejia@oportunidades.org.sv', 'IeSI', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 10, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0075', 'Karen Stephanie Melara Alas', 2017, 'karen.melara@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 40, 'Becado', 'FGK'),
('2015-SS-FT-0077', 'Damaris Guadalupe MelÃ©ndez Perez', 2017, 'damaris.melendez@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 42, 'Becado', 'FGK'),
('2015-SS-FT-0078', 'Fatima Raquel MembreÃ±o ChÃ¡vez', 2017, 'fatima.membreno@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 23, 'Becado', 'FGK'),
('2015-SS-FT-0082', 'Adriana Beatriz MorÃ¡n PÃ©rez', 2017, 'adriana.moran@oportunidades.org.sv', 'LeEyN', 'ESEN', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 39, 'Becado', 'FGK'),
('2015-SS-FT-0083', 'Gabriel Fernando Navidad DÃ­az', 2017, 'gabriel.navidad@oportunidades.org.sv', 'LeEcon', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Beca Denegada', 'Financiamiento Propio'),
('2015-SS-FT-0084', 'Dejanira Berenice Novoa DÃ­az', 2017, 'dejanira.novoa@oportunidades.org.sv', 'LeEcon', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 6, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0085', 'Vicente de JesÃºs OrtÃ­z Vela', 2017, 'vicente.ortiz@oportunidades.org.sv', 'II', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0086', 'Brayan Adonay PaÃ­z Alfaro', 2017, 'brayan.paiz@oportunidades.org.sv', 'TeSI', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 31, 'Becado', 'FGK'),
('2015-SS-FT-0087', 'Daniel JonatÃ¡n Pineda HernÃ¡ndez', 2017, 'daniel.pineda@oportunidades.org.sv', 'II', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 40, 'Becado', 'FGK'),
('2015-SS-FT-0088', 'Alexis SaÃºl Pineda Melara', 2017, 'alexis.pineda@oportunidades.org.sv', 'LeDG', 'UDJMD', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 18, 'Beca Cancelada', 'FGK'),
('2015-SS-FT-0089', 'Jonathan Edgardo Pineda Ramos', 2017, 'jonathan.pineda@oportunidades.org.sv', 'IeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 51, 'Becado', 'FGK'),
('2015-SS-FT-0092', 'Guadalupe del Carmen RamÃ­rez PÃ©rez', 2017, 'carmen.ramirez@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 39, 'Becado', 'FGK'),
('2015-SS-FT-0093', 'Katherine Yamileth Recinos Martinez', 2017, 'katherine.recinos@oportunidades.org.sv', 'TeG', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0094', 'Iris Aurora Reyes Rodriguez', 2017, 'iris.reyes@oportunidades.org.sv', 'TeII', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 4, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0098', 'Katherine Jazmin Salguero Dominguez', 2017, 'katherine.salguero@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 8, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0099', 'Daniel Eduardo Serpas Rivera', 2017, 'daniel.serpas@oportunidades.org.sv', 'Imac', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 46, 'Becado', 'FGK'),
('2015-SS-FT-0100', 'Katherine Elizabeth Teos', 2017, 'katherine.teos@oportunidades.org.sv', 'SC', 'SU', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 3, 'Declinado', 'Financiamiento Propio'),
('2015-SS-FT-0101', 'Oscar NeptalÃ­ Tisnado Callejas', 2017, 'oscar.tisnado@oportunidades.org.sv', 'TEIDRI', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 37, 'Becado', 'FGK'),
('2015-SS-FT-0103', 'Juan Alberto Urquilla Fuentes', 2017, 'juan.urquilla@oportunidades.org.sv', 'TeDGyTeM', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 48, 'Becado', 'FGK'),
('2015-SS-FT-0104', 'Tatiana Karina Valencia HernÃ¡ndez', 2017, 'tatiana.valencia@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 45, 'Becado', 'FGK'),
('2015-SS-FT-0105', 'Anthony Alexander VasquÃ©z Iraheta', 2017, 'anthony.vasquez@oportunidades.org.sv', 'IeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 59, 'Becado', 'FGK'),
('2015-SS-FT-0106', 'ElÃ­an Emiliano Vasquez Soriano', 2017, 'elian.vasquez@oportunidades.org.sv', 'TeADYV', 'UFGSS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 48, 'Becado', 'FGK'),
('2015-SS-FT-0107', 'Karla MarÃ­a Villalta Flores', 2017, 'karla.villalta@oportunidades.org.sv', 'TeG', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 11, 'Becado', 'FGK'),
('2015-SS-SAT-0002', 'Mauricio Alexander Ãngel Quintanilla', 2016, 'mauricio.angel@oportunidades.org.sv', 'TeDG', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 14, 'Egresado', 'FOM'),
('2015-SS-SAT-0004', 'Hypathia Cristina Campos Chavarria', 2016, 'hypatia.campos@oportunidades.org.sv', 'TEMT', 'UEES', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 7, 'Egresado', 'FOM'),
('2015-SS-SAT-0006', 'Jennifer Gabriela Carrillo Estrada', 2016, 'jenifer.carrillo@oportunidades.org.sv', 'TeP', 'UFGSS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 5, 'Egresado', 'FOM'),
('2015-SS-SAT-0007', 'MarÃ­a JosÃ© Crespin Ramos', 2016, 'maria.crespin@oportunidades.org.sv', 'IQ', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 4, 'Declinado', 'Financiamiento Propio'),
('2015-SS-SAT-0008', 'Luis JosÃ© Cruz MartÃ­nez', 2016, 'jose.cruz@oportunidades.org.sv', 'TeC', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 10, 'Egresado', 'FOM'),
('2015-SS-SAT-0009', 'JosÃ© Enrique Escobar Madrid', 2016, 'jose.escobar@oportunidades.org.sv', 'TeMAuTo', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 4, 'Graduado', 'FOM'),
('2015-SS-SAT-0010', 'Alma Daniela Estrada Martinez', 2016, 'alma.estrada@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 4, 'Beca Cancelada', 'FOM'),
('2015-SS-SAT-0011', 'Isaac Eduardo Flores Alvarado', 2016, 'isaac.flores@oportunidades.org.sv', 'TeCP', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 0, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0012', 'Maria del Carmen Fuentes HernÃ¡ndez', 2016, 'maria.fuentes@oportunidades.org.sv', 'TeCP', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 6, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0013', 'Yeymy Valentina GarcÃ­a Escobar', 2016, 'yeymy.garcia@oportunidades.org.sv', 'DeM', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SS-SAT-0014', 'Bryan Astul GarcÃ­a Lemus', 2016, 'bryan.lemus@oportunidades.org.sv', 'TeMA', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 6, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0015', 'Christopher Moises Gil SÃ¡nchez', 2016, 'christopher.gil@oportunidades.org.sv', 'IeSI', 'UNDESS', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 2, 'Declinado', 'Financiamiento Propio'),
('2015-SS-SAT-0016', 'Yancy Emely GÃ³mez Flores', 2016, 'yancy.gomez@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 9, 'CambioTipoCarreraGrad', 'FOM'),
('2015-SS-SAT-0017', 'Cristian Geovanny Gonzales Escalante', 2016, 'cristian.gonzales@oportunidades.org.sv', 'II', 'UNDESS', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 1, 'Declinado', 'Financiamiento Propio'),
('2015-SS-SAT-0018', 'Jimmy Vladimir Gonzales Menjivar', 2016, 'jimmy.gonzalez@oportunidades.org.sv', 'TeLQDIURNA', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 26, 'Graduado', 'FOM'),
('2015-SS-SAT-0019', 'Gerson ArÃ­stides Guevara HernÃ¡ndez', 2016, 'gerson.guevara@oportunidades.org.sv', 'TeII', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 7, 'Graduado', 'FOM'),
('2015-SS-SAT-0020', 'Roxana Elizabeth Landaverde Marias', 2016, 'roxana.landaverde@oportunidades.org.sv', 'TeCP', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 13, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0022', 'Beatriz Abigail LÃ³pez Zetino', 2016, 'beatriz.lopez@oportunidades.org.sv', 'TeLQDIURNA', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 6, 'Declinado', 'Financiamiento Propio'),
('2015-SS-SAT-0023', 'Esther Karina Lozano Aguilar', 2016, 'esther.lozano@oportunidades.org.sv', 'LeM', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SS-SAT-0024', 'Mario Antonio MejÃ­a Argueta', 2016, 'mario.mejia@oportunidades.org.sv', 'IA', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 49, 'Becado', 'FOM'),
('2015-SS-SAT-0025', 'Josselyn Carolina MelÃ©ndez Rosales', 2016, 'josselyn.melendez@oportunidades.org.sv', 'LeEcon', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 7, 'Declinado', 'Financiamiento Propio'),
('2015-SS-SAT-0026', 'Karla Yessenia Mendoza LÃ³pez', 2016, 'karla.mendoza@oportunidades.org.sv', 'TeCP', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 19, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0028', 'Santiago Monge Rivas', 2016, 'santiago.monge@oportunidades.org.sv', 'IeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 42, 'Becado', 'FOM'),
('2015-SS-SAT-0029', 'Sonia Astrid Nieto Escobar', 2016, 'sonia.nieto@oportunidades.org.sv', 'LeC', 'ECMH', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 38, 'Becado', 'FOM'),
('2015-SS-SAT-0030', 'Kevin Samuel Orellana Vides', 2016, 'kevin.orellana@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 4, 'Beca Cancelada', 'FOM'),
('2015-SS-SAT-0033', 'Valeria Yulisa Peraza Ramos', 2016, 'valeria.peraza@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 4, 'Graduado', 'FOM'),
('2015-SS-SAT-0035', 'Paola Lissette Pineda Benitez', 2016, 'paola.pineda@oportunidades.org.sv', 'TeII', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 7, 'Graduado', 'FOM'),
('2015-SS-SAT-0036', 'Cecilia del Carmen Pleitez Echeverria', 2016, 'cecilia.pleitez@oportunidades.org.sv', 'LeEcon', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 39, 'Becado', 'FOM'),
('2015-SS-SAT-0037', 'Celia VerÃ³nica Pleytez LÃ³pez', 2016, 'celia.pleytez@oportunidades.org.sv', 'TeII', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 3, 'Declinado', 'Financiamiento Propio'),
('2015-SS-SAT-0038', 'Daniela Alejandra Ramirez LÃ³pez', 2016, 'daniela.ramirez@oportunidades.org.sv', 'TE', 'UEES', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 0, 'Beca Cancelada', 'FOM'),
('2015-SS-SAT-0040', 'Helen Guadalupe Ramirez Rivas', 2016, 'helen.ramirez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 11, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0041', 'SofÃ­a Cristina RamÃ­rez Urquilla', 2016, 'sofia.ramirez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 8, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0043', 'Lisbeth SaraÃ­ Recinos Marroquin', 2016, 'lisbeth.recinos@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 13, 'Graduado', 'FOM'),
('2015-SS-SAT-0044', 'Sara SofÃ­a Renderos CalderÃ³n', 2016, 'sara.renderos@oportunidades.org.sv', 'TeIC', 'TCHA', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 0, 'Graduado', 'FOM'),
('2015-SS-SAT-0045', 'Doris del Carmen Rodriguez Marroquin', 2016, 'doris.rodriguez@oportunidades.org.sv', 'LeEcon', 'UDJMD', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 45, 'Becado', 'FOM'),
('2015-SS-SAT-0046', 'Evelyn Gabriela Rosa JuÃ¡rez', 2016, 'evelyn.rosa@oportunidades.org.sv', 'DSeCP', 'APAC SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 3, 'Graduado', 'FOM'),
('2015-SS-SAT-0047', 'Rosa Luz SÃ¡nchez Castellanos', 2016, 'rosa.sanchesz@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 1, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0048', 'CÃ©sar Kevin SÃ¡nchez GarcÃ­a', 2016, 'cesar.sanchez@oportunidades.org.sv', 'TeSI', 'UFGSS', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 5, 'Graduado', 'FOM'),
('2015-SS-SAT-0049', 'Alexander Enrique SÃ¡nchez Orellana', 2016, 'alexander.sanchez@oportunidades.org.sv', 'IeSI', 'UNDESS', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 0, 'Declinado', 'Financiamiento Propio'),
('2015-SS-SAT-0050', 'Miguel Evaristo SÃ¡nchez SÃ¡nchez', 2016, 'miguel.sanchez@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 0, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0051', 'Haarlem Ivette Saravia Abarca', 2016, 'haarlem.saravia@oportunidades.org.sv', 'TeMA', 'DA', 'F', 'Activo', 'EST001', 'SSFT', 'SSSAT', 20, 'Egresado', 'FOM'),
('2015-SS-SAT-0053', 'Edwin Eduardo Torres PÃ©rez', 2016, 'edwin.torres@oportunidades.org.sv', 'PeI', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 47, 'Becado', 'FOM'),
('2015-SS-SAT-0054', 'AndrÃ©s Aquino VÃ¡squez', 2016, 'andres.aquino@oportunidades.org.sv', 'TeCP', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 0, 'CrÃ©dito Educativo', 'FOM'),
('2015-SS-SAT-0055', 'Juan Javier Zelada Jovel', 2016, 'juan.zelada@oportunidades.org.sv', 'LeC', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 9, 'Becado', 'FOM'),
('2015-SS-SAT-0056', 'Susana Arely Ramos PÃ©rez', 2016, 'susana.ramos@oportunidades.org.sv', 'TeMERCA', 'UPDES', 'M', 'Activo', 'EST001', 'SSFT', 'SSSAT', 36, 'CrÃ©dito Educativo', 'FOM'),
('2016-SA-FT-003', 'Wendy Marielos Alvarado GarcÃ­a', 2018, 'wendy.alvarado@oportunidades.org.sv', 'TeG', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 2, 'Becado', 'FGK'),
('2016-SA-FT-0038', 'Jennifer Lorena Castro Aguilar', 2018, 'jennifer.castro@oportunidades.org.sv', 'LeDG', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 21, 'Becado', 'FGK'),
('2016-SA-FT-0047', 'Nancy Gabriela PÃ©rez Ãlvarez', 2018, 'nancy.perez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 26, 'Becado', 'FGK'),
('2016-SA-FT-006', 'Magerly EpifanÃ­a Avelar Avelar', 2018, 'magerly.avelar@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 15, 'Becado', 'FGK'),
('2016-SA-FT-009', 'Odalis Alexandra Barillas GarcÃ­a', 2018, 'odalis.barillas@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 23, 'Becado', 'FGK'),
('2016-SA-FT-010', 'JosÃ© Efrain CalderÃ³n Calasin', 2018, 'jose.calderon@oportunidades.org.sv', 'PeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 24, 'Becado', 'FGK'),
('2016-SA-FT-011', 'Ronald Alexis CalderÃ³n Flores', 2018, 'ronald.calderon@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 18, 'Becado', 'FGK'),
('2016-SA-FT-013', 'Wilber Antonio Candelario Contreras', 2018, 'wilber.candelario@oportunidades.org.sv', 'LeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 22, 'Becado', 'FGK'),
('2016-SA-FT-017', 'Mayra Elizabeth Centeno AlarcÃ³n', 2018, 'mayra.centeno@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 14, 'Becado', 'FGK'),
('2016-SA-FT-018', 'CaÃ­n de JesÃºs Cerna Nerio', 2018, 'cain.cerna@oportunidades.org.sv', 'LeCP', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 28, 'Becado', 'FGK'),
('2016-SA-FT-019', 'Jacqueline Emperatriz Cubas Depaz', 2018, 'jacquelinne.cubas@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 20, 'Becado', 'FGK'),
('2016-SA-FT-022', 'Magaly Sthephany Flores Arriola', 2018, 'magaly.flores@oportunidades.org.sv', 'LeB', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 8, 'Pausa', 'FGK'),
('2016-SA-FT-024', 'Angela Gabriela GarcÃ­a Pichinte', 2018, 'angela.garcia@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 25, 'Becado', 'FGK'),
('2016-SA-FT-026', 'Kevin JosuÃ© GÃ³mez Melgar', 2018, 'kevin.gomez@oportunidades.org.sv', 'TeIMDual', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 13, 'Becado', 'FGK'),
('2016-SA-FT-027', 'Lizbeth Beatriz GonzÃ¡lez ArdÃ³n', 2018, 'lizbeth.gonzales@oportunidades.org.sv', 'LeADyV', 'UFGSS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 17, 'Becado', 'FGK'),
('2016-SA-FT-032', 'Katherinne Milena HernÃ¡ndez RodrÃ­guez', 2018, 'katherinne.hernandez@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 22, 'Becado', 'FGK'),
('2016-SA-FT-033', 'Paola Guadalupe HernÃ¡ndez Vicente', 2018, 'paola.hernandez@oportunidades.org.sv', 'TeMA', 'DA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 9, 'Becado', 'FGK'),
('2016-SA-FT-036', 'Adriana JazmÃ­n Linares HernÃ¡ndez', 2018, 'adriana.linares@oportunidades.org.sv', 'LeM', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 17, 'Becado', 'FGK'),
('2016-SA-FT-037', 'Iris de MarÃ­a LÃ³pez Castillo', 2018, 'iris.lopez@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 19, 'Becado', 'FGK'),
('2016-SA-FT-039', 'Sara Ivette Mena GonzÃ¡lez', 2018, 'sara.mena@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 4, 'Pausa', 'FGK'),
('2016-SA-FT-044', 'Sharon Elisa MorÃ¡n Aldana', 2018, 'sharon.moran@oportunidades.org.sv', 'II', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 2, 'Declinado', 'Financiamiento Propio'),
('2016-SA-FT-045', 'Rodrigo Alejandro MorÃ¡n MagaÃ±a', 2018, 'rodrigo.moran@oportunidades.org.sv', 'LeAdE', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 25, 'Becado', 'FGK'),
('2016-SA-FT-048', 'Xavier Alexander PeÃ±ate DueÃ±as', 2018, 'xavier.penate@oportunidades.org.sv', 'LeCP', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 23, 'Becado', 'FGK'),
('2016-SA-FT-049', 'Marjorie Esmeralda Castellanos Musun', 2018, 'marjorie.castellanos@oportunidades.org.sv', 'LeDG', 'UFGSS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 17, 'Becado', 'FGK'),
('2016-SA-FT-050', 'Gustavo Enrique PÃ©rez DÃ­az', 2018, 'enrique.perez@oportunidades.org.sv', 'LeCP', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 25, 'Becado', 'FGK'),
('2016-SA-FT-052', 'HÃ©ctor Antonio Platero Esquivel', 2018, 'hector.platero@oportunidades.org.sv', 'IM', 'ECdCI', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 4, 'Becado', 'FGK'),
('2016-SA-FT-053', 'Katerin Roxana Ponce Quijano', 2018, 'katerin.ponce@oportunidades.org.sv', 'LeEyN', 'ESEN', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 23, 'Becado', 'FGK'),
('2016-SA-FT-054', 'Stephanie Yamileth QuiÃ±onez Mata', 2018, 'stephanie.quinonez@oportunidades.org.sv', 'TeAGRONO', 'ENA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2016-SA-FT-055', 'Kenia Patricia RamÃ­rez GarcÃ­a', 2018, 'kenia.ramirez@oportunidades.org.sv', 'LeAdE', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 19, 'Becado', 'FGK'),
('2016-SA-FT-057', 'Dayana Nicolle RodrÃ­guez Sagastume', 2018, 'dayana.rodriguez@oportunidades.org.sv', 'LeM', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 23, 'Becado', 'FGK'),
('2016-SA-FT-059', 'Paola Noemy Ronquillo Aldana', 2018, 'paola.ronquillo@oportunidades.org.sv', 'LeG', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado', 'Financiamiento Propio'),
('2016-SA-FT-060', 'Melanie Giselle SÃ¡nchez MÃ©ndez', 2018, 'melanie.sanchez@oportunidades.org.sv', 'TeMA', 'DA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 7, 'Becado', 'FGK'),
('2016-SA-FT-061', 'Diego JosÃ© Saravia ZaldaÃ±a', 2018, 'diego.saravia@oportunidades.org.sv', 'Imac', 'ECdCI', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 3, 'Becado', 'FGK'),
('2016-SA-FT-062', 'Gerson ElÃ­ ServellÃ³n VÃ¡squez', 2018, 'gerson.servellon@oportunidades.org.sv', 'LeIIOE', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Beca Denegada', 'Financiamiento Propio'),
('2016-SA-FT-065', 'Bryan Alexis Vanegas Molina', 2018, 'bryan.vanegas@oportunidades.org.sv', 'LeDG', 'UNASA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'Beca Externa con Apoyo Adicion'),
('2016-SA-FT-066', 'Kathya Lisbeth Villeda Rivera', 2018, 'kathya.villeda@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 26, 'Becado', 'FGK'),
('2016-SA-FT-067', 'Jose Ricardo Zuna Morales', 2018, 'jose.zuna@oportunidades.org.sv', 'LeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 4, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0001', 'Ingrid MarÃ­a Acevedo Ulloa', 2018, 'ingrid.acevedo@oportunidades.org.sv', 'LeA', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 19, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0002', 'Gabriela Alejandra Aguirre Ventura', 2018, 'gabriela.aguirre@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 27, 'Becado', 'FGK'),
('2016-SS-FT-0004', 'Eduardo Antonio Alfaro Aguilar', 2018, 'eduardo.alfaro@oportunidades.org.sv', 'TeSI', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 32, 'Becado', 'FGK'),
('2016-SS-FT-0006', 'Alejandra SofÃ­a Amaya Miranda', 2018, 'alejandra.amaya@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 16, 'Becado', 'FGK'),
('2016-SS-FT-0007', 'Brenda Abigail Argueta Maravilla', 2018, 'brenda.argueta@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 36, 'Becado', 'FGK'),
('2016-SS-FT-0008', 'Elvis NoÃ© Argueta CalderÃ³n', 2018, 'elvis.argueta@oportunidades.org.sv', 'LeM', 'UNDESS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 7, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0010', 'Miguel Angel Barahona GarcÃ­a', 2018, 'miguel.barahona@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 31, 'Becado', 'FGK'),
('2016-SS-FT-0011', 'Alexia SaraÃ­ BeltrÃ¡n', 2018, 'alexia.beltran@oportunidades.org.sv', 'LeEyN', 'ESEN', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 21, 'Becado', 'FGK'),
('2016-SS-FT-0012', 'Giovanny Ernesto Blanco MorÃ¡n', 2018, 'giovanny.blanco@oportunidades.org.sv', 'IQ', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 17, 'Becado', 'FGK'),
('2016-SS-FT-0013', 'Vladimir Estuardo CÃ¡ceres Aguirre', 2018, 'vladimir.caceres@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 34, 'Becado', 'FGK'),
('2016-SS-FT-0014', 'MarÃ­a Gabriela CÃ¡ceres HenrÃ­quez', 2018, 'maria.caceres@oportunidades.org.sv', 'TE', 'UEES', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 18, 'Becado', 'FGK'),
('2016-SS-FT-0015', 'Juan Manuel CanÃ­z GarcÃ­a', 2018, 'juan.caniz@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 20, 'Becado', 'FGK'),
('2016-SS-FT-0017', 'Rosa Alejandra Casco Fuentes', 2018, 'rosa.casco@oportunidades.org.sv', 'LeC', 'ECMH', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 23, 'Becado', 'FGK'),
('2016-SS-FT-0018', 'Gerardo Xavier Castillo del Cid', 2018, 'xavier.castillo@oportunidades.org.sv', 'LeDE', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 31, 'Becado', 'FGK'),
('2016-SS-FT-0021', 'Katherine Abigail ChÃ¡vez Cruz', 2018, 'katherine.chavez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 29, 'Becado', 'FGK'),
('2016-SS-FT-0023', 'Cristian Eduardo Cornejo Zavala', 2018, 'cristian.cornejo@oportunidades.org.sv', 'Imac', 'ECdCI', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 11, 'Becado', 'FGK'),
('2016-SS-FT-0024', 'Kenya Lisbeth Cruz Ayala', 2018, 'kenya.cruz@oportunidades.org.sv', 'TeP', 'UFGSS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 24, 'Becado', 'FGK'),
('2016-SS-FT-0025', 'Rodrigo Alberto Cruz RamÃ­rez', 2018, 'rodrigo.cruz@oportunidades.org.sv', 'TeMUL', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 15, 'Becado', 'FGK'),
('2016-SS-FT-0026', 'Ana Sofia Cuestas Blanco', 2018, 'ana.cuestas@oportunidades.org.sv', 'TeDG', 'UFGSS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 23, 'Becado', 'FGK'),
('2016-SS-FT-0027', 'SofÃ­a Abigail Fiallos RamÃ­rez', 2018, 'sofia.fiallos@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 24, 'Becado', 'FGK'),
('2016-SS-FT-0028', 'Ã“scar Ariel Garcia Bonilla', 2018, 'oscar.garcia@oportunidades.org.sv', 'LeDE', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 14, 'Becado', 'FGK'),
('2016-SS-FT-0030', 'Christian Edgardo Gil Flores', 2018, 'christian.gil@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 9, 'Becado', 'FGK'),
('2016-SS-FT-0033', 'Laura Jennifer Guevara GÃ³mez', 2018, 'laura.guevara@oportunidades.org.sv', 'II', 'ECdCI', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 14, 'Becado', 'FGK'),
('2016-SS-FT-0034', 'Paola Elizabeth HenrÃ­quez Romero', 2018, 'paola.henriquez@oportunidades.org.sv', 'LeCOMU', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 24, 'Becado', 'FGK'),
('2016-SS-FT-0035', 'Mario Humberto HernÃ¡ndez Guerrero', 2018, 'mario.hernandez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 20, 'Becado', 'FGK'),
('2016-SS-FT-0036', 'Jairo JosÃ© HernÃ¡ndez Abrego', 2018, 'jairo.hernandez@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 25, 'Becado', 'FGK'),
('2016-SS-FT-0037', 'Thelma Carolina HernÃ¡ndez Contreras', 2018, 'thelma.hernandez@oportunidades.org.sv', 'TeII', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 20, 'Pausa', 'FGK'),
('2016-SS-FT-0038', 'Katherine Nayeli HernÃ¡ndez Flores', 2018, 'nayeli.hernandez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 26, 'Becado', 'FGK'),
('2016-SS-FT-0039', 'Mauricio Caleb HernÃ¡ndez HernÃ¡ndez', 2018, 'mauricio.hernandez@oportunidades.org.sv', 'IeDdS', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 8, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0040', 'Irma Gabriela HernÃ¡ndez MartÃ­nez', 2018, 'irma.hernandez@oportunidades.org.sv', 'IeSI', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 23, 'Becado', 'FGK'),
('2016-SS-FT-0042', 'Bryan Arnold Herrera Alfaro', 2018, 'bryan.herrera@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 35, 'Becado', 'FGK'),
('2016-SS-FT-0043', 'Erika Lisseth JoaquÃ­n JuÃ¡rez', 2018, 'erika.joaquin@oportunidades.org.sv', 'TeQI-Dual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 18, 'Becado', 'FGK'),
('2016-SS-FT-0044', 'Raquel Elizabeth Jorge Carrillo', 2018, 'raquel.jorge@oportunidades.org.sv', 'TeCP', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 31, 'Becado', 'FGK'),
('2016-SS-FT-0046', 'Douglas Alexander JuÃ¡rez Rosales', 2018, 'douglas.juarez@oportunidades.org.sv', 'II', 'ESEN', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 30, 'Becado', 'FGK'),
('2016-SS-FT-0047', 'Martha AngÃ©lica LarÃ­n Guevara', 2018, 'martha.larin@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 20, 'Becado', 'FGK'),
('2016-SS-FT-0050', 'Milena Astrid LÃ³pez MartÃ­nez', 2018, 'milena.lopez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 26, 'Becado', 'FGK'),
('2016-SS-FT-0051', 'Rodrigo JosuÃ© Loza Cabrera', 2018, 'rodrigo.loza@oportunidades.org.sv', 'TeMOMI', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 14, 'Becado', 'FGK'),
('2016-SS-FT-0052', 'Alejandra Isabel Machado CaÃ±as', 2018, 'alejandra.machado@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 19, 'Pausa', 'FGK'),
('2016-SS-FT-0054', 'Geraldina Tatiana Marin Campos', 2018, 'geraldina.marin@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 19, 'Becado', 'FGK'),
('2016-SS-FT-0056', 'Zuleima Guadalupe Martell Leiva', 2018, 'zuleima.martell@oportunidades.org.sv', 'LeM', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 37, 'Becado', 'FGK'),
('2016-SS-FT-0058', 'Ingrid SaraÃ­ MartÃ­nez Guardado', 2018, 'sarai.martinez@oportunidades.org.sv', 'II', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 11, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0059', 'Darlyn Elizabeth MartÃ­nez MartÃ­nez', 2018, 'darlyn.martinez@oportunidades.org.sv', 'TeDG', 'UFGSS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 30, 'Becado', 'FGK'),
('2016-SS-FT-0060', 'Allison Roxana MejÃ­a NuÃ±ez', 2018, 'allison.mejia@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 14, 'Becado', 'FGK'),
('2016-SS-FT-0061', 'Paola Stephanie Mejia HernÃ¡ndez', 2018, 'paola.mejia@oportunidades.org.sv', 'TeCP', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 32, 'Becado', 'FGK'),
('2016-SS-FT-0064', 'Ricardo JosÃ© MÃ©ndez LÃ³pez', 2018, 'ricardo.mendez@oportunidades.org.sv', 'IIFOR', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 23, 'Becado', 'FGK'),
('2016-SS-FT-0065', 'Oscar Alexander MenÃ©ndez Abarca', 2018, 'oscar.menendez@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 8, 'Beca Cancelada', 'FGK'),
('2016-SS-FT-0067', 'Jennifer Maritza Minero MorÃ¡n', 2018, 'jennifer.minero@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 21, 'Becado', 'FGK'),
('2016-SS-FT-0068', 'Gladis Marlene Miranda Valladares', 2018, 'gladis.miranda@oportunidades.org.sv', 'TeIC', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 31, 'Becado', 'FGK'),
('2016-SS-FT-0069', 'LucÃ­a Guadalupe Molina', 2018, 'lucia.molina@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 25, 'Becado', 'FGK'),
('2016-SS-FT-0070', 'Erika Roxana Montano MuÃ±oz', 2018, 'erika.montano@oportunidades.org.sv', 'II', 'UTDP', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 5, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0072', 'Henry James Monterroza DÃ­az', 2018, 'henry.monterroza@oportunidades.org.sv', 'IeSI', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 24, 'Pausa', 'FGK'),
('2016-SS-FT-0073', 'Gabriela Beatriz Moreno Ventura', 2018, 'gabriela.moreno@oportunidades.org.sv', 'TeCP', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 34, 'Becado', 'FGK'),
('2016-SS-FT-0075', 'Kevin Eleazar MuÃ±oz CÃ¡ceres', 2018, 'kevin.munoz@oportunidades.org.sv', 'TeQIDiurno', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 30, 'Becado', 'FGK'),
('2016-SS-FT-0076', 'Alejandra MarÃ­a MuÃ±os Vargas', 2018, 'alejandra.munoz@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 33, 'Becado', 'FGK'),
('2016-SS-FT-0077', 'Francisco Alejandro Murillo Oviedo', 2018, 'francisco.murillo@oportunidades.org.sv', 'IeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 27, 'Becado', 'FGK'),
('2016-SS-FT-0079', 'Gabriela Adelina OrdoÃ±ez HernÃ¡ndez', 2018, 'gabriela.ordonez@oportunidades.org.sv', 'LeDE', 'ECMH', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 24, 'Becado', 'FGK'),
('2016-SS-FT-0081', 'Michael Douglas Padilla', 2018, 'michael.padilla@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 20, 'Becado', 'FGK'),
('2016-SS-FT-0083', 'Carlos Eduardo PeÃ±ate Salazar', 2018, 'carlos.penate@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 24, 'Becado', 'FGK'),
('2016-SS-FT-0086', 'Carolina Isabel Pineda Delgado', 2018, 'carolina.pineda@oportunidades.org.sv', 'IeSI', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 7, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0087', 'Emely YasmÃ­n Portillo Villalobos', 2018, 'emely.portillo@oportunidades.org.sv', 'II', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 13, 'Becado', 'FGK'),
('2016-SS-FT-0089', 'Carlos Armando Portillo MÃ©ndez', 2018, 'carlos.portillo@oportunidades.org.sv', 'II', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 21, 'Becado', 'FGK'),
('2016-SS-FT-0091', 'Oscar Alexander RamÃ­rez Ventura', 2018, 'oscar.ramirez@oportunidades.org.sv', 'TeMA', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0092', 'Gloria Damaris Ramos Galeas', 2018, 'gloria.ramos@oportunidades.org.sv', 'II', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 13, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0093', 'Giovanni Stanley Reyes Ãlvarez', 2018, 'geovanni.reyes@oportunidades.org.sv', 'Imac', 'ECdCI', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2016-SS-FT-0094', 'Pamela Madahy Reyes GonzÃ¡lez', 2018, 'pamela.reyes@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 16, 'Becado', 'FGK'),
('2016-SS-FT-0095', 'Carlos MoisÃ©s Reyes MartÃ­nez', 2018, 'carlos.reyes@oportunidades.org.sv', 'TeMA', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 22, 'Becado', 'FGK'),
('2016-SS-FT-0097', 'Jacqueline Beatriz Romero Carmona', 2018, 'jacqueline.romero@oportunidades.org.sv', 'LeCOMU', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 14, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0098', 'Adelina del Carmen Rosales Castillo', 2018, 'adelina.rosales@oportunidades.org.sv', 'LeM', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 22, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0099', 'Katherine Andrea Sanchez Alvarado', 2018, 'katherine.sanchez@oportunidades.org.sv', 'LeAdE', 'UDJMD', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 31, 'Becado', 'FGK'),
('2016-SS-FT-0100', 'Axel Daniel Sanchez Rivera', 2018, 'axel.sanchez@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 11, 'Becado', 'FGK'),
('2016-SS-FT-0102', 'Angela Antonia Say MenjÃ­var', 2018, 'angela.say@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 15, 'Becado', 'FGK'),
('2016-SS-FT-0103', 'Mariam Ivone SigÃ¼enza HernÃ¡ndez', 2018, 'mariam.siguenza@oportunidades.org.sv', 'LeM', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 32, 'Becado', 'FGK'),
('2016-SS-FT-0104', 'Katherine Esmeralda Tejada Rodas', 2018, 'katherine.tejada@oportunidades.org.sv', 'TeC', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 25, 'Becado', 'FGK'),
('2016-SS-FT-0107', 'Natalia Araceli VÃ¡quez Andrade', 2018, 'natalia.vasquez@oportunidades.org.sv', 'LeCJ', 'UDJMD', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 30, 'Becado', 'FGK'),
('2016-SS-FT-0109', 'Diego Alejandro VelÃ¡squez GÃ³mez', 2018, 'diego.velasquez@oportunidades.org.sv', 'IeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 27, 'Becado', 'FGK'),
('2016-SS-FT-0110', 'JosÃ© Emanuel Villalobos SÃ¡nches', 2018, 'jose.villalobos@oportunidades.org.sv', 'LeCP', 'UNDESS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 3, 'Declinado', 'Financiamiento Propio'),
('2016-SS-FT-0111', 'Fernando Enrique Villanueva LÃ³pez', 2018, 'fernando.villanueva@oportunidades.org.sv', 'IeSI', 'ECdCI', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 8, 'Becado', 'FGK'),
('2016-SS-FT-0112', 'Alejandra Victoria Villatoro Palacios', 2018, 'alejandra.villatoro@oportunidades.org.sv', 'TAYPDV', 'UFGSS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 29, 'Becado', 'FGK'),
('2016-SS-FT-0113', 'Kenia Lissette Alberto Cruz', 2018, 'kenia.alberto@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 23, 'Becado', 'FGK'),
('2017-SA-FT-0001', 'Alejandra AbigaÃ­l JimÃ©nez Torres', 2019, 'alejandra.jimenez@oportunidades.org.sv', 'LeFis', 'UNASA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0002', 'Alexandra Michelle Genovez Quintana ', 2019, 'alexandra.genovez@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0003', 'Andrea Liliana Aguilar Cruz', 2019, 'andrea.aguilar@oportunidades.org.sv', 'IeDdS', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0004', 'Andrea MarÃ­a JimÃ©nez VelÃ¡squez', 2019, 'andrea.jimenez@oportunidades.org.sv', 'LeEcon', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 3, 'Becado', 'FGK'),
('2017-SA-FT-0005', 'Aracely AbigaÃ­l Escobar LÃ³pez', 2019, 'aracely.escobar@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0006', 'Blanca Paola Rosales Valdez', 2019, 'blanca.rosales@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0007', 'Brandon IsaÃ­ Cruz Escobar', 2019, 'brandon.cruz@oportunidades.org.sv', 'Imac', 'UDV', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0008', 'Carlos Enrique Posada Grande', 2019, 'carlos.posada@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0009', 'Cecilia Gabriela Salazar Ruiz', 2019, 'cecilia.salazar@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0010', 'Daniel Orlando MartÃ­nez GutiÃ©rrez', 2019, 'daniel.martinez@oportunidades.org.sv', 'LeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0011', 'Daniel Vladimir SolÃ­s MarroquÃ­n', 2019, 'daniel.solis@oportunidades.org.sv', 'IIFOR', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0012', 'Diego Ernesto GÃ³mez MartÃ­nez', 2019, 'diego.gomez@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0013', 'Diego EsaÃº HernÃ¡ndez MagaÃ±a ', 2019, 'diego.hernandez@oportunidades.org.sv', 'IeDdS', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0014', 'Douglas Omar VÃ¡squez Tobar', 2019, 'douglas.vasquez@oportunidades.org.sv', 'TeIE', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'Borja'),
('2017-SA-FT-0015', 'Emely Dayana GonzÃ¡lez DueÃ±as', 2019, 'emely.gonzalez@oportunidades.org.sv', 'LePSIC', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0016', 'Emerson AdriÃ¡n MartÃ­nez MartÃ­nez', 2019, 'emerson.martinez@oportunidades.org.sv', 'Imac', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0017', 'Erika LucÃa RamÃ­rez VÃ¡zquez', 2019, 'erika.ramirez@oportunidades.org.sv', 'DeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0018', 'Ernesto JosÃ© Padilla Cerna', 2019, 'ernesto.padilla@oportunidades.org.sv', 'LeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0019', 'FÃ¡tima Lourdes Choto MartÃ­nez', 2019, 'fatima.choto@oportunidades.org.sv', 'LeCP', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 2, 'Becado', 'FGK'),
('2017-SA-FT-0020', 'Gabriela Michelle HernÃ¡ndez HernÃ¡ndez', 2019, 'gabriela.hernandez@oportunidades.org.sv', 'LeEcon', 'UDJMD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0021', 'Gerardo Javier Barillas  HernÃ¡ndez', 2019, 'gerardo.barillas@oportunidades.org.sv', 'IQ', 'UDV', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0022', 'IsaÃ­ Natanael GonzÃ¡lez Ãlvarez', 2019, 'isai.gonzalez@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0023', 'Jairo Oswaldo VÃ¡squez MartÃ­nez', 2019, 'jairo.vasquez@oportunidades.org.sv', 'LeCOMU', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0024', 'Jeaqueline Rosalba Jacobo GarcÃ­a', 2019, 'jeaqueline.jacobo@oportunidades.org.sv', 'LeAdE', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0025', 'Jennifer  Xiomara Samayoa MorÃ¡n', 2019, 'jennifer.samayoa@oportunidades.org.sv', 'LeM', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0026', 'Jennifer Liliana Mata CÃ¡ceres', 2019, 'jennifer.mata@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'Borja'),
('2017-SA-FT-0027', 'Jessica Maricela ChÃ¡vez GarcÃ­a', 2019, 'jessica.chavez@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0028', 'Juan JosuÃ© Melgar HernÃ¡ndez', 2019, 'juan.melgar@oportunidades.org.sv', 'LeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0029', 'Julissa Michelle MorÃ¡n Ortiz', 2019, 'julissa.moran@oportunidades.org.sv', 'IQ', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0030', 'Karen Andrea LÃ³pez MagaÃ±a', 2019, 'karen.lopez@oportunidades.org.sv', 'IeSI', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0031', 'Karen Beatriz Mata SÃ¡nchez', 2019, 'karen.mata@oportunidades.org.sv', 'IQ', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0032', 'Karen Elizabeth Ramos Cienfuegos', 2019, 'karen.ramos@oportunidades.org.sv', 'SB', 'KU', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0033', 'Karla Tatiana GarcÃ­a Liborio', 2019, 'karla.garcia@oportunidades.org.sv', 'DeM', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0034', 'Katherine Lisseth Asencio Castaneda', 2019, 'katherine.asencio@oportunidades.org.sv', 'LeCP', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 2, 'Becado', 'FGK'),
('2017-SA-FT-0035', 'Katherine Michelle Latin Guardado', 2019, 'katherine.latin@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0036', 'Katherinne Esmeralda ChÃ¡mul Pacheco', 2019, 'katherinne.chamul@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK');
INSERT INTO `alumnos` (`ID_Alumno`, `Nombre`, `Class`, `correo`, `ID_Carrera`, `ID_Empresa`, `Sexo`, `Estado`, `ID_Status`, `SedeAsistencia`, `ID_Sede`, `TotalTalleres`, `StatusActual`, `FuenteFinacimiento`) VALUES
('2017-SA-FT-0037', 'Katherinne Maritza Guevara GonzÃ¡lez', 2019, 'katherinne.guevara@oportunidades.org.sv', 'II', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0038', 'Kevin Enrique HernÃ¡ndez MorÃ¡n', 2019, 'enrique.hernandez@oportunidades.org.sv', 'LeDG', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0039', 'Kimberling Elizabeth RamÃ­rez Santos', 2019, 'kimberling.ramirez@oportunidades.org.sv', 'DeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0040', 'Krissia Vanessa Ortiz Alas', 2019, 'krissia.ortiz@oportunidades.org.sv', 'TEQI-', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0041', 'Leslie JazmÃ­n GarcÃ­a PÃ©rez ', 2019, 'leslie.garcia@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0042', 'Lineth Verenice Mena CuÃ©llar', 2019, 'lineth.mena@oportunidades.org.sv', 'LeAdE', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0043', 'Luis  Enrique VÃ¡squez Aquila', 2019, 'luis.vasquez@oportunidades.org.sv', 'IeDdS', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 2, 'Becado', 'FGK'),
('2017-SA-FT-0044', 'MarÃ­a de los Ãngeles CanizÃ¡lez Toledo', 2019, 'maria.canizalez@oportunidades.org.sv', 'TEQI-', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0045', 'Mauricio Eduardo MenjÃ­var Escobar', 2019, 'mauricio.menjivar@oportunidades.org.sv', 'LeDG', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0046', 'Mayra Noelia GonzÃ¡lez Monterroza', 2019, 'noelia.gonzalez@oportunidades.org.sv', 'LeE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0047', 'Nayeli Michelle MÃ©ndez Cincuir', 2019, 'nayeli.mendez@oportunidades.org.sv', 'IQ', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0048', 'Oscar Enrique Hidalgo Zelaya', 2019, 'oscar.hidalgo@oportunidades.org.sv', 'TeMUL', 'UDB', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 3, 'Becado', 'FGK'),
('2017-SA-FT-0049', 'Paola Andrea HernÃ¡ndez Flores', 2019, 'andrea.hernandez@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0050', 'Paola Nicolle ChÃ¡vez BaÃ±os', 2019, 'paola.chavez@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0051', 'Rebeca Ester GarcÃ­a Moreno', 2019, 'rebeca.garcia@oportunidades.org.sv', 'IQ', 'UDV', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0052', 'Rodrigo JosuÃ© PÃ©rez DÃ­az', 2019, 'josue.perez@oportunidades.org.sv', 'LeM', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0053', 'Sara AbigaÃ­l Villeda Escamilla', 2019, 'sara.villeda@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 2, 'Becado', 'FGK'),
('2017-SA-FT-0054', 'Tatiana AbigaÃ­l Alvarado Tejada', 2019, 'tatiana.alvarado@oportunidades.org.sv', 'LETE', 'UIPEDM', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0055', 'Vanessa Johanna Morales MorÃ¡n', 2019, 'vanessa.morales@oportunidades.org.sv', 'LePSIC', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', -1, 'Becado', 'FGK'),
('2017-SA-FT-0056', 'Walter Alonso Cruz Galicia', 2019, 'walter.cruz@oportunidades.org.sv', 'TecIngIN', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', -1, 'Becado', 'Borja'),
('2017-SA-FT-0057', 'Walter Ernesto Funes SÃ¡nchez', 2019, 'walter.funes@oportunidades.org.sv', 'IQ', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0001', 'Adela Carolina Rivas Ramos', 2019, 'adela.rivas@oportunidades.org.sv', 'SC', 'SU', 'F', 'Activo', 'TRA003', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0002', 'Adriana Emperatriz Reyes Santos', 2019, 'adriana.reyes@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0003', 'Adriana MarÃ­a CerÃ³n Agiuilar', 2019, 'adriana.ceron@oportunidades.org.sv', 'LeEyN', 'ESEN', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0004', 'Aida Patricia Toloza Bonilla', 2019, 'aida.toloza@oportunidades.org.sv', 'Imac', 'UDV', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0005', 'Aileen Yulitza Perez Menjivar', 2019, 'aileen.perez@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0006', 'Alejandra Abigail Acevedo GarcÃ­a', 2019, 'alejandra.acevedo@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0007', 'Alejandra Abigail Echeverria Argueta', 2019, 'alejandra.echeverria@oportunidades.org.sv', 'LeAdE', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0008', 'Alexandra JazmÃ­n Diego Grande', 2019, 'alexandra.diego@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0009', 'Ana Yamileth Piche SalmerÃ³n', 2019, 'ana.piche@oportunidades.org.sv', 'LeM', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0010', 'Andrea MarÃ­a GarcÃ­a MartÃ­nez', 2019, 'andrea.garcia@oportunidades.org.sv', 'LeCOMU', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0011', 'Andrea SaraÃ­ GÃ³mez Serrano', 2019, 'andrea.gomez@oportunidades.org.sv', 'TeC', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0012', 'Camila Maribel Valencia Castillo', 2019, 'camila.valencia@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0013', 'Cesar EfraÃ­n Tisnado Callejas', 2019, 'cesar.tisnado@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0014', 'Christian JosuÃ© Barraza Barahona', 2019, 'christian.barraza@oportunidades.org.sv', 'LeC', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0015', 'Christofer Doroteo Portillo Martinez', 2019, 'cristopher.portillo@oportunidades.org.sv', 'TIdRI', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0016', 'Cozbi Naharai Castillo MarquÃ©z', 2019, 'cozbi.castillo@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0017', 'Cristina Isabel Renderos Flores', 2019, 'cristina.renderos@oportunidades.org.sv', 'LeCOMU', 'UDJMD', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0018', 'Daniel de JesÃºs Campos MartÃ­nez', 2019, 'daniel.campos@oportunidades.org.sv', 'LEI', 'UT', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0019', 'David AdriÃ¡n PeÃ±ate MartÃ­nez', 2019, 'david.penate@oportunidades.org.sv', 'LeC', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0020', 'David IsaÃ­as MartÃ­nez HernÃ¡ndez', 2019, 'isaias.martinez@oportunidades.org.sv', 'TEIMOMI', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0021', 'Diana Victoria PÃ©rez Molina', 2019, 'victoria.perez@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0022', 'Edwin Manuel GonzÃ¡lez Flores', 2019, 'edwin.gonzalez@oportunidades.org.sv', 'IIFOR', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0023', 'Emanuel ElÃ­ Galindo SÃ¡nchez', 2019, 'emanuel.galindo@oportunidades.org.sv', 'LECDLC', 'UDJMD', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0024', 'Emely Odette Flores Valencia', 2019, 'emely.flores@oportunidades.org.sv', 'LeDI', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0025', 'Erika Lisbeth Castellanos', 2019, 'erika.castellanos@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0026', 'Ernesto Rikerlmy Serrano Zavaleta', 2019, 'ernesto.serrano@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0027', 'Fabiola Nicolle Rivas MartÃ­nez', 2019, 'fabiola.rivas@oportunidades.org.sv', 'LeAdE', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0028', 'FÃ¡tima Alejandra Quintanilla MejÃ­a', 2019, 'fatima.quintanilla@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0029', 'Fernando Jose De Paz Ayala', 2019, 'fernando.depaz@oportunidades.org.sv', 'IQ', 'UNDESS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0030', 'Flor de MarÃ­a LÃ³pez Argueta', 2019, 'flor.lopez@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0031', 'Francisco Antonio Hernandez Sanchez', 2019, 'francisco.hernandez@oportunidades.org.sv', 'LeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0032', 'Gerardo Enrique Palacios DÃ­az', 2019, 'gerardo.palacios@oportunidades.org.sv', 'IeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0033', 'Gerardo Josue Alfaro Torres', 2019, 'gerardo.alfaro@oportunidades.org.sv', 'LeC', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0034', 'Grecia Isamar PÃ©rez Ascencio', 2019, 'grecia.perez@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0035', 'Idalia Rosibel Cruz RamÃ¬rez', 2019, 'idalia.cruz@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0036', 'Ingrid Elizabeth Candray Perdomo', 2019, 'ingrid.candray@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0037', 'Israel Adonay Campos Villalobos', 2019, 'israel.campos@oportunidades.org.sv', 'SC', 'SU', 'M', 'Activo', 'TRA003', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0038', 'Ivania Alejandra LÃ³pez Flores', 2019, 'ivania.lopez@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0039', 'Jeannette Arely HernÃ¡ndez ChÃ¡vez', 2019, 'jeanneth.hernandez@oportunidades.org.sv', 'TES', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0040', 'Jerry Steven MancÃ¬a Alfaro', 2019, 'jerry.mancia@oportunidades.org.sv', 'LeCP', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0041', 'Jimmy Alberto ArdÃ³n Barrera', 2019, 'jimmy.ardon@oportunidades.org.sv', 'LeCJ', 'UNDESS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0042', 'Jocelyn Estefany Cardoza Ramos', 2019, 'jocelyn.cardoza@oportunidades.org.sv', 'TeMUL', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0043', 'Jorge Isai Carrillo Mayora', 2019, 'jorge.carrillo@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0044', 'JosÃ© Alejandro MartÃ­nez Urquilla', 2019, 'alejandromartinez@oportunidades.org.sv', 'TeDG', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0045', 'Jose Alfredo Brizuela Ramos', 2019, 'jose.brizuela@oportunidades.org.sv', 'Imac', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0046', 'JosÃ© Luis Flores Ceros', 2019, 'jose.flores@oportunidades.org.sv', 'LeAdE', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0047', 'Jose Stanley Ortiz Escobar', 2019, 'jose.ortiz@oportunidades.org.sv', 'TecIngIN', 'ITCA ST', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0048', 'Julio Cesar Tejada Rivera', 2019, 'julio.tejada@oportunidades.org.sv', 'TeDG', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0049', 'Karla Marcela Aguilar Rivas', 2019, 'karla.aguilar@oportunidades.org.sv', 'LeTS', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0050', 'Karla Vanessa Castillo Melgar', 2019, 'vanessa.castillo@oportunidades.org.sv', 'TeCP', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0051', 'Kathelin Dayana Henriquez Hernandez', 2019, 'kathelin.henriquez@oportunidades.org.sv', 'TeSI', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0052', 'Katherine Judith Sanchez Mena', 2019, 'judith.sanchez@oportunidades.org.sv', 'IES', 'UT', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0053', 'Katherine Melissa Alfaro Perez', 2019, 'katherine.alfaro@oportunidades.org.sv', 'TeG', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0054', 'Katherine Yesenia PanameÃ±o Gavidia', 2019, 'katherine.panameno@oportunidades.org.sv', 'LeAdE', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0055', 'Kathya Marcella Perez Martinez', 2019, 'kathya.perez@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0056', 'Kenya Ariel Cuchilla SÃ¡nchez', 2019, 'kenya.cuchilla@oportunidades.org.sv', 'IMEC', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0057', 'Kevin Alexander Zepeda Contreras', 2019, 'kevin.zepeda@oportunidades.org.sv', 'TeDG', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0058', 'Leonardo Vladimir Maldonado Estupinian', 2019, 'leonardo.maldonado@oportunidades.org.sv', 'TeRP', 'UEES', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0059', 'Liliana Elizabeth Ayala Hernandez', 2019, 'liliana.ayala@oportunidades.org.sv', 'LeC', 'ECMH', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0060', 'Lourdes Gabriela JimÃ©nez Raymundo', 2019, 'lourdes.jimenez@oportunidades.org.sv', 'IES', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0061', 'Lourdes Nohemy Gonzalez Nieto', 2019, 'lourdes.gonzales@oportunidades.org.sv', 'TeCP', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0062', 'Luis Diego Ruiz CalasÃ­n', 2019, 'luis.ruiz@oportunidades.org.sv', 'SI', 'KU', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0063', 'Luis Fernando Blanco Flores', 2019, 'luis.blanco@oportunidades.org.sv', 'EC', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0064', 'Maria Coralia Cruz Martinez', 2019, 'maria.cruz@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0065', 'MarÃ­a de Los Ãngeles Rivas Quintanilla', 2019, 'maria.rivas@oportunidades.org.sv', 'TeSI', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0066', 'Marina Guadalupe San JosÃ© ChÃ¡vez', 2019, 'marina.sanjose@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0067', 'Marisol Abigail Miranda Flores', 2019, 'marisol.miranda@oportunidades.org.sv', 'IeSI', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0068', 'Melissa Gabriela PÃ©rez Castellanos', 2019, 'melissa.perez@oportunidades.org.sv', 'IeALI', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0069', 'Mirka Raquel Villalta Flores', 2019, 'mirka.villalta@oportunidades.org.sv', 'LeTS', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0070', 'MÃ³nica Yasmin Castro Ascencio', 2019, 'monica.castro@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0071', 'Natalia SaraÃ­ Artiaga HernÃ¡ndez', 2019, 'natalia.artiaga@oportunidades.org.sv', 'TEDGP', 'UFGSS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0072', 'Nelson Enrique Pineda Santos', 2019, 'nelson.pineda@oportunidades.org.sv', 'LeM', 'UCA SS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0073', 'Nestor Roger Rogel Henriquez', 2019, 'nestor.rogel@oportunidades.org.sv', 'TES', 'UFGSS', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0074', 'Oscar ElÃ­as De Paz RamÃ­rez', 2019, 'oscar.depaz@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0075', 'Pamela Abigail Jacobo Orellana', 2019, 'pamela.jacobo@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0076', 'Priscila Guadalupe Trujillo HenrÃ­quez', 2019, 'priscila.trujillo@oportunidades.org.sv', 'TeSI', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0077', 'Rebeca Abigail MartÃnez Reyes', 2019, 'abigail.martinez@oportunidades.org.sv', 'TeLQDual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0078', 'Rebeca Lisseth MartÃ­nez Reyes', 2019, 'rebeca.martinez@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 1, 'Becado', 'FGK'),
('2017-SS-FT-0079', 'Ronald Fary Villafana Escalante', 2019, 'ronald.villafana@oportunidades.org.sv', 'LeDE', 'ECMH', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0080', 'Rosa Emilia Cerna GutiÃ©rrez', 2019, 'rosa.lopez@oportunidades.org.sv', 'LeM', 'UNDESS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0081', 'Sarai Guadalupe Flores Milla', 2019, 'sarai.flores@oportunidades.org.sv', 'TeRP', 'UEES', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 2, 'Becado', 'FGK'),
('2017-SS-FT-0082', 'Tirsa Nicolle Granados Portillo', 2019, 'nicolle.portillo@oportunidades.org.sv', 'LeC', 'ECMH', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0083', 'Valeria RenÃ©e Escobar Contreras', 2019, 'valeria.escobar@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SS-FT-0084', 'Walter Antonio Ventura Romero', 2019, 'walter.ventura@oportunidades.org.sv', 'TeC', 'UDB', 'M', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-0085', 'Zuleyma Del Carmen Aguilar Escamilla', 2019, 'zuleyma.aguilar@oportunidades.org.sv', 'TeMERCA', 'UCA SS', 'F', 'Activo', 'EST001', 'SSFT', 'SSFT', 0, 'Becado', 'FGK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `Id_Carrera` varchar(10) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Duracion` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ID_Facultades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`Id_Carrera`, `nombre`, `Duracion`, `ID_Facultades`) VALUES
('AaS', 'Arts and Science', 'Larga Duración', 3),
('ADiC', 'Associate Degree in Communications', 'Larga Duración', 3),
('ADiE', 'Associate Degree in Entrepenuership', 'Corta Duración', 4),
('ADiR', 'Associate Degree in Robotics', 'Corta Duración', 2),
('BoSiIT', 'Bachelor of Science in Information Technology', 'Corta Duración', 5),
('BS', 'Behavioural Science', 'Corta Duración', 1),
('DCaP', 'Digital Cinema and Photografy', 'Larga Duración', 3),
('DeM', 'Doctorado en Medicina', 'Larga Duración', 6),
('DeO', 'Doctorado en Odontología', 'Larga Duración', 6),
('DSeCP', 'Diplomado Superior en Cocinero Profesional', 'Corta Duración', 1),
('EC', 'Lic. en CED', 'Corta Duración', 1),
('IA', 'Ing. Aeronáutica', 'Larga Duración', 2),
('IB', 'Ing. Biomédica', 'Larga Duración', 6),
('IBaM', 'Int\'l Business and Mkt', 'Larga Duración', 4),
('IC', 'Ing. Civil', 'Larga Duración', 2),
('IE', 'Ing. Eléctrica', 'Larga Duración', 2),
('IeAGr', 'Ing. en Agronomía', 'Larga Duración', 2),
('IeALI', 'Ing. en Alimentos', 'Larga Duración', 2),
('IeC', 'Ing. en Computación', 'Larga Duración', 5),
('IeDdS', 'Ing. en Desarrollo de Software', 'Larga Duración', 5),
('IeEyN', 'Ing. en Economía y Negocios', 'Larga Duración', 4),
('IeLyD', 'Ing. en Logística y Distribución', 'Larga Duración', 2),
('IES', 'Ing. En Sistemas', 'Larga Duración', 2),
('IeSI', 'Ing. en Sistemas Informáticos', 'Larga Duración', 5),
('IeTyR', 'Ing. en Telecomunicaciones y Redes', 'Larga Duración', 2),
('II', 'Ing. Industrial', 'Larga Duración', 2),
('IIFOR', 'Ing. Informática', 'Larga Duración', 5),
('IM', 'Ing. Mecatrónicariales', 'Larga Duración', 2),
('Imac', 'Ing. Mecatrónica', 'Larga Duración', 2),
('IMEC', 'Ing. Mecánica', 'Larga Duración', 2),
('IQ', 'Ing. Química', 'Larga Duración', 2),
('LeA', 'Lic. en Arquitectura', 'Larga Duración', 2),
('LeAdE', 'Lic. en Administración de Empresas', 'Larga Duración', 4),
('LeADyV', 'Lic. en Animación Digital y Videojuegos', 'Larga Duración', 3),
('LeAeI', 'Lic. en Anestesiología e Inhaloterapia', 'Larga Duración', 6),
('LeAM', 'Lic. en Administración Militar', 'Larga Duración', 1),
('LeB', 'Lic. en Biologia', 'Larga Duración', 1),
('LeC', 'Lic. en CIM', 'Larga Duración', 3),
('LECDLC', 'Lic. En Ciencias de la Comunicación', 'Larga Duración', 1),
('LeCdlEceeM', 'Lic. en CC de la Educación con especialidad en Matemáticas', 'Larga Duración', 1),
('LeCJ', 'Lic. en Ciencias Jurídicas', 'Larga Duración', 1),
('LeCOMPU', 'Lic. en Computación', 'Larga Duración', 5),
('LeCOMU', 'Lic. en Comunicaciones', 'Larga Duración', 3),
('LeCP', 'Lic. en Contaduría Pública ', 'Larga Duración', 4),
('LeCQ', 'Lic. en Ciencias Químicas', 'Larga Duración', 6),
('LeDdM', 'Lic. en Diseño de Modas', 'Larga Duración', 3),
('LeDdPA', 'Lic. en Diseño del Producto Artesanal', 'Larga Duración', 3),
('LeDE', 'Lic. en Diseño Estratégico', 'Larga Duración', 3),
('LeDG', 'Lic. en Diseño Gráfico', 'Larga Duración', 3),
('LeDI', 'Lic. en Diseño Industrial', 'Larga Duración', 2),
('LeE', 'Lic. en Enfermería', 'Larga Duración', 6),
('LeEBppySC', 'Lic. en Educacin Básica para primero y Segundo Ciclo', 'Larga Duración', 1),
('LeEceeEB', 'Lic. en Educación con especialidad en Educación Básica', 'Larga Duración', 1),
('LeEcon', 'Lic. en Economía ', 'Larga Duración', 4),
('LeEE', 'Lic. en Educación Especial', 'Larga Duración', 1),
('LeEeII', 'Lic. en Educación especialidad Idioma Ingl?s', 'Larga Duración', 1),
('LeEyN', 'Lic. en Economía y Negocios', 'Larga Duración', 4),
('LEFE', 'Lic. en Finanzas Empresariales', 'Larga Duración', 4),
('LeFis', 'Lic. en Fisioterapia', 'Larga Duración', 1),
('LeG', 'Lic. en Geofísica', 'Larga Duración', 2),
('LeGI', 'Lic. en Gerencia Informática', 'Larga Duración', 5),
('LEI', 'Lic. en Informática', 'Larga Duración', 5),
('LeicEeE', 'Lic. en idiomas con Esp. en Educación', 'Larga Duración', 1),
('LeIcEet', 'Lic. en Idiomas con Esp. en turismo', 'Larga Duración', 4),
('LeIE', 'Lic. en Informática Educativa', 'Larga Duración', 5),
('LeIIOE', 'Lic. en Idioma Inglés Opción Enseñanza ', 'Larga Duración', 1),
('LeLC', 'Lic. en Laboratorio Clínico', 'Larga Duración', 6),
('LeLM', 'Lic. en Lenguas Modernas', 'Larga Duración', 1),
('LeM', 'Lic. en Mercadeo', 'Larga Duración', 4),
('LeMV', 'Lic. en Medicina Veterinaria', 'Larga Duración', 6),
('LeN', 'Lic. en Nutrición ', 'Larga Duración', 1),
('LeOP', 'Lic. en Orientación Profesional', 'Larga Duración', 1),
('LePER', 'Lic. en Periodismo', 'Larga Duración', 3),
('LePSIC', 'Lic. en Psicología', 'Larga Duración', 1),
('LeRI', 'Lic. en Relaciones Internacionales', 'Larga Duración', 4),
('LeS', 'Lic. en Sociología', 'Larga Duración', 1),
('LeSI', 'Lic. en Sistemas Informáticos', 'Larga Duración', 5),
('LETE', 'Lic. En Teconología Educativa', 'Larga Duración', 5),
('LeTS', 'Lic. en Trabajo Social', 'Larga Duración', 1),
('LeTUR', 'Lic. en Turismo', 'Larga Duración', 4),
('PeB', 'Profesorado en Biología', 'Corta Duración', 1),
('PeEB', 'Profesorado en Educación Básica', 'Corta Duración', 1),
('PeEdPySC', 'Profesorado en Educación de Primero y Segundo Ciclo', 'Corta Duración', 1),
('PeEM', 'Profesorado en Educación Media', 'Corta Duración', 1),
('PeEP', 'Profesorado en Educación Parvularia', 'Corta Duración', 1),
('PeI', 'Profesorado en Inglés ', 'Corta Duración', 1),
('PeL', 'Profesorado en Lenguaje', 'Corta Duración', 1),
('PeM', 'Profesorado en Matemáticas', 'Corta Duración', 1),
('PeP', 'Profesorado en Parvularia', 'Corta Duración', 1),
('SB', 'International  Business', 'Larga Duraci?n', 1),
('SC', 'Sin Carrera', '-', 7),
('SI', 'Software Ingeneering', 'Larga Duración', 5),
('TAYPDV', 'Téc. Animación y Programación de Videojuegos', 'Corta Duración', 5),
('TE', 'Téc.en Enfermería', 'Corta Duración', 6),
('TeAcED', 'Téc. en Arquitectura con Enfoque Digital', 'Corta Duración', 2),
('TeAD', 'Téc. en Asistencia Dental', 'Corta Duración', 6),
('TeAdeG', 'Téc. en Admín. de empresas Gastronómicas', 'Corta Duración', 1),
('TeADYV', 'Téc. en Animación Digital Y Videojuegos ', 'Corta Duración', 3),
('TeAGROIN', 'Téc. en Agroindustria', 'Corta Duración', 2),
('TeAGRONO', 'Téc. en Agronomía', 'Corta Duración', 2),
('TeC', 'Téc. en Computación', 'Corta Duración', 5),
('TeCdC', 'Téc. en Control de Calidad', 'Corta Duración', 2),
('TecIngIN', 'Tec. En Ingeniería Industrial', 'Larga Duraci?n', 2),
('TeCP', 'Téc. en Contaduría Pública ', 'Corta Duración', 4),
('TeDdH', 'Téc. en Desarrollo de Hardware', 'Corta Duración', 5),
('TeDdS', 'Téc. en Desarrollo de Software', 'Corta Duración', 5),
('TeDG', 'Téc. en Diseño Gráfico', 'Corta Duración', 3),
('TEDGP', 'Tec. En Diseño Gráfico Publicitario', 'Corta Duración', 3),
('TeDGyTeM', 'Téc. en Diseño Grafico y Téc. en Multimedia', 'Corta Duración', 3),
('TeEID', 'Téc. en Electrónica Industrial- Dual', 'Corta Duración', 2),
('TeG', 'Téc. en Gastronomía', 'Corta Duración', 1),
('TeGdce', 'Téc. en Gestión del comercio exterior', 'Corta Duración', 4),
('TeGT', 'Téc. en Guía Turístico', 'Corta Duración', 4),
('TeGTdDC', 'Tec. en Gestión Tecnológica del Desarrollo Cultural', 'Corta Duración', 1),
('TeI', 'Téc. en Inglés', 'Corta Duración', 1),
('TeIB', 'Téc. en Ing. Biomédica', 'Corta Duración', 6),
('TeIC', 'Téc. en Ing Civil', 'Corta Duración', 2),
('TEIDRI', 'Téc. en Ingeniería de Redes Informáticas ', 'Corta Duración', 5),
('TeIE', 'Téc. en Ing. Eléctrica', 'Corta Duración', 2),
('TeII', 'Téc en Ing. Industrial', 'Corta Duración', 2),
('TeIMDiurna', 'Téc. en Ing. Mecatrónica -Diurna', 'Corta Duración', 2),
('TeIMDual', 'Téc. en Ing. Mecatrónica -Dual', 'Corta Duración', 2),
('TEIMOMI', 'Tec. En ingeniería Mecánica Opción Mantenimiento Industrial', 'Corta Duración', 2),
('TeLQDIURNA', 'Tec. en Laboratorio Químico-Diurno', 'Corta Duración', 2),
('TeLQDual', 'Tec. en Laboratorio Químico-Dual', 'Corta Duración', 2),
('TeMA', 'Téc.  en Mantenimiento Aeronóutico', 'Corta Duración', 2),
('TeMAuTo', 'Téc. en Mecánica Automotriz', 'Corta Duración', 2),
('TeMdC', 'Téc. en Mantenimiento de Computadoras', 'Corta Duración', 5),
('TeMEC', 'Téc. en Mecánica', 'Corta Duración', 2),
('TeMERCA', 'Téc. en Mercadeo', 'Corta Duración', 4),
('TeMOMI', 'Téc. en Mecánica Opción Mant. Industrial', 'Corta Duración', 2),
('TEMT', 'Tec. en Marketing Turístico', 'Corta Duración', 4),
('TeMUL', 'Téc. en Multimedia', 'Corta Duración', 3),
('TeOyP', 'Téc. en Ortesis y Protesis', 'Corta Duración', 6),
('TeP', 'Téc. en Publicidad', 'Corta Duración', 3),
('TEQI-', 'Téc. en Química Industrial -Dual', 'Corta Duración', 2),
('TeQI-Dual', 'Téc. en Quimica Industrial -Dual', 'Corta Duración', 2),
('TeQIDiurno', 'Téc. en Química Industrial-Diurno', 'Corta Duración', 2),
('TeRP', 'Tec. en Relacionales Públicas', 'Corta Duración', 1),
('TES', 'Téc. En Sistemas ', 'Corta Duración', 5),
('TeSI', 'Téc. en Sistemas Informáticos', 'Corta Duración', 5),
('TIdRI', 'Téc. Ing de Redes Informáticas', 'Corta Duración', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

CREATE TABLE `ciclos` (
  `ID_Ciclo` char(10) NOT NULL,
  `Fechanicio` date DEFAULT NULL,
  `FechaFinal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`ID_Ciclo`, `Fechanicio`, `FechaFinal`) VALUES
('01-2020', '2020-02-01', '2020-02-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

CREATE TABLE `competencias` (
  `IDComptenecia` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `competencias`
--

INSERT INTO `competencias` (`IDComptenecia`, `Nombre`) VALUES
('C1', 'Comprender la dinámica actual del mercado laboral'),
('C10', 'Estimular el autocontrol en las relaciones y situaciones'),
('C11', 'Crear y fortalecer Networking'),
('C12', 'Descubrimiento del potencial nato y técnico para saber mercadearse'),
('C13', 'Impulsar acciones  con un performance superior al estándar'),
('C14', 'Productividad y compromiso con el entorno'),
('C15', 'Romper paradigmas para el respeto a la diversidad'),
('C16', 'Generar un auto concepto balanceado'),
('C17', 'Balance entre vida y trabajo-'),
('C18', 'Incentivar la ética como un estilo de vida'),
('C2', 'Desarrollar portabilidad '),
('C3', 'Desarrollar adaptabilidad '),
('C4', 'Desarrollar resiliencia '),
('C5', 'Desarrollar asertividad'),
('C6', 'Fomentar la calidad en el trabajo'),
('C7', 'Fomentar la autoridad para el liderazgo'),
('C8', 'Fomentar la disciplina profesional '),
('C9', 'Desarrollo del pensamiento crítico para resoluciones de conflictos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `ID_Empresa` char(10) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Tipo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`ID_Empresa`, `Nombre`, `Tipo`) VALUES
('AP', 'AU PAIR', 'Universidad'),
('APAC SA', 'Academia Panamericana de Arte Culinario SA', 'Universidad'),
('APAC SM', 'Academia Panamericana de Arte Culinario SM', 'Universidad'),
('APAC SS', 'Academia Panamericana de Arte Culinario SS', 'Universidad'),
('CREO', 'C R E O', 'Empresa Externa'),
('CUC', 'Canadian University College', 'Universidad'),
('DA', 'Dardano Aerotech', 'Universidad'),
('EAPZ', 'Escuela Agricola Panamericana ZAMORANO', 'Universidad'),
('ECdCI', 'Escuela Colombiana de Carreras Industriales', 'Universidad'),
('ECMH', 'Escuela de Comunicación Mónica Herrera', 'Universidad'),
('EMCGGB', 'Escuela Militar Capitán General Gerardo Barrios', 'Universidad'),
('ENA', 'Escuela Nacional de Agricultura \"Roberto Quiñonez\"', 'Universidad'),
('ESEN', 'Escuela Superior de Economía y Negocios', 'Universidad'),
('ESoM', 'ESI School of Management', 'Universidad'),
('FGK', 'Programa Oportunidades', 'Oportunidades'),
('HU-W', 'Harding University -Beca Walton', 'Universidad'),
('I', 'ITEXAL', 'Universidad'),
('IEPROES', 'Instituto Especializado de Educación Superior de Profesionales de la Salud de El Salvador ', 'Universidad'),
('IH', 'Indian Hills', 'Universidad'),
('INICAES', 'Universidad Católica de El Salvador', 'Universidad'),
('ITCA SM', 'Escuela Especializada en Ingeniería ITCA- FEPADE SM', 'Universidad'),
('ITCA ST', 'Escuela Especializada en Ingeniería ITCA-FEPADE ST', 'Universidad'),
('ITCA-FEPAD', 'Escuela Especializada en Ingenieía ITCA-FEPADE SA', 'Universidad'),
('JBU-W', 'John Brown University -Beca Walton', 'Universidad'),
('KU', 'Keiser University', 'Universidad'),
('Lb', 'Le bouquet', 'Universidad'),
('NCLCC', 'North Central Lake Community College', 'Universidad'),
('SC', 'Skidmore College', 'Universidad'),
('SCC', 'Sunny Community College', 'Universidad'),
('SU', 'Sin Universidad', 'Universidad'),
('T', 'Taiwan', 'Universidad'),
('TCHA', 'Instituto Tecnológico de Chalatenango', 'Universidad'),
('UA', 'Universidad Americana', 'Universidad'),
('UCA CHA', 'Universidad Centroamericana José Simeón Cañas CHA', 'Universidad'),
('UCA SS', 'Universidad Centroamericana José Simeón Cañas SS', 'Universidad'),
('UDB', 'Universidad Don Bosco', 'Universidad'),
('UDJMD', 'Universidad Dr. José Matías Delgado', 'Universidad'),
('UdO', 'Universidad de Oriente', 'Universidad'),
('UdR', 'Universidad de Rusia', 'Universidad'),
('UDV', 'Universidad del Valle', 'Universidad'),
('UEES', 'Universidad Evangélica de El Salvador', 'Universidad'),
('UeP', 'Universidad en Perú', 'Universidad'),
('UFGSS', 'Universidad Francisco Gavidia SS', 'Universidad'),
('UGB', 'Universidad Gerardo Barrios', 'Universidad'),
('UIPEDM', 'Universidad Interamericana para el Desarrollo MX', 'Universidad'),
('ULS', 'Universidad Luterana Salvadoreña', 'Universidad'),
('UMA', 'Universidad Modular Abierta', 'Universidad'),
('UMR', 'Universidad Monseñor Romero', 'Universidad'),
('UNA', 'Universidad no asignada', 'Universidad'),
('UNAB CHA', 'Universidad Dr. Andrés Bello CHA', 'Universidad'),
('UNAB SM', 'Universidad Dr. Andrés Bello SM', 'Universidad'),
('UNAB SS', 'Universidad Dr. Andrés Bello SS', 'Universidad'),
('UNASA', 'Universidad Autónoma de Santa Ana', 'Universidad'),
('UNDESA', 'Universidad Nacional de El Salvador SA', 'Universidad'),
('UNDESM', 'Universidad Nacional de El Salvador SM', 'Universidad'),
('UNDESS', 'Universidad Nacional de El Salvador SS', 'Universidad'),
('UOOBW', 'University of Ozarks- Beca Walton', 'Universidad'),
('UP', 'Universidad Panamericana', 'Universidad'),
('UPDES', 'Universidad Pedagógica de El Salvador', 'Universidad'),
('USAM', 'Universidad Salvadoreña Alberto Masferrer ', 'Universidad'),
('UT', 'Universidad Tecnológica', 'Universidad'),
('UTDP', 'Universidad Tecnológica de Panamá', 'Universidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evalicionreunion`
--

CREATE TABLE `evalicionreunion` (
  `id_alumno` char(16) NOT NULL,
  `id_reunion` char(10) NOT NULL,
  `rating` int(11) NOT NULL,
  `comentario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciontalleres`
--

CREATE TABLE `evaluaciontalleres` (
  `ID_Alumno` char(16) DEFAULT NULL,
  `ID_Taller` char(10) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Comentario` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluaciontalleres`
--

INSERT INTO `evaluaciontalleres` (`ID_Alumno`, `ID_Taller`, `Rating`, `Comentario`) VALUES
('2015-SS-FT-0016', '0120130342', 0, 'llegue tarde '),
('2017-SA-FT-0016', '0120110369', 100, 'Tema importante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `IDFacultates` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`IDFacultates`, `Nombre`) VALUES
(1, 'Humanidades'),
(2, 'Ingenierias '),
(3, 'Diseño Publicidad'),
(4, 'Ciencias Economicas'),
(5, 'Informática'),
(6, 'Salud'),
(7, '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatotalleres`
--

CREATE TABLE `formatotalleres` (
  `ID_Formato` char(10) NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formatotalleres`
--

INSERT INTO `formatotalleres` (`ID_Formato`, `Nombre`) VALUES
('SITC', 'Charla'),
('SITF', 'Foro'),
('SITL', 'Laboratorio'),
('SITT', 'Taller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariosreunion`
--

CREATE TABLE `horariosreunion` (
  `IDHorRunion` int(10) NOT NULL,
  `ID_Reunion` char(10) CHARACTER SET latin1 NOT NULL,
  `HorarioInicio` time NOT NULL,
  `HorarioFinalizado` time NOT NULL,
  `Canitdad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horariosreunion`
--

INSERT INTO `horariosreunion` (`IDHorRunion`, `ID_Reunion`, `HorarioInicio`, `HorarioFinalizado`, `Canitdad`) VALUES
(4, '2013036888', '15:00:00', '16:00:00', 10),
(6, '2013036888', '08:00:00', '09:00:00', 9),
(7, '2014039510', '10:00:00', '11:00:00', 10),
(8, '2014039510', '13:00:00', '14:00:00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hsociales`
--

CREATE TABLE `hsociales` (
  `ID_HSociales` char(10) NOT NULL,
  `CantidadH` int(11) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFinal` date DEFAULT NULL,
  `Encargado` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Descripcion` text CHARACTER SET utf8,
  `Comprobante` text CHARACTER SET utf8,
  `ID_Ciclo` char(10) DEFAULT NULL,
  `ID_Alumno` char(16) DEFAULT NULL,
  `estado` varchar(30) NOT NULL DEFAULT 'En espera',
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `IDinscripcion` int(11) NOT NULL,
  `ID_Sede` char(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(8) NOT NULL,
  `estado` varchar(30) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`IDinscripcion`, `ID_Sede`, `Fecha`, `Hora`, `estado`) VALUES
(2, 'SAFT', '2020-03-03', '13:00', 'Desactivado'),
(5, 'SSFT', '2020-03-10', '11:00', 'Desactivado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionreunion`
--

CREATE TABLE `inscripcionreunion` (
  `id_alumno` char(16) NOT NULL,
  `id_reunion` char(10) NOT NULL,
  `Horario` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `asistencia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcionreunion`
--

INSERT INTO `inscripcionreunion` (`id_alumno`, `id_reunion`, `Horario`, `telefono`, `asistencia`) VALUES
('2015-SS-FT-0018', '2013036888', 6, '7455-3364', 'Asistio'),
('2015-SS-FT-0018', '2014039510', 8, '7455-3364', 'Asistio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciontalleres`
--

CREATE TABLE `inscripciontalleres` (
  `ID_Alumno` char(16) DEFAULT NULL,
  `ID_Taller` char(10) DEFAULT NULL,
  `Asistencia` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripciontalleres`
--

INSERT INTO `inscripciontalleres` (`ID_Alumno`, `ID_Taller`, `Asistencia`) VALUES
('2017-SA-FT-0036', '0120090375', 'Asistio'),
('2017-SA-FT-0036', '0120160379', 'En espera'),
('2017-SA-FT-0015', '0120090375', 'Asistio'),
('2017-SA-FT-0019', '0120090375', 'Asistio'),
('2017-SA-FT-0015', '0120160379', 'En espera'),
('2017-SA-FT-0052', '0120090375', 'Asistio'),
('2017-SA-FT-0015', '0120230354', 'En espera'),
('2017-SA-FT-0052', '0120160379', 'En espera'),
('2017-SA-FT-0036', '0120230354', 'En espera'),
('2017-SA-FT-0052', '0120230354', 'En espera'),
('2016-SA-FT-027', '0120160379', 'En espera'),
('2016-SA-FT-027', '0120200339', 'En espera'),
('2017-SA-FT-0034', '0120090375', 'Asistio'),
('2017-SA-FT-0034', '0120160379', 'En espera'),
('2016-SA-FT-027', '0120230354', 'En espera'),
('2017-SA-FT-0035', '0120090375', 'Asistio'),
('2017-SA-FT-0035', '0120160379', 'En espera'),
('2017-SA-FT-0035', '0120230354', 'En espera'),
('2017-SA-FT-0006', '0120090375', 'Asistio'),
('2017-SA-FT-0006', '0120160379', 'En espera'),
('2017-SA-FT-0006', '0120230354', 'En espera'),
('2017-SA-FT-0049', '0120090375', 'Asistio'),
('2017-SA-FT-0049', '0120160379', 'En espera'),
('2017-SA-FT-0049', '0120230354', 'En espera'),
('2017-SA-FT-0038', '0120090375', 'Asistio'),
('2017-SA-FT-0038', '0120160379', 'En espera'),
('2017-SA-FT-0038', '0120230354', 'En espera'),
('2017-SA-FT-0002', '0120090375', 'Asistio'),
('2017-SA-FT-0002', '0120160379', 'En espera'),
('2017-SA-FT-0002', '0120230354', 'En espera'),
('2016-SA-FT-053', '0120280363', 'En espera'),
('2017-SA-FT-0045', '0120200339', 'En espera'),
('2017-SA-FT-0045', '0120160379', 'En espera'),
('2017-SA-FT-0045', '0120230354', 'En espera'),
('2017-SA-FT-0031', '0120280363', 'En espera'),
('2017-SA-FT-0043', '0120090375', 'Asistio'),
('2017-SA-FT-0043', '0120230354', 'En espera'),
('2017-SA-FT-0005', '0120090375', 'Asistio'),
('2017-SA-FT-0005', '0120160379', 'En espera'),
('2017-SA-FT-0005', '0120230354', 'En espera'),
('2017-SA-FT-0009', '0120200339', 'En espera'),
('2017-SA-FT-0009', '0120280363', 'En espera'),
('2016-SA-FT-048', '0120090375', 'Asistio'),
('2016-SA-FT-048', '0120160379', 'En espera'),
('2016-SA-FT-048', '0120200339', 'En espera'),
('2017-SA-FT-0029', '0120200339', 'En espera'),
('2017-SA-FT-0029', '0120280363', 'En espera'),
('2017-SA-FT-0010', '0120280363', 'En espera'),
('2017-SA-FT-0030', '0120230354', 'En espera'),
('2017-SA-FT-0030', '0120090375', 'Asistio'),
('2017-SA-FT-0030', '0120160379', 'En espera'),
('2017-SA-FT-0013', '0120090375', 'Asistio'),
('2017-SA-FT-0013', '0120160379', 'En espera'),
('2017-SA-FT-0013', '0120230354', 'En espera'),
('2017-SA-FT-0014', '0120200339', 'En espera'),
('2017-SA-FT-0014', '0120280363', 'En espera'),
('2016-SA-FT-032', '0120230354', 'En espera'),
('2017-SA-FT-0056', '0120280363', 'En espera'),
('2016-SA-FT-032', '0120280363', 'En espera'),
('2016-SA-FT-032', '0120160379', 'En espera'),
('2017-SA-FT-0003', '0120090375', 'Asistio'),
('2017-SA-FT-0003', '0120160379', 'En espera'),
('2017-SA-FT-0003', '0120230354', 'En espera'),
('2016-SA-FT-033', '0120200339', 'En espera'),
('2016-SA-FT-033', '0120280363', 'En espera'),
('2017-SA-FT-0039', '0120200339', 'En espera'),
('2017-SA-FT-0039', '0120280363', 'En espera'),
('2012-SA-FT-0048', '0120200339', 'En espera'),
('2017-SA-FT-0041', '0120200339', 'En espera'),
('2017-SA-FT-0047', '0120160379', 'En espera'),
('2017-SA-FT-0047', '0120200339', 'En espera'),
('2017-SA-FT-0047', '0120280363', 'En espera'),
('2016-SA-FT-050', '0120090375', 'Asistio'),
('2016-SA-FT-050', '0120160379', 'En espera'),
('2016-SA-FT-050', '0120230354', 'En espera'),
('2017-SA-FT-0050', '0120090375', 'Asistio'),
('2017-SA-FT-0050', '0120230354', 'En espera'),
('2017-SA-FT-0050', '0120160379', 'En espera'),
('2017-SA-FT-0027', '0120280363', 'En espera'),
('2017-SA-FT-0027', '0120200339', 'En espera'),
('2017-SA-FT-0024', '0120280363', 'En espera'),
('2017-SA-FT-0008', '0120280363', 'En espera'),
('2017-SA-FT-0012', '0120280363', 'En espera'),
('2017-SA-FT-0028', '0120110369', 'Asistio'),
('2017-SA-FT-0056', '0120110369', 'Inasistencia'),
('2017-SA-FT-0043', '0120110369', 'Asistio'),
('2017-SA-FT-0011', '0120280363', 'En espera'),
('2017-SA-FT-0019', '0120110369', 'Asistio'),
('2017-SA-FT-0016', '0120110369', 'Asistio'),
('2017-SA-FT-0016', '0120200339', 'En espera'),
('2016-SA-FT-011', '0120280363', 'En espera'),
('2017-SA-FT-0022', '0120280363', 'En espera'),
('2017-SA-FT-0022', '0120200339', 'En espera'),
('2017-SA-FT-0046', '0120280363', 'En espera'),
('2017-SA-FT-0046', '0120200339', 'En espera'),
('2017-SA-FT-0034', '0120110369', 'Asistio'),
('2017-SA-FT-0055', '0120110369', 'Inasistencia'),
('2017-SA-FT-0055', '0120200339', 'En espera'),
('2017-SA-FT-0055', '0120280363', 'En espera'),
('2015-SA-FT-050', '0120090375', 'Asistio'),
('2012-SA-FT-0048', '0120110369', 'Asistio'),
('2017-SA-FT-0019', '0120160379', 'En espera'),
('2015-SA-FT-021', '0120280363', 'En espera'),
('2017-SA-FT-0026', '0120280363', 'En espera'),
('2017-SA-FT-0047', '0120230354', 'En espera'),
('2017-SA-FT-0019', '0120230354', 'En espera'),
('2015-SS-FT-0006', '0120130336', 'Asistio'),
('2015-SS-FT-0016', '0120130342', 'Asistio'),
('2015-SS-FT-0068', '0120130342', 'En espera'),
('2015-SS-FT-0068', '0120230360', 'En espera'),
('2015-SS-FT-0105', '0120290387', 'Asistio'),
('2016-SS-FT-0104', '0120290387', 'En espera'),
('2017-SS-FT-0005', '0120230360', 'En espera'),
('2016-SA-FT-053', '0120230354', 'En espera'),
('2016-SA-FT-053', '0120200339', 'En espera'),
('2016-SA-FT-053', '0120160379', 'En espera'),
('2015-SS-FT-0016', '0120230360', 'En espera'),
('2015-SS-FT-0016', '0120250311', 'En espera'),
('2015-SS-FT-0016', '0120140330', 'En espera'),
('2016-SS-FT-0025', '0120140330', 'En espera'),
('2016-SS-FT-0025', '0120230360', 'En espera'),
('2016-SS-FT-0025', '0120250311', 'En espera'),
('2017-SA-FT-0016', '0120160379', 'En espera'),
('2017-SA-FT-0009', '0120160379', 'En espera'),
('2017-SA-FT-0009', '0120230354', 'En espera'),
('2016-SA-FT-011', '0120160379', 'En espera'),
('2016-SA-FT-011', '0120230354', 'En espera'),
('2015-SS-FT-0006', '0120220360', 'En espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `ID_Alumno` char(16) DEFAULT NULL,
  `CicloU` int(11) DEFAULT NULL,
  `Year` year(4) DEFAULT NULL,
  `ComprobanteNotas` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`ID_Alumno`, `CicloU`, `Year`, `ComprobanteNotas`) VALUES
('2015-SS-FT-0068', 2, 2019, '2015-SS-FT-0068-2019-002.pdf'),
('2012-SA-FT-0001', 1, 2020, '2012-SA-FT-0001-2020-001.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `Id` int(11) NOT NULL,
  `Id_Remitente` char(15) NOT NULL,
  `Id_Receptor` char(15) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `idSolicitud` char(15) NOT NULL,
  `EstadoSolicitud` varchar(30) NOT NULL DEFAULT 'Enviado',
  `Estado` varchar(30) NOT NULL DEFAULT 'Sin revisar',
  `FechaHora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`Id`, `Id_Remitente`, `Id_Receptor`, `Tipo`, `idSolicitud`, `EstadoSolicitud`, `Estado`, `FechaHora`) VALUES
(178, '699', '149', 'Cambio de estado', '20206131', 'Enviado', 'Sin revisar', '2020-03-10 21:55:07'),
(177, '394', '623', 'Desinscribirse', '20202646', 'Enviado', 'Sin revisar', '2020-03-10 20:15:46'),
(175, '774', '620', 'Cambio de estado', '20206936', 'Enviado', 'Sin revisar', '2020-03-10 12:38:45'),
(176, '394', '268', 'Desinscribirse', '20202646', 'Enviado', 'Sin revisar', '2020-03-10 20:15:46'),
(174, '774', '266', 'Cambio de estado', '20206936', 'Enviado', 'Sin revisar', '2020-03-10 12:38:45'),
(173, '774', '149', 'Cambio de estado', '20206936', 'Enviado', 'Sin revisar', '2020-03-10 12:38:45'),
(172, '402', '623', 'Desinscribirse', '20207674', 'Enviado', 'Sin revisar', '2020-03-08 20:24:15'),
(171, '402', '268', 'Desinscribirse', '20207674', 'Enviado', 'Sin revisar', '2020-03-08 20:24:15'),
(168, '306', '266', 'Cambio de estado', '20207528', 'Enviado', 'Sin revisar', '2020-02-24 17:26:12'),
(169, '149', '306', 'Cambio de estado', '20207528', 'Aprobado', 'Visto', '2020-02-24 17:26:29'),
(164, '270', '306', 'Desinscribirse', '20203533', 'Aprobado', 'Visto', '2020-02-24 16:49:24'),
(162, '270', '306', 'Horas de vinculacion', '20202738', 'Aprobado', 'Visto', '2020-02-24 16:45:27'),
(166, '270', '306', 'Desinscribirse', '20203843', 'Aprobado', 'Visto', '2020-02-24 16:50:29'),
(156, '149', '306', 'Cambio de estado', '20203356', 'Aprobado', 'Visto', '2020-02-24 16:20:27'),
(155, '306', '266', 'Cambio de estado', '20203356', 'Enviado', 'Sin revisar', '2020-02-24 16:19:29'),
(153, '149', '306', 'Cambio de estado', '20206245', 'Aprobado', 'Visto', '2020-02-24 16:15:40'),
(152, '306', '266', 'Cambio de estado', '20206245', 'Enviado', 'Sin revisar', '2020-02-24 16:13:52'),
(170, '607', '149', 'Cambio de estado', '20208914', 'Enviado', 'Sin revisar', '2020-03-02 12:00:38'),
(179, '699', '266', 'Cambio de estado', '20206131', 'Enviado', 'Sin revisar', '2020-03-10 21:55:07'),
(180, '699', '620', 'Cambio de estado', '20206131', 'Enviado', 'Sin revisar', '2020-03-10 21:55:07'),
(181, '699', '966', 'Cambio de estado', '20206131', 'Enviado', 'Sin revisar', '2020-03-10 21:55:07'),
(182, '743', '969', 'Horas de vinculacion', '20205273', 'Enviado', 'Sin revisar', '2020-03-12 15:58:13'),
(183, '743', '969', 'Horas de vinculacion', '20209633', 'Enviado', 'Sin revisar', '2020-03-12 15:59:45'),
(189, '741', '267', 'Desinscribirse', '', 'Enviado', 'Sin revisar', '2020-03-13 12:56:49'),
(185, '968', '773', 'Desinscribirse', '20206443', 'Rechazado', 'Visto', '2020-03-12 16:39:56'),
(188, '303', '741', 'Desinscribirse', '20204399', 'Aprobado', 'Visto', '2020-03-13 12:50:25'),
(190, '741', '968', 'Desinscribirse', '', 'Enviado', 'Sin revisar', '2020-03-13 12:56:49'),
(191, '303', '741', 'Desinscribirse', '20204399', 'Aprobado', 'Visto', '2020-03-13 12:57:19'),
(193, '819', '968', 'Desinscribirse', '20201498', 'Enviado', 'Sin revisar', '2020-03-13 13:14:44'),
(194, '303', '819', 'Desinscribirse', '20201498', 'Aprobado', 'Visto', '2020-03-13 13:15:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivostaller`
--

CREATE TABLE `objetivostaller` (
  `IDobjetivo` int(3) NOT NULL,
  `ID_Taller` char(10) CHARACTER SET latin1 NOT NULL,
  `Objetivo` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `objetivostaller`
--

INSERT INTO `objetivostaller` (`IDobjetivo`, `ID_Taller`, `Objetivo`) VALUES
(12, '0120030349', 'ya finalizamos '),
(13, '0120130342', 'Que los jÃ³venes comprendan la importancia del ahorro para su plan de vida'),
(14, '0120130342', 'Que los jÃ³venes comprendan la importancia del ahorro para su plan de vida'),
(15, '0120130336', 'werwet'),
(16, '0120090375', 'Que los jÃ³venes comprenda la importancia del ahorro para su plan de vida '),
(17, '0120110369', 'Que los estudiantes logren identificar  las partes fundamentales de contenido y forma adecuada al momento de realizar un Curriculum Vitae ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

CREATE TABLE `reuniones` (
  `ID_Reunion` char(10) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `ID_Empresa` char(10) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `ID_Ciclo` char(10) DEFAULT NULL,
  `Estado` varchar(25) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `ComprobanteLista` varchar(100) NOT NULL,
  `ID_Sede` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reuniones`
--

INSERT INTO `reuniones` (`ID_Reunion`, `Titulo`, `Fecha`, `ID_Empresa`, `Rating`, `ID_Ciclo`, `Estado`, `Tipo`, `ComprobanteLista`, `ID_Sede`) VALUES
('2013036888', 'Prueba reunion', '2020-03-13', 'UDB', NULL, '01-2020', 'Finalizado', 'Charla Informativa', '2013036888.pdf', 'SAFT'),
('2014039510', 'Prueba 2', '2020-03-14', 'UDB', NULL, '01-2020', 'Finalizado', 'Charla Informativa', '2014039510.pdf', 'SAFT'),
('2021045797', 'TES 2', '2020-04-21', 'DA', NULL, '01-2020', 'Activo', 'Charla Informativa', '', 'SSFT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `ID_Sede` char(10) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`ID_Sede`, `Nombre`) VALUES
('AHFT', 'Ahuachapán'),
('AHSAT', 'Ahuachapán - SAT'),
('CHSAT', 'Chalatenango - SAT'),
('SAFT', 'Santa Ana'),
('SASAT', 'Santa Ana - SAT'),
('SMSAT', 'San Miguel - SAT'),
('SSFT', 'San Salvador'),
('SSSAT', 'San Salvador - SAT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudcambio`
--

CREATE TABLE `solicitudcambio` (
  `id_solicitud` int(11) NOT NULL,
  `id_status` char(10) CHARACTER SET latin1 NOT NULL,
  `id_alumno` char(16) CHARACTER SET latin1 NOT NULL,
  `Comentario` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Comprobante` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Comentario2` text COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'En espera',
  `fechaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudcambio`
--

INSERT INTO `solicitudcambio` (`id_solicitud`, `id_status`, `id_alumno`, `Comentario`, `Comprobante`, `Comentario2`, `Fecha`, `Estado`, `fechaFin`) VALUES
(20206131, 'TRA003', '2015-SS-SAT-0018', 'Continuar ING.', '20206131.pdf', '', '2020-03-10 21:55:07', 'En espera', '2021-01-31'),
(20206936, 'ESP004', '2015-SS-FT-0069', 'Proyectp de Community Manager', '20206936.pdf', '', '2020-03-10 12:38:45', 'En espera', '2020-06-04'),
(20208914, 'PDE006', '2015-SA-FT-012', 'He egresado de la carrera TÃ©cnico en DiseÃ±o GrÃ¡fico de Universidad Don Bosco, y actualmente, estoy en busca de mi primer empleo.', '20208914.pdf', '', '2020-03-02 12:00:38', 'En espera', '2019-11-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicituddesinscribir`
--

CREATE TABLE `solicituddesinscribir` (
  `id_solicitud` int(11) NOT NULL,
  `id_alumno` char(16) CHARACTER SET latin1 NOT NULL,
  `id_taller` char(10) CHARACTER SET latin1 NOT NULL,
  `comentario` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `comprobante` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Comentario2` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `solicituddesinscribir`
--

INSERT INTO `solicituddesinscribir` (`id_solicitud`, `id_alumno`, `id_taller`, `comentario`, `comprobante`, `Comentario2`, `estado`) VALUES
(20201498, '2016-SS-FT-0025', '0120220360', 'me quebre el pie ', '20201498.pdf', 'Cuidese', 'Aprobado'),
(20202646, '2017-SA-FT-0047', '0120160379', 'Tengo entrega de proyecto ese dÃ­a en clase de PsicologÃ­a de 10:55 a 12:35', '20202646.pdf', '', 'En espera'),
(20204399, '2015-SS-FT-0016', '0120220360', 'me diÃ³ corona virus', '.pdf', 'Esta bien', 'Aprobado'),
(20206443, '2015-SS-FT-0068', '0120230360', 'estoy enermo', '20206443.pdf', 'No', 'Rechazado'),
(20207674, '2017-SA-FT-0055', '0120110369', 'No podrÃ© asistir ya que mis clases ese dÃ­a finalizan a las 10:55 y tengo actividad evaluada de inglÃ©s.', '20207674.pdf', '', 'En espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `ID_Status` char(10) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`ID_Status`, `Nombre`) VALUES
('ESP004', 'Estudiando-Pasantias'),
('EST001', 'Estudiando'),
('EST005', 'Estudiando y Trabajando'),
('PAS002', 'Pasantias'),
('PDE006', 'Pausa de estudio'),
('TRA003', 'Trabajando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallercompetencia`
--

CREATE TABLE `tallercompetencia` (
  `IDTaller_Competencia` int(3) NOT NULL,
  `ID_Taller` varchar(10) CHARACTER SET latin1 NOT NULL,
  `IDComptenecia` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tallercompetencia`
--

INSERT INTO `tallercompetencia` (`IDTaller_Competencia`, `ID_Taller`, `IDComptenecia`) VALUES
(34, '0120130342', 'C10'),
(35, '0120130342', 'C17'),
(36, '0120130342', 'C18'),
(37, '0120130336', 'C12'),
(38, '0120130336', 'C13'),
(39, '0120130336', 'C14'),
(40, '0120090375', 'C10'),
(41, '0120090375', 'C8'),
(42, '0120110369', 'C12'),
(43, '0120110369', 'C16'),
(44, '0120110369', 'C6'),
(45, '0120110369', 'C8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE `talleres` (
  `ID_Taller` char(10) NOT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `ID_Formato` char(10) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `ID_Sede` char(10) DEFAULT NULL,
  `ID_Ciclo` char(10) DEFAULT NULL,
  `ID_Empresa` char(50) DEFAULT NULL,
  `ComprobanteLista` text,
  `Estado` varchar(25) NOT NULL,
  `Cupo` int(10) NOT NULL,
  `lugar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`ID_Taller`, `Titulo`, `Fecha`, `Hora`, `ID_Formato`, `Rating`, `ID_Sede`, `ID_Ciclo`, `ID_Empresa`, `ComprobanteLista`, `Estado`, `Cupo`, `lugar`) VALUES
('0120030320', 'PresentaciÃ³n Sistema Workeys', '2020-03-03', '11:15:00', 'SITF', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Finalizado', 2, 'La libertad'),
('0120030349', 'Prueba ', '2020-03-03', '12:17:00', 'SITC', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Finalizado', 2, 'La libertad'),
('0120040190', 'Prueba', '2020-04-04', '02:00:00', 'SITC', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Activo', 35, 'fgk'),
('0120090375', 'Foro: Ahorra o nunca', '2020-03-09', '11:00:00', 'SITF', 0, 'SAFT', '01-2020', 'FGK', '0120090375.pdf', 'Finalizado', 21, 'UNICAES Aula B33 '),
('0120110311', 'CÃ³mo realizar un CV ganador', '2020-03-11', '11:00:00', 'SITL', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Inactivo', 40, 'Oportunidades '),
('0120110369', 'CÃ³mo realizar un CV ganador', '2020-03-11', '11:00:00', 'SITT', 0, 'SAFT', '01-2020', 'FGK', '0120110369.pdf', 'Finalizado', 37, 'Santa Ana'),
('0120130336', 'PRUEBA DE TALLER 2', '2020-03-13', '03:00:00', 'SITT', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Finalizado', 9, 'La libertad'),
('0120130342', 'Ahorra o Nunca', '2020-03-13', '15:00:00', 'SITT', 0, 'SSFT', '01-2020', 'FGK', '0120130342.pdf', 'Finalizado', 18, 'Oportunidades San Salvador'),
('0120140330', 'PRUEBA 5 ', '2020-04-14', '15:00:00', 'SITT', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Activo', 8, 'La libertad'),
('0120160379', 'Honestidad e integridad', '2020-03-16', '11:00:00', 'SITT', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Activo', 15, 'UNICAES Aula B33 '),
('0120200339', 'OrganizaciÃ³n eficiente', '2020-03-20', '14:00:00', 'SITC', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Activo', 23, 'Oportunidades '),
('0120220360', 'PRUEBA 4', '2020-03-22', '02:00:00', 'SITC', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Activo', 34, 'La libertad'),
('0120230354', 'Lenguaje corporal / Comportamiento en el trabajo', '2020-03-23', '11:00:00', 'SITC', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Activo', 17, 'UNICAES Aula B33 '),
('0120230360', 'PRUEBA DE TALLER 1', '2020-04-23', '02:00:00', 'SITC', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Activo', 11, 'La libertad'),
('0120250311', 'PRUEBA 6', '2020-04-25', '14:00:00', 'SITT', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Activo', 7, 'La libertad'),
('0120280363', 'Habilidades para la comunicaciÃ³n intercultural', '2020-03-28', '09:00:00', 'SITT', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Activo', 18, 'Oportunidades '),
('0120290387', 'PRUEBA 3', '2020-04-29', '09:00:00', 'SITL', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Activo', 11, 'La libertad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUsuario` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `correo` varchar(75) NOT NULL,
  `contrasena` varchar(75) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `conteo_entradas` int(5) NOT NULL DEFAULT '0',
  `ID_Sede` char(10) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `SedeAsistencia` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuario`, `nombre`, `correo`, `contrasena`, `imagen`, `conteo_entradas`, `ID_Sede`, `cargo`, `SedeAsistencia`) VALUES
(149, 'Daniel M?rquez ', 'baltota46@gmail.com', '$2y$10$DFSrejwb.2Q2O0/FdvQJwebbgKQITwmEe/VfANtkmy3iZzvU59LKm', 'imgDefault.png', 1, 'SSFT', 'SuperUsuario', 'SSFT'),
(266, 'Tony Code Programador Elegante', 'vasquezanth@gmail.com', '$2y$10$UqNyxw4zPuRNd3nK7X9EiuHiv2h3fT4qEMtJrF09afOrgf.tL0Jo2', 'imgDefault.png', 1, 'SSFT', 'SuperUsuario', 'SSFT'),
(267, 'SuperVV', 'vasquez@gmail.com', '$2y$10$IuckMonZXjXra.D4cfvEPuzwlG/q2K.0m2qFycM6rZGWluIZoyTKO', 'imgDefault.png', 1, 'SSFT', 'Coach Talleres', 'SSFT'),
(268, 'talleres', 'talleres@oportunidades.org.sv', '$2y$10$hzxKYOXbrUSk/lW25DXwAegtxlSnW7.MS9y0bkVC/UHsuiH9N.zAa', 'imgDefault.png', 1, 'SAFT', 'Coach Talleres', 'SAFT'),
(270, 'pasante', 'pasante@oportunidades.org.sv', '$2y$10$DFSrejwb.2Q2O0/FdvQJwebbgKQITwmEe/VfANtkmy3iZzvU59LKm', 'imgDefault.png', 1, 'SAFT', 'Auxiliar', 'SAFT'),
(302, 'reunion', 'reuniones@oportunidades.org.sv', '$2y$10$DFSrejwb.2Q2O0/FdvQJwebbgKQITwmEe/VfANtkmy3iZzvU59LKm', 'imgDefault.png', 1, 'SAFT', 'Coach Reuniones', 'SAFT'),
(303, 'WorkeysPasante', 'certificacionfgk@gmail.com', '$2y$10$o5abpYwN38owf4AYgjjpW.e79IckNQi6f.8hX1aJHktOp8IVS8Ne6', 'imgDefault.png', 1, 'SSFT', 'Auxiliar', 'SSFT'),
(304, 'WorkeysPasanteSA', 'certificacionfgk.santaana@gmail.com', '$2y$10$XUIFIfprQI7KYO5TvqVIP.q4F2dMqOKkpyj5M3wL06XDl/.6.RTiO', 'imgDefault.png', 1, 'SAFT', 'Auxiliar', 'SAFT'),
(311, 'Wendy Marielos Alvarado GarcÃ­a', 'wendy.alvarado@oportunidades.org.sv', '$2y$10$PFUEjSBQK0kvc6LpwwgCQukzx7xPpkZ09p.0ri3oisn285mRz7Bye', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(312, 'Magerly EpifanÃ­a Avelar Avelar', 'magerly.avelar@oportunidades.org.sv', '$2y$10$Gf4djWcgbZKx.14YJjebi.muOXyVZuozaNv2qiiPTOTs38/JF5sNK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(313, 'Odalis Alexandra Barillas GarcÃ­a', 'odalis.barillas@oportunidades.org.sv', '$2y$10$V2CopLLxstmA.DvZk9NIr.xVGxY0Oczl2W5DEGrQuDFxlandkJWLy', 'img313.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(314, 'JosÃ© Efrain CalderÃ³n Calasin', 'jose.calderon@oportunidades.org.sv', '$2y$10$Ai/TzYxCUgKM9cLipAEi7.G5CedR5RfW./OPgBtyjKmMohG5GAnPW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(315, 'Ronald Alexis CalderÃ³n Flores', 'ronald.calderon@oportunidades.org.sv', '$2y$10$EVmEZ92tRWd.kbGzFv49neNIjoFhOqkJNkE0gjOoYkJ3In84hAQUa', 'img31583855.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(316, 'Wilber Antonio Candelario Contreras', 'wilber.candelario@oportunidades.org.sv', '$2y$10$LXAo7u.6D2/E/k4lxoNAcOmDsSs1tbw8GOTquBH0c1HrIithiPG2S', 'img31674648.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(317, 'Mayra Elizabeth Centeno AlarcÃ³n', 'mayra.centeno@oportunidades.org.sv', '$2y$10$7dngB/yaq9QEGxnBV8QSMubSHVg5MbrTI191vKkqVoiscuzXlitMW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(318, 'CaÃ­n de JesÃºs Cerna Nerio', 'cain.cerna@oportunidades.org.sv', '$2y$10$M4z1yW8Ymbkh1oy/wClXR.6lh4q/PpSpraAzyP5c2tlzsJs2dHVlq', 'img31829008.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(319, 'Jacqueline Emperatriz Cubas Depaz', 'jacquelinne.cubas@oportunidades.org.sv', '$2y$10$Zt1cok5p7GpV7eNx3Sgir.Q.7rp6UCT0IW1jn3qNKU.uOlB5emU2W', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(320, 'Magaly Sthephany Flores Arriola', 'magaly.flores@oportunidades.org.sv', '$2y$10$/AT2w7NrxULvmjJTOrmkZO6MFvquEeLra01u/uL7qoWU5mH1Bg8Dq', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(321, 'Angela Gabriela GarcÃ­a Pichinte', 'angela.garcia@oportunidades.org.sv', '$2y$10$Xd2G4C6j2uZCM.61NpmZQeYmtWJcc7MwL/EWx8UGNHkHRDYFiWcry', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(322, 'Kevin JosuÃ© GÃ³mez Melgar', 'kevin.gomez@oportunidades.org.sv', '$2y$10$5RranSvOy2zic0i2H4HPR.tyCzm7M3Ye/7D/fetVjXXIV4j1vLpIW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(323, 'Lizbeth Beatriz GonzÃ¡lez ArdÃ³n', 'lizbeth.gonzales@oportunidades.org.sv', '$2y$10$ARijE/6pB0dDbjWbZ8.tCuVm75tceZYj5eG3YqQXqevS867BBTLVy', 'img32353927.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(324, 'Katherinne Milena HernÃ¡ndez RodrÃ­guez', 'katherinne.hernandez@oportunidades.org.sv', '$2y$10$C0tb7.pl4GHQioxGLusfhefp/LnEuzL.jeHf3q8AgL/YgRmLQOumC', 'img32449146.png', 1, 'SAFT', 'Estudiante', 'SAFT'),
(325, 'Paola Guadalupe HernÃ¡ndez Vicente', 'andrea.hernandez@oportunidades.org.sv', '$2y$10$9EK4O.2YJXJibw6Ei7oSK.Emmw8RgxovUeuvS0opefJ5TFb2Yn5Q.', 'img32595854.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(326, 'Adriana JazmÃ­n Linares HernÃ¡ndez', 'adriana.linares@oportunidades.org.sv', '$2y$10$EqAECucf8s1fFX5bPqzm3uUQYsH2B5.WcqHdbgAdCDs0IXhasKImG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(327, 'Iris de MarÃ­a LÃ³pez Castillo', 'iris.lopez@oportunidades.org.sv', '$2y$10$0HztnB8/jFG1sNiiSYjPjOn2G7lD8FcMfB1W195Glm00D0Erf5PAK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(328, 'Sara Ivette Mena GonzÃ¡lez', 'sara.mena@oportunidades.org.sv', '$2y$10$d.0hk37rHpM9biapR5gDbOma83CrDx17ichRg5/h8ZaCy0fWZtM/O', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(329, 'Sharon Elisa MorÃ¡n Aldana', 'sharon.moran@oportunidades.org.sv', '$2y$10$TeHwwDyZt.Z91bJywb9XLO9EKfKyIgEzU4Mgd5JNSpu1MMMEPWH5i', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(330, 'Jennifer Lorena Castro Aguilar', 'jennifer.castro@oportunidades.org.sv', '$2y$10$oOObiT8qOKDn0JHLX5hh..GPkJF/Uw8aDOUBZnrFK3fRgGrs2FF7q', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(331, 'Rodrigo Alejandro MorÃ¡n MagaÃ±a', 'rodrigo.moran@oportunidades.org.sv', '$2y$10$yA.SYRis41Pia2AhxcKwzesFl1b0hW9Z8dzYA985BjrU3h7pdkREa', 'img33132465.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(332, 'Xavier Alexander PeÃ±ate DueÃ±as', 'xavier.penate@oportunidades.org.sv', '$2y$10$wfUresPNJR117IAihU0W2OimydRiFa2awQzv9byPaYSOoO81wy3ce', 'img33273516.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(333, 'Marjorie Esmeralda Castellanos Musun', 'marjorie.castellanos@oportunidades.org.sv', '$2y$10$4lRV05B5GVpz86AS9AE8duc9vYQyO00hj81cYPrf14QYFBF6QB3um', 'img33373680.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(334, 'Gustavo Enrique PÃ©rez DÃ­az', 'enrique.perez@oportunidades.org.sv', '$2y$10$.kPg0.T5OEgqgdpfmKnbje2XIr1.i95Yp0Ew0jbBMBRVZf5ce7Id.', 'img33488287.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(335, 'HÃ©ctor Antonio Platero Esquivel', 'hector.platero@oportunidades.org.sv', '$2y$10$G/ZDdlHc/8JRu3pWmpvOXel3N21wayN24yhh7wgCeZGZnTL43ciZm', 'img33513912.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(336, 'Katerin Roxana Ponce Quijano', 'katerin.ponce@oportunidades.org.sv', '$2y$10$abWIVo5bX2GxUm3gY1OZEegFSdAaA3nW08I/cNPaA5so850mLJ7lq', 'img33675715.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(337, 'Stephanie Yamileth QuiÃ±onez Mata', 'stephanie.quinonez@oportunidades.org.sv', '$2y$10$Gatex4pPw315gYjg2lcLYeDQ1aXu.HAWiZTi95snwA4G2rGCJCto.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(338, 'Kenia Patricia RamÃ­rez GarcÃ­a', 'kenia.ramirez@oportunidades.org.sv', '$2y$10$P.WiHS7z4nnL00GeA/Zt7OHDw4CFEgoJxIJ6BXU8.8IiXdzylEpjy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(339, 'Dayana Nicolle RodrÃ­guez Sagastume', 'dayana.rodriguez@oportunidades.org.sv', '$2y$10$TYwYAJf5lJb2uM6gEl8/I.523yceW6t5FuMzhKLwGdm4S1PskJyYu', 'img339.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(340, 'Nancy Gabriela PÃ©rez Ãlvarez', 'nancy.perez@oportunidades.org.sv', '$2y$10$OtGjs/MW6VhI6KONb5qUkeVHPwyeYpM1Ljeu4emDPBQjKOn4NGDi2', 'img34051764.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(341, 'Paola Noemy Ronquillo Aldana', 'paola.ronquillo@oportunidades.org.sv', '$2y$10$uzzyZnZbrKwG5rswScOw3eUIq7HtWdqWA/EfeFpXvYCUODFTOJ1Ky', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(342, 'Melanie Giselle SÃ¡nchez MÃ©ndez', 'melanie.sanchez@oportunidades.org.sv', '$2y$10$pMQenZeELO6SCf6nJHjck.NszxA.fR0tDGKMX.0Z8UnAcWszw6dSW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(343, 'Diego JosÃ© Saravia ZaldaÃ±a', 'diego.saravia@oportunidades.org.sv', '$2y$10$PVJJPTJ5sUlHDbVsf/7pUe/1dBy8.8it2muFb9uIyl1BOQK5wunpe', 'img34375750.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(344, 'Gerson ElÃ­ ServellÃ³n VÃ¡squez', 'gerson.servellon@oportunidades.org.sv', '$2y$10$Ft5//vI.1P0w79FuknzYAuZTEA/NiuILedxg0exd7ZwD./PogM/Vm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(345, 'Bryan Alexis Vanegas Molina', 'bryan.vanegas@oportunidades.org.sv', '$2y$10$hL7tloYt/UiQEoC9Kwze3uUv59Umc8ILkV.SjpCQewKaX7QbOmlwi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(346, 'Kathya Lisbeth Villeda Rivera', 'kathya.villeda@oportunidades.org.sv', '$2y$10$VHGO9jQ2W0gOzTzfYE4GR.NBVE4ZGIl33Cwm1uCS.2FAPp0GzS646', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(347, 'Jose Ricardo Zuna Morales', 'jose.zuna@oportunidades.org.sv', '$2y$10$yX0dtHFv03R3NMTBQ9FHg.EWNkX3yeNo7CT/XBCNU2wuOgdvH6OH.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(348, 'Alejandra AbigaÃ­l JimÃ©nez Torres', 'alejandra.jimenez@oportunidades.org.sv', '$2y$10$4HyPB7bzXl98fgxwgaVlWO3Ikh11jYc5uZ9hu5/Pfzfa5mVY3NoHC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(349, 'Alexandra Michelle Genovez Quintana ', 'alexandra.genovez@oportunidades.org.sv', '$2y$10$tuQ2YIQZwtARMj2YrdBLX.KD6mV/3AmyGqOZdnUGJvMSSTx2M1tMW', 'img34933243.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(350, 'Andrea Liliana Aguilar Cruz', 'andrea.aguilar@oportunidades.org.sv', '$2y$10$H9HKA7efX7qF29LVsnfJVONY/GZLyzqBCoKSU/Jc55EoBiTuZDjm2', 'img35016793.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(351, 'Andrea MarÃ­a JimÃ©nez VelÃ¡squez', 'andrea.jimenez@oportunidades.org.sv', '$2y$10$p2bzkrzQWfjg9siwY9.Vm.XC9A185aNoAgq/Y2eJLfodP1mt9h.WW', 'img35112723.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(352, 'Aracely AbigaÃ­l Escobar LÃ³pez', 'aracely.escobar@oportunidades.org.sv', '$2y$10$dsak85Gam/KkJ2hsuqzoFex5Hcp2Z3Q9hXswr.1C3q8bJRCDJm2be', 'img35270683.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(353, 'Blanca Paola Rosales Valdez', 'blanca.rosales@oportunidades.org.sv', '$2y$10$SptVJg6br7QccAAnTNFPPOfsFSJ3jt6UCMyQHqJs6jD0HQOYjIdHO', 'img35338194.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(354, 'Brandon IsaÃ­ Cruz Escobar', 'brandon.cruz@oportunidades.org.sv', '$2y$10$gr.nu.Sy7GxuW.nXp61PLuCZxDrCR7aEkJ7AxslPkwVo1WgW309qG', 'img35462170.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(355, 'Carlos Enrique Posada Grande', 'carlos.posada@oportunidades.org.sv', '$2y$10$rgzQoNRF3AMTiPvE962/nO0ncc.5Kboayd.9ZqjqtP0DBgNWs26B6', 'img35593041.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(356, 'Cecilia Gabriela Salazar Ruiz', 'cecilia.salazar@oportunidades.org.sv', '$2y$10$U13YPv.bPJbZuyO.akDIze99TNRXwkvUAXUqzg33RZDHTWZ1HwV9G', 'img35695864.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(357, 'Daniel Orlando MartÃ­nez GutiÃ©rrez', 'daniel.martinez@oportunidades.org.sv', '$2y$10$fvXm42qwDnzIxS63hZImmOyjv8hPw0gQ05RiJDvnaGQD4/xaG8YC2', 'img35729836.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(358, 'Daniel Vladimir SolÃ­s MarroquÃ­n', 'daniel.solis@oportunidades.org.sv', '$2y$10$w3gqnHdIIJMVNF17GOxnAu69e1.6U/JH5ZgsuTl.yQeS5lfjOWzvm', 'img35867835.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(359, 'Diego Ernesto GÃ³mez MartÃ­nez', 'diego.gomez@oportunidades.org.sv', '$2y$10$wPuImPN73TYjbVWrI9ZFoOPDVYQALs1Ks./rJxrU9Xiy52Lp0aCw2', 'img35965890.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(360, 'Diego EsaÃº HernÃ¡ndez MagaÃ±a ', 'diego.hernandez@oportunidades.org.sv', '$2y$10$4saLcByo2STqbLUHfi1EhOC//NmTIXurZHx.LH/njoN7lbynfEUti', 'img36073081.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(361, 'Douglas Omar VÃ¡squez Tobar', 'douglas.vasquez@oportunidades.org.sv', '$2y$10$9C8rZILE/HXhO0sZdsQ9COtUgqmSDpulHsgVfcEzQz6X62.XdVVZq', 'img36134420.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(362, 'Emely Dayana GonzÃ¡lez DueÃ±as', 'emely.gonzalez@oportunidades.org.sv', '$2y$10$w/R8bqvRZgARgenXmdA.euwyGdOX/C0SL.r0ySnl2x5emQRGUQsLS', 'img36274611.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(363, 'Emerson AdriÃ¡n MartÃ­nez MartÃ­nez', 'emerson.martinez@oportunidades.org.sv', '$2y$10$.EfAgl/nF5yRt/E1UIvCo.Oi98rSWFFS63Pxfwga/oRK9Bgq/k2oK', 'img36393328.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(364, 'Erika LucÃa RamÃ­rez VÃ¡zquez', 'erika.ramirez@oportunidades.org.sv', '$2y$10$T0zLi1dAxDI4e27wzxVOJebTFL5ii20ziraUrm6j/ojE0qPVG1zmy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(365, 'Ernesto JosÃ© Padilla Cerna', 'ernesto.padilla@oportunidades.org.sv', '$2y$10$cOs99b5cQCwyYnH9J60IHOYjVWFxKdESqeD6KdAmmIkUvQjruST1u', 'img36557736.png', 1, 'SAFT', 'Estudiante', 'SAFT'),
(366, 'FÃ¡tima Lourdes Choto MartÃ­nez', 'fatima.choto@oportunidades.org.sv', '$2y$10$lQ62p96pqPtIivWCmNmgpOGRQtfl65vIbHZ4APMQq8fy2qJ7CV.Ky', 'img366.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(367, 'Gabriela Michelle HernÃ¡ndez HernÃ¡ndez', 'gabriela.hernandez@oportunidades.org.sv', '$2y$10$hjK0E/n2hbLLba1JOLoNoer8yHbuuhog3mAUYJFet33rgnBEEHnxG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(368, 'Gerardo Javier Barillas  HernÃ¡ndez', 'gerardo.barillas@oportunidades.org.sv', '$2y$10$F4w7eQHi5jyVlCCnQB5ObOfXF/JibYaFLZ0tMW81GEkBowVs.WNvi', 'img36868826.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(369, 'IsaÃ­ Natanael GonzÃ¡lez Ãlvarez', 'isai.gonzalez@oportunidades.org.sv', '$2y$10$sS/V5j0rC/zcqmZmWSWMxO.7z.7Pw1OeMQsdc9IL4.C7GH0/oP4mW', 'img36986511.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(370, 'Jairo Oswaldo VÃ¡squez MartÃ­nez', 'jairo.vasquez@oportunidades.org.sv', '$2y$10$veI2N3yiA1BO8dB1f1J4puqcSzePAky.WVf2F8dftvsKEFIDhJrfy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(371, 'Jeaqueline Rosalba Jacobo GarcÃ­a', 'jeaqueline.jacobo@oportunidades.org.sv', '$2y$10$c9lukik1Kqfm08P1sWXHLe54kMUfUSs1tcyNqTvoLq0RgQ8iXJI.G', 'img371.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(372, 'Jennifer  Xiomara Samayoa MorÃ¡n', 'jennifer.samayoa@oportunidades.org.sv', '$2y$10$evo98srQO2GbmpIi6I99suUHqRqP7QpPJXPQl4niTSjEhkD6mZrqC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(373, 'Jennifer Liliana Mata CÃ¡ceres', 'jennifer.mata@oportunidades.org.sv', '$2y$10$XBk6P3J7NajQRNQ6Bbgoe.01VNyGmv2ezu1TWMZLNeFMaBcxyhgHa', 'img37350112.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(374, 'Jessica Maricela ChÃ¡vez GarcÃ­a', 'jessica.chavez@oportunidades.org.sv', '$2y$10$XWCyi3hgelh1nwZ8BQDrc.8OEn4kk2BYO859jx6DTS4JDC/cWVYs.', 'img37446543.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(375, 'Juan JosuÃ© Melgar HernÃ¡ndez', 'juan.melgar@oportunidades.org.sv', '$2y$10$f.RmzlWUZnrNjoCOnFONj.FlFoBqVWnVcXLeO4YbwSmsGDitVf8FW', 'img37527941.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(376, 'Julissa Michelle MorÃ¡n Ortiz', 'julissa.moran@oportunidades.org.sv', '$2y$10$s0DKGkgd6iLKASisDhPrTOJFc21ap1N7k0hD7fO1HKVxtAkkHfcBK', 'img37615181.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(377, 'Karen Andrea LÃ³pez MagaÃ±a', 'karen.lopez@oportunidades.org.sv', '$2y$10$A9os7TjfK2.zMyLTbRE2SOEoIv5U6s9QVrXKtEW4agkT4JFY8wyJ.', 'img37723710.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(378, 'Karen Beatriz Mata SÃ¡nchez', 'karen.mata@oportunidades.org.sv', '$2y$10$AFGwL6V24IWAHaGsUFypl.hCjQiJQJYOIqWSB2X3bLf8snDTIs282', 'img37843935.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(379, 'Karen Elizabeth Ramos Cienfuegos', 'karen.ramos@oportunidades.org.sv', '$2y$10$fjyKgtxZ8LDlBcG7r8tNiuJ2fp.Cqm3mg0Vle6UR0zrf7RL2yuCa2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(380, 'Karla Tatiana GarcÃ­a Liborio', 'karla.garcia@oportunidades.org.sv', '$2y$10$FnnN2vTmpxTBswS5mdUdP.6hav0LdQQhXWRq5qvxzrNDfTQsUe6dK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(381, 'Katherine Lisseth Asencio Castaneda', 'katherine.asencio@oportunidades.org.sv', '$2y$10$YLNZzVD8080LWYE2bcNMVOAkWCeZKKtlrl5oQjbYNAVuUt9xiSPXq', 'img38198666.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(382, 'Katherine Michelle Latin Guardado', 'katherine.latin@oportunidades.org.sv', '$2y$10$ir/AmvS2KVf2I3bUSYcq8edpwVsamlI/1mP.BEh.7xVdw/U9X6FTK', 'img38263110.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(383, 'Katherinne Esmeralda ChÃ¡mul Pacheco', 'katherinne.chamul@oportunidades.org.sv', '$2y$10$yTUkmtTSuFh/K4FeJrFD4egkRhnm737vUIXkZYNQ329PBqcxU2B4W', 'img383.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(384, 'Katherinne Maritza Guevara GonzÃ¡lez', 'katherinne.guevara@oportunidades.org.sv', '$2y$10$TU/MoawEP9mUPF.RHpGhPOITIXJHwa8ncTzjsU6OQzVhOVWp2z7f2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(385, 'Kevin Enrique HernÃ¡ndez MorÃ¡n', 'enrique.hernandez@oportunidades.org.sv', '$2y$10$vfKtMAB4WcSdFEfjqqBkF.uhxQku90uQbhwDeRkuKXVnJ4sL5eXv2', 'img38576338.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(386, 'Kimberling Elizabeth RamÃ­rez Santos', 'kimberling.ramirez@oportunidades.org.sv', '$2y$10$QsqJS7JhSm8QHjRPHd.HAeD.bXEUAqZsRJADaITUg8EU2icczsPsO', 'img38676182.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(387, 'Krissia Vanessa Ortiz Alas', 'krissia.ortiz@oportunidades.org.sv', '$2y$10$bnxwlgK02XgEX/8LDc1.N.u23/APvzMPwefVp4JPTg0wq.X.ifSxy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(388, 'Leslie JazmÃ­n GarcÃ­a PÃ©rez ', 'leslie.garcia@oportunidades.org.sv', '$2y$10$vPG3fBfkb22oKB2X4QLm2.s7.oAzQFTn8onZeZl2dT9JWkBefGN4a', 'img38864395.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(389, 'Lineth Verenice Mena CuÃ©llar', 'lineth.mena@oportunidades.org.sv', '$2y$10$o/1aNjNDnIqioVDME0OId.AVwt7oIepb2IPtcyO2ARYRxTPQlkhSe', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(390, 'Luis  Enrique VÃ¡squez Aquila', 'luis.vasquez@oportunidades.org.sv', '$2y$10$s3RAPoHabVo240MR1lj25.bB90/a2t1c6JQlnAAbHnuGk6fpMZU.m', 'img39055612.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(391, 'MarÃ­a de los Ãngeles CanizÃ¡lez Toledo', 'maria.canizalez@oportunidades.org.sv', '$2y$10$VIcamrc4SiSuf5fckcLthO0xiBNDx8K5Qn8fLNlEFse0mtzigbFC.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(392, 'Mauricio Eduardo MenjÃ­var Escobar', 'mauricio.menjivar@oportunidades.org.sv', '$2y$10$hqYZ3bYpE4z5GNWz.SZIz.O91G5QKsEpxd8lil3VZUWeH5Ml4f7r2', 'img39218632.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(393, 'Mayra Noelia GonzÃ¡lez Monterroza', 'noelia.gonzalez@oportunidades.org.sv', '$2y$10$souk1/9w2iNrFdSMsoh7xOEqmTEkQPqMJOjVIQb63BFGwO6XsMzG6', 'img39342147.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(394, 'Nayeli Michelle MÃ©ndez Cincuir', 'nayeli.mendez@oportunidades.org.sv', '$2y$10$ZMB9PBnL/YFTTVTaYVsjdeea7PlqXs0pCm6eOhmPNx4iCNap.KXuq', 'img394.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(395, 'Oscar Enrique Hidalgo Zelaya', 'oscar.hidalgo@oportunidades.org.sv', '$2y$10$WdkFOeIo3MQ/FPU2iRGokuJVZFW1VUw2d7g.DQiPEl.bGxzAw5ONu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(396, 'Paola Andrea HernÃ¡ndez Flores', 'paola.hernandez@oportunidades.org.sv', '$2y$10$LXRl9dmug5eB3VpmegxcSewhcvUncN0Twksid8Gbd6VDJSpctVJGm', 'img39635168.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(397, 'Paola Nicolle ChÃ¡vez BaÃ±os', 'paola.chavez@oportunidades.org.sv', '$2y$10$vtZrNFSWwgdvfAThO3uv3eycYJmkiruiRo/KHRwlxS85UiFWcgKIe', 'img39725693.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(398, 'Rebeca Ester GarcÃ­a Moreno', 'rebeca.garcia@oportunidades.org.sv', '$2y$10$jzuT.RZLuFscFr9ZTpF2n.Rca5OG6iGXIdDPfMzfuufiJxLqsISu2', 'img39852346.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(399, 'Rodrigo JosuÃ© PÃ©rez DÃ­az', 'josue.perez@oportunidades.org.sv', '$2y$10$U0XnkYrnAojueC9Aqr61/eLYxeCvdQMkGwDkF720.1p5ElmzzMi0S', 'img39994527.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(400, 'Sara AbigaÃ­l Villeda Escamilla', 'sara.villeda@oportunidades.org.sv', '$2y$10$eNFQ20sTeAEUtCaro3/nFeiiXax7BKWe6K/CxtPIR3y6JX5chesEO', 'img40091940.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(401, 'Tatiana AbigaÃ­l Alvarado Tejada', 'tatiana.alvarado@oportunidades.org.sv', '$2y$10$hxHr60Yb3a7k1kz5bzpaNOPtu.dVvICQ.a7MzxppJgS.sLz6jP/Bi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(402, 'Vanessa Johanna Morales MorÃ¡n', 'vanessa.morales@oportunidades.org.sv', '$2y$10$9I6LcHFZhc0Cm0/K/NQ91.ZwfCKX161jrrfsL5Ur0DVMBv5MsrOgC', 'img40220293.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(403, 'Walter Alonso Cruz Galicia', 'walter.cruz@oportunidades.org.sv', '$2y$10$L3GV01vhkZL40JqCxXKzfe.ea0wMKpLPsUyxFQZ.9.wzg2zSJezF6', 'img40379019.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(404, 'Walter Ernesto Funes SÃ¡nchez', 'walter.funes@oportunidades.org.sv', '$2y$10$Ht.v9JNvwJOzJqrlelOQPewF6ZYSDOi27VZoC9G9oN2nXpHZbuOB2', 'img40489657.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(406, 'Ingrid Raquel RodrÃ­guez GutiÃ©rrez', 'ingrid.rodriguez@oportunidades.org.sv', '$2y$10$rvsFBpusRQLSBQd5xgqxcu3fCkVzaYHpM747yZWriLjgURtdqbYe2', 'img40618379.png', 1, 'SASAT', 'Estudiante', 'SAFT'),
(409, 'Levy Mauricio Alarcon Alfaro', 'levi.alarcon@oportunidades.org.sv', '$2y$10$wSTw18zBFL6rHjaYLJCwXeSgJjut7Dm1IAAxNl3wt0Vnx3ctk7.4.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(410, 'Erika Arely Alvarado Nativi', 'erika.alvarado@oportunidades.org.sv', '$2y$10$ddZSDqjmDTNM4sHfeHxvP.2gnogkIlkbxY0JLY49jdZ2oFsILgrwG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(411, 'Joaquin Antonio Barrientos PÃ©rez', 'joaquin.barrientos@oportunidades.org.sv', '$2y$10$brTOfskCa2F9nbVJ46lI/.ScMpaYyhyJa3wbDoDQ7DsnjGU.NN0LW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(412, 'Carlos Fernando Calderon Rodas', 'carlos.calderon@oportunidades.org.sv', '$2y$10$1xtlJQQ0h9e1fIZ.czJEEOkluCBtphPmEZSGTwMsDhXbyH2MAdpS.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(413, 'Israel Antonio Candelario PeÃ±a', 'israel.candelario@oportunidades.org.sv', '$2y$10$4Vy5Q.UgHcO4C1NUKOTKa.b/t3dq12ZUO2cjzGZyZS1vOPu/ICha.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(414, 'Daniela Beatriz Canizalez Toledo', 'daniela.canizales@oportunidades.org.sv', '$2y$10$jcs48XhYuTxKnRmdDLNqTeqfJpr2AAbRNUk31Ufs5q2eT2QjphoXe', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(415, 'Juan Carlos Centeno Perez', 'juan.centeno@oportunidades.org.sv', '$2y$10$IQphOiKnXyP0ncLa6PKanuKThn/.d0cM8ond4Cdj4rLfCuMvWXjHu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(416, 'Ileana Beatriz Flores Samayoa', 'ileana.flores@oportunidades.org.sv', '$2y$10$KDFcYZ.5xpMz9ttYb5ojLuhhBZrTmYa4JFdtn/FyyHH5hOxhqvCKm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(417, 'Vilma Esmeralda Gonzalez Guerra', 'esmeralda.gonzalez@oportunidades.org.sv', '$2y$10$.cS9zNc7PpTCv3PhDdu5z.ywV6/K9Dsl0Y3SWvazKX1KycnledPUi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(418, 'Gloria Maria Agreda Castro', 'gloria.agreda@oportunidades.org.sv', '$2y$10$pKJ0nW.uBYUsznFdLZHZSOV6WnBSEWDD9r3lXK2Kak3vodH211vSW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(419, 'Doris Jeannette Granados Granados', 'jeannette.granados@oportunidades.org.sv', '$2y$10$BHNJxKZBbYTBl8lEAylOOOdsXAQr/sejq0Qca8/sSaS84V0vJZfpa', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(420, 'Jose Mauricio Gudiel Rodriguez', 'mauricio.gudiel@oportunidades.org.sv', '$2y$10$s9PjizG/PFfWnVqQLR9PMu0m3r/Grz/Y4kgf8G7zvhayq5xMxV8/O', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(421, 'Alberto Ernesto Hernandez Moran', 'alberto.hernandez@oportunidades.org.sv', '$2y$10$VKqYuZoDdMxGmU2WrPB8DO982aUVDqgFzQWjSclM85Zq/vaXhOvga', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(422, 'Vanessa sarai MagaÃ±a Navas', 'vanessa.magana@oportunidades.org.sv', '$2y$10$wQZPad.6IAGNlT5/D0Z/4uHzYUdnVzB5iI7b7jw7OB/nrd7SSpiae', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(423, 'Juan Carlos Menendez Zelada', 'juan.menendez@oportunidades.org.sv', '$2y$10$EyAK2R2kKHESOjCN41w2Y.ortFMU7fTtVhHJQ5.BWY0lEhbCaUsAW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(424, 'Irving Alberto Olmedo Jaco', 'irving.olmedo@oportunidades.org.sv', '$2y$10$h7a9YpoE8BoPt8txmZWiqOyZ3/XMcTUk/7B.KRGSsYOCl5P2nAncG', 'img42465624.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(425, 'Monica Raquel Orantes Flamenco', 'monica.orantes@oportunidades.org.sv', '$2y$10$IRxvzr3CdvB0PPxq.7ksZ.EQBDwu2l/Lrm8iuNZupgMi/QKizLXLy', 'img42588318.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(426, 'Moises ElÃ­as Osorio Vanegas', 'moises.osorio@oportunidades.org.sv', '$2y$10$Vd0G9y.pUuoVgYnAVGm8m.fgrNRFC4oxmSE/zQUv2K2.cV0LnVvHu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(427, 'Angel Abraham Palacios Rodriguez', 'angel.palacios@oportunidades.org.sv', '$2y$10$BO9D5LqbNDoc1gGIRE1pDOTw56tKKckbR40QqFvx5aeudJgCQcS96', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(428, 'Oscar Emerson Rivera Lara', 'oscar.rivera@oportunidades.org.sv', '$2y$10$m1S4sQalnJrRciY/HKoJKuHvkR.9xugkzCoa5/sfD8oAZJbOi7giC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(429, 'Gabriela Janeth VÃ¡ldez MelÃ©ndez', 'gabriela.valdez@oportunidades.org.sv', '$2y$10$AUH7ym/GTw4cYeZJ2RvCNOPMfOSlvnoJbUvdc/GEGLd1ZNQcYJB2u', 'img42948608.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(430, 'Ana Maria Lemus CalderÃ³n', 'ana.lemus@oportunidades.org.sv', '$2y$10$64MtMFMZzd9ho0MsCKhYzuarTSrUo.LVe8dnMdRJFXDt9K2xzPgBK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(431, 'Adriana Maricela Rios Alarcon', 'adriana.rios@oportunidades.org.s', '$2y$10$bz8.q28sI8PGsSARcNZpous8qp/mibYqOwZcNdFxqglz.CuF2Kx/O', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(432, 'Adriana Julissa Zuniga Vega', 'adriana.zuniga@oportunidades.org.sv', '$2y$10$9TJ4qekZMLmL6SMLT3ULCeYPfUScYY7qkHXwao8KH0f/4A0FcM4Fm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(433, 'Alexander Alfredo Valle Zometa', 'alexander.valle@oportunidades.org.sv', '$2y$10$ffOO2Jl22UCEP.z/zBs8v.9X1jrjaIOD72FD/YUiqaiz50oMNMgf6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(434, 'Ana Iris MarÃ­n Salazar', 'ana.marin@oportunidades.org.sv', '$2y$10$F3sFwUFm60Zasrfwwh.Yn.7sz3BUhmRa7hGOsN1ZG1tJChEnQ7OrO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(435, 'Berta Carolina Guerra Castro', 'carolina.guerra@oportunidades.org.sv', '$2y$10$CP3iqS4HlQXkYbDaJuHH/OojQWjNPykKp.n9kolqXUHk9z6k8dXjK', 'img435.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(436, 'Cesar Daniel GaldÃ¡mez Orellana', 'cesar.galdamez@oportunidades.org.sv', '$2y$10$dlCPOwC4L7l1FEtJHwIEneUbaMFDlR/W.XrIUY0De.XhLpNrxPOiu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(437, 'Damaris Ester Morales Aguilar', 'damaris.morales@oportunidades.org.sv', '$2y$10$lQ7h8ikr5YanA/s9eZo1xOPaHOKtNfQNp/XUgubf7Z7uW8iLBM36G', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(438, 'David Ernesto Cordova Bonilla', 'david.cordovab@oportunidades.org.sv', '$2y$10$wr1KNko3H2OVD/nXTrDgN.ncYavqUgKCKH.sLmy18iW./D8WSayee', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(439, 'Edgardo Vladimir Trejo CÃ³rtez', 'edgardo.trejo@oportunidades.org.sv', '$2y$10$72KiWv3QSa39ivhRIVSDqeP8a11bipRJuw9ARquCsIf/JST8tXTj.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(440, 'JosÃ© Eduardo Monge', 'jose.monge@oportunidades.org.sv', '$2y$10$cXjQh0eE8fve67ZsKq7bjOk7IwobmU8Fgy6cy3V9vqxCdRxmm4.ri', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(441, 'Erick Vladimir Ruiz AlcÃ¡ntara', 'erick.ruiz@oportunidades.org.sv', '$2y$10$vnz/KV5CHovBTCjjeVfAXu.xM6SpZKmQSkgqeYai4a.TNpivyb4Q6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(442, 'Erika Beatriz Ochoa Rosales', 'erika.ochoa@oportunidades.org.sv;', '$2y$10$G8fUU44CMWBw4QrsNdm75OArxjA3eE/vjcEy6wvYW35Bv1KOowZy.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(443, 'Fatima Vanessa MartÃ­nez Figueroa', 'vanessa.martinez@oportunidades.org.sv', '$2y$10$b40Qa3muIuQhZn7SU8tFO.mF2dJwGhpALsj4CPJeLQP6f1YRAJVn.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(444, 'Gabriela SaraÃ­ Sandoval Aquino', 'gabriela.sandoval@oportunidades.org.sv;', '$2y$10$a6lNZvFwy9BXpl7YhM9ZNeThu3r3RJFPHYoycWTo8wdpfmBqwJAcC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(445, 'Jacqueline Michelle SolÃ­s Cruz', 'jacqueline.solis@oportunidades.org.sv;', '$2y$10$4YQ2KQPKEwmhAf328/4h6.eFwd6EgMYn5FoHPgvYEoZNKDKIsjXyO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(446, 'JesÃºs Oswaldo Calderon LÃ³pez', 'jesus.calderon@oportunidades.org.sv', '$2y$10$ytLiPPg4dtzw7Xc004hPDO.7Y0t7IbQghGJTneAwXn6Zm7SGE.Zt.', 'img44668548.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(447, 'Jocelyn Yamileth Chicas Escolero', 'jocelyn.chicas@oportunidades.org.sv', '$2y$10$TUiXnveBrjQVAcWKyHpjf.00GhUmCJp8Wxs/nCEjjewRL5LNlAn/a', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(448, 'Jonathan Antonio Polanco AlemÃ¡n', 'jonathan.polanco@oportunidades.org.sv', '$2y$10$CY9ZnFOSVm8jBj0aiAuEPOQgdXUn2igQJFVa/qOrzE6/6DqpiXu6O', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(449, 'Josseline Elizabeth UmaÃ±a GarcÃ­a', 'josseline.umana@oportunidades.org.sv', '$2y$10$nWq/4X4b/DVJwwnz.ClfwO.hukPYyHirOoxrRYom.tUbuYuckWzMO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(450, 'Josselyn Guadalupe Flores Solis', 'josselyn.flores@oportunidades.org.sv', '$2y$10$ajWL0Q1U1ZFyTy/ttqhK7eHTf6Iu0hwESpQkIvpto12wI7FHP.IX2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(451, 'Josselyn Carolina Ramirez Flores', 'josselyn.ramirez@oportunidades.org.sv', '$2y$10$D1iy3EjO50QgIBvMt/jyqOJ0RG.nsOnMV5g8UaSV5t4o5rRXz6lkC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(452, 'Tania Julissa Ramos Hidalgo', 'tania.ramos@oportunidades.org.sv', '$2y$10$n/lkKNqvhYIHfsCcdLZ2ruR.r1xedaBVPxGD/K3nuRmUxKlZ4IUhy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(453, 'Katherinne Jeannmillette Cruz VÃ¡squez', 'katherinne.cruzv@oportunidades.org.sv', '$2y$10$E0QIa3Q9.dW9JlnmJljCe.0NOMsBFQblmkJIb1YJHbYIYUX2TBz8C', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(454, 'Keily Yamileth MartÃ­nez Flores', 'keily.martinez@oportunidades.org.sv', '$2y$10$66sqk3N.EmT.s8jAGqs.1O5aimLXyey/cwOnBvmrPVWYQ7e3dVVba', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(455, 'Kenia Vanessa AlvÃ¡rado LÃ³pez', 'kenia.alvarado@oportunidades.org.sv', '$2y$10$XdaMQgdAp0mL85HFs1DbEO9xq9vKETQcBpMaWoXlOvd7FuQ6Rd4MC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(456, 'Maria del Socorro Cisneros', 'maria.cisneros@oportunidades.org.sv', '$2y$10$rui2PKFgDlKjHPDkfdHCTeZlXmLQLg7L3jzG7Z2gKJNp/dMeAqsI2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(457, 'Mariela Ester Salazar', 'mariela.salazar@oportunidades.org.sv', '$2y$10$8S5AXSVgIaSvxaGqoxtsZevj8/nCJgaTFUPB61gT1ayOnLYTyT5OO', 'img45730688.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(458, 'Mario Ernesto Francia GaldÃ¡mez', 'mario.francia@oportunidades.org.sv', '$2y$10$fVekfLTJi18VfC81mYDOBuCIOG5SN7X.ejTS8.8n5j2gZxlQqm79i', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(459, 'Marvin Ernesto Moran Ortiz', 'marvin.moran@oportunidades.org.sv', '$2y$10$on.PVFToatt9RHOb2tvt9.Z1K1dFbZNJnASuQcWPETUsW/RI4RqWG', 'img45969496.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(460, 'Mirian Marilin Flores Salazar', 'mirian.flores@oportunidades.org.sv', '$2y$10$u6X.nL5jTEtDj6uLUsMS1u5BlgJwpFASpvr8b3niZbTIAWH8kPL9i', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(461, 'Mirna Raquel GalÃ¡n Alvarenga', 'mirna.alvarenga@oportunidades.org.sv', '$2y$10$7EzV9Ij4Dxb1EaIyS567/uR2AeGXW6UpIiXLF5sEb8Cj8byKo2ZMu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(462, 'Nestor Israel Recinos Melara', 'nestor.recinos@oportunidades.org.sv', '$2y$10$5QOzoNDDvSS7Ydr4ZSkLt.g67qTCtAb/5xKzDDK25FjMWWO7vh4eO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(463, 'Noel Eduardo MorÃ¡n GaldÃ¡mez', 'noel.moran@oportunidades.org.sv', '$2y$10$h/os1Tt0x9bOkn8K0zsl6evYRTuroL.1nvQbMh6ffXaps0bFtTWS6', 'img46366983.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(464, 'Ricardo Rafael Polanco Ãvalos', 'ricardo.polanco@oportunidades.org.sv', '$2y$10$XG4yrtV1U4r4fgtYujJrmuZk3jz21Y2KPzLSD0whSPMpHbPfyp30m', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(465, 'Roxana Patricia Guillen Chicas', 'roxana.guillen@oportunidades.org.sv', '$2y$10$GMthMsA5XebAnucFEG/Kp.TiPjW5/wX/MoOUsWtQ/cTc064MWzudC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(466, 'Susana Margarita ZarceÃ±o Salazar', 'susana.zarceno@oportunidades.org.sv', '$2y$10$Rd7CrnENL8Xh6kzQXE2nPuvKNx3du8bTw4meJxdiYQqXrDucc0TCS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(467, 'Victor Antonio Tenas SÃ¡nchez', 'victor.tenas@oportunidades.org.sv', '$2y$10$EJ9hMEoU3uAHBl9Gr03mDecv2WJksotmvFaAswv4ANzUIxMiFOt.m', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(468, 'Walter Alexander Castro UmaÃ±a', 'walter.castro@oportunidades.org.sv', '$2y$10$TmIXruOlfkQ6uhOK3sui9.rKPJ8hhUSEgZHFzpDkUjCxch8JfltPm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(469, 'Fabio Alejandro Aguilar Urbina', 'fabio.aguilar@oportunidades.org.sv', '$2y$10$C9XTuSbW6Ds9.0B75LOuy.KN5lBnX5cSpU5gtUnY0GT0A7GJPcXGm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'CHSAT'),
(470, 'Neri Alejandro Alvarado GÃ³mez', 'neri.alvarado@oportunidades.org.sv', '$2y$10$9sh8oroF.shdbR4vSIxcs.bx2DqyF7MWOzZYXAtr8wYU8UEYPK8lK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'CHSAT'),
(471, 'William Noel Valle GutiÃ©rrez', 'william.valle@oportunidades.org.sv', '$2y$10$D5iI6tkOUvOUp5CX.MQyQ.wYCfbBu3MT724AMW0H/CA0jJxnQIAuG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'CHSAT'),
(472, 'Kevin Danilo Flores Arriaza', 'danilo.flores@oportunidades.org.sv', '$2y$10$03Su0jB1Wudli/.bMpXHVeTUa18HhKrxri3d9rWFWTvVn4/VOSw9q', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(473, 'FÃ¡tima Guadalupe RamÃ­rez MartÃ­nez', 'guadalupe.ramirez@oportunidades.org.sv', '$2y$10$AKv3zBT63/yBKdAReZ07rOw7C31dlQIPnMdV.DIocOf1A9X8B8hyq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(474, 'Leslie Gabriela Argumedo Toledo', 'leslie.argumedo@oportunidades.org.sv', '$2y$10$2WGJtb.t.bQu7OXudq.HveXQQjZSeW.gcsWFP.R33KwMANtpRjKEq', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(475, 'Guadalupe Beatriz Reyes MagaÃ±a', 'guadalupe.reyes@oportunidades.org.sv', '$2y$10$6riz8H3jQlnQR7x6QzjjceemGQTGBJ7yAjx.kvka1zQQsPCI15Oq.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(476, 'Maria Fernanda Moya Estrada', 'fernanda.moya@oportunidades.org.sv', '$2y$10$MbhPmKYv8uSUaCqGwrhPqOmJ1V./yk3ziYGkRkk.heCyPsdt60zMq', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(477, 'JosÃ© Adolfo GuadrÃ³n VÃ¡squez', 'jose.guadron@oportunidades.org.sv', '$2y$10$DE/eovF1bYWWb881PV5dduiDL5H.StpCOVWEBwzyPtdAoVMmoyR.e', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(478, 'Melissa Maritza MartÃ­nez Pleitez', 'melissa.martinez@oportunidades.org.sv', '$2y$10$ECzlFmmG0tG/aQAEph78NeSazv3PVOsmuxSXdIZqyDVcAvvA3X/ea', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(479, 'Nathalie SaraÃ­ EspaÃ±a Salmeron', 'nathalie.espana@oportunidades.org.sv', '$2y$10$bAV7zLgnUzpjJKtfOtEBV.bRYcCeYN4/rYso/B2TNA5dwjJjAJ1Em', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(480, 'Tatiana Astrid Hidalgo Zelaya', 'tatiana.hidalgo@oportunidades.org.sv', '$2y$10$fYkmvUNTXngqtdsYP9s33.HWVUVoeZ02rVT4aNTu7nMpU3.YfzaOe', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(481, 'Raquel Elizabeth Ramos Acosta', 'raquel.ramos@oportunidades.org.sv', '$2y$10$BnG6VcDnRda6mPaWp11OyuKfJs1E.mBOQrgJbuKehubbm43gWC4ha', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(482, 'Stephannie Elizabeth ChÃ¡vez BaÃ±os', 'stephannie.chavez@oportunidades.org.sv', '$2y$10$ZXkv6PwfCwoGQ9qOxiz.s.l8KN0CtCe10ERsC17svbWl3K4gE3FYG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(483, 'Wendy Julissa Vega Garcia', 'wendy.vega@oportunidades.org.sv', '$2y$10$R9ieFRn1veOpNmvZkcP0nuSPna.KOopcmy7wIASmPL65igq50B2Ry', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(484, 'Yesica Karina Osorio MÃ©ndez', 'yesica.osorio@oportunidades.org.sv', '$2y$10$t16cI4GPA9z.FcB/pcAomOsBf3U1aaefTovd4kJMr/PvqI9HjTDcO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(485, 'Jocelyn Michelle Castaneda Platero', 'michelle.castaneda@oportunidades.org.sv', '$2y$10$Gaz6GQSs9oXnhMUooqc0qu1P6ANjoWLNptHBJj9JalXLxlmden.8W', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(486, 'JosÃ© HÃ©ctor BolaÃ±os Guirola', 'jose.guirola@oportunidades.org.sv', '$2y$10$.29CPcKVROCEEml/WzTkfO6WpLKRjTOyUds6J9EDgC016wUXKivZu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(487, 'JosÃ© Rodrigo RamÃ­rez Escobar', 'rodrigo.ramirez@oportunidades.org.sv', '$2y$10$.9Iq5Qtredp3Rt9WId95T.ZlnPKdwjMJCfg/XfGsiygKhS6KX5WnK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(488, 'Karla Alejandra Castro PÃ©rez', 'alejandra.castro@oportunidades.org.sv', '$2y$10$hLT47NGlCljBWGRN46zvgulRU2qC2ED4La7S0gWWl4WpBchR66xKu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(489, 'Kelvin Joel Barrientos MagaÃ±a', 'kelvin.barrientos@oportunidades.org.sv', '$2y$10$sPtXpzqXojMMiPBTxE/2uOg0VNAMvEaz1qP7ux55bjPtNjc.YVxQS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(490, 'Bitia Haydee NÃºÃ±ez Matamoros', 'bitia.nunez@oportunidades.org.sv', '$2y$10$RMQuUvwEx0Rl06DDCCf2AuRXEiYTxWVRWxswu14JvElYxfrAo2P0W', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(491, 'Deisy Maribel Lucero MorÃ¡n', 'deisy.lucero@oportunidades.org.sv', '$2y$10$7BN64ygm4QDORp.UHX5B2.jBsZsDq7G0J2kV8k1OlSMivbgxCHsPu', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(492, 'Kenia Jeanmilete Lima Duran', 'kenia.lima@oportunidades.org.sv', '$2y$10$PGL460mVXVCVQIOaxSEOqe/pAPu3OWTTnjROuLoxkG4cJ21v9iJHm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(493, 'Esmeralda Yamileth CÃ¡rdenas Santos', 'esmeralda.cardenas@oportunidades.org.sv', '$2y$10$ZmSIWmv2BjZeHjkEitleeeEQ05rQC5/ZSznPc8pyqgQBZwo2FuQ4W', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(494, 'Kenia Stephanie Tepas Mazariego', 'kenia.tepas@oportunidades.org.sv', '$2y$10$3A.P3sgT6G/VwYGlVWWzg.ahTPdXYPPrTMzTHYznQ9w/s1gREP13e', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(495, 'Carolina del Carmen GarcÃ­a Arriola', 'carolina.garcia@oportunidades.org.sv', '$2y$10$KxJa.J7LZTVfOCb2cT7EXu0m29xIOvfYcD8WdhMpC0OBoLX7WoZI6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(496, 'Cristhian Anibal TacÃ³n Sandoval', 'cristhian.tacon@oportunidades.org.sv', '$2y$10$whcljRGO7gFvZxATL8kg8elkY9eHYyMEpTJBzOgSQiYw8n6nZsdcG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(497, 'Diego Alonso GonzÃ¡lez Soriano', 'diego.gonzalez@oportunidades.org.sv', '$2y$10$PNVozx66ub1Fs4D/JM/fAepC2NVMUXRQOKC9y3/HuPfGDXcqN9R62', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(498, 'Alejandro Enrique Quintana Escobar', 'alejandro.quintana@oportunidades.org.sv', '$2y$10$w9UtVWeLt6wzyFi7zjn2aeMd0VXXUbHUzFFP0szD8V1Ps7gM6TgUm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(499, 'Elsa Idalia Ramirez VÃ¡squez', 'elsa.ramirez@oportunidades.org.sv', '$2y$10$LnWpTs04AIfrn94YFTWDl.46juBf7PPneki/CvkBwUPudSW8Vp4aK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(500, 'Gabriela Elizabeth RuÃ­z Bran', 'gabriela.ruiz@oportunidades.org.sv', '$2y$10$OR3b2JMYBU.Zy7VMdnbJ8ORJ/YlWRPZRdSYc4B84kt2E9Amekqgii', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(501, 'Gerson Edgardo Coto RodrÃ­guez', 'gerson.coto@oportunidades.org.sv', '$2y$10$gRM.nkNXJsGMuW5Hx8AOOeRK.7EQg0cJoTk4hCB9nCqsfhBztVqcW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(502, 'FÃ¡tima Mariela Orellana MayÃ©n', 'fatima.orellana@oportunidades.org.sv', '$2y$10$ut309TRvYdI6Q2Hvb5pK8.YoTDoVfMTkabXwTQpNRnMzD2ucY6/LO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(503, 'JosuÃ© Enrique Ponce Castellanos', 'josue.ponce@oportunidades.org.sv', '$2y$10$R0yQwg2JrLKlqtEqjdZAiOwDIEG/Jly97Q/vg7jCPVQTQ4LwGDrEi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(504, 'Raquel Abigail Recinos Melara', 'raquel.recinos@oportunidades.org.sv', '$2y$10$6vKtlG1OZ.hnzD2YWoqj4.5GI.HwdjlAAHHjqIhgb/ImS8sK6iMW.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(505, 'Flor de MarÃ­a Regalado MarroquÃ­n', 'flor.regalado@oportunidades.org.sv', '$2y$10$s7YfsiPDhCr6vE5bJhQR1upufk93cdrmJ3YFpiJoGvK0n1wYTAUYi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(506, 'BenjamÃ­n Esteban Reynosa Salguero', 'benjamin.reynosa@oportunidades.org.sv', '$2y$10$O5pPpcHr2VLNDT.JJcXDXutX1vqUgFx9LVN9Si1qIBogj/jP5ypN.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(507, 'Evelyn Lizeth Rodas GarcÃ­a', 'evelyn.garcia@oportunidades.org.sv', '$2y$10$C9Y2nL7D.ABSpWVfmKrj3uz2OHrnVuQvyXv4TObQskzVg9id0pjTa', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(508, 'Elena del Socorro RodrÃ­guez UmaÃ±a', 'elana.rodriguez@oportunidades.org.sv', '$2y$10$l4Rt8KO8ywAobL9NsTH9DesU4R2Ydl6a2INyk9Nf0fvaACTCIEkDu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(509, 'Andrea Fabiola Rojas Aguilar', 'andrea.rojas@oportunidades.org.sv', '$2y$10$7CiuMXhnz8DcFv7a6xGiAu7sQJuh85nAYMbJ8rlMAkrdNJ1UQB9Hu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(510, 'David JosÃ© Sandoval Guardado', 'david.sandoval@oportunidades.org.sv', '$2y$10$R/z3xLFTsNkYaw5rpoMY.eOriVGNhOJDlmrR2FhMGeInozdG.0vtS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(511, 'Glenda Guadalupe SigÃ¼enza Chilin', 'glenda.siguenza@oportunidades.org.sv', '$2y$10$PSv3g5/jPx4OzJz.2T9Kyu0CSm993nDS5Ry5T93EB4KOeNJtT898m', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(512, 'Karina Yesenia Tejada Pineda', 'karina.tejada@oportunidades.org.sv', '$2y$10$1AjuGyVNQ9f3/A0ZKx67I.4z05A8OZFDPZ/aS8hXdwSx.p2M4v7Fa', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(513, 'Katherine Berenice Tepas Mazariego', 'katherine.tepas@oportunidades.org.sv', '$2y$10$OJTb.4vkTlLTQJWCPe78uOE.9BL2oZZeYEryrD.0KaNSQelZI2VnK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(514, 'MarÃ­a de los Ãngeles Torrento Andino', 'maria.torrento@oportunidades.org.sv', '$2y$10$MkZaozO2dazNBpIXjZvjh./S6YJtodd2/U72oHzECbAwbcDazKd/O', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(515, 'Brian Alexander UmaÃ±a GarcÃ­a', 'brian.umana@oportunidades.org.sv', '$2y$10$2fakkmwVjtT0O6M4d4Yz9OMKSmYrxzIsSPJnikULViOnC.xL9xFEi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(516, 'Laura Daniela Zometa HernÃ¡ndez', 'laura.zometa@oportunidades.org.sv', '$2y$10$FI8J7M6KCfobm8SeChnM5ORSHddbzUxvIpK475LtRgZskEJZJ/1/K', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(517, 'Orfa Noemy Heredia UmaÃ±a', 'orfa.heredia@oportunidades.org.sv', '$2y$10$9Ki95HA/R3doHKbqgS/XEu8QAGWuFg3Peh4ZwybpFpFrpcjZKAHbO', 'img51713365.jpeg', 1, 'SAFT', 'Estudiante', 'SASAT'),
(518, 'Jeansy Michelle JimÃ©nez Hidalgo', 'jeansy.jimenez@oportunidades.org.sv', '$2y$10$gpjiQUGlhMoFLx5tDQRoeO5TP14lEIwogNaTVoJOc7i2e2nL.32De', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(519, 'Wilmer Antonio Lemus Ramos', 'wilmer.lemus@oportunidades.org.sv', '$2y$10$j8AszXRBYzKiblwwIRR90O6nql/KlU/MXpiLLPLGat/BmpMT6leOW', 'img51949415.jpeg', 1, 'SAFT', 'Estudiante', 'SASAT'),
(520, 'Katherine Michelle LeÃ³n Acosta', 'katherine.leon@oportunidades.org.sv', '$2y$10$dAQBLGlpK1YVzH5.Zmrsn.uURMYiL7HzvhbozNh0YG6IuecXHuGIK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(521, 'Margarita Elisabet Linares Monterrosa', 'margarita.linares@oportunidades.org.sv', '$2y$10$Yy0DXrBWjNj18vgFDintie7tuSnzD/Bo8FjIPGsgquEI9M6RJJZ4e', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(522, 'Carlos Manuel LÃ³pez Flores', 'carlos.flores@oportunidades.org.sv', '$2y$10$yMI1W1XhxQ/sJ0Rfq56ieuMcRS8QkQnL9cdRcnbL2TXNQt7TpBiE6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(523, 'Marlon Ulises LÃ³pez GonzÃ¡lez', 'marlon.lopez@oportunidades.org.sv', '$2y$10$BUHY93y02gxjXIFcjVFFJe4/HBfT6YRhb6r2G/rtvnvKNW0kdJm0S', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(524, 'Oscar Alberto LÃ³pez Vega', 'oscar.lopez@oportunidades.org.sv', '$2y$10$VA2mVGZRpwwLybw2nXOS2eMinCvQzbLXD0Yaf6RNShBJyK/URRDgy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(525, 'Nathalie SofÃ­a MartÃ­nez Figueroa', 'nathalie.martinez@oportunidades.org.sv', '$2y$10$cGhPYSCk2zt/6Nb29S4gpeHjt6/rebIKLlf/.WtIfUKELXjiH7bqa', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(526, 'Blanca Elizabeth MartÃ­nez Jaco', 'blanca.martinez@oportunidades.org.sv', '$2y$10$MtNSVManSZqhVbgCqUnxTedPeCalNaPHUcjpigpTlXluWfUmg5M7W', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(527, 'Julio Alejandro MartÃ­nez RuÃ­z', 'julio.martinez@oportunidades.org.sv', '$2y$10$ggWWtj20K7XKFsu1WFfJeOKg/TEcPd8G5iiSstoTFuFwy35icr9Vu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(528, 'Aracely Elizabeth Medina Flores', 'aracely.medina@oportunidades.org.sv', '$2y$10$vGCp3xFAgn0AcRx7pz14te3DzWxYH6SyYrjmA5SBA5IGGVoY5XpgS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(529, 'Mario JosÃ© MelÃ©ndez Menjivar', 'mario.melendez@oportunidades.org.sv', '$2y$10$vsQeiSfVDGuy/T0U3HIugOXGg5lnjrDFhllD8Ydn9afHGf3qKzjYS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(530, 'Roxana Elizabeth Miranda Mendoza', 'roxana.miranda@oportunidades.org.sv', '$2y$10$Ia44cqdOqYw2QIj2VJT4LONxLL4JVwg/QjaQmGN8i4XvCpiRxL03S', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(531, 'Daniel Eduardo Moreno GarcÃ­a', 'daniel.moreno@oportunidades.org.sv', '$2y$10$Kp1yL31T4O1Ckbpchg/sjuoxE7V3176UUfHTw8JImLeXHTd2U/Z5C', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(532, 'Ligia Marielos MunguÃ­a GarcÃ­a', 'ligia.munguia@oportunidades.org.sv', '$2y$10$MYItR/8Bhofzx8nj1WC7W.Wpg/7gcjSDKrGNmPWCB7f3FINoKRdnS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(533, 'Alejandra Elizabeth Murgas Cabrera', 'alejandra.murgas@oportunidades.org.sv', '$2y$10$kalDYllfEpWdsdApDjGWwOH/ZGicppW1HTQoCNNmCv0dwMN0fnmyu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(534, 'Andrea Guadalupe NÃºÃ±ez GÃ³mez', 'andrea.nunez@oportunidades.org.sv', '$2y$10$jNirNvZM0Wj5Ac5CTISfF.XAaMeXasOP9vlST/LJnJwlEVnGeW7qi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(535, 'JosÃ© David NÃºÃ±ez Melara', 'jose.nunez@oportunidades.org.sv', '$2y$10$Ima0wJTvk0aT/7DZJmQfX.mHdaCJomRpRTRUJIEUtc15PJGPlVAXG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(536, 'Diana Iveth OcotÃ¡n Morales', 'diana.ocotan@oportunidades.org.sv', '$2y$10$sEoWiI/oDUPzuD0lUqlsp.RrKDTTPo35e77f06vJsDy0psguurY7y', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(537, 'Karen Jeaneth Aguirre MartÃ­nez', 'karen.aguirre@oportunidades.org.sv', '$2y$10$2/sdOURzI3Dz0Nsbk5NsJOkAZZ04cYlAYtZHUnus2c2v3uLpyqz0m', 'img53731531.jpeg', 1, 'SAFT', 'Estudiante', 'SASAT'),
(538, 'Mario CÃ©sar AvilÃ©s RamÃ­rez', 'mario.aviles@oportunidades.org.sv', '$2y$10$/otQUaZ/M3CFLtXAS1JbGuynt5Di3oaHxzJsRM.f4vZNKMonyaupC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(539, 'Yanira Vanessa Barahona MorÃ¡n', 'yanira.barahona@oportunidades.org.sv', '$2y$10$K1AY.V5o8RQmedYR0T4RVemwGeCFII5X6YeNd9FHHo84X7fMSmICK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(540, 'Carlos Arnulfo CÃ¡ceres Trujillo', 'carlos.caceres@oportunidades.org.sv', '$2y$10$7pbhodtw2qfH25f484eKo.Vlwg/he8UdG.TxUCjnuTikA309oIfz.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(541, 'Melvin Gabriel CÃ¡rcamo Reyes', 'melvin.carcamo@oportunidades.org.sv', '$2y$10$jjKj8dTBN9YaHQq/W9dOIuv4v9VVyeBkSpVQCwkgvMq/EDhCyuVVO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(542, 'Kenia Aida Castillo Heredia', 'kenia.castillo@oportunidades.org.sv', '$2y$10$0A6kfhljX6..1l19bo1pmO001ZITCl6NebfB3fgYmn5MjD1VXAXgu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(543, 'Stephannie RocÃ­o Centeno Flores', 'stephannie.centeno@oportunidades.org.sv', '$2y$10$cMvIY/304V03AaZ5Ebk3nOHdIkmuPLVi9G99RBt1s6pXiypM0JMeK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(544, 'Melvin Fernando Cifuentes Oliva', 'melvin.cifuentes@oportunidades.org.sv', '$2y$10$ZXIH7RQXtRnssF65yNNvyO2vMamFtdXsmm1IFOQtLyj.TbhT/Z7hi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(545, 'Carlos Eduardo EscalÃ³n Trigueros', 'carlos.escalon@oportunidades.org.sv', '$2y$10$u/U1T82oJ5IyTtN0fzkQZeWXRBn6dy1nxWFQpxuQS5Lz3DvalR.Su', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(546, 'Claudia Madeline Flamenco ChacÃ³n', 'claudia.flamenco@oportunidades.org.sv', '$2y$10$ZOENhAWRUVErc2C3MJoKs.S0lcRGjrbclKYQQXMuIfS2N4ph303o2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(547, 'Silvia Michelle Flores Chinchilla', 'silvia.flores@oportunidades.org.sv', '$2y$10$wOB4LVtX/.Lj4Z719apcV.0eM/zs.x1h..SVD0n.8OaPjTM.ctwry', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(548, 'Kennette Alejandro Flores Reyes', 'kennette.flores@oportunidades.org.sv', '$2y$10$NAEwY8k9gdc2ENp4B25cxuA4lxPUAOJDx/3HxazAAtpER2FTMZGjS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(549, 'Katherine Marisol GaldÃ¡mez MancÃ­a', 'katherine.galdamez@oportunidades.org.sv', '$2y$10$foKxEyJTlTF1u4IzU10oHuZkrK8cjbGgKaVcR9P2SiYQF7REJ/pXK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(550, 'Jacqueline Ester GarcÃ­a CuÃ©llar', 'jacqueline.garcia@oportunidades.org.sv', '$2y$10$NibXc/yva5CYp22FxrqPjOfT0.BK/9lVWs5iDoLocMQqVP/XCSXPK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(551, 'Katia Abigail GarcÃ­a Linares', 'katia.garcia@oportunidades.org.sv', '$2y$10$MBHNS9mF.VX3S6kTNR8yU.vsReVqo/3nihaTb2TcuCTlygqs5s4f.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(552, 'Natali Daniela GarcÃ­a RodrÃ­guez', 'natali.garcia@oportunidades.org.sv', '$2y$10$wVmzoRTESGt/0WNVMVPICOG.SuzMo3iu2kx.ny2Jrijn8UO/ZIhx.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(553, 'EstefanÃ­a Michelle GodÃ­nez Olmedo', 'michelle.godinez@oportunidades.org.sv', '$2y$10$erPt6TW84NdfgMlmhmIJre1f2kPWtYJblmwpZNMqrHPZPSXsKLCj6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(554, 'Cindy Esmeralda LÃ³pez Escalante', 'cindy.lopez@oportunidades.org.sv', '$2y$10$59uBvi.Ob4/CL3VV31wTM.WhW/Zw0cD4.2nzVkYy597PTNU3wZrze', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(555, 'Salvadora Antonia MartÃ­nez Mendoza', 'salvadora.martinez@oportunidades.org.sv', '$2y$10$YRjviBJShOVj3KOgtzZG1eU3XLDMkfVGgJmSJvi/.j8svatCJ7Vz6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(556, 'Angel Ernesto Mendoza Gervacio', 'angel.mendoza@oportunidades.org.sv', '$2y$10$MYgMGF22Ub631jND1RseEOnRpjw9/knWh083fGxoFQe89RL8jA1sC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(557, 'MarÃ­a JosÃ© MenÃ©ndez Contreras', 'maria.menendez@oportunidades.org.sv', '$2y$10$CGGsgH75P6zq74HZVdTq8ulQKVBkeIUJSldXPGzu9W5BB61Zdt7S.', 'img55734042.jpeg', 1, 'SAFT', 'Estudiante', 'AHSAT'),
(558, 'Damaris Lisbeth Pineda Barrera', 'damaris.pineda@oportunidades.org.sv', '$2y$10$jDc3xgk1QRnufgbHdFCXjOtxoqANT36.ooHZiSkAzklCvtHUf0Ns2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(559, 'Laura SofÃ­a Posada Hidalgo', 'laura.posada@oportunidades.org.sv', '$2y$10$ZQhIiwB4UXp69cwXJQ9DROIyX2fJyozNMXeHgAEN.AquKzAYvL1pS', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(560, 'Carlos Gustavo RamÃ­rez Hidalgo', 'carlos.ramirez@oportunidades.org.sv', '$2y$10$Mj69B9uDd05cgMdU.gJXJ.HqMQZCuZK9tGu5.XAYQLLZAqtCGg3TK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(561, 'Bryan RenÃ© Ramos GarcÃ­a', 'bryan.ramos@oportunidades.org.sv', '$2y$10$EFlsy0GFJTcogiXvDinwSeVedVhnmuHMkNrmRBtYIGK5i.b.LuFaC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(562, 'Glenda Patricia Rivera Recinos', 'glenda.rivera@oportunidades.org.sv', '$2y$10$T90iEL7YQ3ug.Ri7wzQvBezm6eyZhJD0wUgqRxmn8mCsoV4LWACbu', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT');
INSERT INTO `usuarios` (`IDUsuario`, `nombre`, `correo`, `contrasena`, `imagen`, `conteo_entradas`, `ID_Sede`, `cargo`, `SedeAsistencia`) VALUES
(563, 'Diana Esmeralda Rosales Alvarado', 'diana.rosales@oportunidades.org.sv', '$2y$10$IfBdVhF6VVA6n7yRikqnFOm5q6qZIEO.oDpGtw6LCMk7q3C65ROrm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(564, 'Kimberly Angelica Rosales Portillo', 'kimberly.rosales@oportunidades.org.sv', '$2y$10$hyOX.ZPXV5atL704rmbka.INvMGFPR.avPqzURvYgFw6BIgkGYh7.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(565, 'Antonio Adolfo RuÃ­z Rivas', 'antonio.ruiz@oportunidades.org.sv', '$2y$10$uEvbFBlviZyfxZoB5HMnXOFI7gVawjJPvAfdQSJ1NLg8ICQelfDKe', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(566, 'Kevin Gustavo Santillana GuillÃ©n', 'kevin.santillana@oportunidades.org.sv', '$2y$10$qeYAX10D20pF4P.pSAXueeKdpvRiHN5SY5suVZpykfuuOU5YgB0lm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(567, 'Josseline SaraÃ­ Tobar Perdomo', 'josseline.tobar@oportunidades.org.sv', '$2y$10$KFfat8IQN40km1YGw6IoreyRQUnXLut2esTIqAU/m651q/QP8YJCW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(568, 'Jorge Adalberto Vallecios Lico', 'jorge.vallecios@oportunidades.org.sv', '$2y$10$.R1xIhoW3.n7GJCDwo15wuoAZ/I2H4rRj94sADV8aHa/ISDBaYdpW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(569, 'Mario Arnoldo Zepeda SolÃ­s', 'mario.zepeda@oportunidades.org.sv', '$2y$10$NXMOpugLj9mlKed061X6s.0Hn1VjRjQ7rybaRzuuxDv4iKYrfnDDi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(570, 'Milagro Guadalupe Agreda MagaÃ±a', 'milagro.agreda@oportunidades.org.sv', '$2y$10$F89T3bstahfOfGWfeNcqQOAe2PpkVG45yroZX2iq5CuXDDpWm3OL2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(571, 'Julio Eduardo Aguilar GarcÃ­a', 'julio.aguilar@oportunidades.org.sv', '$2y$10$oMIJ.JPk5CIx5LjjPLT5f.SRgxAk0L2WR19xwPMpx4QLigKvoqK8K', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(572, 'Yensi Yamileth Aguirre GonzÃ¡lez', 'yensi.aguirre@oportunidades.org.sv', '$2y$10$p7uyoMyCXtPv1UDWICjNEuwRfrTdumarHypqNWkFZOAXJ.PQ2dURK', 'img57280755.jpeg', 1, 'SAFT', 'Estudiante', 'AHSAT'),
(573, 'Fabiola Rosmery Cabezas RodrÃ­guez', 'fabiola.cabezas@oportunidades.org.sv', '$2y$10$VHXUFCh2dcL144WqaE./COwF4DKqrkkc19bK20/xQHCvG5tv1kPhW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(574, 'Ana Margarita Campos Estrada', 'ana.campos@oportunidades.org.sv', '$2y$10$o7kYzL6/U4u9uTygnDHYJ.ApyDEDG1PdV509BE6DHINm1tRQnE/bu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(575, 'Karen Abigail Contreras Loarca', 'karen.contreras@oportunidades.org.sv', '$2y$10$Gf037GLbXQdNpQv0IEC7Muu2ceLWKHLW1lPYQWsNU0t8L2QIi5NKi', 'img57551625.jpeg', 1, 'SAFT', 'Estudiante', 'AHSAT'),
(576, 'Jeamileth del Carmen Corado DÃ­az', 'jeamileth.corado@oportunidades.org.sv', '$2y$10$RVh1lOS6N0anme2mbVsWmevv3dIWEy7qWkDKQZCGV/4N07YF8epeO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(577, 'Eduardo de JesÃºs Corado LÃ³pez', 'eduardo.corado@oportunidades.org.sv', '$2y$10$usp3IYFAD1fiE8.JliQa/eHYtPXGjKNYIWd7qJLM00AWmNoVVdlKO', 'img57733972.jpeg', 1, 'SSFT', 'Estudiante', 'AHSAT'),
(578, 'Karina Elizabeth DÃ­az Reymundo', 'karina.diaz@oportunidades.org.sv', '$2y$10$8C.djRDfmXnQ8teIIXunceRIiEVLGRSKye3yg7N2ZZ3K4Xz5qeGdG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(579, 'Karla Emilia DueÃ±as ArÃ©valo', 'karla.duenas@oportunidades.org.sv', '$2y$10$9PKgB9hkUzVxMHiQ.kR/NO4lLZ3LtWXo6fKQUexGWpqqDXPa11gOG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(580, 'Paola MarÃ­a Flores FernÃ¡ndez', 'paola.flores@oportunidades.org.sv', '$2y$10$X6KYO3iGgPm1EJOjJza/De.KPyCNMAZUcOVmq/CqXLU2XHtSjli7e', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(581, 'AdÃ¡n Edgardo GarcÃ­a Cortez', 'adan.garcia@oportunidades.org.sv', '$2y$10$Z9KM/dqZc7DKhSeMrb7RqeARie0eqrV4sL8Z8ipVlnR78Vai8DoMm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(582, 'Ronald Fernando GÃ³mez Trejo', 'ronald.gomez@oportunidades.org.sv', '$2y$10$7ZXSuywwErmrXQjj1zOUuOdwtBgVMIRakZY3VBHbJv/EcMWo1DSUy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(583, 'Rudy Antonio GonzÃ¡lez Aristondo', 'rudy.gonzalez@oportunidades.org.sv', '$2y$10$FIpIwIJ0hZ.2Sf5/QHuACe6SyKxgM.2ZSeWlz9GgGLv0NJLRw69UG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(584, 'Pablo AdÃ¡lid IbÃ¡Ã±ez MenÃ©ndez', 'pablo.ibanez@oportunidades.org.sv', '$2y$10$XYtponiycRrEd4GuFLgerO1NZ11b/ezufiiQc0wShdTn3eKInSw66', 'img58468079.jpeg', 1, 'SAFT', 'Estudiante', 'AHSAT'),
(585, 'JosÃ© David Lemus LÃ³pez', 'jose.morales@oportunidades.org.sv', '$2y$10$sWDhAsYtLQat73ncna4fOelBoQAbLxELSEFrSOex7naimyOEKDCpO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(586, 'Luis Alberto Linares HernÃ¡ndez', 'luis.linares@oportunidades.org.sv', '$2y$10$LQvkoykWDPr4ddCsBZo9S.xX9Xbp4kiuhCSQjanOhTu/nWOEGLF3C', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(587, 'Jane EstefanÃ­a Villeda MirÃ³n', 'jane.villeda@oportunidades.org.sv', '$2y$10$kVoHvuV.mc6V1v3G4MxStOJIM.dkBd1pmnrwCBBx90Tar7BpnFofa', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(588, 'JazmÃ­n Adriana Torres Delzas', 'jazmin.torres@oportunidades.org.sv', '$2y$10$zhxRRxk87/Ma7SX02TGDB.X58E/AHJrl3LQSNcQKoyB.qnOVDAmoO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(589, 'Juan Francisco MartÃ­nez CalderÃ³n', 'juan.martinez@oportunidades.org.sv', '$2y$10$LbJUugQje1Se0WKLk2BSherTz.4nV7P8w6r3gi0otc8tqUpiesMbu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(590, 'Julio Ernesto RuÃ­z Mena', 'julio.ruiz@oportunidades.org.sv', '$2y$10$7UJjf31Dw81pKbyO2AgupeC.fMPlsHGcEzl15NIP7ZMqmVloDfbEu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(591, 'Kevin Steven Quintanilla CantÃ³n', 'kevin.quintanilla@oportunidades.org.sv', '$2y$10$WEVV5mc1gn2nCRoANuqnpuLCD0RAj4QkmQFd4mj6uUieq64FTEa9y', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(592, 'Luis Alejandro Carrillo NuÃ±ez', 'luis.carrillo@oportunidades.org.sv', '$2y$10$t69H890T1Q4WXQmPeSGMBu5YXMC58MxIfHNnpuAipvMYO05KT29ZS', 'img59244672.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(593, 'MarÃ­a Joaquina Maldonado Cristales', 'maria.maldonado@oportunidades.org.sv', '$2y$10$RQC1tPSWn6D3zGmEsGyK2.lUqVeUGZeMzT3GSPkLvJNKYMKjntmoe', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(594, 'Melissa Alejandra DueÃ±as Vidal', 'melissa.vidal@oportunidades.org.sv', '$2y$10$pTd.8HCz.fBjYSEq82UQsu1mEMY6ICtlgjnJoJ212RSKi8oegsAXO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(595, 'Melissa Elizabeth VelÃ¡squez Carranza', 'melissa.velasquez@oportunidades.org.sv', '$2y$10$ofUpyk2BlIQ6FnJSW.bLaOS.bg8tuZdcYd/.J05wfS/NZsFu2U31m', 'img59525845.jpeg', 1, 'SSFT', 'Estudiante', 'SAFT'),
(596, 'Paola Raquel Aguilar Calidonio', 'paola.aguilar@oportunidades.org.sv', '$2y$10$fTPXy1sK/1E2oz7bm5gDHeLem8A0SoBNqW5IZDWUhRGtbB9ThTKK.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(597, 'Ronald Ernesto Tejada Rios', 'ronald.tejada@oportunidades.org.sv', '$2y$10$LUNkFQwAs6mQ/b6cBfBfPuvUSjU/uwdmWHjIJuiKgz4UgZeGk6ziq', 'img59749165.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(598, 'Rubidia Ester Sandoval ValdÃ©s', 'rubidia.sandoval@oportunidades.org.sv', '$2y$10$evqFHQB7aV30YMLZG8eNAOY4zMDNUZF2F9pohOUAos./x3.gpVLTW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(599, 'Claudia Lissette Castellanos Musun', 'claudia.castellanos@oportunidades.org.sv', '$2y$10$6VAaOKWwVd/juHnB2I2X/.7tHw/CLvy8KWGzhATsf9pYBwR08HPMC', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(600, 'Stephannie Beatriz ZÃºniga Zepeda', 'stephanie.zuniga@oportunidades.org.sv', '$2y$10$ldy5JR/sOdYySbFdOrwZzuTgJqXwlzqQR2Fhf05XxqxRQQlk7HilK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(601, 'Wilber Samuel Rivera ChÃ¡vez', 'wilber.rivera@oportunidades.org.sv', '$2y$10$yNTDQSjHHP0fY7IZqMy1ZuozpRkV1uLlkPdFxb4JB6g1APSMveq4y', 'img60160659.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(602, 'Adriana JazmÃ­n HernÃ¡ndez Retana', 'ana.retana@oportunidades.org.sv', '$2y$10$1185PhBW1QdqdzL/AH/fleXOwuKgQ2b/8ft6q9BfLtiKSmVO/tjw.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(603, 'Alba NoemÃ­ Escobar MancÃ­a', 'alba.escobar@oportunidades.org.sv', '$2y$10$Ck4lNCV7oExLJY8Hhg4M0e2sl1mCXoU/Z2Hq5qjbE4lYQiipJuCmW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(604, 'Amy Stephanie Calidonio MejÃ­a', 'amy.calidonio@oportunidades.org.sv', '$2y$10$6vBtH23LM8MoB0DMgBHa..F2/o6nEA0cTVyVSFSvsuOV0HJ/8KAim', 'img60483575.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(605, 'Ana Gabriela Hernandez Alvarado', 'ana.hernandez@oportunidades.org.sv', '$2y$10$ybaovahnwZr/i/zU42iz8./fVaitolCYLqyW39IM8.718iJgVXHKW', 'img605.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(606, 'Birnny Nicolle Mata ArÃ©valo', 'birnny.mata@oportunidades.org.sv', '$2y$10$uTip0I1O9oN64lLDwmGsUe8/0LRB43scVg3DXqC59F./xw3B7.RKK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(607, 'Brandon Alfonso Valencia Rivera', 'brandon.valencia@oportunidades.org.sv', '$2y$10$cYQ73EIM/V7Go41.RE1ZNuEVAQH7hcp7f.lCP07A8yJByNYalK5xy', 'img60784329.jpeg', 1, 'SSFT', 'Estudiante', 'SAFT'),
(608, 'Daniela Alejandra Nolasco HernÃ¡ndez', 'daniela.nolasco@oportunidades.org.sv', '$2y$10$EoU/TgJiWBd5lWZ/9nBKtOJO6tVOgohnUOUzGtjKibiAZ1BxywIfm', 'img60827146.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(609, 'Daniela de los Ãngeles Guevara MÃ¡rtir', 'daniela.guevara@oportunidades.org.sv', '$2y$10$Th/snOkapby15aFwGpf/nOfAHBXgh8mZKeQoA2ObQ10Iwiy8bClQe', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(610, 'Diego JosÃ© NÃºÃ±ez Salazar', 'diego.nunez@oportunidades.org.sv', '$2y$10$7g6MMrwRm7d1vBKovQPI4Ov5G4cohIq62l0Cuh.sjbHFX6WkSYONe', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(611, 'Donald Alexis Medina Montero', 'donald.medina@oportunidades.org.sv', '$2y$10$8yAst9KqGD44a6Q4FgqepuyqdjJHuGFTdMFpls6BrKO3WCVXjj0by', 'img611.jpeg', 1, 'SSFT', 'Estudiante', 'SAFT'),
(612, 'Douglas Alberto Aguilar CaÃ±as', 'douglas.aguilar@oportunidades.org.sv', '$2y$10$TalUhIj.IUILNikou1gC3.YqASUpPvp9pEKJPmCQJ7LMH/6PfMu72', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(613, 'Douglas Daniel EmÃ©stica', 'douglas.emestica@oportunidades.org.sv', '$2y$10$jQibxSUwhh4DOKwXQaQzb.URZMFIMRS0Q3XjUfTOC2SpT2Pu8dnhO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(614, 'Erika Alejandra Ruano Rivera', 'erika.ruano@oportunidades.org.sv', '$2y$10$2DrPLCK2iCSeAl0fxJAzhufO4iIUCnTT7BZRmUqjfLd24WT4d9C72', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(615, 'Ever JosÃ© Guerra Maldonado', 'ever.guerra@oportunidades.org.sv', '$2y$10$XY9nfqH0aTWL.q3a9OMvPuIFO8KIE3jfypNHmr78EebVfnKTK3rJS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(616, 'FÃ¡tima QuerÃ©n MartÃ­nez LÃ³pez', 'queren.martinez@oportunidades.org.sv', '$2y$10$OwLp.0aV5ZEh5ZhAozMd..PahGFJbQrByLgIWade7Lk1jUjjJ2mmm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(617, 'Fernanda Gisselle Salinas VÃ¡squez', 'fernanda.salinas@oportunidades.org.sv', '$2y$10$cJWVy9mjeHI3BqBn0FWL1OuymX6kVCQKB1XWfUGXofSwa.2Y/3UBG', 'img617.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(618, 'Jairo JosuÃ© Agreda Tesorero', 'jairo.agreda@oportunidades.org.sv', '$2y$10$yjC/NYHJV/WPafzWhFXXVuwgA.pijDIAFWBF8VwgaRN58wykbUXau', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(620, 'SuperUsuarioSS', 'root@oportunidades.org.sv', '$2y$10$DFSrejwb.2Q2O0/FdvQJwebbgKQITwmEe/VfANtkmy3iZzvU59LKm', 'imgDefault.png', 1, 'SSFT', 'SuperUsuario', 'SSFT'),
(623, 'Joel Castillo', 'joelcastillo203@gmail.com', '$2y$10$WcdeB/vv3y0hmDltQobDCu4nRr87NjeJDr424jdLIqDE22T7x8wZq', 'img62355540.jpeg', 1, 'SAFT', 'Coach Talleres', 'SAFT'),
(624, 'Ana Del Carmen Palacios Diaz', 'ana.palacios@oportunidades.org.sv', '$2y$10$jIEnIfwYLLanBbJ9A3q26OA0TWGMIFrS7xudhN.3I1aH5A8SUZaTG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(625, 'Andrea Alexandra MartÃ­nez MartÃ­nez', 'alexandra.martinez@oportunidades.org.sv', '$2y$10$UFVzcJ8Tgfdd1lmjZUfaROuL8y5ZMcW3AoWlf486lLO5LqgUjIlUy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(626, 'Andrea Paola Castro Aguilar', 'andrea.castro@oportunidades.org.sv', '$2y$10$x/KQyPi8MP52AgePtOTakusWPB9jxPNg83lrtdiaAtBRb0B0AH6DC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(627, 'Brayan Ernesto LÃ³pez MejÃ­a', 'brayan.lopez@oportunidades.org.sv', '$2y$10$S6r6tpc2/xJdr9uvrD2hgOvVEyAL8KG6oH0kh6nVdMDoM8a0y9cTe', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(628, 'Carmen Elena Palacios Diaz', 'elena.palacios@oportunidades.org.sv', '$2y$10$nbCc4GOBhFPSB3Vv7wD98uCPTEHxHAQOkRknu.DhA/VyW3fMdqH..', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(629, 'Cecilia Jeanmillette Mendoza Sanchez', 'cecilia.mendoza@oportunidades.org.sv;', '$2y$10$s0.SfOhY1GfO1t42meN.fOh8nwpEHBAaDNlTkIZFI4D0v1nJMTT8u', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(630, 'Elena Guadalupe LÃ³pez Cardona', 'elena.lopez@oportunidades.org.sv', '$2y$10$11JIQRPvzpLe5jjySKQXFuyIUgYtf1moidsmr.6uEWgp91tHbs8.q', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(631, 'Erika Beatriz Escobar Romero', 'erika.escobar@oportunidades.org.sv', '$2y$10$flhGNr4lQBXrgf.gCyWtY.AENtGB3N06CLb5rzDiApYlM0wWu4kie', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(632, 'Fatima Paola Zepeda Trinidad', 'fatima.zepeda@oportunidades.org.sv', '$2y$10$d4llUsDMiVrnTjfiUeI2Cu2cMeWtFH..FnqjCulAwziD2sSScdzF.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(633, 'Gabriela Raquel Boyat Solis', 'gabriela.solis@oportunidades.org.sv', '$2y$10$jNSusDIsPtOc8tH5muE9oOf.f0EYPxUYAhFVDgHZE2QqQh9tzYNr6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(634, 'Ileana Abigail Gomez Zepeda', 'iliana.gomez@oportunidades.org.sv', '$2y$10$dn/TjNGy1TTp2dF8j7wj0uANxbt/iXJIrM2A1ohcM/Oh4nnux7Yg6', 'img63442971.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(635, 'Jenniffer Michelle Ãlvarez RodrÃ­guez', 'jenniffer.alvarez@oportunidades.org.sv;', '$2y$10$HcUXhB/KKJ.vjkEhlqStKOJcN4IP.WbQru6S3QiAtAqtmu83VMLmq', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(636, 'JosuÃ© Roberto Contreras Olano', 'josue.contreras@oportunidades.org.sv', '$2y$10$y2BHE/j00LzWoQYuM0HsNe96Ae9CQd9ABt4UWsbKGtKwqEeDtzb.C', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(637, 'Karen Jeannette GÃ¡lvez GarcÃ­a', 'karen.galvez@oportunidades.org.sv', '$2y$10$IBWcDGPIo9IKPLf4GXf5suLTposmZ72rcYTWRL73UEfqh0OW5rING', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(638, 'Katherinne Denisse Cruz Mena', 'katherinne.cruz@oportunidades.org.sv', '$2y$10$ZNovlpFBKB2mEL2TGNCBae.SwwJ/oKt1pDHyIuiznHaDclzON/7oG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(639, 'Libni Merari Samayoa MagaÃ±a', 'libni.samayoa@oportunidades.org.sv', '$2y$10$d3IFSWmFL47CUA6vyVpU6eNMVRBDnsGEnwF3y8AgkIgEPWxr8GjR6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(640, 'Lissette Esmeralda GirÃ³n GÃ³mez', 'lissette.giron@oportunidades.org.sv', '$2y$10$R3AH8kOHOGOeY0P9KLxOI.4wS8M8MS2uV52n9/v16y5C2yjY1/3o2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(641, 'MarÃ­a Alejandra BolaÃ±os Platero', 'alejandra.bolanos@oportunidades.org.sv', '$2y$10$v5UkifasYgl4assq2lkVp.YrI65uYqaa6PXakBuAp90rlm/N75k0K', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(642, 'Maria Ester Gonzalez Galindo', 'ester.gonzalez@oportunidades.org.sv', '$2y$10$x9NOsTKd4gsnBl.34l..8eqGblcvffm.YDfUUvUW.D.po1Iwz/gHi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(643, 'Melissa Abigail Gonzalez Rodriguez', 'melissa.gonzalez@oportunidades.org.sv', '$2y$10$73ofEsc0wu2AyhnNdiEqf.irUhkwPTK5NS5SwHeouvoYC0L4IfM86', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(644, 'Natali Melissa Zamora Salguero', 'melissa.zamora@oportunidades.org.sv', '$2y$10$4UEtzLwldAd6MMkuOe320.8SSFqJRqL2m7rvmAzjsU9YBGaPNKoIO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(645, 'Nataly Del Rosario Rodriguez Ascencio', 'nataly.rodriguez@oportunidades.org.sv', '$2y$10$SkkBxcLQA0X/nUwlCMz09OSK0Wig0CyJcoRIvCzsOkfOxu1QaD10q', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(646, 'Sonia Marisol MartÃ­nez Pimentel', 'sonia.martinez@oportunidades.org.sv;', '$2y$10$n9PnDsWmijBbyh69/M0fFuDoEdX62EjQ9kjKwQD6mPC8QoeePO/7q', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(647, 'Stephannie JasmÃ­n Cabezas PÃ©rez', 'stephannie.perez@oportunidades.org.sv;', '$2y$10$VKTJISyxjkgin8zpbtelNuPggRgiXMGLnV8o7Gqi/bq3zlk3sCTr6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(648, 'Victor Manuel Rivera Raymundo', 'victor.rivera@oportunidades.org.sv', '$2y$10$OirdWCjKrVL4ryTxoIeCP.zfi1kAkOgZyx8.57aVrGrI0MtJEAsoO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(649, 'Waldemar Antonio Flores Reyes', 'waldemar.flores@oportunidades.org.sv', '$2y$10$vCr/nDuEN3/wa5Ume8Kcu.1K3W6CeeVbAFNt2U3za0StqTDzT3Mde', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(650, 'Yanira Jeanmileth Velasquez Lima', 'yanira.velasquez@oportunidades.org.sv', '$2y$10$rh5B.SgcZWsLfD7losAbYeSxqbjby.ZI8DgkvUUpwO6C035YYNN8i', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(651, 'Yara Paola Martinez Lopez', 'yara.martinez@oportunidades.org.sv', '$2y$10$bxqI9H44j9vao0cuEIh8B.C8.3byzqM1NeBdk5DnVUuf2E9uiJUd2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(652, 'Jessica Jeanmillette Reyes MagaÃ±a', 'jessica.reyes@oportunidades.org.sv', '$2y$10$9f9l3aDeoX5qb34NG0R/eOdzWDJmiq.uVZE6qBP3uUQprugwnM2pS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(653, 'Silvia Guadalupe CalderÃ³n GutiÃ©rrez', 'silvia.calderon@oportunidades.org.sv', '$2y$10$7isNj7q7oPrAGtUvYTsef.1PgMZCmR8A2JNBddydAPVCGVIQcQalW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(654, 'Ruth Ester Cardona BaÃ±os', 'ruth.cardona@oportunidades.org.sv', '$2y$10$oxY/AX4ulr7Qy8KPgv.o1u5auKbEO48HprwP6psZ57bv7Jc87k75C', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(655, 'Beatriz Adriana Castellanos MÃ©ndez', 'beatriz.castellanos@oportunidades.org.sv', '$2y$10$/y3Rv6jEjad7L/QNROvQReYFcVazWaptY/W2baor7XuZT.IpEzQGK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(656, 'Alejandra Marcela ChÃ¡vez Anaya', 'alejandra.chavez@oportunidades.org.sv', '$2y$10$.e494e2UAkTmXTmJyNxMle9e.UJHLv/q2C0MiXazcOPsPAO0HK.lq', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(657, 'Ernesto Douglas Cienfuegos Barrera', 'ernesto.cienfuegos@oportunidades.org.sv', '$2y$10$mY4yPusAH3jv5Cm1avtfnes9C7g3DXgd/Q4zW/byQmRxYwPL0qSf6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(658, 'Cristina Melissa Fajardo', 'cristina.fajardo@oportunidades.org.sv', '$2y$10$zykcC8kOB9kCBTCLpvwqFukSOQ3Z/zDwuZLMaEjjs0glisX7Yv65.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(659, 'Ana Guadalupe Flores Murgas', 'ana.flores@oportunidades.org.sv', '$2y$10$2fCwhxKsl7fBeBUIJyHiE.PFSXvwDC0fjo.c47oP9zxNOlfF6q4lm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(660, 'Briant Armando GarcÃ­a MenÃ©ndez', 'briant.garcia@oportunidades.org.sv', '$2y$10$sYwzilTHoerPkF2Owo25IuWIcwkR9/3HMrau99a5yQ4xqHCGx4fs2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(661, 'Melissa Guadalupe GarcÃ­a PeÃ±a', 'melissa.garcia@oportunidades.org.sv', '$2y$10$Yi6PRVwjdd1UEq3DerrVXeRQqM8uT1X7HxDaR/3d8hoiYThFESeOS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(662, 'Brayan Salvador GÃ³mez Raymundo', 'brayan.gomez@oportunidades.org.sv', '$2y$10$M2lPFthfqr5ESifNgbGBjOJNdY2rSA5EjmKTzGAdRaeaVrtqNRPf2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(663, 'Jessenia Esmeralda Grajeda De LeÃ³n', 'jessenia.grajeda@oportunidades.org.sv', '$2y$10$YXaNPTvLF8qxNVNcln2XaulN9dxMypQn1gVPaOvbwmJSxfM1BoIoK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(664, 'Catherine Stephania HÃ©rcules Villalta', 'catherine.hercules@oportunidades.org.sv', '$2y$10$JuR6aKLmtZeXTcOjnQ4A/OFG0OUT.I5GR9zNYUHq/ONDuv1TcmV/W', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(665, 'Carlos JosÃ© HernÃ¡ndez Godoy', 'carlos.hernandez@oportunidades.org.sv', '$2y$10$54ZMCdlZH0cflQ3SR6zl2.JTIHEte18xV7hJVYSUlMmerW1.nd5Yy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(666, 'Andrea Julissa Lara Valencia', 'andrea.lara@oportunidades.org.sv', '$2y$10$B/ynhWqJ1frHWNFoDL3sHOr5MkD/myOAzrfH1j1hD3jjGgvyn.oS.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(667, 'Iveth Dolores Linares Linares', 'iveth.linares@oportunidades.org.sv', '$2y$10$yh6VYXYxJlu6fW.HvICrIuJFjG/6/4.tHLdOz.ntWSi/Ge6aOCyLW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(668, 'Stephannie Jeanmillette MartÃ­nez Tejada', 'stephannie.martinez@oportunidades.org.sv', '$2y$10$5Ofo30ZCLQofchtZesjHKullDamNcJRhm7wZ2LtbVo05.LkDcY0nC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(669, 'MÃ³nica Alexandra MejÃ­a PeÃ±ate', 'monica.mejia@oportunidades.org.sv', '$2y$10$O6.lTSudttJ3lAoTz78ST.CuS8E/EX1hEm8i6xeKS3SD2iocL4ZRO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(670, 'Javier Arcadio Morales Aguilar', 'javier.morales@oportunidades.org.sv', '$2y$10$0uHvgMUzUAaEVXii9A.Qe.JEttpenKmZj6Aj3QR7o2YjHymZaUq1a', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(671, 'Ana Cecilia Peraza Belloso', 'ana.peraza@oportunidades.org.sv', '$2y$10$Qog0OIF4mwZQf1mFigAxOOL9JvZyoJXzRSpwufSsLyXcIfCqZWzTS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(672, 'Luis Antonio Pineda Guevara', 'luis.pineda@oportunidades.org.sv', '$2y$10$RqJGawQtqDOoNX1zvDKjz.hVsOZV5yChpisK5toClMVtc3r.fBVtC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(673, 'JosÃ© Alberto Quintana Ascunaga', 'jose.quintana@oportunidades.org.sv', '$2y$10$PxUe4OQhZnVAxI7LiP1zk.3No8C9zxVX9UG7X9JkF9mGhr8vq1oaC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(674, 'Marina Lisseth Rivera Polanco', 'marina.rivera@oportunidades.org.sv', '$2y$10$DwDgSAI.qiSKXdufbd62du3759lyJTshUxoGU1V4e8SJhJ9KVSpLO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(675, 'MÃ³nica Cecilia Rivera QuiÃ±onez', 'monica.rivera@oportunidades.org.sv', '$2y$10$SI.kw2VcluNNA/DCXwVMBe639UZHwKiBs3ImoB3Xhartv0KyAtdou', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(676, 'Rosa Virginia Rodas MejÃ­a', 'rosa.rodas@oportunidades.org.sv', '$2y$10$mYHbELFqaKI4KyUGTcmtu.mWdPOKtc4ozQ8ZfkPhnsvsvrkdWfVtm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(677, 'Aida SofÃ­a Sanabria Duarte', 'aida.sanabria@oportunidades.org.sv', '$2y$10$4/tk8QzacbhTZ67j/k2x7ulYVSJ0aLGwAK4JoEiQeqx/WhKDSS5I6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(678, 'Cinthya Michelle Solito Deras', 'cynthia.solito@oportunidades.org.sv', '$2y$10$TXo/43SNkUtCysBy/BFvPe/d7o/c3QaUDzIYB5CxxVYuw0NtTn6Am', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(679, 'Roberto Carlos VÃ¡squez Reyes', 'roberto.vasquez@oportunidades.org.sv', '$2y$10$TiBhUl0er5yo6nSyBhgEFew6KWEPFWIjBgtk8RAGZVYlhPRYotBJy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
(681, 'Rogelio Gonzalez', 'rogelio.gonzalez@oportunidades.org.sv', '$2y$10$UgAYsDI6czaJ6E0GW.jK1e/L2LkLo0N5nNsGxMufJbFi0gfnrk4iC', 'img68120608.jpeg', 1, 'SAFT', 'Coach Reuniones', 'SAFT'),
(685, 'Mauricio Alexander Ãngel Quintanilla', 'mauricio.angel@oportunidades.org.sv', '$2y$10$NROvIutq2qxPAFPl2TVNKuhw9y8QTqEIe47SXeySN9i0fPBKOFBe2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(686, 'Hypathia Cristina Campos Chavarria', 'hypatia.campos@oportunidades.org.sv', '$2y$10$UIUs5X.HI7FTs/S2pfa.EukSzONNvMVEfhqtrZP6ZN/VD6GD4egfu', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(687, 'Jennifer Gabriela Carrillo Estrada', 'jenifer.carrillo@oportunidades.org.sv', '$2y$10$Vel88XzvTX2keSvdNNxJ..YBSSNyvu9wQfy3rLlXbZXSCq7sxy0Ui', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(688, 'MarÃ­a JosÃ© Crespin Ramos', 'maria.crespin@oportunidades.org.sv', '$2y$10$vXlbZBrEN9zDsri3ZikJLeGaBs8t2JQJTLlZFbGkjc0pxR25byhdi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(689, 'Luis JosÃ© Cruz MartÃ­nez', 'jose.cruz@oportunidades.org.sv', '$2y$10$/eeQAUGbU8.U5q7kyh4tqemesNRDgE90dUO7DXx6E2xBUauR8VXbG', 'img689.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(690, 'JosÃ© Enrique Escobar Madrid', 'jose.escobar@oportunidades.org.sv', '$2y$10$6Hz/bp3/xeHW4jnjYmUNTO1uxjK5HFBct204OmuRAc6T/kTQK8A6.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(691, 'Alma Daniela Estrada Martinez', 'alma.estrada@oportunidades.org.sv', '$2y$10$wsmmhDVAInxiExScXvqFfeDo2SRBOOrCDOj7O2Tz.1EhaSyUa/jJi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(692, 'Isaac Eduardo Flores Alvarado', 'isaac.flores@oportunidades.org.sv', '$2y$10$jACmvZCgPxpwSi9Rt6zwPeZ/VVj/DcWClMubNxRC3MX0Ov5SAqtqy', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(693, 'Maria del Carmen Fuentes HernÃ¡ndez', 'maria.fuentes@oportunidades.org.sv', '$2y$10$CctKR6nrIqIJbPebHEFvwetqfB4Q5l0xicbT8B.tK9DTQrLjFJvh2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(694, 'Yeymy Valentina GarcÃ­a Escobar', 'yeymy.garcia@oportunidades.org.sv', '$2y$10$nzYLz0iWeKT.fckk/X5qmehz0PHZv2oMc3355YG.Al1NSaos71PFa', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(695, 'Bryan Astul GarcÃ­a Lemus', 'bryan.lemus@oportunidades.org.sv', '$2y$10$AkeCXJVd11AELzkJYZaRWeDycU9kHqqZFtPsrBzI.4YNnAq86D7nK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(696, 'Christopher Moises Gil SÃ¡nchez', 'christopher.gil@oportunidades.org.sv', '$2y$10$BYduuXBXB9KyKlx6H35DGeplFrt16ct67Q2bFLiOiolwqODL.nNeG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(697, 'Yancy Emely GÃ³mez Flores', 'yancy.gomez@oportunidades.org.sv', '$2y$10$vTrfIRhCCV8iJaLEf58ooOy.xCZ3qhg9nIQpsDzXxY/DXHL533WEC', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(698, 'Cristian Geovanny Gonzales Escalante', 'cristian.gonzales@oportunidades.org.sv', '$2y$10$USYRIc.7xmz3CFI7V7qDneYuln6PQ6mY4MwCNk5RdhN7Tq/.1CJwS', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(699, 'Jimmy Vladimir Gonzales Menjivar', 'jimmy.gonzalez@oportunidades.org.sv', '$2y$10$qDdxBy.ZPpcMK7QYXkAv8uzsoB4JBcUFAYI7/1E3IDDV4PXau3D.q', 'img69999117.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(700, 'Gerson ArÃ­stides Guevara HernÃ¡ndez', 'gerson.guevara@oportunidades.org.sv', '$2y$10$qlL1V24N8qGwgfwEnNPsWuFVZ/qnufNejNmuSRFbw/2SybEdP3bb.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(701, 'Roxana Elizabeth Landaverde Marias', 'roxana.landaverde@oportunidades.org.sv', '$2y$10$kyKGOv6WAOGmTeVrt8vIg.PTejOLntuDiL.2i9H6S38uqiLQCQvpG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(702, 'Beatriz Abigail LÃ³pez Zetino', 'beatriz.lopez@oportunidades.org.sv', '$2y$10$tyqF23xojt9ZEx68YAELOee/eP4rDR02TC8X6fVqJ64A11NjQnKwe', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(703, 'Esther Karina Lozano Aguilar', 'esther.lozano@oportunidades.org.sv', '$2y$10$fCMX7perbuL/YkBcrB6oQ.nEmcS90HHEjIfLOK1crlMuNU2UXZTIe', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(704, 'Mario Antonio MejÃ­a Argueta', 'mario.mejia@oportunidades.org.sv', '$2y$10$t10Mip.w4qWvQ/e8Mnjhmu5onBU0o4BNGCyyIMdZSQwqaRAmxoWGK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(705, 'Josselyn Carolina MelÃ©ndez Rosales', 'josselyn.melendez@oportunidades.org.sv', '$2y$10$zRFC3c0egyeuUlp4aUGW5eBGPGWHLTXtkt5G.hgFoDl16JSzeYGy.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(706, 'Karla Yessenia Mendoza LÃ³pez', 'karla.mendoza@oportunidades.org.sv', '$2y$10$lhNnzVgQ5wuVdPSZvALyFOEwy8Ud3JUReQnmsN.bfh/gumsJCFJZ.', 'img706.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(707, 'Santiago Monge Rivas', 'santiago.monge@oportunidades.org.sv', '$2y$10$Fns7O6pSzGlPEXvpuiuE7.vGlADHz27YJKIjQ1j74VOPY4uBIyK/e', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(708, 'Sonia Astrid Nieto Escobar', 'sonia.nieto@oportunidades.org.sv', '$2y$10$70khSSRKNvEaFqUDGuXPuuT9IQrURSwQ/RxfIK0BJclsvDWdIBzzi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(709, 'Kevin Samuel Orellana Vides', 'kevin.orellana@oportunidades.org.sv', '$2y$10$Cgfb3VfMrJwcjKiBt.Tw8OB17SFhM6/taY1I9dAXLlLt5CoOBjQza', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(710, 'Valeria Yulisa Peraza Ramos', 'valeria.peraza@oportunidades.org.sv', '$2y$10$fPFEE4L65cX9A0U/ABDVQuNzHAVqgJD5v3Sj8lZ1ga4BYMyDYSgxG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(711, 'Paola Lissette Pineda Benitez', 'paola.pineda@oportunidades.org.sv', '$2y$10$hv9dlZ0lmmTx5hthPwtjguJhK4msthQVUDQYQuph459EBfjJSHPne', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(712, 'Cecilia del Carmen Pleitez Echeverria', 'cecilia.pleitez@oportunidades.org.sv', '$2y$10$qfs9vM0EvYTaTC7k70JAbevqbrWSOU2/XB8do269wVZFt/NBCcK2G', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(713, 'Celia VerÃ³nica Pleytez LÃ³pez', 'celia.pleytez@oportunidades.org.sv', '$2y$10$zKlG6708FaYZZHx1VIgPfO/.nnKXL23vmhBqsj6UgHZiNRTRw7A22', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(714, 'Daniela Alejandra Ramirez LÃ³pez', 'daniela.ramirez@oportunidades.org.sv', '$2y$10$0le4ZCaGhP2UOx2f3ebtrOkHHTWVYovCagKpmIRoHT8XOtzucCorG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(715, 'Helen Guadalupe Ramirez Rivas', 'helen.ramirez@oportunidades.org.sv', '$2y$10$mvpIoLsymoOHmmPmftwsGuBVGGi5SxTEY5cFGBlZvXWlKBxd1aAZm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(716, 'SofÃ­a Cristina RamÃ­rez Urquilla', 'sofia.ramirez@oportunidades.org.sv', '$2y$10$mpkya/Cbyub5fKM0Q53eqOEd8kSPXPwvT30ZF0YkRtk1.4gNGdqI2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(717, 'Lisbeth SaraÃ­ Recinos Marroquin', 'lisbeth.recinos@oportunidades.org.sv', '$2y$10$tppcFrBJfA7F0yfHe6OS9e1vP7WCGPW9v2yLQChFeB/yAuFZBYBiu', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(718, 'Sara SofÃ­a Renderos CalderÃ³n', 'sara.renderos@oportunidades.org.sv', '$2y$10$vrB6/34ck5lsqi.Mu.J8q.bX0D4iwm.2JQV5aND1h8WXmx6V/6THe', 'img71898094.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(719, 'Doris del Carmen Rodriguez Marroquin', 'doris.rodriguez@oportunidades.org.sv', '$2y$10$lpERoNsov7XclYHWCLMdl.HNdDI50Wo.1kGDZLWQ7HzLcSSLZMYHG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(720, 'Evelyn Gabriela Rosa JuÃ¡rez', 'evelyn.rosa@oportunidades.org.sv', '$2y$10$J1jTkba3OG7Qhde1XaayaebqzkJuUTeKI1/KFkTJVjYgaEewG8N5a', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(721, 'Rosa Luz SÃ¡nchez Castellanos', 'rosa.sanchesz@oportunidades.org.sv', '$2y$10$JI7fuiMGBFkwxlk2CDwznOlCB0QydurTt7pKlP1hywa7msk0NpILG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(722, 'CÃ©sar Kevin SÃ¡nchez GarcÃ­a', 'cesar.sanchez@oportunidades.org.sv', '$2y$10$nhsYUG6IPltSJhiMJAKv3eygFkkOnJG.kzHrHfO72qB2Hc009s00O', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(723, 'Alexander Enrique SÃ¡nchez Orellana', 'alexander.sanchez@oportunidades.org.sv', '$2y$10$vf57di.qOP1EwHLUBmzOGeMJk6TcWFsbZYwWzk/YOLtGDn1urUNq.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(724, 'Miguel Evaristo SÃ¡nchez SÃ¡nchez', 'miguel.sanchez@oportunidades.org.sv', '$2y$10$kbZAzmu9ATJIHpPbEAl6/uHe13Cvx0n9RsKs/cWcqWpEEe8iscKEi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(725, 'Haarlem Ivette Saravia Abarca', 'haarlem.saravia@oportunidades.org.sv', '$2y$10$okEh1mVt3PikILQ6XClkb.h1WhbUuC3bfoRiEQAnb39voRvnKnqsW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(726, 'Edwin Eduardo Torres PÃ©rez', 'edwin.torres@oportunidades.org.sv', '$2y$10$Ut6mwnqtBhoiLA5dFhM6heDEtS9MmC1qETov1CJwvVZnA7lFPtKt6', 'img72691852.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(727, 'AndrÃ©s Aquino VÃ¡squez', 'andres.aquino@oportunidades.org.sv', '$2y$10$uWQQIiiuBlwEeMldlQBzvuQVoH.vW1XtGNcFYaALTgT6SealKqQhm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(728, 'Juan Javier Zelada Jovel', 'juan.zelada@oportunidades.org.sv', '$2y$10$/65UYyqf4vRsJtDPTJz/VOE5TB/4LiTsybmujT4AwuGk6mtA8RgkW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(729, 'Susana Arely Ramos PÃ©rez', 'susana.ramos@oportunidades.org.sv', '$2y$10$T0E.ZDq3NdV/S4gRhdmLCuldVvbd4DLGG/KLfUTnyrBiuxvKg5nrS', 'imgDefault.png', 0, 'SSSAT', 'Estudiante', 'SSFT'),
(730, 'Eduardo Antonio Aguilar SolÃ³rzano', 'eduardo.aguilar@oportunidades.org.sv', '$2y$10$fKwhak2b6Hp1IXirQ0sDDOs1NCMozPT6W0XQmS1AOldJrq5XUHRlO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(731, 'Flor de Maria Alvarado Canjura', 'flor.alvarado@oportunidades.org.sv', '$2y$10$MJRM79dYf4/E/ai3aOa6K.vODb71CFwU4wUieZ6KQuxMt9i/28sSa', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(732, 'Daniel Antonio Alvarado HernÃ¡ndez', 'daniel.alvarado@oportunidades.org.sv', '$2y$10$old.JyziqNPdDjNVVpBheuavtEUV5qqdKAFB9UGjPAXNVWUkJA4iy', 'img73282444.png', 1, 'SSFT', 'Estudiante', 'SSFT'),
(733, 'Paola Sthephany Angel Rodriguez', 'paola.angel@oportunidades.org.sv', '$2y$10$4YLBkJxEd5owKv1dKkkEnu14tH9uf3Eic7geVtnktThyEynH15HZG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(734, 'Fatima Alejandra Arevalo LÃ³pez', 'fatima.arevalo@oportunidades.org.sv', '$2y$10$Utok.DHAVHWKPGDkbBvYZOW//qpzCBQOKU0zw8oXvgez1e31v/S/2', 'img73456986.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(735, 'Raquel Estefany Argueta Alejo', 'raquel.alejo@oportunidades.org.sv', '$2y$10$jJWRYy4i84M2xUCObPqWMuA2hhyInyW0X5n7qzzSDz6uWOKbivboO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(736, 'AnaÃ­ Michelle AvilÃ©s Castaneda', 'anai.aviles@oportunidades.org.sv', '$2y$10$WCAaSrb4wLlQBvVRZAKcse/BdM9w0ROvFNV5sv7yffq8XTaAYyVa6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(737, 'Fatima del Carmen Ayala', 'fatima.ayala@oportunidades.org.sv', '$2y$10$iMhRXql3Bgi6jgJj0YdteOy4Us/Tw0MHQo6EJDAhCDS.HHylyQ05a', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(738, 'Steven Armando Barrera Iraheta', 'steven.barrera@oportunidades.org.sv', '$2y$10$BkRbAQrcQgSa3vl5KOOrDuTt3NuwMM8OBQWgCy1VziJvTjR/m1Wdq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(739, 'Joshua Ernesto Bermudez Garcia', 'joshua.bermudez@oportunidades.org.sv', '$2y$10$zwuLZGJHFzJ8TXNPlTJKO.3jZ7RcKq0dD5YUKJvUaGa579I2Iw6eu', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(740, 'Douglas Ernesto Berrios Zepeda', 'douglas.berrios@oportunidades.org.sv', '$2y$10$22Hc07WJMP8p5aXwmu/tcOupl7CEo2qFNNhrn..iMBvcWZpSFw54S', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(741, 'Miguel Alejandro Carrillo Guerra', 'miguel.carrillo@oportunidades.org.sv', '$2y$10$E34AE3WvGuvFoLMlhNejF.eAgYX1tIRejgn4VVzrSrEWzZKCs34Iq', 'img74161414.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(742, 'Nelson Jesus Carrillo Paniagua', 'nelson.carrillo@oportunidades.org.sv', '$2y$10$zALjxnAlRgJlNpJCc9QHuO4NriFjv4lV10shMcCuNyb0h5iGk26fS', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(743, 'Joel SalomÃ³n Castillo MÃ¡rquez', 'joel.castillo@oportunidades.org.sv', '$2y$10$wqhQu2FtNfGw8HDex.6LJe1EMBfHPUwhdKpG7D43dSL5V4I0ekJ9y', 'img743.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(744, 'Emerson Edenilson Contreras Reyes', 'emerson.contreras@oportunidades.org.sv', '$2y$10$5L3h01O3bDSvs76YnUqa3OR2Q652EZjDo5fXp/URW6eW/CptLAjsm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(745, 'Magbis Ariel Corea Araujo', 'magbis.corea@oportunidades.org.sv', '$2y$10$7dSj6frXMiNCsy0lutQ1OeHSOBFZ8hUTKOIYb7QHd9eUWC9dWreoK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(746, 'Alejandra Gabriela CortÃ©z', 'alejandra.cortez@oportunidades.org.sv', '$2y$10$a4mE6Z4UNSDrBxpVcTRRa.xDa3yu5uy4lJyS8FMGDm2CMUKT7HOV2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(747, 'Nayeli Nicole Cortez Barahona', 'nayeli.cortez@oportunidades.org.sv', '$2y$10$Q12KnyRpDR4a8lFNHvYb0.TtkofThooc4nYtJb31vFfdIjmVjoVRW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(748, 'Gabriel AndrÃ©s Cruz Matamorros', 'gabriel.cruz@oportunidades.org.sv', '$2y$10$HU3fh2.XozbwOe3pHZU...VkMhLwinJNkCQYsLdi1ycvB8HOVOm.C', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(749, 'Arely del Carmen De la O Pozo', 'arely.delao@oportunidades.org.sv', '$2y$10$vmkUgBGjDY7oH.8xkg.bDu4jxKd6EvruND38VSjDC8N2gCcXalHAC', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(750, 'Juan JosÃ© DÃ­az Cruz', 'juan.diaz@oportunidades.org.sv', '$2y$10$.B33YEKN2ggR0Nia4/UK7OTPHtoCXEk5NnLKIXyBKWY/ixd.iBTUy', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(751, 'Wendy Del Carmen DÃ­az Santillana', 'wendy.diaz@oportunidades.org.sv', '$2y$10$NW17ArJlJxPx/ORgZ759Ze5XQpfX99QcugVqYyeoaeFeMFm/m5F4G', 'img75119143.png', 1, 'SSFT', 'Estudiante', 'SSFT'),
(752, 'Sabrina Michelle Dominguez PÃ©rez', 'sabrina.dominguez@oportunidades.org.sv', '$2y$10$Rq2mkMdREacMYA541WOAvOeNnIXUDOq4j.9uKqwl02ZeAinN35JRu', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(753, 'Adriana Lourdes DurÃ¡n Reyes', 'adriana.duran@oportunidades.org.sv', '$2y$10$kKHxyk2ITdK8ru0oHautp.QYloMfOFMK99Zn.aJsKAuJEgHJpdkiK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(754, 'Valeria JazmÃ­n DurÃ¡n Rosales', 'valeria.duran@oportunidades.org.sv', '$2y$10$Soqm957uhSVjxXsijeJOPOSQShfUZO134XSzAuo8nQxfaO8OaHER6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(755, 'Anthony Stanley ElÃ­as VÃ¡squez', 'anthony.elias@oportunidades.org.sv', '$2y$10$D8ZnPSwpnwzTs.FVQdE1E..IGiL8pI7WsRsDie/mnLQugYfP03Sx2', 'img75546834.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(756, 'Sofia Dayana GonzÃ¡lez De EviÃ¡n', 'sofia.gonzalez@oportunidades.org.sv', '$2y$10$ifjVxflYDmaEs2Lqrnp5/.EVa4cCQWwTunm3P5GwCDXWeM6p6GG/K', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(757, 'David Alexander Gonzalez MartÃ­nez', 'david.martinez@oportunidades.org.sv', '$2y$10$RHLPfu.1T0Lba4qKEtAhFevqbvIzyCyI8fOoJa/icGIsoQpJcNoV.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(758, 'Roberto Alejandro Gonzalez Montes', 'roberto.gonzalez@oportunidades.org.sv', '$2y$10$RgKdcWPVoL7LeP6x5Iw2FuIoV1QYjPMHi3p.0bOoMl5gLRHKBMWEy', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(759, 'Adriana Marilyn GonzÃ¡lez Rogel', 'adriana.gonzalez@oportunidades.org.sv', '$2y$10$PyqwHCWwy/kzfQAQWpmkOuBibfXEFt47p7ho98EckB2qXYZapif8e', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(760, 'Karla Daniela Guerra CalderÃ³n', 'karla.guerra@oportunidades.org.sv', '$2y$10$LiVwwy3L.u6NzR7bbWVtaulGCOSyzCZ9ltYRaAk2X7FItoy0MlDk.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(761, 'Kenia Jazmin Guillen CalderÃ³n', 'kenia.guillen@oportunidades.org.sv', '$2y$10$H0Y0chaRZXn1ykZJpJYH0urYkciJb8kuCBs55SyGDITcpD.ZKW5Zq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(762, 'Katherine Fabiola HernÃ¡ndez', 'fabiola.hernandez@oportunidades.org.sv', '$2y$10$aaPoPwORjKAQN7unKX5nle7e1.6nBUmu7B2kuPfGCrMQnRY29VY22', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(763, 'Diana Vanessa HernÃ¡ndez HernÃ¡ndez', 'diana.hernandez@oportunidades.org.sv', '$2y$10$8nyPWTAKujkczV986crkluWQ9Q.2nTPzVI8gibN/NLKNoFOlI0726', 'img76343843.png', 1, 'SSFT', 'Estudiante', 'SSFT'),
(764, 'Wilfredo Francisco HernÃ¡ndez MunguÃ­a', 'wilfredo.munguia@oportunidades.org.sv', '$2y$10$b8Y8YrynD7V.aV3Cbc.C9eGPxufB5IR6O5NOzFxs8p1nzAUb6OKu.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(765, 'Amanda Nohely HernÃ¡ndez Orellana', 'amanda.hernandez@oportunidades.org.sv', '$2y$10$/k1TT.L.JgIwKrZ9RTGc6uMv2RgzDmp6jISqZ52no4YRbLSIk9wxy', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(766, 'Marcela Lisseth Jacinto Ã€lvarez', 'marcela.jacinto@oportunidades.org.sv', '$2y$10$nzc8/JA1C3vGvF/4hYhRlOSMCHZrUgJ.TA11AfCB9Mbr78zmlH2wm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(767, 'Lidia Margarita JÃ­menez Rivera', 'lidia.jimenez@oportunidades.org.sv', '$2y$10$qUMkf4jHrxL.nSbX3XQfAOrijr1Mh8QWrM5yM9q1AwRmFcTCqSET2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(768, 'Rafael Alexander LÃ©mus Leiva', 'rafael.lemus@oportunidades.org.sv', '$2y$10$cv1PQ7qIvefRn96gBj8ra.B5RHvJ.BD/ir1B5EKLG9ii5yK9oZpbG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(769, 'Carolina SaraÃ­ Linares HernÃ¡ndez', 'carolina.linares@oportunidades.org.sv', '$2y$10$/XIjVGL9a5RWzznYJyvfy.Y7oVuKnekhG27covCAyR8vnIBtD7Aky', 'img76945842.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(770, 'Marina Noemy LÃ³pez Urias', 'marina.lopez@oportunidades.org.sv', '$2y$10$pnvXSoh4IFj6w5Rqzu.KWuwiOTciCBgrc21acd2slWK1Kv48ptYOW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(771, 'Oscar Alejandro Luna Orellana', 'oscar.luna@oportunidades.org.sv', '$2y$10$/sVilUGy/jJkEUpX9sZMRucgSjEVvYLDptw1J2FumAaKRpeSWnJwm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(772, 'Salvador Stanley MagaÃ±a Colindres', 'salvador.magana@oportunidades.org.sv', '$2y$10$dmkQEqTFGKeEGFXIn0J2yuAJKO1yb/A04WhfmjU3C54JA6v3fHTbm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(773, 'Daniel Orlando MÃ¡rquez Saravia', 'daniel.marquez@oportunidades.org.sv', '$2y$10$QclrPu0VJ9idI31cM51nRezUz0/vc3MxrwSDujYfch5wmc3pLxyFm', 'img77354638.png', 1, 'SSFT', 'Estudiante', 'SSFT'),
(774, 'Ingrid Fabiola Martinez Carranza', 'ingrid.martinez@oportunidades.org.sv', '$2y$10$QSGtBORYjjABw0b9G0li5.5TzCYhwFzJfhTj3YbVctqG10NgTsdvS', 'img77434495.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(775, 'Karen Soraya MartÃ­nez Corbera', 'karen.martinez@oportunidades.org.sv', '$2y$10$4PZ4ta1I2devpBYdJ4X6K.X/8N5tuWpIyTbJWnpA12sVH/f5K4V2u', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(776, 'Eileen SofÃ­a MartÃ­nez Mena', 'eileen.martinez@oportunidades.org.sv', '$2y$10$.BERaVwoLQprwXv1Wa7ege.jOrw8esEcTIdgu7UyZYvVTV1/Es69i', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(777, 'Paola Estefany MartÃ­nez OrtÃ­z', 'paola.martinez@oportunidades.org.sv', '$2y$10$pfRwX0YM5g3ktpA.cHXRv.D0g0aOvJURtEj2TtjEoEnWvHAdoLbG2', 'img77795843.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(778, 'Wendy Carolina MejÃ­a MartÃ­nez', 'wendy.mejia@oportunidades.org.sv', '$2y$10$jaxCsxhEiXlf8Xxuj8z7ke.APoU5H8oK1vcn3CvnZhlrM2ICWaCzG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(779, 'Karen Stephanie Melara Alas', 'karen.melara@oportunidades.org.sv', '$2y$10$vJ8u6waRgN04ToHRkJw7wuuH.D0wsa.UmoyS3gV8PZ.85Hwl9n1D.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(780, 'Damaris Guadalupe MelÃ©ndez Perez', 'damaris.melendez@oportunidades.org.sv', '$2y$10$uYEbltehXXAW1xSQ1bLjk.Zo6I9VSU8uRDfdV7BZ.R/1Xeyy6lx3a', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(781, 'Fatima Raquel MembreÃ±o ChÃ¡vez', 'fatima.membreno@oportunidades.org.sv', '$2y$10$tuU.GOjvdVZCvjGI13BGqePHxyVayR/HPkxtwkRlejCl5MFSaIOvC', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(782, 'Adriana Beatriz MorÃ¡n PÃ©rez', 'adriana.moran@oportunidades.org.sv', '$2y$10$cArWYW6SpqvpVI/nA5f1J.9yumX3ZYbdSeN0HggqqO7EJNAJmh/Hi', 'img78218181.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(783, 'Gabriel Fernando Navidad DÃ­az', 'gabriel.navidad@oportunidades.org.sv', '$2y$10$mq/h79LKZO0SksQHTqAKi.nfCjEtgQmYpfRXF5/Rv5Avhym00Z2Y.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(784, 'Dejanira Berenice Novoa DÃ­az', 'dejanira.novoa@oportunidades.org.sv', '$2y$10$SRnfETCkSb5Jpb20VAl1pezPZ.AOjBwLM1pnKx4iZ6tGRazl8Wooq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(785, 'Vicente de JesÃºs OrtÃ­z Vela', 'vicente.ortiz@oportunidades.org.sv', '$2y$10$oFe9X23/pLhtGmQzDwimgOnScA5CTpJ9qnCpbn.3f19sbkLEJhBCK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(786, 'Brayan Adonay PaÃ­z Alfaro', 'brayan.paiz@oportunidades.org.sv', '$2y$10$KRSn5l4CWg88nYYUjbbiKeEfKOzpHGLEXY1GC38JBWiComMFrMxI2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(787, 'Daniel JonatÃ¡n Pineda HernÃ¡ndez', 'daniel.pineda@oportunidades.org.sv', '$2y$10$42Jx4ryp9UwYJ7mkgv56EuQrl4IDzSi2UkytnZVH/VWJJWfUPogiS', 'img78751078.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(788, 'Alexis SaÃºl Pineda Melara', 'alexis.pineda@oportunidades.org.sv', '$2y$10$twQSc8/z9UTBGlZKG4VDMuUvUtsm8V6pzGQq67TAP0S87WzOvgNTq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(789, 'Jonathan Edgardo Pineda Ramos', 'jonathan.pineda@oportunidades.org.sv', '$2y$10$21GK5mBrU0fxrm/lQ5MjtuYuRBsZaOylUyR85dQ0Lej2VJmhQYWe.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(790, 'Guadalupe del Carmen RamÃ­rez PÃ©rez', 'carmen.ramirez@oportunidades.org.sv', '$2y$10$i2uNdbHsdCm7DxAXmsGNPuqmQ9Mb2Z2szS93/7IiM2dF5JCE3mEjW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(791, 'Katherine Yamileth Recinos Martinez', 'katherine.recinos@oportunidades.org.sv', '$2y$10$3SMZIx99QqkJ7EZJ4wlOCubhi2YokhaTEZF6Qadj/21ZEFJKL56SG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(792, 'Iris Aurora Reyes Rodriguez', 'iris.reyes@oportunidades.org.sv', '$2y$10$nelVAjLeQa1wMFPNzSLZvem6goyD42ZWEI32oZ3xA8V90C5sDyJ5e', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(793, 'Katherine Jazmin Salguero Dominguez', 'katherine.salguero@oportunidades.org.sv', '$2y$10$HEJprpbxvEIZtwZspP6CFulC9li.2QsA6NVL6vdQWKWqG5i.ALZ/2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(794, 'Daniel Eduardo Serpas Rivera', 'daniel.serpas@oportunidades.org.sv', '$2y$10$oA3SOQbXotYvrOXcQFeBLekBWloPjtQBJXbX4db5Eq6tLAiSBVROW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(795, 'Katherine Elizabeth Teos', 'katherine.teos@oportunidades.org.sv', '$2y$10$oxH6n3tMtI2Ejru/zDEN0uVtF8VxyBTJndOsJXqypy7lGnXd2CcqG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(796, 'Oscar NeptalÃ­ Tisnado Callejas', 'oscar.tisnado@oportunidades.org.sv', '$2y$10$DyPtoVfVlrdChWgyTMRUj.s7jYptOkU0jDwd67WdRJhzyrkRs5MMi', 'img79648303.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(797, 'Juan Alberto Urquilla Fuentes', 'juan.urquilla@oportunidades.org.sv', '$2y$10$oxEqTn7RxVTH5s4kFIgBzeGUzpXz5IzJuX2/9Zrdkt3y/M/GBFXLi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(798, 'Tatiana Karina Valencia HernÃ¡ndez', 'tatiana.valencia@oportunidades.org.sv', '$2y$10$tPRpaLU/TjzGKDMKaIobG.Ske9tD.raTf0XxuGcy2B70z3WHcIioe', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(799, 'Anthony Alexander VasquÃ©z Iraheta', 'anthony.vasquez@oportunidades.org.sv', '$2y$10$qh5gh3AQa/xt5mEJRTSc4.IULvZnBawur160E2O6KywYN4eQIO4.O', 'img79953021.png', 1, 'SSFT', 'Estudiante', 'SSFT'),
(800, 'ElÃ­an Emiliano Vasquez Soriano', 'elian.vasquez@oportunidades.org.sv', '$2y$10$8I2nk5m0VfpxcX25lwL/S.yhsoOQ4smP7Y3.gf8hN475nWeHVrUnm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(801, 'Karla MarÃ­a Villalta Flores', 'karla.villalta@oportunidades.org.sv', '$2y$10$GCY62hLn.Hik/27PyQRLCOQCRDfu7kfJtLfRY/yQ/MVGyW6BSN9yq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(802, 'Ingrid MarÃ­a Acevedo Ulloa', 'ingrid.acevedo@oportunidades.org.sv', '$2y$10$OD9XW3Xr9MPyer.68vHOJ.9iexu0vnPBGGM8g5dMbBMCbD0F72VdO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(803, 'Gabriela Alejandra Aguirre Ventura', 'gabriela.aguirre@oportunidades.org.sv', '$2y$10$j5WDjKpwJkZBZi5K6S.W7Oif8aaHxBqrK6vlEnLvq.TY7iFIQ9v7W', 'img80384519.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(804, 'Eduardo Antonio Alfaro Aguilar', 'eduardo.alfaro@oportunidades.org.sv', '$2y$10$86MYOODj2OHIXuHwmYvvr.Z5fJSLXLeEpMbUEcMRbi1QblSSmBOVm', 'img80488864.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(805, 'Alejandra SofÃ­a Amaya Miranda', 'alejandra.amaya@oportunidades.org.sv', '$2y$10$Cd.mVYjVvjHgT/j6ATG9D.6QjAHTv5pZ.MSPyBCLiXqcPMANNlM3e', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(806, 'Brenda Abigail Argueta Maravilla', 'brenda.argueta@oportunidades.org.sv', '$2y$10$ifeFz5P6UlJZTaooSSYWoeoE0b1DjPTtXRFXghkGYLXBoSvhLFh9O', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(807, 'Elvis NoÃ© Argueta CalderÃ³n', 'elvis.argueta@oportunidades.org.sv', '$2y$10$5MB3SDU3tQvgvbroIxY/deHBtJa3zMwr8EA32IVenED308WU7F6jm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(808, 'Miguel Angel Barahona GarcÃ­a', 'miguel.barahona@oportunidades.org.sv', '$2y$10$lvF0wlRCtz.bT3huhyChT.H4WaOEWCx69p9wWFiP644Wdg77kC1sO', 'img80889802.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(809, 'Alexia SaraÃ­ BeltrÃ¡n', 'alexia.beltran@oportunidades.org.sv', '$2y$10$RH/7kUjvxoSVd6Rrmodyd.xect7KfD6oOwA5K2OOtBsWS9J9rUeEq', 'img80995071.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(810, 'Giovanny Ernesto Blanco MorÃ¡n', 'giovanny.blanco@oportunidades.org.sv', '$2y$10$qvJmjd/0Ju.rn/xF7wL0Yu93aqZUsHDX5sMLdpIIMr3t.D2XyMuQ6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(811, 'Vladimir Estuardo CÃ¡ceres Aguirre', 'vladimir.caceres@oportunidades.org.sv', '$2y$10$Ibi7wLscY13A5.bAY9sXAuEcyDnhi1hTKJVtacxfz7JJEb.men.9q', 'img81162736.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(812, 'MarÃ­a Gabriela CÃ¡ceres HenrÃ­quez', 'maria.caceres@oportunidades.org.sv', '$2y$10$t8jESwT5vyWHy0BquciFsuoiiTBCZ/ieQhKfztg3eveUHfpWiTm4y', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(813, 'Juan Manuel CanÃ­z GarcÃ­a', 'juan.caniz@oportunidades.org.sv', '$2y$10$VZvjn0FHfCXLkP9XYlKEnOcepR0uLGCq9HKCDlSttQ.yVfJjY1mru', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(814, 'Rosa Alejandra Casco Fuentes', 'rosa.casco@oportunidades.org.sv', '$2y$10$zhsUfhCeZgl8hUzbaDauN.b75WH4q10cq9C.FGuCA6n4/IvVbmboa', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(815, 'Gerardo Xavier Castillo del Cid', 'xavier.castillo@oportunidades.org.sv', '$2y$10$LMG55l.31sH3CKXg2WfTze1Aryher33dfaXH/tsi6NOwk9p7/U7KS', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(816, 'Katherine Abigail ChÃ¡vez Cruz', 'katherine.chavez@oportunidades.org.sv', '$2y$10$uypf6tPdA2hbXfQUCdHiReQ4NyKH5josvoe82q2x7zb7snTKybpeS', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(817, 'Cristian Eduardo Cornejo Zavala', 'cristian.cornejo@oportunidades.org.sv', '$2y$10$VQFfzCYPewXTuNfHy1vU1e/mxyMGFy6Pvvgzt6OdGB7O/uX2tHTlG', 'img81784409.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(818, 'Kenya Lisbeth Cruz Ayala', 'kenya.cruz@oportunidades.org.sv', '$2y$10$5Z4FN1VSnRlStCE6riHUOOYZ.uYXwDfwMBM4HhVdqFWaXv0zvd6aW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(819, 'Rodrigo Alberto Cruz RamÃ­rez', 'rodrigo.cruz@oportunidades.org.sv', '$2y$10$d75NxKShPjnRMN/PAGt2hOMypF3aqpnQPi2G6fMt9oX05bT2wqAcq', 'img81939311.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(820, 'Ana Sofia Cuestas Blanco', 'ana.cuestas@oportunidades.org.sv', '$2y$10$IrW3P7sgGiPtWrkcCghu5eYneVHzU2g1pMKbybde5ZKCHNybP76yO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(821, 'SofÃ­a Abigail Fiallos RamÃ­rez', 'sofia.fiallos@oportunidades.org.sv', '$2y$10$ysOfTG9oJ4GQYoxF5ZzQJ.NYo36r2m1LGGFFCVLIwSoy0PmNQoS9i', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(822, 'Ã“scar Ariel Garcia Bonilla', 'oscar.garcia@oportunidades.org.sv', '$2y$10$3r7bhv/cfy2Jmd.dZn.8suMVubfXdpmbsFJPREz6SOrI53PEuWCEq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(823, 'Christian Edgardo Gil Flores', 'christian.gil@oportunidades.org.sv', '$2y$10$nuFciCKMa/VP.ICnm8Gawe0jL/Yf.eUJemohs41ORxihy1ApngsTO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(824, 'Laura Jennifer Guevara GÃ³mez', 'laura.guevara@oportunidades.org.sv', '$2y$10$ildZUuJ5oKJfkhFQBzEL/uxzB.Q28jjGW5gcnsESnM89tDSGUxOp6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(825, 'Paola Elizabeth HenrÃ­quez Romero', 'paola.henriquez@oportunidades.org.sv', '$2y$10$xb643VjBcrzAjzrHAETbK.iGE56oRu.X4BevxPhBEM0lEI2tfS5w2', 'img82570052.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(826, 'Mario Humberto HernÃ¡ndez Guerrero', 'mario.hernandez@oportunidades.org.sv', '$2y$10$ceIFGNd5kIJVL2R.UHE0M.3bB93.zswpDDgNidgcmRT1gQYHOWaAK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(827, 'Jairo JosÃ© HernÃ¡ndez Abrego', 'jairo.hernandez@oportunidades.org.sv', '$2y$10$38tsdOSNFAvZToGKjSDUveQas6Idt/c/g3wzhTBiP4fOmWZX.F9ea', 'img82793562.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT');
INSERT INTO `usuarios` (`IDUsuario`, `nombre`, `correo`, `contrasena`, `imagen`, `conteo_entradas`, `ID_Sede`, `cargo`, `SedeAsistencia`) VALUES
(828, 'Thelma Carolina HernÃ¡ndez Contreras', 'thelma.hernandez@oportunidades.org.sv', '$2y$10$v.3Tc5NS7jD/Fg4GrVbmcO0H7WlooWnsodL.QdhWGZTHCq28sbeN6', 'img82891721.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(829, 'Katherine Nayeli HernÃ¡ndez Flores', 'nayeli.hernandez@oportunidades.org.sv', '$2y$10$5BMGS129KpzU07AThsITO.9Z/PKMf4LlL47ENiN4yJDk39FrL3ggO', 'img82941089.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(830, 'Mauricio Caleb HernÃ¡ndez HernÃ¡ndez', 'mauricio.hernandez@oportunidades.org.sv', '$2y$10$Dg4BkQTYV9uWVbD3isvehO3SrSRH1SDGLJe2rn0run3NKF8cVUC.2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(831, 'Irma Gabriela HernÃ¡ndez MartÃ­nez', 'irma.hernandez@oportunidades.org.sv', '$2y$10$ejCM51i11p1VBRAdxJBAGOWKKVrJp3qWHBN9MBIieYwAJtle/.zPC', 'img83121243.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(832, 'Bryan Arnold Herrera Alfaro', 'bryan.herrera@oportunidades.org.sv', '$2y$10$ECyFjjtFf0E2BLU4FhLfpumbWU0EEqSKOYktLDdsc6X0ls/ZZ2VQi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(833, 'Erika Lisseth JoaquÃ­n JuÃ¡rez', 'erika.joaquin@oportunidades.org.sv', '$2y$10$GYE9eOf1E3qme0w3L2xqbOitGKjbrZkL96F/esd.R2z/xvexsbab6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(834, 'Raquel Elizabeth Jorge Carrillo', 'raquel.jorge@oportunidades.org.sv', '$2y$10$O/3ipYmnhMVM1o8sr0Tpl.7e61nwD3KP4Rq.AXrYXVBLWPTD3Cuga', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(835, 'Douglas Alexander JuÃ¡rez Rosales', 'douglas.juarez@oportunidades.org.sv', '$2y$10$6BbUamphzJOzLVn.XbYJX.4xBNmIOnUfEieJjurladqEGfSq5QfJ2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(836, 'Martha AngÃ©lica LarÃ­n Guevara', 'martha.larin@oportunidades.org.sv', '$2y$10$K/VPUU4qhIL9hT1YGDfqzujacKBeppQmz1YcJkDGlsLl.Sw5Cq2aq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(837, 'Milena Astrid LÃ³pez MartÃ­nez', 'milena.lopez@oportunidades.org.sv', '$2y$10$6q1asAR.av.BdZUF.mDQLOAahJFLGqHJ7dIxoy8PY6Nbp5XoUBik2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(838, 'Rodrigo JosuÃ© Loza Cabrera', 'rodrigo.loza@oportunidades.org.sv', '$2y$10$EJQz9mwO/ucKBi39Qxle9.35tub/7uR9/RLvJtz3TS5xJUMk4LSwu', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(839, 'Alejandra Isabel Machado CaÃ±as', 'alejandra.machado@oportunidades.org.sv', '$2y$10$nGvVvBmufE5dxMOz7yshXONf8/udbqJfR9cQJIcG2xGUepyGqFJ/K', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(840, 'Geraldina Tatiana Marin Campos', 'geraldina.marin@oportunidades.org.sv', '$2y$10$0eOcPtpQg0i/71Vx56BPaexiYxBZ.bE1YOJYhyuWOGMup.3CCLH1m', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(841, 'Zuleima Guadalupe Martell Leiva', 'zuleima.martell@oportunidades.org.sv', '$2y$10$y6Ai6rklD0MhcTisKlxZ..zibjwKx6pfC9mEaE0f4hVoW2bTNAzCm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(842, 'Ingrid SaraÃ­ MartÃ­nez Guardado', 'sarai.martinez@oportunidades.org.sv', '$2y$10$CCRUE0bRzJum0Kh3SVKQce.vH5/LK.0slIVYlg4AGXxNJN/AE/LLG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(843, 'Darlyn Elizabeth MartÃ­nez MartÃ­nez', 'darlyn.martinez@oportunidades.org.sv', '$2y$10$EAbuQGygGJeAxN/Zqfvcm.TW93PiekRUNzmJhW68IizbAni7zzm/q', 'img84351157.png', 1, 'SSFT', 'Estudiante', 'SSFT'),
(844, 'Allison Roxana MejÃ­a NuÃ±ez', 'allison.mejia@oportunidades.org.sv', '$2y$10$VSVlNpnQArx6DpiwRtNpp.vV.3AdMaLMhm1apOMyLpnTvL6RGzWzm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(845, 'Paola Stephanie Mejia HernÃ¡ndez', 'paola.mejia@oportunidades.org.sv', '$2y$10$H81XQWOrp3eY3mD8JGX7X.s7x.bBSm.oC6LVMLgLj0/1cbDF9ux/K', 'img84515800.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(846, 'Ricardo JosÃ© MÃ©ndez LÃ³pez', 'ricardo.mendez@oportunidades.org.sv', '$2y$10$mA7n8K0QmtsGsHXiDpdF5OfRqjRFVgrMVMUqvT6vaTrq4zQvJr/HG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(847, 'Oscar Alexander MenÃ©ndez Abarca', 'oscar.menendez@oportunidades.org.sv', '$2y$10$Rg8s1fipn5Kymhq.JRRMZuADcs4wbZvA.SrNqrlQh0XH9WYZaGDNy', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(848, 'Jennifer Maritza Minero MorÃ¡n', 'jennifer.minero@oportunidades.org.sv', '$2y$10$A8yYYJPhIpGNLvwqlE.NZuuki31UPqnjU/8aoEj/49MByvcPTRrde', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(849, 'Gladis Marlene Miranda Valladares', 'gladis.miranda@oportunidades.org.sv', '$2y$10$EJYpAxZAlSwz9gVXMGuD7uBnJEp6fyAAnCrzGBCF1s1qGiGNizay2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(850, 'LucÃ­a Guadalupe Molina', 'lucia.molina@oportunidades.org.sv', '$2y$10$siQ8bwwFUOFuhKwKjedCcOEY0ofcDMrLcdB8Y8aGje3SaRNWXKs4S', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(851, 'Erika Roxana Montano MuÃ±oz', 'erika.montano@oportunidades.org.sv', '$2y$10$3eCOY.fTieN/.2A/At8w/ezZH.R5lGSTb8jCYDlJuVbo.WPtC1JTO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(852, 'Henry James Monterroza DÃ­az', 'henry.monterroza@oportunidades.org.sv', '$2y$10$z4jdsqoDST5sPp8iqO.M0uKXS7d.0WdgcgVtlW7TJ.9lE2/7/xmnW', 'img85246063.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(853, 'Gabriela Beatriz Moreno Ventura', 'gabriela.moreno@oportunidades.org.sv', '$2y$10$Y//7GBODCMY/lJS8csGKbuAqHFGS3Ri9AC7yqigglM7/GgOBTFTBG', 'img85379671.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(854, 'Kevin Eleazar MuÃ±oz CÃ¡ceres', 'kevin.munoz@oportunidades.org.sv', '$2y$10$C/eG5fNnvSlP0Az5aT80.eWxx4gUqhZDjRdrlRSbBR7roPQaXa6Da', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(855, 'Alejandra MarÃ­a MuÃ±os Vargas', 'alejandra.munoz@oportunidades.org.sv', '$2y$10$yb87dulfIYXZIkKme8YxCuoxE3NGw6KVCOZpeADpUAKdwvFnvwG92', 'img85523422.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(856, 'Francisco Alejandro Murillo Oviedo', 'francisco.murillo@oportunidades.org.sv', '$2y$10$T.GU1xx/W8BNGLPh54.QQuyBQ.9LxSpr9oZYuICGlxPeACVGLX4y2', 'img856.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(857, 'Gabriela Adelina OrdoÃ±ez HernÃ¡ndez', 'gabriela.ordonez@oportunidades.org.sv', '$2y$10$1DO3OHf5JXBdxMSu2jwelusQ5BKRTjQg1XGZxVOByr1n7.l6r4tEq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(858, 'Michael Douglas Padilla', 'michael.padilla@oportunidades.org.sv', '$2y$10$rqbKgi3PBaomTQGqI0iJ/ObeglOLsmUbpTmyIdNvYNNq9W2fpIcI.', 'img85850768.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(859, 'Carlos Eduardo PeÃ±ate Salazar', 'carlos.penate@oportunidades.org.sv', '$2y$10$IKfsh8C2dlIkm0hnIhODw.BfiATqS3VdiV1EbX27l5oMh0PCFBf6m', 'img859.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(860, 'Carolina Isabel Pineda Delgado', 'carolina.pineda@oportunidades.org.sv', '$2y$10$my095ydxV50L4By.MbKS4.tNfkWX.IpeYzjNR9A3YV1yb3p494ZcG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(861, 'Emely YasmÃ­n Portillo Villalobos', 'emely.portillo@oportunidades.org.sv', '$2y$10$1.UTS7dp.7jZr3xnRFc9F.I3/jxTKV1rkQpNobfts.hKjRsZ2XfTq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(862, 'Carlos Armando Portillo MÃ©ndez', 'carlos.portillo@oportunidades.org.sv', '$2y$10$BsOtscKY9zKqgYOm1fCL4evGrChzkyd2rWfOHCKzNOxZ4C7tmAxGq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(863, 'Oscar Alexander RamÃ­rez Ventura', 'oscar.ramirez@oportunidades.org.sv', '$2y$10$qjDGSm/fhu9qF4qmucCeR.OjcyWDmS6Wdzpl6Gqh2Ks6R4I.XmDka', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(864, 'Gloria Damaris Ramos Galeas', 'gloria.ramos@oportunidades.org.sv', '$2y$10$fkIHD1TLr0w766w1tYu9gucrIw7yXjp4O0ayoc6vQoPM/Hh0B.OVu', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(865, 'Giovanni Stanley Reyes Ãlvarez', 'geovanni.reyes@oportunidades.org.sv', '$2y$10$WPSaA/CCSxMEO6.BvQtZYerFdIvIsFHCKQREFx7Ue4zSLT.zREvV2', 'img86539710.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(866, 'Pamela Madahy Reyes GonzÃ¡lez', 'pamela.reyes@oportunidades.org.sv', '$2y$10$.2ddgdz192gvLvicBqXyvuITIldDIWd7lPDXHgjKY6Txy4iplik8K', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(867, 'Carlos MoisÃ©s Reyes MartÃ­nez', 'carlos.reyes@oportunidades.org.sv', '$2y$10$rqL5NAqiE9H9eoidrJkUtuH8zYWGt9K9aeMWEcnzvhTUE1.Fofox6', 'img86785641.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(868, 'Jacqueline Beatriz Romero Carmona', 'jacqueline.romero@oportunidades.org.sv', '$2y$10$HYiWiDj/VSib/TbqhkBJ..vcMmLcrqMO2mjfTrbT/K92I.DksnIFW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(869, 'Adelina del Carmen Rosales Castillo', 'adelina.rosales@oportunidades.org.sv', '$2y$10$wZLF6drt2pQflV/YUNN.V.e.ats.TLt2M3CYR4Wd6d.5MVnqSXzW6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(870, 'Katherine Andrea Sanchez Alvarado', 'katherine.sanchez@oportunidades.org.sv', '$2y$10$8lJ/2YGbsCXzl2Hhs0YEh.2VT8IhOAptq77TaP.LlRZpQUieFBRaq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(871, 'Axel Daniel Sanchez Rivera', 'axel.sanchez@oportunidades.org.sv', '$2y$10$pF34.7RR1OrWgOCgcstaIefc7ATJK8ENr1iGUz3MeQfu5fJ1DLkVm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(872, 'Angela Antonia Say MenjÃ­var', 'angela.say@oportunidades.org.sv', '$2y$10$B0dG2A2fLekqgNn1aZWdlej4CVF0quDsd0.ybgaaWWkisID4rPFAG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(873, 'Mariam Ivone SigÃ¼enza HernÃ¡ndez', 'mariam.siguenza@oportunidades.org.sv', '$2y$10$ZZ570kxOeL9uPdaQMEtEVenTYsLldX1raOqBY0dR3S6sfRByw6nTi', 'img873.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(874, 'Katherine Esmeralda Tejada Rodas', 'katherine.tejada@oportunidades.org.sv', '$2y$10$yKIlwiMq0JV/GW04TuOzUup27yTPsM4LIQgPYSVjC1SAtU/K4HFl6', 'img87499689.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(875, 'Natalia Araceli VÃ¡quez Andrade', 'natalia.vasquez@oportunidades.org.sv', '$2y$10$6GApiDM3Np189cHtPJbCQew5Ww20k3tyosOHY0pMoUK4v.mhIKrOK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(876, 'Diego Alejandro VelÃ¡squez GÃ³mez', 'diego.velasquez@oportunidades.org.sv', '$2y$10$mumK9Fnervh7NKpEA66xS.fs7ZSUag2D5tZiYnouAjyT7vrEQAU7O', 'img87699878.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(877, 'JosÃ© Emanuel Villalobos SÃ¡nches', 'jose.villalobos@oportunidades.org.sv', '$2y$10$nYmbEJwgbX71hE2iNXBedeAQV6Nid6pUblVNWCAVxcQUBn.0CQh0S', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(878, 'Fernando Enrique Villanueva LÃ³pez', 'fernando.villanueva@oportunidades.org.sv', '$2y$10$6kjJfpAKEaUtP.6K9/PAl.dGYxfQmuLvXlVJfINRXxajbrStPswEW', 'img87823789.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(879, 'Alejandra Victoria Villatoro Palacios', 'alejandra.villatoro@oportunidades.org.sv', '$2y$10$7E4lXVj97N9mZrdwAnNe/u.NkP/as3plOVsbYZ.L9DYVPnfE/kltK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(880, 'Kenia Lissette Alberto Cruz', 'kenia.alberto@oportunidades.org.sv', '$2y$10$NA9ZD5ipjiFXqoXHBDgOheeLxEOf5psMRpF2c4ll3LD5I8wR1tH2m', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(881, 'Adela Carolina Rivas Ramos', 'adela.rivas@oportunidades.org.sv', '$2y$10$GLLfnphWmQeNn021a5eYcekDH39xXb5WQ3pxCNqhXJPOUGdmpsSxO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(882, 'Adriana Emperatriz Reyes Santos', 'adriana.reyes@oportunidades.org.sv', '$2y$10$gy/v0iiGOfCba2zW82fdSObanwVd7Cra9ZlcSb26r7ANiBE.tTI.e', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(883, 'Adriana MarÃ­a CerÃ³n Agiuilar', 'adriana.ceron@oportunidades.org.sv', '$2y$10$Jf1iLtlexwFPuAAJrX2OxO.m850CmPTnLGni.seQ31uRPka3fSrgq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(884, 'Aida Patricia Toloza Bonilla', 'aida.toloza@oportunidades.org.sv', '$2y$10$ICwU4.AIT6Jgj1ul0P6ex.nOdCmvjuMjuwYh7txkEk4lFeRv0e0BC', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(885, 'Aileen Yulitza Perez Menjivar', 'aileen.perez@oportunidades.org.sv', '$2y$10$lbKCjlcmCJcCNUkdCfY9aOOKofMqRs1UpwuTjJZYkuDNWB42s4LLi', 'img88512202.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(886, 'Alejandra Abigail Acevedo GarcÃ­a', 'alejandra.acevedo@oportunidades.org.sv', '$2y$10$9g1PUrKBcJ5FlCrphOQ5d.ywaYiMQ09o1zziaZ089rb.l0vVvjE8W', 'img88664224.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(887, 'Alejandra Abigail Echeverria Argueta', 'alejandra.echeverria@oportunidades.org.sv', '$2y$10$zgh6Url9UQdsGQZTO5Z42.QbJ6h1aFTR6fY94jXou6ItCV.JGzDhu', 'img887.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(888, 'Alexandra JazmÃ­n Diego Grande', 'alexandra.diego@oportunidades.org.sv', '$2y$10$udC9ngsHJv1tGArEfDmO0u62KdPML9fKdWu/OrIZgbQkIWSWVPw/2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(889, 'Ana Yamileth Piche SalmerÃ³n', 'ana.piche@oportunidades.org.sv', '$2y$10$Dx5OkXQx6hBu5TJNSAZukuXSSxJBSslCNz68d4Huf5UgVgU29xv76', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(890, 'Andrea MarÃ­a GarcÃ­a MartÃ­nez', 'andrea.garcia@oportunidades.org.sv', '$2y$10$HrFuBDJGwRv3tJdnQvNgyOlpDVBlg7XbGOoEroQ3i2Fp3aePjnziK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(891, 'Andrea SaraÃ­ GÃ³mez Serrano', 'andrea.gomez@oportunidades.org.sv', '$2y$10$X7YfkRHQoBp.CTKHidHtTOVFydfs3oGxrwVBy0GvKZRxa27tVOdp6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(892, 'Camila Maribel Valencia Castillo', 'camila.valencia@oportunidades.org.sv', '$2y$10$esSxg5ELYh12P.UdV5u2YeATCv5WEO07yWoRusaefuBfaf29Hl9Q6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(893, 'Cesar EfraÃ­n Tisnado Callejas', 'cesar.tisnado@oportunidades.org.sv', '$2y$10$UfErxAWfi0LDwVuEQZkvieFCN8FT4BOjwcFH59UeCoFJUN154tfGe', 'img89390740.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(894, 'Christian JosuÃ© Barraza Barahona', 'christian.barraza@oportunidades.org.sv', '$2y$10$jGX3knE3voqYxBYbA/70qOGNl/aV8TCbBt4ppfuKcsM1bBmpeiqRS', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(895, 'Christofer Doroteo Portillo Martinez', 'cristopher.portillo@oportunidades.org.sv', '$2y$10$VX81sDXSWAC6.ScYS5v98uAEMozKb/IlE3/IAYfmSFdcV0PtU/00u', 'img89568851.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(896, 'Cozbi Naharai Castillo MarquÃ©z', 'cozbi.castillo@oportunidades.org.sv', '$2y$10$Q9PXHoAes0d3qeCu17qryeZW2eViaxP69NFFsFjwEV7zkkD9uBlSa', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(897, 'Cristina Isabel Renderos Flores', 'cristina.renderos@oportunidades.org.sv', '$2y$10$lbxEWutPwX8Rpgeoi31rIe5a9Rd1F/H54JQrcQg.pX5WGKzQP3Y8K', 'img89749343.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(898, 'Daniel de JesÃºs Campos MartÃ­nez', 'daniel.campos@oportunidades.org.sv', '$2y$10$3NV9UG9gkQIjaeJ0vuYVZ.Kk/HpsIA1kqOjQkRdCxCNRdjms27DgO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(899, 'David AdriÃ¡n PeÃ±ate MartÃ­nez', 'david.penate@oportunidades.org.sv', '$2y$10$7HI.OjYnhbsFJNT/ctecmuq5RxBylRmR2vzRxq.S7oEkQVfTljMvG', 'img899.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(900, 'David IsaÃ­as MartÃ­nez HernÃ¡ndez', 'isaias.martinez@oportunidades.org.sv', '$2y$10$OF5yvmuKTCA.pL30beKfMeRMZJxcnkP8t61VZUCX.EWlnal7i/okC', 'img90084698.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(901, 'Diana Victoria PÃ©rez Molina', 'victoria.perez@oportunidades.org.sv', '$2y$10$IJFHbe.MprBSIAvsyqV7RubZAhHXf3G3OgMjyO7XrpN5uDlGZ.Le2', 'img90151064.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(902, 'Edwin Manuel GonzÃ¡lez Flores', 'edwin.gonzalez@oportunidades.org.sv', '$2y$10$UZNKAbTz3n56WSh/b/3AOecpXr81IhjzWgZN4D36PgU6wox/NchdW', 'img90222554.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(903, 'Emanuel ElÃ­ Galindo SÃ¡nchez', 'emanuel.galindo@oportunidades.org.sv', '$2y$10$hJs/.uFO2r/.UBhJtEjN2e3I1SZgBSSvLDzV89SfANaIrqCjN3DpG', 'img90348346.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(904, 'Emely Odette Flores Valencia', 'emely.flores@oportunidades.org.sv', '$2y$10$shfuQWd//LRvh/UhTickC.skxwQfvY3fEM.B4OFEUz8AHy5S9a6a6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(905, 'Erika Lisbeth Castellanos', 'erika.castellanos@oportunidades.org.sv', '$2y$10$n9nsay.2M20cN4cQ5OGjbebIf1jnMyHXm1Sr8yogtMwtZJN0p3mkm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(906, 'Ernesto Rikerlmy Serrano Zavaleta', 'ernesto.serrano@oportunidades.org.sv', '$2y$10$9Y55QepmeUwkpWXOFyuA6.C.b89Dx5VQBzwPRO1mR35xdqDaZT9r2', 'img90689415.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(907, 'Fabiola Nicolle Rivas MartÃ­nez', 'fabiola.rivas@oportunidades.org.sv', '$2y$10$Ch6PFjMwbCQCWzTctmPvQuQ2.2zFhZPQO4o5BM9hqwhG7DpObsdYG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(908, 'FÃ¡tima Alejandra Quintanilla MejÃ­a', 'fatima.quintanilla@oportunidades.org.sv', '$2y$10$SqhKJ2k61OpjoUvpbWOWquzLKQATwfXv7UtglgOD7oy/K5XWmiwo6', 'img90874478.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(909, 'Fernando Jose De Paz Ayala', 'fernando.depaz@oportunidades.org.sv', '$2y$10$ii0WKXJuDHJFSkCk9vMCeehg0Gk5sPhZbSfcnxEfprcEumfB99tJW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(910, 'Flor de MarÃ­a LÃ³pez Argueta', 'flor.lopez@oportunidades.org.sv', '$2y$10$bz0Y0FRaY3knzfRu4QCWAegdDZj3NA0fZJWEgtvkoeCt1l3/sHH4.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(911, 'Francisco Antonio Hernandez Sanchez', 'francisco.hernandez@oportunidades.org.sv', '$2y$10$F3zT4YW/6XuyCQ3pPhpcQe1IhwM1JADtmhnw2Ew813evpz6mfGM1m', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(912, 'Gerardo Enrique Palacios DÃ­az', 'gerardo.palacios@oportunidades.org.sv', '$2y$10$.T6SvYydu2PkSntfeuiz4.El/k3DTM55.nntF7eiq.neHae2urgyu', 'img91243319.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(913, 'Gerardo Josue Alfaro Torres', 'gerardo.alfaro@oportunidades.org.sv', '$2y$10$2pRvW/NvHJqfRb.WArE3W.lwac6RWEZ5FnK32XINxehNCcqGo8W5u', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(914, 'Grecia Isamar PÃ©rez Ascencio', 'grecia.perez@oportunidades.org.sv', '$2y$10$BKttVkWHjHpC4ndMagB9q.TBbVcDVbPTEPgmwU1ItgHhz8MEgv8vm', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(915, 'Idalia Rosibel Cruz RamÃ¬rez', 'idalia.cruz@oportunidades.org.sv', '$2y$10$zM9UvnMw/My9p0KlumY.8em6TzGuEJYxRN9q8Sg6NFPRxb9ob9bEa', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(916, 'Ingrid Elizabeth Candray Perdomo', 'ingrid.candray@oportunidades.org.sv', '$2y$10$LnwSV5MZ6WfxNC.JyIwt.OdHt9LfSea6xAs4WqnD15CCG6k0NhG2e', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(917, 'Israel Adonay Campos Villalobos', 'israel.campos@oportunidades.org.sv', '$2y$10$cC5t2KDY3CVNLEDwbKsz0OZvoGvm6l/kVJw4Lezz1ZwQGtAeRTtC2', 'img91772043.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(918, 'Ivania Alejandra LÃ³pez Flores', 'ivania.lopez@oportunidades.org.sv', '$2y$10$q0z0LX/hhlm87/2mnGqJouf95i5LkeoS726mYJht8G8ZoJfyJ4d.i', 'img91884504.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(919, 'Jeannette Arely HernÃ¡ndez ChÃ¡vez', 'jeanneth.hernandez@oportunidades.org.sv', '$2y$10$74PXq0Rg6VifsaLur/DgSO7fnk5Ja.CbwxHIiKFBq4vJakXWy1ut6', 'img91969645.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(920, 'Jerry Steven MancÃ¬a Alfaro', 'jerry.mancia@oportunidades.org.sv', '$2y$10$oIyCMB5chkPzJx02UbxnFuVPqi23qN3gObJd4niLkCljglijV6/QK', 'img92033197.png', 1, 'SSFT', 'Estudiante', 'SSFT'),
(921, 'Jimmy Alberto ArdÃ³n Barrera', 'jimmy.ardon@oportunidades.org.sv', '$2y$10$/.fWDlCK.74gizBV9Dmy3uEv43XBjbpqcyZ4Lw9MkEy1BD0lGdq2K', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(922, 'Jocelyn Estefany Cardoza Ramos', 'jocelyn.cardoza@oportunidades.org.sv', '$2y$10$O87Np0OQQgJsOoAnO7m9Ue8jejd60N9tgNe1VTte533d7X5KcZ6jW', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(923, 'Jorge Isai Carrillo Mayora', 'jorge.carrillo@oportunidades.org.sv', '$2y$10$lSB229GLVVTXp3XUHWpgwOJ6vqZAByq.9uT1yLHuhAaBZnVsOksYW', 'img92375999.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(924, 'JosÃ© Alejandro MartÃ­nez Urquilla', 'alejandromartinez@oportunidades.org.sv', '$2y$10$2lE8uAsmnbi7lclU.yX4Mu7AtelXSN25LT97cbjPz8Fr61AuD9XS6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(925, 'Jose Alfredo Brizuela Ramos', 'jose.brizuela@oportunidades.org.sv', '$2y$10$IDrgPh3GO441SRVfM.cRyOoHqHmBg8fRq5twbrU32tCFH4G1mypLG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(926, 'JosÃ© Luis Flores Ceros', 'jose.flores@oportunidades.org.sv', '$2y$10$ZJoMVPM91f.M9Ej6HunxBO80rjoDLKSxLRw/4mCDK8c.b8AxuhYHS', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(927, 'Jose Stanley Ortiz Escobar', 'jose.ortiz@oportunidades.org.sv', '$2y$10$Xk6BKFEFeA7Db6lxAHl2SebpVYdczXQyGz9j6cOu/V5d9W7p1ru2y', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(928, 'Julio Cesar Tejada Rivera', 'julio.tejada@oportunidades.org.sv', '$2y$10$pnQxQ9GzG0rw0AMI894H..8keniN7ECRY2P5LjZ9b7flQ96SDgL5W', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(929, 'Karla Marcela Aguilar Rivas', 'karla.aguilar@oportunidades.org.sv', '$2y$10$JjkNOXNaF4WgXxkM5kJp1eQfnnTmGkzhl8wAhzYvj7lop1hoHGQBS', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(930, 'Karla Vanessa Castillo Melgar', 'vanessa.castillo@oportunidades.org.sv', '$2y$10$hbj49pBQmkSTgx.ppenZV.shjS/vuu6bgkzRj0Mgzek5LY.tgCTAy', 'img930.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(931, 'Kathelin Dayana Henriquez Hernandez', 'kathelin.henriquez@oportunidades.org.sv', '$2y$10$YckglLKk.utPDFEdzJN9eO4sDJXCZg919RpVExPMzYQxiw1RrBhXa', 'img93173774.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(932, 'Katherine Judith Sanchez Mena', 'judith.sanchez@oportunidades.org.sv', '$2y$10$waqMq2b7J9oWNOxRrFRot.zJYLEtBeTGSoCqSbBzsDsNt1gOU0ZXG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(933, 'Katherine Melissa Alfaro Perez', 'katherine.alfaro@oportunidades.org.sv', '$2y$10$QvRxmBOogqlslB575Hp9BuUau6Mtmn/9kKOEq5LgzFYX/ebRN2.Yq', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(934, 'Katherine Yesenia PanameÃ±o Gavidia', 'katherine.panameno@oportunidades.org.sv', '$2y$10$JVBEpFcdsMir7Ec09sQnnOU5Y0752mbDvs9GwSlGplv7f2by.OH2q', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(935, 'Kathya Marcella Perez Martinez', 'kathya.perez@oportunidades.org.sv', '$2y$10$lgUcLVKznHf5Jo/O9I62i.ExVEjCexW1JaJtZjp9rkz5etwArfTDa', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(936, 'Kenya Ariel Cuchilla SÃ¡nchez', 'kenya.cuchilla@oportunidades.org.sv', '$2y$10$ttvQP2VD5xgo0FuaAlPM0OQBkyFaFiEYD9tP3jhlYhqjlvqJE05Zy', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(937, 'Kevin Alexander Zepeda Contreras', 'kevin.zepeda@oportunidades.org.sv', '$2y$10$V.tHvdsiSSN2fzNaEmCUqOu7GQ1Hy6giGs475FUI3vEIYI0zYPtdi', 'img937.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(938, 'Leonardo Vladimir Maldonado Estupinian', 'leonardo.maldonado@oportunidades.org.sv', '$2y$10$H9OLtyaZnd7AtoNd3UgqGeExlo1kLL.2Axqvtgw3o1SISIzrRT32.', 'img938.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(939, 'Liliana Elizabeth Ayala Hernandez', 'liliana.ayala@oportunidades.org.sv', '$2y$10$k9cTO3pfoEo9.WkSwuX5I.t6WdUhvrWfNNJJdZbn2jlH1Lvpe8F8W', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(940, 'Lourdes Gabriela JimÃ©nez Raymundo', 'lourdes.jimenez@oportunidades.org.sv', '$2y$10$Lg9jowLALaM723L86HZJLOS8/BhFK6Z4krWBFcxQ21Sz6fptZ6Y/e', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(941, 'Lourdes Nohemy Gonzalez Nieto', 'lourdes.gonzales@oportunidades.org.sv', '$2y$10$E2Wkli/2U8lLfVURX7ea9ebeLuhOz66.k.BWDeDML6Bzn5N8YINcC', 'img941.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(942, 'Luis Diego Ruiz CalasÃ­n', 'luis.ruiz@oportunidades.org.sv', '$2y$10$AjlTx74dqqg.eB1I6bdRcuiU.svDGmvIb0AaO5IgAAYE.jjY9wV3W', 'img94270471.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(943, 'Luis Fernando Blanco Flores', 'luis.blanco@oportunidades.org.sv', '$2y$10$2mGFX6htDrPQQcX3vXfjN.C/F7V85I5.V84GqQHxE.KRt5JcZm4JK', 'img943.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(944, 'Maria Coralia Cruz Martinez', 'maria.cruz@oportunidades.org.sv', '$2y$10$O6SEiYTSLWVf7A6itCty7OOcCLrQskykf9VMRTVjAXrB0lQOumzP.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(945, 'MarÃ­a de Los Ãngeles Rivas Quintanilla', 'maria.rivas@oportunidades.org.sv', '$2y$10$S/mTsJ76DhAWLeIH2/h7tu.i9NiYQDo5IaHeUVH.EvEnKfCg.zLka', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(946, 'Marina Guadalupe San JosÃ© ChÃ¡vez', 'marina.sanjose@oportunidades.org.sv', '$2y$10$qslmZMN5xfAg1TFDCHZG8uUGIOezTxrqQstRxIqk4pXE58PQ1.pi.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(947, 'Marisol Abigail Miranda Flores', 'marisol.miranda@oportunidades.org.sv', '$2y$10$AZ60Tkv2EHisys0ej5pqQO.80qsp9hBX7aN6uhwtcuUQ6p/uAeFfy', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(948, 'Melissa Gabriela PÃ©rez Castellanos', 'melissa.perez@oportunidades.org.sv', '$2y$10$DOlFGF/rSlnEuWrAPoS2yeBe42XljZbdQUdyIKB5qJd/CgdlYzI1u', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(949, 'Mirka Raquel Villalta Flores', 'mirka.villalta@oportunidades.org.sv', '$2y$10$AGt.5rengCGlCnOFAaxj8OA46c3QjkSjiw6Ur/T1AKwo6FuGlXa/G', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(950, 'MÃ³nica Yasmin Castro Ascencio', 'monica.castro@oportunidades.org.sv', '$2y$10$2ktm64RmbyFf5.QrbJmeee9FNhx9YWAWl.WAWOHP4RhEFzKkcJ.qC', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(951, 'Natalia SaraÃ­ Artiaga HernÃ¡ndez', 'natalia.artiaga@oportunidades.org.sv', '$2y$10$cQsOYo1p5qey44kX9PYCq.ARxs3xYEk0L2HZ4mG4A3wTWu0UlKrmO', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(952, 'Nelson Enrique Pineda Santos', 'nelson.pineda@oportunidades.org.sv', '$2y$10$d7p3C7IRc/s4lrgzjs/cxua5uwbkt/7ObyU36XXh6blAEQGRboOXy', 'img952.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(953, 'Nestor Roger Rogel Henriquez', 'nestor.rogel@oportunidades.org.sv', '$2y$10$ltTSTSeEi9zwTLbHa7mdE.T698fAQFX3EQAS1fEk3jyt1GUW7t9j2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(954, 'Oscar ElÃ­as De Paz RamÃ­rez', 'oscar.depaz@oportunidades.org.sv', '$2y$10$1FL/uO9EZJNdoZ8dgbdl6uHAEjO4yhubngUj.sJoSS86ppvKq3DlS', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(955, 'Pamela Abigail Jacobo Orellana', 'pamela.jacobo@oportunidades.org.sv', '$2y$10$xWjJcCjWS19KPn6iXR4G4em1R4SJ4SJk9vY1XbRniywlaLLGuP1xi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(956, 'Priscila Guadalupe Trujillo HenrÃ­quez', 'priscila.trujillo@oportunidades.org.sv', '$2y$10$z20EZwD2m7D3UHPrH8wLGue1Rh1/5RjyfFb4CktHGuzva3k6.eYCC', 'img95685819.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(957, 'Rebeca Abigail MartÃnez Reyes', 'abigail.martinez@oportunidades.org.sv', '$2y$10$cBd7.r/DcrTYXzpNoM5TZOfkFYF11Cm1JXDqmsKpdfdMik0goL4VK', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(958, 'Rebeca Lisseth MartÃ­nez Reyes', 'rebeca.martinez@oportunidades.org.sv', '$2y$10$jjxtB5LUEOxs/90GihDxpemtLFRvBnPqIg3JP1H9uwkeHiiDVlB1i', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(959, 'Ronald Fary Villafana Escalante', 'ronald.villafana@oportunidades.org.sv', '$2y$10$5FL7gWd6uHc5t7eCn0R5n.Dwq3KWDRrnFH8ZaMryHlf/tGRh0qA6.', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(960, 'Rosa Emilia Cerna GutiÃ©rrez', 'rosa.lopez@oportunidades.org.sv', '$2y$10$OHlwXhkxIDSaO10XwoUfA.C00Ovg7cyfb7ARxtBUBWQ9aJtEqI5WG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(961, 'Sarai Guadalupe Flores Milla', 'sarai.flores@oportunidades.org.sv', '$2y$10$7yMN/pvxDdzZOUwzw1el0OZKOSFS6dl061vkVtFra8xYNu7qY4BBC', 'img961.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(962, 'Tirsa Nicolle Granados Portillo', 'nicolle.portillo@oportunidades.org.sv', '$2y$10$4z2rK/Bpjy1DJG0JnITppu5JX24pbIE/Ttj2AfxyuNuH3jB/gs7zy', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(963, 'Valeria RenÃ©e Escobar Contreras', 'valeria.escobar@oportunidades.org.sv', '$2y$10$EnKpnbKRpum.9dMRKuUtxOslCOxVw8SudcAO7L8L7PMJ8Yj7jRE.K', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(964, 'Walter Antonio Ventura Romero', 'walter.ventura@oportunidades.org.sv', '$2y$10$XPkpoQsoohUJMQ/MXSIGj.ZjNAyTpifCOsCzvvAXFcyQAW3C8mrxi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(965, 'Zuleyma Del Carmen Aguilar Escamilla', 'zuleyma.aguilar@oportunidades.org.sv', '$2y$10$MCd2HCfsOAF2o6/Bv2/mFubT8rl2eVZzgueXUZSFnAEpcEwiWB5F2', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(966, 'Luis Flores', 'luis.flores@oportunidades.org.sv', '$2y$10$6.2KXPtABRZ8wLoZCix8he0NznwHtPFveBNnN2YIoQ.ooWiDt6K22', 'img96693156.jpeg', 1, 'SSFT', 'SuperUsuario', 'SSFT'),
(967, 'José Manuel Garcia', 'jose.garcia@oportunidades.org.sv', '$2y$10$1mrT/UI9rxkdglJhzu0uOOycM/4YrV/6yVdnCJzl4rPwEEtXVvCyC', 'img96737713.jpeg', 1, 'SAFT', 'Coach Talleres', 'SAFT'),
(968, 'Fatima Baldovinos', 'fatima.baldovinos@oportunidades.org.sv', '$2y$10$83UeGUhzXKJf2vrgB2wHCuAk2YjFGSi0/sqLGZI1GFHEn7vRiy9Lq', 'img96895408.png', 1, 'SSFT', 'Coach Talleres', 'SSFT'),
(969, 'Geovanny Albanés', 'geovanny.albanes@oportunidades.org.sv', '$2y$10$QQpIeRgO6YUeR6pTh58z8.xtHJrm0TmFiUZhZiwmsSe.o3hOQOVw2', 'img96915994.jpeg', 1, 'SSFT', 'Coach Reuniones', 'SSFT');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID_Alumno`),
  ADD KEY `FK` (`ID_Empresa`,`ID_Status`),
  ADD KEY `FK_Alumno_Estatus` (`ID_Status`),
  ADD KEY `FK_Alumno_Sede_idx` (`ID_Sede`),
  ADD KEY `FK_Alumno_Carrera` (`ID_Carrera`),
  ADD KEY `FK_Alumno_SedeAsistencia` (`SedeAsistencia`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`Id_Carrera`),
  ADD KEY `FK_Carreras_Facultades` (`ID_Facultades`);

--
-- Indices de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD PRIMARY KEY (`ID_Ciclo`);

--
-- Indices de la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`IDComptenecia`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`ID_Empresa`);

--
-- Indices de la tabla `evalicionreunion`
--
ALTER TABLE `evalicionreunion`
  ADD KEY `FK_Rating_Alumno` (`id_alumno`),
  ADD KEY `FK_Rating_Reunion` (`id_reunion`);

--
-- Indices de la tabla `evaluaciontalleres`
--
ALTER TABLE `evaluaciontalleres`
  ADD KEY `FK` (`ID_Alumno`,`ID_Taller`),
  ADD KEY `FK_Evaluacion_Taller` (`ID_Taller`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`IDFacultates`);

--
-- Indices de la tabla `formatotalleres`
--
ALTER TABLE `formatotalleres`
  ADD PRIMARY KEY (`ID_Formato`);

--
-- Indices de la tabla `horariosreunion`
--
ALTER TABLE `horariosreunion`
  ADD PRIMARY KEY (`IDHorRunion`),
  ADD KEY `ID_Reunión` (`ID_Reunion`);

--
-- Indices de la tabla `hsociales`
--
ALTER TABLE `hsociales`
  ADD PRIMARY KEY (`ID_HSociales`),
  ADD KEY `FK` (`ID_Ciclo`,`ID_Alumno`),
  ADD KEY `FK_Horas_Alumno` (`ID_Alumno`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`IDinscripcion`),
  ADD KEY `FKIncripcion_SEDE_idx` (`ID_Sede`);

--
-- Indices de la tabla `inscripcionreunion`
--
ALTER TABLE `inscripcionreunion`
  ADD KEY `Fk_IdAlumnoR` (`id_alumno`),
  ADD KEY `Fk_IdHorarioR` (`Horario`),
  ADD KEY `Fk_IdReunionR` (`id_reunion`);

--
-- Indices de la tabla `inscripciontalleres`
--
ALTER TABLE `inscripciontalleres`
  ADD KEY `Fk_IdTaller` (`ID_Taller`),
  ADD KEY `Fk_IdAlumno` (`ID_Alumno`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD KEY `FK` (`ID_Alumno`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `objetivostaller`
--
ALTER TABLE `objetivostaller`
  ADD PRIMARY KEY (`IDobjetivo`),
  ADD KEY `FK_ObjetivosTaller` (`ID_Taller`);

--
-- Indices de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  ADD PRIMARY KEY (`ID_Reunion`),
  ADD KEY `Fk_IdEmpresaR` (`ID_Empresa`),
  ADD KEY `Fk_IdCicloR` (`ID_Ciclo`),
  ADD KEY `FK_SEDE` (`ID_Sede`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`ID_Sede`);

--
-- Indices de la tabla `solicitudcambio`
--
ALTER TABLE `solicitudcambio`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `FK_status_cambio` (`id_status`),
  ADD KEY `FK_alumno_cambio` (`id_alumno`);

--
-- Indices de la tabla `solicituddesinscribir`
--
ALTER TABLE `solicituddesinscribir`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `FK_alumno_desinscribir` (`id_alumno`),
  ADD KEY `FK_taller_desinscribir` (`id_taller`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_Status`);

--
-- Indices de la tabla `tallercompetencia`
--
ALTER TABLE `tallercompetencia`
  ADD PRIMARY KEY (`IDTaller_Competencia`),
  ADD KEY `Fk_Competencias` (`IDComptenecia`),
  ADD KEY `FK_Taller` (`ID_Taller`);

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`ID_Taller`),
  ADD KEY `FK` (`ID_Formato`,`ID_Sede`,`ID_Empresa`),
  ADD KEY `FK_Taller_Sede` (`ID_Sede`),
  ADD KEY `FK_Taller_Empresa` (`ID_Empresa`),
  ADD KEY `Fk_IdCiclo` (`ID_Ciclo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUsuario`),
  ADD KEY `FK_Usuario_Sede_idx` (`ID_Sede`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `IDFacultates` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `horariosreunion`
--
ALTER TABLE `horariosreunion`
  MODIFY `IDHorRunion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `IDinscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de la tabla `objetivostaller`
--
ALTER TABLE `objetivostaller`
  MODIFY `IDobjetivo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `solicitudcambio`
--
ALTER TABLE `solicitudcambio`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20209822;

--
-- AUTO_INCREMENT de la tabla `solicituddesinscribir`
--
ALTER TABLE `solicituddesinscribir`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2020060102;

--
-- AUTO_INCREMENT de la tabla `tallercompetencia`
--
ALTER TABLE `tallercompetencia`
  MODIFY `IDTaller_Competencia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=970;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `FK_Alumno_Carrera` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Alumno_Empresa` FOREIGN KEY (`ID_Empresa`) REFERENCES `empresas` (`ID_Empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Alumno_Estatus` FOREIGN KEY (`ID_Status`) REFERENCES `status` (`ID_Status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Alumno_Sede` FOREIGN KEY (`ID_Sede`) REFERENCES `sedes` (`ID_Sede`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Alumno_SedeAsistencia` FOREIGN KEY (`SedeAsistencia`) REFERENCES `sedes` (`ID_Sede`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `FK_Carreras_Facultades` FOREIGN KEY (`ID_Facultades`) REFERENCES `facultades` (`IDFacultates`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evalicionreunion`
--
ALTER TABLE `evalicionreunion`
  ADD CONSTRAINT `FK_Rating_Alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`ID_Alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Rating_Reunion` FOREIGN KEY (`id_reunion`) REFERENCES `reuniones` (`ID_Reunion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluaciontalleres`
--
ALTER TABLE `evaluaciontalleres`
  ADD CONSTRAINT `FK_Evaluacion_Alumno` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Evaluacion_Taller` FOREIGN KEY (`ID_Taller`) REFERENCES `talleres` (`ID_Taller`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hsociales`
--
ALTER TABLE `hsociales`
  ADD CONSTRAINT `FK_Horas_Alumno` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Horas_Ciclo` FOREIGN KEY (`ID_Ciclo`) REFERENCES `ciclos` (`ID_Ciclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripcionreunion`
--
ALTER TABLE `inscripcionreunion`
  ADD CONSTRAINT `Fk_IdAlumnoR` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`ID_Alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_IdHorarioR` FOREIGN KEY (`Horario`) REFERENCES `horariosreunion` (`IDHorRunion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_IdReunionR` FOREIGN KEY (`id_reunion`) REFERENCES `reuniones` (`ID_Reunion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripciontalleres`
--
ALTER TABLE `inscripciontalleres`
  ADD CONSTRAINT `Fk_IdAlumno` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumnos` (`ID_Alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_IdTaller` FOREIGN KEY (`ID_Taller`) REFERENCES `talleres` (`ID_Taller`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `objetivostaller`
--
ALTER TABLE `objetivostaller`
  ADD CONSTRAINT `FK_ObjetivosTaller` FOREIGN KEY (`ID_Taller`) REFERENCES `talleres` (`ID_Taller`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reuniones`
--
ALTER TABLE `reuniones`
  ADD CONSTRAINT `FK_SEDE` FOREIGN KEY (`ID_Sede`) REFERENCES `sedes` (`ID_Sede`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_IdCicloR` FOREIGN KEY (`ID_Ciclo`) REFERENCES `ciclos` (`ID_Ciclo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_IdEmpresaR` FOREIGN KEY (`ID_Empresa`) REFERENCES `empresas` (`ID_Empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudcambio`
--
ALTER TABLE `solicitudcambio`
  ADD CONSTRAINT `FK_alumno_cambio` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`ID_Alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status_cambio` FOREIGN KEY (`id_status`) REFERENCES `status` (`ID_Status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicituddesinscribir`
--
ALTER TABLE `solicituddesinscribir`
  ADD CONSTRAINT `FK_alumno_desinscribir` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`ID_Alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_taller_desinscribir` FOREIGN KEY (`id_taller`) REFERENCES `talleres` (`ID_Taller`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tallercompetencia`
--
ALTER TABLE `tallercompetencia`
  ADD CONSTRAINT `FK_Taller` FOREIGN KEY (`ID_Taller`) REFERENCES `talleres` (`ID_Taller`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Competencias` FOREIGN KEY (`IDComptenecia`) REFERENCES `competencias` (`IDComptenecia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD CONSTRAINT `Fk_IdCiclo` FOREIGN KEY (`ID_Ciclo`) REFERENCES `ciclos` (`ID_Ciclo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_IdEmpresa` FOREIGN KEY (`ID_Empresa`) REFERENCES `empresas` (`ID_Empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_IdFormato` FOREIGN KEY (`ID_Formato`) REFERENCES `formatotalleres` (`ID_Formato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_IdSede` FOREIGN KEY (`ID_Sede`) REFERENCES `sedes` (`ID_Sede`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
