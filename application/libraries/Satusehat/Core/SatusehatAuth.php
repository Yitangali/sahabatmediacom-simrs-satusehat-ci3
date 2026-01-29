<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SatusehatAuth {

    protected $CI;
    protected $config;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->config('satusehat');
        $this->CI->load->library('Satusehat/Core/SatusehatException');
        $this->config = $this->CI->config->item('satusehat');
    }

    public function getToken() {
        $response = $this->requestToken();

        if(empty($response['access_token'])) {
            throw new SatusehatException(
                'Gagal mendapatkan token akses dari Satusehat',
                $response
            );
        }

        return $response['access_token'];
    }

    protected function requestToken() {
        $url = $this->config['auth_url']
        .'/accesstoken?grant_type=client_credentials';

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_POST               => true,
            CURLOPT_HTTPHEADER         => [
                'Content-Type: application/x-www-form-urlencoded'
            ],
            CURLOPT_POSTFIELDS      => http_build_query([
                'client_id'     => $this->config['client_id'],
                'client_secret' => $this->config['client_secret']
            ])
        ]);

        $response   = curl_exec($ch);
        $code       = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($code !== 200) {
            throw new SatusehatException(
                'HTTP error saat meminta token akses',
                ['http_code' => $code, 'response' => $response]
            );
        }

        return json_decode($response, true);
    }
}