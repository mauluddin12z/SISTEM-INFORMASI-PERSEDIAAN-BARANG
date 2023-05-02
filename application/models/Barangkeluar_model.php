<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barangkeluar_model extends CI_Model
{

    public function getBarangKeluar()
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->order_by('tanggal_keluar DESC');
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarToday()
    {
        $todaydate = date('y-m-d');
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->where('tanggal_keluar >=', $todaydate);
        $this->db->order_by('tanggal_keluar desc');

        return $this->db->get()->result_array();
    }

    public function getKondisi()
    {
        $this->db->select('*');
        $this->db->from('tb_kondisi');
        return $this->db->get()->result_array();
    }


    public function createCodeBk()
    {
        $this->db->select('RIGHT(barang_keluar.id_bk,4) as kode', FALSE);
        $this->db->order_by('id_bk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang_keluar');
        if ($query->num_rows() <> 0) {
            //cek kode   
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "BK-" . $kodemax;
        return $kodejadi;
    }

    public function getBarangKeluarById($dataTbk)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->where('id_bk', $dataTbk);
        return $this->db->get()->row_array();
    }
    public function getBarangKeluarById1($dataEbk)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->where('id_bk', $dataEbk);
        return $this->db->get()->row_array();
    }

    public function tambahBarangKeluar()
    {
        $x = $this->input->post("tanggal_rusakhilang", false);
        $tanggal_rusakhilang = $x == NULL ? NULL : $x;
        $data = [
            "id_bk" => $dataTbk = $this->Barangkeluar_model->createCodeBk(),
            "id_barang" => $this->input->post("id_barang", true),
            "tanggal_keluar" => $this->input->post("tanggal_keluar", true),
            "id_lokasi" => $this->input->post("id_lokasi", true),
            "jumlahkeluar" => $this->input->post("jumlahkeluar", true),
            "penerima" => $this->input->post("penerima", true),
            "id_kondisi" => $this->input->post("id_kondisi", true),
            "tanggal_rusakhilang" => $tanggal_rusakhilang
        ];
        $this->db->insert('barang_keluar', $data);

        $id_user = $this->session->userdata('id_user');
        $namadata = $this->Barangkeluar_model->getBarangKeluarById($dataTbk);
        $data2 = [
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Tambah",
            "deskripsi" => "Tambah Barang Keluar [ " . $namadata['id_bk'] . ", " . $namadata['nama_barang'] . ", Lokasi " . $namadata['lokasi'] . " ], dengan Jumlah Keluar " . $namadata['jumlahkeluar'] . ", Kondisi " . $namadata['kondisi'],
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log', $data2);
    }

    public function editDataBk()
    {
        $x = $this->input->post("tanggal_rusakhilang", false);
        $tanggal_rusakhilang = $x == NULL ? NULL : $x;
        $data = [
            "id_barang" => $this->input->post("id_barang", true),
            "tanggal_keluar" => $this->input->post("tanggal_keluar", true),
            "id_lokasi" => $this->input->post("id_lokasi", true),
            "jumlahkeluar" => $this->input->post("jumlahkeluar", true),
            "penerima" => $this->input->post("penerima", true),
            "id_kondisi" => $this->input->post("id_kondisi", true),
            "tanggal_rusakhilang" => $tanggal_rusakhilang
        ];
        $this->db->where('id_bk', $dataEbk = $this->input->post('id_bk'));
        $this->db->update('barang_keluar', $data);
        $id_user = $this->session->userdata('id_user');
        $namadata = $this->Barangkeluar_model->getBarangKeluarById($dataEbk);
        $data2 = [
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Edit",
            "deskripsi" => "Edit Barang Keluar [ " . $namadata['id_bk'] . ", " . $namadata['nama_barang'] . ", Lokasi " . $namadata['lokasi'] . " ], dengan Jumlah Keluar " . $namadata['jumlahkeluar'] . ", Kondisi " . $namadata['kondisi'],
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log', $data2);
    }

    public function hapusBarangKeluar($id_bk)
    {
        $namadata = $this->db->query("SELECT * FROM barang_keluar JOIN tb_barang ON tb_barang.id_barang = barang_keluar.id_barang where id_bk='$id_bk'")->row_array();
        $this->db->where('id_bk', $id_bk);
        $this->db->delete('barang_keluar');
        $id_user = $this->session->userdata('id_user');
        $data2 = [
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Hapus",
            "deskripsi" => "Hapus Barang Keluar [ " . $namadata['id_bk'] . ", " . $namadata['nama_barang'] . ", Lokasi " . $namadata['lokasi'] . " ], dengan Jumlah Keluar " . $namadata['jumlahkeluar'] . ", Kondisi " . $namadata['kondisi'],
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log', $data2);
    }


    public function getJumTBrgKeluar()
    {
        return $this->db->query("SELECT SUM(jumlahkeluar) AS jumlahkeluar FROM barang_keluar")->result_array();
    }

    public function tanggalbk()
    {
        return $this->db->query("SELECT MAX(tanggal_keluar) AS maxtgl, MIN(tanggal_keluar) AS mintgl FROM barang_keluar")->result_array();
    }
}
