<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class principal extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
	}
	function index(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);		
		$this->load->view('principal/bienvenido'); 	
		$this->load->view('principal/footer'); 	
	}
	function elHotel(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);	
		$this->load->view('principal/elHotel');	
		$this->load->view('principal/footer'); 	
	}
	function situacion(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);		
		$this->load->view('principal/situacion');	
		$this->load->view('principal/footer'); 	
	}
	function agenda(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);		
		$this->load->view('principal/agenda');	
		$this->load->view('principal/footer'); 	
	}
	function contacto(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);	
		$this->load->view('principal/contacto');	
		$this->load->view('principal/footer'); 	
	}
	function opiniones(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);		
		$this->load->view('principal/opiniones');	
		$this->load->view('principal/footer'); 	
	}
	function galeria(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);	
		$this->load->view('principal/galeria');	
		$this->load->view('principal/footer'); 	
	}
	function habitaciones(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);		
		$this->load->view('principal/habitaciones');	
		$this->load->view('principal/footer'); 	
	}
	function salones(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);		
		$this->load->view('principal/salones');	
		$this->load->view('principal/footer'); 	
	}
	function servicios(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);		
		$this->load->view('principal/servicios');	
		$this->load->view('principal/footer'); 	
	}
	function restaurante(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);	
		$this->load->view('principal/restaurante');	
		$this->load->view('principal/footer'); 	
	}
}

?>