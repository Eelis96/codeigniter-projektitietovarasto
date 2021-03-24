<?php
    class Users extends CI_Controller{
        public function register(){
            $data['title'] = 'Rekisteröidy';

            $this->form_validation->set_rules('username', 'Käyttäjänimi', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('password', 'Salasana', 'required');
            $this->form_validation->set_rules('password2', 'Salasanan Varmistus', 'matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }else{
                $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

                $this->user_model->register($enc_password);

                $this->session->set_flashdata('user_registered', 'Rekisteröityminen Onnistui');

                redirect('projects');
            }

        }

        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'Käyttäjänimi On Jo Olemassa');

            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return false;
            }
        }
    }