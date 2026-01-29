<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PenilaianRisiko {
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


    public function createRiskAssessment_PenilaianRisiko(array $payload): array {
        $response = $this->client->request(
            'POST',
            'RiskAssessment',
            $payload
        );

        // validasi minimal response FHIR
        if (
            !is_array($response) ||
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'RiskAssessment' ||
            empty($response['id'])
        ) {
            throw new \Exception('Gagal membuat RiskAssessment (Penilaian Risiko) atau response tidak valid');
        }

        // ekuivalen Postman:
        // pm.collectionVariables.set("Penilaian_Risiko", data.id)
        return [
            'id'           => $response['id'],
            'resourceType' => $response['resourceType'],
            'raw_response' => $response, // opsional: logging / audit
        ];
    }


    public function patchClinicalImpression_RasionalKlinis($id, $payload) {
        return $this->client->request(
            'PATCH',
            'ClinicalImpression/' . $id,
            $payload
        );
    }
}