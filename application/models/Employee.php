<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Model {

    function __construct() {
        $this->userTbl = 'emp';
    }

    /*
     * get rows from the users table
     */

    function getRows($params = array()) {

        $this->db->select('*');
        $this->db->from($this->userTbl);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        if (array_key_exists("id", $params)) {
            $this->db->where('id', $params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            //set start and limit
            if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
                $result = $query->num_rows();
            } elseif (array_key_exists("returnType", $params) && $params['returnType'] == 'single') {
                $result = ($query->num_rows() > 0) ? $query->row_array() : FALSE;
            } else {
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }
        //return fetched data
        return $result;
    }

    function getTripRecords($params = array()) {
        $this->db->select('*');
        $this->db->from('trip_details as td');
        $this->db->join('trip_type_maping as tt', 'tt.trip_type = td.activity_id');
        $this->db->join('trip_details_vendor_maping as vm', 'vm.id = td.vendor_id');
        $this->db->join('trip_details_pilot_maping as pm', 'pm.id = td.pilot_id');
        $this->db->join('trip_details_boat_maping as bm', 'bm.id = td.boat_id');
        $this->db->where('td.emp_id', $params['emp_id']);
        if(isset($params['booking_id']) && $params['booking_id'] !='' && $params['booking_id']!=0){
          $this->db->where('td.booking_id', $params['booking_id']);  
        }
         
        $this->db->order_by("td.Sno", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
        }
        return $data;
        //return fetched data
        //return $result;
    }

        function getActivityList() {
        $this->db->select('*');
        $this->db->from('trip_type_maping');
        $this->db->where('is_active = 1');
        //$this->db->order_by("td.Sno", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
        }
        return $data;
    }


        function getBoatList() {
        $this->db->select('*');
        $this->db->from('trip_details_boat_maping');
        $this->db->where('is_active = 1');
        //$this->db->order_by("td.Sno", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
        }
        return $data;
    }

        function getVendorList() {
        $this->db->select('*');
        $this->db->from('trip_details_vendor_maping');
        $this->db->where('is_active = 1');
        //$this->db->order_by("td.Sno", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
        }
        return $data;
    }

        function getPilotList() {
        $this->db->select('*');
        $this->db->from('trip_details_pilot_maping');
        $this->db->where('is_active = 1');
        //$this->db->order_by("td.Sno", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
        }
        return $data;
    }

    /*
     * Insert user information
     */

    public function insert($data = array()) {
        //add created and modified data if not included
        if (!array_key_exists("created", $data)) {
            $data['created'] = date("Y-m-d H:i:s");
        }
        if (!array_key_exists("modified", $data)) {
            $data['modified'] = date("Y-m-d H:i:s");
        }

        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);

        //return the status
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function createProcess($data = array()) {
        //add created and modified data if not included
        if (!array_key_exists("created", $data)) {
            $data['created'] = date("Y-m-d H:i:s");
        }
        if (!array_key_exists("modified", $data)) {
            $data['modified'] = date("Y-m-d H:i:s");
        }
        $lastId = $this->db->get_last_row($table = 'trip_details');
        $bookingId = $lastId->booking_id + 1;


        $tripInfo = array('emp_id' => $data['empId'], 'booking_id' => $bookingId, 'activity_id' => $data['activity'], 'vendor_id' => $data['vendor'], 'pilot_id' => $data['pilot'], 'boat_id' => $data['boat'], 'total_seats' => $data['customerCount'], 'trip_date' => $data['Tripdate'], 'start_time' => $data['startTime'], 'end_time' => $data['endTime'], 'status' => $data['status'], 'comment' => $data['bookingComments']);
        //insert user data to users table
        $insert = $this->db->insert($table, $tripInfo);
        //return the status
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }


   public function updateProcess($data = array()) {

    //add created and modified data if not included
        if (!array_key_exists("created", $data)) {
            $data['created'] = date("Y-m-d H:i:s");
        }
        if (!array_key_exists("modified", $data)) {
            $data['modified'] = date("Y-m-d H:i:s");
        }
      $tripInfo = array('emp_id' => $data['empId'],'activity_id' => $data['activity'], 'vendor_id' => $data['vendor'], 'pilot_id' => $data['pilot'], 'boat_id' => $data['boat'], 'total_seats' => $data['customerCount'], 'trip_date' => $data['Tripdate'], 'start_time' => $data['startTime'], 'end_time' => $data['endTime'], 'status' => $data['status'], 'comment' => $data['bookingComments']);

    $this->db->where('booking_id', $data['bookingId']);
    $this->db->update('trip_details', $tripInfo);
            return true;
    
}

}
