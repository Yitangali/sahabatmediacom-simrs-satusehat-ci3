<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosis {
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


    public function createCondition_PrimaryGagalGinjal(array $payload): array {
        $response = $this->client->request(
            'POST',
            'Condition',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'Condition' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat Condition (Diagnosis Primer) atau response tidak valid');
        }

        // ekuivalen Postman:
        // pm.collectionVariables.set("Condition_DiagnosisPrimer", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional untuk logging/debug
        ];
    }


    public function createCondition_SecondaryAnemia(array $payload): array {
        $response = $this->client->request(
            'POST',
            'Condition',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'Condition' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat Condition (Diagnosis Sekunder - Anemia) atau response tidak valid');
        }

        // ekuivalen Postman:
        // pm.collectionVariables.set("Condition_DiagnosisSekunder", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional (logging/debug)
        ];
    }


    public function patchClinicalImpression_RasionalKlinis($id, $payload) {
        return $this->client->request(
            'PATCH',
            'CLinicalImpression/' . $id,
            $payload,
            [
                'Content-Type'  => 'application/json-patch+json'
            ]
        );
    }
}