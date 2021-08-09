create database rapidsubway;
use rapidsubway;

CREATE TABLE USUARIOS(
	CodigoUsuario int not null AUTO_INCREMENT PRIMARY KEY,
	EmailUsuario varchar(30),
	NombreUsuario varchar(15) not null,
	ApellidoUsuario varchar(15) not null,
	ContrasenaUsuario varchar(30) not null,
	DireccionUsuario varchar(50) not null,
	RespuestaUsuario varchar(30) not null
);

INSERT INTO USUARIOS VALUES ('bastian7lete@hotmail.com','Bastian','Letelier','123','Av Herman Ciudad 011', 'vaca');

CREATE TABLE ADMINISTRADORES(
	CodigoAdministrador int not null AUTO_INCREMENT PRIMARY KEY,
	EmailAdministrador varchar(30) PRIMARY KEY,
	NombreAdiministrador varchar(15) not null,
	ApellidoAdministrador varchar(15) not null,
	ContrasenaAdministrador varchar(30) not null,
	RespuestaAdministrador varchar(30) not null
);


INSERT INTO ADMINISTRADORES VALUES ('e.arauco27@gmail.com','Edison','Arauco','321', 'Gato');
INSERT INTO ADMINISTRADORES VALUES ('basti7losa@gmail.com','Bastian','lete7','123', 'burro');
SELECT EmailAdministrador, ContrasenaAdministrador FROM ADMINISTRADORES WHERE EmailAdministrador = 'bayron.beta@gmail.com' AND ContrasenaAdministrador = '654321';

/*
CREATE TABLE sandwich(
cod_sand int(11) PRIMARY KEY,
nom_sand varchar(40),
pre_sand int(4)
);

INSERT INTO sandwich VALUES (1234,'Subway de Pescado','4000');
*/

CREATE TABLE VENTAS(
    cod_ven int not null AUTO_INCREMENT PRIMARY KEY,
    TamCom char(6),
    NomProducto varchar(40),
    NomPan varchar(40),
    NomQue varchar(40),
    NomExt varchar(40),
    NomVeg varchar(40),
    NomSal varchar(40),
    NomBeb varchar(40),
    NomAgu varchar(40),
    NomJug varchar(40),
    Usuario varchar(40)
  );

  INSERT INTO VENTAS VALUES(3,'15 cm.','Sub Pizza','Pan Blanco','Queso Mozzarella','Palta','Lechuga','Mayonesa','Coca - Cola Zero','Ninguno','Ninguno','bayron@gmail.cl');  

create table PRODUCTOS(
CodProducto int (40) not null AUTO_INCREMENT PRIMARY KEY,
NomProducto varchar (40),
PreProducto15 int (5),
PreProducto30 int (5)
);

INSERT INTO PRODUCTOS VALUES(null,'Atun',2500,3500);
INSERT INTO PRODUCTOS VALUES(null,'Jamon de Pavo',2800,3800);
INSERT INTO PRODUCTOS VALUES(null,'Pizza Sub',2200,3200);
INSERT INTO PRODUCTOS VALUES(null,'Jamon de Cerdo',2500,3500);
INSERT INTO PRODUCTOS VALUES(null,'Sub Palta',2000,3000);
INSERT INTO PRODUCTOS VALUES(null,'Italiano BMT',2100,3100);
INSERT INTO PRODUCTOS VALUES(null,'Pelluga de Pollo',2000,3000);
INSERT INTO PRODUCTOS VALUES(null,'Pollo Apanado',2500,3500);
INSERT INTO PRODUCTOS VALUES(null,'Subway Melt',2500,3500);
INSERT INTO PRODUCTOS VALUES(null,'Pollo Teriyaki',2150,3150);
INSERT INTO PRODUCTOS VALUES(null,'Subway Club',2800,3800);
INSERT INTO PRODUCTOS VALUES(null,'Costillas BBQ',2900,3900);
INSERT INTO PRODUCTOS VALUES(null,'Roast Beef',2000,3000);
INSERT INTO PRODUCTOS VALUES(null,'Carne y Queso',1800,2800);
INSERT INTO PRODUCTOS VALUES(null,'Toscano',2100,3100);
INSERT INTO PRODUCTOS VALUES(null,'Trio de Carne',1400,2400);
INSERT INTO PRODUCTOS VALUES(null,'Pollo Jalistico',2400,3400);
INSERT INTO PRODUCTOS VALUES(null,'Gaucho',2000,3000);
INSERT INTO PRODUCTOS VALUES(null,'Texano',2800,3800);

