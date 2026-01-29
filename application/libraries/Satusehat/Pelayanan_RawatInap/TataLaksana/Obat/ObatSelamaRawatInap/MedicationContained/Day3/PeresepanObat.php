<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PeresepanObat {
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

    public function createMedicationRequest_Furosemide(array $payload): array {
        $response = $this->client->request(
            'POST',
            'MedicationRequest',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            ($response['resourceType'] ?? null) !== 'MedicationRequest' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat MedicationRequest Furosemide atau response tidak valid');
        }

        // ekuivalen Postman:
        // pm.collectionVariables.set("MedicationRequest_FurosemideDay1", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional
        ];
    }


    public function createMedicationRequest_InfusRingerLaktat(array $payload): array {
        $response = $this->client->request(
            'POST',
            'MedicationRequest',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            ($response['resourceType'] ?? null) !== 'MedicationRequest' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat MedicationRequest Infus Ringer Laktat atau response tidak valid');
        }

        // ekuivalen Postman:
        // pm.collectionVariables.set("MedicationRequest_InfusDay1", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional
        ];
    }

}