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
p_categoria varchar(40)
);

create table poli_pro_carac(
cara_id int auto_increment primary key,
id_productos int , 
cara_uno varchar(70),
cara_dos varchar(70),
cara_tres varchar(70),
cara_cuatro varchar(70),
foreign key (id_productos) references poli_productos(id_productos)ON UPDATE
CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

create table poli_productos(
id_productos int auto_increment primary key,
id_categoria int,
pro_nombre varchar (50),
pro_precio decimal (4,2),
pro_desuento int,
pro_disponibilidad varchar(40),
pro_fecha date,
pro_descripcion varchar (300),
pro_imagen longblob,
pro_tipo_imagen varchar(30),
foreign key (id_categoria) references poli_categoria(id_categoria)ON UPDATE
CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

select * from poli_productos where id_categoria = '12';
select * , sum(pro_precio - (pro_precio * (pro_desuento/100))) as PrecioP from poli_productos where id_productos='5';
select * from poli_admin;
select * from poli_categoria;
select * from poli_productos;
select * from poli_slider;
select * from poli_pro_carac;
select count(*) from poli_poductos;

select id_productos, pro_nombre from poli_productos;

SELECT pro.pro_imagen,pro.id_productos,pro.pro_nombre, pro.pro_precio, ROUND(sum(pro_precio - (pro_precio * (pro_desuento/100))),2) as PrecioP, pro.pro_descripcion,de.id_productos, de.cara_uno,de.cara_dos,de.cara_tres,de.cara_cuatro
                                    FROM poli_productos pro 
                                    INNER JOIN poli_pro_carac de  on pro.id_productos = de.id_productos 
                                    WHERE pro.id_productos='12' ;
                                    
                                    
SELECT * , ROUND(sum(pro_precio - (pro_precio * (pro_desuento/100))),2) as PrecioP FROM poli_productos WHERE id_categoria = '12' group by id_productos;


SELECT pro.pro_imagen,pro.id_productos,pro.pro_nombre, pro.pro_precio, pro.pro_desuento,pro.pro_descripcion,sum(pro.pro_precio + 1) as Des, de.id_productos, de.cara_uno,de.cara_dos,de.cara_tres,de.cara_cuatro
                        FROM poli_productos pro
                        INNER JOIN poli_pro_carac de  on pro.id_productos = de.id_productos
                        WHERE pro.id_productos='12';
                        
SELECT cara_id,id_productos FROM poli_pro_carac WHERE cara_id  in (SELECT id_productos FROM poli_productos) !=id_productos;

SELECT id_productos FROM poli_productos WHERE id_productos in (SELECT  id_productos FROM poli_pro_carac) = id_productos ; 

Select id_productos from poli_productos where not exists (select id_productos from poli_pro_carac where id_productos = id_productos);

SELECT id FROM A WHERE id in (SELECT id FROM B) WHERE id = 
IF ()
