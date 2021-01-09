<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_pegawai_model extends CI_Model
{
    public function getDataAbsen($id_entitas)
    {
        $query = "SELECT * FROM absensi_pegawai WHERE absensi_pegawai.id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
}
