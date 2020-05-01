CREATE TABLE accounts.auth (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    token TINYTEXT NOT NULL,
    name TINYTEXT NOT NULL,
    used BIT default 0
);
