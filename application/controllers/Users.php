<?php
    class Users extends CI_Controller{
        
        public function view(){

			$data['title'] = 'All Users';

			$data['users'] = $this->User_model->get_all_active_users();
 
			$this->load->view('templates/header');
            $this->load->view('templates/navbar');
			$this->load->view('users/view', $data);
			$this->load->view('templates/footer');
		}

		public function add(){

			$data['title'] = 'Add User';
 
			$this->load->view('templates/header');
            $this->load->view('templates/navbar');
			$this->load->view('users/add', $data);
			$this->load->view('templates/footer');
		}
    }