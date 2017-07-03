<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: imam lubis
 * Date: 7/4/17
 * Time: 5:36 AM
 */
class CompanyEmailModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_by_company_id($id)
    {
        $this->db->from('companyemail');
        $this->db->where('company_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
}