create table PANES(
CodPan int not null AUTO_INCREMENT PRIMARY KEY,
NomPan varchar (40),
EstPan varchar (15)
);

INSERT INTO PANES VALUES(null,'Pan Blanco','Activo');
INSERT INTO PANES VALUES(null,'Pan Integral','Activo');
INSERT INTO PANES VALUES(null,'Pan de Avena','Activo');
INSERT INTO PANES VALUES(null,'Pan de Oregano con Queso parmesano','Activo');

create table QUESOS(
CodQue int not null AUTO_INCREMENT PRIMARY KEY,
NomQue varchar (40),
EstQue varchar (15)
);

INSERT INTO QUESOS VALUES(null,'Queso Mozzarella','Activo');
INSERT INTO QUESOS VALUES(null,'Queso Cheddar','Activo');

  create table EXTRAS(
  CodAdm int not null AUTO_INCREMENT PRIMARY KEY,
  NomExt varchar (40),
  PreExt15 int (5),
  PreExt30 int (5),
  EstExt varchar(15)
  );

  INSERT INTO EXTRAS VALUES(null,'Ninguno',0,0,'Activo');
  INSERT INTO EXTRAS VALUES(null,'Doble Carne',500,1000,'Activo');
  INSERT INTO EXTRAS VALUES(null,'Queso Extra',300,600,'Activo');
  INSERT INTO EXTRAS VALUES(null,'Lamina de Tosino',450,900,'Activo');
  INSERT INTO EXTRAS VALUES(null,'Palta',400,800,'Activo');  

  
  create table VEGETALES(
  CodVeg int not null AUTO_INCREMENT PRIMARY KEY,
  NomVeg varchar (40)
  );

  INSERT INTO VEGETALES VALUES(null,'Lechuga');
  INSERT INTO VEGETALES VALUES(null,'Tomate');
  INSERT INTO VEGETALES VALUES(null,'Pepino');
  INSERT INTO VEGETALES VALUES(null,'Pepinillo');
  INSERT INTO VEGETALES VALUES(null,'Pimenton');
  INSERT INTO VEGETALES VALUES(null,'Aceituna');
  INSERT INTO VEGETALES VALUES(null,'Jalape&#241o');

  create table SALSAS(
  CodSal int not null AUTO_INCREMENT PRIMARY KEY,
  NomSal varchar (40),
  EstSal varchar (15)
  );
  


  INSERT INTO SALSAS VALUES(null,'Mayonesa','Activo');
  INSERT INTO SALSAS VALUES(null,'Ketchup','Activo');
  INSERT INTO SALSAS VALUES(null,'Salsa de Ajo','Activo');
  INSERT INTO SALSAS VALUES(null,'Mostaza','Activo');
  INSERT INTO SALSAS VALUES(null,'Mostaza Dulce','Activo');
  INSERT INTO SALSAS VALUES(null,'Cebolla Dulce','Activo');
  INSERT INTO SALSAS VALUES(null,'Ranch','Activo');
  INSERT INTO SALSAS VALUES(null,'Vinagre','Activo');
  INSERT INTO SALSAS VALUES(null,'Chipotle','Activo');
  INSERT INTO SALSAS VALUES(null,'BBQ','Activo');

  create table BEBIDAS(
  CodBeb int not null AUTO_INCREMENT PRIMARY KEY,
  NomBeb varchar (40),
  PreBeb int (5),
  EstBeb varchar (15)
  );  
  
  INSERT INTO BEBIDAS VALUES(null,'Ninguno',0,'Activo');
  INSERT INTO BEBIDAS VALUES(null,'Coca Cola',1050,'Eliminado');
  INSERT INTO BEBIDAS VALUES(null,'Coca Cola Zero',1050,'Activo');
  INSERT INTO BEBIDAS VALUES(null,'Coca Cola Light',1050,'Activo');
  INSERT INTO BEBIDAS VALUES(null,'Fanta',950,'Activo');
  INSERT INTO BEBIDAS VALUES(null,'Sprite',950,'Activo');

  create table AGUAS(
  CodAgu int not null AUTO_INCREMENT PRIMARY KEY,
  NomAgu varchar (40),
  PreAgu int (5),
  EstAgu varchar (15)
  ); 
  
  select * from aguas;
  
  INSERT INTO AGUAS VALUES(null,'Ninguno',0,'Activo');
  INSERT INTO AGUAS VALUES(null,'Agua Mineral con Gas',750,'Activo');
  INSERT INTO AGUAS VALUES(null,'Agua Mineral sin Gas',650,'Activo');
  

  create table JUGOS(
 CodJug int not null AUTO_INCREMENT PRIMARY KEY,
  NomJug varchar (40),
  PreJug int (5),
  EstJug varchar (15),
  constraint PKCodJugJUGOS Primary Key(CodJug)
  );
  
  INSERT INTO JUGOS VALUES(null,'Ninguno',0,'Activo');
  INSERT INTO JUGOS VALUES(null,'Jugo de Nararanja Andina',850,'Activo');
  INSERT INTO JUGOS VALUES(null,'Jugo de Durazno Andina',850,'Activo');

  CREATE TABLE TAMANOS(
    CodTam varchar(6),
    NomTam varchar(6),
    constraint PK_CodTamTamanos PRIMARY KEY(CodTam)
  );

  INSERT INTO TAMANOS VALUES('15 cm.','15 cm.');
  INSERT INTO TAMANOS VALUES('30 cm.','30 cm.');

  CREATE TABLE COMPRAS(
    CodCom int(6) PRIMARY KEY Auto_Increment,
    TamCom char(6),
    NomProducto varchar(40),
    NomPan varchar(40),
    NomQue varchar(40),
    NomExt varchar(40),
    NomVeg varchar(200),
    NomSal varchar(200),
    NomBeb varchar(40),
    NomAgu varchar(40),
    NomJug varchar(40),
    Usuario varchar(40),
    Estado varchar(10)
  );

