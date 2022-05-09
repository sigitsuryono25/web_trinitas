<?php



defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function list_user()
    {
        $data['user'] = $this->petugas->userPetugas()->result();
        $master['page'] = $this->load->view('new_admin/user/daftar', $data, TRUE);
        $master['nama'] = "Agus";
        $master['title'] = "Daftar User";
        $this->load->view('new_admin/template', $master);
    }

    public function delete()
    {
        $email = $this->input->get('email');
        $where = ['email' => $email];

        $del = $this->crud->deleteData('user', $where);
        if ($del) {
            $this->session->set_flashdata(['code' => 200, 'message' => "data Berhasil Dihapus"]);
            redirect(site_url('admin/user/list_user'));
        } else {
            $this->session->set_flashdata(['code' => 500, 'message' => "Data Gagal Dihapus"]);
            redirect(site_url('admin/user/list_user'));
        }
    }
}

/* End of file User.php */
