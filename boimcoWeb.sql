-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema boimcoweb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema boimcoweb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `boimcoweb` DEFAULT CHARACTER SET utf8 ;
USE `boimcoweb` ;

-- -----------------------------------------------------
-- Table `boimcoweb`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boimcoweb`.`productos` (
  `idProducto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreProducto` VARCHAR(45) NOT NULL,
  `precioUnitarioProducto` FLOAT NOT NULL,
  `cantidadProducto` INT(11) NOT NULL,
  `estadoProducto` CHAR(3) NOT NULL DEFAULT 'ACT',
  `imgProducto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProducto`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `boimcoweb`.`carritos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boimcoweb`.`carritos` (
  `idCarrito` INT(11) NOT NULL AUTO_INCREMENT,
  `idCorreo` VARCHAR(45) NOT NULL,
  `idProductos` INT(11) NOT NULL,
  `cantidadProductos` INT(11) NOT NULL,
  `precioProductos` FLOAT NOT NULL,
  `fechaCarrito` DATETIME NOT NULL,
  PRIMARY KEY (`idCarrito`, `idCorreo`, `idProductos`),
  INDEX `idProducto_idx` (`idProductos` ASC),
  CONSTRAINT `idProductos`
    FOREIGN KEY (`idProductos`)
    REFERENCES `boimcoweb`.`productos` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 39
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `boimcoweb`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boimcoweb`.`roles` (
  `idRol` CHAR(3) NOT NULL,
  `descripcionRol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRol`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `boimcoweb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boimcoweb`.`usuarios` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `idRol` CHAR(3) NOT NULL DEFAULT 'CLT',
  `contraseniaUsuario` VARCHAR(45) NOT NULL,
  `correoUsuario` VARCHAR(45) NOT NULL,
  `fechaIngresoUsuario` DATE NOT NULL,
  `estadoUsuario` CHAR(3) NOT NULL DEFAULT 'ACT',
  PRIMARY KEY (`idUsuario`),
  INDEX `idRol_idx` (`idRol` ASC),
  INDEX `correoUsuario_idx` (`correoUsuario` ASC),
  CONSTRAINT `idRol`
    FOREIGN KEY (`idRol`)
    REFERENCES `boimcoweb`.`roles` (`idRol`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `boimcoweb`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boimcoweb`.`clientes` (
  `idCliente` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INT(11) NOT NULL,
  `primerNombreCliente` VARCHAR(45) NOT NULL,
  `segundoNombreCliente` VARCHAR(45) NULL DEFAULT NULL,
  `primerApellidoCliente` VARCHAR(45) NOT NULL,
  `segundoApellidoCliente` VARCHAR(45) NULL DEFAULT NULL,
  `direccionCliente` VARCHAR(45) NULL DEFAULT NULL,
  `telefonoCliente` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCliente`),
  INDEX `idUsuario_idx` (`idUsuario` ASC),
  CONSTRAINT `idUsuario`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `boimcoweb`.`usuarios` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `boimcoweb`.`facturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boimcoweb`.`facturas` (
  `idFactura` INT(11) NOT NULL AUTO_INCREMENT,
  `idCliente` INT(11) NOT NULL,
  `fechaFactura` DATETIME NOT NULL,
  `subTotalFactura` FLOAT NOT NULL,
  `isvFactura` FLOAT NOT NULL,
  `totalFactura` FLOAT NOT NULL,
  PRIMARY KEY (`idFactura`),
  INDEX `idCliente_idx` (`idCliente` ASC),
  CONSTRAINT `idCliente`
    FOREIGN KEY (`idCliente`)
    REFERENCES `boimcoweb`.`clientes` (`idCliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `boimcoweb`.`detalle_facturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boimcoweb`.`detalle_facturas` (
  `idDetalleFactura` INT(11) NOT NULL AUTO_INCREMENT,
  `idFactura` INT(11) NOT NULL,
  `idProducto` INT(11) NOT NULL,
  `cantidadProducto` INT(11) NOT NULL,
  `precioProducto` FLOAT NOT NULL,
  PRIMARY KEY (`idDetalleFactura`, `idFactura`, `idProducto`),
  INDEX `idFactura_idx` (`idFactura` ASC),
  INDEX `idProducto_idx` (`idProducto` ASC),
  CONSTRAINT `idFactura`
    FOREIGN KEY (`idFactura`)
    REFERENCES `boimcoweb`.`facturas` (`idFactura`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idProducto`
    FOREIGN KEY (`idProducto`)
    REFERENCES `boimcoweb`.`productos` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;

INSERT INTO `boimcoweb`.`roles` (`idRol`, `descripcionRol`) VALUES ('ADM', 'Administrador');
INSERT INTO `boimcoweb`.`roles` (`idRol`, `descripcionRol`) VALUES ('CLT', 'Cliente');
INSERT INTO `boimcoweb`.`usuarios` (`idRol`,`contraseniaUsuario`,`correoUsuario`,`fechaIngresoUsuario`,`estadoUsuario`) VALUES ('ADM', md5('12345678'),'admin@boimco.com',now(),'ACT');
INSERT INTO `boimcoweb`.`productos` (`nombreProducto`, `precioUnitarioProducto`, `cantidadProducto`, `estadoProducto`, `imgProducto`) VALUES ('Ovillo', '10', '10', 'ACT', 'public/imgs/productos/1.jpg');
INSERT INTO `boimcoweb`.`productos` (`nombreProducto`, `precioUnitarioProducto`, `cantidadProducto`, `estadoProducto`, `imgProducto`) VALUES ('Gorra', '20', '10', 'ACT', 'public/imgs/productos/2.jpg');
INSERT INTO `boimcoweb`.`productos` (`nombreProducto`, `precioUnitarioProducto`, `cantidadProducto`, `estadoProducto`, `imgProducto`) VALUES ('Camiseta Polo', '45', '10', 'ACT', 'public/imgs/productos/3.jpg');
INSERT INTO `boimcoweb`.`productos` (`nombreProducto`, `precioUnitarioProducto`, `cantidadProducto`, `estadoProducto`, `imgProducto`) VALUES ('Camiseta Sencilla', '25', '10', 'ACT', 'public/imgs/productos/4.jpg');
INSERT INTO `boimcoweb`.`productos` (`nombreProducto`, `precioUnitarioProducto`, `cantidadProducto`, `estadoProducto`, `imgProducto`) VALUES ('Gorro', '15', '10', 'ACT', 'public/imgs/productos/5.jpg');
INSERT INTO `boimcoweb`.`productos` (`nombreProducto`, `precioUnitarioProducto`, `cantidadProducto`, `estadoProducto`, `imgProducto`) VALUES ('Tela', '80', '10', 'ACT', 'public/imgs/productos/6.jpg');
INSERT INTO `boimcoweb`.`productos` (`nombreProducto`, `precioUnitarioProducto`, `cantidadProducto`, `estadoProducto`, `imgProducto`) VALUES ('Delantal', '100', '10', 'ACT', 'public/imgs/productos/7.jpg');
INSERT INTO `boimcoweb`.`productos` (`nombreProducto`, `precioUnitarioProducto`, `cantidadProducto`, `estadoProducto`, `imgProducto`) VALUES ('Uniforme', '500', '10', 'ACT', 'public/imgs/productos/8.jpg');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
