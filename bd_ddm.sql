-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carrito`
--

LOCK TABLES `tb_carrito` WRITE;
/*!40000 ALTER TABLE `tb_carrito` DISABLE KEYS */;
INSERT INTO `tb_carrito` VALUES (1,3);
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
  PRIMARY KEY (`id_carypro`),
  KEY `id_carrito` (`id_carrito`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tb_carypro_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `tb_carrito` (`id_carrito`),
  CONSTRAINT `tb_carypro_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carypro`
--

LOCK TABLES `tb_carypro` WRITE;
/*!40000 ALTER TABLE `tb_carypro` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_carypro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cate_user`
--

DROP TABLE IF EXISTS `tb_cate_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cate_user` (
  `id_cate_user` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cate_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cate_user`
--

LOCK TABLES `tb_cate_user` WRITE;
/*!40000 ALTER TABLE `tb_cate_user` DISABLE KEYS */;
INSERT INTO `tb_cate_user` VALUES (0,'superadmin'),(1,'admin'),(2,'cliente');
/*!40000 ALTER TABLE `tb_cate_user` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categorias`
--

LOCK TABLES `tb_categorias` WRITE;
/*!40000 ALTER TABLE `tb_categorias` DISABLE KEYS */;
INSERT INTO `tb_categorias` VALUES (1,'frutas'),(2,'ropa'),(3,'camisa'),(4,'hogar'),(5,'electrodomesticos'),(6,'blusas');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoriasproducto`
--

LOCK TABLES `tb_categoriasproducto` WRITE;
/*!40000 ALTER TABLE `tb_categoriasproducto` DISABLE KEYS */;
INSERT INTO `tb_categoriasproducto` VALUES (10,'112',4),(11,'112',5),(12,'12a14',2),(13,'12a14',3),(14,'12a14',4),(15,'12a14',6),(16,'12a54',2),(17,'12a54',3);
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
  `fechaComentario` varchar(20) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tb_comentarios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`),
  CONSTRAINT `tb_comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_comentarios`
--

LOCK TABLES `tb_comentarios` WRITE;
/*!40000 ALTER TABLE `tb_comentarios` DISABLE KEYS */;
INSERT INTO `tb_comentarios` VALUES (1,'soy un admin y yo comento ','2024-06-19 11:51:39','fk3',1),(6,'que buen producto mi amigo like para mas videos asi ','2024-06-26 12:26:08','112',1);
/*!40000 ALTER TABLE `tb_comentarios` ENABLE KEYS */;
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
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_productos`
--

LOCK TABLES `tb_productos` WRITE;
/*!40000 ALTER TABLE `tb_productos` DISABLE KEYS */;
INSERT INTO `tb_productos` VALUES ('112','cepillo de dientes','cepillo de dientes de oral-B','Cepillo electrico',10,0,'../../fotos/images.jfif','50.000,00','negro'),('12a14','gorrita','es muy bonita','Tela muy fina, mas fina que la fina la margarita la preferida',50,0,'../../fotos/gorra.jpg','25.000,00','amarillo'),('12a54','camisa liqui liqui','CAMISA GUAYABERA BORDADA MANGA LARGA CUELLO NERU\r\n\r\n------IMPORTANTE------\r\n\r\n*Antes de realizar la compra, te invitamos a revisar el cuadro de medidas que se e','CAMISA GUAYABERA BORDADA MANGA LARGA CUELLO NERU\r\n\r\n------IMPORTANTE------\r\n\r\n*Antes de realizar la compra, te invitamos a revisar el cuadro de medidas que se encuentra al final de las fotos para que la compares con una camisa de uso diario y sepas cual talla es la indicada.\r\n\r\n*El color Blanco: Es un blanco óptico (no es blanco tono leche/opaco).\r\n\r\nCREACIONES OSVITH te da la bienvenida a nuestra pagina de ventas online.\r\n\r\nNuestras prendas son hechas por manos Colombianas, cada vez que adquier',0,0,'../../fotos/fb0804ef483115f8387b304fd15a27fc.jpg','70.000,00','crema blanco'),('fk3','pito ','Es un pito de ultima tecnologia','hace mucha música y es muy hermoso ',10,0,'../../fotos/descarga.jfif','1.500,00','negro'),('PK4','cepillo de ropa','Cepillo para lavar la ropa','Es practico y cuida muy bien la mano',50,0,'../../fotos/images (1).jfif','2.500,00','verde');
/*!40000 ALTER TABLE `tb_productos` ENABLE KEYS */;
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
  `id_cate_user` int(11) DEFAULT NULL,
  `status_user` varchar(10) DEFAULT NULL,
  `foto_user` varchar(1000) DEFAULT 'null',
  PRIMARY KEY (`id`),
  KEY `id_cate_user` (`id_cate_user`),
  CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_cate_user`) REFERENCES `tb_cate_user` (`id_cate_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuarios`
--

LOCK TABLES `tb_usuarios` WRITE;
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` VALUES (1,'mike','sanchez','mike','$2y$10$ft42yWuI8r6VqUuwUPyrQOENYdA0dfrPGuuz6p5h3xHbqWPgEdce2','2024-06-17 10:02:42',0,'Inactivo','../../img_user/descarga.jfif'),(2,'juan ','ramos','juan','$2y$10$xAZK8g9T40.wkETuqYoH5eIl43NL4EZpQsCnmSn98tNF/2o54457O','2024-06-17 10:03:05',1,'Inactivo','../../img/logo-icon-person.jpg'),(3,'pepito','sanchez','pepito','$2y$10$6haqpePruHDBf6PI4myMs.yf3v.C1pYytnvzg.XpYCtEPSqVGKMjC','2024-06-19 21:42:30',2,'Activo','../../img_user/descarga.jfif'),(4,'pablo','pablito','pablito','$2y$12$9FCZrfGgJ6jP2MfjkxM7ZOknqszr0eNt03A1csosY62o3BzUWmS2C','2024-06-26 07:14:52',2,'Inactivo','../../img/logo-icon-person.jpg');
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_valoracion`
--

DROP TABLE IF EXISTS `tb_valoracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_valoracion` (
  `id_valoracion` int(11) NOT NULL,
  `valoracion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_valoracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_valoracion`
--

LOCK TABLES `tb_valoracion` WRITE;
/*!40000 ALTER TABLE `tb_valoracion` DISABLE KEYS */;
INSERT INTO `tb_valoracion` VALUES (0,''),(1,'like'),(2,'not like');
/*!40000 ALTER TABLE `tb_valoracion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-27 10:58:52
