<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Location {
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

    public function createLocation($payloadPath) {
        $payload = loadJsonPayload($payloadPath);

        return $this->client->request(
            'POST',
            'Location',
            $payload
        );
    }

    /*  
        ***************
         *              * 
          *              *
           *     GET      *
          *              *
         *              *
        ***************
    */

    public function getLocationByIdentifier($identifier1, $identifier2) {
        $system = 'http://sys-ids.kemkes.go.id/location/';
        $query  = http_build_query(
            [
                'identifier'    => $system . $identifier1 . '|' . $identifier2
            ]
        );

        return $this->client->request(
            'GET',
            'Location?' . $query
        );
    }

    public function getLocationByName($name) {
        $query  = http_build_query(
            [
                'name'  => $name
            ]
        );

        return $this->client->request(
            'GET',
            'Location?' . $query
        );
    }

    public function getLocationByOrgId($orgId) {
        $query  = http_build_query(
            [
                'organization'  => $orgId
            ]
        );

        return $this->client->request(
            'GET',
            'Location?' . $query
        );
    }

    public function getLocationById($id) {
        return $this->client->request(
            'GET',
            'Location/' . $id
        );
    }

    /*  
        ***************
         *              * 
          *              *
           *     PUT      *
          *              *
         *              *
        ***************
    */

    public function updateLocation($id, $payloadPath) {
        $payload = loadJsonPayload($payloadPath);

        return $this->client->request(
            'PUT',
            'Location/' . $id,
            $payload
        );
    }

    /*  
        ***************
         *              * 
          *              *
           *    PATCH     *
          *              *
         *              *
        ***************
    */

    public function patchLocation($id, $payloadPath) {
        $payload    = loadJsonPayload($payloadPath);

        return $this->client->request(
            'PATCH',
            'Location/' . $id,
            $payload
        );
    }

    /*      *** *** *** *** *** //////////////////////////////////////////////////////////////////////// *** *** *** *** ***
                *** *** *** *** //                                                                    // *** *** *** ***
                    *** *** *** // >>>>> >>>>> >>>>> >>>>> WORK IN PROGRESS: <<<<< <<<<< <<<<< <<<<<  // *** *** ***
                *** *** *** *** //                                                                    // *** *** *** ***
            *** *** *** *** *** //////////////////////////////////////////////////////////////////////// *** *** *** *** ***   */


}