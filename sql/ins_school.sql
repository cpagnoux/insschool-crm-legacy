-- MySQL Script generated by MySQL Workbench
-- ven. 15 juil. 2016 20:51:36 CEST
-- Model: INS School    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ins_school
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ins_school
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ins_school` DEFAULT CHARACTER SET utf8 ;
USE `ins_school` ;

-- -----------------------------------------------------
-- Table `ins_school`.`member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`member` (
  `member_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `birth_date` DATE NOT NULL,
  `adress` VARCHAR(255) NOT NULL,
  `postal_code` CHAR(5) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `cellphone` CHAR(10) NULL,
  `cellphone_father` CHAR(10) NULL,
  `cellphone_mother` CHAR(10) NULL,
  `phone` CHAR(10) NULL,
  `email` VARCHAR(100) NULL,
  `means_of_knowledge` ENUM('POSTER_FLYER', 'INTERNET', 'WORD_OF_MOUTH') NULL,
  `volunteer` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`member_id`),
  UNIQUE INDEX `last_name_first_name_UNIQUE` (`last_name` ASC, `first_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`registration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`registration` (
  `registration_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` SMALLINT UNSIGNED NOT NULL,
  `season` CHAR(9) NOT NULL,
  `price` DECIMAL(5,2) NULL,
  `discount` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `num_payments` TINYINT UNSIGNED NULL,
  PRIMARY KEY (`registration_id`),
  UNIQUE INDEX `member_id_season_UNIQUE` (`member_id` ASC, `season` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`registration_file`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`registration_file` (
  `registration_id` SMALLINT UNSIGNED NOT NULL,
  `medical_certificate` TINYINT(1) NOT NULL DEFAULT 0,
  `insurance` TINYINT(1) NOT NULL DEFAULT 0,
  `photo` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`registration_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`teacher` (
  `teacher_id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `birth_date` DATE NULL,
  `adress` VARCHAR(255) NULL,
  `postal_code` CHAR(5) NULL,
  `city` VARCHAR(45) NULL,
  `cellphone` CHAR(10) NULL,
  `phone` CHAR(10) NULL,
  `email` VARCHAR(100) NULL,
  `absences` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`teacher_id`),
  UNIQUE INDEX `last_name_first_name_UNIQUE` (`last_name` ASC, `first_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`room` (
  `room_id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `adress` VARCHAR(255) NULL,
  `postal_code` CHAR(5) NULL,
  `city` VARCHAR(45) NULL,
  `view_order` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`room_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  UNIQUE INDEX `view_order_UNIQUE` (`view_order` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`lesson`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`lesson` (
  `lesson_id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `teacher_id` TINYINT UNSIGNED NOT NULL,
  `day` ENUM('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY') NOT NULL,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  `room_id` TINYINT UNSIGNED NOT NULL,
  `costume` TEXT NULL,
  `t_shirt` TEXT NULL,
  PRIMARY KEY (`lesson_id`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  UNIQUE INDEX `day_start_time_end_time_room_id_UNIQUE` (`day` ASC, `start_time` ASC, `end_time` ASC, `room_id` ASC),
  INDEX `fk_teacher_id_idx` (`teacher_id` ASC),
  INDEX `fk_room_id_idx` (`room_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`registration_payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`registration_payment` (
  `registration_payment_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `registration_id` SMALLINT UNSIGNED NOT NULL,
  `amount` DECIMAL(5,2) NOT NULL,
  `mode` ENUM('CASH', 'CHECK') NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`registration_payment_id`),
  INDEX `fk_registration_id_idx` (`registration_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`registration_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`registration_detail` (
  `registration_id` SMALLINT UNSIGNED NOT NULL,
  `lesson_id` TINYINT UNSIGNED NOT NULL,
  `show_participation` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`registration_id`, `lesson_id`),
  INDEX `fk_lesson_id_idx` (`lesson_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`pre_registration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`pre_registration` (
  `pre_registration_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `birth_date` DATE NOT NULL,
  `adress` VARCHAR(255) NOT NULL,
  `postal_code` CHAR(5) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `cellphone` CHAR(10) NULL,
  `cellphone_father` CHAR(10) NULL,
  `cellphone_mother` CHAR(10) NULL,
  `phone` CHAR(10) NULL,
  `email` VARCHAR(100) NULL,
  `lessons` TEXT NOT NULL,
  `means_of_knowledge` ENUM('POSTER_FLYER', 'INTERNET', 'WORD_OF_MOUTH') NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`pre_registration_id`),
  INDEX `last_name_first_name_idx` (`last_name` ASC, `first_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`order` (
  `order_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` SMALLINT UNSIGNED NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `fk_member_id_idx` (`member_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`goody`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`goody` (
  `goody_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  `price` DECIMAL(4,2) NULL,
  `stock` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`goody_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`order_content`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`order_content` (
  `order_id` SMALLINT UNSIGNED NOT NULL,
  `goody_id` SMALLINT UNSIGNED NOT NULL,
  `quantity` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`order_id`, `goody_id`),
  INDEX `fk_goody_id_idx` (`goody_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`order_payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`order_payment` (
  `order_payment_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` SMALLINT UNSIGNED NOT NULL,
  `amount` DECIMAL(5,2) NOT NULL,
  `mode` ENUM('CASH', 'CHECK') NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`order_payment_id`),
  INDEX `fk_order_id_idx` (`order_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ins_school`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ins_school`.`user` (
  `username` VARCHAR(15) NOT NULL,
  `password` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;

CREATE USER 'insschooladmin' IDENTIFIED BY 'admin';

GRANT ALL ON `ins_school`.* TO 'insschooladmin';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
