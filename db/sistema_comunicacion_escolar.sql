-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-011-2023 a las 14:44:14
-- Versión del servidor: 2.4
-- Versión de PHP: 8.0.26
--
-- Base de datos: `db_school`
--
CREATE DATABASE `sistema_comunicacion_escolar`
/*!40100 COLLATE 'utf8_general_ci' */
;

USE `sistema_comunicacion_escolar`;

--
-- Estructura de tabla `semestres`
--
CREATE TABLE `semestres` (
    `ID_SEMESTRES` INT(10) NOT NULL AUTO_INCREMENT,
    `VALOR` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
    `DESCRIPCION` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
    `RUTA_CONTENEDOR` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    PRIMARY KEY (`ID_SEMESTRES`) USING BTREE,
    INDEX `ID_SEMESTRES` (`ID_SEMESTRES`) USING BTREE
) COLLATE = 'utf8_general_ci' ENGINE = InnoDB AUTO_INCREMENT = 1;

--
-- Estructura de tabla `administradores`
--
CREATE TABLE `administradores` (
    `ID_ADMINISTRADORES` INT(10) NOT NULL AUTO_INCREMENT,
    `NOMBRE` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `CORREO` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `PASSWORD` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    PRIMARY KEY (`ID_ADMINISTRADORES`) USING BTREE,
    INDEX `ID_ADMINISTRADORES` (`ID_ADMINISTRADORES`) USING BTREE
) COLLATE = 'utf8_general_ci' ENGINE = InnoDB AUTO_INCREMENT = 1;

--
-- Estructura de tabla `alumnos`
--
CREATE TABLE `alumnos` (
    `ID_ALUMNOS` INT(10) NOT NULL AUTO_INCREMENT,
    `NOMBRE` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `APELLIDOS` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `CORREO` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `PASSWORD` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `SEMESTRE` INT(10) NOT NULL,
    PRIMARY KEY (`ID_ALUMNOS`) USING BTREE,
    INDEX `ID_ALUMNOS` (`ID_ALUMNOS`) USING BTREE,
    INDEX `FK_alumnos_semestres` (`SEMESTRE`) USING BTREE,
    CONSTRAINT `FK_alumnos_semestres` FOREIGN KEY (`SEMESTRE`) REFERENCES `semestres` (`ID_SEMESTRES`) ON UPDATE RESTRICT ON DELETE RESTRICT
) COLLATE = 'utf8_general_ci' ENGINE = InnoDB AUTO_INCREMENT = 1;

--
-- Estructura de tabla `asesores`
--
CREATE TABLE `asesores` (
    `ID_ASESORES` INT(10) NOT NULL AUTO_INCREMENT,
    `NOMBRE` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `APELLIDOS` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `CORREO` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `PASSWORD` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
    `SEMESTRE` INT(10) NOT NULL,
    PRIMARY KEY (`ID_ASESORES`) USING BTREE,
    INDEX `ID_ASESORES` (`ID_ASESORES`) USING BTREE,
    INDEX `FK_asesores_semestres` (`SEMESTRE`) USING BTREE,
    CONSTRAINT `FK_asesores_semestres` FOREIGN KEY (`SEMESTRE`) REFERENCES `semestres` (`ID_SEMESTRES`) ON UPDATE RESTRICT ON DELETE RESTRICT
) COLLATE = 'utf8_general_ci' ENGINE = InnoDB AUTO_INCREMENT = 1;

--
-- Estructura de tabla `avisos`
--
CREATE TABLE `avisos` (
    `ID_AVISOS` INT(10) NOT NULL AUTO_INCREMENT,
    `DESCRIPCION` VARCHAR(500) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
    `FECHA_INICIO` DATE NOT NULL,
    `FECHA_FIN` DATE NOT NULL,
    `ACTIVO` TINYINT(3) NOT NULL DEFAULT '1',
    `ESTATUS` TINYINT(3) NOT NULL DEFAULT '1',
    `RUTA` VARCHAR(500) NOT NULL COLLATE 'utf8_general_ci',
    `SEMESTRE` INT(10) NOT NULL,
    PRIMARY KEY (`ID_AVISOS`) USING BTREE,
    INDEX `ID_AVISOS` (`ID_AVISOS`) USING BTREE,
    INDEX `FK_avisos_semestres` (`SEMESTRE`) USING BTREE,
    CONSTRAINT `FK_avisos_semestres` FOREIGN KEY (`SEMESTRE`) REFERENCES `semestres` (`ID_SEMESTRES`) ON UPDATE RESTRICT ON DELETE RESTRICT
) COLLATE = 'utf8_general_ci' ENGINE = InnoDB;

