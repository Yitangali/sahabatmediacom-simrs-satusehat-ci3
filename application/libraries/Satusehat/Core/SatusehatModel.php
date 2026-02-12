<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SatusehatModel {
    protected $CI;
    protected $config;
    protected $db;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('Satusehat/Core/SatusehatConfig');
        $this->config = $this->CI->satusehatconfig->get();
        $this->CI->load->database();
        $this->db = $this->CI->db;
    }

    public function getPatientId($nik) {
        $sql    = "SELECT ihs_number FROM patient WHERE nik = ? LIMIT 1";
        $query  = $this->db->query($sql, [$nik]);
        $row    = $query->row_array();

        return $row['ihs_number'] ?? null;
    }

    public function getPatientName($nik) {
        $sql    = "SELECT nama FROM patient WHERE nik = ? LIMIT 1";
        $query  = $this->db->query($sql, [$nik]);
        $row    = $query->row_array();

        return $row['nama'] ?? null;
    }

    public function getPractitionerId($nik) {
        $sql    = "SELECT ihs_number FROM practitioner WHERE nik = ? LIMIT 1";
        $query  = $this->db->query($sql, [$nik]);
        $row    = $query->row_array();

        return $row['ihs_number'] ?? null;
    }

    public function getPractitionerName($nik) {
        $sql    = "SELECT nama FROM practitioner WHERE nik = ? LIMIT 1";
        $query  = $this->db->query($sql, [$nik]);
        $row    = $query->row_array();

        return $row['nama'] ?? null;
    }

    public function getLocationId($nama) {
        $orgId  = $this->CI->satusehatconfig->get('Org_id');
        $sql    = "SELECT location_id FROM location WHERE org_id = ? AND nama = ? LIMIT 1";
        $query  = $this->db->query($sql, [$orgId, $nama]);
        $row    = $query->row_array();

        return $row['location_id'] ?? null;
    }
}