-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: nucleoSales
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `EstadoProspecto`
--

DROP TABLE IF EXISTS `EstadoProspecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EstadoProspecto` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EstadoProspecto`
--

LOCK TABLES `EstadoProspecto` WRITE;
/*!40000 ALTER TABLE `EstadoProspecto` DISABLE KEYS */;
INSERT INTO `EstadoProspecto` VALUES (1,'Intentando Contactar','Se ah intentado contactar'),(2,'Contactado','Prospecto contactado'),(3,'Contactar despues','contactar despues al pros');
/*!40000 ALTER TABLE `EstadoProspecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Metas`
--

DROP TABLE IF EXISTS `Metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Metas` (
  `idMetas` int(11) NOT NULL AUTO_INCREMENT,
  `idVendedor` int(11) NOT NULL,
  `Ventas` int(11) NOT NULL,
  `Prospectos` int(11) NOT NULL,
  `Citas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idMetas`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Metas`
--

LOCK TABLES `Metas` WRITE;
/*!40000 ALTER TABLE `Metas` DISABLE KEYS */;
INSERT INTO `Metas` VALUES (11,3,4,30,10,'2016-08-01'),(12,3,2,5,8,'2001-08-01'),(13,5,1,1,1,'2016-08-01'),(17,4,50,30,70,'2016-08-01'),(18,4,20,40,50,'2016-09-01'),(19,5,2,2,2,'2016-09-01'),(20,3,9,9,9,'2016-09-01'),(22,4,1,1,1,'2016-07-01'),(23,3,10,10,10,'2016-07-01'),(24,3,1,1,1,'2016-06-01'),(25,5,5,10,10,'2016-10-01'),(26,3,9,9,7,'2016-10-01');
/*!40000 ALTER TABLE `Metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Moneda`
--

DROP TABLE IF EXISTS `Moneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Moneda` (
  `idmoneda` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `simbolo` varchar(8) NOT NULL,
  PRIMARY KEY (`idmoneda`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Moneda`
--

LOCK TABLES `Moneda` WRITE;
/*!40000 ALTER TABLE `Moneda` DISABLE KEYS */;
INSERT INTO `Moneda` VALUES (1,'MXN','$'),(2,'USD','$');
/*!40000 ALTER TABLE `Moneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `Defecha` date NOT NULL,
  `Dehora` time NOT NULL,
  `Afecha` date NOT NULL,
  `AHora` time NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `idprospecto` int(11) NOT NULL,
  PRIMARY KEY (`idcita`),
  KEY `idcontacto` (`idcontacto`),
  KEY `idprospecto` (`idprospecto`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`idcontacto`) REFERENCES `contacto` (`idcontacto`),
  CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`idprospecto`) REFERENCES `prospecto` (`idprospecto`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (18,'2016-08-05','17:00:00','2016-08-05','17:00:00','Con el se;or osito',90,56),(29,'2016-08-11','22:30:00','2016-08-11','22:30:00','nino nini so',98,56),(32,'2016-08-22','15:40:00','2016-08-25','15:40:00','cita con eduardo Abad',109,63),(33,'2016-08-15','17:09:00','2016-08-16','17:09:00','Cita con la empresa sin errores',108,62),(34,'2016-08-11','17:00:00','2016-08-11','18:00:00','Hola papasito',108,62),(36,'2016-08-27','22:00:00','2016-08-27','22:00:00','Junta con mujer doÃ±a 10',98,56),(40,'2016-08-30','17:00:00','2016-08-30','17:00:00','sii',112,65),(51,'2016-08-18','14:00:00','2016-08-18','14:00:00','Comida',111,64),(52,'2016-08-18','14:00:00','2016-08-18','14:00:00','Instalacion',111,64),(53,'2016-08-10','10:00:00','2016-08-10','10:00:00','Instalaciones',122,64),(56,'2016-08-31','10:30:00','2016-08-31','10:30:00','hola ',48,14),(57,'2016-08-27','17:30:00','2016-08-27','17:45:00','hola',37,8),(67,'2016-08-18','13:00:00','2016-08-18','13:30:00','ya puedo hacer citas',37,8),(69,'2016-08-17','12:00:00','2016-08-17','13:30:00','inserte cita',122,64),(70,'2016-08-05','13:00:00','2016-08-05','14:00:00','new',64,29),(71,'2016-08-03','13:00:00','2016-08-03','14:00:00','que pedo',58,23),(72,'2016-08-18','09:00:00','2016-08-18','12:00:00','Direc calendario',98,56),(75,'2016-08-24','03:00:00','2016-08-24','12:30:00','hola',122,64),(77,'2016-08-04','16:00:00','2016-08-04','17:00:00','Sjdjdj',48,14),(79,'2016-08-20','13:00:00','2016-08-20','14:00:00','sdasdasd',37,8),(80,'2016-08-06','13:00:00','2016-08-06','14:00:00','asda',39,10),(81,'2016-09-14','14:00:00','2016-09-14','15:00:00','asadss',98,56),(84,'2016-09-01','13:00:00','2016-09-01','14:00:00','holas',123,70),(86,'2016-09-13','13:00:00','2016-09-13','13:00:00','cita',37,8),(87,'2016-09-07','13:00:00','2016-09-07','13:00:00','nueva',37,8),(89,'2016-09-30','22:30:00','2016-09-30','22:30:00','asa',98,56),(90,'2016-10-22','19:39:00','2016-10-22','19:39:00','Ok',177,77);
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivosOportunidad`
--

DROP TABLE IF EXISTS `archivosOportunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivosOportunidad` (
  `idarchivosOportunidad` int(11) NOT NULL AUTO_INCREMENT,
  `idoportunidad` int(11) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  PRIMARY KEY (`idarchivosOportunidad`),
  KEY `idoportunidad` (`idoportunidad`),
  CONSTRAINT `archivoportunidad1` FOREIGN KEY (`idoportunidad`) REFERENCES `oportunidad` (`idoportunidad`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivosOportunidad`
--

LOCK TABLES `archivosOportunidad` WRITE;
/*!40000 ALTER TABLE `archivosOportunidad` DISABLE KEYS */;
INSERT INTO `archivosOportunidad` VALUES (1,91,'cuvas refrigeracion.docx'),(2,91,'acceso ftp selenafca hostinger.png'),(3,122,'Ã­ndice.jpg'),(4,124,'ejemplo15.png'),(5,108,'Busqueda Apartado clientes.png');
/*!40000 ALTER TABLE `archivosOportunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comisionOportunidad`
--

DROP TABLE IF EXISTS `comisionOportunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comisionOportunidad` (
  `idcomision` int(11) NOT NULL,
  `idoportunidad` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comisionOportunidad`
--

LOCK TABLES `comisionOportunidad` WRITE;
/*!40000 ALTER TABLE `comisionOportunidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `comisionOportunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configComisiones`
--

DROP TABLE IF EXISTS `configComisiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configComisiones` (
  `idcomision` int(11) NOT NULL AUTO_INCREMENT,
  `idvendedor` int(11) NOT NULL,
  `comision` float NOT NULL,
  PRIMARY KEY (`idcomision`)
) ENGINE=MyISAM AUTO_INCREMENT=656 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configComisiones`
--

LOCK TABLES `configComisiones` WRITE;
/*!40000 ALTER TABLE `configComisiones` DISABLE KEYS */;
INSERT INTO `configComisiones` VALUES (604,90,25),(603,89,25),(602,88,25),(601,87,25),(600,86,25),(599,85,25),(598,84,25),(597,83,25),(596,82,15),(595,81,25),(594,80,35),(593,79,25),(592,64,25),(591,63,25),(590,62,25),(589,61,25),(588,60,25),(587,59,25),(586,58,25),(585,57,25),(584,56,25),(583,55,25),(582,54,25),(581,53,25),(580,52,25),(579,51,25),(578,50,25),(577,49,25),(576,48,25),(575,47,25),(574,46,25),(573,45,25),(572,44,25),(571,43,25),(570,42,25),(569,41,25),(568,40,25),(567,39,25),(566,38,25),(565,37,25),(564,36,25),(563,35,25),(562,34,25),(561,33,25),(560,32,25),(559,31,25),(558,30,25),(557,28,25),(556,25,25),(555,24,25),(554,23,25),(553,22,25),(552,20,25),(551,19,25),(550,16,25),(549,15,25),(548,14,25),(547,13,25),(546,12,25),(545,5,25),(544,4,25),(543,3,25),(605,91,25),(606,92,25),(607,93,25),(608,94,0),(609,96,20),(610,96,20),(611,97,0),(612,99,50),(613,99,50),(614,101,40),(615,101,40),(616,102,40),(617,105,0),(618,105,0),(619,105,0),(620,108,0),(621,108,0),(622,108,0),(623,110,0),(624,110,0),(625,111,52),(626,112,0),(627,113,0),(628,114,0),(629,115,0),(630,116,0),(631,117,0),(632,118,5),(633,119,70),(634,120,15),(635,121,15),(636,122,15),(637,123,15),(638,124,15),(639,125,0),(640,126,0),(641,127,0),(642,128,0),(643,129,0),(644,130,0),(645,131,15),(646,132,20),(647,133,52),(648,134,20),(649,135,65),(650,136,45),(651,137,45),(652,138,14),(653,139,0),(654,140,0),(655,141,0);
/*!40000 ALTER TABLE `configComisiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configCotizacion`
--

DROP TABLE IF EXISTS `configCotizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configCotizacion` (
  `idconfigCotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `caracteristicas` text NOT NULL,
  `extras` text NOT NULL,
  `despedida` text NOT NULL,
  `firma` text NOT NULL,
  `idvendedor` int(11) NOT NULL,
  PRIMARY KEY (`idconfigCotizacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configCotizacion`
--

LOCK TABLES `configCotizacion` WRITE;
/*!40000 ALTER TABLE `configCotizacion` DISABLE KEYS */;
INSERT INTO `configCotizacion` VALUES (1,'EnviÃ³ la presente describiendo algunas caracterÃ­sticas de nuestro servicio y soporte asÃ­ como una propuesta de la opciÃ³n de 10, 20, 30, 50 Mbps simÃ©tricos Dedicados con salida redundante y 1 DirecciÃ³n IP.','1.- ConexiÃ³n a Internet de banda ancha simÃ©trica, las 24 horas los 365 dÃ­as del aÃ±o dentro de los estÃ¡n dares\n     internacionales asÃ­ como soporte tÃ©cnico.\n2.- AsignaciÃ³n de 1 direcciÃ³n IP.\n3.- Tiempo de Respuesta para Soporte, TelefÃ³nico Inmediato, en sitio mÃ¡ximo 2 horas.\n4.- Contrato sin plazo forzoso.\n5.- Router incluido permite restringir y limitar acceso a internet para mejorar la productividad del personal.\n6.- AsesorÃ­a en todos sus proyectos donde se involucre a su conexiÃ³n de INTERNET como:\n			- ContrataciÃ³n y administraciÃ³n de su dominio \"Web\".\n			- ContrataciÃ³n de servicios de telefonÃ­a IP, interna o pÃºblica (TelefonÃ­a IP).\n			- Servicio de video vigilancia y monitoreo remoto.\n			- ContrataciÃ³n de Servidores de respaldo y/o FTP.','La instalaciÃ³n incluye un router Mikrotik Profesional y equipo de radio en comodato.\n- Pago semestral obtienen un equipo UniFi largo alcance costo\nNota: Todos los costos son en M.N y no incluyen IVA.','Esperando que la presente le proporcione la informaciÃ³n requerida, me despido quedando a sus Ã³rdenes para\ncualquier aclaraciÃ³n.\n		RelaciÃ³n de costos dirigida a Representante de: ','Myriam lara cabrera\nRed Siete, S. de R.L. de C.V.\nTelefono: (686) 119-79- 97\noficina tel 686 5635367',5),(4,'','','','','',3),(5,'EnviÃ³ la presente describiendo algunas caracterÃ­sticas de nuestro servicio y soporte asÃ­ como una propuesta de la opciÃ³n de 10, 20, 30, 50 Mbps simÃ©tricos Dedicados con salida redundante y 1 DirecciÃ³n IP.','1.- ConexiÃ³n a Internet de banda ancha simÃ©trica, las 24 horas los 365 dÃ­as del aÃ±o dentro de los estÃ¡n dares\n     internacionales asÃ­ como soporte tÃ©cnico.\n2.- AsignaciÃ³n de 1 direcciÃ³n IP.\n3.- Tiempo de Respuesta para Soporte, TelefÃ³nico Inmediato, en sitio mÃ¡ximo 2 horas.\n4.- Contrato sin plazo forzoso.\n5.- Router incluido permite restringir y limitar acceso a internet para mejorar la productividad del personal.\n6.- AsesorÃ­a en todos sus proyectos donde se involucre a su conexiÃ³n de INTERNET como:\n			- ContrataciÃ³n y administraciÃ³n de su dominio \"Web\".\n			- ContrataciÃ³n de servicios de telefonÃ­a IP, interna o pÃºblica (TelefonÃ­a IP).\n			- Servicio de video vigilancia y monitoreo remoto.\n			- ContrataciÃ³n de Servidores de respaldo y/o FTP.','La instalaciÃ³n incluye un router Mikrotik Profesional y equipo de radio en comodato.\n- Pago semestral obtienen un equipo UniFi largo alcance costo\nNota: Todos los costos son en M.N y no incluyen IVA.','Esperando que la presente le proporcione la informaciÃ³n requerida, me despido quedando a sus Ã³rdenes para\ncualquier aclaraciÃ³n.\n		RelaciÃ³n de costos dirigida a Representante de: ','Jorge Cabrera Rocha\nRed Siete, S. de R.L. de C.V.\nTelefono: (686) 111-11-11\noficina tel 686 5635367',3);
/*!40000 ALTER TABLE `configCotizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto` (
  `idcontacto` int(11) NOT NULL AUTO_INCREMENT,
  `trato` text NOT NULL,
  `nombre` text NOT NULL,
  `apellidoM` text NOT NULL,
  `apellidoP` text NOT NULL,
  `telefono` varchar(254) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `cargo` text NOT NULL,
  `show` varchar(254) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcontacto`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` VALUES (32,'Sr.','Marcos','Vazquez','Mercado','5635143','Marcos@red-7.com.mx','sistemas','0'),(33,'Sr.','Marcos','vazquez','mercado','5635143','Marcos@red-7.com.mx','sistemas','0'),(34,'Sr.','Marcos','Vazquez','Mercado','5635143','Marcos@red-7.com.mx','sistemas','0'),(35,'Sr.','Marcos','vazquez','mercado','56351443','Marcos@red-7.com.mx','sistemas','0'),(36,'Sr.','Marcos','Vazquez','Mercado','5635143','Marcos@red-7.com.mx','sistemas','0'),(37,'Sr.','Marcos Antonio','Vazquez','Mercado','5635143','Marcos@red-7.com.mx','sistemas','0'),(38,'1','Edgar','','','','','','1'),(39,'Sr.','m','v','Mercado','575678','Marcos@red-7.com.mx','sistemas','0'),(40,'Sra.','Rodolfina','Lopez','Lopez','6862224097','rodolfina@si.com','jefa de compras','0'),(41,'Sr.','Edgar','','','','','','0'),(43,'Sr.','Eduardo prueba 1','Abad','Tinoco','6862224097','eat.94.15@gmail.com','si','0'),(44,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','el chalan','0'),(45,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(46,'Sr.','Eduardo Prueba100','tinoco','abad','6862224097','eat.94.15@gmail.com','5','0'),(47,'Sr.','Eduardo prueba otra','Abad','Tinoco','6862224097','eat.94.15@gmail.com','otra prueba mas','0'),(48,'Sr.','Rudolfina','Perez','Perez','6865801155','rudolfina@gmail.com','la dueÃ±a','0'),(49,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','si','0'),(50,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','siiii','0'),(51,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','NOO','1'),(52,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','si','1'),(53,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(54,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(55,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(56,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(57,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(58,'Sr.','edgar','','','','','','0'),(59,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(60,'','edgar','','','','','','0'),(61,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(63,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(64,'','','','','','','','0'),(65,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(66,'','','','','','','','0'),(67,'Sr.','Eduardo','Abad','Tinoco',' 526862224097','','','0'),(68,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(69,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(70,'','','','','','','','0'),(71,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(72,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(73,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(74,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(75,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(76,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(77,'Sr.','Eduardo9','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(78,'Sr.','Eduardo9','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(79,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(80,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(81,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(82,'Sr.','Eduardo55','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(83,'Sr.','Eduardo nombrersin','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(84,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(85,'Sr.','Eduardo de ventas modificado con id 85','Abad','Tinoco','6862224097','eat.94.15@gmail.com','vendedor','0'),(86,'Sra.','Eduardita','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(87,'Sr.','Eduardo de la empresa nueva','Abad','Tinoco modificado','6862224097','eat.94.15@gmail.com','el que barre','0'),(88,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','el chofer','0'),(89,'Sr.','Santa claus','El sabor','Siente','68655598968','contacto@cocacola.co','CEO','1'),(90,'Sr.','Ho SY','Bimbo','To','6865801155','bimbo@bimbo.com','CEO','1'),(91,'Sra.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','a ver','1'),(92,'Sr.','El hijo','Sr. Santa Claus','De','6862224097','eat.94.15@gmail.com','si','1'),(93,'Sr.','un','mas','contacto','123456789','si','no','1'),(94,'Sr.','contacto','dos','numero','6862224097','eat.94.15@gmail.com','si','0'),(95,'Sra.','santa','aa','aa','aa','aa@aa.com','aa','0'),(96,'Sra.','Bim','De Ho Sy','Bo','15874852','hosyDoÃ±a@gmail.com','la seÃ±ora','1'),(97,'Sr.','El Hijo','Bimbo','De','6865555908','si','no','1'),(98,'Sra.','Mujer','Panfila','DoÃ±a','865656','donapan@si.com','si','0'),(99,'Sra.','aa','aa','aa','aa','aa@aa.aa','','0'),(100,'Sra.','San','claus','ta','68655555','santa@coca-cola.com','el chilin','0'),(101,'Sra.','ee','ee','ee','ee','ee@ee.ee','ee','1'),(102,'Sra.','aa','aa','aa','aa','aa@aa.aa','aa','0'),(103,'Sra.','aa','aa','aa','aa','aa@aa.aa','aa','0'),(104,'Sra.','bb','bb','bb','bb','bb@bb.bb','bb','0'),(105,'Sra.','bb','bb','bb','bb','bb@bb.bb','bb','0'),(106,'Sr.','tt','tt','tt','tt','tt@tt.tt','tt','0'),(107,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','si','0'),(108,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','No se','1'),(109,'Sra.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','SI PERO NO MODIFICAR ESTO','0'),(110,'Sra.','Margara','Si','Francisca','686555097155054880','margara@tv.com','la chila','0'),(111,'Sr.','EDGAR IVAN','HERNANDEZ','HERNANDEZ','6861212394','edgar.nok@gmail.com','','1'),(112,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(113,'Sr.','No','si','si','si','si@si.si','si','0'),(114,'Sra.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','si','1'),(115,'Sr.','Marcos','mercado ','vazquez','5635143','marcoseleck@gmail.co','Sistemas','0'),(116,'Sra.','SeÃ±ora desde ','vista','nueva','6865091610','abad@si.com','simona!','0'),(117,'Sr.','seÃ±or','nueva vistsa','desde','6666666','abad@si.com.mx','si','1'),(118,'Sra.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','no','1'),(119,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','si','0'),(120,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','si','0'),(121,'Sr.','EDGAR IVAN','HERNANDEZ','HERNANDEZ','5224550','edgar.nok@gmail.com','Soporte','0'),(122,'Sr.','Julio','ape','ape','456522','asdw236@gmail.com','Soporte','0'),(123,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(124,'Sra.','Lic. SeÃ±orita de la si','moreno','tomasa','686666666','66@66.66','la seis 66','0'),(125,'Sr.','Bimbo','Barcel','Torres','686222222','correo@correo.com','el gran jefe','0'),(126,'Sr.','','','','','','','0'),(127,'Sr.','','','','','','','0'),(128,'Sr.','','','','','','','0'),(129,'Sr.','','','','','','','0'),(130,'Sr.','','','','','','','0'),(131,'Sr.','','','','','','','0'),(132,'Sr.','','','','','','','0'),(133,'Sr.','','','','','','','0'),(134,'Sr.','','','','','','','0'),(135,'Sra.','Se;or sis','','','','','ss','0'),(136,'Sr.','','','','','','','0'),(137,'Sr.','','','','','','','0'),(138,'Sr.','','','','','','','0'),(139,'Sr.','','','','','','','0'),(140,'Sr.','','','','','','','0'),(141,'Sr.','','','','','','','0'),(142,'Sr.','','','','','','','0'),(143,'Sr.','','','','','','','0'),(144,'Sr.','','','','','','','0'),(145,'Sr.','','','','','','','0'),(146,'Sr.','Eduardo','Abad','Tinoco','aa','','','0'),(147,'Sr.','Eduardo','Abad','Tinoco','aa','','','0'),(148,'Sr.','Eduardo','Abad','Tinoco','aa','','','0'),(149,'Sr.','Eduardo','Abad','Tinoco','aa','','','0'),(150,'Sr.','Eduardo','Abad','Tinoco','aa','','','0'),(151,'Sr.','Eduardo','Abad','Tinoco','aa','','','0'),(152,'Sr.','Eduardo','Abad','Tinoco','aa','','','0'),(153,'Sr.','','','','','','','0'),(154,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(155,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(156,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(157,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(158,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(159,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(160,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(161,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(162,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','aa','0'),(163,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','aa','0'),(164,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(165,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(166,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(167,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(168,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(169,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(170,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','','0'),(171,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','El mero mero','0'),(172,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','mexicalis','0'),(173,'Sr.','aa','aa','aa','aa','aa@a.c','aa','0'),(174,'Sr.','aa','aa','aa','aa','aa','aa','0'),(175,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','11','0'),(176,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','11','0'),(177,'Sr.','Eduardo nuevo modificado aver','Abad','Tinoco','6862224097','eat.94.15@gmail.com','si','0'),(178,'Sr.','Marcos','Mercado','Antnio','865116515','marcos@jbdubdu','sistemas','0'),(179,'Sr.','jose','apellidopq','juan','563651','marcos@oijoij','ihnoj','0'),(180,'Sr.','Eduardo','Abad','Tinoco','6862224097','eat.94.15@gmail.com','si','0');
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactoProspecto`
--

DROP TABLE IF EXISTS `contactoProspecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactoProspecto` (
  `idprospecto` int(11) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  KEY `idprospecto` (`idprospecto`),
  KEY `idcontacto` (`idcontacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactoProspecto`
--

LOCK TABLES `contactoProspecto` WRITE;
/*!40000 ALTER TABLE `contactoProspecto` DISABLE KEYS */;
INSERT INTO `contactoProspecto` VALUES (5,4),(6,5),(7,6),(8,7),(9,8),(10,9),(11,10),(12,11),(14,13),(14,13),(15,14),(16,15),(17,16),(18,17),(19,18),(20,19),(21,20),(22,21),(23,22),(25,24),(26,25),(27,26),(28,27),(2,1),(3,2),(4,3),(5,4),(6,5),(7,6),(8,7),(9,8),(10,9),(11,10),(12,11),(13,12),(14,13),(15,14),(16,15),(17,16),(18,17),(19,18),(20,19),(21,20),(22,21),(23,22),(24,23),(25,24),(26,25),(27,26),(28,27),(29,28),(30,29),(0,30),(0,31),(2,32),(2,33),(2,34),(2,35),(0,36),(8,37),(8,38),(10,39),(11,40),(11,41),(11,42),(11,43),(11,44),(13,45),(13,46),(13,47),(14,48),(15,49),(16,50),(17,51),(18,52),(19,53),(20,54),(21,55),(22,56),(23,57),(23,58),(25,59),(25,60),(27,61),(27,62),(29,63),(29,64),(31,65),(31,66),(33,67),(34,68),(35,69),(53,87),(54,88),(55,89),(56,90),(55,91),(55,92),(55,93),(54,94),(55,95),(56,96),(56,97),(56,98),(55,99),(55,100),(55,101),(57,102),(58,103),(59,104),(60,105),(60,106),(61,107),(62,108),(63,109),(63,110),(64,111),(65,112),(56,113),(56,114),(66,115),(56,116),(56,117),(56,118),(67,119),(68,120),(69,121),(64,122),(70,123),(62,124),(56,125),(70,126),(70,127),(70,128),(70,129),(70,130),(70,131),(70,132),(70,133),(56,134),(56,135),(70,136),(70,137),(70,138),(70,139),(70,140),(70,141),(70,142),(70,143),(70,144),(70,145),(70,146),(70,147),(70,148),(70,149),(70,150),(70,151),(70,152),(70,153),(70,154),(70,155),(70,156),(70,157),(70,158),(70,159),(70,160),(70,161),(70,162),(70,163),(70,164),(70,165),(70,166),(70,167),(70,168),(70,169),(71,170),(72,171),(73,172),(0,173),(74,174),(0,175),(0,176),(77,177),(78,178),(79,179),(80,180);
/*!40000 ALTER TABLE `contactoProspecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etapadeventa`
--

DROP TABLE IF EXISTS `etapadeventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etapadeventa` (
  `idetapa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`idetapa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etapadeventa`
--

LOCK TABLES `etapadeventa` WRITE;
/*!40000 ALTER TABLE `etapadeventa` DISABLE KEYS */;
INSERT INTO `etapadeventa` VALUES (1,'Analizando','analizando prospecto'),(2,'Propuesta','propuesta'),(3,'Cotizacion','Cotizacion a prospec'),(4,'Demo','Demo'),(5,'Cerrado Perdido','Cerrado Perdido'),(6,'Cerrado Ganado','Cerrado Ganado');
/*!40000 ALTER TABLE `etapadeventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `idNota` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `idprospecto` int(11) NOT NULL,
  `hora` text NOT NULL,
  `fecha` text NOT NULL,
  PRIMARY KEY (`idNota`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (1,'Nota 1 desde phpmyadmin',120,68,'12:00:00','0000-00-00'),(2,'PRueba 2 desde phpmyadmin',120,68,'',''),(3,'Esta es la primer nota crerada desde el sistema?',116,56,'12:42:40','16-08-16'),(4,'Bien y tu?',98,56,'12:44:57','16-08-16'),(10,'Como has estado',98,56,'10:22:03','17-08-16'),(13,'Hola queridos',113,56,'10:56:35','2016-08-17'),(14,'Hola',113,56,'10:56:44','2016-08-17'),(15,'Uno dos',113,56,'10:56:54','2016-08-17'),(16,'Primer nota',116,56,'10:57:10','2016-08-17'),(17,'Hola',37,8,'11:01:55','2016-08-17'),(18,'Sii',37,8,'11:02:34','2016-08-17'),(19,'Hola',120,68,'11:03:22','2016-08-17'),(20,'Primer prueba',119,67,'11:03:43','2016-08-17'),(21,'Segunda prueba',119,67,'11:04:52','2016-08-17'),(22,'Se;ora aa nota',102,57,'11:05:21','2016-08-17'),(28,'bb',98,56,'11:06:57','2016-08-19'),(33,'probando probando',98,56,'11:08:14','2016-08-19'),(34,'una mass',98,56,'11:28:29','2016-08-19'),(35,'como estas',120,68,'11:46:17','2016-08-19'),(36,'Hola esta es una nota',121,69,'13:17:44','2016-08-23'),(37,'Otra nota maso ',121,69,'13:18:41','2016-08-23'),(38,'Hola cÃ³mo estÃ¡s ?',125,56,'12:20:18','2016-09-07'),(39,'Prueba 1',125,56,'12:20:39','2016-09-07'),(40,'Prueba 2',125,56,'12:21:06','2016-09-07'),(41,'aa',135,56,'10:19:29','2016-09-30');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oportunidad`
--

DROP TABLE IF EXISTS `oportunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oportunidad` (
  `idoportunidad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `periodosPagos` text NOT NULL,
  `monto` int(11) NOT NULL,
  `idmoneda` int(11) NOT NULL,
  `idprospecto` int(11) NOT NULL,
  `idetapa` int(11) NOT NULL,
  `fechadeetapa` date NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `comision` float NOT NULL,
  PRIMARY KEY (`idoportunidad`),
  KEY `idetapa` (`idetapa`),
  KEY `idprospecto` (`idprospecto`),
  KEY `idmoneda` (`idmoneda`),
  CONSTRAINT `primero` FOREIGN KEY (`idprospecto`) REFERENCES `prospecto` (`idprospecto`),
  CONSTRAINT `segundo` FOREIGN KEY (`idetapa`) REFERENCES `etapadeventa` (`idetapa`),
  CONSTRAINT `tercero` FOREIGN KEY (`idmoneda`) REFERENCES `Moneda` (`idmoneda`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oportunidad`
--

LOCK TABLES `oportunidad` WRITE;
/*!40000 ALTER TABLE `oportunidad` DISABLE KEYS */;
INSERT INTO `oportunidad` VALUES (90,'Internet Dedicado 100Mb-SEP-Internet Dedicado 200Mb-SEP-Internet Dedicado 300Mb','Renta Mensual',3000,2,56,3,'2016-10-13',98,0),(91,'internet dedicado','888',250088,1,8,3,'2016-10-18',37,0),(92,'Internet Simetrico 20 MB-SEP-internet simetrico 30-SEP-internet simetrico 40','',200,1,10,6,'2016-08-31',39,50),(93,'Internet de 500Tb/s','',9846,2,10,6,'2016-08-31',39,2461.5),(94,'c c','',1500,1,62,3,'2016-09-01',124,0),(95,'internet simetrico -SEP-internet simetrico 60 ','',500,1,14,3,'2016-09-01',48,0),(96,'Internet Dedicado 20Mb','',8888,2,56,6,'2016-10-07',116,2222),(97,'Internet Dedicado 10Mb','Renta Mensual Precio Empresarial',552,1,56,6,'2016-09-01',98,138),(98,'aaa','',15555,1,56,1,'2016-09-01',98,0),(99,'aa','',0,1,56,1,'2016-09-30',98,0),(100,'','',0,1,56,1,'2016-09-30',98,0),(101,'aa','',1500,1,56,1,'2016-09-30',98,0),(102,'Si del si-SEP-A ver','Renta mensual si',1555,2,73,6,'2016-10-07',172,388.75),(103,'11','',1500,1,10,3,'2016-10-06',39,0),(104,'sii con comision','con comision',1500,2,10,6,'2016-10-06',39,375),(105,'internet simetrico','',300,1,11,5,'2016-10-06',40,0),(106,'aa','aa',10000,1,74,6,'2016-10-06',174,2500),(107,'internet Simetrico','Mensual',6000,1,25,6,'2016-10-06',60,1500),(108,'internet Simetrico','Mensual',5000,1,21,3,'2016-10-18',55,0),(113,'11111 no','1111 siiiiiii',111105,1,8,3,'2016-10-18',37,0),(114,'probando con archivos 2','22',22,1,8,3,'2016-10-17',37,0),(115,'55','55',55,1,8,3,'2016-10-17',37,0),(116,'999','99',99,1,8,3,'2016-10-17',37,0),(117,'101001','10101',101010,1,8,3,'2016-10-17',37,0),(118,'11','11',1111,1,56,3,'2016-10-17',98,0),(119,'5656 nueva con otro archivo','5556',5656,1,8,3,'2016-10-17',37,0),(120,'Internet simetrico','Mensual',3000,2,78,3,'2016-10-17',178,0),(121,'11','22',222,1,77,3,'2016-10-18',177,0),(122,'Equipo inalambrico','mensual',3500,1,79,3,'2016-10-18',179,0),(123,'internet','Anual',3500,1,77,3,'2016-10-18',177,0),(124,'565656 nuevo','565656 nuevo',5656568,1,80,3,'2016-10-18',180,0);
/*!40000 ALTER TABLE `oportunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origenprospecto`
--

DROP TABLE IF EXISTS `origenprospecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `origenprospecto` (
  `idorigen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idorigen`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origenprospecto`
--

LOCK TABLES `origenprospecto` WRITE;
/*!40000 ALTER TABLE `origenprospecto` DISABLE KEYS */;
INSERT INTO `origenprospecto` VALUES (1,'Email','Origen por correo electornico'),(2,'Telefono','Origen por llamada telefonica'),(3,'Cambaceo','Origen por cambaceo'),(4,'Directo','Directo'),(5,'Rec-Ref','Recomendado o Referencia'),(6,'Otros','Otros');
/*!40000 ALTER TABLE `origenprospecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prospecto`
--

DROP TABLE IF EXISTS `prospecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prospecto` (
  `idprospecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `rfc` varchar(254) NOT NULL,
  `calle` text NOT NULL,
  `numerodomicilio` int(11) NOT NULL,
  `ciudad` text NOT NULL,
  `colonia` text NOT NULL,
  `cp` text CHARACTER SET utf8 NOT NULL,
  `fechadecreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idvendedor` int(11) NOT NULL,
  `idorigen` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `color` varchar(254) NOT NULL,
  PRIMARY KEY (`idprospecto`),
  KEY `idvendedor` (`idvendedor`),
  KEY `idorigen` (`idorigen`),
  KEY `idestado` (`idestado`),
  KEY `idvendedor_2` (`idvendedor`),
  CONSTRAINT `prospecto_ibfk_1` FOREIGN KEY (`idvendedor`) REFERENCES `vendedor` (`idvendedor`),
  CONSTRAINT `prospecto_ibfk_3` FOREIGN KEY (`idorigen`) REFERENCES `origenprospecto` (`idorigen`),
  CONSTRAINT `prospecto_ibfk_4` FOREIGN KEY (`idestado`) REFERENCES `EstadoProspecto` (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prospecto`
--

LOCK TABLES `prospecto` WRITE;
/*!40000 ALTER TABLE `prospecto` DISABLE KEYS */;
INSERT INTO `prospecto` VALUES (8,'red 7','','Acane',268,'Mexicali','Robledo','21384','2016-07-27 04:19:51',5,2,2,'#a52fd7'),(10,'marcos','','Acana',268,'Mexicali','Robledo','21384','2016-07-27 04:31:32',5,1,1,'#ff9b30'),(11,'Coca cola','','novena',0,'mexicali','paseo del sol','21394','2016-07-27 19:21:10',5,3,3,'#c28d3d'),(14,'Betta Global','','Miguel Venegas',1127,'mexicali','solidaridad mexicali','21394','2016-07-29 18:06:01',4,6,3,'#1801e9'),(15,'Prueba','','Calle Miguel Venegas',1127,'Mexicali','solidaridad mexicali','21394','2016-07-29 18:19:33',4,1,1,'#ff7a7a'),(16,'Prueba2','','Calle Miguel Venegas',0,'Mexicali','soli','21394','2016-07-29 18:22:13',4,1,1,''),(17,'Prueba20','','Calle Miguel Venegas',0,'Mexicali','soli','21394','2016-07-29 18:22:39',4,1,1,''),(18,'Prueba21','','Calle Miguel Venegas ',0,'Mexicali','soli','21394','2016-07-29 18:24:53',4,1,1,''),(19,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 18:37:46',4,1,1,'#ff8000'),(20,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 18:39:09',4,1,1,''),(21,'bettaaaaa','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 18:40:36',3,1,1,'#0000a0'),(22,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 18:46:18',3,1,1,''),(23,'prueba5','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 19:07:19',3,1,1,''),(25,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 19:13:15',3,1,1,''),(27,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 19:14:05',3,1,1,''),(29,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 19:15:48',3,1,1,''),(31,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 19:16:30',3,1,1,''),(33,'Eduardo Abad Tinoco','','',0,'Mexicali','','21394','2016-07-29 19:17:46',3,1,1,''),(34,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 19:53:57',3,1,1,''),(35,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-07-29 19:54:02',3,1,1,''),(37,'Eduardo Abad Tinoco2000','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 17:53:30',3,1,1,''),(38,'Eduardo Abad Tinoco5','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:02:50',3,1,1,''),(39,'Eduardo Abad Tinoco8','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:04:08',3,1,1,''),(40,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:06:30',3,1,1,''),(41,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:07:28',3,1,1,''),(42,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:08:02',3,1,1,''),(43,'Eduardo Abad Tinoco9','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:13:42',3,1,1,''),(44,'Eduardo Abad Tinoco29','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:14:31',3,1,1,''),(45,'Eduardo Abad Tinoco475','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:15:55',3,1,1,''),(46,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:21:03',3,2,1,''),(47,'Eduardo Abad Tinoco5727','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:24:59',3,4,2,''),(48,'Eduardo Abad Tinoco00','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:26:23',3,1,1,''),(49,'nuevo nombrecon','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:28:23',3,1,1,''),(50,'Eduardo Abad Tinoco cinco','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:31:52',3,1,1,''),(51,'El principito modificado','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:35:39',3,1,1,''),(52,'Eduardo Abad Tinoco52','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 18:42:15',3,1,1,''),(53,'Nueva Empresa modificada','','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-08-01 19:08:23',3,1,1,''),(54,'Empresa Agosto','','Miguel Venegas',1132,'Mexicali','solidaridad mexicali','21394','2016-08-01 19:30:17',3,3,2,''),(55,'Coca-Cola','','Blvd. LÃ¡zaro CÃ¡rdenas',2455,'mexicali','Plutarco ElÃ­as Calles','21376','2016-08-02 19:40:36',3,1,1,''),(56,'Bimbo','AATE9415G86','LÃ¡zaro CÃ¡rdenas',2012,'Mexicali','Elias Calles','21390','2016-08-03 20:44:24',5,5,3,'#e97486'),(57,'Red 7','','aa',0,'aa','aa','aa','2016-08-10 19:44:26',5,4,3,'FF4AC0'),(58,'Red 7','','aa',0,'aa','aa','aa','2016-08-10 19:44:26',5,4,3,'FF4AC0'),(59,'Nueva Empresa','','10',0,'bb','bb','bb','2016-08-10 19:47:09',3,3,2,'1900A6'),(60,'Nueva Empresa','','10',0,'bb','bb','bb','2016-08-10 19:47:09',3,3,2,'00ff00'),(61,'Eduardo Abad Tinoco','Aabc92gsks78','Calle Miguel Venegas # 1127',0,'Mexicali','solidaridad mexicali','21394','2016-08-10 22:16:11',5,4,2,'#ed898b'),(62,'Empresa sin errores ','','Calle Miguel Venegas # 1127',1227,'Mexicali','solidaridad mexicali','21394','2016-08-10 22:22:27',5,3,2,'36FF46'),(63,'Empresa sin errores 2','','Calle Miguel Venegas',0,'Mexicali','solidaridad mexicali','21394','2016-08-11 17:21:01',5,2,2,'#3ca6a5'),(64,'EDGAR IVAN HERNANDEZ HERNANDEZ','','Mexicali-San Felipe',636,'Ejido Guanajuato','','21620','2016-08-11 18:01:34',3,2,2,'#1dc0c9'),(65,'Eduardo Abad Tinoco','','Calle Miguel Venegas # 1127',1128,'Mexicali','solidaridad mexicali','21394','2016-08-11 18:02:17',5,4,3,'#ff00ff'),(66,'hellow','','Acana',268,'mexicali','robledo ','21384','2016-08-15 16:27:23',3,1,1,'#ff00ff'),(67,'Eduardo Abad Tinoco','','Calle Miguel Venegas ',1127,'Mexicali','solidaridad','21394','2016-08-15 19:22:27',5,6,1,'#9d97db'),(68,'Nueva empresa con color','','Calle Miguel Venegas # 1127',11278,'Mexicali','soli','21394','2016-08-15 20:09:17',5,5,2,'#d76b00'),(69,'Gulfstream','','Blvrd LÃ¡zaro CÃ¡rdenas',2385,'Mexicali','villas del palmar','21376','2016-08-18 19:06:22',3,1,1,'#979700'),(70,'Empresa 22 Agosto','','Calle Miguel Venegas # 1127',1127,'Mexicali','solidaridad mexicali','21394','2016-08-22 17:46:47',5,4,3,'#e80500'),(71,'Eduardo Abad Tinoco','qwq','Calle Miguel Venegas # 1127',0,'Mexicali','','21394','2016-09-30 18:09:16',5,1,1,'#c56ea8'),(72,'Eduardo Abad Tinoco','unonuevo7','Calle Miguel Venegas # 1127',2011,'Mexicali','solidaridad mexicali','21394','2016-09-30 19:50:02',5,3,2,'#e9109d'),(73,'Eduardo Abad Tinoco','AATE9415G89','Calle Miguel Venegas # 1127',1127,'Mexicali','solidaridad mexicali','21394','2016-09-30 19:52:06',3,1,1,'#00a2ff'),(74,'aa','aaaa','aa',11,'aa','aa','1111','2016-10-06 20:10:07',5,1,1,'#bebb3a'),(75,'Eduardo Abad Tinoco','111','Calle Miguel Venegas # 1127',11,'Mexicali','11','21394','2016-10-06 20:21:01',5,1,1,'#197cdf'),(76,'Eduardo Abad Tinoco','aa','Calle Miguel Venegas # 1127',11,'Mexicali','11','21394','2016-10-06 20:26:13',5,1,1,'#197cdf'),(77,'Eduardo Abad Tinoco','nuevoPros','Calle Miguel Venegas # 1127',1127,'Mexicali','solid','21394','2016-10-06 20:31:15',5,1,1,'#7ea653'),(78,'WOW','TTYEUGYUG','acana',268,'Mexicali','robledo','21384','2016-10-17 20:46:19',3,1,1,'#197cdf'),(79,'x','54666','abeto',256,'mexicali','robledo','21384','2016-10-18 17:15:43',3,1,1,'#0000a0'),(80,'Eduardo Abad Tinoco','AATE9415G86a5','Calle Miguel Venegas # 1127',1127,'Mexicali','colonia','21394','2016-10-18 17:19:39',5,1,1,'#197cdf');
/*!40000 ALTER TABLE `prospecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'Vendedor','Son los que venden'),(2,'Jefe de Ventas','Encargado de los Ven'),(3,'Desahabilitado','El vendedor ya no pe');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedor`
--

DROP TABLE IF EXISTS `vendedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendedor` (
  `idvendedor` int(11) NOT NULL AUTO_INCREMENT,
  `idtipousuario` int(11) NOT NULL,
  `foto` varchar(254) NOT NULL,
  `nombreusuario` text NOT NULL,
  `apellidoM` text NOT NULL,
  `apellidoP` text NOT NULL,
  `correo` varchar(25) NOT NULL,
  `calle` varchar(15) NOT NULL,
  `numerodomicilio` int(6) NOT NULL,
  `colonia` varchar(25) NOT NULL,
  `ciudad` varchar(25) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`idvendedor`),
  KEY `idtipousuario` (`idtipousuario`),
  CONSTRAINT `tipo1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedor`
--

LOCK TABLES `vendedor` WRITE;
/*!40000 ALTER TABLE `vendedor` DISABLE KEYS */;
INSERT INTO `vendedor` VALUES (3,1,'IMG-20161010-WA0025.jpg','EDGAR IVAN','HERNANDEZ','HERNANDEZ','edgar.nok@gmail.com','Mexicali-San Fe',656,'robledo','Ejido Guanajuato','edgar','12345'),(4,2,'','m','Vazquez','Mercado','marcos@red-7.com.mx','acana',268,'Robledo','Mexicali','marcos','1234a'),(5,1,'Screenshot_2.png','Eduardo','Tinoco','Abad','abad@red-7.com.mx','Miguel venegas',1127,'Solidaridad Mexicali','Mexicali','abad','1234'),(12,1,'','ghnjk','hgjik','yhjuikol','uyijko','jiko',8756,'ghjk','7456','hjik','hyjik'),(14,1,'','Antonio','Mecrado','Vzquez','marcos@red-7.com.mx','acana',268,'robledo','21384','mercado','vazquez'),(16,1,'','tyghuij','gyhj','ghy','ujiuyhj','iuyhji',0,'kji','khjk','uij','hjnk'),(19,1,'','Marcos ','mercado','ANTUAN','uh','iuiu',0,'hiu','hiuh','iuhiu','hiuh'),(20,1,'','eduardo','hellos','moto','huhuih','iuhihiuh',0,'','hih','iuhi','uhiu'),(23,1,'','vjk','hj','kknk','','jkn',0,'nkj','kjn','kjnjk','njk'),(25,2,'','Edgar','Hernadez','Hernandez','Ivan@red-7.com.mx','acana',268,'56351343','4567','ivan','@246810'),(28,1,'','ftgyhjkl','ghj','gh','jhjn','kjhn',0,'jh','kjhk','kjjk','jk'),(30,1,'','ytg','ytg','y','yyugy','ugug',0,'yuu','guy','gyuguyg','guyg'),(31,1,'','trftyf','yg','gyg','uygyu','guu',0,'gyug','yug','yugyug','yuguyg'),(32,1,'','fghji','fgh','jhn','bn','nbikh',0,'uih','iuhiu','hiu','hiuh'),(33,1,'','hola','yvyuu','yuuy','yu','g',0,'uyg','guy','uyg','uyg'),(34,1,'','chapo','','uuhu','hu','hiuhi',0,'iuhui','hiu','hih','i'),(35,1,'','ty7u','iiu','hu','uihiu','huih',0,'hiu','hiu','hui','uhh'),(36,1,'','tyghj','gh','jhki','yhju','uyjhik',0,'jhnoij','ojioj','ijiojo','jioj'),(37,1,'','tyghj','gh','jhki','yhju','uyjhik',0,'jhnoij','ojioj','ijiojo','jioj'),(38,1,'','uni','hniu','hjuii','hiuh','iuhiuh',0,'iuhiu','iu','hi','hi'),(39,1,'','uni','hniu','hjuii','hiuh','iuhiuh',0,'iuhiu','iu','hi','hi'),(40,1,'','uno','jh','hjh','hjjhj','hjh',0,'jj','h','jhj','j'),(41,1,'','uno','jh','hjh','hjjhj','hjh',0,'jj','h','jhj','j'),(42,1,'','uno','uno','uno','uno','unoi',0,'unobi','ui','unio',''),(43,1,'','uno','uno','uno','uno','unoi',0,'unobi','ui','unio',''),(44,1,'','uno','uno','uno','uno','unoi',0,'unobi','ui','unio',''),(45,1,'','dos','jio','jioj','ojo','oi',0,'jioj','iojio','jo','jo'),(46,1,'','dos','jio','jioj','ojo','oi',0,'jioj','iojio','jo','jo'),(47,1,'','tres','t','t','t','t',0,'t','t','t','t'),(48,1,'','tres','t','t','t','t',0,'t','t','t','t'),(49,1,'','tres','t','t','t','t',0,'t','t','t','t'),(50,1,'','cuatri','iu','hi','hiu','iuiu',0,'hh','uih','ihiu','ui'),(51,1,'','cuatri','iu','hi','hiu','iuiu',0,'hh','uih','ihiu','ui'),(52,1,'','cinco','inhi','hi','jio','ihi',0,'ih','iu','hi','hui'),(53,1,'','cinco','inhi','hi','jio','ihi',0,'ih','iu','hi','hui'),(54,1,'','Marcos','iojio','ioji','ojoj','ojio',0,'jioj','iojio','jio','jiojo'),(55,1,'','hola','ij','iji','ij','ji',0,'ojio','jioj','iojio','j'),(56,1,'','nombre','njk','nkjjk','nk','nkjn',0,'nkjn','jkn','','j'),(57,1,'','prueb','purbe','in','iui','nin',0,'iu','ni','niun','iun'),(58,1,'','kk','k','k','kk','k',0,'k','k','k','k'),(61,1,'','','','','','',0,'','','',''),(62,1,'','','','','','',0,'','','',''),(63,1,'','','','','','',0,'','','',''),(64,1,'','paco','jiu','iji','iji','jij',0,'iji','ji','jiji','ji'),(79,1,'','aa','aa','aa','aa','aa',0,'aa','aa','aa','aa'),(80,1,'','bb','bb','bb','bb','bb',0,'bb','bb','bb','bb'),(81,1,'','bb','bb','bb','bb','bb',0,'bb','bb','bb','bb'),(82,1,'','cc','cc','cc','cc','cc',0,'cc','cc','cc','cc'),(83,1,'','cc','cc','cc','cc','cc',0,'cc','cc','cc','cc'),(84,1,'','cc','cc','cc','cc','cc',0,'cc','cc','cc','cc'),(85,1,'','vv','vv','vv','vv','vv',0,'vv','vv','vv','vv'),(86,1,'','bb','bb','bb','bb','bb',0,'bb','bb','bb','bb'),(87,1,'','bb','bb','bb','bb','bb',0,'bb','bb','bb','bb'),(88,1,'','qq','qq','qq','qq','qq',0,'qq','qq','qq','qq'),(89,1,'','ww','ww','ww','ww','ww',0,'ww','ww','ww','ww'),(90,1,'','ww','ww','ww','ww','ww',0,'ww','ww','ww','ww'),(91,1,'','gg','gg','gg','gg','gg',0,'gg','gg','gg','gg'),(92,1,'','gg','gg','gg','gg','gg',0,'gg','gg','gg','gg'),(93,1,'','gg','gg','gg','gg','gg',0,'gg','gg','gg','gg'),(94,1,'','ppp','p','p','p','p',0,'p','p','pp','p'),(95,1,'','yyy','yy','y','y','y',0,'yy','y','y','y'),(96,1,'','yyy','yy','y','y','y',0,'yy','y','y','y'),(97,1,'','tttttttttt','tttttttt','ttttttttttttt','t','tt',0,'t','t','tt','t'),(98,1,'','0000000000','0000','0','o','o',0,'oo','','oo','o'),(99,1,'','0000000000','0000','0','o','o',0,'oo','','oo','o'),(100,1,'','rtfgyhjkyu','uyhg','uyhiuhiu','hiu','hui',0,'hiuh','uihui','hiu','hiuhi'),(101,1,'','rtfgyhjkyu','uyhg','uyhiuhiu','hiu','hui',0,'hiuh','uihui','hiu','hiuhi'),(102,1,'','rtfgyhjkyu','uyhg','uyhiuhiu','hiu','hui',0,'hiuh','uihui','hiu','hiuhi'),(103,1,'','iiiiiiiiiiiiiiiiiiiiii','iiiiiiiiiiiii','iiiiiiiiii','i','i',0,'ii','i','i','i'),(104,1,'','iiiiiiiiiiiiiiiiiiiiii','iiiiiiiiiiiii','iiiiiiiiii','i','i',0,'ii','i','i','i'),(105,1,'','iiiiiiiiiiiiiiiiiiiiii','iiiiiiiiiiiii','iiiiiiiiii','i','i',0,'ii','i','i','i'),(106,1,'','iiiiiiiiiiiiiiiiiiiiii','iiiiiiiiiiiii','iiiiiiiiii','i','i',0,'ii','i','i','i'),(107,1,'','iiiiiiiiiiiiiiiiiiiiii','iiiiiiiiiiiii','iiiiiiiiii','i','i',0,'ii','i','i','i'),(108,1,'','iiiiiiiiiiiiiiiiiiiiii','iiiiiiiiiiiii','iiiiiiiiii','i','i',0,'ii','i','i','i'),(109,1,'','iiiiiiiiiiiiiiiiiiiiii','iiiiiiiiiiiii','iiiiiiiiii','i','i',0,'ii','i','i','i'),(110,1,'','iiiiiiiiiiiiiiiiiiiiii','iiiiiiiiiiiii','iiiiiiiiii','i','i',0,'ii','i','i','i'),(111,1,'','sdfghjklÃ±','ftgyhjik','gyt','hvbjnkm','vyguhjnik',0,'jik','yuhvjbkn','ijubhn','kmlij'),(112,1,'','ooooooooooo','ooo','oo','o','oo',0,'o','o','o','oo'),(113,1,'','ooooooooooo','ooo','oo','o','oo',0,'o','o','o','oo'),(114,1,'','tgyhujik','yuh','bjikm','ubyhi','ij',0,'okoi','o','kok','oko'),(115,1,'','tgyhujik','yuh','bjikm','ubyhi','ij',0,'okoi','o','kok','oko'),(116,1,'','tgyhujik','yuh','bjikm','ubyhi','ij',0,'okoi','o','kok','oko'),(117,1,'','Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±','Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±','Ã±Ã±Ã±Ã±Ã±Ã±Ã±','Ã±','Ã±',0,'Ã±','Ã±','Ã±','Ã±'),(118,1,'','hjiuk','hyuj','ikjuih','bnkjk','o',0,'iojki','joi','jio','jo'),(119,1,'','Marcos','Mercaos','Antoni','ojio','ioj',0,'jio','jio','ojojioijo','joi'),(120,1,'','Mark','Antoni','ijiji','jiji','jij',0,'ojio','jioj','iojio','jo'),(121,1,'','Mark','Antoni','ijiji','jiji','jij',0,'ojio','jioj','iojio','jo'),(122,1,'','Mark','Antoni','ijiji','jiji','jij',0,'ojio','jioj','iojio','jo'),(123,1,'','Mark','Antoni','ijiji','jiji','jij',0,'ojio','jioj','iojio','jo'),(124,1,'','ghj','ni','i','ii','iji',0,'ij','ij','iji','jij'),(125,1,'','hgjk','ijiioj','ioji','ojio','jiojoi',0,'jojoij','oj','ioj','ioj'),(126,1,'','hgjk','ijiioj','ioji','ojio','jiojoi',0,'jojoij','oj','ioj','ioj'),(127,1,'','hgjk','ijiioj','ioji','ojio','jiojoi',0,'jojoij','oj','ioj','ioj'),(128,1,'','heelo','uh','iuhi','ih','hi',0,'iiu','i','iiuih','iuh'),(129,1,'','5','iuh','ih','iuhi','hi',0,'hi','hi','hi','hi'),(130,1,'','julanito','jsijisijsiei','ji','ji','jij',0,'jij','ij','','jij'),(131,1,'','ooooooo','ooo','oo','o','o',0,'o','oo','o','o'),(132,1,'','Mark','Antony','Market','marcos@red-7.com.mx','yuyhuyg',0,'uygu','g','uyguy','gu'),(133,1,'','opopkoPOKOpkpOPkopkPOKOPK','POKPO','KPO','KPOK','PK',0,'KP','KP','KPO','KPOKK'),(134,1,'','jjj','jj','j','j','j',0,'j','jj','i','j');
/*!40000 ALTER TABLE `vendedor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-19 13:21:36
