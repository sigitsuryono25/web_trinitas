<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Acara extends CI_Controller
{

    public function create()
    {
        $master['page'] = $this->load->view('new_admin/acara/buat', null, TRUE);
        $master['nama'] = "Agus";
        $master['title'] = "Buat Acara";
        $this->load->view('new_admin/template', $master);
    }

    public function insert()
    {
        $data = $this->input->post(); //get array assosiatif dari semua inputan
        $data['id'] = $this->etc->gen_uuid(); //tambah index id untuk id acara
        $ins = $this->crud->insertData("acara", $data);
        if ($ins) {
            $this->session->set_flashdata(['code' => 200, 'message' => "data Berhasil Disimpan"]);
            redirect(site_url('admin/acara/list_acara'));
        } else {
            $this->session->set_flashdata(['code' => 500, 'message' => "Data Gagal Disimpan"]);
            redirect(site_url('admin/acara/create'));
        }
    }

    public function list_acara()
    {
        $data['acara'] = $this->acara->getAcara()->result();
        $master['page'] = $this->load->view('new_admin/acara/daftar', $data, TRUE);
        $master['nama'] = "Agus";
        $master['title'] = "Daftar Acara";
        $this->load->view('new_admin/template', $master);
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
        $uuid = $this->input->get('uuid');
        $where = ['id' => $uuid];

        $del = $this->crud->deleteData('acara', $where);
        if ($del) {
            $this->session->set_flashdata(['code' => 200, 'message' => "data Berhasil Dihapus"]);
            redirect(site_url('admin/acara/list_acara'));
        } else {
            $this->session->set_flashdata(['code' => 500, 'message' => "Data Gagal Dihapus"]);
            redirect(site_url('admin/acara/list_acara'));
        }
    }
}

/* End of file Acara.php */
