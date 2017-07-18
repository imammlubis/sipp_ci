<?php
/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 1:39 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class LaporanCicilanPembayaran extends CI_Controller{
    public function __construct()
    {
//        ini_set('max_execution_time', 0);
//        ini_set('memory_limit','2048M');

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        //$this->load->library('session');
        $this->load->model('auth/user_model');
        $this->load->helper('auth/user_helper');
        $this->load->model('LaporanCicilanPembayaranModel');
    }
    function index(){
        check_user_sess();
        if($this->session->userdata('logged_in'))
        {
            $data ['main_content'] = 'laporan/laporancicilanpembayaran';
            $this->load->view('layout/MainLayout', $data);
        }
        else{
            redirect('account/user');
        }
    }

    public function ajax_list()
    {
        $list = $this->LaporanCicilanPembayaranModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $tagihan) {
            $no++;
            $row = array();
            $row[] = $tagihan->company_name;
            $row[] = $tagihan->legal_type;
            $row[] = $tagihan->province;
            $row[] = $tagihan->created_date;
            $row[] = number_format($tagihan->amount);
            $row[] = number_format($tagihan->nominaldollar);
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->LaporanCicilanPembayaranModel->count_all(),
            "recordsFiltered" => $this->LaporanCicilanPembayaranModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


}