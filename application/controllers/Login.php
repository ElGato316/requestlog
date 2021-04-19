<?php
    class Login extends CI_Controller{
        
		public function view()
		{
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() === FALSE) {
				
				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('login/login', $data);
				$this->load->view('templates/footer');

			} else {

				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));

				$user = $this->Login_model->validate_user($username, $password); 

				if($user)
				{
					$session_data = array(

						'id' => $user['id'],
						'firstname' => $user['firstname'],
						'lastname' => $user['lastname'],
						'supervisor' => $user['supervisor'],
						'logged_in' => TRUE 
	
					);

					$this->session->set_userdata($session_data);

					$ip = $this->input->ip_address();

					$data = array(
						'user_id' => $user['id'],
						'comments' => 'Logged In',
						'ip_address' => $ip
					);

					$this->db->insert('transactions', $data);


					if ($user['supervisor'] == 1) {
						redirect('requests/view');
					} else {
						redirect('PRS/dashboard');
					}
					

				}else{

					$this->session->set_flashdata('error', 'Invalid Username and Password');  
					redirect('login/view');
				}

			}
			
		}

		public function logout(){

			
			$ip = $this->input->ip_address();

			$data = array(
				'user_id' => $_SESSION['id'],
				'comments' => 'Logged Out',
				'ip_address' => $ip
			);

			$this->db->insert('transactions', $data);
			
			// Unset user data
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('firstname');
			$this->session->unset_userdata('lastname');
			$this->session->unset_userdata('supervisor');
			$this->session->unset_userdata('logged_in');
			//$this->session->unset_flashdata();

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('login/view');
		}

    }