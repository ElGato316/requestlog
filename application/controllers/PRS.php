<?php
    class PRS extends CI_Controller{
     
        public function dashboard(){
            if(!$_SESSION['logged_in']){
				redirect('login/view');
			}
            
            $data['title'] = "All Open Requests For ".$_SESSION['firstname']." ".$_SESSION['lastname']."";
            
            $id = $_SESSION['id'];

            $data['requests'] = $this->PRS_model->get_open_requests_by_prs($id);

            $this->load->view('templates/header');
            $this->load->view('templates/prs_banner');
            $this->load->view('prs/prs_dashboard', $data);
            $this->load->view('templates/footer');
        }

        public function edit_request($id){

            if ($_SESSION['logged_in'] == FALSE) {
                redirect('login/view');
            }
            
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

        public function update_request(){


            if ($_SESSION['logged_in'] == FALSE) {
                redirect('login/view');
            }

            $this->PRS_model->edit_request_prs($id);

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

			redirect('PRS/dashboard');

        }

        public function search_requests(){

            if ($_SESSION['logged_in'] == FALSE) {
                redirect('login/view');
            }

            $data['title'] = "Request Search";

            if ($this->input->server('REQUEST_METHOD') === 'GET') {
                $this->load->view('templates/header');
                $this->load->view('templates/prs_banner');
                $this->load->view('prs/prs_search', $data);
                $this->load->view('templates/footer');
            } else {

                $input = $this->input->post('input');

                $data['input'] = $input;

                $id = $_SESSION['id'];

                $data['requests'] = $this->PRS_model->search_requests($input, $id);

                $this->load->view('templates/header');
                $this->load->view('templates/prs_banner');
                $this->load->view('prs/prs_search', $data);
                $this->load->view('templates/footer');
            }
        }

        public function change_password(){

            if ($_SESSION['logged_in'] == FALSE) {
                redirect('login/view');
            }

            $data['title'] = "Change Current Password";
            //$data['current_password_db'] = $this->User_model->get_password($prs_id);

            if ($this->input->server('REQUEST_METHOD') === 'GET') {

                $this->load->view('templates/header');
                $this->load->view('templates/prs_banner');
                $this->load->view('prs/prs_change_password', $data);
                $this->load->view('templates/footer');

            }else{

                $prs_id = $_SESSION['id'];
                $current_password_input = md5($this->input->post('current_password'));
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password'); 
                $enc_password = md5($new_password);
                $current_password_db = $this->User_model->get_password($prs_id);

                if($current_password_input === $current_password_db){

                    if($new_password === $confirm_password){

                        $this->User_model->update_password($prs_id, $enc_password);

                        // Set message
                        $this->session->set_flashdata('password_updated', 'Password Changed', 20);
                
                        redirect('Transactions/updated_password');

                    }else{
                        // Set message
                        $this->session->set_flashdata('password_confirm_error', 'Your New Passwords Do Not Match!', 20);
                        redirect('PRS/change_password');

                    }

                }else{
                    // Set message
				    $this->session->set_flashdata('password_error', 'Wrong Current Password! ', 20);
                    redirect('PRS/change_password');
                }

            };
        }

        public function paid_open_requests_prs(){

            if ($_SESSION['logged_in'] == FALSE) {
                redirect('login/view');
            }

            $data['title'] = "Paid and Open Requests For ...";

            $id = $_SESSION['id'];

            $data['requests'] = $this->PRS_model->get_paid_open_request_prs($id);

            $this->load->view('templates/header');
            $this->load->view('templates/prs_banner');
            $this->load->view('prs/prs_view_paid', $data);
            $this->load->view('templates/footer');
        }

        public function prs_statistics(){
            if ($_SESSION['logged_in'] == FALSE) {
                redirect('login/view');
            }

            $data['title'] = "PRS Statistics";

            if ($this->input->server('REQUEST_METHOD') === 'GET') {
                $this->load->view('templates/header');
                $this->load->view('templates/prs_banner');
                $this->load->view('prs/prs_stats', $data);
                $this->load->view('templates/footer');
            } else {

                $prs_id = $_SESSION['id'];
                $start_date = $this->input->post('start_date');
                $end_date = $this->input->post('end_date');
                $year_start = date('Y', strtotime($start_date))."-01-01";
    
                $data['stats'] = $this->Report_model->prs_monthly($prs_id, $start_date, $end_date, $year_start);

                $data['start_date'] = $start_date;
                $data['end_date'] = $end_date;

                $this->load->view('templates/header');
                $this->load->view('templates/prs_banner');
                $this->load->view('prs/prs_stats', $data);
                $this->load->view('templates/footer');
            }

        }
    }