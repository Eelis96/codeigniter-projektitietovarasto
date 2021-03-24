<?php 
class User_model extends CI_Model{
    public function register($enc_password){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $enc_password
            
        );

        return $this->db->insert('users', $data);
    }

    public function check_username_exists($username){
        $query = $this->db->get_where('users', array('username' => $username));

        if(empty($query->row_array())){
            return true;
        }else{
            return false;
        }
    }
}