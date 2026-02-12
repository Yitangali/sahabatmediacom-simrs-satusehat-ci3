<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Satusehat/Core/SatusehatPayload.php';

class ServiceRequestCreateForSatusehat extends SatusehatPayload
{
    protected $CI;
    //protected $config;

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('Satusehat/Core/SatusehatConfig');
        $CI->load->library('Satusehat/Core/SatusehatModel');
        $this->templatePath = APPPATH . 'libraries/Satusehat/Payloads/ServiceRequest/ServiceRequestCreateForSatusehat.json';
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
                'Org_id'                    => $data['Org_id'],
                'ACSN'                      => $data['ACSN'],
                'Patient_id'                => $data['Patient_id'],
                'Encounter_id'              => $data['Encounter_id'],
                'Practitioner_id'           => $data['Practitioner_id'],
                'Practitioner_Name'         => $data['Practitioner_Name'],
                'Practitioner_Rad_id'       => $data['Practitioner_Rad_id'],
                'Practitioner_Rad_Nama'     => $data['Practitioner_Rad_Nama'],
                'Observation_Rad_id'        => $data['Observation_Rad_id'],
                'AllergyIntolerance_Rad_id' => $data['AllergyIntolerance_Rad_id'],
                'Procedure_Rad_id'          => $data['Procedure_Rad_id']
        ];

        return $this->replacePlaceholders($payload, $variables);
    }
}

