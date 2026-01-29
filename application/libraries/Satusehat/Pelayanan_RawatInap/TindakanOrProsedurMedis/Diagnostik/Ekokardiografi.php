<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ekokardiografi {
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


    public function createServiceRequest_Ekokardiografi(array $payload): array {
        $response = $this->client->request(
            'POST',
            'ServiceRequest',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'ServiceRequest' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat ServiceRequest Ekokardiografi atau response tidak valid');
        }

        // ekuivalen Postman:
        // pm.collectionVariables.set("SR_Eko", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional (logging/debug)
        ];
    }


    public function createProcedure_Ekokardiografi($payload) {
        return $this->client->request(
            'POST',
            'Procedure',
            $payload
        );
    }

    public function createObservation_Ekokardiografi($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }
}