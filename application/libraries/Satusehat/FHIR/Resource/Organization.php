<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organization {
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

    public function createOrg($payloadPath) {
        $payload = loadJsonPayload($payloadPath);

        return $this->client->request(
            'POST',
            '/Organization',
            $payload
        );
    }

    public function getOrgById($orgId) {
        if(empty($orgId)) {
            throw new InvalidArgumentException(
                'partOf Organization ID tidak boleh kosong'
            );
        }

        return $this->client->request(
            'GET',
            'Organization/' . $orgId
        );
    }

    public function getOrgUpdate($orgId) {
        return $this->client->request(
            'GET',
            'Organization/' . $orgId
        );
    }

    public function getOrgByName($name) {
        $query = http_build_query(
            [
                'name'  => $name
            ]
        );
        
        return $this->client->request(
            'GET',
            'Organization?' . $query
        );
    }

    public function getOrgByPartOf($orgId) {
        $query = http_build_query(
            [
                'partof'    => $orgId
            ]
        );

        return $this->client->request(
            'GET',
            'Organization?' . $query
        );
    }

    public function updateOrg($orgId, $payloadPath) {
        $payload = loadJsonPayload($payloadPath);
    
        return $this->client->request(
            'PUT',
            'Organization/' . $orgId,
            $payload
        );
    }

    public function patchOrg($orgId, $payloadPath) {
        $payload = loadJsonPayload($payloadPath);

        return $this->client->request(
            'PATCH',
            'Organization/' . $orgId,
            $payload
        );
    }

    /*      *** *** *** *** *** /////////////////////////////////////////////////////////////////////// *** *** *** *** ***
                *** *** *** *** //                                                                   // *** *** *** ***
                    *** *** *** // >>>>> >>>>> >>>>> >>>>> WORK IN PROGRESS: <<<<< <<<<< <<<<< <<<<< // *** *** ***
                *** *** *** *** //                                                                   // *** *** *** ***
            *** *** *** *** *** /////////////////////////////////////////////////////////////////////// *** *** *** *** ***   */


}