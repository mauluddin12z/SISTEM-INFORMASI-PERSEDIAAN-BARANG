<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Barang_masuk extends CI_Controller
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
        $data['judul'] = 'Halaman Barang Masuk';
        $data['barang_masuk'] = $this->Barangmasuk_model->getBarangMasuk();
        $this->load->view('templates/header', $data);
        $this->load->view('barang_masuk/index');
        $this->load->view('templates/footer');
    }


    public function proses_edit_masuk($id_bm)
    {
        $data['tb_barang'] = $this->Barang_model->getBarang();
        $data['judul'] = 'Halaman Edit';
        $data['barang_masuk'] = $this->Barangmasuk_model->getBarangMasukById($id_bm);
        $data['code_bm'] = $this->Barangmasuk_model->createCodeBm();
        $this->Barangmasuk_model->editDataBm($id_bm);
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
        Data <strong>Berhasil</strong> diubah!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
        redirect('barang_masuk');
    }

    public function hapusBarangMasuk($id_bm)
    {
        $this->Barangmasuk_model->hapusBarangMasuk($id_bm);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
      Data <strong>Berhasil</strong> Dihapus!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
        redirect('barang_masuk');
    }

    public function filter_bm()
    {
        $data['user_login'] = $this->DataUser_model->getUserLogin();
        $data['tb_lokasi'] = $this->Lokasi_model->getAllLokasi();
        $data['tb_barang'] = $this->Barang_model->getBarang();
        $data['tb_jenis'] = $this->Jenis_model->getJenis();
        $data['judul'] = 'Laporan Barang masuk';
        $startdate = $this->input->post('daritanggal');
        $enddate = $this->input->post('sampaitanggal');
        $lokasi = $this->input->post('lokasi');
        $jenis = $this->input->post('jenis');
        if ($startdate == NULL and $enddate == NULL and $lokasi == null and $jenis == null) {
            redirect('barang_masuk/index');
            $data['barang_masuk'] = $this->Barangfilter_model->showallBm();
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
            $this->load->view('barang_masuk/index');
            $this->load->view('templates/footer');
        }
    }
}
