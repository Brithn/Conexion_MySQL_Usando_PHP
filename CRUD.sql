CREATE DATABASE crud;
-- drop database ejercicio2
use crud;

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    edad INT
);

CREATE TABLE profesor (
    id INT PRIMARY KEY,
    materia VARCHAR(255) NOT NULL,
    FOREIGN KEY (id) REFERENCES persona(id) ON DELETE CASCADE
);

CREATE TABLE estudiante (
    id INT PRIMARY KEY,
    grado VARCHAR(255) NOT NULL,
    FOREIGN KEY (id) REFERENCES persona(id) ON DELETE CASCADE
);

select * from usuarios;

