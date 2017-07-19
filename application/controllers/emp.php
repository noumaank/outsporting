<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Vendors Management class created by CodexWorld
 */
class Emp extends CI_Controller {

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
            redirect('emp/employeeAccount');
        } else {
            $this->login();
        }
    }

    public function employeeAccount() {
        $this->load->model('employee');
        $data = array();

        if ($this->session->userdata('isUserLoggedIn')) {
            $data['createProcessForm'] = base_url() . 'emp/createProcessForm';
            $data['emp'] = $this->employee->getRows(array('id' => $this->session->userdata('userId'), 'status' => 1));

            $emp_type = $data['emp']['emp_type'];
            switch ($emp_type):
                case 1: {
                        $this->load->view('emp/employeeAccount', $data);
                        break;
                    }
                case 2: {
                        $this->load->view('emp/posAccount', $data);
                        break;
                    }
                case 3: {
                        $this->load->view('emp/associateAccount', $data);
                        break;
                    }
                default: {
                        echo "You are not an authorised employee";
                        break;
                    }
            endswitch;

//load the view
        } else {
            redirect('emp/login');
        }
    }

    /*
     * Vendors login
     */

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
                    redirect('emp/employeeAccount');
                } else {
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
//load the view
        $this->load->view('emp/login', $data);
    }

    public function logout() {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('emp/login');
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
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['createProcess'] = base_url() . 'emp/createProcess';
            $this->load->view('emp/createProcessForm', $data);
        } else {
            redirect('emp/login');
        }
    }

    public function createProcess() {
//        print_r($this->input->post('CustomerContactNumber'));
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
        $data['customerName'][] = $this->input->post('customerName');
        $data['CustomerContactNumber'][] = $this->input->post('CustomerContactNumber');

        $this->employee->insert(array('id' => $this->session->userdata('userId'), 'data' => $data));

//        print_r($this->input->post());
//        die;
        $customername[] = $this->input->post('customerName');
        $CustomerContactNumber[] = $this->input->post('CustomerContactNumber');
//        print_r($CustomerContactNumber);
//        echo"---------------------------------------";
//        print_r($this->input->post('CustomerContactNumber'));
//        //  foreach ())
//        die;
        $data = array();
        $userData = array();
        if ($this->input->post()) {
//            $this->form_validation->set_rules('name', 'Name', 'required');
//            $this->form_validation->set_rules('password', 'password', 'required');
//            $customerInfo = array('customerName'=>,'CustomerContactNumber'=>,'gender'=>)

            $userData = array(
                'date' => strip_tags($this->input->post('date')),
                'activity' => strip_tags($this->input->post('activity')),
                'vendor' => md5($this->input->post('vendor')),
                'customerCount' => strip_tags($this->input->post('customerCount')),
                'gender' => $this->input->post('gender'),
            );

            if ($this->form_validation->run() == true) {
                $this->load->model('employee');
                $insert = $this->employee->createProcess($userData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                    redirect('emp/account');
                } else {
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
//        $data['user'] = $userData;
////load the view
//        $this->load->view('inv/createProcess', $data);
    }

    public function test() {
        print_r('test controller');
    }

}
