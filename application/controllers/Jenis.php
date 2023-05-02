<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jenis extends CI_Controller
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
        $data['judul']      = 'Halaman Jenis';
        $data['tb_jenis']   = $this->Jenis_model->getJenis();
        $this->load->view('templates/header', $data);
        $this->load->view('jenis/index');
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
            $data['judul']      = 'Halaman Jenis';
            $data['tb_jenis']   = $this->Jenis_model->getJenis();
            $this->load->view('templates/header', $data);
            $this->load->view('jenis/index');
            $this->load->view('templates/footer');
            $jenis       = $this->input->post('jenis');
            $sqlcek     = $this->db->query("SELECT jenis FROM tb_jenis where jenis='$jenis'");
            $cek_jenis   = $sqlcek->num_rows();
            if ($cek_jenis > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
            <strong>Gagal!</strong>, Data Jenis sudah terdaftar.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
                redirect('jenis');
            } else {
                $this->Jenis_model->tambahJenis();
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
          Data <strong>Berhasil</strong> Ditambahkan!
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
                redirect('jenis');
            }
        }else {
			$this->load->view('404');
		}
    }
    
    public function proses_edit($id_jenis)
    {
        $userlogin = $this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['judul']      = 'Halaman Jenis';
            $data['tb_jenis']   = $this->Jenis_model->getJenis();
            $this->load->view('templates/header', $data);
            $this->load->view('jenis/index');
            $this->load->view('templates/footer');
            $jenis     = $this->input->post('jenis');
            $sqlcek   = $this->db->query("SELECT jenis FROM tb_jenis where jenis='$jenis'");
            $cek_jenis = $sqlcek->num_rows();
            if ($cek_jenis > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
            <strong>Gagal!</strong>, Data Jenis sudah terdaftar.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
                redirect('jenis');
            }else{
                $this->Jenis_model->editJenis($id_jenis);
                $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
                Data <strong>Berhasil</strong> Diedit!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
                redirect('jenis');
            }
        }else {
			$this->load->view('404');
		}
    }
    
    public function hapus($id_jenis)
    {
        $userlogin = $this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['judul']      = 'Halaman Jenis';
            $data['tb_jenis']   = $this->Jenis_model->getJenis();
            $this->load->view('templates/header', $data);
            $this->load->view('jenis/index');
            $this->load->view('templates/footer');
            $this->Jenis_model->hapusJenis($id_jenis);
            $this->session->set_flashdata('flash', 'dihapus');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
            Data <strong>Berhasil</strong> Dihapus!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('jenis');
        }else {
			$this->load->view('404');
		}
    }
    
    
}
