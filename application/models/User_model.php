<?php
    class User_model extends CI_Model{

        public function get_all_active_users(){

            $sql = "select * from users where active = 1 order by role, lastname";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        
    }