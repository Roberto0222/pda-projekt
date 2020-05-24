<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Objednavky extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Objednavky_model');
		$this->load->model('Taxikari_model');
		$this->load->model('Auta_model');
	}

	public function objednavky() {
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


		$data['contracts'] = $this->Objednavky_model->ZobrazObjednavky();
		$data['title'] = 'Objednávky';

		$this->load->view('templates/header', $data);
		$this->load->view('objednavky/objednavky', $data);
		$this->load->view('templates/footer');
	}

	public function view($id) {
		$data = array();
		if(!empty($id)) {
			$data['contracts'] = $this->Objednavky_model->ZobrazObjednavky($id);
			$data['title'] = 'Objednávka - #' . $data['contracts']['id'];

			$this->load->view('templates/header',$data);
			$this->load->view('objednavky/view',$data);
			$this->load->view('templates/footer');
		} else {
			redirect('/taxikari');
		}
	}

	// pridanie zaznamu o studentovi
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('latitude', 'Pole latitude', 'required');
			$this->form_validation->set_rules('longitude', 'Pole longitude', 'required');
			$this->form_validation->set_rules('locationFrom', 'Pole odkiaľ', 'required');
			$this->form_validation->set_rules('locationTo', 'Pole kam', 'required');
			$this->form_validation->set_rules('distanceInKm', 'Pole vzdialenosť', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'locationFrom' => $this->input->post('locationFrom'),
				'locationTo' => $this->input->post('locationTo'),
				'distanceInKm' => $this->input->post('distanceInKm'),
				'fuelUsed' => $this->input->post('fuelUsed'),
				'Employees_id' => $this->input->post('employeeSelect')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Objednavky_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o taxikárovi bol úspešne vložený');
					redirect('/taxikari');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Pridať zamestnanec';
		$data['action'] = 'add';
		$data['employees'] = $this->Taxikari_model->ZobrazTaxikari();
		$data['cars'] = $this->Auta_model->ZobrazAuta();

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('objednavky/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o studentovi
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Objednavky_model->ZobrazObjednavky($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			$this->form_validation->set_rules('latitude', 'Pole latitude', 'required');
			$this->form_validation->set_rules('longitude', 'Pole longitude', 'required');
			$this->form_validation->set_rules('locationFrom', 'Pole odkiaľ', 'required');
			$this->form_validation->set_rules('locationTo', 'Pole kam', 'required');
			$this->form_validation->set_rules('distanceInKm', 'Pole vzdialenosť', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'locationFrom' => $this->input->post('locationFrom'),
				'locationTo' => $this->input->post('locationTo'),
				'distanceInKm' => $this->input->post('distanceInKm'),
				'fuelUsed' => $this->input->post('fuelUsed'),
				'Employees_id' => $this->input->post('employeeSelect')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Objednavky_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'Záznam o študentovi bol aktualizovaný.');
					redirect('/taxikari');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}

		//$data['users'] = $this->Temperatures_model->get_users_dropdown();
		//	$data['users_selected'] = $postData['user'];
		$data['post'] = $postData;
		$data['title'] = 'Pridať zamestnanec';
		$data['action'] = 'edit';
		$data['employees'] = $this->Taxikari_model->ZobrazTaxikari();
		$data['cars'] = $this->Auta_model->ZobrazAuta();

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('objednavky/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat o studentovi
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Objednavky_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/taxikari');
	}
}
