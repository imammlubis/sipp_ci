<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 3:26 AM
 */

class DataPengguna extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        //$this->load->library('session');
        $this->load->model('auth/user_model');
        $this->load->helper('auth/user_helper');

        $this->load->model('UserModel');
        $this->load->model('CompanyModel');
    }
    function index(){
        check_user_sess();
//        $this->load->view('account/home');
        if($this->session->userdata('logged_in'))
        {
            $this->load->helper('url');

            $data ['main_content'] = 'perusahaan/datapengguna';
            $this->load->view('layout/MainLayout', $data);
        }
        else{
            redirect('account/user');
        }
    }

    public function ajax_list()
    {
        $list = $this->UserModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            //$row[] = $no;
            //$row[] = $company->id;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $row[] = $user->first_name;
            $row[] = $user->last_name;
            $row[] = $user->email;
            $row[] = $user->status;
            $row[] = $user->company_name;
            $row[] = $user->province;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->UserModel->count_all(),
            "recordsFiltered" => $this->UserModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->UserModel->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }


    public function ajax_add()
    {
        $this->_validate();
//        $data = array(
//            'company_name' => $this->input->post('nama'),
//            'legal_type' => $this->input->post('tipetagihan'),
//            'province' => $this->input->post('provinsi'),
//            'is_visible' => true
//        );
//        $insert = $this->UserModel->save($data);
        $input_data['first_name'] = $this->input->post('email');
        $input_data['last_name'] = '';
        $input_data['email'] = $this->input->post('email');
        $input_data['password'] = 'password123';
        $input_data['role'] = 'company';

        $input_data['password'] = $this->encrypt->encode('password123');

        $input_data['user_activation_link'] = generate_random().time();
        $user_id = 0;
        $user_id = $this->user_model->update_user($input_data);

        if(!empty($user_id))
        {
            $this->user_create_activation_sendmail($input_data);
            $this->session->set_flashdata('success','Activation link sent to your email. Please active.');
            //redirect('account/user/signup');
            $data = array(
                'user_id' => $user_id
            );
            $this->CompanyModel->update(array('id' => $this->input->post('itemName')), $data);
        }
        echo json_encode(array("status" => TRUE));
    }
    public function user_create_activation_sendmail($input_data)
    {
        $this->load->helper('auth/email_helper');
        $template_config = array(
            'type' => 'send_activation_link',
            'name' => ucwords($input_data['first_name']),
            'email' => $input_data['email'],
            'user_activation_link' => $input_data['user_activation_link']
        );
        $message_details = message_template($template_config);
        $headers = "From: imam.lubis@eduspot.co.id";
        $mail_config = array('to' => $input_data['email'],
            'subject' => 'User Activation Link',
            'message' => $message_details,
            'headers'=>$headers
        );
        send_email($mail_config);
    }
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'email' => $this->input->post('email')
        );
        $this->UserModel->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->UserModel->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

//        if($this->input->post('company_name') == '')
//        {
//            $data['inputerror'][] = 'company_name';
//            $data['error_string'][] = 'Company Name is required';
//            $data['status'] = FALSE;
//        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    function search(){
        $json = [];
        $this->load->database();
        if(!empty($this->input->get("q"))){
            $this->db->like('company_name', $this->input->get("q"));
            $query = $this->db->select('id,company_name as text')
                ->limit(10)
                ->get("company");
            $json = $query->result();
        }
        echo json_encode($json);
    }

}