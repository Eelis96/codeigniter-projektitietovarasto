<?php
    class Projects extends CI_Controller{
        public function index(){
            $data['title'] = 'Projektit';

            $data['projects'] = $this->project_model->get_projects();

            $this->load->view('templates/header');
            $this->load->view('projects/index', $data);
            $this->load->view('templates/footer');
        }
    }