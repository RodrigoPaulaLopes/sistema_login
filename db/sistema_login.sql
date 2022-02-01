create database sistema_login;

use sistema_login;

create table usuario(
	id int not null auto_increment primary key,
	name varchar(30),
	email varchar(30),
	password varchar(30),
	type varchar(5),
	status varchar(1)
)