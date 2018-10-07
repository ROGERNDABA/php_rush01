
CREATE TABLE IF NOT EXISTS `rush00` (
  `username` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar (32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(32) NOT NULL,
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sex ENUM('1', '0') NOT NULL
) ENGINE=InnoDB CHARSET=utf8;