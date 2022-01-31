-- Script de creación de bases de datos para MySQL/MariaDB

DROP DATABASE IF EXISTS ud3_balance;


CREATE DATABASE ud3_balance;


-- -------------- UD3: balance ----------------------- --

USE ud3_balance;

-- Pon aquí tus CREATE TABLE, INSERT INTO y restricciones necesarias.

-- ================================================================== --
-- ------------------------------- usuario ------------------------------ --
-- ================================================================== --
DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ;
;



LOCK TABLES `usuario` WRITE;

INSERT INTO `usuario` VALUES (3,'usuario@gmail.com','$2y$10$dk3KxDifl8dGWUSiLcEkcuef17bFjMHIOeV6ErveC/TYoVQEC4fQi',1,'Paco'),(4,'carlos@gmail.com','$2y$10$8eaNgDyQ7IXKyy9gmcxS8efCbmpiDy3Y8N3tmOoQBrFitSAVoMiMq',1,'Carlos');

UNLOCK TABLES;






-- ================================================================== --
-- --------------------------- ingresos ------------------------------ --
-- ================================================================== --

DROP TABLE IF EXISTS `ingresos`;

CREATE TABLE `ingresos` (
  `id_igreso` int NOT NULL AUTO_INCREMENT,
  `cantidad` double NOT NULL,
  `id_usuario_ingreso` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_igreso`),
  KEY `usuario_ingreso_fk_idx` (`id_usuario_ingreso`),
  CONSTRAINT `usuario_ingreso_fk` FOREIGN KEY (`id_usuario_ingreso`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ;


LOCK TABLES `ingresos` WRITE;

INSERT INTO `ingresos` VALUES (1,20,3,'bizum comida','2021-05-10'),(2,5,3,'bizum Manolo','2021-06-15'),(3,1500,3,'nómina','2021-06-03'),(4,15,3,'trabajo','2021-08-22'),(5,11,3,'ingreso prueba','2021-12-29'),(6,50,3,'trabajillo','2022-01-15'),(7,200,3,'loteria','2022-01-08'),(8,1500,4,'nómina','2022-01-14');

UNLOCK TABLES;

-- ================================================================== --
-- --------------------------- gastos --------------------------- --
-- ================================================================== --
DROP TABLE IF EXISTS `gastos`;

CREATE TABLE `gastos` (
  `id_gasto` int NOT NULL AUTO_INCREMENT,
  `cantidad` double NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `id_usuario_gasto` int NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_gasto`),
  KEY `usuario_gasto_fk_idx` (`id_usuario_gasto`),
  CONSTRAINT `usuario_gasto_fk` FOREIGN KEY (`id_usuario_gasto`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ;


LOCK TABLES `gastos` WRITE;

INSERT INTO `gastos` VALUES (1,20,'cena',3,'2021-07-11'),(2,40,'compra',3,'2021-08-20'),(3,120,'ropa',3,'2021-07-12'),(4,450,'alquiler',3,'2021-07-03'),(5,25,'zapatillas',3,'2021-08-22'),(6,22.6,'gasto prueba',3,'2022-01-06'),(7,30,'gimnasio',3,'2022-01-05'),(8,30,'compra super',3,'2022-01-07'),(9,50,'super',4,'2021-12-28');

UNLOCK TABLES;
