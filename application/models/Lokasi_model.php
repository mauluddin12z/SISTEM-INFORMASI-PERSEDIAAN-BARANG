<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Lokasi_model extends CI_Model
{
    public function createCodeL()
    {
        $this->db->select('RIGHT(tb_lokasi.id_lokasi,4) as kode', FALSE);
        $this->db->order_by('id_lokasi','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_lokasi'); 
        if($query->num_rows() <> 0){      
         //cek kode   
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
        $kodejadi = "LKS-".$kodemax;
        return $kodejadi;
    }

    public function getLokasiById($dataTl)
    {
        $this->db->select('*');
        $this->db->from('tb_lokasi');
        $this->db->where('lokasi', $dataTl);
        return $this->db->get()->row_array();  
    }

    public function getLokasiById1($dataEl)
    {
        $this->db->select('*');
        $this->db->from('tb_lokasi');
        $this->db->where('id_lokasi', $dataEl);
        return $this->db->get()->row_array();  
    }

    public function tambahLokasi()
    {
        $data=[
            "id_lokasi" => $this->Lokasi_model->createCodeL(),
            "lokasi" => $dataTj=$this->input->post("lokasi",true),
        ];
        $this->db->insert('tb_lokasi',$data);
        $id_user=$this->session->userdata('id_user');
        $namadata=$this->Lokasi_model->getLokasiById($dataTj);
        $data2=[
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Tambah",
            "deskripsi" => "Tambah Lokasi [ ".$namadata['id_lokasi'].", ".$namadata['lokasi']." ]",
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log',$data2);
    }
    public function editLokasi(){

        $data=[
            "lokasi" => $this->input->post("lokasi",true),
        ];
        $this->db->where('id_lokasi', $dataEl=$this->input->post('id_lokasi'));
        $this->db->update('tb_lokasi',$data);
        $id_user=$this->session->userdata('id_user');
        $namadata=$this->Lokasi_model->getLokasiById1($dataEl);
        $data2=[
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Edit",
            "deskripsi" => "Edit Lokasi [ ".$namadata['id_lokasi'].", ".$namadata['lokasi']." ]",
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log',$data2);
    }
    
    public function hapusLokasi($id_lokasi)
    {
        $namadata=$this->db->query("SELECT * FROM tb_lokasi where id_lokasi='$id_lokasi'")->row_array();
        $this->db->where('id_lokasi', $id_lokasi);
        $this->db->delete('tb_lokasi');
        $id_user=$this->session->userdata('id_user');
        $data2=[
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Hapus",
            "deskripsi" => "Hapus Lokasi [ ".$namadata['id_lokasi'].", ".$namadata['lokasi']." ]",
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log',$data2);
    }

    public function getAllLokasi(){
        return $query = $this->db->get('tb_lokasi')->result_array();
    }

    public function getJumLokasi(){
        return $this->db->query("SELECT count(id_lokasi) as ct from tb_lokasi")->result_array();
    }
}

?>
