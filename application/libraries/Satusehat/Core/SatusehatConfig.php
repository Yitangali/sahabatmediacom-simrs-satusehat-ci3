<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SatusehatConfig {

    protected $config = [
    'base_url' => 'https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/',
    'auth_url' => 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/',
    'consent_url' => 'https://api-satusehat-stg.dto.kemkes.go.id/consent/v1/',
    'client_id' => 'eNsO4cGEVJAWaxwZHolQawVcAbSw4w0SW2iyVepnXHlfF1U4',
    'client_secret' => 'EsENSLG1JYYqIlwGnGN1NNC9RS4kt0BqMTs0Gzi2eOsVFGuwJM7XELR2IG35KL1a',
    //'token' => '',
    'Org_id' => 'f588feae-4ba0-40f0-af65-c4ec294cbd99',
    'timeout' => 30,
    ];

    public function get($key = null) {
        if ($key === null) {
            return $this->config;
        }
        return $this->config[$key] ?? null;
    }
}
