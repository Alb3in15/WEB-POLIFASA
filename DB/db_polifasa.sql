create database Db_polifasa;
create table poli_admin (
p_id int Auto_increment Primary key,
 p_nombre varchar(30),
 p_apellido varchar (30),
 p_ciudad varchar (30),
 p_correo varchar (50),
 p_password varchar(10)
)ENGINE=InnoDB;


CREATE TABLE poli_slider (
  imagen_id int(11) AUTO_INCREMENT PRIMARY KEY,
  titulo_img varchar(30),
  imagen mediumblob,
  tipo_imagen varchar(30)
)ENGINE=InnoDB;


create table poli_categoria(
id_categoria int auto_increment primary key,
p_categoria varchar(20)
);
create table productos(
id_productos int auto_increment primary key,
id_categoria int,
pro_nombre varchar (50),
pro_precio decimal (4,2),
pro_desuento int,
pro_nuevo_precio  decimal (4,2),
pro_descripcion varchar (300),
pro_imagen longblob,
foreign key (id_categoria) references poli_categoria(id_categoria)ON UPDATE
CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

drop table poli_slider;
select * from poli_admin;
select * from poli_slider ;
select count(*) from poli_slider;
