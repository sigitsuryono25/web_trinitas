<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function userPetugas($kolom = "*", $where = [], $orderBy = null, $like = null, $limit = [], $isShowCompile = false)
    {
        $q = $this->db->select($kolom)
            ->from('user');
        if (!empty($where)) {
            $q = $this->db->where($where);
        }
        if (!empty($orderBy)) {
            $q = $this->db->order_by($orderBy);
        }
        if (!empty($like)) {
            $q = $this->db->like($like);
        }
        if (!empty($limit)) {
            $q = $this->db->limit($limit[1], $limit[0]);
        }

        if ($isShowCompile) {
            return $q->get_compiled_select();
        } else {
            return $q->get();
        }
    }
}

/* End of file Acara_m.php */
