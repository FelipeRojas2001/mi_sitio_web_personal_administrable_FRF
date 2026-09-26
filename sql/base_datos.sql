CREATE DATABASE IF NOT EXISTS mi_web_personal
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE mi_web_personal;

CREATE TABLE IF NOT EXISTS perfil_inicio(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_completo VARCHAR(150) NOT NULL,
    fotografia_de_perfil VARCHAR(255) NOT NULL,
    descripcion_personal TEXT NOT NULL,
    presentacion_corta TEXT NOT NULL
);



INSERT INTO perfil_inicio (nombre_completo, fotografia_de_perfil, descripcion_personal, presentacion_corta) VALUES
(
    'Luis Felipe Rojas Fallas',
    'assets/fotografia_perfil.jpg',
    'Soy un estudiante de Ingeniería en Sistemas apasionado por la tecnología.',
    'Bienvenido a mi sitio web personal.'
);

CREATE TABLE IF NOT EXISTS acerca_de_mi(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    descripcion_amplia TEXT NOT NULL,
    intereses TEXT NOT NULL,
    habilidades TEXT NOT NULL,
    experiencia_conocimientos TEXT NOT NULL
);

INSERT INTO acerca_de_mi (descripcion_amplia, intereses, habilidades, experiencia_conocimientos) VALUES
(
    'Soy un desarrollador con experiencia en diversas tecnologías. Me encanta aprender y aplicar nuevas herramientas para mi desarrollo profesional.',
    'Desarrollo web, Programación, Desarrollo de proyectos en entornos colaborativos',
    'HTML, CSS, JavaScript, PHP, MySQL',
    'He trabajado en varios proyectos por mi cuenta y esforzándome en el desarrollo de soluciones web efectivas.'
);

CREATE TABLE IF NOT EXISTS atestados (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    institucion VARCHAR(150) NOT NULL,
    año INT NOT NULL,
    descripcion TEXT NOT NULL,
    imagen VARCHAR(255) NOT NULL
);

insert into atestados (titulo, institucion, año, descripcion, imagen) values
(
    'Bachillerato en Ingeniería de Sistemas',
    'Universidad Internacional San Isidro Labrador',
    2027,
    'Título obtenido tras completar el programa de bachillerato en Ingeniería de Sistemas.',
    'assets/titulo_uisil.jpg'
);

CREATE TABLE if NOT EXISTS galeria(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    breve_descripcion VARCHAR(255) NOT NULL,
    imagen VARCHAR(255) NOT NULL
);

insert into galeria (breve_descripcion, imagen) values
(
    'Proyecto de desarrollo web personal.',
    'assets/proyecto_web_personal.jpg'
);

CREATE TABLE if NOT EXISTS contacto(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    correo_electronico VARCHAR(100) NOT NULL,
    numero_telefono VARCHAR(20) NOT NULL,
    redes_sociales TEXT NOT NULL,
    direccion_fisica VARCHAR(255) NOT NULL
);

INSERT INTO contacto (correo_electronico, numero_telefono, redes_sociales, direccion_fisica) VALUES
(
    'felipe.rojas.fallas@gmail.com',
    '+506 8649-7630',
    'https://www.linkedin.com/in/luis-felipe-rojas-fallas/',
    'San Isidor de El General, Costa Rica'
);

update perfil_inicio set nombre_completo = 'Luis Felipe Rojas Fallas', fotografia_de_perfil = 'assets/fotografia_perfil.jpg', descripcion_personal = 'Soy un estudiante de Ingeniería en Sistemas apasionado por la tecnología.', presentacion_corta = 'Bienvenido a mi sitio web personal.' where id = 1;