DROP DATABASE IF EXISTS BowlingCenter;
CREATE DATABASE BowlingCenter;
USE BowlingCenter;


CREATE TABLE `Persoon`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Voornaam` VARCHAR(255) NOT NULL,
    `Tussenvoegsel` VARCHAR(255) NULL,
    `Achternaam` VARCHAR(255) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Persoon (Voornaam, Tussenvoegsel, Achternaam, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES ('John', 'van der', 'Doe', 1, 'Test comment', SYSDATE(), SYSDATE())
, ('Niko', NULL, 'Baltzis', 1, 'Test comment', SYSDATE(), SYSDATE())
, ('Milan', NULL, 'Claase', 1, 'Test comment', SYSDATE(), SYSDATE())
, ('Lazar', NULL, 'Zongana', 1, 'Test comment', SYSDATE(), SYSDATE())
, ('Saad', NULL, 'Benaissa', 1, 'Test comment', SYSDATE(), SYSDATE());







CREATE TABLE `Tarief`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Eenheid` VARCHAR(20) NOT NULL,
    `Prijs` DECIMAL(8,2) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Tarief (Eenheid, Prijs, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES ('Uur', 24.00, 1, 'Test comment', SYSDATE(), SYSDATE())
, ('Uur', 28.00, 1, 'Test comment', SYSDATE(), SYSDATE())
, ('Uur', 33.50, 1, 'Test comment', SYSDATE(), SYSDATE());
	





	
CREATE TABLE `Pakketten`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Naam` VARCHAR(255) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NOT NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Pakketten (Naam, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES ('Basic', 1, 'Basic Pack', SYSDATE(), SYSDATE())
, ('Luxe', 1, 'Luxe Pack', SYSDATE(), SYSDATE())
, ('Kinderpartij', 1, 'Kinder Pack', SYSDATE(), SYSDATE())
, ('Vrijgezellenfeest', 1, 'WhateverThisEvenIs Pack', SYSDATE(), SYSDATE());






CREATE TABLE `Baan`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Nummer` INT NOT NULL,
    `HeeftHek` BIT NOT NULL,
    `IsActief` BIT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Baan (Nummer, HeeftHek, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES (1, 1, 1, 'Kinder baan', SYSDATE(), SYSDATE())
, (2, 1, 1, 'Kinder baan', SYSDATE(), SYSDATE())
, (3, 0, 1, 'Test comment', SYSDATE(), SYSDATE())
, (4, 0, 1, 'Test comment', SYSDATE(), SYSDATE())
, (5, 0, 1, 'Test comment', SYSDATE(), SYSDATE())
, (6, 0, 1, 'Test comment', SYSDATE(), SYSDATE())
, (7, 0, 1, 'Test comment', SYSDATE(), SYSDATE())
, (8, 0, 1, 'Test comment', SYSDATE(), SYSDATE());






	
CREATE TABLE `Score`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Score` INT NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Score (Score, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES (10, 1, 'Some comment', SYSDATE(), SYSDATE())
, (20, 1, 'Some comment', SYSDATE(), SYSDATE())
, (30, 1, 'Some comment', SYSDATE(), SYSDATE())
, (40, 1, 'Some comment', SYSDATE(), SYSDATE())
, (50, 1, 'Some comment', SYSDATE(), SYSDATE());







CREATE TABLE `Role`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Naam` VARCHAR(255) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Role (Naam, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES ('Gast', 1, 'Some comment', SYSDATE(), SYSDATE())
, ('Klant', 1, 'Some comment', SYSDATE(), SYSDATE())
, ('Medewerker', 1, 'Some comment', SYSDATE(), SYSDATE());







CREATE TABLE `User`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `PersoonId` INT UNSIGNED NOT NULL,
    `Gebruikernaam` VARCHAR(255) NOT NULL,
    `Wachtwoord` VARCHAR(255) NOT NULL,
    `DatumIngelogd` DATE NOT NULL,
    `DatumUitgelogd` DATE NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
	,FOREIGN KEY(`PersoonId`) REFERENCES `Persoon`(`Id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	
INSERT INTO `User` (`PersoonId`, `Gebruikernaam`, `Wachtwoord`, `DatumIngelogd`, `DatumUitgelogd`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) 
VALUES (1, 'johndoe', 'mypassword1', '2023-03-28', '2023-03-28', 1, 'Some comment', SYSDATE(), SYSDATE())
, (2, 'Nikob', 'mypassword2', '2023-03-28', '2023-03-28', 1, 'Some comment', SYSDATE(), SYSDATE())
, (3, 'Milanc', 'mypassword3', '2023-03-28', '2023-03-28', 1, 'Some comment', SYSDATE(), SYSDATE())
, (4, 'Lazarz', 'mypassword4', '2023-03-28', '2023-03-28', 1, 'Some comment', SYSDATE(), SYSDATE())
, (5, 'Saadb', 'mypassword5', '2023-03-28', '2023-03-28', 1, 'Some comment', SYSDATE(), SYSDATE());
	
	




	
CREATE TABLE `Contact`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `PersoonId` INT UNSIGNED NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `Mobile` INT NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
	,FOREIGN KEY(`PersoonId`) REFERENCES `Persoon`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Contact`(`PersoonId`, `Email`, `Mobile`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 'johndoe@example.com', 1234567890, 1, 'Example comment', SYSDATE(), SYSDATE())
, (2, '333731@student.mboutrecht.com', 1234567899, 1, 'Example comment', SYSDATE(), SYSDATE())
, (3, '328556@student.mboutrecht.com', 1234567888, 1, 'Example comment', SYSDATE(), SYSDATE())
, (4, '333795@student.mboutrecht.com', 1234567888, 1, 'Example comment', SYSDATE(), SYSDATE())
, (5, '332556@student.mboutrecht.com', 1234567888, 1, 'Example comment', SYSDATE(), SYSDATE());







CREATE TABLE `Openingstijd`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `TariefId` INT UNSIGNED NOT NULL,
    `DagNaam` VARCHAR(255) NOT NULL,
    `BeginTijd` TIME NOT NULL,
    `EindTijd` TIME NOT NULL,
    `IsActief` INT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
	,FOREIGN KEY(`TariefId`) REFERENCES `Tarief`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Openingstijd` (`TariefId`, `DagNaam`, `BeginTijd`, `EindTijd`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 'Monday', '14:00:00', '22:00:00', 1, 'Open on weekdays', SYSDATE(), SYSDATE()),
(1, 'Tuesday', '14:00:00', '22:00:00', 1, 'Open on weekdays', SYSDATE(), SYSDATE()),
(1, 'Wednesday', '14:00:00', '22:00:00', 1, 'Open on weekdays', SYSDATE(), SYSDATE()),
(1, 'Thursday', '14:00:00', '22:00:00', 1, 'Open on weekdays', SYSDATE(), SYSDATE()),
(2, 'Friday', '14:00:00', '18:00:00', 1, 'Open on weekdays', SYSDATE(), SYSDATE()),
(3, 'Friday', '18:00:00', '24:00:00', 1, 'Open on weekdays', SYSDATE(), SYSDATE()),
(2, 'Saturday', '14:00:00', '18:00:00', 1, 'Open on weekends', SYSDATE(), SYSDATE()),
(3, 'Saturday', '18:00:00', '24:00:00', 1, 'Open on weekends', SYSDATE(), SYSDATE()),
(2, 'Sunday', '14:00:00', '18:00:00', 1, 'Open on weekends', SYSDATE(), SYSDATE()),
(3, 'Sunday', '18:00:00', '24:00:00', 1, 'Open on weekends', SYSDATE(), SYSDATE());







CREATE TABLE `UserPerRole`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `UserId` INT UNSIGNED NOT NULL,
    `RoleId` INT UNSIGNED NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
	,FOREIGN KEY(`UserId`) REFERENCES `User`(`Id`)
	,FOREIGN KEY(`RoleId`) REFERENCES `Role`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `UserPerRole` (`UserId`, `RoleId`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 1, 1, 'Guest User', SYSDATE(), SYSDATE()),
(2, 2, 1, 'Customer', SYSDATE(), SYSDATE()),
(3, 2, 1, 'Customer', SYSDATE(), SYSDATE()),
(4, 2, 1, 'Customer', SYSDATE(), SYSDATE()),
(5, 3, 1, 'Worker', SYSDATE(), SYSDATE());







CREATE TABLE `Reservering`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `PersoonId` INT UNSIGNED NOT NULL,
    `OpeningstijdId` INT UNSIGNED NOT NULL,
    `BaanId` INT UNSIGNED NOT NULL,
    `AantalKinderen` INT NOT NULL,
	`AantalVolwassenen` INT NOT NULL,
    `Datum` DATE NOT NULL,
    `Tijd` TIME NOT NULL,
	`Status` VARCHAR(20) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
	,FOREIGN KEY(`PersoonId`) REFERENCES `Persoon`(`Id`)
	,FOREIGN KEY(`OpeningstijdId`) REFERENCES `Openingstijd`(`Id`)
	,FOREIGN KEY(`BaanId`) REFERENCES `Baan`(`Id`)
	,FOREIGN KEY(`OpeningstijdId`) REFERENCES `Openingstijd`(`Id`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Reservering`(`PersoonId`, `OpeningstijdId`, `BaanId`, `AantalKinderen`, `AantalVolwassenen`, `Datum`, `Tijd`, `Status`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 1, 3, 2, 3, '2023-04-01', '14:00:00', 'Gereserveerd', 1, 'Test', SYSDATE(), SYSDATE()),
(2, 2, 2, 2, 4, '2023-04-01', '14:00:00', 'Gereserveerd', 1, 'Test', SYSDATE(), SYSDATE()),
(3, 3, 1, 0, 4, '2023-04-01', '19:00:00', 'Geannuleerd', 1, 'Test', SYSDATE(), SYSDATE()),
(4, 3, 6, 0, 2, '2023-04-01', '20:00:00', 'Bezig', 1, 'Test', SYSDATE(), SYSDATE()),
(5, 2, 8, 2, 2, '2023-04-01', '14:00:00', 'Gereserveerd', 1, 'Test', SYSDATE(), SYSDATE());







CREATE TABLE `ScorePerPersoon`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `PersoonId` INT UNSIGNED NOT NULL,
    `ReserveringId` INT UNSIGNED NOT NULL,
    `ScoreId` INT UNSIGNED NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
	,FOREIGN KEY(`PersoonId`) REFERENCES `Persoon`(`Id`)
	,FOREIGN KEY(`ReserveringId`) REFERENCES `Reservering`(`Id`)
	,FOREIGN KEY(`ScoreId`) REFERENCES `Score`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ScorePerPersoon` (`PersoonId`, `ReserveringId`, `ScoreId`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 1, 2, 1, 'Opmerking voor deze score', SYSDATE(), SYSDATE()),
(2, 2, 3, 1, 'Opmerking voor deze score', SYSDATE(), SYSDATE()),
(3, 3, 5, 1, 'Opmerking voor deze score', SYSDATE(), SYSDATE()),
(4, 4, 4, 1, 'Opmerking voor deze score', SYSDATE(), SYSDATE()),
(5, 5, 1, 1, 'YOU SUCK!!!!', SYSDATE(), SYSDATE());







CREATE TABLE `PakketPerReservering`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `PakkettenId` INT UNSIGNED NOT NULL,
    `ReserveringId` INT UNSIGNED NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
	,FOREIGN KEY(`PakkettenId`) REFERENCES `Pakketten`(`Id`)
	,FOREIGN KEY(`ReserveringId`) REFERENCES `Reservering`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `PakketPerReservering` (`PakkettenId`, `ReserveringId`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 1, 1, 'Opmerking 1', SYSDATE(), SYSDATE()),
       (2, 2, 1, 'Opmerking 2', SYSDATE(), SYSDATE()),
       (3, 3, 1, 'Opmerking 3', SYSDATE(), SYSDATE()),
	   (2, 4, 1, 'Opmerking 4', SYSDATE(), SYSDATE()),
	   (1, 5, 1, 'Opmerking 5', SYSDATE(), SYSDATE());


