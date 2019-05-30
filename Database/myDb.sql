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



CREATE TABLE Comment(
    post_comment VARCHAR(250),
    postcom INT,
    FOREIGN KEY (postcom) REFERENCES Post(post_id)
);

CREATE TABLE Post(
    post_id SERIAL PRIMARY KEY,
    title VARCHAR(30),
    content VARCHAR(255),
    link VARCHAR(255),
    user_id INT,
    votes INT
);