-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-04-2020 a las 16:47:31
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oportuni_despega3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
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
  `FuenteFinacimiento` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_Alumno`),
  KEY `FK` (`ID_Empresa`,`ID_Status`),
  KEY `FK_Alumno_Estatus` (`ID_Status`),
  KEY `FK_Alumno_Sede_idx` (`ID_Sede`),
  KEY `FK_Alumno_Carrera` (`ID_Carrera`),
  KEY `FK_Alumno_SedeAsistencia` (`SedeAsistencia`)
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
('2012-SA-FT-0048', 'Gabriela Janeth VÃ¡ldez MelÃ©ndez', 2014, 'gabriela.valdez@oportunidades.org.sv', 'DeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 5, 'Declinado', '0'),
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
('2015-SA-FT-012', 'Brandon Alfonso Valencia Rivera', 2017, 'brandon.valencia@oportunidades.org.sv', 'LeDG', 'UDB', 'M', 'Activo', 'PDE006', 'SAFT', 'SSFT', 35, 'Becado', 'FGK'),
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
('2015-SA-FT-050', 'Ronald Ernesto Tejada Rios', 2017, 'ronald.tejada@oportunidades.org.sv', 'IeDdS', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 84, 'Pausa', 'Beca Externa con Apoyo Adicion'),
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
('2015-SS-FT-1000', 'Miguel Carrillo', 2019, 'miguel.carrillo@oportunidades.org.sv', 'LeM', 'UCA SS', 'H', 'Activo', 'EST001', 'SSFT', 'SSFT', 21, 'Becado', 'FGK'),
('2015-SS-FT-1001', 'Francisco Rivas', 2019, 'francisco.rivas@oportunidades.org.sv', 'TEDGP', 'UFGSS', 'H', 'Activo', 'EST001', 'SSFT', 'SSFT', 20, 'Becado', 'FGK'),
('2015-SS-FT-1002', 'Gabriela Moreno', 2019, 'gabriela.moreno@oportunidades.org.sv', 'LeM', 'UCA SS', 'H', 'Activo', 'EST001', 'SSFT', 'SSFT', 30, 'Becado', 'FGK'),
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
('2016-SA-FT-048', 'Xavier Alexander PeÃ±ate DueÃ±as', 2018, 'xavier.penate@oportunidades.org.sv', 'LeCP', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 22, 'Becado', 'FGK'),
('2016-SA-FT-049', 'Marjorie Esmeralda Castellanos Musun', 2018, 'marjorie.castellanos@oportunidades.org.sv', 'LeDG', 'UFGSS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 17, 'Becado', 'FGK'),
('2016-SA-FT-050', 'Gustavo Enrique PÃ©rez DÃ­az', 2018, 'enrique.perez@oportunidades.org.sv', 'LeCP', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 24, 'Becado', 'FGK'),
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
('2017-SA-FT-0001', 'Alejandra AbigaÃ­l JimÃ©nez Torres', 2019, 'alejandra.jimenez@oportunidades.org.sv', 'LeFis', 'UNASA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0002', 'Alexandra Michelle Genovez Quintana ', 2019, 'alexandra.genovez@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0003', 'Andrea Liliana Aguilar Cruz', 2019, 'andrea.aguilar@oportunidades.org.sv', 'IeDdS', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0004', 'Andrea MarÃ­a JimÃ©nez VelÃ¡squez', 2019, 'andrea.jimenez@oportunidades.org.sv', 'LeEcon', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 3, 'Becado', 'FGK'),
('2017-SA-FT-0005', 'Aracely AbigaÃ­l Escobar LÃ³pez', 2019, 'aracely.escobar@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0006', 'Blanca Paola Rosales Valdez', 2019, 'blanca.rosales@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0007', 'Brandon IsaÃ­ Cruz Escobar', 2019, 'brandon.cruz@oportunidades.org.sv', 'Imac', 'UDV', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0008', 'Carlos Enrique Posada Grande', 2019, 'carlos.posada@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0009', 'Cecilia Gabriela Salazar Ruiz', 2019, 'cecilia.salazar@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0010', 'Daniel Orlando MartÃ­nez GutiÃ©rrez', 2019, 'daniel.martinez@oportunidades.org.sv', 'LeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0011', 'Daniel Vladimir SolÃ­s MarroquÃ­n', 2019, 'daniel.solis@oportunidades.org.sv', 'IIFOR', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0012', 'Diego Ernesto GÃ³mez MartÃ­nez', 2019, 'diego.gomez@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0013', 'Diego EsaÃº HernÃ¡ndez MagaÃ±a ', 2019, 'diego.hernandez@oportunidades.org.sv', 'IeDdS', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0014', 'Douglas Omar VÃ¡squez Tobar', 2019, 'douglas.vasquez@oportunidades.org.sv', 'TeIE', 'ITCA-FEPAD', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'Borja'),
('2017-SA-FT-0015', 'Emely Dayana GonzÃ¡lez DueÃ±as', 2019, 'emely.gonzalez@oportunidades.org.sv', 'LePSIC', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0016', 'Emerson AdriÃ¡n MartÃ­nez MartÃ­nez', 2019, 'emerson.martinez@oportunidades.org.sv', 'Imac', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0017', 'Erika LucÃa RamÃ­rez VÃ¡zquez', 2019, 'erika.ramirez@oportunidades.org.sv', 'DeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0018', 'Ernesto JosÃ© Padilla Cerna', 2019, 'ernesto.padilla@oportunidades.org.sv', 'LeEyN', 'ESEN', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0019', 'FÃ¡tima Lourdes Choto MartÃ­nez', 2019, 'fatima.choto@oportunidades.org.sv', 'LeCP', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0020', 'Gabriela Michelle HernÃ¡ndez HernÃ¡ndez', 2019, 'gabriela.hernandez@oportunidades.org.sv', 'LeEcon', 'UDJMD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 1, 'Becado', 'FGK'),
('2017-SA-FT-0021', 'Gerardo Javier Barillas  HernÃ¡ndez', 2019, 'gerardo.barillas@oportunidades.org.sv', 'IQ', 'UDV', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0022', 'IsaÃ­ Natanael GonzÃ¡lez Ãlvarez', 2019, 'isai.gonzalez@oportunidades.org.sv', 'TeIMDual', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0023', 'Jairo Oswaldo VÃ¡squez MartÃ­nez', 2019, 'jairo.vasquez@oportunidades.org.sv', 'LeCOMU', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0024', 'Jeaqueline Rosalba Jacobo GarcÃ­a', 2019, 'jeaqueline.jacobo@oportunidades.org.sv', 'LeAdE', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0025', 'Jennifer  Xiomara Samayoa MorÃ¡n', 2019, 'jennifer.samayoa@oportunidades.org.sv', 'LeM', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0026', 'Jennifer Liliana Mata CÃ¡ceres', 2019, 'jennifer.mata@oportunidades.org.sv', 'TeSI', 'ITCA-FEPAD', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'Borja'),
('2017-SA-FT-0027', 'Jessica Maricela ChÃ¡vez GarcÃ­a', 2019, 'jessica.chavez@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0028', 'Juan JosuÃ© Melgar HernÃ¡ndez', 2019, 'juan.melgar@oportunidades.org.sv', 'LeM', 'UNDESA', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0029', 'Julissa Michelle MorÃ¡n Ortiz', 2019, 'julissa.moran@oportunidades.org.sv', 'IQ', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0030', 'Karen Andrea LÃ³pez MagaÃ±a', 2019, 'karen.lopez@oportunidades.org.sv', 'IeSI', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0031', 'Karen Beatriz Mata SÃ¡nchez', 2019, 'karen.mata@oportunidades.org.sv', 'IQ', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0032', 'Karen Elizabeth Ramos Cienfuegos', 2019, 'karen.ramos@oportunidades.org.sv', 'SB', 'KU', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0033', 'Karla Tatiana GarcÃ­a Liborio', 2019, 'karla.garcia@oportunidades.org.sv', 'DeM', 'UNDESS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0034', 'Katherine Lisseth Asencio Castaneda', 2019, 'katherine.asencio@oportunidades.org.sv', 'LeCP', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0035', 'Katherine Michelle Latin Guardado', 2019, 'katherine.latin@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0036', 'Katherinne Esmeralda ChÃ¡mul Pacheco', 2019, 'katherinne.chamul@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0037', 'Katherinne Maritza Guevara GonzÃ¡lez', 2019, 'katherinne.guevara@oportunidades.org.sv', 'II', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0038', 'Kevin Enrique HernÃ¡ndez MorÃ¡n', 2019, 'enrique.hernandez@oportunidades.org.sv', 'LeDG', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0039', 'Kimberling Elizabeth RamÃ­rez Santos', 2019, 'kimberling.ramirez@oportunidades.org.sv', 'DeM', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0040', 'Krissia Vanessa Ortiz Alas', 2019, 'krissia.ortiz@oportunidades.org.sv', 'TEQI-', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0041', 'Leslie JazmÃ­n GarcÃ­a PÃ©rez ', 2019, 'leslie.garcia@oportunidades.org.sv', 'TE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0042', 'Lineth Verenice Mena CuÃ©llar', 2019, 'lineth.mena@oportunidades.org.sv', 'LeAdE', 'UCA SS', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0043', 'Luis  Enrique VÃ¡squez Aquila', 2019, 'luis.vasquez@oportunidades.org.sv', 'IeDdS', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0044', 'MarÃ­a de los Ãngeles CanizÃ¡lez Toledo', 2019, 'maria.canizalez@oportunidades.org.sv', 'TEQI-', 'ITCA ST', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0045', 'Mauricio Eduardo MenjÃ­var Escobar', 2019, 'mauricio.menjivar@oportunidades.org.sv', 'LeDG', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0046', 'Mayra Noelia GonzÃ¡lez Monterroza', 2019, 'mayra.gonzalez@oportunidades.org.sv', 'LeE', 'IEPROES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0047', 'Nayeli Michelle MÃ©ndez Cincuir', 2019, 'nayeli.mendez@oportunidades.org.sv', 'IQ', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0048', 'Oscar Enrique Hidalgo Zelaya', 2019, 'oscar.hidalgo@oportunidades.org.sv', 'TeMUL', 'UDB', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 3, 'Becado', 'FGK'),
('2017-SA-FT-0049', 'Paola Andrea HernÃ¡ndez Flores', 2019, 'andrea.hernandez@oportunidades.org.sv', 'LeDG', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0050', 'Paola Nicolle ChÃ¡vez BaÃ±os', 2019, 'paola.chavez@oportunidades.org.sv', 'LeM', 'INICAES', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0051', 'Rebeca Ester GarcÃ­a Moreno', 2019, 'rebeca.garcia@oportunidades.org.sv', 'IQ', 'UDV', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0052', 'Rodrigo JosuÃ© PÃ©rez DÃ­az', 2019, 'josue.perez@oportunidades.org.sv', 'LeM', 'INICAES', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0053', 'Sara AbigaÃ­l Villeda Escamilla', 2019, 'sara.villeda@oportunidades.org.sv', 'TeDG', 'UDB', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 2, 'Becado', 'FGK'),
('2017-SA-FT-0054', 'Tatiana AbigaÃ­l Alvarado Tejada', 2019, 'tatiana.alvarado@oportunidades.org.sv', 'LETE', 'UIPEDM', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Declinado-apoyo extraordinario', 'Financiamiento Propio'),
('2017-SA-FT-0055', 'Vanessa Johanna Morales MorÃ¡n', 2019, 'vanessa.morales@oportunidades.org.sv', 'LePSIC', 'UNDESA', 'F', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SA-FT-0056', 'Walter Alonso Cruz Galicia', 2019, 'walter.cruz@oportunidades.org.sv', 'TecIngIN', 'ITCA ST', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'Borja'),
('2017-SA-FT-0057', 'Walter Ernesto Funes SÃ¡nchez', 2019, 'walter.funes@oportunidades.org.sv', 'IQ', 'UCA SS', 'M', 'Activo', 'EST001', 'SAFT', 'SAFT', 0, 'Becado', 'FGK'),
('2017-SS-FT-1000', 'Joel SalomÃ³n Castillo MÃ¡rquez', 2017, 'joel.castillo@oportunidades.org.sv', 'IeSI', 'INICAES', 'H', 'Activo', 'EST001', 'SAFT', 'SAFT', 30, 'Becado', 'FGK'),
('2017-SS-FT-1001', 'Daniel Marquez', 2017, 'daniel.marquez@oportunidades.org.sv', 'TeC', 'UDB', 'H', 'Activo', 'EST001', 'SSFT', 'SAFT', 30, 'Becado', 'FGK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `Id_Carrera` varchar(10) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Duracion` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ID_Facultades` int(11) NOT NULL,
  PRIMARY KEY (`Id_Carrera`),
  KEY `FK_Carreras_Facultades` (`ID_Facultades`)
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

DROP TABLE IF EXISTS `ciclos`;
CREATE TABLE IF NOT EXISTS `ciclos` (
  `ID_Ciclo` char(10) NOT NULL,
  `Fechanicio` date DEFAULT NULL,
  `FechaFinal` date DEFAULT NULL,
  PRIMARY KEY (`ID_Ciclo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`ID_Ciclo`, `Fechanicio`, `FechaFinal`) VALUES
