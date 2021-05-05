<?php   
    class Report_model extends CI_Model{
        
        public function chiefs_weekly($start_date, $end_date, $end_date_ly, $this_year, $last_year){

            $sql = "SELECT 
                        A.agency_name AS Agency,
                        IFNULL(ReceivedTW.Requests, 0) AS ReceivedTW,
                        IFNULL(ReceivedTY.Requests, 0) AS ReceivedTY,
                        IFNULL(CompletedTY.Requests, 0) AS CompletedTY,
                        IFNULL(ReceivedLYTD.Requests, 0) AS ReceivedLYTD
                    FROM
                        agency A
                            LEFT OUTER JOIN
                        (SELECT 
                            Agency_Id, COUNT(1) AS Requests
                        FROM
                            requests
                        WHERE
                            Date_Assigned BETWEEN '".$start_date."' AND '".$end_date."' 
                        GROUP BY Agency_Id) ReceivedTW ON A.Id = ReceivedTW.Agency_Id
                            LEFT OUTER JOIN
                        (SELECT 
                            Agency_Id, COUNT(1) AS Requests
                        FROM
                            requests
                        WHERE
                            Date_Assigned BETWEEN '".$this_year."-01-01' AND '".$end_date."'
                        GROUP BY Agency_Id) ReceivedTY ON A.Id = ReceivedTY.Agency_Id
                            LEFT OUTER JOIN
                        (SELECT 
                            Agency_Id, COUNT(1) AS Requests
                        FROM
                            requests
                        WHERE
                            Date_Completed BETWEEN '".$this_year."-01-01' AND '".$end_date."' GROUP BY Agency_Id) CompletedTY ON A.Id = CompletedTY.Agency_id
                            LEFT OUTER JOIN
                        (SELECT 
                            Agency_Id, COUNT(1) AS Requests
                        FROM
                            requests
                        WHERE
                            Date_Assigned BETWEEN '".$last_year."-01-01' AND '".$end_date_ly."' GROUP BY Agency_Id) ReceivedLYTD ON A.Id = ReceivedLYTD.Agency_id
                    ORDER BY Agency ASC;";
            
            $query = $this->db->query($sql);
            
            return $query->result_array();

        }

        public function select_count_received_week($start_date, $end_date){

            $sql = "SELECT COUNT(1) as count FROM requests WHERE Date_Assigned BETWEEN '".$start_date."' AND '".$end_date."'";
            $query = $this->db->query($sql);
            return $query->row()->count; 
        }

        public function select_received_ytd($this_year, $end_date){

            $sql = "SELECT COUNT(1) as count FROM requests WHERE Date_Assigned BETWEEN '".$this_year."-01-01' AND '".$end_date."'";
            $query = $this->db->query($sql);
            return $query->row()->count;

        }

        public function select_completed_ytd($this_year, $end_date){

            $sql = "SELECT COUNT(1) as count FROM requests WHERE Date_Completed BETWEEN '".$this_year."-01-01' AND '".$end_date."'";
            $query = $this->db->query($sql);
            return $query->row()->count;

        }

        public function select_received_lytd($last_year, $end_date_ly){

            $sql = "SELECT COUNT(1) as count FROM requests WHERE Date_Assigned BETWEEN '".$last_year."-01-01' AND '".$end_date_ly."'";
            $query = $this->db->query($sql);
            return $query->row()->count;

        }

        public function prs_monthly($prs_id, $start_date, $end_date, $year_start){

            $sql = "SELECT 	
                        u.id,
                        CONCAT(u.lastname, ', ', u.firstname) as Name,
                        ReceivedTM.Requests as ReceivedTM,
                        CompletedTM.Requests as CompletedTM,
                        VideosRedactedTM.Requests as VideosRedactedTM,
                        ReceivedYTD.Requests as ReceivedYTD,
                        CompletedYTD.Requests as CompletedYTD,
                        VideosRedactedYTD.Requests as VideosRedactedYTD
                
                    FROM 
                        users as u
                        LEFT OUTER JOIN 
                            (SELECT user_id, COUNT(1) as Requests FROM requests WHERE date_assigned BETWEEN '".$start_date."' and '".$end_date."' GROUP BY user_id) 
                            as ReceivedTM on u.id = ReceivedTM.user_id
                        LEFT OUTER JOIN 
                            (SELECT user_id, COUNT(1) as Requests FROM requests WHERE date_completed BETWEEN '".$start_date."' and '".$end_date."' GROUP BY user_id) 
                            as CompletedTM on u.id = CompletedTM.user_id
                        LEFT OUTER JOIN 
                            (SELECT user_id, SUM(videos_redacted) as Requests FROM requests WHERE date_completed BETWEEN '".$start_date."' and '".$end_date."' GROUP BY user_id) 
                            as VideosRedactedTM on u.id = VideosRedactedTM.user_id
                        LEFT OUTER JOIN 
                            (SELECT user_id, COUNT(1) as Requests FROM requests WHERE date_assigned BETWEEN '".$year_start."' and '".$end_date."' GROUP BY user_id) 
                            as ReceivedYTD on u.id = ReceivedYTD.user_id
                        LEFT OUTER JOIN 
                            (SELECT user_id, COUNT(1) as Requests FROM requests WHERE date_completed BETWEEN '".$year_start."' and '".$end_date."' GROUP BY user_id) 
                            as CompletedYTD on u.id = CompletedYTD.user_id
                        LEFT OUTER JOIN 
                            (SELECT user_id, SUM(videos_redacted) as Requests FROM requests WHERE date_completed BETWEEN '".$year_start."' and '".$end_date."' GROUP BY user_id) 
                            as VideosRedactedYTD on u.id = VideosRedactedYTD.user_id
                    
                    WHERE
                        u.id = $prs_id";

            $query = $this->db->query($sql);
                        
            return $query->row_array();
        }
    }