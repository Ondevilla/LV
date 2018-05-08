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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `assets` */

insert  into `assets`(`assetId`,`entId`,`catId`,`supId`,`statId`,`itmTypeId`,`acqTypeId`,`code`,`assetName`,`model`,`brand`,`description`,`serialNumber`,`po_no`,`date_purchased`,`dr_no`,`delivery_date`,`inv_no`,`req_no`,`unitPrice`,`deprec_value`,`remarks`,`endOfWarranty_date`,`pr_no`,`req_auth_id`,`req_dep_id`,`req_date`,`est_useful_life`,`isAccount`,`isDeleted`,`sellPrice`) values (1,1,1,1,1,1,1,'1212','wewe','wqwq','wsws','wawa','121','2','0000-00-00','1212','0000-00-00','1212','1212','1222.0000','222.0000','we','0000-00-00','22',12,12,'0000-00-00',11,1,0,'2.0000');

/*Table structure for table `assetstwo` */

DROP TABLE IF EXISTS `assetstwo`;

CREATE TABLE `assetstwo` (
  `assetsId` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `serialName` varchar(255) DEFAULT NULL,
  `supId` int(255) DEFAULT NULL,
  `itmTypeId` varchar(255) DEFAULT NULL,
  `assetName` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `unitPrice` varchar(255) DEFAULT NULL,
  `sellPrice` varchar(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `date_purchased` varchar(255) DEFAULT NULL,
  `endofWarranty_date` varchar(255) DEFAULT NULL,
  `req_date` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `isDeleted` varchar(255) DEFAULT NULL,
  `asstId` varchar(255) DEFAULT NULL,
  `entId` varchar(255) DEFAULT NULL,
  `catId` varchar(255) DEFAULT NULL,
  `statId` varchar(255) DEFAULT NULL,
  `acqTypeId` varchar(255) DEFAULT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `deprec_value` varchar(255) DEFAULT NULL,
  `pr_no` varchar(255) DEFAULT NULL,
  `req_auth_id` varchar(255) DEFAULT NULL,
  `req_dep_id` varchar(255) DEFAULT NULL,
  `est_useful_life` varchar(255) DEFAULT NULL,
  `isAccount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`assetsId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `assetstwo` */

insert  into `assetstwo`(`assetsId`,`code`,`serialName`,`supId`,`itmTypeId`,`assetName`,`brand`,`model`,`description`,`unitPrice`,`sellPrice`,`quantity`,`date_purchased`,`endofWarranty_date`,`req_date`,`remarks`,`isDeleted`,`asstId`,`entId`,`catId`,`statId`,`acqTypeId`,`delivery_date`,`deprec_value`,`pr_no`,`req_auth_id`,`req_dep_id`,`est_useful_life`,`isAccount`) values (1,'1111','1010',1,'d','ASSET1','brand1','model1','h','3000','4000',0,'l','m','n','o','0','q','r','s','t','u','v','w',NULL,NULL,NULL,NULL,NULL),(2,'2222','129',2,'b','ASSET2','brand2','model2','m','2000','3000',0,'k','l','k','k','0','k','k','k','ll','l',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'3333333','3918918',1,'2','Sample Item','Brand 123','Model 123','Maganda to pre ','200.00','500.00',80,'2018-01-23','2018-01-25',NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,'2018-01-26',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `businesstypes` */

DROP TABLE IF EXISTS `businesstypes`;

CREATE TABLE `businesstypes` (
  `busTypeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `busTypeName` varchar(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`busTypeId`),
  UNIQUE KEY `ind_businesstypes_busTypeName` (`busTypeName`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `businesstypes` */

insert  into `businesstypes`(`busTypeId`,`busTypeName`,`isDeleted`) values (1,'Computer',0),(2,'Industrial',0),(3,'School',0),(4,'asdasd',0),(5,'test',0),(6,'',1),(7,'Type1',1);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `catId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`catId`),
  UNIQUE KEY `ind_categories_categoryName` (`categoryName`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`catId`,`categoryName`,`isDeleted`) values (0,'',1),(1,'Computers',0),(2,'Network',0),(3,'Audio/Video',0),(4,'teet',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

insert  into `clients`(`clientId`,`clientName`,`busTypeId`,`contactPerson`,`address`,`telno`,`mobileno`,`faxno`,`email`,`dateCreated`,`remarks`,`isActive`,`isDeleted`,`tin`,`osca_pwd_no`,`sc_tin_no`,`tax_status`) values (6,'asd1',1,'asd','asd','23123','','','','2017-12-13','',1,0,'','','','Non Vatable'),(7,'Halcyon Marine Healthcare Systems',2,'Glennda Canlas',NULL,'5117071',NULL,NULL,NULL,'2017-12-13',NULL,1,0,'1754541212',NULL,NULL,'Vatable'),(8,'Mountain Dew',1,'Mountain Man','Mandaluyong City','293039481','10293019','01039301','miguel_ccortez@yahoo.com.ph','2018-01-30','Remark1',0,0,'193819','0139100','9109189','Vatable');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `groupid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupName` varchar(255) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `groups` */

insert  into `groups`(`groupid`,`groupName`,`isDeleted`) values (1,'test',0),(2,'test123333',0);

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
  `invoiceStatId` int(11) unsigned DEFAULT '0',
  `clientId` int(11) unsigned DEFAULT '0',
  `clientName` varchar(250) DEFAULT NULL,
  `clientAddress` varchar(250) DEFAULT NULL,
  `bustypeId` int(11) unsigned DEFAULT '0',
  `bustypeName` varchar(250) DEFAULT NULL,
  `controlNo` varchar(250) DEFAULT NULL,
  `tin` varchar(250) DEFAULT NULL,
  `osca_pwd_no` varchar(250) DEFAULT NULL,
  `sc_tin_no` varchar(250) DEFAULT NULL,
  `date_created` varchar(255) DEFAULT '0000-00-00',
  `due_date` varchar(255) DEFAULT '0000-00-00',
  `terms` varchar(250) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `vatableSale` decimal(10,4) DEFAULT '0.0000',
  `totalSales` decimal(10,4) DEFAULT '0.0000',
  `vatExemptSale` decimal(10,4) DEFAULT '0.0000',
  `lessVat` decimal(10,4) DEFAULT '0.0000',
  `zeroRatedSale` decimal(10,4) DEFAULT '0.0000',
  `discount` decimal(10,4) DEFAULT '0.0000',
  `vat` decimal(10,4) DEFAULT '0.0000',
  `sales` decimal(10,4) DEFAULT '0.0000',
  `totalAmountDue` decimal(10,4) DEFAULT '0.0000',
  `isDeleted` tinyint(1) DEFAULT '0',
  `salesPerson` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`invoiceId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `invoices` */

insert  into `invoices`(`invoiceId`,`invoiceStatId`,`clientId`,`clientName`,`clientAddress`,`bustypeId`,`bustypeName`,`controlNo`,`tin`,`osca_pwd_no`,`sc_tin_no`,`date_created`,`due_date`,`terms`,`remarks`,`vatableSale`,`totalSales`,`vatExemptSale`,`lessVat`,`zeroRatedSale`,`discount`,`vat`,`sales`,`totalAmountDue`,`isDeleted`,`salesPerson`) values (7,100001,7,'Halcyon Marine Healthcare Systems',NULL,1,'Computer',NULL,NULL,NULL,NULL,'2018-01-30','2018-01-30',NULL,'Remarks here','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000',1,NULL),(8,100002,7,'Halcyon Marine Healthcare Systems',NULL,2,'Industrial',NULL,NULL,NULL,NULL,'2018-01-30','2018-01-30',NULL,'Remarks 1 ','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000',1,NULL),(9,100005,7,'Halcyon Marine Healthcare Systems',NULL,2,'Industrial',NULL,NULL,NULL,NULL,'2018-01-30','2018-01-30',NULL,'Remark1\r\n','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000','0.0000',1,NULL);

/*Table structure for table `items_ordered` */

DROP TABLE IF EXISTS `items_ordered`;

CREATE TABLE `items_ordered` (
  `orderId` int(255) NOT NULL AUTO_INCREMENT,
  `assetsId` int(255) DEFAULT NULL,
  `assetName` varchar(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `unitPrice` int(255) DEFAULT NULL,
  `sellPrice` int(255) DEFAULT NULL,
  `invoiceId` int(255) DEFAULT NULL,
  `handledBy` varchar(255) DEFAULT NULL,
  `date-added` varchar(255) DEFAULT NULL,
  `isDeleted` int(255) DEFAULT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `items_ordered` */

insert  into `items_ordered`(`orderId`,`assetsId`,`assetName`,`quantity`,`unitPrice`,`sellPrice`,`invoiceId`,`handledBy`,`date-added`,`isDeleted`) values (29,3,'Sample Item',15,200,500,5,NULL,NULL,0),(30,3,'Sample Item',20,200,500,5,NULL,NULL,0),(31,2,'ASSET2',1,2000,3000,6,NULL,NULL,0),(32,3,'Sample Item',10,200,500,7,NULL,NULL,0),(33,3,'Sample Item',15,200,500,8,NULL,NULL,0),(34,1,'ASSET1',1,3000,4000,8,NULL,NULL,0),(35,2,'ASSET2',1,2000,3000,8,NULL,NULL,0),(36,3,'Sample Item',10,200,500,9,NULL,NULL,0),(37,3,'Sample Item',10,200,500,9,NULL,NULL,0);

/*Table structure for table `reportsclientorder` */

DROP TABLE IF EXISTS `reportsclientorder`;

CREATE TABLE `reportsclientorder` (
  `reportOrder_id` int(255) NOT NULL AUTO_INCREMENT,
  `invoiceId` int(255) DEFAULT NULL,
  `invoiceStatId` int(255) DEFAULT NULL,
  `clientId` int(255) DEFAULT NULL,
  `clientName` varchar(255) DEFAULT NULL,
  `bustypeId` int(255) DEFAULT NULL,
  `bustypeName` varchar(255) DEFAULT NULL,
  `total_amount` int(255) DEFAULT NULL,
  `amount_paid` int(255) DEFAULT NULL,
  `handledBy` varchar(255) DEFAULT NULL,
  `date_paid` date DEFAULT NULL,
  PRIMARY KEY (`reportOrder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `reportsclientorder` */

insert  into `reportsclientorder`(`reportOrder_id`,`invoiceId`,`invoiceStatId`,`clientId`,`clientName`,`bustypeId`,`bustypeName`,`total_amount`,`amount_paid`,`handledBy`,`date_paid`) values (10,7,100001,7,'Halcyon Marine Healthcare Systems',1,'Computer',500,12000,'admin','2018-01-30'),(11,8,100002,7,'Halcyon Marine Healthcare Systems',2,'Industrial',7500,8000,'admin','2018-01-30'),(12,9,100005,7,'Halcyon Marine Healthcare Systems',2,'Industrial',11200,13000,'admin','2018-01-30');

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
  `approved_by` varchar(255) NOT NULL DEFAULT '0',
  `date_approved` date NOT NULL DEFAULT '0000-00-00',
  `remarks` text,
  `typeOfSup` enum('Potential','Accredited') NOT NULL DEFAULT 'Potential',
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`supId`),
  UNIQUE KEY `ind_suppliers_supName` (`supName`),
  KEY `FK_suppliers_businesstypes_busTypeId` (`busTypeId`),
  CONSTRAINT `FK_suppliers_businesstypes_busTypeId` FOREIGN KEY (`busTypeId`) REFERENCES `businesstypes` (`busTypeId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `suppliers` */

insert  into `suppliers`(`supId`,`busTypeId`,`supName`,`contactPerson`,`address`,`telno`,`faxno`,`email`,`approved_by`,`date_approved`,`remarks`,`typeOfSup`,`isActive`,`isDeleted`) values (1,2,'Arnold','Ondevilla','mandaluyong city','09500516578','09500950590','float.sundae@gmail.com','0','0000-00-00','','',0,0),(7,1,'Sample Supplier','Person 1','Makati City','3938193','210384891839','miguel_ccortez@yahoo.com','Master','2018-01-25','Remark','Potential',0,0);

/*Table structure for table `useraccount` */

DROP TABLE IF EXISTS `useraccount`;

CREATE TABLE `useraccount` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `accessright` varchar(255) DEFAULT NULL,
  `isActive` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `useraccount` */

insert  into `useraccount`(`user_id`,`user_name`,`user_password`,`accessright`,`isActive`) values (1,'admin','ED1KDa2sl1D6ze/tuBjF/t0L/j+H/RpvqFvaN/Da7F8=','1','1'),(2,'user','Q+Az782PKE+Ig6i3fZjd49PUOiczEIoy37EYttN/wzw=','2','1'),(3,'arnold','FBNc6QYo8GqbQLFDfpuHugM8C7hl3GL1ZgwNaJpNkWg=','1','1'),(4,'ulit','bfRIStZGzsMixdNI1IG+XdJPJ1TLs2Jx1VoMlBdKBtI=','1','1');

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
