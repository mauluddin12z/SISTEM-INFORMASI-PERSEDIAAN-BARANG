<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Data_user extends CI_Controller
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
            $data['data_user']  = $this->DataUser_model->getAllUser();
            $data['tb_role']    = $this->DataUser_model->getAllRole();
            $data['judul']      = 'Manajemen User';
            $this->load->view('templates/header', $data);
            $this->load->view('data_user/index');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('404');
        }
    }
    
    
    public function proses_tambah_user()
    {
        $userlogin = $this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['data_user']  = $this->DataUser_model->getAllUser();
            $data['tb_role']    = $this->DataUser_model->getAllRole();
            $data['judul']      = 'Manajemen User';
			$username = $this->input->post('username');
			$sqlcek1       = $this->db->query("SELECT username FROM tb_user where username='$username'");
            $cek_username  = $sqlcek1->num_rows();
            $id_user   = $this->input->post('id_user');
            $sqlcek        = $this->db->query("SELECT id_user FROM tb_user where id_user='$id_user'");
            $cek_iduser  = $sqlcek->num_rows();
			if ($cek_iduser > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
                    <strong>Gagal!</strong>, Terdapat duplikasi data, silahkan coba lagi.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
                redirect('data_user');
            } elseif ($cek_username > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
            <strong>Gagal!</strong>, Data User sudah terdaftar.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
                redirect('data_user');
            } else
                $this->DataUser_model->tambahUser();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
			Data <strong>Berhasil</strong> Ditambahkan!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('data_user');
        } else {
            $this->load->view('404');
        }
    }
    
    public function proses_edit($id_user)
    {
        $userlogin = $this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1) {
            $data['data_user']  = $this->DataUser_model->getAllUser();
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['role']       = $this->DataUser_model->getAllRole();
            $data['judul']      = 'Manajemen User';
            $this->DataUser_model->editDataUser($id_user);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
        Data <strong>Berhasil</strong> diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
            redirect('data_user');
        } else {
            $this->load->view('404');
        }
    }
    
    public function hapusUser($id_user)
    {
        $userlogin = $this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        if ($userlogin['role_id'] == 1) {
            $data['user_login'] = $this->DataUser_model->getUserLogin();
            $data['data_user']  = $this->DataUser_model->getAllUser();
            $data['role']       = $this->DataUser_model->getAllRole();
            $data['judul']      = 'Manajemen User';
            $this->DataUser_model->hapusUser($id_user);
            $this->session->set_flashdata('flash', 'dihapus');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
        Data <strong>Berhasil</strong> Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
            redirect('data_user');
        } else {
            $this->load->view('404');
        }
    }
    
    
}
