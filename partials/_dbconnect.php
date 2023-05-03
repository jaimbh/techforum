<?php
$conn = mysqli_connect('localhost', 'root', '') or die('Connection Failed');

if(mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS techforum')){
	
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `techforum`.`comments` ( `comment_id` INT(8) NOT NULL AUTO_INCREMENT ,  `comment_content` TEXT NOT NULL , `thread_id` INT(8) NOT NULL , `comment_by` VARCHAR(30) NOT NULL , `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`comment_id`)) ENGINE = InnoDB;");
	
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `techforum`.`threads` ( `thread_id` INT(7) NOT NULL AUTO_INCREMENT , `thread_title` VARCHAR(255) NOT NULL , `thread_desc` TEXT NOT NULL , `thread_user` VARCHAR(30) NOT NULL , `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`thread_id`)) ENGINE = InnoDB;");
	
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `techforum`.`users` ( `sno` INT(8) NOT NULL AUTO_INCREMENT , `username` VARCHAR(30) NOT NULL , `user_pass` VARCHAR(255) NOT NULL , `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`)) ENGINE = InnoDB;");
}

$conn = mysqli_connect('localhost', 'root', '', 'techforum');