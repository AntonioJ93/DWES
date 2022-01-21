-- Script de creación de bases de datos para MySQL/MariaDB

DROP DATABASE IF EXISTS ud2_test;


CREATE DATABASE ud2_test;


-- -------------- UD2: SISTEMA DE TEST ONLINE ----------------------- --

USE ud2_test;

-- Pon aquí tus CREATE TABLE, INSERT INTO y restricciones necesarias.

-- ================================================================== --
-- ------------------------------- ROL ------------------------------ --
-- ================================================================== --
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 34.65.125.44    Database: ud2_test
-- ------------------------------------------------------


--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;

/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `nombre_rol_UNIQUE` (`nombre_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (4,'ADMIN'),(3,'USER');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;


-- Dump completed on 2021-12-17 16:24:51

-- ================================================================== --
-- --------------------------- USUARIO ------------------------------ --
-- ================================================================== --

-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 34.65.125.44    Database: ud2_test
-- ------------------------------------------------------


--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'a@a.com','A1aaaaaa','Paco'),(4,'admin@admin.com','Admin111','Profesor'),(6,'juan@gmail.com','Juan111111','Juan');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;


-- ================================================================== --
-- --------------------------- USUARIO-ROL--------------------------- --
-- ================================================================== --

-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 34.65.125.44    Database: ud2_test
-- ------------------------------------------------------


--
-- Table structure for table `usuario_rol`
--

DROP TABLE IF EXISTS `usuario_rol`;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_rol` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_rol`),
  KEY `id_rol_fk_idx` (`id_rol`),
  CONSTRAINT `id_rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuario_rol`
--

LOCK TABLES `usuario_rol` WRITE;
/*!40000 ALTER TABLE `usuario_rol` DISABLE KEYS */;
INSERT INTO `usuario_rol` VALUES (3,3),(6,3),(4,4);
/*!40000 ALTER TABLE `usuario_rol` ENABLE KEYS */;
UNLOCK TABLES;


-- ================================================================== --
-- ------------------------------- TEST ----------------------------- --
-- ================================================================== --

-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 34.65.125.44    Database: ud2_test
-- ------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_test`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'Test nivel 1'),(2,'Test nivel 2');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2021-12-17 16:24:55

-- ================================================================== --
-- --------------------------- PREGUNTA ----------------------------- --
-- ================================================================== --

