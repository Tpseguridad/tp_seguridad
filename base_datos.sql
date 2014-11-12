CREATE SCHEMA IF NOT EXISTS productos;
USE productos;

CREATE TABLE tp1_usuario_rol(
id_rol INT AUTO_INCREMENT NOT NULL, 
nombre_rol VARCHAR (512) NOT NULL,
CONSTRAINT pk_rol_id PRIMARY KEY (id_rol));

CREATE TABLE tp1_usuario (
id_usuario INT AUTO_INCREMENT, 
nombre_usuario VARCHAR (32) NOT NULL,
password_us VARCHAR  (32) NOT NULL,
nombre VARCHAR  (128) NOT NULL,
apellido VARCHAR  (128) NOT NULL,
email VARCHAR  (128) NOT NULL,
usuario_rol INT NOT NULL,
session_us VARCHAR(64) DEFAULT NULL,
CONSTRAINT pk_usuario_id PRIMARY KEY (id_usuario),
CONSTRAINT uc_usuario_unico UNIQUE (nombre_usuario),
CONSTRAINT fk_rol FOREIGN KEY (usuario_rol)
REFERENCES tp1_usuario_rol(id_rol)
);

CREATE TABLE tp1_producto(
id_producto INT AUTO_INCREMENT NOT NULL, 
nombre_producto VARCHAR (512) NOT NULL,
descripcion VARCHAR  (4096) NOT NULL,
CONSTRAINT pk_producto_id PRIMARY KEY (id_producto),
CONSTRAINT uc_producto_unico UNIQUE (nombre_producto));

CREATE TABLE tp1_precio_producto_usuario(
id_ppu INT AUTO_INCREMENT NOT NULL,
id_prod INT NOT NULL, 
id_us INT NOT NULL,
semana INT NOT NULL,
precio NUMERIC (10,2) NOT NULL,
CONSTRAINT pk_ppu_id PRIMARY KEY (id_ppu),
CONSTRAINT fk_usuario FOREIGN KEY (id_us)
REFERENCES tp1_usuario(id_usuario),
CONSTRAINT fk_producto FOREIGN KEY (id_prod)
REFERENCES tp1_producto(id_producto)
ON DELETE CASCADE,
CONSTRAINT nro_semana CHECK (semana>0 AND semana <54),
CONSTRAINT precio_invalido CHECK (precio>0)
);

CREATE TABLE tp1_comentario_usuario_producto(
id_comentario_producto INT AUTO_INCREMENT NOT NULL,
id_produ INT NOT NULL, 
id_usu INT,
titulo VARCHAR (128) NOT NULL,
comentario VARCHAR (4096) NOT NULL,
CONSTRAINT pk_comen_id PRIMARY KEY (id_comentario_producto),
CONSTRAINT fk_us FOREIGN KEY (id_usu)
REFERENCES tp1_usuario(id_usuario),
CONSTRAINT fk_prod FOREIGN KEY (id_produ)
REFERENCES tp1_producto(id_producto) 
ON DELETE CASCADE
);

CREATE VIEW tp1_resultado_semana_producto AS
SELECT ppu.id_prod, ppu.semana, ROUND(AVG(ppu.precio), 2) AS "promedio", 
MIN(ppu.precio) AS "minimo", 
MAX(ppu.precio) AS "maximo" 
FROM tp1_precio_producto_usuario ppu 
GROUP BY ppu.id_prod, ppu.semana;

INSERT INTO tp1_usuario_rol VALUES (1, 'usuario');
INSERT INTO tp1_usuario_rol VALUES (2, 'administrador');

INSERT INTO tp1_usuario VALUES
(1, 'Elandy2009', 'afdd0b4ad2ec172c586e2150770fbf9e', 'Andres', 'Malagreca', 'leandroandres1@gmail.com', 2, NULL),
(7, 'dami', 'af6e569de5191f08f82c748b76f44b33', 'Damian', 'Berruezo', 'asd@asd.com', 2, NULL), --Password: Dami2014
(8, 'Arosenthal', '1983de1e6a15361566ca1aa6739c214e', 'Alicia', 'Rosenthal', 'aliciarosenthal@gmail.com', 1, NULL),
(9, 'Celes', '8ae1879c95d4afeabbf25270e690f239', 'Celeste', 'Coopa', 'celeste.coopa@gmail.com', 1, NULL);

INSERT INTO tp1_producto VALUES
(1, 'Ultramanguera', 'Ultramanguera, la mejor manguera del mercadof'),
(2, 'Cafe', 'La morenitasd'),
(9, 'Agua Mineral', 'Bon Aqua');


INSERT INTO tp1_precio_producto_usuario VALUES
(1, 1, 1, 1, '10.02'),
(2, 1, 1, 1, '20.00'),
(9, 1, 1, 45, '8475.00'),
(10, 2, 1, 45, '353.00'),
(11, 1, 1, 46, '5000.00'),
(12, 2, 1, 46, '5.00'),
(13, 1, 8, 46, '350.00'),
(14, 2, 8, 46, '21.00'),
(15, 9, 1, 46, '10.00'),
(16, 9, 8, 46, '8.00');

INSERT INTO tp1_comentario_usuario_producto  VALUES
(7, 1, 8, 'Que caro!', 'No sabia que habia aumentado tanto esto!'),
(8, 2, 8, 'Donde lo compraste?', 'Me encantaria conseguirlo a ese precio, me pasas el dato?'),
(9, 2, NULL, 're: Donde lo compraste?', 'En la tienda de Alcorta y Varela, la vas a reconocer porque tiene cafes en la vidriera.'),
(10, 9, 7, 'Consulta cantidad', 'De cuanto seria el agua? Una botella chica?');