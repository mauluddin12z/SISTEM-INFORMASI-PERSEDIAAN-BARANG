<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Barang extends CI_Controller
{
  	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
          $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
          Silahkan <strong>login</strong> terlebih dahulu!
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
            redirect('auth');
        }
    }
    public function index()
    {
	$userlogin = $this->DataUser_model->getUserLogin();
	if ($userlogin['role_id'] == 1) {
	$data['user_login']=$this->DataUser_model->getUserLogin();
	$data['tb_lokasi']=$this->Lokasi_model->getAllLokasi();
	$data['judul']='Halaman Barang';
	$data['tb_barang']=$this->Barang_model->getBarang();
	$data['tb_jenis']=$this->Jenis_model->getJenis();
	$this->load->view('templates/header',$data);
	$this->load->view('barang/index');
	$this->load->view('templates/footer');
	} else {
		$this->load->view('404');
	}
    }

    public function proses_tambah()
    {
		$userlogin=$this->DataUser_model->getUserLogin();
		if ($userlogin['role_id']==1) {
			$data['user_login']=$this->DataUser_model->getUserLogin();
			$data['tb_lokasi']=$this->Lokasi_model->getAllLokasi();
			$data['judul']='Halaman Barang';
			$data['tb_barang']=$this->Barang_model->getBarang();
			$data['tb_jenis']=$this->Jenis_model->getJenis();
			$this->load->view('templates/header',$data);
			$this->load->view('barang/index');
			$this->load->view('templates/footer');
			$nama_barang=$this->input->post('nama_barang');
			$sqlcek = $this->db->query("SELECT nama_barang FROM tb_barang where nama_barang='$nama_barang'");
			$cek_namabarang = $sqlcek->num_rows();
			if ($cek_namabarang > 0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
				<strong>Gagal!</strong>, Data Barang sudah terdaftar.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('barang');
			}else{
			$this->Barang_model->tambahBarang();
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
			Data <strong>Berhasil</strong> Ditambahkan!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
				redirect('barang');
			}
		} else {
			$this->load->view('404');
		}
    }


    public function proses_edit($id_barang)
    {
		$userlogin=$this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
		if ($userlogin['role_id']==1) {
			$data['judul']='Halaman Edit';
			$this->load->view('templates/header',$data);
			$this->load->view('barang/index');
			$this->load->view('templates/footer');
			echo "<script>console.log('test');</script>";
			$nama_barang=$this->input->post('nama_barang');
			$kode_barang=$this->input->post('kode_barang');
			$sqlcek = $this->db->query("SELECT nama_barang FROM tb_barang where nama_barang='$nama_barang' and kode_barang='$kode_barang'");
			$cek_namabarang = $sqlcek->num_rows();
			if ($cek_namabarang > 0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
				<strong>Gagal!</strong>, Data Barang sudah terdaftar.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('barang');
			}else{
				$this->Barang_model->editDataBarang($id_barang);
				$this->session->set_flashdata('pesan','<div class="alert alert-primary alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
				Data <strong>Berhasil</strong> diubah!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('barang');
			}
		} else {
			$this->load->view('404');
		}
    }

    public function hapus($id_barang)
    {
		$userlogin=$this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
		if ($userlogin['role_id']==1) {
        $this->Barang_model->hapusBarang($id_barang);
        $this->session->set_flashdata('flash','dihapus');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
        Data <strong>Berhasil</strong> Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
        redirect('barang');
		} else {
			$this->load->view('404');
		}
    }

}
