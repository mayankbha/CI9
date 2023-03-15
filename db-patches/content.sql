DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `content_id` bigint(99) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keyword` text NOT NULL,
  `content` longtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
