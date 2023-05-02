<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('dashboard');
		}else{
        $this->form_validation->set_rules('username','Username', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        $this->form_validation->set_rules('role_id','Role', 'trim|required');
		if($this->form_validation->run() == FALSE){
			return $this->load->view('auth/login');
		}else{
			$this->_login();
		}
	}
	}


	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role_id = $this->input->post('role_id');
		
		$user = $this->db->query("SELECT * FROM tb_user JOIN tb_role ON tb_role.role_id = tb_user.role_id where username='$username' and tb_user.role_id = '$role_id'")->row_array();
		if($user){
			if (password_verify($password,$user['password'])) {
				$data=[
					'id_user'=> $user['id_user'],
					'username'=> $user['username'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				if ($user['role_id']==1) {
				redirect('admin');
				}elseif ($user['role_id']==2) {
				redirect('pegawai');
				}elseif ($user['role_id']==3) {
				redirect('pimpinan');
				}
			}else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
				<small><strong> password </strong> salah!</small>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			  redirect('auth');
			}
		}else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-times-circle"></i>
			<small><strong> username </strong>atau <strong>password </strong> salah!</small>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		  redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
		<small>Kamu telah logout!</small>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
		redirect('auth');

    }

}
?>
