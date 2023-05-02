<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Transaksi_model extends CI_Model
{
    public function getTransaksi()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_transaksi.id_barang');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_transaksi.id_lokasi');
        $this->db->order_by("nama_barang", "asc");

        return $this->db->get()->result_array();
    }
    

    public function cekstok()
    {
        return $this->db->query("SELECT stok FROM tb_transaksi")->result_array();
    }
}
