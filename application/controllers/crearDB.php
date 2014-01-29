<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CrearDB extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
	}
	function crearDB(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);	

		$this->load->model('creardb_model');
		$data2['respuesta']=$this->creardb_model->crearDB();	
		$this->load->view('sql/crearDB',$data2);


	}
}

?>