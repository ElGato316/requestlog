<?php
    class Transactions extends CI_Controller{

        public function add_user(){

            $id = $this->User_model->get_last_user();

            $ip = $this->input->ip_address();

            $data = array(
                'user_id' => $_SESSION['id'],
                'comments' => 'User Added',
                'ip_address' => $ip,
                'user_id_updated' => $id['id']
            );

            $this->db->insert('transactions', $data);

            redirect('users/view');
        }

        public function add_request(){

            $id = $this->Request_model->get_last_request_id();

            $ip = $this->input->ip_address();

            $data = array(
                'user_id' => $_SESSION['id'],
                'comments' => 'Request Added',
                'ip_address' => $ip,
                'request_id' => $id['id']
            );

            $this->db->insert('transactions', $data);

            redirect('requests/add');
        }
        
    }