<?php 
class User_model extends CI_Model{
    public function register($enc_password){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'is_admin' => 0
        );

        return $this->db->insert('users', $data);
    }

    public function login($username, $password){
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $result = $query->row_array();

        if (!empty($result) && password_verify($password, $result['password'])) {
            return $result;
        } else {
            return false;
        }
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