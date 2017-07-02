<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->model('login_model', '', TRUE);
        //$this->load->library('session');
        $this->load->library(array('form_validation','session','encrypt'));
    }

    function index()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules("username", "username", "trim|required|min_length[1]|max_length[15]|xss_clean");
        $this->form_validation->set_rules("password", "password", "trim|required|min_length[1]|max_length[15]|xss_clean");

//        if($this->form_validation->run()==false)
//        {
//            //Field validation failed.  User redirected to login page
//            $this->load->view('Account/Login');
//        }
//        else{
        //print_r('true');
        $result_login = $this->check_database($password, $username);
        if($result_login == null)
        {
            //$data['check_database']= 'Maaf, username atau password yang anda masukkan salah, silakan coba lagi.';
            //Field validation failed.  User redirected to login page
            //redirect(base_url().'Account/Login');
            $this->load->view('Account/Login');
        }
        else
        {
//                redirect(base_url().'DirektoratPKK/PencariKerjaTerdaftar');
            redirect(base_url().'Welcome');
        }
        //}
        //$data ['main_content'] = 'Account/Login';

    }

    // Check for user login process
    private function check_database($password, $username)
    {
        //Field validation succeeded.  Validate against database
        //query the database
        $result=$this->login_model->get_user($username, $password);
        if($result)
        {
            $sess_array=array();
            foreach($result as $row)
            {
                $sess_array=array(
                    'status_user' => 1,
                    'id' => $row->id,
                    'user_name' => $row->user_name,
                    'user_email' => $row->user_email,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($sess_array);
            }
            //print_r($sess_array);
            return $sess_array;
        }
        else
        {
            return false;
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('log_in');
        $this->session->sess_destroy();
        //session_destroy();
        redirect("account/login");
    }

}

