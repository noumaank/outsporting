<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User Management class created by CodexWorld
 */
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->load->library('form_validation');
        $this->load->model('user');
    }

    /*
     * User login
     */

    public function index() {
//        $this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
//        $this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
//        $this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');
        $data = array();
        //$data['loginUrl'] = $this->user();
//        $data['signupUrl'] = $this->load->controller('user');
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
//load the view
            $this->load->view('home', $data);
        } else {
            $this->load->view('home', $data);
        }
    }

    /*
     * User account information
     */

    public function user() {
        $data = array();
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));

//load the view
            $this->load->view('users/account', $data);
        } else {
            redirect('users/login');
        }
    }

    /*
     * User login
     */

    public function admin() {
        if ($this->session->userdata('isUserLoggedIn')) {
            redirect('users/account');
        }
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
                $checkLogin = $this->user->getRows($con);
                if ($checkLogin) {
                    $this->session->set_userdata('isUserLoggedIn', TRUE);
                    $this->session->set_userdata('userId', $checkLogin['id']);
                    redirect('users/account/');
                } else {
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
//load the view
        $this->load->view('users/login', $data);
    }

}
