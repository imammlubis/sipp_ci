<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 3:02 AM
 */
class LaporanTagihanAwalModel extends CI_Model{
    var $table = 'tagihanawal';
    var $column_order = array(null,'company_name', 'legal_type', 'province', 'evaluator'); //set column field database for datatable orderable
    var $column_search = array('company_name', 'province', 'legal_type'); //set column field database for datatable searchable
    var $order = array('a.id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    private function _get_datatables_query()
    {
        $this->db->select('a.id, b.company_name, b.legal_type, b.province, a.evaluator, a.billing_date,
        sum(a.iuran_tetap_idr)iuran_tetap_idr,
        sum(a.iuran_tetap_usd)iuran_tetap_usd,
        sum(a.royalti_idr)royalti_idr,
        sum(a.royalti_usd)royalti_usd,
        sum(a.pht_idr)pht_idr,
        sum(a.pht_usd)pht_usd'
        );
        $this->db->from('tagihanawal a');
        $this->db->join('company b', 'a.company_id = b.id');
        $this->db->group_by('b.company_name, b.legal_type, b.province, a.evaluator');
        //$this->db->order_by('a.id', 'asc');
        $this->db->where('b.is_visible', 1);
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
    private function _get_datatables_query2()
    {
        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $this->db->select('a.id, b.company_name, b.legal_type, b.province, a.evaluator, a.billing_date,
        sum(a.iuran_tetap_idr)iuran_tetap_idr,
        sum(a.iuran_tetap_usd)iuran_tetap_usd,
        sum(a.royalti_idr)royalti_idr,
        sum(a.royalti_usd)royalti_usd,
        sum(a.pht_idr)pht_idr,
        sum(a.pht_usd)pht_usd'
        );
        $this->db->from('tagihanawal a');
        $this->db->join('company b', 'a.company_id = b.id');
        $this->db->group_by('b.company_name, b.legal_type, b.province, a.evaluator');
        //$this->db->order_by('a.id', 'asc');
        $this->db->where('b.is_visible', 1);
        $this->db->where('b.id', $comp_id);
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
    function get_datatables2()
    {
        $this->_get_datatables_query2();
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
    function count_filtered2()
    {
        $this->_get_datatables_query2();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function count_all2()
    {
        $this->db->select('id');
        $this->db->from('company');
        $this->db->where('user_id', $this->session->userdata('logged_in')['user_id']);
        $comp_id = $this->db->get()->row()->id;

        $this->db->select('a.id, b.company_name, b.legal_type, b.province, a.evaluator, a.billing_date,
        sum(a.iuran_tetap_idr)iuran_tetap_idr,
        sum(a.iuran_tetap_usd)iuran_tetap_usd,
        sum(a.royalti_idr)royalti_idr,
        sum(a.royalti_usd)royalti_usd,
        sum(a.pht_idr)pht_idr,
        sum(a.pht_usd)pht_usd'
        );
        $this->db->from('tagihanawal a');
        $this->db->join('company b', 'a.company_id = b.id');
        $this->db->group_by('b.company_name, b.legal_type, b.province, a.evaluator');
        $this->db->where('b.is_visible', 1);
        $this->db->where('b.id', $comp_id);
        return $this->db->count_all_results();
    }
    public function get_by_id($id)
    {
        $this->db->select('a.id, b.company_name, b.legal_type, b.province, a.evaluator,
        sum(a.iuran_tetap_idr)iuran_tetap_idr,
        sum(a.iuran_tetap_usd)iuran_tetap_usd,
        sum(a.royalti_idr)royalti_idr,
        sum(a.royalti_usd)royalti_usd');
        $this->db->from('tagihanawal a');
        $this->db->join('company b', 'a.company_id = b.id');
        $this->db->group_by('b.company_name, b.legal_type, b.province, a.evaluator');
        $this->db->order_by('a.id', 'asc');
        $this->db->where('b.is_visible', 1);
        $this->db->where('a.id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data)
    {
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