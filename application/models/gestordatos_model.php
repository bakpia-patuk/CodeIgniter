<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestordatos_model extends CI_Model {
	
	function __construct(){
		parent:: __construct();
	}
	function disponibilidad($fecha,$noches,$habitaciones){

		$fecha_salida = date( 'Y-m-d' ,strtotime ('+'.$noches.' day' , strtotime($fecha)));

		$session=array(
			'fecha_entrada'=>$fecha,
			'fecha_salida'=>$fecha_salida
		);

		$this->session->set_userdata($session);

			

		$sql='select th.cod_tipo as "CODIGO",th.nombre as "TIPO HAB.",th.descripcion,count(*) as "DISPONIBLES"
			from habitacion h join tipoHabitacion th on h.cod_tipo=th.cod_tipo
			where num_hab not in 
							(select h.num_hab from habitacion h join reserva r on r.num_hab=h.num_hab 
	  						where ("'.$fecha.'" <= r.fecha_entrada and "'.$fecha_salida.'" > r.fecha_entrada)
	  									 or ("'.$fecha.'" > r.fecha_entrada and "'.$fecha.'" < r.fecha_salida))
							GROUP BY th.cod_tipo,th.nombre,th.descripcion
							HAVING count(*)>'.$habitaciones;
 

		$hab_disponibles=$this->db->query($sql);
		$hab_disponibles = $hab_disponibles->result_array();
		
		return $hab_disponibles;
	}
	function habDisponibles(){

		$nuevafecha=$this->session->userdata('fecha_entrada');
		$fechaelegida=$this->session->userdata('fecha_salida');

		$sql='select th.cod_tipo,h.num_hab
			from habitacion h join tipoHabitacion th on h.cod_tipo=th.cod_tipo
			where num_hab not in(select h.num_hab 
								from habitacion h join reserva r on r.num_hab=h.num_hab 
								where ("'.$fechaelegida.'" <= r.fecha_entrada and "'.$nuevafecha.'" > r.fecha_entrada) 
								or ("'.$fechaelegida.'" > r.fecha_entrada and "'.$fechaelegida.'" < r.fecha_salida))';


		$hab_disponibles=$this->db->query($sql);
		$hab_disponibles = $hab_disponibles->result_array();

		return $hab_disponibles;
	}
	function historia(){
		$this->db->flush_cache();
		$query = $this->db->get('historia');
		$query = $query->result_array();
		return $query;
	}

	function servicios(){

		$this->db->flush_cache();
		$query = $this->db->get('servicio');
		$query = $query->result_array();

		return $query;
	}

	function serviciosTabla($cod_servicio){

		$this->db->flush_cache();
		$servicio=$this->db->query('select tabla from servicio where cod_servicio = ' . $cod_servicio );

		return $servicio->row('tabla');
	}

	function servicioPista($tabla){

		$this->db->flush_cache();
		$servicio=$this->db->query('select * from '.$tabla);
		return $servicio->result_array();

	}
	function datosPista($cod){

		$this->db->flush_cache();
		$pista=$this->db->query('select * from pista where cod_pista='.$cod);
		if($pista){
			return $pista->result_array();
		}
		else{
			return false;
		}
		

	}

	function servicioRestaurante($tabla){

		$this->db->flush_cache();
		$servicio=$this->db->query('select * from '.$tabla);
		return $servicio->result_array();

	}
	function datosRestaurante($cod){

		$this->db->flush_cache();
		$comedor=$this->db->query('select * from restaurante where cod_comedor='.$cod);
		return $comedor->result_array();

	}
	function servicioSpa($tabla){

		$this->db->flush_cache();
		$servicio=$this->db->query('select * from '.$tabla);
		return $servicio->result_array();

	}
	function datosSpa($cod){

		$this->db->flush_cache();
		$circuito=$this->db->query('select * from spa where cod_tipocir='.$cod);
		return $circuito->result_array();

	}

	function servicioSerHab($tabla){

		$this->db->flush_cache();
		$servicio=$this->db->query('select * from '.$tabla);
		return $servicio->result_array();

	}

	function servicioCoche($tabla){

		$this->db->flush_cache();
		$servicio=$this->db->query('select id,marca,modelo from '.$tabla.' order by 2');
		return $servicio->result_array();

	}

	function datosCoche($cod){
		$this->db->flush_cache();
		$servicio=$this->db->query('select c.precio,ch.modelo from coche ch join categoria c on c.cod_categoria=ch.cod_categoria where id='.$cod);
		return $servicio->result_array();
	}

	function horarios($fecha){
		$this->db->flush_cache();
		$hora=$this->db->query('select hora_entrada,hora_salida from alquiler where fecha_entrada="'.$fecha.'" and cod_servicio='.$this->session->userdata('cod_servicio').' and codigo_subservicio='.$this->session->userdata('cod'));
		return $hora->result_array();
		
	}


}


?>