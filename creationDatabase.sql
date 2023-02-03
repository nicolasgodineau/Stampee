-- MySQL Script generated by MySQL Workbench
-- Thu Feb  2 07:21:01 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema e2295324
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema e2295324
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `e2295324` DEFAULT CHARACTER SET utf8 ;
USE `e2295324` ;

-- -----------------------------------------------------
-- Table `e2295324`.`Role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2295324`.`Role` (
  `idRole` INT NOT NULL AUTO_INCREMENT,
  `role` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRole`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2295324`.`Membre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2295324`.`Membre` (
  `idMembre` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(100) NOT NULL,
  `telephone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `Role_idRole` INT NOT NULL,
  PRIMARY KEY (`idMembre`),
  INDEX `fk_Membre_Role1_idx` (`Role_idRole` ASC)  ,
  CONSTRAINT `fk_Membre_Role1`
    FOREIGN KEY (`Role_idRole`)
    REFERENCES `e2295324`.`Role` (`idRole`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2295324`.`Pays`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2295324`.`Pays` (
  `idPays` INT NOT NULL AUTO_INCREMENT,
  `pays` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPays`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2295324`.`Timbre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2295324`.`Timbre` (
  `idTimbre` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`idTimbre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2295324`.`Image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2295324`.`Image` (
  `idImage` INT NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(255) NOT NULL,
  `Timbre_idTimbre` INT NOT NULL,
  PRIMARY KEY (`idImage`, `Timbre_idTimbre`),
  INDEX `fk_Image_Timbre1_idx` (`Timbre_idTimbre` ASC)  ,
  CONSTRAINT `fk_Image_Timbre1`
    FOREIGN KEY (`Timbre_idTimbre`)
    REFERENCES `e2295324`.`Timbre` (`idTimbre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2295324`.`Status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2295324`.`Status` (
  `idStatus` INT NOT NULL AUTO_INCREMENT,
  `Status` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idStatus`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2295324`.`Enchere`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2295324`.`Enchere` (
  `Membre_idMembre` INT NOT NULL,
  `Timbre_idTimbre` INT NOT NULL,
  `Status_idStatus` INT NOT NULL,
  `dateFin` DATE NULL,
  PRIMARY KEY (`Membre_idMembre`, `Timbre_idTimbre`),
  INDEX `fk_Membre_has_Timbre_Timbre1_idx` (`Timbre_idTimbre` ASC)  ,
  INDEX `fk_Membre_has_Timbre_Membre1_idx` (`Membre_idMembre` ASC)  ,
  INDEX `fk_Enchere_Status1_idx` (`Status_idStatus` ASC)  ,
  CONSTRAINT `fk_Membre_has_Timbre_Membre1`
    FOREIGN KEY (`Membre_idMembre`)
    REFERENCES `e2295324`.`Membre` (`idMembre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Membre_has_Timbre_Timbre1`
    FOREIGN KEY (`Timbre_idTimbre`)
    REFERENCES `e2295324`.`Timbre` (`idTimbre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Enchere_Status1`
    FOREIGN KEY (`Status_idStatus`)
    REFERENCES `e2295324`.`Status` (`idStatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2295324`.`Mise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2295324`.`Mise` (
  `idMise` INT NOT NULL AUTO_INCREMENT,
  `mise` DOUBLE NOT NULL,
  `Membre_idMembre` INT NOT NULL,
  `Enchere_Membre_idMembre` INT NOT NULL,
  `Enchere_Timbre_idTimbre` INT NOT NULL,
  PRIMARY KEY (`idMise`, `Membre_idMembre`, `Enchere_Membre_idMembre`, `Enchere_Timbre_idTimbre`),
  INDEX `fk_Mise_Membre1_idx` (`Membre_idMembre` ASC)  ,
  INDEX `fk_Mise_Enchere1_idx` (`Enchere_Membre_idMembre` ASC, `Enchere_Timbre_idTimbre` ASC)  ,
  CONSTRAINT `fk_Mise_Membre1`
    FOREIGN KEY (`Membre_idMembre`)
    REFERENCES `e2295324`.`Membre` (`idMembre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mise_Enchere1`
    FOREIGN KEY (`Enchere_Membre_idMembre` , `Enchere_Timbre_idTimbre`)
    REFERENCES `e2295324`.`Enchere` (`Membre_idMembre` , `Timbre_idTimbre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2295324`.`Favoris`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2295324`.`Favoris` (
  `Membre_idMembre` INT NOT NULL,
  `Enchere_Membre_idMembre` INT NOT NULL,
  `Enchere_Timbre_idTimbre` INT NOT NULL,
  PRIMARY KEY (`Membre_idMembre`, `Enchere_Membre_idMembre`, `Enchere_Timbre_idTimbre`),
  INDEX `fk_Membre_has_Enchere_Enchere1_idx` (`Enchere_Membre_idMembre` ASC, `Enchere_Timbre_idTimbre` ASC)  ,
  INDEX `fk_Membre_has_Enchere_Membre1_idx` (`Membre_idMembre` ASC)  ,
  CONSTRAINT `fk_Membre_has_Enchere_Membre1`
    FOREIGN KEY (`Membre_idMembre`)
    REFERENCES `e2295324`.`Membre` (`idMembre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Membre_has_Enchere_Enchere1`
    FOREIGN KEY (`Enchere_Membre_idMembre` , `Enchere_Timbre_idTimbre`)
    REFERENCES `e2295324`.`Enchere` (`Membre_idMembre` , `Timbre_idTimbre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



INSERT INTO `Status`(`Status`) VALUES ('actif')
INSERT INTO `Status`(`Status`) VALUES ('terminer')
INSERT INTO `Status`(`Status`) VALUES ('supprimer')

INSERT INTO `Role`(`role`) VALUES ('membre');
INSERT INTO `Role`(`role`) VALUES ('admin');
INSERT INTO `Role`(`role`) VALUES ('visiteur')