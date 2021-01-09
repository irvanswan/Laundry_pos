<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pemesanan_model extends CI_Model
{
    public function getDataPemesanan($id_entitas, $nama_customer)
    {
        $query = "SELECT * FROM data_pemesanan WHERE data_pemesanan.id_user = $id_entitas AND data_pemesanan.nama_customer = '$nama_customer'";
        return $this->db->query($query)->row_array();
    }
    public function getDataAllPemesanan($id_entitas)
    {
        $query = "SELECT * FROM data_pemesanan WHERE data_pemesanan.id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
}
