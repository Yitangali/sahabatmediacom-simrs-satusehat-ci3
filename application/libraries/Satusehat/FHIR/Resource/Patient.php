<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient {
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
               *     GET      *
              *              *
             *              *
            ***************
        */
            
    public function getPatientBayiByNikIbu($nik, $birthdate) {
        $system = 'https://fhir.kemkes.go.id/id/nik-ibu';
        $query  = http_build_query(
            [
                'identifier'    => $system . '|' . $nik,
                'birthdate'     => $birthdate
            ]
        );

        return $this->client->request(
            'GET',
            'Patient?' . $query
        );
    }

    public function getPatientByNameBirthdateGender($name, $birthdate, $gender) {
        $query = http_build_query(
            [
                'name'      => $name,
                'birthdate' => $birthdate,
                'gender'    => $gender
            ]
        );

        $response = $this->client->request(
            'GET',
            'Patient?' . $query
        );

        $resource = $response['entry'][0]['resource'] ?? null;

        return [
            'patient_id'    => $resource['id'] ?? null,
            'resource'      => $resource,
            'bundle'        => $response
        ];
    }

    public function getPatientByNameBirthdateNik($nik) {
        $system = 'https://fhir.kemkes.go.id/id/nik';
        $query  = http_build_query(
            [
                'identifier'    => $system . '|' . $nik
            ]
        );

        return $this->client->request(
            'GET',
            'Patient?' . $query
        );
    }

    public function getPatientByNik($nama, $nik) {
        $system = 'https://fhir.kemkes.go.id/id/nik';
        $query = http_build_query(
            [
                'name'          => $nama,
                'identifier'    => $system . '|' . $nik
            ]
        );

        return $this->client->request(
            'GET',
            'Patient?' . $query
        );
    }

    public function getPatientByNameNik($name, $nik) {
        $system = 'https://fhir.kemkes.go.id/id/nik';
        $query  = http_build_query(
            [
                'name'          => $name,
                'identifier'    => $system . '|' . $nik
            ]
        );

        return $this->client->request(
            'GET',
            'Patient?' . $query
        );
    }

    /*  
        ***************
         *              * 
          *              *
           *  POST/PATCH  *
          *              *
         *              *
        ***************
    */

    public function createPatientByNik($payload/*, $payloadPath*/) {
        // // Jika payload berupa path file JSON
        // if (is_string($payloadPath)) {
        //     $payload = loadJsonPayload($payloadPath);
        // }

        // // Validasi minimal
        // if (!isset($payload['resourceType']) || $payload['resourceType'] !== 'Patient') {
        //     throw new SatusehatException(
        //         'Payload bukan resource Patient',
        //         $payload
        //     );
        // }

        return $this->client->request(
            'POST',
            'Patient',
            $payload
        );
    }

    public function createPatientByNikIbu($payload/*, $payloadPath*/) {
        // Jika payload berupa path file JSON
        // if (is_string($payloadPath)) {
        //     $payload = loadJsonPayload($payloadPath);
        // }

        // // Validasi minimal
        // if (!isset($payload['resourceType']) || $payload['resourceType'] !== 'Patient') {
        //     throw new SatusehatException(
        //         'Payload bukan resource Patient',
        //         $payload
        //     );
        // }

        return $this->client->request(
            'POST',
            'Patient',
            $payload
        );
    }

    public function updatePatient($patientId, $payloadPath) {
        $payload = loadJsonPayload($payloadPath);
    
        return $this->client->request(
            'PATCH',
            'Patient/' . $patientId,
            $payload
        );
    }

    /*      *** *** *** *** *** /////////////////////////////////////////////////////////////////////// *** *** *** *** ***
                *** *** *** *** //                                                                   // *** *** *** ***
                    *** *** *** // >>>>> >>>>> >>>>> >>>>> WORK IN PROGRESS: <<<<< <<<<< <<<<< <<<<< // *** *** ***
                *** *** *** *** //                                                                   // *** *** *** ***
            *** *** *** *** *** /////////////////////////////////////////////////////////////////////// *** *** *** *** ***   */


    // DO NOT ERASE!!! JUST NEED SOME TESTING:



}