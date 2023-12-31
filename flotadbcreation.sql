DROP DATABASE IF EXISTS flotadb;

CREATE DATABASE flotadb;

USE flotadb;

CREATE TABLE
    phone (
        idPhone INT AUTO_INCREMENT NOT NULL,
        number INT NOT NULL,
        PRIMARY KEY (idPhone)
    );

CREATE TABLE
    mail (
        idMail INT AUTO_INCREMENT NOT NULL,
        description VARCHAR(50) NOT NULL,
        PRIMARY KEY (idMail)
    );

CREATE TABLE
    sex (
        idSex INT AUTO_INCREMENT NOT NULL,
        description VARCHAR(20) NOT NULL,
        PRIMARY KEY (idSex)
    );

CREATE TABLE
    person (
        idPerson INT AUTO_INCREMENT NOT NULL,
        firstName VARCHAR(30) NOT NULL,
        secondName VARCHAR(30),
        firstSurname VARCHAR(30) NOT NULL,
        secondSurname VARCHAR(30) NOT NULL,
        identification VARCHAR(30) NOT NULL UNIQUE,
        birthDate DATE NOT NULL,
        idSex INT NOT NULL,
        idPhone INT NOT NULL,
        idMail INT NOT NULL,
        PRIMARY KEY (idPerson),
        CONSTRAINT FK_person_sex FOREIGN KEY (idSex) REFERENCES sex(idSex),
        CONSTRAINT FK_person_phone FOREIGN KEY (idPhone) REFERENCES phone(idPhone),
        CONSTRAINT FK_person_mail FOREIGN KEY (idMail) REFERENCES Mail(idMail)
    );

CREATE TABLE
    user (
        idUser INT AUTO_INCREMENT NOT NULL,
        userName VARCHAR(40) NOT NULL,
        password VARCHAR(40) NOT NULL,
        idPerson INT NOT NULL,
        PRIMARY KEY (idUser),
        CONSTRAINT FK_user_sex FOREIGN KEY (idPerson) REFERENCES person(idPerson)
    );

CREATE TABLE
    category (
        idCategory INT AUTO_INCREMENT NOT NULL,
        description VARCHAR(30) NOT NULL,
        PRIMARY KEY (idCategory)
    );

CREATE TABLE
    driverUser (
        idDriverUser INT AUTO_INCREMENT NOT NULL,
        idUser INT NOT NULL,
        PRIMARY KEY (idDriverUser),
        CONSTRAINT FK_driverUser_user FOREIGN KEY (idUser) REFERENCES user(idUser)
    );

CREATE TABLE
    categoryDriverUser (
        idDriverUser INT NOT NULL,
        idCategory INT NOT NULL,
        PRIMARY KEY (idDriverUser, idCategory),
        CONSTRAINT FK_categoryDriverUser_category FOREIGN KEY (idCategory) REFERENCES category(idCategory),
        CONSTRAINT FK_categoryDriverUser_driverUser FOREIGN KEY (idDriverUser) REFERENCES driverUser(idDriverUser)
    );

CREATE TABLE
    business (
        idBusiness INT AUTO_INCREMENT NOT NULL,
        name VARCHAR(100) NOT NULL,
        logo varchar(200) NOT NULL,
        latitude DOUBLE NOT NULL,
        longitude DOUBLE NOT NULL,
        PRIMARY KEY (idBusiness)
    );

CREATE TABLE
    adminUser (
        idAdminUser INT AUTO_INCREMENT NOT NULL,
        idUser INT NOT NULL,
        idBusiness INT NOT NULL,
        PRIMARY KEY (idAdminUser),
        CONSTRAINT FK_adminUser_user FOREIGN KEY (idUser) REFERENCES user(idUser),
        CONSTRAINT FK_adminUser_business FOREIGN KEY (idBusiness) REFERENCES business(idBusiness)
    );

CREATE TABLE
    driverCode (
        idDriverCode INT AUTO_INCREMENT NOT NULL,
        code VARCHAR(6) NOT NULL,
        idBusiness INT NOT NULL,
        date DATETIME NOT NULL,
        PRIMARY KEY (idDriverCode),
        CONSTRAINT FK_adminUser_business FOREIGN KEY (idBusiness) REFERENCES business(idBusiness)
    );


CREATE TABLE
    vehicleType (
        idVehicleType INT AUTO_INCREMENT NOT NULL,
        description VARCHAR(50) NOT NULL,
        PRIMARY KEY (idVehicleType)
    );