-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 34.65.125.44    Database: ud2_test
-- ------------------------------------------------------

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_test_pregunta` int(11) NOT NULL,
  `texto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_aciertos` int(11) DEFAULT '0',
  `n_fallos` int(11) DEFAULT '0',
  `multiple` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_pregunta`),
  KEY `test_pregunta_fk_idx` (`id_test_pregunta`),
  CONSTRAINT `test_pregunta_fk` FOREIGN KEY (`id_test_pregunta`) REFERENCES `test` (`id_test`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` VALUES (1,1,'¿Cómo se declara una variable en php?',0,0,0),(2,1,'¿Cómo se declara un array?',0,0,0),(3,1,'¿Cuáles de estas opciones es correcta?',0,0,1),(4,1,'¿Cómo se comenta codigo en php?',0,0,1),(5,1,'¿Cuáles son los tipos de alcances de las variables?',0,0,0),(6,1,'¿Qué imprime la siguiente sentencia? echo strlen(\"Hello world!\");',0,0,0),(7,1,'¿Qué imprime la siguiente sentencia? echo strrev(\"Hello world!\");',0,0,0),(8,1,'¿Cuál de estos números no es un integer?',0,0,0),(9,1,'¿Qué devuelve la siguiente función? round(0.60);',0,0,0),(10,1,'¿Qué devuelve la siguiente sentencia? $contador+=1;',0,0,0),(11,2,'En php ¿se pueden crear elementos de POO como clases?',0,0,0),(12,2,'Con la instrucción: $this->name',0,0,0),(13,2,'La siguiente instrucción: function __construct($name, $color) {...}',0,0,0),(14,2,'La instrucción: function __destruct() {...}',0,0,0),(15,2,'Los modificadores de acceso ...',0,0,1),(16,2,'¿Cuáles de los siguientes son modificadores de acceso?',0,0,1),(17,2,'¿Php soporta herencia múltiple?',0,0,1),(18,2,'La palabra reservada final ...',0,0,0),(19,2,'Las interfaces en php ...',0,0,1),(20,2,'Los métodos y propiedades estáticas en php ....',0,0,1);
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2021-12-17 16:24:48

-- ================================================================== --
-- --------------------------- OPCION ------------------------------- --
-- ================================================================== --

-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 34.65.125.44    Database: ud2_test
-- ------------------------------------------------------


--
-- Table structure for table `opcion`
--

DROP TABLE IF EXISTS `opcion`;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opcion` (
  `id_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta_opcion` int(11) NOT NULL,
  `texto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_opcion`),
  KEY `pregunta_opcion_fk_idx` (`id_pregunta_opcion`),
  CONSTRAINT `pregunta_opcion_fk` FOREIGN KEY (`id_pregunta_opcion`) REFERENCES `pregunta` (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opcion`
--

LOCK TABLES `opcion` WRITE;
/*!40000 ALTER TABLE `opcion` DISABLE KEYS */;
INSERT INTO `opcion` VALUES (1,1,'var x;',0),(2,1,'let x;',0),(3,1,'$x;',1),(4,2,'int miArray []= new Integer[3];',0),(5,2,'let miArray=[];',0),(6,2,'$miArray=array(\"x\",\"y\");',1),(7,3,'echo \"&lt;h2&gt;\" . $txt1 . \"&lt;h2&gt;\";',1),(8,3,'echo \"&lt;h2&gt;\" + $txt1 + \"&lt;h2&gt;\";',0),(9,3,'print \"Hello world!&lt;br&gt;\";',1),(10,4,'/* comentario */',1),(11,4,'// comentario',1),(12,4,'&lt;!-- comentario --&gt;',0),(13,5,'global, local y final',0),(14,5,'global, local y estatico',1),(15,5,'global, local y mundial',0),(16,6,'12',1),(17,6,'11',0),(18,6,'13',0),(19,7,'!dlrow olleH',1),(20,7,'olleH !dlrow',0),(21,7,'olleH wolrd!',0),(22,8,'7',0),(23,8,'-5',0),(24,8,'7.2',1),(25,9,'0',0),(26,9,'1',1),(27,9,'0.5',0),(28,10,'contador toma el valor 1',0),(29,10,'suma 1 a contador',1),(30,10,'error de sintaxis',0),(31,11,'Si',1),(32,11,'No',0),(33,11,'No, pero si clases abstractas',0),(34,12,'Producirá un error',0),(35,12,'Solo es correcta dentro de un método estático',0),(36,12,'Accede a la propiedad name',1),(37,13,'Se ejecuta al final del script',0),(38,13,'Es el constructor de una clase',1),(39,13,'Construye una interfaz',0),(40,14,'Se ejecuta al final del script',1),(41,14,'No existe',0),(42,14,'Se ejecuta al inicio del script',0),(43,15,'Determinan los propietarios de la aplicación',0),(44,15,'Determinan el nivel de acceso a métodos',1),(45,15,'Determinan el nivel de acceso a propiedades ',1),(46,17,'Si',0),(47,17,'No',1),(48,17,'No, pero si interfaces',1),(49,18,'Evita la sobreescritura de un método',1),(50,18,'No existe en php',0),(51,18,'Sólo se aplica a interfaces',0),(52,19,'Son una herramienta para aplicar el polimorfismo',1),(53,19,'Las clases las pueden implementar',1),(54,19,'Sus métodos pueden ser implementados por varias clases',1),(55,20,'Se acceden a ellos a través de la clase',1),(56,20,'Se acceden a ellos a través de los objetos',0),(57,20,'Son comunes a todos los objetos del mismo tipo',1),(58,16,'public',1),(59,16,'protected',1),(60,16,'private',1);
/*!40000 ALTER TABLE `opcion` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2021-12-17 16:24:46


-- ================================================================== --
-- ---------------------- TEST_REALIZADOS --------------------------- --
-- ================================================================== --

-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 34.65.125.44    Database: ud2_test
-- ------------------------------------------------------

--
-- Table structure for table `test_realizados`
--

DROP TABLE IF EXISTS `test_realizados`;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test_realizados` (
  `id_test_realizados` int(11) NOT NULL AUTO_INCREMENT,
  `id_test` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `calificacion` decimal(4,2) DEFAULT NULL,
  `intento` int(11) NOT NULL,
  PRIMARY KEY (`id_test_realizados`),
  KEY `test_fk_idx` (`id_test`),
  KEY `usuario_fk_idx` (`id_usuario`),
  CONSTRAINT `test_fk` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  CONSTRAINT `usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_realizados`
--

LOCK TABLES `test_realizados` WRITE;
/*!40000 ALTER TABLE `test_realizados` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_realizados` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2021-12-17 16:24:56

-- ================================================================== --
-- ---------------------- PREGUNTA_RESPONDIDA ----------------------- --
-- ================================================================== --

-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 34.65.125.44    Database: ud2_test
-- ------------------------------------------------------

--
-- Table structure for table `pregunta_respondida`
--

DROP TABLE IF EXISTS `pregunta_respondida`;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pregunta_respondida` (
  `id_pregunta_respondida` int(11) NOT NULL AUTO_INCREMENT,
  `id_test_realizados_pregunta_respondida` int(11) NOT NULL,
  `pregunta_pregunta_respondida` int(11) NOT NULL,
  PRIMARY KEY (`id_pregunta_respondida`),
  KEY `pregunta_pregunta_respondida_fk_idx` (`pregunta_pregunta_respondida`),
  KEY `test_realizados_pregunta_respondida_fk_idx` (`id_test_realizados_pregunta_respondida`),
  CONSTRAINT `pregunta_pregunta_respondida_fk` FOREIGN KEY (`pregunta_pregunta_respondida`) REFERENCES `pregunta` (`id_pregunta`),
  CONSTRAINT `test_realizados_pregunta_respondida_fk` FOREIGN KEY (`id_test_realizados_pregunta_respondida`) REFERENCES `test_realizados` (`id_test_realizados`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pregunta_respondida`
--

LOCK TABLES `pregunta_respondida` WRITE;
/*!40000 ALTER TABLE `pregunta_respondida` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta_respondida` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2021-12-17 16:24:44

-- ================================================================== --
-- ---------------------- OPCION_RESPONDIDA ----------------------- --
-- ================================================================== --

-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 34.65.125.44    Database: ud2_test
-- ------------------------------------------------------

--
-- Table structure for table `opcion_respondida`
--

DROP TABLE IF EXISTS `opcion_respondida`;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opcion_respondida` (
  `idopcion_respondida` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta_respondida_opcion_respondida` int(11) NOT NULL,
  `opcion_opcion_respondida` int(11) NOT NULL,
  PRIMARY KEY (`idopcion_respondida`),
  KEY `fk_opcion_respondida_pregunta_respondida1_idx` (`id_pregunta_respondida_opcion_respondida`),
  KEY `opcion_opcion_respondida_fk_idx` (`opcion_opcion_respondida`),
  CONSTRAINT `fk_opcion_respondida_pregunta_respondida1` FOREIGN KEY (`id_pregunta_respondida_opcion_respondida`) REFERENCES `pregunta_respondida` (`id_pregunta_respondida`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `opcion_opcion_respondida_fk` FOREIGN KEY (`opcion_opcion_respondida`) REFERENCES `opcion` (`id_opcion`)
) ENGINE=InnoDB AUTO_INCREMENT=334 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opcion_respondida`
--

LOCK TABLES `opcion_respondida` WRITE;
/*!40000 ALTER TABLE `opcion_respondida` DISABLE KEYS */;
/*!40000 ALTER TABLE `opcion_respondida` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2021-12-17 16:24:50



-- ---------------------------------------------------------------------


