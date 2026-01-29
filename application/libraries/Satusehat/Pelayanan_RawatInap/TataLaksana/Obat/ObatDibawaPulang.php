<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ObatDibawaPulang {
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

        if (
            !isset($response['resourceType']) ||
            $response['resourceType'] !== 'MedicationRequest' ||
            empty($response['id'])
        ) {
            throw new Exception('Invalid MedicationRequest response (Furosemide)');
        }

        return [
            'id' => $response['id'],
        ];
    }


    public function createQuestionaireResponse_PengkajianResep_Furosemide($payload) {
        return $this->client->request(
            'POST',
            'QuestionaireResponse',
            $payload
        );
    }

    public function createMedicationDispense_Furosemide($payload) {
        return $this->client->request(
            'POST',
            'MedicationDispense',
            $payload
        );
    }
}