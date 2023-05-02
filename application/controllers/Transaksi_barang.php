<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Transaksi_barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
        Silahkan <strong>login</strong> terlebih dahulu!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('auth');
		}
	}
	public function index()
	{
		$userlogin = $this->DataUser_model->getUserLogin();
		if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 2) {
			$data['user_login'] = $this->DataUser_model->getUserLogin();
			$data['tb_lokasi'] = $this->Lokasi_model->getAllLokasi();
			$data['judul'] = 'Halaman Transaksi Barang';
			$data['tb_barang'] = $this->Barang_model->getBarang();
			$data['tb_transaksi'] = $this->Transaksi_model->getTransaksi();
			$data['tb_jenis'] = $this->Jenis_model->getJenis();
			$data['tb_kondisi'] = $this->Barangkeluar_model->getKondisi();
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi_barang/index');
			$this->load->view('templates/footer');
		} else {
			$this->load->view('404');
		}
	}


	public function filter_stok()
	{
		$userlogin = $this->DataUser_model->getUserLogin();
		if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 2) {
			$data['user_login'] = $this->DataUser_model->getUserLogin();
			$data['tb_lokasi'] = $this->Lokasi_model->getAllLokasi();
			$data['tb_barang'] = $this->Barang_model->getBarang();
			$data['judul'] = 'Halaman Transaksi';
			$data['tb_barang'] = $this->Barang_model->getBarang();
			$data['tb_jenis'] = $this->Jenis_model->getJenis();
			$data['tb_transaksi'] = $this->Transaksi_model->getTransaksi();
			$data['tb_kondisi'] = $this->Barangkeluar_model->getKondisi();
			$jenis = $this->input->post('jenis');
			$lokasi = $this->input->post('lokasi');
			if ($jenis == null and $lokasi == null) {
				$data['tb_transaksi'] = $this->Transaksi_model->getTransaksi();
			} elseif ($jenis and $lokasi == null) {
				$data['tb_transaksi'] = $this->Barangfilter_model->getStokBarangbyFilterJenis($jenis);
			} elseif ($lokasi and $jenis == null) {
				$data['tb_transaksi'] = $this->Barangfilter_model->getStokBarangbyFilterLokasi($lokasi);
			}
			  elseif ($jenis and $lokasi) {
				$data['tb_transaksi'] = $this->Barangfilter_model->getStokBarangbyFilterJenisLokasi($jenis, $lokasi);
			}
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi_barang/index');
			$this->load->view('templates/footer');
		} else {
			$this->load->view('404');
		}
	}

	public function proses_masuk()
	{
		$userlogin = $this->DataUser_model->getUserLogin();
		if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 2) {
			$data['tb_barang'] = $this->Barang_model->getBarang();
			$id_barang = $this->input->post('id_barang');
			if ($id_barang == NULL) {
				redirect('transaksi_barang');
			} else {
				$data['barang_masuk'] = $this->Barangmasuk_model->getBarangMasuk();
				$data['tb_barang'] = $this->Barang_model->getBarang();
				$data['tb_barang'] = $this->Jenis_model->getJenis();
				$data['tb_kondisi'] = $this->Barangkeluar_model->getKondisi();
				$id_bm = $this->input->post('id_bm');
				$sqlcek = $this->db->query("SELECT id_bm FROM barang_masuk where id_bm='$id_bm'");
				$cek_idbm = $sqlcek->num_rows();
				$this->Barangmasuk_model->tambahBarangMasuk();
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
			Data <strong>Berhasil</strong> Dimasukkan!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('transaksi_barang');
			}
		} else {
			$this->load->view('404');
		}
	}

	public function proses_keluar()
	{
		$userlogin = $this->DataUser_model->getUserLogin();
		if ($userlogin['role_id'] == 1 or $userlogin['role_id'] == 2) {
			$id_barang = $this->input->post('id_barang');
			$data['tb_barang'] = $this->Barang_model->getBarang();
			$data['tb_kondisi'] = $this->Barangkeluar_model->getKondisi();
			if ($id_barang == NULL) {
				redirect('transaksi_barang');
			} else {
				$data['judul'] = 'Halaman Transaksi Barang Keluar';
				$data['barang_keluar'] = $this->Barangkeluar_model->getBarangKeluar();
				$data['tb_barang'] = $this->Barang_model->getBarang();
				$cekstok['stok'] = $this->Transaksi_model->cekstok();
				$this->load->view('templates/header');
				$this->load->view('barang_keluar/index', $data);
				$this->load->view('templates/footer');
				$id_bk = $this->input->post('id_bk');
				$sqlcek = $this->db->query("SELECT id_bk FROM barang_keluar where id_bk='$id_bk'");
				$cek_idbk = $sqlcek->num_rows();
				$this->Barangkeluar_model->tambahBarangKeluar();
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
		Data <strong>Berhasil</strong> keluarkan!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
				redirect('transaksi_barang');
			}
		} else {
			$this->load->view('404');
		}
	}
}
