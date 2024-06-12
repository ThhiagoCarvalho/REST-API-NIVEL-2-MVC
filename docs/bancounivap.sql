-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bancounivap
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bancounivap
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bancounivap` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `bancounivap` ;

-- -----------------------------------------------------
-- Table `bancounivap`.`disciplinas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancounivap`.`disciplinas` (
  `idDisciplina` INT NOT NULL,
  `nomeDisciplina` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idDisciplina`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `bancounivap`.`professores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancounivap`.`professores` (
  `idProfessor` INT NOT NULL,
  `nomeProfessor` VARCHAR(45) NULL DEFAULT NULL,
  `telefoneProfessor` VARCHAR(45) NULL DEFAULT NULL,
  `salarioProfessor` FLOAT NULL DEFAULT NULL,
  `idadeProfessor` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idProfessor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `bancounivap`.`disciplinasxprofessores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancounivap`.`disciplinasxprofessores` (
  `iddisciplinasxprofessores` INT NOT NULL,
  `curso` VARCHAR(45) NULL DEFAULT NULL,
  `cargaHoraria` INT NULL DEFAULT NULL,
  `anoLetivo` INT NULL DEFAULT NULL,
  `ID_idprofessor` INT NULL DEFAULT NULL,
  `ID_iddisciplina` INT NULL DEFAULT NULL,
  PRIMARY KEY (`iddisciplinasxprofessores`),
  INDEX `fk_disciplina_idx` (`ID_iddisciplina` ASC),
  INDEX `fk_professor_idx` (`ID_idprofessor` ASC),
  CONSTRAINT `fk_disciplina`
    FOREIGN KEY (`ID_iddisciplina`)
    REFERENCES `bancounivap`.`disciplinas` (`idDisciplina`),
  CONSTRAINT `fk_professor`
    FOREIGN KEY (`ID_idprofessor`)
    REFERENCES `bancounivap`.`professores` (`idProfessor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
