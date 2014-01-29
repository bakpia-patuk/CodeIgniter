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
}

?>