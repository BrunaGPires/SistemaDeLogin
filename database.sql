-- criando database
CREATE DATABASE user;
USE user;

-- criando tabela de usuário
CREATE TABLE users (
	id int primary key auto_increment not null,
    name varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null);
    
