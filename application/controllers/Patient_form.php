<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_form extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Patient_model');
		$this->load->helper(['form', 'url']);
		$this->load->library('form_validation');
	}

	/**
	 * Halaman utama - menampilkan menu operasi
	 */
	public function index() {
		$data['page_title'] = 'SatuSehat FHIR - Patient Management';
		$this->load->view('patient/menu', $data);
	}

	/**
	 * Form Create Patient
	 */
	public function create() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('given_name', 'Given Name', 'required|min_length[2]');
			$this->form_validation->set_rules('family_name', 'Family Name', 'required|min_length[2]');
			$this->form_validation->set_rules('birth_date', 'Birth Date', 'required|valid_date[Y-m-d]');
			$this->form_validation->set_rules('gender', 'Gender', 'required|in_list[male,female,other,unknown]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Create Patient';
				$this->load->view('patient/create', $data);
			} else {
				$given_name = $this->input->post('given_name');
				$family_name = $this->input->post('family_name');
				$birth_date = $this->input->post('birth_date');
				$gender = $this->input->post('gender');
				$telecom_system = $this->input->post('telecom_system');
				$telecom_value = $this->input->post('telecom_value');

				$result = $this->Patient_model->createPatient(
					$given_name,
					$family_name,
					$birth_date,
					$gender,
					$telecom_system,
					$telecom_value
				);

				$data['page_title'] = 'Create Patient - Result';
				$data['result'] = $result;
				$this->load->view('patient/result', $data);
			}
		} else {
			$data['page_title'] = 'Create Patient';
			$this->load->view('patient/create', $data);
		}
	}

	/**
	 * Form Get Patient by ID
	 */
	public function get_by_id() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('patient_id', 'Patient ID', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Get Patient by ID';
				$this->load->view('patient/get_by_id', $data);
			} else {
				$patient_id = $this->input->post('patient_id');

				$result = $this->Patient_model->getPatientById($patient_id);

				$data['page_title'] = 'Get Patient by ID - Result';
				$data['result'] = $result;
				$this->load->view('patient/result', $data);
			}
		} else {
			$data['page_title'] = 'Get Patient by ID';
			$this->load->view('patient/get_by_id', $data);
		}
	}

	/**
	 * Form Get Patient by Name
	 */
	public function get_by_name() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('patient_name', 'Patient Name', 'required|min_length[2]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Get Patient by Name';
				$this->load->view('patient/get_by_name', $data);
			} else {
				$patient_name = $this->input->post('patient_name');

				$result = $this->Patient_model->getPatientByName($patient_name);

				$data['page_title'] = 'Get Patient by Name - Result';
				$data['result'] = $result;
				$this->load->view('patient/result', $data);
			}
		} else {
			$data['page_title'] = 'Get Patient by Name';
			$this->load->view('patient/get_by_name', $data);
		}
	}

	/**
	 * Form Update Patient
	 */
	public function update() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('patient_id', 'Patient ID', 'required');
			$this->form_validation->set_rules('given_name', 'Given Name', 'required|min_length[2]');
			$this->form_validation->set_rules('family_name', 'Family Name', 'required|min_length[2]');
			$this->form_validation->set_rules('birth_date', 'Birth Date', 'required|valid_date[Y-m-d]');
			$this->form_validation->set_rules('gender', 'Gender', 'required|in_list[male,female,other,unknown]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Update Patient';
				$this->load->view('patient/update', $data);
			} else {
				$patient_id = $this->input->post('patient_id');
				$given_name = $this->input->post('given_name');
				$family_name = $this->input->post('family_name');
				$birth_date = $this->input->post('birth_date');
				$gender = $this->input->post('gender');
				$telecom_system = $this->input->post('telecom_system');
				$telecom_value = $this->input->post('telecom_value');

				$result = $this->Patient_model->updatePatient(
					$patient_id,
					$given_name,
					$family_name,
					$birth_date,
					$gender,
					$telecom_system,
					$telecom_value
				);

				$data['page_title'] = 'Update Patient - Result';
				$data['result'] = $result;
				$this->load->view('patient/result', $data);
			}
		} else {
			$data['page_title'] = 'Update Patient';
			$this->load->view('patient/update', $data);
		}
	}
}
