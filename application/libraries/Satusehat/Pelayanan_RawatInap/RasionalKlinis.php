<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RasionalKlinis {
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


    public function createClinicalImpression_RasionalKlinis(array $payload): array {
        $response = $this->client->request(
            'POST',
            'ClinicalImpression',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'ClinicalImpression' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat ClinicalImpression atau response tidak valid');
        }

        // ekuivalen dengan Postman:
        // pm.collectionVariables.set("Rasional_Klinis", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional (logging/debug)
        ];
    }

}