<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();

class Barang_keluar extends CI_Controller
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
        $data['user_login'] = $this->DataUser_model->getUserLogin();
        $data['tb_lokasi'] = $this->Lokasi_model->getAllLokasi();
        $data['tb_barang'] = $this->Barang_model->getBarang();
        $data['tb_jenis'] = $this->Jenis_model->getJenis();
        $data['tb_kondisi'] = $this->Barangkeluar_model->getKondisi();
        $data['tb_transaksi'] = $this->Transaksi_model->getTransaksi();
        $data['judul'] = 'Halaman Barang Keluar';
        $data['barang_keluar'] = $this->Barangkeluar_model->getBarangKeluar();
        $this->load->view('templates/header', $data);
        $this->load->view('barang_keluar/index');
        $this->load->view('templates/footer');
    }


    public function proses_edit_keluar($id_bk)
    {
        $data['judul'] = 'Halaman Transaksi Barang Keluar';
        $data['barang_keluar'] = $this->Barangkeluar_model->getBarangKeluar($id_bk);
        $data['tb_barang'] = $this->Barang_model->getBarang();
        $data['tb_kondisi'] = $this->Barangkeluar_model->getKondisi();
        $this->Barangkeluar_model->editDataBk($id_bk);
        $this->load->view('templates/header');
        $this->load->view('barang_keluar/index', $data);
        $this->load->view('templates/footer');
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
        Data <strong>Berhasil</strong> diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
        redirect('barang_keluar');
    }


    public function hapusBarangkeluar($id_bk)
    {
        $this->Barangkeluar_model->hapusBarangKeluar($id_bk);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
        Data <strong>Berhasil</strong> Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
        redirect('barang_keluar');
    }
    public function filter_bk()
    {
        $data['user_login'] = $this->DataUser_model->getUserLogin();
        $data['tb_lokasi'] = $this->Lokasi_model->getAllLokasi();
        $data['tb_barang'] = $this->Barang_model->getBarang();
        $data['tb_jenis'] = $this->Jenis_model->getJenis();
        $data['tb_kondisi'] = $this->Barangkeluar_model->getKondisi();
        $data['judul'] = 'Laporan Barang masuk';
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
    }
}
