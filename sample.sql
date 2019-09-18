drop DATABASE onlineshopdb;
CREATE DATABASE onlineshopdb;
use onlineshopdb;
CREATE TABLE users(
    userid mediumint(6) UNSIGNED NOT NULL,
    first_name varchar(30) NOT NULL,
    last_name varchar(40) NOT NULL,
    email varchar(60) NOT NULL,
    password char(60) NOT NULL,
    registration_date datetime NOT NULL,
    user_level tinyint(1) NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=utf8;
ALTER TABLE users ADD PRIMARY KEY (userid);
ALTER TABLE users MODIFY userid mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT =100;
ALTER TABLE `users` ADD UNIQUE(email);

INSERT INTO users values ('admin','admin','admin@gmail.com','$2y$10$CK.L0C42hzlvRxKYqOYoHO6Ojzbrk8pKb2yBtkZuBhJHOYfF/owPq',now(),1,1);