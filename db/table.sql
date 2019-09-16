CREATE TABLE `url_shortner` (
 `url_id` varchar(5) NOT NULL,
 `long_url` varchar(255) NOT NULL,
 `short_url` varchar(50) NOT NULL,
 `date` datetime DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`url_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1