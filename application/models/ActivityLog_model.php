<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class ActivityLog_model extends CI_Model
{

    public function getActivityLog()
    {
        return $this->db->query("SELECT*FROM activity_log JOIN tb_user ON tb_user.id_user = activity_log.id_user ORDER by datetime_log desc")->result_array();
    }

    public function hapusAllHistory()
    {
		$id_user=$this->session->userdata('id_user');
        $this->db->where('id_user', $id_user);
		$this->db->delete('activity_log');
        $this->db->query("ALTER TABLE activity_log AUTO_INCREMENT = 1;");
        
    }

}

?>
