<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Satusehat/Core/SatusehatPayload.php';

class ObservationKreatininCreateDay2 extends SatusehatPayload
{
    protected $CI;
    //protected $config;

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('Satusehat/Core/SatusehatConfig');
        $CI->load->library('Satusehat/Core/SatusehatModel');
        $this->templatePath = APPPATH . 'libraries/Satusehat/Payloads/Observation/ObservationKreatininCreateDay2.json';
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
                'Practitioner_Lab_id'           => $data['Practitioner_Lab_id'],
                'Specimen_Day2_id'              => $data['Specimen_Day2_id'],
                'ServiceRequest_LabDay2_id'     => $data['ServiceRequest_LabDay2_id']
        ];

        return $this->replacePlaceholders($payload, $variables);
    }
}

