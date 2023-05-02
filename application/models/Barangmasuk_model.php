<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barangmasuk_model extends CI_Model
{

    public function getBarangMasuk()
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->order_by('tanggal_masuk DESC');
        return $this->db->get()->result_array();
    }

    public function getBarangMasukToday()
    {
        $todaydate = date('y-m-d');
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->where('tanggal_masuk >=', $todaydate);
        $this->db->order_by('tanggal_masuk desc');
        return $this->db->get()->result_array();
    }

    public function createCodeBm()
    {
        $this->db->select('RIGHT(barang_masuk.id_bm,4) as kode', FALSE);
        $this->db->order_by('id_bm', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang_masuk');
        if ($query->num_rows() <> 0) {
            //cek kode   
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "BM-" . $kodemax;
        return $kodejadi;
    }

    public function getBarangMasukById($dataTbm)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->where('id_bm', $dataTbm);
        return $this->db->get()->row_array();
    }
    public function getBarangMasukById1($dataEbm)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->where('id_bm', $dataEbm);
        return $this->db->get()->row_array();
    }

    public function tambahBarangMasuk()
    {
        $data = [
            "id_bm" => $dataTbm = $this->Barangmasuk_model->createCodeBm(),
            "id_barang" => $this->input->post("id_barang", true),
            "tanggal_masuk" => $this->input->post("tanggal_masuk", true),
            "id_lokasi" => $this->input->post("id_lokasi", true),
            "jumlahmasuk" => $this->input->post("jumlahmasuk", true),
        ];
        $this->db->insert('barang_masuk', $data);

        $id_user = $this->session->userdata('id_user');
        $namadata = $this->Barangmasuk_model->getBarangMasukById($dataTbm);
        $data3 = [
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Tambah",
            "deskripsi" => "Tambah Barang Masuk [ " . $namadata['id_bm'] . ", " . $namadata['nama_barang'] . ", Lokasi " . $namadata['lokasi'] . " ], dengan Jumlah Masuk " . $namadata['jumlahmasuk'],
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log', $data3);
    }

    public function editDataBm()
    {

        $data = [
            "id_barang" => $this->input->post("id_barang", true),
            "tanggal_masuk" => $this->input->post("tanggal_masuk", true),
            "id_lokasi" => $this->input->post("id_lokasi", true),
            "jumlahmasuk" => $this->input->post("jumlahmasuk", true),
        ];
        $this->db->where('id_bm', $dataEbm = $this->input->post('id_bm'));
        $this->db->update('barang_masuk', $data);
        $id_user = $this->session->userdata('id_user');
        $namadata = $this->Barangmasuk_model->getBarangMasukById1($dataEbm);
        $data2 = [
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Edit",
            "deskripsi" => "Edit Barang Masuk [ " . $namadata['id_bm'] . ", " . $namadata['nama_barang'] . ", Lokasi " . $namadata['lokasi'] . " ], Jumlah masuk menjadi " . $namadata['jumlahmasuk'],
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log', $data2);
    }

    public function hapusBarangMasuk($id_bm)
    {
        $namadata = $this->db->query("SELECT * FROM barang_masuk JOIN tb_barang ON tb_barang.id_barang = barang_masuk.id_barang where id_bm='$id_bm'")->row_array();
        $this->db->where('id_bm', $id_bm);
        $this->db->delete('barang_masuk');
        $id_user = $this->session->userdata('id_user');
        $data2 = [
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Hapus",
            "deskripsi" => "Hapus Barang Masuk [ " . $namadata['id_bm'] . ", " . $namadata['nama_barang'] . ", Lokasi " . $namadata['lokasi'] . " ], dengan Jumlah Masuk " . $namadata['jumlahmasuk'],
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log', $data2);
    }

    public function getJumTBrgMasuk()
    {
        return $this->db->query("SELECT SUM(jumlahmasuk) AS jumlahmasuk FROM barang_masuk")->result_array();
    }

    public function tanggalbm()
    {
        return $this->db->query("SELECT MAX(tanggal_masuk) AS maxtgl, MIN(tanggal_masuk) AS mintgl FROM barang_masuk")->result_array();
    }
}
