<?php   
    class Login_model extends CI_Model{

		public function validate_user($username, $password){
			
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$query = $this->db->get('users');

            if($query->num_rows() == 1){
				return $query->row_array();
			} else {
				return false;
			}
		}
    }