<?php

class Auth extends CI_Controller
{


	public function	login()
	{
		$email = $this->input->post_get('email');
		$password = $this->input->post_get('password');

		$data = array(
			"email" => $email,
			"password" => $password,
		);

		// execute login
		$result = $this->m_auth->login($data);

		if (isset($result)) {
			echo json_encode(array(
				"result" => $result,
				"message" => "login user successful",
				'code' => 200
			));
		} else {
			echo json_encode(array(
				"message" => "login user failed",
				'code' => 500
			));
		}
	}

	public function	register()
	{
		$noKKGereja = $this->input->post('no_kk_gereja');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			"no_kk_gereja" => $noKKGereja,
			"username" => $username,
			"password" => $password,
			"email" => $email,
		);

		// execute register
		$result = $this->m_auth->register($data);

		if ($result > 0) {
			echo json_encode(array(
				"message" => "register user successful",
				'code' => 200
			));
		} else {
			echo json_encode(array(
				"message" => "register user failed",
				'code' => 500
			));
		}
	}
}
