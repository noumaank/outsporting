<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Vendors Management class created by CodexWorld
 */
class Inv extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('inventory');
    }

    /*
     * Vendors account information
     */

    public function index() {
        if ($this->session->userdata('isUserLoggedIn')) {
            redirect('Inv/account');
        } else {
            $this->login();
        }
    }

    public function account() {
        $this->load->model('inventory');
        $data = array();

        if ($this->session->userdata('isUserLoggedIn')) {
            $data['createProcessForm'] = base_url() . '/inv/createProcessForm';
            $data['inv'] = $this->inventory->getRows(array('id' => $this->session->userdata('userId')));

//load the view
            $this->load->view('inv/account', $data);
        } else {
            redirect('inv/login');
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
                $this->load->model('inventory');
                $checkLogin = $this->inventory->getRows($con);
                if ($checkLogin) {
                    $this->session->set_userdata('isUserLoggedIn', TRUE);
                    $this->session->set_userdata('userId', $checkLogin['id']);
                    redirect('inv/account/');
                } else {
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
//load the view
        $this->load->view('inv/login', $data);
    }

    public function logout() {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('inv/login');
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
            $data['createProcess'] = base_url() . 'inv/createProcess';
            $this->load->view('inv/createProcessForm', $data);
        } else {
            redirect('inv/login');
        }
    }

    public function createProcess() {
        // print_r($this->input->post('customerName'));
        $customername[] = $this->input->post('customerName');
        $CustomerContactNumber[] = $this->input->post('CustomerContactNumber');
        print_r($CustomerContactNumber);
        echo"---------------------------------------";
        print_r($this->input->post('CustomerContactNumber'));
        //  foreach ())
        die;
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
                $this->load->model('inventory');
                $insert = $this->inventory->createProcess($userData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                    redirect('inv/account');
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
