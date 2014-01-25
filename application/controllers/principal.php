<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class principal extends CI_Controller {
	function __construct(){
		parent:: __construct();
	}
	
	function index(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servivios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/bienvenido',$data); 	
	}

	function holaMundo(){
		$this->load->view('principal/headers');	
		$this->load->view('principal/bienvenido');	
	}
}

?>