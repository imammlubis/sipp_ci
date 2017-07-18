<?php
/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 1:39 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class LaporanTagihanAwal extends CI_Controller{
    public function __construct()
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        //$this->load->library('session');
        $this->load->model('auth/user_model');
        $this->load->helper('auth/user_helper');
        $this->load->model('LaporanTagihanAwalModel');
    }
    function index(){
        check_user_sess();
//        $this->load->view('account/home');
        if($this->session->userdata('logged_in'))
        {
            $data ['main_content'] = 'laporan/laporantagihanawal';
            $this->load->view('layout/MainLayout', $data);
        }
        else{
            redirect('account/user');
        }
    }


    public function ajax_list()
    {
        $list = $this->LaporanTagihanAwalModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $tagihan) {
            $no++;
            $row = array();
            $row[] = $tagihan->company_name;
            $row[] = $tagihan->legal_type;
            $row[] = $tagihan->province;

            $row[] = number_format($tagihan->iuran_tetap_idr);
            $row[] = number_format($tagihan->iuran_tetap_usd);

            $row[] = number_format($tagihan->royalti_idr);
            $row[] = number_format($tagihan->royalti_usd);

            $row[] = number_format($tagihan->pht_idr);
            $row[] = number_format($tagihan->pht_usd);
//
//            $row[] = number_format($tagihan->credidr);
//            $row[] = number_format($tagihan->credusd);
//
//            //saldo akhir
//            $row[] = number_format(($tagihan->iuran_tetap_idr + $tagihan->royalti_idr + $tagihan->pht_idr) - $tagihan->credidr);
//            $row[] = number_format(($tagihan->iuran_tetap_usd + $tagihan->royalti_usd + $tagihan->pht_usd) - $tagihan->credusd);

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->LaporanTagihanAwalModel->count_all(),
            "recordsFiltered" => $this->LaporanTagihanAwalModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->LaporanTagihanAwalModel->get_by_id($id);
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
            'amount' => $this->input->post('nominaltagihan'),
            'nominaltagihandollar' => $this->input->post('nominaltagihandollar'),
            'billing_type' => $this->input->post('tipetagihan'),
            'company_id' => $this->input->post('itemName')
        );
        $insert = $this->LaporanTagihanAwalModel->save($data);
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
            'amount' => $this->input->post('nominaltagihan'),
            'nominaltagihandollar' => $this->input->post('nominaltagihandollar'),
            'billing_type' => $this->input->post('tipetagihan')
        );
        $this->LaporanTagihanAwalModel->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
        //echo json_encode($data);
    }

    public function ajax_delete($id)
    {
        $this->LaporanTagihanAwalModel->delete_by_id($id);
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

        if($this->input->post('tipetagihan') == '')
        {
            $data['inputerror'][] = 'tipetagihan';
            $data['error_string'][] = 'Tipe tagihan is required';
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