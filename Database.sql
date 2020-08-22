# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: garten_app
# Generation Time: 2020-08-22 11:35:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table city
# ------------------------------------------------------------

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `gardenId` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(100) NOT NULL DEFAULT '',
  `country` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`gardenId`),
  UNIQUE KEY `gardenId` (`gardenId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table gardenBeds
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gardenBeds`;

CREATE TABLE `gardenBeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bedNr` int(4) NOT NULL,
  `area` int(100) NOT NULL COMMENT '(cm squared)',
  `gardenId` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `gardenId` (`gardenId`),
  KEY `bedNr` (`bedNr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table gardenHousehold
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gardenHousehold`;

CREATE TABLE `gardenHousehold` (
  `gardenId` varchar(50) NOT NULL DEFAULT '',
  `householdSize` int(4) NOT NULL DEFAULT '2',
  PRIMARY KEY (`gardenId`),
  UNIQUE KEY `gardenId` (`gardenId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userId` varchar(50) NOT NULL DEFAULT '',
  `firstName` varchar(100) NOT NULL DEFAULT '',
  `lastName` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `gardenId` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `gardenId` (`gardenId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table userPass
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userPass`;

CREATE TABLE `userPass` (
  `userId` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vegData
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vegData`;

CREATE TABLE `vegData` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variety` varchar(50) NOT NULL DEFAULT '',
  `weeksToMat` int(3) NOT NULL COMMENT 'calender week',
  `yield` int(11) NOT NULL COMMENT 'servings/m2',
  `lowTemp` int(3) NOT NULL COMMENT 'degrees celsius',
  `firstSowing` int(3) NOT NULL COMMENT 'calender week',
  `lastSowing` int(3) NOT NULL COMMENT 'calender week; 0=single sowing',
  `multipleSowings` tinyint(1) NOT NULL COMMENT '0=no; 1=yes',
  `harvestWindow` int(3) NOT NULL COMMENT 'weeks',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `vegData` WRITE;
/*!40000 ALTER TABLE `vegData` DISABLE KEYS */;

INSERT INTO `vegData` (`id`, `variety`, `weeksToMat`, `yield`, `lowTemp`, `firstSowing`, `lastSowing`, `multipleSowings`, `harvestWindow`)
VALUES
	(1,'Möhren',12,11,0,9,29,1,4),
	(2,'Rote Beete',9,5,0,9,32,1,4),
	(3,'Salat',8,5,0,11,32,1,2),
	(4,'Zuchini',10,7,5,21,0,0,8);

/*!40000 ALTER TABLE `vegData` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vegPreferred
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vegPreferred`;

CREATE TABLE `vegPreferred` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vegDataId` int(11) NOT NULL,
  `gardenId` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `vegDataId` (`vegDataId`),
  KEY `gardenId` (`gardenId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vegProduction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vegProduction`;

CREATE TABLE `vegProduction` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gardenId` varchar(50) NOT NULL DEFAULT '',
  `bedNr` int(4) NOT NULL,
  `vegDataId` int(11) NOT NULL,
  `firstHarvestWeek` int(3) NOT NULL COMMENT 'CW',
  `sowingWeek` int(3) NOT NULL COMMENT 'CW',
  `varietyArea` int(100) NOT NULL COMMENT 'cm squared',
  `harvestWindow` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vegDataId` (`vegDataId`),
  KEY `gardenId` (`gardenId`),
  KEY `bedNr` (`bedNr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
