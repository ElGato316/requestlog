<?php
    class Request_model extends CI_Model{

        public function get_agencies(){

            $sql = "select id, agency_name as agency from agency order by agency";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function get_statuses(){

            $sql = "select id, status from status order by status";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function get_prs_open_requests(){
            $sql = "select concat(u.lastname,\", \", u.firstname) as name, count(*) as opened
                    from requests as r
                        join users as u on r.user_id = u.id
                    where date_completed is null 
                    group by user_id
                    order by u.lastname;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function get_last_eight_request_entered(){
            $sql = "select r.govqa, r.date_assigned, concat(u.lastname,\", \", u.firstname) as name
                    from requests as r
                        join users as u on r.user_id = u.id
                    order by r.id desc 
                    limit 8";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function add_request(){

            $data = array(
                'date_received' => $this->input->post('date-received'),
                'govqa' => $this->input->post('govqa'),
                'pd_case' => $this->input->post('pd_case'),
                'agency_id' => $this->input->post('agency_id'),
                'agency_agent' => $this->input->post('agency_agent'),
                'user_id' => $this->input->post('user_id'),
                'status' => $this->input->post('status'),
                'comments' => $this->input->post('comments')
            );

            return $this->db->insert('requests', $data);
        }

    }