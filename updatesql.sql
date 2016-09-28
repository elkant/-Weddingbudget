ALTER TABLE `weddingbudget`.`budget` 
CHANGE COLUMN `title` `title` VARCHAR(255) NULL DEFAULT NULL ;


CREATE TABLE `weddingbudget`.`verification` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(255) NULL,
  `customerid` VARCHAR(45) NULL,
  `activeuntil` DATE NULL,
  PRIMARY KEY (`id`));
