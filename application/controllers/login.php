<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
	}

	function comprobar(){
		if($this->login_model->comprobar()=='admin'){
			$this->cabecera();
		}
		elseif($this->login_model->comprobar()=='user'){
			$this->cabecera2();
		}
		else{
			$this->cabecera3();
		}
	}
	function cabecera(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Dubai','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('Principal/headers');	
		$this->load->view('login/login_form');
		$this->load->view('Principal/head');
		$this->load->view('Principal/menu',$data);
	}
	function cabecera2(){
		$arr2 = array('Galeria2','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Dubai','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('Principal/headers');
		$this->load->view('login/login_form');
		$this->load->view('Principal/head');
		$this->load->view('Principal/menu',$data);
	}
	function cabecera3(){
		$arr2 = array('Galeria3','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Dubai','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('Principal/headers');	
		$this->load->view('login/login_form');
		$this->load->view('Principal/head');
		$this->load->view('Principal/menu',$data);
	}

	function login2(){
		$this->comprobar();	
		$username = $this->input->post('nick');
		$password = $this->input->post('password');
		$data['login'] = $this->login_model->login($username,$password);
		$this->load->view('login/login_view',$data);
		$this->load->view('Principal/footer'); 	
	}
	function error(){
		$this->comprobar();	
		$this->load->view('login/error');
		$this->load->view('Principal/footer');
	}
}
?>