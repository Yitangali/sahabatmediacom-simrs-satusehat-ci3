<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_model extends CI_Model {

	protected $organization_lib;

	public function __construct() {
		parent::__construct();
		$this->load->library('Satusehat/FHIR/Resource/Organization');
		$this->organization_lib = new Organization();
	}

	/**
	 * Create Organization with basic information
	 */
	public function createOrganization($name, $type_coding, $telecom_system = null, $telecom_value = null, $address_line = null, $city = null, $postal_code = null) {
		$payload = [
			"resourceType" => "Organization",
			"name" => $name,
			"type" => [
				[
					"coding" => [
						[
							"system" => "http://terminology.hl7.org/CodeSystem/organization-type",
							"code" => $type_coding
						]
					]
				]
			]
		];

		// Tambahkan telecom jika ada
		if (!empty($telecom_system) && !empty($telecom_value)) {
			$payload["telecom"] = [
				[
					"system" => $telecom_system,
					"value" => $telecom_value
				]
			];
		}

		// Tambahkan address jika ada
		if (!empty($address_line) || !empty($city) || !empty($postal_code)) {
			$payload["address"] = [
				[
					"line" => [
						$address_line
					],
					"city" => $city,
					"postalCode" => $postal_code
				]
			];
		}

		$payload_json = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
		$temp_file = sys_get_temp_dir() . '/org_payload_' . time() . '.json';
		file_put_contents($temp_file, $payload_json);

		try {
			$result = $this->organization_lib->createOrg($temp_file);
			@unlink($temp_file);
			return $result;
		} catch (Exception $e) {
			@unlink($temp_file);
			throw new Exception("Gagal membuat Organization: " . $e->getMessage());
		}
	}

	/**
	 * Get Organization by ID
	 */
	public function getOrganizationById($org_id) {
		try {
			return $this->organization_lib->getOrgById($org_id);
		} catch (Exception $e) {
			throw new Exception("Gagal mendapatkan Organization: " . $e->getMessage());
		}
	}

	/**
	 * Get Organization by Name
	 */
	public function getOrganizationByName($name) {
		try {
			return $this->organization_lib->getOrgByName($name);
		} catch (Exception $e) {
			throw new Exception("Gagal mencari Organization berdasarkan nama: " . $e->getMessage());
		}
	}

	/**
	 * Get Organizations by Parent Organization (PartOf)
	 */
	public function getOrganizationByPartOf($partof_id) {
		try {
			return $this->organization_lib->getOrgByPartOf($partof_id);
		} catch (Exception $e) {
			throw new Exception("Gagal mendapatkan Organization berdasarkan parent organization: " . $e->getMessage());
		}
	}

	/**
	 * Update Organization
	 */
	public function updateOrganization($org_id, $name, $type_coding, $telecom_system = null, $telecom_value = null, $address_line = null, $city = null, $postal_code = null) {
		$payload = [
			"resourceType" => "Organization",
			"id" => $org_id,
			"name" => $name,
			"type" => [
				[
					"coding" => [
						[
							"system" => "http://terminology.hl7.org/CodeSystem/organization-type",
							"code" => $type_coding
						]
					]
				]
			]
		];

		// Tambahkan telecom jika ada
		if (!empty($telecom_system) && !empty($telecom_value)) {
			$payload["telecom"] = [
				[
					"system" => $telecom_system,
					"value" => $telecom_value
				]
			];
		}

		// Tambahkan address jika ada
		if (!empty($address_line) || !empty($city) || !empty($postal_code)) {
			$payload["address"] = [
				[
					"line" => [
						$address_line
					],
					"city" => $city,
					"postalCode" => $postal_code
				]
			];
		}

		$payload_json = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
		$temp_file = sys_get_temp_dir() . '/org_payload_' . time() . '.json';
		file_put_contents($temp_file, $payload_json);

		try {
			$result = $this->organization_lib->updateOrg($org_id, $temp_file);
			@unlink($temp_file);
			return $result;
		} catch (Exception $e) {
			@unlink($temp_file);
			throw new Exception("Gagal mengupdate Organization: " . $e->getMessage());
		}
	}
}
