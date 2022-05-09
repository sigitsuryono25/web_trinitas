<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    public function index()
    {
        $uuid = $this->input->get('uuid');
        $data['acara'] = $this->acara->getAcara("*", ['id' => $uuid])->row();
        if (empty($data['acara'])) {
            $this->session->set_flashdata(['code' => 500, 'message' => "ID Acara Tidak Valid"]);
            redirect(site_url('admin/acara/list'));
        }
        $data['jenis'] = $this->jenis->getJenisPetugas()->result();
        $master['page'] = $this->load->view('new_admin/petugas/petugas', $data, TRUE);
        $master['title'] = "Pilih Petugas Acara";
        $master['nama'] = "Agus";
        $this->load->view('new_admin/template', $master);
    }

    public function create()
    {
        $data = $this->input->post();
        $idAcara = $this->input->post('uuid');
        echo "<pre>";
        $dataIns = [];
        foreach ($data as $key => $dd) {
            $ptgs = explode("_", $key);
            foreach ($dd as $petugas) {
                $tmp = ['id_petugas' => $ptgs[1], 'userid' => $petugas, 'id_acara' => $idAcara];
                array_push($dataIns, $tmp);
            }
        }


        $ins = $this->crud->insertBatch('user_petugas', $dataIns);
        if ($ins) {
            $this->session->set_flashdata(['code' => 200, 'message' => "Petugas Berhasil Disimpan"]);
            redirect(site_url('admin/Acara/list'));
        } else {
            $this->session->set_flashdata(['code' => 500, 'message' => "Petugas Gagal Disimpan"]);
            redirect(site_url('admin/Acara/list'));
        }
    }

    public function dataPetugas()
    {
        $nama = $this->input->get('term');
        // $where = [], $orderBy = null, $like = null, $limit = [], $isShowCompile = false)
        $res = $this->petugas->userPetugas("*", null, null, ['username' => $nama])->result();

        foreach ($res as $key => $value) {
            $data[] = ['id' => $value->email, 'text' => $value->username];
        }

        echo json_encode($data);
    }
}

/* End of file Petugas.php */
