<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auta extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('Auta_model');
		$this->load->model('Taxikari_model');
	}

	public function auta() {
		$data = array();
		$config = array();

		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$config["base_url"] = "http://localhost/pda-projekt/index.php/auta/auta";
		$config["total_rows"] = $this->Auta_model->get_count();
		$config["per_page"] = 5;
		$config['uri_segment'] = 3;

		$config['first_link'] = 'Prvý';
		$config['last_link'] = 'Posledný';

		$limit = $config['per_page'];
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['cars'] = $this->Auta_model->get_cars($limit, $page);
		$data['title'] = 'Autá';

		$this->load->view('templates/header', $data);
		$this->load->view('auta/auta', $data);
		$this->load->view('templates/footer');
	}

	public function view($id) {
		$data = array();

		if(!empty($id)) {
			$data['cars'] = $this->Auta_model->ZobrazAuta($id);
			$data['title'] = $data['cars']['Brand'] . ' - ' . $data['cars']['Model'] . ' - ' . $data['cars']['LicensePlate'];

			$this->load->view('templates/header',$data);
			$this->load->view('auta/view',$data);
			$this->load->view('templates/footer');
		} else {
			redirect('/auta');
		}
	}

	// pridanie zaznamu o studentovi
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('Brand', 'Pole značka', 'required');
			$this->form_validation->set_rules('Model', 'Pole model', 'required');
			$this->form_validation->set_rules('ManYear', 'Pole rok výroby', 'required');
			$this->form_validation->set_rules('Odometer', 'Pole stav km', 'required');
			$this->form_validation->set_rules('FuelQty', 'Pole stav paliva', 'required');
			$this->form_validation->set_rules('MaxFuel', 'Pole max paliva', 'required');
			$this->form_validation->set_rules('LicensePlate', 'Pole EČV', 'required');
			$this->form_validation->set_rules('FuelPer100KM', 'Pole spotreba na 100 km', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'Brand' => $this->input->post('Brand'),
				'Model' => $this->input->post('Model'),
				'ManYear' => $this->input->post('ManYear'),
				'Odometer' => $this->input->post('Odometer'),
				'FuelQty' => $this->input->post('FuelQty'),
				'MaxFuel' => $this->input->post('MaxFuel'),
				'LicensePlate' => $this->input->post('LicensePlate'),
				'FuelPer100KM' => $this->input->post('FuelPer100KM'),
				'TaxiSluzba_id' => $this->input->post('firmaSelect')
			);

			$postData2 = array (
				'employees.Cars_id' => $this->input->post('taxikarSelect')
			);

			$postData2['employees.Cars_id'] = (!empty($postData2['employees.Cars_id'])) ? $postData2['employees.Cars_id'] : NULL;

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Auta_model->insert($postData);
				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o aut bol úspešne vložený');
					redirect('/taxikari');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Pridať auto';
		$data['action'] = 'add';
		$data['company'] = $this->Auta_model->ZobrazFirmy();
		$data['cars'] = $this->Auta_model->ZobrazAuta();
		$data['employees'] = $this->Taxikari_model->ZobrazTaxikari();

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('auta/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o studentovi
	public function edit($id){
		$data = array();
		$postData = $this->Auta_model->ZobrazAuta($id);
		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('Brand', 'Pole značka', 'required');
			$this->form_validation->set_rules('Model', 'Pole model', 'required');
			$this->form_validation->set_rules('ManYear', 'Pole rok výroby', 'required');
			$this->form_validation->set_rules('Odometer', 'Pole stav km', 'required');
			$this->form_validation->set_rules('FuelQty', 'Pole stav paliva', 'required');
			$this->form_validation->set_rules('MaxFuel', 'Pole max paliva', 'required');
			$this->form_validation->set_rules('LicensePlate', 'Pole EČV', 'required');
			$this->form_validation->set_rules('FuelPer100KM', 'Pole spotreba na 100 km', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'Brand' => $this->input->post('Brand'),
				'Model' => $this->input->post('Model'),
				'ManYear' => $this->input->post('ManYear'),
				'Odometer' => $this->input->post('Odometer'),
				'FuelQty' => $this->input->post('FuelQty'),
				'MaxFuel' => $this->input->post('MaxFuel'),
				'LicensePlate' => $this->input->post('LicensePlate'),
				'FuelPer100KM' => $this->input->post('FuelPer100KM'),
				'TaxiSluzba_id' => $this->input->post('firmaSelect')
			);

			$postData2 = array (
				'Cars_id' => $id,
				'id' => $this->input->post('taxikarSelect')
			);

			$postData2['id'] = (!empty($postData2['id'])) ? $postData2['id'] : NULL;

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Auta_model->update($postData, $id);
				$update2 = $this->Auta_model->updateEmployees($postData2,$postData2['id']);
				if($update && $update2){
					$this->session->set_userdata('success_msg', 'Záznam o aut bol aktualizovaný.');
					redirect('/taxikari');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}

		$data['post'] = $postData;
		$data['title'] = 'Upraviť auto';
		$data['action'] = 'edit';
		$data['company'] = $this->Auta_model->ZobrazFirmy();
		$data['cars'] = $this->Auta_model->ZobrazAuta();
		$data['employees'] = $this->Taxikari_model->ZobrazTaxikari();

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('auta/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat o studentovi
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Auta_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/taxikari');
	}
}
