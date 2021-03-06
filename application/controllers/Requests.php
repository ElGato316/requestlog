<?php
    class Requests extends CI_Controller{

        public function add(){
            if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }

            $data['title'] = "Add Request";


            if ($this->input->server('REQUEST_METHOD') === 'GET'){

                $data['users'] = $this->User_model->get_all_active_users();

                $data['agencies'] = $this->Request_model->get_agencies();

                $data['statuses'] = $this->Request_model->get_statuses();

                $data['opened'] = $this->Request_model->get_prs_open_requests();

                $data['requests'] = $this->Request_model->get_last_eight_request_entered();

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('requests/add_requests', $data);
                $this->load->view('templates/footer');

            }else{

                $this->Request_model->add_request();


                // Set message
				$this->session->set_flashdata('request_added', 'Request Added');

                redirect('transactions/add_request');
            }
            
        }

        public function view(){

            if($_SESSION['logged_in'] == TRUE && $_SESSION['supervisor'] == 1){
                
                $data['title'] = "All Open Records";

                $data['requests'] = $this->Request_model->get_all_open_requests();
    
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('requests/rms_view', $data);
                $this->load->view('templates/footer');
            }else{
                $this->session->set_flashdata('permission', 'Your do not have permission to view the supervisor dahsboard!');
                redirect('PRS/dashboard');
            }


        }

        public function edit($id){

            if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }


            $data['title'] = "Edit Record";

            $data['request'] = $this->Request_model->get_request($id);

            $data['users'] = $this->User_model->get_all_active_users();

            $data['statuses'] = $this->Request_model->get_statuses();

            $data['agencies'] = $this->Request_model->get_agencies();
 

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('requests/rms_edit_request', $data);
            $this->load->view('templates/footer');

        }

        public function update(){

            if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }

			$this->Request_model->edit_request($id);

			// Set message
			$this->session->set_flashdata('request_updated', 'The request has been updated.', 20);

            //$str = $this->db->last_query();
            //echo "<pre>";
            //print_r($str);
            //exit;

            $id = $this->input->post('id');

			$ip = $this->input->ip_address();

			$data = array(
				'user_id' => $_SESSION['id'],
				'comments' => 'Request Updated',
				'ip_address' => $ip,
				'request_id' => $id
			);

			$this->db->insert('transactions', $data);


			redirect('requests/view');
		}

        public function search(){

            if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }
            
            $data['title'] = "Request Search";

            if ($this->input->server('REQUEST_METHOD') === 'GET') {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('requests/search_requests', $data);
                $this->load->view('templates/footer');
            } else {

                $input = $this->input->post('input');

                $data['requests'] = $this->Request_model->search_requests($input);

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('requests/search_requests', $data);
                $this->load->view('templates/footer');
            }

        }

        public function search_user(){

            if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }

            $data['title'] = "Search Requests By User";

            $data['users'] = $this->User_model->get_all_active_users();

            if ($this->input->server('REQUEST_METHOD') === 'GET') {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('requests/search_requests_user', $data);
                $this->load->view('templates/footer');
            } else {

                $input = $this->input->post('input');

                $data['requests'] = $this->Request_model->search_requests_by_user($input);

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('requests/search_requests_user', $data);
                $this->load->view('templates/footer');
            }
        }

        public function search_by_status(){

            if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }

            $data['title'] = "Search Requests By Status";

            $data['statuses'] = $this->Request_model->get_statuses();

            if ($this->input->server('REQUEST_METHOD') === 'GET') {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('requests/search_requests_by_status', $data);
                $this->load->view('templates/footer');
            } else {

                $status_id = $this->input->post('status_id');

                $data['requests'] = $this->Request_model->search_requests_by_status($status_id);

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('requests/search_requests_by_status', $data);
                $this->load->view('templates/footer');
            }
        }

        public function view_pending_invoices(){

            if($_SESSION['logged_in'] == FALSE || $_SESSION['supervisor'] == 0){
                redirect('login/view');
            }

            $data['title'] = "Requests Pending Invoice";

            $data['requests'] = $this->Request_model->get_pending_invoices();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('requests/rms_view_pending_invoice', $data);
            $this->load->view('templates/footer');
        }
    }