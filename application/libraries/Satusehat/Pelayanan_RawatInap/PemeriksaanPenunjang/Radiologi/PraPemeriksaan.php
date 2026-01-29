<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
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

    public function createProcedure_StatusPuasaPasien(array $payload) {
        $response = $this->client->request(
            'POST',
            'Procedure',
            $payload
        );

        // validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception kalau mau strict
        }

        return [
            'procedure_rad_id' => $response['id'],
            'resource'         => $response, // opsional
        ];
    }


    public function createObservation_StatusKehamilanPasien(array $payload) {
        $response = $this->client->request(
            'POST',
            'Observation',
            $payload
        );

        // validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception jika mau strict
        }

        return [
            'observation_rad_id' => $response['id'],
            'resource'           => $response, // opsional, untuk debugging/logging
        ];
    }


    public function createAllergyIntolerance_StatusAlergiBahanKontras(array $payload): array {
        $response = $this->client->request(
            'POST',
            'AllergyIntolerance',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'AllergyIntolerance' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat AllergyIntolerance atau response tidak valid');
        }

        // ekuivalen dengan Postman:
        // pm.collectionVariables.set("AllergyIntolerance_Rad_id", data.id)
        return [
            'id'            => $response['id'],
            'resourceType'  => $response['resourceType'],
            'raw_response'  => $response, // opsional, berguna untuk debugging/log
        ];
    }

}