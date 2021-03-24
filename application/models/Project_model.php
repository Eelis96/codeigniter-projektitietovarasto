<?php
    class Project_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }

        public function get_projects($title = FALSE){
            if($title === FALSE){
                $this->db->order_by('id', 'DESC');
                $query = $this->db->get('projects');
                return $query->result_array();
            }

            $query = $this->db->get_where('projects', array('title' => $title));
            return $query->row_array();
        }

        public function add_project(){
            $data = array(
                'title' => $this->input->post('title'),
                'body' => $this->input->post('description'),
                'created_at' => $this->input->post('date')
            );

            return $this->db->insert('projects', $data);
        }

        public function delete_project($id){
            $this->db->where('id', $id);
            $this->db->delete('projects');
            return true;
        }
    }