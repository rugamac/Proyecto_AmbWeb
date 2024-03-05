create DATABASE proyectoSQL;
use proyectoSQL;

create table usuario
(
    id_usuario INT AUTO_INCREMENT NOT NULL, 
    nombre VARCHAR(50) NOT NULL,
    primer_apellido VARCHAR(50) NOT NULL,
    segundo_apellido VARCHAR(50) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    tipo_suscripcion VARCHAR(50) NOT NULL,--"ninguno" por defecto al crear cuenta, solo lo cambia la admin. (el usuario no inserta dato)
    fecha_creacion_cuenta DATE NOT NULL,--sistema obtiene automaticamente al crear cuenta con variable tipo fecha
    password VARCHAR(255),
    PRIMARY KEY(id_usuario)
);

create table detalles_usuario
(
    id_detalle INT AUTO_INCREMENT NOT NULL, 
    fecha_nacimiento DATE NOT NULL,
    altura_persona FLOAT(10) NOT NULL,
    peso_persona FLOAT(10) NOT NULL,
    lesiones VARCHAR(50) NOT NULL,
    medicamentos VARCHAR(100) NOT NULL,
    embarazo VARCHAR(50) NOT NULL,
    cirujia VARCHAR(200) NOT NULL,
    objetivos TEXT NOT NULL,
    id_usuario int(5),
    PRIMARY KEY(id_detalle),
    FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario)
);

-- Crear la tabla "rutinas"         --una rutina puede tener varios ejercicios
CREATE TABLE IF NOT EXISTS rutina (
    id_rutina INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rutina VARCHAR(50) NOT NULL,
    fecha_rutina DATE NOT NULL,
    hora_rutina TIME NOT NULL,
    descripcion_rutina TEXT,
    id_usuario int(5),
    PRIMARY KEY(id_rutina),
    foreign key(id_usuario) references usuario(id_usuario)
);

--crea tabla ejercicio               --muchos ejercicios pertenecen a una rutina
CREATE TABLE IF NOT EXISTS ejercicio (
    id_ejercicio INT AUTO_INCREMENT,
    nombre_ejercicio VARCHAR(100) NOT NULL,
    series VARCHAR(50) NOT NULL,
    repeticiones VARCHAR(50) NOT NULL,
    peso VARCHAR(30) NOT NULL,
    intensidad VARCHAR(50) NOT NULL,
    ejercicio_sets VARCHAR(50) NOT NULL,
    tempos VARCHAR(50) NOT NULL,
    descanso VARCHAR(50) NOT NULL,
    observaciones TEXT,
    id_rutina int(5),
    PRIMARY KEY(id_ejercicio),
    foreign key(id_rutina) references rutina(id_rutina) 
);


-- Crear la tabla checkIn (fotos de progreso mensual)
CREATE TABLE IF NOT EXISTS check_in (
    id_check INT AUTO_INCREMENT NOT NULL,
    mes VARCHAR(50) NOT NULL,                               --un mes contiene varias fotos
    anno DATE NOT NULL,                                              --un año contiene varios meses con sus respectivas fotos
    nota_mensual TEXT NOT NULL,
    id_usuario int(5),
    PRIMARY KEY(id_check),
    foreign key(id_usuario) references usuario(id_usuario) 
);

-- Crear la tabla fotos (foto vinculado a un mes especifico) --varias fotos se guardan en un check-in (mes y año especifico)
CREATE TABLE IF NOT EXISTS fotos (
    id_foto INT AUTO_INCREMENT NOT NULL,
    ruta_foto VARCHAR (200),                                 
    id_check int(5),
    PRIMARY KEY(id_foto),
    foreign key(id_check) references check_in(id_check) 
);











-- generado con la herramienta grafica

CREATE TABLE `Gimnasio`.`prueba` 
(`id` INT(11) NOT NULL AUTO_INCREMENT , 
`nombre` VARCHAR(50) NOT NULL , 
`correo` VARCHAR(50) NOT NULL , 
`telefono` VARCHAR(50) NOT NULL , 
`password` VARCHAR(255) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;