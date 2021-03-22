<?php
    class Users extends CI_Controller{
        
        public function view(){

			$data['title'] = 'All Users';

			$this->load->view('templates/header');
            $this->load->view('templates/navbar');
			$this->load->view('users/view', $data);
			$this->load->view('templates/footer');
		}
    }