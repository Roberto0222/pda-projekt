<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auta_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ZobrazFirmy($id="") {
		if(!empty($id)) {
			$query = $this->db->get_where('company',array('company.id'=>$id));
			return $query->row_array();
		} else {
			$query = $this->db->get('company');
			return $query->result_array();
		}
	}

	function ZobrazAuta($id="") {
		if(!empty($id)) {
			$query = $this->db->get_where('cars',array('cars.id'=>$id));
			return $query->row_array();
		} else {
			$this->db->select('*,cars.id as carid,employees.id as employeeid');
			$this->db->join('employees', 'cars.id=employees.Cars_id', 'left');
			$query = $this->db->get('cars');
			return $query->result_array();
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('cars', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('cars', $data, array('cars.id'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	public function updateEmployees($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('employees', $data, array('employees.id'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('cars',array('cars.id'=>$id));
		return $delete?true:false;
	}
}
