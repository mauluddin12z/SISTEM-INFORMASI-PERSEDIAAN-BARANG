<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lokasi extends CI_Controller
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
		$userlogin = $this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1) {
        $data['user_login'] = $this->DataUser_model->getUserLogin();
        $data['judul']      = 'Halaman Lokasi';
        $data['tb_lokasi']  = $this->Lokasi_model->getAllLokasi();
        $this->load->view('templates/header', $data);
        $this->load->view('lokasi/index');
        $this->load->view('templates/footer');
	}else {
		$this->load->view('404');
	}
}
    
    public function proses_tambah()
    {
        $userlogin = $this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['judul']      = 'Halaman Lokasi';
            $data['tb_lokasi']  = $this->Lokasi_model->getAllLokasi();
            $this->load->view('templates/header', $data);
            $this->load->view('lokasi/index');
            $this->load->view('templates/footer');
            $data['codeL'] = $this->Lokasi_model->createCodeL();
            $lokasi        = $this->input->post('lokasi');
            $sqlcek        = $this->db->query("SELECT lokasi FROM tb_lokasi where lokasi='$lokasi'");
            $cek_lokasi    = $sqlcek->num_rows();
            if ($cek_lokasi > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
            <strong>Gagal!</strong>, Data Lokasi sudah terdaftar.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
                redirect('lokasi');
            } else
                $this->Lokasi_model->tambahLokasi();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
      Data <strong>Berhasil</strong> Ditambahkan!
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
            redirect('lokasi');
		}else {
			$this->load->view('404');
		}
    }
    
    public function proses_edit($id_lokasi)
    {
        $userlogin = $this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['judul']      = 'Halaman Lokasi';
            $data['tb_lokasi']  = $this->Lokasi_model->getAllLokasi();
            $this->load->view('templates/header', $data);
            $this->load->view('lokasi/index');
            $this->load->view('templates/footer');
            $lokasi     = $this->input->post('lokasi');
            $sqlcek     = $this->db->query("SELECT lokasi FROM tb_lokasi where lokasi='$lokasi'");
            $cek_lokasi = $sqlcek->num_rows();
            if ($cek_lokasi > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
            <strong>Gagal!</strong>, Data Lokasi sudah terdaftar.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
                redirect('lokasi');
            } else {
                $this->Lokasi_model->editLokasi($id_lokasi);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
          Data <strong>Berhasil</strong> Diedit!
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
                redirect('lokasi');
            }
		} else {
			$this->load->view('404');
		}
    }
    
    
    public function hapus($id_lokasi)
    {
        $userlogin = $this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['judul']      = 'Halaman Lokasi';
            $data['tb_lokasi']  = $this->Lokasi_model->getAllLokasi();
            $this->load->view('templates/header', $data);
            $this->load->view('lokasi/index');
            $this->load->view('templates/footer');
            $this->Lokasi_model->hapusLokasi($id_lokasi);
            $this->session->set_flashdata('flash', 'dihapus');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
      Data <strong>Berhasil</strong> Dihapus!
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
            redirect('lokasi');
		} else {
			$this->load->view('404');
		}
    }
    
}


?>
