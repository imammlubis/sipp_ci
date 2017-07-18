<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BillCreditModel extends CI_Model {

    var $table = 'billcredit';
    var $column_order = array(null,'amount', 'objection_information'); //set column field database for datatable orderable
    var $column_search = array('amount'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $this->db->from($this->table);
        $this->db->where('company_id', $comp_id);
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $this->db->from($this->table);
        $this->db->where('company_id', $comp_id);
        return $this->db->count_all_results();
    }
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_piutang_by_company_id()
    {
        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $this->db->select('sum(iuran_tetap_idr) + sum(royalti_idr) as total', false);
       // $this->db->select_sum('(iuran_tetap_idr+royalti_idr+pht_idr)', 'total');
        $this->db->from('tagihanawal');
        $this->db->where('company_id', $comp_id);
        $amountawal = $this->db->get()->row()->total;

        $this->db->select_sum('amount');
        $this->db->from('billcredit');
        $this->db->where('company_id', $comp_id);
        $this->db->where('is_approved', 1);
        $sum_amountcredit = $this->db->get()->row()->amount;
        $resultsum = $amountawal - $sum_amountcredit;

        return $resultsum;
    }
    public function get_piutang_dollar_by_company_id()
    {
        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $this->db->select('SUM(iuran_tetap_usd) + SUM(royalti_usd) as total', false);
//        $this->db->select_sum('(iuran_tetap_usd+royalti_usd)', 'total');
        $this->db->from('tagihanawal');
        $this->db->where('company_id', $comp_id);
        $amountawal = $this->db->get()->row()->total;

        $this->db->select_sum('nominaldollar');
        $this->db->from('billcredit');
        $this->db->where('company_id', $comp_id);
        $this->db->where('is_approved', 1);
        $sum_amountcredit = $this->db->get()->row()->nominaldollar;
        $resultsum = $amountawal - $sum_amountcredit;

        return $resultsum;
    }

    public function save($data)
    {
        $this->db->set('created_date', date("Y-m-d"));
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}