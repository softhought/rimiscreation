/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.34-MariaDB : Database - newvista
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`newvista` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `admin_menu_master` */

DROP TABLE IF EXISTS `admin_menu_master`;

CREATE TABLE `admin_menu_master` (
  `adm_menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `adm_menu_name` varchar(255) DEFAULT NULL,
  `adm_menu_link` varchar(255) DEFAULT NULL,
  `is_parent` enum('P','SM','SSM','C') DEFAULT NULL COMMENT 'P= Parent,SM=Sub Menu, SSM= Sub Sub Menu',
  `parent_id` int(10) DEFAULT NULL,
  `menu_srl` int(10) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`adm_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
