-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_ddm
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_carrito`
--

DROP TABLE IF EXISTS `tb_carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_carrito` (
  `id_carrito` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_carrito`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tb_carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carrito`
--

LOCK TABLES `tb_carrito` WRITE;
/*!40000 ALTER TABLE `tb_carrito` DISABLE KEYS */;
INSERT INTO `tb_carrito` VALUES (4,3),(14,4);
/*!40000 ALTER TABLE `tb_carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_carypro`
--

DROP TABLE IF EXISTS `tb_carypro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_carypro` (
  `id_carypro` int(11) NOT NULL AUTO_INCREMENT,
  `id_carrito` int(11) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `cantidad_de_productos` int(11) NOT NULL,
  PRIMARY KEY (`id_carypro`),
  KEY `id_carrito` (`id_carrito`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tb_carypro_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `tb_carrito` (`id_carrito`),
  CONSTRAINT `tb_carypro_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carypro`
--

LOCK TABLES `tb_carypro` WRITE;
/*!40000 ALTER TABLE `tb_carypro` DISABLE KEYS */;
INSERT INTO `tb_carypro` VALUES (18,4,'1938',1);
/*!40000 ALTER TABLE `tb_carypro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categorias`
--

DROP TABLE IF EXISTS `tb_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(150) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categorias`
--

LOCK TABLES `tb_categorias` WRITE;
/*!40000 ALTER TABLE `tb_categorias` DISABLE KEYS */;
INSERT INTO `tb_categorias` VALUES (1,'Ropa'),(2,'Aseo hogar'),(3,'Aseo personal'),(5,'Tecnologia'),(6,'Computadoras'),(7,'juguetes'),(8,'Electrodomésticos');
/*!40000 ALTER TABLE `tb_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categoriasproducto`
--

DROP TABLE IF EXISTS `tb_categoriasproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categoriasproducto` (
  `id_p_c` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` varchar(10) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_p_c`),
  KEY `id_producto` (`id_producto`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `tb_categoriasproducto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`),
  CONSTRAINT `tb_categoriasproducto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoriasproducto`
--

LOCK TABLES `tb_categoriasproducto` WRITE;
/*!40000 ALTER TABLE `tb_categoriasproducto` DISABLE KEYS */;
INSERT INTO `tb_categoriasproducto` VALUES (1,'21',1),(26,'21',7),(35,'1938',5),(36,'1938',6),(37,'1938',7);
/*!40000 ALTER TABLE `tb_categoriasproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_comentarios`
--

DROP TABLE IF EXISTS `tb_comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(600) NOT NULL,
  `fechaComentario` varchar(150) DEFAULT NULL,
  `id_producto` varchar(10) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `editado` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tb_comentarios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`),
  CONSTRAINT `tb_comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_comentarios`
--

LOCK TABLES `tb_comentarios` WRITE;
/*!40000 ALTER TABLE `tb_comentarios` DISABLE KEYS */;
INSERT INTO `tb_comentarios` VALUES (30,'soy un comentario','2024-07-25 08:14:33 AM','21',3,NULL),(58,'soy un comentario','2024-07-25 01:47:40 PM','22',3,NULL),(61,'este producto es genial ','2024-07-25 02:02:31 PM','22',1,NULL),(62,'castañeda es un hp','2024-07-25 02:15:52 PM','21',1,NULL),(64,'Estas siendo vigilado mi querido Castañeda','2024-07-27 05:35:08 PM','22',3,'2024-07-30 10:25:44 AM'),(74,'soy pepito castañeda y soy nieto de sergio ramos','2024-07-28 09:21:40 PM','22',3,'2024-07-30 10:56:53 AM'),(76,'Quien fue el que subió este producto?','2024-07-30 11:47:21 AM','1938',1,'2024-07-31 03:22:55 PM'),(77,'Me parece una ofensa que este producto contenga mi cara >:(','2024-07-31 02:47:55 PM','1938',3,NULL);
/*!40000 ALTER TABLE `tb_comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_compras`
--

DROP TABLE IF EXISTS `tb_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_compras` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `departamento` varchar(250) NOT NULL,
  `municipio` varchar(250) NOT NULL,
  `telefono` int(11) NOT NULL,
  `barrio` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `fecha_de_compra` varchar(50) NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `total_compra` varchar(100) NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_compras`
--

