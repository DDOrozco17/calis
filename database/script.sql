CREATE DATABASE BD_Papeleria;

use BD_Papeleria;

CREATE TABLE tbl_proveedor(
  id_provedor INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombre_provedor VARCHAR(100) NOT NULL,
  direccion VARCHAR(100),
  telefono INT(11),
  correo_electronico VARCHAR(100),
  producto_principal VARCHAR(100),
  fecha_entrega date,
  total_productos INT(11) 
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESCRIBE tbl_proveedor;
