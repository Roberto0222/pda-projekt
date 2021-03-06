<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Taxikari_model extends CI_Model {

	protected $table = 'employees';

	public function __construct()
	{
		$this->load->database();
	}

	public function get_count() {
		return $this->db->count_all($this->table);
	}

	public function get_employees($limit, $page) {
		$query = $this->db->query("SELECT * FROM employees LEFT JOIN services ON employees.Services_idServices=services.idServices LIMIT $page, $limit");
		$result = $query->result_array();
		return $result;
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

	function ZobrazAuta($id="") {
		if(!empty($id)) {
			$query = $this->db->get_where('cars',array('cars.id'=>$id));
			return $query->row_array();
		} else {
			$query = $this->db->get('cars');
			return $query->result_array();
		}
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
			$this->db->join('company', 'company.id=employees.TaxiSluzba_id', 'inner');
			$query = $this->db->get_where('employees',array('employees.id'=>$id));
			return $query->row_array();
		} else {
			$this->db->join('services', 'services.idServices=employees.Services_idServices', 'left');
			$query = $this->db->get('employees');
			return $query->result_array();
		}
	}

	function ZobrazZamestnanec($id="") {
		if(!empty($id)) {
			$this->db->select('*');
			$this->db->from('company');
			$this->db->join('employees', 'company.id=employees.TaxiSluzba_id', 'inner');
			$this->db->join('employees', 'services.idServices=employees.Services_idServices', 'inner');
			$query = $this->db->get();
			return $query->row_array();
		} else {
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
