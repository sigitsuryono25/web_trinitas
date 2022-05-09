<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Model
{

    public function insertData($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function insertBatch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    public function updateData($table, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function deleteData($table, $where)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }
}

/* End of file Crud.php */