INSERT INTO COMPRAS VALUES(3,'15 cm.','Sub Pizza','Pan Blanco','Queso Mozzarella','Palta','Lechuga','Mayonesa','Coca - Cola Zero','Ninguno','Ninguno','bayron@gmail.cl','Listo');


CREATE TABLE HISTORIAL (
    CodCom INT(6) PRIMARY KEY AUTO_INCREMENT,
    TamCom CHAR(6),
    NomProducto VARCHAR(40),
    NomPan VARCHAR(40),
    NomQue VARCHAR(40),
    NomExt VARCHAR(40),
    NomVeg VARCHAR(200),
    NomSal VARCHAR(200),
    NomBeb VARCHAR(40),
    NomAgu VARCHAR(40),
    NomJug VARCHAR(40),
    Usuario VARCHAR(40),
    Estado VARCHAR(10)
);

INSERT INTO HISTORIAL VALUES(31,'30 cm.','Sub Pizza','Pan Blanco','Queso Mozzarella','Palta','Lechuga','Mayonesa','Coca - Cola Zero','Ninguno','Ninguno','bayron@gmail.cl','Listo');

  CREATE TABLE HISTORIAL_ADMIN(
    CodCom int(6) PRIMARY KEY Auto_Increment,
    TamCom char(6),
    NomProducto varchar(40),
    NomPan varchar(40),
    NomQue varchar(40),
    NomExt varchar(40),
    NomVeg varchar(200),
    NomSal varchar(200),
    NomBeb varchar(40),
    NomAgu varchar(40),
    NomJug varchar(40),
    Usuario varchar(40),
    Estado varchar(10)
  );
  
  create table  EMPLEADOS(
	CodEmp int PRIMARY KEY AUTO_INCREMENT,
	NomEmp varchar (50),
	RutEmp varchar (12),
    ConEmp varchar (15),
    CorEmp varchar(50)
  );
  
  /* drop table EMPLEADOS */
  
  insert into EMPLEADOS values (null, 'Pablo Marmol','111-1','123456','p.marmol@gmail.com');
  insert into EMPLEADOS values (null, 'Pedro Picapiedra','222-2','123456','p.picapiedra@gmail.com');
  insert into EMPLEADOS values (null, 'Albus Dumbeldore','333-3','123456','a.dumbeldore@gmail.com');
  
  select * from EMPLEADOS;
  
  select * from administradores;
  
  insert into administradores values ();  
  
  select * from empleados where RutEmp = '111-1';
  
  select * from bebidas;
  
 /* drop database rapidsubway; */
  
 /* select * from usuarios; */
 
 select * from administradores;