LOCK TABLES `tb_compras` WRITE;
/*!40000 ALTER TABLE `tb_compras` DISABLE KEYS */;
INSERT INTO `tb_compras` VALUES (1,3,'Guaviare','San José del Guaviare',2147483647,'villa andrea','calel 26','2024-07-11 18:40:20','Pepito','pepito@gmail.com',''),(8,3,'Guaviare','San Jose del Guaviare',2147483647,'villa andrea','calel 26','2024-07-11 19:44:05','Pepito','pepito@gmail.com','800000'),(12,3,'Guaviare','San Jose del Guaviare',2147483647,'villa andrea','calel 26','2024-07-27 02:05:12 PM','Pepito','mike@gmail.com','3.220,00'),(13,4,'Guaviare','San Jose del Guaviare',2147483647,'Divino Niño','Calle 18#28-50','2024-07-30 11:40:07 AM','jhon hnery','henryjhon10@gmail.com','75.540,00');
/*!40000 ALTER TABLE `tb_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_departamentos`
--

DROP TABLE IF EXISTS `tb_departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_departamentos` (
  `id_departamento` int(11) NOT NULL,
  `departamento` varchar(150) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_departamentos`
--

LOCK TABLES `tb_departamentos` WRITE;
/*!40000 ALTER TABLE `tb_departamentos` DISABLE KEYS */;
INSERT INTO `tb_departamentos` VALUES (95,'Guaviare');
/*!40000 ALTER TABLE `tb_departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_facturas`
--

DROP TABLE IF EXISTS `tb_facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `producto` varchar(150) NOT NULL,
  `cantidades` int(11) NOT NULL,
  `sub_valor` varchar(150) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_compra` (`id_compra`),
  CONSTRAINT `tb_facturas_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `tb_compras` (`id_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_facturas`
--

LOCK TABLES `tb_facturas` WRITE;
/*!40000 ALTER TABLE `tb_facturas` DISABLE KEYS */;
INSERT INTO `tb_facturas` VALUES (1,1,'1','computadora',1,'1.200.000,00'),(6,8,'121212','GTA VI',4,'0,00'),(7,8,'12','computadora2',4,'200.000,00'),(10,12,'22','cepillo de ropa',1,'3.220,00'),(11,13,'21','silbato',3,'75.540,00');
/*!40000 ALTER TABLE `tb_facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_historial`
--

DROP TABLE IF EXISTS `tb_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_historial` (
  `idHistorial` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `fec_ver` varchar(150) NOT NULL,
  PRIMARY KEY (`idHistorial`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tb_historial_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`),
  CONSTRAINT `tb_historial_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_historial`
--

LOCK TABLES `tb_historial` WRITE;
/*!40000 ALTER TABLE `tb_historial` DISABLE KEYS */;
INSERT INTO `tb_historial` VALUES (25,4,'21','2024-07-30 11:39:16 AM'),(36,2,'1938','2024-07-31 03:17:30 PM'),(60,1,'1938','2024-08-03 11:58:36 PM'),(61,1,'1938','2024-08-04 12:18:22 AM');
/*!40000 ALTER TABLE `tb_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_historial_productos`
--

DROP TABLE IF EXISTS `tb_historial_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_historial_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productoEliminado` varchar(80) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `fecha_eli` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_historial_productos`
--

LOCK TABLES `tb_historial_productos` WRITE;
/*!40000 ALTER TABLE `tb_historial_productos` DISABLE KEYS */;
INSERT INTO `tb_historial_productos` VALUES (1,'Se Creo el producto: silbato','Codigo: 50','2024-07-18 07:33:22 AM'),(2,'Se ilimino el producto: silbato','Codigo: 50','2024-07-18 07:35:01 AM'),(3,'Se Creo el producto: cepillo de ropa','Codigo: 22','2024-07-19 08:13:48 AM'),(4,'Se Creo el producto: cepillo de dientes','Codigo: 25','2024-07-19 09:22:46 AM'),(5,'Se ilimino el producto: cepillo de dientes','Codigo: 25','2024-07-19 09:40:23 AM'),(6,'Se Creo el producto: cepillo de dientes','Codigo: 25','2024-07-19 09:41:12 AM'),(7,'Se ilimino el producto: cepillo de dientes','Codigo: 25','2024-07-19 09:41:26 AM'),(8,'Se Creo el producto: cepillo de dientes','Codigo: 25','2024-07-19 09:41:54 AM'),(9,'Se ilimino el producto: cepillo de dientes','Codigo: 25','2024-07-19 09:42:08 AM'),(10,'Se Creo el producto: cepillo de dientes','Codigo: 25','2024-07-19 09:53:52 AM'),(11,'Se ilimino el producto: cepillo de dientes','Codigo: 25','2024-07-19 09:54:12 AM'),(12,'Se Creo el producto: cuto','Codigo: 19','2024-07-30 11:44:44 AM'),(13,'Se Creo el producto: prubea','Codigo: 23','2024-08-01 10:59:52 AM'),(14,'Se ilimino el producto: silbato','Codigo: 23','2024-08-04 01:02:53 AM');
/*!40000 ALTER TABLE `tb_historial_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_municipios`
--

DROP TABLE IF EXISTS `tb_municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_municipios` (
  `id_municipio` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `municipio` varchar(150) NOT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `id_departamento` (`id_departamento`),
  CONSTRAINT `tb_municipios_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `tb_departamentos` (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_municipios`
--

LOCK TABLES `tb_municipios` WRITE;
/*!40000 ALTER TABLE `tb_municipios` DISABLE KEYS */;
INSERT INTO `tb_municipios` VALUES (95000,95,'San Jose del Guaviare'),(95001,95,'Retorno'),(95100,95,'Miraflores'),(95102,95,'Calamar');
/*!40000 ALTER TABLE `tb_municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ofertas`
--

DROP TABLE IF EXISTS `tb_ofertas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_ofertas` (
  `idOferta` int(11) NOT NULL AUTO_INCREMENT,
  `oferta` varchar(150) NOT NULL,
  PRIMARY KEY (`idOferta`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ofertas`
--

LOCK TABLES `tb_ofertas` WRITE;
/*!40000 ALTER TABLE `tb_ofertas` DISABLE KEYS */;
INSERT INTO `tb_ofertas` VALUES (3,'no hay oferta'),(8,'5%');
/*!40000 ALTER TABLE `tb_ofertas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_productos`
--

DROP TABLE IF EXISTS `tb_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_productos` (
  `id_producto` varchar(10) NOT NULL,
  `producto_nombre` varchar(80) DEFAULT NULL,
  `descripcion_producto` varchar(160) DEFAULT NULL,
  `caracteristicas_producto` varchar(500) DEFAULT NULL,
  `cantidades` int(11) DEFAULT NULL,
  `id_ofertas` int(11) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `precio` varchar(200) DEFAULT NULL,
  `color` varchar(150) NOT NULL,
  `fec_cre` varchar(150) DEFAULT NULL,
  `editado_produto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_productos`
--

LOCK TABLES `tb_productos` WRITE;
/*!40000 ALTER TABLE `tb_productos` DISABLE KEYS */;
INSERT INTO `tb_productos` VALUES ('1938','cuto','cuto lindo negro bello ,juguete sexual','bonito',7,3,'../../fotos/perfil.jpg','2.500,00','negro pasion','2024-07-30 11:44:44 AM','2024-08-04 01:09:42 AM'),('21','silbato','silbato de profesional','silbato de arbitro profesional',5,0,'../../fotos/descarga.jfif','25.180,00','azul','2024-07-19 08:10:57 AM',NULL),('22','cepillo de ropa','cepillo para lavar la ropa','es un muy buen cepillo ',0,0,'../../fotos/images (1).jfif','3.220,00','verde','2024-07-19 08:13:48 AM',NULL);
/*!40000 ALTER TABLE `tb_productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger crearProducto
after insert on 
tb_productos
for each row begin 
	 insert into tb_historial_productos()
     value(null,concat("Se Creo el producto: ", new.producto_nombre),concat("Codigo: ",new.id_producto),DATE_FORMAT(NOW(), '%Y-%m-%d %h:%i:%s %p'));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger eliminarProducto
after delete on 
tb_productos
for each row begin 
	 insert into tb_historial_productos()
     value(null,concat("Se ilimino el producto: ", old.producto_nombre),concat("Codigo: ",old.id_producto),DATE_FORMAT(NOW(), '%Y-%m-%d %h:%i:%s %p'));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tb_respuestascomentarios`
--

DROP TABLE IF EXISTS `tb_respuestascomentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_respuestascomentarios` (
  `idRespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `idComentario` int(11) NOT NULL,
  `repuesta` varchar(250) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fech_repuesta` varchar(150) NOT NULL,
  `editado` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idRespuesta`),
  KEY `idComentario` (`idComentario`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `tb_respuestascomentarios_ibfk_1` FOREIGN KEY (`idComentario`) REFERENCES `tb_comentarios` (`id_comentario`),
  CONSTRAINT `tb_respuestascomentarios_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_respuestascomentarios`
--

LOCK TABLES `tb_respuestascomentarios` WRITE;
/*!40000 ALTER TABLE `tb_respuestascomentarios` DISABLE KEYS */;
INSERT INTO `tb_respuestascomentarios` VALUES (1,64,'Esto es una repuesta',3,'2024-07-25 08:14:33 AM',NULL),(4,64,'att figueroa',3,'2024-07-30 11:28:18 AM',NULL),(6,77,'tranquilo, administración esta solucionado el problema. ',1,'2024-07-31 03:10:19 PM',NULL),(7,77,'La solución es que se cambie de rostro mi querido amigo, no es por ofenderlo peor usted es muy feo',2,'2024-07-31 03:18:11 PM',NULL),(8,77,'att mike',1,'2024-07-31 03:29:04 PM',NULL);
/*!40000 ALTER TABLE `tb_respuestascomentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `email` varchar(260) NOT NULL,
  `pasword` varchar(100) NOT NULL,
  `fecha_registro` varchar(50) NOT NULL,
  `cate_user` int(11) NOT NULL,
  `status_user` varchar(10) DEFAULT NULL,
  `foto_usuarios` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuarios`
--

LOCK TABLES `tb_usuarios` WRITE;
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` VALUES (1,'Maicol','Sánchez','mike','$2y$12$rntySKkO5pXWOuYXt3ZgyeK/6uFn2TUvdsuk/3ipH4u.cliyu9Q8K','2024-07-11 12:14:50',0,'Activo','../../img_user/planeta-tierra-vista-desde-la-luna_1280x720_xtrafondos.com.jpg'),(2,'Juan','Castañeda','juan','$2y$12$Y36HfLAZPySG/WML6xTXoeG6Dy7L6UYHsF//zWmFhFLbkct.eYtbS','2024-07-11 12:22:28',1,'Inactivo','../../img/logo-icon-person.jpg'),(3,'Pepito','perez','pepito','$2y$12$T6zUm36IoM1EerOJvym.1.YoVkrVPKLtCAFdZKRMkSFQOP5jqHLgO','2024-07-11 16:56:14',2,'Inactivo','../../img_user/perfil.jpg'),(4,'jhon hnery','sanchezerazo','henryjhon10@gmail.com','$2y$12$XqG7WRSr3U1xOgd9NIIK7uJefBQj9ZGe7lqBS4DcK/WJiIRMUiIWm','2024-07-30 11:38:25 AM',2,'Inactivo','../../img_user/perfil.jpg');
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_valoracion`
--

DROP TABLE IF EXISTS `tb_valoracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_valoracion` (
  `id_valoracion` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` varchar(10) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valoracion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_valoracion`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tb_valoracion_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`),
  CONSTRAINT `tb_valoracion_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_valoracion`
--

LOCK TABLES `tb_valoracion` WRITE;
/*!40000 ALTER TABLE `tb_valoracion` DISABLE KEYS */;
INSERT INTO `tb_valoracion` VALUES (2,'21',3,'0'),(5,'21',2,'0'),(13,'21',1,'0'),(15,'22',3,'1');
/*!40000 ALTER TABLE `tb_valoracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd_ddm'
--

--
-- Dumping routines for database 'bd_ddm'
--
/*!50003 DROP FUNCTION IF EXISTS `EliminarProductos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `EliminarProductos`(id VARCHAR(10)) RETURNS int(11)
BEGIN
    DECLARE id_pro VARCHAR(10);
    SET id_pro = id;

    DELETE FROM tb_comentarios WHERE id_producto = id_pro;
    DELETE FROM tb_historial WHERE id_producto = id_pro;
    DELETE FROM tb_categoriasProducto WHERE id_producto = id_pro;
    DELETE FROM tb_valoracion WHERE id_producto = id_pro;
    DELETE FROM tb_carypro WHERE id_producto = id_pro;
    DELETE FROM tb_productos WHERE id_producto = id_pro;

    RETURN 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-04  1:42:18
