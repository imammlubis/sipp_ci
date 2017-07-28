<?php
require APPPATH . '/libraries/REST_Controller.php';
//defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 3:26 AM
 */

class Pnbp extends CI_Controller{
    public function __construct()
    {
        parent::__construct($config='rest');
//        $this->load->helper(array('form', 'url'));
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->model('auth/user_model');
        $this->load->helper('auth/user_helper');
        $this->load->model('BillCreditModel');
        $this->load->model('BillCreditAdminModel');
        $this->load->model('BillCreditModelAdmin');
        $this->load->model('CompanyModel');
        $this->load->model('LaporanCicilanPembayaranModel');
        $this->load->model('LaporanPiutangModel');
        $this->load->model('LaporanTagihanAwalModel');
        $this->load->model('TagihanAwalModel');
        $this->load->model('UserModel');
    }
    function TotalSaldo(){
        try{
            $data = $this->LaporanTagihanAwalModel->totalSaldoRupiah();
            $dataDollar = $this->LaporanTagihanAwalModel->totalSaldoDollar();
            $arr = array('data'=>number_format($data), 'dataDollar'=>number_format($dataDollar));
            header('Content-Type: application/json');
            echo json_encode( $arr );
        }catch (Exception $ex){
            echo json_encode(0);
        }
    }
    function DataProvinsi(){
        $data = $this->LaporanTagihanAwalModel->get_by_prov();
        echo json_encode($data);

    }
    function DataPkp2b(){
        try{
            $itidr = $this->LaporanTagihanAwalModel->ITPkp2b();
            $itusd = $this->LaporanTagihanAwalModel->ITPkp2bUsd();
            $royalti_idr = $this->LaporanTagihanAwalModel->RoyaltiPkp2b();
            $royalti_usd = $this->LaporanTagihanAwalModel->RoyaltiPkp2bUsd();
            $pht_idr = $this->LaporanTagihanAwalModel->PHTPkp2b();
            $pht_usd = $this->LaporanTagihanAwalModel->PHTPkp2bUsd();

            $arr = array('it_idr'=>number_format($itidr), 'it_usd' =>number_format($itusd),
                'royalti_idr' =>number_format($royalti_idr),
                'royalti_usd' =>number_format($royalti_usd),
                'pht_idr' =>number_format($pht_idr),
                'pht_usd' =>number_format($pht_usd));
            echo json_encode($arr);

        }catch (Exception $ex){
            echo json_encode(0);
        }
    }

    function DataKK(){
        try{
            $it_idr = $this->LaporanTagihanAwalModel->IuranTetapKKIdr();
            $it_usd = $this->LaporanTagihanAwalModel->IuranTetapKKUsd();
            $royalti_idr = $this->LaporanTagihanAwalModel->RoyaltiKKIdr();
            $royalti_usd = $this->LaporanTagihanAwalModel->RoyaltiKKUsd();

            $arr = array('it_idr'=>number_format($it_idr),
                'it_usd'=>number_format($it_usd),
                'royalti_idr'=>number_format($royalti_idr),
                'royalti_usd'=>number_format($royalti_usd)
            );
            echo json_encode($arr);

        }catch (Exception $ex){
            echo json_encode(0);
        }
    }

    function DataIup(){
        try{
            $it_idr = $this->LaporanTagihanAwalModel->IuranTetapIupIdr();
            $it_usd = $this->LaporanTagihanAwalModel->IuranTetapIupUsd();
            $royalti_idr = $this->LaporanTagihanAwalModel->RoyaltiIupIdr();
            $royalti_usd = $this->LaporanTagihanAwalModel->RoyaltiIupUsd();

            $arr = array('it_idr'=>number_format($it_idr),
                'it_usd'=>number_format($it_usd),
                'royalti_idr'=>number_format($royalti_idr),
                'royalti_usd'=>number_format($royalti_usd)
            );
            echo json_encode($arr);

        }catch (Exception $ex){
            echo json_encode(0);
        }
    }

}