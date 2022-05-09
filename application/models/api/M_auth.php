<?php

class M_Auth extends CI_Model{

	// login
	function login($data){
		$where = array(
			"email" => $data['email'],
			"password" => md5($data['password']),
		);
		$this->db->select('no_kk_gereja,username,email');
		$this->db->from('user');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
	}


	// register
	function register($data){
		$userData = array(
			"no_kk_gereja" => $data['no_kk_gereja'],
			"username" => $data['username'],
			"password" => md5($data['password']),
			"email" => $data['email'],
		);

		$query = $this->db->insert("user",$userData);

		return $query;
	}
}


?>
