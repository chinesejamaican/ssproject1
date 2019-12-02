create database entertainment;
use entertainment;

CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'Pa11word';

grant all privileges on entertainment.* to 'admin'@'localhost';


CREATE TABLE `entertainment`.`theater` (
  `tid` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  PRIMARY KEY (`tid`));
INSERT INTO `entertainment`.`theater` (`title`, `location`) VALUES 
('Jacksonville, Regal Avenues 4DX & RPX', '9525 Phillips Highway'),
('Regal Oakwood', 'Oakwood Plaza'),
('Regal Westfork', 'Westfork Plaza'),
('Regal Shadowood', '· Shadowood Square'),
('Regal Magnolia Place', 'Magnolia Shoppes'),
('Regal UA Falls', 'The Falls');

  
CREATE TABLE `entertainment`.`moives` (
  `mid` INT NOT NULL,
  `title` VARCHAR(45) NULL,
  `genre` VARCHAR(45) NULL,
  `length` INT NULL,
  PRIMARY KEY (`mid`));
INSERT INTO `entertainment`.`moives` (`mid`, `title`, `genre`, `length`) VALUES ('1', 'Avengers: Endgame', 'action', '120');
INSERT INTO `entertainment`.`moives` (`mid`, `title`, `genre`, `length`) VALUES ('2', 'The Lord of the Rings: The Return of the King', 'action', '201');
INSERT INTO `entertainment`.`moives` (`mid`, `title`, `genre`, `length`) VALUES ('3', 'Inception (2010)', 'action', '148');
INSERT INTO `entertainment`.`moives` (`mid`, `title`, `genre`, `length`) VALUES ('4', 'Star Wars: Episode V - The Empire Strikes Back', 'action', '124');
INSERT INTO `entertainment`.`moives` (`mid`, `title`, `genre`, `length`) VALUES ('5', 'Hababam Sinifi ', 'comedy', '87');
INSERT INTO `entertainment`.`moives` (`mid`, `title`, `genre`, `length`) VALUES ('6', 'Step Brothers ', 'comedy', '87');

  
  
  
  
  
  
CREATE TABLE `entertainment`.`date_of_week` (
  `did` INT NOT NULL,
  `day` VARCHAR(45) NULL,
  PRIMARY KEY (`did`));
INSERT INTO `entertainment`.`date_of_week` (`did`, `day`) VALUES ('1', 'MO');
INSERT INTO `entertainment`.`date_of_week` (`did`, `day`) VALUES ('2', 'TU');
INSERT INTO `entertainment`.`date_of_week` (`did`, `day`) VALUES ('3', 'WE');
INSERT INTO `entertainment`.`date_of_week` (`did`, `day`) VALUES ('4', 'TH');
INSERT INTO `entertainment`.`date_of_week` (`did`, `day`) VALUES ('5', 'FR');
INSERT INTO `entertainment`.`date_of_week` (`did`, `day`) VALUES ('6', 'SA');
INSERT INTO `entertainment`.`date_of_week` (`did`, `day`) VALUES ('7', 'SU');

  
  
  
  
CREATE TABLE `entertainment`.`price` (
  `pid` INT NOT NULL AUTO_INCREMENT,
  `cost` VARCHAR(45) NULL,
  PRIMARY KEY (`pid`));
INSERT INTO `entertainment`.`price` (`cost`) VALUES ('10');
INSERT INTO `entertainment`.`price` (`cost`) VALUES ('15');
INSERT INTO `entertainment`.`price` (`cost`) VALUES ('20');
 
  
  
 CREATE TABLE `entertainment`.`screen` ( 
	  `sid` INT NOT NULL AUTO_INCREMENT,
	  `tid` INT NULL,
	  `seats` VARCHAR(45) NULL,
	PRIMARY KEY (`sid`),
    FOREIGN KEY (tid) REFERENCES theater(tid) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE); 
    
    
    
CREATE TABLE `entertainment`.`start_time` (
  `stid` INT NOT NULL AUTO_INCREMENT,
  `time` VARCHAR(45) NULL,
  `pid` INT NULL,
  PRIMARY KEY (`stid`),
  FOREIGN KEY (pid) REFERENCES price(pid) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE); 
INSERT INTO `entertainment`.`start_time` (`stid`, `time`, `pid`) VALUES ('1', '9:00 am', '1');
INSERT INTO `entertainment`.`start_time` (`stid`, `time`, `pid`) VALUES ('2', '10:00 am', '1');
INSERT INTO `entertainment`.`start_time` (`stid`, `time`, `pid`) VALUES ('3', '7:00 pm', '2');

  
  
CREATE TABLE `entertainment`.`show_time` (
  `sid` INT NOT NULL AUTO_INCREMENT,
  `mid` INT NOT NULL,
  `did` INT NOT NULL,
  `stid` INT NOT NULL,
  `num_people` INT NULL,
  PRIMARY KEY (`sid`),
  FOREIGN KEY (mid) REFERENCES moives(mid) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  FOREIGN KEY (did) REFERENCES date_of_week(did) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  FOREIGN KEY (stid) REFERENCES start_time(stid) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE);
  
INSERT INTO `entertainment`.`show_time` (`sid`, `mid`, `did`, `stid`, `num_people`) VALUES ('1', '1', '1', '1', '90');
INSERT INTO `entertainment`.`show_time` (`sid`, `mid`, `did`, `stid`, `num_people`) VALUES ('2', '1', '2', '1', '50');
INSERT INTO `entertainment`.`show_time` (`sid`, `mid`, `did`, `stid`, `num_people`) VALUES ('3', '2', '2', '2', '20');
 
  
  
  