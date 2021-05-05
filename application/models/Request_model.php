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
                    limit 10";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function get_all_open_requests(){
            $sql = "select r.id, r.date_received, r.govqa, s.status, r.pd_case, a.agency_name, concat(u.lastname,\", \", u.firstname) as name, comments 
                    from requests as r
                        left join users as u on r.user_id = u.id
                        left join status as s on r.status_id = s.id
                        left join agency as a on r.agency_id = a.id
                    where r.date_completed is null or r.date_completed = '0000-00-00'
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
            $sql = "select r.id, r.date_received, r.date_completed, r.govqa, s.status, r.pd_case, a.agency_name, concat(u.lastname,\", \", u.firstname) as name, comments 
                    from requests as r
                        join users as u on r.user_id = u.id
                        join status as s on r.status_id = s.id
                        join agency as a on r.agency_id = a.id
                    where r.govqa like '%".$input."%'
                            or s.status like '%".$input."%'
                            or r.pd_case like '%".$input."%'
                            or r.agency_agent like '%".$input."%'
                            or a.agency_name like '%".$input."%'
                            or r.comments like '%".$input."%'
                            or u.lastname like '%".$input."%'
                            or u.firstname like '%".$input."%'
                            or r.id like '%".$input."%'
                    order by r.date_received;";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function add_request(){

            if(!$this->input->post('invoice_needed')){
                $checked = 0;
            }else{
                $checked = 1;
            }

            $data = array(
                'date_received' => $this->input->post('date_received'),
                'date_completed' => '0000-00-00',
                'govqa' => $this->input->post('govqa'),
                'pd_case' => $this->input->post('pd_case'),
                'agency_id' => $this->input->post('agency_id'),
                'agency_agent' => $this->input->post('agency_agent'),
                'user_id' => $this->input->post('user_id'),
                'status_id' => $this->input->post('status'),
                'invoice_needed' => $checked,
                'number_of_videos' => $this->input->post('number_of_videos'),
                'comments' => $this->input->post('comments')
            );

            return $this->db->insert('requests', $data);
        }

        public function get_request($id){
            $sql = "select r.id, r.date_received, r.govqa, r.pd_case, r.activity_number, r.user_id, concat(u.lastname, ', ', u.firstname) as name, 
                    r.status_id, s.status as status_name, r.date_completed, r.agency_id, a.agency_name, r.agency_agent, r.number_of_videos,
                    r.videos_redacted, r.hours_reviewed, r.invoice_needed, r.date_invoiced, r.date_paid, r.officer_notified, r.date_notified, 
                    r.completed_by_other_user, r.other_user_id, concat(u2.lastname, ', ', u2.firstname) as name2, r.comments
                    from requests as r
                        join users as u on r.user_id = u.id
                        join status as s on r.status_id = s.id 
                        join agency as a on r.agency_id = a.id
                        left join users as u2 on r.other_user_id = u2.id
                    where r.id = ?";
            $query = $this->db->query($sql, $id);
            return $query->row_array();

        }

        public function edit_request($id){

            if(($this->input->post('invoice_needed') == 1)){
                $invoice_needed = 1;
            }else{
                $invoice_needed = 0;
            }

            if(($this->input->post('completed_by_other_user') == 1)){
                $completed_by_other_user = 1;
            }else{
                $completed_by_other_user = 0;
            }

            if(($this->input->post('officer_notified') == 1)){
                $officer_notified = 1;
            }else{
                $officer_notified = 0;
            }

            $data = array(
                //Dates
                'date_received' => $this->input->post('date_received'),
                'date_assigned' => $this->input->post('date_assigned'),
                'date_completed' => $this->input->post('date_completed'),
                'date_invoiced' => $this->input->post('date_invoiced'),
                'date_paid' => $this->input->post('date_paid'),
                'date_notified' => $this->input->post('date_notified'),

                //Checkboxes(yes/no)
                'completed_by_other_user' => $completed_by_other_user,
                //'invoice_sent' => $this->input->post('invoice_sent'),
                //'payment_received' => $this->input->post('payment_received'),
                'invoice_needed' => $invoice_needed,
                'officer_notified' => $officer_notified,
                
                //Dropdown Boxes
                'status_id' => $this->input->post('status_id'),
                'agency_id' => $this->input->post('agency_id'),
                'user_id' => $this->input->post('user_id'),
                'other_user_id' => $this->input->post('other_user_id'),

                //Textboxes
                'govqa' => $this->input->post('govqa'),
                'pd_case' => $this->input->post('pd_case'),
                'agency_agent' => $this->input->post('agency_agent'),
                'videos_redacted' => $this->input->post('videos_redacted'),
                'hours_reviewed' => $this->input->post('hours_reviewed'),
                'number_of_videos' => $this->input->post('number_of_videos'),
                'activity_number' => $this->input->post('activity_number'),
                
                //TextArea
                'comments' => $this->input->post('comments')
            );

            $this->db->where('id', $this->input->post('id'));
			return $this->db->update('requests', $data);

        }

        public function __edit_request($id){

            //set variables
            $id = $this->input->post('id');
            $date_received = $this->input->post('date_received');
            $govqa = $this->input->post('govqa');
            $pd_case = $this->input->post('pd_case');
            $activity_number = $this->input->post('activity_number');
            $user_id = $this->input->post('user_id');
            $status = $this->input->post('status');
            $date_completed = $this->input->post('date_completed');
            $agency_id = $this->input->post('agency_id');
            $agency_agent = $this->input->post('agency_agent');
            $number_of_videos = $this->input->post('number_of_videos');
            $videos_redacted = $this->input->post('videos_redacted');
            $hours_reviewed = $this->input->post('hours_reviewed');
            $invoice_needed = $this->input->post('invoice_needed');
            $date_invoiced = $this->input->post('date_invoiced');
            $date_paid = $this->input->post('date_paid');
            $officer_notified = $this->input->post('officer_notified');
            $date_notified = $this->input->post('date_notified');
            $completed_by_other_user = $this->input->post('completed_by_other_user');
            $other_user_id = $this->input->post('other_user_id');
            $comments = $this->input->post('comments');

            //set query
            $sql = "UPDATE requests
                    SET
                        date_received = ".$date_received.",
                        govqa = ".$govqa.",
                        pd_case = ".$pd_case.",
                        activity_number = ".$activity_number.",
                        user_id = ".$user_id.",
                        status = ".$status.",
                        date_completed = ".$date_completed.",
                        agency_id = ".$agency_id.",
                        agency_agent = ".$agency_agent.",
                        number_of_videos = ".$number_of_videos.",
                        videos_redacted = ".$videos_redacted.",
                        hours_reviewed = ".$hours_reviewed.",
                        invoice_needed = ".$invoice_needed.",
                        date_invoiced = ".$date_invoiced.",
                        date_paid = ".$date_paid.",
                        officer_notified = ".$officer_notified.",
                        date_notified = ".$date_notified.",
                        completed_by_other_user = ".$completed_by_other_user.",
                        other_user_id = ".$other_user_id.",
                        comments = ".$comments."
                    WHERE
                        id = ".$id."";

            //run query
            $this->db->query($sql);

            //redirect to requests/views
            redirect('request/view');

        }

        public function search_requests_by_user($id){
            
            $sql = "select r.id, r.date_received, r.date_completed, r.govqa, s.status, r.pd_case, a.agency_name, concat(u.lastname,\", \", u.firstname) as name, comments 
            from requests as r
                join users as u on r.user_id = u.id
                join status as s on r.status_id = s.id
                join agency as a on r.agency_id = a.id
            where r.user_id = ".$id."
            order by r.date_received desc
            limit 2000;";

            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function get_pending_invoices(){

            $sql = "select r.id, r.date_received, r.date_completed, r.govqa, s.status, r.pd_case, a.agency_name, concat(u.lastname,\", \", u.firstname) as name, comments 
                    from requests as r
                        join users as u on r.user_id = u.id
                        join status as s on r.status_id = s.id
                        join agency as a on r.agency_id = a.id
                    where r.invoice_needed = 1 
                            and r.date_invoiced is null 
                            and r.date_completed is null 
                            and s.id NOT IN (1,3,5,12)
                            or r.date_invoiced = '0000-00-00' 
                    order by r.date_received;";

            $query = $this->db->query($sql);
            return $query->result_array();

        }

        public function search_requests_by_status($status_id){

            //$status_id = 5;

            $sql = "select r.id, r.date_received, r.date_completed, r.govqa, s.status, r.pd_case, a.agency_name, concat(u.lastname,\", \", u.firstname) as name, comments 
            from requests as r
                join users as u on r.user_id = u.id
                join status as s on r.status_id = s.id
                join agency as a on r.agency_id = a.id
            where r.status_id = ".$status_id."
            order by r.date_received desc";

            $query = $this->db->query($sql);
            return $query->result_array();

        }

        public function get_last_request_id(){

            $sql = "select id from requests order by id desc limit 1";

            $query = $this->db->query($sql);

            return $query->row_array();
        }


    }