<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Satusehat/Core/SatusehatPayload.php';

class PayloadEncounter extends SatusehatPayload
{
    protected $CI;
    //protected $config;

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('Satusehat/Core/SatusehatConfig');
        $CI->load->library('Satusehat/Core/SatusehatModel');
        $this->templatePath = APPPATH . 'libraries/Satusehat/Payloads/Encounter/createEncounter_MasukKunjunganRawatInap2.json';
        //$this->config = $this->CI->satusehatconfig->get('Org_id');
    }

    function getTodayIsoString(): string {
        $dt = new DateTime('now', new DateTimeZone('UTC')); // pakai UTC
        return $dt->format('Y-m-d\TH:i:sP');
    }

    public function build(array $data): array
    {
        //$orgId = $this->satusehatconfig->get('Org_id');
        $payload = $this->loadTemplate();

        $variables = [
            "Org_id"                        => $data['Org_id'],
            "Registration_ID"               => $data['Registration_ID'],
            "Patient_id"                    => $data['Patient_id'],
            "Patient_Name"                  => $data['Patient_Name'],
            "Practitioner_id"               => $data['Practitioner_id'],
            "Practitioner_Name"             => $data['Practitioner_Name'],
            "Location_Ruang210_Bed2_id"     => $data['Location_Ruang210_Bed2_id'],
            "location_display"              => $data['location_display'],
            "kelas_code"                    => $data['kelas_code'],
            "kelas_display"                 => $data['kelas_display'],
            "upgrade_code"                  => $data['upgrade_code'],
            "upgrade_display"               => $data['upgrade_display'],
            //"service_request_id"          => $data[''],
            "start_period"                  => $data['start_period']
        ];

        return $this->replacePlaceholders($payload, $variables);
    }
}

