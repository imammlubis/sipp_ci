<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 3:02 AM
 */
class TagihanAwalModel extends CI_Model{

    var $table = 'tagihanawal';
    var $column_order = array(null, 'FirstName','LastName','phone','address','city','country'); //set column field database for datatable orderable
    var $column_search = array('FirstName','LastName','phone','address','city','country'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order

    function  __construct()
    {
        parent::__construct();
    }

    function add($data)
    {
        $now = date('Y-m-d H:i:s');
        $this->db->set('created_date', $now);
        $this->db->insert('tagihanawal', $data);
    }

}