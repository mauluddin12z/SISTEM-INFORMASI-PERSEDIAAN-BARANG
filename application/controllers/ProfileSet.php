<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileSet extends CI_Controller
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
		$data['tb_barang']=$this->Barang_model->getBarang();
        $data['judul']      = 'Profile Settings';
        $data['data_user']  = $this->DataUser_model->getAllUser();
        $data['user_login'] = $this->DataUser_model->getUserLogin();
        $this->load->view('templates/header', $data);
        $this->load->view('profileSet/profile', $data);
        $this->load->view('templates/footer');
    }
    
    public function proses_profileSet()
    {
        $data['judul']      = 'Profile Settings';
		$data['tb_barang']=$this->Barang_model->getBarang();
        $data['data_user']  = $this->DataUser_model->getAllUser();
        $data['user_login'] = $this->DataUser_model->getUserLogin();
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
            Data <strong>gagal</strong> diubah!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            $this->load->view('templates/header', $data);
            $this->load->view('profileSet/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $this->DataUser_model->profileSet();
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
            Data <strong>Berhasil</strong> diubah!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('ProfileSet');
        }
        
    }
    
    public function gantipw()
    {
        $data['judul']      = 'Ganti Password';
		$data['tb_barang']=$this->Barang_model->getBarang();
        $data['data_user']  = $this->DataUser_model->getAllUser();
        $data['user_login'] = $this->DataUser_model->getUserLogin();
        $this->load->view('templates/header', $data);
        $this->load->view('profileSet/gantipw', $data);
        $this->load->view('templates/footer');
    }
    
    public function proses_gantipw()
    {
        $data['judul']      = 'Ganti Password';
		$data['tb_barang']=$this->Barang_model->getBarang();
        $data['data_user']  = $this->DataUser_model->getAllUser();
        $data['user_login'] = $this->DataUser_model->getUserLogin();
        $username        = $this->input->post('username');
        $oldpassword        = $this->input->post('oldpassword');
				$user=$this->db->get_where('tb_user',['username' => $username])->row_array();
        $this->form_validation->set_rules('oldpassword', 'Password lama', 'required|trim|min_length[6]', array(
            'min_length' => 'Password minimal 6 character'
        ));
        $this->form_validation->set_rules('newpassword1', 'Password baru', 'required|trim|min_length[6]', array(
            'min_length' => 'Password minimal 6 character'
        ));
        $this->form_validation->set_rules('newpassword2', 'Password baru', 'required|trim|min_length[6]|matches[newpassword1]', array(
            'matches' => 'Password tidak cocok',
            'min_length' => 'Password minimal 6 character'
        ));
        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('pesan1','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
            Password <strong>gagal</strong> diubah!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            $this->load->view('templates/header', $data);
            $this->load->view('profileSet/gantipw', $data);
            $this->load->view('templates/footer');
        } else if ($user) {
            if (!password_verify($oldpassword, $user['password'])) {
							$this->session->set_flashdata('pesan1','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
                        Password lama salah!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
                redirect('ProfileSet/gantipw');
            } else {
                $this->DataUser_model->gantipw();
                $this->session->set_flashdata('pesan1', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
                Password <strong>Berhasil</strong> diubah!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
                redirect('ProfileSet/gantipw');
            }
        }
    }
}
