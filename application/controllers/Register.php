<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Travelind | Sign Up';
        $this->load->view('Templates/Auth/Header', $data);
        $this->load->view('Auth/Register');
        $this->load->view('Templates/Auth/Footer');
    }

    public function insert()
    {
        $data = [
            'fullname' => htmlspecialchars($this->input->post('fullname')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];
        $this->db->insert('t_user', $data);
    }
}
