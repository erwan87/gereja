<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function auth_user($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');

        // Associative array method:
        $array = array('username' => $username, 'password' => $password);

        $this->db->where($array);
        $query = $this->db->get();
        return $query;
    }

    public function viewAll($select,$table)
    {
        $this->db->select($select);
        $this->db->from($table);
        $query = $this->db->get();
        return $query;
    }

}
