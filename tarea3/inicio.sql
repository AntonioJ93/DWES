-- Script de creación de bases de datos para MySQL/MariaDB

DROP DATABASE IF EXISTS ud3_balance;
DROP DATABASE IF EXISTS ud3_app_web;

CREATE DATABASE ud3_balance;
CREATE DATABASE ud3_app_web;

-- ----------------- UD3: BALANCE DE INGRESOS Y GASTOS -----------------

USE ud3_balance;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `usuario` VALUES (3,'usuario@gmail.com','$2y$10$dk3KxDifl8dGWUSiLcEkcuef17bFjMHIOeV6ErveC/TYoVQEC4fQi',1,'Paco'),(4,'carlos@gmail.com','$2y$10$8eaNgDyQ7IXKyy9gmcxS8efCbmpiDy3Y8N3tmOoQBrFitSAVoMiMq',1,'Carlos');


--
-- Table structure for table `gastos`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci; 

INSERT INTO `gastos` VALUES (1,20,'cena',3,'2021-07-11'),(2,40,'compra',3,'2021-08-20'),(3,120,'ropa',3,'2021-07-12'),(4,450,'alquiler',3,'2021-07-03'),(5,25,'zapatillas',3,'2021-08-22'),(6,22.6,'gasto prueba',3,'2022-01-06'),(7,30,'gimnasio',3,'2022-01-05'),(8,30,'compra super',3,'2022-01-07'),(9,50,'super',4,'2021-12-28');

--
-- Table structure for table `ingresos`
--
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `ingresos` VALUES (1,20,3,'bizum comida','2021-05-10'),(2,5,3,'bizum Manolo','2021-06-15'),(3,1500,3,'nómina','2021-06-03'),(4,15,3,'trabajo','2021-08-22'),(5,11,3,'ingreso prueba','2021-12-29'),(6,50,3,'trabajillo','2022-01-15'),(7,200,3,'loteria','2022-01-08'),(8,1500,4,'nómina','2022-01-14');


-- ---------------------------------------------------------------------



-- ------ UD3: APLICACIÓN WEB CON BBDD, SESIONES, COOKIES Y HASH -------

USE ud3_app_web;

-- Pon aquí tus CREATE TABLE, INSERT INTO y restricciones necesarias.


--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `rol` VALUES (1,'admin'),(2,'cliente');

--
-- Table structure for table `usuario`
--

-- DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `activo` tinyint NOT NULL DEFAULT '1',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `usuario` VALUES (2,'Carlos','usuario@gmail.com','$2y$10$nTbGDmhmkHhxetWFZR71q.DM0o6JsJLLd9q2DMNBeaES7ps2vu7CS',1,'2022-01-26 17:55:26'),(3,'Pepe','admin@gmail.com','$2y$10$0ZZCW1fXNLBgc/QA6lT/luM8JkcFZvvONPz2goaZClG.pGSiWFtdq',1,'2022-01-30 10:50:44');

--
-- Table structure for table `usuario_rol`
--

