<?php
/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 1:39 AM
 */
    defined('BASEPATH') OR exit('No direct script access allowed');
class TagihanAwal extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        //$this->load->library('session');
        $this->load->model('auth/user_model');
        $this->load->helper('auth/user_helper');
        $this->load->model('TagihanAwalModel');
    }
    function index(){
        check_user_sess();
//        $this->load->view('account/home');
        if($this->session->userdata('logged_in'))
        {
            $data ['main_content'] = 'tagihan/inputtagihanawal';
            $this->load->view('layout/MainLayout', $data);
        }
        else{
            redirect('account/user');
        }
    }
    public function ajax_list()
    {
        $list = $this->TagihanAwalModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $tagihan) {
            $no++;
            $row = array();
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_tagihan('."'".$tagihan->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $row[] = $tagihan->company_name;
            $row[] = $tagihan->province;
            $row[] = $tagihan->evaluator;
            $row[] = $tagihan->checking_period1 . ' s/d ' . $tagihan->checking_period2;
            $row[] = $tagihan->billing_period;
            $row[] = $tagihan->billing_no;
            $row[] = $tagihan->billing_date;
            $row[] = number_format($tagihan->iuran_tetap_idr);
            $row[] = number_format($tagihan->iuran_tetap_usd);
            $row[] = number_format($tagihan->royalti_idr);
            $row[] = number_format($tagihan->royalti_usd);
            $row[] = number_format($tagihan->pht_idr);
            $row[] = number_format($tagihan->pht_usd);
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->TagihanAwalModel->count_all(),
            "recordsFiltered" => $this->TagihanAwalModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->TagihanAwalModel->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }


    public function ajax_add()
    {
        $this->_validate();

        $periodtime = $this->input->post('periodtime');
        $keywords = explode(' - ', $periodtime);
        $from = $keywords[0];
        $to = $keywords[1];

        $data = array(
            'evaluator' => $this->input->post('pemeriksa'),
            'checking_period1' => date('Y-m-d', strtotime($from)),
            'checking_period2' => date('Y-m-d', strtotime($to)),
            'billing_period' => $this->input->post('tahunpenagihan'),
            'billing_no' => $this->input->post('nosurat'),
            'billing_date' => $this->input->post('tanggaltagihan'),

            'iuran_tetap_idr' => $this->input->post('iuran_tetap_idr'),
            'iuran_tetap_usd' => $this->input->post('iuran_tetap_usd'),

            'royalti_idr' => $this->input->post('royalti_idr'),
            'royalti_usd' => $this->input->post('royalti_usd'),

            'pht_idr' => $this->input->post('pht_idr'),
            'pht_usd' => $this->input->post('pht_usd'),

            'company_id' => $this->input->post('itemName')
        );
        $insert = $this->TagihanAwalModel->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $periodtime = $this->input->post('periodtime');
        $keywords = explode(' - ', $periodtime);
        $from = $keywords[0];
        $to = $keywords[1];

        $data = array(
            'evaluator' => $this->input->post('pemeriksa'),
            'checking_period1' => date('Y-m-d', strtotime($from)),
            'checking_period2' => date('Y-m-d', strtotime($to)),
            'billing_period' => $this->input->post('tahunpenagihan'),
            'billing_no' => $this->input->post('nosurat'),
            'billing_date' => $this->input->post('tanggaltagihan'),

            'iuran_tetap_idr' => $this->input->post('iuran_tetap_idr'),
            'iuran_tetap_usd' => $this->input->post('iuran_tetap_usd'),

            'royalti_idr' => $this->input->post('royalti_idr'),
            'royalti_usd' => $this->input->post('royalti_usd'),

            'pht_idr' => $this->input->post('pht_idr'),
            'pht_usd' => $this->input->post('pht_usd'),
        );
        $this->TagihanAwalModel->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->TagihanAwalModel->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('pemeriksa') == '')
        {
            $data['inputerror'][] = 'pemeriksa';
            $data['error_string'][] = 'pemeriksa is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('iuran_tetap_idr') == '')
        {
            $data['inputerror'][] = 'iuran_tetap_idr';
            $data['error_string'][] = 'iuran_tetap_idr is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('iuran_tetap_usd') == '')
        {
            $data['inputerror'][] = 'iuran_tetap_usd';
            $data['error_string'][] = 'iuran_tetap_usd is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('royalti_idr') == '')
        {
            $data['inputerror'][] = 'royalti_idr';
            $data['error_string'][] = 'royalti_idr is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('royalti_usd') == '')
        {
            $data['inputerror'][] = 'royalti_usd';
            $data['error_string'][] = 'royalti_usd is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('pht_idr') == '')
        {
            $data['inputerror'][] = 'pht_idr';
            $data['error_string'][] = 'pht_idr is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('pht_usd') == '')
        {
            $data['inputerror'][] = 'pht_usd';
            $data['error_string'][] = 'pht_usd is required';
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
//    function InsertData(){
//        $data = array(
//            'evaluator' => $this->input->post('pemeriksa'),
//            'checking_period1' => $this->input->post('from'),
//            'checking_period2' => $this->input->post('to'),
//            'billing_period' => $this->input->post('tahunpenagihan'),
//            'billing_no' => $this->input->post('nosurat'),
//            'billing_date' => $this->input->post('tanggaltagihan'),
//            'amount' => $this->input->post('nominaltagihan'),
//            'billing_type' => $this->input->post('tipetagihan'),
//            'company_id' => $this->input->post('itemName')
//        );
//        $this->TagihanAwalModel->add($data);
//    }
}