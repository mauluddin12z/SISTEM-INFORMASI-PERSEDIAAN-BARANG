<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Jenis_model extends CI_Model
{
    
    public function getJenis()
    {
        return $this->db->query("SELECT*FROM tb_jenis")->result_array();
    }

    public function createCodeJ()
    {
        $this->db->select('RIGHT(tb_jenis.id_jenis,4) as kode', FALSE);
        $this->db->order_by('id_jenis','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_jenis'); 
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
        $kodejadi = "JNS-".$kodemax;
        return $kodejadi;
    }

    public function getJenisById($dataTj)
    {
        $this->db->select('*');
        $this->db->from('tb_jenis');
        $this->db->where('jenis', $dataTj);
        return $this->db->get()->row_array();  
    }

    public function getJenisById1($dataEj)
    {
        $this->db->select('*');
        $this->db->from('tb_jenis');
        $this->db->where('id_jenis', $dataEj);
        return $this->db->get()->row_array();  
    }

    public function tambahJenis()
    {
        $data=[
            "id_jenis" => $this->Jenis_model->createCodeJ(),
            "jenis" => $dataTj=$this->input->post("jenis",true),
        ];
        $this->db->insert('tb_jenis',$data);
        $id_user=$this->session->userdata('id_user');
        $namadata=$this->Jenis_model->getJenisById($dataTj);
        $data2=[
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Tambah",
            "deskripsi" => "Tambah Jenis [ ".$namadata['id_jenis'].", ".$namadata['jenis']." ]",
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log',$data2);
    }
    public function editJenis(){
        
        $data=[
            "jenis" => $this->input->post("jenis",true),
        ];
        $this->db->where('id_jenis', $dataEj=$this->input->post('id_jenis'));
        $this->db->update('tb_jenis',$data);
        $id_user=$this->session->userdata('id_user');
        $namadata=$this->Jenis_model->getJenisById1($dataEj);
        $data2=[
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Edit",
            "deskripsi" => "Edit Jenis [ ".$namadata['id_jenis'].", ".$namadata['jenis']." ]",
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log',$data2);
    }

    public function hapusJenis($id_jenis)
    {
        $namadata=$this->db->query("SELECT * FROM tb_jenis where id_jenis='$id_jenis'")->row_array();
        $this->db->where('id_jenis', $id_jenis);
        $this->db->delete('tb_jenis');
        $id_user=$this->session->userdata('id_user');
        $data2=[
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Hapus",
            "deskripsi" => "Hapus Jenis [ ".$namadata['id_jenis'].", ".$namadata['jenis']." ]",
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log',$data2);
    }

    public function getJumJenis(){
        return $this->db->query("SELECT count(id_jenis) as cj from tb_jenis")->result_array();
    }
}

?>