DROP TABLE IF EXISTS `usuario_rol`;
CREATE TABLE `usuario_rol` (
  `id_usuario` int NOT NULL,
  `id_rol` int NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_rol`),
  KEY `rol_usuario_fk_idx` (`id_rol`),
  CONSTRAINT `rol_usuario_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  CONSTRAINT `usuario_rol_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `usuario_rol` VALUES (3,1),(2,2);




--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE `especialidad` (
  `id_especialidad` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id_especialidad`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `especialidad` VALUES (1,'De la casa',9),(2,'Con piña',9.5),(3,'Barbacoa',10),(4,'Picante',9),(5,'Top',14);

--
-- Table structure for table `ingrediente`
--

DROP TABLE IF EXISTS `ingrediente`;
CREATE TABLE `ingrediente` (
  `id_ingrediente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ingrediente`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `ingrediente` VALUES (7,'atún'),(8,'bacón'),(9,'champiñones'),(14,'chorizo'),(2,'jamón'),(12,'mostaza'),(15,'peperoni'),(6,'piña'),(13,'pollo'),(10,'queso chedar'),(11,'queso de cabra'),(16,'salmón'),(3,'salsa barbacoa'),(4,'salsa carbonara'),(5,'salsa césar'),(1,'tomate');

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `id_usuario_pedido` int NOT NULL,
  `precio` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedido`),
  KEY `usuario_pedido_fk_idx` (`id_usuario_pedido`),
  CONSTRAINT `usuario_pedido_fk` FOREIGN KEY (`id_usuario_pedido`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `pedido` VALUES (9,2,28,'2022-01-29 20:14:46'),(10,2,9.5,'2022-01-30 11:41:46'),(11,2,42,'2022-01-30 11:43:11'),(12,2,18.5,'2022-01-30 18:39:20'),(13,2,9.5,'2022-01-30 18:41:02');



--
-- Table structure for table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
CREATE TABLE `pizza` (
  `id_pizza` int NOT NULL AUTO_INCREMENT,
  `precio` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pizza`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `pizza` VALUES (3,10.5,'2022-01-29 23:26:44'),(4,10.5,'2022-01-29 23:33:53'),(5,9.5,'2022-01-29 23:36:28'),(6,9,'2022-01-30 10:57:58'),(7,8.5,'2022-01-30 10:58:33'),(8,7.5,'2022-01-30 11:00:15'),(9,8,'2022-01-30 11:10:23'),(10,9.5,'2022-01-30 11:41:40'),(11,9,'2022-01-30 11:42:55'),(12,9,'2022-01-30 18:39:06');

--
-- Table structure for table `especialidad_ingrediente`
--
DROP TABLE IF EXISTS `especialidad_ingrediente`;
CREATE TABLE `especialidad_ingrediente` (
  `id_especialidad` int NOT NULL,
  `id_ingrediente` int NOT NULL,
  PRIMARY KEY (`id_especialidad`,`id_ingrediente`),
  KEY `ingrediente_especialidad_fk_idx` (`id_ingrediente`),
  CONSTRAINT `especialidad_ingrediente_fk` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  CONSTRAINT `ingrediente_especialidad_fk` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingrediente` (`id_ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `especialidad_ingrediente` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(1,2),(2,2),(5,2),(1,3),(2,3),(3,3),(5,3),(2,6),(1,7),(3,7),(5,7),(1,8),(2,8),(3,8),(5,8),(2,9),(3,9),(5,9),(4,10),(5,11),(4,13),(5,13),(3,14),(5,14),(4,15),(4,16),(5,16);


--
-- Table structure for table `ingrediente_pizza`
--

DROP TABLE IF EXISTS `ingrediente_pizza`;
CREATE TABLE `ingrediente_pizza` (
  `id_pizza` int NOT NULL,
  `id_ingrediente` int NOT NULL,
  PRIMARY KEY (`id_pizza`,`id_ingrediente`),
  KEY `ingrediente_pizza_fk_idx` (`id_ingrediente`),
  CONSTRAINT `ingrediente_pizza_fk` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingrediente` (`id_ingrediente`),
  CONSTRAINT `pizza_ingrediente_fk` FOREIGN KEY (`id_pizza`) REFERENCES `pizza` (`id_pizza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `ingrediente_pizza` VALUES (3,1),(4,1),(10,1),(11,1),(3,2),(4,2),(5,2),(3,3),(4,3),(10,4),(3,6),(4,6),(12,6),(3,7),(4,7),(5,7),(6,7),(8,7),(9,7),(10,7),(11,7),(12,7),(5,8),(6,8),(7,8),(9,8),(5,9),(6,9),(7,9),(10,9),(12,9),(12,10),(3,11),(4,11),(11,11),(3,13),(4,13),(11,13),(5,14),(6,14),(7,14),(10,14);


--
-- Table structure for table `pedido_especialidad`
--

DROP TABLE IF EXISTS `pedido_especialidad`;
CREATE TABLE `pedido_especialidad` (
  `id_pedido` int NOT NULL,
  `id_especialidad` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedido`,`id_especialidad`),
  KEY `especialidad_pedido_fk_idx` (`id_especialidad`),
  CONSTRAINT `especialidad_pedido_fk` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  CONSTRAINT `pedido_especialidad_fk` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `pedido_especialidad` VALUES (9,1,1,9,'2022-01-29 20:14:46'),(9,2,2,9.5,'2022-01-29 20:14:46'),(11,3,1,10,'2022-01-30 11:43:11'),(11,4,1,9,'2022-01-30 11:43:11'),(11,5,1,14,'2022-01-30 11:43:11'),(12,2,1,9.5,'2022-01-30 18:39:20'),(13,2,1,9.5,'2022-01-30 18:41:02');

--
-- Table structure for table `pedido_pizza`
--

DROP TABLE IF EXISTS `pedido_pizza`;
CREATE TABLE `pedido_pizza` (
  `id_pedido` int NOT NULL,
  `id_pizza` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedido`,`id_pizza`),
  KEY `pizza_pedido_fk_idx` (`id_pizza`),
  CONSTRAINT `pedido_pizza_fk` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  CONSTRAINT `pizza_pedido_fk` FOREIGN KEY (`id_pizza`) REFERENCES `pizza` (`id_pizza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ;
INSERT INTO `pedido_pizza` VALUES (10,10,1,9.5,'2022-01-30 11:41:46'),(11,11,1,9,'2022-01-30 11:43:11'),(12,12,1,9,'2022-01-30 18:39:20');









-- ---------------------------------------------------------------------