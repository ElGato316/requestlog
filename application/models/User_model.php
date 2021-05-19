<?php
    class User_model extends CI_Model{

        public $firstname;
        public $lastname;
        public $badge;
        public $supervisor;
        public $active;
        public $role;

        public function get_all_active_users(){

            $sql = "select id, concat(firstname, ' ', lastname) as name from users where active = 1 order by role, lastname";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function get_all_users(){

            $sql = "select * from users order by role, lastname";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function get_user($id){
            $sql = "select * from users where id = ?";
            $query = $this->db->query($sql, $id);
            return $query->row_array();
        }

        public function get_last_user(){
            $sql = "select id from users order by id desc limit 1";

            $query = $this->db->query($sql);

            return $query->row_array();
        }

        public function add_user($enc_password){

            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'active' => $this->input->post('active'),
                'supervisor' => $this->input->post('supervisor'),
                'role' => $this->input->post('role')
            );
            
            return $this->db->insert('users', $data);
        }

        public function edit_user($id){

            if (!empty($this->input->post('password'))) {

                $enc_password = md5($this->input->post('password'));

                $data = array(
                    //'id' => $this->input->post('id'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'username' => $this->input->post('username'),
                    'password' => $enc_password,
                    'active' => $this->input->post('active'),
                    'supervisor' => $this->input->post('supervisor'),
                    'role' => $this->input->post('role')
                );
            } else {
                $data = array(
                    //'id' => $this->input->post('id'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'username' => $this->input->post('username'),
                    'active' => $this->input->post('active'),
                    'supervisor' => $this->input->post('supervisor'),
                    'role' => $this->input->post('role')
                );
            }

            $this->db->where('id', $this->input->post('id'));
			return $this->db->update('users', $data);

        }
        
        public function get_password($user_id){

            $sql = "SELECT password FROM users WHERE id = ?";

            $query = $this->db->query($sql, $user_id);

            return $query->row()->password;

        }

        public function update_password($user_id, $new_password){

            $data = array(
                'password' => $new_password
            );

            $this->db->where('id', $user_id);
            return $this->db->update('users', $data);

        }
    }