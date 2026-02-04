<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PemeriksaanFisik {
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

    public function createObservation_TdSistolik($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_TdDiastolik($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_SuhuTubuh($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_DenyutJantung($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Pernapasan($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_SadarPenuh($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObseration_Kepala($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Mata($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Telinga($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Hidung($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Rambut($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Bibir($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_GigiGeligi($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Lidah($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_LangitLangit($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Leher($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Tenggorokan($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Tonsil($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Dada($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Payudara($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Punggung($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Perut($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_Genital($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createOservation_Anus($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_LenganAtas($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_LenganBawah($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_JariTangan($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_KukuTangan($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_PersendianTangan($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_TungkaiAtas($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_TungkaiBawah($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_JariKaki($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_KukuKaki($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_PersendianKaki($payload) {
        return $this->client->request(
            'POST',
            'Observation',
            $payload
        );
    }

    public function createObservation_TinggiBadan(array $payload) {
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
            'observation_tinggi_badan_id' => $response['id'],
            'resource'                    => $response, // opsional
        ];
    }


    public function createObservation_BeratBadan(array $payload) {
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
            'observation_berat_badan_id' => $response['id'],
            'resource'                   => $response, // opsional
        ];
    }


    public function createObservation_LptUntukAnakAnak(array $payload) {
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
            'observation_lpt_anak_id' => $response['id'],
            'resource'                => $response, // opsional
        ];
    }

}