CREATE TABLE
    vehicle (
        idVehicle INT AUTO_INCREMENT NOT NULL,
        lpn VARCHAR(50) NOT NULL,
        brand VARCHAR(100) NOT NULL,
        model VARCHAR(100) NOT NULL,
        year YEAR NOT NULL,
        tankCapacity FLOAT,
        idVehicleType INT NOT NULL,
        idBusiness INT NOT NULL,
        PRIMARY KEY (idVehicle),
        CONSTRAINT FK_vehicle_vehicleType FOREIGN KEY (idVehicleType) REFERENCES vehicleType(idVehicleType),
        CONSTRAINT FK_vehicle_business FOREIGN KEY (idBusiness) REFERENCES business(idBusiness)
    );

CREATE TABLE
    vehicleAsignation (
        idVehicleAsignation INT AUTO_INCREMENT NOT NULL,
        idDriverUser INT NOT NULL,
        idVehicle INT NOT NULL,
        startDate DATETIME NOT NULL,
        endDate DATETIME,
        startMileage INT NOT NULL,
        endMileage INT,
        PRIMARY KEY (idVehicleAsignation),
        CONSTRAINT FK_vehicleAsignation_driver FOREIGN KEY (idDriverUser) REFERENCES driverUser(idDriverUser),
        CONSTRAINT FK_vehicleAsignation_vehicle FOREIGN KEY (idVehicle) REFERENCES vehicle(idVehicle)
    );

CREATE TABLE
    location (
        idLocation INT AUTO_INCREMENT NOT NULL,
        logitude DOUBLE NOT NULL,
        latitude DOUBLE NOT NULL,
        date DATETIME NOT NULL,
        idVehicleAsignation INT NOT NULL,
        PRIMARY KEY (idLocation),
        CONSTRAINT FK_location_vehicleAsignation FOREIGN KEY (idVehicleAsignation) REFERENCES vehicleAsignation(idVehicleAsignation)
    );

CREATE TABLE
    periodType (
        idPeriodType INT AUTO_INCREMENT NOT NULL,
        description VARCHAR(15) NOT NULL,
        PRIMARY KEY (idPeriodType)
    );

CREATE TABLE
    baseMaintenanceType (
        idBaseMaintenanceType INT AUTO_INCREMENT NOT NULL,
        description VARCHAR(200) NOT NULL,
        period INT NOT NULL,
        idPeriodType INT NOT NULL,
        PRIMARY KEY (idBaseMaintenanceType),
        CONSTRAINT FK_baseMaintenanceType_periodType FOREIGN KEY (idPeriodType) REFERENCES periodType(idPeriodType)
    );

CREATE TABLE
    maintenanceType (
        idMaintenanceType INT AUTO_INCREMENT NOT NULL,
        description VARCHAR(200) NOT NULL,
        period INT NOT NULL,
        idPeriodType INT NOT NULL,
        PRIMARY KEY (idMaintenanceType),
        CONSTRAINT FK_maintenanceType_periodType FOREIGN KEY (idPeriodType) REFERENCES periodType(idPeriodType)
    );

CREATE TABLE
    baseMaintenanceTypeVehicleType (
        idBaseMaintenanceType INT NOT NULL,
        idVehicleType INT NOT NULL,
        PRIMARY KEY (
            idBaseMaintenanceType,
            idVehicleType
        ),
        CONSTRAINT FK_baseMaintenanceTypeVehicleType_baseMaintenanceType FOREIGN KEY (idBaseMaintenanceType) REFERENCES baseMaintenanceType(idBaseMaintenanceType),
        CONSTRAINT FK_baseMaintenanceTypeVehicleType_vehicleType FOREIGN KEY (idVehicleType) REFERENCES vehicleType(idVehicleType)
    );

CREATE TABLE
    maintenance (
        idMaintenance INT AUTO_INCREMENT NOT NULL,
        idMaintenanceType INT NOT NULL,
        date DATETIME NOT NULL,
        PRIMARY KEY (idMaintenance),
        CONSTRAINT FK_maintenance_maintenanceType FOREIGN KEY (idMaintenanceType) REFERENCES maintenanceType(idMaintenanceType)
    );

-- ____________________data_______________________________________________

INSERT INTO sex (description) VALUES ("masculino"),("femenino");
INSERT INTO category (description) VALUES ("categoría 1"),("categoría 2"),("categoría 3"),("categoría 4"),("categoría 5"),("categoría 6"),("categoría 7");
INSERT INTO periodType (description) VALUES ("km"), ("dias");
INSERT INTO vehicleType (description) VALUES ("motocicleta"), ("ciclomotor"), ("turismo pequeño"), ("turismo grande"), ("turismo pickup"), ("microbus"), ("autobus"), ("camión");


-- ____________________procedures and functions_______________________________________________


DELIMITER $$

