<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    var $table = 'users';
    var $column_order = array(null,'users.id', 'users.first_name','users.last_name','users.email','company.province', 'company.company_name'); //set column field database for datatable orderable
    var $column_search = array('email'); //set column field database for datatable searchable
    var $order = array('users.id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('users.id, users.first_name, users.last_name, users.email, users.status, company.province, company.company_name');
        $this->db->from($this->table);
        $this->db->where('role', 'company');
        $this->db->join('company', 'users.id = company.user_id');
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
        $this->db->from($this->table);
        $this->db->where('role', 'company');
        return $this->db->count_all_results();
    }
    public function get_by_id($id)
    {
//        $this->db->from($this->table);
//        $this->db->where('id',$id);
//        $query = $this->db->get();

        $this->db->select('users.id, users.first_name, users.last_name, users.email, users.status, company.company_name, company.id as companyid');
        $this->db->from($this->table);
        $this->db->where('role', 'company');
        $this->db->join('company', 'users.id = company.user_id');
        $this->db->where('users.id',$id);
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