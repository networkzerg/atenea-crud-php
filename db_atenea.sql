create database if not exists atenea;
use atenea;
CREATE TABLE llaves(
                       id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                       rlocal VARCHAR(10) NOT NULL,
                       rexterna VARCHAR(50) NOT NULL,
                       rllavero VARCHAR(4) NOT NULL,
                       PRIMARY KEY(id)
);