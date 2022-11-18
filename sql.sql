
-- CREATE DATABASE `day11_PHP_ontap` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE day11_PHP_ontap;


-- CREATE TABLE IF NOT EXISTS `category` (
--   `id` INT  PRIMARY KEY AUTO_INCREMENT,
--   `name` VARCHAR(100) UNIQUE,
--   `status` TINYINT DEFAULT 1
-- ) ENGINE = InnoDB;

-- CREATE TABLE IF NOT EXISTS `product` (
--   `id` INT  PRIMARY KEY AUTO_INCREMENT,
--   `name` VARCHAR(150) NOT NULL,
--   `image` VARCHAR(150) NOT NULL,
--   `price` FLOAT(10,3) NOT NULL,
--   `sale` FLOAT(10,3) DEFAULT 0,
--   `category_id` INT,
--   `status` TINYINT DEFAULT 1,
--     FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
-- ) ENGINE = InnoDB;

-- INSERT INTO `category` VALUES
-- (null,'Lẩu',1),
-- (null,'Nướng',1),
-- (null,'Salad',1),
-- (null,'Tráng miệng',0),
-- (null,'Đồ uống',1)

SELECT * FROM product