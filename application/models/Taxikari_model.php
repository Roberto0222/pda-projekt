<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Taxikari_model extends CI_Model {
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

	function ZobrazTaxikari($id="") {
		if(!empty($id)) {
			/*
			$this->db->select('*');
			$this->db->from('company');
			$this->db->join('employees', 'company.id=employees.TaxiSluzba_id');
			$query = $this->db->get_where('employees',array('employees.id'=>$id));
			*/
			$query = $this->db->get_where('employees',array('employees.id'=>$id));
			return $query->row_array();
		} else {
			/*
			$this->db->select('*');
			$this->db->from('company');
			$this->db->join('employees', 'company.id=employees.TaxiSluzba_id');
			$query = $this->db->get();
			*/
			$query = $this->db->get('employees');
			return $query->result_array();
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('employees', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('employees', $data, array('id'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('employees',array('id'=>$id));
		return $delete?true:false;
	}
}