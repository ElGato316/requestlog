<?php
    class Users extends CI_Controller{
        
        public function view(){
			if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }

			$data['title'] = 'All Users';

			$data['users'] = $this->User_model->get_all_users();
 
			$this->load->view('templates/header');
            $this->load->view('templates/navbar');
			$this->load->view('users/view', $data);
			$this->load->view('templates/footer');
		}

		public function add(){

			if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }

			$data['title'] = 'Add User';

			$this->form_validation->set_rules('firstname','First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('users/add', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->User_model->add_user($enc_password);

				// Set message
				$this->session->set_flashdata('user_entered', 'User '.$this->input->post('username').' has been added.', 20);

				redirect('transactions/add_user');
			}
		}

		public function edit($id){

			if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }

			$data['user'] = $this->User_model->get_user($id);

			$data['title'] = 'Edit Post';

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');

		}

		public function update(){

			if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }

			$this->User_model->edit_user($id);

			// Set message
			$this->session->set_flashdata('user_updated', 'User '.$this->input->post('username').' has been updated.', 20);

			$id = $this->input->post('id');

			$ip = $this->input->ip_address();

			$data = array(
				'user_id' => $_SESSION['id'],
				'comments' => 'User Updated',
				'ip_address' => $ip,
				'user_id_updated' => $id
			);

			$this->db->insert('transactions', $data);

			redirect('users/view');
		}
    }