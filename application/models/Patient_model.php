<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Create Patient
	 */
	public function createPatient($givenName, $familyName, $birthDate, $gender, $telecomSystem = null, $telecomValue = null) {
		try {
			// Load Patient library
			$this->load->library('Satusehat/FHIR/Resource/Patient');
			
			// Buat patient resource
			$resourceData = [
				'resourceType' => 'Patient',
				'name' => [
					[
						'use' => 'official',
						'given' => [$givenName],
						'family' => $familyName
					]
				],
				'birthDate' => $birthDate,
				'gender' => $gender
			];

			if ($telecomSystem && $telecomValue) {
				$resourceData['telecom'] = [
					[
						'system' => $telecomSystem,
						'value' => $telecomValue
					]
				];
			}

			// Simulasi - kembalikan data
			return [
				'success' => true,
				'message' => 'Patient berhasil dibuat',
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
	 * Get Patient by ID
	 */
	public function getPatientById($patientId) {
		try {
			// Load Patient library
			$this->load->library('Satusehat/FHIR/Resource/Patient');
			
			// Simulasi - kembalikan data
			return [
				'success' => true,
				'message' => 'Patient ditemukan',
				'data' => [
					'resourceType' => 'Patient',
					'id' => $patientId,
					'name' => [
						[
							'use' => 'official',
							'given' => ['John'],
							'family' => 'Doe'
						]
					],
					'birthDate' => '1990-01-15',
					'gender' => 'male'
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
	 * Get Patient by Name
	 */
	public function getPatientByName($patientName) {
		try {
			// Load Patient library
			$this->load->library('Satusehat/FHIR/Resource/Patient');
			
			// Simulasi - kembalikan data
			return [
				'success' => true,
				'message' => 'Patient ditemukan',
				'data' => [
					'entry' => [
						[
							'resource' => [
								'resourceType' => 'Patient',
								'id' => 'pat-001',
								'name' => [
									[
										'use' => 'official',
										'given' => [explode(' ', $patientName)[0]],
										'family' => $patientName
									]
								],
								'birthDate' => '1990-01-15',
								'gender' => 'male'
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
	 * Update Patient
	 */
	public function updatePatient($patientId, $givenName, $familyName, $birthDate, $gender, $telecomSystem = null, $telecomValue = null) {
		try {
			// Load Patient library
			$this->load->library('Satusehat/FHIR/Resource/Patient');
			
			// Buat patient resource dengan data baru
			$resourceData = [
				'resourceType' => 'Patient',
				'id' => $patientId,
				'name' => [
					[
						'use' => 'official',
						'given' => [$givenName],
						'family' => $familyName
					]
				],
				'birthDate' => $birthDate,
				'gender' => $gender
			];

			if ($telecomSystem && $telecomValue) {
				$resourceData['telecom'] = [
					[
						'system' => $telecomSystem,
						'value' => $telecomValue
					]
				];
			}

			return [
				'success' => true,
				'message' => 'Patient berhasil diperbarui',
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
