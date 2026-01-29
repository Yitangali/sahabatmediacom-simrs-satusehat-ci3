<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anamnesis {
    protected $CI;
    protected $client;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('Satusehat/Core/SatusehatClient');
        $this->CI->load->helper('satusehat');
        $this->client = $this->CI->satusehatclient;
    }

    /*      *** *** *** *** *** //////////////////////////////////////////////////////////////////////// *** *** *** *** ***
                *** *** *** *** //                                                                    // *** *** *** ***
                    *** *** *** //>>>>> >>>>> >>>>> >>>>> >>>>> WORKING: <<<<< <<<<< <<<<< <<<<< <<<<<// *** *** ***
                *** *** *** *** //                                                                    // *** *** *** *** 
            *** *** *** *** *** //////////////////////////////////////////////////////////////////////// *** *** *** *** ***        */

    /*  
        ***************
         *              * 
          *              *
           *     POST     *
          *              *
         *              *
        ***************
    */

    /*  
        ***************
         *              * 
          *              *
           *     GET      *
          *              *
         *              *
        ***************
    */

    /*  
        ***************
         *              * 
          *              *
           *     PUT      *
          *              *
         *              *
        ***************
    */

    /*  
        ***************
         *              * 
          *              *
           *    PATCH     *
          *              *
         *              *
        ***************
    */

    /*      *** *** *** *** *** //////////////////////////////////////////////////////////////////////// *** *** *** *** ***
                *** *** *** *** //                                                                    // *** *** *** ***
                    *** *** *** // >>>>> >>>>> >>>>> >>>>> WORK IN PROGRESS: <<<<< <<<<< <<<<< <<<<<  // *** *** ***
                *** *** *** *** //                                                                    // *** *** *** ***
            *** *** *** *** *** //////////////////////////////////////////////////////////////////////// *** *** *** *** ***   */


    public function createCond_KeluhanUtama(array $payload) {
        // Diasumsikan request() sudah return array (decoded JSON)
        $response = $this->request(
            'POST',
            'Condition',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception jika mau strict
        }

        return [
            'condition_keluhan_utama_id' => $response['id'],
            'resource'                   => $response, // opsional (debug / chaining)
        ];
    }


    public function createCond_KeluahanPenyerta(array $payload) {
        $response = $this->client->request(
            'POST',
            'Condition',
            $payload
        );

        // validasi minimal FHIR response
        if (!isset($response['id'])) {
            return null; // atau throw exception kalau mau strict
        }

        return [
            'condition_keluhan_penyerta_id' => $response['id'],
            'resource'                      => $response, // opsional
        ];
    }

    public function createCond_RiwayatPenyakitPribadiSekarang(array $payload) {
        $response = $this->client->request(
            'POST',
            'Condition',
            $payload
        );

        // validasi minimal FHIR response
        if (!isset($response['id'])) {
            return null; // atau throw exception kalau mau strict
        }

        return [
            'condition_riwayat_penyakit_pribadi_sekarang_id' => $response['id'],
            'resource'                                      => $response, // opsional
        ];
    }

    public function createCond_RiwayatPenyakitPribadiTerdahulu(array $payload) {
        $response = $this->client->request(
            'POST',
            'Condition',
            $payload
        );

        // validasi minimal FHIR response
        if (!isset($response['id'])) {
            return null; // atau throw exception jika ingin strict
        }

        return [
            'condition_riwayat_penyakit_pribadi_terdahulu_id' => $response['id'],
            'resource'                                       => $response, // opsional
        ];
    }

    public function createFamilyMemberHistory_RiwayatPenyakitKeluarga(array $payload) {
        $response = $this->client->request(
            'POST',
            'FamilyMemberHistory',
            $payload
        );

        // validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception kalau mau strict
        }

        return [
            'family_member_history_riwayat_penyakit_keluarga_id' => $response['id'],
            'resource'                                           => $response, // opsional
        ];
    }

    public function createAllergyIntolerance_AlergiAspirin($payload) {
        return $this->client->request(
            'POST',
            'AllergyIntolerance',
            $payload
        );
    }

    public function createAllergyMakanan_DagingBebek(array $payload) {
        $response = $this->client->request(
            'POST',
            'AllergyIntolerance',
            $payload
        );

        // validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception jika mau strict
        }

        return [
            'allergy_intolerance_makanan_id' => $response['id'],
            'resource'                       => $response, // opsional
        ];
    }

    public function createAllergyLingkungan_DebuRumah(array $payload) {
        $response = $this->client->request(
            'POST',
            'AllergyIntolerance',
            $payload
        );

        // validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception kalau mau strict
        }

        return [
            'allergy_intolerance_lingkungan_id' => $response['id'],
            'resource'                          => $response, // opsional
        ];
    }

    public function createMedicationStatement_RiwayatPengobatan($payload) {
        return $this->client->request(
            'POST',
            'MedicationStatement',
            $payload 
        );
    }

    public function getMedicationDispense_SearchBySubject($patientId) {
        $query = http_build_query(
            [
                'subject'   => $patientId
            ]
        );

        return $this->client->request(
            'GET',
            'MedicationDispense?' . $query
        );
    }

}