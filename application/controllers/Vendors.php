<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Vendors Management class created by CodexWorld
 */
class Vendors extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Vendor');
    }

    /*
     * Vendors account information
     */

    public function index() {
        if ($this->session->userdata('isUserLoggedIn')) {
            redirect('Vendors/account');
        } else {
            $this->login();
        }

//        $data = array();
//        if ($this->session->userdata('isUserLoggedIn')) {
//            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
//
////load the view
//            $this->load->view('users/account', $data);
//        } else {
//            redirect('users/login');
//        }
    }

    public function account() {
        $this->load->model('vendor');
        $data = array();
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['vendor'] = $this->vendor->getRows(array('id' => $this->session->userdata('userId')));

//load the view
            $this->load->view('vendors/account', $data);
        } else {
            redirect('vendors/login');
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


                $this->load->model('vendor');
                $checkLogin = $this->vendor->getRows($con);
                if ($checkLogin) {
                    $this->session->set_userdata('isUserLoggedIn', TRUE);
                    $this->session->set_userdata('userId', $checkLogin['id']);
                    redirect('vendors/account/');
                } else {
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
//load the view
        $this->load->view('vendors/login', $data);
    }

    /*
     * Vendors logout
     */

    public function logout() {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('vendors/login');
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

    public function test() {
        print_r('test controller');
    }

}
