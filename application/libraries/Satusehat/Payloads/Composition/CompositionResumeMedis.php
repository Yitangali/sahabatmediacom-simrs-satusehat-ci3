<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Satusehat/Core/SatusehatPayload.php';

class CompositionResumeMedis extends SatusehatPayload
{
    protected $CI;
    //protected $config;

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('Satusehat/Core/SatusehatConfig');
        $CI->load->library('Satusehat/Core/SatusehatModel');
        $this->templatePath = APPPATH . 'libraries/Satusehat/Payloads/Composition/CompositionResumeMedis.json';
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
            'Org_id' => $data['Org_id'],
            'Patient_id' => $data['Patient_id'],
            'Patient_Name' => $data['Patient_Name'],
            'Practitioner_id' => $data['Practitioner_id'],
            'Encounter_id' => $data['Encounter_id'],

            'Condition_KeluhanUtama' => $data['Condition_KeluhanUtama'],
            'Condition_KeluhanPenyerta' => $data['Condition_KeluhanPenyerta'],
            'Condition_RiwayatPenyakitPribadiTerdahulu' => $data['Condition_RiwayatPenyakitPribadiTerdahulu'],
            'Condition_RiwayatPenyakitPribadiSekarang' => $data['Condition_RiwayatPenyakitPribadiSekarang'],
            'FamilyMemberHistory_RiwayatPenyakitKeluarga' => $data['FamilyMemberHistory_RiwayatPenyakitKeluarga'],

            'AllergyIntolerance_Lingkungan' => $data['AllergyIntolerance_Lingkungan'],
            'AllergyIntolerance_Makanan' => $data['AllergyIntolerance_Makanan'],
            'AllergyIntolerance_Obat' => $data['AllergyIntolerance_Obat'],
            'AllergyIntolerance_Rad_id' => $data['AllergyIntolerance_Rad_id'],

            'MedicationStatement_id' => $data['MedicationStatement_id'],

            'Observation_TDSistolik' => $data['Observation_TDSistolik'],
            'Observation_TDDiastolik' => $data['Observation_TDDiastolik'],
            'Observation_SuhuTubuh' => $data['Observation_SuhuTubuh'],
            'Observation_DenyutJantung' => $data['Observation_DenyutJantung'],
            'Observation_Pernapasan' => $data['Observation_Pernapasan'],
            'Observation_Kesadaran' => $data['Observation_Kesadaran'],
            'Antrop_BB' => $data['Antrop_BB'],
            'Antrop_TB' => $data['Antrop_TB'],
            'Antrop_Luas' => $data['Antrop_Luas'],

            'PemeriksaanFisik_Kepala' => $data['PemeriksaanFisik_Kepala'],
            'PemeriksaanFisik_Mata' => $data['PemeriksaanFisik_Mata'],

            'StatusPsikologis' => $data['StatusPsikologis'],
            'Skor_ADL' => $data['Skor_ADL'],

            'RiwayatPerjalananPenyakit' => $data['RiwayatPerjalananPenyakit'],
            'Goal_TujuanPerawatan' => $data['Goal_TujuanPerawatan'],
            'CarePlan_RencanaRawat' => $data['CarePlan_RencanaRawat'],
            'CarePlan_Instruksi' => $data['CarePlan_Instruksi'],

            'ServiceRequest_LabDay2_id' => $data['ServiceRequest_LabDay2_id'],
            'Procedure_StatusPuasa_Day2_id' => $data['Procedure_StatusPuasa_Day2_id'],
            'Specimen_Day2_id' => $data['Specimen_Day2_id'],
            'Observation_LabDay2_id' => $data['Observation_LabDay2_id'],
            'DiagnosticReport_Day2_id' => $data['DiagnosticReport_Day2_id'],

            'ServiceRequest_Rad_id' => $data['ServiceRequest_Rad_id'],
            'Procedure_Rad_id' => $data['Procedure_Rad_id'],
            'Observation_Rad_id' => $data['Observation_Rad_id'],
            'ImagingStudy_id' => $data['ImagingStudy_id'],
            'Observation_RadResult_id' => $data['Observation_RadResult_id'],
            'DiagnosticReport_Rad_id' => $data['DiagnosticReport_Rad_id'],

            'Rasional_Klinis' => $data['Rasional_Klinis'],
            'Diagnosis_Primer' => $data['Diagnosis_Primer'],
            'Diagnosis_Sekunder' => $data['Diagnosis_Sekunder'],
            'Penilaian_Risiko' => $data['Penilaian_Risiko'],

            'Procedure_EKG' => $data['Procedure_EKG'],
            'Observation_EKG' => $data['Observation_EKG'],
            'Procedure_Hemodialisis' => $data['Procedure_Hemodialisis'],

            'MedicationRequest_id_1A' => $data['MedicationRequest_id_1A'],
            'MedicationDispense_id_1A' => $data['MedicationDispense_id_1A'],
            'MedicationAdministration_id_1A' => $data['MedicationAdministration_id_1A'],
            'MedicationRequest_id_1B' => $data['MedicationRequest_id_1B'],
            'MedicationDispense_id_1B' => $data['MedicationDispense_id_1B'],
            'MedicationAdministration_id_1B' => $data['MedicationAdministration_id_1B'],

            'MedicationRequest_id_2A' => $data['MedicationRequest_id_2A'],
            'MedicationDispense_id_2A' => $data['MedicationDispense_id_2A'],
            'MedicationAdministration_id_2A' => $data['MedicationAdministration_id_2A'],
            'MedicationRequest_id_2B' => $data['MedicationRequest_id_2B'],
            'MedicationDispense_id_2B' => $data['MedicationDispense_id_2B'],
            'MedicationAdministration_id_2B' => $data['MedicationAdministration_id_2B'],

            'MedicationRequest_id_3A' => $data['MedicationRequest_id_3A'],
            'MedicationDispense_id_3A' => $data['MedicationDispense_id_3A'],
            'MedicationAdministration_id_3A' => $data['MedicationAdministration_id_3A'],
            'MedicationRequest_id_3B' => $data['MedicationRequest_id_3B'],
            'MedicationDispense_id_3B' => $data['MedicationDispense_id_3B'],
            'MedicationAdministration_id_3B' => $data['MedicationAdministration_id_3B'],

            'MedicationRequest_id_4D' => $data['MedicationRequest_id_4D'],
            'MedicationDispense_id_4D' => $data['MedicationDispense_id_4D'],

            'NutritionOrder_Diet' => $data['NutritionOrder_Diet'],
            'Procedure_Edukasi' => $data['Procedure_Edukasi'],

            'Prognosis_Pulang' => $data['Prognosis_Pulang'],
            'KondisiMeninggalkanRS' => $data['KondisiMeninggalkanRS'],

            'Observation_KriteriaRencanaPemulangan' => $data['Observation_KriteriaRencanaPemulangan'],
            'CarePlan_PerencanaanPemulanganPasien' => $data['CarePlan_PerencanaanPemulanganPasien'],
            'ServiceRequest_Kontrol' => $data['ServiceRequest_Kontrol'],
        ];


        return $this->replacePlaceholders($payload, $variables);
    }
}

