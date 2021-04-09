<?php
    class PRS extends CI_Controller{
     
        public function dashboard(){
            
            $data['title'] = "All Open Requests For ";
            
            $id = 27;

            $data['requests'] = $this->PRS_model->get_open_requests_by_prs($id);

            $this->load->view('templates/header');
            $this->load->view('templates/prs_banner');
            $this->load->view('prs/prs_dashboard', $data);
            $this->load->view('templates/footer');
        }

        public function edit_request($id){

            $data['title'] = "Edit Record";

            $data['request'] = $this->Request_model->get_request($id);

            $data['users'] = $this->User_model->get_all_active_users();

            $data['statuses'] = $this->Request_model->get_statuses();

            $data['agencies'] = $this->Request_model->get_agencies();
 

            $this->load->view('templates/header');
            $this->load->view('templates/prs_banner');
            $this->load->view('prs/prs_edit_request', $data);
            $this->load->view('templates/footer');

        }

        public function update_request($id){

        }

        public function search_requests(){

        }

        public function change_password(){

        }
    }