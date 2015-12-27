DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `teaname` varchar(20) NOT NULL,--教师姓名
  `teajob` varchar(20),--教师职称：教授 
  `teasex` ENUM('male', 'female'),--教师性别
  `teastudy` varchar(20),--学位：博士
  `tealearn` varchar(20),--学历
  `teawork` varchar(50) NOT NULL,--职务：烟台大学人文院长
  `teagreat` varchar(50),--研究领域:宪法学
  `workhistory` text NOT NULL,--学习工作经历
  `result` text,--个人主要成果
  `award` text,--荣誉奖励
  `article` text,--学术论文
  `face` varchar(50),--头像
  `edittime` datetime NOT NULL,--最后修改日期
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,--教师id等于cId
  `albumPath` varchar(50) NOT NULL,--图片路径
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `teaname` varchar(20) NOT NULL,
  `teajob` varchar(20),
  `teasex` ENUM('male', 'female'),
  `teastudy` varchar(20),
  `tealearn` varchar(20),
  `teawork` varchar(50) NOT NULL,
  `teagreat` varchar(50),
  `workhistory` text NOT NULL,
  `teakind` int default 0,
  `result` text,
  `award` text,
  `article` text,
  `face` varchar(50),
  `edittime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;