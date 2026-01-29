<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_form extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Location_model');
		$this->load->helper(['form', 'url']);
		$this->load->library('form_validation');
	}

	/**
	 * Halaman utama - menampilkan menu operasi
	 */
	public function index() {
		$data['page_title'] = 'SatuSehat FHIR - Location Management';
		$this->load->view('location/menu', $data);
	}

	/**
	 * Form Create Location
	 */
	public function create() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('name', 'Location Name', 'required|min_length[3]');
			$this->form_validation->set_rules('status', 'Status', 'required|in_list[active,suspended,inactive]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Create Location';
				$this->load->view('location/create', $data);
			} else {
				$name = $this->input->post('name');
				$status = $this->input->post('status');
				$description = $this->input->post('description');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');

				$result = $this->Location_model->createLocation($name, $status, $description, $address, $phone);

				$data['page_title'] = 'Create Location - Result';
				$data['result'] = $result;
				$this->load->view('location/result', $data);
			}
		} else {
			$data['page_title'] = 'Create Location';
			$this->load->view('location/create', $data);
		}
	}

	/**
	 * Form Get Location by ID
	 */
	public function get_by_id() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('location_id', 'Location ID', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Get Location by ID';
				$this->load->view('location/get_by_id', $data);
			} else {
				$location_id = $this->input->post('location_id');
				$result = $this->Location_model->getLocationById($location_id);

				$data['page_title'] = 'Get Location by ID - Result';
				$data['result'] = $result;
				$this->load->view('location/result', $data);
			}
		} else {
			$data['page_title'] = 'Get Location by ID';
			$this->load->view('location/get_by_id', $data);
		}
	}

	/**
	 * Form Get Location by Name
	 */
	public function get_by_name() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('location_name', 'Location Name', 'required|min_length[2]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Get Location by Name';
				$this->load->view('location/get_by_name', $data);
			} else {
				$location_name = $this->input->post('location_name');
				$result = $this->Location_model->getLocationByName($location_name);

				$data['page_title'] = 'Get Location by Name - Result';
				$data['result'] = $result;
				$this->load->view('location/result', $data);
			}
		} else {
			$data['page_title'] = 'Get Location by Name';
			$this->load->view('location/get_by_name', $data);
		}
	}

	/**
	 * Form Update Location
	 */
	public function update() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('location_id', 'Location ID', 'required');
			$this->form_validation->set_rules('name', 'Location Name', 'required|min_length[3]');
			$this->form_validation->set_rules('status', 'Status', 'required|in_list[active,suspended,inactive]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Update Location';
				$this->load->view('location/update', $data);
			} else {
				$location_id = $this->input->post('location_id');
				$name = $this->input->post('name');
				$status = $this->input->post('status');
				$description = $this->input->post('description');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');

				$result = $this->Location_model->updateLocation($location_id, $name, $status, $description, $address, $phone);

				$data['page_title'] = 'Update Location - Result';
				$data['result'] = $result;
				$this->load->view('location/result', $data);
			}
		} else {
			$data['page_title'] = 'Update Location';
			$this->load->view('location/update', $data);
		}
	}
}
