CREATE TABLE `urls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(8) NOT NULL DEFAULT '',
  `redirect_to` varchar(1000) DEFAULT NULL,
  `visits` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;