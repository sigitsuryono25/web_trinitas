<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_m extends CI_Model
{

    public function getJenisPetugas($kolom = "*", $where = [], $orderBy = null, $limit = [], $isShowCompile = false)
    {
        $q = $this->db->select($kolom)
            ->from('master_petugas');
        if (!empty($where)) {
            $q = $this->db->where($where);
        }
        if (!empty($orderBy)) {
            $q = $this->db->order_by($orderBy);
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
