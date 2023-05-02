<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class ActivityLog extends CI_Controller {

    public function __construct()
    {
			parent::__construct();
			if (!$this->session->userdata('username')) {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
				Silahkan <strong>login</strong> terlebih dahulu!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('auth');
		}
    }

    public function index()
    {
			$data['user_login']=$this->DataUser_model->getUserLogin();
			$data['tb_barang']=$this->Barang_model->getBarang();
			$data['activity_log']=$this->ActivityLog_model->getActivityLog();
			$data['role']=$this->DataUser_model->getAllRole();
			$data['judul']='Activity Log';
			$this->load->view('templates/header',$data);
			$this->load->view('activitylog/index');
			$this->load->view('templates/footer');
    }

    public function hapusAllHistory()
    {
			$userlogin=$this->DataUser_model->getUserLogin();
			$data['tb_barang']=$this->Barang_model->getBarang();
			if ($userlogin['role_id']==1) {
				$data['user_login']=$this->DataUser_model->getUserLogin();
				$data['activity_log']=$this->ActivityLog_model->getActivityLog();
				$data['role']=$this->DataUser_model->getAllRole();
				$data['judul']='Activity Log';
				$this->ActivityLog_model->hapusAllHistory();
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-check-circle"></i>
				Data <strong>Berhasil</strong> Dihapus!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('ActivityLog');
			}
    }

}
?>

