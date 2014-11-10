CREATE DATABASE IF NOT EXISTS `legacy_db`;

CREATE TABLE IF NOT EXISTS `legacy_db`.`user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_username` (`username`)
) ENGINE=InnoDB;

INSERT INTO `legacy_db`.`user` SET firstname='Testy',lastname='McTesterson',username='admin',password='admin';
