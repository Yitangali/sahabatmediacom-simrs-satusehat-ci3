<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(['url']);
	}

	/**
	 * Halaman utama - menampilkan menu pilihan FHIR Resources
	 */
	public function index() {
		$data['page_title'] = 'SatuSehat FHIR Resource Management System';
		$this->load->view('home', $data);
	}
}
