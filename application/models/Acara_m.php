<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Acara_m extends CI_Model
{

    public function getAcara($kolom = "*", $where = [], $orderBy = null, $like = null, $limit = [], $isShowCompile = false)
    {
        $q = $this->db->select($kolom)
            ->from('acara');
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

    public function getAcaraPetugas($where = null, $isShowCompiled = false)
    {
        $q = $this->db->select("*")
            ->from('user_petugas')
            ->join('master_petugas', 'user_petugas.id_petugas=master_petugas.id_petugas')
            ->join('acara', 'user_petugas.id_acara=acara.id');

        if (!empty($where)) {
            $q->where($where);
        }

        if ($isShowCompiled) {
            return $q->get_compiled_select();
        } else {
            return $q->get();
        }
    }

    public function getAcaraTerdekat($kolom = "*", $where = null, $isShowCompiled = false)
    {

        $q = $this->db->select($kolom)
            ->from('user_petugas')
            ->join('master_petugas', 'user_petugas.id_petugas=master_petugas.id_petugas')
            ->join('acara', 'user_petugas.id_acara=acara.id')
            ->order_by('tanggal_pelaksanaan', 'ASC')
            ->limit(1);

        if (!empty($where)) {
            $q->where($where);
        }

        if ($isShowCompiled) {
            return $q->get_compiled_select();
        } else {
            return $q->get();
        }
    }
}

/* End of file Acara_m.php */
