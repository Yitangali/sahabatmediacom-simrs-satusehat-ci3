<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Satusehat/Core/SatusehatPayload.php';

class GoalUpdateTujuanPerawatan extends SatusehatPayload
{
    protected $CI;
    //protected $config;

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('Satusehat/Core/SatusehatConfig');
        $CI->load->library('Satusehat/Core/SatusehatModel');
        $this->templatePath = APPPATH . 'libraries/Satusehat/Payloads/Goal/GoalUpdateTujuanPerawatan.json';
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
            "Goal_TujuanPerawatan"              => $data['Goal_TujuanPerawatan'],
            "Patient_id"                        => $data['Patient_id'],
            "Practitioner_id"                   => $data['Practitioner_id'],
            "Condition_KeluhanUtama"            => $data['Condition_KeluhanUtama']
        ];

        return $this->replacePlaceholders($payload, $variables);
    }
}

