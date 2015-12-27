-- MySQL dump 10.13  Distrib 5.1.66, for redhat-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: renwen
-- ------------------------------------------------------
-- Server version	5.1.66

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `kind` int(11) NOT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `email` char(50) DEFAULT NULL,
  `regTime` datetime NOT NULL,
  `logincouts` int(11) NOT NULL DEFAULT '0',
  `publishcouts` int(11) NOT NULL DEFAULT '0',
  `loginlast` datetime NOT NULL,
  `loginip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `tkind` int(11) NOT NULL,
  `tpub` int(11) NOT NULL,
  `thot` int(11) NOT NULL DEFAULT '0',
  `tstatus` int(11) NOT NULL,
  `tcontent` text NOT NULL,
  `aid` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `pubtime` datetime NOT NULL,
  `readcouts` int(11) NOT NULL DEFAULT '0',
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `daoshi`
--

DROP TABLE IF EXISTS `daoshi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daoshi` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `teaid` tinyint(3) unsigned NOT NULL,
  `zhuanyeming` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `docname` varchar(100) NOT NULL,
  `docauthor` varchar(100) NOT NULL,
  `docpath` varchar(50) NOT NULL,
  `doctime` datetime NOT NULL,
  `downloadcounts` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edit01`
--

DROP TABLE IF EXISTS `edit01`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit01` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edit02`
--

DROP TABLE IF EXISTS `edit02`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit02` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edit03`
--

DROP TABLE IF EXISTS `edit03`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit03` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edit04`
--

DROP TABLE IF EXISTS `edit04`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit04` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edit05`
--

DROP TABLE IF EXISTS `edit05`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit05` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edit06`
--

DROP TABLE IF EXISTS `edit06`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit06` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `imgpath` varchar(100) NOT NULL,
  `ndesc` text,
  `title` varchar(60) DEFAULT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `teaname` varchar(20) NOT NULL,
  `teajob` varchar(20) DEFAULT NULL,
  `teasex` enum('male','female') DEFAULT NULL,
  `teastudy` varchar(20) DEFAULT NULL,
  `tealearn` varchar(20) DEFAULT NULL,
  `teawork` varchar(50) NOT NULL,
  `teagreat` varchar(50) DEFAULT NULL,
  `workhistory` text NOT NULL,
  `teakind` int(11) DEFAULT '0',
  `result` text,
  `award` text,
  `article` text,
  `face` varchar(50) DEFAULT NULL,
  `edittime` datetime NOT NULL,
  `isdaoshi` int(11) DEFAULT '0',
  `shuoshi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-06 19:42:46
