<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Vendors Management class created by CodexWorld
 */
class emp extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('employee');
    }

    /*
     * Vendors account information
     */

    public function index() {
        if ($this->session->userdata('isUserLoggedIn')) {
            redirect('Emp/employeeAccount');
        } else {
            $this->login();
        }
    }

    public function employeeAccount() {
        $this->load->model('employee');
        $data = array();

        if ($this->session->userdata('isUserLoggedIn')) {
            if ($this->session->userdata('success_msg')) {
                $data['msg'] = $this->session->userdata('success_msg');
            } else {
                $data['msg'] = '';
            }
            $data['tripRecord'] = $this->employee->getTripRecords(array('emp_id' => $this->session->userdata('userId')));
            $data['createProcessForm'] = base_url() . 'Emp/createProcessForm';
            $data['emp'] = $this->employee->getRows(array('id' => $this->session->userdata('userId'), 'status' => 1));

            $emp_type = $data['emp']['emp_type'];
            switch ($emp_type):
                case 1: {
                        $this->load->view('Emp/employeeAccount', $data);
                        break;
                    }
                case 2: {
                        $this->load->view('Emp/posAccount', $data);
                        break;
                    }
                case 3: {
                        $this->load->view('Emp/associateAccount', $data);
                        break;
                    }
                default: {
                        echo "You are not an authorised employee";
                        break;
                    }
            endswitch;
        } else {
            redirect('Emp/login');
        }
    }

    public function login() {
        $data = array();
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if ($this->input->post('loginSubmit')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $this->load->model('employee');
                $data['emp'] = $this->employee->getRows(array('id' => $this->session->userdata('userId'), 'status' => 1));
                $checkLogin = $this->employee->getRows($con);
                if ($checkLogin) {
                    $this->session->set_userdata('isUserLoggedIn', TRUE);
                    $this->session->set_userdata('userId', $checkLogin['id']);
                    redirect('Emp/employeeAccount');
                } else {
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
//load the view
        $this->load->view('Emp/login', $data);
    }

    public function logout() {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('Emp/login');
    }

    /*
     * Existing email check during validation
     */

    public function email_check($str) {
        $con['returnType'] = 'count';
        $con['conditions'] = array('email' => $str);
        $checkEmail = $this->user->getRows($con);
        if ($checkEmail > 0) {
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function createProcessForm() {
        $this->session->set_userdata('success_msg', '');
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['createProcess'] = base_url() . 'Emp/createProcess';
            $this->load->view('Emp/createProcessForm', $data);
        } else {
            redirect('Emp/login');
        }
    }

    public function createProcess() {
//        echo "<pre>";
//        print_r($this->input->post());
//        die;
        $this->load->model('employee');
        $data['empId'] = $this->input->post('empId');
        $data['activity'] = $this->input->post('activity');
        $data['vendor'] = $this->input->post('vendor');
        $data['pilot'] = $this->input->post('pilot');
        $data['boat'] = $this->input->post('boat');
        $data['customerCount'] = $this->input->post('customerCount');
        $data['Tripdate'] = $this->input->post('Tripdate');
        $data['startTime'] = $this->input->post('startTime'); //am pm to be added or time to be converted in hours
        $data['endTime'] = $this->input->post('endTime');
        $data['status'] = $this->input->post('status');
        $data['bookingComments'] = $this->input->post('bookingComments');
        $custInfo['customerName'] = $this->input->post('customerName');
        $custInfo['CustomerContactNumber'] = $this->input->post('CustomerContactNumber');
        $custInfo['CustomerAge'] = $this->input->post('CustomerAge');
        $custInfo['CustomerSex'] = $this->input->post('gender');
        if ($this->input->post()) {
            $insert = $this->employee->createProcess(array('data' => $data, 'custInfo' => $custInfo));
            if (isset($insert) && $insert != '') {
                $this->session->set_userdata('success_msg', 'Trip was created successfully!');
                redirect('Emp/employeeAccount');
            } else {
                $data['error_msg'] = 'Some problems occured, please try again.';
                redirect('Emp/createProcessForm');
            }
        }
    }

    public function test() {
        print_r('test controller');
    }

}
