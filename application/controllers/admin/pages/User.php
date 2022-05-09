<?php


class User extends CI_Controller
{
    function index (){
        $this->load->view('admin/includes/head');
        $this->load->view('admin/includes/navbar');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/pages/user');
        $this->load->view('admin/includes/footer');
        $this->load->view('admin/includes/foot');
    }
}


?>