<?php   
    class PRS_model extends CI_Model{
        
        public function get_open_requests_by_prs($id){

            $sql = "select r.id, r.date_received, r.govqa, s.status, r.pd_case, a.agency_name, concat(u.lastname,\", \", u.firstname) as name, comments 
                    from requests as r
                        left join users as u on r.user_id = u.id
                        left join status as s on r.status_id = s.id
                        left join agency as a on r.agency_id = a.id
                    where r.user_id = ".$id." and r.date_completed is null 
                    or r.user_id = ".$id." and r.date_completed = '0000-00-00'
                    order by r.date_received;";
            $query = $this->db->query($sql);
            return $query->result_array();

        }

        public function edit_request_prs(){

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

        public function update_request_prs($id){

        }

        public function search_requests($input){

        }

    }