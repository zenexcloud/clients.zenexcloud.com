--
-- `#prefix#SavedCarts`
--
CREATE TABLE IF NOT EXISTS `#prefix#SavedCarts`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `data` TEXT NOT NULL,
    `token` TEXT NOT NULL,
    `client_id` int(10) unsigned NULL,
    `date` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY ( `id` )
    ) ENGINE=InnoDB DEFAULT CHARSET=#charset# DEFAULT COLLATE #collation#;