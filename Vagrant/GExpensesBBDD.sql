CREATE USER 'gexpensesuser'@'%' IDENTIFIED BY '1234';
GRANT CREATE,ALTER,INSERT,UPDATE,SELECT,DELETE,DROP,REFERENCES, RELOAD  ON * . * TO 'gexpensesuser'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
DROP DATABASE IF EXISTS GExpensesBBDD;
CREATE DATABASE GExpensesBBDD;
USE GExpensesBBDD; 

SET FOREIGN_KEY_CHECKS=0;




DROP TABLE IF EXISTS `activitat`;
CREATE TABLE `activitat` (
  `id_activitat` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `Divisa` char(1) NOT NULL,
  `Fecha` TIMESTAMP ,
  `usuario_id` int(11) ,
  `TipusAct` varchar(50) not null default "Viajes"
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `activitat` (`id_activitat`, `Nombre`, `Descripcion`, `Divisa`,`Fecha`,`usuario_id`,`TipusAct`) VALUES
(1, 'Jugar', 'a cartas', '$', current_timestamp(),666,'Viajes');


DROP TABLE IF EXISTS `invitacio`; 
CREATE TABLE `invitacio` (
  `id_invitacio` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `usuario_id` int(11) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `Token`;
CREATE TABLE `Token` (
  `token` varchar(10) NOT NULL,
  `invitacio_id` int(11)  ,
  `fecha` TIMESTAMP,
  `estado` tinyint (1),
  `EmailInvitacio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL ,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(120) NOT NULL,
  `contrasena` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Estructura de la tabla `pagos`
DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `cantidad` decimal(6, 2) NOT NULL,
  `pagador` varchar(30) NOT NULL,
  `fecha` TIMESTAMP
  
  
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;


DROP TABLE IF EXISTS `reparto`;

CREATE TABLE `reparto` (
  `id_reparto` int(11) not null,
  `members` int(10) NOT NULL,
  `cantidad_pago` decimal(6, 2) NOT NULL,
  `user_member` varchar(100) NOT NULL,
  `importe_repartido` decimal(6, 2) NOT NULL,
  `pago_id` int(11) NOT NULL
  
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;


ALTER TABLE `reparto`
  ADD PRIMARY KEY(`id_reparto`);

  ALTER TABLE `reparto`
  MODIFY `id_reparto` int(11) NOT NULL  AUTO_INCREMENT;



ALTER TABLE `Token`
  ADD PRIMARY KEY (`token`);

ALTER TABLE `activitat`
  ADD PRIMARY KEY (`id_activitat`);

  ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);


ALTER TABLE `invitacio`
  ADD PRIMARY KEY (`id_invitacio`);

ALTER TABLE `activitat`
  MODIFY `id_activitat` int(11) NOT NULL AUTO_INCREMENT;



ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL  AUTO_INCREMENT;


ALTER TABLE `invitacio`

  MODIFY `id_invitacio` int(11) NOT NULL AUTO_INCREMENT;



ALTER TABLE `invitacio`
  ADD CONSTRAINT fk_invitacio_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario);

ALTER TABLE `Token`
  ADD CONSTRAINT fk_Token_invitacio FOREIGN KEY (invitacio_id) REFERENCES invitacio (id_invitacio);


ALTER TABLE `activitat`
   ADD CONSTRAINT fk_activitat_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario);


ALTER TABLE
  `pagos`
ADD
  PRIMARY KEY (`id_pago`);


ALTER TABLE
  `pagos`
MODIFY
  `id_pago` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE
  `reparto`
ADD
  CONSTRAINT fk_reparto_pagos FOREIGN KEY (pago_id) REFERENCES pagos (id_pago);

