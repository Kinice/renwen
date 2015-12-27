DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `imgpath` varchar(100) NOT NULL,
  `ndesc` text,
  `title` varchar(60),
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;