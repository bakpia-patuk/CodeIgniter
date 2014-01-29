<<<<<<< HEAD
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class principal extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
	}
	function cabecera(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Dubai','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('principal/headers');	
		$this->load->view('principal/head');
		$this->load->view('principal/menu',$data);
	}
	function index(){
		$this->cabecera();	
		$this->load->view('principal/bienvenido'); 	
		$this->load->view('principal/footer'); 	
	}
	function elHotel(){
		$this->cabecera();	
		$this->load->view('principal/elHotel');	
		$this->load->view('principal/footer'); 	
	}
	function situacion(){
		$this->cabecera();			
		$this->load->view('principal/situacion');	
		$this->load->view('principal/footer'); 	
	}
	function agenda(){
		$this->cabecera();			
		$this->load->view('principal/agenda');	
		$this->load->view('principal/footer'); 	
	}
	function contacto(){
		$this->cabecera();	
		$this->load->view('principal/contacto');	
		$this->load->view('principal/footer'); 	
	}
	function opiniones(){
		$this->cabecera();			
		$this->load->view('principal/opiniones');	
		$this->load->view('principal/footer'); 	
	}
	function galeria(){
		$this->cabecera();	
		$this->load->view('principal/galeria');	
		$this->load->view('principal/footer'); 	
	}
	function habitaciones(){
		$this->cabecera();			
		$this->load->view('principal/habitaciones');	
		$this->load->view('principal/footer'); 	
	}
	function salones(){
		$this->cabecera();			
		$this->load->view('principal/salones');	
		$this->load->view('principal/footer'); 	
	}
	function servicios(){
		$this->cabecera();			
		$this->load->view('principal/servicios');	
		$this->load->view('principal/footer'); 	
	}
	function restaurante(){
		$this->cabecera();		
		$this->load->view('principal/restaurante');	
		$this->load->view('principal/footer'); 	
	}	
	function disponibilidad(){
		$this->cabecera();		
		$fecha = $this->input->post('fecha_entrada');
		$noches = $this->input->post('noches');
		$habitaciones = $this->input->post('habitaciones');
		$this->load->model('gestordatos_model');

		$data['hab_disponibles']=$this->gestordatos_model->disponibilidad($fecha,$noches,$habitaciones);	
		$this->load->view('principal/disponibilidad',$data);	
		$this->load->view('principal/footer'); 	

	}
}

=======
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

>>>>>>> 5ffd4a828276a7817dc5def3723c788813fb6c62
?>