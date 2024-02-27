create table estudiante
(
    id INT(11) NOT NULL AUTO_INCREMENT, 
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    password VARCHAR(255),
    PRIMARY KEY(id)
);


-- generado con la herramienta grafica

CREATE TABLE `universidad`.`prueba` 
(`id` INT(11) NOT NULL AUTO_INCREMENT , 
`nombre` VARCHAR(50) NOT NULL , 
`correo` VARCHAR(50) NOT NULL , 
`telefono` VARCHAR(50) NOT NULL , 
`password` VARCHAR(255) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;