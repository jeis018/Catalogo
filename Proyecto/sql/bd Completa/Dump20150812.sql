CREATE DATABASE  IF NOT EXISTS `catalogo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `catalogo`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: catalogo
-- ------------------------------------------------------
-- Server version	5.6.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `detallepedido`
--

DROP TABLE IF EXISTS `detallepedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallepedido` (
  `idDetalleProducto` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `CantidadProducto` int(11) NOT NULL,
  PRIMARY KEY (`idDetalleProducto`),
  KEY `idPedido` (`idPedido`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`),
  CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepedido`
--

LOCK TABLES `detallepedido` WRITE;
/*!40000 ALTER TABLE `detallepedido` DISABLE KEYS */;
INSERT INTO `detallepedido` VALUES (1,7,11,1),(2,7,1,1),(3,8,11,1),(4,8,1,1),(5,9,1,1);
/*!40000 ALTER TABLE `detallepedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `idRegistroInventario` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `CantidadExistente` int(11) NOT NULL,
  PRIMARY KEY (`idRegistroInventario`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `TotalPedido` int(11) NOT NULL,
  `TipoPedido` varchar(1) COLLATE utf8mb4_bin NOT NULL,
  `Estado` int(11) NOT NULL,
  `fechaSolicitud` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (7,1,2000,'O',0,'2015-08-11'),(8,1,2000,'C',0,'2015-08-11'),(9,1,1000,'C',0,'2015-08-11');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `Descripcion` varchar(2000) COLLATE utf8mb4_bin NOT NULL,
  `Precio` int(11) NOT NULL,
  `NombreImagen` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `Referencia` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `UnidadVenta` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `Categoria` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'BOLIGRAFO TRAZO 0,38mm ','RETRACTIL TINTA AZUL COLORES SURTIDOS',1000,'b-5274.png','5274','CAJA x 40','ESFEROS'),(2,'BOLIGRAFO TRAZO 0,7 mm ','TINTA AZUL',2000,'bp-9017.png','BP-9017','CAJA x 12','ESFEROS'),(3,'BOLIGRAFO ESTUCHE x 7 ','TINTA DE COLOR EN GEL, SURTIDOS',3000,'gp-0379.png','GP-0379','ESTUCHE x 7','ESFEROS'),(4,'BOLIGRAFO TRAZO 0,5mm ','TINTA NEGRA',4000,'gp-1350.png','GP-1350','CAJA x 12','ESFEROS'),(5,'BOLIGRAFO ESTUCHE x 12 ','TINTA DE COLOR EN GEL, PARA ESCRITURA, DISEÑO Y DIVERSION',5000,'gp-1127.png','GP-1127','ESTUCHE x 12','ESFEROS'),(6,'BOLIGRAFO GEL TRAZO 0,5mm ','TINTA NEGRA ',1000,'gp-1008.png','GP-1008','CAJA x 12','ESFEROS'),(7,'BOLIGRAFO TRAZO 0,5mm ','TINTA AZUL, COLORES SURTIDOS ',2000,'w-553.png','W-553','CAJA x 12','ESFEROS'),(8,'BOLIGRAFO GEL TRAZO 0,5mm ','TINTA NEGRA',3000,'ho-282.png','HO-282','CAJA x 12','ESFEROS'),(9,'BOLIGRAFO DE GEL (LETO) TRAZO 0,38mm ','TINTA NEGRA',4000,'gp-2508.png','GP-2508','CAJA x 12','ESFEROS'),(10,'BOLIGRAFO GEL TRAZO 1,0mm ','TINTA NEGRA  ',5000,'agp13604.png','AGP13604','CAJA x 12','ESFEROS'),(11,'BOLIGRAFO x 4 MINAS ','VERDE, AZUL, ROJO Y NEGRA, TRAZO 0,7mm',1000,'bp-8030.png','BP-8030','CAJA x 12','ESFEROS'),(12,'BOLIGRAFO TRAZO 0,7mm ','RETRACTIL, TINTA AZUL, COLORES SURTIDOS',2000,'ho-555.png','HO-555','CAJA x 24','ESFEROS'),(13,'BOLIGRAFO TRAZO 0,7mm ','RETRACTIL, TINTA AZUL, COLORES SURTIDOS',3000,'v-702.png','V-702 VEIAO','CAJA x 40','ESFEROS'),(14,'BOLIGRAFO TRAZO 0,7mm ','RETRACTIL, TINTA AZUL, COLORES SURTIDOS',4000,'bp-9010.png','BP-9010','CAJA x 60','ESFEROS'),(15,'BOLIGRAFO TINTA NEGRA TRAZO ','0,5mm + REPUESTO ',5000,'dominic dp-015.png','DOMINIC DP-015','ESTUCHE x 10 + REPUESTO x 10 ','ESFEROS'),(16,'BOLIGRAFO TRAZO 0,7mm ','RETRACTIL, TINTA AZUL, COLORES SURTIDOS',1000,'wz-2081b.png','WZ-2081B','CAJA x 24','ESFEROS'),(17,'BOLIGRAFO DE GEL TRAZO 0,5mm ','TINTA NEGRA',2000,'g-2501.png','G-2501','CAJA x 12','ESFEROS'),(18,'BOLIGRAFO TRAZO 0,5mm ','RETRACTIL, TINTA AZUL',3000,'b-7505.png','B-7505','CAJA x 60','ESFEROS'),(19,'BOLIGRAFO TRAZO 0,5mm ','RETRACTIL, TINTA AZUL, COLORES SURTIDOS',4000,'b-5679.png','B-5679','CAJA x 60','ESFEROS'),(20,'BOLIGRAFO TRAZO 0,5mm ','RETRACTIL, TINTA AZUL, COLORES SURTIDOS',5000,'b-5296.png','B-5296','CAJA x60','ESFEROS'),(21,'BOLIGRAFO TRAZO 0,7mm ','RETRACTIL, TINTA NEGRA Y AZUL',1000,'b-5677.png','B-5677','CAJA x 60','ESFEROS'),(22,'BOLIGRAFO TRAZO 0,5mm ','RETRACTIL, TINTA AZUL, COLORES SURTIDOS',2000,'b-7509.png','B-7509','CAJA x 60','ESFEROS'),(23,'BOLIGRAFO TRAZO 0,7mm ','RETRACTIL, TINTA AZUL',3000,'hbj-206.png','HBJ-206','CAJA x 50','ESFEROS'),(24,'BOLIGRAFO DE TINTAS DE COLORES POR 6 ','TRAZO 0,7mm',4000,'bp-9017-6.png','BP-9017-6','ESTUCHE x 6','ESFEROS'),(25,'BOLIGRAFO EN GEL TRAZO 0,5mm ','TINTA AZUL ',5000,'gp-99.png','GP-99','CAJA x 50','ESFEROS'),(26,'BOLIGRAFO TRAZO 0,7mm ','RETRACTIL, TINTA AZUL, COLORES SURTIDOS',1000,'bp-2003.png','BP-2003','CAJA x 40','ESFEROS'),(27,'BOLIGRAFO TRAZO 0,7mm ','RETRACTIL, TINTA NEGRA, COLORES SURTIDOS',2000,'ho-587.png','HO-587','CAJA x 24','ESFEROS'),(28,'BOLIGRAFO TRAZO 0,5mm ','TINTA NEGRA',3000,'gp-009-bk.png','GP-009-BK','CAJA x 12','ESFEROS'),(29,'BOLIGRAFO TRAZO 0,5mm ','TINTA AZUL ',4000,'gp-009-bl.png','GP-009-BL','CAJA x 12','ESFEROS'),(30,'BOLIGRAFO TRAZO 0,5mm ','TINTA ROJA',5000,'gp-009-r.png','GP-009-R','CAJA x 12','ESFEROS'),(31,'BOLIGRAFO GEL TRAZO 0,5mm ','TINTA NEGRA + RESPUESTO ',1000,'dp-407a.png','DP-407A','ESTUCHE x 4 + REPUESTO x 4','ESFEROS'),(32,'BOLIGRAFO DISEÑO CURVO EJECUTIVO ','TINTA AZUL',2000,'bne.png','BNE','UNIDAD','ESFEROS'),(33,'BOLIGRAFO EJECUTIVO ROJO ','TINTA AZUL ',3000,'bre.png','BRE','CAJA x 50','ESFEROS'),(34,'BOLIGRAFO EJECUTIVO  DORADO ','TINTA NEGRA',4000,'bde.png','BDE','CAJA x 50','ESFEROS'),(35,'BOLIGRAFO EJECUTIVO ESTILO GANSO','TINTA NEGRA',5000,'bgso.png','BGSO','CAJA x 50','ESFEROS'),(36,'BOLIGRAFO TRAZO 0,7mm ','RETRACTIL  TINTA AZUL ',1000,'yh-891.png','YH-891','CAJA x 50','ESFEROS'),(37,'BOLIGRAFO CARS ','TINTA AZUL COLORES SURTIDOS',2000,'bsc.png','BSC','CAJA x 24','ESFEROS'),(38,'MICROPUNTA 0,1/0,2/0,3/0,4 mm ','TINTA NEGRA',3000,'micron.png','MICRON','CAJA x 12','ESFEROS'),(39,'MICROPUNTA PERMANENTE DELGADO ','TRAZO 0,5mm TINTA NEGRA',4000,'en-71part9.png','EN-71PART9','CAJA x 12','ESFEROS'),(40,'MICROPUNTA + MARCADOR ','DELGADO, TINTA NEGRA',5000,'zc-120-bk.png','ZC-120-BK','CAJA x 10','ESFEROS'),(41,'MICROPUNTA + MARCADOR ','DELGADO, TINTA AZUL',1000,'zc-120-bl.png','ZC-120-BL','CAJA x 10','ESFEROS'),(42,'MICROPUNTA + MARCADOR ','DELGADO, TINTA ROJA',2000,'zc-120-r.png','ZC-120-R','CAJA x 10','ESFEROS'),(43,'MINI BOLIGRAFO TRAZO 0,5mm ','TINTA NEGRA',3000,'gp-0097.png','GP-0097','CAJA x 12','ESFEROS'),(44,'BORRADOR 4B PEQUEÑO EN ESTUCHE x 36','N/A',4000,'4b100a-c.png','4B100A-C','ESTUCHE x 3','BORRADORES'),(45,'BORRADOR BLANCO 2B PEQUEÑO','N/A',5000,'2b e-6716.png','2B E-6716','UNIDAD','BORRADORES'),(46,'BORRADOR 4B MEDIANO GRUESO ','N/A',1000,'4b100a.png','4B100A','UNIDAD','BORRADORES'),(47,'BORRADOR BLANCO 4B DELGADO','N/A',2000,'4b mq-686.png','4B MQ-686','UNIDAD','BORRADORES'),(48,'BORRADOR BLANCO HUESO 2B DELGADO','N/A',3000,'2b mq-685.png','2B MQ-685','UNIDAD','BORRADORES'),(49,'BORRADOR BLANCO DELGADO','N/A',4000,'mq-733.png','MQ-733','UNIDAD','BORRADORES'),(50,'BORRADOR BLANCO 2B DELGADO','N/A',5000,'2b mq-702.png','2B MQ-702','UNIDAD','BORRADORES'),(51,'BORRADOR BLANCO HUESO 2B DELGADO','N/A',1000,'2b mq-373.png','2B MQ-373','UNIDAD','BORRADORES'),(52,'BORRADOR 4B COLOR BEIGE PEQUEÑO DELGADO','N/A',2000,'4b 50a.png','4B 50A','UNIDAD','BORRADORES'),(53,'BORRADOR 4B PEQUEÑO COLOR AMARILLO','N/A',3000,'4b sx-1005.png','4B SX-1005','UNIDAD','BORRADORES'),(54,'BORRADOR NEGRO 2B DELGADO','N/A',4000,'2b mq-60.png','2B MQ-60','UNIDAD','BORRADORES'),(55,'BORRADOR NEGRO 4B PEQUEÑO','N/A',5000,'4b 50a.png','4B 50A','UNIDAD','BORRADORES'),(56,'BORRADOR PLANO EN COLORES SURTIDOS','N/A',1000,'e-6133.png','E-6133','UNIDAD','BORRADORES'),(57,'BORRADOR DELGADO DISEÑO FROZEN ESTUCHE x 2','N/A',2000,'xiaodi.png','XIAODI','CAJA x 12 ','BORRADORES'),(58,'BORRADOR TIPO VIOLIN EN COLORES SURTIDOS','N/A',3000,'shangxin-sx-7009.png','SHANGXIN SX-7009','UNIDAD','BORRADORES'),(59,'ESTUCHE DE MANZANA CON MINI BORRADOR ','EN DISEÑOS DE FRUTAS CREATIVOS',4000,'yz1339.png','YZ1339','CAJA x 16','BORRADORES'),(60,'ESTUCHE x 12 COLORES HEXAGONALES',' MINI FABER CASTELL',5000,'fbc m.png','FBC M','ESTUCHE x 12','COLORES'),(61,'ESTUCHE x 12 COLORES HEXAGONALES ','FABER CASTELL GRANDE',5000,'fbc g.png','FBC G','ESTUCHE x 12','COLORES'),(62,'ESTUCHE x 10 COLORES TRIANGULARES ','GRUESOS DE PRINCESAS Y MICKEY ',5000,'art-nr-77010.png','ART-NR-77010','ESTUCHE x 10','COLORES'),(63,'ESTUCHE x 12 COLORES PEQUEÑOS ','PUNTA SENCILLA DELGADA REDONDOS',5000,'nc-3512.png','NO NC3512','ESTUCHE x 12','COLORES'),(64,'CRAYOLAS COLORES SURTIDOS x 12 FROZEN','N/A',3000,'3012-23.png','NO:3012-23','ESTUCHE x 12','COLORES'),(65,'FOLDER LEGAJADOR PLASTICO DE CLIP METALICO','CON BOLSILLO INTERIOR EN COLORES SURTIDOS TRASLUCIDOS TAMAÑO A4',4000,'xh221-3.png','XH221-3','UNIDAD','CARPETAS'),(66,'CARPETA PLASTICA DE CLIP GIRATORIO EN COLORES SURTIDOS ','TAMAÑO A4',5000,'xh425a.png','XH425A','UNIDAD','CARPETAS'),(67,'GANCHO LEGAJADOR PLASTICO DE COLORES ','ROSA/AZUL/NARANJA/VERDE/TRANSPARENTE',1000,'legajador-color.png','LEGAJADOR COLOR','ESTUCHE x 10','CARPETAS'),(68,'SOBRE PLASTICO HORIZONTAL CON CIERRE DE CORDON ','EN COLORES SURTIDOS TRASLUCIDOS DE 33CM DE ANCHO X 25CM',2000,'5522 yibang.png','5522 YIBANG','ESTUCHE x 12','CARPETAS'),(69,'SOBRE PLASTICO HORIZONTAL CIERRE BROCHE ','EN COLORES SURTIDOS TRASLUCIDPS DE 32CM DE ANCHO X 22,5CM',3000,'dapai.png','DAPAI','ESTUCHE x 12','CARPETAS'),(70,'CARPETA PLASTICA A4 PARA DOCUMENTOS DE 20/30 Y 40 BOLSILLOS ','EN COLORES SURTIDOS ',4000,'ab20a-30a-40a.png','AB20A/30A/40A','ESTUCHE x 30/20/40','CARPETAS'),(71,'CARPETA HORIZONTAL PLASTICA CIERRE DE BROCHE ','EN COLORES SOLIDOS SURTIDOS  DE 31,5CM DE ANCHO X 23CM',5000,'yp-234.png','YP-234','UNIDAD','CARPETAS'),(72,'SOBRE HORIZONTAL PLASTICO CIERRE DE BROCHE ','COLOR BLANCO TRASLUCIDO DE 33CM DE ANCHO X 23CM',1000,'yp-1812.png','YP-1812','UNIDAD','CARPETAS'),(73,'SOBRE PLASTICO ABIERTO TRANSPARENTE','N/A',2000,'ype310.png','YPE310','UNIDAD','CARPETAS'),(74,'SOBRE PLASTICO ABIERTO IMPRESO EN DIFERENTES DISEÑOS Y COLORES ','TAMAÑO A4',3000,'yj-310-14.png','YJ-310-14','UNIDAD','CARPETAS'),(75,'ARCHIVADORES DE FUELLE EXPANDIBLES TAMAÑO MEDIA CARTA ','EN COLORES SURTIDOS CIERRE DE BROCHE DE 12 DIVISIONES',4000,'no b4406.png','NO B4406','UNIDAD','CARPETAS'),(76,'COLORIDOS ROLLOS DE CINTA ADHESIVA ','TRANSPARENTE 12 ROLLOS ANCHO 8MM',5000,'cintas colores.png','CINTAS COLORES','ESTUCHE x 12','CINTAS'),(77,'COLORIDOS ROLLOS DE CINTA SUPER ADHESIVA ','TRANSPARENTE 6 ROLLOS ANCHO 12 MM ',5000,'cintas-colores-pequeñas.png','CINTAS COLORES PEQUE�AS','ESTUCHE x 6 ','CINTAS'),(78,'CINTA DECORATIVA DIFERENTES DISEÑOS DE 14MM','N/A',5000,'CINTAS PEGANTES DECORATIVAS.png','CINTAS PEGANTES DECORATIVAS','ESTUCHE x 10','CINTAS'),(79,'COMPAS CON PORTALAPIZ','N/A',5000,'bd-812.png','BD-812','ESTUCHE ','COMPAS'),(80,'COMPAS CON PORTALAPIZ COLOR GRIS CON VERDE','N/A',3000,'2506.png','2506','ESTUCHE ','COMPAS'),(81,'COMPAS CON PORTAMINAS TRAZO 0,7MM + REPUESTO ','COLOR GRIS',1000,'2508.png','2508','ESTUCHE ','COMPAS'),(82,'KIT COMPAS CON PORTAMINAS TRAZO 0,5MM',' + REGLAS + TRANSPORTADOR + REPUESTO + BORRADOR',2000,'f6.png','F6','ESTUCHE ','COMPAS'),(83,'KIT COMPAS CON PORTAMINAS TRAZO 0,5MM ','+ REPUESTO, COLORES SURTIDOS',3000,'189.png','NO 189','ESTUCHE ','COMPAS'),(84,'LAPICES HB DIFERENTES MOTIVOS ','CON BORRADOR x 6 Y x 9 REDONDO',4000,'lapices disney.png','LAPICES DISNEY','ESTUCHE x 6 Y x 9','LAPICES'),(85,'LAPICES HB DIFERENTES MOTIVOS ','SIN BORRADOR REDONDO',5000,'lapices disney.png','LAPICES DISNEY','ESTUCHE x 9','LAPICES'),(86,'LAPICES 2B HEXAGONAL ESTUCHE x 10','N/A',1000,'chunghwa 101 2b.png','CHUNGHWA 101 2B','ESTUCHE x 10','LAPICES'),(87,'KIT x 10 LAPICES HB TRIANGULAR ','+ TAJALAPIZ + BORRADOR 4B FBC',2000,'fbc ltb.png','FBC LTB','ESTUCHE x 10 ','LAPICES'),(88,'PEGANTE EN BARRA BLANCO DE 9G GLUE STICK','N/A',3000,'wei3.png','WEI3','CAJA x 24','PEGANTES'),(89,'PEGANTE EN BARRA DE CUERPO TRASLUCIDO DE 9G',', COLORES SURTIDOS',4000,'no 7165.png','NO 7165','CAJA x 24','PEGANTES'),(90,'PEGANTE EN BARRA TRANSPARENTE DE CUERPO TRASLUCIDO',', COLORES ACIDOS DE 9G',5000,'gs-309.png','GS-309','CAJA x 24','PEGANTES'),(91,'PEGANTE EN BARRA BLANCO DE 15G','N/A',1000,'asg97111.png','ASG97111','CAJA x 24','PEGANTES'),(92,'PEGANTE EN BARRA DE 15G PRESENTACION EN COLORES SURTIDOS','N/A',2000,'gs-215.png','GS-215','CAJA x 24','PEGANTES'),(93,'PORTAMINAS TRAZO 0,5 mm, COLORES SURTIDOS','N/A',3000,'tm01201.png','TM01201','CAJA x 40','PORTAMINAS'),(94,'PORTAMINAS TRAZO 0,5mm, EN DIFERENTES MOTIVOS Y COLORES ','N/A',4000,'bc-820.png','BC-820','CAJA x 50','PORTAMINAS'),(95,'PORTAMINAS TRAZO 0,5mm, COLORES SURTIDOS ','N/A',5000,'md-H7171.png','MIDA MD-H7171','CAJA x 48','PORTAMINAS'),(96,'PORTAMINAS TRAZO 0,5/0,7/2,0mm',', CON CLIP DE BOLSILLO EN COLORES SURTIDOS',1000,'double-click-218.png','DOUBLE CLICK BL-218','CAJA x 36','PORTAMINAS'),(97,'PORTAMINAS TRAZO 0,5mm',', CON CUERPO ANTIDESLIZANTE EN COLORES SURTIDOS',2000,'bl-557.png','BL-557','CAJA x 48','PORTAMINAS'),(98,'PORTAMINAS TRAZO 0,5mm',', CON CALENDARIO EN COLORES SURTIDOS',3000,'fluorescence.png','MP-095 FLUORESCENCE','CAJA x 60','PORTAMINAS'),(99,'REPUESTO DE MINAS 0,5mm/0,7mm ','EN HB Y 2B TAPA RETRACTIL',4000,'ho-320.png','HO-320','CAJA x 10','PORTAMINAS'),(100,'PORTAMINAS TRAZO 0,5/0,7mm',', EN DIFERENTES DISEÑOS CON CLIP DE BOLSILLO ',5000,'zdp3294.png','ZDP3294','CAJA x 50','PORTAMINAS'),(101,'PORTAMINAS TRAZO 0,5mm',', CON LLAVERO LABIOS DECORATIVOS EN BLANCO Y NEGRO',1000,'tm01380.png','TM01380','CAJA x 40','PORTAMINAS'),(102,'PORTAMINAS TRAZO 0,5mm 2B ESTILO MADERA ','N/A',2000,'zd107.png','ZD107','CAJA x 12','PORTAMINAS'),(103,'PORTAMINAS TRAZO 2,0mm CON AFILAMINAS EN AZUL Y NEGRO','N/A',3000,'bl-520.png','BL-520','CAJA x 48','PORTAMINAS'),(104,'REPUESTO MINAS NEGRAS 0,5mm','N/A',4000,'no 3309.png','NO 3309','CAJA x 45 ','PORTAMINAS'),(105,'REPUESTO MINAS COLORES/NEGRAS 0,7mm','N/A',5000,'no 3309.png','NO 3309','CAJA x 45 ','PORTAMINAS'),(106,'KIT PORTAMINAS + MINAS TRAZO 1.8 mm MINA PLANA COLORE NEGRO ','N/A',5000,'pencil-khat.png','PENCIL KHAT AUTO 2B','ESTUCHE','PORTAMINAS'),(107,'KIT PORTAMINAS',' + REPUESTO + BORRADORES + AFILAMINAS 2mm ESTILO LAPIZ',1000,'tm01060.png','TM01060','ESTUCHE','PORTAMINAS'),(108,'RESALTADOR DELGADO DOBLE PUNTA',', REDONDA Y BISELADA, TAPA CLIP, 5 COLORES',2000,'or-510-5.png','OR-510-5','ESTUCHE x 5','RESALTADORES'),(109,'RESALTADOR PUNTA MEDIANA BISELADA, 5 COLORES','N/A',3000,'st-800-5.png','ST-800-5','ESTUCHE x 5','RESALTADORES'),(110,'RESALTADOR DE CUERPO TRASLUCIDO PLANO',', PUNTA BISELADA MEDIANA, TAPA CILP, 4 COLORES',4000,'st-886.png','ST-886','ESTUCHE x 4','RESALTADORES'),(111,'RESALTADOR TIPO ESFERO',', TAPA CLIP, PUNTA MEDIANA BISELADA, 5 COLORES ',5000,'or-506-5.png','OR-506-5','ESTUCHE x 5','RESALTADORES'),(112,'RESALTADOR TIPO CRAYOLA, TAPA CLIP, 6 COLORES ','N/A',1000,'cs-183.png','CS-183','ESTUCHE x 6','RESALTADORES'),(113,'RESALTADOR DOBLE PUNTA, DOBLE COLOR, PUNTA BISELADA DELGADA ','N/A',2000,'cs-173.png','CS-173','CAJA x 12','RESALTADORES'),(114,'RESALTADOR TIPO CRAYOLA, TAPA CLIP, 12 COLORES','N/A',3000,'cs-183.png','CS-183','CAJA x 12','RESALTADORES'),(115,'LAPIZ CORRECTOR LIQUIDO REDONDO x 15ml',', TAPA CLIP EN COLORES ',4000,'xb-1509.png','XB-1509','CAJA x 24','CORRECTOR'),(116,'CORRECTOR 2 EN 1 LAPIZ + PINCEL',', ESTUCHE EN COLORES ',5000,'2170.png','NO 2170','CAJA x 12','CORRECTOR'),(117,'LAPIZ CORRECTOR LIQUIDO PLANO x 12ml',', TAPA CLIP EN COLORES',1000,'no 2084.png','NO 2084','CAJA x 24','CORRECTOR'),(118,'LAPIZ CORRECTOR LIQUIDO PLANO x 12ml',', TAPA DECORATIVA EN COLORES',2000,'2181.png','NO 2181','CAJA x 24','CORRECTOR'),(119,'ESTUCHE x 3 TIJERAS PARA NI�OS',', COLORES SURTIDOS ',5000,'2000.png','2000','ESTUCHE x 3','TIJERAS'),(120,'TIJERA DE PUNTA INTERCAMBIABLE DIFERENTES CORTES','N/A',1000,'4067.png','NO 4067','ESTUCHE x 3 ','TIJERAS'),(121,'MARCADORES PUNTA MEDIANA DE 12 COLORES','N/A',2000,'or-399-12.png','OR-399-12','ESTUCHE x 12','MARCADORES'),(122,'KIT MARCADORES x 12',', PUNTA MEDIANA, TAPA CONEJO, COLORES SURTIDOS',3000,'qinghua 701A-12.png','QINGHUA 701A-12','ESTUCHE x 12','MARCADORES'),(123,'KIT MARCADORES PUNTA MEDIANA, 12 COLORES','N/A',4000,'bc-626.png','BC-626','ESTUCHE x 12','MARCADORES'),(124,'KIT PINCELES PLANOS, BROCHA SUAVE',', DIFERENTES TAMAÑOS ',5000,'yinghua 820.png','YINGHUA 820','ESTUCHE x 6 ','KIT'),(125,'KIT 2 ESCUADRAS PEQUE�AS ','COLOR AZUL CLARO',1000,'zh-886a.png','ZH-886A','ESTUCHE','KIT'),(126,'KIT CARTUCHERA',': 2 LAPICES + REGLA + BORRADOR + TAJALAPIZ + STICKERS DIFERENTES MOTIVOS',2000,'8828.png','8828','UNIDAD','KIT'),(127,'ACUARELAS COLORES SURTIDOS + PINCEL','N/A',3000,'en-71astm-D4236.png','EN-71.ASTM-D4236','ESTUCHE x 12','KIT'),(128,'PERFORADORA MINI DE 1 HUECO ','BLANCA Y AZUL PARA DE 10 HOJAS',4000,'0111.png','NO 0111','CAJA x 12','KIT'),(129,'TAJALAPIZ + BORRADOR + ESCOBILLA',', MOTIVOS FROZEN Y PRINCESITA SOFIA, COLORES SURTIDOS ',5000,'ls-612.png','LS-612','UNIDAD','TAJALAPIZ'),(130,'ESTUCHE TAJALAPIZ + BORRADOR',', COLORES SURTIDOS',1000,'tt-785.png','TT-785','UNIDAD','TAJALAPIZ'),(131,'TAJALAPIZ + PORTALAPIZ',', COLORES SURTIDOS',2000,'tt-715.png','TT-715','UNIDAD','TAJALAPIZ'),(132,'TAJALAPIZ + BORRADOR',', COLORES SURTIDOS, FORMA HUEVO CON CARITA',3000,'dms-021.png','DMS-021','UNIDAD','TAJALAPIZ'),(133,'TAJALAPIZ CON DEPOSITO COLORES AZUL Y ROJO','N/A',4000,'fbc TZ.png','FBC TZ','UNIDAD','TAJALAPIZ'),(134,'TAJALAPIZ CON DEPOSITO COLORES SURTIDOS','N/A',5000,'ty-816.png','TY-816','UNIDAD','TAJALAPIZ');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula` int(11) NOT NULL,
  `Email` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `Contrasenna` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `Nombres` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `Telefono` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `Celular` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `Direccion` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `Rol` varchar(1) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,123465,'test@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','asdad','232121','321321','ad1a32sd13a2d','A');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'catalogo'
--
/*!50003 DROP PROCEDURE IF EXISTS `getBillDetail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getBillDetail`(
    IN _idOrder INT 
)
BEGIN
   
    SELECT P.Referencia, P.Nombre, P.Precio, DE.CantidadProducto, (P.Precio * DE.CantidadProducto) AS 'PrecioTotalProducto'
    FROM Producto P INNER JOIN DetallePedido DE ON P.idProducto = DE.idProducto
                    INNER JOIN Pedido PE ON DE.idPedido = PE.idPedido
    WHERE PE.idPedido = _idOrder;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getBillHeader` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getBillHeader`(
    IN _idOrder INT 
)
BEGIN

   
    SELECT PE.idPedido, PE.fechaSolicitud, PE.TotalPedido, U.Nombres, U.Cedula, U.Telefono, U.Celular, U.Direccion, U.Email 
        FROM Pedido PE INNER JOIN Usuario U 
        ON PE.idUsuario = U.idUsuario
        WHERE PE.idPedido = _idOrder;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getOrders` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getOrders`()
BEGIN
   
	SELECT P.idPedido, P.fechaSolicitud, P.TotalPedido, U.Email FROM Pedido P
		INNER JOIN Usuario U ON P.idUsuario = U.idUsuario
		WHERE P.TipoPedido = 'O' AND P.estado = '0';

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getProductById` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getProductById`(
    IN _idProduct INT
)
BEGIN
   
    SELECT * FROM Producto WHERE idProducto = _idProduct;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getProducts` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getProducts`(
    IN _StartRegistry INT,
    IN _NumberRegistry INT,
    IN _IndicatorCategory INT
)
BEGIN
    
    DECLARE _Category VARCHAR(100) DEFAULT NULL;
    
    IF _IndicatorCategory = 0 THEN
		SET _Category = 'ALL';
    END iF;

	IF _IndicatorCategory = 1 THEN
		SET _Category = 'ESFEROS';
    END iF;
	
	IF _IndicatorCategory = 2 THEN
		SET _Category = 'BORRADORES';
    END iF;

	IF _IndicatorCategory = 3 THEN
		SET _Category = 'COLORES';
    END iF;
	
	IF _IndicatorCategory = 4 THEN
		SET _Category = 'CARPETAS';
    END iF;

	IF _IndicatorCategory = 5 THEN
		SET _Category = 'CINTAS';
    END iF;
	
	IF _IndicatorCategory = 6 THEN
		SET _Category = 'COMPAS';
    END iF;


	IF _IndicatorCategory = 7 THEN
		SET _Category = 'LAPICES';
    END iF;
	
	IF _IndicatorCategory = 8 THEN
		SET _Category = 'PEGANTES';
    END iF;

	IF _IndicatorCategory = 9 THEN
		SET _Category = 'PORTAMINAS';
    END iF;
	
	IF _IndicatorCategory = 10 THEN
		SET _Category = 'RESALTADORES';
    END iF;

	IF _IndicatorCategory = 11 THEN
		SET _Category = 'CORRECTOR';
    END iF;
	
	IF _IndicatorCategory = 12 THEN
		SET _Category = 'TIJERAS';
    END iF;

	IF _IndicatorCategory = 13 THEN
		SET _Category = 'MARCADORES';
    END iF;
	
	IF _IndicatorCategory = 14 THEN
		SET _Category = 'KIT';
    END iF;
	
	IF _IndicatorCategory = 15 THEN
		SET _Category = 'TAJALAPIZ';
    END iF;

	IF _Category = 'ALL' THEN
		SELECT * FROM Producto LIMIT _StartRegistry, _NumberRegistry;
		ELSE
		SELECT * FROM Producto WHERE Categoria = _Category LIMIT _StartRegistry, _NumberRegistry;
	END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getProductsCategory` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getProductsCategory`(
    IN _StartRegistry INT,
    IN _NumberRegistry INT,
    IN _Category VARCHAR(100)
)
BEGIN
   
    SELECT * FROM Producto WHERE Categoria = _Category LIMIT _StartRegistry, _NumberRegistry;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getTotalProducts` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getTotalProducts`(
    IN _IndicatorCategory INT
)
BEGIN

	DECLARE _Category VARCHAR(100) DEFAULT NULL;
    
    IF _IndicatorCategory = 0 THEN
		SET _Category = 'ALL';
    END iF;

	IF _IndicatorCategory = 1 THEN
		SET _Category = 'ESFEROS';
    END iF;
	
	IF _IndicatorCategory = 2 THEN
		SET _Category = 'BORRADORES';
    END iF;

	IF _IndicatorCategory = 3 THEN
		SET _Category = 'COLORES';
    END iF;
	
	IF _IndicatorCategory = 4 THEN
		SET _Category = 'CARPETAS';
    END iF;

	IF _IndicatorCategory = 5 THEN
		SET _Category = 'CINTAS';
    END iF;
	
	IF _IndicatorCategory = 6 THEN
		SET _Category = 'COMPAS';
    END iF;

	IF _IndicatorCategory = 7 THEN
		SET _Category = 'LAPICES';
    END iF;
	
	IF _IndicatorCategory = 8 THEN
		SET _Category = 'PEGANTES';
    END iF;

	IF _IndicatorCategory = 9 THEN
		SET _Category = 'PORTAMINAS';
    END iF;
	
	IF _IndicatorCategory = 10 THEN
		SET _Category = 'RESALTADORES';
    END iF;

	IF _IndicatorCategory = 11 THEN
		SET _Category = 'CORRECTOR';
    END iF;
	
	IF _IndicatorCategory = 12 THEN
		SET _Category = 'TIJERAS';
    END iF;

	IF _IndicatorCategory = 13 THEN
		SET _Category = 'MARCADORES';
    END iF;
	
	IF _IndicatorCategory = 14 THEN
		SET _Category = 'KIT';
    END iF;
	
	IF _IndicatorCategory = 15 THEN
		SET _Category = 'TAJALAPIZ';
    END iF;
	
	IF _Category = 'ALL' THEN
		SELECT count(*) AS 'totalProductos' FROM Producto;
	ELSE
		SELECT count(*) AS 'totalProductos' FROM Producto WHERE Categoria = _Category;
	END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertInventory` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertInventory`(
	IN _idProducto INT,
	IN _CantidadExistente INT
)
BEGIN
   
	INSERT INTO Inventario (idProducto, CantidadExistente)
	VALUES (_idProducto, _CantidadExistente);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertOrder` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertOrder`(
    IN _idUsuario INT,
    IN _TotalPedido INT,
    IN _TipoPedido VARCHAR(1), 
    IN _Estado INT, 
    IN _fechaSolicitud VARCHAR(10)
)
BEGIN
   
    DECLARE _maxIdPedido INT DEFAULT 0;
    INSERT INTO Pedido (idUsuario, TotalPedido, TipoPedido, Estado, fechaSolicitud)
    VALUES (_idUsuario, _TotalPedido, _TipoPedido, _Estado, _fechaSolicitud);

    SET _maxIdPedido = (SELECT MAX(idPedido) FROM Pedido);
    IF _maxIdPedido = 0 THEN
        SELECT 1 AS 'idPedido';
    ELSE
        SELECT _maxIdPedido AS 'idPedido';
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertProduct` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProduct`(
	IN _Nombre VARCHAR(100),
	IN _Descripcion VARCHAR(2000), 
	IN _Precio INT,
	IN _NombreImagen VARCHAR(1000),
	IN _Referencia VARCHAR(100), 
	IN _UnidadVenta VARCHAR(100), 
        IN _Categoria VARCHAR(100)
)
BEGIN
   
	INSERT INTO Producto (Nombre, Descripcion, Precio, NombreImagen, Referencia, UnidadVenta, Categoria)
	VALUES (_Nombre, _Descripcion, _Precio, _NombreImagen, _Referencia, _UnidadVenta, _Categoria);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertProductDetail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProductDetail`(
    IN _idPedido INT, 
    IN _idProducto INT,
    IN _cantidad INT
        
)
BEGIN
   
	INSERT INTO DetallePedido (idPedido, idProducto, CantidadProducto)
	VALUES (_idPedido, _idProducto, _cantidad);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUser`(
	IN _Cedula INT, 
	IN _Email VARCHAR(500), 
	IN _Contrasenna VARCHAR(100), 
	IN _Nombres VARCHAR(500), 
	IN _Telefono VARCHAR(20), 
	IN _Celular VARCHAR(30), 
	IN _Direccion VARCHAR(300),
        IN _Rol VARCHAR(1)
)
BEGIN
   
	INSERT INTO Usuario (Cedula, Email, Contrasenna, Nombres, Telefono, Celular, Direccion, Rol)
	VALUES (_Cedula, _Email, _Contrasenna, _Nombres, _Telefono, _Celular, _Direccion, _Rol);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updatePurchaseOrder` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePurchaseOrder`(
    IN _idPedido INT
)
BEGIN
   
    UPDATE Pedido SET estado = 1 WHERE idPedido = _idPedido;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `validateUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `validateUser`(
	IN _email VARCHAR(500), 
        IN _contrasenna VARCHAR(100), 
        IN _indicadorOperacion INT
)
BEGIN
   
    DECLARE _indicadorExistencia INT DEFAULT 0;
    DECLARE _Rol VARCHAR(1) DEFAULT NULL;
    DECLARE _idUsuario INT DEFAULT 0;

    IF _indicadorOperacion = 0 THEN
        SET _indicadorExistencia = (SELECT COUNT(*) FROM Usuario WHERE Email = _email);
        IF _indicadorExistencia = 0 THEN
            SELECT 0 AS 'idUsuario', '00' AS 'CodigoRespuesta', '-' AS 'Rol';
        ELSE
            SELECT 0 AS 'idUsuario', '10' AS 'CodigoRespuesta', '-' AS 'Rol';
        END IF;
    END IF;

    IF _indicadorOperacion = 1 THEN
        SET _indicadorExistencia = (SELECT COUNT(*) FROM Usuario WHERE Email = _email AND Contrasenna = _contrasenna);
        IF _indicadorExistencia <> 0 THEN
            SET _Rol = (SELECT Rol FROM Usuario WHERE Email = _email AND Contrasenna = _contrasenna);
            SET _idUsuario = (SELECT idUsuario FROM Usuario WHERE Email = _email AND Contrasenna = _contrasenna);
            SELECT _idUsuario AS 'idUsuario', '00' AS 'CodigoRespuesta', _Rol AS 'Rol'; 
        ELSE
            SELECT 0 AS 'idUsuario', '20' AS 'CodigoRespuesta', '-' AS 'Rol';
        END IF;
    END IF;

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

-- Dump completed on 2015-08-12 16:41:31
