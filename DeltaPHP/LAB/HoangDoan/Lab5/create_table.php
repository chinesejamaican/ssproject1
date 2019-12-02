<?php
/**
 * @author HoangDoan
 */
include 'dbconnect.php';

class CreateTable extends DbConnect
{
    
    public function createDatabase()
    { 
        try {
            $sql = "CREATE DATABASE IF NOT EXISTS " . self::DB_NAME;
            $this->getPdo()->exec($sql);
            echo "Database created successfully<br>";
            
            $sql = "use " . self::DB_NAME;
            $this->getPdo()->exec($sql);
            
            
            $sql = "CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'Pa11word'";
            $this->getPdo()->exec($sql);
            
            $sql = "grant all privileges on entertainment.* to 'admin'@'localhost'";
            $this->getPdo()->exec($sql);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * ------------------------------------------------------------------------
     *
     * CREATE TABLE theater
     */
    public function createTheaterTable()
    {
        $sql = <<<EOSQL
           CREATE TABLE IF NOT EXISTS `theater` (
              `tid` INT NOT NULL AUTO_INCREMENT,
              `title` VARCHAR(45) NULL,
              `location` VARCHAR(45) NULL,
               PRIMARY KEY (`tid`));
        EOSQL;
        return $this->getPdo()->exec($sql);
        echo "createTheaterTable successfully<br>";
    }

    /**
     * ------------------------------------------------------------------------
     *
     * CREATE TABLE movies
     */
    public function createMoiveTable()
    {
        $sql = <<<EOSQL
          CREATE TABLE IF NOT EXISTS `entertainment`.`moives` (
          `mid` INT NOT NULL,
          `title` VARCHAR(45) NULL,
          `genre` VARCHAR(45) NULL,
          `length` INT NULL,
          PRIMARY KEY (`mid`));
        EOSQL;
        return $this->getPdo()->exec($sql);
        echo "createMoiveTable successfully<br>";
    }

    /**
     * ------------------------------------------------------------------------
     *
     * CREATE TABLE date_of_week
     */
    public function createDate_of_weekTable()
    {
        $sql = <<<EOSQL
          CREATE TABLE IF NOT EXISTS `entertainment`.`date_of_week` (
          `did` INT NOT NULL,
          `day` VARCHAR(45) NULL,
          PRIMARY KEY (`did`));
        EOSQL;
        return $this->getPdo()->exec($sql);
        echo "createDate_of_weekTable successfully<br>";
    }

    /**
     * ------------------------------------------------------------------------
     *
     * CREATE TABLE price
     */
    public function createPriceTable()
    {
        $sql = <<<EOSQL
           CREATE TABLE IF NOT EXISTS `entertainment`.`price` (
          `pid` INT NOT NULL AUTO_INCREMENT,
          `cost` VARCHAR(45) NULL,
          PRIMARY KEY (`pid`));
        EOSQL;
        return $this->getPdo()->exec($sql);
        echo "createPriceTable successfully<br>";
    }

    /**
     * ------------------------------------------------------------------------
     *
     * CREATE TABLE screen
     */
    public function createScreenTable()
    {
        $sql = <<<EOSQL
             CREATE TABLE IF NOT EXISTS `entertainment`.`screen` (
        	  `sid` INT NOT NULL AUTO_INCREMENT,
        	  `tid` INT NULL,
        	  `seats` VARCHAR(45) NULL,
            	PRIMARY KEY (`sid`),
                FOREIGN KEY (tid) REFERENCES theater(tid)
                ON DELETE CASCADE
                ON UPDATE CASCADE);
        EOSQL;
        return $this->getPdo()->exec($sql);
        echo "createScreenTable successfully<br>";
    }

    /**
     * ------------------------------------------------------------------------
     *
     * CREATE TABLE start_time
     */
    public function createStart_timeTable()
    {
        $sql = <<<EOSQL
        CREATE TABLE IF NOT EXISTS `entertainment`.`start_time` (
          `stid` INT NOT NULL AUTO_INCREMENT,
          `time` VARCHAR(45) NULL,
          `pid` INT NULL,
          PRIMARY KEY (`stid`),
          FOREIGN KEY (pid) REFERENCES price(pid)
          ON DELETE CASCADE
          ON UPDATE CASCADE);
        EOSQL;
        return $this->getPdo()->exec($sql);
        echo "createStart_timeTable successfully<br>";
    }

    /**
     * ------------------------------------------------------------------------
     *
     * CREATE TABLE show_time
     */
    public function createShow_timeTable()
    {
        $sql = <<<EOSQL
        CREATE TABLE IF NOT EXISTS `entertainment`.`show_time` (
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
        EOSQL;
        return $this->getPdo()->exec($sql);
        echo "createShow_timeTable successfully<br>";
    }

    /**
     * ------------------------------------------------------------------------
     *
     * INSERT DATA INTO theater
     */
    public function insertTheaterTable()
    {
        $sql = <<<EOSQL
        
         INSERT INTO `entertainment`.`theater` (`title`, `location`) VALUES
            ('Jacksonville, Regal Avenues 4DX & RPX', '9525 Phillips Highway'),
            ('Regal Oakwood', 'Oakwood Plaza'),
            ('Regal Westfork', 'Westfork Plaza'),
            ('Regal Shadowood', '· Shadowood Square'),
            ('Regal Magnolia Place', 'Magnolia Shoppes'),
            ('Regal UA Falls', 'The Falls');
        EOSQL;
        return $this->getPdo()->exec($sql);
    }

    /**
     * ------------------------------------------------------------------------
     *
     * INSERT DATA INTO movies
     */
    public function insertMoiveTable()
    {
        $sql = <<<EOSQL
            INSERT INTO `entertainment`.`moives` (`mid`, `title`, `genre`, `length`) VALUES
                ('1', 'Avengers: Endgame', 'action', '120'),
                ('2', 'The Lord of the Rings: The Return of the King', 'action', '201'),
                ('3', 'Inception (2010)', 'action', '148'),
                ('4', 'Star Wars: Episode V - The Empire Strikes Back', 'action', '124'),
                ('5', 'Hababam Sinifi ', 'comedy', '87'),
                ('6', 'Step Brothers ', 'comedy', '87');
        EOSQL;
        return $this->getPdo()->exec($sql);
    }

    /**
     * ------------------------------------------------------------------------
     *
     * INSERT DATA INTO date_of_week
     */
    public function insertDate_of_weekTable()
    {
        $sql = <<<EOSQL
            INSERT INTO `entertainment`.`date_of_week` (`did`, `day`) VALUES
                ('1', 'MO'),
                ('2', 'TU'),
                ('3', 'WE'),
                ('4', 'TH'),
                ('5', 'FR'),
                ('6', 'SA'),
                ('7', 'SU');
        EOSQL;
        return $this->getPdo()->exec($sql);
    }

    /**
     * ------------------------------------------------------------------------
     *
     * INSERT DATA INTO price
     */
    public function insertPriceTable()
    {
        $sql = <<<EOSQL
        INSERT INTO `entertainment`.`price` (`cost`) VALUES
                                ('10'),
                                ('15'),
                                ('20');       
        EOSQL;
        return $this->getPdo()->exec($sql);
    }

    /**
     * ------------------------------------------------------------------------
     *
     * INSERT DATA INTO screen
     */
    public function insertScreenTable()
    {
        $sql = <<<EOSQL
            INSERT INTO `entertainment`.`screen` (`sid`, `tid`, `seats`) VALUES 
                ('1', '1', '32'),
                ('2', '1', '21'),
                ('3', '2', '500'),
                ('4', '1', '43');
        EOSQL;
        return $this->getPdo()->exec($sql);
    }

    /**
     * ------------------------------------------------------------------------
     *
     * INSERT DATA INTO start_time
     */
    public function insertStart_timeTable()
    {
        $sql = <<<EOSQL
            INSERT INTO `entertainment`.`start_time` (`stid`, `time`, `pid`) VALUES 
            ('1', '9:00 am', '1'),
            ('2', '10:00 am', '1'),
            ('3', '7:00 pm', '2');
        EOSQL;
        return $this->getPdo()->exec($sql);
    }

    /**
     * ------------------------------------------------------------------------
     *
     * INSERT DATA INTO show_time
     */
    public function insertShow_timeTable()
    {
        $sql = <<<EOSQL
            INSERT INTO `entertainment`.`show_time` (`sid`, `mid`, `did`, `stid`, `num_people`) VALUES 
                   ('1', '1', '1', '1', '90'),
                   ('2', '1', '2', '1', '50'),
                   ('3', '2', '2', '2', '20');
        EOSQL;
        return $this->getPdo()->exec($sql);
    }

    public function createAllTable()
    {
        $obj = new CreateTable();
        //create database
        $obj->createDatabase();
        //create tables;
        $obj->createTheaterTable();
        $obj->createMoiveTable();
        $obj->createDate_of_weekTable();
        $obj->createPriceTable();
        $obj->createScreenTable();
        $obj->createStart_timeTable();
        $obj->createShow_timeTable();
        //insert data into table
        $obj->insertTheaterTable();
        $obj->insertMoiveTable();
        $obj->insertDate_of_weekTable();
        $obj->insertPriceTable();
        $obj->insertScreenTable();
        $obj->insertStart_timeTable();
        $obj->insertShow_timeTable();
        
    }
}
$obj = new CreateTable();
$obj->createAllTable();


?>