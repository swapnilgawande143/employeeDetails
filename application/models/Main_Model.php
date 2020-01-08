<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    /*
     * Get Employee
     */

    function getAllEmployees() {

        $query = $this->db->get('employee_details');
        return $query->result();
    }

    /*
     * Insert employee data
     */

    public function addEmployeeData($data) {
        $insert = $this->db->insert('employee_details', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    /*
     * Update employee data
     */

    public function editEmployeeData($data, $employeeId) {
        if (!empty($data) && !empty($employeeId)) {
            $update = $this->db->update('employee_details', $data,
                    array('employeeId' => $employeeId));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    /*
     * Delete employee data
     */

    public function removeEmployeeData($employeeId) {
        $delete = $this->db->delete('employee_details',
                array('employeeId' => $employeeId));
        return $delete ? true : false;
    }

    /*
     * get employee data
     */

    public function viewEmpDetailsData($employeeId) {
        $this->db->select('*');
        $this->db->from('employee_details');
        $this->db->where('employeeId', $employeeId);
        $query = $this->db->get();
        return $query->result();
    }

}
