<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PemeriksaanKreatinin {
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

    public function createProcedure_StatusPuasaPasien_Day2(array $payload) {
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
            'procedure_status_puasa_day2_id' => $response['id'],
            'resource'                      => $response, // opsional
        ];
    }


    public function createServiceRequest_Day2(array $payload) {
        $response = $this->client->request(
            'POST',
            'ServiceRequest',
            $payload
        );

        // validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception kalau mau strict
        }

        return [
            'service_request_lab_day2_id' => $response['id'],
            'resource'                    => $response, // opsional
        ];
    }


    public function createSpecimen_Day2($payload) {
        $response = $this->client->request(
            'POST',
            'Specimen',
            $payload
        );

        // validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception kalau mau strict
        }

        return [
            'specimen_day2_id' => $response['id'],
            'resource'         => $response, // opsional
        ];
    }


    public function createObservationKreatinin_Day2(array $payload) {
        $response = $this->client->request(
            'POST',
            'Observation',
            $payload
        );

        // validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception kalau mau strict
        }

        return [
            'observation_lab_day2_id' => $response['id'],
            'resource'                => $response, // opsional
        ];
    }

    public function createDiagnosticReport_Kreatinin_Day2(array $payload) {
        $response = $this->client->request(
            'POST',
            'DiagnosticReport',
            $payload
        );

        // validasi minimal response FHIR
        if (!isset($response['id'])) {
            return null; // atau throw exception kalau mau strict
        }

        return [
            'diagnostic_report_lab_day2_id' => $response['id'],
            'resource'                      => $response, // opsional
        ];
    }

}