<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Login');
    }
    public function login() {
        if ($this->Login->admin_logged_in()) {
            redirect('user/login', 'refresh');
        }
        if($this->input->post()) {
            if ($this->Login->admin_login($this->input->post('txtUsername'), $this->input->post('txtPassword'))) {
                redirect('user/login', 'refresh');
            }
            else {
                $this->session->set_flashdata('message','Sai tài khoản hoặc mật khẩu');
                redirect('user/login', 'refresh');
            }
        }
        $this->load->helper('form');
        $this->render('user/login');
    }
    public function logout() {
        $this->Login->admin_logout();
        redirect('user/login', 'refresh');
    }
}