drop database if exists Lab08_002;
create database Lab08_002;
use Lab08_002;

create table user (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	password VARCHAR(250),
	email VARCHAR(50),
	full_name VARCHAR(50),	
	avatar_name VARCHAR(50),
	affiliation VARCHAR(20),		
	guild_name VARCHAR(50),
	picture VARCHAR(15)
) Engine=InnoDB;

