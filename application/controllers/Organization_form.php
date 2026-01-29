<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_form extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Organization_model');
		$this->load->helper(['form', 'url']);
		$this->load->library('form_validation');
	}

	/**
	 * Halaman utama - menampilkan menu operasi
	 */
	public function index() {
		$data['page_title'] = 'SatuSehat FHIR - Organization Management';
		$this->load->view('organization/menu', $data);
	}

	/**
	 * Form Create Organization
	 */
	public function create() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('name', 'Organization Name', 'required|min_length[3]');
			$this->form_validation->set_rules('type_coding', 'Type Coding', 'required');
			$this->form_validation->set_rules('telecom_system', 'Telecom System', 'in_list[phone,email,fax,pager,url,sms,other]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Create Organization';
				$this->load->view('organization/create', $data);
			} else {
				try {
					$result = $this->Organization_model->createOrganization(
						$this->input->post('name'),
						$this->input->post('type_coding'),
						$this->input->post('telecom_system'),
						$this->input->post('telecom_value'),
						$this->input->post('address_line'),
						$this->input->post('city'),
						$this->input->post('postal_code')
					);

					$data['page_title'] = 'Create Organization - Result';
					$data['success'] = true;
					$data['result'] = $result;
					$data['operation'] = 'Create Organization';
					$this->load->view('organization/result', $data);
				} catch (Exception $e) {
					$data['page_title'] = 'Create Organization - Error';
					$data['error'] = true;
					$data['error_message'] = $e->getMessage();
					$data['operation'] = 'Create Organization';
					$this->load->view('organization/result', $data);
				}
			}
		} else {
			$data['page_title'] = 'Create Organization';
			$this->load->view('organization/create', $data);
		}
	}

	/**
	 * Form Get Organization by ID
	 */
	public function get_by_id() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('org_id', 'Organization ID', 'required|min_length[1]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Get Organization by ID';
				$this->load->view('organization/get_by_id', $data);
			} else {
				try {
					$result = $this->Organization_model->getOrganizationById(
						$this->input->post('org_id')
					);

					$data['page_title'] = 'Get Organization by ID - Result';
					$data['success'] = true;
					$data['result'] = $result;
					$data['operation'] = 'Get Organization by ID';
					$data['org_id'] = $this->input->post('org_id');
					$this->load->view('organization/result', $data);
				} catch (Exception $e) {
					$data['page_title'] = 'Get Organization by ID - Error';
					$data['error'] = true;
					$data['error_message'] = $e->getMessage();
					$data['operation'] = 'Get Organization by ID';
					$this->load->view('organization/result', $data);
				}
			}
		} else {
			$data['page_title'] = 'Get Organization by ID';
			$this->load->view('organization/get_by_id', $data);
		}
	}

	/**
	 * Form Get Organization by Name
	 */
	public function get_by_name() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('org_name', 'Organization Name', 'required|min_length[1]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Get Organization by Name';
				$this->load->view('organization/get_by_name', $data);
			} else {
				try {
					$result = $this->Organization_model->getOrganizationByName(
						$this->input->post('org_name')
					);

					$data['page_title'] = 'Get Organization by Name - Result';
					$data['success'] = true;
					$data['result'] = $result;
					$data['operation'] = 'Get Organization by Name';
					$data['org_name'] = $this->input->post('org_name');
					$this->load->view('organization/result', $data);
				} catch (Exception $e) {
					$data['page_title'] = 'Get Organization by Name - Error';
					$data['error'] = true;
					$data['error_message'] = $e->getMessage();
					$data['operation'] = 'Get Organization by Name';
					$this->load->view('organization/result', $data);
				}
			}
		} else {
			$data['page_title'] = 'Get Organization by Name';
			$this->load->view('organization/get_by_name', $data);
		}
	}

	/**
	 * Form Get Organization by PartOf
	 */
	public function get_by_partof() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('partof_id', 'Parent Organization ID', 'required|min_length[1]');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Get Organizations by Parent Organization';
				$this->load->view('organization/get_by_partof', $data);
			} else {
				try {
					$result = $this->Organization_model->getOrganizationByPartOf(
						$this->input->post('partof_id')
					);

					$data['page_title'] = 'Get Organizations by Parent Organization - Result';
					$data['success'] = true;
					$data['result'] = $result;
					$data['operation'] = 'Get Organizations by Parent Organization';
					$data['partof_id'] = $this->input->post('partof_id');
					$this->load->view('organization/result', $data);
				} catch (Exception $e) {
					$data['page_title'] = 'Get Organizations by Parent Organization - Error';
					$data['error'] = true;
					$data['error_message'] = $e->getMessage();
					$data['operation'] = 'Get Organizations by Parent Organization';
					$this->load->view('organization/result', $data);
				}
			}
		} else {
			$data['page_title'] = 'Get Organizations by Parent Organization';
			$this->load->view('organization/get_by_partof', $data);
		}
	}

	/**
	 * Form Update Organization
	 */
	public function update() {
		if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('org_id', 'Organization ID', 'required');
			$this->form_validation->set_rules('name', 'Organization Name', 'required|min_length[3]');
			$this->form_validation->set_rules('type_coding', 'Type Coding', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Update Organization';
				$this->load->view('organization/update', $data);
			} else {
				try {
					$result = $this->Organization_model->updateOrganization(
						$this->input->post('org_id'),
						$this->input->post('name'),
						$this->input->post('type_coding'),
						$this->input->post('telecom_system'),
						$this->input->post('telecom_value'),
						$this->input->post('address_line'),
						$this->input->post('city'),
						$this->input->post('postal_code')
					);

					$data['page_title'] = 'Update Organization - Result';
					$data['success'] = true;
					$data['result'] = $result;
					$data['operation'] = 'Update Organization';
					$data['org_id'] = $this->input->post('org_id');
					$this->load->view('organization/result', $data);
				} catch (Exception $e) {
					$data['page_title'] = 'Update Organization - Error';
					$data['error'] = true;
					$data['error_message'] = $e->getMessage();
					$data['operation'] = 'Update Organization';
					$this->load->view('organization/result', $data);
				}
			}
		} else {
			$data['page_title'] = 'Update Organization';
			$this->load->view('organization/update', $data);
		}
	}

	/**
	 * Back to menu
	 */
	public function back_to_menu() {
		redirect('organization_form');
	}
}
