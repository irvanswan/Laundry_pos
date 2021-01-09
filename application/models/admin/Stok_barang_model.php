<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_barang_model extends CI_Model
{
    public function getStokBarang($id_entitas)
    {
        $query = "SELECT * FROM stok_barang WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }

    public function getJenisCuci($id_entitas)
    {
        $query = "SELECT * FROM jenis_cuci WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
    public function getPaketCuci($id_entitas)
    {
        $query = "SELECT * FROM paket_cuci WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
    public function getBahanCuci($id_entitas)
    {
        $query = "SELECT * FROM bahan_cuci WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }

    // ------------------------------------------- Insert Circle -------------------------------------------
    public function insertStokBarang($data)
    {
        $this->db->insert('stok_barang', $data);
        return $this->db->insert_id();
    }
    public function insertJenisCuci($data)
    {
        $this->db->insert('jenis_cuci', $data);
        return $this->db->insert_id();
    }
    public function insertPaketCuci($data)
    {
        $this->db->insert('paket_cuci', $data);
        return $this->db->insert_id();
    }
    public function insertBahanCuci($data)
    {
        $this->db->insert('bahan_cuci', $data);
        return $this->db->insert_id();
    }

    //---------------------------------------- Get Sum Stok Barang per Month Circle ------------------------------------
    public function getSumStokMonthly($id_entitas)
    {
        $query = "SELECT stok_barang.id_stok , SUM(stok_barang.total_harga_barang) AS stok_monthly, MONTH(stok_barang.tanggal_barang) bulan, DATE_FORMAT(stok_barang.tanggal_barang, '%M %Y') this_month, active
        FROM stok_barang
          WHERE
            stok_barang.id_user = $id_entitas
              GROUP BY MONTH(stok_barang.tanggal_barang)
              HAVING SUM(stok_barang.total_harga_barang) 
              LIMIT 12";

        $stokMonthly = $this->db->query($query)->result_array();

        return $stokMonthly;
    }
}
