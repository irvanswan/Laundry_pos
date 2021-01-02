<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_user_model extends CI_Model
{
    public function getManajemenUser($id_entitas)
    {
        $query = "SELECT * FROM user WHERE user.id_entitas = $id_entitas AND user.role_id = 2";
        return $this->db->query($query)->result_array();
    }
    public function getIdUser($id)
    {
        $query = "SELECT * FROM user WHERE user.id = $id";
        return $this->db->query($query)->row_array();
    }
}
