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
    function InsertData(){
        $data = array(
            'evaluator' => $this->input->post('pemeriksa'),
            'checking_period1' => $this->input->post('from'),
            'checking_period2' => $this->input->post('to'),
            'billing_period' => $this->input->post('tahunpenagihan'),
            'billing_no' => $this->input->post('nosurat'),
            'billing_date' => $this->input->post('tanggaltagihan'),
            'amount' => $this->input->post('nominaltagihan'),
            'billing_type' => $this->input->post('tipetagihan'),
            'company_id' => $this->input->post('itemName')
        );
        $this->TagihanAwalModel->add($data);
    }
}