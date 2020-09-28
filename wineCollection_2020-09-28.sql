# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.31)
# Database: wineCollection
# Generation Time: 2020-09-28 12:15:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table wine
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wine`;

CREATE TABLE `wine` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `variety` varchar(100) NOT NULL DEFAULT '',
  `tones` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `cost_id` int(11) NOT NULL,
  `country_of_origin` int(11) NOT NULL,
  `img_location` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `wine` WRITE;
/*!40000 ALTER TABLE `wine` DISABLE KEYS */;

INSERT INTO `wine` (`id`, `variety`, `tones`, `brand_id`, `cost_id`, `country_of_origin`, `img_location`)
VALUES
	(1,'Cabernet Sauvignon','Concoction of ripe red berries, toasted oak, rich vanilla, mocha and black pepper.',1,2,1,'imgs/cab-sav.png'),
	(2,'Shiraz (Yellow Label)',' Plum, spice and pepper characters with subtle oak.',2,3,1,'imgs/shiraz.jpeg'),
	(3,'Merlot (Black Label)','Ripe fruit flavours of raspberry, cherry and plums integrated with subtle oak',3,3,1,'imgs/merlot.jpg'),
	(4,'Rioja','Intense rich flavours of ripe red cherries and strawberries, followed by sweet vanilla and spice.',4,3,2,'imgs/rioja.jpeg'),
	(5,'Pinotage','Ripe flavours of raspberry, plum and black cherry, finishing with a hint of oak.',5,4,3,'imgs/pinotage.jpg'),
	(6,'Pinot Noir','Juicy red fruit (think cranberries, cherries, and raspberries), and delicate hints of cedar, smoke, and bay leaf.',1,2,1,'imgs/pinot-noir.png'),
	(7,'Malbec','Juicy plum, redcurrant and blackberry fruit flavours are notes of chocolate, bay leaves and spice, toasted with a little oak that rounds off the palate.',6,1,4,'imgs/malbec.jpeg');

/*!40000 ALTER TABLE `wine` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
