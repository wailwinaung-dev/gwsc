-- MySQL dump 10.13  Distrib 8.0.34, for macos13 (arm64)
--
-- Host: localhost    Database: gwsc
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `position` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Gar','Gyi','gargyi@gmail.com','gargyi123','097897666','main street','Manager','2023-08-18 04:15:02','2023-08-18 04:15:02'),(2,'Test','ing','test@gmail.com','Test123','097897666','main street','Manager','2023-08-18 04:15:02','2023-08-18 04:15:02');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attractions`
--

DROP TABLE IF EXISTS `attractions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attractions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions`
--

LOCK TABLES `attractions` WRITE;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;
INSERT INTO `attractions` VALUES (1,'Shwe Dagon Pagoda','There are shwe da gon pagoda.','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.566314910775!2d96.14697547475272!3d16.798238819510775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb5e363aab97%3A0x55f0542aad97d8c7!2z4YCb4YC94YC-4YCx4YCQ4YCt4YCC4YCv4YC24YCF4YCx4YCQ4YCu4YCQ4YCx4YCs4YC6LCDhgJvhgJThgLrhgIDhgK_hgJThgLo!5e0!3m2!1smy!2smm!4v1692630221581!5m2!1smy!2smm','64e37de6b8e84.jpg'),(2,'MaHar Myat Mu Ni','This is MaHar Myat Mu Ni','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3700.549951435605!2d96.07592257487335!3d21.95184645543619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb6d4f5ff5e9d5%3A0x9352ca8131e3edf2!2z4YCZ4YCf4YCs4YCZ4YCv4YCU4YCt4YCb4YCv4YCV4YC64YCb4YC-4YCE4YC64YCQ4YCx4YCs4YC64YCZ4YC84YCQ4YC64YCA4YC84YCu4YC4!5e0!3m2!1smy!2smm!4v1692630693029!5m2!1smy!2smm','64df1f26b46b2.jpg'),(3,'Yangon Water Boom','This is Yangon Water Boom','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.067070115224!2d96.1977028747522!3d16.773338420204936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed00c9e28a09%3A0x5aa9871d473f1bb8!2sYangon%20Water%20Boom!5e0!3m2!1smy!2smm!4v1692630819705!5m2!1smy!2smm','64df1ffde1252.jpg'),(5,'Grinnell Glacier Trailhead','this is a popular place to hike near Many Glacier Campground Campsite','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1125.7182713935617!2d-113.66937201480701!3d48.786024978974744!2m3!1f0!2f38.845445935951616!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x5368b21013fd9cfd%3A0xf505254ad6191bd2!2sGrinnell%20Glacier%20Trailhead!5e1!3m2!1sen!2smm!4v1695398053344!5m2!1sen!2smm\"','650db9a70335a.jpg'),(6,'Iceberg Ptarmigan Trailhead','It\'s a new place for hiking with very beautiful view.','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1361.0210852825548!2d-113.67869452725105!3d48.788103866240476!2m3!1f0!2f38.815797716789525!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x5368b20c283fe125%3A0x3ba533a17933d096!2sIceberg%20Ptarmigan%20Trailhead!5e1!3m2!1sen!2smm!4v1695398479535!5m2!1sen!2smm','650dbb040931a.jpg'),(7,'Gorge Trail','dswfsafdsfd','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2945.4972444571604!2d-76.52203589999999!3d42.417149699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d080e243eac4ad%3A0x4eec9dcc8b5f7297!2sGorge%20Trail!5e0!3m2!1sen!2smm!4v1695400318362!5m2!1sen!2smm','651183f5ca91a.jpg'),(8,'Wells Falls','Its one of the attraction near buttermilk','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15412.44037466487!2d-76.50699478814428!3d42.445120784087536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d081942837b9bb%3A0x2c686160b7b27d0!2sWells%20Falls!5e0!3m2!1sen!2smm!4v1695400444829!5m2!1sen!2smm','6511835880b0e.jpeg'),(9,'Thor\'s Cave','Thor\'s Cave (also known as Thor\'s House Cavern and Thyrsis\'s Cave) is a natural cavern located in the Manifold Valley of the White Peak in Staffordshire, England. It is classified as a karst cave. Located in a steep limestone crag, the cave entrance, a symmetrical arch 7.5 metres wide and 10 metres high, is prominently visible from the valley bottom, around 80 metres (260 feet) below. Reached by an easy stepped path from the Manifold Way, the cave is a popular tourist spot, with views over the Manifold Valley. The second entrance is known as the \"West Window\", below which is a second cave, Thor\'s Fissure Cavern.[1]\r\n\r\nThor\'s Cave was served by a railway station on the Leek and Manifold Valley Light Railway from 1904 to 1934; the disused line now forms the Manifold Way.\r\n\r\n','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2396.034297463451!2d-1.8570874237522417!3d53.09161899375293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487a3cec312b18f5%3A0xee2287a85252c9f3!2sThor&#39;s%20Cave!5e0!3m2!1sen!2smm!4v1695565856910!5m2!1sen!2smm','65104854cf4f3.jpg'),(10,'Manifold Track','The Manifold Way is a footpath and cycle way in Staffordshire, England. Some 8 miles (13 km) in length, it runs from Hulme End (53.1307°N 1.8480°W) in the north to Waterhouses (53.0480°N 1.8654°W) in the south, mostly through the Manifold Valley and the valley of its only tributary, the River Hamps, following the route of the former Leek and Manifold Valley Light Railway, a 2 ft 6 in (762 mm) gauge line which closed in 1934 after a short life.','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2397.445467131979!2d-1.8644949165694444!3d53.06627063423155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487a3d03735bd303%3A0x2208af39cedb70e5!2sThe%20Manifold%20Way%2C%20United%20Kingdom!5e0!3m2!1sen!2smm!4v1695566008300!5m2!1sen!2smm','651184a08180a.jpg'),(11,'White Abby','Whitby Abbey was a 7th-century Christian monastery that later became a Benedictine abbey. The abbey church was situated overlooking the North Sea on the East Cliff above Whitby in North Yorkshire, England, a centre of the medieval Northumbrian kingdom. The abbey and its possessions were confiscated by the crown under Henry VIII during the Dissolution of the Monasteries between 1536 and 1545.\r\n\r\nSince that time, the ruins of the abbey have continued to be used by sailors as a landmark at the headland. Since the 20th century, the substantial ruins of the church have been declared a Grade I Listed building and are in the care of English Heritage the site museum is housed in Cholmley House.','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2317.5605651721676!2d-0.6104585236604327!3d54.48833468866864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487f176cde7beea3%3A0xf4d303a702662928!2sWhitby%20Abbey!5e0!3m2!1sen!2smm!4v1695568692440!5m2!1sen!2smm','651053b742d59.jpg'),(12,'Castle Howard','Castle Howard is a stately home in North Yorkshire, England, within the civil parish of Henderskelfe, located 15 miles (24 km) north of York. It is a private residence and has been the home of the Carlisle branch of the Howard family for more than 300 years. Castle Howard is not a fortified structure, but the term \"castle\" is sometimes used in the name of an English country house that was built on the site of a former castle.\r\n\r\nThe house is familiar to television and film audiences as the fictional \"Brideshead\", both in Granada Television\'s 1981 adaptation of Evelyn Waugh\'s Brideshead Revisited and in a two-hour 2008 adaptation for cinema.','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2338.2889538249347!2d-0.9087031236847327!3d54.12180641642041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487ed4f4445a8f9d%3A0xc2c99b82c0de7561!2sCastle%20Howard!5e0!3m2!1sen!2smm!4v1695568864976!5m2!1sen!2smm','65105456ba3f2.jpg'),(13,'Snowdon Ranger Path','Snowdon is the highest mountain in Wales, at an elevation of 1,085 metres (3,560 ft) above sea level, and the highest point in the British Isles outside the Scottish Highlands. It is located in Snowdonia National Park (Parc Cenedlaethol Eryri) in Gwynedd (historic county of Caernarfonshire).\r\n\r\nIt is the busiest mountain in the United Kingdom and the third most visited attraction in Wales; in 2019 it was visited by 590,984 walkers, with an additional 140,000 people taking the train. It is designated as a national nature reserve for its rare flora and fauna.\r\n\r\nThe rocks that form Snowdon were produced by volcanoes in the Ordovician period, and the massif has been extensively sculpted by glaciation, forming the pyramidal peak of Snowdon and the arêtes of Crib Goch and Y Lliwedd. The cliff faces on Snowdon, including Clogwyn Du\'r Arddu, are significant for rock climbing, and the mountain was used by Edmund Hillary in training for the 1953 ascent of Mount Everest.\r\n\r\n','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21359.980754882043!2d-4.158323708757298!3d53.073530636810325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4865a7bacdb63db7%3A0x7d5c44569044a2d8!2sSnowdon%20Ranger%20Path!5e0!3m2!1sen!2smm!4v1695647743577!5m2!1sen!2smm','6511886daf757.jpg'),(14,'Brow House Farm','fasdffdsaifj','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15277.507476593084!2d96.18452180000001!3d16.807649799999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ecc5363e034d%3A0x9f5b6117dfa28d02!2sPoultry%20Market!5e0!3m2!1sen!2smm!4v1695651070959!5m2!1sen!2smm','651194e293a5b.jpg'),(15,'Château de Montendre','Established on a 114-metre-high spur, overlooking the moors of Haute Saintonge and Guyenne, vast wooded expanses (Forêt de la Double) and the roofs of the small city below, the castle of Montendre would have succeeded a Roman castrum and a first wooden fortress, built around the 9th century, where, according to tradition, Charlemagne would have stopped by continuing the Huend In the century, the castle was rebuilt in stone, and included a keep, solid walls punctuated by four circular towers and a square tower (which was rebuilt in the 15th century). The device is completed below with a palisade in a log','https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4076.301705818896!2d-0.41326661901801715!3d45.28368980776551!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4800388bfd881a63%3A0x2223f43311152707!2sCh%C3%A2teau%20de%20Montendre!5e0!3m2!1sen!2smm!4v1696437443503!5m2!1sen!2smm','651ed396ca02c.jpg');
/*!40000 ALTER TABLE `attractions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `package_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `tax` int NOT NULL DEFAULT '10',
  `subtotal` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `payment_type` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `booking_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `package_id` (`package_id`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,4,8,2,23,10,50,1,NULL,'2023-09-25 00:00:00','2023-09-24 21:18:20','2023-09-24 21:18:20'),(2,4,10,2,34,10,74,1,NULL,'2023-09-27 00:00:00','2023-09-25 20:35:00','2023-09-25 20:35:00'),(3,4,3,2,15000,10,33000,2,NULL,'2023-10-24 00:00:00','2023-10-09 21:38:16','2023-10-09 21:38:16');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campsites`
--

DROP TABLE IF EXISTS `campsites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campsites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `location` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campsites`
--

LOCK TABLES `campsites` WRITE;
/*!40000 ALTER TABLE `campsites` DISABLE KEYS */;
INSERT INTO `campsites` VALUES (1,'Yangon Campsite','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488797.9785910376!2d95.8519060836728!3d16.839536841517816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2z4YCb4YCU4YC64YCA4YCv4YCU4YC6!5e0!3m2!1smy!2smm!4v1692607750595!5m2!1smy!2smm','2023-08-17 16:15:49','2023-09-24 22:13:08'),(2,'Mandalay Campsite','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118427.04902531789!2d95.99342209257541!3d21.94049860069746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb6d23f0d27411%3A0x24146be01e4e5646!2z4YCZ4YCU4YC54YCQ4YCc4YCx4YC4!5e0!3m2!1smy!2smm!4v1692608218998!5m2!1smy!2smm','2023-08-18 13:54:11','2023-09-24 22:12:50'),(5,'Many Glacier Campground Campsite','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d674680.1376270108!2d-114.50523415051573!3d48.65826712132348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5368901555555555%3A0xaf16bc2215c55dec!2sGlacier%20National%20Park!5e0!3m2!1sen!2smm!4v1695393016315!5m2!1sen!2smm','2023-09-22 20:52:45','2023-09-22 21:33:15'),(6,'Buttermilk Falls State Park','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2945.505761592875!2d-76.52407952423181!3d42.41696837118755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d0811e696c99e1%3A0x13b98adb49c0f4c7!2sButtermilk%20Falls%20State%20Park!5e0!3m2!1sen!2smm!4v1695394836084!5m2!1sen!2smm\"','2023-09-22 21:32:12','2023-09-22 21:32:48'),(7,'Brow House Farm','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d74259.07633099743!2d-0.8303901723330531!3d54.4347634349043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487f222d8732b92b%3A0x39309a7c93de85c6!2sBrow%20House%20Farm%20Caravan%20%26%20Camping%20Site!5e0!3m2!1sen!2smm!4v1695568328069!5m2!1sen!2smm','2023-09-24 21:42:33','2023-09-24 21:42:33'),(8,'Brow House Farm','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2323.052765129105!2d-0.7236911236668965!3d54.39138299602132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487f222d8732b92b%3A0x39309a7c93de85c6!2sBrow%20House%20Farm%20Caravan%20%26%20Camping%20Site!5e0!3m2!1sen!2smm!4v1695569061214!5m2!1sen!2smm','2023-09-24 21:55:05','2023-09-24 21:55:05'),(9,'Twin Lakes Campsite France','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d718462.200108711!2d-0.435673!3d45.2984666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4800478aacc5e0fb%3A0x6a2edc9389b054c7!2sTwin%20Lakes%20Campsite%20France!5e0!3m2!1sen!2smm!4v1695569988945!5m2!1sen!2smm','2023-09-24 22:10:29','2023-09-24 22:10:29'),(10,'Camp Laurent - (Exclusively for Adults)','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d710020.217724685!2d0.527723570354195!3d45.96094298818152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fe66c0b3bd723d%3A0x46ea6596dd60d70f!2sCamp%20Laurent%20-%20Exclusively%20for%20Adults!5e0!3m2!1sen!2smm!4v1695570094104!5m2!1sen!2smm','2023-09-24 22:12:23','2023-09-24 22:13:34');
/*!40000 ALTER TABLE `campsites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'dfdasf','dfaf','kk09254010314@gmail.com','dfadafafafasfasfafdfsa','2023-09-16 11:14:10','2023-09-16 11:14:10'),(2,'dfdasf','dfaf','kk09254010314@gmail.com','dfadafafafasfasfafdfsa','2023-09-16 11:14:49','2023-09-16 11:14:49'),(3,'dfdasf','dfaf','kk09254010314@gmail.com','dfadafafafasfasfafdfsa','2023-09-16 11:15:07','2023-09-16 11:15:07'),(4,'dfdasf','dfaf','kk09254010314@gmail.com','dfadafafafasfasfafdfsa','2023-09-16 11:15:11','2023-09-16 11:15:11'),(5,'kk09254010314@gmail.com','hello ','world','site not working ','2023-09-24 21:10:00','2023-09-24 21:10:00'),(6,'irshad@flexibledrive.com','hello world','world','fill','2023-09-25 20:35:37','2023-09-25 20:35:37'),(7,'irshad@flexibledrive.com','dfdasf','dfaf','345678','2023-10-05 21:09:35','2023-10-05 21:09:35');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `view_count` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'dd','dd','kolinn@gmail.com','ddddd','09 799 718690','ddddd',0,'2023-08-15 14:43:53','2023-08-15 14:43:53'),(4,'Test','User','testuser@gmail.com','Test123','091130','ddddd',24,'2023-08-15 14:43:53','2023-08-15 14:43:53'),(6,'burma','normal','test@gmail.com','kkkkkkkk','09254489334','no dfsajfioef',0,'2023-10-08 23:03:19','2023-10-08 23:03:19');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `features` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (1,'Wifi Free','Wifi is 100% free.','64e3750f3287c.png'),(2,'Free Lunch','This is lunch feature','64ddd86713add.jpg'),(3,'Car Parking','Free Car Pariing','64df1d4fee66b.png'),(5,'Electricity','Give Electricity using generator','651d8a3989025.png'),(6,'hot water','provide hot water instead of cold water','6511822dcedec.png'),(7,'Free Toilet','Free Toilet for everyone','65118258a6f34.png'),(8,'shower ','fjasdfiojdqwfopi','651d87b31c064.png');
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_attraction`
--

DROP TABLE IF EXISTS `package_attraction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_attraction` (
  `package_id` int NOT NULL,
  `attraction_id` int NOT NULL,
  KEY `package_id` (`package_id`),
  KEY `attraction_id` (`attraction_id`),
  CONSTRAINT `package_attraction_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  CONSTRAINT `package_attraction_ibfk_2` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_attraction`
--

LOCK TABLES `package_attraction` WRITE;
/*!40000 ALTER TABLE `package_attraction` DISABLE KEYS */;
INSERT INTO `package_attraction` VALUES (3,3),(3,5),(13,8),(13,9),(14,15),(16,15),(15,15),(9,11),(9,12),(8,5),(8,6),(7,8),(6,8),(10,8),(12,8),(12,9),(11,8);
/*!40000 ALTER TABLE `package_attraction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_feature`
--

DROP TABLE IF EXISTS `package_feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_feature` (
  `package_id` int NOT NULL,
  `feature_id` int NOT NULL,
  KEY `package_id` (`package_id`),
  KEY `feature_id` (`feature_id`),
  CONSTRAINT `package_feature_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  CONSTRAINT `package_feature_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_feature`
--

LOCK TABLES `package_feature` WRITE;
/*!40000 ALTER TABLE `package_feature` DISABLE KEYS */;
INSERT INTO `package_feature` VALUES (3,6),(3,5),(13,7),(13,6),(13,5),(13,3),(14,6),(14,5),(14,3),(16,6),(16,5),(16,3),(15,6),(15,5),(15,3),(9,6),(9,5),(8,5),(7,6),(7,5),(6,5),(6,3),(10,6),(10,5),(12,6),(12,5),(12,3),(11,6),(11,5);
/*!40000 ALTER TABLE `package_feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pitch_type_id` int NOT NULL,
  `campsite_id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pitch_type_id` (`pitch_type_id`),
  KEY `campsite_id` (`campsite_id`),
  CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`pitch_type_id`) REFERENCES `pitch_types` (`id`),
  CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`campsite_id`) REFERENCES `campsites` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (3,3,2,'Bite Pu Tent','Take your adventure with nature ',15000,'64e2d348d18e9.jpg','https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d48018.10528919934!2d96.10646459089804!3d21.966604813262222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1smy!2smm!4v1692433398220!5m2!1smy!2smm',1,'2023-09-25 19:38:49','2023-08-19 09:38:05'),(6,1,6,'Bryn Gloch Caravan and Camping Park','Adventurous types, unite, and make your way to Bryn Gloch Caravan and Camping Park in sweet, sweet Snowdonia. On the edge of the national park and within walking distance of Snowdon’s summit, this is the type of place where holidaymakers can hike from pitch to summit and back again in just a few hours.\r\n\r\nIt’s peaceful too, on the banks of the river Gwyrfai with views of the Snowdonia mountain range and the north Wales countryside. There are other walking routes directly from the site, good news for those with dogs or a lust for adventure.\r\n\r\nOne of the UK’s longest heritage railways, the Ffestiniog & Welsh Highland Railways passes through the site on its 25-mile journey past the foot of Snowdon. You might want to board it yourself Caernarfon (10 minutes’ drive) and see if you can spot your patch of land as you pass by. That’s after you’ve experienced one of the boat trips that run along the Menai Strait from the quayside below Caernarfon Castle, of course.\r\n\r\nThere’s a very generous serving of facilities at Bryn Gloch Caravan and Camping Park, from heated bathrooms and wifi to playgrounds and a games room. Your Snowdon packed lunch should be quite easy to sort too, since there’s a fully-stocked shop on site. At the foot of Snowdon, the pitches are spacious too, giving you plenty of opportunities to soak in the Snowdonia scenery.',38,'6526b5293cf7a.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2395.8349461994167!2d-4.19086492375198!3d53.09519919348588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4865a6fdc3ac62c1%3A0x92eb7a484d5ef9fc!2sBryn%20Gloch%20Caravan%20%26%20Camping%20Park!5e0!3m2!1sen!2smm!4v1695598612194!5m2!1sen!2smm',1,'2023-10-11 21:16:01','2023-08-19 09:38:05'),(7,3,6,'Bryn Gloch Caravan and Camping Park','Adventurous types, unite, and make your way to Bryn Gloch Caravan and Camping Park in sweet, sweet Snowdonia. On the edge of the national park and within walking distance of Snowdon’s summit, this is the type of place where holidaymakers can hike from pitch to summit and back again in just a few hours.\r\n\r\nIt’s peaceful too, on the banks of the river Gwyrfai with views of the Snowdonia mountain range and the north Wales countryside. There are other walking routes directly from the site, good news for those with dogs or a lust for adventure.\r\n\r\nOne of the UK’s longest heritage railways, the Ffestiniog & Welsh Highland Railways passes through the site on its 25-mile journey past the foot of Snowdon. You might want to board it yourself Caernarfon (10 minutes’ drive) and see if you can spot your patch of land as you pass by. That’s after you’ve experienced one of the boat trips that run along the Menai Strait from the quayside below Caernarfon Castle, of course.\r\n\r\nThere’s a very generous serving of facilities at Bryn Gloch Caravan and Camping Park, from heated bathrooms and wifi to playgrounds and a games room. Your Snowdon packed lunch should be quite easy to sort too, since there’s a fully-stocked shop on site. At the foot of Snowdon, the pitches are spacious too, giving you plenty of opportunities to soak in the Snowdonia scenery.',38,'6526b4d4da9e5.jpg','https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d48018.10528919934!2d96.10646459089804!3d21.966604813262222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1smy!2smm!4v1692433398220!5m2!1smy!2smm',1,'2023-10-11 21:14:36','2023-08-19 09:38:05'),(8,1,5,'Many Glacier Campground','The Many Glacier Campground is located on the east side of Glacier National Park, at an elevation of approximately 4,500 feet. The campground is located about 22 miles from the town of St. Mary and the east entrance to Glacier National Park. Babb, Montana, is the closest community to the Many Glacier Campground and is located approximately 12 miles east of the campground. Babb has a general store, gas station, several restaurants and an U.S. Post Office.',23,'6526b4bce3591.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10512.901619887538!2d-113.6963968128418!3d48.79667649999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5368b20f34aa70f7%3A0x11dc62128df3527c!2sMany%20Glacier%20Campground!5e0!3m2!1sen!2smm!4v1695598461673!5m2!1sen!2smm',0,'2023-10-11 21:14:12','2023-09-24 20:30:24'),(9,2,6,'Brow House Farm','Tents, Caravans, Motorhomes are accepted at Brow House Farm in Whitby, but there are no electric hookups. Dogs are welcome. Toilets and showers are available onsite. Campfires are allowed.',150,'6526b4a786eaf.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1161.526469287525!2d-0.7211161674336796!3d54.391379932393015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487f222d8732b92b%3A0x39309a7c93de85c6!2sBrow%20House%20Farm%20Caravan%20%26%20Camping%20Site!5e0!3m2!1sen!2smm!4v1695569601563!5m2!1sen!2smm',0,'2023-10-11 21:13:51','2023-09-24 20:56:16'),(10,1,8,'Brow House Farm','Tents, Caravans, Motorhomes are accepted at Brow House Farm in Whitby, but there are no electric hookups. Dogs are welcome. Toilets and showers are available onsite. Campfires are allowed.',34,'6526b5c0bcf84.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1161.526469287525!2d-0.7211161674336796!3d54.391379932393015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487f222d8732b92b%3A0x39309a7c93de85c6!2sBrow%20House%20Farm%20Caravan%20%26%20Camping%20Site!5e0!3m2!1sen!2smm!4v1695569601563!5m2!1sen!2smm',1,'2023-10-11 21:18:32','2023-09-24 22:04:14'),(11,3,8,'Brow House Farm','Tents, Caravans, Motorhomes are accepted at Brow House Farm in Whitby, but there are no electric hookups. Dogs are welcome. Toilets and showers are available onsite. Campfires are allowed.',36,'6526b8fe9c5e5.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1161.526469287525!2d-0.7211161674336796!3d54.391379932393015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487f222d8732b92b%3A0x39309a7c93de85c6!2sBrow%20House%20Farm%20Caravan%20%26%20Camping%20Site!5e0!3m2!1sen!2smm!4v1695569601563!5m2!1sen!2smm',0,'2023-10-11 21:32:22','2023-09-24 22:06:13'),(12,2,10,'Camp Laurent','Despite the rural nature of most of Poitou-Charentes there is plenty to see and do. The mild, sunny climate is ideal for all the fairs and festivals held throughout the summer season. If you are not close enough to the sea to cool down there are plenty of leisure lakes, with their own sandy beaches, and lovely rivers for boating and swimming fun. There is no shortage of beauty either with fields of sunflowers, vineyards and\r\n\r\nmeadows full of wild flowers, all languishing under huge sunny skies.\r\n\r\nThe villages are old and interesting and the architecture is charming.With towns like Cognac, La Rochelle, Saintes, Poitiers, Montmorillon, Confolens to name just a few, you will be spoilt for choice. Each has its own character and offer individual shops in which to browse, indoor markets and, of course, an amazing selection of cafés and restaurants.',26,'6526b6ad23463.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d710020.2175732309!2d-0.6252084531249946!3d45.96094300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fe66c0b3bd723d%3A0x46ea6596dd60d70f!2sCamp%20Laurent%20-%20Exclusively%20for%20Adults!5e0!3m2!1sen!2smm!4v1695570403349!5m2!1sen!2smm',0,'2023-10-11 21:22:29','2023-09-24 22:18:36'),(13,1,10,'Camp Laurent','Despite the rural nature of most of Poitou-Charentes there is plenty to see and do. The mild, sunny climate is ideal for all the fairs and festivals held throughout the summer season. If you are not close enough to the sea to cool down there are plenty of leisure lakes, with their own sandy beaches, and lovely rivers for boating and swimming fun. There is no shortage of beauty either with fields of sunflowers, vineyards and\r\n\r\nmeadows full of wild flowers, all languishing under huge sunny skies.\r\n\r\nThe villages are old and interesting and the architecture is charming.With towns like Cognac, La Rochelle, Saintes, Poitiers, Montmorillon, Confolens to name just a few, you will be spoilt for choice. Each has its own character and offer individual shops in which to browse, indoor markets and, of course, an amazing selection of cafés and restaurants.',30,'6526b1088c101.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d710020.2175732309!2d-0.6252084531249946!3d45.96094300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fe66c0b3bd723d%3A0x46ea6596dd60d70f!2sCamp%20Laurent%20-%20Exclusively%20for%20Adults!5e0!3m2!1sen!2smm!4v1695570403349!5m2!1sen!2smm',0,'2023-10-11 20:58:24','2023-09-24 22:19:49'),(14,1,9,'Twin Lakes Campsite France','Twin Lakes  is a family-run campsite located in the Charente Maritime region of France. Situated north of the beautiful city of Bordeaux, Twin Lakes is close to many nearby French cities, attractions and  vineyards. The campsite is open from March - November. ',34,'6526b139f209e.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d718461.8732004828!2d-1.655102421875002!3d45.298492400000036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4800478aacc5e0fb%3A0x6a2edc9389b054c7!2sTwin%20Lakes%20Campsite%20France!5e0!3m2!1sen!2smm!4v1695570840817!5m2!1sen!2smm',0,'2023-10-11 20:59:13','2023-09-24 22:24:31'),(15,2,9,'Twin Lakes Campsite France','Twin Lakes  is a family-run campsite located in the Charente Maritime region of France. Situated north of the beautiful city of Bordeaux, Twin Lakes is close to many nearby French cities, attractions and  vineyards. The campsite is open from March - November. ',34,'6526b1639757f.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d718461.8732004828!2d-1.655102421875002!3d45.298492400000036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4800478aacc5e0fb%3A0x6a2edc9389b054c7!2sTwin%20Lakes%20Campsite%20France!5e0!3m2!1sen!2smm!4v1695570840817!5m2!1sen!2smm',0,'2023-10-11 21:11:22','2023-09-24 22:25:43'),(16,3,9,'Twin Lakes Campsite France','Twin Lakes  is a family-run campsite located in the Charente Maritime region of France. Situated north of the beautiful city of Bordeaux, Twin Lakes is close to many nearby French cities, attractions and  vineyards. The campsite is open from March - November. ',112,'6526b1eb87319.jpeg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d718461.8732004828!2d-1.655102421875002!3d45.298492400000036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4800478aacc5e0fb%3A0x6a2edc9389b054c7!2sTwin%20Lakes%20Campsite%20France!5e0!3m2!1sen!2smm!4v1695570840817!5m2!1sen!2smm',0,'2023-10-11 21:02:11','2023-09-24 22:26:38');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pitch_types`
--

DROP TABLE IF EXISTS `pitch_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pitch_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pitch_types`
--

LOCK TABLES `pitch_types` WRITE;
/*!40000 ALTER TABLE `pitch_types` DISABLE KEYS */;
INSERT INTO `pitch_types` VALUES (1,'Tent Pitch','2023-08-15 17:54:44','2023-08-15 17:54:44'),(2,'Touring Caravan Pitch','2023-08-15 17:54:44','2023-08-15 17:54:44'),(3,'Motorhome Pitch','2023-08-15 17:55:16','2023-09-02 21:13:28');
/*!40000 ALTER TABLE `pitch_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `package_id` int NOT NULL,
  `message` varchar(256) NOT NULL,
  `rating` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `package_id` (`package_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,1,3,'hello world',5,'2023-09-17 16:21:07','2023-09-17 16:21:15'),(2,1,3,'hello world2',5,'2023-09-17 16:21:07','2023-09-17 16:21:15'),(3,1,3,'3',5,'2023-09-17 16:21:07','2023-09-17 16:21:15'),(4,1,3,'hello world 44',5,'2023-09-17 16:21:07','2023-09-17 16:21:15'),(5,1,3,'hello world 445',5,'2023-09-17 16:21:07','2023-09-17 16:21:15'),(6,4,3,'very goood',5,'2023-09-24 21:08:47','2023-09-24 21:08:47'),(7,4,16,'hdfaskjsdkafj',3,'2023-09-25 20:36:33','2023-09-25 20:36:33');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rss_table`
--

DROP TABLE IF EXISTS `rss_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb3 */;
CREATE TABLE `rss_table` (
  `rss_id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100),
  `description` text,
  `url` varchar(256),
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rss_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rss_table`
--

LOCK TABLES `rss_table` WRITE;
/*!40000 ALTER TABLE `rss_table` DISABLE KEYS */;
INSERT INTO `rss_table` VALUES (1,'Home','This is the landing page for the users.','http://localhost/gwsc/','2023-09-27 14:48:17','2023-09-27 14:48:17'),(2,'Information','This is the page for show all the package avaliable in website for giving you infos.','http://localhost/gwsc/information.php','2023-09-27 14:48:17','2023-09-27 14:48:17'),(3,'Avalibility','This page allow to search the avaliable packages and pitch types.','http://localhost/gwsc/avalibility.php','2023-09-27 14:48:17','2023-09-27 14:48:17'),(4,'Review','This page allow user to give review and read other guys review for each package.','http://localhost/gwsc/review.php','2023-09-27 14:48:17','2023-09-27 14:48:17'),(5,'features','This page show the all the features give on packages.','http://localhost/gwsc/feature.php','2023-09-27 14:48:17','2023-09-27 14:48:17'),(6,'Content','Customer give the feedback of website to admin\'s.','http://localhost/gwsc/contact.php','2023-09-27 14:48:17','2023-09-27 14:48:17'),(7,'Local Attraction','This page show all the localattraction near the avaliable packages','http://localhost/gwsc/localAttraction.php','2023-09-27 14:48:17','2023-09-27 14:48:17');
/*!40000 ALTER TABLE `rss_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-11 21:38:33