CREATE FUNCTION signInDriverUser(firstName VARCHAR(30), secondName VARCHAR(30), firstSurname VARCHAR(30), secondSurname VARCHAR(30), identification VARCHAR(30), birthDate DATE, idSex INT, phone INT, mail VARCHAR(50), userName VARCHAR(40), password VARCHAR(40))
RETURNS INT
READS SQL DATA
BEGIN
    DECLARE idPhone INT;
    DECLARE idMail INT;
    DECLARE idPerson INT;
    DECLARE idUser INT;
    DECLARE idDriverUser INT;

    INSERT INTO phone (number) VALUES (phone);
    SET idPhone = LAST_INSERT_ID();

    INSERT INTO mail (description) VALUES (mail);
    SET idMail = LAST_INSERT_ID();

    INSERT INTO person (firstName, secondName, firstSurname, secondSurname, identification, birthDate, idSex, idPhone, idMail) VALUES (firstName, secondName, firstSurname, secondSurname, identification, birthDate, idSex, idPhone, idMail);
    SET idPerson = LAST_INSERT_ID();

    INSERT INTO user (userName, password, idPerson) VALUES (userName, password, idPerson);
    SET idUser = LAST_INSERT_ID();
    
    INSERT INTO driverUser (idUser) VALUES (idUser);
    SET idDriverUser = LAST_INSERT_ID();

    RETURN idDriverUser;
END $$


CREATE PROCEDURE insertCategory(idDriverUser INT,  idCategory INT)
BEGIN
    INSERT INTO categoryDriverUser (idDriverUser, idCategory) VALUES (idDriverUser, idCategory);
END $$


CREATE FUNCTION signInAdminUser(firstName VARCHAR(30), secondName VARCHAR(30), firstSurname VARCHAR(30), secondSurname VARCHAR(30), identification VARCHAR(30), birthDate DATE, idSex INT, phone INT, mail VARCHAR(50), userName VARCHAR(40), password VARCHAR(40), name VARCHAR(100), logo varchar(200), latitude DOUBLE, longitude DOUBLE)
RETURNS INT
READS SQL DATA
BEGIN
    DECLARE idPhone INT;
    DECLARE idMail INT;
    DECLARE idPerson INT;
    DECLARE idUser INT;
    DECLARE idAdminUser INT;
    DECLARE idBusiness INT;

    INSERT INTO phone (number) VALUES (phone);
    SET idPhone = LAST_INSERT_ID();

    INSERT INTO mail (description) VALUES (mail);
    SET idMail = LAST_INSERT_ID();

    INSERT INTO person (firstName, secondName, firstSurname, secondSurname, identification, birthDate, idSex, idPhone, idMail) VALUES (firstName, secondName, firstSurname, secondSurname, identification, birthDate, idSex, idPhone, idMail);
    SET idPerson = LAST_INSERT_ID();

    INSERT INTO user (userName, password, idPerson) VALUES (userName, password, idPerson);
    SET idUser = LAST_INSERT_ID();
    
    INSERT INTO business (name, logo, latitude, longitude) VALUES (name, logo, latitude, longitude);
    SET idBusiness = LAST_INSERT_ID();

    INSERT INTO adminUser (idUser, idBusiness) VALUES (idUser, idBusiness);
    SET idAdminUser = LAST_INSERT_ID();

    RETURN idAdminUser;
END $$


CREATE FUNCTION insertVehicle(lpn VARCHAR(50), brand VARCHAR(100), model VARCHAR(100), year YEAR, tankCapacity FLOAT, idVehicleType INT, userName VARCHAR(100))
RETURNS INT
READS SQL DATA
BEGIN

    DECLARE idVehicle INT;
    DECLARE idBusiness INT;

    SELECT adminUser.idBusiness INTO idBusiness FROM adminUser, user WHERE adminUser.idUser = user.idUser AND user.userName = userName;

    INSERT INTO vehicle(lpn, brand, model, year, tankCapacity, idVehicleType, idBusiness) VALUES(lpn, brand, model, year, tankCapacity, idVehicleType, idBusiness);
    SET idVehicle = LAST_INSERT_ID();

    RETURN idVehicle;
END $$




DELIMITER ;



-- ____________________pruebas_______________________________________________

-- CALL insertCategory(1,1);
-- CALL insertCategory(1,3);
-- CALL insertCategory(1,4);
-- CALL insertCategory(1,5);

-- SELECT * FROM categoryDriverUser;

-- SELECT signInDriverUser("Orlando", "Jose", "Caceres", "Green", "C3", "2019-01-01", 1, 87126887, "orlando114@gmail.com", "orla4", "contra");

-- DROP FUNCTION IF EXISTS insertVehicle;

-- SELECT * FROM person;
-- SELECT * FROM user;
-- SELECT * FROM business;
-- SELECT COUNT(*) FROM user WHERE user.userName = "Pedro5" AND user.password = "cont";
-- SELECT name FROM business WHERE business.idBusiness = adminUser.idBusiness;

    -- SELECT insertVehicle('a', 's', 'r', '1999', 23, 1, 'a');
