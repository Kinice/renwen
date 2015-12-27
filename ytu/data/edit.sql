DROP TABLE IF EXISTS `edit01`;
CREATE TABLE `edit01` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

insert into edit01(id, content, lastedit) values(0, 'init', '1993-9-17 00:00:00');
insert into edit02(id, content, lastedit) values(0, 'init2', '1993-9-17 00:00:00');
insert into edit03(id, content, lastedit) values(0, 'init3', '1993-9-17 00:00:00');
insert into edit04(id, content, lastedit) values(0, 'init4', '1993-9-17 00:00:00');
insert into edit05(id, content, lastedit) values(0, 'init5', '1993-9-17 00:00:00');
insert into edit06(id, content, lastedit) values(0, 'init6', '1993-9-17 00:00:00');

DROP TABLE IF EXISTS `edit02`;
CREATE TABLE `edit02` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `edit03`;
CREATE TABLE `edit03` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `edit04`;
CREATE TABLE `edit04` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `edit05`;
CREATE TABLE `edit05` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `edit06`;
CREATE TABLE `edit06` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
