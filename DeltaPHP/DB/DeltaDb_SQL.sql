create database inventory;
use inventory;


create user 'admin'@'localhost' identified by 'Pa11word';

grant all privileges on inventory.* to 'admin'@'localhost';


CREATE TABLE  `vendors` (
  `VendorID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(15) NULL,
  `Contact` VARCHAR(150) NULL,
  `Phone` INT NULL,
  PRIMARY KEY (`VendorID`));


CREATE TABLE `buildings` (
  `BuildingID` INT NOT NULL AUTO_INCREMENT ,
  `BuildingNo` VARCHAR(15) NULL,
  `BuildingName` VARCHAR(15) NULL,
  PRIMARY KEY (`BuildingID`));




CREATE TABLE  `rooms` (
  `RoomID` INT NOT NULL AUTO_INCREMENT,
  `BuildingID` INT NOT NULL,
  `RoomNumber` INT(2) NOT NULL,
  `Capacity` INT(3) NOT NULL,
  PRIMARY KEY (`RoomID`),
  INDEX `BuildingID_idx` (`BuildingID` ASC),
  CONSTRAINT `BuildingID`
    FOREIGN KEY (`BuildingID`)
    REFERENCES `inventory`.`buildings` (`BuildingID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


CREATE TABLE `inventory`.`computers` (
  `ComputerID` INT NOT NULL AUTO_INCREMENT,
  `VendorID` INT NULL,
  `Model` VARCHAR(45) NULL,
  `MemorySize` VARCHAR(45) NULL,
  `StoragesSize` VARCHAR(45) NULL,
  PRIMARY KEY (`ComputerID`),
  INDEX `VendorID_idx` (`VendorID` ASC),
  CONSTRAINT `VendorID`
    FOREIGN KEY (`VendorID`)
    REFERENCES `inventory`.`vendors` (`VendorID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


CREATE TABLE `inventory`.`roomcomputers` (
  `RoomID` INT NULL,
  `BuildingID` INT NULL,
  `ComputerID` INT NULL,
  `Count` INT NULL,
  INDEX `RoomID_idx` (`RoomID` ASC) VISIBLE,
  INDEX `BuildingID_idx` (`BuildingID` ASC) VISIBLE,
  INDEX `ComputerID_idx` (`ComputerID` ASC) VISIBLE,
  CONSTRAINT `RoomID`
    FOREIGN KEY (`RoomID`)
    REFERENCES `inventory`.`rooms` (`RoomID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `BuildingID`
    FOREIGN KEY (`BuildingID`)
    REFERENCES `inventory`.`buildings` (`BuildingID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `ComputerID`
    FOREIGN KEY (`ComputerID`)
    REFERENCES `inventory`.`computers` (`ComputerID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

    ON UPDATE CASCADE);
	
	
	
	INSERT INTO `inventory`.`buildings` (`BuildingNo`, `BuildingName`) VALUES ('1', 'Safety');
INSERT INTO `inventory`.`buildings` (`BuildingNo`, `BuildingName`) VALUES ('2', 'Administator');

