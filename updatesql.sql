ALTER TABLE `weddingbudget`.`account` 
ADD COLUMN `emailverified` VARCHAR(45) NULL DEFAULT 'no' AFTER `type`;

ADD COLUMN `emailverificationcode` VARCHAR(205) NULL AFTER `emailverified`;

ALTER TABLE `weddingbudget`.`budget` 
ADD COLUMN `budgetsource` VARCHAR(45) NULL AFTER `timestamp`;


CHANGE COLUMN `budgetid` `budgetid` VARCHAR(200) NOT NULL ,
ADD COLUMN `date` VARCHAR(45) NULL AFTER `budgetsource`,
ADD COLUMN `title` VARCHAR(45) NULL AFTER `date`;


