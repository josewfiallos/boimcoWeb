-- MySQL Workbench Synchronization
-- Generated: 2015-12-01 23:39
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Ricardo09

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `mydb`.`Usuario` 
DROP COLUMN `Intentos`,
DROP COLUMN `Estado`;

ALTER TABLE `mydb`.`Productos` 
DROP COLUMN `Imagen`,
DROP COLUMN `Estado`,
CHANGE COLUMN `Nombre_Producto` `Nombre_Producto` VARCHAR(45) NULL DEFAULT NULL COMMENT '' ,
CHANGE COLUMN `Cantidad` `Cantidad` INT(11) NULL DEFAULT NULL COMMENT '' ,
CHANGE COLUMN `PrecioUnitario` `PrecioUnitario` INT(11) NULL DEFAULT NULL COMMENT '' ,
ADD COLUMN `Codigo_Categoria` INT(11) NULL DEFAULT NULL COMMENT '' AFTER `Nombre_Producto`;

ALTER TABLE `mydb`.`Detalle_de_Factura` 
DROP COLUMN `Codigo_Orden`,
ADD COLUMN `Codigo_Factura` INT(11) NOT NULL AUTO_INCREMENT COMMENT '' FIRST,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`Codigo_Factura`, `Codigo_Producto`)  COMMENT '';

ALTER TABLE `mydb`.`Factura` 
DROP COLUMN `Codigo_Orden`,
ADD COLUMN `Codigo_Factura` INT(11) NOT NULL AUTO_INCREMENT COMMENT '' FIRST,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`Codigo_Factura`)  COMMENT '';

ALTER TABLE `mydb`.`Detalle_de_Factura` 
ADD CONSTRAINT `Codigo_Producto`
  FOREIGN KEY (`Codigo_Producto`)
  REFERENCES `mydb`.`Productos` (`Codigo_Producto`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `Codigo_Factura`
  FOREIGN KEY (`Codigo_Factura`)
  REFERENCES `mydb`.`Factura` (`Codigo_Factura`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE `mydb`.`Factura` 
ADD CONSTRAINT `Codigo_Cliente`
  FOREIGN KEY (`Codigo_Cliente`)
  REFERENCES `mydb`.`Cliente` (`Codigo_Cliente`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
