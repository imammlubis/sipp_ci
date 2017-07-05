<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 3:26 AM
 */

class RiwayatTransaksi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        //$this->load->library('session');
        $this->load->model('auth/user_model');
        $this->load->helper('auth/user_helper');
        $this->load->model('BillCreditModel');
    }
    function index(){
        check_user_sess();
//        $this->load->view('account/home');
        if($this->session->userdata('logged_in'))
        {
            $this->load->helper('url');
            $data ['main_content'] = 'perusahaan/riwayattransaksi';
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
        $data = $this->BillCreditModel->get_piutang_by_company_id();

        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode(number_format($data));
    }

    public function ajax_add()
    {
        $this->_validate();
        $data = array(
            'company_name' => $this->input->post('nama'),
            'legal_type' => $this->input->post('tipetagihan'),
            'province' => $this->input->post('provinsi'),
            'is_visible' => true
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

        if($this->input->post('nama') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('tipetagihan') == '')
        {
            $data['inputerror'][] = 'tipetagihan';
            $data['error_string'][] = 'Tipe tagihan is required';
            $data['status'] = FALSE;
        }


        if($this->input->post('provinsi') == '')
        {
            $data['inputerror'][] = 'provinsi';
            $data['error_string'][] = 'Provinsi is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}