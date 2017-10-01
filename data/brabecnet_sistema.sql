CREATE DATABASE brabecnet_sistema CHARSET = UTF8 COLLATE = utf8_general_ci;
USE brabecnet_sistema;

-- Places and contact ----------------------------------------------------------

CREATE TABLE `regions` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`          varchar(60)     NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
);

CREATE TABLE `fulladdresses` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `county`        int(10)         UNSIGNED NOT NULL,
    `neighborhood`  varchar(60)     NOT NULL,
    `place`         varchar(60)     NOT NULL,
    `number`        varchar(10)     NOT NULL,
    `zipcode`       varchar(8)      NOT NULL,
    `detail`        varchar(60)     NOT NULL DEFAULT '',
    `update`        timestamp       NOT NULL,
    PRIMARY KEY (`id`)
    -- FOREIGN KEY (`county`) REFERENCES `address`.`counties` (`id`)
    -- @see https://github.com/aryelgois/databases
);

CREATE TABLE `phones` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `number`        varchar(20)     NOT NULL UNIQUE,
    `update`        timestamp       NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `emails` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `email`         varchar(60)     NOT NULL UNIQUE,
    `update`        timestamp       NOT NULL,
    PRIMARY KEY (`id`)
);

-- People ----------------------------------------------------------------------

CREATE TABLE `people` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`          varchar(60)     NOT NULL,
    `document`      varchar(14)     NOT NULL UNIQUE,
    `birthday`      date            NOT NULL,
    `update`        timestamp       NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `people_addresses` (
    `person`        int(10)         UNSIGNED NOT NULL,
    `address`       int(10)         UNSIGNED NOT NULL,
    PRIMARY KEY (`person`, `address`),
    FOREIGN KEY (`person`) REFERENCES `people` (`id`),
    FOREIGN KEY (`address`) REFERENCES `fulladdresses` (`id`)
);

CREATE TABLE `people_phones` (
    `person`        int(10)         UNSIGNED NOT NULL,
    `phone`         int(10)         UNSIGNED NOT NULL,
    PRIMARY KEY (`person`, `phone`),
    FOREIGN KEY (`person`) REFERENCES `people` (`id`),
    FOREIGN KEY (`phone`) REFERENCES `phones` (`id`)
);

CREATE TABLE `people_emails` (
    `person`        int(10)         UNSIGNED NOT NULL,
    `email`         int(10)         UNSIGNED NOT NULL,
    PRIMARY KEY (`person`, `email`),
    FOREIGN KEY (`person`) REFERENCES `people` (`id`),
    FOREIGN KEY (`email`) REFERENCES `emails` (`id`)
);

-- Servers ---------------------------------------------------------------------

CREATE TABLE `servers` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `region`        int(10)         UNSIGNED NOT NULL,
    `address`       int(10)         UNSIGNED NOT NULL,
    `name`          varchar(60)     NOT NULL UNIQUE,
    `ip4`           char(12)        NOT NULL UNIQUE,
    `stamp`         timestamp       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`region`) REFERENCES `regions` (`id`),
    FOREIGN KEY (`address`) REFERENCES `fulladdresses` (`id`)
);

-- Clients ---------------------------------------------------------------------

CREATE TABLE `plans` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`          varchar(60)     NOT NULL UNIQUE,
    `velocity`      int(10)         UNSIGNED NOT NULL,
    `cost`          decimal(17,4)   UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `clients` (
    `id`            int(10)         UNSIGNED NOT NULL,
    `credit`        int(10)         NOT NULL DEFAULT 0,
    `reputation`    tinyint(3)      NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id`) REFERENCES `people` (`id`)
);

CREATE TABLE `contracts` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `client`        int(10)         UNSIGNED NOT NULL,
    `server`        int(10)         UNSIGNED NOT NULL,
    `plan`          int(10)         UNSIGNED NOT NULL,
    `velocity`      int(10)         UNSIGNED,
    `cost`          decimal(17,4)   UNSIGNED,
    `billet_due`    date            NOT NULL,
    `update`        timestamp       NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`client`) REFERENCES `clients` (`id`),
    FOREIGN KEY (`server`) REFERENCES `servers` (`id`),
    FOREIGN KEY (`plan`) REFERENCES `plans` (`id`)
);

CREATE TABLE `devices` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `contract`      int(10)         UNSIGNED NOT NULL,
    `mac`           varchar(60)     NOT NULL UNIQUE,
    `name`          varchar(60),
    `stamp`         timestamp       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`contract`) REFERENCES `contracts` (`id`)
);

-- Employees -------------------------------------------------------------------

CREATE TABLE `employee_groups` (
    `id`            int(10)         UNSIGNED NOT NULL,
    `name`          varchar(60)     NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `employees` (
    `id`            int(10)         UNSIGNED NOT NULL,
    `group`         int(10)         UNSIGNED NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id`) REFERENCES `people` (`id`),
    FOREIGN KEY (`group`) REFERENCES `employee_groups` (`id`)
);

CREATE TABLE `service_orders` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `description`   varchar(500)    NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `service_order_employees` (
    `id`            int(10)         UNSIGNED NOT NULL,
    `employee`      int(10)         UNSIGNED NOT NULL,
    PRIMARY KEY (`id`, `employee`),
    FOREIGN KEY (`id`) REFERENCES `service_orders` (`id`),
    FOREIGN KEY (`employee`) REFERENCES `employees` (`id`)
);

CREATE TABLE `service_protocols` (
    `id`            int(10)         UNSIGNED NOT NULL AUTO_INCREMENT,
    `description`   varchar(500)    NOT NULL,
    `update`        timestamp       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);
