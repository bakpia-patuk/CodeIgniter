<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
		$this->load->model('gestordatos_model');
	}
	function cabecera(){
		$arr2 = array('Galeria','Habitaciones','Salones','Servicios comunes','Restaurante');
		$this->load->library('menu',array('Inicio','El Hotel', $arr2 ,'Situacion','Agenda Dubai','Contacto','Opiniones'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('Principal/headers');	
		$this->load->view('Principal/head');
		$this->load->view('Principal/menu',$data);
	}
	function index(){
		$this->cabecera();	
		$data['historia']=$this->gestordatos_model->historia();	
		$this->load->view('Principal/bienvenido',$data);
		$this->load->view('Principal/footer'); 	
	}
	function elHotel(){
		$this->cabecera();	
		$this->load->view('Principal/elHotel');	
		$this->load->view('Principal/footer'); 	
	}
	function situacion(){
		$this->cabecera();			
		$this->load->view('Principal/situacion');	
		$this->load->view('Principal/footer'); 	
	}
	function agenda(){
		$this->cabecera();			
		$this->load->view('Principal/agenda');	
		$this->load->view('Principal/footer'); 	
	}
	function contacto(){
		$this->cabecera();	
		$this->load->view('Principal/contacto');	
		$this->load->view('Principal/footer'); 	
	}
	function opiniones(){
		$this->cabecera();			
		$this->load->view('Principal/opiniones');	
		$this->load->view('Principal/footer'); 	
	}
	function galeria(){
		$this->cabecera();	
		$this->load->view('Principal/galeria');	
		$this->load->view('Principal/footer'); 	
	}
	function habitaciones(){
		$this->cabecera();			
		$this->load->view('Principal/habitaciones');	
		$this->load->view('Principal/footer'); 	
	}
	function salones(){
		$this->cabecera();			
		$this->load->view('Principal/salones');	
		$this->load->view('Principal/footer'); 	
	}
	function servicios(){
		$this->cabecera();			
		$this->load->view('Principal/servicios');	
		$this->load->view('Principal/footer'); 	
	}
	function restaurante(){
		$this->cabecera();		
		$this->load->view('Principal/restaurante');	
		$this->load->view('Principal/footer'); 	
	}	
	function disponibilidad(){
		$this->cabecera();		
		$fecha = $this->input->post('fecha_entrada');
		$noches = $this->input->post('noches');
		$habitaciones = $this->input->post('habitaciones');
		

		$data['hab_disponibles']=$this->gestordatos_model->disponibilidad($fecha,$noches,$habitaciones);	
		$data['hab_disponibles2']=$this->gestordatos_model->habDisponibles();//El numero de dichas habitaciones
		$data['servicios']=$this->gestordatos_model->servicios();//Servicios disponibles

		$this->load->view('Principal/disponibilidad',$data);	
		$this->load->view('Principal/footer'); 	

	}
	//Cuales son los distintos servicios
	function mostrarServicios(){
		$cod_serv = $this->input->post('cod_serv');
		$tabla = $this->gestordatos_model->serviciosTabla($cod_serv);
		
		switch ($tabla) {

			case 'pista':
				$html = "<select name='subServ' onChange='servicioPistas(this.value)'><option value='0'>Seleccione...</option>";
				$servicios = $this->gestordatos_model->servicioPista($tabla);
				foreach ($servicios as $serv) {
					$html .= "<option onClick='servicioPistas(1)'  value='".$serv['cod_pista']."'>".$serv['nombre_pista']."</option>";
				}
				$html.='</select>';
				break;

			case 'restaurante':
				$html = "<select name='subServ' onChange='servicioRestaurante(this.value)'><option value='0'>Seleccione...</option>";
				$servicios = $this->gestordatos_model->servicioRestaurante($tabla);
				foreach ($servicios as $serv) {
					$html .= "<option onClick='servicioRestaurante(2)' value='".$serv['cod_comedor']."'>".$serv['nombre']."</option>";
				}
				$html.='</select>';
				break;

			case 'spa':
				$html = "<select name='subServ' onChange='servicioSpa(this.value)'><option value='0'>Seleccione...</option>";
				$servicios = $this->gestordatos_model->servicioSpa($tabla);
				foreach ($servicios as $serv) {
					$html .= "<option onClick='servicioSpa(3)' value='".$serv['cod_tipocir']."'>".$serv['nombre']."</option>";
				}
				$html.='</select>';
				break;

			case 'serHab':
					$html = "";
				break;

			case 'coche':
				$html = "<select name='subServ' onChange='servicioCoche(this.value)'><option value='0'>Seleccione...</option>";
				$cocheSeleccionado = $this->gestordatos_model->servicioCoche($tabla);
				foreach ($cocheSeleccionado as $coche) {
					$html .= "<option onClick='servicioCoche(5)' value='".$coche['id']."'>".$coche['marca']." - ".$coche['modelo']."</option>";
				}
				$html.='</select>';
				break;

			default:
				$html='';
			;
		}

		

		echo $html;
	}

	function datosPista(){
		$cod = $this->input->post('cod');
		$pistaElegida = $this->gestordatos_model->datosPista($cod);
		$html='';

		foreach ($pistaElegida as $pista) {
			$html.=$pista['precio'].' €/hora';
		}
		echo $html;
	}

	function datosRestaurante(){
		$cod = $this->input->post('cod');
		$comedorElegido = $this->gestordatos_model->datosRestaurante($cod);
		$html='';

		foreach ($comedorElegido as $comedor) {
			$html.=$comedor['precio'].' €/persona';
		}
		echo $html;
	}
	function datosSpa(){
		$cod = $this->input->post('cod');
		$circuitoElegido = $this->gestordatos_model->datosSpa($cod);
		$html='';

		foreach ($circuitoElegido as $circuito) {
			$html.=$circuito['precio'].' €/persona';
		}
		echo $html;
	}
	function datosCoche(){
		$cod = $this->input->post('cod');
		$cocheElegido = $this->gestordatos_model->datosCoche($cod);
		$html='';

		foreach ($cocheElegido as $coche) {
			$html.=$coche['precio'].' €/día';
		}
		echo $html;
	}

}

?>