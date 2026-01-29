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

    public function createMedicationAdministration_Furosemide(array $payload): array {
        $response = $this->client->request(
            'POST',
            'MedicationAdministration',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            ($response['resourceType'] ?? null) !== 'MedicationAdministration' ||
            empty($response['id'])
        ) {
            throw new \Exception(
                'Gagal membuat MedicationAdministration Furosemide atau response tidak valid'
            );
        }

        // ekuivalen Postman:
        // pm.collectionVariables.set("MedicationAdministration_id2", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional (debug / audit)
        ];
    }


    public function createMedicationAdministration_InfusRingerLaktat(array $payload): array {
        $response = $this->client->request(
            'POST',
            'MedicationAdministration',
            $payload
        );

        if (
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'MedicationAdministration' ||
            empty($response['id'])
        ) {
            throw new Exception('Invalid MedicationAdministration response (Infus Ringer Laktat)');
        }

        return [
            'id' => $response['id'],
        ];
    }

}