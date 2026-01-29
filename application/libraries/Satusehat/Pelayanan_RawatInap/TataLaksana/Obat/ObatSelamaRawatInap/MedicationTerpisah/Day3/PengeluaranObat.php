<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PengeluaranObat {
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

    public function createMedicationForDispense_Furosemide(array $payload): array {
        $response = $this->client->request(
            'POST',
            'Medication',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'Medication' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat Medication (For Dispense) Furosemide atau response tidak valid');
        }

        // ekuivalen Postman:
        // pm.collectionVariables.set("Medication_ForDispense_FurosemideDay1", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional, untuk trace/debug
        ];
    }


    public function createMedicationForDispense_InfusRingerLaktat(array $payload): array {
        $response = $this->client->request(
            'POST',
            'Medication',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'Medication' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat Medication (For Dispense) Infus Ringer Laktat atau response tidak valid');
        }

        // ekuivalen Postman:
        // pm.collectionVariables.set("Medication_ForDispense_InfusDay1", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional
        ];
    }


    public function createMedicationDispense_Furosemide($payload) {
        return $this->client->request(
            'POST',
            'MedicationDispense',
            $payload
        );
    }

    public function createMedicationDispense_furosemide($payload) {
        return $this->client->request(
            'POST',
            'MedicationDispense',
            $payload
        );
    }
}