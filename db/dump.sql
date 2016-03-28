DROP IF EXISTS DATABASE tippspiel;
CREATE DATABASE tippspiel;

USE tippspiel;

CREATE TABLE users(
	userID_PS int NOT NULL AUTO_INCREMENT,
	userName varchar(301),
	userPassword varchar(801),
	PRIMARY KEY (userID_PS)
);

INSERT INTO users (username,userPassword) VALUES ('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

CREATE TABLE games(
	gameID_PS int NOT NULL AUTO_INCREMENT,
	matchday int,
	homelogo varchar(301),
	hometeam varchar(301),
	homegoal int,
	awaygoal int, 
	awayteam varchar(301),
	awaylogo varchar(301),
	PRIMARY KEY (gameID_PS)
);

