<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		$this->load->view('new_admin/login');
	}

	public function loginproc()
	{
		$user = $this->input->post('email');
		$pass = $this->input->post('password');

		if ($user == "lauwba" && $pass == "lauwba") {

			$data = array(
				'nama' => 'Lauwba'
			);

			$this->session->set_userdata($data);
			redirect(site_url('admin/acara/list_acara'));
		} else {
			$this->session->set_flashdata(['code' => 500, 'message' => 'Username dan password salah']);
			redirect(site_url('/'));
		}
	}

	public function logout()
	{

		$this->session->sess_destroy();
		$this->session->set_flashdata(['code' => 200, 'message' => 'Logout Berhasil. Login kembali untuk melanjutkan']);
		redirect(site_url('/'));
	}
}
