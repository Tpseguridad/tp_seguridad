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
id_usu INT NOT NULL,
titulo VARCHAR (128) NOT NULL,
comentario VARCHAR (4096) NOT NULL,
precio NUMERIC (10,2) NOT NULL,
CONSTRAINT pk_comen_id PRIMARY KEY (id_comentario_producto),
CONSTRAINT fk_us FOREIGN KEY (id_usu)
REFERENCES tp1_usuario(id_usuario),
CONSTRAINT fk_prod FOREIGN KEY (id_produ)
REFERENCES tp1_producto(id_producto)
);

CREATE VIEW tp1_resultado_semana_producto AS
SELECT ppu.id_prod, ppu.semana, AVG(ppu.precio) AS "promedio", 
MIN(ppu.precio) AS "minimo", 
MAX(ppu.precio) AS "maximo" 
FROM tp1_precio_producto_usuario ppu
GROUP BY ppu.id_prod, ppu.semana
;


