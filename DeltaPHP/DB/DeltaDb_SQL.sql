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
  FOREIGN KEY (RoomID) REFERENCES rooms(RoomID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  FOREIGN KEY (BuildingID) REFERENCES buildings(BuildingID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  FOREIGN KEY (ComputerID) REFERENCES computers(ComputerID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE);
	
	
	
INSERT INTO `buildings` (`BuildingID`, `BuildingNo`, `BuildingName`) VALUES
(1, '3', 'HR'),
(2, '1', 'Safety'),
(3, '2', 'Administator');
	       
	       
	       
INSERT INTO `vendors` (`VendorID`, `Name`, `Contact`, `Phone`) VALUES
(1, 'Wire', 'John', 2147483647),
(2, 'Bluecore', 'Mark', 2147483647),
(3, 'Net', 'Maria', 2147483647),
(1010, 'Wire', 'John', 2147483647),
(1011, 'Bluecore', 'Mark', 2147483647),
(1012, 'Net', 'Maria', 2147483647);

	       
	       
	       
	       
	       
	       
	       
INSERT INTO `computers` (`ComputerID`, `VendorID`, `Model`, `MemorySize`, `StoragesSize`) VALUES
(1, 1, 'DELL2019', '128GB', '1TB'),
(2, 2, 'HPLITE', '256GB', '1TB'),
(3, 3, 'Lenovo', '256GB', '2TB'),
(4, 1010, 'Apple', '128GB', '500GB'),
(5, 1011, 'IBM', '256GB', '2TB');  

