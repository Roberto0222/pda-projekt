<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Taxikari extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('Taxikari_model');
	}
	/*
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
		$data['company'] = $this->Taxikari_model->ZobrazFirmy("1");
		$this->load->view('templates/header', $data);
		$this->load->view('taxikari/index',$data);
		$this->load->view('templates/footer');
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
		$data['title'] = 'Taxislužba';

		$this->load->view('templates/header', $data);
		$this->load->view('auta/auta', $data);
		$this->load->view('templates/footer');
	}
	*/

	public function taxikari() {
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

		$config["base_url"] = "http://localhost/pda-projekt/index.php/Taxikari/taxikari";
		$config["total_rows"] = $this->Taxikari_model->get_count();
		$config["per_page"] = 5;
		$config['uri_segment'] = 3;

		$config['first_link'] = 'Prvý';
		$config['last_link'] = 'Posledný';


		$limit = $config['per_page'];
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['employees'] = $this->Taxikari_model->get_employees($limit, $page);
		//$data['employees'] = $this->Taxikari_model->ZobrazTaxikari();
		$data['title'] = 'Taxislužba';

		$this->load->view('templates/header', $data);
		$this->load->view('taxikari/zamestnanci', $data);
		$this->load->view('templates/footer');
	}

	public function view($id) {
		$data = array();
		if(!empty($id)) {
			$data['employees'] = $this->Taxikari_model->ZobrazZamestnanec($id);
			$data['title'] = 'Zamestnanec - ' . $data['employees']['firstName'] . ' ' . $data['employees']['lastName'];

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
			$this->form_validation->set_rules('telNumber', 'Pole tel. číslo', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'lastName' => $this->input->post('lastName'),
				'firstName' => $this->input->post('firstName'),
				'telNumber' => $this->input->post('telNumber'),
				'Services_idServices' => $this->input->post('sluzbySelect'),
				'TaxiSluzba_id' => $this->input->post('firmaSelect')
			);

			$postData['Services_idServices'] = (!empty($postData['Services_idServices'])) ? $postData['Services_idServices'] : NULL;

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Taxikari_model->insert($postData);

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
		$data['company'] = $this->Taxikari_model->ZobrazFirmy();
		$data['cars'] = $this->Taxikari_model->ZobrazAuta();
		$data['services'] = $this->Taxikari_model->ZobrazSluzby();

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('taxikari/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o studentovi
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Taxikari_model->ZobrazTaxikari($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			$this->form_validation->set_rules('lastName', 'Pole priezvisko', 'required');
			$this->form_validation->set_rules('firstName', 'Pole meno', 'required');
			$this->form_validation->set_rules('telNumber', 'Pole tel. číslo', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'lastName' => $this->input->post('lastName'),
				'firstName' => $this->input->post('firstName'),
				'telNumber' => $this->input->post('telNumber'),
				'Services_idServices' => $this->input->post('sluzbySelect'),
				'TaxiSluzba_id' => $this->input->post('firmaSelect')
			);

			$postData['Services_idServices'] = (!empty($postData['Services_idServices'])) ? $postData['Services_idServices'] : NULL;

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Taxikari_model->update($postData, $id);

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
		$data['company'] = $this->Taxikari_model->ZobrazFirmy();
		$data['cars'] = $this->Taxikari_model->ZobrazAuta();
		$data['services'] = $this->Taxikari_model->ZobrazSluzby();

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('taxikari/add-edit', $data);
		$this->load->view('templates/footer');
	}


	// odstranenie dat o studentovi
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Taxikari_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/taxikari');
	}
}
