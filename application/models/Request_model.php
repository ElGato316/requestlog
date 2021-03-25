<?php
    class Request_model extends CI_Model{

        public function get_agencies(){

            $sql = "select id, agency_name as agency from agency order by agency";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

    }