/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.1.42-community : Database - lightvent
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lightvent` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lightvent`;

/*Table structure for table `accountabilitystatus` */

DROP TABLE IF EXISTS `accountabilitystatus`;

CREATE TABLE `accountabilitystatus` (
  `acctStatId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `acctStatus` char(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`acctStatId`),
  UNIQUE KEY `ind_accountabilitystatus_acctStatus` (`acctStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `accountabilitystatus` */

insert  into `accountabilitystatus`(`acctStatId`,`acctStatus`,`isDeleted`) values (1,'Preparation',0),(2,'Send',0),(3,'Settled',0),(4,'Cancelled',0);

/*Table structure for table `assetgroup` */

DROP TABLE IF EXISTS `assetgroup`;

CREATE TABLE `assetgroup` (
  `assetGroupId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catId` int(11) unsigned NOT NULL DEFAULT '0',
  `groupName` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `sellPrice` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `unit` varchar(250) NOT NULL,
  `itemSold` int(11) NOT NULL DEFAULT '0',
  `itemOnStock` int(11) NOT NULL DEFAULT '0',
  `itemObselete` int(11) NOT NULL DEFAULT '0',
  `itemConsignment` int(11) NOT NULL DEFAULT '0',
  `maintaining` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`assetGroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `assetgroup` */

insert  into `assetgroup`(`assetGroupId`,`catId`,`groupName`,`description`,`sellPrice`,`date_created`,`isDeleted`,`unit`,`itemSold`,`itemOnStock`,`itemObselete`,`itemConsignment`,`maintaining`) values (1,1,'Desktop PC i3','','25000.0000','2017-11-24 15:19:40',0,'unit',0,1,0,0,2);

/*Table structure for table `assets` */

DROP TABLE IF EXISTS `assets`;

CREATE TABLE `assets` (
  `assetId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entId` int(11) unsigned NOT NULL DEFAULT '0',
  `catId` int(11) unsigned NOT NULL DEFAULT '0',
  `supId` int(11) unsigned NOT NULL DEFAULT '0',
  `statId` int(11) unsigned NOT NULL DEFAULT '0',
  `itmTypeId` int(11) unsigned NOT NULL DEFAULT '0',
  `acqTypeId` int(11) unsigned NOT NULL DEFAULT '0',
  `code` char(40) NOT NULL,
  `assetName` char(100) NOT NULL,
  `model` char(100) DEFAULT NULL,
  `brand` char(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `serialNumber` char(50) DEFAULT NULL,
  `po_no` varchar(20) DEFAULT NULL,
  `date_purchased` date NOT NULL DEFAULT '0000-00-00',
  `dr_no` varchar(20) DEFAULT NULL,
  `delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `inv_no` varchar(20) DEFAULT NULL,
  `req_no` varchar(20) DEFAULT NULL,
  `unitPrice` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `deprec_value` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `remarks` varchar(500) DEFAULT NULL,
  `endOfWarranty_date` date NOT NULL DEFAULT '0000-00-00',
  `pr_no` varchar(20) NOT NULL,
  `req_auth_id` int(11) unsigned NOT NULL DEFAULT '0',
  `req_dep_id` int(11) unsigned NOT NULL DEFAULT '0',
  `req_date` date NOT NULL DEFAULT '0000-00-00',
  `est_useful_life` int(10) unsigned NOT NULL DEFAULT '0',
  `isAccount` tinyint(1) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `sellPrice` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`assetId`),
  UNIQUE KEY `ind_assets_code` (`code`),
  KEY `FK_assets_categories_catId` (`catId`),
  KEY `FK_assets_suppliers_supId` (`supId`),
  KEY `FK_assets_status_statId` (`statId`),
  KEY `FK_assets_itemtypes_itemTypeId` (`itmTypeId`),
  KEY `FK_assets_acquiretypes_acqTypeId` (`acqTypeId`),
  CONSTRAINT `FK_assets_categories_catId` FOREIGN KEY (`catId`) REFERENCES `assetgroup` (`assetGroupId`) ON UPDATE CASCADE,
  CONSTRAINT `FK_assets_status_statId` FOREIGN KEY (`statId`) REFERENCES `status` (`statId`) ON UPDATE CASCADE,
  CONSTRAINT `FK_assets_suppliers_supId` FOREIGN KEY (`supId`) REFERENCES `suppliers` (`supId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `assets` */

/*Table structure for table `assetstwo` */

DROP TABLE IF EXISTS `assetstwo`;

CREATE TABLE `assetstwo` (
  `assetsId` int(255) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `serialName` varchar(255) DEFAULT NULL,
  `supId` int(255) DEFAULT NULL,
  `itmTypeId` int(255) DEFAULT NULL,
  `assetName` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `statId` int(255) DEFAULT NULL,
  `unitPrice` decimal(65,0) DEFAULT NULL,
  `sellPrice` decimal(65,0) DEFAULT NULL,
  `quantity` decimal(65,0) DEFAULT NULL,
  `date_purchased` date DEFAULT NULL,
  `endofWarranty_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `isDeleted` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`assetsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `assetstwo` */

/*Table structure for table `businesstypes` */

DROP TABLE IF EXISTS `businesstypes`;

CREATE TABLE `businesstypes` (
  `busTypeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `busTypeName` varchar(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`busTypeId`),
  UNIQUE KEY `ind_businesstypes_busTypeName` (`busTypeName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `businesstypes` */

insert  into `businesstypes`(`busTypeId`,`busTypeName`,`isDeleted`) values (0,'',0),(1,'Computer',0),(2,'Industrial',0),(3,'School',0);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `catId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`catId`),
  UNIQUE KEY `ind_categories_categoryName` (`categoryName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`catId`,`categoryName`,`isDeleted`) values (0,'',0),(1,'Computers',0),(2,'Network',0),(3,'Audio/Video',0);

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `clientId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientName` varchar(200) NOT NULL,
  `busTypeId` int(11) unsigned NOT NULL DEFAULT '0',
  `contactPerson` char(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `telno` varchar(100) DEFAULT NULL,
  `mobileno` varchar(100) DEFAULT NULL,
  `faxno` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dateCreated` date NOT NULL DEFAULT '0000-00-00',
  `remarks` text,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `tin` varchar(100) DEFAULT NULL,
  `osca_pwd_no` varchar(100) DEFAULT NULL,
  `sc_tin_no` varchar(100) DEFAULT NULL,
  `tax_status` varchar(100) NOT NULL,
  PRIMARY KEY (`clientId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `groupid` int(255) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(255) DEFAULT NULL,
  `isDeleted` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`groupid`,`groupName`,`isDeleted`) values (1,'asd','0');

/*Table structure for table `invoiceitems` */

DROP TABLE IF EXISTS `invoiceitems`;

CREATE TABLE `invoiceitems` (
  `invItmId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoiceId` int(11) unsigned NOT NULL DEFAULT '0',
  `clientId` int(11) unsigned NOT NULL DEFAULT '0',
  `assetId` int(11) unsigned NOT NULL DEFAULT '0',
  `assetGroupId` int(11) unsigned NOT NULL DEFAULT '0',
  `clientName` varchar(250) NOT NULL,
  `amount` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isRemove` tinyint(1) NOT NULL DEFAULT '0',
  `removeBy` int(11) unsigned NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '1',
  `unit` varchar(255) DEFAULT NULL,
  `supId` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`invItmId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `invoiceitems` */

/*Table structure for table `invoices` */

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `invoiceId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoiceStatId` int(11) unsigned NOT NULL DEFAULT '0',
  `clientId` int(11) unsigned NOT NULL DEFAULT '0',
  `clientName` varchar(250) NOT NULL,
  `clientAddress` varchar(250) DEFAULT NULL,
  `bustypeId` int(11) unsigned NOT NULL DEFAULT '0',
  `bustypeName` varchar(250) DEFAULT NULL,
  `controlNo` varchar(250) DEFAULT NULL,
  `tin` varchar(250) DEFAULT NULL,
  `osca_pwd_no` varchar(250) DEFAULT NULL,
  `sc_tin_no` varchar(250) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT '0000-00-00',
  `due_date` date NOT NULL DEFAULT '0000-00-00',
  `terms` varchar(250) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `vatableSale` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `totalSales` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `vatExemptSale` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `lessVat` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `zeroRatedSale` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `discount` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `vat` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sales` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `totalAmountDue` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `salesPerson` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`invoiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `invoices` */

/*Table structure for table `items_ordered` */

DROP TABLE IF EXISTS `items_ordered`;

CREATE TABLE `items_ordered` (
  `assetsId` int(255) NOT NULL AUTO_INCREMENT,
  `assetName` varchar(255) DEFAULT NULL,
  `quantity` decimal(65,0) DEFAULT NULL,
  `unitPrice` decimal(65,0) DEFAULT NULL,
  `sellPrice` decimal(65,0) DEFAULT NULL,
  `invoiceId` int(255) DEFAULT NULL,
  `isDeleted` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`assetsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `items_ordered` */

/*Table structure for table `specifications` */

DROP TABLE IF EXISTS `specifications`;

CREATE TABLE `specifications` (
  `specsId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `assetId` int(11) unsigned NOT NULL DEFAULT '0',
  `specsfield` varchar(150) NOT NULL,
  `specsvalue` varchar(150) NOT NULL,
  PRIMARY KEY (`specsId`),
  KEY `FK_specifications_assets_assetId` (`assetId`),
  CONSTRAINT `FK_specifications_assets_assetId` FOREIGN KEY (`assetId`) REFERENCES `assets` (`assetId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `specifications` */

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `statId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`statId`),
  UNIQUE KEY `ind_status_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `status` */

insert  into `status`(`statId`,`status`,`isDeleted`) values (0,'',0),(1,'Sold',0),(2,'Preparation',0),(3,'Consignment',0),(4,'test2',1),(5,'test3',1),(6,'test4',1),(7,'On Stock',0),(8,'test5',1);

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `busTypeId` int(11) unsigned NOT NULL DEFAULT '0',
  `supName` varchar(100) NOT NULL,
  `contactPerson` char(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `telno` varchar(50) DEFAULT NULL,
  `faxno` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `approved_by` int(11) NOT NULL DEFAULT '0',
  `date_approved` date NOT NULL DEFAULT '0000-00-00',
  `remarks` text,
  `typeOfSup` enum('Potential','Accredited') NOT NULL DEFAULT 'Potential',
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`supId`),
  UNIQUE KEY `ind_suppliers_supName` (`supName`),
  KEY `FK_suppliers_businesstypes_busTypeId` (`busTypeId`),
  CONSTRAINT `FK_suppliers_businesstypes_busTypeId` FOREIGN KEY (`busTypeId`) REFERENCES `businesstypes` (`busTypeId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `suppliers` */

insert  into `suppliers`(`supId`,`busTypeId`,`supName`,`contactPerson`,`address`,`telno`,`faxno`,`email`,`approved_by`,`date_approved`,`remarks`,`typeOfSup`,`isActive`,`isDeleted`) values (1,2,'Arnold','Ondevilla','mandaluyong city','09500516578','09500950590','float.sundae@gmail.com',0,'0000-00-00','','',0,1),(2,1,'Arnold3','Ondevillaa','Mandaluyong','123123','23123123','WEW@gmail.com',0,'0000-00-00','  ','Potential',0,1);

/*Table structure for table `useraccount` */

DROP TABLE IF EXISTS `useraccount`;

CREATE TABLE `useraccount` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `accessright` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `useraccount` */

insert  into `useraccount`(`user_id`,`user_name`,`user_password`,`accessright`,`isActive`) values (1,'admin','ED1KDa2sl1D6ze/tuBjF/t0L/j+H/RpvqFvaN/Da7F8=','1',1),(2,'user','Q+Az782PKE+Ig6i3fZjd49PUOiczEIoy37EYttN/wzw=','2',0),(3,'Arnold','BfH+JIspeEEOHlIWWL20JdvJyUDvGVJ2SdT+uKmVgsk=','1',1),(4,'xam','OlDAScjDTwlvnlOfUp/bzPrzdL0dUO0+iYKG2GsPic8=','2',1);

/* Procedure structure for procedure `annual_cost_spec_year` */

/*!50003 DROP PROCEDURE IF EXISTS  `annual_cost_spec_year` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `annual_cost_spec_year`(vYear TEXT)
BEGIN
	SELECT
	  COALESCE(SUM(IF(a.catId = 1,a.unitPrice,0)),0)    data1,
	  COALESCE(SUM(IF(a.catId = 2,a.unitPrice,0)),0)    data2,
	  COALESCE(SUM(IF(a.catId = 3,a.unitPrice,0)),0)    data3,
	  COALESCE(SUM(IF(a.catId = 4,a.unitPrice,0)),0)    data4,
	  COALESCE(SUM(IF(a.catId = 5,a.unitPrice,0)),0)    data5
	FROM hmhs_cid.assets a
	WHERE YEAR(a.delivery_date) = vYear AND a.isDeleted = 0;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `annual_cost_total` */

/*!50003 DROP PROCEDURE IF EXISTS  `annual_cost_total` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `annual_cost_total`(vYear TEXT)
BEGIN
	SELECT
	  COALESCE(SUM(IF(a.catId = 1,a.unitPrice,0)),0)    data1,
	  COALESCE(SUM(IF(a.catId = 2,a.unitPrice,0)),0)    data2,
	  COALESCE(SUM(IF(a.catId = 3,a.unitPrice,0)),0)    data3,
	  COALESCE(SUM(IF(a.catId = 4,a.unitPrice,0)),0)    data4,
	  COALESCE(SUM(IF(a.catId = 5,a.unitPrice,0)),0)    data5
	FROM hmhs_cid.assets a
	WHERE YEAR(a.delivery_date) < vYear AND a.isDeleted = 0;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `annual_deprec_formula` */

/*!50003 DROP PROCEDURE IF EXISTS  `annual_deprec_formula` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `annual_deprec_formula`(vDate TEXT,vDate_now TEXT,vdeprec_val INT,vprice TEXT)
BEGIN
	SELECT 
		IF(
			/* Calculate the depreciated amount for the first year */
			/* Asset delivered on Dec 16 onwards are counted next year */
			MONTH(vDate) = 12 AND DAY(vDate) <= 16 					
			,
			vdeprec_val/12 
			,
			0.0000
		)
		+
		IF(
			(TIMESTAMPDIFF(MONTH,vDate, vDate_now)) * vdeprec_val/12  >= vprice,
			vprice,
			(TIMESTAMPDIFF(MONTH,vDate, vDate_now)) * vdeprec_val/12 
		)
	AS total_deprec;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `annual_deprec_spec_year` */

/*!50003 DROP PROCEDURE IF EXISTS  `annual_deprec_spec_year` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `annual_deprec_spec_year`(vYear TEXT,vYear2 TEXT)
BEGIN
	SELECT 
	
		SUM(IF(a.catId = 1,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)	
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)
				)
			)
		)
		,0))    data1,
		
		SUM(IF(a.catId = 2,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)	
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)
				)
			)
		)
		,0))    data2,
		
		SUM(IF(a.catId = 3,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)	
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)
				)
			)
		)
		,0))    data3,
		
		SUM(IF(a.catId = 4,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)	
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)
				)
			)
		)
		,0))    data4,
		
		SUM(IF(a.catId = 5,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)	
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) = 0, IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) ,
						IF(  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) > a.unitPrice , 
						a.unitPrice - (IF(DAY(a.delivery_date) < 16, (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1) ,  (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2))) - a.deprec_value)
						,a.deprec_value )
					)
				)
			)
		)
		,0))    data5
		
	 FROM hmhs_cid.assets a
	 WHERE a.isDeleted = 0;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `annual_deprec_total` */

/*!50003 DROP PROCEDURE IF EXISTS  `annual_deprec_total` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `annual_deprec_total`(vYear TEXT,vYear2 TEXT)
BEGIN
	SELECT 
	
		SUM(IF(a.catId = 1,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
				
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1))
					)
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life + 1,0.0000,
					
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) 
					)
				)
			)
		)
		,0))    data1,
		
		SUM(IF(a.catId = 2,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
				
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1))
					)
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life + 1,0.0000,
					
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) 
					)
				)
			)
		)
		,0))    data2,
		
		SUM(IF(a.catId = 3,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
				
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1))
					)
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life + 1,0.0000,
					
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) 
					)
				)
			)
		)
		,0))    data3,
		
		SUM(IF(a.catId = 4,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
				
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1))
					)
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life + 1,0.0000,
					
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) 
					)
				)
			)
		)
		,0))    data4,
		
		SUM(IF(a.catId = 5,
		IF(YEAR(a.delivery_date) > YEAR(vYear2) , 0.0000,
			IF(MONTH(a.delivery_date) = 12 AND DAY(a.delivery_date) >= 16, 
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life,0.0000,
				
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1))
					)
				),
				IF(TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2) > a.est_useful_life + 1,0.0000,
					
					IF((TIMESTAMPDIFF(YEAR,a.delivery_date, vYear2)) * a.deprec_value  >= a.unitPrice, a.unitPrice ,
						IF(DAY(a.delivery_date) >= 16,  (a.deprec_value / 12) * TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2), (a.deprec_value / 12) * (TIMESTAMPDIFF(MONTH,a.delivery_date, vYear2) + 1)) 
					)
				)
			)
		)
		,0))    data5
		
	 FROM hmhs_cid.assets a
	 WHERE a.isDeleted = 0;
	
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `filter_accountability` */

/*!50003 DROP PROCEDURE IF EXISTS  `filter_accountability` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `filter_accountability`(vFilter TEXT,vValue TEXT,vYear TEXT)
BEGIN
	SET @statement := CONCAT(
		"SELECT
		  a.controlNumber,
		  a.empName,
		  a.co_maker_name,
		  a.issued_name,
		  a.created_by,
		  a.acctId        AS Id,
		  a.empId,
		  a.isPrinted as print,
		  a.acctStatId as status
		FROM hmhs_cid.accountabilities a
		  JOIN hmhs_cid.accountabilitystatus b
		    ON (a.acctStatId = b.acctStatId)
		WHERE a.isDeleted = 0 AND ",vFilter," LIKE '%",vValue,"%' 
		AND YEAR(a.created_date) = ",vYear,"
		ORDER BY a.controlNumber  "
		);
	PREPARE sqlstatement FROM  @statement;
	EXECUTE sqlstatement;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `filter_assetgroup` */

/*!50003 DROP PROCEDURE IF EXISTS  `filter_assetgroup` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `filter_assetgroup`(vFilter TEXT,vValue TEXT)
BEGIN
	SET @statement := CONCAT(
		"SELECT a.groupName,b.categoryName,a.sellPrice,a.itemOnStock,a.itemSold,a.assetGroupId AS Id,a.isDeleted,a.maintaining FROM hmhs_cid.assetgroup a
		  JOIN hmhs_cid.categories b ON (b.catId=a.catId)
    		WHERE a.isDeleted = 0 AND ",vFilter," LIKE '%",vValue,"%' 
		ORDER BY a.groupName  "
		);
	PREPARE sqlstatement FROM  @statement;
	EXECUTE sqlstatement;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `filter_assets` */

/*!50003 DROP PROCEDURE IF EXISTS  `filter_assets` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `filter_assets`(vFilter TEXT,vValue TEXT,vYear TEXT)
BEGIN
	SET @statement := CONCAT(
		"SELECT
		  a.code,
		  a.assetName,
		  d.groupName,
		  b.status,
		  c.supName,
		  a.description,
		  a.statId,
		  a.isAccount,
		  a.assetId      AS Id,
		  a.catId
		FROM hmhs_cid.assets a
		  JOIN hmhs_cid.status b
		    ON (a.statId = b.statId)
		  JOIN hmhs_cid.suppliers c
		    ON (a.supId = c.supId)
		  JOIN hmhs_cid.assetgroup d
		    ON (d.assetGroupId=a.catId)
    		WHERE a.isDeleted = 0 AND ",vFilter," LIKE '%",vValue,"%' 
		ORDER BY a.code  "
		);
	PREPARE sqlstatement FROM  @statement;
	EXECUTE sqlstatement;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `filter_clients` */

/*!50003 DROP PROCEDURE IF EXISTS  `filter_clients` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `filter_clients`(vFilter TEXT,vValue TEXT)
BEGIN
	SET @statement := CONCAT(
		"SELECT
		  a.clientName,
		  a.contactPerson,
		  a.telno,
		  a.mobileno,
		  a.faxno,
		  a.email,
		  a.clientId         AS Id
		FROM hmhs_cid.clients a
		  JOIN hmhs_cid.businesstypes b
		    ON (a.busTypeId = b.busTypeId)
    		WHERE a.clientId != 0 AND a.isDeleted = 0 AND ",vFilter," LIKE '%",vValue,"%' 
		ORDER BY a.clientName  "
		);
	PREPARE sqlstatement FROM  @statement;
	EXECUTE sqlstatement;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `filter_invoices` */

/*!50003 DROP PROCEDURE IF EXISTS  `filter_invoices` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `filter_invoices`(vFilter TEXT,vValue TEXT,vYear TEXT)
BEGIN
	SET @statement := CONCAT(
		"SELECT a.controlNo,a.clientName,a.bustypeName,a.date_created,a.due_date,a.terms,a.remarks,a.invoiceStatId AS status,b.acctStatus,a.invoiceId AS Id,a.clientId,
		a.vatableSale,a.totalSales,a.vatExemptSale,a.lessVat,a.zeroRatedSale,a.discount,a.vat,a.sales,a.totalAmountDue,c.tax_status
		FROM hmhs_cid.invoices a
		LEFT JOIN hmhs_cid.accountabilitystatus b
		ON (a.invoiceStatId=b.acctStatId)
		JOIN hmhs_cid.clients c
		ON (a.clientId=c.clientId)
		WHERE a.isDeleted = 0 AND ",vFilter," LIKE '%",vValue,"%' 
		AND YEAR(a.date_created) = ",vYear,"
		ORDER BY a.controlNo  "
		);
	PREPARE sqlstatement FROM  @statement;
	EXECUTE sqlstatement;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `filter_logs` */

/*!50003 DROP PROCEDURE IF EXISTS  `filter_logs` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `filter_logs`(vFilter TEXT,vValue TEXT)
BEGIN
	SET @statement := CONCAT(
		"SELECT a.logDate,b.fullname,a.affected_table,a.actions,a.activity 
		FROM utilities.audit_logs a
		JOIN usermanagement.users b
		ON (a.userId=b.userId)
		WHERE ",vFilter," LIKE '%",vValue,"%' 
		ORDER BY a.logId DESC   "
		);
	PREPARE sqlstatement FROM  @statement;
	EXECUTE sqlstatement;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `filter_suppliers` */

/*!50003 DROP PROCEDURE IF EXISTS  `filter_suppliers` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `filter_suppliers`(vFilter TEXT,vValue TEXT)
BEGIN
	SET @statement := CONCAT(
		"SELECT
		  a.supName,
		  a.contactPerson,
		  a.telno,
		  a.faxno,
		  a.email,
		  a.typeOfSup,
		  a.supId         AS Id
		FROM hmhs_cid.suppliers a
		  JOIN hmhs_cid.businesstypes b
		    ON (a.busTypeId = b.busTypeId)
    		WHERE a.supId != 0 AND a.isDeleted = 0 AND ",vFilter," LIKE '%",vValue,"%' 
		ORDER BY a.supName  "
		);
	PREPARE sqlstatement FROM  @statement;
	EXECUTE sqlstatement;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
