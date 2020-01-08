<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->helper('form', 'url', 'html');
        $this->load->library('form_validation');
        $this->load->model('Main_Model');
    }

    /*
     * View employee form
     */

    public function index() {
        $this->load->model('Main_Model');
        $data['result'] = $this->Main_Model->getAllEmployees();
        $this->load->view('header');
        $this->load->view('home', $data);
    }

    /*
     * Add employee form
     */

    public function addEmployee() {

        $this->load->view('header');
        $this->load->view('addEmployee');
    }

    /*
     * Add employee data to database
     */

    public function addEmployeeData() {
        $data = array();
        $postData = array();

        //if submitEmpData request is submitted
        //form field validation rules
        $this->form_validation->set_rules('e_i_d', 'Employee ID',
                'required|max_length[20]|min_length[1]|trim|is_unique[employee_details.employeeId]');
        $this->form_validation->set_rules('e_name', 'Employee Name',
                'required|max_length[100]|min_length[2]');
        $this->form_validation->set_rules('e_contact',
                'Employee Contact Number',
                'required|numeric|max_length[15]|min_length[10]|trim|is_unique[employee_details.employeeContact]');
        $this->form_validation->set_rules('e_mail_id', 'Employee Email ID',
                'required|max_length[100]|min_length[7]|trim|valid_email|is_unique[employee_details.employeeEmail]');
        $this->form_validation->set_rules('e_department', 'Department Name',
                'required|max_length[100]|min_length[2]');
        $this->form_validation->set_rules('e_designation', 'Designation Name',
                'required|max_length[100]|min_length[2]');
        $this->form_validation->set_rules('e_gender', 'gender', 'required');
        $this->form_validation->set_rules('e_address', 'Employee Address',
                'required|max_length[200]|min_length[2]');
        date_default_timezone_set('Asia/kolkata');
        $now = date('Y-m-d H:i:s');

        //array to send data to model to insert data
        $postData = array(
            'employeeId' => $this->input->post('e_i_d'),
            'employeeName' => $this->input->post('e_name'),
            'employeeContact' => $this->input->post('e_contact'),
            'employeeEmail' => $this->input->post('e_mail_id'),
            'employeeDepartment' => $this->input->post('e_department'),
            'employeeDesignation' => $this->input->post('e_designation'),
            'gender' => $this->input->post('e_gender'),
            'employeeAddress' => $this->input->post('e_address'),
            'createdOn' => $now
        );

        //validate submitted form data
        if ($this->form_validation->run() == FALSE) {

            $this->form_validation->set_error_delimiters('<div style="color:red" class="error">',
                    '</div>');

            $this->load->view('header');
            $this->load->view('addEmployee');
        } else {
            //insert post data
            $this->load->model('Main_Model');
            $insert = $this->Main_Model->addEmployeeData($postData);

            if ($insert) {
                $this->session->set_flashdata('success_msg',
                        'Employee Details has been added successfully.');

                $this->output->set_header('refresh:0; url=' . base_url() . 'index.php/Main_Controller/addEmployee');
            } else {
                $this->session->set_flashdata('error_msg',
                        'Some problems occurred, please try again..');
                $this->output->set_header('refresh:0; url=' . base_url() . 'index.php/Main_Controller/addEmployee');
            }
        }
    }

    public function deleteEmployee() {
        $this->load->model('Main_Model');
        $employeeId = $this->input->post('employeeId');
        $remove = $this->Main_Model->removeEmployeeData($employeeId);
        if ($remove) {
            echo json_encode(array("ErrorFlag" => TRUE));
        } else {
            echo json_encode(array("ErrorFlag" => false));
        }
    }

    public function viewEmpDetails() {
        $this->load->model('Main_Model');
        $employeeId = $this->input->post('employeeId');
        $view = $this->Main_Model->viewEmpDetailsData($employeeId);
        if ($view) {
            echo json_encode($view);
        } else {
            echo json_encode(array("ErrorFlag" => false));
        }
    }

    public function editEmployeeDetails() {
        $this->load->model('Main_Model');
        $data = array();
        $postData = array();

        //if submitEmpData request is submitted
        //form field validation rules

        $this->form_validation->set_rules('e_i_d_temp', 'Employee ID',
                'required|max_length[20]|min_length[1]|trim');

        if ($this->input->post('e_i_d') != $this->input->post('e_i_d_temp')) {
            $this->form_validation->set_rules('e_i_d', 'Employee ID',
                    'required|max_length[20]|min_length[1]|trim|is_unique[employee_details.employeeId]');
        }

        $this->form_validation->set_rules('e_name', 'Employee Name',
                'required|max_length[100]|min_length[2]');


        if ($this->input->post('e_contact') != $this->input->post('e_contact_temp')) {
            $this->form_validation->set_rules('e_contact',
                    'Employee Contact Number',
                    'required|numeric|max_length[15]|min_length[10]|trim|is_unique[employee_details.employeeContact]');
        }

        if ($this->input->post('e_mail_id') != $this->input->post('e_mail_id_temp')) {
            $this->form_validation->set_rules('e_mail_id', 'Employee Email ID',
                    'required|max_length[100]|min_length[7]|trim|valid_email|is_unique[employee_details.employeeEmail]');
        }


        $this->form_validation->set_rules('e_department', 'Department Name',
                'required|max_length[100]|min_length[2]');
        $this->form_validation->set_rules('e_designation', 'Designation Name',
                'required|max_length[100]|min_length[2]');
        $this->form_validation->set_rules('e_gender', 'gender', 'required');
        $this->form_validation->set_rules('e_address', 'Employee Address',
                'required|max_length[200]|min_length[2]');
        date_default_timezone_set('Asia/kolkata');
        $now = date('Y-m-d H:i:s');

        //array to send data to model to insert data
        $postData = array(
            'employeeId' => $this->input->post('e_i_d'),
            'employeeName' => $this->input->post('e_name'),
            'employeeContact' => $this->input->post('e_contact'),
            'employeeEmail' => $this->input->post('e_mail_id'),
            'employeeDepartment' => $this->input->post('e_department'),
            'employeeDesignation' => $this->input->post('e_designation'),
            'gender' => $this->input->post('e_gender'),
            'employeeAddress' => $this->input->post('e_address'),
            'updatedOn' => $now
        );
        $employeeId = $this->input->post('e_i_d_temp');
        //validate submitted form data
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_msg',
                    'Some problems occurred, please try again..');
            $this->session->set_flashdata('modelError',
                    'Some problems occurred, please try again..');
            $this->form_validation->set_error_delimiters('<div style="color:red" class="error">',
                    '</div>');
            $this->load->model('Main_Model');
            $data['result'] = $this->Main_Model->getAllEmployees();

            $this->load->view('header');
            $this->load->view('home', $data);
        } else {
            //insert post data
            $this->load->model('Main_Model');
            $edit = $this->Main_Model->editEmployeeData($postData, $employeeId);

            if ($edit) {
                $this->session->set_flashdata('modelError', '');
                $this->session->set_flashdata('success_msg',
                        'Employee Details has been added successfully.');
                $this->load->model('Main_Model');
                $data['result'] = $this->Main_Model->getAllEmployees();
                $this->output->set_header('refresh:0; url=' . base_url());
            } else {
                $this->session->set_flashdata('modelError',
                        'Some problems occurred, please try again..');
                $this->session->set_flashdata('error_msg',
                        'Some problems occurred, please try again..');
                $this->load->model('Main_Model');
                $data['result'] = $this->Main_Model->getAllEmployees();
                $this->output->set_header('refresh:0; url=' . base_url());
            }
        }
    }

}
