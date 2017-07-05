<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
    {
        if(!empty($this->session->userdata('logged_in')))
            redirect('account/user/home');
        if(!empty($this->input->post()))
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('account/login');
            }
            else
            {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $check_auth = $this->user_model->authenticate($email,$password);
                if($check_auth == 'admin')
                {
                    redirect('account/user/home');
                }
                else if($check_auth == 'company')
                {
                    redirect('account/user/company');
                }
                else
                {
                    redirect('account/user');
                }
            }
        }
        else
        {
            $this->load->view('account/login');
        }
    }
}
