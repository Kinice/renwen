# Host: LocalHost  (Version: 5.5.25)
# Date: 2015-09-09 13:39:11
# Generator: MySQL-Front 5.3  (Build 4.13)

/*!40101 SET NAMES utf8 */;

#
# Source for table "xiaoyou"
#

CREATE TABLE `xiaoyou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `qq` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# Data for table "xiaoyou"
#

INSERT INTO `xiaoyou` VALUES (1,'董晔','0535-6903327','dongye@ytu.edu.cn','254283844');
