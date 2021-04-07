<?php
    class Requests extends CI_Controller{

        public function add(){

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

                redirect('requests/add');
            }
            
        }

        public function view(){
            $data['title'] = "All Open Records";

            $data['requests'] = $this->Request_model->get_all_open_requests();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('requests/rms_view', $data);
            $this->load->view('templates/footer');
        }

        public function search(){
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
            $data['title'] = "Search Request By User";

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

        public function edit($id){

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

			$this->Request_model->edit_request($id);

			// Set message
			$this->session->set_flashdata('request_updated', 'The request has been updated.', 20);

            //$str = $this->db->last_query();
            //echo "<pre>";
            //print_r($str);
            //exit;

			redirect('requests/view');
		}

        public function view_pending_invoices(){

            $data['title'] = "Requests Pending Invoice";

            $data['requests'] = $this->Request_model->get_pending_invoices();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('requests/rms_view_pending_invoice', $data);
            $this->load->view('templates/footer');
        }
    }