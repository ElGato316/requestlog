<?php
    class Reports extends CI_Controller{

    	public function chiefs_weekly(){

    		$data['title'] = "Chief's Weekly";

            if ($this->input->server('REQUEST_METHOD') === 'GET') {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('reports/chiefs_weekly', $data);
                $this->load->view('templates/footer');
            } else {

                //$input = $this->input->post('input');

                //$data['requests'] = $this->Request_model->search_requests($input);

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('reports/chiefs_weekly', $data);
                $this->load->view('templates/footer');
            }

    	}

    	public function prs_monthly(){
    		
    	}
    }