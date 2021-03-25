<?php
    class Requests extends CI_Controller{

        public function add(){

            $data['title'] = "Enter Request";

            $data['users'] = $this->User_model->get_all_active_users();

            $data['agencies'] = $this->Request_model->get_agencies();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('requests/add_requests', $data);
            $this->load->view('templates/footer');

        }
    }