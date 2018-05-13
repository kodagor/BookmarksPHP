CREATE DATABASE cards;
USE cards;

CREATE TABLE users (
    user_name VARCHAR(16) NOT NULL PRIMARY KEY,
    pass CHAR(16) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE overlaps (
    user_name VARCHAR(16) NOT NULL,
    url_card VARCHAR(255) NOT NULL,
    INDEX (user_name),
    INDEX (url_card),
    PRIMARY KEY (user_name, url_card)
);

GRANT SELECT, INSERT, UPDATE, DELETE
ON cards.*
TO 'user123'@'localhost'
IDENTIFIED BY 'zaq1@WSX';