('01-2020', '2020-01-01', '2020-04-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

DROP TABLE IF EXISTS `competencias`;
CREATE TABLE IF NOT EXISTS `competencias` (
  `IDComptenecia` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDComptenecia`)
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

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `ID_Empresa` char(10) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Tipo` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_Empresa`)
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

DROP TABLE IF EXISTS `evalicionreunion`;
CREATE TABLE IF NOT EXISTS `evalicionreunion` (
  `id_alumno` char(16) NOT NULL,
  `id_reunion` char(10) NOT NULL,
  `rating` int(11) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  KEY `FK_Rating_Alumno` (`id_alumno`),
  KEY `FK_Rating_Reunion` (`id_reunion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciontalleres`
--

DROP TABLE IF EXISTS `evaluaciontalleres`;
CREATE TABLE IF NOT EXISTS `evaluaciontalleres` (
  `ID_Alumno` char(16) DEFAULT NULL,
  `ID_Taller` char(10) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Comentario` text DEFAULT NULL,
  KEY `FK` (`ID_Alumno`,`ID_Taller`),
  KEY `FK_Evaluacion_Taller` (`ID_Taller`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluaciontalleres`
--

INSERT INTO `evaluaciontalleres` (`ID_Alumno`, `ID_Taller`, `Rating`, `Comentario`) VALUES
('2015-SS-FT-1000', '0120030349', 100, 'me gus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

DROP TABLE IF EXISTS `facultades`;
CREATE TABLE IF NOT EXISTS `facultades` (
  `IDFacultates` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(75) NOT NULL,
  PRIMARY KEY (`IDFacultates`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `formatotalleres`;
CREATE TABLE IF NOT EXISTS `formatotalleres` (
  `ID_Formato` char(10) NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_Formato`)
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
-- Estructura de tabla para la tabla `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Alumno` char(16) NOT NULL,
  `ID_Ciclo` char(10) CHARACTER SET latin1 NOT NULL,
  `id` int(11) NOT NULL,
  `dia` varchar(15) NOT NULL,
  `horaentrada` time NOT NULL,
  `horasalida` time NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'Proceso',
  PRIMARY KEY (`idhorario`),
  KEY `FK_Horario_Alumno` (`ID_Alumno`),
  KEY `FK_horario_ruta` (`id`),
  KEY `FK_Horario_Cliclo` (`ID_Ciclo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `ID_Alumno`, `ID_Ciclo`, `id`, `dia`, `horaentrada`, `horasalida`, `estado`) VALUES
(7, '2017-SS-FT-1000', '01-2020', 4, 'Miercoles', '13:00:00', '16:00:00', 'Proceso'),
(6, '2017-SS-FT-1000', '01-2020', 2, 'Lunes', '06:00:00', '07:00:00', 'Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariosreunion`
--

DROP TABLE IF EXISTS `horariosreunion`;
CREATE TABLE IF NOT EXISTS `horariosreunion` (
  `IDHorRunion` int(10) NOT NULL AUTO_INCREMENT,
  `ID_Reunion` char(10) CHARACTER SET latin1 NOT NULL,
  `HorarioInicio` time NOT NULL,
  `HorarioFinalizado` time NOT NULL,
  `Canitdad` int(3) NOT NULL,
  PRIMARY KEY (`IDHorRunion`),
  KEY `ID_Reunión` (`ID_Reunion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hsociales`
--

DROP TABLE IF EXISTS `hsociales`;
CREATE TABLE IF NOT EXISTS `hsociales` (
  `ID_HSociales` char(10) NOT NULL,
  `CantidadH` int(11) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFinal` date DEFAULT NULL,
  `Encargado` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Descripcion` text CHARACTER SET utf8 DEFAULT NULL,
  `Comprobante` text CHARACTER SET utf8 DEFAULT NULL,
  `ID_Ciclo` char(10) DEFAULT NULL,
  `ID_Alumno` char(16) DEFAULT NULL,
  `estado` varchar(30) NOT NULL DEFAULT 'En espera',
  `comentario` text NOT NULL,
  PRIMARY KEY (`ID_HSociales`),
  KEY `FK` (`ID_Ciclo`,`ID_Alumno`),
  KEY `FK_Horas_Alumno` (`ID_Alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

DROP TABLE IF EXISTS `inscripcion`;
CREATE TABLE IF NOT EXISTS `inscripcion` (
  `IDinscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Sede` char(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(8) NOT NULL,
  `estado` varchar(30) NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`IDinscripcion`),
  KEY `FKIncripcion_SEDE_idx` (`ID_Sede`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`IDinscripcion`, `ID_Sede`, `Fecha`, `Hora`, `estado`) VALUES
(2, 'FT', '2020-03-03', '13:00', 'Activo'),
(3, 'SAFT', '2020-03-03', '13:00', 'Activo'),
(4, 'SSFT', '2020-03-03', '12:17', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcionreunion`
--

DROP TABLE IF EXISTS `inscripcionreunion`;
CREATE TABLE IF NOT EXISTS `inscripcionreunion` (
  `id_alumno` char(16) NOT NULL,
  `id_reunion` char(10) NOT NULL,
  `Horario` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `asistencia` varchar(15) NOT NULL,
  KEY `Fk_IdAlumnoR` (`id_alumno`),
  KEY `Fk_IdHorarioR` (`Horario`),
  KEY `Fk_IdReunionR` (`id_reunion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciontalleres`
--

DROP TABLE IF EXISTS `inscripciontalleres`;
CREATE TABLE IF NOT EXISTS `inscripciontalleres` (
  `ID_Alumno` char(16) DEFAULT NULL,
  `ID_Taller` char(10) DEFAULT NULL,
  `Asistencia` varchar(15) DEFAULT NULL,
  KEY `Fk_IdTaller` (`ID_Taller`),
  KEY `Fk_IdAlumno` (`ID_Alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripciontalleres`
--

INSERT INTO `inscripciontalleres` (`ID_Alumno`, `ID_Taller`, `Asistencia`) VALUES
('2015-SS-FT-1000', '0120030320', 'En espera'),
('2015-SS-FT-1000', '0120030349', 'Asistio'),
('2017-SA-FT-0036', '0120090375', 'En espera'),
('2017-SA-FT-0036', '0120160379', 'En espera'),
('2017-SA-FT-0015', '0120090375', 'En espera'),
('2017-SA-FT-0019', '0120090375', 'En espera'),
('2017-SA-FT-0028', '0120280363', 'En espera'),
('2017-SA-FT-0015', '0120160379', 'En espera'),
('2017-SA-FT-0052', '0120090375', 'En espera'),
('2017-SA-FT-0015', '0120230354', 'En espera'),
('2017-SA-FT-0052', '0120160379', 'En espera'),
('2017-SA-FT-0036', '0120230354', 'En espera'),
('2017-SA-FT-0052', '0120230354', 'En espera'),
('2016-SA-FT-027', '0120160379', 'En espera'),
('2016-SA-FT-027', '0120200339', 'En espera'),
('2017-SA-FT-0019', '0120160379', 'En espera'),
('2017-SA-FT-0034', '0120090375', 'En espera'),
('2017-SA-FT-0034', '0120160379', 'En espera'),
('2016-SA-FT-027', '0120230354', 'En espera'),
('2017-SA-FT-0019', '0120230354', 'En espera'),
('2017-SA-FT-0034', '0120230354', 'En espera'),
('2017-SA-FT-0035', '0120090375', 'En espera'),
('2017-SA-FT-0035', '0120160379', 'En espera'),
('2017-SA-FT-0035', '0120230354', 'En espera'),
('2017-SA-FT-0006', '0120090375', 'En espera'),
('2017-SA-FT-0006', '0120160379', 'En espera'),
('2017-SA-FT-0006', '0120230354', 'En espera'),
('2017-SA-FT-0049', '0120090375', 'En espera'),
('2017-SA-FT-0049', '0120160379', 'En espera'),
('2017-SA-FT-0049', '0120230354', 'En espera'),
('2017-SA-FT-0038', '0120090375', 'En espera'),
('2017-SA-FT-0038', '0120160379', 'En espera'),
('2017-SA-FT-0038', '0120230354', 'En espera'),
('2017-SA-FT-0002', '0120090375', 'En espera'),
('2017-SA-FT-0002', '0120160379', 'En espera'),
('2017-SA-FT-0002', '0120230354', 'En espera'),
('2016-SA-FT-053', '0120280363', 'En espera'),
('2017-SA-FT-0045', '0120200339', 'En espera'),
('2017-SA-FT-0045', '0120160379', 'En espera'),
('2017-SA-FT-0045', '0120230354', 'En espera'),
('2017-SA-FT-0031', '0120280363', 'En espera'),
('2017-SA-FT-0043', '0120090375', 'En espera'),
('2017-SA-FT-0043', '0120200339', 'En espera'),
('2017-SA-FT-0043', '0120230354', 'En espera'),
('2017-SA-FT-0005', '0120090375', 'En espera'),
('2017-SA-FT-0005', '0120160379', 'En espera'),
('2017-SA-FT-0005', '0120230354', 'En espera'),
('2017-SA-FT-0009', '0120200339', 'En espera'),
('2017-SA-FT-0009', '0120280363', 'En espera'),
('2016-SA-FT-048', '0120090375', 'En espera'),
('2016-SA-FT-048', '0120160379', 'En espera'),
('2016-SA-FT-048', '0120200339', 'En espera'),
('2017-SA-FT-0029', '0120200339', 'En espera'),
('2017-SA-FT-0029', '0120280363', 'En espera'),
('2017-SA-FT-0010', '0120280363', 'En espera'),
('2017-SA-FT-0030', '0120230354', 'En espera'),
('2017-SA-FT-0030', '0120090375', 'En espera'),
('2017-SA-FT-0030', '0120160379', 'En espera'),
('2017-SA-FT-0013', '0120090375', 'En espera'),
('2017-SA-FT-0013', '0120160379', 'En espera'),
('2017-SA-FT-0013', '0120230354', 'En espera'),
('2017-SA-FT-0014', '0120200339', 'En espera'),
('2017-SA-FT-0014', '0120280363', 'En espera'),
('2015-SA-FT-050', '0120090375', 'En espera'),
('2016-SA-FT-032', '0120230354', 'En espera'),
('2017-SA-FT-0056', '0120280363', 'En espera'),
('2016-SA-FT-032', '0120280363', 'En espera'),
('2016-SA-FT-032', '0120160379', 'En espera'),
('2017-SA-FT-0003', '0120090375', 'En espera'),
('2017-SA-FT-0003', '0120160379', 'En espera'),
('2017-SA-FT-0003', '0120230354', 'En espera'),
('2016-SA-FT-033', '0120200339', 'En espera'),
('2016-SA-FT-033', '0120280363', 'En espera'),
('2017-SA-FT-0039', '0120200339', 'En espera'),
('2017-SA-FT-0039', '0120280363', 'En espera'),
('2012-SA-FT-0048', '0120200339', 'En espera'),
('2012-SA-FT-0048', '0120090375', 'En espera'),
('2017-SA-FT-0041', '0120200339', 'En espera'),
('2017-SA-FT-0047', '0120160379', 'En espera'),
('2017-SA-FT-0047', '0120200339', 'En espera'),
('2017-SA-FT-0047', '0120280363', 'En espera'),
('2016-SA-FT-050', '0120090375', 'En espera'),
('2016-SA-FT-050', '0120160379', 'En espera'),
('2016-SA-FT-050', '0120230354', 'En espera'),
('2017-SA-FT-0050', '0120090375', 'En espera'),
('2017-SA-FT-0050', '0120230354', 'En espera'),
('2017-SA-FT-0050', '0120160379', 'En espera'),
('2017-SA-FT-0027', '0120280363', 'En espera'),
('2017-SA-FT-0027', '0120200339', 'En espera'),
('2017-SA-FT-0024', '0120280363', 'En espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `ID_Materia` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Alumno` char(16) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `grupoT` char(16) NOT NULL,
  `grupoL` char(16) NOT NULL,
  `estado` varchar(16) NOT NULL DEFAULT 'Proceso',
  PRIMARY KEY (`ID_Materia`),
  KEY `FK_Materia_Alumno` (`ID_Alumno`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_Materia`, `ID_Alumno`, `materia`, `grupoT`, `grupoL`, `estado`) VALUES
(8, '2017-SS-FT-1000', 'Programacion Orientada a Objetos ', '02T', '01L', 'Proceso'),
(9, '2017-SS-FT-1000', 'Sistemas de Plataformas Libres', '03T', '02L', 'Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `ID_Alumno` char(16) DEFAULT NULL,
  `ID_Materia` int(11) NOT NULL,
  `CicloU` int(11) DEFAULT NULL,
  `Year` year(4) DEFAULT NULL,
  `ComprobanteNotas` text DEFAULT NULL,
  KEY `FK` (`ID_Alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Remitente` char(15) NOT NULL,
  `Id_Receptor` char(15) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `idSolicitud` char(15) NOT NULL,
  `EstadoSolicitud` varchar(30) NOT NULL DEFAULT 'Enviado',
  `Estado` varchar(30) NOT NULL DEFAULT 'Sin revisar',
  `FechaHora` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`Id`, `Id_Remitente`, `Id_Receptor`, `Tipo`, `idSolicitud`, `EstadoSolicitud`, `Estado`, `FechaHora`) VALUES
(168, '306', '266', 'Cambio de estado', '20207528', 'Enviado', 'Sin revisar', '2020-02-24 17:26:12'),
(169, '149', '306', 'Cambio de estado', '20207528', 'Aprobado', 'Visto', '2020-02-24 17:26:29'),
(164, '270', '306', 'Desinscribirse', '20203533', 'Aprobado', 'Visto', '2020-02-24 16:49:24'),
(162, '270', '306', 'Horas de vinculacion', '20202738', 'Aprobado', 'Visto', '2020-02-24 16:45:27'),
(166, '270', '306', 'Desinscribirse', '20203843', 'Aprobado', 'Visto', '2020-02-24 16:50:29'),
(156, '149', '306', 'Cambio de estado', '20203356', 'Aprobado', 'Visto', '2020-02-24 16:20:27'),
(155, '306', '266', 'Cambio de estado', '20203356', 'Enviado', 'Sin revisar', '2020-02-24 16:19:29'),
(153, '149', '306', 'Cambio de estado', '20206245', 'Aprobado', 'Visto', '2020-02-24 16:15:40'),
(152, '306', '266', 'Cambio de estado', '20206245', 'Enviado', 'Sin revisar', '2020-02-24 16:13:52'),
(172, '621', '149', 'Cambio de estado', '20203782', 'Enviado', 'Sin revisar', '2020-04-02 14:26:15'),
(171, '149', '607', 'Cambio de estado', '20208914', 'Aprobado', 'Sin revisar', '2020-04-02 14:24:11'),
(173, '621', '302', 'Horas de vinculacion', '20203627', 'Enviado', 'Sin revisar', '2020-04-02 14:31:22'),
(174, '621', '681', 'Horas de vinculacion', '20203627', 'Enviado', 'Sin revisar', '2020-04-02 14:31:23'),
(175, '621', '149', 'Cambio de estado', '20201582', 'Enviado', 'Sin revisar', '2020-04-12 12:16:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivostaller`
--

DROP TABLE IF EXISTS `objetivostaller`;
CREATE TABLE IF NOT EXISTS `objetivostaller` (
  `IDobjetivo` int(3) NOT NULL AUTO_INCREMENT,
  `ID_Taller` char(10) CHARACTER SET latin1 NOT NULL,
  `Objetivo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDobjetivo`),
  KEY `FK_ObjetivosTaller` (`ID_Taller`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `objetivostaller`
--

INSERT INTO `objetivostaller` (`IDobjetivo`, `ID_Taller`, `Objetivo`) VALUES
(12, '0120030349', 'ya finalizamos ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

DROP TABLE IF EXISTS `reuniones`;
CREATE TABLE IF NOT EXISTS `reuniones` (
  `ID_Reunion` char(10) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `ID_Empresa` char(10) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `ID_Ciclo` char(10) DEFAULT NULL,
  `Estado` varchar(25) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `ComprobanteLista` varchar(100) NOT NULL,
  `ID_Sede` char(10) NOT NULL,
  PRIMARY KEY (`ID_Reunion`),
  KEY `Fk_IdEmpresaR` (`ID_Empresa`),
  KEY `Fk_IdCicloR` (`ID_Ciclo`),
  KEY `FK_SEDE` (`ID_Sede`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutasbuses`
--

DROP TABLE IF EXISTS `rutasbuses`;
CREATE TABLE IF NOT EXISTS `rutasbuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Alumno` char(16) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `costo` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `observaciones` varchar(30) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'Proceso',
  PRIMARY KEY (`id`),
  KEY `FK_rutabuse_alumno` (`ID_Alumno`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rutasbuses`
--

INSERT INTO `rutasbuses` (`id`, `ID_Alumno`, `ruta`, `costo`, `cantidad`, `total`, `observaciones`, `estado`) VALUES
(2, '2017-SS-FT-1000', 'ruta 44', 12, 2, 20, 'nada', 'Proceso'),
(3, '2017-SS-FT-1000', 'ruta 46 C', 0.25, 2, 0.5, 'NADA', 'Proceso'),
(4, '2017-SS-FT-1000', 'ruta 46 c avenida xd', 2, 2, 4, 'nada', 'Proceso'),
(5, '2017-SS-FT-1001', 'la ruta 44 hasta metro', 0.25, 1, 0.25, 'me pueda asaltar', 'Proceso'),
(6, '2017-SS-FT-1001', 'TRansporte de la u', 0.5, 1, 0.5, 'llegaba tarde', 'Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

DROP TABLE IF EXISTS `sedes`;
CREATE TABLE IF NOT EXISTS `sedes` (
  `ID_Sede` char(10) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_Sede`)
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

DROP TABLE IF EXISTS `solicitudcambio`;
CREATE TABLE IF NOT EXISTS `solicitudcambio` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_status` char(10) CHARACTER SET latin1 NOT NULL,
  `id_alumno` char(16) CHARACTER SET latin1 NOT NULL,
  `Comentario` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Comprobante` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Comentario2` text COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'En espera',
  `fechaFin` date NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `FK_status_cambio` (`id_status`),
  KEY `FK_alumno_cambio` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=20209822 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudcambio`
--

INSERT INTO `solicitudcambio` (`id_solicitud`, `id_status`, `id_alumno`, `Comentario`, `Comprobante`, `Comentario2`, `Fecha`, `Estado`, `fechaFin`) VALUES
(20208914, 'PDE006', '2015-SA-FT-012', 'He egresado de la carrera TÃ©cnico en DiseÃ±o GrÃ¡fico de Universidad Don Bosco, y actualmente, estoy en busca de mi primer empleo.', '20208914.pdf', 'hoola', '2020-04-02 20:24:11', 'Aprobado', '2019-11-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicituddesinscribir`
--

DROP TABLE IF EXISTS `solicituddesinscribir`;
CREATE TABLE IF NOT EXISTS `solicituddesinscribir` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` char(16) CHARACTER SET latin1 NOT NULL,
  `id_taller` char(10) CHARACTER SET latin1 NOT NULL,
  `comentario` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `comprobante` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Comentario2` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `FK_alumno_desinscribir` (`id_alumno`),
  KEY `FK_taller_desinscribir` (`id_taller`)
) ENGINE=InnoDB AUTO_INCREMENT=2020060102 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soliretiro`
--

DROP TABLE IF EXISTS `soliretiro`;
CREATE TABLE IF NOT EXISTS `soliretiro` (
  `Id_Soli` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Alumno` char(16) NOT NULL,
  `ID_Ciclo` char(10) NOT NULL,
  `ID_Materia` int(11) NOT NULL,
  `notaAcumulada` float NOT NULL,
  `Motivo` text NOT NULL,
  `Plan` text NOT NULL,
  `Comentario` text NOT NULL,
  `CartaRetiro` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'En espera',
  PRIMARY KEY (`Id_Soli`),
  KEY `FK_Retiro_Alumno` (`ID_Alumno`),
  KEY `FK_Retiro_Ciclo` (`ID_Ciclo`),
  KEY `FK_Retiro_Materia` (`ID_Materia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solitransporte`
--

DROP TABLE IF EXISTS `solitransporte`;
CREATE TABLE IF NOT EXISTS `solitransporte` (
  `ID_Slicitud` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Alumno` char(16) NOT NULL,
  `ID_Ciclo` char(10) NOT NULL,
  `Comentario1` text NOT NULL,
  `Comentario2` text NOT NULL,
  `comprobante` varchar(50) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'En espera',
  PRIMARY KEY (`ID_Slicitud`),
  KEY `FK_Transporte_Alumno` (`ID_Alumno`),
  KEY `FK_Transporte_Ciclo` (`ID_Ciclo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `ID_Status` char(10) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_Status`)
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

DROP TABLE IF EXISTS `tallercompetencia`;
CREATE TABLE IF NOT EXISTS `tallercompetencia` (
  `IDTaller_Competencia` int(3) NOT NULL AUTO_INCREMENT,
  `ID_Taller` varchar(10) CHARACTER SET latin1 NOT NULL,
  `IDComptenecia` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDTaller_Competencia`),
  KEY `Fk_Competencias` (`IDComptenecia`),
  KEY `FK_Taller` (`ID_Taller`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

DROP TABLE IF EXISTS `talleres`;
CREATE TABLE IF NOT EXISTS `talleres` (
  `ID_Taller` char(10) NOT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `ID_Formato` char(10) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `ID_Sede` char(10) DEFAULT NULL,
  `ID_Ciclo` char(10) DEFAULT NULL,
  `ID_Empresa` char(50) DEFAULT NULL,
  `ComprobanteLista` text DEFAULT NULL,
  `Estado` varchar(25) NOT NULL,
  `Cupo` int(10) NOT NULL,
  `lugar` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Taller`),
  KEY `FK` (`ID_Formato`,`ID_Sede`,`ID_Empresa`),
  KEY `FK_Taller_Sede` (`ID_Sede`),
  KEY `FK_Taller_Empresa` (`ID_Empresa`),
  KEY `Fk_IdCiclo` (`ID_Ciclo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`ID_Taller`, `Titulo`, `Fecha`, `Hora`, `ID_Formato`, `Rating`, `ID_Sede`, `ID_Ciclo`, `ID_Empresa`, `ComprobanteLista`, `Estado`, `Cupo`, `lugar`) VALUES
('0120030320', 'PresentaciÃ³n Sistema Workeys', '2020-03-03', '11:15:00', 'SITF', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Finalizado', 2, 'La libertad'),
('0120030349', 'Prueba ', '2020-03-03', '12:17:00', 'SITC', 0, 'SSFT', '01-2020', 'FGK', NULL, 'Finalizado', 2, 'La libertad'),
('0120090375', 'Foro: Ahorra o nunca', '2020-03-09', '11:00:00', 'SITF', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Activo', 20, 'UNICAES Aula B33 '),
('0120110311', 'CÃ³mo realizar un CV ganador', '2020-03-11', '11:00:00', 'SITL', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Inactivo', 40, 'Oportunidades '),
('0120160379', 'Honestidad e integridad', '2020-03-16', '11:00:00', 'SITT', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Activo', 19, 'UNICAES Aula B33 '),
('0120200339', 'OrganizaciÃ³n eficiente', '2020-03-20', '14:00:00', 'SITC', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Activo', 27, 'Oportunidades '),
('0120230354', 'Lenguaje corporal / Comportamiento en el trabajo', '2020-03-23', '11:00:00', 'SITC', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Activo', 20, 'UNICAES Aula B33 '),
('0120280363', 'Habilidades para la comunicaciÃ³n intercultural', '2020-03-28', '09:00:00', 'SITT', 0, 'SAFT', '01-2020', 'FGK', NULL, 'Activo', 26, 'Oportunidades ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `IDUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `correo` varchar(75) NOT NULL,
  `contrasena` varchar(75) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `conteo_entradas` int(5) NOT NULL DEFAULT 0,
  `ID_Sede` char(10) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `SedeAsistencia` varchar(40) NOT NULL,
  PRIMARY KEY (`IDUsuario`),
  KEY `FK_Usuario_Sede_idx` (`ID_Sede`)
) ENGINE=InnoDB AUTO_INCREMENT=686 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuario`, `nombre`, `correo`, `contrasena`, `imagen`, `conteo_entradas`, `ID_Sede`, `cargo`, `SedeAsistencia`) VALUES
(149, 'Daniel Márquez ', 'baltota46@gmail.com', '$2y$10$DFSrejwb.2Q2O0/FdvQJwebbgKQITwmEe/VfANtkmy3iZzvU59LKm', 'imgDefault.png', 1, 'SAFT', 'SuperUsuario', 'SAFT'),
(266, 'Tony Code Programador Elegante', 'vasquezanth@gmail.com', '$2y$10$IuckMonZXjXra.D4cfvEPuzwlG/q2K.0m2qFycM6rZGWluIZoyTKO', 'imgDefault.png', 1, 'SSFT', 'SuperUsuario', 'SSFT'),
(267, 'SuperVV', 'vasquez@gmail.com', '$2y$10$IuckMonZXjXra.D4cfvEPuzwlG/q2K.0m2qFycM6rZGWluIZoyTKO', 'imgDefault.png', 1, 'SSFT', 'SuperVisor', 'SSFT'),
(268, 'talleres', 'talleres@oportunidades.org.sv', '$2y$10$hzxKYOXbrUSk/lW25DXwAegtxlSnW7.MS9y0bkVC/UHsuiH9N.zAa', 'imgDefault.png', 1, 'SAFT', 'Coach Talleres', 'SAFT'),
(270, 'pasante', 'pasante@oportunidades.org.sv', '$2y$10$DFSrejwb.2Q2O0/FdvQJwebbgKQITwmEe/VfANtkmy3iZzvU59LKm', 'imgDefault.png', 1, 'SSFT', 'Auxiliar', 'SSFT'),
(302, 'reunion', 'reuniones@oportunidades.org.sv', '$2y$10$DFSrejwb.2Q2O0/FdvQJwebbgKQITwmEe/VfANtkmy3iZzvU59LKm', 'imgDefault.png', 1, 'SAFT', 'Coach Reuniones', 'SAFT'),
(303, 'WorkeysPasante', 'certificacionfgk@gmail.com', '$2y$10$o5abpYwN38owf4AYgjjpW.e79IckNQi6f.8hX1aJHktOp8IVS8Ne6', 'imgDefault.png', 1, 'SSFT', 'Auxiliar', 'SSFT'),
(304, 'WorkeysPasanteSA', 'certificacionfgk.santaana@gmail.com', '$2y$10$XUIFIfprQI7KYO5TvqVIP.q4F2dMqOKkpyj5M3wL06XDl/.6.RTiO', 'imgDefault.png', 1, 'SAFT', 'Auxiliar', 'SAFT'),
(311, 'Wendy Marielos Alvarado GarcÃ­a', 'wendy.alvarado@oportunidades.org.sv', '$2y$10$PFUEjSBQK0kvc6LpwwgCQukzx7xPpkZ09p.0ri3oisn285mRz7Bye', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(312, 'Magerly EpifanÃ­a Avelar Avelar', 'magerly.avelar@oportunidades.org.sv', '$2y$10$Gf4djWcgbZKx.14YJjebi.muOXyVZuozaNv2qiiPTOTs38/JF5sNK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(313, 'Odalis Alexandra Barillas GarcÃ­a', 'odalis.barillas@oportunidades.org.sv', '$2y$10$M63e6.8vGVu8yKBjDA3aGum/zYQNpaU.pKPyH.YvWxC2keraTLdFG', 'img313.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(314, 'JosÃ© Efrain CalderÃ³n Calasin', 'jose.calderon@oportunidades.org.sv', '$2y$10$Ai/TzYxCUgKM9cLipAEi7.G5CedR5RfW./OPgBtyjKmMohG5GAnPW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(315, 'Ronald Alexis CalderÃ³n Flores', 'ronald.calderon@oportunidades.org.sv', '$2y$10$EVmEZ92tRWd.kbGzFv49neNIjoFhOqkJNkE0gjOoYkJ3In84hAQUa', 'img31583855.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(316, 'Wilber Antonio Candelario Contreras', 'wilber.candelario@oportunidades.org.sv', '$2y$10$LXAo7u.6D2/E/k4lxoNAcOmDsSs1tbw8GOTquBH0c1HrIithiPG2S', 'img31674648.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(317, 'Mayra Elizabeth Centeno AlarcÃ³n', 'mayra.centeno@oportunidades.org.sv', '$2y$10$7dngB/yaq9QEGxnBV8QSMubSHVg5MbrTI191vKkqVoiscuzXlitMW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(318, 'CaÃ­n de JesÃºs Cerna Nerio', 'cain.cerna@oportunidades.org.sv', '$2y$10$pcExlO8fmaTxGyAnTxW8G.Z6jjAS.csuzJRe22X.tkfSdS6l8tUj2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(319, 'Jacqueline Emperatriz Cubas Depaz', 'jacquelinne.cubas@oportunidades.org.sv', '$2y$10$Zt1cok5p7GpV7eNx3Sgir.Q.7rp6UCT0IW1jn3qNKU.uOlB5emU2W', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(320, 'Magaly Sthephany Flores Arriola', 'magaly.flores@oportunidades.org.sv', '$2y$10$/AT2w7NrxULvmjJTOrmkZO6MFvquEeLra01u/uL7qoWU5mH1Bg8Dq', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(321, 'Angela Gabriela GarcÃ­a Pichinte', 'angela.garcia@oportunidades.org.sv', '$2y$10$Xd2G4C6j2uZCM.61NpmZQeYmtWJcc7MwL/EWx8UGNHkHRDYFiWcry', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(322, 'Kevin JosuÃ© GÃ³mez Melgar', 'kevin.gomez@oportunidades.org.sv', '$2y$10$5RranSvOy2zic0i2H4HPR.tyCzm7M3Ye/7D/fetVjXXIV4j1vLpIW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(323, 'Lizbeth Beatriz GonzÃ¡lez ArdÃ³n', 'lizbeth.gonzales@oportunidades.org.sv', '$2y$10$TwwC50xTNcOMvDqZR1fhT.28NB1uk9jBS5KrcDMxI9daOo0TfMmjm', 'img32353927.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
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
(340, 'Nancy Gabriela PÃ©rez Ãlvarez', 'nancy.perez@oportunidades.org.sv', '$2y$10$5IWhMd/HK4Vwt/P/1.12buV6Emm7GBWwCQRv93YisaJNJrHhQ/ENq', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
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
(351, 'Andrea MarÃ­a JimÃ©nez VelÃ¡squez', 'andrea.jimenez@oportunidades.org.sv', '$2y$10$Ox9EsYb0A3gA3iSegOYtROdML3k1vycmrYDjmc8HszoL1YewonUye', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(352, 'Aracely AbigaÃ­l Escobar LÃ³pez', 'aracely.escobar@oportunidades.org.sv', '$2y$10$dsak85Gam/KkJ2hsuqzoFex5Hcp2Z3Q9hXswr.1C3q8bJRCDJm2be', 'img35270683.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(353, 'Blanca Paola Rosales Valdez', 'blanca.rosales@oportunidades.org.sv', '$2y$10$SptVJg6br7QccAAnTNFPPOfsFSJ3jt6UCMyQHqJs6jD0HQOYjIdHO', 'img35338194.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(354, 'Brandon IsaÃ­ Cruz Escobar', 'brandon.cruz@oportunidades.org.sv', '$2y$10$gr.nu.Sy7GxuW.nXp61PLuCZxDrCR7aEkJ7AxslPkwVo1WgW309qG', 'img35462170.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(355, 'Carlos Enrique Posada Grande', 'carlos.posada@oportunidades.org.sv', '$2y$10$5sltxPTrStMG9vLretbblOnXBOkks7h4w5WmUHB9DqDVhgah2V5Ai', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(356, 'Cecilia Gabriela Salazar Ruiz', 'cecilia.salazar@oportunidades.org.sv', '$2y$10$U13YPv.bPJbZuyO.akDIze99TNRXwkvUAXUqzg33RZDHTWZ1HwV9G', 'img35695864.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(357, 'Daniel Orlando MartÃ­nez GutiÃ©rrez', 'daniel.martinez@oportunidades.org.sv', '$2y$10$fvXm42qwDnzIxS63hZImmOyjv8hPw0gQ05RiJDvnaGQD4/xaG8YC2', 'img35729836.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(358, 'Daniel Vladimir SolÃ­s MarroquÃ­n', 'daniel.solis@oportunidades.org.sv', '$2y$10$U3RnZqStZSCTc0a6yXHe0OLLBSvmEkCS6nOnHTnpZw7w57sHl/LCW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(359, 'Diego Ernesto GÃ³mez MartÃ­nez', 'diego.gomez@oportunidades.org.sv', '$2y$10$oFk7pwyjTGonH2j5KRhU.uZn05AYIDeO7dpL6ToH0.8d78Ych315C', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(360, 'Diego EsaÃº HernÃ¡ndez MagaÃ±a ', 'diego.hernandez@oportunidades.org.sv', '$2y$10$4saLcByo2STqbLUHfi1EhOC//NmTIXurZHx.LH/njoN7lbynfEUti', 'img36073081.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(361, 'Douglas Omar VÃ¡squez Tobar', 'douglas.vasquez@oportunidades.org.sv', '$2y$10$9C8rZILE/HXhO0sZdsQ9COtUgqmSDpulHsgVfcEzQz6X62.XdVVZq', 'img36134420.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(362, 'Emely Dayana GonzÃ¡lez DueÃ±as', 'emely.gonzalez@oportunidades.org.sv', '$2y$10$Up.k2H643P4zMgNgsU/Kvu/p1PV/NUK15MJq.d5bNeJC6qd6qmvL6', 'img36274611.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(363, 'Emerson AdriÃ¡n MartÃ­nez MartÃ­nez', 'emerson.martinez@oportunidades.org.sv', '$2y$10$.EfAgl/nF5yRt/E1UIvCo.Oi98rSWFFS63Pxfwga/oRK9Bgq/k2oK', 'img36393328.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(364, 'Erika LucÃa RamÃ­rez VÃ¡zquez', 'erika.ramirez@oportunidades.org.sv', '$2y$10$T0zLi1dAxDI4e27wzxVOJebTFL5ii20ziraUrm6j/ojE0qPVG1zmy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(365, 'Ernesto JosÃ© Padilla Cerna', 'ernesto.padilla@oportunidades.org.sv', '$2y$10$cOs99b5cQCwyYnH9J60IHOYjVWFxKdESqeD6KdAmmIkUvQjruST1u', 'img36557736.png', 1, 'SAFT', 'Estudiante', 'SAFT'),
(366, 'FÃ¡tima Lourdes Choto MartÃ­nez', 'fatima.choto@oportunidades.org.sv', '$2y$10$lQ62p96pqPtIivWCmNmgpOGRQtfl65vIbHZ4APMQq8fy2qJ7CV.Ky', 'img366.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(367, 'Gabriela Michelle HernÃ¡ndez HernÃ¡ndez', 'gabriela.hernandez@oportunidades.org.sv', '$2y$10$hjK0E/n2hbLLba1JOLoNoer8yHbuuhog3mAUYJFet33rgnBEEHnxG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(368, 'Gerardo Javier Barillas  HernÃ¡ndez', 'gerardo.barillas@oportunidades.org.sv', '$2y$10$F4w7eQHi5jyVlCCnQB5ObOfXF/JibYaFLZ0tMW81GEkBowVs.WNvi', 'img36868826.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(369, 'IsaÃ­ Natanael GonzÃ¡lez Ãlvarez', 'isai.gonzalez@oportunidades.org.sv', '$2y$10$WpivnpstIre9W.JaoM4/7uYBwH4MQbLYJNMDFdGjo6z8kwVjzy/MG', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(370, 'Jairo Oswaldo VÃ¡squez MartÃ­nez', 'jairo.vasquez@oportunidades.org.sv', '$2y$10$veI2N3yiA1BO8dB1f1J4puqcSzePAky.WVf2F8dftvsKEFIDhJrfy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(371, 'Jeaqueline Rosalba Jacobo GarcÃ­a', 'jeaqueline.jacobo@oportunidades.org.sv', '$2y$10$c9lukik1Kqfm08P1sWXHLe54kMUfUSs1tcyNqTvoLq0RgQ8iXJI.G', 'img371.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(372, 'Jennifer  Xiomara Samayoa MorÃ¡n', 'jennifer.samayoa@oportunidades.org.sv', '$2y$10$vKnWatyFCRrMZQS04jsruefLStCBymhjtQ5xMuV3c/ksI0z9JNOBO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(373, 'Jennifer Liliana Mata CÃ¡ceres', 'jennifer.mata@oportunidades.org.sv', '$2y$10$Qjvm2ICwEEZLTEukUR0mteIou28z8dLPtghbCRtJA9VrwAw830kfO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(374, 'Jessica Maricela ChÃ¡vez GarcÃ­a', 'jessica.chavez@oportunidades.org.sv', '$2y$10$XWCyi3hgelh1nwZ8BQDrc.8OEn4kk2BYO859jx6DTS4JDC/cWVYs.', 'img37446543.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(375, 'Juan JosuÃ© Melgar HernÃ¡ndez', 'juan.melgar@oportunidades.org.sv', '$2y$10$f.RmzlWUZnrNjoCOnFONj.FlFoBqVWnVcXLeO4YbwSmsGDitVf8FW', 'img37527941.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(376, 'Julissa Michelle MorÃ¡n Ortiz', 'julissa.moran@oportunidades.org.sv', '$2y$10$s0DKGkgd6iLKASisDhPrTOJFc21ap1N7k0hD7fO1HKVxtAkkHfcBK', 'img37615181.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(377, 'Karen Andrea LÃ³pez MagaÃ±a', 'karen.lopez@oportunidades.org.sv', '$2y$10$A9os7TjfK2.zMyLTbRE2SOEoIv5U6s9QVrXKtEW4agkT4JFY8wyJ.', 'img37723710.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(378, 'Karen Beatriz Mata SÃ¡nchez', 'karen.mata@oportunidades.org.sv', '$2y$10$AFGwL6V24IWAHaGsUFypl.hCjQiJQJYOIqWSB2X3bLf8snDTIs282', 'img37843935.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(379, 'Karen Elizabeth Ramos Cienfuegos', 'karen.ramos@oportunidades.org.sv', '$2y$10$fjyKgtxZ8LDlBcG7r8tNiuJ2fp.Cqm3mg0Vle6UR0zrf7RL2yuCa2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(380, 'Karla Tatiana GarcÃ­a Liborio', 'karla.garcia@oportunidades.org.sv', '$2y$10$FnnN2vTmpxTBswS5mdUdP.6hav0LdQQhXWRq5qvxzrNDfTQsUe6dK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(381, 'Katherine Lisseth Asencio Castaneda', 'katherine.asencio@oportunidades.org.sv', '$2y$10$YLNZzVD8080LWYE2bcNMVOAkWCeZKKtlrl5oQjbYNAVuUt9xiSPXq', 'img38198666.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(382, 'Katherine Michelle Latin Guardado', 'katherine.latin@oportunidades.org.sv', '$2y$10$ir/AmvS2KVf2I3bUSYcq8edpwVsamlI/1mP.BEh.7xVdw/U9X6FTK', 'img38263110.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(383, 'Katherinne Esmeralda ChÃ¡mul Pacheco', 'katherinne.chamul@oportunidades.org.sv', '$2y$10$yTUkmtTSuFh/K4FeJrFD4egkRhnm737vUIXkZYNQ329PBqcxU2B4W', 'img38312156.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(384, 'Katherinne Maritza Guevara GonzÃ¡lez', 'katherinne.guevara@oportunidades.org.sv', '$2y$10$TU/MoawEP9mUPF.RHpGhPOITIXJHwa8ncTzjsU6OQzVhOVWp2z7f2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(385, 'Kevin Enrique HernÃ¡ndez MorÃ¡n', 'enrique.hernandez@oportunidades.org.sv', '$2y$10$vfKtMAB4WcSdFEfjqqBkF.uhxQku90uQbhwDeRkuKXVnJ4sL5eXv2', 'img38576338.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(386, 'Kimberling Elizabeth RamÃ­rez Santos', 'kimberling.ramirez@oportunidades.org.sv', '$2y$10$QsqJS7JhSm8QHjRPHd.HAeD.bXEUAqZsRJADaITUg8EU2icczsPsO', 'img38676182.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(387, 'Krissia Vanessa Ortiz Alas', 'krissia.ortiz@oportunidades.org.sv', '$2y$10$bnxwlgK02XgEX/8LDc1.N.u23/APvzMPwefVp4JPTg0wq.X.ifSxy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(388, 'Leslie JazmÃ­n GarcÃ­a PÃ©rez ', 'leslie.garcia@oportunidades.org.sv', '$2y$10$vPG3fBfkb22oKB2X4QLm2.s7.oAzQFTn8onZeZl2dT9JWkBefGN4a', 'img38864395.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(389, 'Lineth Verenice Mena CuÃ©llar', 'lineth.mena@oportunidades.org.sv', '$2y$10$o/1aNjNDnIqioVDME0OId.AVwt7oIepb2IPtcyO2ARYRxTPQlkhSe', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(390, 'Luis  Enrique VÃ¡squez Aquila', 'luis.vasquez@oportunidades.org.sv', '$2y$10$s3RAPoHabVo240MR1lj25.bB90/a2t1c6JQlnAAbHnuGk6fpMZU.m', 'img39055612.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(391, 'MarÃ­a de los Ãngeles CanizÃ¡lez Toledo', 'maria.canizalez@oportunidades.org.sv', '$2y$10$VIcamrc4SiSuf5fckcLthO0xiBNDx8K5Qn8fLNlEFse0mtzigbFC.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(392, 'Mauricio Eduardo MenjÃ­var Escobar', 'mauricio.menjivar@oportunidades.org.sv', '$2y$10$/K/AxfG8Ste7BtPv5y9M.u2VcQfaaKOX12neF9nPduaVdOEEskSNO', 'img39218632.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(393, 'Mayra Noelia GonzÃ¡lez Monterroza', 'mayra.gonzalez@oportunidades.org.sv', '$2y$10$4kmqPFsvKXE3InqbeKTKo.afFhV7OsvwVK4epMgvvr7v8EGquDuGy', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(394, 'Nayeli Michelle MÃ©ndez Cincuir', 'nayeli.mendez@oportunidades.org.sv', '$2y$10$ZMB9PBnL/YFTTVTaYVsjdeea7PlqXs0pCm6eOhmPNx4iCNap.KXuq', 'img394.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(395, 'Oscar Enrique Hidalgo Zelaya', 'oscar.hidalgo@oportunidades.org.sv', '$2y$10$WdkFOeIo3MQ/FPU2iRGokuJVZFW1VUw2d7g.DQiPEl.bGxzAw5ONu', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(396, 'Paola Andrea HernÃ¡ndez Flores', 'paola.hernandez@oportunidades.org.sv', '$2y$10$LXRl9dmug5eB3VpmegxcSewhcvUncN0Twksid8Gbd6VDJSpctVJGm', 'img39635168.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(397, 'Paola Nicolle ChÃ¡vez BaÃ±os', 'paola.chavez@oportunidades.org.sv', '$2y$10$vtZrNFSWwgdvfAThO3uv3eycYJmkiruiRo/KHRwlxS85UiFWcgKIe', 'img39725693.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(398, 'Rebeca Ester GarcÃ­a Moreno', 'rebeca.garcia@oportunidades.org.sv', '$2y$10$jzuT.RZLuFscFr9ZTpF2n.Rca5OG6iGXIdDPfMzfuufiJxLqsISu2', 'img39852346.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(399, 'Rodrigo JosuÃ© PÃ©rez DÃ­az', 'josue.perez@oportunidades.org.sv', '$2y$10$U0XnkYrnAojueC9Aqr61/eLYxeCvdQMkGwDkF720.1p5ElmzzMi0S', 'img39994527.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(400, 'Sara AbigaÃ­l Villeda Escamilla', 'sara.villeda@oportunidades.org.sv', '$2y$10$KyuHsk.8BjP7jzRVPAKVsesVs31kO4H1POPoTSGhsSECaVpvS0kzm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(401, 'Tatiana AbigaÃ­l Alvarado Tejada', 'tatiana.alvarado@oportunidades.org.sv', '$2y$10$hxHr60Yb3a7k1kz5bzpaNOPtu.dVvICQ.a7MzxppJgS.sLz6jP/Bi', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(402, 'Vanessa Johanna Morales MorÃ¡n', 'vanessa.morales@oportunidades.org.sv', '$2y$10$pT11wFcCTHklK/FMcCEqqemXgLWhPrroTgX0agAhjyJ4csFKiZkre', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(403, 'Walter Alonso Cruz Galicia', 'walter.cruz@oportunidades.org.sv', '$2y$10$L3GV01vhkZL40JqCxXKzfe.ea0wMKpLPsUyxFQZ.9.wzg2zSJezF6', 'img40379019.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(404, 'Walter Ernesto Funes SÃ¡nchez', 'walter.funes@oportunidades.org.sv', '$2y$10$lImfeNrVrsResH9jFtgbSO9.80O2u5c08X.CKvk5rOacr8TmELsVm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
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
(418, 'Gloria Maria Agreda Castro', 'gloria.agreda@oportunidades.org.sv', '$2y$10$pKJ0nW.uBYUsznFdLZHZSOV6WnBSEWDD9r3lXK2Kak3vodH211vSW', 'img41851675.jpeg', 0, 'SAFT', 'Estudiante', 'SAFT'),
(419, 'Doris Jeannette Granados Granados', 'jeannette.granados@oportunidades.org.sv', '$2y$10$BHNJxKZBbYTBl8lEAylOOOdsXAQr/sejq0Qca8/sSaS84V0vJZfpa', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(420, 'Jose Mauricio Gudiel Rodriguez', 'mauricio.gudiel@oportunidades.org.sv', '$2y$10$s9PjizG/PFfWnVqQLR9PMu0m3r/Grz/Y4kgf8G7zvhayq5xMxV8/O', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(421, 'Alberto Ernesto Hernandez Moran', 'alberto.hernandez@oportunidades.org.sv', '$2y$10$VKqYuZoDdMxGmU2WrPB8DO982aUVDqgFzQWjSclM85Zq/vaXhOvga', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(422, 'Vanessa sarai MagaÃ±a Navas', 'vanessa.magana@oportunidades.org.sv', '$2y$10$wQZPad.6IAGNlT5/D0Z/4uHzYUdnVzB5iI7b7jw7OB/nrd7SSpiae', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(423, 'Juan Carlos Menendez Zelada', 'juan.menendez@oportunidades.org.sv', '$2y$10$EyAK2R2kKHESOjCN41w2Y.ortFMU7fTtVhHJQ5.BWY0lEhbCaUsAW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(424, 'Irving Alberto Olmedo Jaco', 'irving.olmedo@oportunidades.org.sv', '$2y$10$CpqEYkh96/tugxXmXicjM.F6hvl5ehFUDkmIGqrH5nHi3rZv8X7C2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(425, 'Monica Raquel Orantes Flamenco', 'monica.orantes@oportunidades.org.sv', '$2y$10$PY3Hd8gsE3ISYCbKhe8tdOGelMzQk9wQJPhJi1Qjv7suJXSY4i5QC', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
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
(517, 'Orfa Noemy Heredia UmaÃ±a', 'orfa.heredia@oportunidades.org.sv', '$2y$10$BI0.dmU6ljBanhI/xYCVX.n7zExVXdFxebi3GnWg7j5eIJeX1ya4q', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SASAT'),
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
(562, 'Glenda Patricia Rivera Recinos', 'glenda.rivera@oportunidades.org.sv', '$2y$10$T90iEL7YQ3ug.Ri7wzQvBezm6eyZhJD0wUgqRxmn8mCsoV4LWACbu', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(563, 'Diana Esmeralda Rosales Alvarado', 'diana.rosales@oportunidades.org.sv', '$2y$10$IfBdVhF6VVA6n7yRikqnFOm5q6qZIEO.oDpGtw6LCMk7q3C65ROrm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT');
INSERT INTO `usuarios` (`IDUsuario`, `nombre`, `correo`, `contrasena`, `imagen`, `conteo_entradas`, `ID_Sede`, `cargo`, `SedeAsistencia`) VALUES
(564, 'Kimberly Angelica Rosales Portillo', 'kimberly.rosales@oportunidades.org.sv', '$2y$10$hyOX.ZPXV5atL704rmbka.INvMGFPR.avPqzURvYgFw6BIgkGYh7.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(565, 'Antonio Adolfo RuÃ­z Rivas', 'antonio.ruiz@oportunidades.org.sv', '$2y$10$uEvbFBlviZyfxZoB5HMnXOFI7gVawjJPvAfdQSJ1NLg8ICQelfDKe', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(566, 'Kevin Gustavo Santillana GuillÃ©n', 'kevin.santillana@oportunidades.org.sv', '$2y$10$qeYAX10D20pF4P.pSAXueeKdpvRiHN5SY5suVZpykfuuOU5YgB0lm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(567, 'Josseline SaraÃ­ Tobar Perdomo', 'josseline.tobar@oportunidades.org.sv', '$2y$10$KFfat8IQN40km1YGw6IoreyRQUnXLut2esTIqAU/m651q/QP8YJCW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(568, 'Jorge Adalberto Vallecios Lico', 'jorge.vallecios@oportunidades.org.sv', '$2y$10$.R1xIhoW3.n7GJCDwo15wuoAZ/I2H4rRj94sADV8aHa/ISDBaYdpW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(569, 'Mario Arnoldo Zepeda SolÃ­s', 'mario.zepeda@oportunidades.org.sv', '$2y$10$NXMOpugLj9mlKed061X6s.0Hn1VjRjQ7rybaRzuuxDv4iKYrfnDDi', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'AHSAT'),
(570, 'Milagro Guadalupe Agreda MagaÃ±a', 'milagro.agreda@oportunidades.org.sv', '$2y$10$F89T3bstahfOfGWfeNcqQOAe2PpkVG45yroZX2iq5CuXDDpWm3OL2', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(571, 'Julio Eduardo Aguilar GarcÃ­a', 'julio.aguilar@oportunidades.org.sv', '$2y$10$oMIJ.JPk5CIx5LjjPLT5f.SRgxAk0L2WR19xwPMpx4QLigKvoqK8K', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
(572, 'Yensi Yamileth Aguirre GonzÃ¡lez', 'yensi.aguirre@oportunidades.org.sv', '$2y$10$usmWC7ow4ki7HrbSnYs4MeSN2lqOA5vGd6ctVOYa7Q.2rPKK.DKtK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
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
(584, 'Pablo AdÃ¡lid IbÃ¡Ã±ez MenÃ©ndez', 'pablo.ibanez@oportunidades.org.sv', '$2y$10$4ayVyHebv9lqS5lp46CaxeOaAD.nn8bRN5TCR2tLCMWxB1jzpOY5K', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'AHSAT'),
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
(601, 'Wilber Samuel Rivera ChÃ¡vez', 'wilber.rivera@oportunidades.org.sv', '$2y$10$IKXr8/S4l7VEvvl8zzf7lePyq9VBbwNMxVlJI62hnWGjp1v9Nk5tm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(602, 'Adriana JazmÃ­n HernÃ¡ndez Retana', 'ana.retana@oportunidades.org.sv', '$2y$10$1185PhBW1QdqdzL/AH/fleXOwuKgQ2b/8ft6q9BfLtiKSmVO/tjw.', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(603, 'Alba NoemÃ­ Escobar MancÃ­a', 'alba.escobar@oportunidades.org.sv', '$2y$10$Ck4lNCV7oExLJY8Hhg4M0e2sl1mCXoU/Z2Hq5qjbE4lYQiipJuCmW', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(604, 'Amy Stephanie Calidonio MejÃ­a', 'amy.calidonio@oportunidades.org.sv', '$2y$10$PEjWZu/DhOVw1l5GnI7bneQsV/TkYYV/1C7fDs7BwfeRqga8bBZ26', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(605, 'Ana Gabriela Hernandez Alvarado', 'ana.hernandez@oportunidades.org.sv', '$2y$10$ybaovahnwZr/i/zU42iz8./fVaitolCYLqyW39IM8.718iJgVXHKW', 'img60564812.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(606, 'Birnny Nicolle Mata ArÃ©valo', 'birnny.mata@oportunidades.org.sv', '$2y$10$uTip0I1O9oN64lLDwmGsUe8/0LRB43scVg3DXqC59F./xw3B7.RKK', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(607, 'Brandon Alfonso Valencia Rivera', 'brandon.valencia@oportunidades.org.sv', '$2y$10$cYQ73EIM/V7Go41.RE1ZNuEVAQH7hcp7f.lCP07A8yJByNYalK5xy', 'img60784329.jpeg', 1, 'SSFT', 'Estudiante', 'SAFT'),
(608, 'Daniela Alejandra Nolasco HernÃ¡ndez', 'daniela.nolasco@oportunidades.org.sv', '$2y$10$EoU/TgJiWBd5lWZ/9nBKtOJO6tVOgohnUOUzGtjKibiAZ1BxywIfm', 'img60827146.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(609, 'Daniela de los Ãngeles Guevara MÃ¡rtir', 'daniela.guevara@oportunidades.org.sv', '$2y$10$Th/snOkapby15aFwGpf/nOfAHBXgh8mZKeQoA2ObQ10Iwiy8bClQe', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(610, 'Diego JosÃ© NÃºÃ±ez Salazar', 'diego.nunez@oportunidades.org.sv', '$2y$10$7g6MMrwRm7d1vBKovQPI4Ov5G4cohIq62l0Cuh.sjbHFX6WkSYONe', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(611, 'Donald Alexis Medina Montero', 'donald.medina@oportunidades.org.sv', '$2y$10$VAPLMB.vQnt6zTHCZHC6wOZXHmqDnWeqo6SGqwaGCAOWyxKo9ZwSG', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(612, 'Douglas Alberto Aguilar CaÃ±as', 'douglas.aguilar@oportunidades.org.sv', '$2y$10$TalUhIj.IUILNikou1gC3.YqASUpPvp9pEKJPmCQJ7LMH/6PfMu72', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(613, 'Douglas Daniel EmÃ©stica', 'douglas.emestica@oportunidades.org.sv', '$2y$10$jQibxSUwhh4DOKwXQaQzb.URZMFIMRS0Q3XjUfTOC2SpT2Pu8dnhO', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(614, 'Erika Alejandra Ruano Rivera', 'erika.ruano@oportunidades.org.sv', '$2y$10$2DrPLCK2iCSeAl0fxJAzhufO4iIUCnTT7BZRmUqjfLd24WT4d9C72', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SAFT'),
(615, 'Ever JosÃ© Guerra Maldonado', 'ever.guerra@oportunidades.org.sv', '$2y$10$XY9nfqH0aTWL.q3a9OMvPuIFO8KIE3jfypNHmr78EebVfnKTK3rJS', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(616, 'FÃ¡tima QuerÃ©n MartÃ­nez LÃ³pez', 'queren.martinez@oportunidades.org.sv', '$2y$10$OwLp.0aV5ZEh5ZhAozMd..PahGFJbQrByLgIWade7Lk1jUjjJ2mmm', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(617, 'Fernanda Gisselle Salinas VÃ¡squez', 'fernanda.salinas@oportunidades.org.sv', '$2y$10$cJWVy9mjeHI3BqBn0FWL1OuymX6kVCQKB1XWfUGXofSwa.2Y/3UBG', 'img617.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(618, 'Jairo JosuÃ© Agreda Tesorero', 'jairo.agreda@oportunidades.org.sv', '$2y$10$yjC/NYHJV/WPafzWhFXXVuwgA.pijDIAFWBF8VwgaRN58wykbUXau', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
(620, 'SuperUsuarioSS', 'root@oportunidades.org.sv', '$2y$10$DFSrejwb.2Q2O0/FdvQJwebbgKQITwmEe/VfANtkmy3iZzvU59LKm', 'imgDefault.png', 1, 'SSFT', 'SuperUsuario', 'SSFT'),
(621, 'Joel SalomÃ³n Castillo MÃ¡rquez', 'joel.castillo@oportunidades.org.sv', '$2y$10$Yg92M3A3Za0Lj8vZ3LF6aek/.3TWrLDvR64LwGFvEpu6G310C01Ci', 'img62180745.jpeg', 1, 'SAFT', 'Estudiante', 'SAFT'),
(622, 'Daniel Marquez', 'daniel.marquez@oportunidades.org.sv', '$2y$10$DFSrejwb.2Q2O0/FdvQJwebbgKQITwmEe/VfANtkmy3iZzvU59LKm', 'img62278358.jpeg', 1, 'SAFT', 'Estudiante', 'SSFT'),
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
(634, 'Ileana Abigail Gomez Zepeda', 'iliana.gomez@oportunidades.org.sv', '$2y$10$bcRu9aon7NQWgQalnT09Eu0cS/unpYPtiD8n7NNC4OYNUkTXEDbk6', 'imgDefault.png', 0, 'SAFT', 'Estudiante', 'SAFT'),
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
(681, 'Rogelio Gonzalez', 'rogelio.gonzalez@oportunidades.org.sv', '$2y$10$jatDiHyFIVWO08na63ZiyO/.Oc5TgSoHZgA95n1SvvuozDRoAXb3K', 'img68120608.jpeg', 1, 'SAFT', 'Coach Reuniones', 'SAFT'),
(682, 'Miguel Carrillo', 'miguel.carrillo@oportunidades.org.sv', '$2y$10$4.P2nAgK..QWBiJB65POwe35kyhfznv8vLOktN547kQcU84RNxlNm', 'img68217129.jpeg', 1, 'SSFT', 'Estudiante', 'SSFT'),
(683, 'Francisco Rivas', 'francisco.rivas@oportunidades.org.sv', '$2y$10$hHIxfN2W5J9okuhM2wCOfOVFGtP0QNPhq/AMFx3lafh9IEe8P011i', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(684, 'Gabriela Moreno', 'gabriela.moreno@oportunidades.org.sv', '$2y$10$EUe0qwt7l2/dVyDyU7MEru4qlbBmJVbqoqjer10ouq8rXwxNhRi.6', 'imgDefault.png', 0, 'SSFT', 'Estudiante', 'SSFT'),
(685, 'Paola Estefany Martínez Ortiz', 'paola.martinez@oportunidades.org.sv', '$2y$10$xvArsIkrFeEVUcWoTcVPeOEVMYGCDuIuXoTSdVKV.iJh4j7KUDwvm', 'imgDefault.png', 0, 'SSFT', 'SuperUsuario', 'SSFT');

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
