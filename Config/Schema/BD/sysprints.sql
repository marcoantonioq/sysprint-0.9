SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `prints` ;
CREATE SCHEMA IF NOT EXISTS `prints` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `prints` ;

-- -----------------------------------------------------
-- Table `prints`.`printers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prints`.`printers` ;

CREATE TABLE IF NOT EXISTS `prints`.`printers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `day_count` INT NULL DEFAULT 0,
  `week_count` INT NULL DEFAULT 0,
  `month_count` INT NULL DEFAULT 0,
  `local` VARCHAR(455) NULL,
  `descrition` TEXT NULL,
  `allow` TINYINT(1) NULL,
  `status` TINYINT(1) NULL,
  `ip` VARCHAR(255) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prints`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prints`.`users` ;

CREATE TABLE IF NOT EXISTS `prints`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `admin` TINYINT(1) NULL DEFAULT 0,
  `quota` INT NULL DEFAULT 0,
  `day_count` INT NULL DEFAULT 0,
  `week_count` INT NULL DEFAULT 0,
  `month_count` INT NULL,
  `status` TINYINT(1) NULL DEFAULT 0,
  `job_count` INT NULL DEFAULT 0,
  `thumbnailphoto` TEXT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prints`.`jobs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prints`.`jobs` ;

CREATE TABLE IF NOT EXISTS `prints`.`jobs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `printer_id` INT NOT NULL,
  `date` DATETIME NULL,
  `pages` INT NOT NULL,
  `copies` INT NULL DEFAULT 0,
  `host` VARCHAR(255) NULL,
  `file` VARCHAR(255) NULL,
  `params` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_jobs_users_idx` (`user_id` ASC),
  INDEX `fk_jobs_prints1_idx` (`printer_id` ASC),
  CONSTRAINT `fk_jobs_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `prints`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_jobs_prints1`
    FOREIGN KEY (`printer_id`)
    REFERENCES `prints`.`printers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prints`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prints`.`groups` ;

CREATE TABLE IF NOT EXISTS `prints`.`groups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `quota` INT NOT NULL DEFAULT 0,
  `ad` TINYINT(1) NULL,
  `admin` TINYINT(1) NULL,
  `descrition` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prints`.`users_printers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prints`.`users_printers` ;

CREATE TABLE IF NOT EXISTS `prints`.`users_printers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `printer_id` INT NOT NULL,
  INDEX `fk_users_has_printers_printers1_idx` (`printer_id` ASC),
  INDEX `fk_users_has_printers_users1_idx` (`user_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_users_has_printers_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `prints`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_printers_printers1`
    FOREIGN KEY (`printer_id`)
    REFERENCES `prints`.`printers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prints`.`arq_jobs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prints`.`arq_jobs` ;

CREATE TABLE IF NOT EXISTS `prints`.`arq_jobs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(255) NOT NULL,
  `printer` VARCHAR(255) NOT NULL,
  `date` DATETIME NULL,
  `pages` INT NOT NULL,
  `copies` INT NULL DEFAULT 0,
  `host` VARCHAR(255) NULL,
  `file` VARCHAR(255) NULL,
  `params` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `prints`.`users_groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prints`.`users_groups` ;

CREATE TABLE IF NOT EXISTS `prints`.`users_groups` (
  `user_id` INT NOT NULL,
  `group_id` INT NULL,
  `id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_has_groups_groups1_idx` (`group_id` ASC),
  INDEX `fk_users_has_groups_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_groups_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `prints`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_groups_groups1`
    FOREIGN KEY (`group_id`)
    REFERENCES `prints`.`groups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `prints` ;

-- -----------------------------------------------------
-- Placeholder table for view `prints`.`vw_charts_printer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prints`.`vw_charts_printer` (`id` INT, `name` INT, `total_pages` INT);

-- -----------------------------------------------------
-- Placeholder table for view `prints`.`vw_charts_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prints`.`vw_charts_user` (`id` INT, `user_name` INT, `total_pages` INT);

-- -----------------------------------------------------
-- View `prints`.`vw_charts_printer`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `prints`.`vw_charts_printer` ;
DROP TABLE IF EXISTS `prints`.`vw_charts_printer`;
USE `prints`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prints`.`vw_charts_printer` AS select `p`.`id` AS `id`,`p`.`name` AS `name`,sum((`j`.`pages` * `j`.`copies`)) AS `total_pages` from (`prints`.`jobs` `j` join `prints`.`printers` `p` on((`p`.`id` = `j`.`printer_id`))) group by `j`.`printer_id`;

-- -----------------------------------------------------
-- View `prints`.`vw_charts_user`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `prints`.`vw_charts_user` ;
DROP TABLE IF EXISTS `prints`.`vw_charts_user`;
USE `prints`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prints`.`vw_charts_user` AS select `prints`.`users`.`id` AS `id`,`prints`.`users`.`name` AS `user_name`,sum((`prints`.`jobs`.`pages` * `prints`.`jobs`.`copies`)) AS `total_pages` from (`prints`.`users` join `prints`.`jobs`) where (`prints`.`users`.`id` = `prints`.`jobs`.`user_id`) group by `prints`.`users`.`name`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
USE `prints`;

DELIMITER $$

USE `prints`$$
DROP TRIGGER IF EXISTS `prints`.`jobs_ADEL` $$
USE `prints`$$
CREATE TRIGGER `jobs_ADEL` AFTER DELETE ON `jobs` FOR EACH ROW

BEGIN

	DECLARE user_name VARCHAR(255);
	DECLARE printer_name VARCHAR(255);
	SET user_name = (SELECT name FROM users WHERE id = OLD.user_id);
	SET printer_name = (SELECT name FROM printers WHERE id = OLD.printer_id);
    
	INSERT INTO arq_jobs(
		`id`,
		`user`,
		`printer`,
		`date`,
		`pages`,
		`copies`,
		`host`,
		`file`,
		`params`,
		`status`,
		`created`,
		`updated`)
	VALUES( 
		OLD.id,
		user_name,
		printer_name,
		SYSDATE(),
		OLD.pages,
		OLD.copies,
		OLD.host,
		OLD.file,
		OLD.params,
		OLD.status,
		OLD.created,
		OLD.updated		
	);
END$$


USE `prints`$$
DROP TRIGGER IF EXISTS `prints`.`jobs_AINS` $$
USE `prints`$$
CREATE TRIGGER `jobs_AINS` AFTER INSERT ON `jobs` FOR EACH ROW
begin
	DECLARE _day_count integer;
	DECLARE _week_count integer;
	DECLARE _month_count integer;
	DECLARE _job_count integer;
	DECLARE _var integer;
	SELECT day_count from users where users.id=NEW.user_id INTO _day_count;
	SELECT week_count from users where users.id=NEW.user_id INTO _week_count;
	SELECT month_count, job_count from users where users.id=NEW.user_id INTO _month_count, _job_count;
	SET _var = (NEW.pages * NEW.copies);
	UPDATE users
	SET `day_count`=_day_count + _var,
		`week_count`=_week_count + _var,
		`month_count`=_month_count + _var,
		`job_count`=_job_count + _var,
		`updated`=SYSDATE() 
	where id=NEW.user_id;
end$$


DELIMITER ;
