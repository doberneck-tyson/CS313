-- noinspection SqlDialectInspectionForFile

-- noinspection SqlNoDataSourceInspectionForFile

CREATE DATABASE StorytimeDB;

CREATE TABLE StorytimeAdmin(
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    display_name VARCHAR(100) NOT NULL
);

CREATE TABLE StorytimeUser(
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    display_name VARCHAR(100) NOT NULL
);

CREATE TABLE Section(
    section_id SERIAL PRIMARY KEY,
    section_name VARCHAR(100) NOT NULL,
    section_description VARCHAR(100) NOT NULL
);
INSERT INTO Section (section_name, section_description) VALUES ('Horror' , 'Post your horror stories here.'),('Fantasy', 'Anything similar to LOTR'),('Non-Fiction', 'Did it happen to you? Tell us about it');
INSERT INTO Section (section_name, section_description) VALUES ('History', 'Anything related to World History you find interesting'),
('Funny','Will it make me LOL? '),('Campfire','Any stores you feel could be told at a campfire');


INSERT INTO Comment (post_comment) VALUES ('THIS IS MY COMMENT');


CREATE TABLE Post(
    post_id SERIAL PRIMARY KEY,
    title VARCHAR(30),
    content VARCHAR(255),
    link VARCHAR(255),
    user_id INT FOREIGN KEY,
    votes INT
    section_id INT,
    FOREIGN KEY (section_id) REFERENCES Section(section_id)
);


CREATE TABLE Comment(
    post_comment VARCHAR(250),
    comment_id INT,
    FOREIGN KEY (comment_id) REFERENCES Post(post_id)
);

INSERT INTO StorytimeAdmin (username,password, display_name) VALUES ('tyson','pass', 'TforTyson');
INSERT INTO StorytimeUser (username,password,display_name) VALUES ('tyson','pass','TforTyson');