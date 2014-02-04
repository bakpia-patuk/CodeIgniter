<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login($username,$password)
	{
		$this->db->where('id_empleado',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('empleado');
		if($query->num_rows() == 1)
		{
			$query = $query->row();
			$this->setSession($query->id_empleado,$query->tipo);
			return $query;
		}else{
			$this->setSession('','');
			redirect(base_url().'index.php/Error','location');
		}
	}
	function setSession($id,$tipo){
		$session=array(
			'id'=>$id,
			'tipo'=>$tipo
		);
		$this->session->set_userdata($session);
	}
	function comprobar(){
			if($retorna = $this->session->userdata('tipo')){
			return $retorna;
		}
		else{
			return false;
		}
	}
}