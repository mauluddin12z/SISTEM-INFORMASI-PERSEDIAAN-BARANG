<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Dashboard extends CI_Controller
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
        $data['judul']='Dashboard';
        $data['user_login']=$this->DataUser_model->getUserLogin();
		$data['tb_barang']=$this->Barang_model->getBarang();
        $data['jumbrg']=$this->Barang_model->getJumBrg();
        $data['jumtbrgin']=$this->Barangmasuk_model->getJumTBrgMasuk();
        $data['jumtbrgout']=$this->Barangkeluar_model->getJumTBrgKeluar();
        $data['jumlokasi']=$this->Lokasi_model->getJumLokasi();
        $data['jumjenis']=$this->Jenis_model->getJumJenis();
        $data['bmtoday']=$this->Barangmasuk_model->getBarangMasukToday();
        $data['bktoday']=$this->Barangkeluar_model->getBarangKeluarToday();
        $this->load->view('templates/header',$data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer');
    }

}


?>
