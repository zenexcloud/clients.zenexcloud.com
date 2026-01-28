--
-- `#prefix#ModuleSettings`
--
CREATE TABLE IF NOT EXISTS `#prefix#ModuleSettings` (
    `setting`              VARCHAR(64) NOT NULL UNIQUE,
    `value`            TEXT NOT NULL,
    PRIMARY KEY (`setting`)
    ) ENGINE=InnoDB DEFAULT CHARSET=#charset# DEFAULT COLLATE #collation#;

--
-- `#prefix#Logger`
--
CREATE TABLE IF NOT EXISTS `#prefix#Logger` (
    `id`            int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_ref`        int(10) unsigned NOT NULL,
    `id_type`       VARCHAR(255) NOT NULL,
    `type`          VARCHAR(255) NOT NULL,
    `level`         VARCHAR(255) NOT NULL,
    `date`          DATETIME DEFAULT null,
    `request`       TEXT NOT NULL,
    `response`      TEXT NOT NULL,
    `before_vars`   TEXT NOT NULL,
    `vars`          TEXT NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=#charset# DEFAULT COLLATE #collation#;

--
-- `#prefix#Cart`
--
CREATE TABLE IF NOT EXISTS `#prefix#Cart`
(
    `id`              int(10) unsigned NOT NULL AUTO_INCREMENT,
    `cart_identifier` VARCHAR(255) NOT NULL,
    `order_id`        int(10) unsigned NULL,
    `last_update`     DATETIME DEFAULT null,
    `email`           TEXT NULL,
    `cart_token`      TEXT NULL,
    PRIMARY KEY ( `id` )
    ) ENGINE=InnoDB DEFAULT CHARSET=#charset# DEFAULT COLLATE #collation#;

--
-- `#prefix#CartClientRelations`
--
CREATE TABLE IF NOT EXISTS `#prefix#CartClientRelations`
(
    `client_id`      int(10) unsigned NOT NULL,
    `cart_id`        int(10) unsigned NOT NULL,
    PRIMARY KEY ( `client_id`,  `cart_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=#charset# DEFAULT COLLATE #collation#;

--
-- `#prefix#CartSnapshots`
--
CREATE TABLE IF NOT EXISTS `#prefix#CartSnapshots`
(
    `id`        int(10) unsigned NOT NULL AUTO_INCREMENT,
    `cart_id`   int(10) NOT NULL,
    `date`      DATETIME DEFAULT null,
    `items`     TEXT NULL,
    PRIMARY KEY ( `id` )
    ) ENGINE=InnoDB DEFAULT CHARSET=#charset# DEFAULT COLLATE #collation#;

--
-- `#prefix#EmailReminders`
--
CREATE TABLE IF NOT EXISTS `#prefix#EmailReminders`
(
    `id`            int(10) unsigned NOT NULL AUTO_INCREMENT,
    `title`         TEXT NULL,
    `client_template_id`   int(10) NOT NULL,
    `email_template_id`   int(10) NOT NULL,
    `products`      TEXT NULL,
    `addons`        TEXT NULL,
    `domains`       TEXT NULL,
    `carts_older_than` int(10) unsigned NULL,
    `carts_younger_than` int(10) unsigned NULL,
    `status`        text NOT NULL,
    PRIMARY KEY ( `id` )
    ) ENGINE=InnoDB DEFAULT CHARSET=#charset# DEFAULT COLLATE #collation#;

--
-- `#prefix#EmailRemindersSent`
--
CREATE TABLE IF NOT EXISTS `#prefix#EmailRemindersSent`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `email_reminder_id` int(10) NOT NULL,
    `cart_id`   int(10) NOT NULL,
    `item`      TEXT NULL,
    `type`      TEXT NULL,
    PRIMARY KEY ( `id` )
    ) ENGINE=InnoDB DEFAULT CHARSET=#charset# DEFAULT COLLATE #collation#;

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