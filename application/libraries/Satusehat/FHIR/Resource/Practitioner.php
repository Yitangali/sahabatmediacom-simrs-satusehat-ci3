<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Practitioner {
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

    public function getPractitionerByNameNik($name, $nik) {
        $system = 'https://fhir.kemkes.go.id/id/nik';
        $query  = http_build_query(
            [
                'name'          => $name,
                'identifier'    => $system . '|' . $nik
            ]
        );

        $response = $this->client->request(
            'GET',
            'Practitioner?' . $query
        );

        $resource = $response['entry'][0]['resource'] ?? null;

        return [
            'practitioner_id'   => $resource['id'] ?? null,
            'practitioner_name' => urlencode($name),
            'bundle'            => $response,
        ];
    }

    public function getPractitionerByNik($nik) {
        $system = 'https://fhir.kemkes.go.id/id/nik';
        $query  = http_build_query(
            [
                'identifier'    => $system . '|' . $nik
            ],
        );

        $response = $this->client->request(
            'GET',
            'Practitioner?' . $query
        );

        $resource = $response['entry'][0]['resource'] ?? null;
        $practitionerId = $resource['id'] ?? null;

        $practitionerName = null;

        if(isset($resource['name'][0]['text'])) {
            $practitionerName = $resource['name'][0]['text'];
        } elseif(isset($resource['name'][0])) {
            $given              = $resource['name'][0]['given'] ?? [];
            $family             = $resource['name'][0]['family'] ?? '';
            $practitionerName   = trim(implode('', $given) . '' . $family);
        }

        return [
            'practitioner_id'   => $practitionerId,
            'practitioner_name' => $practitionerName,
            'bundle'            => $response,
        ];
    }

    public function getPractitionerByNameGenderBirthdate($name, $gender, $birthdate) {
        $query = http_build_query(
            [
                'name'      => $name,
                'gender'    => $gender,
                'birthdate' => $birthdate
            ]
        );

        return $this->client->request(
            'GET',
            'Practitioner?' . $query
        );
    }
    
    /*      *** *** *** *** *** /////////////////////////////////////////////////////////////////////// *** *** *** *** ***
                *** *** *** *** //                                                                   // *** *** *** ***
                    *** *** *** // >>>>> >>>>> >>>>> >>>>> WORK IN PROGRESS: <<<<< <<<<< <<<<< <<<<< // *** *** ***
                *** *** *** *** //                                                                   // *** *** *** ***
            *** *** *** *** *** /////////////////////////////////////////////////////////////////////// *** *** *** *** ***   */


    // DO NOT ERASE!!! JUST NEED SOME TESTING:



}