<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CrearDB_model extends CI_Model {
	
	function __construct(){
		parent:: __construct();
	}
	function crearDB(){
		$rtdo_final =""; 
		#$this->load->dbforge();
		#$this->dbforge->create_database('hotel');

		//CREAMOS LAS TABLAS DE LA BASE DE DATOS Y LAS EJECUTAMOS
		$sql2 = "CREATE TABLE IF NOT EXISTS cliente (
		  dni varchar(9) NOT NULL,
		  nombre varchar(20) NOT NULL,
		  apellido varchar(40) NOT NULL,
		  correo varchar(40) NOT NULL,
		  telefono varchar(40) NOT NULL,
		  direccion varchar(40) NOT NULL,
		  PRIMARY KEY (dni)
		) ";
		$sql3 = "CREATE TABLE IF NOT EXISTS departamento (
		  cod_dpto int(4) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20) NOT NULL,
		  PRIMARY KEY (cod_dpto)
		)";
		$sql4 = "CREATE TABLE IF NOT EXISTS puesto (
		  cod_puesto int(4) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20) NOT NULL,
		  descripcion varchar(300) NOT NULL,
		  cod_dpto int(4) NOT NULL,
		  PRIMARY KEY (cod_puesto),
		  FOREIGN KEY (cod_dpto) REFERENCES departamento (cod_dpto) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql5 = "CREATE TABLE IF NOT EXISTS empleado (
		  id_empleado int(4) NOT NULL AUTO_INCREMENT,
		  dni varchar(9) NOT NULL,
		  nombre varchar(20) NOT NULL,
		  apellido varchar(40) NOT NULL,
		  password varchar(40),
		  sueldo float(6,2) NOT NULL,
		  cod_puesto int(4) NOT NULL,
		  PRIMARY KEY (id_empleado),
		  FOREIGN KEY (cod_puesto) REFERENCES puesto (cod_puesto) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql6= "CREATE TABLE IF NOT EXISTS email (
		  id_mail int(10) NOT NULL AUTO_INCREMENT,
		  dni varchar(9) NOT NULL,
		  fecha date,
		  asunto varchar(30),
		  contenido varchar(300),
		  PRIMARY KEY (id_mail),
		  FOREIGN KEY (dni) REFERENCES cliente (dni) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql7 = "CREATE TABLE IF NOT EXISTS historia (
		  id_historia int(2) NOT NULL AUTO_INCREMENT,
		  titulo varchar(50) NOT NULL,
		  contenido varchar(600),
		  foto varchar(40),
		  PRIMARY KEY (id_historia)
		)";
		$sql8 = "CREATE TABLE IF NOT EXISTS oferta (
		  id_oferta int(2) NOT NULL AUTO_INCREMENT,
		  fecha_inicio date,
		  fecha_fin date,
		  descuento int,
		  PRIMARY KEY (id_oferta)
		)";
		$sql9 = "CREATE TABLE IF NOT EXISTS tipoHabitacion (
		  cod_tipo int(2) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20),
		  descripcion varchar(3000),
		  PRIMARY KEY (cod_tipo)
		)";
		$sql10 = "CREATE TABLE IF NOT EXISTS habitacion (
		  num_hab int(3) NOT NULL AUTO_INCREMENT,
		  cod_tipo int(2) NOT NULL,
		  PRIMARY KEY (num_hab),
		  FOREIGN KEY (cod_tipo) REFERENCES tipohabitacion (cod_tipo) ON DELETE CASCADE ON UPDATE CASCADE
		) ";
		$sql11 = "CREATE TABLE IF NOT EXISTS temporada (
		  cod_temporada int(2) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  fecha_inicio date,
		  fecha_fin date,
		  PRIMARY KEY (cod_temporada)
		) ";
		$sql12 = "CREATE TABLE IF NOT EXISTS regimen (
		  cod_regimen int(2) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  contenido varchar(120) NOT NULL,
		  PRIMARY KEY (cod_regimen)
		) ";
		$sql13 = "CREATE TABLE IF NOT EXISTS precio (
		  cod_tipo int(2) NOT NULL,
		  cod_temporada int(2) NOT NULL,
		  cod_regimen int(2) NOT NULL,
		  precio float(6,2) NOT NULL,
		  PRIMARY KEY (cod_tipo,cod_temporada,cod_regimen),
		  FOREIGN KEY (cod_tipo) REFERENCES tipohabitacion (cod_tipo) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (cod_temporada) REFERENCES temporada (cod_temporada) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (cod_regimen) REFERENCES regimen (cod_regimen) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql14= "CREATE TABLE IF NOT EXISTS foto (
		  id_foto int(4) NOT NULL AUTO_INCREMENT,
		  foto varchar(50),
		  PRIMARY KEY(id_foto)
		)";
		$sql15= "CREATE TABLE IF NOT EXISTS tipoEvento (
		  cod_tipo int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20) NOT NULL,
		  PRIMARY KEY (cod_tipo)
		)";
		$sql16= "CREATE TABLE IF NOT EXISTS evento(
		  cod_evento int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  contenido varchar(300) NOT NULL,
		  cod_tipo int(3) NOT NULL,
		  PRIMARY KEY(cod_evento),
		  FOREIGN KEY (cod_tipo) REFERENCES tipoEvento (cod_tipo) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql17 = "CREATE TABLE IF NOT EXISTS reserva (
		  id int(20) NOT NULL AUTO_INCREMENT,
		  num_hab int(3) NOT NULL,
		  dni varchar(9) NOT NULL,
		  fecha_entrada date NOT NULL,
		  fecha_salida date NOT NULL,
		  regimen int(2) NOT NULL,
		  id_empleado int(4),
		  importe float(15,2) NOT NULL,
		  fianza float(10,2) NOT NULL,
		  pagado varchar(10) NOT NULL default false,
		  PRIMARY KEY (id),
		  FOREIGN KEY (num_hab) REFERENCES habitacion (num_hab) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (dni) REFERENCES cliente (dni) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (regimen) REFERENCES regimen (cod_regimen) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (id_empleado) REFERENCES empleado (id_empleado) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql18= "CREATE TABLE IF NOT EXISTS servicio(
		  cod_servicio int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(20) NOT NULL,
		  tabla varchar(20) NOT NULL,
		  PRIMARY KEY(cod_servicio)
		)";
		$sql19= "CREATE TABLE IF NOT EXISTS pista(
		  cod_pista int(3) NOT NULL AUTO_INCREMENT,
		  nombre_pista varchar(30) NOT NULL,
		  descripcion varchar(200) NOT NULL,
		  precio float(6,2) NOT NULL,
		  cod_servicio int NOT NULL,
		  PRIMARY KEY(cod_pista),
		  FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql20= "CREATE TABLE IF NOT EXISTS restaurante(
		  cod_comedor int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  aforo int(3) NOT NULL,
		  precio float(6,2) NOT NULL,
		  cod_servicio int(3) NOT NULL,
		  PRIMARY KEY(cod_comedor),
		  FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql21= "CREATE TABLE IF NOT EXISTS spa(
		  cod_tipocir int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  aforo int(3) NOT NULL,
		  precio float(6,2) NOT NULL,
		  cod_servicio int(3) NOT NULL,
		  PRIMARY KEY(cod_tipocir),
		  FOREIGN KEY(cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql22= "CREATE TABLE IF NOT EXISTS serHab(
		  cod_serHab int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(30) NOT NULL,
		  precio float(6,2) NOT NULL,
		  cod_servicio int(3) NOT NULL,
		  PRIMARY KEY(cod_serHab),
		  FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql23= "CREATE TABLE IF NOT EXISTS categoria(
		  cod_categoria int(3) NOT NULL AUTO_INCREMENT,
		  nombre varchar(10) NOT NULL,
		  precio float(6,2) NOT NULL,
		  PRIMARY KEY(cod_categoria)
		)";
		$sql24= "CREATE TABLE IF NOT EXISTS coche (
		  id int(4) NOT NULL AUTO_INCREMENT,
		  matricula varchar(8) NOT NULL,
		  cod_categoria int(3) NOT NULL,
		  marca varchar(30) NOT NULL,
		  modelo varchar(30) NOT NULL,
		  cod_servicio int(3) NOT NULL,
		  PRIMARY KEY(id),
		  FOREIGN KEY (cod_categoria) REFERENCES categoria (cod_categoria) ON DELETE CASCADE ON UPDATE CASCADE,
		  FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio) ON DELETE CASCADE ON UPDATE CASCADE
		)";
		$sql25= "CREATE TABLE IF NOT EXISTS alquiler (
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

		//CREAMOS LAS TABLAS

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
			$rtdo_final .= 'INSTALACION CORRECTA';
		}
		else{
			$rtdo_final .=  'FALLO EN LA INSTALACION';
		}

		/*------------------------------
			INSERTAMOS LOS DATOS
		-------------------------------*/

		//Insertamos los clientes
		#$sql26="INSERT INTO cliente VALUES ('11111111K','Juan Manuel','Perez Gomez','juanma@gmail.com','618912965','C/Lopez de Haro 5')";
		#$this->db->query($sql26);

		$data= array(
			'dni'=>'11111111K',
			'nombre'=>'Juan Manuel',
			'apellido'=>'Perez Gomez',
			'correo'=>'juanma@gmail.com',
			'telefono'=>'618912965',
			'direccion'=>'C/Lopez de Haro 5'
			);
		$this->db->insert('cliente',$data);


		$data= array(
			'dni'=>'22222222M',
			'nombre'=>'Maria',
			'apellido'=>'Sanchez Silva',
			'correo'=>'mari@gmail.com',
			'telefono'=>'622355988',
			'direccion'=>'C/Aperribai 47'
			);
		$this->db->insert('cliente',$data);

		$data= array(
			'dni'=>'33333333S',
			'nombre'=>'Pepe',
			'apellido'=>'Heras Tonta',
			'correo'=>'pep@gmail.com',
			'telefono'=>'634555777',
			'direccion'=>'C/Valencia 7'
			);
		$this->db->insert('cliente',$data);

		$data= array(
			'dni'=>'44444444H',
			'nombre'=>'Maider',
			'apellido'=>'Alvarez Gimenez',
			'correo'=>'mai@gmail.com',
			'telefono'=>'611222333',
			'direccion'=>'C/Basarrate 12'
			);
		$this->db->insert('cliente',$data);

		$data= array(
			'dni'=>'55555555T',
			'nombre'=>'Carlos',
			'apellido'=>'Sanz Vitolo',
			'correo'=>'carlos@gmail.com',
			'telefono'=>'698754215',
			'direccion'=>'C/Manuel Conde 56'
			);
		$this->db->insert('cliente',$data);

		$data= array(
			'dni'=>'66666666P',
			'nombre'=>'Leire',
			'apellido'=>'Galdos Uriarte',
			'correo'=>'leire@gmail.com',
			'telefono'=>'694321578',
			'direccion'=>'C/Gran Via 1'
			);
		$this->db->insert('cliente',$data);
		
		//Insertamos los departamentos
		$data = array(
		   'nombre' => 'Direccion'
		);

		$this->db->insert('departamento', $data); 

		$data = array(
		   'nombre' => 'Administracion'
		);

		$this->db->insert('departamento', $data); 

		$data = array(
		   'nombre' => 'Recepcion'
		);

		$this->db->insert('departamento', $data); 

		$data = array(
		   'nombre' => 'Restauracion'
		);

		$this->db->insert('departamento', $data); 

		$data = array(
		   'nombre' => 'Servicios'
		);

		$this->db->insert('departamento', $data); 

		//Insertamos los puestos de trabajo

		$data = array(
		   'nombre' => 'Director',
		   'descripcion' => 'Dirige al equipo de administración y gestiona el hotel',
		   'cod_dpto' => 1
		);

		$this->db->insert('puesto', $data); 

		$data = array(
		   'nombre' => 'Asesor',
		   'descripcion' => 'Asesora al equipo de administración y al Director',
		   'cod_dpto' => 1
		);

		$this->db->insert('puesto', $data); 

		$data = array(
		   'nombre' => 'Encargado',
		   'descripcion' => 'Coordina al equipo de administración y gestiona las cuentas',
		   'cod_dpto' => 2
		);

		$this->db->insert('puesto', $data); 

		$data = array(
		   'nombre' => 'Administrativo',
		   'descripcion' => 'Administra las transacciones comerciales del hotel',
		   'cod_dpto' => 2
		);

		$this->db->insert('puesto', $data); 

		$data = array(
		   'nombre' => 'Recepcionista',
		   'descripcion' => 'Atiende a los clientes del hotel',
		   'cod_dpto' => 3
		);

		$this->db->insert('puesto', $data); 

		$data = array(
		   'nombre' => 'Mozo',
		   'descripcion' => 'Servicio de habitaciones y funcion de atención al cliente',
		   'cod_dpto' => 3
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Ama de llaves',
		   'descripcion' => 'Gestiona la lavandería',
		   'cod_dpto' => 3
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Cuartelero y limpieza',
		   'descripcion' => 'Se encarga de la lavandería, el mantenimiento y la limpieza del hotel',
		   'cod_dpto' => 3
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Jefe de cocina',
		   'descripcion' => 'Jefe del departamento',
		   'cod_dpto' => 4
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Cocinero',
		   'descripcion' => 'Cocinero de los restaurantes del hotel, gestiona la cocina',
		   'cod_dpto' => 4
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Ayudante',
		   'descripcion' => 'Ayuda al cocinero en la cocina',
		   'cod_dpto' => 4
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Repostero',
		   'descripcion' => 'Se encarga de la preparación de postres',
		   'cod_dpto' => 4
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Sommelier',
		   'descripcion' => 'Es el experto en vinos que sugiere a la clientela el vino apropiado para la ocasión',
		   'cod_dpto' => 4
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Jefe de comedor',
		   'descripcion' => 'Gestiona el comedor',
		   'cod_dpto' => 4
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Camarero',
		   'descripcion' => 'Sirve la comida la bebida y los postres',
		   'cod_dpto' => 4
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Maitre',
		   'descripcion' => 'Gestiona la barra',
		   'cod_dpto' => 4
		);

		$this->db->insert('puesto', $data);

		$data = array(
		   'nombre' => 'Mesero',
		   'descripcion' => 'Sirve la comida y bebida a las mesas de la zona de la barra',
		   'cod_dpto' => 4
		);

		$this->db->insert('puesto', $data);

		//Insertamos los empleados

		$data= array(
			'dni'=>'12121212F',
			'nombre'=>'Jesus',
			'apellido'=>'Quintana Vadillo',
			'password'=>'',
			'sueldo'=>3500,
			'cod_puesto'=>1
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'21212121S',
			'nombre'=>'Maria',
			'apellido'=>'Dueñas Gonzalez',
			'password'=>'',
			'sueldo'=>1800.35,
			'cod_puesto'=>2
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'34567892H',
			'nombre'=>'Jose',
			'apellido'=>'Caballero Oscuro',
			'password'=>'jose',
			'sueldo'=>1500.65,
			'cod_puesto'=>3
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'22114433A',
			'nombre'=>'Jose',
			'apellido'=>'Caballero Claro',
			'password'=>'',
			'sueldo'=>1200.65,
			'cod_puesto'=>4
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'11223344D',
			'nombre'=>'Angel',
			'apellido'=>'Villar Lopez',
			'password'=>'',
			'sueldo'=>1000.65,
			'cod_puesto'=>5
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'65656578L',
			'nombre'=>'Angela',
			'apellido'=>'Merkel Murillo',
			'password'=>'',
			'sueldo'=>1000.65,
			'cod_puesto'=>5
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'98899889K',
			'nombre'=>'Francisca',
			'apellido'=>'Vera Pelaez',
			'password'=>'',
			'sueldo'=>1000.65,
			'cod_puesto'=>5
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'12345678Q',
			'nombre'=>'Tamara',
			'apellido'=>'Calvo Atun',
			'password'=>'tamara',
			'sueldo'=>1400.75,
			'cod_puesto'=>6
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'98765432W',
			'nombre'=>'Paco',
			'apellido'=>'Rodriguez Mendez',
			'password'=>'paco',
			'sueldo'=>1400.75,
			'cod_puesto'=>6
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'55555555C',
			'nombre'=>'David',
			'apellido'=>'Cibera Cuadrado',
			'password'=>'david',
			'sueldo'=>1000.75,
			'cod_puesto'=>7
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'12546379F',
			'nombre'=>'Ainhoa',
			'apellido'=>'Montes Altos',
			'password'=>'ainhoa',
			'sueldo'=>1000.75,
			'cod_puesto'=>7
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'91111333G',
			'nombre'=>'Laura',
			'apellido'=>'Campos Mateos',
			'password'=>'laura',
			'sueldo'=>1100.75,
			'cod_puesto'=>8
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'12341234Q',
			'nombre'=>'Raquel',
			'apellido'=>'Sanchez Silva',
			'password'=>'raquel',
			'sueldo'=>1100.75,
			'cod_puesto'=>8
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'98989898J',
			'nombre'=>'Marcos',
			'apellido'=>'Camarero Vaso',
			'password'=>'marcos',
			'sueldo'=>1100.75,
			'cod_puesto'=>8
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'56748392V',
			'nombre'=>'Jon',
			'apellido'=>'Garcia Rivera',
			'password'=>'jon',
			'sueldo'=>1100.75,
			'cod_puesto'=>8
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'44445555T',
			'nombre'=>'Mauricio',
			'apellido'=>'Colmenero Cocinero',
			'password'=>'',
			'sueldo'=>1800.75,
			'cod_puesto'=>9
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'55556666R',
			'nombre'=>'Pilar',
			'apellido'=>'Colmenero Cocinero',
			'password'=>'',
			'sueldo'=>1600.75,
			'cod_puesto'=>10
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'98766789P',
			'nombre'=>'Marce',
			'apellido'=>'Casa Blanca',
			'password'=>'',
			'sueldo'=>1600.75,
			'cod_puesto'=>10
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'12566677K',
			'nombre'=>'Ignacio',
			'apellido'=>'Gamez Lendoiro',
			'password'=>'',
			'sueldo'=>900.75,
			'cod_puesto'=>11
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'97778765D',
			'nombre'=>'Lorea',
			'apellido'=>'Ea Ea',
			'password'=>'',
			'sueldo'=>900.75,
			'cod_puesto'=>11
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'11337766J',
			'nombre'=>'Mario',
			'apellido'=>'Casas Lomba',
			'password'=>'',
			'sueldo'=>980.75,
			'cod_puesto'=>12
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'99441124L',
			'nombre'=>'Maider',
			'apellido'=>'Gines Lopez',
			'password'=>'',
			'sueldo'=>980.75,
			'cod_puesto'=>12
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'98761234M',
			'nombre'=>'Gorka',
			'apellido'=>'Gomez Blanco',
			'password'=>'',
			'sueldo'=>1050.75,
			'cod_puesto'=>13
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'12984576G',
			'nombre'=>'Lucas',
			'apellido'=>'Gil Del Rio',
			'password'=>'',
			'sueldo'=>1050.75,
			'cod_puesto'=>13
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'19911976J',
			'nombre'=>'Jaime',
			'apellido'=>'Robert Escudero',
			'password'=>'',
			'sueldo'=>1150.75,
			'cod_puesto'=>14
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'28372837H',
			'nombre'=>'Maika',
			'apellido'=>'Garcia Reyes',
			'password'=>'',
			'sueldo'=>1150.75,
			'cod_puesto'=>14
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'23322345W',
			'nombre'=>'Jordi',
			'apellido'=>'Hurtado Gomez',
			'password'=>'',
			'sueldo'=>1100.75,
			'cod_puesto'=>15
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'55566677P',
			'nombre'=>'Leire',
			'apellido'=>'Neuer Marcial',
			'password'=>'',
			'sueldo'=>1100.75,
			'cod_puesto'=>15
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'13135456D',
			'nombre'=>'Dani',
			'apellido'=>'Frias Gonzalez',
			'password'=>'',
			'sueldo'=>1100.75,
			'cod_puesto'=>15
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'65656574I',
			'nombre'=>'Frank',
			'apellido'=>'Diaz Rey',
			'password'=>'',
			'sueldo'=>1100.75,
			'cod_puesto'=>15
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'23454321S',
			'nombre'=>'Maider',
			'apellido'=>'Gomez Perez',
			'password'=>'',
			'sueldo'=>1000.75,
			'cod_puesto'=>16
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'12982189R',
			'nombre'=>'Ainara',
			'apellido'=>'Gutierrez Salgado',
			'password'=>'',
			'sueldo'=>1000.75,
			'cod_puesto'=>16
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'55533322H',
			'nombre'=>'Jorge',
			'apellido'=>'Perez Ruiz',
			'password'=>'',
			'sueldo'=>1000.75,
			'cod_puesto'=>17
			);
		$this->db->insert('empleado',$data);

		$data= array(
			'dni'=>'65567733B',
			'nombre'=>'Beatriz',
			'apellido'=>'Sanchez Segurola',
			'password'=>'',
			'sueldo'=>1000.75,
			'cod_puesto'=>17
			);
		$this->db->insert('empleado',$data);

		//insertamos los emails

		$data = array(
		   'dni' => '11111111K',
		   'fecha' => '2014/01/03',
		   'asunto' => 'Buena acogida',
		   'contenido' => 'Estoy muy contento con la atención recibida por sus empleados'
		);

		$this->db->insert('email', $data);

		$data = array(
		   'dni' => '22222222M',
		   'fecha' => '2014/01/13',
		   'asunto' => 'Muy buen servicio',
		   'contenido' => 'El servicio que recibí fue muy satisfactorio'
		);

		$this->db->insert('email', $data);

		//Historia del hotel

		$data = array(
		   'contenido' => 'El hotel está hubicado en lo que antiguamente era la mansión de un magnate del petroleo. La extravagancia de su antiguo dueño ha permitido que el hotel disponga de todo tipo de lujos',
		   'titulo'=>'Ubicacion',
		   'foto' => 'foto1.png'
		);

		$this->db->insert('historia', $data);

		$data = array(
		   'contenido' => 'Los gimnasios e instalaciones deportivas gozan de la última tecnología y los mejor dotados profesionales le atenderán en todo momento ',
		   'titulo'=>'Instalaciones',
		   'foto' => 'foto2.png'
		);

		$this->db->insert('historia', $data);

		//Insertamos las ofertas disponibles

		$data = array(
		   'fecha_inicio' => '2014-04-08',
		   'fecha_fin' => '2014-04-13',
		   'descuento' => 10
		);

		$this->db->insert('oferta', $data);

		$data = array(
		   'fecha_inicio' => '2014-12-13',
		   'fecha_fin' => '2014-12-22',
		   'descuento' => 20
		);

		$this->db->insert('oferta', $data);

		//Tipos de habitaciones

		$data = array(
		   'nombre' => 'simple',
		   'descripcion' =>' Habitación para una persona con todas las comodidades para su confort'
		);

		$this->db->insert('tipoHabitacion', $data);

		$data = array(
		   'nombre' => 'doble',
		   'descripcion' => 'Habitación para una pareja con todas las comodidades para su confort'
		);

		$this->db->insert('tipoHabitacion', $data);

		$data = array(
		   'nombre' => 'suite',
		   'descripcion' => 'Habitación para una o dos personas con todas las comodidades para su confort, la segunda persona supondrá un incremento del 50%'
		);

		$this->db->insert('tipoHabitacion', $data);

		//Insertamos las habitaciones con for

		  for($i=0;$i<99;$i++){
		    $data= array(
				'cod_tipo'=>1
			);
			$this->db->insert('habitacion',$data);
		  }
		   for($i=0;$i<100;$i++){
		    $data= array(
				'cod_tipo'=>2
			);
			$this->db->insert('habitacion',$data);
		  }
		   for($i=0;$i<100;$i++){  
		    $data= array(
				'cod_tipo'=>3
			);
			$this->db->insert('habitacion',$data);
		  }

		  //Insertamos las temporadas

		$data= array(
			'nombre'=>'AltaVerano',
			'fecha_inicio'=>'2014-06-21',
			'fecha_fin'=>'2014-09-21'
			);
		$this->db->insert('temporada',$data);

		$data= array(
			'nombre'=>'Baja (Verano-Navidad)',
			'fecha_inicio'=>'2014-09-22',
			'fecha_fin'=>'2014-12-23'
			);
		$this->db->insert('temporada',$data);

		$data= array(
			'nombre'=>'AltaNavidad',
			'fecha_inicio'=>'2014-12-24',
			'fecha_fin'=>'2015-01-06'
			);
		$this->db->insert('temporada',$data);

		$data= array(
			'nombre'=>'Baja (Navidad-SemanaSanta)',
			'fecha_inicio'=>'2014-01-07',
			'fecha_fin'=>'2014-04-12'
			);
		$this->db->insert('temporada',$data);

		$data= array(
			'nombre'=>'AltaSemanaSanta',
			'fecha_inicio'=>'2014-04-13',
			'fecha_fin'=>'2014-05-02'
			);
		$this->db->insert('temporada',$data);

		$data= array(
			'nombre'=>'Baja (SemanaSanta-Verano)',
			'fecha_inicio'=>'2014-05-03',
			'fecha_fin'=>'2014-06-20'
			);
		$this->db->insert('temporada',$data);

		//Distintos tipos de regimenes
		$data = array(
		   'nombre' => 'media pension',
		   'contenido' =>'Desayuno y comida o cena'
		);

		$this->db->insert('regimen', $data);

		$data = array(
		   'nombre' => 'Pension completa',
		   'contenido' =>'Desayuno, comida y cena'
		);

		$this->db->insert('regimen', $data);

		$data = array(
		   'nombre' => 'Todo incluido',
		   'contenido' =>'Cualquier comida en horario de cocina tanto en el comedor como el servicio de habitaciones'
		);

		$this->db->insert('regimen', $data);

		//PRECIOS de las habitaciones por tipo, temporada y regimen

		$data= array('cod_tipo'=>1,'cod_temporada'=>1,'cod_regimen'=>1,'precio'=>35.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>1,'cod_regimen'=>2,'precio'=>40.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>1,'cod_regimen'=>3,'precio'=>45.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>2,'cod_regimen'=>1,'precio'=>30.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>2,'cod_regimen'=>2,'precio'=>32.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>2,'cod_regimen'=>3,'precio'=>35.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>3,'cod_regimen'=>1,'precio'=>35.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>3,'cod_regimen'=>2,'precio'=>40.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>3,'cod_regimen'=>3,'precio'=>45.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>4,'cod_regimen'=>1,'precio'=>30.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>4,'cod_regimen'=>2,'precio'=>32.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>4,'cod_regimen'=>3,'precio'=>35.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>5,'cod_regimen'=>1,'precio'=>35.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>5,'cod_regimen'=>2,'precio'=>40.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>5,'cod_regimen'=>3,'precio'=>45.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>6,'cod_regimen'=>1,'precio'=>30.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>6,'cod_regimen'=>2,'precio'=>32.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>1,'cod_temporada'=>6,'cod_regimen'=>3,'precio'=>35.50);
		$this->db->insert('precio',$data);

		$data= array('cod_tipo'=>2,'cod_temporada'=>1,'cod_regimen'=>1,'precio'=>75.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>1,'cod_regimen'=>2,'precio'=>80.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>1,'cod_regimen'=>3,'precio'=>85.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>2,'cod_regimen'=>1,'precio'=>65.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>2,'cod_regimen'=>2,'precio'=>70.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>2,'cod_regimen'=>3,'precio'=>75.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>3,'cod_regimen'=>1,'precio'=>75.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>3,'cod_regimen'=>2,'precio'=>80.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>3,'cod_regimen'=>3,'precio'=>85.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>4,'cod_regimen'=>1,'precio'=>65.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>4,'cod_regimen'=>2,'precio'=>70.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>4,'cod_regimen'=>3,'precio'=>75.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>5,'cod_regimen'=>1,'precio'=>75.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>5,'cod_regimen'=>2,'precio'=>80.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>5,'cod_regimen'=>3,'precio'=>85.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>6,'cod_regimen'=>1,'precio'=>65.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>6,'cod_regimen'=>2,'precio'=>70.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>2,'cod_temporada'=>6,'cod_regimen'=>3,'precio'=>75.50);
		$this->db->insert('precio',$data);

		$data= array('cod_tipo'=>3,'cod_temporada'=>1,'cod_regimen'=>1,'precio'=>150.25);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>1,'cod_regimen'=>2,'precio'=>165.25);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>1,'cod_regimen'=>3,'precio'=>190.75);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>2,'cod_regimen'=>1,'precio'=>130.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>2,'cod_regimen'=>2,'precio'=>140.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>2,'cod_regimen'=>3,'precio'=>150.25);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>3,'cod_regimen'=>1,'precio'=>150.25);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>3,'cod_regimen'=>2,'precio'=>165.25);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>3,'cod_regimen'=>3,'precio'=>190.75);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>4,'cod_regimen'=>1,'precio'=>130.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>4,'cod_regimen'=>2,'precio'=>140.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>4,'cod_regimen'=>3,'precio'=>150.25);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>5,'cod_regimen'=>1,'precio'=>150.25);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>5,'cod_regimen'=>2,'precio'=>165.25);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>5,'cod_regimen'=>3,'precio'=>190.75);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>6,'cod_regimen'=>1,'precio'=>130.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>6,'cod_regimen'=>2,'precio'=>140.50);
		$this->db->insert('precio',$data);
		$data= array('cod_tipo'=>3,'cod_temporada'=>6,'cod_regimen'=>3,'precio'=>150.25);
		$this->db->insert('precio',$data);

		//Aqui tenemos las fotos para mostrar en nuestra web

		for($i = 0; $i < 25; $i++){
			$data = array('foto' => 'foto'.$i);
			$this->db->insert('foto', $data);
		}

		//TIPOS DE EVENTOS

		$data = array(
		   'nombre' => 'Gastronomico',
		);

		$this->db->insert('tipoEvento', $data);

		$data = array(
		   'nombre' => 'Cultural'
		);

		$this->db->insert('tipoEvento', $data);

		$data = array(
		   'nombre' => 'Popular'
		);

		$this->db->insert('tipoEvento', $data);


		$data = array(
		   'nombre' => 'Civil',
		);

		$this->db->insert('tipoEvento', $data);


		//EVENTOS
		
		$data = array(
		   'nombre' => 'evento1',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 1
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento2',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 1
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento3',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 1
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento4',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 1
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento5',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 1
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento6',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 2
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento7',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 2
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento8',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 2
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento9',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 2
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento10',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 3
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento11',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 3
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento12',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 3
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento13',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 3
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento14',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 4
		);

		$this->db->insert('evento', $data);

		$data = array(
		   'nombre' => 'evento15',
		   'contenido' => 'contenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido eventocontenido evento',
		   'cod_tipo' => 4
		);

		$this->db->insert('evento', $data);

		//Aqui metemos las reservas

		$data= array('num_hab'=>3,'dni'=>'11111111K','fecha_entrada'=>'2014-06-27','fecha_salida'=>'2014-07-02','regimen'=>2,'importe'=>202.50,'fianza'=>40.50);
		$this->db->insert('reserva',$data);
		$data= array('num_hab'=>256,'dni'=>'11111111K','fecha_entrada'=>'2014-06-27','fecha_salida'=>'2014-07-02','regimen'=>3,'importe'=>953.75,'fianza'=>190.75);
		$this->db->insert('reserva',$data);
		$data= array('num_hab'=>256,'dni'=>'22222222M','fecha_entrada'=>'2014-03-13','fecha_salida'=>'2014-03-23','regimen'=>1,'importe'=>1305,'fianza'=>261);
		$this->db->insert('reserva',$data);
		$data= array('num_hab'=>134,'dni'=>'33333333S','fecha_entrada'=>'2014-12-24','fecha_salida'=>'2014-12-28','regimen'=>3,'importe'=>342,'fianza'=>68.40);
		$this->db->insert('reserva',$data);

		//Aqui metemos los servicios

		$data= array('nombre'=>'Pistas','tabla'=>'pista');
		$this->db->insert('servicio',$data);
		$data= array('nombre'=>'Restaurante','tabla'=>'restaurante');
		$this->db->insert('servicio',$data);
		$data= array('nombre'=>'Spa','tabla'=>'spa');
		$this->db->insert('servicio',$data);
		$data= array('nombre'=>'Servicio habitaciones','tabla'=>'serHab');
		$this->db->insert('servicio',$data);
		$data= array('nombre'=>'Coche','tabla'=>'coche');
		$this->db->insert('servicio',$data);

		//Aqui metemos las pistas

		$data = array('nombre_pista' => 'Tennis','descripcion' => 'Pista de tenis','precio' => '10','cod_servicio' => 1);
		$this->db->insert('pista', $data);
		$data = array('nombre_pista' => 'Paddle','descripcion' => 'Pista de paddle','precio' => '10','cod_servicio' => 1);
		$this->db->insert('pista', $data);
		$data = array('nombre_pista' => 'Squash','descripcion' => 'Pista de Squash','precio' => '10','cod_servicio' => 1);
		$this->db->insert('pista', $data);
		$data = array('nombre_pista' => 'Badminton','descripcion' => 'Pista de badminton','precio' => '10','cod_servicio' => 1);
		$this->db->insert('pista', $data);

		//Aqui metemos los comedores del restaurante

		$data=array('nombre'=>'Comedor 1','aforo'=>300,'precio'=>15.25,'cod_servicio'=>2);
		$this->db->insert('restaurante',$data);
		$data=array('nombre'=>'Comedor 2','aforo'=>300,'precio'=>35.50,'cod_servicio'=>2);
		$this->db->insert('restaurante',$data);


		//Aqui metemos los circuitos del spa

		$data=array('nombre'=>'Calor','aforo'=>50,'precio'=>25.25,'cod_servicio'=>3);
		$this->db->insert('spa',$data);
		$data=array('nombre'=>'Frio','aforo'=>50,'precio'=>20.25,'cod_servicio'=>3);
		$this->db->insert('spa',$data);
		$data=array('nombre'=>'Calor+Frio','aforo'=>50,'precio'=>37.50,'cod_servicio'=>3);
		$this->db->insert('spa',$data);

		//Aqui metemos los distintos servicios de habitaciones

		$data=array('nombre'=>'Servicio habitaciones','precio'=>20,'cod_servicio'=>4);
		$this->db->insert('serHab',$data);

		//Distintas categorias de coches

		$data=array('nombre'=>'Media','precio'=>80);
		$this->db->insert('categoria',$data);
		$data=array('nombre'=>'Alta','precio'=>150);
		$this->db->insert('categoria',$data);

		//Coches

		$data=array('matricula'=>'1111-HPL','cod_categoria'=>1,'marca'=>'Audi','modelo'=>'A6','cod_servicio'=>5);
		$this->db->insert('coche',$data);
		$data=array('matricula'=>'1111-HPM','cod_categoria'=>1,'marca'=>'Audi','modelo'=>'A6','cod_servicio'=>5);
		$this->db->insert('coche',$data);
		$data=array('matricula'=>'5555-PPP','cod_categoria'=>1,'marca'=>'Porsche','modelo'=>'Caiman','cod_servicio'=>5);
		$this->db->insert('coche',$data);
		$data=array('matricula'=>'2222-GTI','cod_categoria'=>2,'marca'=>'Mercedes','modelo'=>'CLK','cod_servicio'=>5);
		$this->db->insert('coche',$data);
		$data=array('matricula'=>'3333-GTP','cod_categoria'=>2,'marca'=>'Audi','modelo'=>'A8','cod_servicio'=>5);
		$this->db->insert('coche',$data);
		$data=array('matricula'=>'3333-HPL','cod_categoria'=>2,'marca'=>'Audi','modelo'=>'A8','cod_servicio'=>5);
		$this->db->insert('coche',$data);
		$data=array('matricula'=>'4444-KUL','cod_categoria'=>2,'marca'=>'Porsche','modelo'=>'Panamera','cod_servicio'=>5);
		$this->db->insert('coche',$data);
		$data=array('matricula'=>'4444-KWL','cod_categoria'=>2,'marca'=>'Porsche','modelo'=>'Panamera','cod_servicio'=>5);
		$this->db->insert('coche',$data);


		return $rtdo_final;		

	}
}

?>