数据库 是  renwen

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,--登陆使用账号
  `kind` int NOT NULL,--管理员类型：1-超管2-栏目管理员... 
  `nickname` varchar(20),--显示使用名称
  `password` char(32) NOT NULL,--密码
  `email` varchar(50),--电子邮箱
  `regTime` datetime NOT NULL,--注册时间
  `logincouts` int NOT NULL DEFAULT 0,--登陆次数
  `publishcouts` int NOT NULL DEFAULT 0,--发布文章数
  `loginlast` datetime NOT NULL,--最后登陆时间
  `loginip` varchar(20),--最后登陆ip
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

LOCK TABLES `admin` WRITE;
INSERT INTO `admin` VALUES (1,'admin',1,'administrator','59ddec3f302a642b3c386f643a54ba69','191030148@qq.com','2015-03-26',0,0,'2015-03-26','127.0.0.1');
UNLOCK TABLES;

LOCK TABLES `admin` WRITE;
INSERT INTO `admin` VALUES (2,'tongzhi',2,'xueyuantongzhi','91a1ca4a87cd777c7ceab4d561439033','191030148@qq.com','2015-03-26',0,0,'2015-03-26','127.0.0.1');
UNLOCK TABLES;


DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `kind` int NOT NULL,
  `nickname` varchar(20),
  `password` varchar(32) NOT NULL,
  `email` char(50),
  `regTime` datetime NOT NULL,
  `logincouts` int NOT NULL DEFAULT 0,
  `publishcouts` int NOT NULL DEFAULT 0,
  `loginlast` datetime NOT NULL,
  `loginip` varchar(20),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;