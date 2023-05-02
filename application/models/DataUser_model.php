<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class DataUser_model extends CI_Model
{
    public function getAllUser(){
		return $this->db->query("SELECT * FROM tb_user JOIN tb_role ON tb_role.role_id = tb_user.role_id")->result_array();
	}
    public function getkoordinatorbmn(){
		return $this->db->query("SELECT * FROM tb_user JOIN tb_role ON tb_role.role_id = tb_user.role_id where username='subkoordinatorbmn'")->row_array();
	}
    public function getUserLogin(){
        $username=$this->session->userdata('username');
		return $this->db->query("SELECT * FROM tb_user JOIN tb_role ON tb_role.role_id = tb_user.role_id where username='$username'")->row_array();
	}
	public function getAllRole(){
		return $this->db->query("SELECT * FROM tb_role")->result_array();
	}

	public function tambahUser()
    {
        $data=[
            "nama" => htmlspecialchars($this->input->post("nama",true)),
            "email" => htmlspecialchars($this->input->post("email",true)),
            "no_telp" => htmlspecialchars($this->input->post("no_telp",true)),
            "username" => htmlspecialchars($dataTu=$this->input->post("username",true)),
            "password"=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			"role_id" => htmlspecialchars($this->input->post("role_id",true)),
            "date_created" =>$this->input->post("date_created",true)
        ];
        $this->db->insert('tb_user',$data);
    }
    
    public function profileSet(){

        $data=[
            "nama" => htmlspecialchars($this->input->post("nama",true)),
            "email" => htmlspecialchars($this->input->post("email",true)),
            "no_telp" => htmlspecialchars($this->input->post("no_telp",true)),
        ];
        $this->db->where('username', $this->input->post('username'));
        $this->db->update('tb_user',$data);
    }

    public function gantipw(){
        $data=[
            "password"=>password_hash($this->input->post('newpassword1'),PASSWORD_DEFAULT),
        ];
        $this->db->where('username', $this->input->post('username'));
        $this->db->update('tb_user',$data);
    }

    public function editDataUser($id_user){

        $data=[
            "nama" => htmlspecialchars($this->input->post("nama",true)),
            "email" => htmlspecialchars($this->input->post("email",true)),
            "no_telp" => htmlspecialchars($this->input->post("no_telp",true)),
            "username" => htmlspecialchars($this->input->post("username",true)),
			"role_id" => htmlspecialchars($this->input->post("role_id",true)),
        ];
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user',$data);
    }

    public function hapusUser($id_user)
    {
        $namadata=$this->db->query("SELECT * FROM tb_user where id_user='$id_user'")->row_array();
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_user');

    }

}

?>
