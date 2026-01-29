<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practitioner_form extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Practitioner_model');
		$this->load->helper(['form', 'url']);
		$this->load->library('form_validation');
	}

	/**
	 * Halaman utama - menampilkan menu operasi
	 */
	public function index() {
		$data['page_title'] = 'SatuSehat FHIR - Practitioner Management';
		$this->load->view('practitioner/menu', $data);
	}

	/**
	 * Form Create Practitioner
	 */
	public function create() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('given_name', 'Given Name', 'required|min_length[2]');
			$this->form_validation->set_rules('family_name', 'Family Name', 'required|min_length[2]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Create Practitioner';
				$this->load->view('practitioner/create', $data);
			} else {
				$given_name = $this->input->post('given_name');
				$family_name = $this->input->post('family_name');
				$phone = $this->input->post('phone');
				$email = $this->input->post('email');

				$result = $this->Practitioner_model->createPractitioner($given_name, $family_name, $phone, $email);

				$data['page_title'] = 'Create Practitioner - Result';
				$data['result'] = $result;
				$this->load->view('practitioner/result', $data);
			}
		} else {
			$data['page_title'] = 'Create Practitioner';
			$this->load->view('practitioner/create', $data);
		}
	}

	/**
	 * Form Get Practitioner by ID
	 */
	public function get_by_id() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('practitioner_id', 'Practitioner ID', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Get Practitioner by ID';
				$this->load->view('practitioner/get_by_id', $data);
			} else {
				$practitioner_id = $this->input->post('practitioner_id');
				$result = $this->Practitioner_model->getPractitionerById($practitioner_id);

				$data['page_title'] = 'Get Practitioner by ID - Result';
				$data['result'] = $result;
				$this->load->view('practitioner/result', $data);
			}
		} else {
			$data['page_title'] = 'Get Practitioner by ID';
			$this->load->view('practitioner/get_by_id', $data);
		}
	}

	/**
	 * Form Get Practitioner by Name
	 */
	public function get_by_name() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('practitioner_name', 'Practitioner Name', 'required|min_length[2]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Get Practitioner by Name';
				$this->load->view('practitioner/get_by_name', $data);
			} else {
				$practitioner_name = $this->input->post('practitioner_name');
				$result = $this->Practitioner_model->getPractitionerByName($practitioner_name);

				$data['page_title'] = 'Get Practitioner by Name - Result';
				$data['result'] = $result;
				$this->load->view('practitioner/result', $data);
			}
		} else {
			$data['page_title'] = 'Get Practitioner by Name';
			$this->load->view('practitioner/get_by_name', $data);
		}
	}

	/**
	 * Form Update Practitioner
	 */
	public function update() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('practitioner_id', 'Practitioner ID', 'required');
			$this->form_validation->set_rules('given_name', 'Given Name', 'required|min_length[2]');
			$this->form_validation->set_rules('family_name', 'Family Name', 'required|min_length[2]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Update Practitioner';
				$this->load->view('practitioner/update', $data);
			} else {
				$practitioner_id = $this->input->post('practitioner_id');
				$given_name = $this->input->post('given_name');
				$family_name = $this->input->post('family_name');
				$phone = $this->input->post('phone');
				$email = $this->input->post('email');

				$result = $this->Practitioner_model->updatePractitioner($practitioner_id, $given_name, $family_name, $phone, $email);

				$data['page_title'] = 'Update Practitioner - Result';
				$data['result'] = $result;
				$this->load->view('practitioner/result', $data);
			}
		} else {
			$data['page_title'] = 'Update Practitioner';
			$this->load->view('practitioner/update', $data);
		}
	}
}
