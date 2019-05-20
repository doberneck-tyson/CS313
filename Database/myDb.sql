CREATE DATABASE Storytime;

CREATE TABLE account(
	account_id SERIAL NOT NULL PRIMARY KEY
);

CREATE TABLE storytimeAdmin(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
); 	

SELECT * FROM storytimeadmin

INSERT INTO storytimeadmin (username, password, display_name)
VALUES ('Tyson', 'password', 'Tyson_D')

CREATE TABLE storytimeUser(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
); 	

CREATE TABLE section(
	section_id SERIAL NOT NULL PRIMARY KEY,
	section_name VARCHAR(80) NOT NULL,
	section_description TEXT NOT NULL
);

CREATE TABLE comment(
	post_comment SERIAL NOT NULL PRIMARY KEY
);

