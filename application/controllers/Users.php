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

        public function login(){
            $data['title'] = 'Kirjaudu Sisään';

            $this->form_validation->set_rules('username', 'Käyttäjänimi', 'required');
            $this->form_validation->set_rules('password', 'Salasana', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }else{
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $result = $this->user_model->login($username, $password);

                if($result){

                    $user_data = array(
                        'user_id' =>$result['id'],
                        'username' => $username,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);

                    $this->session->set_flashdata('user_loggedin', 'Kirjautuminen Onnistui');

                    redirect('projects');
                }else{
                    $this->session->set_flashdata('login_failed', 'Kirjautuminen Epäonnistui');

                    redirect('users/login');
                }

            }

        }

        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('user_loggedout', 'Kirjauduit Ulos');

            redirect('users/login');
        }

       public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'Käyttäjänimi On Jo Olemassa');

            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return false;
            }
        }
    }