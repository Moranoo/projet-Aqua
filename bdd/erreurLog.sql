-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema abysses
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema abysses
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `abysses` DEFAULT CHARACTER SET utf8mb4 ;
USE `abysses` ;

-- -----------------------------------------------------
-- Table `abysses`.`aquariums`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `abysses`.`aquariums` (
  `id` INT(100) NOT NULL AUTO_INCREMENT,
  `nbac` INT(100) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `conductivite` FLOAT NOT NULL,
  `ph` FLOAT NOT NULL,
  `volume` FLOAT NOT NULL,
  `biotopEspeces` VARCHAR(255) NOT NULL,
  `typeNourriture` VARCHAR(255) NOT NULL,
  `typeEau` VARCHAR(100) NOT NULL,
  `prixVente` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 31
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `abysses`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `abysses`.`users` (
  `id` INT(100) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(50) NOT NULL,
  `date_de_naissance` VARCHAR(12) NOT NULL,
  `mail` VARCHAR(100) NOT NULL,
  `telephone` VARCHAR(20) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `role` VARCHAR(20) NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 45
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `abysses`.`messagerie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `abysses`.`messagerie` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `objet` VARCHAR(100) NOT NULL,
  `nom` VARCHAR(100) NOT NULL,
  `mail` VARCHAR(100) NOT NULL,
  `telephone` VARCHAR(100) NOT NULL,
  `date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `message` TEXT NOT NULL,
  `users_id` INT(100) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_messagerie_users_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_messagerie_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `abysses`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `abysses`.`aquariums_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `abysses`.`aquariums_has_users` (
  `aquariums_id` INT(100) NOT NULL,
  `users_id` INT(100) NOT NULL,
  PRIMARY KEY (`aquariums_id`, `users_id`),
  INDEX `fk_aquariums_has_users_users1_idx` (`users_id` ASC) VISIBLE,
  INDEX `fk_aquariums_has_users_aquariums1_idx` (`aquariums_id` ASC) VISIBLE,
  CONSTRAINT `fk_aquariums_has_users_aquariums1`
    FOREIGN KEY (`aquariums_id`)
    REFERENCES `abysses`.`aquariums` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aquariums_has_users_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `abysses`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
