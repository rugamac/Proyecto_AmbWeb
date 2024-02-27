create table usuario
(
    id INT(11) NOT NULL AUTO_INCREMENT, 
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    password VARCHAR(255),
    PRIMARY KEY(id)
);

-- Crear la tabla "rutinas"
CREATE TABLE IF NOT EXISTS rutinas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    nombre_cliente VARCHAR(255),
    fecha DATE,
    hora TIME,
    descripcion TEXT
);

-- generado con la herramienta grafica

CREATE TABLE `Gimnasio`.`prueba` 
(`id` INT(11) NOT NULL AUTO_INCREMENT , 
`nombre` VARCHAR(50) NOT NULL , 
`correo` VARCHAR(50) NOT NULL , 
`telefono` VARCHAR(50) NOT NULL , 
`password` VARCHAR(255) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;