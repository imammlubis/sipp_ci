<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 3:26 AM
 */

class BayarTagihan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        //$this->load->library('session');
        $this->load->model('auth/user_model');
        $this->load->helper('auth/user_helper');
        $this->load->model('BillCreditModel');
    }
    function index(){
        error_reporting(0);
        ini_set('display_errors', 0);
        check_user_sess();
//        $this->load->view('account/home');
        if($this->session->userdata('logged_in'))
        {
            //$this->load->view('upload_form', array('error' => ' ' ));
            $this->load->helper('url');

            $data['piutangidr'] = $this->get_piutang();
            $data['piutangusd'] = $this->get_piutang_dollar();
            //print_r($this->get_piutang());

            $data ['main_content'] = 'perusahaan/bayartagihan';
            $this->load->view('layout_company/MainLayout', $data);
        }
        else{
            redirect('account/user');
        }
    }
    function do_upload()
    {
        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['max_size']	= 'MAX_FILE_SIZE';
        $config['max_width']  = 'MAX_FILE_SIZE';
        $config['max_height']  = 'MAX_FILE_SIZE';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            //$error = array('error' => $this->upload->display_errors());
         //print_r($error);
//            $this->load->view('perusahaan/bayartagihan', $error);
            redirect('/perusahaan/bayartagihan/errorupload', 'refresh');
        }
        else
        {
            $upload_data = $this->upload->data();
            $data = array(
                'amount' => $this->input->post('nominal'),
                'file_validation' => $this->input->post('nominal'),
                'objection_information' => $this->input->post('keterangan'),
                'is_approved' => 0,
                'company_id' => $comp_id,
                'nominaldollar' => $this->input->post('nominaldollar')
            );
            $insert = $this->BillCreditModel->save($data);

            $dataUpdate = array(
                'file_validation' => $upload_data['file_name']
            );
            $this->BillCreditModel->update(array('id' => $insert), $dataUpdate);
//print_r($upload_data);
            redirect('/perusahaan/BayarTagihan', 'refresh');
        }
    }
    function errorupload(){
        check_user_sess();
        if($this->session->userdata('logged_in'))
        {
            $data ['main_content'] = 'perusahaan/errorupload';
            $this->load->view('layout_company/MainLayout', $data);
        }
        else{
            redirect('account/user');
        }
    }
    public function ajax_list()
    {
        $list = $this->BillCreditModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $billcredit) {
            $no++;
            $row = array();
            //$row[] = $no;
            $row[] = number_format($billcredit->amount);
            $row[] = number_format($billcredit->nominaldollar);
            $row[] = $billcredit->file_validation;
            $row[] = $billcredit->objection_information;
            $row[] = $billcredit->created_date;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->BillCreditModel->count_all(),
            "recordsFiltered" => $this->BillCreditModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->BillCreditModel->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
    public function get_piutang()
    {
        try{
        $data = $this->BillCreditModel->get_piutang_by_company_id();
        return number_format($data);
        }catch (Exception $ex){
            0;
        }
        //echo json_encode(number_format($data));
    }
    public function get_piutang_dollar()
    {
        $data = $this->BillCreditModel->get_piutang_dollar_by_company_id();
        return number_format($data);
        //echo json_encode(number_format($data));
    }

    public function ajax_add()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png|pdf';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);

        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        //$this->_validate();

        //$file = $_FILES['image'];
//        $target_dir = 'uploads/';
//        $target_file = $target_dir.basename($_FILES['image']['name']);
//        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
//            echo 'oke';
//        }else{
//            'fail';
//        }
        $dataUpload = array('upload_data' => $this->upload->data());
        $data = array(
            'amount' => $this->input->post('nominal'),
            'file_validation' => $this->input->post('nominal'),
            'objection_information' => $this->input->post('keterangan'),
            'is_approved' => 0,
            'company_id' => $comp_id,
            'nominaldollar' => $this->input->post('nominaldollar')
        );
        $insert = $this->BillCreditModel->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'company_name' => $this->input->post('nama'),
            'legal_type' => $this->input->post('tipetagihan'),
            'province' => $this->input->post('provinsi'),
            'is_visible' => true
        );
        $this->BillCreditModel->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->BillCreditModel->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('nominal') == '')
        {
            $data['inputerror'][] = 'nominal';
            $data['error_string'][] = 'Nominal is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('nominaldollar') == '')
        {
            $data['inputerror'][] = 'nominaldollar';
            $data['error_string'][] = 'Nominal Dollar is required';
            $data['status'] = FALSE;
        }

//
//        if($this->input->post('image') == '')
//        {
//            $data['inputerror'][] = 'image';
//            $data['error_string'][] = 'File is required';
//            $data['status'] = FALSE;
//        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}