<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sluzby extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Sluzby_model');
	}

	public function sluzby() {
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


		$data['services'] = $this->Sluzby_model->ZobrazSluzby();
		$data['title'] = 'Služby';

		$this->load->view('templates/header', $data);
		$this->load->view('sluzby/sluzby', $data);
		$this->load->view('templates/footer');
	}

	public function view($id) {
		$data = array();
		if(!empty($id)) {
			$data['services'] = $this->Sluzby_model->ZobrazSluzby($id);
			$data['title'] = 'Služby - ' . $data['services']['idServices'] . ' ' . $data['services']['name'];

			$this->load->view('templates/header',$data);
			$this->load->view('sluzby/view',$data);
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
			$this->form_validation->set_rules('name', 'Pole názov', 'required');
			$this->form_validation->set_rules('pricePerKm', 'Pole cena za km', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'name' => $this->input->post('name'),
				'pricePerKm' => $this->input->post('pricePerKm')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Sluzby_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o taxikárovi bol úspešne vložený');
					redirect('/taxikari');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Pridať službu';
		$data['action'] = 'add';
		$data['services'] = $this->Sluzby_model->ZobrazSluzby();

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('sluzby/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o studentovi
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Sluzby_model->ZobrazSluzby($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			$this->form_validation->set_rules('name', 'Pole názov', 'required');
			$this->form_validation->set_rules('pricePerKm', 'Pole cena za km', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'name' => $this->input->post('name'),
				'pricePerKm' => $this->input->post('pricePerKm')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Sluzby_model->update($postData, $id);

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
		$data['title'] = 'Upravovať službu';
		$data['action'] = 'edit';
		$data['services'] = $this->Sluzby_model->ZobrazSluzby();

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('sluzby/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat o studentovi
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Sluzby_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/taxikari');
	}
}
