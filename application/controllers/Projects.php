<?php
    class Projects extends CI_Controller{
        public function index(){
            $data['title'] = 'Projektit';

            $data['projects'] = $this->project_model->get_projects();

            $this->load->view('templates/header');
            $this->load->view('projects/index', $data);
            $this->load->view('templates/footer');
        }

        public function add(){
            $data['title'] = 'Lisää Projekti';

            $this->form_validation->set_rules('title', 'Otsikko', 'required');
            $this->form_validation->set_rules('description', 'Kuvaus', 'required');
            $this->form_validation->set_rules('date', 'Päivämäärä', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('projects/add', $data);
                $this->load->view('templates/footer');
            }else{
                $this->project_model->add_project();
                $this->session->set_flashdata('project_added', 'Projekti Lisätty!');
                redirect('projects');
            }

        }

        public function delete($id){
            $this->project_model->delete_project($id);
            $this->session->set_flashdata('project_deleted', 'Projekti Poistettu!');
            redirect('projects');
        }
    }