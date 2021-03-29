<?php
    class Requests extends CI_Controller{

        public function add(){

            $data['title'] = "Enter Request";


            if ($this->input->server('REQUEST_METHOD') === 'GET'){

                $data['users'] = $this->User_model->get_all_active_users();

                $data['agencies'] = $this->Request_model->get_agencies();

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('requests/add_requests', $data);
                $this->load->view('templates/footer');

            }else{

                $this->Request_model->add_request();


                // Set message
				$this->session->set_flashdata('request_entered', 'Request Added');

                redirect('requests/add');
            }
            
        }
    }