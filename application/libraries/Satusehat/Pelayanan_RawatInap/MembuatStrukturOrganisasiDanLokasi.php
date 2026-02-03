<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MembuatStrukturOrganisasiDanLokasi {
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


    public function patchBed2NoOS($id, $payload) {
        return $this->client->request(
            'PATCH',
            'Location/' . $id,
            $payload,
            'Content-Type: application/json-patch+json'
        );
    }

    public function patchBed2WithOS($id, $payload) {
        return $this->client->request(
            'PATCH',
            'Location/' . $id,
            $payload,
            'Content-Type: application/json-patch+json'
        );     
    }

    public function createOrg_DivisiPelayananMedik(array $payload) {
        $response = $this->client->request(
            'POST',
            'Organization',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'divisi_yanmed_id' => $response['id'],
            'resource'        => $response, // opsional
        ];
    }


    public function createOrg_LayananPenyakitDalam(array $payload) {
        // request() diasumsikan sudah return array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Organization',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'layanan_pd_id' => $response['id'],
            'resource'      => $response, // opsional
        ];
    }


    public function createOrg_PelayananGawatDarurat(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Organization',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'pelayanan_gd_id' => $response['id'],
            'resource'       => $response, // opsional
        ];
    }


    public function createOrg_Farmasi(array $payload) {
        // request() diasumsikan sudah return array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Organization',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'org_farmasi_id' => $response['id'],
            'resource'      => $response, // opsional
        ];
    }


    public function createLoc_BangsalRawatInapKelas1(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_bangsal_kelas1_id' => $response['id'],
            'resource'                  => $response, // opsional
        ];
    }


    public function createLoc_Ruang210(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_ruang210_id' => $response['id'],
            'resource'             => $response, // opsional
        ];
    }


    public function createLoc_Bed2(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST', 
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_ruang210_bed2_id' => $response['id'],
            'resource'                  => $response, // opsional
        ];
    }


    public function createLoc_BangsalRawatInapKelas2(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_bangsal_kelas2_id' => $response['id'],
            'resource'                  => $response, // opsional
        ];
    }

    public function createLoc_Ruang208(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_ruang208_id' => $response['id'],
            'resource'             => $response, // opsional
        ];
    }


    public function createLoc_Bed3(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_ruang208_bed3_id' => $response['id'],
            'resource'                  => $response, // opsional
        ];
    }

    public function createLoc_BangsalRawatInapKelas3(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_bangsal_kelas3_id' => $response['id'],
            'resource'                  => $response, // opsional
        ];
    }

    public function createLoc_Ruang206(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_ruang206_id' => $response['id'],
            'resource'             => $response, // opsional
        ];
    }

    public function createLoc_Bed4(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_ruang206_bed4_id' => $response['id'],
            'resource'                  => $response, // opsional
        ];
    }


    public function createLoc_RuangVip1(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_ruangvip1_id' => $response['id'],
            'resource'              => $response, // opsional
        ];
    }

    public function createLoc_RuangIcu(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_ruangicu_id' => $response['id'],
            'resource'             => $response, // opsional
        ];
    }

    public function createLoc_Bed1(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_ruangicu_bed1_id' => $response['id'],
            'resource'                  => $response, // opsional
        ];
    }

    public function createLoc_InstalasiGawatDarurat(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception
        }

        return [
            'location_igd_id' => $response['id'],
            'resource'        => $response, // opsional
        ];
    }

    public function createLoc_RuangOperasi(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception kalau mau strict
        }

        return [
            'location_ruang_operasi_id' => $response['id'],
            'resource'                  => $response, // opsional
        ];
    }

    public function createLoc_Farmasi(array $payload) {
        // request() diasumsikan sudah mengembalikan array (decoded JSON)
        $response = $this->client->request(
            'POST',
            'Location',
            $payload
        );

        // Validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw Exception jika mau strict
        }

        return [
            'location_farmasi_id'   => $response['id'],
            'location_farmasi_name' => $response['name'] ?? null,
            'resource'              => $response, // opsional
        ];
    }
}