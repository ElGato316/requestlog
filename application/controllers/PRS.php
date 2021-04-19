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
    }