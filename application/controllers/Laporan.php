<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
          Silahkan <strong>login</strong> terlebih dahulu!
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('404');
    }

    public function laporan_stok()
    {
        $userlogin = $this->DataUser_model->getUserLogin();
        $data['tb_barang'] = $this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 3) {
            $data['user_login']    = $this->DataUser_model->getUserLogin();
            $data['subkoordinatorbmn']    = $this->DataUser_model->getkoordinatorbmn();
            $data['tb_lokasi']  = $this->Lokasi_model->getAllLokasi();
            $data['judul']      = 'Laporan Stok Barang';
            $data['tb_barang']  = $this->Barang_model->getBarang();
            $data['tb_transaksi'] = $this->Transaksi_model->getTransaksi();
            $data['tb_jenis']   = $this->Jenis_model->getJenis();
            $jenis              = $this->input->post('jenis');
            $this->load->view('templates/header', $data);
            $this->load->view('laporan/laporan_stok');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('404');
        }
    }

    public function laporan_keluar()
    {
        $userlogin = $this->DataUser_model->getUserLogin();
        $data['tb_barang'] = $this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 3) {
            $data['user_login']    = $this->DataUser_model->getUserLogin();
            $data['subkoordinatorbmn']    = $this->DataUser_model->getkoordinatorbmn();
            $data['tb_lokasi']     = $this->Lokasi_model->getAllLokasi();
            $data['tb_barang']     = $this->Barang_model->getBarang();
            $data['tb_jenis']      = $this->Jenis_model->getJenis();
            $data['tanggalbk']        = $this->Barangkeluar_model->tanggalbk();
            $data['barang_keluar'] = $this->Barangkeluar_model->getBarangKeluar();
            $data['tb_kondisi'] = $this->Barangkeluar_model->getKondisi();
            $data['tb_transaksi'] = $this->Transaksi_model->getTransaksi();
            $data['judul']         = 'Laporan Barang Keluar';
            $this->load->view('templates/header', $data);
            $this->load->view('laporan/laporan_keluar');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('404');
        }
    }

    public function laporan_masuk()
    {
        $userlogin = $this->DataUser_model->getUserLogin();
        $data['tb_barang'] = $this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 3) {
            $data['user_login']   = $this->DataUser_model->getUserLogin();
            $data['tb_lokasi']    = $this->Lokasi_model->getAllLokasi();
            $data['subkoordinatorbmn']    = $this->DataUser_model->getkoordinatorbmn();
            $data['tb_barang']    = $this->Barang_model->getBarang();
            $data['tb_jenis']     = $this->Jenis_model->getJenis();
            $data['tanggalbm']    = $this->Barangmasuk_model->tanggalbm();
            $data['barang_masuk'] = $this->Barangmasuk_model->getBarangMasuk();
            $data['tb_transaksi'] = $this->Transaksi_model->getTransaksi();
            $data['judul']        = 'Laporan Barang Masuk';
            $this->load->view('templates/header', $data);
            $this->load->view('laporan/laporan_masuk');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('404');
        }
    }

    public function filter_stok()
    {
        $userlogin = $this->DataUser_model->getUserLogin();
        $data['tb_barang'] = $this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 3) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['tb_lokasi']  = $this->Lokasi_model->getAllLokasi();
            $data['subkoordinatorbmn']    = $this->DataUser_model->getkoordinatorbmn();
            $data['judul']      = 'Laporan Stok Barang';
            $data['tb_jenis']   = $this->Jenis_model->getJenis();
            $jenis = $this->input->post('jenis');
            $lokasi = $this->input->post('lokasi');
            if ($jenis == null and $lokasi == null) {
                $data['tb_transaksi'] = $this->Transaksi_model->getTransaksi();
            } elseif ($jenis and $lokasi == null) {
                $data['tb_transaksi'] = $this->Barangfilter_model->getStokBarangbyFilterJenis($jenis);
            } elseif ($lokasi and $jenis == null) {
                $data['tb_transaksi'] = $this->Barangfilter_model->getStokBarangbyFilterLokasi($lokasi);
            } elseif ($jenis and $lokasi) {
                $data['tb_transaksi'] = $this->Barangfilter_model->getStokBarangbyFilterJenisLokasi($jenis, $lokasi);
            }
            $this->load->view('templates/header', $data);
            $this->load->view('laporan/laporan_stok');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('404');
        }
    }

    public function filter_bm()
    {
        $userlogin = $this->DataUser_model->getUserLogin();
        $data['tb_barang'] = $this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 3) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['tb_lokasi']  = $this->Lokasi_model->getAllLokasi();
            $data['subkoordinatorbmn']    = $this->DataUser_model->getkoordinatorbmn();
            $data['tb_barang']  = $this->Barang_model->getBarang();
            $data['tanggalbm']    = $this->Barangmasuk_model->tanggalbm();
            $data['tb_jenis']   = $this->Jenis_model->getJenis();
            $data['judul']      = 'Laporan Barang Masuk';
            $startdate = $this->input->post('daritanggal');
            $enddate = $this->input->post('sampaitanggal');
            $lokasi = $this->input->post('lokasi');
            $jenis = $this->input->post('jenis');
            if ($startdate == NULL and $enddate == NULL and $lokasi == null and $jenis == null) {
                $data['barang_masuk'] = $this->Barangfilter_model->showallBm();
                $this->load->view('templates/header', $data);
                $this->load->view('laporan/laporan_masuk');
                $this->load->view('templates/footer');
            } else {
                $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterStartEnddate($startdate, $enddate);
                if ($startdate and $enddate and $lokasi and $jenis == null) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterStartEnddateLokasi($startdate, $enddate, $lokasi);
                } elseif ($startdate and $enddate and $lokasi == null and $jenis) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterStartEnddateJenis($startdate, $enddate, $jenis);
                } elseif ($startdate and $enddate and $lokasi and $jenis) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterStartEnddateJenisLokasi($startdate, $enddate, $jenis, $lokasi);
                } elseif ($startdate and $enddate == NULL and $lokasi == null and $jenis == null) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterStartdate($startdate);
                } elseif ($startdate and $jenis and $enddate == NULL and $lokasi == null) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterStartdateJenis($startdate, $jenis);
                } elseif ($startdate and $lokasi and $enddate == NULL and $jenis == null) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterStartdateLokasi($startdate, $lokasi);
                } elseif ($startdate and $lokasi and $enddate == NULL and $jenis) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterStartdateLokasi($startdate, $lokasi, $jenis);
                } elseif ($enddate and $startdate == null and $lokasi == null and $jenis == null) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterEnddate($enddate);
                } elseif ($enddate and $jenis and $startdate == null and $lokasi == null) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterEnddateJenis($enddate, $jenis);
                } elseif ($startdate == null and $lokasi and $enddate and $jenis == null) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterEnddateLokasi($enddate, $lokasi);
                } elseif ($startdate == null and $lokasi and $enddate and $jenis) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterEnddateLokasi($enddate, $lokasi, $jenis);
                } elseif ($lokasi and $jenis and $startdate == null and $enddate == NULL) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterJenisLokasi($jenis, $lokasi);
                } elseif ($startdate == null and $jenis == null and $enddate == NULL and $lokasi) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterLokasi($lokasi);
                } elseif ($startdate == null and $jenis and $enddate == NULL and $lokasi == null) {
                    $data['barang_masuk'] = $this->Barangfilter_model->getBarangMasukbyFilterJenis($jenis);
                }
                $this->load->view('templates/header', $data);
                $this->load->view('laporan/laporan_masuk');
                $this->load->view('templates/footer');
            }
        } else {
            $this->load->view('404');
        }
    }

    public function filter_bk()
    {

        $userlogin = $this->DataUser_model->getUserLogin();
        $data['tb_barang'] = $this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 3) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['tb_lokasi']  = $this->Lokasi_model->getAllLokasi();
            $data['subkoordinatorbmn']    = $this->DataUser_model->getkoordinatorbmn();
            $data['tb_barang']  = $this->Barang_model->getBarang();
            $data['tb_jenis']   = $this->Jenis_model->getJenis();
            $data['tb_kondisi'] = $this->Barangkeluar_model->getKondisi();
            $data['tanggalbk']    = $this->Barangkeluar_model->tanggalbk();
            $data['judul']      = 'Laporan Barang Keluar';
            $startdate = $this->input->post('daritanggal');
            $enddate = $this->input->post('sampaitanggal');
            $lokasi = $this->input->post('lokasi');
            $jenis = $this->input->post('jenis');
            $kondisi = $this->input->post('kondisi');
            if ($startdate == NULL and $enddate == NULL and $jenis == NULL and $lokasi == NULL and $kondisi == NULL) {
                redirect('barang_keluar/index');
                $data['barang_keluar'] = $this->Barangfilter_model->showallBk();
            } elseif ($startdate and $enddate == NULL and $jenis == NULL and $lokasi == NULL and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartdate($startdate);
            } elseif ($startdate == NULL and $enddate and $jenis == NULL and $lokasi == NULL and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterEnddate($enddate);
            } elseif ($startdate == NULL and $enddate == NULL and $jenis and $lokasi == NULL and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterJenis($jenis);
            } elseif ($startdate == NULL and $enddate == NULL and $jenis == NULL and $lokasi and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterLokasi($lokasi);
            } elseif ($startdate == NULL and $enddate == NULL and $jenis == NULL and $lokasi == NULL and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterKondisi($kondisi);
            } elseif ($startdate and $enddate and $jenis == NULL and $lokasi == NULL and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartEnddate($startdate, $enddate);
            } elseif ($startdate and $enddate == NULL and $jenis == NULL and $lokasi and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartdateLokasi($startdate, $lokasi);
            } elseif ($startdate and $enddate == NULL and $jenis  == NULL and $lokasi == NULL and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartdateKondisi($startdate, $kondisi);
            } elseif ($startdate == NULL and $enddate and $jenis and $lokasi == NULL and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterEnddateJenis($enddate, $jenis);
            } elseif ($startdate == NULL and $enddate and $jenis and $lokasi == NULL and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterEnddateLokasi($enddate, $lokasi);
            } elseif ($startdate == NULL and $enddate and $jenis == NULL and $lokasi == NULL and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterEnddateKondisi($enddate, $kondisi);
            } elseif ($startdate == NULL and $enddate == NULL and $jenis and $lokasi and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterJenisLokasi($jenis, $lokasi);
            } elseif ($startdate == NULL and $enddate == NULL and $jenis and $lokasi == NULL and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterJenisKondisi($jenis, $kondisi);
            } elseif ($startdate == NULL and $enddate == NULL and $jenis == NULL and $lokasi and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterLokasiKondisi($lokasi, $kondisi);
            } elseif ($startdate and $enddate and $jenis and $lokasi == NULL and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartEnddateJenis($startdate, $enddate, $jenis);
            } elseif ($startdate and $enddate and $jenis == NULL and $lokasi and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartEnddateLokasi($startdate, $enddate, $lokasi);
            } elseif ($startdate and $enddate and $jenis == NULL and $lokasi == NULL and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartEnddateKondisi($startdate, $enddate, $kondisi);
            } elseif ($startdate and $enddate == NULL and $jenis and $lokasi and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartdateJenisLokasi($startdate, $jenis, $lokasi);
            } elseif ($startdate and $enddate == NULL and $jenis and $lokasi == NULL and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartdateJenisKondisi($startdate, $jenis, $kondisi);
            } elseif ($startdate and $enddate == NULL and $jenis == NULL and $lokasi and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartdateLokasiKondisi($startdate, $lokasi, $kondisi);
            } elseif ($startdate == NULL and $enddate and $jenis and $lokasi and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterEnddateJenisLokasi($enddate, $jenis, $lokasi);
            } elseif ($startdate == NULL and $enddate and $jenis and $lokasi == NULL and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterEnddateJenisKondisi($enddate, $jenis, $kondisi);
            } elseif ($startdate == NULL and $enddate and $jenis == NULL and $lokasi and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterEnddateLokasiKondisi($enddate, $lokasi, $kondisi);
            } elseif ($startdate == NULL and $enddate == NULL and $jenis and $lokasi and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterJenisLokasiKondisi($jenis, $lokasi, $kondisi);
            } elseif ($startdate and $enddate and $jenis and $lokasi and $kondisi == NULL) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartEnddateJenisLokasi($startdate, $enddate, $jenis, $lokasi);
            } elseif ($startdate and $enddate and $jenis and $lokasi  == NULL and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartEnddateJenisKondisi($startdate, $enddate, $jenis, $kondisi);
            } elseif ($startdate and $enddate and $jenis  == NULL and $lokasi and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartEnddateLokasiKondisi($startdate, $enddate, $lokasi, $kondisi);
            } elseif ($startdate and $enddate == NULL and $jenis and $lokasi and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterStartdateJenisLokasiKondisi($startdate, $jenis, $lokasi, $kondisi);
            } elseif ($startdate == NULL and $enddate and $jenis and $lokasi and $kondisi) {
                $data['barang_keluar'] = $this->Barangfilter_model->getBarangKeluarbyFilterEnddateJenisLokasiKondisi($enddate, $jenis, $lokasi, $kondisi);
            }
            $this->load->view('templates/header', $data);
            $this->load->view('barang_keluar/index');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('404');
        }
    }
}
