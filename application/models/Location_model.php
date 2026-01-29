<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Create Location
	 */
	public function createLocation($name, $status, $description = null, $address = null, $phone = null) {
		try {
			$this->load->library('Satusehat/FHIR/Resource/Location');
			
			$resourceData = [
				'resourceType' => 'Location',
				'name' => $name,
				'status' => $status
			];

			if ($description) {
				$resourceData['description'] = $description;
			}

			if ($address) {
				$resourceData['address'] = [
					[
						'text' => $address
					]
				];
			}

			if ($phone) {
				$resourceData['telecom'] = [
					[
						'system' => 'phone',
						'value' => $phone
					]
				];
			}

			return [
				'success' => true,
				'message' => 'Location berhasil dibuat',
				'data' => $resourceData,
				'timestamp' => date('Y-m-d H:i:s')
			];

		} catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Error: ' . $e->getMessage(),
				'error_code' => $e->getCode()
			];
		}
	}

	/**
	 * Get Location by ID
	 */
	public function getLocationById($locationId) {
		try {
			$this->load->library('Satusehat/FHIR/Resource/Location');
			
			return [
				'success' => true,
				'message' => 'Location ditemukan',
				'data' => [
					'resourceType' => 'Location',
					'id' => $locationId,
					'name' => 'Rumah Sakit Pusat',
					'status' => 'active',
					'description' => 'Fasilitas kesehatan utama',
					'address' => [
						[
							'text' => 'Jl. Merdeka No. 123, Jakarta'
						]
					],
					'telecom' => [
						[
							'system' => 'phone',
							'value' => '+62-21-1234567'
						]
					]
				],
				'timestamp' => date('Y-m-d H:i:s')
			];

		} catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Error: ' . $e->getMessage(),
				'error_code' => $e->getCode()
			];
		}
	}

	/**
	 * Get Location by Name
	 */
	public function getLocationByName($locationName) {
		try {
			$this->load->library('Satusehat/FHIR/Resource/Location');
			
			return [
				'success' => true,
				'message' => 'Location ditemukan',
				'data' => [
					'entry' => [
						[
							'resource' => [
								'resourceType' => 'Location',
								'id' => 'loc-001',
								'name' => $locationName,
								'status' => 'active',
								'description' => 'Fasilitas kesehatan terdaftar',
								'address' => [
									[
										'text' => 'Jalan utama kesehatan'
									]
								]
							]
						]
					]
				],
				'timestamp' => date('Y-m-d H:i:s')
			];

		} catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Error: ' . $e->getMessage(),
				'error_code' => $e->getCode()
			];
		}
	}

	/**
	 * Update Location
	 */
	public function updateLocation($locationId, $name, $status, $description = null, $address = null, $phone = null) {
		try {
			$this->load->library('Satusehat/FHIR/Resource/Location');
			
			$resourceData = [
				'resourceType' => 'Location',
				'id' => $locationId,
				'name' => $name,
				'status' => $status
			];

			if ($description) {
				$resourceData['description'] = $description;
			}

			if ($address) {
				$resourceData['address'] = [
					[
						'text' => $address
					]
				];
			}

			if ($phone) {
				$resourceData['telecom'] = [
					[
						'system' => 'phone',
						'value' => $phone
					]
				];
			}

			return [
				'success' => true,
				'message' => 'Location berhasil diperbarui',
				'data' => $resourceData,
				'timestamp' => date('Y-m-d H:i:s')
			];

		} catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Error: ' . $e->getMessage(),
				'error_code' => $e->getCode()
			];
		}
	}
}
