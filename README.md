# draw-canvas

Базовая структура БД:

CREATE TABLE `img` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data_uri` mediumblob,
  `password` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;