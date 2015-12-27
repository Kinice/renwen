DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `docname` varchar(100) NOT NULL,--文件名称
  `docauthor` varchar(100) NOT NULL,--文件作者
  `docpath` varchar(50) NOT NULL,--文件路径
  `doctime` datetime NOT NULL,--上传日期
  `downloadcounts` int NOT NULL DEFAULT 0,--下载次数
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;





DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `docname` varchar(100) NOT NULL,
  `docauthor` varchar(100) NOT NULL,
  `docpath` varchar(50) NOT NULL,
  `doctime` datetime NOT NULL,
  `downloadcounts` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;