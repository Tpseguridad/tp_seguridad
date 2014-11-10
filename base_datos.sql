DROP SCHEMA productos;
CREATE SCHEMA productos;
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
REFERENCES tp1_producto(id_producto),
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
);

-- CREATE VIEW tp1_resultado_semana_producto AS
-- SELECT nombre_producto, semana, AVG(precio) AS "promedio", 
-- MIN(precio) AS "minimo", 
-- MAX(precio) AS "maximo" 
-- FROM tp1_precio_producto_usuario ppu INNER JOIN tp1_producto
-- ON ppu.id_prod = tp1_producto.id_producto
-- GROUP BY ppu.id_prod, ppu.semana;

CREATE VIEW tp1_resultado_semana_producto AS
SELECT ppu.id_prod, ppu.semana, ROUND(AVG(ppu.precio), 2) AS "promedio", 
MIN(ppu.precio) AS "minimo", 
MAX(ppu.precio) AS "maximo" 
FROM tp1_precio_producto_usuario ppu 
GROUP BY ppu.id_prod, ppu.semana;

INSERT INTO tp1_usuario_rol VALUES (1, 'Administrador');
INSERT INTO tp1_usuario_rol VALUES (2, 'Usuario');

INSERT INTO tp1_usuario VALUES (1, 'Elandy2009', 'Aa123456', 'Andrés', 'Malagreca', 'leandroandres1@gmail.com', 1);
INSERT INTO tp1_usuario VALUES (2, 'Celeste1', 'Seguridad2014', 'Celeste', 'Coopa', 'celeste.coopa@gmail.com', 1);
INSERT INTO tp1_usuario VALUES (3, 'aliciarosenthal', 'Alicia2014', 'Alicia', 'Rosenthal', 'aliciarosenthal@gmail.com', 2);
INSERT INTO tp1_usuario VALUES (4, 'Damio', 'Damian2014', 'Damian', 'Berruezo', 'damianb@gmail.com', 2);

INSERT INTO `tp1_producto` VALUES (1, 'Ultramanguera', 'Ultramanguera, la mejor manguera del mercado');
INSERT INTO `tp1_producto` VALUES (2,'Cafe', 'La morenita');
INSERT INTO `tp1_producto` VALUES (3,' Aceite','El aceite de oliva');
INSERT INTO `tp1_producto` VALUES (4,' Pan',' Producto comestible que resulta de hornear ');
INSERT INTO `tp1_producto` VALUES (5,' Helado',' Bonobon corazon');
 
INSERT INTO `tp1_precio_producto_usuario` VALUES (1,1,1,1,10.02);
INSERT INTO `tp1_precio_producto_usuario` VALUES (3,1,1,2,11.50);
INSERT INTO `tp1_precio_producto_usuario` VALUES (4,1,1,3,12.00);
INSERT INTO `tp1_precio_producto_usuario` VALUES (5,1,1,4,12.25);
 
INSERT INTO `tp1_precio_producto_usuario` VALUES (2,1,1,1,20.00);
INSERT INTO `tp1_precio_producto_usuario` VALUES (6,1,2,2,21.50);
INSERT INTO `tp1_precio_producto_usuario` VALUES (7,1,2,3,22.00);
INSERT INTO `tp1_precio_producto_usuario` VALUES (8,1,2,4,23.25);
 
INSERT INTO tp1_precio_producto_usuario VALUES (9,2,1,1,10);
INSERT INTO tp1_precio_producto_usuario VALUES (10,2,1,2,10.50);
INSERT INTO tp1_precio_producto_usuario VALUES (11,2,1,3,11);
INSERT INTO tp1_precio_producto_usuario VALUES (12,2,1,4,11.50);
INSERT INTO tp1_precio_producto_usuario VALUES (13,2,3,1,10.25);
INSERT INTO tp1_precio_producto_usuario VALUES (14,2,3,2,10.50);
INSERT INTO tp1_precio_producto_usuario VALUES (15,2,3,3,11);
INSERT INTO tp1_precio_producto_usuario VALUES (16,2,3,4,11.25);

