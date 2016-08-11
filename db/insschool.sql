-- MySQL Script generated by MySQL Workbench
-- jeu. 11 août 2016 18:23:33 CEST
-- Model: INS School    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema insschool
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema insschool
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `insschool` DEFAULT CHARACTER SET utf8 ;
USE `insschool` ;

-- -----------------------------------------------------
-- Table `insschool`.`member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`member` (
  `member_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `birth_date` DATE NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `postal_code` CHAR(5) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `cellphone` CHAR(14) NULL,
  `cellphone_father` CHAR(14) NULL,
  `cellphone_mother` CHAR(14) NULL,
  `phone` CHAR(14) NULL,
  `email` VARCHAR(100) NULL,
  `means_of_knowledge` ENUM('POSTER_FLYER', 'INTERNET', 'WORD_OF_MOUTH') NULL,
  `volunteer` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`member_id`),
  UNIQUE INDEX `last_name_first_name_UNIQUE` (`last_name` ASC, `first_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`registration_file`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`registration_file` (
  `registration_file_id` SMALLINT UNSIGNED NOT NULL,
  `medical_certificate` TINYINT(1) NOT NULL DEFAULT 0,
  `insurance` TINYINT(1) NOT NULL DEFAULT 0,
  `photo` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`registration_file_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`teacher` (
  `teacher_id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `birth_date` DATE NULL,
  `address` VARCHAR(255) NULL,
  `postal_code` CHAR(5) NULL,
  `city` VARCHAR(45) NULL,
  `cellphone` CHAR(14) NULL,
  `phone` CHAR(14) NULL,
  `email` VARCHAR(100) NULL,
  `absences` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`teacher_id`),
  UNIQUE INDEX `last_name_first_name_UNIQUE` (`last_name` ASC, `first_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`room` (
  `room_id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `address` VARCHAR(255) NULL,
  `postal_code` CHAR(5) NULL,
  `city` VARCHAR(45) NULL,
  `view_order` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`room_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  UNIQUE INDEX `view_order_UNIQUE` (`view_order` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`lesson`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`lesson` (
  `lesson_id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `teacher_id` TINYINT UNSIGNED NOT NULL,
  `day` ENUM('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY') NOT NULL,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  `room_id` TINYINT UNSIGNED NOT NULL,
  `costume` TINYTEXT NULL,
  PRIMARY KEY (`lesson_id`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  UNIQUE INDEX `day_start_time_end_time_room_id_UNIQUE` (`day` ASC, `start_time` ASC, `end_time` ASC, `room_id` ASC),
  INDEX `fk_teacher_id_idx` (`teacher_id` ASC),
  INDEX `fk_room_id_idx` (`room_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`registration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`registration` (
  `registration_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` SMALLINT UNSIGNED NOT NULL,
  `season` CHAR(9) NOT NULL,
  `plan` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `price` DECIMAL(5,2) NULL,
  `discount` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `num_payments` TINYINT UNSIGNED NULL,
  `registration_file_id` SMALLINT UNSIGNED NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`registration_id`),
  UNIQUE INDEX `member_id_season_plan_UNIQUE` (`member_id` ASC, `season` ASC, `plan` ASC),
  INDEX `fk_registration_file_id_idx` (`registration_file_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`registration_payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`registration_payment` (
  `registration_payment_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `registration_id` SMALLINT UNSIGNED NOT NULL,
  `amount` DECIMAL(5,2) NOT NULL,
  `mode` ENUM('CASH', 'CHECK') NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`registration_payment_id`),
  INDEX `fk_registration_id_idx` (`registration_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`registration_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`registration_detail` (
  `registration_id` SMALLINT UNSIGNED NOT NULL,
  `lesson_id` TINYINT UNSIGNED NOT NULL,
  `show_participation` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`registration_id`, `lesson_id`),
  INDEX `fk_lesson_id_idx` (`lesson_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`pre_registration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`pre_registration` (
  `pre_registration_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `birth_date` DATE NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `postal_code` CHAR(5) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `cellphone` CHAR(14) NULL,
  `cellphone_father` CHAR(14) NULL,
  `cellphone_mother` CHAR(14) NULL,
  `phone` CHAR(14) NULL,
  `email` VARCHAR(100) NULL,
  `lessons` TEXT NOT NULL,
  `means_of_knowledge` ENUM('POSTER_FLYER', 'INTERNET', 'WORD_OF_MOUTH') NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`pre_registration_id`),
  INDEX `last_name_first_name_idx` (`last_name` ASC, `first_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`order` (
  `order_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` SMALLINT UNSIGNED NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `fk_member_id_idx` (`member_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`goody`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`goody` (
  `goody_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  `price` DECIMAL(4,2) NULL,
  `stock` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`goody_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`order_content`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`order_content` (
  `order_id` SMALLINT UNSIGNED NOT NULL,
  `goody_id` SMALLINT UNSIGNED NOT NULL,
  `quantity` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`order_id`, `goody_id`),
  INDEX `fk_goody_id_idx` (`goody_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`order_payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`order_payment` (
  `order_payment_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` SMALLINT UNSIGNED NOT NULL,
  `amount` DECIMAL(5,2) NOT NULL,
  `mode` ENUM('CASH', 'CHECK') NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`order_payment_id`),
  INDEX `fk_order_id_idx` (`order_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `insschool`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `insschool`.`user` (
  `username` VARCHAR(15) NOT NULL,
  `password` CHAR(128) NOT NULL,
  `admin` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;

CREATE USER 'insschooladmin'@'localhost' IDENTIFIED BY 'admin';

GRANT ALL ON `insschool`.* TO 'insschooladmin'@'localhost';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
