CREATE TABLE `addon` (
  `addon_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`addon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `config` (
  `name` varchar(50) NOT NULL,
  `value` varchar(200) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `name` (`name`),
  KEY `author` (`author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `perspective` (
  `perspective_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_perspective_id` int(11) DEFAULT NULL,
  `session_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`perspective_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `perspective_access` (
  `perspective_access_id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `perspective_id` int(11) NOT NULL,
  `ssl_available` tinyint(4) NOT NULL,
  PRIMARY KEY (`perspective_access_id`),
  UNIQUE KEY `host_path` (`host`,`path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `perspective_addon` (
  `perspective_id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  UNIQUE KEY `perspective_addon` (`perspective_id`,`addon_id`),
  KEY `weight` (`weight`),
  KEY `perspective_id` (`perspective_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `session_group` (
  `session_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `perspective_access_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
