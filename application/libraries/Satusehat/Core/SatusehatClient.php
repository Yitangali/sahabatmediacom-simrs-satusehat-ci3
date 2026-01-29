<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SatusehatClient {
    protected $auth;
    protected $config;

    public function __construct() {
        $CI = &get_instance();
        $CI->load->config('satusehat');
        $CI->load->library('Satusehat/Core/SatusehatAuth');
        $this->config   = $CI->config->item('satusehat');
        $this->auth     = $CI->satusehatauth;
    }

    public function request($method, $endpoint, $payload = null, $headers = []) {
        $token = $this->auth->getToken();

        $defaultHeaders = [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/fhir+json',
            'Accept: application/fhir+json',
        ];

        $ch = curl_init($this->config['base_url'] . $endpoint);

        $options = [
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => strtoupper($method),
            CURLOPT_TIMEOUT         => $this->config['timeout'],
            CURLOPT_HTTPHEADER      => array_merge($defaultHeaders, $headers),
            CURLOPT_SSL_VERIFYPEER  => false // setara --insecure
        ];

        if(in_array(strtoupper($method), ['POST', 'PUT', 'PATCH']) && $payload !== null) {
            $options[CURLOPT_POSTFIELDS] = json_encode($payload);
        }

        curl_setopt_array($ch, $options);

        $response   = curl_exec($ch);
        $code       = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error      = curl_error($ch);
        curl_close($ch);

        if($response === false) {
            throw new SatusehatException('CURL Error', $error);
        }

        if ($error) {
            log_message('error', json_encode([
                'endpoint' => $endpoint,
                'method'   => $method,
                'error'    => $error
            ]));

            return [
                'status' => false,
                'error'  => $error
            ];
        }

        if($code === 400 || $code === 403) {
            throw new SatusehatException(
                'Unauthorized / Forbidden Error dari Satusehat',
                [
                    'code' => $code,
                    'response' => $response,
                    'endpoint' => $endpoint
                ]
            );
        }

        if($code >= 500) {
            throw new SatusehatException(
                'Server Error dari Satusehat',
                [
                    'code' => $code,
                    'response' => $response,
                    'endpoint' => $endpoint
                ]
            );

        }

        if($code === 404) {
            return [
                $response,
                'resourceType' => 'Bundle',
                'type' => 'searchset',
                'total' => 0,
                'entry' => []
            ];
        }

        return json_decode($response, true);
    }

}