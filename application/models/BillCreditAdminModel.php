<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BillCreditAdminModel extends CI_Model {

    var $table = 'billcredit';
    var $column_order = array(null,'amount', 'company_name', 'objection_information'); //set column field database for datatable orderable
    var $column_search = array('amount'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('billcredit.id, billcredit.amount, billcredit.file_validation, billcredit.objection_information,
        billcredit.is_approved, billcredit.company_id, billcredit.created_date, billcredit.nominaldollar, company.company_name');
        $this->db->from($this->table);
        $this->db->where('company.is_visible', 1);
        $this->db->where('billcredit.is_approved !=', 0);
        $this->db->join('company', 'billcredit.company_id = company.id');

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
        $this->db->select('billcredit.id, billcredit.amount, billcredit.file_validation, billcredit.objection_information,
        billcredit.is_approved, billcredit.company_id, billcredit.created_date, billcredit.nominaldollar, company.company_name');

        $this->db->from($this->table);
        $this->db->where('company.is_visible', 1);
        $this->db->where('billcredit.is_approved !=', 0);
        $this->db->join('company', 'billcredit.company_id = company.id');
        return $this->db->count_all_results();
    }
    public function get_by_id($id)
    {
        $this->db->select('billcredit.id, billcredit.amount, billcredit.file_validation, billcredit.objection_information,
        billcredit.is_approved, billcredit.company_id, billcredit.created_date, billcredit.nominaldollar, company.company_name');

        $this->db->from($this->table);

        $this->db->where('company.is_visible', 1);
        $this->db->join('company', 'billcredit.company_id = company.id');

        $this->db->where('billcredit.id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_piutang_by_company_id()
    {
        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $this->db->select('amount');
        $this->db->from('tagihanawal');
        $this->db->where('company_id', $comp_id);
        $amountawal = $this->db->get()->row()->amount;

        $this->db->select_sum('amount');
        $this->db->from('billcredit');
        $this->db->where('company_id', $comp_id);
        $this->db->where('is_approved', 1);
        $sum_amountcredit = $this->db->get()->row()->amount;
        $resultsum = $amountawal - $sum_amountcredit;

//        $this->db->from($this->table);
//        $this->db->where('id',$id);
//        $query = $this->db->get();

        return $resultsum;
    }
    public function get_piutang_dollar_by_company_id()
    {
        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $this->db->select('nominaltagihandollar');
        $this->db->from('tagihanawal');
        $this->db->where('company_id', $comp_id);
        $amountawal = $this->db->get()->row()->nominaltagihandollar;

        $this->db->select_sum('nominaldollar');
        $this->db->from('billcredit');
        $this->db->where('company_id', $comp_id);
        $this->db->where('is_approved', 1);
        $sum_amountcredit = $this->db->get()->row()->nominaldollar;
        $resultsum = $amountawal - $sum_amountcredit;

//        $this->db->from($this->table);
//        $this->db->where('id',$id);
//        $query = $this->db->get();

        return $resultsum;
    }
    public function save($data)
    {
        $this->db->set('created_date', date("Y-m-d H:i:s"));
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function approve($where, $data)
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