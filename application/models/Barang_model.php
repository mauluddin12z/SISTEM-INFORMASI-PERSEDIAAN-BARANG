<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Barang_model extends CI_Model
{

    public function getBarang()
    {
        return $this->db->query("SELECT*FROM tb_barang JOIN tb_jenis ON tb_jenis.id_jenis=tb_barang.id_jenis order by nama_barang asc")->result_array();
    }

    public function createCodeB()
    {
        $this->db->select('RIGHT(tb_barang.id_barang,4) as kode', FALSE);
        $this->db->order_by('id_barang','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_barang'); 
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
        $kodejadi = "BRG-".$kodemax;
        return $kodejadi;
    }

    public function getBarangById($dataTb)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('nama_barang', $dataTb);
        return $this->db->get()->row_array();  
    }

    public function getBarangById1($dataEb)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('id_barang', $dataEb);
        return $this->db->get()->row_array();  
    }
 
    public function tambahBarang()
    {
        $data=[
            "id_barang" => $this->Barang_model->createCodeB(),
            "kode_barang" => $dataTb=$this->input->post("kode_barang",true),
            "nama_barang" => $dataTb=$this->input->post("nama_barang",true),
            "id_jenis" => $this->input->post("id_jenis",true),
        ];
        $this->db->insert('tb_barang',$data);
        $id_user=$this->session->userdata('id_user');
        $namadata=$this->Barang_model->getBarangById($dataTb);
        $data2=[
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Tambah",
            "deskripsi" => "Tambah Barang [ ".$namadata['kode_barang'].", ".$namadata['nama_barang']." ]",
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log',$data2);
    }
    
    public function editDataBarang(){

        $data=[
            "kode_barang" => $this->input->post("kode_barang",true),
            "nama_barang" =>$this->input->post("nama_barang",true),
            "id_jenis" => $this->input->post("id_jenis",true),
        ];
        $this->db->where('id_barang', $dataEb=$this->input->post('id_barang'));
        $this->db->update('tb_barang',$data);
        $id_user=$this->session->userdata('id_user');
        $namadata=$this->Barang_model->getBarangById1($dataEb);
        $data2=[
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Edit",
            "deskripsi" => "Edit Barang [ ".$namadata['kode_barang'].", ".$namadata['nama_barang']." ]",
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log',$data2);
    }

    public function hapusBarang($id_barang)
    {
        $namadata=$this->db->query("SELECT * FROM tb_barang where id_barang='$id_barang'")->row_array();
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('tb_barang');
        $id_user=$this->session->userdata('id_user');
        $data2=[
            "datetime_log" => date('Y-m-d H:i:s'),
            "aksi" => "Hapus",
            "deskripsi" => "Hapus Barang [ ".$namadata['id_barang'].", ".$namadata['nama_barang']." ]",
            "id_user" => "$id_user",
        ];
        $this->db->insert('activity_log',$data2);
    }


    public function getJumBrg()
    {
        return $this->db->query("SELECT nama_barang, count(id_barang) AS cb FROM tb_barang")->result_array();
    }

}

?>
