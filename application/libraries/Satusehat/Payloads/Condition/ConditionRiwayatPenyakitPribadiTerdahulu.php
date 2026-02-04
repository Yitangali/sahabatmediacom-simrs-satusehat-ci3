<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Satusehat/Core/SatusehatPayload.php';

class ConditionRiwayatPenyakitPribadiTerdahulu extends SatusehatPayload
{
    protected $CI;
    //protected $config;

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('Satusehat/Core/SatusehatConfig');
        $CI->load->library('Satusehat/Core/SatusehatModel');
        $this->templatePath = APPPATH . 'libraries/Satusehat/Payloads/Condition/ConditionRiwayatPenyakitPribadiTerdahulu.json';
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
            "Patient_id"                        => $data['Patient_id'],
            "Patient_Name"                      => $data['Patient_Name'],
            "Encounter_id"                      => $data['Encounter_id'],
            "Practitioner_id"                   => $data['Practitioner_id'],
            "Practitioner_Name"                 => $data['Practitioner_Name'],
        ];

        return $this->replacePlaceholders($payload, $variables);
    }
}

