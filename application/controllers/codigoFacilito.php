<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CodigoFacilito extends CI_Controller {
	function __construct(){
		parent:: __construct();
	}
	#mhgvhg
	function index(){
		$this->load->library('menu',array('Inicio','Contacto','Cursos'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('codigoFacilito/bienvenido',$data); 	
		$this->load->view('codigoFacilito/header');	
	}

	function holaMundo(){
		$this->load->view('codigoFacilito/bienvenido');	
		$this->load->view('codigoFacilito/header');	
	}
}

?>