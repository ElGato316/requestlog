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

        public function get_all_open_requests(){
            $sql = "select r.id, r.date_received, r.govqa, s.status, r.pd_case, a.agency_name, concat(u.lastname,\", \", u.firstname) as name, comments 
                    from requests as r
                        join users as u on r.user_id = u.id
                        join status as s on r.status = s.id
                        join agency as a on r.agency_id = a.id
                    where r.date_completed is null
                    order by r.date_received;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function get_all_requests(){
            $sql = "select r.id, r.date_received, r.govqa, s.status, r.pd_case, a.agency_name, concat(u.lastname,\", \", u.firstname) as name, comments 
                    from requests as r
                        join users as u on r.user_id = u.id
                        join status as s on r.status = s.id
                        join agency as a on r.agency_id = a.id
                    order by r.date_received;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function search_requests($input){
            $sql = "select r.id, r.date_received, r.govqa, s.status, r.pd_case, a.agency_name, concat(u.lastname,\", \", u.firstname) as name, comments 
                    from requests as r
                        join users as u on r.user_id = u.id
                        join status as s on r.status = s.id
                        join agency as a on r.agency_id = a.id
                    where r.govqa like '%".$input."%'
                            or s.status like '%".$input."%'
                            or r.pd_case like '%".$input."%'
                            or r.agency_agent like '%".$input."%'
                            or a.agency_name like '%".$input."%'
                            or r.comments like '%".$input."%'
                            or u.lastname like '%".$input."%'
                            or u.firstname like '%".$input."%'
                    order by r.date_received;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function add_request(){

            $data = array(
                'date_received' => $this->input->post('date_received'),
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