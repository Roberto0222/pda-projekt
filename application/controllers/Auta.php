<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auta extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Auta_model');
	}
	public function index(){
		$data = array();
		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$data['title'] = 'Taxislužba';
		$data['cars'] = $this->Auta_model->ZobrazAuta();
		$data['company'] = $this->Auta_model->ZobrazFirmy("1");
		$this->load->view('templates/header', $data);
		$this->load->view('auta/auta',$data);
		$this->load->view('templates/footer');
	}

	public function auta() {
		$data = array();
		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}


		$data['cars'] = $this->Auta_model->ZobrazAuta();

		$data['title'] = 'Taxislužba';

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
			$this->form_validation->set_rules('carBrand', 'Pole značka', 'required');
			$this->form_validation->set_rules('carModel', 'Pole model', 'required');
			$this->form_validation->set_rules('manYear', 'Pole rok výroby', 'required');
			$this->form_validation->set_rules('odometer', 'Pole stav km', 'required');
			$this->form_validation->set_rules('fuelQty', 'Pole stav paliva', 'required');
			$this->form_validation->set_rules('fuelMax', 'Pole max paliva', 'required');
			$this->form_validation->set_rules('licensePlate', 'Pole EČV', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'Brand' => $this->input->post('carBrand'),
				'Model' => $this->input->post('carModel'),
				'ManYear' => $this->input->post('manYear'),
				'Odometer' => $this->input->post('odometer'),
				'FuelQty' => $this->input->post('fuelQty'),
				'MaxFuel' => $this->input->post('fuelMax'),
				'LicensePlate' => $this->input->post('licensePlate'),
				'TaxiSluzba_id' => $this->input->post('firmaSelect')
			);

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

			//priprava dat pre vlozenie
			$postData = array(
				'Brand' => $this->input->post('Brand'),
				'Model' => $this->input->post('Model'),
				'ManYear' => $this->input->post('ManYear'),
				'Odometer' => $this->input->post('Odometer'),
				'FuelQty' => $this->input->post('FuelQty'),
				'MaxFuel' => $this->input->post('MaxFuel'),
				'LicensePlate' => $this->input->post('LicensePlate'),
				'TaxiSluzba_id' => $this->input->post('firmaSelect')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Auta_model->update($postData, $id);

				if($update){
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
