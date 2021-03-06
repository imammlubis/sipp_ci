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
        check_user_sess();
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
            if($billcredit->is_approved == 1)
                $billcredit->is_approved = 'Approved';
            else if($billcredit->is_approved == 2)
                $billcredit->is_approved = 'Rejected';
            else
                $billcredit->is_approved = 'Not Respond';

            $no++;
            $row = array();
            //$row[] = $no;
            $row[] = number_format($billcredit->amount);
            $row[] = number_format($billcredit->nominaldollar);
            $row[] = '<a href='.base_url('uploads/'.$billcredit->file_validation).' target='.'_blank'.'>Link</a>';
            $row[] = $billcredit->objection_information;
            $row[] = $billcredit->is_approved;
            //$row[] = $billcredit->is_approved == 1 ? 'Approved' : $billcredit->is_approved == 2 ? 'Rejected' : 'Belum diverifikasi';
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
        echo json_encode(number_format($data));
    }
    public function get_piutang_dollar()
    {
        $data = $this->BillCreditModel->get_piutang_dollar_by_company_id();

        echo json_encode(number_format($data));
    }

    public function ajax_add()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png|pdf';
        $this->load->library('upload', $config);

        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $this->_validate();

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
//        echo json_encode(array("status" => TRUE));
        echo json_encode(array("status" => $dataUpload));
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