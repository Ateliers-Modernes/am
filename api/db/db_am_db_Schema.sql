--
-- Database: `am_db`
--

CREATE DATABASE IF NOT EXISTS `am_db`;
USE `am_db`;


-- ENTITIES

--
-- Struttura della tabella `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
	`country` varchar(130) ,
	`email` varchar(130) ,
	`firstName` varchar(130) ,
	`lastName` varchar(130) ,
	`phone` varchar(130) ,
	
	`_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT 

);


--
-- Struttura della tabella `project`
--

CREATE TABLE IF NOT EXISTS `project` (
	`name` varchar(130) ,
	`password` varchar(130) ,
	`server` varchar(130) ,
	`username` varchar(130) ,
	
	`_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT 

);


--
-- Struttura della tabella `user`
--

CREATE TABLE IF NOT EXISTS `user` (
	`email` varchar(130) ,
	`password` varchar(130) ,
	`uid` varchar(130) ,
	`username` varchar(130) ,
	
	`_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT 

);


-- Security

ALTER TABLE `user` MODIFY COLUMN `password` varchar(128)  NOT NULL;

INSERT INTO `am_db`.`user` (`username`, `password`, `_id`) VALUES ('admin', '62f264d7ad826f02a8af714c0a54b197935b717656b80461686d450f7b3abde4c553541515de2052b9af70f710f0cd8a1a2d3f4d60aa72608d71a63a9a93c0f5', 1);

CREATE TABLE IF NOT EXISTS `roles` (
	`role` varchar(30) ,
	
	-- RELAZIONI

	`_user` int(11)  NOT NULL REFERENCES user(_id),
	`_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT 

);
INSERT INTO `am_db`.`roles` (`role`, `_user`, `_id`) VALUES ('ADMIN', '1', 1);





-- relation 1:m user_contacts user - user
ALTER TABLE `user` ADD COLUMN `user_contacts` int(11)  REFERENCES user(_id);

-- relation 1:m user_projects user - project
ALTER TABLE `user` ADD COLUMN `user_projects` int(11)  REFERENCES project(_id);


