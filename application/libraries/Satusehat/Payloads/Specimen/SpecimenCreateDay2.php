<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Satusehat/Core/SatusehatPayload.php';

class SpecimenCreateDay2 extends SatusehatPayload
{
    protected $CI;
    //protected $config;

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('Satusehat/Core/SatusehatConfig');
        $CI->load->library('Satusehat/Core/SatusehatModel');
        $this->templatePath = APPPATH . 'libraries/Satusehat/Payloads/Specimen/SpecimenCreateDay2.json';
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
                'Org_id'                        => $data['Org_id'],
                'Patient_id'                    => $data['Patient_id'],
                'Encounter_id'                  => $data['Patient_id'],
                'Practitioner_Received_id'      => $data['Practitioner_Received_id'],
                'Practitioner_Received_Name'    => $data['Practitioner_Received_Name'],
                'Practitioner_Lab_id'           => $data['Practitioner_Lab_id'],
                'Practitioner_Lab_Nama'         => $data['Practitioner_Lab_Nama'],
                'ServiceRequest_LabDay2_id'     => $data['ServiceRequest_LabDay2_id']
        ];

        return $this->replacePlaceholders($payload, $variables);
    }
}

