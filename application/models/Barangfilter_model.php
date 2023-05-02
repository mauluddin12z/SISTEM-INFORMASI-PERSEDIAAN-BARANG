<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barangfilter_model extends CI_Model
{
    /*  Filter Dashboard </a> | Barang  */

    public function showallstok()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_transaksi.id_barang');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_transaksi.id_lokasi');
        $this->db->order_by('nama_barang asc');
        return $this->db->get()->result_array();
    }
    public function getStokBarangbyFilterJenis($jenis)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_transaksi.id_barang');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_transaksi.id_lokasi');
        $this->db->order_by('nama_barang asc');
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }

    public function getStokBarangbyFilterLokasi($lokasi)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_transaksi.id_barang');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_transaksi.id_lokasi');
        $this->db->order_by('nama_barang asc');
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }

    public function getStokBarangbyFilterJenisLokasi($jenis, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_transaksi.id_barang');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = tb_transaksi.id_lokasi');
        $this->db->order_by('nama_barang asc');
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }


    /*  Filter Barang Masuk  */
    public function showallBm()
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterStartEnddateLokasi($startdate, $enddate, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', $startdate);
        $this->db->where('tanggal_masuk <=', $enddate);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterStartEnddateJenis($startdate, $enddate, $jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', $startdate);
        $this->db->where('tanggal_masuk <=', $enddate);
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterStartEnddateJenisLokasi($startdate, $enddate, $jenis, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', $startdate);
        $this->db->where('tanggal_masuk <=', $enddate);
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterStartEnddate($startdate, $enddate)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', $startdate);
        $this->db->where('tanggal_masuk <=', $enddate);
        return $this->db->get()->result_array();
    }

    public function getBarangMasukbyFilterStartdate($startdate)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', $startdate);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterStartdateJenis($startdate, $jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', $startdate);
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterStartdateLokasi($startdate, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', $startdate);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterStartdateLokasiJenis($startdate, $lokasi, $jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', $startdate);
        $this->db->where('lokasi', $lokasi);
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterEnddate($enddate)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', '1945-20-20');
        $this->db->where('tanggal_masuk <=', $enddate);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterEnddateJenis($enddate, $jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', '1945-20-20');
        $this->db->where('tanggal_masuk <=', $enddate);
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterEnddateLokasi($enddate, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', '1945-20-20');
        $this->db->where('tanggal_masuk <=', $enddate);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterEnddateLokasiJenis($enddate, $lokasi, $jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('tanggal_masuk >=', '1945-20-20');
        $this->db->where('tanggal_masuk <=', $enddate);
        $this->db->where('lokasi', $lokasi);
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }

    public function getBarangMasukbyFilterLokasi($lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterJenis($jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }
    public function getBarangMasukbyFilterJenisLokasi($jenis, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_masuk.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_masuk.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->order_by('tanggal_masuk DESC');
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }


    /*  Filter Barang Keluar  */

    public function showallBk()
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartdate($startdate)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterEnddate($enddate)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', '1945-20-20');
        $this->db->where('tanggal_keluar <=', $enddate);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterLokasi($lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }
    public function getBarangKeluarbyFilterJenis($jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterKondisi($kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartEnddate($startdate, $enddate)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('tanggal_keluar <=', $enddate);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartdateLokasi($startdate, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartdateJenis($startdate, $jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartdateKondisi($startdate, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterEnddateLokasi($enddate, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', '1945-20-20');
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterEnddateJenis($enddate, $jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', '1945-20-20');
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterEnddateKondisi($enddate, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', '1945-20-20');
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterJenisLokasi($jenis, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterJenisKondisi($jenis, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('jenis', $jenis);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterLokasiKondisi($lokasi, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('lokasi', $lokasi);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartEnddateJenis($startdate, $enddate, $jenis)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartEnddateLokasi($startdate, $enddate, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartEnddateKondisi($startdate, $enddate, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartdateJenisLokasi($startdate, $jenis, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartdateJenisKondisi($startdate, $jenis, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('jenis', $jenis);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartdateLokasiKondisi($startdate, $lokasi, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('lokasi', $lokasi);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterEnddateJenisLokasi($enddate, $jenis, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', '1945-20-20');
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterEnddateJenisKondisi($enddate, $jenis, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', '1945-20-20');
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('jenis', $jenis);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterEnddateLokasiKondisi($enddate, $lokasi, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', '1945-20-20');
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('lokasi', $lokasi);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }
    public function getBarangKeluarbyFilterJenisLokasiKondisi($jenis, $lokasi, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartEnddateJenisLokasi($startdate, $enddate, $jenis, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartEnddateJenisKondisi($startdate, $enddate, $jenis, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('jenis', $jenis);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartEnddateLokasiKondisi($startdate, $enddate, $lokasi, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('lokasi', $lokasi);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterStartdateJenisLokasiKondisi($startdate, $jenis, $lokasi, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', $startdate);
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }

    public function getBarangKeluarbyFilterEnddateJenisLokasiKondisi($enddate, $jenis, $lokasi, $kondisi)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('tb_barang', 'tb_barang.id_barang = barang_keluar.id_barang');
        $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi = barang_keluar.id_lokasi');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_barang.id_jenis');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_barang = tb_barang.id_barang');
        $this->db->join('tb_kondisi', 'tb_kondisi.id_kondisi = barang_keluar.id_kondisi');
        $this->db->order_by('tanggal_keluar DESC');
        $this->db->where('tanggal_keluar >=', '1945-20-20');
        $this->db->where('tanggal_keluar <=', $enddate);
        $this->db->where('jenis', $jenis);
        $this->db->where('lokasi', $lokasi);
        $this->db->where('kondisi', $kondisi);
        return $this->db->get()->result_array();
    }
}
