<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Objednavky_model extends CI_Model {

	protected $table = "contracts";

	public function __construct()
	{
		$this->load->database();
	}

	public function get_count() {
		return $this->db->count_all($this->table);
	}

	public function get_orders($limit, $page) {
		$query = $this->db->query("SELECT * FROM contracts LEFT JOIN employees ON employees.id=contracts.Employees_id LIMIT $page, $limit");
		$result = $query->result_array();
		return $result;
	}

	function ShowOrders($id="") {
		if(!empty($id)) {
			$this->db->join('employees','employees.id=contracts.Employees_id','inner');
			$query = $this->db->get_where('contracts',array('contracts.id'=>$id));
			return $query->row_array();
		} else {
			$this->db->join('contracts','employees.id=contracts.Employees_id','inner');
			$query = $this->db->get('employees');
			return $query->result_array();
		}
	}

	function ZobrazObjednavky($id="") {

		if(!empty($id)) {
			$query = $this->db->get_where('contracts',array('contracts.id'=>$id));
			return $query->row_array();
		} else {
			$this->db->join('employees', 'employees.id=contracts.Employees_id', 'inner');
			$query = $this->db->get('contracts');
			return $query->result_array();
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('contracts', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}


	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('contracts', $data, array('id'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('contracts',array('id'=>$id));
		return $delete?true:false;
	}
}