-- --------------------------------------------------------------------------
--
-- Volcado de datos para la tabla `semestres`
--
INSERT INTO
    `sistema_comunicacion_escolar`.`semestres` (`VALOR`, `RUTA_CONTENEDOR`)
VALUES
    ('1er y 2do Semestre', '../../avisos/semestres_1_2');

INSERT INTO
    `sistema_comunicacion_escolar`.`semestres` (`VALOR`, `RUTA_CONTENEDOR`)
VALUES
    ('3er y 4to Semestre', '../../avisos/semestres_3_4');

INSERT INTO
    `sistema_comunicacion_escolar`.`semestres` (`VALOR`, `RUTA_CONTENEDOR`)
VALUES
    ('5to y 6to Semestre', '../../avisos/semestres_5_6');

--
-- Volcado de datos para la tabla `administradores`
--
INSERT INTO
    `sistema_comunicacion_escolar`.`administradores` (`NOMBRE`, `CORREO`, `PASSWORD`)
VALUES
    ('admin', 'admin@admin.com', '0192023a7bbd73250516f069df18b500');

--
-- Volcado de datos para la tabla `alumnos`
--
INSERT INTO
    `sistema_comunicacion_escolar`.`alumnos` (`NOMBRE`, `APELLIDOS`, `CORREO`, `PASSWORD`, `SEMESTRE`)
VALUES
    (
        'Juan ',
        'Pérez Cortés',
        'juan@gmail.com',
        '0c82ca5b1092a0c21dcfe3200688046e',
        1
    );

INSERT INTO
    `sistema_comunicacion_escolar`.`alumnos` (`NOMBRE`, `APELLIDOS`, `CORREO`, `PASSWORD`, `SEMESTRE`)
VALUES
    (
        'Pedro ',
        'Sánchez García',
        'pedro@gmail.com',
        '0c82ca5b1092a0c21dcfe3200688046e',
        2
    );

INSERT INTO
    `sistema_comunicacion_escolar`.`alumnos` (`NOMBRE`, `APELLIDOS`, `CORREO`, `PASSWORD`, `SEMESTRE`)
VALUES
    (
        'Pablo ',
        'Huerta Flores',
        'pablo@gmail.com',
        '0c82ca5b1092a0c21dcfe3200688046e',
        3
    );

--
-- Volcado de datos para la tabla `asesores`
--
INSERT INTO
    `sistema_comunicacion_escolar`.`asesores` (`NOMBRE`, `APELLIDOS`, `CORREO`, `PASSWORD`, `SEMESTRE`)
VALUES
    (
        'Tomás',
        'Calderón García',
        'tomas@gmail.com',
        'da113d70eb6bba2b1f007869b773907d',
        1
    );

INSERT INTO
    `sistema_comunicacion_escolar`.`asesores` (
        `NOMBRE`,
        `APELLIDOS`,
        `CORREO`,
        `PASSWORD`,
        `SEMESTRE`
    )
VALUES
    (
        'Saúl',
        'Hernández López',
        'saul@gmail.com',
        'da113d70eb6bba2b1f007869b773907d',
        2
    );

INSERT INTO
    `sistema_comunicacion_escolar`.`asesores` (`NOMBRE`, `APELLIDOS`, `CORREO`, `PASSWORD`, `SEMESTRE`)
VALUES
    (
        'Ivette',
        'Rivera López',
        'ivette@gmail.com',
        'da113d70eb6bba2b1f007869b773907d',
        3
    );

--
-- Volcado de datos para la tabla `avisos`
--
INSERT INTO
    `sistema_comunicacion_escolar`.`avisos` (
        `DESCRIPCION`,
        `FECHA_INICIO`,
        `FECHA_FIN`,
        `ACTIVO`,
        `ESTATUS`,
        `RUTA`,
        `SEMESTRE`
    )
VALUES
    (
        'Aviso UNO',
        '2023-11-05',
        '2023-12-05',
        '1',
        '1',
        'uno.png',
        1
    );

INSERT INTO
    `sistema_comunicacion_escolar`.`avisos` (
        `DESCRIPCION`,
        `FECHA_INICIO`,
        `FECHA_FIN`,
        `ACTIVO`,
        `ESTATUS`,
        `RUTA`,
        `SEMESTRE`
    )
VALUES
    (
        'Aviso DOS',
        '2023-11-05',
        '2023-12-05',
        '1',
        '1',
        'dos.png',
        2
    );

INSERT INTO
    `sistema_comunicacion_escolar`.`avisos` (
        `DESCRIPCION`,
        `FECHA_INICIO`,
        `FECHA_FIN`,
        `ACTIVO`,
        `ESTATUS`,
        `RUTA`,
        `SEMESTRE`
    )
VALUES
    (
        'Aviso TRES',
        '2023-11-05',
        '2023-12-05',
        '1',
        '1',
        'tres.png',
        3
    );