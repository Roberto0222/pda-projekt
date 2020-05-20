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
			$data['employees'] = $this->Taxikari_model->ZobrazTaxikari($id);
			$data['title'] = $data['employees']['lastName'] . ' ' . $data['employees']['firstName'];

			$this->load->view('templates/header',$data);
			$this->load->view('taxikari/view',$data);
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
			$this->form_validation->set_rules('lastName', 'Pole priezvisko', 'required');
			$this->form_validation->set_rules('firstName', 'Pole meno', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'lastName' => $this->input->post('lastName'),
				'firstName' => $this->input->post('firstName')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Studenti_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o taxikárovi bol úspešne vložený');
					redirect('/taxikari');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Pridať taxikára';
		$data['action'] = 'add';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('taxikari/add-edit', $data);
		$this->load->view('templates/footer');
	}
}
