CREATE TABLE IF NOT EXISTS tblUser (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    emri VARCHAR(50) NOT NULL,
    mbiemri VARCHAR(50) NOT NULL,
    emaili VARCHAR(50) NOT NULL UNIQUE,
    passwordHash VARCHAR(300) NOT NULL
  ) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `up_studenttoolkit`.`tblasociacioni` (
    `aId` INT AUTO_INCREMENT PRIMARY KEY , 
    `userId` INT NOT NULL , 
    `titulli` VARCHAR(50) NOT NULL , 
    `A1` VARCHAR(50) NOT NULL , 
    `A2` VARCHAR(50) NOT NULL , 
    `A3` VARCHAR(50) NOT NULL , 
    `Afinal` VARCHAR(50) NOT NULL , 
    `B1` VARCHAR(50) NOT NULL , 
    `B2` VARCHAR(50) NOT NULL , 
    `B3` VARCHAR(50) NOT NULL , 
    `B4` VARCHAR(50) NOT NULL , 
    `Bfinal` VARCHAR(50) NOT NULL , 
    `C1` VARCHAR(50) NOT NULL , 
    `C2` VARCHAR(50) NOT NULL , 
    `C3` VARCHAR(50) NOT NULL , 
    `C4` VARCHAR(50) NOT NULL , 
    `Cfinal` VARCHAR(50) NOT NULL , 
    `D1` VARCHAR(50) NOT NULL , 
    `D2` VARCHAR(50) NOT NULL , 
    `D3` VARCHAR(50) NOT NULL , 
    `D4` VARCHAR(50) NOT NULL , 
    `Dfinal` VARCHAR(50) NOT NULL , 
    `final` VARCHAR(50) NOT NULL, FOREIGN KEY (userId) REFERENCES tblUser(userId)) ENGINE = InnoDB;



START TRANSACTION;

CREATE TABLE `opsionet` (
  `id` int(11) NOT NULL,
  `opsioni` text NOT NULL,
  `pyetja_id` int(11) NOT NULL,
  `sakte` tinyint(1) NOT NULL
); 


CREATE TABLE `pyetjet` (
  `id` int(11) NOT NULL,
  `pyetja` text NOT NULL
);


-- SHTIMI I PRIMARY-KEY:
ALTER TABLE `opsionet`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pyetjet`
  ADD PRIMARY KEY (`id`);


-- SHTIMI I AUTO-INCREMENT:
ALTER TABLE `opsionet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

ALTER TABLE `pyetjet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT; 
