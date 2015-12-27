DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,--文章标题
  `tkind` int NOT NULL,--文章类型 
  `tpub` int NOT NULL,--文章是否发布 
  `thot` int NOT NULL DEFAULT 0,--文章是否重要0:不重要，1：重要
  `tstatus` int NOT NULL,--文章状态：1-发布；-2保存；3-停用 还有就是删除了
  `tcontent` text NOT NULL,--文章内容
  `aid` int NOT NULL,--发布人id
  `author` varchar(50) NOT NULL,--发布人使用名称，考虑最后如果普管被删，留下最后的名称
  `pubtime` datetime NOT NULL,--发布时间
  `readcouts` int NOT NULL DEFAULT 0,--阅读次数
  `lastedit` datetime NOT NULL,--最后修改时间
  PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `tkind` int NOT NULL,
  `tpub` int NOT NULL,
  `thot` int NOT NULL DEFAULT 0,
  `tstatus` int NOT NULL,
  `tcontent` text NOT NULL,
  `aid` int NOT NULL,
  `author` varchar(50) NOT NULL,
  `pubtime` datetime NOT NULL,
  `readcouts` int NOT NULL DEFAULT 0,
  `lastedit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

