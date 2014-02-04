<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CrearDB extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
	}
	function crearDB(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Dubai','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('Principal/headers');
		$this->load->view('Principal/head');
		$this->load->view('Principal/menu',$data);	

		$this->load->model('creardb_model');
		$data2['respuesta']=$this->creardb_model->crearDB();	
		$this->load->view('sql/crearDB',$data2);
	}
}

?>