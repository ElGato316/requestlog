<?php
    class Reports extends CI_Controller{

    	public function chiefs_weekly(){
            if($_SESSION['logged_in'] == TRUE && $_SESSION['supervisor'] == 1){

                $data['title'] = "Chief's Weekly";

                if ($this->input->server('REQUEST_METHOD') === 'GET') {
                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar');
                    $this->load->view('reports/chiefs_weekly', $data);
                    $this->load->view('templates/footer');
                } else {

                    $start_date = $this->input->post('start_date');
                    $end_date = $this->input->post('end_date');
                    $end_date_ly = date('Y-m-d', strtotime($end_date.'-1 years'));
                    $this_year = date('Y', strtotime($start_date));
                    $last_year = date('Y', strtotime($end_date_ly));

                    $data['start_date'] = $start_date;
                    $data['end_date'] = $end_date;
                    $data['end_date_ly'] = $end_date_ly;
                    $data['this_year'] = $this_year;
                    $data['last_year'] = $last_year;

                    $data['requests'] = $this->Report_model->chiefs_weekly($start_date, $end_date, $end_date_ly, $this_year, $last_year); 
                    $data['week_total'] = $this->Report_model->select_count_received_week($start_date, $end_date);
                    $data['received_ytd'] = $this->Report_model->select_received_ytd($this_year, $end_date);
                    $data['completed_ytd'] = $this->Report_model->select_completed_ytd($this_year, $end_date);
                    $data['received_lytd'] = $this->Report_model->select_received_lytd($last_year, $end_date_ly);

                    //$str = $this->db->last_query();
                    //echo "<pre>";
                    //print_r($str);
                    //exit;

                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar');
                    $this->load->view('reports/chiefs_weekly', $data);
                    $this->load->view('templates/footer');
                }
            }else{
                redirect('login/view');
            }

    	}

    	public function prs_monthly(){
    		
    	}
    }