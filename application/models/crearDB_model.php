<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Creardb_model extends CI_Model {
	
	function __construct(){
		parent:: __construct();
	}
	function crearDB(){

		#$this->load->dbforge();
		#$this->dbforge->create_database('hotel');

		//CREAMOS LAS TABLAS DE LA BASE DE DATOS Y LAS EJECUTAMOS
		$sql2 = "CREATE TABLE cliente (
		  dni varchar(9) NOT NULL,
		  nombre varchar(20) NOT NULL,
		  apellido varchar(40) NOT NULL,
		  correo varchar(40) NOT NULL,
		  telefono varchar(40) NOT NULL,
		  direccion varchar(40) NOT NULL,
		  PRIMARY KEY (dni)
		) ";
		$sql3 = "CREATE TABLE departamento (
		  cod_dpto int(4) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20) NOT NULL,
		  PRIMARY KEY (cod_dpto)
		)";
		$sql4 = "CREATE TABLE puesto (
		  cod_puesto int(4) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20) NOT NULL,
		  descripcion varchar(300) NOT NULL,
		  cod_dpto int(4) NOT NULL,
		  PRIMARY KEY (cod_puesto),
		  FOREIGN KEY (cod_dpto) REFERENCES departamento (cod_dpto) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql5 = "CREATE TABLE empleado (
		  id_empleado int(4) NOT NULL AUTO_INCREMENT,
		  dni varchar(9) NOT NULL,
		  nombre varchar(20) NOT NULL,
		  apellido varchar(40) NOT NULL,
		  password varchar(40) NOT NULL,
		  sueldo float(6,2) NOT NULL,
		  cod_puesto int(4) NOT NULL,
		  PRIMARY KEY (id_empleado),
		  FOREIGN KEY (cod_puesto) REFERENCES puesto (cod_puesto) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql6= "CREATE TABLE email (
		  id_mail int(10) NOT NULL AUTO_INCREMENT,
		  dni varchar(9) NOT NULL,
		  fecha date,
		  asunto varchar(30),
		  contenido varchar(300),
		  PRIMARY KEY (id_mail),
		  FOREIGN KEY (dni) REFERENCES cliente (dni) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql7 = "CREATE TABLE historia (
		  id_historia int(2) NOT NULL AUTO_INCREMENT,
		  contenido varchar(600),
		  foto varchar(40),
		  PRIMARY KEY (id_historia)
		)";
		$sql8 = "CREATE TABLE oferta (
		  id_oferta int(2) NOT NULL AUTO_INCREMENT,
		  fecha_inicio date,
		  fecha_fin date,
		  descuento int,
		  PRIMARY KEY (id_oferta)
		)";
		$sql9 = "CREATE TABLE tipoHabitacion (
		  cod_tipo int(2) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20),
		  descripcion varchar(3000),
		  PRIMARY KEY (cod_tipo)
		)";
		$sql10 = "CREATE TABLE habitacion (
		  num_hab int(3) NOT NULL AUTO_INCREMENT,
		  cod_tipo int(2) NOT NULL,
		  PRIMARY KEY (num_hab),
		  FOREIGN KEY (cod_tipo) REFERENCES tipohabitacion (cod_tipo) ON DELETE CASCADE ON UPDATE CASCADE
		) ";
		$sql11 = "CREATE TABLE temporada (
		  cod_temporada int(2) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  fecha_inicio date,
		  fecha_fin date,
		  PRIMARY KEY (cod_temporada)
		) ";
		$sql12 = "CREATE TABLE regimen (
		  cod_regimen int(2) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  contenido varchar(30) NOT NULL,
		  PRIMARY KEY (cod_regimen)
		) ";
		$sql13 = "CREATE TABLE precio (
		  cod_tipo int(2) NOT NULL,
		  cod_temporada int(2) NOT NULL,
		  cod_regimen int(2) NOT NULL,
		  precio float(6,2) NOT NULL,
		  PRIMARY KEY (cod_tipo,cod_temporada,cod_regimen),
		  FOREIGN KEY (cod_tipo) REFERENCES tipohabitacion (cod_tipo) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (cod_temporada) REFERENCES temporada (cod_temporada) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (cod_regimen) REFERENCES regimen (cod_regimen) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql14= "CREATE TABLE foto (
		  id_foto int(4) NOT NULL AUTO_INCREMENT,
		  foto varchar(50),
		  PRIMARY KEY(id_foto)
		)";
		$sql15= "CREATE TABLE tipoEvento (
		  cod_tipo int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20) NOT NULL,
		  PRIMARY KEY (cod_tipo)
		)";
		$sql16= "CREATE TABLE evento(
		  cod_evento int(3) NOT NULL AUTO_INCREMENT,
		  contenido varchar(300) NOT NULL,
		  cod_tipo int(3) NOT NULL,
		  PRIMARY KEY(cod_evento),
		  FOREIGN KEY (cod_tipo) REFERENCES tipoEvento (cod_tipo) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql17 = "CREATE TABLE reserva (
		  id int(20) NOT NULL AUTO_INCREMENT,
		  num_hab int(3) NOT NULL,
		  dni varchar(9) NOT NULL,
		  fecha_entrada date NOT NULL,
		  fecha_salida date NOT NULL,
		  id_empleado int(4),
		  importe float(15,2) NOT NULL,
		  fianza float(10,2) NOT NULL,
		  pagado varchar(10) NOT NULL default false,
		  PRIMARY KEY (id),
		  FOREIGN KEY (num_hab) REFERENCES habitacion (num_hab) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (dni) REFERENCES cliente (dni) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (id_empleado) REFERENCES empleado (id_empleado) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql18= "CREATE TABLE servicio(
		  cod_servicio int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20),
		  PRIMARY KEY(cod_servicio)
		)";
		$sql19= "CREATE TABLE pista(
		  cod_pista int(3) NOT NULL AUTO_INCREMENT,
		  nombre_pista varchar(30) NOT NULL,
		  descripcion varchar(200) NOT NULL,
		  precio float(6,2) NOT NULL,
		  cod_servicio int NOT NULL,
		  PRIMARY KEY(cod_pista),
		  FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql20= "CREATE TABLE restaurante(
		  cod_comedor int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  aforo int(3) NOT NULL,
		  precio float(6,2) NOT NULL,
		  cod_servicio int(3) NOT NULL,
		  PRIMARY KEY(cod_comedor),
		  FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql21= "CREATE TABLE spa(
		  cod_tipocir int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  aforo int(3) NOT NULL,
		  precio float(6,2) NOT NULL,
		  cod_servicio int(3) NOT NULL,
		  PRIMARY KEY(cod_tipocir),
		  FOREIGN KEY(cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql22= "CREATE TABLE serHab(
		  cod_serHab int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  aforo int(3) NOT NULL,
		  precio float(6,2) NOT NULL,
		  cod_servicio int(3) NOT NULL,
		  PRIMARY KEY(cod_serHab),
		  FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql23= "CREATE TABLE categoria(
		  cod_categoria int(3) NOT NULL AUTO_INCREMENT,
		  precio float(6,2) NOT NULL,
		  PRIMARY KEY(cod_categoria)
		)";
		$sql24= "CREATE TABLE coche (
		  matricula varchar(8) NOT NULL,
		  cod_categoria int(3) NOT NULL,
		  marca varchar(30) NOT NULL,
		  modelo varchar(30) NOT NULL,
		  cod_servicio int(3) NOT NULL,
		  PRIMARY KEY(matricula),
		  FOREIGN KEY (cod_categoria) REFERENCES categoria (cod_categoria) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql25= "CREATE TABLE alquiler (
		   dni varchar(9) NOT NULL,
		   cod_servicio int(3) NOT NULL,
		   codigo_subservicio int(3) NOT NULL,
		   fecha_entrada date NOT NULL,
		   fecha_salida date NOT NULL,
		   hora_entrada time NOT NULL,
		   hora_salida time NOT NULL,
		   PRIMARY KEY(dni,cod_servicio,codigo_subservicio,fecha_entrada,hora_entrada),
		   FOREIGN KEY (dni) REFERENCES cliente (dni) ON DELETE CASCADE ON UPDATE CASCADE,
		   FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";

		if($this->db->query($sql2) and
		$this->db->query($sql3) and
		$this->db->query($sql4) and
		$this->db->query($sql5) and
		$this->db->query($sql6) and
		$this->db->query($sql7) and
		$this->db->query($sql8) and
		$this->db->query($sql9) and
		$this->db->query($sql10) and
		$this->db->query($sql11) and
		$this->db->query($sql12) and
		$this->db->query($sql13) and
		$this->db->query($sql14) and
		$this->db->query($sql15) and
		$this->db->query($sql16) and
		$this->db->query($sql17) and
		$this->db->query($sql18) and
		$this->db->query($sql19) and
		$this->db->query($sql20) and
		$this->db->query($sql21) and
		$this->db->query($sql22) and
		$this->db->query($sql23) and
		$this->db->query($sql24) and
		$this->db->query($sql25)){
			return 'INSTALACION CORRECTA';
		}
		else{
			return 'FALLO EN LA INSTALACION';
		}


	}
}

?>