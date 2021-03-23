<?php
    class User_model extends CI_Model{

        public function get_all_active_users(){

            $this->db->order_by('lastname');
            $query = $this->db->get_where('users', array('active' => 1));

            return $query->result_array();
        }
        
    }