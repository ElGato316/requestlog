<?php
    class Login extends CI_Controller{
        
        public function view(){

			$data['title'] = 'Login Page';

			$this->load->view('templates/header');
            $this->load->view('templates/navbar');
			$this->load->view('login/login', $data);
			$this->load->view('templates/footer');
		}
    }