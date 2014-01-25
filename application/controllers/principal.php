<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class principal extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
	}
	function index(){
		$arr1 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$arr2 = array('Inicio','El Hotel', $arr1 ,'Situacion','Agenda Bilbao','Contacto','Opiniones');
		$arr3 = array('galeria','habitaciones','salones','servicios','restaurante');
		$arr4 = array('bienvenido','elHotel', $arr3 ,'situacion','agenda','contacto','opiniones');
		$arr1 = array($arr2,$arr4);
		$this->load->library('menu',$arr2);
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/bienvenido',$data); 	
	}
	function elHotel(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/elHotel',$data);	
	}
	function situacion(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/situacion',$data);	
	}
	function agenda(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/agenda',$data);	
	}
	function contacto(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/contacto',$data);	
	}
	function opiniones(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/opiniones',$data);	
	}
	function galeria(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/galeria',$data);	
	}
	function habitaciones(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/habitaciones',$data);	
	}
	function salones(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/salones',$data);	
	}
	function servicios(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/servicios',$data);	
	}
	function restaurante(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios Comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Bilbao','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/restaurante',$data);	
	}
}

?>