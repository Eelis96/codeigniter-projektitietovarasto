<?php
    class Project_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }

        public function get_projects($title = FALSE){
            if($title === FALSE){
                $query = $this->db->get('projects');
                return $query->result_array();
            }

            $query = $this->db->get_where('projects', array('title' => $title));
            return $query->row_array();
        }
    }