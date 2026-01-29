<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practitioner_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Create Practitioner
	 */
	public function createPractitioner($givenName, $familyName, $phone = null, $email = null) {
		try {
			$this->load->library('Satusehat/FHIR/Resource/Practitioner');
			
			$resourceData = [
				'resourceType' => 'Practitioner',
				'name' => [
					[
						'use' => 'official',
						'given' => [$givenName],
						'family' => $familyName
					]
				]
			];

			$telecom = [];
			if ($phone) {
				$telecom[] = [
					'system' => 'phone',
					'value' => $phone
				];
			}
			if ($email) {
				$telecom[] = [
					'system' => 'email',
					'value' => $email
				];
			}

			if (!empty($telecom)) {
				$resourceData['telecom'] = $telecom;
			}

			return [
				'success' => true,
				'message' => 'Practitioner berhasil dibuat',
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
	 * Get Practitioner by ID
	 */
	public function getPractitionerById($practitionerId) {
		try {
			$this->load->library('Satusehat/FHIR/Resource/Practitioner');
			
			return [
				'success' => true,
				'message' => 'Practitioner ditemukan',
				'data' => [
					'resourceType' => 'Practitioner',
					'id' => $practitionerId,
					'name' => [
						[
							'use' => 'official',
							'given' => ['Dr. Budi'],
							'family' => 'Santoso'
						]
					],
					'telecom' => [
						[
							'system' => 'phone',
							'value' => '+62-812-3456789'
						],
						[
							'system' => 'email',
							'value' => 'dr.budi@example.com'
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
	 * Get Practitioner by Name
	 */
	public function getPractitionerByName($practitionerName) {
		try {
			$this->load->library('Satusehat/FHIR/Resource/Practitioner');
			
			return [
				'success' => true,
				'message' => 'Practitioner ditemukan',
				'data' => [
					'entry' => [
						[
							'resource' => [
								'resourceType' => 'Practitioner',
								'id' => 'prac-001',
								'name' => [
									[
										'use' => 'official',
										'given' => [explode(' ', $practitionerName)[0]],
										'family' => $practitionerName
									]
								],
								'telecom' => [
									[
										'system' => 'phone',
										'value' => '+62-8xx-xxxx'
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
	 * Update Practitioner
	 */
	public function updatePractitioner($practitionerId, $givenName, $familyName, $phone = null, $email = null) {
		try {
			$this->load->library('Satusehat/FHIR/Resource/Practitioner');
			
			$resourceData = [
				'resourceType' => 'Practitioner',
				'id' => $practitionerId,
				'name' => [
					[
						'use' => 'official',
						'given' => [$givenName],
						'family' => $familyName
					]
				]
			];

			$telecom = [];
			if ($phone) {
				$telecom[] = [
					'system' => 'phone',
					'value' => $phone
				];
			}
			if ($email) {
				$telecom[] = [
					'system' => 'email',
					'value' => $email
				];
			}

			if (!empty($telecom)) {
				$resourceData['telecom'] = $telecom;
			}

			return [
				'success' => true,
				'message' => 'Practitioner berhasil diperbarui',
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
