-- criando database
CREATE DATABASE users;
use users;

-- criando tabela de usuários
CREATE TABLE users (
    id int primary key auto_increment not null,
    name varchar(255) not null,
    birthdate date not null,
    cpf varchar(15) not null,
    gender varchar(30) not null,
    city varchar(155),
    neighborhood varchar(155),
    street varchar(155),
    house_number varchar(5),
    complement varchar(15));
    
-- populando tabela de usuários
INSERT INTO users (name, birthdate, cpf, gender, city, neighborhood, street, house_number, complement) 
VALUES ('Fulano Santos', '1992-07-08', '111.222.333-44', 'Feminino', 'Salvador', 'Barra', 'Rua E', '567', NULL);

INSERT INTO users (name, birthdate, cpf, gender, city, neighborhood, street, house_number, complement) 
VALUES ('Beltrano Oliveira', '1980-04-20', '444.555.666-77', 'Masculino', 'Brasília', 'Asa Sul', 'Quadra F', '321', 'Apto 301');

INSERT INTO users (name, birthdate, cpf, gender, city, neighborhood, street, house_number, complement) 
VALUES ('Sicrano Costa', '1998-12-15', '777.888.999-00', 'Feminino', 'Fortaleza', 'Meireles', 'Avenida G', '876', NULL);

INSERT INTO users (name, birthdate, cpf, gender, city, neighborhood, street, house_number, complement) 
VALUES ('João Silva', '1990-05-15', '123.456.789-10', 'Masculino', 'São Paulo', 'Centro', 'Rua A', '123', 'Ap 101');

INSERT INTO users (name, birthdate, cpf, gender, city, neighborhood, street, house_number, complement) 
VALUES ('Maria Souza', '1985-10-20', '987.654.321-00', 'Feminino', 'Rio de Janeiro', 'Copacabana', 'Avenida B', '456', 'Casa 2');

INSERT INTO users (name, birthdate, cpf, gender, city, neighborhood, street, house_number, complement) 
VALUES ('Carlos Ferreira', '1978-12-30', '222.333.444-55', 'Masculino', 'Belo Horizonte', 'Barro Preto', 'Rua C', '789', NULL);

INSERT INTO users (name, birthdate, cpf, gender, city, neighborhood, street, house_number, complement) 
VALUES ('Ana Oliveira', '1995-08-25', '555.666.777-88', 'Feminino', 'Porto Alegre', 'Centro', 'Avenida D', '987', 'Fundos');

INSERT INTO users (name, birthdate, cpf, gender, city, neighborhood, street, house_number, complement) 
VALUES ('Fulano', '1990-05-15', '123.456.789-00', 'Masculino', 'São Paulo', 'Centro', 'Rua A', '100', 'Apto 101');

-- criando tabela de protocolos
CREATE TABLE protocols(
	id int primary key auto_increment not null,
    description text not null,
    createdAt datetime not null,
    deadline date not null,
    user_id int not null,
    foreign key(user_id) references users(id));

-- populando tabela de protocolos
INSERT INTO protocols (description, createdAt, deadline, user_id) 
VALUES ('Análise de documentação fiscal', '2023-12-18 10:00:00', '2024-01-15', 4);

INSERT INTO protocols (description, createdAt, deadline, user_id) 
VALUES ('Agendamento de reunião para esclarecimentos', '2023-12-20 14:30:00', '2024-02-05', 4);

INSERT INTO protocols (description, createdAt, deadline, user_id) 
VALUES ('Solicitação de revisão de impostos', '2023-12-22 09:45:00', '2024-01-30', 7);

INSERT INTO protocols (description, createdAt, deadline, user_id) 
VALUES ('Pedido de prorrogação para envio de documentos', '2023-12-25 11:20:00', '2024-02-10', 6);

INSERT INTO protocols (description, createdAt, deadline, user_id)
VALUES ('Descrição do Protocolo', '2023-01-01 10:00:00', '2023-02-01', 8);

SELECT users.id, users.name, users.cpf, users.id AS users_id, protocols.description
FROM users LEFT JOIN protocols ON users.id = protocols.user_id;

select * from users;

select * from protocols;