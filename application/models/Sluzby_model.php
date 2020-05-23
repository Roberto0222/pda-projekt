<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sluzby_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ZobrazSluzby($id="") {
		if(!empty($id)) {
			$query = $this->db->get_where('services',array('services.idServices'=>$id));
			return $query->row_array();
		} else {
			$query = $this->db->get('services');
			return $query->result_array();
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('services', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}


	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('services', $data, array('idServices'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('services',array('idServices'=>$id));
		return $delete?true:false;
	}
}
