DROP DATABASE tippspiel;
CREATE DATABASE tippspiel;

USE tippspiel;

CREATE TABLE users(
	userID_PS int NOT NULL AUTO_INCREMENT,
	userName varchar(301),
	userPassword varchar(801),
	PRIMARY KEY (userID_PS)
);

INSERT INTO users (username,userPassword) VALUES ('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

CREATE TABLE liga(
	ligaID_PS int NOT NULL AUTO_INCREMENT,
	ligaID int,
	ligaName varchar(301),
	PRIMARY KEY (ligaID_PS)
);


INSERT INTO liga (ligaID,ligaName) VALUES (394, '1. Bundesliga');
INSERT INTO liga (ligaID,ligaName) VALUES (398, 'Premier League');
INSERT INTO liga (ligaID,ligaName) VALUES (399, 'Primera Division');
INSERT INTO liga (ligaID,ligaName) VALUES (402, 'Primeira Liga');