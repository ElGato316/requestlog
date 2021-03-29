<?php
    class Request_model extends CI_Model{

        public function get_agencies(){

            $sql = "select id, agency_name as agency from agency order by agency";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function add_request(){

            $data = array(
                'date_received' => $this->input->post('date-received'),
                'date_assigned' => $this->input->post('date-assigned'),
                'govqa' => $this->input->post('govqa'),
                'pd_case' => $this->input->post('pd_case'),
                'agency_id' => $this->input->post('agency_id'),
                'agency_agent' => $this->input->post('agency_agent'),
                'user_id' => $this->input->post('user_id'),
                'comments' => $this->input->post('comments')
            );

            return $this->db->insert('requests', $data);
        }

    }