-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Audirentur
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Audirentur
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Audirentur` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Audirentur` ;

-- -----------------------------------------------------
-- Table `Audirentur`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Audirentur`.`customers` (
  `customer_id` INT NOT NULL,
  `cust_username` VARCHAR(64) NOT NULL,
  `cust_password` VARCHAR(120) NOT NULL,
  `cust_last_name` VARCHAR(35) NOT NULL,
  `cust_first_name` VARCHAR(35) NOT NULL,
  `cust_gender` ENUM('Male', 'Female') NOT NULL,
  `cust_email` VARCHAR(254) NOT NULL,
  `cust_contact_number` VARCHAR(15) NOT NULL,
  `cust_avatar` LONGBLOB NULL,
  `cust_bio` VARCHAR(125) NULL,
  `cust_create_date` DATETIME NOT NULL,
  `acc_status` ENUM('Pending','Accepted','Denied','Disabled') NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE INDEX `reg_id_UNIQUE` (`customer_id` ASC),
  UNIQUE INDEX `username_UNIQUE` (`cust_username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`cust_email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Audirentur`.`vendors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Audirentur`.`vendors` (
  `vendor_id` INT NOT NULL,
  `ven_username` VARCHAR(64) NOT NULL,
  `ven_password` VARCHAR(120) NOT NULL,
  `ven_last_name` VARCHAR(35) NOT NULL,
  `ven_first_name` VARCHAR(35) NOT NULL,
  `ven_gender` ENUM('Male', 'Female') NOT NULL,
  `ven_email` VARCHAR(254) NOT NULL,
  `ven_contact_number` VARCHAR(15) NOT NULL,
  `ven_avatar` LONGBLOB NULL,
  `ven_bio` VARCHAR(125) NULL,
  `ven_create_date` DATETIME NOT NULL,
  `acc_status` ENUM('Pending','Accepted','Denied','Disabled') NOT NULL,
  PRIMARY KEY (`vendor_id`),
  UNIQUE INDEX `vendor_id_UNIQUE` (`vendor_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Audirentur`.`sounds`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Audirentur`.`sounds` (
  `sound_id` INT NOT NULL,
  `vendor_id` INT NOT NULL,
  `name` VARCHAR(30) NOT NULL,
  `description` TEXT NOT NULL,
  `duration` INT NOT NULL,
  `price` DOUBLE NOT NULL,
  `rent_availability` DATETIME NOT NULL,
  `main_image` LONGBLOB NOT NULL,
  `alt_image1` LONGBLOB NOT NULL,
  `alt_image2` LONGBLOB NOT NULL,
  PRIMARY KEY (`sound_id`),
  UNIQUE INDEX `sound_id_UNIQUE` (`sound_id` ASC),
  INDEX `fk_sounds_vendors1_idx` (`vendor_id` ASC),
  CONSTRAINT `fk_sounds_vendors1`
    FOREIGN KEY (`vendor_id`)
    REFERENCES `Audirentur`.`vendors` (`vendor_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Audirentur`.`rentals`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Audirentur`.`rentals` (
  `rental_id` INT NOT NULL,
  `rental_date` DATETIME NOT NULL,
  `return_date` DATETIME NULL,
  `customer_id` INT NOT NULL,
  `vendor_id` INT NOT NULL,
  `sound_id` INT NOT NULL,
  `total_price` INT NULL,
  `status` ENUM('Pending', 'Renting', 'Rented', 'Cancelled') NOT NULL,
  PRIMARY KEY (`rental_id`),
  UNIQUE INDEX `rental_id_UNIQUE` (`rental_id` ASC),
  INDEX `fk_rentals_customers_idx` (`customer_id` ASC),
  INDEX `fk_rentals_vendors1_idx` (`vendor_id` ASC),
  INDEX `fk_rentals_sounds1_idx` (`sound_id` ASC),
  CONSTRAINT `fk_rentals_customers`
    FOREIGN KEY (`customer_id`)
    REFERENCES `Audirentur`.`customers` (`customer_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rentals_vendors1`
    FOREIGN KEY (`vendor_id`)
    REFERENCES `Audirentur`.`vendors` (`vendor_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rentals_sounds1`
    FOREIGN KEY (`sound_id`)
    REFERENCES `Audirentur`.`sounds` (`sound_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Audirentur`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Audirentur`.`categories` (
  `category_id` INT NOT NULL,
  `category` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Audirentur`.`categorysound`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Audirentur`.`categorysound` (
  `sound_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`sound_id`, `category_id`),
  INDEX `fk_sounds_has_categories_categories1_idx` (`category_id` ASC),
  INDEX `fk_sounds_has_categories_sounds1_idx` (`sound_id` ASC),
  CONSTRAINT `fk_sounds_has_categories_sounds1`
    FOREIGN KEY (`sound_id`)
    REFERENCES `Audirentur`.`sounds` (`sound_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_sounds_has_categories_categories1`
    FOREIGN KEY (`category_id`)
    REFERENCES `Audirentur`.`categories` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Audirentur`.`admins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Audirentur`.`admins` (
  `admin_id` INT NOT NULL,
  `admin_username` VARCHAR(64) NOT NULL,
  `admin_password` VARCHAR(120) NOT NULL,
  `admin_last_name` VARCHAR(35) NOT NULL,
  `admin_first_name` VARCHAR(35) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE INDEX `admin_id_UNIQUE` (`admin_id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
