--
-- ALTER TABLE
--
ALTER TABLE `#prefix#Cart` ADD `cart_token` TEXT NULL;
--
-- `#prefix#OptOutEmails`
--
CREATE TABLE IF NOT EXISTS `#prefix#OptOutEmails`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NULL,
    `date` DATETIME DEFAULT NULL,
    PRIMARY KEY ( `id` )
    ) ENGINE=InnoDB DEFAULT CHARSET=#charset# DEFAULT COLLATE #collation#;
